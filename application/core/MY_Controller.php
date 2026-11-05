<?php
defined('BASEPATH') or exit('No direct access allowed');
#[AllowDynamicProperties]
class MY_Controller extends CI_Controller
{
	public $data;
	public function db_safe_count($table, $where = null)
	{
		if (!empty($where)) {
			$this->db->where($where);
		}
		return (int) $this->db->count_all_results($table);
	}

	public function __construct()
	{
		date_default_timezone_set("asia/kolkata");
		parent::__construct();

		$controller = isset($this->router) ? strtolower($this->router->fetch_class()) : '';
		$is_admin = in_array($controller, array('admin', 'adminai', 'aiassistant'));

		$tnxpass = "";
		$counts = array(
			"contactcount" => 0,
			"regcount" => 0,
			"newregcount" => 0,
			"acceptregcount" => 0,
			"rejectregcount" => 0,
			"feecount" => 0,
			"newfeecount" => 0,
			"acceptfeecount" => 0,
			"rejectfeecount" => 0,
			"couponcount" => 0,
			"fnl" => 0,
			"totalbatch" => 0,
			"totalteacher" => 0
		);

		if ($is_admin) {
			$admin_login_query = $this->db->select('tnx_password')->get("admin_login");
			$admin_login = $admin_login_query ? $admin_login_query->row() : null;
			$tnxpass = (isset($admin_login) && isset($admin_login->tnx_password)) ? $admin_login->tnx_password : "";

			$counts = array(
				"contactcount" => $this->db_safe_count('contact', array("status" => "true")),
				"regcount" => $this->db_safe_count('registration'),
				"newregcount" => $this->db_safe_count('registration', array('accept_status' => 'pending')),
				"acceptregcount" => $this->db_safe_count('registration', array('accept_status' => 'accept')),
				"rejectregcount" => $this->db_safe_count('registration', array('accept_status' => 'reject')),
				"feecount" => $this->db_safe_count('fee_deposit'),
				"newfeecount" => $this->db_safe_count('fee_deposit', array('accept_status' => 'new')),
				"acceptfeecount" => $this->db_safe_count('fee_deposit', array('accept_status' => 'accept')),
				"rejectfeecount" => $this->db_safe_count('fee_deposit', array('accept_status' => 'reject')),
				"couponcount" => $this->db_safe_count('tbl_coupon'),
				"fnl" => $this->db_safe_count('final_year_project', array("status" => "true")),
				"totalbatch" => $this->db_safe_count('tbl_batch'),
				"totalteacher" => $this->db_safe_count('tbl_teacher')
			);
		}

		$this->data = array_merge(array(
			"app_name" => "Software Development | Website Development | Mobile Application Development | Digital Marketing | Summer Training | Internship | Apprenticeship",
			"date" => date('Y-m-d'),
			"time" => date('h:i:s A'),
			"tnxpass" => $tnxpass
		), $counts);

		// Inactivity Check (12 Hours)
		if ($this->session->userdata('AdminID')) {
			$last_activity = $this->session->userdata('last_activity');
			if ($last_activity && (time() - $last_activity > 43200)) {
				$this->session->sess_destroy();
				redirect('Home/Login');
			}
			$this->session->set_userdata('last_activity', time());
		}

		// ⚡ Auto-clean dead session files older than 24 hours (runs seamlessly once a day)
		$this->auto_clean_expired_sessions();
	}

	/**
	 * Auto-clean dead session files older than 24 hours once a day
	 */
	private function auto_clean_expired_sessions()
	{
		$clean_flag_file = APPPATH . 'cache/session_last_cleaned.txt';
		$now = time();
		if (file_exists($clean_flag_file)) {
			$last_cleaned = (int)@file_get_contents($clean_flag_file);
			if ($now - $last_cleaned < 86400) {
				return; // Already cleaned within last 24 hours, return in 0ms
			}
		}

		// Update flag immediately so concurrent requests skip
		@file_put_contents($clean_flag_file, $now);

		// Purge dead files older than 24 hours from session directories
		$session_dirs = array(APPPATH . 'ci_session/', APPPATH . 'ci_sessions/');
		foreach ($session_dirs as $session_dir) {
			if (is_dir($session_dir) && $handle = opendir($session_dir)) {
				while (false !== ($entry = readdir($handle))) {
					if (strpos($entry, 'ci_session') === 0) {
						$filePath = $session_dir . $entry;
						if (is_file($filePath) && ($now - filemtime($filePath) > 86400)) {
							@unlink($filePath);
						}
					}
				}
				closedir($handle);
			}
		}
	}
}
