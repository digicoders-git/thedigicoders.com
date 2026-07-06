<?php
defined('BASEPATH') or exit('No direct access allowed');
#[AllowDynamicProperties]
class MY_Controller extends CI_Controller
{
	public $data;
	public function db_safe_count($table, $where = null)
	{
		$q = $where ? $this->db->get_where($table, $where) : $this->db->get($table);
		return $q ? $q->num_rows() : 0;
	}

	public function __construct()
	{
		date_default_timezone_set("asia/kolkata");
		parent::__construct();
		$admin_login_query = $this->db->get("admin_login");
		$admin_login = $admin_login_query ? $admin_login_query->row() : null;
		$tnxpass = (isset($admin_login) && isset($admin_login->tnx_password)) ? $admin_login->tnx_password : "";

		$this->data = array(
			"app_name" => "Software Development | Website Development | Mobile Application Development | Digital Marketing | Summer Training | Internship | Apprenticeship",
			"date" => date('Y-m-d'),
			"time" => date('h:i:s A'),
			"tnxpass" => $tnxpass,
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

		// Inactivity Check (12 Hours)
		if ($this->session->userdata('AdminID')) {
			$last_activity = $this->session->userdata('last_activity');
			if ($last_activity && (time() - $last_activity > 43200)) {
				$this->session->sess_destroy();
				redirect('Home/Login');
			}
			$this->session->set_userdata('last_activity', time());
		}
	}
}
