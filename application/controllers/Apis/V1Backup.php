<?php
	
	defined("BASEPATH") or exit("Invalid Request");
	
	class V1 extends CI_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->load->library('upload');
		}
		
		public function Otp_less()
		{
			$mobile=$this->input->post('mobile');
			$email=$this->input->post('email');
			$username=$this->input->post('username');
			if(!empty($mobile) || !empty($email))
			{
				$check_user=$this->db->get_where('users',['email'=>$email,'mobile'=>$mobile]);
				if($check_user->num_rows()>0)
				{
					
					$output['res']='success';
					$output['msg']='login successful';
					$output['data']=$check_user->row();
					echo json_encode($output);
					
				}
				else
				{
					if($this->db->insert('users',['name'=>$username,'email'=>$email,'mobile'=>$mobile,'otp'=>'','is_status'=>'true','login_status'=>'otpless_login']))
					{
						
						$output['res']='success';
						$output['msg']='registration successful';
						echo json_encode($output);
					}
					else
					{
						$output['res']='error';
						$output['msg']='something went wrong';
						echo json_encode($output);
					}
				}
				
			}
		}
		
		public function sendSms($mobile,$msg)
		{
			// set app name as you required
			$app_name="DigiCademy";
			$message = (int) filter_var($msg, FILTER_SANITIZE_NUMBER_INT);
			// DLT Approved OTP SMS Template ID
			$template_id="1307164706435757762";
			// never change this sms template
			// Your OTP Code is 123456. Do not share it with anyone. From AppNameHere . #TeamDigiCoders 
			$message_template="Your OTP Code is ".$message.". Do not share it with anyone. From ".$app_name." . #TeamDigiCoders";
			
			$authkey="370038AesB6X2F62ac3ea6P1";
			$mobile="91".$mobile;  
			$final_message=urlencode($message_template);
			$sender="DIGICO";
			$route="4";
			$country="91"; 
			
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => "http://sms.digicoders.in/api/sendhttp.php?authkey=$authkey&mobiles=$mobile&message=$final_message&sender=$sender&route=$route&country=$country&unicode=1&response=json&DLT_TE_ID=".$template_id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST =>"GET"
			));
			
			$response = curl_exec($curl);
			curl_close($curl);
			
			$result=json_decode($response);
			
			
			if($result->type=="success") {
				return true;
			}
			else {
				return false;
			}
			
		}
		
		public function printResponse($output) {
			
			header("Content-type: application/json");
			
			//echo json_encode([$output], JSON_UNESCAPED_SLASHES);
			
			echo json_encode($output, JSON_UNESCAPED_SLASHES);
		}
		
		
		public function index(){
			
			$output["result"]="success"; // success/error
			$output["message"]="API Called Successfully";
			$output["data"]=array();
			
			$this->printResponse($output);
		}
		
		public function showRecentPlacements() {
			
			$output["result"]="error";
			$output["message"]="Something went wrong";
			$output["data"]=array();
			
			$sql=$this->db->get_where("placement", array("banner"=>"banner"));
			
			if($sql->num_rows()>0) {
				
				$result=$sql->result();
				
				$output["result"]="success";
				$output["message"]="Placement Banners";
				$output["banner_base_url"]=base_url("public/uploads/placement/");
				$output["data"]=$result;
				
			}
			else
			{
				$output["result"]="error";
				$output["message"]="No Placement Banners Available";
				$output["data"]=array();
			}
			
			$this->printResponse($output);
			
		}
		
		public function showTopPlacements() {
			
			$output["result"]="error";
			$output["message"]="Something went wrong";
			$output["data"]=array();
			
			$sql=$this->db->get_where("placement", array("banner"=>"placement"));
			
			if($sql->num_rows()>0) {
				
				$result=$sql->result();
				
				$output["result"]="success";
				$output["message"]="Placement Banners";
				$output["banner_base_url"]=base_url("public/uploads/placement/");
				$output["data"]=$result;
				
			}
			else
			{
				$output["result"]="error";
				$output["message"]="No Placement Banners Available";
				$output["data"]=array();
			}
			
			$this->printResponse($output);
			
		}
		
		
		# Banner APi Start Here 
		public function Banner()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			$sel=$this->db->order_by('id', 'DESC')->get('banner');
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$users[]=$user;
					$user->image = "https://thedigicoders.com/public/uploads/banner/".$user->image;
				}  
				$output['res'] = "success";
				$output['msg'] = "Banner's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Slider's not found";
			} 
			$this->printResponse($output);
			
		}
		# Banner APi End Here
		
		
		# Our Recent Placement APi Start Here 
		public function RecentPlacement()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			$sel=$this->db->query("select * from placement where banner='banner' order by id DESC");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$users[]=$user;
					$user->photo = "https://thedigicoders.com/public/uploads/placement/".$user->photo;
				}  
				$output['res'] = "success";
				$output['msg'] = "Our Recent Placement's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Our Recent Placement's not found";
			} 
			$this->printResponse($output);
			
		}
		# Our Recent Placement APi End Here
		
		
		
		# Our Recent Placement APi Start Here Only 10 
		public function RecentPlacementlimit10()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			$sel=$this->db->query("select * from placement where banner='banner' order by id DESC limit 10");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$users[]=$user;
					$user->photo = "https://thedigicoders.com/public/uploads/placement/".$user->photo;
				}  
				$output['res'] = "success";
				$output['msg'] = "Our Recent Placement's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Our Recent Placement's not found";
			} 
			$this->printResponse($output);
			
		}
		# Our Recent Placement APi End Here
		
		
		
		
		# Our Top Placement APi Start Here 
		public function TopPlacement()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			$sel=$this->db->query("select * from placement where banner='placement' order by id ASC");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$users[]=$user;
					$user->photo = "https://thedigicoders.com/public/uploads/placement/".$user->photo;
				}  
				
				$output['res'] = "success";
				$output['msg'] = "Our Top Placement's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Our Top Placement's not found";
			} 
			$this->printResponse($output);
			
		}
		# Our Top Placement APi End Here
		
		
		
		# Our Top Placement APi Start Here Only 10
		public function TopPlacementlimit10()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			$sel=$this->db->query("select * from placement where banner='placement' order by id ASC limit 10");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$users[]=$user;
					$user->photo = "https://thedigicoders.com/public/uploads/placement/".$user->photo;
				}  
				
				$output['res'] = "success";
				$output['msg'] = "Our Top Placement's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Our Top Placement's not found";
			} 
			$this->printResponse($output);
			
		}
		# Our Top Placement APi End Here
		
		
		
		# Trending News APi Start Here 
		// public function TrendingNews()
		// {
		// $output['res'] = "error";
		// $output['msg'] = "error";
		// $output['data'] = []; 
		
		// $sel=$this->db->query("select * from trending order by id DESC");
		// $users=array();
		// if($sel->num_rows()>0)
		// { 
		// $users=array();
		// foreach($sel->result() as $user)
		// {
		// $users[]=$user;
		// $date1 = $user->date;
		
		// $date = date('d M,Y', strtotime($date1));
		// $user->date = $date;
		// $user->image = "https://thedigicoders.com/public/uploads/trending/".$user->image;
		// }  
		
		// $output['res'] = "success";
		// $output['msg'] = "Trending New's found";
		// $output['data'] = $users;
		// }
		// else
		// {
		// $output['res'] = "error";
		// $output['msg'] = "Trending New's not found";
		// } 
		// $this->printResponse($output);
		
		// }
		# Trending News APi End Here
		
		
		# Summer Training Api Start Here 
		public function SummerTraining()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			$sel=$this->db->query("select * from training where traning_type='summer' order by id DESC");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$users[]=$user;
					$user->image = "https://thedigicoders.com/public/uploads/training/".$user->image;
				}  
				$output['res'] = "success";
				$output['msg'] = "Summer Training's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Summer Training's not found";
			} 
			$this->printResponse($output);
			
		}
		# Summer Training Api End Here 		
		
		
		# Apprenticeship Placement APi Start Here 
		public function ApprenticeshipTraining()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			$sel=$this->db->query("select * from training where traning_type='apprenticeship' order by id DESC");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$users[]=$user;
					$user->image = "https://thedigicoders.com/public/uploads/training/".$user->image;
				}  
				$output['res'] = "success";
				$output['msg'] = "Summer Training's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Summer Training's not found";
			} 
			$this->printResponse($output);
			
		}
		# Apprenticeship Training Api End Here
		
		
		
		# Registraition Api Start  Here
		public function Signup()
		{
			$output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
			
			if (empty($_POST) or empty($this->form_validation->run('Signup'))) 
			{
				$msg = explode('</p>', validation_errors());
				$output['msg'] = str_ireplace('<p>', '', $msg[0]);
			} 
			else 
			{
				$mobile=$this->input->post('mobile');
				$aResult1=0;
				if(!empty($this->input->post('email')))
				{
					$email=$this->input->post('email');
					$upres12 = $this->db->query("select * from users where email='$email'");
					$aResult1=$upres12->num_rows();
					$upres1=$upres12->row();
				}
				else 
				{
					$email = '';
				}
				// $otp=rand(1000,9999);
				$otp=1234;
				$saveData = [
				'name' => $this->input->post('name'),
				'mobile' => $this->input->post('mobile'),
				'email' => $email,
				'is_status' => 'false',
				'login_status' => 'normal_login',
				'otp' => $otp,
				'date' => date('Y-m-d')
				];
				
				$saveData = $this->security->xss_clean($saveData);
				$aResult = $this->db->query("select * from users where mobile='$mobile'");
				
				if ($aResult->num_rows()>0) 
				{
					$upres = $aResult->row();
					$output['res'] = 'success';
					$output['msg'] = 'This Mobile is already registered.';
					$output['data'] = $upres;
				}
				elseif ($aResult1 >0)
				{
					$output['res'] = 'success';
					$output['msg'] = 'This Email is already registered.';
					$output['data'] = $upres1;
				}
				else 
				{
					if ($this->db->insert('users', $saveData))
					{
						// $this->sendSms($mobile,$otp);
						
						$upres = $this->db->get_where('users', ['mobile'=>$mobile])->result();
						$output['res'] = 'success';
						$output['msg'] = 'Registration is Successfull';
						$output['data'] = $upres;
					} 
					else 
					{	
						$output['res'] = 'error';
						$output['msg'] = 'Registration failed.';
					}
				}
			}
			$this->printResponse($output);
		}
		# Registraition Api End  Here
		
		
		# Registraition Api Start  Here
		public function verifyotp()
		{
			$output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
			
			if (empty($_POST) or empty($this->form_validation->run('verifyotp'))) 
			{
				$msg = explode('</p>', validation_errors());
				$output['msg'] = str_ireplace('<p>', '', $msg[0]);
			} 
			else 
			{
				$mobile = $this->input->post('mobile');
				$otp = $this->input->post('otp');
				
				$wheredata = array('mobile' => $mobile);
				$result = $this->db->where($wheredata)->get('users');
				if ($result->num_rows()) 
				{
					$values = $result->row();
					if ($values->otp == $otp) 
					{
						$this->db->where('mobile', $values->mobile)->update('users', ['otp' => $otp,'is_status'=>'true']);
						// $users = $this->db->get_where('users', ['mobile'=>$mobile])->result();
						if(!empty($values->image))
						{
							$values->image = "https://thedigicoders.com/public/uploads/profile_photo/".$values->image;
						}
						
						$output['res'] = 'success';
						$output['msg'] = 'OTP Successfully Verified';
						$output['data'] = $values;
					} 
					else 
					{
						$output['res'] = 'error';
						$output['msg'] = 'Invalid OTP';
					}
				} 
				else 
				{
					$output['res'] = 'error';
					$output['msg'] = 'Invalid Mobile No';
				}
			}
			$this->printResponse($output);
		}
		# Registraition Api End  Here
		
		
		# ResendOtp Api Start  Here
		public function resendotp()
		{
			$output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
			
			if (empty($_POST) or empty($this->form_validation->run('resendotp'))) {
				$msg = explode('</p>', validation_errors());
				$output['msg'] = str_ireplace('<p>', '', $msg[0]);
			} 
			else 
			{
				$mobile = $this->input->post('mobile');
				// $otp = rand(1000,9999);
				$otp =1234;
				
				$wheredata = array('mobile' => $mobile);
				$result = $this->db->where($wheredata)->get('users');
				if ($result->num_rows())
				{
					$values = $result->row();
					$this->db->where('mobile', $values->mobile)->update('users', ['otp' => $otp]);
					
					// $this->sendSms($mobile,$otp);
					
					$output['res'] = 'success';
					$output['msg'] = 'Otp Resend Successfully';
					
				}
				else 
				{
					$output['res'] = 'error';
					$output['msg'] = 'Invalid Resend Otp';
				}
			}
			$this->printResponse($output);
		}
		# ResendOtp Api End  Here
		
		
		# Login Api Start  Here
		public function UserLogin()
		{
			$output['res'] = "error";
            $output['msg'] = "error";
			$output['data'] = []; 
			if (empty($_POST) or empty($this->form_validation->run('UserLogin')))
			{
				$msg = explode('</p>', validation_errors());
				$output['msg'] = str_ireplace('<p>', '', $msg[0]);
			} 
			else
			{
				$mobile = $this->input->post('mobile');
				$result = $this->db->where(['mobile' => $mobile])->get('users');
				if ($result->num_rows()) 
				{
					$values = $result->row();
					if($values->mobile==$mobile)
					{
				        // $otp=rand(1000,9999);
				        $otp=1234;
						// $this->sendSms($mobile,$otp);
						
						$this->db->set(['otp'=>$otp])->where('mobile',$mobile)->update('users');
						$upres = $this->db->get_where('users', ['mobile'=>$mobile])->result();
						$output['res'] = 'success';
						$output['msg'] = 'Logged In';
						$output['data'] = $upres;
					}
					else
					{
						$output['res'] = 'error';
						$output['msg'] = 'LoggedIn Failed';
					}
				} 
				else
				{
					$output['res'] = 'error';
					$output['msg'] = 'This mobile is not registered.';
				}
			}
			$this->printResponse($output);
		}
		# Login Api End  Here
		
		# GoogleLogin Api Start  Here
		public function GoogleLogin(){
			$output['res'] = "error";
			$output['msg'] = "error";
			$output['data'] = [];
			
			if (empty($_POST) or empty($this->form_validation->run('GoogleLogin'))) 
			{
				$msg = explode('</p>', validation_errors());
				$output['msg'] = str_ireplace('<p>', '', $msg[0]);
			} 
			else 
			{
				
				$email=$this->input->post('email');
				$name=$this->input->post('name');
				$token=$this->input->post('token');
				
				$get=$this->db->query("select * from users where name='$name' or email='$email'");
				if($get->num_rows())
				{
					// if($this->db->where($whereData)->update('users',['token'=>$this->input->post('token')]))
					if($this->db->query("UPDATE `users` SET `token`='$token' WHERE name='$name' AND email='$email'"))
					{
						$upres = $this->db->get_where('users', ['email'=>$this->input->post('email')])->row();
						
						if(!empty($upres->image))
						{
							$upres->image = "https://thedigicoders.com/public/uploads/profile_photo/".$upres->image;
						}
						
						$output['res'] = 'success';
						$output['msg'] = 'Logged In';
						$output['data'] = $upres;
					}
					else
					{
						$output['res']='error';
						$output['msg'] = 'Login Failed';
					}
				}
				else
				{
					// if($this->db->insert('users',['login_status' =>'google_login','email'=>$this->input->post('email'),'name'=>$this->input->post('name'),'token'=>$this->input->post('token'),'date'=>date('Y-m-d')]))
					if($this->db->insert('users',['login_status' =>'google_login','email'=>$this->input->post('email'),'name'=>$this->input->post('name'),'token'=>$this->input->post('token'),'date'=>date('Y-m-d'),'otp' => '1234',]))
					{
						$id = $this->db->insert_id();
						$upres = $this->db->get_where('users', ['id'=>$id])->row();
						$output['res'] = 'success';
						$output['msg'] = 'Logged In';
						$output['data'] = $upres;
					}
					else
					{
						$output['res']='error';
						$output['msg'] = 'Login Failed';
					}
				}
			}
			$this->printResponse($output);
		}
		# GoogleLogin Api End  Here
		
		# Course Api Start Here
		public function Course()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			$sel=$this->db->query("select * from subject order by id DESC");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$users[]=$user;
					$user->image = "https://thedigicoders.com/public/uploads/subject/".$user->image;
				}  
				$output['res'] = "success";
				$output['msg'] = "Course's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Course's not found";
			} 
			$this->printResponse($output);
			
		}
		
		# Course Api End Here
		
		
		# Semester Api Start Here
		
		public function Semester()
		{
			$output['res'] = "error";
            $output['msg'] = "error";
			$output['data'] = []; 
			if (empty($_POST) or empty($this->form_validation->run('Semester')))
			{
				$msg = explode('</p>', validation_errors());
				$output['msg'] = str_ireplace('<p>', '', $msg[0]);
			} 
			else
			{
				$subject_id = $this->input->post('subject_id');
				$sel = $this->db->where(['subject_id' => $subject_id])->get('semester');
				$users=array();
				if($sel->num_rows()>0)
				{ 
					$users=array();
					foreach($sel->result() as $user)
					{
						$users[]=$user;
						$user->image = "https://thedigicoders.com/public/uploads/semester/".$user->image;
					}  
					$output['res'] = "success";
					$output['msg'] = "Semester's found";
					$output['data'] = $users;
				}
				else 
				{
					$output['res'] = "error";
					$output['msg'] = "Semester's Not found";
				}
			}
			$this->printResponse($output);
		}
		
		# Semester Api End Here
		
		# Category Api Start Here
		public function Category()
		{
			$output['res'] = "error";
            $output['msg'] = "error";
			$output['data'] = []; 
			if (empty($_POST) or empty($this->form_validation->run('Category')))
			{
				$msg = explode('</p>', validation_errors());
				$output['msg'] = str_ireplace('<p>', '', $msg[0]);
			} 
			else
			{
				$subject_id = $this->input->post('subject_id');
				$semester_id = $this->input->post('semester_id');
				$sel = $this->db->where(['subject_id' => $subject_id,'semester_id' => $semester_id])->get('paper_category');
				$users=array();
				if($sel->num_rows()>0)
				{
					$users=array();
					foreach($sel->result() as $user)
					{
						$users[]=$user;
						$user->image = "https://thedigicoders.com/public/uploads/paper_category/".$user->image;
					}  
					$output['res'] = "success";
					$output['msg'] = "Categorie's found";
					$output['data'] = $users;
				}
				else 
				{
					$output['res'] = "error";
					$output['msg'] = "Categorie's Not found";
				}
			}
			$this->printResponse($output);
		}
		
		# Category Api End Here
		
		
		# Technology Api Start Here
		public function Technology()
		{
			$output['res'] = "error";
            $output['msg'] = "error";
			$output['data'] = []; 
			if (empty($_POST) or empty($this->form_validation->run('Technology')))
			{
				$msg = explode('</p>', validation_errors());
				$output['msg'] = str_ireplace('<p>', '', $msg[0]);
			} 
			else
			{
				$subject_id = $this->input->post('subject_id');
				$semester_id = $this->input->post('semester_id');
				$category_id = $this->input->post('category_id');
				$sel = $this->db->where(['subject_id' => $subject_id,'semester_id' => $semester_id,'category_id' => $category_id])->get('technology');
				$users=array();
				if($sel->num_rows()>0)
				{
					$users=array();
					foreach($sel->result() as $user)
					{
						$users[]=$user;
						$user->image = "https://thedigicoders.com/public/uploads/technology/".$user->image;
					}  
					$output['res'] = "success";
					$output['msg'] = "Technologie's found";
					$output['data'] = $users;
				}
				else 
				{
					$output['res'] = "error";
					$output['msg'] = "Technologie's Not found";
				}
			}
			$this->printResponse($output);
		}
		# Technology Api End Here
		
		
		# Technology Pdf Api Start Here
		public function TechnologyPdf()
		{
			$output['res'] = "error";
            $output['msg'] = "error";
			$output['data'] = []; 
			if (empty($_POST) or empty($this->form_validation->run('TechnologyPdf')))
			{
				$msg = explode('</p>', validation_errors());
				$output['msg'] = str_ireplace('<p>', '', $msg[0]);
			} 
			else
			{
				$subject_id = $this->input->post('subject_id');
				$semester_id = $this->input->post('semester_id');
				$category_id = $this->input->post('category_id');
				$technology_id = $this->input->post('technology_id');
				
				$userid = $this->input->post('user_id');
				
				$sel = $this->db->where(['subject_id' => $subject_id,'semester_id' => $semester_id,'category_id' => $category_id,'technology_id' => $technology_id])->get('technology_pdf');
				$users=array();
				if($sel->num_rows()>0)
				{
					$users=array();
					foreach($sel->result() as $user)
					{
						$id = $user->id;
						$users[]=$user;
						
						// $user->pdf_url = "https://thedigicoders.com/public/uploads/technology_pdf/".$user->image;
						
						
						$icon = $user->image; 
						$user->pdf_url = base_url('pdf_viewer/web/viewer.php?url=') . base_url('public/uploads/technology_pdf/').$icon; 
						$user->webpdfurl = base_url('public/uploads/technology_pdf/').$icon;
						// end here  
						
						
						
						$Pdf = $this->db->query("select * from wishlist where user_id='$userid' AND video_id='$id' AND type='Pdf'");
						if(!empty($Pdf->num_rows()>0))
						{
							$wishlist_status = "true";
						}
						else 
						{
							$wishlist_status = "false";
						}
						$user->wishlist_status= $wishlist_status;
					}  
					$output['res'] = "success";
					$output['msg'] = "Technologie's Pdf found";
					$output['data'] = $users;
				}
				else 
				{
					$output['res'] = "error";
					$output['msg'] = "Technologie's Pdf Not found";
				}
			}
			$this->printResponse($output);
		}
		# Technology Pdf Api End Here
		
		
		
		# Author Api Start Here
		public function Author()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			$sel=$this->db->query("select * from authors order by id DESC");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$users[]=$user;
					$user->image = "https://thedigicoders.com/public/uploads/authors/".$user->image;
				}  
				$output['res'] = "success";
				$output['msg'] = "Author's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Author's not found";
			} 
			$this->printResponse($output);
			
		}
		# Author Api End Here
		
		
		#  Trending News Api Start Here
		public function TrendingNews()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
			
            $userid = $this->input->post('user_id');
			
			$sel=$this->db->query("select * from trending order by id DESC");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$id = $user->id;
					
					$authorid = $user->author_id;
					$authordata = $this->db->get_where('authors',array('id'=>$authorid))->row();
					$authorname= $authordata->name;
					$authormedia= $authordata->media;
					$authorimg= $authordata->image;
					
					$News = $this->db->query("select * from wishlist where user_id='$userid' AND video_id='$id' AND type='News'");
					if(!empty($News->num_rows()>0))
					{
						$wishlist_status = "true";
					}
					else 
					{
						$wishlist_status = "false";
					}
					$user->wishlist_status= $wishlist_status;
					
					$user->authorname=$authorname;
					$user->authormedia=$authormedia;
					$user->authorimage= "https://thedigicoders.com/public/uploads/authors/".$authorimg;
					
					$users[]=$user;
					$user->image = "https://thedigicoders.com/public/uploads/trending/".$user->image;
				}  
				
				$output['res'] = "success";
				$output['msg'] = "Trending's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Trending's not found";
			} 
			$this->printResponse($output);
			
		}
		# Trending News Limit  Api End Here
		
		
		#  Trending News Api Start Here
		public function TrendingNewsLimit10()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
			
            $userid = $this->input->post('user_id');
            $limit = $this->input->post('limit');
			$displayed_limit = $limit*2;
			$sel=$this->db->query("select * from trending order by id DESC limit $displayed_limit");
			
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$id = $user->id;
					
					$authorid = $user->author_id;
					$authordata = $this->db->get_where('authors',array('id'=>$authorid))->row();
					$authorname= $authordata->name;
					$authormedia= $authordata->media;
					$authorimg= $authordata->image;
					
					$News = $this->db->query("select * from wishlist where user_id='$userid' AND video_id='$id' AND type='News'");
					if(!empty($News->num_rows()>0))
					{
						$wishlist_status = "true";
					}
					else 
					{
						$wishlist_status = "false";
					}
					$user->wishlist_status= $wishlist_status;
					
					$user->authorname=$authorname;
					$user->authormedia=$authormedia;
					$user->authorimage= "https://thedigicoders.com/public/uploads/authors/".$authorimg;
					
					$users[]=$user;
					$user->image = "https://thedigicoders.com/public/uploads/trending/".$user->image;
				}  
				
				$output['res'] = "success";
				$output['msg'] = "Trending's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Trending's not found";
			} 
			$this->printResponse($output);
			
		}
		# Trending News  Limit  Api End Here
		
		
		
		
		
		
		#  Trending News Api Start Here
		public function TrendingNewsLimit()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
			
            $userid = $this->input->post('user_id');
            $limit = $this->input->post('limit');
			$recordsToSkip = ($limit - 1) * 2;
			$sel = $this->db->order_by('id', 'DESC')->limit(2, $recordsToSkip)->get('trending');
			
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$id = $user->id;
					
					$authorid = $user->author_id;
					$authordata = $this->db->get_where('authors',array('id'=>$authorid))->row();
					$authorname= $authordata->name;
					$authormedia= $authordata->media;
					$authorimg= $authordata->image;
					
					$News = $this->db->query("select * from wishlist where user_id='$userid' AND video_id='$id' AND type='News'");
					if(!empty($News->num_rows()>0))
					{
						$wishlist_status = "true";
					}
					else 
					{
						$wishlist_status = "false";
					}
					$user->wishlist_status= $wishlist_status;
					
					$user->authorname=$authorname;
					$user->authormedia=$authormedia;
					$user->authorimage= "https://thedigicoders.com/public/uploads/authors/".$authorimg;
					
					$users[]=$user;
					$user->image = "https://thedigicoders.com/public/uploads/trending/".$user->image;
				}  
				
				$output['res'] = "success";
				$output['msg'] = "Trending's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Trending's not found";
			} 
			$this->printResponse($output);
			
		}
		# Trending News  Limit  Api End Here
		
		
		
		
		
		
		
		# Trending News FullView Api Start Here
		public function TrendingNewsfullview()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
			
            $userid = $this->input->post('user_id');
            $tnewsid = $this->input->post('tnewsid');
			
			$sel=$this->db->query("select * from trending where id='$tnewsid'");
			if($sel->num_rows()>0)
			{ 
				$user = $sel->row();
				
				$id = $user->id;
				
				$authorid = $user->author_id;
				$authordata = $this->db->get_where('authors',array('id'=>$authorid))->row();
				$authorname= $authordata->name;
				$authormedia= $authordata->media;
				$authorimg= $authordata->image;
				
				$user->image= "https://thedigicoders.com/public/uploads/trending/".$user->image;
				
				$News = $this->db->query("select * from wishlist where user_id='$userid' AND video_id='$id' AND type='News'");
				if(!empty($News->num_rows()>0))
				{
					$wishlist_status = "true";
				}
				else 
				{
					$wishlist_status = "false";
				}
				$user->wishlist_status= $wishlist_status;
				
				$user->authorname=$authorname;
				$user->authormedia=$authormedia;
				$user->authorimage= "https://thedigicoders.com/public/uploads/authors/".$authorimg;
				
				
				$output['res'] = "success";
				$output['msg'] = "Trending News's fullview found";
				$output['data'] = [$user];
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Trending News's fullview fot found";
			} 
			$this->printResponse($output);
			
		}
		# Trending News FullView Api End Here
		
		# Team APi Start Here
		public function Team()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			$sel=$this->db->query("select * from expert where status='true' order by id ASC");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$users[]=$user;
					$user->image = "https://thedigicoders.com/public/uploads/expert/".$user->image;
				}  
				$output['res'] = "success";
				$output['msg'] = "Team's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Team's not found";
			} 
			$this->printResponse($output);
			
		}
		# Team Api End Here
		
		
		
		
		#  Recommended Videos Api Start Here
		public function RecommendedVideoslimit10()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			// $sel=$this->db->query("select * from manage_videos where video_type='Recommended Videos' order by id DESC limit 10");
			$sel=$this->db->query("select * from technology_videos where video_type='Recommended Videos' order by id DESC limit 10");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					// $id = $user->id;
					$authorid = $user->author_id;
					$authordata = $this->db->get_where('authors',array('id'=>$authorid))->row();
					$authorname= $authordata->name;
					$user->authorname=$authorname;
					
					// $viewcount=$user->count;
					// $st = '1';
					// $viewcount=$st+$viewcount;
					
					// $count = $this->db->query("update manage_videos set count='$viewcount' where id='$id' ");
					$users[]=$user;
					// $user->image = "https://thedigicoders.com/public/uploads/manage_videos/".$user->image;
					$user->image = "https://thedigicoders.com/public/uploads/technology_videos/".$user->image;
				}  
				
				$output['res'] = "success";
				$output['msg'] = "Recommended Videos's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Recommended Videos's not found";
			} 
			$this->printResponse($output);
			
		}
		# Recommended Videos Api End Here
		
		
		
		// public function RecommendedVideos()
		public function SeeAllVideos()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			$video_type = $this->input->post('video_type');
			// Recommended Videos
			$sel=$this->db->query("select * from technology_videos where video_type='$video_type' order by id DESC");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$authorid = $user->author_id;
					$authordata = $this->db->get_where('authors',array('id'=>$authorid))->row();
					$authorname= $authordata->name;
					$user->authorname=$authorname;
					
					$users[]=$user;
					// $user->image = "https://thedigicoders.com/public/uploads/manage_videos/".$user->image;
					$user->image = "https://thedigicoders.com/public/uploads/technology_videos/".$user->image;
				}  
				
				$output['res'] = "success";
				$output['msg'] = "Recommended Videos's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Recommended Videos's not found";
			} 
			$this->printResponse($output);
			
		}
		# Recommended Videos Api End Here
		
		#  Popular Videos Api Start Here
		public function PopularVideoslimit10()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			// $sel=$this->db->query("select * from manage_videos where video_type='Popular Videos' order by id DESC limit 10");
			$sel=$this->db->query("select * from technology_videos where video_type='Popular Videos' order by id DESC limit 10");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$authorid = $user->author_id;
					$authordata = $this->db->get_where('authors',array('id'=>$authorid))->row();
					$authorname= $authordata->name;
					$user->authorname=$authorname;
					
					$users[]=$user;
					// $user->image = "https://thedigicoders.com/public/uploads/manage_videos/".$user->image;
					$user->image = "https://thedigicoders.com/public/uploads/technology_videos/".$user->image;
				}  
				
				$output['res'] = "success";
				$output['msg'] = "Popular Videos's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Popular Videos's not found";
			} 
			$this->printResponse($output);
			
		}
		# Popular Videos Api End Here
		
		
		
		
		#  Popular Videos Api Start Here
		// public function PopularVideos()
		// {
		// $output['res'] = "error";
		// $output['msg'] = "error";
		// $output['data'] = []; 
		
		// $sel=$this->db->query("select * from manage_videos where video_type='Popular Videos' order by id DESC");
		// $users=array();
		// if($sel->num_rows()>0)
		// { 
		// $users=array();
		// foreach($sel->result() as $user)
		// {
		// $authorid = $user->author_id;
		// $authordata = $this->db->get_where('authors',array('id'=>$authorid))->row();
		// $authorname= $authordata->name;
		// $user->authorname=$authorname;
		
		// $users[]=$user;
		// $user->image = "https://thedigicoders.com/public/uploads/manage_videos/".$user->image;
		// }  
		
		// $output['res'] = "success";
		// $output['msg'] = "Popular Videos's found";
		// $output['data'] = $users;
		// }
		// else
		// {
		// $output['res'] = "error";
		// $output['msg'] = "Popular Videos's not found";
		// } 
		// $this->printResponse($output);
		
		// }
		# Popular Videos Api End Here
		
		
		
		#  Recommended Videos full view  Api Start Here
		// public function Recommendedfullview()
		public function Videofullview()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
			
            $videoid = $this->input->post('videoid');
            $userid = $this->input->post('user_id');
			
			$sel=$this->db->query("select * from manage_videos where id='$videoid'");
			
			if($sel->num_rows()>0)
			{ 
				
				$data = $sel->row();
				
				$id = $data->id;
				$authorid = $data->author_id;
				$authordata = $this->db->get_where('authors',array('id'=>$authorid))->row();
				$authorname= $authordata->name;
				$data->authorname=$authorname;
				
				$Video = $this->db->query("select * from wishlist where user_id='$userid' AND video_id='$id' AND type='Video'");
				if(!empty($Video->num_rows()>0))
				{
					$wishlist_status = "true";
				}
				else 
				{
					$wishlist_status = "false";
				}
				
				$data->wishlist_status= $wishlist_status;
				
				$output['res'] = "success";
				$output['msg'] = "Videos's fullview found";
				$output['data'] = [$data];
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Videos's fullview fot found";
			} 
			$this->printResponse($output);
		}
		# Recommended Videos full view Api End Here
		
		
		
		
		
		
		
		
		
		
		#  Popularfullview Videos full view  Api Start Here
		// public function Popularfullview()
		// {
		// $output['res'] = "error";
		// $output['msg'] = "error";
		// $output['data'] = []; 
		// $popid = $this->input->post('popid');
		// $sel=$this->db->query("select * from manage_videos where video_type='Popular Videos' && id='$popid'");
		
		// if($sel->num_rows()>0)
		// { 
		// $data = $sel->row();
		// $output['res'] = "success";
		// $output['msg'] = "Popular Videos's fullview found";
		// $output['data'] = [$data];
		// }
		// else
		// {
		// $output['res'] = "error";
		// $output['msg'] = "Popular Videos's fullview fot found";
		// } 
		// $this->printResponse($output);
		
		// }
		# Recommended Videos full view Api End Here
		
		
		
		# Trending Videos Api Start Here
		public function TrendingVideoslimit10()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			$sel=$this->db->query("select * from trending_videos order by id DESC limit 10");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$authorid = $user->author_id;
					$authordata = $this->db->get_where('authors',array('id'=>$authorid))->row();
					$authorname= $authordata->name;
					$user->authorname=$authorname;
					
					$users[]=$user;
					$user->image = "https://thedigicoders.com/public/uploads/trending_videos_image/".$user->image;
					$user->url = "https://thedigicoders.com/public/uploads/trending_videos/".$user->url;
				}  
				
				$output['res'] = "success";
				$output['msg'] = "Trending Videos's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Trending Videos's not found";
			} 
			$this->printResponse($output);
			
		}
		# Trending Videos Api End Here
		
		
		# Trending Videos Api Start Here
		public function TrendingVideos()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			$sel=$this->db->query("select * from trending_videos order by id DESC");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$authorid = $user->author_id;
					$authordata = $this->db->get_where('authors',array('id'=>$authorid))->row();
					$authorname= $authordata->name;
					$user->authorname=$authorname;
					
					$users[]=$user;
					$user->image = "https://thedigicoders.com/public/uploads/trending_videos_image/".$user->image;
					$user->url = "https://thedigicoders.com/public/uploads/trending_videos/".$user->url;
				}  
				
				$output['res'] = "success";
				$output['msg'] = "Trending Videos's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Trending Videos's not found";
			} 
			$this->printResponse($output);
			
		}
		# Trending Videos Api End Here
		
		
		#  Trending fullview Videos full view  Api Start Here
		public function Trendingfullview()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            $tid = $this->input->post('tid');
			$sel=$this->db->query("select * from trending_videos where id='$tid'");
			
			if($sel->num_rows()>0)
			{ 
				$data = $sel->row();
				$output['res'] = "success";
				$output['msg'] = "Trending Videos's fullview found";
				$output['data'] = [$data];
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Trending Videos's fullview fot found";
			} 
			$this->printResponse($output);
			
		}
		# Trending Videos full view Api End Here
		
		
		
		
		# Technology Category Videos Api Start Here
		public function TechnologyCategoryVideos()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			$sel=$this->db->query("select * from technology_category order by id ASC");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$id = $user->id;
					// $countdata =$this->db->query("select * from technology_videos where technology_category_id='$id'")->num_rows();
					$countdata =$this->db->query("select * from technology_videos where technology_category_id='$id' AND video_type='Technology Videos'")->num_rows();
					
					$users[]=$user;
					$user->image = "https://thedigicoders.com/public/uploads/technology_category/".$user->image;
					if(!empty($countdata))
					{
						$user->countdata = $countdata;
					}
					else 
					{
						$user->countdata = 0;
					}
				}  
				
				$output['res'] = "success";
				$output['msg'] = "Technology Category Videos's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Technology Category Videos's not found";
			} 
			$this->printResponse($output);
			
		}
		# Technology Category Videos Api End Here
		
		
		
		#  Technology Video fullview Videos Api Start Here
		public function TechnologyVideos()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			$tcid = $this->input->post('tcid');
			$video_type = $this->input->post('video_type');
			
			$sel=$this->db->query("select * from technology_videos where technology_category_id='$tcid' AND  video_type='$video_type' order by id ASC");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$authorid = $user->author_id;
					$authordata = $this->db->get_where('authors',array('id'=>$authorid))->row();
					$authorname= $authordata->name;
					$user->authorname=$authorname;
					
					$tcidd = $user->technology_category_id;
					$techcatdata = $this->db->get_where('technology_category',array('id'=>$tcidd))->row();
					$techcatname= $techcatdata->course;
					$user->techcatname=$techcatname;
					
					$users[]=$user;
					$user->image = "https://thedigicoders.com/public/uploads/technology_videos/".$user->image;
				}  
				
				$output['res'] = "success";
				$output['msg'] = "Technology  Videos's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Technology Videos's not found";
			} 
			$this->printResponse($output);
			
		}
		# Technology Video fullview Videos Api End Here
		
		
		#  Technology  fullview Videos full view  Api Start Here
		public function Technologyvideofullview()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            $videoid = $this->input->post('videoid');
            $userid = $this->input->post('user_id');
			$sel=$this->db->query("select * from technology_videos where id='$videoid'");
			
			if($sel->num_rows()>0)
			{ 
				$user = $sel->row();
				
				$id = $user->id;
				
				$authorid = $user->author_id;
				$authordata = $this->db->get_where('authors',array('id'=>$authorid))->row();
				$authorname= $authordata->name;
				$user->authorname=$authorname;
				
				$Video = $this->db->query("select * from wishlist where user_id='$userid' AND video_id='$id' AND type='Video'");
				if(!empty($Video->num_rows()>0))
				{
					$wishlist_status = "true";
				}
				else 
				{
					$wishlist_status = "false";
				}
				
				$user->wishlist_status= $wishlist_status;
				
				
				
				$tcidd = $user->technology_category_id;
				$techcatdata = $this->db->get_where('technology_category',array('id'=>$tcidd))->row();
				$techcatname= $techcatdata->course;
				$user->techcatname=$techcatname;
				
				$output['res'] = "success";
				$output['msg'] = "Technology Videos's fullview found";
				$output['data'] = [$user];
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Technology Videos's fullview fot found";
			} 
			$this->printResponse($output);
			
		}
		# Technology Videos full view Api End Here
		
		
		# Job Category Api Start Here
		public function JobCategory()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			$sel=$this->db->query("select * from job_category order by id DESC");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					
					$users[]=$user;
				}  
				
				$output['res'] = "success";
				$output['msg'] = "Job Categorie's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Job Categorie's not found";
			} 
			$this->printResponse($output);
			
		}
		# Technology Category Videos Api End Here
		
		#  Contact Api End Here
		public function Contact()
		{
			$output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
			
			if (empty($_POST) or empty($this->form_validation->run('Contact'))) 
			{
				$msg = explode('</p>', validation_errors());
				$output['msg'] = str_ireplace('<p>', '', $msg[0]);
			} 
			else 
			{
				$name=$this->input->post('name');
				$email=$this->input->post('email');
				$phone=$this->input->post('phone');
				$message=$this->input->post('message');
				
				$saveData = [
				'name' => $name,
				'email' => $email,
				'phone' => $phone,
				'message' => $message,
				'status' => 'true',
				'date' => date('Y-m-d'),
				'time' => date('h:i:sA'),
				];
				
				$saveData = $this->security->xss_clean($saveData);
				
				if ($this->db->insert('contact', $saveData))
				{
					$output['res'] = 'success';
					$output['msg'] = 'Your Enquiry is Successfull';
				} 
				else 
				{	
					$output['res'] = 'error';
					$output['msg'] = 'Your Enquiry failed.';
				}
			}
			$this->printResponse($output);
		}
		# Registraition Api End  Here
		
		
		# Job Details Api Start Here
		public function JobDetails()
		{
			$output['res'] = "error";
            $output['msg'] = "error";
			$output['data'] = []; 
			if (empty($_POST) or empty($this->form_validation->run('JobDetails')))
			{
				$msg = explode('</p>', validation_errors());
				$output['msg'] = str_ireplace('<p>', '', $msg[0]);
			} 
			else
			{
				$jobcategory_id = $this->input->post('jobcategory_id');
				$sel = $this->db->where(['jobcategory_id' => $jobcategory_id])->get('job_details');
				$users=array();
				if($sel->num_rows()>0)
				{ 
					$users=array();
					foreach($sel->result() as $user)
					{
						$users[]=$user;
						$user->image = "https://thedigicoders.com/public/uploads/job_details/".$user->image;
					}  
					$output['res'] = "success";
					$output['msg'] = "Job Detail's found";
					$output['data'] = $users;
				}
				else 
				{
					$output['res'] = "error";
					$output['msg'] = "Job Detail's Not found";
				}
			}
			$this->printResponse($output);
		}
		
		# Job Details Api End Here
		
		#  Job Detail's fullview Videos full view  Api Start Here
		public function JobDetailsfullview()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            $jobdetails_id = $this->input->post('jobdetails_id');
			$sel=$this->db->query("select * from job_details where id='$jobdetails_id'");
			
			if($sel->num_rows()>0)
			{ 
				$data = $sel->row();
				$data->image = "https://thedigicoders.com/public/uploads/job_details/".$data->image;
				
				$output['res'] = "success";
				$output['msg'] = "Job Detail's fullview found";
				$output['data'] = [$data];
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Job Detail's fullview fot found";
			} 
			$this->printResponse($output);
			
		}
		# Job Detail's full view Api End Here
		
		
		
		# Your Stream Api Start Here
		public function Stream()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			$Strem = [
			['id'=>'1', 'name'=>'Polytechnic'],
			['id'=>'2', 'name'=>'B.Tech'],
			['id'=>'3', 'name'=>'BCA'],
			['id'=>'4', 'name'=>'MCA'],
			['id'=>'4', 'name'=>'B.Sc'],
			['id'=>'4', 'name'=>'Other']
			];
			
			if($Strem)
			{ 
				$output['res'] = "success";
				$output['msg'] = "Stream's found";
				$output['data'] = $Strem;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Stream's fullview fot found";
			} 
			$this->printResponse($output);
			
		}
		# Stream Api End Here
		
		
		# Your Branch Api Start Here
		public function Branch()
		{
            $output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
            
			$stream_id = $this->input->post('stream_id');
			if(!empty($stream_id)){
				if($stream_id=="1"){
					$Branch = [
					    
					    ['id'=>'8', 'stream_id'=>'1', 'name'=>'Computer Science'],
					    ['id'=>'7', 'stream_id'=>'1', 'name'=>'Information Technology'],
					['id'=>'1', 'stream_id'=>'1', 'name'=>'Civil Engineering'], 
					['id'=>'2', 'stream_id'=>'1', 'name'=>'Mechanical Engineering'], 
					['id'=>'3', 'stream_id'=>'1', 'name'=>'Diploma in Architecture'],
					['id'=>'4', 'stream_id'=>'1', 'name'=>'Aeronautical Engineering'],
					['id'=>'5', 'stream_id'=>'1', 'name'=>'Electronics Engineering'],
					['id'=>'6', 'stream_id'=>'1', 'name'=>'Electrical Engineering'],
					['id'=>'9', 'stream_id'=>'1', 'name'=>'Other'],
					
					];
					$sem = [
					['id'=>'1', 'stream_id'=>'1', 'name'=>'1st'], 
					['id'=>'2', 'stream_id'=>'1', 'name'=>'2nd'], 
					['id'=>'3', 'stream_id'=>'1', 'name'=>'3rd'],
					['id'=>'4', 'stream_id'=>'1', 'name'=>'4th'],
					['id'=>'5', 'stream_id'=>'1', 'name'=>'5th'],
					['id'=>'6', 'stream_id'=>'1', 'name'=>'6th'],
					['id'=>'6', 'stream_id'=>'1', 'name'=>'7th'],
					['id'=>'6', 'stream_id'=>'1', 'name'=>'8th']
					];
				}
				else if($stream_id=="2"){
					$Branch = [ 
					    ['id'=>'8', 'stream_id'=>'1', 'name'=>'Computer Science'],
					    ['id'=>'7', 'stream_id'=>'1', 'name'=>'Information Technology'],
					['id'=>'1', 'stream_id'=>'2', 'name'=>'Civil Engineering'], 
					['id'=>'2', 'stream_id'=>'2', 'name'=>'Mechanical Engineering'], 
					['id'=>'3', 'stream_id'=>'2', 'name'=>'Diploma in Architecture'],
					['id'=>'4', 'stream_id'=>'2', 'name'=>'Aeronautical Engineering'],
					['id'=>'5', 'stream_id'=>'2', 'name'=>'Electronics Engineering'],
					['id'=>'6', 'stream_id'=>'2', 'name'=>'Electrical Engineering'],
					['id'=>'9', 'stream_id'=>'1', 'name'=>'Other'],
					];
					$sem = [
					['id'=>'1', 'stream_id'=>'2', 'name'=>'1st'], 
					['id'=>'2', 'stream_id'=>'2', 'name'=>'2nd'], 
					['id'=>'3', 'stream_id'=>'2', 'name'=>'3rd'],
					['id'=>'4', 'stream_id'=>'2', 'name'=>'4th'],
					['id'=>'5', 'stream_id'=>'2', 'name'=>'5th'],
					['id'=>'6', 'stream_id'=>'2', 'name'=>'6th'],
					['id'=>'7', 'stream_id'=>'2', 'name'=>'7th'],
					['id'=>'8', 'stream_id'=>'2', 'name'=>'8th']
					];
				}
				else if($stream_id=="3"){
					$Branch = [];
					$sem = [
					['id'=>'1', 'stream_id'=>'3', 'name'=>'1st'], 
					['id'=>'2', 'stream_id'=>'3', 'name'=>'2nd'], 
					['id'=>'3', 'stream_id'=>'3', 'name'=>'3rd'],
					['id'=>'4', 'stream_id'=>'3', 'name'=>'4th'],
					['id'=>'5', 'stream_id'=>'3', 'name'=>'5th'],
					['id'=>'6', 'stream_id'=>'3', 'name'=>'6th']
					];
				}
				else if($stream_id=="4"){
					$Branch = [];
					// $Branch = [ 
					// ['id'=>'1', 'stream_id'=>'4', 'name'=>'Computer Science'], 
					// ['id'=>'2', 'stream_id'=>'4', 'name'=>'IT'],
					// ['id'=>'3', 'stream_id'=>'4', 'name'=>'Electrical Engineering']
					// ];
					$sem = [
					['id'=>'1', 'stream_id'=>'4', 'name'=>'1st'], 
					['id'=>'2', 'stream_id'=>'4', 'name'=>'2nd'], 
					['id'=>'3', 'stream_id'=>'4', 'name'=>'3rd'],
					['id'=>'4', 'stream_id'=>'4', 'name'=>'4th']
					];
				}
				else 
				{
					$Branch = [];
				}
				
				if(count($Branch)>0)
				{ 
					$output['res'] = "success";
					$output['msg'] = "Branch's found";
					$output['data'] = $Branch;
					$output['semester'] = $sem;
				}
				else
				{
					$output['res'] = "success";
					$output['msg'] = "Branch's fot found";
					$output['semester'] = $sem;
				} 
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Branch id is required";
			} 
			$this->printResponse($output);
			
		}
		# Branch Api End Here
		
		
		
		#  Contact Api End Here
		// public function UserProfile()
		// {
		// $output['res'] = "error";
		// $output['msg'] = "error";
		// $output['data'] = []; 
		
		// if (empty($_FILES["image"]["name"])) 
		// {
		// $output['msg'] = 'Choose Profile Photo';
		// } 
		// if(empty($this->input->post('userid'))) 
		// {
		// $output['msg'] = 'User ID is required';
		// } 
		// else 
		// {
		// $userid = $this->input->post('userid');
		
		// $wheredata = array('id' => $userid);
		// $result = $this->db->where($wheredata)->get('users');
		// if ($result->num_rows()) 
		// {
		// $userData = $result->row();
		
		// if(!empty($_FILES['image']['name']))
		// {	
		// $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		// $filename = time()."_profile_photo." . $extension;
		// $config['upload_path'] = './public/uploads/profile_photo/';
		// $config['allowed_types'] = 'jpg|png|jpeg';
		// $config['max_size'] = 100000; // In KB
		// $config['file_name'] = $filename;
		// $this->upload->initialize($config);
		// $this->upload->do_upload('image');
		// }
		// else
		// {
		// $filename=$userData->image;
		// }
		
		
		// $updateData = [
		// 'name' => $this->input->post('name'),
		// 'mobile' => $this->input->post('mobile'),
		// 'stream' => $this->input->post('stream'),
		// 'branch' => $this->input->post('branch'),
		// 'semester' => $this->input->post('semester'),
		// 'college' => $this->input->post('college'),
		// 'current_status' => $this->input->post('current_status'),
		// 'year' => $this->input->post('year'),
		// 'image'=>$filename
		// ];
		
		// $upresult = $this->db->where($wheredata)->update('users',$updateData);
		// if($upresult)
		// {
		// $output['res'] = 'success';
		// $output['msg'] = 'Profile Completed';
		// $output['data'] = [$userData];
		// } 
		// else 
		// {
		// $output['res'] = 'error';
		// $output['msg'] = 'Invalid User ID';
		// }
		// }
		// }
		
		// $this->printResponse($output);
		// }
		# Registraition Api End  Here
		
		
		public function UserProfile()
		{
			
			$output['res'] = "error";
            $output['msg'] = "error";
            $output['data'] = []; 
			
			$userid = $this->input->post('userid');
			
			$updateData = [
			'name' => $this->input->post('name'),
			'mobile' => $this->input->post('mobile'),
			'stream' => $this->input->post('stream'),
			'branch' => $this->input->post('branch'),
			'semester' => $this->input->post('semester'),
			'college' => $this->input->post('college'),
			'current_status' => $this->input->post('current_status'),
			'year' => $this->input->post('year'),
			'email' => $this->input->post('email'),
			'dob' => $this->input->post('dob'),
			'gender' => $this->input->post('gender'),
			];
			
			# Note: Mobile Number & Email ID can be edit only in case of empty value 
			
			$wheredata = array('id' => $userid);
			$result = $this->db->where($wheredata)->get('users');
			
			if ($result->num_rows()) 
			{
				
				$values = $result->row();
				
				$new_mobile = $updateData['mobile'];
				$new_email = $updateData['email'];
				
				$old_mobile=$values->mobile;
				$old_email=$values->email;
				
				# Update Profile without editing mobile and email id 
				
				if( $new_mobile==$old_mobile && $new_email==$old_email )
				{
					$updateData = [
					'name' => $this->input->post('name'),
					'stream' => $this->input->post('stream'),
					'branch' => $this->input->post('branch'),
					'semester' => $this->input->post('semester'),
					'college' => $this->input->post('college'),
					'current_status' => $this->input->post('current_status'),
					'year' => $this->input->post('year'),
					'dob' => $this->input->post('dob'),
					'gender' => $this->input->post('gender'),
					];
					
					$upresult = $this->db->where($wheredata)->update('users', $updateData);
					
					$data=$this->db->get_where("users",array("id"=>$this->input->post('userid')));
					$data=$data->row();
					
					if($data->image)
					{
						$data->image ="https://thedigicoders.com/public/uploads/profile_photo/".$data->image;
					}
					else
					{
						$data->image = null;
					}
					
					$output['res'] = 'success';
					$output['msg'] = 'Profile Updated successfully.';
					$output['data'] = [$data];
					
					echo json_encode($output);
					
				}
				
				# When User Change Email Address (in case of empty email)
				
				else if($new_email != $old_email) {
					
					$updateData = [
					'name' => $this->input->post('name'),
					'stream' => $this->input->post('stream'),
					'branch' => $this->input->post('branch'),
					'semester' => $this->input->post('semester'),
					'college' => $this->input->post('college'),
					'current_status' => $this->input->post('current_status'),
					'year' => $this->input->post('year'),
					'dob' => $this->input->post('dob'),
					'gender' => $this->input->post('gender'),
					'email' => $this->input->post('email'),
					];
					
					# Check Email ID is Unique or Not 
					$already_exist = $this->db->get_where('users',['email'=>$new_email]);
					if($already_exist->num_rows() == 0 )
					{
						
						$upresult = $this->db->where($wheredata)->update('users', $updateData);
						
						$data=$this->db->get_where("users",array("id"=>$this->input->post('userid')));
						$data=$data->row();
						
						if($data->image)
						{
							$data->image ="https://thedigicoders.com/public/uploads/profile_photo/".$data->image;
						}
						else
						{
							$data->image = null;
						}
						
						$output['res'] = 'success';
						$output['msg'] = 'Profile Updated successfully.';
						$output['data'] = [$data];
						
						echo json_encode($output);
						
						
					}
					else 
					{
						$output['res'] = 'error';
						$output['msg'] = 'Email ID already Registered.';
						$output['data'] = array();
						
						echo json_encode($output);
						
					}
					
				}
				
				# When User Change Mobile Number (in case of empty mobile number)
				
				else if($new_mobile != $old_mobile) {
					
					
					// $otp=rand(1000,9999);
					$otp=1234;
					// $this->sendSms($this->input->post('mobile'),$otp);
					
					$updateData = [
					'name' => $this->input->post('name'),
					'stream' => $this->input->post('stream'),
					'branch' => $this->input->post('branch'),
					'semester' => $this->input->post('semester'),
					'college' => $this->input->post('college'),
					'current_status' => $this->input->post('current_status'),
					'year' => $this->input->post('year'),
					'dob' => $this->input->post('dob'),
					'gender' => $this->input->post('gender'),
					'mobile' => $this->input->post('mobile'),
					'otp'=>$otp
					];
					
					
					# Check Mobile Number is Unique or Not 
					$already_exist = $this->db->get_where('users',['mobile'=>$new_mobile]);
					if($already_exist->num_rows() == 0 )
					{
						
						$upresult = $this->db->where($wheredata)->update('users', $updateData);
						
						$data=$this->db->get_where("users",array("id"=>$this->input->post('userid')));
						$data=$data->row();
						
						if($data->image)
						{
							$data->image ="https://thedigicoders.com/public/uploads/profile_photo/".$data->image;
						}
						else
						{
							$data->image = null;
						}
						
						$output['res'] = 'success';
						$output['msg'] = 'Profile Updated successfully.';
						$output['data'] = [$data];
						
						echo json_encode($output);
						
					}
					else 
					{
						$output['res'] = 'error';
						$output['msg'] = 'Mobile Number already Registered.';
						$output['data'] = array();
						
						echo json_encode($output);
						
					}
					
				}
				
			}
			else
			{
				
				$output['res'] = 'error';
				$output['msg'] = 'User id invalid';
				$output['data'] = array();
				
				echo json_encode($output);
				
			}
			
			header("content-type:application/json");
			
		}
		
		# UserProfileImage Api Start Here 
		public function UserProfileimage()
		{
			$this->form_validation->set_rules('userid', 'User Id', 'required');
			// if ($this->form_validation->run() == FALSE OR empty($_FILES["image"]["name"]))
			// {
			// $output['res']="error";
			// $output['msg']="All fields is required.";
			// }
			if ($this->form_validation->run() == FALSE)
			{
				$output['res']="error";
				$output['msg']="User Id is required.";
			}
			elseif(empty($_FILES["image"]["name"]))
			{
				$output['res']="error";
				$output['msg']="Image fields is required.";
			}
			else
			{
				$data=$this->db->get_where("users",["id"=>$this->input->post('userid')]);
				if($data->num_rows()>0)
				{
					$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
					$filename = time() . "_profile_photo." . $ext;
					
					$config['upload_path']   = './public/uploads/profile_photo/';
					$config['allowed_types'] = 'jpg|png|jpeg|webp';
					$config['max_size']      = 10000; // In KB
					$config['file_name']     = $filename;
					$this->upload->initialize($config);
					
					if ($this->upload->do_upload('image')) 
					{
						$this->db->where('id',$this->input->post('userid'));
						$res= $this->db->update("users", array('image' => $filename));
						if($res)
						{
							$data=$this->db->get_where("users",array("id"=>$this->input->post('userid')));
							$data=$data->row();
							$output['res']="success";
							$output['msg']="Profile update successfully.";
							$data->image ="https://thedigicoders.com/public/uploads/profile_photo/".$data->image;
							$output['data']=$data;
						}
						else{
							$output['res']="error";
							$output['msg']="Something went wrong.";
						}
					}
					
					else
					{
						$output['res']="error";
						$output['msg']="Image Uploaded Failed";
					}
				}
				else
				{
					$output['res']="error";
					$output['msg']="No data found";
				}
			}
			$this->printResponse($output);
		}
		
		# UserProfileImage Api End Here 
		
		# countApi here 
		public function CountVidoes()
		{
			$output['res'] = "error";
			$output['msg'] = "error";
			$output['data'] = []; 
			
			$videoid = $this->input->post('videoid');
			$sel=$this->db->query("select * from manage_videos where id='$videoid'");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$id = $user->id;
					$viewcount=$user->count;
					$st = '1';
					$viewcount=$st+$viewcount;
					$this->db->query("update manage_videos set count='$viewcount' where id='$id' ");
					$data = $this->db->where(['id'=>$id])->get('manage_videos')->result();
				}  
				
				$output['res'] = "success";
				$output['msg'] = "Video Count's found";
				$output['data'] = $data;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Video Count's not found";
			}
			$this->printResponse($output);
		}
		
		# TechnologyVideosView
		public function CountTechnologyVideos()
		{
			$output['res'] = "error";
			$output['msg'] = "error";
			$output['data'] = []; 
			
			$videoid = $this->input->post('videoid');
			$sel=$this->db->query("select * from technology_videos where id='$videoid'");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				foreach($sel->result() as $user)
				{
					$id = $user->id;
					$viewcount=$user->count;
					$st = '1';
					$viewcount=$st+$viewcount;
					$this->db->query("update technology_videos set count='$viewcount' where id='$id' ");
					$data = $this->db->where(['id'=>$id])->get('technology_videos')->result();
					
				}  
				
				$output['res'] = "success";
				$output['msg'] = "Video Count's found";
				$output['data'] = $data;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Video Count's not found";
			}
			$this->printResponse($output);
		}
		
		
		# Wishlist Api 
		public function Wishlist()
		{
			$output['res'] = "error";
			$output['msg'] = "error";
			$output['data'] = []; 
			
			$user_id = $this->input->post('user_id');
			$type_id = $this->input->post('type_id');
			$type = $this->input->post('type');
			// $video_type = $this->input->post('video_type');
			
			if(!empty($type=='Video'))
			{
				if($this->db->get_where("wishlist",array("user_id"=>$user_id,"type"=>$type,"video_id"=>$type_id))->num_rows()>0)
				{
					//delete
					$query1=$this->db->query("DELETE FROM wishlist WHERE user_id='$user_id' and video_id='$type_id' and type='$type' ");
					
					if($query1)
					{
						$output['res'] = 'success';
						$output['msg'] = 'Remove Wishlist Successfuly!';
					}
					else
					{
						$output['res'] = 'error';
						$output['msg'] = 'Something  went wrong!';
					}
					
				}
				else
				{
					// insert
					$data_arr = array(
					"user_id" => $user_id,
					"video_id" => $type_id,
					"type" => $type,
					// "video_type" => $video_type,
					"status" => 'true',
					"date" => date('Y-m-d')
					);
					
					$res=$this->db->insert("wishlist",$data_arr);
					if($res){
						$output['res'] = "success";
						$output['msg']="Video addded to wishlist.";
					}
					else{
						$output['res'] = 'error';
						$output['msg']="Something went wrong.";
					}
				}
			}
			else if(!empty($type=='News'))
			{
				
				if($this->db->get_where("wishlist",array("user_id"=>$user_id,"type"=>$type,"video_id"=>$type_id))->num_rows()>0){
					//delete
					$query1=$this->db->query("DELETE FROM wishlist WHERE user_id='$user_id' and video_id='$type_id' and type='$type'");
					
					if($query1)
					{
						$output['res'] = 'success';
						$output['msg'] = 'Remove Wishlist Successfuly!';
						
					}
					else
					{
						$output['res'] = 'error';
						$output['msg'] = 'Something  went wrong!';
					}
					
					}else{
					// insert
					$data_arr = array(
					"user_id" => $user_id,
					"video_id" => $type_id,
					"type" => $type,
					"status" => 'true',
					"date" => date('Y-m-d')
					);
					
					$res=$this->db->insert("wishlist",$data_arr);
					if($res){
						$output['res'] = "success";
						$output['msg'] = "News Addded to Wishlist.";
					}
					else{
						$output['res'] = 'error';
						$output['msg']="Something went wrong.";
					}
				}
			}
			else if(!empty($type=='Pdf'))
			{
				if($this->db->get_where("wishlist",array("user_id"=>$user_id,"type"=>$type,"video_id"=>$type_id))->num_rows()>0){
					//delete
					$query1=$this->db->query("DELETE FROM wishlist WHERE user_id='$user_id' and video_id='$type_id' and type='$type'");
					
					if($query1)
					{
						$output['res'] = 'success';
						$output['msg'] = 'Delete Wishlist Successfuly!';
						
					}
					else
					{
						$output['res'] = 'error';
						$output['msg'] = 'Something  went wrong!';
					}
					
					}else{
					// insert
					$data_arr = array(
					"user_id" => $user_id,
					"video_id" => $type_id,
					"type" => $type,
					"status" => 'true',
					"date" => date('Y-m-d')
					);
					
					$res=$this->db->insert("wishlist",$data_arr);
					if($res){
						$output['res'] = "success";
						$output['msg'] = "PDF Addded to Wishlist.";
					}
					else{
						$output['res'] = 'error';
						$output['msg']="Something went wrong.";
					}
				}
			}
			
			$this->printResponse($output);
		}
		
		
		
		# Wishlist Count Here 
		public function WishlistShow()
		{
			$output['res'] = "error";
			$output['msg'] = "error";
			$output['data'] = []; 
			
			$user_id = $this->input->post('user_id');
			$type = $this->input->post('type');
			
			$sel=$this->db->query("select * from wishlist where user_id='$user_id' && type='$type'");
			$users=array();
			if($sel->num_rows()>0)
			{ 
				$users=array();
				$i=0;
				foreach($sel->result() as $user)
				{
					$video_id = $user->video_id;
					// for trending news 
					if(!empty($type=='News'))
					{
						$newsdata = $this->db->query("select * from trending where id='$video_id'")->row();
						if(!empty($newsdata))
						{
							$user->newsdata = $newsdata;
							$newsdata->newsimage= "https://thedigicoders.com/public/uploads/trending/".$newsdata->image;
							
							$authorid = $newsdata->author_id;
							$authordata = $this->db->get_where('authors',array('id'=>$authorid))->row();
							$authorname= $authordata->name;
							$authormedia= $authordata->media;
							$authorimg= $authordata->image;
							$user->authorname=$authorname;
							$user->authormedia=$authormedia;
							$user->authorimage= "https://thedigicoders.com/public/uploads/authors/".$authorimg;
						}
						
						$News = $this->db->query("select * from wishlist where user_id='$user_id' AND video_id='$video_id' AND type='News'");
						if(!empty($News->num_rows()>0))
						{
							$wishlist_status = "true";
						}
						else 
						{
							$wishlist_status = "false";
						}
						$user->wishlist_status= $wishlist_status;
						// end News 
						
						$output['res'] = "success";
						$output['msg'] = "Wishlist Count's found111";
						// if(!empty($newsdata))
						// {
						// array_push($users,$user);
						// }
						// $output['data'][$i]= $users;
						$output['data'][$i]= $user;
						$i++;
					} 
					elseif(!empty($type=='Pdf'))
					{
						$pdfdata = $this->db->query("select * from technology_pdf where id='$video_id'")->row();
						if(!empty($pdfdata))
						{
							$user->pdfdata = $pdfdata;
							// $pdfdata->pdfdata= "https://thedigicoders.com/public/uploads/technology_pdf/".$pdfdata->image;
							
							$icon = $pdfdata->image;
							$pdfdata->pdf_url = base_url('pdf_viewer/web/viewer.php?url=') . base_url('public/uploads/technology_pdf/').$icon; 
							$pdfdata->webpdfurl = base_url('public/uploads/technology_pdf/').$icon;
							// end here 
							
						}
						$Pdf = $this->db->query("select * from wishlist where user_id='$user_id' AND video_id='$video_id' AND type='Pdf'");
						if(!empty($Pdf->num_rows()>0))
						{
							$wishlist_status = "true";
						}
						else 
						{
							$wishlist_status = "false";
						}
						$user->wishlist_status= $wishlist_status;
						// end News 
						
						$output['res'] = "success";
						$output['msg'] = "Wishlist Count's found222";
						$output['data'][$i]= $user;
						$i++;
					}  
					// end News
					
					// start Video
					elseif(!empty($type=='Video'))
					{
						
						$videodata = $this->db->query("select * from technology_videos where id='$video_id'")->row();
						if(!empty($videodata))
						{
							$user->videodata= $videodata;
							$videodata->image = "https://thedigicoders.com/public/uploads/technology_videos/".$videodata->image;
						}
						
						$Video = $this->db->query("select * from wishlist where user_id='$user_id' AND video_id='$video_id' AND type='Video'");
						
						if(!empty($Video->num_rows()>0))
						{
							$wishlist_status = "true";
						}
						else 
						{
							$wishlist_status = "false";
						}
						$user->wishlist_status= $wishlist_status;
						
						
						$output['res'] = "success";
						$output['msg'] = "Wishlist Count's found222";
						if(!empty($videodata))
						{
							$output['data'][$i]= $user;
							$i++;
						}
						// end Video 
					}
				}
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Wishlist Count's not found";
			}
			$this->printResponse($output);
		}
		
		# Firebase App Token Start Here
		public function Token()
		{
			$table = "app_token";
			
			$output['res'] = "error";
			$output['msg'] = "error";
			$output['data'] = "";
			
			if (empty($_POST)) {
				$output['msg'] = 'Something Went Wrong. Try Again !';
				} else {
				
				if ($this->form_validation->run('Token')) {
					
					if (empty($this->input->post('userid'))) {
						$_POST['userid'] = 0;
					}
					
					$token = $this->input->post('token');
					$userid = $this->input->post('userid');
					
					$whereData = [
					"userid" => $this->input->post('userid'),
					];
					
					$result = $this->db->where($whereData)->get($table);
					$count = $result->num_rows();
					if ($count) 
					{
						$data_to_update = array(
						"userid" => $this->input->post('userid'),
						"token" => $this->input->post('token')
						);
						
						$query1 = $this->db->where($whereData)->update($table, $data_to_update);
						if ($query1) 
						{
							$aResult = $this->db->query("select * from app_token where userid='$userid' AND token='$token'");
							$upres = $aResult->row();
							$output['res'] = "success";
							$output['msg'] = "Token Update.";
							$output['data'] = $upres;
						}
						else 
						{
							$output['res'] = "error";
							$output['msg'] = "Token Not Update.";
						}
						
						} else {
						$data_to_insert = array(
						"userid" => $this->input->post('userid'),
						"token" => $this->input->post('token'),
						"date" => date('Y-m-d'),
						"time" => date('h:i'),
						"status" => 'true',
						);
						$query = $this->db->insert($table, $data_to_insert);
						if ($query) 
						{
							$aResult = $this->db->query("select * from app_token where userid='$userid' AND token='$token'");
							$upres = $aResult->row();
							$output['res'] = "success";
							$output['msg'] = "Token Saved.";
							$output['data'] = $upres;
						} 
						else 
						{
							$output['res'] = "error";
							$output['msg'] = "Try !again";
						}
					}
					
					} else {
					$msg = explode('</p>', validation_errors());
					$output['msg'] = str_ireplace('<p>', '', $msg[0]);
				}
			}
			$this->printResponse($output);
		}
		
		# Shoe Notification Start Here 
		public function Noification(){
			$output['res'] = "error";
			$output['msg'] = "error";
			$output['data'] = [];
			
			$sel=$this->db->order_by('id', 'DESC')->get('manage_notification');
			if($sel->num_rows()){
				$dataarray= array();
				foreach($sel->result() as $row){
					$dataarray[]=$row;
				}
				$output['res'] = 'success';
				$output['msg'] = 'Notification Available';
				$output['data'] = $dataarray;
				}else{
				$output['res'] = 'error';
				$output['msg'] = 'Notification Unavailabe';
				
			}
			$this->printResponse($output);
		}
		
		
		# Job All Data Api 
		public function JobDetailsAll()
		{
			$output['res'] = "error";
			$output['msg'] = "error";
			$output['data'] = []; 
			
			$sel=$this->db->order_by('id', 'DESC')->get('job_details');
			$users=array();
			if($sel->num_rows()>0)
			{ 
				
				$users=array();
				foreach($sel->result() as $user)
				{
					$users[]=$user;
					$user->image = "https://thedigicoders.com/public/uploads/job_details/".$user->image;
				}  
				$output['res'] = "success";
				$output['msg'] = "Job Details's found";
				$output['data'] = $users;
			}
			else
			{
				$output['res'] = "error";
				$output['msg'] = "Job Details's not found";
			} 
			$this->printResponse($output);
			
		}
		# Banner APi End Here
		
		
	# end code here    
}
?>	