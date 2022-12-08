<?php
namespace Devsig\Paygcc;

class PaygccCurl
{
	public function payment_curl($checkout_url, $company_code, $post_data) {

		$ch = curl_init($checkout_url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'company-code: '.$company_code
        ));
        $apiResponse = curl_exec($ch);
        curl_close($ch);
		return $apiResponse;
	}


	public function transactionDetail($order_details_url, $company_code, $order_id) {

		$postRequest = array(
		    'order_id' => $order_id,
		);

		$ch = curl_init($order_details_url);


		curl_setopt($ch, CURLOPT_POSTFIELDS, $postRequest);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'company-code: '.$company_code
		));
		$apiResponse = curl_exec($ch);
		curl_close($ch);

		$response = json_decode($apiResponse);

		return $response;
	}

}
