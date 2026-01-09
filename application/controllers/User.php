<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	class User extends MY_Controller
	{
		
        function __construct()
		{
			parent::__construct();
			$this->load->library('CashfreePayment');
			$this->load->library('Common');
			
			// get session here 
			if (empty($this->session->get_userdata()['user'])) {
				$this->user_id = '';
				redirect(base_url('Home/UserLogin'));
				} else {
				$this->user_id = $this->session->userdata()['user']->id;
				$this->userdata = $this->session->userdata()['user'];
			}
		}
		
		public function Dashboard()
		{
            $this->load->view("User/Dashboard");			
		}
		
		public function Jobalert()
		{
			$data['job_details'] = $this->db->order_by('id', 'DESC')->get('job_details')->result();
            $this->load->view("User/Jobalert",$data);			
		}
		
		public function Syllabus()
		{
            $this->load->view("User/Syllabus");			
		}
		public function ManageTest(){
			$currentuser = $this->db->get_where('registration', ['id' => $this->user_id])->row();
			$data['currentnumber'] = $currentuser->mobile;
			$data['currentname'] = $currentuser->student_name;
			$this->load->view("User/ManageTest",$data);
		}
		
		public function IdCard()
		{
			$data['idcard'] = $this->db->get_where('registration',['id'=>$this->user_id])->row();
            $this->load->view("User/IdCard",$data);			
		}
		
		
		
		public function Internship()
		{
			$data['internship'] = $this->db->get_where('registration',['id'=>$this->user_id])->row();
            $this->load->view("User/Internship",$data);			
		}
		public function Summer()
		{
			$data['summer'] = $this->db->get_where('registration',['id'=>$this->user_id])->row();
            $this->load->view("User/Summer",$data);			
		}
		
		public function Managefee() {
			$currentuser = $this->db->get_where('registration', ['id' => $this->user_id])->row();
			$currentuserid = $currentuser->mobile;
			$latest_fee = $this->db
			->order_by('id', 'desc')
			->get_where('fee_deposit', [
            'accept_status' => 'accept',
            'txn_status' => 'PAID',
            'status' => 'true',
            'reg_id' => $currentuserid
            // 'reg_id' => '144'
			])
			->row();
			$data['latest_due_amount'] = !empty($latest_fee) ? $latest_fee->due_amount : '0';
			$data['feedata'] = $this->db
			->order_by('id', 'desc')
			->get_where('fee_deposit', [
			
			'reg_id' => $currentuserid
			])
			->result();
			
			$this->load->view("User/Managefee", $data);
		}
		
		public function PaybyStudent() {
			// Ensure only POST requests are allowed
			if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
				$this->session->set_flashdata('error', 'Invalid request method. Only POST requests are allowed.');
				redirect(base_url('payment/form'));  // Redirect to the payment form or relevant page
				return;
			}
			
			$mobile = $this->input->post('mobile');  
			$reg_id = $this->input->post('reg_id');  
			$totalFeeRemaining = $this->input->post('totalFeeRemaining');  
			
			// Validate the inputs
			if (empty($mobile) && (empty($reg_id) || empty($totalFeeRemaining))) {
				$this->session->set_flashdata('error', 'Invalid data received. Please check your input.');
				redirect(base_url('payment/form'));
				return;
			}
			
			// Fetch student data
			$studentdata = $this->db->query("SELECT * FROM fee_deposit WHERE mobile = ? OR reg_id = ?", [$mobile, $reg_id])->row();
			
			if (!$studentdata) {
				$this->session->set_flashdata('error', 'Student data not found.');
				redirect(base_url('payment/form'));
				return;
			}
			
			$userid = $studentdata->userid ?? '';
			$reg_id = $studentdata->reg_id ?? '';
			$txnid = time() . rand(1000, 9999);
			
			$data_arr = [
			"txn_id" => $txnid,
			"userid" => $userid,
			"reg_id" => $reg_id,
			"student_name" => $studentdata->student_name,
			"mobile" => $mobile,
			"amount" => $totalFeeRemaining,
			"application_for" => $studentdata->application_for,
			"technology" => $studentdata->technology,
			"course" => $studentdata->course,
			"year" => $studentdata->year,
			"due_amount" => "0",
			"paid_to" => "",
			"college" => $studentdata->college,
			"today_date" => $this->data['date'],
			"account_of" => "SELF",
			"sr_number" => "",
			"payment_mode" => "ONLINE",
			"include" => "",
			"authorization" => "Digicoders Tech",
			"status" => 'true',
			"txn_status" => "pending",
			"date" => $this->data['date'],
		"time" => $this->data['time'],
		"accept_status" => 'new',
		];
		
		if ($this->db->insert('fee_deposit', $data_arr)) {
		$insert_id = $this->db->insert_id();
		$data_arr = $this->db->get_where('fee_deposit', ['id' => $insert_id])->row();
		$txnid = $this->session->set_userdata('txn_id', $txnid);
		$data_arr->email = "digicoders@example.com";
		
		// Generate the payment link
		$link = $this->cashfreepayment->GetPaymentLink(
		$data_arr,
		base_url("User/StudentPaymentResponse") . "?order_id={order_id}&order_token={order_token}"
		);
		
		$this->session->set_flashdata('success', 'Payment processed successfully. Follow the link to complete payment.');
		$this->session->set_flashdata('payment_link', $link);
		} else {
		$this->session->set_flashdata('error', 'Failed to insert payment data. Please try again.');
		}
		
		redirect(base_url('payment/form'));
		}
		
		
		public function StudentPaymentResponse()
		{
		// Get Casfree new response using library
		if (isset($_REQUEST['order_id']))
		{
		$order_id = $_REQUEST['order_id'];
		$response = $this->cashfreepayment->CheckOrderStatus($order_id);
		
		
		
		if ($response->order_status == "PAID")
		{
		// $paymentMode = "";
		$txnid = $this->session->userdata('txn_id');
		
		$orderId = $response->order_id;
		
		$orderAmount = $response->order_amount;
		
		$referenceId = $response->cf_order_id;
		
		$txStatus = $response->order_status;
		
		$txn_date_time = $this->data['date'] . " " . $this->data['time'];
		
		$data_where = array("txn_id" => $txnid);
		$query = $this->db->get_where('fee_deposit', $data_where)->row();
		
		
		
		$insert_arr = array(
		"orderId" => $orderId,
		"amount" => $orderAmount,
		"referenceId" => $referenceId,
		"response_bundle" => json_encode($response),
		"txn_status" => $txStatus,
		"txn_date_time" => $txn_date_time,
		);
		
		
		
		if ($this->db->where('txn_id', $txnid)->update('fee_deposit', $insert_arr))
		{
		$this->session->set_flashdata("status", "success");
		$this->session->set_flashdata("msg", "Payment Success");
		// $data['userdata'] = $this->db->get_where('registration', array("txn_id" => $txnid))->row();
		// $data['grouplink'] = $this->db->get('whatsapp_group')->row();
		redirect(base_url('User/Managefee'));
		}
		else
		{
		$this->session->set_flashdata("status", "error");
		$this->session->set_flashdata("msg", "Something Went Wrong");
		redirect(base_url('User/Managefee'));
		}
		}
		else
		{
		$response->order_status = "FAILED";
		
		// $paymentMode = "";
		$txnid = $this->session->userdata('txn_id');
		$orderId = $response->order_id;
		$orderAmount = $response->order_amount;
		$referenceId = $response->cf_order_id;
		$txStatus = $response->order_status;
		$txn_date_time = $this->data['date'] . " " . $this->data['time'];
		$data_where = array("txn_id" => $txnid);
		$query = $this->db->get_where('fee_deposit', $data_where)->row();
		$payRes = [
		"orderId" => $orderId,
		"amount" => $orderAmount,
		"referenceId" => $referenceId,
		"txn_status" => $txStatus,
		"txTime" => $txn_date_time,
		];
		
		$insert_arr = array(
		"orderId" => $orderId,
		"amount" => $orderAmount,
		"referenceId" => $referenceId,
		"response_bundle" => json_encode($response),
		"txn_status" => $txStatus,
		"txn_date_time" => $txn_date_time,
		);
		
		if ($this->db->where('txn_id', $txnid)->update('fee_deposit', $insert_arr))
		{
		
		$payment_url = $response->payment_link;
		$data['payment_url']=$payment_url;
		$this->load->view('Home/Paymentfaild',$data);
		
		
		
		}
		else
		{
		echo "something Went Wrong";
		}
		}
		}
		else
		{
		echo "Something went wrong!";
		}
		}
		
		
		
		
		
		public function Assignment()
		{
		$currentuser = $this->db->get_where('registration', ['id' => $this->user_id])->row();
		$currentid = $currentuser->id;
		
		$batches = $this->db->get('tbl_batch')->result();
		$userBatches = [];
		
		foreach ($batches as $batch) {
		$studentIds = explode(',', $batch->student_id);
		if (in_array($currentid, $studentIds)) {
		$userBatches[] = $batch; 
		}
		}
		
		$batchIds = array_map(function ($batch) {
		return $batch->id;
		}, $userBatches);
		if (!empty($batchIds)) {
		$this->db->where_in('batch_id', $batchIds);
		$assignment = $this->db->order_by('id', 'DESC')->get('tbl_assignment')->result();
		} else {
		$assignment = []; 
		}
		
		$data['assignment'] = $assignment;
		$this->load->view("User/Assignment", $data);
		}
		
		// Update Profile 
		public function UpdateProfile()
		{
		if ($this->uri->segment(3) == TRUE) 
		{
		$action = $this->uri->segment(3);
		if ($action == 'Code')
		{
		$userdata = $this->db->get_where('registration', array('id' => $this->user_id))->row();
		$old_img = $userdata->image;
		$upload_status = 'false';
		$filename = $old_img;
		
		if (!empty($_FILES['image']['name'])) {
		$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
		$filename = md5(time()) . "_profile." . $ext;
		
		$config['upload_path'] = './public/uploads/profile_photo/'; 
		$config['allowed_types'] = 'jpg|png|jpeg|pdf';
		$config['max_size'] = 9024;
		$config['file_name'] = $filename;
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if ($this->upload->do_upload('image')) {
		$upload_status = 'true'; 
		} else {
		$upload_error = $this->upload->display_errors();
		$this->session->set_flashdata('res', 'error');
		$this->session->set_flashdata('msg', 'File upload failed: ' . $upload_error);
		}
		}
		
		$data_arr = array(
		"image" => $filename,
		"student_name" => $this->input->post('student_name')
		);
		
		if ($upload_status == 'true') 
		{
		if ($this->db->where('id', $userdata->id)->update('registration', $data_arr)) 
		{
		if (!empty($_FILES['image']['name'])) {
		unlink('./public/uploads/profile/' . $old_img); 
		}
		
		// Set success flashdata message
		$this->session->set_flashdata('res', 'success');
		$this->session->set_flashdata('msg', 'Profile successfully updated! Your changes have been saved.');
		} else {
		// Set error flashdata message
		$this->session->set_flashdata('res', 'error');
		$this->session->set_flashdata('msg', 'Something went wrong with the database update.');
		}
		}
		
		redirect('User/UpdateProfile'); 
		}   
		} 
		else 
		{
		$data['profile'] = $this->db->get_where('registration', ['id' => $this->user_id])->row();
		$this->load->view("User/UpdateProfile", $data);
		}
		}
		
		
		
		
		
		
		
		
		
		
		// Logout 
		public function Logout()
		{
		$user_id = $this->user_id;
		$update = [
		'is_status' => 'false',
		'is_login' => 'false',
		'logout_at' => date('Y-m-d H:i:s')
		];
		$up = $this->db->where('id', $user_id)->update('registration', $update);
		if ($up) {
		$this->session->unset_userdata('user');
		$this->session->set_flashdata(['res' => 'success', 'msg' => 'Logout Successfully']);
		redirect(base_url('Home/UserLogin'));
		}
		}
		
		// Change Password
		public function ChangePassword()
		{
		if ($this->uri->segment(3) == TRUE) {
		$action = $this->uri->segment(3);
		if ($action == 'Code') {
		$opass = $this->input->post("opass");
		$npass = $this->input->post("npass");
		$cpass = $this->input->post("cpass");
		$user_id = $this->user_id;
		
		$query = $this->db->get_where("registration", ['id' => $user_id]);
		
		if ($query->num_rows() > 0) {
		$result = $query->row();
		if ($result->password == $opass) {
		if ($npass == $cpass) {
		$up = $this->db->where('id', $user_id)->update('registration', ['password' => $npass]);
		if ($up) {
		$this->session->set_flashdata(['res' => 'success', 'msg' => 'Password Changed Successfully']);
		redirect(base_url('User/ChangePassword'));
		} else {
		$this->session->set_flashdata(['res' => 'error', 'msg' => 'Something Went Wrong']);
		redirect(base_url('User/ChangePassword'));
		}
		} else {
		$this->session->set_flashdata(['res' => 'error', 'msg' => 'New and Confirm Passwords Do Not Match']);
		redirect(base_url('User/ChangePassword'));
		}
		} else {
		$this->session->set_flashdata(['res' => 'error', 'msg' => 'Old Password is Incorrect']);
		redirect(base_url('User/ChangePassword'));
		}
		} else {
		$this->session->set_flashdata(['res' => 'error', 'msg' => 'User Not Found']);
		redirect(base_url('User/ChangePassword'));
		}
		}
		} else {
		$this->load->view("User/ChangePassword");
		}
		}
		
		
		
		
		
		
		// end here 
		}
		?>																																									