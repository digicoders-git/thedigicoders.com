<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class RazorpayPayment
{
    private $keyId;
    private $keySecret;
    private $apiUrl;

    public function __construct()
    {    //test mode
        $this->keyId = "rzp_test_6kz5nGEzi8uXRw";
        $this->keySecret = "SMtig3JkAqFP7nIMpODyyuAL";
        $this->apiUrl = "https://api.razorpay.com/v1/orders";

        // Live Credentials
        // $this->keyId = "rzp_live_1bGogPvHaanZYl";
        // $this->keySecret = "1NvCRnnGYMZ9KMMsnhY6fV0K";
        // $this->apiUrl = "https://api.razorpay.com/v1/orders";
    }

    public function GetPaymentLink($data_arr, $returnUrl)
    {
        // Razorpay Order Creation
        // Amount is in currency subunits. Hence, 100 paise = 1 INR.
        $amount = $data_arr->amount * 100;
        $receipt = $data_arr->txn_id;

        $postData = [
            "amount" => $amount,
            "currency" => "INR",
            "receipt" => $receipt,
            "payment_capture" => 1,
            "notes" => [
                "customer_name" => isset($data_arr->student_name) ? $data_arr->student_name : (isset($data_arr->name) ? $data_arr->name : ''),
                "customer_email" => isset($data_arr->email) ? $data_arr->email : '',
                "customer_phone" => isset($data_arr->mobile) ? $data_arr->mobile : '',
                "return_url" => $returnUrl // Note: Razorpay standard checkout doesn't use return_url in order creation usually, but we can pass it in notes or handle via frontend. 
                // However, for standard integration, we create an order -> get order_id -> pass to frontend checkout.
            ]
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($postData),
            CURLOPT_USERPWD => $this->keyId . ":" . $this->keySecret,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            return null;
        } else {
            $result = json_decode($response);
            if (isset($result->id)) {
                // Determine which view to load based on where the request came from or handling logic
                // Since this function is expected to return a 'link' or redirect in the original code, 
                // but Razorpay works best with a checkout page, we might need a different approach.
                // For now, let's assume we return the Order ID and other details to a view that opens the Razorpay Checkout.

                // Construct a URL to a local payment page that opens Razorpay
                // We need to pass order_id and amount to that page.

                $payPageParams = http_build_query([
                    'order_id' => $result->id,
                    'amount' => $amount, // in paise
                    'key_id' => $this->keyId,
                    'product_name' => 'Registration Fee',
                    'description' => 'Payment for Registration',
                    'name' => isset($data_arr->student_name) ? $data_arr->student_name : 'Student',
                    'email' => isset($data_arr->email) ? $data_arr->email : '',
                    'contact' => isset($data_arr->mobile) ? $data_arr->mobile : '',
                    'callback_url' => $returnUrl // We will use this as logic to redirect after success
                ]);

                // We'll create a generic Razorpay checkout view in Home controller
                return base_url("Home/RazorpayCheckout?" . $payPageParams);

            } else {
                // Log error or handle failure
                return null;
            }
        }
    }

    public function VerifyPayment($razorpay_payment_id, $razorpay_order_id, $razorpay_signature)
    {
        $generated_signature = hash_hmac('sha256', $razorpay_order_id . "|" . $razorpay_payment_id, $this->keySecret);

        if ($generated_signature == $razorpay_signature) {
            return true;
        } else {
            return false;
        }
    }

    public function CheckOrderStatus($order_id)
    {
        // This is used in PaymentResponse. 
        // For Razorpay, we usually verify signature. 
        // But to keep consistency with existing logic, we can fetch order.

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->apiUrl . "/" . $order_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_USERPWD => $this->keyId . ":" . $this->keySecret,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return null;
        }

        return json_decode($response);
    }
}
