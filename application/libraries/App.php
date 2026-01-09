<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class App
	{
		private $CI;
		public function __construct()
		{
			$this->CI =& get_instance();
			$this->appZipCode='';
			$this->appGoogleMapKey='';
			$this->TempleteIDForOTP='';
			$this->TempleteIDForSMS='';
		}
		function SendSMS($mobile,$msg,$DLT_TE_ID)
		{
			// $mobile='91'.$mobile;
			$msg=urlencode($msg);
			$sender="DIGICO";
			$authkey='316846AIn4LVLh7ibW6090030bP1';
			$route='1';
			$url="https://api.msg91.com/api/sendhttp.php?authkey=".$authkey."&sender=".$sender."&mobiles=".$mobile."&route=".$route."&message=".$msg."&DLT_TE_ID=".$DLT_TE_ID."";
			$res=file_get_contents($url);
			if($res)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		public function humanTiming ($time)
		{
			$time = time() - $time; 
			$time = ($time<1)? 1 : $time;
			$tokens = array (
			31536000 => 'year',
			2592000 => 'month',
			604800 => 'week',
			86400 => 'day',
			3600 => 'hour',
			60 => 'minute',
			1 => 'second'
			);
			foreach ($tokens as $unit => $text) {
				if ($time < $unit) continue;
				$numberOfUnits = floor($time / $unit);
				return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'').' ago';
			}
		}
        
		public function calculateDistance($shipping_zip_code)
		{
			$pick_up_point_zip_code = $this->appZipCode;
			$shipping_zip_code = $shipping_zip_code;
			$pick_up_lat_lng = $this->getLatLng($pick_up_point_zip_code);
			$shipping_lat_lng = $this->getLatLng($shipping_zip_code);
			$unit = 'km';
			$theta = ($pick_up_lat_lng->longitude)-($shipping_lat_lng->longitude);
			$dist = sin(deg2rad((double)$pick_up_lat_lng->latitude)) * sin(deg2rad((double)$shipping_lat_lng->latitude)) + cos(deg2rad((double)$pick_up_lat_lng->latitude)) * cos(deg2rad((double)$shipping_lat_lng->latitude)) * cos(deg2rad((double)$theta));
			$dist = acos($dist);
			$dist = rad2deg($dist);
			$distance = round($dist * 60 * 1.1515 * 1.609344);
			$response = (object) [
			'latitude' => $shipping_lat_lng->latitude,
			'longitude' => $shipping_lat_lng->longitude,
			'address' => $shipping_lat_lng->address,
			'pincode' => $shipping_zip_code,
			'distance' => $distance
			];
			return $response;
		}
		public function getLatLng($zip_code)
		{
			$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$zip_code."&sensor=false&key=".$this->appGoogleMapKey."";
			$curl=curl_init($url);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, '');
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_TIMEOUT, 30);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			$json=curl_exec($curl);
			$decode=json_decode($json, true);
			$response = (object) [
			'latitude' => $decode['results'][0]['geometry']['location']['lat'],
			'longitude' => $decode['results'][0]['geometry']['location']['lng'],
			'address' => $decode['results'][0]['formatted_address']
			];
			return $response;
		}
		function hidemobile($mobile)
		{
			if(strlen($mobile)==10)
			{
				$mob1=substr($mobile,0,2);
				$mob2=substr($mobile,6);
				$mob3=$mob1."XXXX".$mob2;
				return $mob3;
			}
			else
			{
				return $mobile;
			}
		}
		
		function send_notification_multiple($android_channel_id, $message, $title, $alltokendata)
		{
			$API_ACCESS_KEY='AAAA73vnMzw:APA91bHZDIrZDXepAGD2XDJZRQENvtwGRiWKf2lsTex1K4w5gMVfFO1jIvviohGRCpiEgT0w0f6LEDkDenbWHwMkdZumlg-qEulQv6VrhcuBZ-QY2kMIKGoVCR-xXIWuACLbzg9qmVSH';
			
			$msg = array(
			'title' => $title,
			'body' => $message,
			'android_channel_id'   => $android_channel_id
			);
			
			define('API_ACCESS_KEY', $API_ACCESS_KEY);
			$fields = array(
			'registration_ids' => $alltokendata,
			'notification' => $msg
			);
			$headers = array(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
			); 
			#Send Reponse To FireBase Server	
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
			$result = curl_exec($ch);
			curl_close($ch);
			sleep(1);
			return $result;
		}
		
		
		function send_notification_multiple_image($android_channel_id, $message, $title, $notifilename, $alltokendata)
		{
			$API_ACCESS_KEY='AAAA73vnMzw:APA91bHZDIrZDXepAGD2XDJZRQENvtwGRiWKf2lsTex1K4w5gMVfFO1jIvviohGRCpiEgT0w0f6LEDkDenbWHwMkdZumlg-qEulQv6VrhcuBZ-QY2kMIKGoVCR-xXIWuACLbzg9qmVSH';
			
			$msg = array(
			'title' => $title,
			'body' => $message,
			'image' => $notifilename,
			'android_channel_id'   => $android_channel_id
			);
			
			define('API_ACCESS_KEY', $API_ACCESS_KEY);
			$fields = array(
			'registration_ids' => $alltokendata,
			'notification' => $msg
			);
			$headers = array(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
			);
			#Send Reponse To FireBase Server	
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
			$result = curl_exec($ch);
			curl_close($ch);
			sleep(1);
			return $result;
		}
		
		
		
		
		
		function send_notification_single($message, $title, $token)
		{
			$API_ACCESS_KEY='AAAAmJ9Shjw:APA91bGswmIIUUlj1NcFNO3H8fXHtlqMgShnr8YfqGYnDHeuLtRN64UdokPAoSc1mtwtvt2v1TIFv0fQdQCHZeByme3gLZ-D1Bqtc1MxCupjWWen6Kj5cr4nhbnD9ofhFMGGDZjjrY_K';
			$msg = array(
			'body'   => $message,
			'title'   => $title
			);
			define('API_ACCESS_KEY', $API_ACCESS_KEY);
			$fields = array(
			'to' => $token,
			'notification' => $msg
			);
			$headers = array(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
			);
			#Send Reponse To FireBase Server	
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
			$result = curl_exec($ch);
			curl_close($ch);
			sleep(1);
			return $result;
		}
		
        function convertNumberToWordsForIndia($number){
			//A function to convert numbers into Indian readable words with Cores, Lakhs and Thousands.
			$words = array(
			'0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five',
			'6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten',
			'11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen',
			'16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty',
			'30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy',
			'80' => 'eighty','90' => 'ninty');
			
			//First find the length of the number
			$number_length = strlen($number);
			//Initialize an empty array
			$number_array = array(0,0,0,0,0,0,0,0,0);        
			$received_number_array = array();
			
			//Store all received numbers into an array
			for($i=0;$i<$number_length;$i++){    
				$received_number_array[$i] = substr($number,$i,1);    
			}
			
			//Populate the empty array with the numbers received - most critical operation
			for($i=9-$number_length,$j=0;$i<9;$i++,$j++){ 
				$number_array[$i] = $received_number_array[$j]; 
			}
			
			$number_to_words_string = "";
			//Finding out whether it is teen ? and then multiply by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
			for($i=0,$j=1;$i<9;$i++,$j++){
				//"01,23,45,6,78"
				//"00,10,06,7,42"
				//"00,01,90,0,00"
				if($i==0 || $i==2 || $i==4 || $i==7){
					if($number_array[$j]==0 || $number_array[$i] == "1"){
						$number_array[$j] = intval($number_array[$i])*10+$number_array[$j];
						$number_array[$i] = 0;
					}
					
				}
			}
			
			$value = "";
			for($i=0;$i<9;$i++){
				if($i==0 || $i==2 || $i==4 || $i==7){    
					$value = $number_array[$i]*10; 
				}
				else{ 
					$value = $number_array[$i];    
				}            
				if($value!=0)         {    $number_to_words_string.= $words["$value"]." "; }
				if($i==1 && $value!=0){    $number_to_words_string.= "Crores "; }
				if($i==3 && $value!=0){    $number_to_words_string.= "Lakhs ";    }
				if($i==5 && $value!=0){    $number_to_words_string.= "Thousand "; }
				if($i==6 && $value!=0){    $number_to_words_string.= "Hundred &amp; "; }            
				
			}
			if($number_length>9){ $number_to_words_string = "Sorry This does not support more than 99 Crores"; }
			return ucwords(strtolower($number_to_words_string)." Only.");
		}
		
	}				