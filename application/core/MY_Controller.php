<?php
defined('BASEPATH') or exit('No direct access allowed');
class MY_Controller extends CI_Controller
{
	public $data;
	public function __construct()
	{
		date_default_timezone_set("asia/kolkata");
		parent::__construct();
		$this->data = array(
			"app_name" => "Software Development | Website Development | Mobile Application Development | Digital Marketing | Summer Training | Internship | Apprenticeship",
			"date" => date('Y-m-d'),
			"time" => date('h:i:s A'),
			"tnxpass" => $this->db->get("admin_login")->row()->tnx_password,
			"contactcount" => $this->db->get_where('contact', array("status" => "true"))->num_rows(),
			"regcount" => $this->db->get('registration')->num_rows(),
			"newregcount" => $this->db->order_by('id', 'desc')->get_where('registration', array('accept_status' => 'pending'))->num_rows(),
			"acceptregcount" => $this->db->order_by('id', 'desc')->get_where('registration', array('accept_status' => 'accept'))->num_rows(),
			"rejectregcount" => $this->db->order_by('id', 'desc')->get_where('registration', array('accept_status' => 'reject'))->num_rows(),
			"feecount" => $this->db->order_by('id', 'desc')->get('fee_deposit')->num_rows(),
			"newfeecount" => $this->db->order_by('id', 'desc')->get_where('fee_deposit', array('accept_status' => 'new'))->num_rows(),
			"acceptfeecount" => $this->db->order_by('id', 'desc')->get_where('fee_deposit', array('accept_status' => 'accept'))->num_rows(),
			"rejectfeecount" => $this->db->order_by('id', 'desc')->get_where('fee_deposit', array('accept_status' => 'reject'))->num_rows(),
			"couponcount" => $this->db->order_by('id', 'desc')->get('tbl_coupon')->num_rows(),
			"fnl" => $this->db->get_where('final_year_project', array("status" => "true"))->num_rows(),
			"totalbatch" => $this->db->get('tbl_batch')->num_rows(),
			"totalteacher" => $this->db->get('tbl_teacher')->num_rows()
		);
	}
}
