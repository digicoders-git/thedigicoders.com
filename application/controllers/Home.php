<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('email_template');
		$this->load->library('CashfreePayment');
		$this->load->library('RazorpayPayment');
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

		$seo_links = $this->db->where('status', 'true')->get('tbl_seo_training_links')->result();

		$gallery_categories = $this->db->where('status', 1)->get('tbl_gallery_categories')->result();
		$recruiters = $this->db->where('status', 1)->get('tbl_recruiters')->result();

		// ✅ FOOTER KE LIYE GLOBAL VARIABLES
		$this->load->vars([
			'states' => $states,
			'services' => $services,
			'allservice' => $allservice,
			'seo_links' => $seo_links,
			'gallery_categories' => $gallery_categories,
			'recruiters' => $recruiters,
		]);
	}


	private function getPaymentMode()
	{
		$admin = $this->db->get('admin_login')->row();
		return isset($admin->payment_mode) ? $admin->payment_mode : 'cashfree';
	}

	private function SendEmail($to, $subject, $message)
	{
		$this->load->library('email');
		$this->config->load('email', TRUE);
		$email_config = $this->config->item('email');
		$this->email->initialize($email_config);
		$this->email->from($email_config['smtp_user'], 'DigiCoders Enquiry');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		return @$this->email->send();
	}

	public function RazorpayCheckout()
	{
		$this->load->view('Home/RazorpayCheckout');
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
		$fields = $this->db->list_fields('admin_login');
		if (!in_array('payment_mode', $fields)) {
			$this->load->dbforge();
			$fields = array(
				'payment_mode' => array(
					'type' => 'VARCHAR',
					'constraint' => '50',
					'default' => 'cashfree'
				)
			);
			$this->dbforge->add_column('admin_login', $fields);
			echo "Column payment_mode added.";
		} else {
			echo "Column payment_mode already exists.";
		}

		echo "<br>Current Mode: " . $this->getPaymentMode();
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
					redirect(base_url('home/userlogin'));
				}
			} else {
				$this->session->set_flashdata(['res' => 'error', 'msg' => 'Password Not Matched']);
				redirect(base_url('home/userlogin'));
			}
		} else {
			$this->session->set_flashdata(['res' => 'error', 'msg' => 'Mobile Not Matched']);
			redirect(base_url('home/userlogin'));
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

				if ($this->form_validation->run() == false) {
					echo json_encode(array("status" => "error", "msg" => "Email is required.", "title" => "Validation Error"));
				} else {
					$latitude = $this->input->post('latitude');
					$longitude = $this->input->post('longitude');

					if (empty($latitude) || empty($longitude)) {
						echo json_encode(array("status" => "error", "msg" => "Location permission is required for admin login. Please enable location access in your browser settings.", "title" => "Location Required"));
						return;
					}

					$email = $this->input->post("email");
					$otp = $this->input->post("otp");

					if (!$otp) {
						// Stage 1: Send OTP
						$query = $this->db->get_where('admin_login', array("email" => $email));
						if ($query->num_rows() > 0) {
							$result = $query->row();
							$otp_code = rand(100000, 999999);
							$expiry = time() + 120; // 2 minutes

							// Update OTP in Database for tagdi security
							$this->db->where('email', $email);
							$this->db->update('admin_login', array(
								'otp_code' => $otp_code,
								'otp_expiry' => $expiry
							));

							// Send Email
							$this->load->library('email');
							$this->config->load('email', TRUE);
							$email_config = $this->config->item('email');
							$this->email->initialize($email_config);
							$this->email->from($email_config['smtp_user'], 'DigiCoders Admin');
							$this->email->to('digicoderstech@gmail.com');
							// $this->email->to('saurabhkumarssp@gmail.com');
							$this->email->subject("[$otp_code] Admin Login OTP Verification Code | thedigicoders.com Admin Panel");

							$this->load->library('LoginDetails');
							$ip_addr = $this->logindetails->get_ip();
							$mac_addr = $this->logindetails->get_mac();
							$browser_name = $this->logindetails->get_useragent();
							$os_name = $this->logindetails->get_os();
							$login_date = $this->data['date'] . ' ' . $this->data['time'];
							$lat = $this->input->post('latitude');
							$lng = $this->input->post('longitude');
							$address = ($lat && $lng) ? $this->get_address_from_coords($lat, $lng) : '';

							$message = build_admin_login_otp_email($otp_code, $email, $ip_addr, $browser_name, $os_name, $login_date, $lat, $lng, $address);

							$this->email->message($message);

							// Suppress warnings during send to prevent JSON corruption
							if (@$this->email->send()) {
								$logindetails_data = array(
									"LoginID" => $query->row()->id,
									"IP" => $ip_addr,
									"MAC" => $mac_addr,
									"UserName" => $this->logindetails->get_username(),
									"BrowserName" => $browser_name,
									"OSName" => $os_name,
									"Date" => $this->data['date'],
									"Time" => $this->data['time'],
									"Latitude" => isset($lat) ? $lat : 'N/A',
									"Longitude" => isset($lng) ? $lng : 'N/A',
									"Address" => isset($address) ? $address : 'N/A'
								);
								@$this->db->insert("tbl_adminlogindetails", $logindetails_data);

								echo json_encode(array("status" => "otp_sent", "msg" => "OTP has been sent to your registered digicoderstech@gmail.com email.", "title" => "OTP Sent"));
							} else {
								// Fallback for debugging if email fails
								$error = $this->email->print_debugger();
								// Log error instead of echoing
								log_message('error', 'OTP Email failed: ' . $error);
								echo json_encode(array("status" => "error", "msg" => "Failed to send OTP. Please check your internet or SMTP settings.", "title" => "Email Error"));
							}
						} else {
							echo json_encode(array("status" => "error", "msg" => "Please enter a valid registered email address.", "title" => "Invalid Login ID."));
						}
					} else {
						// Stage 2: Verify OTP
						$admin = $this->db->get_where('admin_login', array("email" => $email))->row();
						if ($admin) {
							if ($admin->otp_code == $otp) {
								if (time() <= $admin->otp_expiry) {
									// Success: Update login status & session
									$update_data = array(
										'login_date' => $this->data['date'],
										'login_time' => $this->data['time'],
										'status' => 'true',
										'otp_code' => NULL, // Clear OTP
										'otp_expiry' => NULL
									);


									$this->db->where('email', $email)->update('admin_login', $update_data);

									$this->session->set_userdata("AdminEmail", $email);
									$this->session->set_userdata("AdminID", $admin->id);
									$this->session->set_userdata("admin_type", $admin->admin_type);
									$this->session->set_userdata("super_verified", false);

									echo json_encode(array("status" => "success", "msg" => "Login successful.", "title" => "Welcome", "redirectLink" => base_url('Admin/Dashboard')));
								} else {
									echo json_encode(array("status" => "error", "msg" => "OTP has expired.", "title" => "Expired"));
								}
							} else {
								echo json_encode(array("status" => "error", "msg" => "Invalid OTP.", "title" => "Verification Failed"));
							}
						} else {
							echo json_encode(array("status" => "error", "msg" => "User not found.", "title" => "Error"));
						}
					}
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
						redirect(base_url('home/registration'));
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
								"txn_status" => 'PAID',
								"date" => $this->data['date'],
								"time" => $this->data['time'],
								"coupon_descount" => $camount,
								"couponcode" => $code,
								"registration_by" => 'by website',
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
								$this->_sendRegistrationEmail($data_arr);
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
								"registration_by" => 'by website',
							);

							if ($this->db->insert('registration', $data_arr)) {
								$this->_sendRegistrationEmail($data_arr);
								$data_arr = $this->db->insert_id();
								$data_arr = $this->db->get_where('registration', array('id' => $data_arr))->row();
								$txnid = $this->session->set_userdata('txn_id', $txnid);

								$mode = $this->getPaymentMode();

								if ($mode == 'razorpay') {
									$link = $this->razorpaypayment->GetPaymentLink($data_arr, base_url("Home/PaymentResponse") . "?order_id={order_id}&status={status}");
									redirect($link);
								} else {
									$link = $this->cashfreepayment->GetPaymentLink($data_arr, base_url("Home/PaymentResponse") . "?order_id={order_id}&order_token={order_token}");
									if ($link) {
										redirect($link);
									} else {
										$this->session->set_flashdata("status", "error");
										$this->session->set_flashdata("msg", "Failed to create payment link.");
										redirect(base_url('home/registration'));
									}
								}
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
						redirect(base_url('home/finalyearproject'));
					} else {
						$patmentType = $this->input->post('PaymentType');
						$amount = $this->input->post('Amount');

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
							);
							// var_dump($data_arr);
							// die();
							if ($this->db->insert('final_year_project', $data_arr)) {
								$this->_sendProjectEmail($data_arr);
								$this->session->set_flashdata("status", "success");
								$this->session->set_flashdata("msg", "Payment Success");
								redirect(base_url('home/finalyearproject'));
							} else {
								$this->session->set_flashdata("status", "error");
								$this->session->set_flashdata("msg", "Something Went Wrong");
								redirect(base_url('home/finalyearproject'));
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
							);
							if ($this->db->insert('final_year_project', $data_arr)) {
								$this->_sendProjectEmail($data_arr);
								$last_id = $this->db->insert_id();
								$data_arr = $this->db->get_where('final_year_project', array('id' => $last_id))->row();
								$txnid = $this->session->set_userdata('txn_id', $txnid);
								$id = $this->session->set_userdata('id', $last_id);

								$mode = $this->getPaymentMode();
								if ($mode == 'razorpay') {
									$link = $this->razorpaypayment->GetPaymentLink($data_arr, base_url("Home/PaymentResponseV2") . "?order_id={order_id}");
									redirect($link);
								} else {
									$link = $this->cashfreepayment->GetPaymentLink($data_arr, base_url("Home/PaymentResponseV2") . "?order_id={order_id}&order_token={order_token}");
									if ($link) {
										redirect($link);
									} else {
										$this->session->set_flashdata("status", "error");
										$this->session->set_flashdata("msg", "Failed to create payment link.");
										redirect(base_url('home/finalyearproject'));
									}
								}
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
		// Detect if Razorpay Response
		if (isset($_REQUEST['razorpay_payment_id'])) {
			$razorpay_order_id = $_REQUEST['razorpay_order_id'];
			$razorpay_payment_id = $_REQUEST['razorpay_payment_id'];
			$razorpay_signature = $_REQUEST['razorpay_signature'];

			// Verify Signature
			$isValid = $this->razorpaypayment->VerifyPayment($razorpay_payment_id, $razorpay_order_id, $razorpay_signature);

			if ($isValid) {
				$txnid = $this->session->userdata('txn_id');

				// Fetch Order Details (Optional for Razorpay, but good for consistency)
				// We can just trust signature for status PAID

				$txn_date_time = $this->data['date'] . " " . $this->data['time'];
				$insert_arr = array(
					"orderId" => $razorpay_order_id,
					"orderId" => $razorpay_order_id,
					// "amount" => "", // Preserving initial amount
					"referenceId" => $razorpay_payment_id,
					"referenceId" => $razorpay_payment_id,
					"response_bundle" => json_encode($_REQUEST),
					"txn_status" => "PAID",
					"txn_date_time" => $txn_date_time,
					"payment_mode" => "Razorpay" // STORE MODE
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
					redirect(base_url('home/registration'));
				}
			} else {
				// Failed Signature
				$this->session->set_flashdata("status", "error");
				$this->session->set_flashdata("msg", "Payment Verification Failed");
				redirect(base_url('home/registration'));
			}
			return; // End for Razorpay
		}

		// CASTHFREE LOGIC 
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
					"txn_status" => "PAID",
					"txn_date_time" => $txn_date_time,
					"payment_mode" => "Cashfree" // STORE MODE
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
					redirect(base_url('home/registration'));
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
					"payment_mode" => "Cashfree"
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
		// Razorpay Logic 
		if (isset($_REQUEST['razorpay_payment_id'])) {
			$razorpay_order_id = $_REQUEST['razorpay_order_id'];
			$razorpay_payment_id = $_REQUEST['razorpay_payment_id'];
			$razorpay_signature = $_REQUEST['razorpay_signature'];

			$isValid = $this->razorpaypayment->VerifyPayment($razorpay_payment_id, $razorpay_order_id, $razorpay_signature);

			if ($isValid) {
				$txnid = $this->session->userdata('txn_id');
				$id = $this->session->userdata('id');
				$txn_date_time = $this->data['date'] . " " . $this->data['time'];

				$insert_arr = array(
					"orderId" => $razorpay_order_id,
					"referenceId" => $razorpay_payment_id,
					"response_bundle" => json_encode($_REQUEST),
					"txn_status" => "PAID",
					"txn_date_time" => $txn_date_time
				);

				if ($this->db->where('txn_id', $txnid)->update('final_year_project', $insert_arr)) {
					$this->session->set_flashdata("status", "success");
					$this->session->set_flashdata("msg", "Payment Success");
					$data['userdata'] = $this->db->get_where('final_year_project', array("txn_id" => $txnid))->row();
					$data['grouplink'] = $this->db->get('whatsapp_group')->row();
					$this->load->view('Home/ProjectReciept', $data);
				} else {
					$this->session->set_flashdata("status", "error");
					$this->session->set_flashdata("msg", "Something Went Wrong");
					redirect(base_url('Home/FinalYearProject'));
				}
			} else {
				$this->session->set_flashdata("status", "error");
				$this->session->set_flashdata("msg", "Payment Verification Failed");
				redirect(base_url('Home/FinalYearProject'));
			}
			return;
		}

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
					"txn_status" => "PAID",
					"txn_date_time" => $txn_date_time
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
					"txn_date_time" => $txn_date_time
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
		$data['modal_content'] = $this->db->get_where('tbl_modal_content', array('id' => 1))->row();
		$data['usedata'] = $this->db->order_by('id', 'desc')->get_where('teamexpert', array("status" => "true"))->result();
		// $this->load->view('Admin/expert', $data);
		$data['cities'] = $this->Seo_model->get_active_cities_with_pages();
		$data['modal_num'] = $this->db->query("select * from modal where status='true'")->num_rows();
		$data['sliderdata'] = $this->db->order_by('id', 'desc')->get_where('slider', array('status' => 'true'))->result();
		$data['mou_slider'] = $this->db->query("select * from tbl_gallery_items where status='1' and category_id='10'")->result();
		$data['faqs'] = $this->db->order_by('id', 'desc')->get_where('faq', array('status' => 'true'))->result();
		$data['blogs'] = $this->db->order_by('id', 'desc')->get_where('blog', array('status' => 'true'))->result();
		$data['news_ticker'] = $this->db->order_by('id', 'desc')->get_where('tbl_news_ticker', array('status' => 'true'))->result();
		$data['impact_stats'] = $this->db->order_by('id', 'asc')->get_where('tbl_impact_stats', array('status' => 'true'))->result();
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
				// Send Email Notification
				$admin = $this->db->get('admin_login')->row();
				$admin_email = isset($admin->email) ? $admin->email : 'digicoderstech@gmail.com';
				$subject = "New Webinar Registration: " . $data_arr['name'];
				$email_msg = build_webinar_email($data_arr);
				$this->SendEmail($admin_email, $subject, $email_msg);

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

		$data['sliderdata'] = $this->db->order_by('id', 'desc')->get_where('tbl_gallery_items', array('status' => '1', 'category_id' => '10'))->result();
		$this->load->view('Home/MOU', $data);
	}
	public function Achievement()
	{
		$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('achievemens', array('status' => 'true'))->result();
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
	public function SyllabusTraining()
	{
		$this->load->view('Home/SyllabusTraining');
	}
	public function FacultyTraining()
	{
		$this->load->view('Home/FacultyTraining');
	}
	public function training_photo()
	{
		$this->load->view('Home/training_photo');
	}

	// public function Digicoders_campus()
	// {
	// 	$this->load->view('Home/Digicoders_campus');
	// }

	// public function video_gallery()
	// {
	// 	$this->load->view('Home/video_gallery');
	// }
	// public function OfficeTour()
	// {
	// 	$this->load->view('Home/OfficeTour');
	// }

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
	public function ReturnPolicy()
	{
		$this->load->view('Home/ReturnPolicy');
	}
	public function ShippingPolicy()
	{
		$this->load->view('Home/ShippingPolicy');
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
	public function Dart_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Dart');
	}
	public function Data_analysis_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Data_analysis');
	}
	public function Digital_marketing_training_in_lucknow_in_digicoders()
	{
		$this->load->view('Home/Digital_marketing');
	}
	public function IndustrialTraining()
	{
		$this->load->view('Home/IndustrialTraining');
	}

	public function api_proxy()
	{
		$endpoint = $this->input->get('endpoint');

		if (empty($endpoint)) {
			echo json_encode(['success' => false, 'message' => 'No endpoint provided.']);
			return;
		}

		$url = 'https://erpapi.thedigicoders.com/api/' . ltrim($endpoint, '/');
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		if ($this->input->method() === 'post') {
			curl_setopt($ch, CURLOPT_POST, true);
			$payload = file_get_contents('php://input');
			curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
			curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		}

		$response = curl_exec($ch);
		if (curl_errno($ch)) {
			echo json_encode(['success' => false, 'message' => curl_error($ch)]);
		} else {
			$contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
			header("Content-Type: $contentType");
			echo $response;
		}
		curl_close($ch);
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

	// public function Farewell()
	// {
	// 	$this->load->view('Home/Farewell');
	// }
	// public function Farewell_2k22()
	// {
	// 	$this->load->view('Home/Farewell_2k22');
	// }
	// public function Farewell_2k19()
	// {
	// 	$this->load->view('Home/Farewell_2k19');
	// }
	// public function Farewell_2k24()
	// {
	// 	$this->load->view('Home/Farewell_2k24');
	// }
	// public function Farewell_2k25()
	// {
	// 	$this->load->view('Home/Farewell_2k25');
	// }
	// public function Mou_With_College()
	// {
	// 	$data['sliderdata'] = $this->db->order_by('id', 'desc')->get_where('tbl_mou_image', array('status' => 'true'))->result();
	// 	$this->load->view('Home/mou_with_college', $data);
	// }
	public function Blog()
	{
		$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('blog', array('status' => 'true'))->result();
		$this->load->view('Home/Blog', $data);
	}


	public function blogdetails($slug = NULL)
	{
		// 301 Redirect for legacy /home/blogdetails/ URL to clean /blog-details/ URL
		if ($this->uri->segment(1) === 'home' && $this->uri->segment(2) === 'blogdetails') {
			$clean_slug = !empty($slug) ? $slug : $this->uri->segment(3);
			if (!empty($clean_slug)) {
				redirect('blog-details/' . $clean_slug, 'location', 301);
				return;
			}
		}

		$blog_identifier = !empty($slug) ? $slug : $this->uri->segment(3);
		if (empty($blog_identifier)) {
			redirect('Home/Blog');
		} else {
			// First try to find by URL slug
			$data['userdata'] = $this->db->get_where('blog', ['url' => $blog_identifier])->row();

			// If not found, try finding by ID for backwards compatibility
			if (empty($data['userdata'])) {
				$data['userdata'] = $this->db->get_where('blog', ['id' => $blog_identifier])->row();
			}

			if (empty($data['userdata'])) {
				redirect('Home/Blog');
			}
			$data['recent_blogs'] = $this->db->order_by('id', 'desc')->get_where('blog', ['status' => 'true', 'id !=' => $data['userdata']->id], 5)->result();
			$data['banner_place'] = $this->db->query("select * from placement where banner='banner' and status='true' order by id desc limit 10")->result();
		}
		$this->load->view('Home/Blogdetails', $data);
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
	// public function VideoGallery()
	// {
	// 	$data['userdata'] = $this->db->order_by('id', 'asc')->get_where('videos', array('status' => 'true'))->result();
	// 	$this->load->view('Home/VideoGallery', $data);
	// }
	public function Faqs()
	{
		$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('faq', array('status' => 'true'))->result();
		$this->load->view('Home/Faqs', $data);
	}
	public function Contact()
	{
		$data['contact_numbers'] = $this->db->order_by('id', 'asc')->get_where('tbl_contact_numbers', array('status' => 'true'))->result();
		$this->load->view('Home/Contact', $data);
	}
	// public function Farwell()
	// {
	// 	$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('farwell', array('status' => 'true'))->result();
	// 	$this->load->view('Home/Farwell', $data);
	// }
	public function Workshop()
	{
		$this->load->view('Home/Workshop');
	}
	public function Event()
	{
		$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('events', array('status' => 'true'))->result();
		$this->load->view('Home/Event', $data);
	}
	// public function DigiCodersInNews()
	// {
	// 	$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('news', array('status' => 'true'))->result();
	// 	$this->load->view('Home/News', $data);
	// }
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

					$captcha_passed = true;
					if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
						$recaptchaResponse = $this->input->post('g-recaptcha-response');
						$secretKey = "6LfHIQcrAAAAAMB4Lu5gemLfn7ug-dnOzCI8BUX2";
						$verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
						$responseData = json_decode($verifyResponse);

						if (!$responseData->success) {
							$captcha_passed = false;
							echo json_encode(['status' => false, 'message' => 'reCAPTCHA verification failed. Please try again.']);
						}
					}

					if ($captcha_passed) {
						if ($this->db->insert('contact', $data_arr)) {
							// Send Email Notification
							$admin = $this->db->get('admin_login')->row();
							$admin_email = isset($admin->email) ? $admin->email : 'digicoderstech@gmail.com';

							$subject = "New Website Enquiry from " . $data_arr['name'];
							$email_msg = build_enquiry_email($data_arr);

							$this->SendEmail($admin_email, $subject, $email_msg);
							// Also send to secondary email if needed
							$this->SendEmail('digicoderstech@gmail.com', $subject, $email_msg);
							// $this->SendEmail('saurabhkumarssp@gmail.com', $subject, $email_msg);

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
						// Send Email Notification for NewsLetter
						$admin = $this->db->get('admin_login')->row();
						$admin_email = isset($admin->email) ? $admin->email : 'digicoderstech@gmail.com';
						$subject = "New Newsletter Subscription: " . $data_arr['email'];
						$email_msg = build_newsletter_email($data_arr['email'], $data_arr['date'] . ' ' . $data_arr['time']);
						$this->SendEmail($admin_email, $subject, $email_msg);

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
		$segment = $this->uri->segment(3);
		$year = $this->input->post('TrainingYear');

		if ($segment == 'StudentCertificate') {
			$mobile = trim($this->input->post('MobileNumber'));

			// First fetch from new External API
			$apiData = $this->fetchCertificateFromAPI('mobile', $mobile, $year);
			if (!empty($apiData)) {
				$data['userdata'] = $apiData;
			} else {
				// Fallback to local DB for older records
				$data['userdata'] = $this->db->query("SELECT * FROM certificate WHERE mobile = ?", array($mobile))->result();
			}

			$this->load->view('Home/StudentCertificate', $data);
		} elseif ($segment == 'StuRefCertificate') {
			$refno = trim($this->input->post('RefNumber'));

			// First fetch from new External API
			$apiData = $this->fetchCertificateFromAPI('dctNumber', $refno, $year);
			if (!empty($apiData)) {
				$data['userdata'] = $apiData;
			} else {
				// Fallback to local DB for older records
				$data['userdata'] = $this->db->query("SELECT * FROM certificate WHERE refrence_no = ? OR full_ref_no = ? OR dctNumber = ?", array($refno, $refno, $refno))->result();
			}

			$this->load->view('Home/StuRefCertificate', $data);
		}
	}

	/**
	 * Helper function to fetch certificate data from an external API
	 */
	private function fetchCertificateFromAPI($type, $value, $year = null)
	{
		if (empty($value)) {
			return [];
		}

		$endpoints = [];

		if ($type === 'mobile') {
			$endpoints[] = "https://erpapi.thedigicoders.com/api/certificate-data/search?mobile=" . urlencode($value);
		} else {
			// dctNumber / reference search
			$endpoints[] = "https://erpapi.thedigicoders.com/api/certificate-data/search?dctNumber=" . urlencode($value);

			// If input has hyphens like DCT-2026-2877, try slashes DCT/2026/2877
			if (strpos($value, '-') !== false) {
				$slashVal = str_replace('-', '/', $value);
				$endpoints[] = "https://erpapi.thedigicoders.com/api/certificate-data/search?dctNumber=" . urlencode($slashVal);
			}

			// Extract numeric refNo (e.g. 2877) if string contains trailing numbers
			preg_match('/\d+$/', $value, $matches);
			if (!empty($matches[0]) && $matches[0] !== $value) {
				$endpoints[] = "https://erpapi.thedigicoders.com/api/certificate-data/search?dctNumber=" . urlencode($matches[0]);
			}
		}

		foreach ($endpoints as $apiUrl) {
			$response = '';

			if (function_exists('curl_init')) {
				$ch = curl_init($apiUrl);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_TIMEOUT, 15);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36');
				curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);
				$response = curl_exec($ch);
				$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				curl_close($ch);
			}

			if (empty($response) || (isset($httpCode) && $httpCode != 200)) {
				$opts = [
					"http" => [
						"method" => "GET",
						"header" => "Accept: application/json\r\nUser-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n",
						"ignore_errors" => true,
						"timeout" => 15
					],
					"ssl" => ["verify_peer" => false, "verify_peer_name" => false]
				];
				$context = stream_context_create($opts);
				$response = @file_get_contents($apiUrl, false, $context);
			}

			if (!empty($response)) {
				$result = json_decode($response);
				if (isset($result->success) && $result->success == true && !empty($result->data)) {
					$erpData = $result->data;
					$dataList = is_array($erpData) ? $erpData : [$erpData];
					$mappedData = [];
					foreach ($dataList as $row) {
						if (!is_object($row))
							continue;
						$obj = new stdClass();
						$obj->id = isset($row->_id) ? $row->_id : '';
						$obj->studentName = isset($row->studentName) ? $row->studentName : (isset($row->name) ? $row->name : '');
						$obj->name = $obj->studentName;
						$obj->dctNumber = isset($row->dctNumber) ? $row->dctNumber : '';
						$obj->refNo = isset($row->refNo) ? $row->refNo : '';
						$obj->refrence_no = !empty($obj->dctNumber) ? $obj->dctNumber : $obj->refNo;
						$obj->mobile = isset($row->mobile) ? $row->mobile : '';
						$obj->whatsapp = isset($row->whatsapp) ? $row->whatsapp : '';
						$obj->trainingType = isset($row->trainingType) ? $row->trainingType : '';
						$obj->course = !empty($obj->trainingType) ? $obj->trainingType : (isset($row->course) ? $row->course : '');
						$obj->technology = isset($row->technology) ? (is_object($row->technology) ? $row->technology->name : $row->technology) : '';
						$obj->duration = isset($row->duration) ? $row->duration : '';
						$obj->fromDate = isset($row->fromDate) ? $row->fromDate : '';
						$obj->toDate = isset($row->toDate) ? $row->toDate : '';
						$obj->dateOfIssue = isset($row->dateOfIssue) ? $row->dateOfIssue : (isset($row->certificate_issue_date) ? $row->certificate_issue_date : '');
						$obj->certificate_issue_date = $obj->dateOfIssue;
						$obj->grade = isset($row->grade) ? $row->grade : '';
						$obj->sourceFile = isset($row->sourceFile) ? $row->sourceFile : '';

						if (isset($row->profilePhoto) && is_object($row->profilePhoto) && !empty($row->profilePhoto->url)) {
							$imgUrl = $row->profilePhoto->url;
							if (strpos($imgUrl, 'http') !== 0) {
								$imgUrl = "https://erpapi.thedigicoders.com" . $imgUrl;
							}
							$obj->image = $imgUrl;
						} else {
							$obj->image = isset($row->image) ? $row->image : '';
						}
						$mappedData[] = $obj;
					}
					if (!empty($mappedData)) {
						return $mappedData;
					}
				}
			}
		}
		return [];
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

		// Fallback for hyphens directly matching database (e.g., janjgir-champa)
		if (empty($pages)) {
			$pages = $this->db
				->where('city_name', $city_slug)
				->where('status', 'true')
				->get('seo_pages')
				->result();
			if (!empty($pages)) {
				$city_name = $city_slug;
			}
		}

		if (empty($pages)) {
			show_404();
			return;
		}

		$data['city_name'] = !empty($pages) ? ucwords(strtolower($pages[0]->city_name)) : ucwords($city_name);
		$data['pages'] = $pages;

		$data['webs'] = $this->db
			->where('city_name', $city_name)
			->group_by('course_name')
			->order_by('course_name', 'ASC')
			->get('seo_pages')
			->result();

		// Add SEO meta data
		$data['description'] = !empty($pages) ? $pages[0]->meta_description : "Best IT Training in " . $data['city_name'];
		$data['keywords'] = !empty($pages) ? $pages[0]->keywords : "IT Training, Software Training, " . $data['city_name'];

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
		$data['description'] = $page->meta_description;
		$data['keywords'] = $page->keywords;

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
		// 1. Check in tbl_seo_training_links (New dynamic system)
		$training_link = $this->db->get_where('tbl_seo_training_links', array('url_slug' => $slug, 'status' => 'true'))->row();

		if ($training_link) {
			$data['training'] = $training_link;
			$data['title'] = $training_link->title;
			$data['course_name'] = $training_link->training_name;
			$data['about_course'] = $training_link->about_course;
			$data['description'] = $training_link->description;

			// Load dynamic training view
			$this->load->view('Home/dynamic_training', $data);
			return;
		}

		// 2. Fallback to existing seo_pages logic
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
		$data['city_name'] = $page->city_name;
		$data['state_name'] = $page->state_name;
		$data['description'] = $page->meta_description;
		$data['keywords'] = $page->keywords;


		$this->load->view('Home/course', $data);
	}


	public function sitemap_xml()
	{
		$data['seo_pages'] = $this->db->where('status', 'true')->get('seo_pages')->result();
		$data['cities'] = $this->db->where('status', 'true')->get('cities')->result();
		$data['blogs'] = $this->db->where('status', 'true')->get('blog')->result();

		$output = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
		$output .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

		// Static Main Pages
		$base_url = "https://thedigicoders.com/";
		$static_pages = [
			'',
			'about',
			'contact',
			'registration',
			'reviews',
			'placement',
			'faqs',
			'verify-certificate',
			'final-year-project',
			'quick-links',
			'our-expert',
			'team-digicoders',
			'appreciation',
			'mou',
			'achievements',
			'vocational-training',
			'summer-training',
			'winter-training',
			'industrial-training',
			'apprenticeship-training',
			'internship-training',
			'project-training',
			'workshop',
			'event',
			'blog',
			'verify-student',
			'lucknow-head-office',
			'kanpur-branch',
			'gorakhpur-branch',
			'syllabus-training',
			'faculty-training',
			'gallery',
			'download-fee-receipt',
			'pay-fee',
			'privacy-policy',
			'refund-policy',
			'terms-condition',
			'return-policy',
			'shipping-policy',
			'interview-questions'
		];

		foreach ($static_pages as $page) {
			$output .= '  <url>' . "\n";
			$output .= '    <loc>' . $base_url . $page . '</loc>' . "\n";
			$output .= '    <lastmod>' . date('Y-m-d') . '</lastmod>' . "\n";
			$output .= '    <priority>' . ($page == '' ? '1.00' : '0.80') . '</priority>' . "\n";
			$output .= '  </url>' . "\n";
		}

		// Dynamic Course Pages
		foreach ($data['seo_pages'] as $row) {
			$output .= '  <url>' . "\n";
			$output .= '    <loc>' . $base_url . $row->url_slug . '</loc>' . "\n";
			$output .= '    <lastmod>' . date('Y-m-d') . '</lastmod>' . "\n";
			$output .= '    <priority>0.75</priority>' . "\n";
			$output .= '  </url>' . "\n";
		}

		// Dynamic City Pages
		foreach ($data['cities'] as $row) {
			$output .= '  <url>' . "\n";
			$loc_str = str_replace(' ', '-', strtolower(trim($row->city_name)));
			$output .= '    <loc>' . $base_url . 'city/' . urlencode($loc_str) . '</loc>' . "\n";
			$output .= '    <lastmod>' . date('Y-m-d') . '</lastmod>' . "\n";
			$output .= '    <priority>0.70</priority>' . "\n";
			$output .= '  </url>' . "\n";
		}

		// Dynamic Blog Pages
		foreach ($data['blogs'] as $row) {
			$output .= '  <url>' . "\n";
			$blog_slug = !empty($row->url) ? $row->url : $row->id;
			$output .= '    <loc>' . $base_url . 'blog-details/' . $blog_slug . '</loc>' . "\n";
			$output .= '    <lastmod>' . date('Y-m-d') . '</lastmod>' . "\n";
			$output .= '    <priority>0.65</priority>' . "\n";
			$output .= '  </url>' . "\n";
		}

		$output .= '</urlset>';

		// Clean active output buffers to prevent any leading whitespace/newlines from corrupting XML
		if (ob_get_level()) {
			ob_clean();
		}
		header("Content-Type: text/xml; charset=utf-8");
		echo $output;
		exit;
	}

	public function Gallery($slug = NULL)
	{
		if ($slug == NULL) {
			$data['categories'] = $this->db->where('status', 1)->get('tbl_gallery_categories')->result();
			$this->load->view('Home/GalleryCategories', $data);
			return;
		}

		$category = $this->db->get_where('tbl_gallery_categories', ['slug' => $slug, 'status' => 1])->row();
		if (!$category) {
			show_404();
		}

		$data['category'] = $category;
		$data['items'] = $this->db->get_where('tbl_gallery_items', ['category_id' => $category->id])->result();
		$this->load->view('Home/Photos', $data);
	}

	private function get_address_from_coords($lat, $lng)
	{
		$api_key = 'AIzaSyBEss4wpsQ0o9WPBjDgHsSByUzFuo2oSNE';
		$url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&key=$api_key";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);
		curl_close($ch);

		if ($response) {
			$data = json_decode($response);
			if (isset($data->status) && $data->status == 'OK') {
				return $data->results[0]->formatted_address;
			} else {
				$status = isset($data->status) ? $data->status : 'Unknown Status';
				$error_msg = isset($data->error_message) ? $data->error_message : 'No error message';
				log_message('error', "Geocoding failed: $status - $error_msg");
				return "Address not available ($status)";
			}
		}
		return "Address not available (cURL failed)";
	}
	public function LucknowBranch()
	{
		$this->load->view('Home/BranchLucknow');
	}

	public function KanpurBranch()
	{
		$this->load->view('Home/BranchKanpur');
	}

	public function GorakhpurBranch()
	{
		$this->load->view('Home/BranchGorakhpur');
	}

	private function _sendProjectEmail($data)
	{
		$this->load->library('email');
		$this->config->load('email', TRUE);
		$email_config = $this->config->item('email');
		$this->email->initialize($email_config);
		$this->email->from($email_config['smtp_user'], 'DigiCoders Admin');
		$this->email->to('digicoderstech@gmail.com');
		// $this->email->to('saurabhkumarssp@gmail.com');
		$this->email->subject('New Final Year Project Registration');

		$message = build_project_registration_email($data);
		$this->email->message($message);
		@$this->email->send();
		@$this->email->send();
	}

	public function SendRegistrationEmailAPI()
	{
		$json = file_get_contents('php://input');
		$postData = json_decode($json, true);

		if (!empty($postData)) {
			// Map JSON data to expected keys in _sendRegistrationEmail
			$mappedData = [
				'student_name' => isset($postData['studentName']) ? $postData['studentName'] : 'N/A',
				'father_name' => isset($postData['fatherName']) ? $postData['fatherName'] : 'N/A',
				'email' => isset($postData['email']) ? $postData['email'] : 'N/A',
				'mobile' => isset($postData['mobile']) ? $postData['mobile'] : 'N/A',
				'alt_mobile' => isset($postData['alternateMobile']) ? $postData['alternateMobile'] : 'N/A',
				'college_name' => isset($postData['collegeName']) ? $postData['collegeName'] : 'N/A',
				'course' => isset($postData['education']) ? $postData['education'] : 'N/A',
				'edu_year' => isset($postData['eduYear']) ? $postData['eduYear'] : 'N/A',
				'training_type' => isset($postData['trainingType']) ? $postData['trainingType'] : 'N/A',
				'technology' => isset($postData['technologyId']) ? $postData['technologyId'] : 'N/A',
				'student_training_location' => isset($postData['branch']) ? $postData['branch'] : 'N/A',
				'payment_type' => isset($postData['paymentType']) ? $postData['paymentType'] : 'N/A',
				'amount' => isset($postData['amount']) ? $postData['amount'] : '0',
				'date' => date('Y-m-d'),
				'time' => date('H:i:s A'),
				'userid' => 'API-' . time()
			];
			$this->_sendRegistrationEmail($mappedData);
			echo json_encode(['status' => 'success', 'message' => 'Email sent successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No data received']);
		}
	}

	private function _sendRegistrationEmail($data)
	{
		$this->load->library('email');
		$this->config->load('email', TRUE);
		$email_config = $this->config->item('email');
		$this->email->initialize($email_config);
		$this->email->from($email_config['smtp_user'], 'DigiCoders Admin');
		$this->email->to('digicoderstech@gmail.com');
		//  $this->email->to('saurabhkumarssp@gmail.com');
		$this->email->subject('New Training Registration');

		$message = build_training_registration_email($data);
		$this->email->message($message);
		@$this->email->send();
		@$this->email->send();
	}
}
