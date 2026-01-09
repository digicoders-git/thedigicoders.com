<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	class CashfreePayment
	{
		public $actionUrl, $appId, $secretKey, $returnUrl, $notifyUrl;
		public function __construct()
		{
			
			// $this->actionUrl = "https://test.cashfree.com/billpay/checkout/post/submit";
			// $this->appId = "74203d9ea5a1b04858452415130247";
			// $this->secretKey = "f0ab12cf9c01a69f2001a1a849bc95ec98815c48";
			// $this->returnUrl = base_url("Home/PaymentResponse");
			// $this->notifyUrl = "";
			
			// test mode
			// $this->app_id = "94132cc91b76de72d9e09f47123149";
			// $this->app_secret = "4491f0b410da51ff330b9ae326a9e6d024280e7d";
			// $this->payment_api_url = "https://sandbox.cashfree.com";
			
			$this->returnUrl = base_url("Home/PaymentResponse") . "?order_id={order_id}&order_token={order_token}";
			$this->returnUrlV2 = base_url("Home/PaymentResponseV2") . "?order_id={order_id}&order_token={order_token}";
			$this->returnUrlV3 = base_url("User/Managefee") . "?order_id={order_id}&order_token={order_token}";
			
			// live mode
			$this->app_id="119766b27ab44b3a40a135d587667911";
			$this->app_secret="fa5caf4b81d22d024273f53d5f6a74f98cb98f65";
			$this->payment_api_url="https://api.cashfree.com";
			
			
		}
		public function GetPaymentLink($data_arr,$returnUrl)
		{
			// var_dump($data_arr);die();
			$txnid = $data_arr->txn_id;
			$postData = '{
            "txnid": "' . $data_arr->txn_id . '",
            "order_amount":  "' . $data_arr->amount . '",
            "order_currency": "INR",
            "customer_details": {
			"customer_id": "' .  $data_arr->userid . '",
			"customer_name": "' . $data_arr->student_name . '",
			"customer_email": "' . $data_arr->email . '",
			"customer_phone": "' . $data_arr->mobile . '"
            },
            "order_meta": {
			"return_url": "' . $returnUrl. '"
            }
			}';
			
			// var_dump($postData);die();
			
			$curl = curl_init();
			curl_setopt_array($curl, array(
            CURLOPT_URL => $this->payment_api_url . '/pg/orders',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => array(
			'Content-Type: application/json',
			'x-api-version: 2021-05-21',
			'x-client-id: ' . $this->app_id, 
			'x-client-secret: ' . $this->app_secret
            ),
			));
			$response = curl_exec($curl);
			curl_close($curl);
			$newresponse = json_decode($response);
			$paymentlink = $newresponse->payment_link;
			redirect($paymentlink);
		}
		
		public function CheckOrderStatus($order_id)
		{
			$order_id = $order_id;
			// handle payment response
			$curl = curl_init();
			curl_setopt_array($curl, array(
            CURLOPT_URL => $this->payment_api_url . '/pg/orders/' . $order_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
			'Content-Type: application/json',
			'x-api-version: 2021-05-21',
			'x-client-id: ' . $this->app_id,
			'x-client-secret: ' . $this->app_secret
            ),
			));
			$response = curl_exec($curl);
			curl_close($curl);
			$newresponse = json_decode($response);
			return $newresponse;
		}
		public function GetSignature($orderId, $orderAmount, $orderCurrency, $orderNote, $customerName, $customerPhone, $customerEmail)
		{
			$cf_secret_key = $this->secretKey;
			$cf_app_id = $this->appId;
			$cf_return_url = $this->returnUrl;
			$cf_notify_url = $this->notifyUrl;
			$postData = array(
            "appId" => $cf_app_id,
            "orderId" => $orderId,
            "orderAmount" => $orderAmount,
            "orderCurrency" => $orderCurrency,
            "orderNote" => $orderNote,
            "customerName" => $customerName,
            "customerPhone" => $customerPhone,
            "customerEmail" => $customerEmail,
            "returnUrl" => $cf_return_url,
            "notifyUrl" => $cf_notify_url,
			);
			ksort($postData);
			$signatureData = "";
			foreach ($postData as $key => $value)
			{
				$signatureData .= $key . $value;
			}
			$signature = hash_hmac('sha256', $signatureData, $cf_secret_key, true);
			$signature = base64_encode($signature);
			return $signature;
		}
	}	