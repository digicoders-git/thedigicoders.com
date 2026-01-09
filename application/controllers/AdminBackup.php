<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	
	class Admin extends MY_Controller
	{
		
		public function __construct()
		{
			
			parent::__construct();
			if ($this->session->userdata('AdminEmail') && $this->session->userdata('AdminEmail')) {
				} else {
				redirect(base_url('Home/Login'));
			}
		}
		
		
		public function Test()
		{
			// $res = $this->db->order_by('id','desc')->get('users')->result();
			// $res=$this->db->query("ALTER TABLE `fee_deposit` ADD `application_for` VARCHAR(200) NOT NULL AFTER `time`, ADD `technology` VARCHAR(200) NOT NULL AFTER `application_for`, ADD `course` VARCHAR(200) NOT NULL AFTER `technology`, ADD `year` VARCHAR(200) NOT NULL AFTER `course`, ADD `due_amount` VARCHAR(200) NOT NULL AFTER `year`, ADD `paid_to` VARCHAR(200) NOT NULL AFTER `due_amount`, ADD `college` TEXT NOT NULL AFTER `paid_to`, ADD `today_date` VARCHAR(100) NOT NULL AFTER `college`, ADD `account_of` VARCHAR(200) NOT NULL AFTER `today_date`, ADD `payment_mode` VARCHAR(200) NOT NULL AFTER `account_of`, ADD `include` VARCHAR(200) NOT NULL AFTER `payment_mode`, ADD `authorization` VARCHAR(200) NOT NULL AFTER `include`");
			// $res=$this->db->query("ALTER TABLE `fee_deposit` DROP `course`");
			// $res=$this->db->query("ALTER TABLE `fee_deposit` DROP `year`");
			// $res=$this->db->query("ALTER TABLE `fee_deposit` DROP `due_amount`");
			// $res=$this->db->query("ALTER TABLE `fee_deposit` DROP `paid_to`");
			// $res=$this->db->query("ALTER TABLE `fee_deposit` DROP `college`");
			// $res=$this->db->query("ALTER TABLE `fee_deposit` DROP `today_date`");
			// $res=$this->db->query("ALTER TABLE `fee_deposit` DROP `account_of`");
			// $res=$this->db->query("ALTER TABLE `fee_deposit` DROP `sr_no`");
			// $res=$this->db->query("select * from admin_login")->result();
			// $res=$this->db->query("UPDATE admin_login SET password = '2953178f7cb8357132e56752b6fd49b8' WHERE id = '2'");
			// $res=$this->db->query("");
			// $res=$this->db->query("select * from registration")->result();
			$res=$this->db->query("select * from tbl_batch")->result();
			// $res=$this->db->query("truncate tbl_assignment");
			// $res=$this->db->query("select * from tbl_assignment")->result();
			// $res=$this->db->query("select * from tbl_teacher")->result();
			// $res=$this->db->query("update tbl_batch set teacher_id='2' where id='2'");
			echo "<pre>";
			var_dump($res);
			// die();
		}
		
		#Manage Setting 
		public function ManageSetting()
		{
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'AddFormElement') {
					$this->form_validation->set_rules('field', 'Form Fiels', 'required');
					$this->form_validation->set_rules('value', 'Form Value', 'required');
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "All Fields Required", "title" => "", "reload" => "false", "redirect" => 'false'));
						} else {
						$data_arr = [
                        "field_name" => $this->input->post('field'),
                        "value" => $this->input->post('value'),
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time']
						];
						
						if ($this->db->insert('form_element', $data_arr)) {
							echo json_encode(array("status" => "success", "msg" => "Field Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
							} else {
							echo json_encode(array("status" => "error", "msg" => "Somethig Went Wrong", "title" => "", "reload" => "false", "redirect" => 'false'));
						}
					}
				}
				if ($this->uri->segment(3) == 'Update') {
					
					$this->form_validation->set_rules('id', 'ID', 'required');
					$this->form_validation->set_rules('field', 'Form Fiels', 'required');
					$this->form_validation->set_rules('value', 'Form Value', 'required');
					if ($this->form_validation->run() == false) {
						echo "Validation Error";
						} else {
						$data_arr = [
                        "field_name" => $this->input->post('field'),
                        "value" => $this->input->post('value'),
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time']
						];
						$id = $this->input->post('id');
						$this->db->where('id', $id);
						if ($this->db->update('form_element', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Register Element Successfully updated");
							redirect(base_url('Admin/ManageSetting'));
							} else {
							$this->session->set_flashdata("status", "error");
							$this->session->set_flashdata("msg", "Somethig went Wrong ");
							redirect(base_url('Admin/ManageSetting'));
						}
						
					}
					
					
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'desc')->get('form_element')->result();
				$this->load->view('Admin/Setting.php', $data);
			}
			
		}
		
		## manage Assignment 
		// public function ManageAssignment()
		// {
		// $this->load->view("Admin/ManageAssignment");
		// }
		
		
		
		public function ManageAssignment()
		{
			$data['assignment'] = $this->db->order_by('id', 'desc')->get('tbl_assignment')->result(); 
			
			if ($this->uri->segment(3)) 
			{
				if ($this->uri->segment(3) == 'Add') {
					if (empty($_FILES['image']['name'])) {
						echo json_encode(array("status" => "error", "msg" => "Image Required.", "title" => "", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = 'true';
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_assignment" . "." . $ext;
						
						$config['upload_path'] = './public/uploads/assignment/';
						$config['allowed_types'] = 'jpg|png|jpeg|jfif|pdf';
						$config['max_size'] = 9024; 
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						$data_arr = array(
						"image" => $filename,
						"batch_id" => $this->input->post('batch_id'), 
						"title" => $this->input->post('title'),
						"due_date" => $this->input->post('due_date') 
						);
						
						if ($upload_status == "true") {
							if ($this->db->insert('tbl_assignment', $data_arr)) { // Changed table name to 'assignment'
								echo json_encode(array("status" => "success", "msg" => "Assignment Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
							}
						}
					}
				}
				
				// Updating an existing assignment entry
				if ($this->uri->segment(3) == 'Update') {
					// Fetching the existing data
					$userdata = $this->db->get_where('tbl_assignment', array('id' => $this->input->post('id')))->row();
					$old_img = $userdata->image;
					$upload_status = 'true';
					$filename = $old_img; // Default to old image if no new image is uploaded
					
					// Check if a new image is uploaded
					if (!empty($_FILES['image']['name'])) {
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_assignment" . "." . $ext;
						
						// File upload configuration
						$config['upload_path'] = './public/uploads/assignment/';
						$config['allowed_types'] = 'jpg|png|jpeg|pdf';
						$config['max_size'] = 9024; // 9 MB
						$config['file_name'] = $filename;
						
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						
						// Try to upload the file
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false"; // File upload failed
							} else {
							$upload_status = "true"; // File upload succeeded
						}
					}
					
					// Data array to update the assignment
					$data_arr = array(
					"image" => $filename,
					"batch_id" => $this->input->post('batch_id'),
					"title" => $this->input->post('title'),
					"due_date" => $this->input->post('due_date')
					);
					
					// Proceed only if file upload was successful or no new file was uploaded
					if ($upload_status == 'true') 
					{
						if ($this->db->where('id', $userdata->id)->update('tbl_assignment', $data_arr)) 
						{
							if (!empty($_FILES['image']['name'])) {
								unlink('./public/uploads/assignment/' . $old_img); 
							}
							
							// Send success JSON response instead of redirect
							echo json_encode(array(
							"status" => "success",
							"msg" => "Assignment Successfully Updated",
							"title" => "",
							"reload" => "true",
							"redirect" => "false"
							));
							} else {
							// Send error JSON response
							echo json_encode(array(
							"status" => "error",
							"msg" => "Something Went Wrong",
							"title" => "Update Failed",
							"reload" => "false",
							"redirect" => "false"
							));
						}
						} else {
						// Send file upload failure response
						echo json_encode(array(
						"status" => "error",
						"msg" => "File Upload Failed",
						"title" => "Upload Error",
						"reload" => "false",
						"redirect" => "false"
						));
					}
				}
				
				} else {
				$this->load->view('Admin/ManageAssignment', $data);
			}
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		## manage StudentVideo 
		public function StudentVideo()
		{
			$this->load->view("Admin/StudentVideo");
		}
		## manage UploadPhotos 
		public function UploadPhotos()
		{
			$this->load->view("Admin/UploadPhotos");
		}
		
		## manege News 
		public function ManageNews()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get('news')->result();
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					if (empty($_FILES['image']['name'])) {
						echo json_encode(array("status" => "error", "msg" => "Image Required.", "title" => "", "reload" => "false", "redirect" => 'false'));
						
						} else {
						$upload_status = 'true';
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_news" . "." . $ext;
						
						$config['upload_path'] = './public/uploads/news/';
						$config['allowed_types'] = 'jpg|png|jpeg|jfif';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						
						$data_arr = array(
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time']
						);
						
						if ($upload_status = "true") {
							if ($this->db->insert('news', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "News Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
								// echo "success";
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
								// echo "failed";
							}
						}
					}
				}
				} else {
				$this->load->view('Admin/News', $data);
			}
		}
		
		## View Webinar Registration 
		public function WebinarRegistration()
		{
			$webinar_id = $this->uri->segment(3);
			$complete_status = $this->uri->segment(4);
			$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('webinar_registration', array("webinar_id" => $webinar_id))->result();
			$this->load->view('Admin/WebinarRegistration', $data);
			
		}
		
		## manage WhatsAppGroup
		public function WhatsAppGroup()
		{
			if ($this->uri->segment(3)) {
				$this->form_validation->set_rules('grouplink', 'Group Link', 'required');
				if ($this->form_validation->run() == false) {
					echo json_encode(array("status" => "error", "msg" => "Validation Error", "title" => "", "reload" => "false", "redirect" => 'false'));
					} else {
					$data_arr = [
                    'url' => $this->input->post('grouplink'),
                    'status' => 'true',
                    'date' => $this->data['date'],
                    'time' => $this->data['time']
					
					];
					
					$data = $this->db->get('whatsapp_group');
					if ($data->num_rows()) {
						$result = $data->row();
						$id = $result->id;
						if ($this->db->update('whatsapp_group', $data_arr)) {
							echo json_encode(array("status" => "success", "msg" => "WhatsApp Link Successfully Added.", "title" => "", "reload" => "false", "redirect" => 'false'));
							} else {
							echo json_encode(array("error" => "error", "msg" => "Something Went Wrong.", "title" => "", "reload" => "false", "redirect" => 'false'));
						}
						} else {
						if ($this->db->insert('whatsapp_group', $data_arr)) {
							echo json_encode(array("status" => "success", "msg" => "Whatsapp Link Successfully Updated.", "title" => "", "reload" => "false", "redirect" => 'false'));
							} else {
							echo json_encode(array("error" => "error", "msg" => "Something Went Wrong.", "title" => "", "reload" => "false", "redirect" => 'false'));
						}
					}
					
					
				}
				} else {
				$userdata['data'] = $this->db->get('whatsapp_group')->row();
				$this->load->view('Admin/WhatsappGroup', $userdata);
			}
		}
		
		## manage Banner
		public function ManageBanner()
		{
			if ($this->uri->segment(3)) {
				if (empty($_FILES['image']['name'])) {
					$this->form_validation->set_rules('image', 'Banner', 'required');
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validation Error", "title" => "", "reload" => "false", "redirect" => 'false'));
					}
					} else {
					$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
					$banner = md5(time()) . "_Banner" . "." . $ext;
					$config['upload_path'] = './public/uploads/banner/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 8024; // In KB
					$filesize = $config['max_size'];
					$config['file_name'] = $banner;
					// image upload code initilization
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('image')) {
						$upload_banner = "false";
						} else {
						$upload_banner = "true";
					}
					
					$data_arr = array(
                    "image" => $banner,
                    "status" => 'true',
                    "date" => $this->data['date'],
                    "time" => $this->data['time']
					);
					
					if ($this->db->insert('banner', $data_arr)) {
						echo json_encode(array("status" => "success", "msg" => "Banner Successfully Added.", "title" => "", "reload" => "false", "redirect" => 'false'));
						} else {
						echo json_encode(array("error" => "error", "msg" => "Something Went Wrong.", "title" => "", "reload" => "false", "redirect" => 'false'));
					}
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('banner', array("status" => "true"))->result();
				$this->load->view('Admin/Banner', $data);
			}
		}
		
		
		
		## manage expert
		public function expert()
		{
			
			if ($this->uri->segment(3)) {
				
				
				if (empty($_FILES['image']['name'])) {
					$this->form_validation->set_rules('image', 'teamexpert', 'required');
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validation Error", "title" => "", "reload" => "false", "redirect" => 'false'));
					}
					} else {
					$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
					$expert = md5(time()) . "_expert" . "." . $ext;
					$config['upload_path'] = './public/uploads/teamexpert/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 8024; // In KB
					$filesize = $config['max_size'];
					$config['file_name'] = $expert;
					// image upload code initilization
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('image')) {
						$upload_banner = "false";
						} else {
						$upload_banner = "true";
					}
					
					$data_arr = array(
                    "image" => $expert,
                    "Display_status`" => 'true',
                    "date" => $this->data['date'],
                    "time" => $this->data['time']
					);
					
					if ($this->db->insert('teamexpert', $data_arr)) {
						echo json_encode(array("status" => "success", "msg" => "teamexpert Successfully Added.", "title" => "", "reload" => "false", "redirect" => 'false'));
						} else {
						echo json_encode(array("error" => "error", "msg" => "Something Went Wrong.", "title" => "", "reload" => "false", "redirect" => 'false'));
					}
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('teamexpert', array("Display_status`" => "true"))->result();
				$this->load->view('Admin/expert', $data);
			}
		}
		
		## Manage Webinar 
		public function ManageWebinar()
		{
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					$this->form_validation->set_rules('college_name', 'College Name', 'required');
					$this->form_validation->set_rules('college_code', 'College Code', 'required');
					$this->form_validation->set_rules('webinar_date', 'Webinar Date ', 'required');
					$this->form_validation->set_rules('webinar_date', 'Webinar Date ', 'required');
					$this->form_validation->set_rules('duration', 'Webinar Duration ', 'required');
					$this->form_validation->set_rules('topic', 'Topic', 'required');
					$this->form_validation->set_rules('speaker', 'Speaker', 'required');
					$this->form_validation->set_rules('about_speaker', 'About The speaker', 'required');
					$this->form_validation->set_rules('plateform', 'Plateform', 'required');
					if (empty($_FILES['image']['name']) || empty($_FILES['logo']['name']) || empty($_POST['addmore'])) {
						$this->form_validation->set_rules('image', 'Banner', 'required');
						$this->form_validation->set_rules('logo', 'Logo', 'required');
						$this->form_validation->set_rules('addmore', 'About Webinar', 'required');
					}
					
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validation Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
					}
					
					$aboutwebinar = $this->input->post('addmore');
					$about_arr = implode(',', $aboutwebinar);
					if (!empty($_FILES['image']['name'])) {
						if (!empty($_FILES['logo']['name'])) {
							$this->load->library('upload');
							//upload Banner
							$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
							$banner = md5(time()) . "_webinarBanner" . "." . $ext;
							$config['upload_path'] = './public/uploads/webinar/';
							$config['allowed_types'] = 'jpg|png|jpeg';
							$config['max_size'] = 8024; // In KB
							$filesize = $config['max_size'];
							$config['file_name'] = $banner;
							$this->upload->initialize($config);
							if (!$this->upload->do_upload('image')) {
								$upload_banner = "false";
								} else {
								$upload_banner = "true";
							}
							
							//upload college logo
							$ext2 = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
							$logo = md5(time()) . "_collegeLogo" . "." . $ext2;
							$config0['upload_path'] = './public/uploads/webinar/';
							$config0['allowed_types'] = 'jpg|png|jpeg';
							$config0['max_size'] = 8024; // In KB
							$filesize = $config0['max_size'];
							$config0['file_name'] = $logo;
							$this->upload->initialize($config0);
							if (!$this->upload->do_upload('logo')) {
								$upload_logo = "false";
								} else {
								$upload_logo = "true";
							}
						}
					}
					
					$data_arr = array(
                    "college_name" => $this->input->post('college_name'),
                    "college_code" => $this->input->post('college_code'),
                    "webinar_date" => $this->input->post('webinar_date'),
                    "duration" => $this->input->post('duration'),
                    "topic" => $this->input->post('topic'),
                    "speaker" => $this->input->post('speaker'),
                    "about_speaker" => $this->input->post('about_speaker'),
                    "about_webinar" => $about_arr,
                    "plateform" => $this->input->post('plateform'),
                    "image" => $banner,
                    "college_logo" => $logo,
                    "status" => 'true',
                    "complete_status" => 'false',
                    "date" => $this->data['date'],
                    "time" => $this->data['time']
					);
					
					if ($upload_logo = 'true' && $upload_banner = "true") {
						if ($this->db->insert('webinar', $data_arr)) {
							echo json_encode(array("status" => "success", "msg" => "Webinar Successfully Added.", "title" => "", "reload" => "false", "redirect" => 'false'));
							} else {
							echo json_encode(array("error" => "error", "msg" => "Something Went Wrong.", "title" => "", "reload" => "false", "redirect" => 'false'));
						}
						} else {
						echo json_encode(array("status" => "error", "msg" => "Logo Not Upload .", "title" => "", "reload" => "false", "redirect" => 'false'));
					}
				}
				
				if ($this->uri->segment(3) == 'Update') {
					
					$this->form_validation->set_rules('id', 'ID', 'required');
					$this->form_validation->set_rules('college_name', 'College Name', 'required');
					$this->form_validation->set_rules('college_code', 'College Code', 'required');
					$this->form_validation->set_rules('webinar_date', 'Webinar Date ', 'required');
					$this->form_validation->set_rules('duration', 'Webinar Duration ', 'required');
					$this->form_validation->set_rules('topic', 'Topic', 'required');
					$this->form_validation->set_rules('speaker', 'Speaker', 'required');
					$this->form_validation->set_rules('about_speaker', 'About The speaker', 'required');
					$this->form_validation->set_rules('plateform', 'Plateform', 'required');
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validation Error", "title" => "Validation Error", "reload" => "false", "redirect" => 'false'));
						} else {
						$this->load->library('upload');
						$userdata = $this->db->get_where('webinar', array("id" => $this->input->post('id')))->row();
						if (empty($_FILES['image']['name'])) {
							$banner = $userdata->image;
						}
						if (empty($_FILES['logo']['name'])) {
							$logo = $userdata->college_logo;
						}
						if (empty($_POST['addmore'])) {
							$about_arr = implode(',', $userdata->about_webinar);
							
							} else {
							$about_arr = implode(',', $this->input->post('addmore'));
						}
						
						
						if (!empty($_FILES['logo']['name'])) {
							$this->load->library('upload');
							//upload Banner
							$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
							$banner = md5(time()) . "_webinarBanner" . "." . $ext;
							$config['upload_path'] = './public/uploads/webinar/';
							$config['allowed_types'] = 'jpg|png|jpeg';
							$config['max_size'] = 8024; // In KB
							$filesize = $config['max_size'];
							$config['file_name'] = $banner;
							$this->upload->initialize($config);
							if (!$this->upload->do_upload('image')) {
								$upload_banner = "false";
								} else {
								$upload_banner = "true";
								unlink('./public/uploads/webinar/' . $userdata->image);
								
							}
						}
						
						if (!empty($_FILES["logo"]["name"])) {
							//upload college logo
							$ext2 = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
							$logo = md5(time()) . "_collegeLogo" . "." . $ext2;
							$config0['upload_path'] = './public/uploads/webinar/';
							$config0['allowed_types'] = 'jpg|png|jpeg';
							$config0['max_size'] = 8024; // In KB
							$filesize = $config0['max_size'];
							$config0['file_name'] = $logo;
							$this->upload->initialize($config0);
							if (!$this->upload->do_upload('logo')) {
								$upload_logo = "false";
								} else {
								$upload_logo = "true";
								unlink('./public/uploads/webinar/' . $userdata->college_logo);
							}
						}
						
						
						
						
						$data_arr = array(
                        "college_name" => $this->input->post('college_name'),
                        "college_code" => $this->input->post('college_code'),
                        "webinar_date" => $this->input->post('webinar_date'),
                        "duration" => $this->input->post('duration'),
                        "topic" => $this->input->post('topic'),
                        "speaker" => $this->input->post('speaker'),
                        "about_speaker" => $this->input->post('about_speaker'),
                        "about_webinar" => $about_arr,
                        "plateform" => $this->input->post('plateform'),
                        "image" => $banner,
                        "college_logo" => $logo,
                        "status" => 'true',
                        "complete_status" => 'false',
                        "date" => $this->data['date'],
                        "time" => $this->data['time']
						);
						
						
						if ($upload_logo = 'true' && $upload_banner = "true") {
							if ($this->db->where('id', $userdata->id)->update('webinar', $data_arr)) {
								
								$this->session->set_flashdata("status", "success");
								$this->session->set_flashdata("msg", "Webinar Successfully updated");
								redirect(base_url('Admin/ManageWebinar'));
								} else {
								$this->session->set_flashdata("status", "error");
								$this->session->set_flashdata("msg", "Something Went Wrong ");
								redirect(base_url('Admin/ManageWebinar'));
							}
							} else {
							echo json_encode(array("status" => "error", "msg" => "Logo Not Upload .", "title" => "", "reload" => "false", "redirect" => 'false'));
						}
						
					}
					
					
					
				}
				} else {
				$data['csfalse'] = $this->db->order_by('id', 'desc')->get_where('webinar', array('complete_status' => 'false'))->result();
				$data['cstrue'] = $this->db->order_by('id', 'desc')->get_where('webinar', array('complete_status' => 'true'))->result();
				$this->load->view('Admin/ManageWebinar', $data);
			}
		}
		
		##Admin Logout
		public function logout()
		{
			if ($this->uri->segment(3) == "logout" && $this->input->is_ajax_request()) {
				
				if (!empty($this->session->userdata('AdminEmail'))) {
					$email = $this->session->userdata('AdminEmail');
					$data_arr = array(
                    "logout_date" => $this->data['date'],
                    "logout_time" => $this->data['time'],
                    "status" => 'false'
					);
					if ($this->db->where('email', $email)->update('admin_login', $data_arr)) {
						$this->session->sess_destroy();
						echo json_encode(array("status" => "success", "msg" => "Session destroy", "title" => "Welcome", "reload" => "false", "redirect" => 'true', "redirectLink" => base_url('Home/Login')));
					}
					} else {
					echo "session not found";
				}
			}
		}
		
		public function ManageFAQ()
		{
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					$this->form_validation->set_rules('question', 'Question', 'required');
					$this->form_validation->set_rules('answer', 'Answer', 'required|trim');
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validation Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$data_arr = array(
                        "question" => $this->input->post('question'),
                        "answer" => $this->input->post('answer'),
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time']
						);
						
						if ($this->db->insert('faq', $data_arr)) {
							echo json_encode(array("status" => "success", "msg" => "FAQ Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
							} else {
							echo json_encode(array("status" => "error", "msg" => "Something went wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						}
					}
				}
				if ($this->uri->segment(3) == 'Update') {
					$this->form_validation->set_rules('id', 'ID', 'required');
					$this->form_validation->set_rules('question', 'Question', 'required');
					$this->form_validation->set_rules('answer', 'Answer', 'required|trim');
					if ($this->form_validation->run() == false) {
						$this->session->set_flashdata("status", "error");
						$this->session->set_flashdata("msg", "Form Validation Error");
						redirect(base_url('Admin/ManageFAQ'));
						// echo json_encode(array("status" => "error", "msg" => "Validation Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$data_arr = array(
                        "question" => $this->input->post('question'),
                        "answer" => $this->input->post('answer'),
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time']
						);
						
						if ($this->db->where('id', $this->input->post('id'))->update('faq', $data_arr)) {
							// echo "updated";
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "FAQ Successfully Updated");
							redirect(base_url('Admin/ManageFAQ'));
							} else {
							echo "err";
							$this->session->set_flashdata("status", "error");
							$this->session->set_flashdata("msg", "Somethig Went wrong");
							redirect(base_url('Admin/ManageFAQ'));
						}
					}
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'desc')->get('faq')->result();
				$this->load->view('Admin/FAQ', $data);
			}
		}
		
		
		//Admin Proifile
		public function profile()
		{
			$data['userdata'] = $this->db->get('admin_login')->result();
			$data['logindata'] = $this->db->order_by('LoginID', 'desc')->get('tbl_adminlogindetails')->result();
			$this->load->view('Admin/Profile', $data);
		}
		
		##Change Password
		public function ManagePassword()
		{
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'ChangePassword') {
					$this->form_validation->set_rules('oldPassword', 'Old Password', 'required');
					$this->form_validation->set_rules('newPassword', 'New Password', 'required');
					$this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required');
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validation Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$oldPassword = $this->input->post('oldPassword');
						$oldPassword = md5($oldPassword);
						$confirmPassword = $this->input->post('confirmPassword');
						$newPassword = $this->input->post('newPassword');
						if ($confirmPassword == $newPassword) {
							$newPassword = md5($newPassword);
							//select data form table 
							$query = $this->db->get_where('admin_login', array("password" => $oldPassword));
							if ($query->num_rows() > 0) {
								$data_arr = array(
                                "password" => $newPassword
								);
								
								if ($this->db->update('admin_login', $data_arr)) {
									echo json_encode(array("status" => "success", "msg" => "Password Successfully Changed.", "title" => "Changed!", "reload" => "true", "redirect" => 'false'));
									} else {
									echo json_encode(array("status" => "error", "msg" => "Something Went Wrong.", "title" => "Error!", "reload" => "false", "redirect" => 'false'));
								}
								} else {
								echo json_encode(array("status" => "error", "msg" => "Try ! Again , Old Password Not Matched.", "title" => "Error!", "reload" => "false", "redirect" => 'false'));
							}
							} else {
							//    echo "confirm password not match";
							echo json_encode(array("status" => "error", "msg" => "Confirm Password not matched", "title" => "Try ! Again, Confirm Password not match.", "reload" => "false", "redirect" => 'false'));
						}
					}
				}
				
				if ($this->uri->segment(3) == 'ChangeEmail') {
					$this->form_validation->set_rules('oldEmail', 'Old Email', 'required');
					$this->form_validation->set_rules('newEmail', 'New Email', 'required');
					$this->form_validation->set_rules('confirmEmail', 'Confirm Email', 'required');
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validation Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$oldEmail = $this->input->post('oldEmail');
						
						$confirmEmail = $this->input->post('confirmEmail');
						$newEmail = $this->input->post('newEmail');
						if ($confirmEmail == $newEmail) {
							
							//select data form table 
							$query = $this->db->get_where('admin_login', array("email" => $oldEmail));
							if ($query->num_rows() > 0) {
								$data_arr = array(
                                "email" => $newEmail
								);
								
								if ($this->db->update('admin_login', $data_arr)) {
									echo json_encode(array("status" => "success", "msg" => "Email Successfully Changed.", "title" => "Changed!", "reload" => "true", "redirect" => 'false'));
									} else {
									echo json_encode(array("status" => "error", "msg" => "Something Went Wrong.", "title" => "Error!", "reload" => "false", "redirect" => 'false'));
								}
								} else {
								echo json_encode(array("status" => "error", "msg" => "Try ! Again , Old Password Not Matched.", "title" => "Error!", "reload" => "false", "redirect" => 'false'));
							}
							} else {
							//    echo "confirm password not match";
							echo json_encode(array("status" => "error", "msg" => "Confirm Password not matched", "title" => "Try ! Again, Confirm Password not match.", "reload" => "false", "redirect" => 'false'));
						}
					}
				}
				} else {
				$this->load->view('Admin/ChangePassword');
			}
		}
		
		##Change ChangeTnxPassword
		public function ChangeTnxPassword()
		{
			$this->form_validation->set_rules('opass', 'Old Password', 'required');
			$this->form_validation->set_rules('npass', 'New Password', 'required');
			$this->form_validation->set_rules('cpass', 'Confirm Password', 'required');
			if ($this->form_validation->run() == false) {
				echo json_encode(array("status" => "error", "msg" => "Validation Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
				} else {
				$oldPassword = $this->input->post('opass');
				// var_dump($oldPassword);
				// die();
				$oldPassword = md5($oldPassword);
				$confirmPassword = $this->input->post('cpass');
				$newPassword = $this->input->post('npass');
				if ($confirmPassword == $newPassword) {
					$newPassword = md5($newPassword);
					//select data form table 
					$query = $this->db->get_where('admin_login', array("tnx_password" => $oldPassword));
					if ($query->num_rows() > 0) {
						$data_arr = array(
                        "tnx_password" => $newPassword
						);
						
						if ($this->db->update('admin_login', $data_arr)) {
							echo json_encode(array("status" => "success", "msg" => "Tnx Password Successfully Changed.", "title" => "Changed!", "reload" => "true", "redirect" => 'true'));
							} else {
							echo json_encode(array("status" => "error", "msg" => "Something Went Wrong.", "title" => "Error!", "reload" => "true", "redirect" => 'true'));
						}
						} else {
						echo json_encode(array("status" => "error", "msg" => "Try ! Again , Old Password Not Matched.", "title" => "Error!", "reload" => "true", "redirect" => 'true'));
					}
					} else {
					//    echo "confirm password not match";
					echo json_encode(array("status" => "error", "msg" => "Confirm Password not matched", "title" => "Try ! Again, Confirm Password not match.", "reload" => "false", "redirect" => 'false'));
				}
			}
			
			
		}
		
		##Manage Registration New
		public function Registration()
		{
			// if(isset($_REQUEST['from']) && isset($_REQUEST['to'])){
			// $data['userdata'] = $this->db->order_by('id', 'desc')->get_where('registration',array('accept_status'=>'pending','date >='=>$_REQUEST['from'],'date <='=>$_REQUEST['to']))->result();
			// }
			// else if(isset($_REQUEST['action'])=='Failed'){
			// $data['userdata'] = $this->db->order_by('id', 'desc')->where(array('accept_status'=>'pending','txn_status'=>'FAILED'))->or_where(array('accept_status'=>'pending','txn_status'=>'PENDING'))->get('registration')->result();
			// $data['userdata'] = $this->db->query("select * from registration where accept_status='pending' and txn_status='FAILED' or txn_status='PENDING' order by id desc")->result();
			// }
			// else if(isset($_REQUEST['action1'])=='PAID'){
			// $data['userdata'] = $this->db->order_by('id', 'desc')->get_where('registration',array('accept_status'=>'pending','txn_status'=>'PAID'))->result();
			// }
			// else if(isset($_REQUEST['action2'])=='SUCCESS'){
			// $data['userdata'] = $this->db->order_by('id', 'desc')->get_where('registration',array('accept_status'=>'pending','txn_status'=>'SUCCESS'))->result();
			// }
			if (isset($_REQUEST['tnxstatus'])) {
				$tnxstatus = $_REQUEST['tnxstatus'];
				if ($tnxstatus == 'PAID') {
					$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('registration', array('accept_status' => 'pending', 'txn_status' => 'PAID'))->result();
					} else if ($tnxstatus == 'SUCCESS') {
					$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('registration', array('accept_status' => 'pending', 'txn_status' => 'SUCCESS'))->result();
					} else {
					$data['userdata'] = $this->db->query("select * from registration where accept_status='pending' and txn_status='FAILED' or txn_status='PENDING' order by id desc")->result();
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('registration', array('accept_status' => 'pending'))->result();
			}
			$this->load->view("Admin/Registration", $data);
		}
		#Registeer Accepted
		public function RegistrationAccepted()
		{
			
			/*if(isset($_REQUEST['from']) && isset($_REQUEST['to'])){
				$data['accepttdata'] = $this->db->order_by('id', 'desc')->get_where('registration',array('accept_status'=>'accept','date >='=>$_REQUEST['from'],'date <='=>$_REQUEST['to']))->result();
				}
				else if(isset($_REQUEST['action'])=='Failed'){
				
				$data['accepttdata'] = $this->db->query("select * from registration where accept_status='accept' and txn_status='FAILED' or txn_status='PENDING' order by id desc")->result();
				}
				else if(isset($_REQUEST['action1'])=='PAID'){
				$data['accepttdata'] = $this->db->order_by('id', 'desc')->get_where('registration',array('accept_status'=>'accept','txn_status'=>'PAID'))->result();
				}
				else if(isset($_REQUEST['action2'])=='SUCCESS'){
				$data['accepttdata'] = $this->db->order_by('id', 'desc')->get_where('registration',array('accept_status'=>'accept','txn_status'=>'SUCCESS'))->result();
			}*/
			if (isset($_REQUEST['tnxstatus'])) {
				$tnxstatus = $_REQUEST['tnxstatus'];
				if ($tnxstatus == 'PAID') {
					$data['accepttdata'] = $this->db->order_by('id', 'desc')->get_where('registration', array('accept_status' => 'accept', 'txn_status' => 'PAID'))->result();
					} else if ($tnxstatus == 'SUCCESS') {
					$data['accepttdata'] = $this->db->order_by('id', 'desc')->get_where('registration', array('accept_status' => 'accept', 'txn_status' => 'SUCCESS'))->result();
					} else {
					$data['accepttdata'] = $this->db->query("select * from registration where accept_status='accept' and txn_status='FAILED' or txn_status='PENDING' order by id desc")->result();
				}
				} else {
				$data['accepttdata'] = $this->db->order_by('id', 'desc')->get_where('registration', array('accept_status' => 'accept'))->result();
			}
			$this->load->view("Admin/RegistrationAccepted", $data);
		}
		
		
		#Export Contact
		public function ExportContact()
		{
			if (isset($_REQUEST['tnxstatus'])) {
				$tnxstatus = $_REQUEST['tnxstatus'];
				if ($tnxstatus == 'PAID') {
					$data['accepttdata'] = $this->db->order_by('id', 'desc')->get_where('registration', array('accept_status' => 'accept', 'txn_status' => 'PAID'))->result();
					} else if ($tnxstatus == 'SUCCESS') {
					$data['accepttdata'] = $this->db->order_by('id', 'desc')->get_where('registration', array('accept_status' => 'accept', 'txn_status' => 'SUCCESS'))->result();
					} else {
					$data['accepttdata'] = $this->db->query("select * from registration where accept_status='accept' and txn_status='FAILED' or txn_status='PENDING' order by id desc")->result();
				}
				} else {
				$data['accepttdata'] = $this->db->order_by('id', 'desc')->get_where('registration', array('accept_status' => 'accept'))->result();
			}
			
			$this->load->view("Admin/ExportContact", $data);
		}
		
		
		public function AllRegistrations()
		{
			
			/*if(isset($_REQUEST['from']) && isset($_REQUEST['to'])){
				$data['accepttdata'] = $this->db->order_by('id', 'desc')->get_where('registration',array('accept_status'=>'accept','date >='=>$_REQUEST['from'],'date <='=>$_REQUEST['to']))->result();
				}
				else if(isset($_REQUEST['action'])=='Failed'){
				
				$data['accepttdata'] = $this->db->query("select * from registration where accept_status='accept' and txn_status='FAILED' or txn_status='PENDING' order by id desc")->result();
				}
				else if(isset($_REQUEST['action1'])=='PAID'){
				$data['accepttdata'] = $this->db->order_by('id', 'desc')->get_where('registration',array('accept_status'=>'accept','txn_status'=>'PAID'))->result();
				}
				else if(isset($_REQUEST['action2'])=='SUCCESS'){
				$data['accepttdata'] = $this->db->order_by('id', 'desc')->get_where('registration',array('accept_status'=>'accept','txn_status'=>'SUCCESS'))->result();
			}*/
			if (isset($_REQUEST['tnxstatus'])) {
				$tnxstatus = $_REQUEST['tnxstatus'];
				if ($tnxstatus == 'PAID') {
					$data['accepttdata'] = $this->db->order_by('id', 'desc')->get_where('registration', array('accept_status' => 'accept', 'txn_status' => 'PAID'))->result();
					} else if ($tnxstatus == 'SUCCESS') {
					$data['accepttdata'] = $this->db->order_by('id', 'desc')->get_where('registration', array('accept_status' => 'accept', 'txn_status' => 'SUCCESS'))->result();
					} else {
					$data['accepttdata'] = $this->db->query("select * from registration where accept_status='accept' and txn_status='FAILED' or txn_status='PENDING' order by id desc")->result();
				}
				} else {
				$data['accepttdata'] = $this->db->order_by('id', 'desc')->get_where('registration')->result();
			}
			$this->load->view("Admin/AllRegistrations", $data);
		}
		
		#Registeer Rejected
		public function RegistrationRejected()
		{
			/*if(isset($_REQUEST['from']) && isset($_REQUEST['to'])){
				$data['rejectdata'] = $this->db->order_by('id', 'desc')->get_where('registration',array('accept_status'=>'reject','date >='=>$_REQUEST['from'],'date <='=>$_REQUEST['to']))->result();
				}
				else if(isset($_REQUEST['action'])=='Failed'){
				
				$data['rejectdata'] = $this->db->query("select * from registration where accept_status='reject' and txn_status='FAILED' or txn_status='PENDING' order by id desc")->result();
				}
				else if(isset($_REQUEST['action1'])=='PAID'){ 
				$data['rejectdata'] = $this->db->order_by('id', 'desc')->get_where('registration',array('accept_status'=>'reject','txn_status'=>'PAID'))->result();
				}
				else if(isset($_REQUEST['action2'])=='SUCCESS'){
				$data['rejectdata'] = $this->db->order_by('id', 'desc')->get_where('registration',array('accept_status'=>'reject','txn_status'=>'SUCCESS'))->result();
			}*/
			if (isset($_REQUEST['tnxstatus'])) {
				$tnxstatus = $_REQUEST['tnxstatus'];
				if ($tnxstatus == 'PAID') {
					$data['rejectdata'] = $this->db->order_by('id', 'desc')->get_where('registration', array('accept_status' => 'reject', 'txn_status' => 'PAID'))->result();
					} else if ($tnxstatus == 'SUCCESS') {
					$data['rejectdata'] = $this->db->order_by('id', 'desc')->get_where('registration', array('accept_status' => 'reject', 'txn_status' => 'SUCCESS'))->result();
					} else {
					$data['rejectdata'] = $this->db->query("select * from registration where accept_status='reject' and txn_status='FAILED' or txn_status='PENDING' order by id desc")->result();
				}
				} else {
				$data['rejectdata'] = $this->db->order_by('id', 'desc')->get_where('registration', array('accept_status' => 'reject'))->result();
			}
			$this->load->view("Admin/RegistrationRejected", $data);
		}
		
		##certificate Manage
		public function ManageCertificate()
		{
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					$this->form_validation->set_rules('ref_no', 'Reference No', 'required|trim');
					$this->form_validation->set_rules('mobile', 'Mobile No', 'required|trim');
					$this->form_validation->set_rules('tech', 'Technology', 'required|trim');
					$this->form_validation->set_rules('grade', 'Grade', 'required|trim');
					$this->form_validation->set_rules('traning_end_date', 'Traning End Date', 'required');
					$this->form_validation->set_rules('student_name', 'Student Name', 'required');
					$this->form_validation->set_rules('course', 'Course', 'required');
					$this->form_validation->set_rules('duration', 'Duration', 'required');
					$this->form_validation->set_rules('traning_start_date', 'Traning Start Date', 'required');
					$this->form_validation->set_rules('cerificate_issuedate', 'Cerificate Issue Date', 'required|trim');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validation Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_certificate" . "." . $ext;
						$config['upload_path'] = './public/uploads/certificate/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
							} else {
							$upload_status = "true";
						}
						
						if ($upload_status = "true") {
							$data_arr = array(
                            "refrence_no" => $this->input->post('ref_no'),
                            "name" => $this->input->post('student_name'),
                            "mobile" => $this->input->post('mobile'),
                            "course" => $this->input->post('course'),
                            "technology" => $this->input->post('tech'),
                            "grade" => $this->input->post('grade'),
                            "duration" => $this->input->post('duration'),
                            "image" => $filename,
                            "training_start_date" => $this->input->post('traning_start_date'),
                            "training_end_date" => $this->input->post('traning_end_date'),
                            "certificate_issue_date" => $this->input->post('cerificate_issuedate'),
                            "status" => 'true',
                            "image" => $filename,
                            "status" => 'true',
                            "date" => $this->data['date'],
                            "time" => $this->data['time']
							);
							
							if ($this->db->insert('certificate', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Certificate Successfully Added.", "title" => "Successfully Added!", "reload" => "true", "redirect" => 'false'));
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
							}
							} else {
							echo "image Not Upload";
						}
					}
				}
				if ($this->uri->segment(3) == 'Edit') {
					if ($this->uri->segment(4)) {
						$id = $this->uri->segment(4);
						$result = $this->db->get_where('certificate', array("id" => $id))->row_array();
						//  var_dump($result);
						echo json_encode($result);
					}
				}
				if ($this->uri->segment(3) == "Update") {
					$this->form_validation->set_rules('id', 'ID', 'required');
					$this->form_validation->set_rules('ref_no', 'Reference No', 'required|trim');
					$this->form_validation->set_rules('mobile', 'Mobile No', 'required|trim');
					$this->form_validation->set_rules('tech', 'Technology', 'required|trim');
					$this->form_validation->set_rules('grade', 'Grade', 'required|trim');
					$this->form_validation->set_rules('traning_end_date', 'Traning End Date', 'required');
					$this->form_validation->set_rules('student_name', 'Student Name', 'required');
					$this->form_validation->set_rules('course', 'Course', 'required');
					$this->form_validation->set_rules('duration', 'Duration', 'required');
					$this->form_validation->set_rules('traning_start_date', 'Traning Start Date', 'required');
					$this->form_validation->set_rules('cerificate_issuedate', 'Cerificate Issue Date', 'required|trim');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validation Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_certificate" . "." . $ext;
						$config['upload_path'] = './public/uploads/certificate/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						$data_arr = array(
                        "refrence_no" => $this->input->post('ref_no'),
                        "name" => $this->input->post('student_name'),
                        "mobile" => $this->input->post('mobile'),
                        "course" => $this->input->post('course'),
                        "technology" => $this->input->post('tech'),
                        "grade" => $this->input->post('grade'),
                        "duration" => $this->input->post('duration'),
                        "image" => $filename,
                        "training_start_date" => $this->input->post('traning_start_date'),
                        "training_end_date" => $this->input->post('traning_end_date'),
                        "certificate_issue_date" => $this->input->post('cerificate_issuedate'),
                        "status" => 'true',
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time']
						);
						
						$userdata = $this->db->get_where('certificate', array('id' => $this->input->post('id')))->row();
						$img = $userdata->image;
						
						
						if ($upload_status = 'true') {
							$table_name = "certificate";
							$unlink_filename = $img;
							$unlink_folder = "certificate";
							if (unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename)) {
								if ($this->db->where('id', $userdata->id)->update('certificate', $data_arr)) {
									
									$this->session->set_flashdata("status", "success");
									$this->session->set_flashdata("msg", "Certificate Successfully Updated");
									redirect(base_url('Admin/ManageCertificate'));
									} else {
									echo "error";
									// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
								}
								} else {
								echo "image not unlink";
							}
						}
					}
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'desc')->get('certificate')->result();
				$this->load->view("Admin/ManageCertificate", $data);
			}
		}
		
		##Admin/ManageFinalYearProject
		public function ManageFinalYearProject()
		{
			
			
			$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('final_year_project', array('accept_status' => 'pending'))->result();
			$data['accepttdata'] = $this->db->order_by('id', 'desc')->get_where('final_year_project', array('accept_status' => 'accept'))->result();
			$data['rejectdata'] = $this->db->order_by('id', 'desc')->get_where('final_year_project', array('accept_status' => 'reject'))->result();
			
			// $data['userdata'] = $this->db->order_by('id', 'desc')->get_where('final_year_project',array("status"=>"true"))->result();
			// $data['userdata1'] = $this->db->order_by('id', 'desc')->get_where('final_year_project',array("status"=>"false"))->result();
			$this->load->view("Admin/FinaYlearProject", $data);
		}
		
		##manage Appreciation 
		public function ManageAppreciation()
		{
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					$this->form_validation->set_rules('title', 'Title', 'required');
					$this->form_validation->set_rules('role', 'Role', 'required');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validiatno Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_Appreciation" . "." . $ext;
						$config['upload_path'] = './public/uploads/appreciation/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						$data_arr = array(
                        "title" => $this->input->post('title'),
                        "role" => $this->input->post('role'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time'],
						);
						if ($upload_status == 'true') {
							if ($this->db->insert('appreciation', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Partner Successfully Added", "title" => "Successfully Added!", "reload" => "true", "redirect" => 'false'));
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
							}
						}
					}
				}
				
				//Edit apprec
				if ($this->uri->segment(3) == 'Update') {
					$this->form_validation->set_rules('id', 'ID', 'required');
					$this->form_validation->set_rules('title', 'Title', 'required|trim');
					$this->form_validation->set_rules('role', 'Role', 'required');
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validatino Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$userdata = $this->db->get_where('appreciation', array('id' => $this->input->post('id')))->row();
						$oldimg = $userdata->image;
						if (empty($_FILES['image']['name'])) {
							$filename = $userdata->image;
							} else {
							$upload_status = "true";
							$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
							$filename = md5(time()) . "_Appreciation" . "." . $ext;
							$config['upload_path'] = './public/uploads/appreciation/';
							$config['allowed_types'] = 'jpg|png|jpeg';
							$config['max_size'] = 8024; // In KB
							$filesize = $config['max_size'];
							$config['file_name'] = $filename;
							// image upload code initilization
							$this->upload->initialize($config);
							$this->load->library('upload', $config);
							
							if (!$this->upload->do_upload('image')) {
								$upload_status = "false";
								} else {
								unlink('./public/uploads/appreciation/' . $oldimg);
							}
						}
						
						$data_arr = array(
                        "title" => $this->input->post('title'),
                        "role" => $this->input->post('role'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time'],
						);
						if ($this->db->where('id', $userdata->id)->update('appreciation', $data_arr)) {
							
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Appreciation Successfully Updated");
							redirect(base_url('Admin/ManageAppreciation'));
							} else {
							echo "error";
						}
						
						
					}
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'desc')->get('appreciation')->result();
				$this->load->view("Admin/Appreciation", $data);
			}
		}
		
		##manage Advisory
		public function ManageAdvisory()
		{
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					$this->form_validation->set_rules('title', 'Title', 'required|trim');
					$this->form_validation->set_rules('role', 'Role', 'required');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validiatno Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_Advisory" . "." . $ext;
						$config['upload_path'] = './public/uploads/advisory/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						$data_arr = array(
                        "title" => $this->input->post('title'),
                        "role" => $this->input->post('role'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time'],
						);
						if ($upload_status == 'true') {
							if ($this->db->insert('advisory', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Advisory Successfully Added", "title" => "Successfully Added!", "reload" => "true", "redirect" => 'false'));
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
							}
						}
					}
				}
				
				//Edit apprec
				if ($this->uri->segment(3) == 'Update') {
					$this->form_validation->set_rules('id', 'ID', 'required');
					$this->form_validation->set_rules('title', 'Title', 'required|trim');
					$this->form_validation->set_rules('role', 'Role', 'required');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validatino Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_Advisory" . "." . $ext;
						$config['upload_path'] = './public/uploads/advisory/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						$data_arr = array(
                        "title" => $this->input->post('title'),
                        "role" => $this->input->post('role'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time'],
						);
						
						$userdata = $this->db->get_where('advisory', array('id' => $this->input->post('id')))->row();
						$img = $userdata->image;
						
						if ($upload_status = 'true') {
							$table_name = "advisory";
							$unlink_filename = $img;
							$unlink_folder = "advisory";
							if (unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename)) {
								if ($this->db->where('id', $userdata->id)->update('advisory', $data_arr)) {
									$this->session->set_flashdata("status", "success");
									$this->session->set_flashdata("msg", "Advisory Successfully Updated");
									redirect(base_url('Admin/ManageAdvisory'));
									} else {
									echo "error";
									// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
								}
								} else {
								echo "image not unlink";
							}
						}
					}
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'desc')->get('advisory')->result();
				$this->load->view("Admin/Advisory", $data);
			}
		}
		
		##Manage Gallery
		public function ManageGallery()
		{
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					$this->form_validation->set_rules('category', 'Category', 'required|trim');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validiatno Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_photo" . "." . $ext;
						$config['upload_path'] = './public/uploads/gallery/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						$data_arr = array(
                        "category" => $this->input->post('category'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time'],
						);
						if ($upload_status == 'true') {
							if ($this->db->insert('gallery', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Picture Successfully Added", "title" => "Successfully Added!", "reload" => "true", "redirect" => 'false'));
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
							}
						}
					}
				}
				
				//Edit apprec
				if ($this->uri->segment(3) == 'Update') {
					$this->form_validation->set_rules('id', 'ID', 'required');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validatino Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_photo" . "." . $ext;
						$config['upload_path'] = './public/uploads/gallery/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						$data_arr = array(
                        "category" => $this->input->post('category'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time'],
						);
						
						$userdata = $this->db->get_where('gallery', array('id' => $this->input->post('id')))->row();
						$img = $userdata->image;
						
						if ($upload_status = 'true') {
							$table_name = "gallery";
							$unlink_filename = $img;
							$unlink_folder = "gallery";
							if (unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename)) {
								if ($this->db->where('id', $userdata->id)->update('gallery', $data_arr)) {
									$this->session->set_flashdata("status", "success");
									$this->session->set_flashdata("msg", "Picture Successfully Updated");
									redirect(base_url('Admin/ManageGallery'));
									} else {
									echo "error";
									// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
								}
								} else {
								echo "image not unlink";
							}
						}
					}
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'desc')->get('gallery')->result();
				$this->load->view("Admin/Gallery", $data);
			}
		}
		
		
		##Manage Farwell
		public function ManageFarwell()
		{
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					$this->form_validation->set_rules('category', 'Category', 'required|trim');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validiatno Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_photo" . "." . $ext;
						$config['upload_path'] = './public/uploads/farwell/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						$data_arr = array(
                        "category" => $this->input->post('category'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time'],
						);
						if ($upload_status == 'true') {
							if ($this->db->insert('farwell/', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Picture Successfully Added", "title" => "Successfully Added!", "reload" => "true", "redirect" => 'false'));
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
							}
						}
					}
				}
				
				//Edit apprec
				if ($this->uri->segment(3) == 'Update') {
					$this->form_validation->set_rules('id', 'ID', 'required');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validatino Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_photo" . "." . $ext;
						$config['upload_path'] = './public/uploads/farwell/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						$data_arr = array(
                        "category" => $this->input->post('category'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time'],
						);
						
						$userdata = $this->db->get_where('farwell', array('id' => $this->input->post('id')))->row();
						$img = $userdata->image;
						
						if ($upload_status = 'true') {
							$table_name = "farwell";
							$unlink_filename = $img;
							$unlink_folder = "farwell";
							if (unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename)) {
								if ($this->db->where('id', $userdata->id)->update('farwell', $data_arr)) {
									$this->session->set_flashdata("status", "success");
									$this->session->set_flashdata("msg", "Picture Successfully Updated");
									redirect(base_url('Admin/ManageFarwell'));
									} else {
									echo "error";
									// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
								}
								} else {
								echo "image not unlink";
							}
						}
					}
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'desc')->get('farwell')->result();
				$this->load->view("Admin/Farwell", $data);
			}
		}
		
		
		##Manage placement
		public function placement()
		{
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					
					//$this->form_validation->set_rules('category', 'Category', 'required|trim');
					if (empty($_FILES['image']['name'])) {
						// $this->form_validation->set_rules('image', 'Image', 'required');
						echo json_encode(array("status" => "error", "msg" => "Validiation Error", "title" => "Something went wrong stop!", "reload" => "false", "redirect" => 'false'));
					}
					// if ($this->form_validation->run() == false)
					// {
					// echo json_encode(array("status" => "error", "msg" => "Validiation Error", "title" => "Something went wrong stop!", "reload" => "false", "redirect" => 'false'));
					// }
					else {
						
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_photo" . "." . $ext;
						$config['upload_path'] = './public/uploads/placement/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						
						$data_arr = array(
                        "photo" => $filename,
                        "banner" => $this->input->post('status')
						);
						
						if ($upload_status == 'true') {
							
							if ($this->db->insert('placement', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Picture Successfully Added", "title" => "Successfully Added!", "reload" => "true", "redirect" => 'false'));
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong not!", "reload" => "false", "redirect" => 'false'));
							}
						}
					}
				}
				
				//Edit apprec
				if ($this->uri->segment(3) == 'Update') {
					
					$userdata = $this->db->get_where('placement', array('id' => $this->input->post('id')))->row();
					$old_img = $userdata->photo;
					$upload_status = 'true';
					$filename = $old_img;
					if (!empty($_FILES['photo']['name'])) {
						$ext = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_photo" . "." . $ext;
					}
					$config['upload_path'] = './public/uploads/placement/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 8024; // In KB
					$filesize = $config['max_size'];
					$config['file_name'] = $filename;
					// image upload code initilization
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					
					if (!$this->upload->do_upload('photo')) {
						$upload_status = "false";
						} else {
						$upload_status = "true";
					}
					
					$data_arr = array(
                    "photo" => $filename
					);
					
					
					// var_dump($img);
					// die();
					if ($upload_status = 'true') {
						$table_name = "placement";
						$unlink_filename = $old_img;
						$unlink_folder = "placement";
						
						if ($this->db->where('id', $userdata->id)->update('placement', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Picture Successfully Updated");
							redirect(base_url('Admin/placement'));
							unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename);
							
							} else {
							echo "error";
							// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
						}
					}
					
					// end here 
					
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'desc')->get('placement')->result();
				$this->load->view("Admin/placement", $data);
			}
		}
		
		
		##Manage Review
		public function ManageReview()
		{
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					$this->form_validation->set_rules('name', 'Title', 'required|trim');
					$this->form_validation->set_rules('position', 'Position', 'required');
					$this->form_validation->set_rules('message', 'Message', 'required|trim');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validiatno Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_review" . "." . $ext;
						$config['upload_path'] = './public/uploads/review/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						$data_arr = array(
                        "name" => $this->input->post('name'),
                        "position" => $this->input->post('position'),
                        "message" => $this->input->post('message'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time'],
						);
						if ($upload_status == 'true') {
							if ($this->db->insert('review', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Review Successfully Added", "title" => "Successfully Added!", "reload" => "true", "redirect" => 'false'));
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
							}
						}
					}
				}
				
				//Edit Review
				if ($this->uri->segment(3) == 'Update') {
					$this->form_validation->set_rules('id', 'ID', 'required');
					$this->form_validation->set_rules('name', 'Title', 'required|trim');
					$this->form_validation->set_rules('position', 'Position', 'required');
					$this->form_validation->set_rules('message', 'Message', 'required|trim');
					
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validatino Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$imgdata = $this->db->get_where('review', array('id' => $this->input->post('id')))->row();
						if (empty($_FILES['image']['name'])) {
							$filename = $imgdata->image;
							} else {
							$upload_status = "true";
							$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
							$filename = md5(time()) . "_review" . "." . $ext;
							$config['upload_path'] = './public/uploads/review/';
							$config['allowed_types'] = 'jpg|png|jpeg';
							$config['max_size'] = 8024; // In KB
							$filesize = $config['max_size'];
							$config['file_name'] = $filename;
							$this->load->library('upload', $config);
							if (!$this->upload->do_upload('image')) {
								$upload_status = "false";
								} else {
								$upload_status = "true";
								unlink('./public/uploads/review/' . $imgdata->image);
							}
							
							
						}
						
						$data_arr = array(
                        "name" => $this->input->post('name'),
                        "position" => $this->input->post('position'),
                        "message" => $this->input->post('message'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time'],
						);
						
						$userdata = $this->db->get_where('review', array('id' => $this->input->post('id')))->row();
						$img = $userdata->image;
						
						
						if ($this->db->where('id', $userdata->id)->update('review', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Review Successfully Updated");
							redirect(base_url('Admin/ManageReview'));
							} else {
							echo "error";
							
						}
						
					}
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'desc')->get('review')->result();
				$this->load->view("Admin/Review", $data);
			}
		}
		
		##Manage Contact
		public function ManageContact()
		{
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					$this->form_validation->set_rules('name', 'Title', 'required|trim');
					$this->form_validation->set_rules('position', 'Position', 'required');
					$this->form_validation->set_rules('message', 'Message', 'required|trim');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validiatno Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_review" . "." . $ext;
						$config['upload_path'] = './public/uploads/review/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						$data_arr = array(
                        "name" => $this->input->post('name'),
                        "position" => $this->input->post('position'),
                        "message" => $this->input->post('message'),
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time'],
						);
						if ($upload_status == 'true') {
							if ($this->db->insert('review', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Review Successfully Added", "title" => "Successfully Added!", "reload" => "true", "redirect" => 'false'));
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
							}
						}
					}
				}
				} else {
				$data['active'] = $this->db->order_by('id', 'desc')->get_where('contact', array('status' => 'true'))->result();
				$data['inactive'] = $this->db->order_by('id', 'desc')->get_where('contact', array('status' => 'false'))->result();
				$this->load->view("Admin/ContactList", $data);
			}
		}
		
		##Manage Contact
		public function DeleteAllContact()
		{
			
			$this->db->delete("contact", array("status" => "true"));
			redirect(base_url("Admin/ManageContact"));
			
		}
		
		##Manage Review
		public function ManageVideo()
		{
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					$this->form_validation->set_rules('title', 'Title', 'required|trim');
					$this->form_validation->set_rules('url', 'Video Url', 'required');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validiatno Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_thumbnails" . "." . $ext;
						$config['upload_path'] = './public/uploads/videos/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						$data_arr = array(
                        "title" => $this->input->post('title'),
                        "video_url" => $this->input->post('url'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time'],
						);
						if ($upload_status == 'true') {
							if ($this->db->insert('videos', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Video Successfully Added", "title" => "Successfully Added!", "reload" => "true", "redirect" => 'false'));
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
							}
						}
					}
				}
				
				//Edit Video
				if ($this->uri->segment(3) == 'Update') {
					$this->form_validation->set_rules('id', 'ID', 'required');
					$this->form_validation->set_rules('title', 'Title', 'required|trim');
					$this->form_validation->set_rules('url', 'Video Url', 'required');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validatino Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_thumbnails" . "." . $ext;
						$config['upload_path'] = './public/uploads/videos/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						$data_arr = array(
                        "title" => $this->input->post('title'),
                        "video_url" => $this->input->post('url'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time'],
						);
						
						$userdata = $this->db->get_where('videos', array('id' => $this->input->post('id')))->row();
						$img = $userdata->image;
						
						if ($upload_status = 'true') {
							$table_name = "videos";
							$unlink_filename = $img;
							$unlink_folder = "videos";
							unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename);
							// {
							if ($this->db->where('id', $userdata->id)->update('videos', $data_arr)) {
								$this->session->set_flashdata("status", "success");
								$this->session->set_flashdata("msg", "Videos Successfully Updated");
								redirect(base_url('Admin/ManageVideo'));
								} else {
								
								$this->session->set_flashdata("status", "error");
								$this->session->set_flashdata("msg", "Something Went Wrong");
								redirect(base_url('Admin/ManageVideo'));
								// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
							}
						}
					}
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'desc')->get('videos')->result();
				$this->load->view("Admin/VideoList", $data);
			}
		}
		
		
		##Manage Modal
		public function ManageModal()
		{
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					$this->form_validation->set_rules('title', 'Title', 'required|trim');
					$this->form_validation->set_rules('url', 'Modal Url', 'required');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validiatno Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_modal" . "." . $ext;
						$config['upload_path'] = './public/uploads/modal_images/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						$data_arr = array(
                        "title" => $this->input->post('title'),
                        "url" => $this->input->post('url'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'] . " " . $this->data['time'],
						);
						if ($upload_status == 'true') {
							if ($this->db->insert('modal', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Video Successfully Added", "title" => "Successfully Added!", "reload" => "true", "redirect" => 'false'));
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
							}
						}
					}
				}
				
				//Edit Modal
				if ($this->uri->segment(3) == 'Update') {
					$this->form_validation->set_rules('id', 'ID', 'required');
					$this->form_validation->set_rules('title', 'Title', 'required|trim');
					$this->form_validation->set_rules('url', 'Modal Url', 'required');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validatino Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_modal" . "." . $ext;
						
						$config['upload_path'] = './public/uploads/modal_images/';
						$config['allowed_types'] = 'jpg|png|jpeg|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						$data_arr = array(
                        "title" => $this->input->post('title'),
                        "url" => $this->input->post('url'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'] . " " . $this->data['time'],
						);
						
						$userdata = $this->db->get_where('modal', array('id' => $this->input->post('id')))->row();
						$img = $userdata->image;
						
						if ($upload_status = 'true') {
							$table_name = "modal";
							$unlink_filename = $img;
							$unlink_folder = "modal_images";
							unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename);
							// {
							if ($this->db->where('id', $userdata->id)->update('modal', $data_arr)) {
								$this->session->set_flashdata("status", "success");
								$this->session->set_flashdata("msg", "Modal Successfully Updated");
								redirect(base_url('Admin/ManageModal'));
								} else {
								
								$this->session->set_flashdata("status", "error");
								$this->session->set_flashdata("msg", "Something Went Wrong");
								redirect(base_url('Admin/ManageModal'));
								// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
							}
						}
					}
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'desc')->get('modal')->result();
				$this->load->view("Admin/ManageModal", $data);
			}
		}
		##Placement Partner
		public function PlacementPartner()
		{
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					$this->form_validation->set_rules('title', 'Title', 'required|trim');
					$this->form_validation->set_rules('role', 'Role', 'required');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validiatno Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_PlacementPartner" . "." . $ext;
						$config['upload_path'] = './public/uploads/placement_partner/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						$data_arr = array(
                        "title" => $this->input->post('title'),
                        "role" => $this->input->post('role'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time'],
						);
						if ($upload_status == 'true') {
							if ($this->db->insert('placement_partner', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Partner Successfully Added", "title" => "Successfully Added!", "reload" => "true", "redirect" => 'false'));
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
							}
						}
					}
				}
				
				//Edit placement_partner
				if ($this->uri->segment(3) == 'Update') {
					$this->form_validation->set_rules('id', 'ID', 'required');
					$this->form_validation->set_rules('title', 'Title', 'required|trim');
					$this->form_validation->set_rules('role', 'Role', 'required');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validatino Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_PlacementPartner" . "." . $ext;
						$config['upload_path'] = './public/uploads/placement_partner/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						$data_arr = array(
                        "title" => $this->input->post('title'),
                        "role" => $this->input->post('role'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time'],
						);
						
						$userdata = $this->db->get_where('placement_partner', array('id' => $this->input->post('id')))->row();
						$img = $userdata->image;
						
						if ($upload_status = 'true') {
							$table_name = "placement_partner";
							$unlink_filename = $img;
							$unlink_folder = "placement_partner";
							if (unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename)) {
								if ($this->db->where('id', $userdata->id)->update('placement_partner', $data_arr)) {
									
									$this->session->set_flashdata("status", "success");
									$this->session->set_flashdata("msg", "Placement Partner Successfully Updated");
									redirect(base_url('Admin/PlacementPartner'));
									} else {
									echo "error";
									// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
								}
								} else {
								echo "image not unlink";
							}
						}
					}
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'desc')->get('placement_partner')->result();
				$this->load->view("Admin/PlacementPartner", $data);
			}
		}
		
		##manege Achievements
		public function Achievements()
		{
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					$this->form_validation->set_rules('title', 'Title', 'required|trim');
					$this->form_validation->set_rules('role', 'Role', 'required');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validiatno Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_achievemens" . "." . $ext;
						$config['upload_path'] = './public/uploads/achievemens/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						$data_arr = array(
                        "title" => $this->input->post('title'),
                        "role" => $this->input->post('role'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time'],
						);
						if ($upload_status == 'true') {
							if ($this->db->insert('achievemens', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Achievemens Successfully Added", "title" => "Successfully Added!", "reload" => "true", "redirect" => 'false'));
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
							}
						}
					}
				}
				//Edit Achievemens
				if ($this->uri->segment(3) == 'Update') {
					$this->form_validation->set_rules('id', 'ID', 'required');
					$this->form_validation->set_rules('title', 'Title', 'required|trim');
					$this->form_validation->set_rules('role', 'Role', 'required');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validatino Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_achievemens" . "." . $ext;
						$config['upload_path'] = './public/uploads/achievemens/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						$data_arr = array(
                        "title" => $this->input->post('title'),
                        "role" => $this->input->post('role'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time'],
						);
						
						$userdata = $this->db->get_where('achievemens', array('id' => $this->input->post('id')))->row();
						$img = $userdata->image;
						
						if ($upload_status = 'true') {
							$table_name = "achievemens";
							$unlink_filename = $img;
							$unlink_folder = "achievemens";
							if (unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename)) {
								if ($this->db->where('id', $userdata->id)->update('achievemens', $data_arr)) {
									
									$this->session->set_flashdata("status", "success");
									$this->session->set_flashdata("msg", "Achievements Successfully Updated");
									redirect(base_url('Admin/Achievements'));
									} else {
									echo "error";
									// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
								}
								} else {
								echo "image not unlink";
							}
						}
					}
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'asc')->get('achievemens')->result();
				$this->load->view('Admin/Achievements', $data);
			}
		}
		##Manage MOU
		public function ManageMOU()
		{
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					$this->form_validation->set_rules('title', 'Title', 'required|trim');
					$this->form_validation->set_rules('role', 'Role', 'required');
					$this->form_validation->set_rules('season', 'Season', 'required');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validiatno Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_MOU" . "." . $ext;
						$config['upload_path'] = './public/uploads/mou/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						$data_arr = array(
                        "title" => $this->input->post('title'),
                        "role" => $this->input->post('role'),
                        "season" => $this->input->post('season'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time'],
						);
						// var_dump($upload_status);die();
						
						if ($upload_status == 'true') {
							if ($this->db->insert('mou', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "MOU Successfully Added", "title" => "Successfully Added!", "reload" => "true", "redirect" => 'false'));
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
							}
						}
					}
				}
				//Edit MOU
				if ($this->uri->segment(3) == 'Update') {
					$this->form_validation->set_rules('id', 'ID', 'required');
					$this->form_validation->set_rules('title', 'Title', 'required|trim');
					$this->form_validation->set_rules('role', 'Role', 'required');
					$this->form_validation->set_rules('season', 'Season', 'required');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validatino Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = "true";
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_MOU" . "." . $ext;
						$config['upload_path'] = './public/uploads/mou/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						$data_arr = array(
                        "title" => $this->input->post('title'),
                        "role" => $this->input->post('role'),
                        "season" => $this->input->post('season'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time'],
						);
						
						$userdata = $this->db->get_where('mou', array('id' => $this->input->post('id')))->row();
						$img = $userdata->image;
						
						if ($upload_status = 'true') {
							$table_name = "mou";
							$unlink_filename = $img;
							$unlink_folder = "mou";
							if (unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename)) {
								if ($this->db->where('id', $userdata->id)->update('mou', $data_arr)) {
									
									$this->session->set_flashdata("status", "success");
									$this->session->set_flashdata("msg", "MOU Successfully Updated");
									redirect(base_url('Admin/ManageMOU'));
									} else {
									echo "error";
									// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
								}
								} else {
								echo "image not unlink";
							}
						}
					}
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'ASC')->get('mou')->result();
				$this->load->view("Admin/MOU", $data);
			}
		}
		
		##manage Event
		public function ManageEvent()
		{
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					$this->form_validation->set_rules('title', 'Title', 'required|trim');
					$this->form_validation->set_rules('event_date', 'Event Date', 'required');
					$this->form_validation->set_rules('description', 'Description', 'required');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validatino Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = 'true';
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_event" . "." . $ext;
						
						$config['upload_path'] = './public/uploads/event/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						$data_arr = array(
                        "title" => $this->input->post('title'),
                        "event_date" => $this->input->post('event_date'),
                        "image" => $filename,
                        "description" => $this->input->post('description'),
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time']
						);
						
						if ($upload_status == "true") {
							if ($this->db->insert('events', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Event Successfully Added", "title" => "Successfully Added!", "reload" => "true", "redirect" => 'false'));
								// echo "success";
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
								// echo "failed";
							}
						}
					}
				}
				
				//Edit Event
				if ($this->uri->segment(3) == 'Update') {
					$this->form_validation->set_rules('id', 'ID', 'required');
					$this->form_validation->set_rules('title', 'Title', 'required|trim');
					$this->form_validation->set_rules('event_date', 'Event Date', 'required');
					$this->form_validation->set_rules('description', 'Description', 'required');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validatino Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = 'true';
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_event" . "." . $ext;
						
						$config['upload_path'] = './public/uploads/event/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
							} else {
							$upload_status = "true";
						}
						
						$data_arr = array(
                        "title" => $this->input->post('title'),
                        "event_date" => $this->input->post('event_date'),
                        "image" => $filename,
                        "description" => $this->input->post('description'),
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time']
						);
						
						$userdata = $this->db->get_where('events', array('id' => $this->input->post('id')))->row();
						$img = $userdata->image;
						
						if ($upload_status = 'true') {
							$table_name = "events";
							$unlink_filename = $img;
							$unlink_folder = "event";
							if (unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename)) {
								if ($this->db->where('id', $userdata->id)->update('events', $data_arr)) {
									
									$this->session->set_flashdata("status", "success");
									$this->session->set_flashdata("msg", "Event Successfully Updated");
									redirect(base_url('Admin/ManageExpertList'));
									} else {
									echo "error";
									// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
								}
								} else {
								echo "image not unlink";
							}
						}
					}
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'desc')->get('events')->result();
				$this->load->view('Admin/ManageEvent', $data);
			}
		}
		
		//Manage Experts
		public function ManageExpertList()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get('expert')->result();
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					$this->form_validation->set_rules('name', 'Name', 'required');
					$this->form_validation->set_rules('role', 'Role', 'required');
					if (empty($_FILES['image']['name'])) {
						$this->form_validation->set_rules('image', 'Image', 'required');
					}
					
					if ($this->form_validation->run() == false) {
						echo json_encode(array("status" => "error", "msg" => "Validatino Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						} else {
						$upload_status = 'true';
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_expert" . "." . $ext;
						
						$config['upload_path'] = './public/uploads/expert/';
						$config['allowed_types'] = 'jpg|png|jpeg|jfif';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						$data_arr = array(
                        "name" => $this->input->post('name'),
                        "role" => $this->input->post('role'),
                        "image" => $filename,
                        "status" => 'true',
                        "date" => $this->data['date'],
                        "time" => $this->data['time']
						);
						
						if ($upload_status = "true") {
							if ($this->db->insert('expert', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Expert Successfully Added", "title" => "Successfully Added!", "reload" => "true", "redirect" => 'false'));
								// echo "success";
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
								// echo "failed";
							}
						}
					}
				}
				//Edit Expert
				if ($this->uri->segment(3) == 'Update') {
					
					$userdata = $this->db->get_where('expert', array('id' => $this->input->post('id')))->row();
					$old_img = $userdata->image;
					$upload_status = 'true';
					$filename = $old_img;
					if (!empty($_FILES['image']['name'])) {
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_expert" . "." . $ext;
					}
					$config['upload_path'] = './public/uploads/expert/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 8024; // In KB
					$filesize = $config['max_size'];
					$config['file_name'] = $filename;
					// image upload code initilization
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					
					if (!$this->upload->do_upload('image')) {
						$upload_status = "false";
						} else {
						$upload_status = "true";
					}
					
					$data_arr = array(
                    "name" => $this->input->post('name'),
                    "role" => $this->input->post('role'),
                    "image" => $filename,
					);
					
					if ($upload_status = 'true') {
						$table_name = "expert";
						$unlink_filename = $old_img;
						$unlink_folder = "expert";
						
						if ($this->db->where('id', $userdata->id)->update('expert', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Expert Successfully Updated");
							redirect(base_url('Admin/ManageExpertList'));
							unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename);
							
							} else {
							echo "error";
							// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
						}
					}
					// end here 
					
					
				}
				} else {
				$this->load->view('Admin/OurExperts', $data);
			}
		}
		
		
		// public function Test()
		// {
		// $res = $this->db->query("ALTER TABLE `registration` ADD `accept_status` VARCHAR(50) NOT NULL DEFAULT 'pending' AFTER `status`;");	
		// var_dump($res);
		// }
		
		##Dashboard
		public function Dashboard()
		{
			$data['allusers'] = $this->db->get('users')->num_rows();
			
			$data['reg'] = $this->db->get_where('registration', array("status" => "true"))->num_rows();
			$data['achievemens'] = $this->db->get('achievemens')->num_rows();
			$data['webinar'] = $this->db->get('webinar')->num_rows();
			$data['expert'] = $this->db->get('expert')->num_rows();
			$data['advisory'] = $this->db->get('advisory')->num_rows();
			$data['appreciation'] = $this->db->get('appreciation')->num_rows();
			$data['certificate'] = $this->db->get('certificate')->num_rows();
			$data['contact'] = $this->db->get_where('contact', array("status" => "true"))->num_rows();
			$data['events'] = $this->db->get('events')->num_rows();
			$data['expert'] = $this->db->get('expert')->num_rows();
			$data['final_year_project'] = $this->db->get('final_year_project')->num_rows();
			$data['gallery'] = $this->db->get('gallery')->num_rows();
			$data['placement'] = $this->db->get('placement')->num_rows();
			$data['mou'] = $this->db->get('mou')->num_rows();
			$data['news_letter'] = $this->db->get('news_letter')->num_rows();
			$data['placement_partner'] = $this->db->get('placement_partner')->num_rows();
			$data['review'] = $this->db->get('review')->num_rows();
			$data['videos'] = $this->db->get('videos')->num_rows();
			$data['banners'] = $this->db->get('banner')->num_rows();
			$data['news'] = $this->db->get('news')->num_rows();
			$data['modal'] = $this->db->get('modal')->num_rows();
			$data['faq'] = $this->db->get('faq')->num_rows();
			// App User 
			$data['authors'] = $this->db->get('authors')->num_rows();
			$data['training'] = $this->db->get('training')->num_rows();
			$data['course'] = $this->db->get('subject')->num_rows();
			$data['semester'] = $this->db->get('semester')->num_rows();
			$data['category'] = $this->db->get('paper_category')->num_rows();
			$data['technology'] = $this->db->get('technology')->num_rows();
			$data['technology_pdf'] = $this->db->get('technology_pdf')->num_rows();
			$data['manage_videos'] = $this->db->get('manage_videos')->num_rows();
			$data['trending_videos'] = $this->db->get('trending_videos')->num_rows();
			$data['technology_category'] = $this->db->get('technology_category')->num_rows();
			$data['technology_videos'] = $this->db->get('technology_videos')->num_rows();
			$data['batch_category'] = $this->db->get('batch_category')->num_rows();
			$data['job_category'] = $this->db->get('job_category')->num_rows();
			$data['job_details'] = $this->db->get('job_details')->num_rows();
			$data['manage_notification'] = $this->db->get('manage_notification')->num_rows();
			$this->load->view('Admin/Dashboard', $data);
		}
		
		public function NewsLetter()
		{
			$data['userdata'] = $this->db->order_by('id')->get('news_letter')->result();
			$this->load->view('Admin/NewsLetter', $data);
		}
		
		//Change Statuts
		public function CompleteStatus()
		{
			if ($this->input->post()) {
				$data = $this->input->post();
				$id = $data['id'];
				$complete_status = $data['complete_status'];
				$table_name = $data['tablename'];
				if ($complete_status == 'true') {
					$complete_status = 'false';
					} else {
					$complete_status = 'true';
				}
				
				$data_arr = array(
                "complete_status" => $complete_status,
				);
				
				$this->db->where('id', $id);
				if ($this->db->update($table_name, $data_arr)) {
					echo json_encode(array("status" => "success", "msg" => "Status Successfully Chamged.", "title" => "Changed", "reload" => "true", "redirect" => 'false'));
					} else {
					echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
				}
			}
		}
		
		##ChangeAcceptStatus
		public function ChangeAcceptStatus()
		{
			if ($this->input->post()) {
				$data = $this->input->post();
				$id = $data['id'];
				$accept_status = $data['accept_status'];
				$table_name = $data['tablename'];
				
				$data_arr = array(
                "accept_status" => $accept_status,
				);
				
				$this->db->where('id', $id);
				if ($this->db->update($table_name, $data_arr)) {
					echo json_encode(array("status" => "success", "msg" => "Status Successfully Chamged.", "title" => "Changed", "reload" => "true", "redirect" => 'false'));
					} else {
					echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
				}
			}
		}
		
		//Change Statuts
		public function ChangeStatus()
		{
			if ($this->input->post()) {
				$data = $this->input->post();
				$id = $data['id'];
				$status = $data['status'];
				$table_name = $data['tablename'];
				if ($status == 'true') {
					$status = 'false';
					} else {
					$status = 'true';
				}
				
				$data_arr = array(
                "status" => $status,
				);
				
				$this->db->where('id', $id);
				if ($this->db->update($table_name, $data_arr)) {
					echo json_encode(array("status" => "success", "msg" => "Status Successfully Chamged.", "title" => "Changed", "reload" => "true", "redirect" => 'false'));
					} else {
					echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
				}
			}
		}
		
		//Delete with files
		public function deleteWithFilename()
		{
			if ($this->input->post()) {
				$data = $this->input->post();
				$id = $data['id'];
				$table_name = $data['tablename'];
				$unlink_filename = $data['filename'];
				$unlink_folder = $data['tablename'];
				$result = $this->db->where('id', $data['id'])->get($data['tablename']);
				$resdata = $result->result_array();
				
				if (empty($data['filename'])) {
					$result = $this->db->where('id', $data['id'])->delete($data['tablename']);
					if ($result) {
						echo json_encode(array("status" => "success", "msg" => "Item Successfully Deleted", "title" => "Successfully Deleted!", "reload" => "true", "redirect" => 'false'));
						} else {
						echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
					}
					} else {
					$result = $this->db->where('id', $data['id'])->delete($data['tablename']);
					if (unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename)) {
						// echo "success";
						echo json_encode(array("status" => "success", "msg" => "Item Successfully Deleted", "title" => "Successfully Deleted!", "reload" => "true", "redirect" => 'false'));
						} else {
						// echo "not unlink";
						echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
					}
				}
			}
		}
		
		
		//Edit Data
		public function EditData()
		{
			$table = $this->uri->segment(3);
			$id = $this->uri->segment(4);
			$arr = [];
			if (empty($table) && empty($id)) {
				$arr['res'] = "error";
				$arr['msg'] = "Something went wrong!";
				} else {
				$userdata = $this->db->get_where($table, array('id' => $id));
				
				if ($userdata->num_rows()) {
					$data['table'] = $table;
					$data['userdata'] = $userdata->row();
					
					$this->load->view('Admin/Modal', $data);
					} else {
					$arr['res'] = "error";
					$arr['msg'] = "No data found!";
				}
			}
		}
		
		
		# Trending news Start Here 
		
		
		
		
		# Trending News 
		public function TrendingNews()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get('trending')->result();
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					if (empty($_FILES['image']['name'])) {
						echo json_encode(array("status" => "error", "msg" => "Image Required.", "title" => "", "reload" => "false", "redirect" => 'false'));
						
						} else {
						$upload_status = 'true';
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_trending" . "." . $ext;
						
						$config['upload_path'] = './public/uploads/trending/';
						$config['allowed_types'] = 'jpg|png|jpeg|jfif';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						$data_arr = array(
                        "image" => $filename,
                        "date" => $this->data['date'],
                        // "author" => $this->input->post('author'),
                        "author_id" => $this->input->post('author_id'),
                        "title" => $this->input->post('title'),
                        "description" => $this->input->post('description'),
						);
						
						if ($upload_status = "true") {
							
							if ($this->db->insert('trending', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Trending News Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
								// echo "success";
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
								// echo "failed";
							}
						}
					}
				}
				
				// start here update 
				//Edit Expert
				if ($this->uri->segment(3) == 'Update') {
					// $this->form_validation->set_rules('id', 'ID', 'required');
					// $this->form_validation->set_rules('name', 'Name', 'required');
					// $this->form_validation->set_rules('role', 'Role', 'required');
					// if (empty($_FILES['image']['name']))
					// {
					// $this->form_validation->set_rules('image', 'Image', 'required');
					// }
					// if ($this->form_validation->run() == false)
					// {
					// echo json_encode(array("status" => "error", "msg" => "Validatino Error", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
					// }
					// else
					// {
					$userdata = $this->db->get_where('trending', array('id' => $this->input->post('id')))->row();
					$old_img = $userdata->image;
					$upload_status = 'true';
					$filename = $old_img;
					if (!empty($_FILES['image']['name'])) {
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_trending" . "." . $ext;
					}
					$config['upload_path'] = './public/uploads/trending/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 8024; // In KB
					$filesize = $config['max_size'];
					$config['file_name'] = $filename;
					// image upload code initilization
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					
					if (!$this->upload->do_upload('image')) {
						$upload_status = "false";
						} else {
						$upload_status = "true";
					}
					
					$data_arr = array(
                    // "author" => $this->input->post('author'),
                    "author_id" => $this->input->post('author_id'),
                    "title" => $this->input->post('title'),
                    "description" => $this->input->post('description'),
                    "image" => $filename,
                    "date" => $this->data['date']
					);
					
					
					// var_dump($img);
					// die();
					if ($upload_status = 'true') {
						$table_name = "trending";
						$unlink_filename = $old_img;
						$unlink_folder = "trending";
						// var_dump($unlink_filename);
						// die();
						// var_dump($img);
						// die();
						if ($this->db->where('id', $userdata->id)->update('trending', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Trending Successfully Updated");
							redirect(base_url('Admin/TrendingNews'));
							unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename);
							
							} else {
							echo "error";
							// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
						}
					}
					
				}
				// }
				} else {
				
				$this->load->view('Admin/TrendingNews', $data);
			}
			// end here update 
		}
		
		# Trending news End Here 
		
		
		
		
		# Training Summer Apprenticeship Start Here 
		
		public function ManageTraining()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get('training')->result();
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					if (empty($_FILES['image']['name'])) {
						echo json_encode(array("status" => "error", "msg" => "Image Required.", "title" => "", "reload" => "false", "redirect" => 'false'));
						
						} else {
						$upload_status = 'true';
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_training" . "." . $ext;
						
						$config['upload_path'] = './public/uploads/training/';
						$config['allowed_types'] = 'jpg|png|jpeg|jfif';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						$data_arr = array(
                        "image" => $filename,
                        "date" => $this->data['date'],
                        "traning_type" => $this->input->post('traning_type')
						);
						
						if ($upload_status = "true") {
							
							if ($this->db->insert('training', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Training Image Added Successfully ", "title" => "", "reload" => "true", "redirect" => 'false'));
								// echo "success";
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
								// echo "failed";
							}
						}
					}
				}
				
				// start here update 
				//Edit Expert
				if ($this->uri->segment(3) == 'Update') {
					
					$userdata = $this->db->get_where('training', array('id' => $this->input->post('id')))->row();
					$old_img = $userdata->image;
					$upload_status = 'true';
					$filename = $old_img;
					if (!empty($_FILES['image']['name'])) {
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_training" . "." . $ext;
					}
					$config['upload_path'] = './public/uploads/training/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 8024; // In KB
					$filesize = $config['max_size'];
					$config['file_name'] = $filename;
					// image upload code initilization
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					
					if (!$this->upload->do_upload('image')) {
						$upload_status = "false";
						} else {
						$upload_status = "true";
					}
					
					$data_arr = array(
                    "image" => $filename,
                    "date" => $this->data['date'],
                    "traning_type" => $this->input->post('traning_type')
					);
					
					
					// var_dump($img);
					// die();
					if ($upload_status = 'true') {
						$table_name = "training";
						$unlink_filename = $old_img;
						$unlink_folder = "training";
						if ($this->db->where('id', $userdata->id)->update('training', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Training Successfully Updated");
							redirect(base_url('Admin/ManageTraining'));
							unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename);
							
							} else {
							echo "error";
							// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
						}
					}
					
				}
				// end 
				
				
				} else {
				
				$this->load->view('Admin/ManageTraining', $data);
			}
			// end here update 
		}
		
		public function Users()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get('users')->result();
			$this->load->view('Admin/Users', $data);
		}
		# Training Summer Apprenticeship End Here 
		
		
		
		
		
		// Manage Teacher 
		public function ManageTeacher()
		{
			$data['teacherdata'] = $this->db->order_by('id','desc')->get('tbl_teacher')->result();
			
			if ($this->uri->segment(3)) {
				// Add new batch entry
				if ($this->uri->segment(3) == 'Add') {
					$teacher_name = $this->input->post('teacher_name');
					
					$data_arr = array(
					"teacher_name" => $teacher_name,
					"date" => $this->data['date'],
					);
					
					if ($this->db->insert('tbl_teacher', $data_arr)) {
						echo json_encode(array("status" => "success", "msg" => "Teacher Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
						} else {
						echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
					}
				}
				
				// Update existing batch entry
				if ($this->uri->segment(3) == 'Update') 
				{
					$teacher_name = $this->input->post('teacher_name');
					$teacher_id = $this->input->post('id');
					$userdata = $this->db->get_where('tbl_teacher', array('id' => $teacher_id))->row();
					
					$data_arr = array(
					"teacher_name" => $teacher_name,
					);
					
					if ($this->db->where('id', $userdata->id)->update('tbl_teacher', $data_arr)) {
						// Set flashdata for success
						$this->session->set_flashdata('status', 'success');
						$this->session->set_flashdata('msg', 'Teacher Successfully Updated');
						} else {
						// Set flashdata for error
						$this->session->set_flashdata('status', 'error');
						$this->session->set_flashdata('msg', 'Something Went Wrong');
					}
					redirect(base_url('Admin/ManageTeacher'));
				}
				
				
				
				} else {
				$this->load->view('Admin/ManageTeacher', $data);
			}
		}
		
		
		
		
		
		
		# Manage Batch Here 
		public function ManageBatch()
		{
			$data['batchdata'] = $this->db->order_by('id','desc')->get('tbl_batch')->result();
			
			if ($this->uri->segment(3)) {
				// Add new batch entry
				if ($this->uri->segment(3) == 'Add') {
					$batch_name = $this->input->post('batch_name');
					
					// Check if batch name already exists
					// $existing_batch = $this->db->get_where('tbl_batch', array('batch_name' => $batch_name))->row();
					// if ($existing_batch) {
					// echo json_encode(array("status" => "error", "msg" => "Batch name already exists", "title" => "Duplicate Entry", "reload" => "false", "redirect" => 'false'));
					// } else {
					$data_arr = array(
					"teacher_id" => $this->input->post('teacher_id'),
					"batch_name" => $batch_name,
					"time_from" => date('h:i A', strtotime($this->input->post('time_from'))), 
					"time_to" => date('h:i A', strtotime($this->input->post('time_to'))),
					"room_no" => $this->input->post('room_no'),
					"start_from" => $this->input->post('start_from')
					);
					
					if ($this->db->insert('tbl_batch', $data_arr)) {
						echo json_encode(array("status" => "success", "msg" => "Batch Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
						} else {
						echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
					}
					// }
				}
				
				// Update existing batch entry
				if ($this->uri->segment(3) == 'Update') {
					$batch_name = $this->input->post('batch_name');
					$batch_id = $this->input->post('id');
					
					// Check if batch name exists for other records (ignore current record)
					$existing_batch = $this->db->where('batch_name', $batch_name)->where('id !=', $batch_id)->get('tbl_batch')->row();
					
					if ($existing_batch) {
						echo json_encode(array("status" => "error", "msg" => "Batch name already exists", "title" => "Duplicate Entry", "reload" => "false", "redirect" => 'false'));
						} else {
						$userdata = $this->db->get_where('tbl_batch', array('id' => $batch_id))->row();
						
						$data_arr = array(
						"teacher_id" => $this->input->post('teacher_id'),
						"batch_name" => $batch_name,
						"time_from" => $this->input->post('time_from'),
						"time_to" => $this->input->post('time_to'),
						"room_no" => $this->input->post('room_no'),
						"start_from" => $this->input->post('start_from')
						);
						
						if ($this->db->where('id', $userdata->id)->update('tbl_batch', $data_arr)) {
							// Set flashdata for success
							$this->session->set_flashdata('status', 'success');
							$this->session->set_flashdata('msg', 'Teacher Successfully Updated');
							} else {
							// Set flashdata for error
							$this->session->set_flashdata('status', 'error');
							$this->session->set_flashdata('msg', 'Something Went Wrong');
						}
						redirect(base_url('Admin/ManageBatch'));
					}
				}
				} else {
				$this->load->view('Admin/ManageBatch', $data);
			}
		}
		
		
		
		
		
		
		
		
		# ManageAuthor Start Here 
		public function ManageAuthor()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get('authors')->result();
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					if (empty($_FILES['image']['name'])) {
						echo json_encode(array("status" => "error", "msg" => "Image Required.", "title" => "", "reload" => "false", "redirect" => 'false'));
						
						} else {
						$upload_status = 'true';
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_authors" . "." . $ext;
						
						$config['upload_path'] = './public/uploads/authors/';
						$config['allowed_types'] = 'jpg|png|jpeg|jfif';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						
						// image upload code initilization
						$this->upload->initialize($config);
						
						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						$data_arr = array(
						"image" => $filename,
						"date" => $this->data['date'],
						"name" => $this->input->post('name'),
						"media" => $this->input->post('media')
						);
						
						if ($upload_status = "true") {
							
							if ($this->db->insert('authors', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Author Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
								// echo "success";
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
								// echo "failed";
							}
						}
					}
				}
				
				// start here update 
				//Edit Expert
				if ($this->uri->segment(3) == 'Update') {
					
					$userdata = $this->db->get_where('authors', array('id' => $this->input->post('id')))->row();
					$old_img = $userdata->image;
					$upload_status = 'true';
					$filename = $old_img;
					if (!empty($_FILES['image']['name'])) {
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_authors" . "." . $ext;
					}
					$config['upload_path'] = './public/uploads/authors/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 8024; // In KB
					$filesize = $config['max_size'];
					$config['file_name'] = $filename;
					// image upload code initilization
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					
					if (!$this->upload->do_upload('image')) {
						$upload_status = "false";
						} else {
						$upload_status = "true";
					}
					
					$data_arr = array(
					"image" => $filename,
					"date" => $this->data['date'],
					"name" => $this->input->post('name'),
					"media" => $this->input->post('media'),
					);
					
					if ($upload_status = 'true') {
						$table_name = "author";
						$unlink_filename = $old_img;
						$unlink_folder = "author";
						
						
						if ($this->db->where('id', $userdata->id)->update('authors', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Author Successfully Updated");
							redirect(base_url('Admin/ManageAuthor'));
							unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename);
							
							} else {
							echo "error";
							// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
						}
					}
					
				}
				// }
				} else {
				$this->load->view('Admin/ManageAuthor', $data);
			}
			// end here update 
		}
		# Authors End Here 
		
		
		# ManageSubject Start Here 
		public function ManageCourse()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get('subject')->result();
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					if (empty($_FILES['image']['name'])) {
						echo json_encode(array("status" => "error", "msg" => "Image Required.", "title" => "", "reload" => "false", "redirect" => 'false'));
						
						} else {
						$upload_status = 'true';
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_subject" . "." . $ext;
						
						$config['upload_path'] = './public/uploads/subject/';
						$config['allowed_types'] = 'jpg|png|jpeg|jfif';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						$data_arr = array(
						"image" => $filename,
						"date" => $this->data['date'],
						"subject" => $this->input->post('subject')
						);
						
						
						
						if ($upload_status = "true") {
							
							if ($this->db->insert('subject', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Subject Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
							}
						}
					}
				}
				
				// start here update 
				
				if ($this->uri->segment(3) == 'Update') {
					
					$userdata = $this->db->get_where('subject', array('id' => $this->input->post('id')))->row();
					$old_img = $userdata->image;
					$upload_status = 'true';
					$filename = $old_img;
					if (!empty($_FILES['image']['name'])) {
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_subject" . "." . $ext;
					}
					$config['upload_path'] = './public/uploads/subject/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 8024; // In KB
					$filesize = $config['max_size'];
					$config['file_name'] = $filename;
					// image upload code initilization
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					
					if (!$this->upload->do_upload('image')) {
						$upload_status = "false";
						} else {
						$upload_status = "true";
					}
					
					$data_arr = array(
					"image" => $filename,
					"date" => $this->data['date'],
					"subject" => $this->input->post('subject')
					);
					
					
					if ($upload_status = 'true') {
						$table_name = "subject";
						$unlink_filename = $old_img;
						$unlink_folder = "subject";
						
						if ($this->db->where('id', $userdata->id)->update('subject', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Subject Successfully Updated");
							redirect(base_url('Admin/ManageCourse'));
							unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename);
							
							} else {
							echo "error";
							// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
						}
					}
					
				}
				} else {
				$this->load->view('Admin/ManageCourse', $data);
			}
			// end here update 
		}
		
		# Subject End Here 
		
		
		
		
		# ManageSubject Start Here 
		public function ManageSemester()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get('semester')->result();
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					if (empty($_FILES['image']['name'])) {
						echo json_encode(array("status" => "error", "msg" => "Image Required.", "title" => "", "reload" => "false", "redirect" => 'false'));
						
						} else {
						$upload_status = 'true';
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_semester" . "." . $ext;
						
						$config['upload_path'] = './public/uploads/semester/';
						$config['allowed_types'] = 'jpg|png|jpeg|jfif';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						// $semester=implode(',', $this->input->post('semester'));
						
						$data_arr = array(
						"image" => $filename,
						"date" => $this->data['date'],
						"subject_id" => $this->input->post('subject_id'),
						"semester" => $this->input->post('semester')
						);
						
						if ($upload_status = "true") {
							
							if ($this->db->insert('semester', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Semester Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
								// echo "success";
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
								// echo "failed";
							}
						}
					}
				}
				
				// start here update 
				
				if ($this->uri->segment(3) == 'Update') {
					
					$userdata = $this->db->get_where('semester', array('id' => $this->input->post('id')))->row();
					$old_img = $userdata->image;
					$upload_status = 'true';
					$filename = $old_img;
					if (!empty($_FILES['image']['name'])) {
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_semester" . "." . $ext;
					}
					$config['upload_path'] = './public/uploads/semester/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 8024; // In KB
					$filesize = $config['max_size'];
					$config['file_name'] = $filename;
					// image upload code initilization
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					
					if (!$this->upload->do_upload('image')) {
						$upload_status = "false";
						} else {
						$upload_status = "true";
					}
					// $semester=implode(',', $this->input->post('semester'));
					$data_arr = array(
					"image" => $filename,
					"date" => $this->data['date'],
					"subject_id" => $this->input->post('subject_id'),
					"semester" => $this->input->post('semester')
					);
					
					
					if ($upload_status = 'true') {
						$table_name = "semester";
						$unlink_filename = $old_img;
						$unlink_folder = "semester";
						
						if ($this->db->where('id', $userdata->id)->update('semester', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Semester Successfully Updated");
							redirect(base_url('Admin/ManageSemester'));
							unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename);
							
							} else {
							echo "error";
							// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
						}
					}
					
				}
				} else {
				$this->load->view('Admin/ManageSemester', $data);
			}
			// end here update 
		}
		
		# Subject End Here 
		
		
		# PaperCategory Start Here 
		public function PaperCategory()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get('paper_category')->result();
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					if (empty($_FILES['image']['name'])) {
						echo json_encode(array("status" => "error", "msg" => "Image Required.", "title" => "", "reload" => "false", "redirect" => 'false'));
						
						} else {
						$upload_status = 'true';
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_paper_category" . "." . $ext;
						
						$config['upload_path'] = './public/uploads/paper_category/';
						$config['allowed_types'] = 'jpg|png|jpeg|jfif';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						$data_arr = array(
						"image" => $filename,
						"date" => $this->data['date'],
						"subject_id" => $this->input->post('subject_id'),
						"semester_id" => $this->input->post('semester_id'),
						"category_name" => $this->input->post('category_name')
						);
						
						
						if ($upload_status = "true") {
							
							if ($this->db->insert('paper_category', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Category Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
								// echo "success";
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
								// echo "failed";
							}
						}
					}
				}
				
				// start here update 
				
				if ($this->uri->segment(3) == 'Update') {
					
					$userdata = $this->db->get_where('paper_category', array('id' => $this->input->post('id')))->row();
					$old_img = $userdata->image;
					$upload_status = 'true';
					$filename = $old_img;
					if (!empty($_FILES['image']['name'])) {
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_paper_category" . "." . $ext;
					}
					$config['upload_path'] = './public/uploads/paper_category/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 8024; // In KB
					$filesize = $config['max_size'];
					$config['file_name'] = $filename;
					// image upload code initilization
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					
					if (!$this->upload->do_upload('image')) {
						$upload_status = "false";
						} else {
						$upload_status = "true";
					}
					
					$data_arr = array(
					"image" => $filename,
					"date" => $this->data['date'],
					"subject_id" => $this->input->post('subject_id'),
					"semester_id" => $this->input->post('semester_id'),
					"category_name" => $this->input->post('category_name')
					);
					
					
					if ($upload_status = 'true') {
						$table_name = "paper_category";
						$unlink_filename = $old_img;
						$unlink_folder = "paper_category";
						
						if ($this->db->where('id', $userdata->id)->update('paper_category', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Category Successfully Updated");
							redirect(base_url('Admin/PaperCategory'));
							unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename);
							
							} else {
							echo "error";
							// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
						}
					}
					
				}
				} else {
				$this->load->view('Admin/PaperCategory', $data);
			}
			// end here update 
		}
		
		# Paper Category End Here 
		
		# Semester Dropdown Code Start Here 
		public function SubCategoryDrop()
		{
			$subject_id = $this->input->post('subject_id');
			
			if (!empty($subject_id)) {
				$get = $this->db->get_where('semester', array('subject_id' => $subject_id))->result();
				echo "<option disabled='' selected=''>Select Semester</option>";
				foreach ($get as $each) {
				?>
				<option value="<?= $each->id ?>"><?= $each->semester ?></option>
				<?php
				}
			}
		}
		
		# Semester Dropdown Code End Here 
		
		
		
		# Category SubSub  Dropdown Code Start Here 
		public function SubSubCategoryDrop()
		{
			$semester_id = $this->input->post('semester_id');
			
			if (!empty($semester_id)) {
				$get = $this->db->get_where('paper_category', array('semester_id' => $semester_id))->result();
				echo "<option disabled='' selected=''>Select Category</option>";
				foreach ($get as $each) {
				?>
				<option value="<?= $each->id ?>"><?= $each->category_name ?></option>
				<?php
				}
			}
		}
		
		# Technology Category Sub Sub Sub Dropdown 
		# Category SubSub  Dropdown Code Start Here 
		public function SubSubSubCategoryDrop()
		{
			$category_id = $this->input->post('category_id');
			
			if (!empty($category_id)) {
				$get = $this->db->get_where('technology', array('category_id' => $category_id))->result();
				echo "<option disabled='' selected=''>Select Technology</option>";
				foreach ($get as $each) {
				?>
				<option value="<?= $each->id ?>"><?= $each->technology_name ?></option>
				<?php
				}
			}
		}
		
		# Semester Dropdown Code E	nd Here 
		
		
		# ManageTechnology Code End Here 
		public function ManageTechnology()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get('technology')->result();
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					if (empty($_FILES['image']['name'])) {
						echo json_encode(array("status" => "error", "msg" => "Image Required.", "title" => "", "reload" => "false", "redirect" => 'false'));
						
						} else {
						$upload_status = 'true';
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_technology" . "." . $ext;
						
						$config['upload_path'] = './public/uploads/technology/';
						$config['allowed_types'] = 'jpg|png|jpeg|jfif';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						$data_arr = array(
						"image" => $filename,
						"date" => $this->data['date'],
						"subject_id" => $this->input->post('subject_id'),
						"semester_id" => $this->input->post('semester_id'),
						"category_id" => $this->input->post('category_id'),
						"technology_name" => $this->input->post('technology_name')
						);
						
						if ($upload_status = "true") {
							
							if ($this->db->insert('technology', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Technology Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
								// echo "success";
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
								// echo "failed";
							}
						}
					}
				}
				
				// start here update 
				
				if ($this->uri->segment(3) == 'Update') {
					
					$userdata = $this->db->get_where('technology', array('id' => $this->input->post('id')))->row();
					$old_img = $userdata->image;
					$upload_status = 'true';
					$filename = $old_img;
					if (!empty($_FILES['image']['name'])) {
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_technology" . "." . $ext;
					}
					$config['upload_path'] = './public/uploads/technology/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 8024; // In KB
					$filesize = $config['max_size'];
					$config['file_name'] = $filename;
					// image upload code initilization
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					
					if (!$this->upload->do_upload('image')) {
						$upload_status = "false";
						} else {
						$upload_status = "true";
					}
					
					$data_arr = array(
					"image" => $filename,
					"date" => $this->data['date'],
					"subject_id" => $this->input->post('subject_id'),
					"semester_id" => $this->input->post('semester_id'),
					"category_id" => $this->input->post('category_id'),
					"technology_name" => $this->input->post('technology_name')
					);
					
					if ($upload_status = 'true') {
						$table_name = "technology";
						$unlink_filename = $old_img;
						$unlink_folder = "technology";
						
						if ($this->db->where('id', $userdata->id)->update('technology', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Technology Successfully Updated");
							redirect(base_url('Admin/ManageTechnology'));
							unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename);
							
							} else {
							echo "error";
							// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
						}
					}
					
				}
				} else {
				$this->load->view('Admin/ManageTechnology', $data);
			}
			// end here update 
		}
		
		# ManageTechnology Code End Here 
		
		
		
		
		
		
		
		
		
		
		# ManageBatchCategory Category Code End Here 
		public function ManageBatchCategory()
		{
			
			$data['userdata'] = $this->db->order_by('id', 'desc')->get('batch_category')->result();
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					
					
					//year added form here ======================
					if ($this->uri->segment(4) == 'year') {
						
						if ($this->db->insert('batch_date', ['year' => $_POST['year'], 'date' => date('d-m-Y')])) {
							echo json_encode(array("status" => "success", "msg" => "Year Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
							} else {
							
							echo json_encode(array("status" => "error", "msg" => "Year Not added.", "title" => "", "reload" => "false", "redirect" => 'false'));
						}
						
					}
					//year added end form here ======================
					
					
					if ($this->uri->segment(4) == 'batch') {
						
						
						
						if (empty($_FILES['image']['name'])) {
							echo json_encode(array("status" => "error", "msg" => "Image Required.", "title" => "", "reload" => "false", "redirect" => 'false'));
							
							} else {
							$upload_status = 'true';
							$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
							$filename = md5(time()) . "_batch" . "." . $ext;
							
							$config['upload_path'] = './public/uploads/Batch/';
							$config['allowed_types'] = 'jpg|png|jpeg|jfif';
							$config['max_size'] = 8024; // In KB
							$filesize = $config['max_size'];
							$config['file_name'] = $filename;
							// image upload code initilization
							$this->upload->initialize($config);
							$this->load->library('upload', $config);
							
							if (!$this->upload->do_upload('image')) {
								$upload_status = "false";
							}
							
							$data_arr = array(
							"batch_category_img" => $filename,
							"date" => $this->data['date'],
							"batch_year_id" => $this->input->post('year_id'),
							"batch_category_name" => $this->input->post('batch_name'),
							
							);
							
							
							if ($upload_status = "true") {
								
								if ($this->db->insert('batch_category', $data_arr)) {
									echo json_encode(array("status" => "success", "msg" => "Batch Category Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
									// echo "success";
									} else {
									echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
									// echo "failed";
								}
							}
						}
					}
				}
				
				// start here update 
				
				if ($this->uri->segment(3) == 'Update') {
					
					$userdata = $this->db->get_where('technology', array('id' => $this->input->post('id')))->row();
					$old_img = $userdata->image;
					$upload_status = 'true';
					$filename = $old_img;
					if (!empty($_FILES['image']['name'])) {
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_technology" . "." . $ext;
					}
					$config['upload_path'] = './public/uploads/technology/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 8024; // In KB
					$filesize = $config['max_size'];
					$config['file_name'] = $filename;
					// image upload code initilization
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					
					if (!$this->upload->do_upload('image')) {
						$upload_status = "false";
						} else {
						$upload_status = "true";
					}
					
					$data_arr = array(
					"image" => $filename,
					"date" => $this->data['date'],
					"subject_id" => $this->input->post('subject_id'),
					"semester_id" => $this->input->post('semester_id'),
					"category_id" => $this->input->post('category_id'),
					"technology_name" => $this->input->post('technology_name')
					);
					
					if ($upload_status = 'true') {
						$table_name = "technology";
						$unlink_filename = $old_img;
						$unlink_folder = "technology";
						
						if ($this->db->where('id', $userdata->id)->update('technology', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Technology Successfully Updated");
							redirect(base_url('Admin/ManageTechnology'));
							unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename);
							
							} else {
							echo "error";
							// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
						}
					}
					
				}
				} else {
				$this->load->view('Admin/ManageBatchCategory', $data);
			}
			// end here update 
		}
		
		# ManageTechnology Code End Here 
		
		
		# Technology Pdf Start Here 
		public function TechnologyPdf1()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get('technology_pdf')->result();
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					$data_arr = array(
					"date" => $this->data['date'],
					"subject_id" => $this->input->post('subject_id'),
					"semester_id" => $this->input->post('semester_id'),
					"category_id" => $this->input->post('category_id'),
					"technology_id" => $this->input->post('technology_id'),
					"pdf_name" => $this->input->post('pdf_name'),
					"pdf_url" => $this->input->post('pdf_url')
					);
					
					
					if ($this->db->insert('technology_pdf', $data_arr)) {
						echo json_encode(array("status" => "success", "msg" => "Technology Pdf Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
						// echo "success";
						} else {
						echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						// echo "failed";
					}
					
				}
				
				// start here update 
				
				if ($this->uri->segment(3) == 'Update') {
					
					$userdata = $this->db->get_where('technology_pdf', array('id' => $this->input->post('id')))->row();
					
					$data_arr = array(
					"date" => $this->data['date'],
					"subject_id" => $this->input->post('subject_id'),
					"semester_id" => $this->input->post('semester_id'),
					"category_id" => $this->input->post('category_id'),
					"technology_id" => $this->input->post('technology_id'),
					"pdf_name" => $this->input->post('pdf_name'),
					"pdf_url" => $this->input->post('pdf_url')
					);
					
					
					if ($this->db->where('id', $userdata->id)->update('technology_pdf', $data_arr)) {
						$this->session->set_flashdata("status", "success");
						$this->session->set_flashdata("msg", "Technology Pdf Successfully Updated");
						redirect(base_url('Admin/TechnologyPdf'));
						
						} else {
						echo "error";
						// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
					}
				}
				} else {
				$this->load->view('Admin/TechnologyPdf', $data);
			}
			// end here update 
		}
		
		
		# ManageTechnology Code End Here 
		public function TechnologyPdf()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get('technology_pdf')->result();
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					if (empty($_FILES['image']['name'])) {
						echo json_encode(array("status" => "error", "msg" => "Image Required.", "title" => "", "reload" => "false", "redirect" => 'false'));
						
						} else {
						$upload_status = 'true';
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_technology_pdf" . "." . $ext;
						
						$config['upload_path'] = './public/uploads/technology_pdf/';
						$config['allowed_types'] = 'jpg|png|jpeg|jfif|pdf';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						$data_arr = array(
						"date" => $this->data['date'],
						"image" => $filename,
						"subject_id" => $this->input->post('subject_id'),
						"semester_id" => $this->input->post('semester_id'),
						"category_id" => $this->input->post('category_id'),
						"technology_id" => $this->input->post('technology_id'),
						"pdf_name" => $this->input->post('pdf_name')
						// "pdf_url" => $this->input->post('pdf_url')
						);
						
						if ($upload_status = "true") {
							
							if ($this->db->insert('technology_pdf', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Technology  Pdf Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
								// echo "success";
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
								// echo "failed";
							}
						}
					}
				}
				
				// start here update 
				
				
				if ($this->uri->segment(3) == 'Update') {
					
					$userdata = $this->db->get_where('technology_pdf', array('id' => $this->input->post('id')))->row();
					$old_img = $userdata->image;
					$upload_status = 'true';
					$filename = $old_img;
					if (!empty($_FILES['image']['name'])) {
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_technology_pdf" . "." . $ext;
					}
					$config['upload_path'] = './public/uploads/technology_pdf/';
					$config['allowed_types'] = 'jpg|png|jpeg|pdf';
					$config['max_size'] = 8024; // In KB
					$filesize = $config['max_size'];
					$config['file_name'] = $filename;
					// image upload code initilization
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					
					if (!$this->upload->do_upload('image')) {
						$upload_status = "false";
						} else {
						$upload_status = "true";
					}
					
					$data_arr = array(
					"date" => $this->data['date'],
					"image" => $filename,
					"subject_id" => $this->input->post('subject_id'),
					"semester_id" => $this->input->post('semester_id'),
					"category_id" => $this->input->post('category_id'),
					"technology_id" => $this->input->post('technology_id'),
					"pdf_name" => $this->input->post('pdf_name')
					// "pdf_url" => $this->input->post('pdf_url')
					);
					
					if ($upload_status = 'true') {
						$table_name = "technology_pdf";
						$unlink_filename = $old_img;
						$unlink_folder = "technology_pdf";
						
						if ($this->db->where('id', $userdata->id)->update('technology_pdf', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Technology Pdf Successfully Updated");
							redirect(base_url('Admin/TechnologyPdf'));
							unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename);
							
							} else {
							echo "error";
							// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
						}
					}
					
				}
				
				} else {
				$this->load->view('Admin/TechnologyPdf', $data);
			}
			// end here update 
		}
		
		# Technology Pdf End Here 
		
		
		
		
		# Manage Videos Start Here 
		public function ManageVideos()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get('manage_videos')->result();
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					if (empty($_FILES['image']['name'])) {
						echo json_encode(array("status" => "error", "msg" => "Image Required.", "title" => "", "reload" => "false", "redirect" => 'false'));
						
						} else {
						$upload_status = 'true';
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_manage_videos" . "." . $ext;
						
						$config['upload_path'] = './public/uploads/manage_videos/';
						$config['allowed_types'] = 'jpg|png|jpeg|jfif';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						$data_arr = array(
						"image" => $filename,
						"date" => $this->data['date'],
						"author_id" => $this->input->post('author_id'),
						"video_type" => $this->input->post('video_type'),
						"url" => $this->input->post('url'),
						"title" => $this->input->post('title'),
						"short_desc" => $this->input->post('short_desc'),
						"description" => $this->input->post('description'),
						);
						
						if ($upload_status = "true") {
							
							if ($this->db->insert('manage_videos', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Videos News Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
								// echo "success";
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
								// echo "failed";
							}
						}
					}
				}
				
				// start here update 
				//Edit Expert
				if ($this->uri->segment(3) == 'Update') {
					
					$userdata = $this->db->get_where('manage_videos', array('id' => $this->input->post('id')))->row();
					$old_img = $userdata->image;
					$upload_status = 'true';
					$filename = $old_img;
					if (!empty($_FILES['image']['name'])) {
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_manage_videos" . "." . $ext;
					}
					$config['upload_path'] = './public/uploads/manage_videos/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 8024; // In KB
					$filesize = $config['max_size'];
					$config['file_name'] = $filename;
					// image upload code initilization
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					
					if (!$this->upload->do_upload('image')) {
						$upload_status = "false";
						} else {
						$upload_status = "true";
					}
					
					$data_arr = array(
					"image" => $filename,
					"date" => $this->data['date'],
					"author_id" => $this->input->post('author_id'),
					"video_type" => $this->input->post('video_type'),
					"url" => $this->input->post('url'),
					"title" => $this->input->post('title'),
					"short_desc" => $this->input->post('short_desc'),
					"description" => $this->input->post('description'),
					);
					
					
					if ($upload_status = 'true') {
						$table_name = "manage_videos";
						$unlink_filename = $old_img;
						$unlink_folder = "manage_videos";
						if ($this->db->where('id', $userdata->id)->update('manage_videos', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Videos Successfully Updated");
							redirect(base_url('Admin/ManageVideos'));
							unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename);
							
							} else {
							echo "error";
							// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
						}
					}
					
				}
				// }
				} else {
				
				$this->load->view('Admin/ManageVideos', $data);
			}
			// end here update 
		}
		# ManageVideos news End Here 
		
		
		
		# Trending Videos Start Here 
		public function TrendingVideos()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get('trending_videos')->result();
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					if (empty($_FILES['image']['name'])) {
						echo json_encode(array("status" => "error", "msg" => "Image Required.", "title" => "", "reload" => "false", "redirect" => 'false'));
						
						} else {
						$upload_status = 'true';
						if (!empty($_FILES['image']['name'])) {
							$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
							$filename = md5(time()) . "_trending_videos_image" . "." . $ext;
							
							$config['upload_path'] = './public/uploads/trending_videos_image/';
							$config['allowed_types'] = 'jpg|png|jpeg|jfif|mp4';
							$config['max_size'] = 8024; // In KB
							$filesize = $config['max_size'];
							$config['file_name'] = $filename;
							// image upload code initilization
							$this->upload->initialize($config);
							$this->load->library('upload', $config);
							if (!$this->upload->do_upload('image')) {
								$upload_status = "false";
							}
						}
						
						# upload video 
						if (!empty($_FILES['url']['name'])) {
							$ext1 = pathinfo($_FILES["url"]["name"], PATHINFO_EXTENSION);
							$filename1 = md5(time()) . "_trending_videos" . "." . $ext1;
							
							$config1['upload_path'] = './public/uploads/trending_videos/';
							$config1['allowed_types'] = 'jpg|png|jpeg|jfif|mp4';
							$config1['max_size'] = 20480; // In KB
							
							$filesize1 = $config1['max_size'];
							$config1['file_name'] = $filename1;
							// image upload code initilization
							$this->upload->initialize($config1);
							$this->load->library('upload', $config1);
							if (!$this->upload->do_upload('url')) {
								$upload_status = "false";
							}
						}
						// end here 
						
						// if (!$this->upload->do_upload('image'))
						// {
						// $upload_status = "false";
						// }
						
						$data_arr = array(
						"image" => $filename,
						"url" => $filename1,
						"date" => $this->data['date'],
						"author_id" => $this->input->post('author_id'),
						"video_type" => $this->input->post('video_type'),
						// "url" => $this->input->post('url'),
						"title" => $this->input->post('title')
						);
						
						if ($upload_status = "true") {
							
							if ($this->db->insert('trending_videos', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Trending Videos Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
								// echo "success";
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
								// echo "failed";
							}
						}
					}
				}
				
				// start here update 
				//Edit Expert
				if ($this->uri->segment(3) == 'Update') {
					
					$userdata = $this->db->get_where('trending_videos', array('id' => $this->input->post('id')))->row();
					$old_img = $userdata->image;
					$old_img1 = $userdata->url;
					$upload_status = 'true';
					$filename = $old_img;
					$filename1 = $old_img1;
					if (!empty($_FILES['image']['name'])) {
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_trending_videos_image" . "." . $ext;
						$config['upload_path'] = './public/uploads/trending_videos_image/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
					}
					
					
					
					
					if (!empty($_FILES['url']['name'])) {
						$ext1 = pathinfo($_FILES["url"]["name"], PATHINFO_EXTENSION);
						$filename1 = md5(time()) . "_trending_videos" . "." . $ext1;
						$config1['upload_path'] = './public/uploads/trending_videos/';
						$config1['allowed_types'] = 'jpg|png|jpeg|mp4';
						$config1['max_size'] = 20480; // In KB
						$filesize1 = $config1['max_size'];
						$config1['file_name'] = $filename1;
						// image upload code initilization
						$this->upload->initialize($config1);
						$this->load->library('upload', $config1);
						if (!$this->upload->do_upload('url')) {
							$upload_status = "false";
						}
					}
					
					// else
					// {
					// $upload_status = "true";
					// }
					
					$data_arr = array(
					"image" => $filename,
					"url" => $filename1,
					"date" => $this->data['date'],
					"author_id" => $this->input->post('author_id'),
					"video_type" => $this->input->post('video_type'),
					// "url" => $this->input->post('url'),
					"title" => $this->input->post('title')
					);
					
					
					if ($upload_status = 'true') {
						$table_name = "trending_videos";
						$unlink_filename = $old_img;
						$unlink_folder = "trending_videos";
						if ($this->db->where('id', $userdata->id)->update('trending_videos', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Trending Videos Successfully Updated");
							redirect(base_url('Admin/TrendingVideos'));
							unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename);
							
							} else {
							echo "error";
							// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
						}
					}
					
				}
				// }
				} else {
				
				$this->load->view('Admin/TrendingVideos', $data);
			}
			// end here update 
		}
		# TrendingVideos news End Here
		
		
		# ManageTechnologyCategory Video Start Here  
		public function ManageTechnologyCategory()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get('technology_category')->result();
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					if (empty($_FILES['image']['name'])) {
						echo json_encode(array("status" => "error", "msg" => "Image Required.", "title" => "", "reload" => "false", "redirect" => 'false'));
						
						} else {
						$upload_status = 'true';
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_subject" . "." . $ext;
						
						$config['upload_path'] = './public/uploads/technology_category/';
						$config['allowed_types'] = 'jpg|png|jpeg|jfif';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						$data_arr = array(
						"image" => $filename,
						"date" => $this->data['date'],
						"course" => $this->input->post('course')
						);
						
						if ($upload_status = "true") {
							
							if ($this->db->insert('technology_category', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Technology Category Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
								// echo "success";
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
								// echo "failed";
							}
						}
					}
				}
				
				// start here update 
				
				if ($this->uri->segment(3) == 'Update') {
					
					$userdata = $this->db->get_where('technology_category', array('id' => $this->input->post('id')))->row();
					$old_img = $userdata->image;
					$upload_status = 'true';
					$filename = $old_img;
					if (!empty($_FILES['image']['name'])) {
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_technology_category" . "." . $ext;
					}
					$config['upload_path'] = './public/uploads/technology_category/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 8024; // In KB
					$filesize = $config['max_size'];
					$config['file_name'] = $filename;
					// image upload code initilization
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					
					if (!$this->upload->do_upload('image')) {
						$upload_status = "false";
						} else {
						$upload_status = "true";
					}
					
					$data_arr = array(
					"image" => $filename,
					"date" => $this->data['date'],
					"course" => $this->input->post('course')
					);
					
					
					if ($upload_status = 'true') {
						$table_name = "technology_category";
						$unlink_filename = $old_img;
						$unlink_folder = "technology_category";
						
						if ($this->db->where('id', $userdata->id)->update('technology_category', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Technology Category Successfully Updated");
							redirect(base_url('Admin/ManageTechnologyCategory'));
							unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename);
							
							} else {
							echo "error";
							// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
						}
					}
					
				}
				} else {
				$this->load->view('Admin/ManageTechnologyCategory', $data);
			}
			// end here update 
		}
		# ManageTechnologyCategory Video End Here 
		
		
		
		# ManageTechnologyVideo Start  Here 
		public function ManageTechnologyVideo()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('technology_videos', ['batch_category_id' => '0'])->result();
			
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					if (empty($_FILES['image']['name'])) {
						echo json_encode(array("status" => "error", "msg" => "Image Required.", "title" => "", "reload" => "false", "redirect" => 'false'));
						
						} else {
						$upload_status = 'true';
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_technology_videos" . "." . $ext;
						
						$config['upload_path'] = './public/uploads/technology_videos/';
						$config['allowed_types'] = 'jpg|png|jpeg|jfif';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						$data_arr = array(
						"image" => $filename,
						"date" => $this->data['date'],
						"technology_category_id" => $this->input->post('technology_category_id'),
						"author_id" => $this->input->post('author_id'),
						"url" => $this->input->post('url'),
						"title" => $this->input->post('title'),
						"video_type" => $this->input->post('video_type'),
						"short_desc" => $this->input->post('short_desc'),
						"description" => $this->input->post('description')
						);
						
						if ($upload_status = "true") {
							
							if ($this->db->insert('technology_videos', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Technology Video Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
								// echo "success";
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
								// echo "failed";
							}
						}
					}
				}
				
				
				// start here update 
				//Edit Expert
				if ($this->uri->segment(3) == 'Update') {
					
					$userdata = $this->db->get_where('technology_videos', array('id' => $this->input->post('id')))->row();
					$old_img = $userdata->image;
					$upload_status = 'true';
					$filename = $old_img;
					if (!empty($_FILES['image']['name'])) {
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_technology_videos" . "." . $ext;
					}
					$config['upload_path'] = './public/uploads/technology_videos/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 8024; // In KB
					$filesize = $config['max_size'];
					$config['file_name'] = $filename;
					// image upload code initilization
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					
					if (!$this->upload->do_upload('image')) {
						$upload_status = "false";
						} else {
						$upload_status = "true";
					}
					
					$data_arr = array(
					"image" => $filename,
					"date" => $this->data['date'],
					"technology_category_id" => $this->input->post('technology_category_id'),
					"author_id" => $this->input->post('author_id'),
					"url" => $this->input->post('url'),
					"title" => $this->input->post('title'),
					"video_type" => $this->input->post('video_type'),
					"short_desc" => $this->input->post('short_desc'),
					"description" => $this->input->post('description')
					);
					
					
					if ($upload_status = 'true') {
						$table_name = "technology_videos";
						$unlink_filename = $old_img;
						$unlink_folder = "technology_videos";
						if ($this->db->where('id', $userdata->id)->update('technology_videos', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Technology Video Successfully Updated");
							redirect(base_url('Admin/ManageTechnologyVideo'));
							unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename);
							
							} else {
							echo "error";
							// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
						}
					}
					
				}
				// }
				} else {
				
				$this->load->view('Admin/ManageTechnologyVideo', $data);
			}
			// end here update 
		}
		# ManageVideos news End Here 
		
		
		# ManageTechnologyVideo Start  Here 
		public function ManageBatchVideo()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('technology_videos', ['batch_category_id !=' => '0'])->result();
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					if (empty($_FILES['image']['name'])) {
						echo json_encode(array("status" => "error", "msg" => "Image Required.", "title" => "", "reload" => "false", "redirect" => 'false'));
						
						} else {
						$upload_status = 'true';
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_batch_videos" . "." . $ext;
						
						$config['upload_path'] = './public/uploads/batch_videos/';
						$config['allowed_types'] = 'jpg|png|jpeg|jfif';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						$data_arr = array(
						"image" => $filename,
						"date" => $this->data['date'],
						"technology_category_id" => $this->input->post('technology_category_id'),
						"author_id" => $this->input->post('author_id'),
						"url" => $this->input->post('url'),
						"title" => $this->input->post('title'),
						"video_type" => $this->input->post('video_type'),
						"batch_category_id" => $this->input->post('batch_category'),
						"short_desc" => $this->input->post('short_desc'),
						"description" => $this->input->post('description')
						);
						
						if ($upload_status = "true") {
							
							if ($this->db->insert('technology_videos', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Batch Video Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
								// echo "success";
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
								// echo "failed";
							}
						}
					}
				}
				
				
				// start here update 
				//Edit Expert
				if ($this->uri->segment(3) == 'Update') {
					
					$userdata = $this->db->get_where('technology_videos', array('id' => $this->input->post('id')))->row();
					$old_img = $userdata->image;
					$upload_status = 'true';
					$filename = $old_img;
					if (!empty($_FILES['image']['name'])) {
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_technology_videos" . "." . $ext;
					}
					$config['upload_path'] = './public/uploads/technology_videos/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 8024; // In KB
					$filesize = $config['max_size'];
					$config['file_name'] = $filename;
					// image upload code initilization
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					
					if (!$this->upload->do_upload('image')) {
						$upload_status = "false";
						} else {
						$upload_status = "true";
					}
					
					$data_arr = array(
					"image" => $filename,
					"date" => $this->data['date'],
					"technology_category_id" => $this->input->post('technology_category_id'),
					"author_id" => $this->input->post('author_id'),
					"url" => $this->input->post('url'),
					"title" => $this->input->post('title'),
					"video_type" => $this->input->post('video_type'),
					"short_desc" => $this->input->post('short_desc'),
					"description" => $this->input->post('description')
					);
					
					
					if ($upload_status = 'true') {
						$table_name = "technology_videos";
						$unlink_filename = $old_img;
						$unlink_folder = "technology_videos";
						if ($this->db->where('id', $userdata->id)->update('technology_videos', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Technology Video Successfully Updated");
							redirect(base_url('Admin/ManageTechnologyVideo'));
							unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename);
							
							} else {
							echo "error";
							// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
						}
					}
					
				}
				// }
				} else {
				
				$this->load->view('Admin/ManageBatchVideo', $data);
			}
			// end here update 
		}
		# ManageVideos news End Here 
		
		
		# JobCategory Start Here 
		public function JobCategory()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get('job_category')->result();
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					
					$data_arr = array(
					"date" => $this->data['date'],
					"category_name" => $this->input->post('category_name')
					);
					
					
					if ($this->db->insert('job_category', $data_arr)) {
						echo json_encode(array("status" => "success", "msg" => "Job Category Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
						// echo "success";
						} else {
						echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						// echo "failed";
					}
					
				}
				
				// start here update 
				
				if ($this->uri->segment(3) == 'Update') {
					
					$userdata = $this->db->get_where('job_category', array('id' => $this->input->post('id')))->row();
					
					
					$data_arr = array(
					"date" => $this->data['date'],
					"category_name" => $this->input->post('category_name')
					);
					
					
					if ($this->db->where('id', $userdata->id)->update('job_category', $data_arr)) {
						$this->session->set_flashdata("status", "success");
						$this->session->set_flashdata("msg", "Job Category Successfully Updated");
						redirect(base_url('Admin/JobCategory'));
						
						} else {
						echo "error";
						// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
					}
					
				}
				} else {
				$this->load->view('Admin/JobCategory', $data);
			}
			// end here update 
		}
		
		# Job category End Here 
		
		
		# JobDetails Start Here 
		public function JobDetails()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get('job_details')->result();
			if ($this->uri->segment(3)) {
				if ($this->uri->segment(3) == 'Add') {
					if (empty($_FILES['image']['name'])) {
						echo json_encode(array("status" => "error", "msg" => "Image Required.", "title" => "", "reload" => "false", "redirect" => 'false'));
						
						} else {
						$upload_status = 'true';
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_job_details" . "." . $ext;
						
						$config['upload_path'] = './public/uploads/job_details/';
						$config['allowed_types'] = 'jpg|png|jpeg|jfif';
						$config['max_size'] = 8024; // In KB
						$filesize = $config['max_size'];
						$config['file_name'] = $filename;
						$this->upload->initialize($config);
						// image upload code initilization
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						
						if (!$this->upload->do_upload('image')) {
							$upload_status = "false";
						}
						
						
						$data_arr = array(
						"image" => $filename,
						"date" => $this->data['date'],
						"jobcategory_id" => $this->input->post('jobcategory_id'),
						"job_title" => $this->input->post('job_title'),
						"company_name" => $this->input->post('company_name'),
						"job_role" => $this->input->post('job_role'),
						"location" => $this->input->post('location'),
						"salary" => $this->input->post('salary'),
						"job_shift" => $this->input->post('job_shift'),
						"job_mode" => $this->input->post('job_mode'),
						"mobile" => $this->input->post('mobile'),
						"email" => $this->input->post('email'),
						"website" => $this->input->post('website'),
						"education" => $this->input->post('education'),
						"experience" => $this->input->post('experience'),
						"skill" => $this->input->post('skill')
						);
						
						if ($upload_status = "true") {
							
							if ($this->db->insert('job_details', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Job Details Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
								// echo "success";
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
								// echo "failed";
							}
						}
					}
				}
				
				// start here update 
				
				if ($this->uri->segment(3) == 'Update') {
					
					$userdata = $this->db->get_where('job_details', array('id' => $this->input->post('id')))->row();
					$old_img = $userdata->image;
					$upload_status = 'true';
					$filename = $old_img;
					if (!empty($_FILES['image']['name'])) {
						$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
						$filename = md5(time()) . "_job_details" . "." . $ext;
					}
					$config['upload_path'] = './public/uploads/job_details/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 8024; // In KB
					$filesize = $config['max_size'];
					$config['file_name'] = $filename;
					// image upload code initilization
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					
					if (!$this->upload->do_upload('image')) {
						$upload_status = "false";
						} else {
						$upload_status = "true";
					}
					
					$data_arr = array(
					"image" => $filename,
					"date" => $this->data['date'],
					"jobcategory_id" => $this->input->post('jobcategory_id'),
					"job_title" => $this->input->post('job_title'),
					"company_name" => $this->input->post('company_name'),
					"job_role" => $this->input->post('job_role'),
					"location" => $this->input->post('location'),
					"salary" => $this->input->post('salary'),
					"job_shift" => $this->input->post('job_shift'),
					"job_mode" => $this->input->post('job_mode'),
					"mobile" => $this->input->post('mobile'),
					"email" => $this->input->post('email'),
					"website" => $this->input->post('website'),
					"education" => $this->input->post('education'),
					"experience" => $this->input->post('experience'),
					"skill" => $this->input->post('skill')
					);
					
					
					if ($upload_status = 'true') {
						$table_name = "job_details";
						$unlink_filename = $old_img;
						$unlink_folder = "job_details";
						
						if ($this->db->where('id', $userdata->id)->update('job_details', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Job Details Successfully Updated");
							redirect(base_url('Admin/JobDetails'));
							unlink('./public/uploads/' . $unlink_folder . '/' . $unlink_filename);
							
							} else {
							echo "error";
							// echo json_encode(array("status" => "error", "msg" => "Something Went Wrong .", "title" => "", "reload" => "true", "redirect" => 'false'));
						}
					}
					
				}
				} else {
				$this->load->view('Admin/JobDetails', $data);
			}
			// end here update 
		}
		
		# JobDetails End Here 
		
		
		# ManageNotificaion Start Here 
		public function ManageNotification()
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get('manage_notification')->result();
			
			if ($this->uri->segment(3) == 'Add') {
				// if (empty($_FILES['image']['name']))
				// {
				// echo json_encode(array("status" => "error", "msg" => "Image Required.", "title" => "", "reload" => "false", "redirect" => 'false'));
				// }
				// else
				// {
				$upload_status = 'true';
				$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
				$filename = md5(time()) . "_manage_notification" . "." . $ext;
				$config['upload_path'] = './public/uploads/manage_notification/';
				$config['allowed_types'] = 'jpg|png|jpeg|jfif';
				$config['max_size'] = 8024;
				$filesize = $config['max_size'];
				$config['file_name'] = $filename;
				$this->upload->initialize($config);
				$this->upload->initialize($config);
				$this->load->library('upload', $config);
				
				if (!$this->upload->do_upload('image')) {
					$upload_status = "false";
				}
				
				$notifilename = base_url('./public/uploads/manage_notification/') . $filename;
				
				$data_arr = array(
				'title' => $this->input->post('title'),
				'body' => $this->input->post('description'),
				'image' => $filename,
				"date" => $this->data['date'] . ' ' . $this->data['time'],
				"android_channel_id" => $this->input->post('android_channel_id'),
				);
				
				
				if ($upload_status = "true") {
					
					if ($this->db->insert('manage_notification', $data_arr)) 
					{
						
						$sel = $this->db->get('app_token');
						if ($sel->num_rows()) {
							$data = $sel->result();
							foreach ($data as $value) {
								$alltokendata[] = $value->token;
							}
							$totaltoken = count($alltokendata);
							$start = 0;
							for ($start = 0; $start < $totaltoken; $start++) {
								$token = array_slice($alltokendata, $start, $start + 999);
								// $click_action='';
								$data = array('id' => 1);
								
								if (empty($_FILES["image"]["name"])) {
									$ms = $this->app->send_notification_multiple($this->input->post('android_channel_id'), $this->input->post('description'), $this->input->post('title'), $alltokendata);
									} else {
									$ms = $this->app->send_notification_multiple_image($this->input->post('android_channel_id'), $this->input->post('description'), $this->input->post('title'), $notifilename, $alltokendata);
								}
								$start = $start + 999;
							}
							sleep(1);
							
						}
						echo json_encode(array("status" => "success", "msg" => "Notification Successfully Added", "title" => "", "reload" => "true", "redirect" => 'false'));
						
						
					} 
					else 
					{
						echo json_encode(array("status" => "error", "msg" => "Something Went Wrong", "title" => "Something went wrong!", "reload" => "false", "redirect" => 'false'));
						// echo "failed";
					}
				}
				// }
				// }
				
				// start here update 
				
				} else {
				$this->load->view('Admin/ManageNotification', $data);
			}
			// end here update 
			
		}
		
		# EditRegDetails 
		
		public function EditRegDetails($id)
		{
			$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('registration', array('id' => $id))->row();
			$this->load->view('Admin/EditRegDetails', $data);
		}
		
		
		# UpdateReg 
		
		public function UpdateReg()
		{
			
			if ($this->uri->segment(3) == 'TnxStatus') {
				$id = $this->input->post('id');
				$tnxpass = md5($this->input->post('tnxpass'));
				$tnxdata = $this->db->get('admin_login')->row();
				if ($tnxpass == $tnxdata->tnx_password) {
					$data_arr = array(
					"txn_status" => $this->input->post('tnx')
					);
					$this->db->where('id', $id);
					
					if ($this->db->update('registration', $data_arr)) {
						
						$this->session->set_flashdata("status", "success");
						$this->session->set_flashdata("msg", "Successfully Updated.");
						redirect(base_url('Admin/Registration'));
						} else {
						$this->session->set_flashdata("status", "error");
						$this->session->set_flashdata("msg", "Somethig went wrong!");
						redirect(base_url('Admin/Registration'));
					}
					} else {
					$this->session->set_flashdata("status", "error");
					$this->session->set_flashdata("msg", "Wrong Tnx Password!");
					redirect(base_url('Admin/Registration'));
				}
				} else {
				$this->form_validation->set_rules('ApplicationFor', 'Training Type', 'required');
				$this->form_validation->set_rules('Technology', 'Technology', 'required');
				$this->form_validation->set_rules('Course', 'Course', 'required');
				$this->form_validation->set_rules('Year', 'Year', 'required');
				$this->form_validation->set_rules('Name', 'Student Name', 'required');
				$this->form_validation->set_rules('Father', 'Father Name', 'required');
				$this->form_validation->set_rules('Mobile1', 'Mobile No.', 'required');
				$this->form_validation->set_rules('College', 'College Name', 'required');
				
				$id = $this->input->post('id');
				if ($this->form_validation->run() == false) {
					redirect(base_url('Admin/EditRegDetails/') . $id);
					} else {
					$data_arr = array(
					"training_type" => $this->input->post('ApplicationFor'),
					"technology" => $this->input->post('Technology'),
					"student_name" => $this->input->post('Name'),
					"course" => $this->input->post('Course'),
					"father_name" => $this->input->post('Father'),
					"email" => $this->input->post('Email'),
					"edu_year" => $this->input->post('Year'),
					"college_name" => $this->input->post('College'),
					"mobile" => $this->input->post('Mobile1'),
					"alt_mobile" => $this->input->post('Mobile2')
					);
					$this->db->where('id', $id);
					
					if ($this->db->update('registration', $data_arr)) {
						$this->session->set_flashdata("status", "success");
						$this->session->set_flashdata("msg", "Successfully Updated.");
						redirect(base_url('Admin/Registration'));
						} else {
						$this->session->set_flashdata("status", "error");
						$this->session->set_flashdata("msg", "Somethig went wrong!");
						redirect(base_url('Admin/EditRegDetails/') . $id);
					}
				}
			}
			
		}
		
		#ManageBatch
		// public function ManageBatch()
		// {
		// $this->load->view("Admin/ManageBatch");
		// }
		
		#ManageStudent
		public function ManageStudent()
		{
			$batch_id = $this->uri->segment(3);
			$data['batch_id'] = $batch_id;  
			$data['studentdata'] = $this->db->order_by('id', 'desc')->get_where('registration', array('accept_status' => 'accept'))->result();
			
			$batch = $this->db->select('student_id')->get_where('tbl_batch', array('id' => $batch_id))->row();
			if ($batch && !empty($batch->student_id)) 
			{
				$student_ids_array = explode(',', $batch->student_id);
				$all_students = $this->db->order_by('id', 'desc')->get_where('registration', array('accept_status' => 'accept'))->result();
				
				$filtered_students = [];
				foreach ($all_students as $student) {
					if (in_array($student->id, $student_ids_array)) {
						$filtered_students[] = $student;
					}
				}
				$data['studentaddeddata'] = $filtered_students;
				} else {
				$data['studentaddeddata'] = [];
			}
			$this->load->view("Admin/ManageStudent",$data);
		}
		
		
		// Add Student Batch checked student 
		public function AddStudentCheckbox()
		{
			$student_ids = $this->input->post('student_ids');
			$batch_id = $this->input->post('batch_id');
			
			$response = array();
			if (!empty($batch_id)) 
			{
				if (is_string($student_ids)) {
					$student_ids = explode(',', $student_ids);
				}
				
				if (is_array($student_ids) && !empty($student_ids)) 
				{
					$batch_data = $this->db->get_where('tbl_batch', ['id' => $batch_id])->row();
					$existing_student_ids = !empty($batch_data) ? explode(',', $batch_data->student_id) : [];
					
					$merged_student_ids = array_unique(array_merge($existing_student_ids, $student_ids));
					
					$student_ids_str = implode(',', $merged_student_ids);
					$data = array(
					'student_id' => $student_ids_str
					);
					
					$this->db->where('id', $batch_id);
					$this->db->update('tbl_batch', $data);
					
					if ($this->db->affected_rows() > 0) {
						$response = array(
						'status' => 'success',
						'message' => 'Students updated for this batch.'
						);
						} else {
						$response = array(
						'status' => 'error',
						'message' => 'No changes were made or batch not found.'
						);
					}
				} 
				else 
				{
					$response = array(
					'status' => 'error',
					'message' => 'Student IDs are empty or invalid.'
					);
				}
			} 
			else 
			{
				$response = array(
				'status' => 'error',
				'message' => 'Batch ID missing.'
				);
			}
			echo json_encode($response);
		}
		
		
		
		// unchecked student function here from batch 
		public function updateBatchStudents()
		{
			$batch_id = $this->input->post('batch_id');
			$unchecked_ids = $this->input->post('unchecked_ids');
			
			if (!empty($batch_id) && !empty($unchecked_ids)) 
			{
				$batch = $this->db->select('student_id')->get_where('tbl_batch', array('id' => $batch_id))->row();
				
				if ($batch && !empty($batch->student_id)) 
				{
					$student_ids_array = explode(',', $batch->student_id);
					$updated_student_ids = array_diff($student_ids_array, $unchecked_ids);
					
					$updated_student_ids_str = implode(',', $updated_student_ids);
					$this->db->where('id', $batch_id);
					$this->db->update('tbl_batch', array('student_id' => $updated_student_ids_str));
					
					echo json_encode(['status' => 1, 'message' => 'Batch updated successfully']);
					} else {
					echo json_encode(['status' => 0, 'message' => 'Batch not found or no students']);
				}
				} else {
				echo json_encode(['status' => 0, 'message' => 'Invalid request']);
			}
		}
		
		
		
		#ManageAttandance
		// public function ManageAttandance()
		// {
		// $this->load->view("Admin/ManageAttandance");
		// }
		
		
		public function ManageAttendance()
		{
			if ($this->input->post()) 
			{
				// Get and format date
				$date = date("Y-m-d", strtotime($this->input->post('date')));
				$data["date"] = $date;
				
				$batch_id = $this->input->post('batch_id');
				$data["batch_id"] = $batch_id;
				
				$batchData = $this->db->get_where('tbl_batch', ['id' => $batch_id])->row();
				$data["batchData"] = $batchData;
				
				if ($batchData && isset($batchData->student_id)) 
				{
					$student_ids = $batchData->student_id;
					$student_ids_array = explode(',', $student_ids); 
					
					if (!empty($student_ids_array)) 
					{
						$this->db->where_in('id', $student_ids_array);
						$data["studentsData"] = $this->db->get('registration')->result();
					} 
					else 
					{
						$data["studentsData"] = []; 
					}
				} 
				else 
				{
					$data["studentsData"] = []; 
				}
				$this->load->view("Admin/ManageAttendance", $data);
			} 
			else 
			{
				$this->load->view("Admin/ManageAttendance");
			}
		}
		
		
		// Manage Attendance 
		public function AddStudentAttendance()
		{
			$date = $this->input->post('date');
			$batch_id = $this->input->post('batch_id');
			$student_ids = $this->input->post('student_ids');
			
			if (!empty($batch_id) && !empty($student_ids)) 
			{
				$student_ids_imploded = implode(',', explode(',', $student_ids));
				$existing_record = $this->db->get_where('tbl_attendance', ['batch_id' => $batch_id, 'date' => $date])->row();
				
				if ($existing_record) {
					$existing_student_ids = $existing_record->student_id;
					$new_student_ids = array_unique(array_merge(explode(',', $existing_student_ids), explode(',', $student_ids_imploded)));
					$updated_student_ids = implode(',', $new_student_ids);
					$this->db->where('id', $existing_record->id);
					$this->db->update('tbl_attendance', ['student_id' => $updated_student_ids]);
					
					echo json_encode(['status' => 'success', 'message' => 'Attendance updated successfully.']);
				} 
				else 
				{
					$data = [
					'batch_id' => $batch_id,
					'student_id' => $student_ids_imploded,
					'date' => $date,
					'status' => 'Present'
					];
					
					$this->db->insert('tbl_attendance', $data);
					echo json_encode(['status' => 'success', 'message' => 'Attendance Added successfully.']);
				}
			} 
			else 
			{
				echo json_encode(['status' => 'error', 'message' => 'Invalid data provided.']);
			}
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		# ManageCoupon 
		public function ManageCoupon()
		{
			
			if ($this->uri->segment(3) == 'Add') {
				$this->form_validation->set_rules('name', 'Coupon Name', 'required');
				$this->form_validation->set_rules('code', 'Coupon Code', 'required');
				$this->form_validation->set_rules('amount', 'Coupon Amount', 'required');
				$this->form_validation->set_rules('max', 'Max Use', 'required');
				$this->form_validation->set_rules('desc', 'Description', 'required');
				$this->form_validation->set_rules('exp', 'Expiry Date', 'required');
				
				if ($this->form_validation->run() == true) {
					if (empty($this->db->get_where("tbl_coupon", ["code" => $this->input->post('code')])->row())) {
						if ($this->data['tnxpass'] == md5($this->input->post('tnxpass'))) {
							$data_arr = array(
							"name" => $this->input->post('name'),
							"code" => $this->input->post('code'),
							"amount" => $this->input->post('amount'),
							"description" => $this->input->post('desc'),
							"max_use" => $this->input->post('max'),
							"expiry_date" => $this->input->post('exp'),
							"status" => "true",
							"created_at" => $this->data['date'] . ' ' . $this->data['time'],
							"modified_at" => ""
							);
							if ($this->db->insert('tbl_coupon', $data_arr)) {
								echo json_encode(array("status" => "success", "msg" => "Successfully Add.", "title" => "Successfully Add.", "reload" => "false", "redirect" => 'false'));
								} else {
								echo json_encode(array("status" => "error", "msg" => "Something went wrong.", "title" => "Something went wrong.", "reload" => "false", "redirect" => 'false'));
							}
							} else {
							echo json_encode(array("status" => "error", "msg" => "Wrong Tnx Password!", "title" => "", "reload" => "false", "redirect" => 'false'));
						}
						} else {
						echo json_encode(array("status" => "error", "msg" => "Coupon Code Already Exist.", "title" => "Coupon Code Already Exist.", "reload" => "false", "redirect" => 'false'));
					}
					} else {
					echo json_encode(array("status" => "error", "msg" => "All field are required.", "title" => "All field are required.", "reload" => "false", "redirect" => 'false'));
				}
				
				} else if ($this->uri->segment(3) == 'Update') {
				$this->form_validation->set_rules('name', 'Coupon Name', 'required');
				$this->form_validation->set_rules('code', 'Coupon Code', 'required');
				$this->form_validation->set_rules('amount', 'Coupon Amount', 'required');
				$this->form_validation->set_rules('max', 'Max Use', 'required');
				$this->form_validation->set_rules('desc', 'Description', 'required');
				$this->form_validation->set_rules('exp', 'Expiry date', 'required');
				
				$id = $this->input->post('id');
				if ($this->form_validation->run() == false) {
					$this->session->set_flashdata("status", "error");
					$this->session->set_flashdata("msg", "All fields are required.");
					redirect(base_url('Admin/ManageCoupon'));
					// echo json_encode(array("status" => "error", "msg" => "All field are required.", "title" => "All field are required.", "reload" => "true", "redirect" => 'false'));
					} else {
					if ($this->data['tnxpass'] == md5($this->input->post('tnxpass'))) {
						$data_arr = array(
						"name" => $this->input->post('name'),
						"code" => $this->input->post('code'),
						"amount" => $this->input->post('amount'),
						"description" => $this->input->post('desc'),
						"max_use" => $this->input->post('max'),
						"expiry_date" => $this->input->post('exp'),
						"status" => "true",
						"modified_at" => $this->data['date'] . ' ' . $this->data['time']
						);
						
						
						$this->db->where('id', $id);
						if ($this->db->update('tbl_coupon', $data_arr)) {
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Successfully Updated.");
							redirect(base_url('Admin/ManageCoupon'));
							// echo json_encode(array("status" => "success", "msg" => "Successfully Updated.", "title" => "Successfully Updated.", "reload" => "false", "redirect" => 'false'));
							} else {
							$this->session->set_flashdata("status", "error");
							$this->session->set_flashdata("msg", "Somethig went wrong.");
							redirect(base_url('Admin/ManageCoupon'));
							// echo json_encode(array("status" => "error", "msg" => "Somethig went wrong.", "title" => "Somethig went wrong.", "reload" => "false", "redirect" => 'false'));
						}
						} else {
						$this->session->set_flashdata("status", "error");
						$this->session->set_flashdata("msg", "Wrong Tnx Password!");
						redirect(base_url('Admin/ManageCoupon'));
					}
				}
				} else {
				$date = $this->data["date"];
				$userdata = [];
				$userdata1 = [];
				// $data['userdata']=$this->db->get_where("tbl_coupon",["status"=>"true","expiry_date >="=>$this->data['date']])->result();
				// $data['userdata1']=$this->db->query("select * from tbl_coupon where status='false' OR expiry_date < '$date'")->result();
				$data1 = $this->db->get("tbl_coupon")->result();
				foreach ($data1 as $v) {
					$count = $this->db->get_where("registration", ['couponcode' => $v->code])->num_rows();
					if ($v->status == "true" && $v->expiry_date >= $this->data['date'] && $v->max_use > $count) {
						array_push($userdata, $v);
						} else {
						array_push($userdata1, $v);
					}
				}
				
				$data['userdata'] = $userdata;
				$data['userdata1'] = $userdata1;
				$this->load->view('Admin/ManageCoupon', $data);
			}
			
		}
		
		#AddStudent
		
		public function AddStudent()
		{
			$this->load->library('Common');
			if ($this->uri->segment(3) == 'Add') {
				$this->form_validation->set_rules('ApplicationFor', 'Application For', 'required');
				$this->form_validation->set_rules('Technology', 'Technology', 'required');
				$this->form_validation->set_rules('Course', 'Course', 'required');
				$this->form_validation->set_rules('Year', 'Year', 'required');
				$this->form_validation->set_rules('Name', 'Name', 'required');
				$this->form_validation->set_rules('Father', 'Father', 'required');
				// $this->form_validation->set_rules('Email', 'Email', 'required');
				$this->form_validation->set_rules('Mobile1', 'Mobile Number', 'required');
				// $this->form_validation->set_rules('Mobile2', 'Alternate Mobile Number');
				$this->form_validation->set_rules('College', 'College', 'required');
				$this->form_validation->set_rules('Fee', 'Fee Type', 'required');
				$this->form_validation->set_rules('Amount', 'Amount', 'required');
				// $this->form_validation->set_rules('remark', 'Remark', 'required');
				if ($this->form_validation->run() == false) {
					//  echo "validation err";
					$this->session->set_flashdata("status", "error");
					$this->session->set_flashdata("status", "Validation Error");
					redirect(base_url('Admin/AddStudent'));
					} else {
					if ($this->data['tnxpass'] == md5($this->input->post('tnxpass'))) {
						
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
						// echo "insert without data";
						$txnid = time() . rand(1000, 9999);
						$userid = "DCT" . $txnid;
						
						$data_arr = array(
						// "txn_id" => $txnid,
						"userid" => $userid,
						"training_type" => $this->input->post('ApplicationFor'),
						"technology" => $this->input->post('Technology'),
						"student_name" => $this->input->post('Name'),
						"course" => $this->input->post('Course'),
						"father_name" => $this->input->post('Father'),
						"email" => $this->input->post('Email'),
						"edu_year" => $this->input->post('Year'),
						"college_name" => $this->input->post('College'),
						"mobile" => $this->input->post('Mobile1'),
						"alt_mobile" => $this->input->post('Mobile2'),
						"payment_type" => $this->input->post('Fee'),
						"response_bundle" => $this->input->post('remark'),
						"txn_id" => $this->input->post('tnxid'),
						"amount" => $amount,
						"status" => 'true',
						"txn_status" => 'SUCCESS',
						"date" => $this->data['date'],
						"time" => $this->data['time'],
						"txn_date_time" => $this->data['date'] . ' ' . $this->data['time'],
						"coupon_descount" => $camount,
						"couponcode" => $code,
						);
						
						if ($this->db->insert('registration', $data_arr)) {
							$data_arr = $this->db->insert_id();
							
							$this->session->set_flashdata("status", "success");
							$this->session->set_flashdata("msg", "Add Successfully");
							$data['userdata'] = $this->db->get_where('registration', array("id" => $data_arr))->row();
							$data['grouplink'] = $this->db->get('whatsapp_group')->row();
							// $this->load->view('Home/FeeReciept', $data);
							
							redirect(base_url('Admin/Registration'));
							
							} else {
							$this->session->set_flashdata("status", "error");
							$this->session->set_flashdata("msg", "Validation Error");
							redirect(base_url('Admin/AddStudent'));
						}
						} else {
						
						$this->session->set_flashdata("status", "error");
						$this->session->set_flashdata("msg", "Wrong Tnx Password!");
						redirect(base_url('Admin/AddStudent'));
					}
					
					
					//end else
				}
				} else {
				$this->load->view('Admin/AddStudent');
			}
		}
		
		public function NewPayment()
		{
			
			if (isset($_REQUEST['tnxstatus'])) {
				$tnxstatus = $_REQUEST['tnxstatus'];
				if ($tnxstatus == 'PAID') {
					$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('fee_deposit', array('accept_status' => 'new', 'txn_status' => 'PAID'))->result();
					} else if ($tnxstatus == 'SUCCESS') {
					$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('fee_deposit', array('accept_status' => 'new', 'txn_status' => 'SUCCESS'))->result();
					} else {
					$data['userdata'] = $this->db->query("select * from fee_deposit where accept_status='new' and txn_status='FAILED' or txn_status='PENDING' order by id desc")->result();
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('fee_deposit', array('accept_status' => 'new'))->result();
			}
			
			$this->load->view('Admin/NewPayment', $data);
		}
		public function PaymentAccepted()
		{
			if (isset($_REQUEST['tnxstatus'])) {
				$tnxstatus = $_REQUEST['tnxstatus'];
				if ($tnxstatus == 'PAID') {
					$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('fee_deposit', array('accept_status' => 'accept', 'txn_status' => 'PAID'))->result();
					} else if ($tnxstatus == 'SUCCESS') {
					$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('fee_deposit', array('accept_status' => 'accept', 'txn_status' => 'SUCCESS'))->result();
					} else {
					$data['userdata'] = $this->db->query("select * from fee_deposit where accept_status='accept' and txn_status='FAILED' or txn_status='PENDING' order by id desc")->result();
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('fee_deposit', array('accept_status' => 'accept'))->result();
			}
			$this->load->view('Admin/PaymentAccepted', $data);
		}
		public function PaymentRejected()
		{
			if (isset($_REQUEST['tnxstatus'])) {
				$tnxstatus = $_REQUEST['tnxstatus'];
				if ($tnxstatus == 'PAID') {
					$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('fee_deposit', array('accept_status' => 'reject', 'txn_status' => 'PAID'))->result();
					} else if ($tnxstatus == 'SUCCESS') {
					$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('fee_deposit', array('accept_status' => 'reject', 'txn_status' => 'SUCCESS'))->result();
					} else {
					$data['userdata'] = $this->db->query("select * from fee_deposit where accept_status='reject' and txn_status='FAILED' or txn_status='PENDING' order by id desc")->result();
				}
				} else {
				$data['userdata'] = $this->db->order_by('id', 'desc')->get_where('fee_deposit', array('accept_status' => 'reject'))->result();
			}
			$this->load->view('Admin/PaymentRejected', $data);
		}
		
		public function feePay()
		{
			if ($this->uri->segment(3) == 'PayNow') {
				
				$this->form_validation->set_rules('regid', 'Registration ID', 'required');
				$this->form_validation->set_rules('technology', 'Technology', 'required');
				$this->form_validation->set_rules('Course', 'Course', 'required');
				$this->form_validation->set_rules('Year', 'Year', 'required');
				$this->form_validation->set_rules('Name', 'Name', 'required');
				$this->form_validation->set_rules('Mobile1', 'Mobile Number', 'required');
				$this->form_validation->set_rules('College', 'College', 'required');
				$this->form_validation->set_rules('Amount', 'Amount', 'required');
				$this->form_validation->set_rules('uid', 'User ID', 'required');
				$this->form_validation->set_rules('tnxid', 'Tnx ID', 'required');
				// $this->form_validation->set_rules('tnxpass', 'Tnx Password', 'required');
				// $this->form_validation->set_rules('DueAmount', 'DueAmount', 'required');
				// $this->form_validation->set_rules('PaidTo', 'PaidTo', 'required');
				// $this->form_validation->set_rules('TodayDate', 'TodayDate ', 'required');
				// $this->form_validation->set_rules('AmountInWord', 'AmountInWord ', 'required');
				// $this->form_validation->set_rules('SrNo', 'SrNo', 'required');
				// $this->form_validation->set_rules('Include', 'Include ', 'required');
				// $this->form_validation->set_rules('PaymentMode', 'PaymentMode ', 'required');
				// $this->form_validation->set_rules('Authorization', 'Authorization ', 'required');
				
				
				if ($this->form_validation->run()) {
					
					
					$this->session->set_flashdata("status", "error");
					$this->session->set_flashdata("status", "Validation Error");
					redirect(base_url('Admin/feePay'));
					} else {
					
					
					
					$amount = $this->input->post('Amount');
					// if($this->data['tnxpass']== md5($this->input->post('tnxpass')))
					// {
					if (empty($_POST['tnxid'])) {
						$tnx = '';
						} else {
						$tnx = $_POST['tnxid'];
					}
					
					$data_arr = array(
					"txn_id" => $tnx,
					"userid" => $this->input->post('uid'),
					"reg_id" => $this->input->post('regid'),
					"student_name" => $this->input->post('Name'),
					"mobile" => $this->input->post('Mobile1'),
					"amount" => $amount,
					"application_for" => $_POST['ApplicationFor'],
					"technology" => $_POST['technology'],
					"course" => $_POST['Course'],
					"year" => $_POST['Year'],
					"due_amount" => $_POST['DueAmount'],
					"paid_to" => $_POST['PaidTo'],
					"college" => $_POST['College'],
					"today_date" => $_POST['TodayDate'],
					"account_of" => $_POST['Account_of'],
					// "amount_in_word" => $AmountInWord,
					"sr_number" => $_POST['SrNo'],
					"payment_mode" => $_POST['PaymentMode'],
					"include" => $_POST['Include'],
					"authorization" => $_POST['Authorization'],
					"status" => 'true',
					"txn_status" => $this->input->post('paystatus'),
					"date" => $this->data['date'],
					"time" => $this->data['time'],
					"accept_status" => 'new',
					);
					
					
					// echo "<pre>";
					// var_dump($data_arr);
					// die();
					
					if ($this->db->insert('fee_deposit', $data_arr)) {
						$data_arr = $this->db->insert_id();
						$this->session->set_flashdata("status", "success");
						$this->session->set_flashdata("status", "Success");
						redirect(base_url('Admin/NewPayment'));
						} else {
						echo "something Went Wrong";
						
					}
					// }
					// else
					// {
					// echo "yes";
					// die();
					// $this->session->set_flashdata("status", "error");
					// $this->session->set_flashdata("msg", "Wrong Tnx Password!");
					// redirect(base_url('Admin/feePay'));
					// }
					
				}
				
				
				
				} else if ($this->uri->segment(3) == 'TnxStatus') {
				$id = $this->input->post('id');
				$tnxpass = md5($this->input->post('tnxpass'));
				if ($this->data['tnxpass'] == $tnxpass) {
					$data_arr = array(
					"txn_status" => $this->input->post('tnx')
					);
					$this->db->where('id', $id);
					
					if ($this->db->update('fee_deposit', $data_arr)) {
						
						$this->session->set_flashdata("status", "success");
						$this->session->set_flashdata("msg", "Successfully Updated.");
						redirect(base_url('Admin/NewPayment'));
						} else {
						$this->session->set_flashdata("status", "error");
						$this->session->set_flashdata("msg", "Somethig went wrong!");
						redirect(base_url('Admin/NewPayment'));
					}
					} else {
					$this->session->set_flashdata("status", "error");
					$this->session->set_flashdata("msg", "Wrong Tnx Password!");
					redirect(base_url('Admin/NewPayment'));
				}
				} else {
				$this->load->view('Admin/feePay');
			}
			
		}
		
		
		
		# Database Export Command Here 
		public function db_backup()
		{
			$this->load->helper('url');
			$this->load->helper('file');
			$this->load->helper('download');
			$this->load->library('zip');
			$this->load->dbutil();
			$db_format = array('format' => 'zip', 'filename' => 'my_db_backup.sql');
			$backup =& $this->dbutil->backup($db_format);
			$dbname = 'backup-on-' . date('Y-m-d') . '.zip';
			$save = 'assets/db_backup/' . $dbname;
			write_file($save, $backup);
			force_download($dbname, $backup);
		}
		
		
		// end here 
	}
