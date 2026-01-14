<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('CashfreePayment');
		$this->load->library('Common');
		$this->load->model('Seo_model');

		$states = $this->Seo_model->getStates();

		if (!empty($states)) {
			foreach ($states as $state) {
				$state->cities = $this->Seo_model
					->getCitiesByState($state->state_name);
			}
		}


		$data['cities'] = $this->Seo_model->get_active_cities_with_pages();
		$data['services'] = $this->db->order_by('id', 'desc')->get('seo_pages')->result();
		$allservice = $this->db
			->select('course_name as service_name, url_slug')
			->where('status', 'true')
			->group_by('course_name')
			->get('seo_pages')
			->result();

		// ✅ SERVICES (tooltip ke liye)
		$services = $this->Seo_model->getServices();

		// ✅ FOOTER KE LIYE GLOBAL VARIABLES
		$this->load->vars([
			'states' => $states,
			'services' => $services,
			'allservice' => $allservice,

		]);
	}


	public function TestCode()
	{
		// Fetch all records from the registration table
		$res = $this->db->query("SELECT * FROM registration")->result();

		// Check if records exist before proceeding
		if (!empty($res)) {
			foreach ($res as $row) {
				$this->db->set('password', $row->mobile);
				$this->db->where('id', $row->id);
				$this->db->update('registration');
			}
			echo "Password updated successfully with mobile numbers!";
		} else {
			echo "No records found in the registration table.";
		}
		echo "<pre>";
		var_dump($res);
	}

	public function Test()
	{
		// $res = $this->db->query("select * from modal where status='true'")->result();;
		// $res = $this->db->query("select * from admin_login")->result();
		// $res = $this->db->query("select * from tbl_coupon")->result();
		// $res = $this->db->query("select * from tbl_attendance")->result();
		// $res = $this->db->query("select * from intern")->result();
		// $res = $this->db->query("select * from tbl_assignment")->result();
		// $res = $this->db->query("DELETE FROM `fee_deposit` WHERE `id` = 70");
		echo "<pre>";
		var_dump($res);
	}



	// User Login Here 
	public function UserLogin()
	{
		$this->load->view('User/index');
	}

	// submit here 
	public function UserLoginSubmit()
	{
		$mobile = $this->input->post("mobile");
		$password = $this->input->post("password");

		// Check if the user exists in the tbl_users table
		$check = $this->db->query("SELECT * FROM registration WHERE mobile='$mobile'");

		if ($check->num_rows()) {
			$row = $check->row();

			// Check if the password matches
			if ($password == $row->password) {
				$update = [
					'is_status' => 'true',
					'is_login' => 'true',
					'login_at' => date('Y-m-d H:i:s')
				];

				// Update the login status in the database
				$up = $this->db->where('id', $row->id)->update('registration', $update);

				if ($up) {
					// Set session data
					$this->session->set_userdata('user', $row);
					$this->session->set_flashdata(['res' => 'success', 'msg' => 'Logged In Successfully!']);
					redirect(base_url('User/Dashboard'));
				} else {
					$this->session->set_flashdata(['res' => 'error', 'msg' => 'Login Failed!']);
					redirect(base_url('Home/UserLogin'));
				}
			} else {
				$this->session->set_flashdata(['res' => 'error', 'msg' => 'Password Not Matched']);
				redirect(base_url('Home/UserLogin'));
			}
		} else {
			$this->session->set_flashdata(['res' => 'error', 'msg' => 'Mobile Not Matched']);
			redirect(base_url('Home/UserLogin'));
		}
	}




	// Admin Login 
	public function Login()
	{
		$this->load->view('Admin/Index');
	}


	# Admin Login
	public function Auth()
	{
		if ($this->uri->segment(3)) {
			if ($this->uri->segment(3) == 'authentication' && $this->input->is_ajax_request()) {
				$this->form_validation->set_rules('email', 'Email', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');

				if ($this->form_validation->run() == false) {
					echo "validation Failed";
				} else {
					$email = $this->input->post("email");
					$password = $this->input->post("password");
					$password = md5($password);

					$url = $this->input->post("url");
					$query = $this->db->get_where('admin_login', array("email" => $email));
					if ($query->num_rows() > 0) {
						$result = $query->row();
						if ($result->password == $password) {
							$data_arr = array(
								"login_date" => $this->data['date'],
								"login_time" => $this->data['time'],
								"status" => 'true'
							);
							if ($this->db->where('email', $result->email)->update('admin_login', $data_arr)) {
								##maintain login Histroy
								# Login Login Library and get all the system details
								$this->load->library('LoginDetails');
								$ip = $this->logindetails->get_ip();
								$mac = $this->logindetails->get_mac();
								$os = $this->logindetails->get_os();
								$useragent = $this->logindetails->get_useragent();
								$username = $this->logindetails->get_username();

								# Create array for login details insertion
								$logindetails_data = array(
									"LoginID" => $result->id,
									"IP" => $ip,
									"MAC" => $mac,
									"UserName" => $username,
									"BrowserName" => $useragent,
									"OSName" => $os,
									"Date" => $this->data['date'],
									"Time" => $this->data['time']
								);
								# Save login details
								// $this->security->xss_clean($logindetails_data);


								$this->db->insert("tbl_adminlogindetails", $logindetails_data);
								##login Histroy

								$this->session->set_userdata("AdminEmail", $email);
								$this->session->set_userdata("AdminID", $result->id);
								$this->session->set_userdata("admin_type", $result->admin_type);

								echo json_encode(array("status" => "success", "msg" => "", "title" => "Welcome To Dashboard.", "reload" => "false", "redirect" => 'true', "redirectLink" => base_url('Admin/Dashboard')));
							}
						} else {
							echo json_encode(array("status" => "error", "msg" => "Please enter valid email address.", "title" => "Try ! Again ,  Invalid Password.", "reload" => "false", "redirect" => 'false'));
						}
					} else {
						echo json_encode(array("status" => "error", "msg" => "Please enter valid email address.", "title" => "Invalid Login ID.", "reload" => "false", "redirect" => 'false'));
					}

					// end of else 
				}
			}
		}
	}


	// Save Firebase FCM Device Token(Registration ID)
	public function SaveFireabseFCMToken()
	{

		$token = $this->input->post("push_token");

		$sql1 = $this->db->get_where("web_fcm_token", ["token" => $token]);

		if ($sql1->num_rows() == 0) {

			$insertData = array(
				"token" => $token,
				"status" => "true",
				"datetime" => date("d-m-Y h:i:sa")
			);

			$sql2 = $this->db->insert("web_fcm_token", $insertData);

			if ($sql2) {
				echo "Token Saved to Server";
			} else {
				echo "Failed to store token on Server";
			}

		}


	}

	public function Interviewqns()
	{
		$this->load->view("Home/Interviewqns");
	}

	public function PayNow()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Pay') {
					$this->form_validation->set_rules('ApplicationFor', 'Application For', 'required');
					$this->form_validation->set_rules('Technology', 'Technology', 'required');
					$this->form_validation->set_rules('student_training_location', 'Student Training Location', 'required');
					$this->form_validation->set_rules('Course', 'Course', 'required');
					$this->form_validation->set_rules('Year', 'Year', 'required');
					$this->form_validation->set_rules('Name', 'Name', 'required');
					$this->form_validation->set_rules('FatherName', 'Father Name', 'required');
					// $this->form_validation->set_rules('Email', 'Email', 'required');
					$this->form_validation->set_rules('Mobile1', 'Mobile Number', 'required');
					// $this->form_validation->set_rules('Mobile2', 'Alternate Mobile Number');
					$this->form_validation->set_rules('College', 'College', 'required');
					$this->form_validation->set_rules('Fee', 'Fee Type', 'required');
					$this->form_validation->set_rules('Amount', 'Amount', 'required');



					if ($this->form_validation->run() == false) {
						//  echo "validation err";
						$this->session->set_flashdata("status", "error");
						$this->session->set_flashdata("msg", "Validation Error");
						redirect(base_url('Home/Registration'));
					} else {
						if ($this->input->post('Mobile1') == '7394023582')
							$amount = 1;
						else
							$amount = $this->input->post('Amount');
						$code = $this->input->post('coupon');

						$count = $this->db->get_where("registration", ['couponcode' => $code])->num_rows();
						$coupondata = $this->db->order_by("id", "desc")->get_where('tbl_coupon', array('code' => $code, "max_use >" => $count, "status" => "true", "expiry_date >=" => $this->data['date']))->row();
						if (!empty($coupondata)) {
							$code = $code;
							$camount = $coupondata->amount;
						} else {
							$code = "";
							$camount = "";
						}
						if ($this->input->post('Amount') == '0') {

							// echo "insert without data";
							$txnid = time() . rand(1000, 9999);
							$userid = "DCT" . $txnid;

							$data_arr = array(
								// "txn_id" => $txnid,
								"userid" => $userid,
								"training_type" => $this->input->post('ApplicationFor'),
								"technology" => $this->input->post('Technology'),
								"student_training_location" => $this->input->post('student_training_location'),
								"student_name" => $this->input->post('Name'),
								"course" => $this->input->post('Course'),
								"father_name" => $this->input->post('FatherName'),
								"email" => $this->input->post('Email'),
								"edu_year" => $this->input->post('Year'),
								"college_name" => $this->input->post('College'),
								"mobile" => $this->input->post('Mobile1'),
								"alt_mobile" => $this->input->post('AltMobile'),
								"payment_type" => $this->input->post('Fee'),
								// "amount" => $this->input->post('Amount'),
								"amount" => $amount,
								"status" => 'true',
								"txn_status" => 'SUCCESS',
								"date" => $this->data['date'],
								"time" => $this->data['time'],
								"coupon_descount" => $camount,
								"couponcode" => $code,
							);
							// Verify reCAPTCHA

							// if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
							// 	$recaptchaResponse = $this->input->post('g-recaptcha-response');
							// 	$secretKey = "6LfHIQcrAAAAAMB4Lu5gemLfn7ug-dnOzCI8BUX2";
							// 	$verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
							// 	$responseData = json_decode($verifyResponse);

							// 	if (!$responseData->success) {
							// 		echo json_encode(['status' => false, 'message' => 'reCAPTCHA verification failed. Please try again.']);
							// 		return;
							// 	}






							if ($this->db->insert('registration', $data_arr)) {
								$data_arr = $this->db->insert_id();
								// $data_arr = $this->db->get_where('registration', array('id' => $data_arr))->row();
								//echo json_encode(array("status" => "success", "msg" => "Registration Success", "title" => "", "reload" => "true", "redirect" => 'false'));

								$this->session->set_flashdata("status", "success");
								$this->session->set_flashdata("msg", "Payment Success");
								$data['userdata'] = $this->db->get_where('registration', array("id" => $data_arr))->row();
								$data['grouplink'] = $this->db->get('whatsapp_group')->row();
								$this->load->view('Home/FeeReciept', $data);
								return;


							} else {
								// echo "something Went Wrong";
								echo json_encode(array("status" => "error", "msg" => "Error", "title" => "Something Went Wrong", "reload" => "true", "redirect" => 'false'));
							}
						} else {
							$txnid = time() . rand(1000, 9999);
							$userid = "DCT" . $txnid;
							$data_arr = array(
								"txn_id" => $txnid,
								"userid" => $userid,
								"training_type" => $this->input->post('ApplicationFor'),
								"technology" => $this->input->post('Technology'),
								"student_name" => $this->input->post('Name'),
								"student_training_location" => $this->input->post('student_training_location'),
								"course" => $this->input->post('Course'),
								"father_name" => $this->input->post('FatherName'),
								"email" => $this->input->post('Email'),
								"edu_year" => $this->input->post('Year'),
								"college_name" => $this->input->post('College'),
								"mobile" => $this->input->post('Mobile1'),
								"alt_mobile" => $this->input->post('AltMobile'),
								"payment_type" => $this->input->post('Fee'),
								"amount" => $amount,
								"status" => 'true',
								"txn_status" => 'PENDING',
								"date" => $this->data['date'],
								"time" => $this->data['time'],
								"coupon_descount" => $camount,
								"couponcode" => $code,
							);

							if ($this->db->insert('registration', $data_arr)) {
								$data_arr = $this->db->insert_id();
								$data_arr = $this->db->get_where('registration', array('id' => $data_arr))->row();
								$txnid = $this->session->set_userdata('txn_id', $txnid);
								// redirect(base_url('Home/PaymentProcess'));
								$link = $this->cashfreepayment->GetPaymentLink($data_arr, base_url("Home/PaymentResponse") . "?order_id={order_id}&order_token={order_token}");
								return $link;
							} else {
								// echo "something Went Wrong";
								echo json_encode(array("status" => "error", "msg" => "Error", "title" => "Something Went Wrong", "reload" => "true", "redirect" => 'false'));
							}
						}

						//end else
					}
				}
				if ($this->uri->segment(3) == 'PayV2') {

					$this->form_validation->set_rules('Name', 'Name', 'required');
					$this->form_validation->set_rules('Email', 'Email', 'required');
					$this->form_validation->set_rules('Mobile', 'Mobile Number', 'required');
					$this->form_validation->set_rules('Mobile1', 'Alternate Mobile Number');
					$this->form_validation->set_rules('College', 'College', 'required');
					// $this->form_validation->set_rules('ProjectTopic', 'Project Topic', 'required');
					$this->form_validation->set_rules('Technology', 'Technology', 'required');
					$this->form_validation->set_rules('Branch', 'Branch', 'required');
					$this->form_validation->set_rules('Year', 'Year', 'required');
					$this->form_validation->set_rules('ProjectType', 'Project Type', 'required');
					$this->form_validation->set_rules('PaymentType', 'Payment Type', 'required');
					$this->form_validation->set_rules('Amount', 'Amount', 'required');
					if ($this->form_validation->run() == false) {
						$this->session->set_flashdata("status", "error");
						$this->session->set_flashdata("msg", "Validation Error");
						redirect(base_url('Home/FinalYearProject'));
					} else {
						$patmentType = $this->input->post('PaymentType');

						if ($patmentType == "I will pay later") {

							$data_arr = array(
								"txn_id" => time() . rand(100, 999),
								"userid" => rand(100, 900),
								"student_name" => $this->input->post('Name'),
								"email" => $this->input->post('Email'),
								"mobile" => $this->input->post('Mobile'),
								"alt_mobile" => $this->input->post('Mobile1'),
								"college" => $this->input->post('College'),
								"project_topic" => $this->input->post('ProjectTopic'),
								"technology" => $this->input->post('Technology'),
								"branch" => $this->input->post('Branch'),
								"year" => $this->input->post('Year'),
								"project_type" => $this->input->post('ProjectType'),
								"payment_type" => $this->input->post('PaymentType'),
								"amount" => $amount,
								"status" => 'true',
								"txn_status" => 'PENDING',
								"date" => $this->data['date'],
								"time" => $this->data['time'],
								"coupon_descount" => $camount,
								"couponcode" => $code,
							);
							// var_dump($data_arr);
							// die();
							if ($this->db->insert('final_year_project', $data_arr)) {
								$this->session->set_flashdata("status", "success");
								$this->session->set_flashdata("msg", "Payment Success");
								redirect(base_url('Home/FinalYearProject'));
							} else {
								$this->session->set_flashdata("status", "error");
								$this->session->set_flashdata("msg", "Something Went Wrong");
								redirect(base_url('Home/FinalYearProject'));
							}
						} else {

							$txnid = time() . rand(1000, 9999);
							$userid = "DCT" . $txnid;
							$data_arr = array(
								"txn_id" => $txnid,
								"userid" => $userid,
								"student_name" => $this->input->post('Name'),
								"email" => $this->input->post('Email'),
								"mobile" => $this->input->post('Mobile'),
								"alt_mobile" => $this->input->post('Mobile1'),
								"college" => $this->input->post('College'),
								"project_topic" => $this->input->post('ProjectTopic'),
								"technology" => $this->input->post('Technology'),
								"branch" => $this->input->post('Branch'),
								"year" => $this->input->post('Year'),
								"project_type" => $this->input->post('ProjectType'),
								"payment_type" => $this->input->post('PaymentType'),
								"amount" => $amount,
								"status" => 'true',
								"date" => $this->data['date'],
								"time" => $this->data['time'],
								"coupon_descount" => $camount,
								"couponcode" => $code,
							);
							if ($this->db->insert('final_year_project', $data_arr)) {
								$last_id = $this->db->insert_id();
								$data_arr = $this->db->get_where('final_year_project', array('id' => $last_id))->row();
								$txnid = $this->session->set_userdata('txn_id', $txnid);
								$id = $this->session->set_userdata('id', $last_id);
								// redirect(base_url('Home/PaymentProcess'));
								$link = $this->cashfreepayment->GetPaymentLink($data_arr, base_url("Home/PaymentResponseV2") . "?order_id={order_id}&order_token={order_token}");
								return $link;
							} else {
								// echo "something Went Wrong";
								echo json_encode(array("status" => "error", "msg" => "Error", "title" => "Something Went Wrong", "reload" => "true", "redirect" => 'false'));
							}
						}
					}
				}
			}
		}
	}





	public function PaymentResponse()
	{
		// Get Casfree new response using library
		if (isset($_REQUEST['order_id'])) {
			$order_id = $_REQUEST['order_id'];
			$response = $this->cashfreepayment->CheckOrderStatus($order_id);

			if ($response->order_status == "PAID") {
				// $paymentMode = "";
				$txnid = $this->session->userdata('txn_id');
				$orderId = $response->order_id;
				$orderAmount = $response->order_amount;
				$referenceId = $response->cf_order_id;
				$txStatus = $response->order_status;
				$txn_date_time = $this->data['date'] . " " . $this->data['time'];
				$data_where = array("txn_id" => $txnid);
				$query = $this->db->get_where('registration', $data_where)->row();

				$insert_arr = array(
					"orderId" => $orderId,
					"amount" => $orderAmount,
					"referenceId" => $referenceId,
					"response_bundle" => json_encode($response),
					"txn_status" => $txStatus,
					"txn_date_time" => $txn_date_time,
				);

				if ($this->db->where('txn_id', $txnid)->update('registration', $insert_arr)) {
					$this->session->set_flashdata("status", "success");
					$this->session->set_flashdata("msg", "Payment Success");
					$data['userdata'] = $this->db->get_where('registration', array("txn_id" => $txnid))->row();
					$data['grouplink'] = $this->db->get('whatsapp_group')->row();
					$this->load->view('Home/FeeReciept', $data);
				} else {
					$this->session->set_flashdata("status", "error");
					$this->session->set_flashdata("msg", "Something Went Wrong");
					redirect(base_url('Home/Registration'));
				}
			} else {
				$response->order_status = "FAILED";

				// $paymentMode = "";
				$txnid = $this->session->userdata('txn_id');
				$orderId = $response->order_id;
				$orderAmount = $response->order_amount;
				$referenceId = $response->cf_order_id;
				$txStatus = $response->order_status;
				$txn_date_time = $this->data['date'] . " " . $this->data['time'];
				$data_where = array("txn_id" => $txnid);
				$query = $this->db->get_where('registration', $data_where)->row();
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

				if ($this->db->where('txn_id', $txnid)->update('registration', $insert_arr)) {

					$payment_url = $response->payment_link;
					$data['payment_url'] = $payment_url;
					$this->load->view('Home/Paymentfaild', $data);



				} else {
					echo "something Went Wrong";
				}
			}
		} else {
			echo "Something went wrong!";
		}
	}

	public function PaymentResponseV2()
	{
		// Get Casfree new response using library
		if (isset($_REQUEST['order_id'])) {
			$order_id = $_REQUEST['order_id'];
			$response = $this->cashfreepayment->CheckOrderStatus($order_id);

			if ($response->order_status == "PAID") {
				// $paymentMode = "";

				$txnid = $this->session->userdata('txn_id');
				$id = $this->session->userdata('id');
				$orderId = $response->order_id;
				$orderAmount = $response->order_amount;
				$referenceId = $response->cf_order_id;
				$txStatus = $response->order_status;
				$txn_date_time = $this->data['date'] . " " . $this->data['time'];
				$data_where = array("txn_id" => $txnid);
				$query = $this->db->get_where('final_year_project', $data_where)->row();
				;
				$insert_arr = array(
					"orderId" => $orderId,
					"amount" => $orderAmount,
					"referenceId" => $referenceId,
					"response_bundle" => json_encode($response),
					"txn_status" => $txStatus,
					"txn_date_time" => $txn_date_time,
				);
				// var_dump($insert_arr);
				// die();

				if ($this->db->where('txn_id', $txnid)->update('final_year_project', $insert_arr)) {
					//   echo "payment Success";
					$this->session->set_flashdata("status", "success");
					$this->session->set_flashdata("msg", "Payment Success");
					// redirect(base_url('Home/FinalYearProject'));
					$data['userdata'] = $this->db->get_where('final_year_project', array("txn_id" => $txnid))->row();
					$data['grouplink'] = $this->db->get('whatsapp_group')->row();
					$this->load->view('Home/ProjectReciept', $data);
				} else {
					$this->session->set_flashdata("status", "error");
					$this->session->set_flashdata("msg", "Something Went Wrong");
					redirect(base_url('Home/FinalYearProject'));
					// echo "something Went Wrong";
					// echo json_encode(array("status" => "error", "msg" => "Error", "title" => "Something Went Wrong", "reload" => "false", "redirect" => 'false'));
				}
			} else {
				$response->order_status = "FAILED";
				// $paymentMode = "";
				$txnid = $this->session->userdata('txn_id');
				$orderId = $response->order_id;
				$orderAmount = $response->order_amount;
				$referenceId = $response->cf_order_id;
				$txStatus = $response->order_status;
				$txn_date_time = $this->data['date'] . " " . $this->data['time'];
				$data_where = array("txn_id" => $txnid);
				$query = $this->db->get_where('final_year_project', $data_where)->row();
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

				if ($this->db->where('txn_id', $txnid)->update('final_year_project', $insert_arr)) {

					$payment_url = $response->payment_link;
					?>
					<a href="<?= $payment_url ?>">Payment Faild. If you want to payment Please Proceed..</a>;
					<?php
				} else {
					echo "something Went Wrong";
				}
			}
		} else {
			echo "Something went wrong!";
		}
	}

	public function index()
	{
		$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('review', array('status' => 'true'), 10)->result();
		$data['banner'] = $this->db->order_by('id', 'desc')->get_where('banner', array('status' => 'true'))->result();
		$data['placment'] = $this->db->order_by('id', 'desc')->limit(10)->get_where('placement', array('status' => 'true'), 10)->result();
		$data['banner_place'] = $this->db->query("select * from placement where banner='banner' and status='true' order by id desc limit 10")->result();
		$data['modal'] = $this->db->query("select * from modal where status='true'")->result();
		$data['usedata'] = $this->db->order_by('id', 'desc')->get_where('teamexpert', array("status" => "true"))->result();
		// $this->load->view('Admin/expert', $data);
		$data['cities'] = $this->Seo_model->get_active_cities_with_pages();
		$data['modal_num'] = $this->db->query("select * from modal where status='true'")->num_rows();
        $data['sliderdata'] = $this->db->order_by('id','desc')->get_where('slider',array('status'=>'true'))->result();
		$this->load->view('Home/Index', $data);
	}
	public function Webinars()
	{

		$data['upcoming'] = $this->db->order_by('id', 'desc')->get_where('webinar', array('status' => 'true', "complete_status" => 'false'))->result();
		$data['completed'] = $this->db->order_by('id', 'desc')->get_where('webinar', array('status' => 'true', "complete_status" => "true"))->result();
		$this->load->view('Home/Webinars', $data);
	}
	public function Webinar()
	{
		if ($this->uri->segment(3)) {
			$id = $this->uri->segment(3);

			$data['userdata'] = $this->db->get_where('webinar', array("id" => $id))->row();
			$data['banner'] = $this->db->order_by('id', 'desc')->get_where('banner', array("status" => "true"))->result();
			$data['review'] = $this->db->order_by('id', 'desc')->get_where('review', array('status' => 'true'))->result();
			$this->load->view('Home/Webinar', $data);
		}
	}

	## Webinar Registration
	public function WebinarReg()
	{
		// $this->form_validation->set_rules('name', 'Name', 'required');
		// $this->form_validation->set_rules('webinar_id', 'Webinar Id', 'required');
		// $this->form_validation->set_rules('email', 'Email ID', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile No', 'is_unique[webinar_registration.mobile]');
		if ($this->form_validation->run() == false) {
			echo json_encode(array("status" => "error", "msg" => "Try Again , Mobile No. Exist", "title" => "Try Again , Mobile No. Exist", "reload" => "false", "redirect" => 'false'));
		} else {
			$data_arr = array(
				"webinar_id" => $this->input->post('webinar_id'),
				"name" => $this->input->post('name'),
				"email" => $this->input->post('email'),
				"mobile" => $this->input->post('mobile'),
				"status" => 'true',
				"date" => $this->data['date'],
				"time" => $this->data['time']
			);
			if ($this->db->insert('webinar_registration', $data_arr)) {
				echo json_encode(array("status" => "success", "msg" => "Webinar Registration Success", "title" => "", "reload" => "false", "redirect" => 'false'));
			} else {
				echo json_encode(array("status" => "error", "msg" => "Something Went Wrong ", "title" => "", "reload" => "false", "redirect" => 'false'));
			}
		}
	}

	public function About()
	{
		$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('review', array('status' => 'true'))->result();
		$this->load->view('Home/About', $data);
	}
	public function OurExpert()
	{
		$data['userdata'] = $this->db->order_by('sequence', 'asc')->get_where('expert', array('status' => 'true'))->result();
		$data['interndata'] = $this->db->order_by('sequence', 'asc')->get_where('intern', array('status' => 'true'))->result();
		$this->load->view('Home/OurExpert', $data);
	}
	public function Appreciation()
	{
		$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('appreciation', ['status' => 'true'])->result();
		$this->load->view('Home/Appreciation', $data);
	}

	public function MOU()
	{
		$data['userdata'] = $this->db->order_by('id', 'asc')->get_where('mou', array('status' => 'true'))->result();
		// echo "<pre>";
		// print_r($data);
		// die();
		$this->load->view('Home/MOU', $data);
	}
	public function Achievement()
	{
		$data['userdata'] = $this->db->order_by('id', 'asc')->get_where('achievemens', array('status' => 'true'))->result();
		$this->load->view('Home/Achievement', $data);
	}
	public function VocationalTraining()
	{
		$this->load->view('Home/VocationalTraining');
	}
	public function SummerTraining()
	{
		$this->load->view('Home/SummerTraining');
	}
	public function training_photo()
	{
		$this->load->view('Home/training_photo');
	}

	public function Digicoders_campus()
	{
		$this->load->view('Home/Digicoders_campus');
	}

	public function video_gallery()
	{
		$this->load->view('Home/video_gallery');
	}
	public function OfficeTour()
	{
		$this->load->view('Home/OfficeTour');
	}

	public function Python_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Python_training_in_lucknow_in_digicoder.php');
	}
	public function WinterTraining()
	{
		$this->load->view('Home/WinterTraining');
	}

	public function Team_DigiCoders()
	{
		$this->load->view('Home/Team_DigiCoders');
	}

	public function PrivacyPolicy()
	{
		$this->load->view('Home/PrivacyPolicy');
	}
	public function term_condition()
	{
		$this->load->view('Home/term_condition');
	}
	public function refund_policy()
	{
		$this->load->view('Home/refund_policy');
	}

	public function c_programing_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/c_programing_trening_in_lucknow_in_digicoder');
	}
	public function Flutter_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/flutter');
	}
	public function Ajax_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/ajax');
	}
	public function HiberNate_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Hibernate');
	}
	public function MONGO_DB_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/MONGO_DB');
	}
	public function Express_JS_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Express_JS');
	}
	public function NODE_JS_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/NODE_JS');
	}
	public function Android_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Android');
	}
	public function HTML_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/HTML');
	}
	public function JDBC_SERVLET_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/JDBC_SERVLET');
	}
	public function Mern_Stack_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Mern_Stack');
	}
	public function Java_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Java');
	}
	public function Net_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Net');
	}
	public function Angular_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Angular');
	}
	public function Bootstrap_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Bootstrap');
	}
	public function Codeigniter_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Codeigniter');
	}
	public function Css_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Css');
	}
	public function Django_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Django');
	}
	public function placement()
	{
		$data['banner'] = $this->db->query("select * from placement where banner='banner' and status='true' order by id desc")->result();
		$data['placeement'] = $this->db->query("select * from placement where banner='placement' and status='true'")->result();
		// $data['userdata'] = $this->db->order_by('id', 'desc')->get_where('placement')->result();
		$this->load->view('Home/placement', $data);
	}
	public function JavaScript_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/JavaScript');
	}
	public function JQuery_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/JQuery');
	}
	public function JSON_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/JSON');
	}
	public function Laravel_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Laravel');
	}
	public function Asp_Net_MVC_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Asp_Net_MVC');
	}
	public function MySql_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/MySql');
	}
	public function ADO_NET_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/ADO_NET');
	}
	public function Oracle_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Oracle');
	}
	public function React_Js_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/React_Js');
	}
	public function Spring_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Spring');
	}
	public function SQL_Server_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/SQL_Server');
	}
	public function Wordpress_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Wordpress');
	}
	public function IndustrialTraining()
	{
		$this->load->view('Home/IndustrialTraining');
	}
	public function ApprenticeshipTraining()
	{

		$this->load->view('Home/ApprenticeshipTraining');
	}
	public function InternshipTraining()
	{
		$this->load->view('Home/InternshipTraining');
	}
	public function ProjectTraining()
	{
		$this->load->view('Home/ProjectTraining');
	}

	public function Farewell()
	{
		$this->load->view('Home/Farewell');
	}
	public function Farewell_2k22()
	{
		$this->load->view('Home/Farewell_2k22');
	}
	public function Farewell_2k19()
	{
		$this->load->view('Home/Farewell_2k19');
	}
	public function Farewell_2k24()
	{
		$this->load->view('Home/Farewell_2k24');
	}
	public function Farewell_2k25()
	{
		$this->load->view('Home/Farewell_2k25');
	}
	public function Mou_With_College()
	{
		$this->load->view('Home/mou_with_college');
	}
	public function Blog()
	{
		$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('blog', array('status' => 'true'))->result();
		$this->load->view('Home/Blog', $data);
	}


	public function Blogdeatils()
	{
		$blogid = $this->uri->segment(3);
		if (empty($blogid)) {
			redirect('Home/Blog');
		} else {
			$data['userdata'] = $this->db->get_where('blog', ['id' => $blogid])->row();
		}
		$this->load->view('Home/Blogdeatils', $data);
	}
	public function Registration()
	{
		$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('form_element', ["status" => "true"])->result();
		$this->load->view('Home/Registration', $data);
	}
	public function Seminars_Workshop()
	{
		$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('gallery', array('status' => 'true'))->result();
		$this->load->view('Home/Seminars_Workshop', $data);
	}
	public function VideoGallery()
	{
		$data['userdata'] = $this->db->order_by('id', 'asc')->get_where('videos', array('status' => 'true'))->result();
		$this->load->view('Home/VideoGallery', $data);
	}
	public function Faqs()
	{
		$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('faq', array('status' => 'true'))->result();
		$this->load->view('Home/Faqs', $data);
	}
	public function Contact()
	{
		$this->load->view('Home/Contact');
	}
	public function Farwell()
	{
		$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('farwell', array('status' => 'true'))->result();
		$this->load->view('Home/Farwell', $data);
	}
	public function Workshop()
	{
		$this->load->view('Home/Workshop');
	}
	public function Event()
	{
		$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('events', array('status' => 'true'))->result();
		$this->load->view('Home/Event', $data);
	}
	public function DigiCodersInNews()
	{
		$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('news', array('status' => 'true'))->result();
		$this->load->view('Home/News', $data);
	}
	public function VerifyCertificate()
	{
		$this->load->view('Home/VerifyCertificate');
	}
	public function FinalYearProject()
	{
		$this->load->view('Home/FinalYearProject');
	}
	public function Reviews()
	{
		$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('review', array('status' => 'true'))->result();
		$this->load->view('Home/Reviews', $data);
	}

	//Submit All Form website
	public function submitForm()
	{

		if ($this->uri->segment(3)) {
			if ($this->uri->segment(3) == 'Enquiry') {
				// $this->form_validation->set_rules('name', 'Name', 'required');
				// $this->form_validation->set_rules('email', 'Email ID', 'required');
				$this->form_validation->set_rules('phone', 'Mobile No', 'required');
				// $this->form_validation->set_rules('message', 'Message', 'required');
				if ($this->form_validation->run() == false) {
					echo json_encode(array("status" => "error", "msg" => "Validation Error", "title" => "All Fields Required", "reload" => "false", "redirect" => 'false'));
				} else {
					$data_arr = array(
						"name" => $this->input->post('name'),
						"email" => $this->input->post('email'),
						"phone" => $this->input->post('phone'),
						"message" => $this->input->post('message'),
						"status" => 'true',
						"date" => $this->data['date'],
						"time" => $this->data['time'],
					);
					// Verify reCAPTCHA
					if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
						$recaptchaResponse = $this->input->post('g-recaptcha-response');
						$secretKey = "6LfHIQcrAAAAAMB4Lu5gemLfn7ug-dnOzCI8BUX2";
						$verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
						$responseData = json_decode($verifyResponse);

						if (!$responseData->success) {
							echo json_encode(['status' => false, 'message' => 'reCAPTCHA verification failed. Please try again.']);
							return;
						}
						if ($this->db->insert('contact', $data_arr)) {
							echo json_encode(array("status" => "success", "msg" => "", "title" => "Your Enquiry Successfully Saved.", "reload" => "false", "redirect" => 'false'));
						} else {
							echo json_encode(array("status" => "error", "msg" => "", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						}
					}
				}
			}
			//NewsLatter form 
			if ($this->uri->segment(3) == 'NewsLetter') {
				$this->form_validation->set_rules('Email', 'Email ID', 'required|valid_email');
				if ($this->form_validation->run() == false) {
					echo json_encode(array("status" => "error", "msg" => "Validation Error", "title" => "All Fields Required", "reload" => "false", "redirect" => 'false'));
				} else {
					$data_arr = array(
						"email" => $this->input->post('Email'),
						"status" => 'true',
						"date" => $this->data['date'],
						"time" => $this->data['time'],
					);
					if ($this->db->insert('contact', $data_arr)) {
						echo json_encode(array("status" => "success", "msg" => "", "title" => "Your Enquiry Successfully Saved.", "reload" => "false", "redirect" => 'false'));
					} else {
						echo json_encode(array("status" => "error", "msg" => "", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
					}
				}
			}
		}
	}

	//Verify Certificate
	public function VerifyStudent()
	{
		if ($this->uri->segment(3)) {
			if ($this->uri->segment(3) == 'StudentCertificate') {
				$StudentName = $this->input->post('StudentName');
				// $this->db->select('*');
				// $this->db->from('certificat');
				// $this->db->like('name', $StudentName);
				// $data['userdata'] = $this->db->get()->result();

				$data['userdata'] = $this->db->query("SELECT * FROM certificate WHERE name LIKE '" . $StudentName . "%'")->result();


				$this->load->view('Home/StudentCertificate', $data);
			}
		}
		if ($this->uri->segment(3)) {
			if ($this->uri->segment(3) == 'StudentCertificate') {

				$mobile = $this->input->post('MobileNumber');
				$data['userdata'] = $this->db->query("SELECT * FROM certificate WHERE mobile LIKE '" . $mobile . "%'")->result();
				$this->load->view('Home/StuRefCertificate', $data);
			}
		}
		if ($this->uri->segment(3)) {
			if ($this->uri->segment(3) == 'StuRefCertificate') {
				$refno = $this->input->post('RefNumber');
				$data['userdata'] = $this->db->query("SELECT * FROM certificate WHERE refrence_no LIKE '" . $refno . "%'")->result();
				$this->load->view('Home/StudentCertificate', $data);
			}
		}
	}

	public function Receipt()
	{
		$id = $this->uri->segment(3);
		if ($this->uri->segment(3)) {
			// if ($id =  $this->uri->segment(3))
			// {
			$data['grouplink'] = $this->db->get('whatsapp_group')->row();
			$data['userdata'] = $this->db->get_where('registration', array("id" => $id))->row();
			$this->load->view('Home/FeeReciept', $data);
			// }
		} else {
			$this->load->view('Home/FeeReciept');
		}
	}
	public function PayReciept()
	{
		$id = $this->uri->segment(3);
		if ($this->uri->segment(3)) {
			// if ($id =  $this->uri->segment(3))
			// {
			$data['grouplink'] = $this->db->get('whatsapp_group')->row();
			$data['userdata'] = $this->db->get_where('fee_deposit', array("id" => $id))->row();
			$this->load->view('Home/PayReciept', $data);
			// }
		} else {
			$this->load->view('Home/PayReciept');
		}
	}
	public function ProjectReceipt()
	{
		if ($this->uri->segment(3)) {
			if ($id = $this->uri->segment(3)) {
				$data['userdata'] = $this->db->get_where('final_year_project', array("txn_id" => $id))->row();

				$this->load->view('Home/ProjectReciept', $data);
			}
		} else {
			$this->load->view('Home/FeeReciept');
		}
	}

	public function QuickLinks()
	{
		$this->load->view('Home/QuickLinks');
	}


	public function SearchStuDetail()
	{
		$mobile = $this->input->post('mobile');
		// echo $mobile; 

		$data = $this->db->order_by("id", "desc")->get_where('registration', array('mobile' => $mobile))->row();
		$res = $this->db->query("SELECT MAX(id) as last_id FROM fee_deposit")->row();
		$r = $res->last_id;
		$data->lastid = $r;
		// echo "<pre>";
		// var_dump($r);
		// die();
		if (!empty($data)) {
			echo json_encode($data);
			// echo "ok";
		} else {
			echo '{"error":"error"}';
		}

	}

	public function validatecouponCode()
	{
		$code = $this->input->post('code');
		$count = $this->db->get_where("registration", ['couponcode' => $code])->num_rows();
		$data = $this->db->order_by("id", "desc")->get_where('tbl_coupon', array('code' => $code, "max_use >" => $count, "status" => "true", "expiry_date >=" => $this->data['date']))->row();
		if (!empty($data)) {
			echo json_encode($data);
		} else {
			echo '{"error":"error"}';
		}

	}

	public function DownloadFeeReciept()
	{

		$this->load->view('Home/DownloadFeeReciept');
	}

	public function PayFee()
	{
		if ($this->uri->segment(3) == 'PayNow') {
			$this->form_validation->set_rules('regid', 'Registration ID', 'required');
			$this->form_validation->set_rules('student_training_location', 'Student Training Location', 'required');
			$this->form_validation->set_rules('Technology', 'Technology', 'required');
			$this->form_validation->set_rules('Course', 'Course', 'required');
			$this->form_validation->set_rules('Year', 'Year', 'required');
			$this->form_validation->set_rules('Name', 'Name', 'required');
			$this->form_validation->set_rules('Mobile1', 'Mobile Number', 'required');
			$this->form_validation->set_rules('College', 'College', 'required');
			$this->form_validation->set_rules('Amount', 'Amount', 'required');
			$this->form_validation->set_rules('uid', 'User ID', 'required');
			if ($this->form_validation->run() == false) {
				//  echo "validation err";
				$this->session->set_flashdata("status", "error");
				$this->session->set_flashdata("status", "Validation Error");
				redirect(base_url('Home/PayFee'));
			} else {
				if ($this->input->post('Mobile1') == '7394023582')
					$amount = 1;
				else
					$amount = $this->input->post('Amount');

				$txnid = time() . rand(1000, 9999);
				$data_arr = array(
					"txn_id" => $txnid,
					"userid" => $this->input->post('uid'),
					"reg_id" => $this->input->post('regid'),
					"student_training_location" => $this->input->post('student_training_location'),
					"technology" => $this->input->post('Technology'),
					'training_type' => $this->input->post('training_type'),
					'education' => $this->input->post('Course'),
					'edu_year' => $this->input->post('Year'),
					'father_name' => $this->input->post('FatherName'),
					'email' => $this->input->post('Email'),
					"student_name" => $this->input->post('Name'),
					"mobile" => $this->input->post('Mobile1'),
					'alt_mobile' => $this->input->post('AltMobile'),
					'college_name' => $this->input->post('College'),
					"amount" => $amount,
					"status" => 'true',
					"txn_status" => 'PENDING',
					"date" => $this->data['date'],
					"time" => $this->data['time'],
					"accept_status" => 'new',
				);


				if ($this->db->insert('fee_deposit', $data_arr)) {
					$data_arr = $this->db->insert_id();
					$data_arr = $this->db->get_where('fee_deposit', array('id' => $data_arr))->row();
					$txnid = $this->session->set_userdata('txn_id', $txnid);
					// var_dump($txnid);die();
					$link = $this->cashfreepayment->GetPaymentLink($data_arr, base_url("Home/PaymentResponse2") . "?order_id={order_id}&order_token={order_token}");
					// var_dump($link);die();
					return $link;
				} else {
					echo "something Went Wrong";
					// echo json_encode(array("status" => "error", "msg" => "Error", "title" => "Something Went Wrong", "reload" => "true", "redirect" => 'false'));
				}

			}



		} else {
			$this->load->view('Home/PayFee');
		}
	}

	public function PaymentResponse2()
	{
		// Get Casfree new response using library
		if (isset($_REQUEST['order_id'])) {
			$order_id = $_REQUEST['order_id'];
			$response = $this->cashfreepayment->CheckOrderStatus($order_id);
			// var_dump($order_id);die();
			if ($response->order_status == "PAID") {
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

				if ($this->db->where('txn_id', $txnid)->update('fee_deposit', $insert_arr)) {
					$this->session->set_flashdata("status", "success");
					$this->session->set_flashdata("msg", "Payment Success");
					$data['userdata'] = $this->db->get_where('fee_deposit', array("txn_id" => $txnid))->row();
					$data['grouplink'] = $this->db->get('whatsapp_group')->row();
					$this->load->view('Home/PayReciept', $data);
					// redirect(base_url('Home'));  
				} else {
					$this->session->set_flashdata("status", "error");
					$this->session->set_flashdata("msg", "Something Went Wrong");
					redirect(base_url('Home/PayFee'));
				}
			} else {
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

				if ($this->db->where('txn_id', $txnid)->update('fee_deposit', $insert_arr)) {

					$payment_url = $response->payment_link;
					$data['payment_url'] = $payment_url;
					$this->load->view('Home/PayAgain', $data);
					?>
					<!--<a href="<?= $payment_url ?>">Payment Faild. If you want to payment Please Proceed..</a>;
				-->

					<?php
				} else {
					echo "something Went Wrong";
				}
			}
		} else {
			echo "Something went wrong!";
		}
	}













	// end here 
	public function db_backup()
	{
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->library('zip');
		$this->load->dbutil();

		$db_format = array('format' => 'zip', 'filename' => 'my_db_backup.sql');
		$backup = $this->dbutil->backup($db_format); // Remove reference assignment
		$dbname = 'backup-on-' . date('Y-m-d') . '.zip';
		$save = 'assets/db_backup/' . $dbname;

		// Ensure the directory exists, if not create it
		if (!is_dir('assets/db_backup/')) {
			mkdir('assets/db_backup/', 0777, true);
		}

		// Ensure the directory is writable
		if (is_writable('assets/db_backup/')) {
			if (write_file($save, $backup)) {
				// Clear any previous output to avoid conflict with download headers
				if (ob_get_level() > 0) {
					ob_end_clean();
				}

				// Force download
				force_download($dbname, $backup);
			} else {
				echo 'Unable to write the file.';
			}
		} else {
			echo 'Directory is not writable.';
		}
	}



	public function city_pages($city_slug)
	{
		$city_name = str_replace('-', ' ', $city_slug);

		$pages = $this->db
			->where('city_name', $city_name)
			->where('status', 'true')
			->get('seo_pages')
			->result();

		if (empty($pages)) {
			show_404();
		}

		$data['city_name'] = ucwords($city_name);
		$data['pages'] = $pages;

		$data['webs'] = $this->db
			->where('city_name', $city_name)
			->group_by('course_name')
			->order_by('course_name', 'ASC')
			->get('seo_pages')
			->result();

		$this->load->view('Home/city_pages', $data);
	}


	public function coursepage($slug = null)
	{
		if (empty($slug)) {
			show_404();
			return;
		}

		$page = $this->Seo_model->get_page_by_slug($slug);

		if (empty($page)) {
			show_404();
			return;
		}
		$data['cities'] = $this->db
			->distinct()
			->select('city_name')
			->where('status', 'true')
			->get('cities')
			->result();

		$data['courses'] = $this->db
			->distinct()
			->select('course_name')
			->where('status', 'true')
			->get('seo_pages')
			->result();
		$data['course_name'] = $page->course_name;
		$data['city_name'] = $page->city_name;
		$data['state_name'] = $page->state_name;

		$data['page'] = $page;
		$city_name = $page->city_name;
		$data['webs'] = $this->db
			->where('city_name', $city_name)
			->order_by('course_name', 'ASC')
			->get('seo_pages')
			->result();
		$this->load->view('Home/course_page', $data);
	}

	public function course($slug)
	{
		// old URL redirect
		if (strpos($slug, 'training') !== false) {
			$clean_slug = explode('-training-', $slug)[0];
			redirect(base_url($clean_slug), '301');
			exit;
		}

		$page = $this->db
			->like('url_slug', $slug, 'after')
			->where('status', 'true')
			->get('seo_pages')
			->row();

		if (!$page) {
			show_404();
		}

		$data['page'] = $page;
		$data['course_name'] = $page->course_name;


		$this->load->view('Home/course', $data);
	}


}
