<?php
namespace Devsig\Paygcc;

use Devsig\Paygcc\PaygccCurl;

class PaygccOrder extends PaygccCurl
{
    protected $amount = 0;
    protected $order_id = '';
    protected $customer_id = '';
    protected $customer_name = '';
    protected $customer_email = '';
    protected $currency = 'BHD';
    protected $transactionId;

    protected $order_details_url = "https://api.paygcc.com/api/v5/orderPaymentDetails";

    public function setOrderId($order_id = 0) {
        $this->order_id = $order_id;
        return $this;
    }

    public function getOrderId() {
        return $this->order_id;
    }

    public function amount($amount)
    {
        if (floatval($amount) === 0) {
            throw new \Exception('Amount value should be an integer.');
        }
        $this->amount = floatval($amount);
        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function customer($customer_id = 0, $customer_name = '' , $customer_email='info@tafseel.net')
    {
        $this->customer_id      = $customer_id;
        $this->customer_name    = $customer_name;
        $this->customer_email    = $customer_email;
        return $this;
    }

    public function getCustomerId() {
        return $this->customer_id;
    }

    public function getCustomerName() {
        return $this->customer_name;
    }
    public function getCustomerEmail() {
        return $this->customer_email;
    }

    public function currency($currency) {
        return $this->currency = $currency;
    }

    public function getCurrency() {
        return $this->currency;
    }


    public function getTransactions() {

        $transactions = $this->transactionDetail($this->order_details_url, config('paygcc.COMPANY_CODE'), $this->order_id);
//        dd($transactions);
        return $transactions;
    }

}
