<?php
namespace Devsig\Paygcc\V5;

use Devsig\Paygcc\PaygccOrder as Order;
use Devsig\Paygcc\PaygccCurl;

class DebitCard extends PaygccCurl
{
    protected $checkout_url = "https://api.paygcc.com/api/v5/benefit_checkout";
    protected $gateway_data;
    protected $transaction_id = '';
    protected $payment_reference_id = '';
    protected $gateway_response = '';
    protected $gateway_url = '';


    public function __construct($gateway_data = [])
    {
        $this->gateway_data = $gateway_data;
        $this->order(new Order());
    }

    protected function order(Order $order)
    {
        $this->order = $order;
        return $this;
    }

    public function process(Order $order = null, $finalizeCallback = null)
    {
        if ($order) { // create new order
            $this->order($order);
        }

		$postRequest = array(
            'company-code'  => config('paygcc.COMPANY_CODE'),
		    'customer_id'   => $this->order->getCustomerId(),
		    'order_id'      => $this->order->getOrderId(),
		    'name'          => $this->order->getCustomerName(),

            'webhook_url'            => '',
            'success_redirect_url'   => '',
            'failed_redirect_url'    => '',

			'grand_total'   => $this->order->getAmount(),
			'currency_code' => $this->order->getCurrency(),
		    'payment_type'  => '2', //always 1 (in case of Credit Card)
            'save_token' => '0'
		);
        $this->gateway_data = array_merge($postRequest, $this->gateway_data);

        return $this;
    }



    public function pay() {

        $response = $this->payment_curl($this->checkout_url, config('paygcc.COMPANY_CODE'), $this->gateway_data);
        $gateway_response = json_decode($response);


        if(is_null($gateway_response) || !isset($gateway_response->status))
            throw new \Exception("Invalid gateway response");

        if($gateway_response->status == 0) {
            $error_message = (isset($gateway_response->messages) && is_array($gateway_response->messages) && count($gateway_response->messages) > 0) ? $gateway_response->messages[0] : 'Something went wrong!';
            throw new \Exception($error_message);
        }

        if(!isset($gateway_response->PaymentURL) || is_null($gateway_response->PaymentURL))
            throw new \Exception("Invalid Payment URL from gateway");

        $this->gateway_url = $gateway_response->PaymentURL;


        return $this;
    }


    public function render_url() {
        $response_url = $this->gateway_url;

        return view('devsig::creditcard.redirect', compact('response_url'));
    }

    public function getURL() {
//        dd($this->gateway_url);
        return $this->gateway_url;
    }

}
