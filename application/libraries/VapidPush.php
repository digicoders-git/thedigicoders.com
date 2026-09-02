<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once FCPATH . 'vendor/autoload.php';

use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

class VapidPush {
	protected $webPush;
	protected $vapidKeys;

	public function __construct() {
		$this->vapidKeys = array(
			'VAPID' => array(
				'subject' => base_url(),
				'publicKey' => 'BOYrD601qTShrtqoQwRpmynJLujQaWoQ8mIQ19Bjti_5sYbazTmnfWU1XGWynhip3bz0zjgX0D43j_BV_F5CdWU',
				'privateKey' => 'PXUgIg8Gy3PWV7VGLmrJC4o1EG0wMhuDAyEjJvodtAo'
			)
		);
		$this->webPush = new WebPush($this->vapidKeys);
		$this->webPush->setReuseVAPIDHeaders(true);
	}

	public function getPublicKey() {
		return $this->vapidKeys['VAPID']['publicKey'];
	}

	public function sendNotification($sub_record, $payload_arr) {
		if (empty($sub_record->endpoint)) {
			return false;
		}

		try {
			$subscription = Subscription::create(array(
				'endpoint' => $sub_record->endpoint,
				'publicKey' => isset($sub_record->public_key) ? $sub_record->public_key : '',
				'authToken' => isset($sub_record->auth_token) ? $sub_record->auth_token : '',
				'contentEncoding' => isset($sub_record->content_encoding) ? $sub_record->content_encoding : 'aes128gcm',
			));

			$jsonPayload = json_encode($payload_arr);
			$this->webPush->queueNotification($subscription, $jsonPayload);

			$results = $this->webPush->flush();
			$success = false;
			foreach ($results as $report) {
				if ($report->isSuccess()) {
					$success = true;
				} else {
					if ($report->isSubscriptionExpired()) {
						$ci =& get_instance();
						$ci->db->where('id', $sub_record->id)->update('tbl_web_push_tokens', array('status' => 'inactive'));
					}
				}
			}
			return $success;
		} catch (\Exception $e) {
			log_message('error', 'VapidPush Error: ' . $e->getMessage());
			return false;
		}
	}

	public function sendMultiple($subscriptions, $payload_arr) {
		$jsonPayload = json_encode($payload_arr);
		$queued = 0;

		foreach ($subscriptions as $sub_record) {
			if (empty($sub_record->endpoint)) continue;
			try {
				$subscription = Subscription::create(array(
					'endpoint' => $sub_record->endpoint,
					'publicKey' => isset($sub_record->public_key) ? $sub_record->public_key : '',
					'authToken' => isset($sub_record->auth_token) ? $sub_record->auth_token : '',
					'contentEncoding' => isset($sub_record->content_encoding) ? $sub_record->content_encoding : 'aes128gcm',
				));
				$this->webPush->queueNotification($subscription, $jsonPayload);
				$queued++;
			} catch (\Exception $e) {
				log_message('error', 'VapidPush Queue Error: ' . $e->getMessage());
			}
		}

		$sentCount = 0;
		if ($queued > 0) {
			foreach ($this->webPush->flush() as $report) {
				if ($report->isSuccess()) {
					$sentCount++;
				} else {
					if ($report->isSubscriptionExpired()) {
						$endpoint = $report->getRequest()->getUri()->__toString();
						$ci =& get_instance();
						$ci->db->where('endpoint', $endpoint)->update('tbl_web_push_tokens', array('status' => 'inactive'));
					}
				}
			}
		}
		return $sentCount;
	}
}
