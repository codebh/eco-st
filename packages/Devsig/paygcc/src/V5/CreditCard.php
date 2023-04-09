<?php
namespace Devsig\Paygcc\V5;

use Devsig\Paygcc\PaygccOrder as Order;
use Devsig\Paygcc\PaygccCurl;

class CreditCard extends PaygccCurl
{

    /**
     * @var Order
     */
    protected $order;
    protected $card_data;
    protected $transaction_id = '';
    protected $payment_reference_id = '';
    protected $gateway_response = '';
    protected $gateway_url = '';


    protected $checkout_url         = "https://payments.paygcc.com/api/v8/checkout";
    protected $tokenization_url     = "https://payments.paygcc.com/api/v8/customer/tokenizations";
    protected $generate_token_url   = "https://payments.paygcc.com/api/v8/generateToken";
    protected $delete_token_url     = "https://payments.paygcc.com/api/v8/deleteToken";

    protected $authorize_url        = "https://payments.paygcc.com/api/v4/authorize";

    public function __construct($card_data = [])
    {
        $this->card_data = $card_data;
        $this->order(new Order());
    }

    protected function order(Order $order)
    {
        $this->order = $order;
        return $this;
    }

    public function process(Order $order = null)
    {
        if ($order) { // create new order
            $this->order($order);
        }

		$postRequest = array(
            'company-code'  => config('paygcc.COMPANY_CODE'),
		    'customer_id'   => $this->order->getCustomerId(),
		    'order_id'      => $this->order->getOrderId(),
		    'name'          => $this->order->getCustomerName(),
            'email'          => $this->order->getCustomerEmail(),
			'cc_number'     => '',
			'expiry_month'  => '',
			'expiry_year'   => '',
            'webhook_url'   => '',
			'redirect_url'  => '',
            'success_url'   => '',
            'failed_url'    => '',
			'cvv'           => '',

			'grand_total'   => $this->order->getAmount(),
			'currency_code' => $this->order->getCurrency(),
		    'payment_type'  => '1', //always 1 (in case of Credit Card)
		    'used_token'    => '0', //0 to new card, use 1 if you are billing with saved card token
			'save_token'    => 0,
		);

        $this->card_data = array_merge($postRequest, $this->card_data);
        return $this;
    }


    public function pay() {


        $response = $this->payment_curl($this->checkout_url, config('paygcc.COMPANY_CODE'), $this->card_data);
        $gateway_response = json_decode($response);

        if(is_null($gateway_response) || !isset($gateway_response->status))
            throw new \Exception("Invalid gateway response");

        if($gateway_response->status == 0) {
            $error_message = (isset($gateway_response->messages) && is_array($gateway_response->messages) && count($gateway_response->messages) > 0) ? $gateway_response->messages[0] : 'Something went wrong!';
            throw new \Exception($error_message);
        }

        if(isset($this->card_data['used_token']) && $this->card_data['used_token'] == 1) {

            if(!isset($gateway_response->gateway_response) || is_null($gateway_response->gateway_response))
                throw new \Exception("Invalid gateway response");

            $this->gateway_response = $gateway_response->gateway_response;

        } else {

            if(!isset($gateway_response->PaymentURL) || is_null($gateway_response->PaymentURL))
                throw new \Exception("Invalid Payment URL from gateway");

            $this->gateway_url = $gateway_response->PaymentURL;
        }

        return $this;
    }



    public function response() {
        return $this->gateway_response;
    }

    public function render() {
        $response_url = $this->gateway_url;
        return view('devsig::creditcard.redirect', compact('response_url'));
    }

    public function getURL() {
        return $this->gateway_url;
    }



    public function createToken() {

        $valid_keys = ['company-code', 'customer_id', 'cc_number', 'expiry_month', 'expiry_year', 'cvv'];
        $valid_data = array_filter(
            $this->card_data,
            function ($key) use ($valid_keys) {
                return in_array($key, $valid_keys);
            },
            ARRAY_FILTER_USE_KEY
        );
        $response = $this->payment_curl($this->generate_token_url, config('paygcc.COMPANY_CODE'), $valid_data);
        $gateway_response = json_decode($response);


        if(is_null($gateway_response) || !isset($gateway_response->status))
            throw new \Exception("Invalid gateway response");

        if($gateway_response->status == 0) {

            $error_message = (isset($gateway_response->messages) && is_array($gateway_response->messages) && count($gateway_response->messages) > 0) ? $gateway_response->messages[0] : 'Something went wrong!';
            throw new \Exception($error_message);
        }

        if(!isset($gateway_response->token) || is_null($gateway_response->token))
            throw new \Exception("Invalid token from gateway");

        return $this->card_token;
    }




    public function deleteToken($token) {

        $token = [
            'token' => $token
        ];
        $response = $this->payment_curl($this->delete_token_url, config('paygcc.COMPANY_CODE'), $token);
        $gateway_response = json_decode($response);

        if(is_null($gateway_response) || !isset($gateway_response->status))
            throw new \Exception("Invalid gateway response");

        if($gateway_response->status == 0) {
            $error_message = (isset($gateway_response->messages) && is_array($gateway_response->messages) && count($gateway_response->messages) > 0) ? $gateway_response->messages[0] : 'Something went wrong!';
            throw new \Exception($error_message);
        }

        $success_message = (isset($gateway_response->messages) && is_array($gateway_response->messages) && count($gateway_response->messages) > 0) ? $gateway_response->messages[0] : 'Token deleted successfully!';
        return $success_message;
    }


    public function getTokens($customer_id) {

        $customer_data = [
            'customer_id' => $customer_id
        ];

        $response = $this->payment_curl($this->tokenization_url, config('paygcc.COMPANY_CODE'), $customer_data);
        $gateway_response = json_decode($response);

        if(is_null($gateway_response) || !isset($gateway_response->data))
            throw new \Exception("Invalid gateway response");

        return $gateway_response->data;
    }



    public function authorize() {

        $response = $this->payment_curl($this->authorize_url, config('paygcc.COMPANY_CODE'), $this->card_data);
        $gateway_response = json_decode($response);


        if(is_null($gateway_response) || !isset($gateway_response->status))
            throw new \Exception("Invalid gateway response");

        if($gateway_response->status == 0) {
            $error_message = (isset($gateway_response->messages) && is_array($gateway_response->messages) && count($gateway_response->messages) > 0) ? $gateway_response->messages[0] : 'Something went wrong!';
            throw new \Exception($error_message);
        }

        return $this;
    }




}
