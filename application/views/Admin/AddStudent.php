<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Add Student - <?= $this->data['app_name'] ?></title>
		<?php include('include/headerlinks.php'); ?>
		<style>
			label{
			font-weight:600;
			padding-top:5px;
			}
		</style>
		<style>
			#msgpara{
			border: #06509f;
			border-style: dashed;
			padding:4px;
			text-align:justify;
			}
			/*#msgpara:hover{
			border: yellow;
			border-style: dotted;
			}*/
			.btnJPg:hover{
			background:#f7b205;
			color:white;
			}
			.border {
			padding:15px!important;
			text-align:justify;
			// height: 100%;
			width: 100%;
			background: linear-gradient(90deg, #250a99 50%, transparent 50%), 
			linear-gradient(90deg, #250a99 50%, transparent 50%), 
			linear-gradient(0deg, #250a99 50%, transparent 50%), 
			linear-gradient(0deg, #250a99 50%, transparent 50%);
			background-repeat: repeat-x, repeat-x, repeat-y, repeat-y;
			background-size: 16px 4px, 16px 4px, 4px 16px, 4px 16px;
			background-position: 0% 0%, 100% 100%, 0% 100%, 100% 0px;
			border-radius: 5px;
			padding: 10px;
			animation: dash 5s linear infinite;
			}
			
			@keyframes dash {
			to {
			background-position: 100% 0%, 0% 100%, 0% 0%, 100% 100%;
			}
			}
		</style>
		
	</head>
	
	<body>
		<!--start wrapper-->
		<div class="wrapper">
			<!--start top header-->
			<?php include('include/header.php'); ?>
			<!--end top header-->
			
			<!--start sidebar -->
			<?php include('include/sidebar.php'); ?>
			<!--end sidebar -->
			
			<!--start content-->
			<main class="page-content">
				
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add Student</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?= base_url('Admin/Dashboard') ?>"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="section-area section-sp3 ovpr-dark bg-fix appointment-box" style="background-image:url(/assets/images/banner/banner4.jpg);">
					<div class="container-fluid">
						
						<div class="card"> 
							<div class="card-body">
								<form id="reg" class="form-horizontal mb-5" action="<?= base_url() ?>Admin/AddStudent/Add" method="POST">
									<?php
										$csrf = array(
										'name' => $this->security->get_csrf_token_name(),
										'hash' => $this->security->get_csrf_hash());                  
									?>
									<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
									
									<div class="row form-group">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<label>Student Mobile Number</label>
											<?php echo form_error('mobile'); ?>
											<input class="form-control" type="number" name="Mobile1" maxlength="10" minlength="10" placeholder="Enter Student Mobile Number" required  onkeyup="search_func(this.value)" />
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<label>Student Training Location</label>
											<?php echo form_error('student_training_location'); ?>
											<select class="form-control" name="student_training_location"
												id="student_training_location" required>
												<option value="">-Choose Training Location-</option>
												<option value="Lucknow">Lucknow</option>
												<option value="Kanpur">Kanpur</option>
												<option value="Online">Online</option>
											</select>
										</div>
	
										
									</div>
									<div class="row form-group">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<label class="control-label">Student Name</label>
											<?php echo form_error('student_name'); ?>
											<input class="form-control" type="text" name="Name" placeholder="Enter Student Name" required id="name" />
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<label>Choose Training</label>
											<?php echo form_error('training_type'); ?>
											<select name="ApplicationFor" class="form-control" id="trainingtype" onchange="setFee(); loadTechnology(); " required>
												<option value="">-Choose Training-</option>
												<option value="Online Summer Training">Online Summer Training</option>
												<option value="Vocational Training">Vocational Training</option>
												<option value="Summer Training">Summer Training</option>
												<option value="Winter Training">Winter Training</option>
												<option value="Industrial Training">Industrial Training</option>
												<option value="Apprenticeship Training">Apprenticeship Training</option>
												<option value="Internship Training">Internship Training</option>
												<option value="Project Training">Project Training</option>
											
											</select>
										</div>
										
									</div>
									
									
									
									<div class="row form-group">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<label>Choose Technology</label>
											<?php echo form_error('technology'); ?>
											<select name="Technology" class="form-control" id="technology" required>
												
													<option value="" selected disabled>-Choose Technology-</option>
				
											</select>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<label>Select Your Education</label>
											<?php echo form_error('course'); ?>
											<select class="form-control" name="Course" required id="education">
												<option value="">-Select Your Education-</option>
												<option value="B.Tech (CS)">B. Tech (CS)</option>
												<option value="B.Tech (IT)">B. Tech (IT)</option>
												<option value="B.Tech (Electronics/Electrical)">B.Tech (Electronics/Electrical)</option>
												<option value="B.Tech  (EC)">B. Tech (EC)</option>
												<option value="Diploma (CS)">Diploma (CS)</option>
												<option value="Diploma (IT)">Diploma (IT)</option>
												<option value="Diploma (Electronics/Electrical)">Diploma (Electronics/Electrical)</option>
												<option value="Diploma (PGDCA)">Diploma (PGDCA)</option>
												<option value="Diploma (PG Web Designing)">Diploma (PG Web Designing) </option>
												<option value="BCA">BCA</option>
												<option value="MCA">MCA</option>
												<option value="M.Tech (CS)">M. Tech (CS)</option>
												<option value="M.Tech (CS)">M. Tech (IT)</option>
												<option value="Other">Other</option>
											</select>
										</div>
										
									</div>
									
									
									<div class="row form-group">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<label>Select Year</label>
											<?php echo form_error('edu_year'); ?>
											<select class="form-control" name="Year" required id="year">
												<option value="">-Select Year-</option>
												<option value="First Year (1st)">First Year (1st)</option>
												<option value="Second Year (2nd)">Second Year (2nd)</option>
												<option value="Third Year (3rd)">Third Year (3rd)</option>
												<option value="Final Year (4th)">Final Year (4th)</option>
												<option value="Completed">Completed</option>
												<option value="Other">Other</option>
											</select>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<label>Student Father's Name</label>
											<?php echo form_error('father_name'); ?>
											<input class="form-control" type="text" name="Father" id="fname" placeholder="Enter Student Father's Name" required />
										</div>
										
										
										
									</div>
									<div class="row form-group">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<label>Student Email ID(Optional)</label>
											<input class="form-control" type="email" name="Email" id="email" placeholder="Enter Student Email ID"  />
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<label>Student Alternate Mobile (Optional)</label>
											<input class="form-control" type="number" name="Mobile2" id="mob2" maxlength="10" minlength="10" placeholder="Enter Student Alternate Mobile" />
										</div>
										
									</div>
									<div class="row form-group">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<label>Student College Name</label>
											<?php echo form_error('college_name'); ?>
											<input class="form-control" id="cname" type="text" name="College" placeholder="Enter Student College Name" required list="collegelist" />
											<datalist id="collegelist">
												
												<option>KM MAYAWATI GOVT. GIRLS POLYTECHNIC, BADALPUR, GAUTAMBUDDHA NAGAR</option>
												<option>
													GOVT. POLYTECHNIC, SAHARANPUR
												</option>
												<option>
													SAVITRIBAI PHULE GOVT. GIRLS POLYTECHNIC, KUMARHERA, SAHARANPUR
												</option>
												<option> 
													GOVT. GIRLS POLYTECHNIC, MORADABAD
												</option>
												<option>
													GOVT. POLYTECHNIC, BIJNORE
												</option>
												<option>
													GOVT. POLYTECHNIC, RAMPUR
												</option>
												<option>
													GOVT. GIRLS POLYTECHNIC, SHAMLI
												</option>
												<option>
													GOVT. LEATHER INSTITUTE, AGRA
												</option>
												<option>
													CH. MUKHTAR SINGH GOVT. GIRLS POLYTECHNIC DAURALA,MEERUT
												</option>
												<option>
													MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY, MAHAMAYA NAGAR, HATHRAS
												</option>
												<option>
													MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY, AMROHA
												</option>
												<option>
													GOVT. POLYTECHNIC,CHAMRAUWA,RAMPUR
												</option>
												<option>
													GOVT. POLYTECHNIC, KATAI JOYA, J P NAGAR
												</option>
												<option>
													GOVT. POLYTECHNIC, CHANGIPUR, NOORPUR, BIJNORE
												</option>
												<option>
													GOVT. POLYTECHNIC MAWANA KHURD MEERUT
												</option>
												<option>
													MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY ALIGARH
												</option>
												<option>
													CHHATRAPATI SHAHUJI MAHARAJ GOVT.POLY. AMBEDKARNAGAR
												</option>
												<option>
													GOVT. GIRLS POLYTECHNIC, AMETHI
												</option>
												<option>
													GOVT. POLYTECHNIC, UNNAO
												</option>
												<option>
													GOVT. POLYTECHNIC, SHAHJAHANPUR
												</option>
												<option>
													GOVT. POLYTECHNIC, ADAMPUR, TARABGANJ, GONDA
												</option>
												<option>
													TATHAGAT GAUTAM BUDDHA GOVT. POLYTECHNIC, SHRAVASTI
												</option>
												<option>
													MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY SHARAVASTI
												</option>
												<option>
													GOVT. POLYTECHNIC BIGAPUR UNNAO
												</option>
												<option>
													GOVT. POLYTECHNIC,MOHAMMADI, LAKHIMPUR KHERI
												</option>
												<option>
													GOVT. GIRLS POLYTECHNIC,TILHAR,SHAHJAHANPUR
												</option>
												<option>
													GOVT. GIRLS POLYTECHNIC,RISIYA,NANPARA,BAHARAICH
												</option>
												<option>
													GOVT. POLYTECHNIC, BAHERI,BAREILLY
												</option>
												<option>
													GOVT. POLYTECHNIC,KULPAHAD, MAHOBA(PPP Mode)
												</option>
												<option>
													VERANGANA JHALKARIBAI GOVT. GIRLS POLYTECHNIC, JHANSI
												</option>
												<option>
													GOVT. POLYTECHNIC, MAHOBA
												</option>
												<option>
													GOVT. POLYTECHNIC, MADHOGARH JALAUN
												</option>
												<option>
													GOVT. POLYTECHNIC, SIKANDARA, KANPUR DEHAT
												</option>
												<option>
													GOVT. POLYTECHNIC, TALBEHAT, LALITPUR
												</option>
												<option>
													GOVT. POLYTECHNIC, ATRAULIYA, AZAMGARH ( RUN BY AICCEDS ) VILL-MAHRAHA TEHSIL-ATRAULIA BUDHANPUR AZAMGARH ( P P P MODEL)
												</option>
												<option>
													GOVT. GIRLS. POLYTECHNIC, GORAKHPUR
												</option>
												<option>
													GOVT. GIRLS POLYTECHNIC, MEZA, ALLAHABAD
												</option>
												<option>
													GOVT. POLYTECHNIC, JAUNPUR
												</option>
												<option>
													MAHATAMA JYOTIBAPHULE GOVT. POLYTECHNIC, KAUSHAMBI
												</option>
												<option>
													GOVT. POLYTECHNIC, MAU
												</option>
												<option>
													MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY, HARIHARPUR, GORAKHPUR
												</option>
												<option>
													MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY CHANDAULI
												</option>
												<option>
													GOVT. POLYTECHNIC, AURAI, UGAPUR, BHADOHI ROAD, SANT RAVIDAS NAGAR
												</option>
												<option>
													GOVT. POLYTECHNIC, PREMDHAR PATTI, RANIGANJ, PRATAPGARH
												</option>
												<option>
													MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY KUSHINAGAR
												</option>
												<option>
													MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY MAHARAJGANJ
												</option>
												<option>
													GOVT. POLYTECHNIC CHOPAN SONBHADRA
												</option>
												<option>
													GOVT. POLYTECHNIC RAJGARH MIRZAPUR
												</option>
												<option>
													MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY SANTKABIRNAGAR
												</option>
												<option>
													MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY SIDHARTHANAGAR
												</option>
												<option>
													SANT RAVIDAS GOVERNMENT POLYTECHNIC,CHAKIA,CHANDAULI
												</option>
												<option>
													JANTA POLYTECHNIC, JAHANGIRABAD, BULANDSHAHAR
												</option>
												<option>
													D N POLYTECHNIC, MEERUT
												</option>
												<option>
													D J POLYTECHNIC, BARAUT, BAGHPAT
												</option>
												<option>
													M G POLYTECHNIC, HATHRAS
												</option>
												<option>
													RAJA BALWANT SINGH POLYTECHNIC, BICHPURI, AGRA
												</option>
												<option>
													FIROZE GANDHI POLYTECHNIC, RAIBARELI
												</option>
												<option>
													JAWAHAR LAL NEHRU POLYTECHNIC, MAHMOODABAD, SITAPUR
												</option>
												<option>
													DR AMBEDKAR INST. OF TECH. FOR HANDICAPPED KANPUR
												</option>
												<option>
													SRI RAMDEVI RAMDAYAL TRIPATHI GIRLS POLYTECHNIC, KANPUR
												</option>
												<option>
													MAHARANA PRATAP POLYTECHNIC GORAKHPUR
												</option>
												<option>
													GOVT. POLYTECHNIC, GHAZIABAD
												</option>
												<option>
													GOVT. GIRLS POLYTECHNIC, LUCKNOW
												</option>
												<option>
													GOVT. POLYTECHNIC, LUCKNOW
												</option>
												<option>
													ARYIKAGYANWATI, GOVT. GIRLS POLYTECHNIC, FAIZABAD
												</option>
												<option>
													GOVT. POLYTECHNIC, KANPUR
												</option>
												<option>
													GOVT. GIRLS POLYTECHNIC, CHARKHARI MAHOBA
												</option>
												<option>
													GOVT. GIRLS POLYTECHNIC, VARANASI
												</option>
												<option>
													GOVT. POLYTECHNIC, MIRZAPUR
												</option>
												<option>
													GOVT. GIRLS POLYTECHNIC, BALLIA
												</option>
												<option>
													HEWETT POLYTECHNIC, LUCKNOW
												</option>
												<option>
													HANDIA POLYTECHNIC HANDIA, ALLAHABAD
												</option>
												<option>
													GOVT. GIRLS POLYTECHNIC, BAREILLY
												</option>
												<option>
													GOVT. POLYTECHNIC, JHANSI
												</option>
												<option>
													GOVT. POLYTECHNIC, FARRUKHABAD
												</option>
												<option>
													GOVT. GIRLS POLYTECHNIC, ALLAHABAD
												</option>
												<option>
													CHANDAULI POLYTECHNIC, CHANDAULI
												</option>
												
											</datalist>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											
											<div class="row form-group ml-2">
												
												<label>Payment Type</label>
												
												<div class="col-sm-12">
													<input class="form-check-input" type="radio" onchange="setFee()" name="Fee" id="exampleRadios1" value="Registration Fee" checked>
													<label class="form-check-label" for="exampleRadios1" style="font-weight:200;">
														Registration Fee
													</label>
												</div>
												
												<div class="col-sm-12">
													<input class="form-check-input" type="radio" name="Fee" onchange="setFee()" id="exampleRadios2" value="Full Fee">
													<label class="form-check-label" for="exampleRadios2" style="font-weight:200;">
														Full Fee
													</label>
												</div> 
											</div>
										</div>
										
										
										
									</div>
									
									<div class="row form-group">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<label>Amount To Pay Now</label>
											<input class="form-control" type="number" value="500" id="amount" name="Amount" placeholder="Enter Amount" required />
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<label>Payment Status</label>
											<?php echo form_error('payment_status'); ?>
											<select class="form-control" name="paystatus" id="paystatus" required />
											<option value="" selected disabled>---select--</option>
											<option value="PAID">PAID</option>
											<option value="SUCCESS">SUCCESS</option>
											<option value="FAILED">FAILED</option>
											<option value="pending">Pending</option>
										</select>
									</div>
									 
									
								</div>
								
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 col-sm-12">
										
										<label>Remark</label>
										<input class="form-control" type="text" id="remark" name="remark" placeholder="Enter Remark" />
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">
										
										<label>Tnx ID</label>
										<input class="form-control" type="text" id="tnxid" name="tnxid" placeholder="Enter Tnx ID" required />
									</div>
									
									
									
								</div>
								<div class="row form-group"> 
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Tnx Password</label>
										<input class="form-control" type="password" name="tnxpass" id="tnxpass" placeholder="Enter Tnx Password"  />
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Discount Coupon Code(Optional)</label>
										<!--<input class="form-control" type="text" id="coupon1" name="coupon" placeholder="Enter Coupon Code" onfocusout="Applybtn()" />
											<br>
											<p style="display:none;color:red;" id="ccode">Coupon code is required</p>
										<button  type="button" class="btn btn-dark btn-sm btnJPg" id="couponCode" onclick="validatecouponCode()" style="display:none;">Apply</button>-->
										<div class="input-group mb-3">
											<!--<input type="text" class="form-control" name="coupon" placeholder="Enter Coupon Code" aria-label="Enter Coupon Code" aria-describedby="basic-addon2" onfocusout="Applybtn()" id="coupon1">-->
											<input type="text" class="form-control" name="coupon" placeholder="Enter Coupon Code" aria-label="Enter Coupon Code" aria-describedby="basic-addon2" onkeyup="Applybtn()"  id="coupon1">
											
											<div class="input-group-append" id="apply" style="display:block">
												<button type="button" class="input-group-text bg-success text-white" id="couponCode"  onclick="validatecouponCode()">Apply</button>
											</div>
											
											<div class="input-group-append" id="remove" style="display:none">
												<button type="button" class="input-group-text bg-danger text-white" id="couponCode"  onclick="RemovecouponCode()">Remove</button>
											</div>
											
										</div>
										<p style="display:none;color:red;" id="ccode">Coupon code is required</p>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12" id="msgbox" style="display:none;">
										<br>
										<p class="headshot headshot-1 border" id="msgpara"></p>
										
									</div>
								</div>
								
								
								<div class="col-lg-12 text-center mt-5">
									<button name="submit" type="submit" value="Submit" class="btn button-md btn-danger">Register Now</button>
								</div>
							</form>
						</div>
					</div>
					<br /> 
				</div>
			</div>
			
			
		</main>
		<!--end page main-->
		
		<!--start overlay-->
		<div class="overlay nav-toggle-icon"></div>
		<!--end overlay-->
		
		<!--Start Back To Top Button-->
		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
	</div>
	<!--end wrapper-->
	
	<?php include('include/jslinks.php') ?>
	<script language="javascript">
		function search_func(value)
	{ 
	// console.log(value);  
	$.ajax({ 
	type: "POST",
	url: "<?= base_url('Home/SearchStuDetail')?>",
	data: {'mobile' : value},
	dataType: "text",
	success: function(msg){
	var obj = JSON.parse(msg);
	if(obj.error=='error')
	{ 
	$("#cname").val('');
	$("#name").val('');
	$("#student_training_location").val('');
	$("#name").val('');
	$("#fname").val('');
	$("#email").val('');
	$("#mob2").val('');
	}else{ 
	$("#cname").val(obj.college_name); 
	$("#name").val(obj.student_name);
	$("#student_training_location").val(obj.student_training_location);
	$("#fname").val(obj.father_name);
	$("#email").val(obj.email);
	$("#mob2").val(obj.alt_mobile);
	$('#year option[value="'+obj.edu_year+'"]').attr('selected','selected');
	// $('#year').selectpicker('refresh');
	$('#technology option[value="'+obj.technology+'"]').attr('selected','selected');
	// $('#technology').selectpicker('refresh');
	$('#trainingtype option[value="'+obj.training_type+'"]').attr('selected','selected');
	// $('#trainingtype').selectpicker('refresh');
	$('#education option[value="'+obj.course+'"]').attr('selected','selected');
	// $('#education').selectpicker('refresh');
	} 
	
	}
	
	});
	}
	</script> 
	<script>
		function RemovecouponCode(){
				document.getElementById("msgbox").style.display = "none";
				document.getElementById("apply").style.display = "block";
				document.getElementById("remove").style.display = "none";
				document.getElementById("coupon1").value="";
			}
		function Applybtn() {
				var x=document.getElementById("coupon1").value;
				document.getElementById("coupon1").value=x.toUpperCase();
				if(x.length>0)
				document.getElementById("couponCode").style.display = "block";
				else
				document.getElementById("couponCode").style.display = "none";
			}
	/*function Applybtn() {
	var x=document.getElementById("coupon1").value;
	document.getElementById("coupon1").value=x.toUpperCase();
	if(x.length>0)
	document.getElementById("couponCode").style.display = "block";
	else
	document.getElementById("couponCode").style.display = "none";
	}
	*/
	function validatecouponCode(){
				var x=document.getElementById("coupon1").value;
				if(x.length>0){
					document.getElementById("ccode").style.display = "none";
					$.ajax({ 
						type: "POST",
						url: "<?= base_url('Home/validatecouponCode')?>",
						data: {'code' : x},
						dataType: "text",
						success: function(msg){
							var obj1 = JSON.parse(msg);
							// console.log(msg);
							if(obj1.error=='error')
							{
								document.getElementById("msgbox").style.display = "block";
								document.getElementById("apply").style.display = "none";
								document.getElementById("remove").style.display = "block";
								document.getElementById("msgpara").innerHTML = "<span style='color:red'>Invalid Coupon Code</span>";
								
							}
							else{
								document.getElementById("msgbox").style.display = "block";
								document.getElementById("apply").style.display = "none";
								document.getElementById("remove").style.display = "block";
								// document.getElementById("msgpara").innerHTML = "You will get discount Rs. <b>"+obj1.amount+"</b> for use coupon <b>"+obj1.name +'</b>.<br>'+obj1.description;
								document.getElementById("msgpara").innerHTML = "You will get discount of Rs. <b>"+obj1.amount+"</b> in your total fees with this coupon <b>"+obj1.name +'</b>.<br>'+obj1.description;
							}
						}
					});
				}
				else
				{
					document.getElementById("ccode").style.display = "block";
					
				}
				
			};
			
	setFee();
	
	function setFee() {
	
	var feetype = $('input[name="Fee"]:checked').val();
	
	var RegistrationFee = [500, 500, 500, 500, 1000, 2000, 2000, 2000, 2000, 2000];
	var FullFee = [500, 4000, 6000, 6000, 6000, 12000, 18000, 18000, 6000, 6000];
	
	if (feetype == 'Registration Fee') {
	
	var ttype = $("#trainingtype").prop("selectedIndex");
	$("#amount").val(RegistrationFee[ttype]);
	
	} else if (feetype == 'Full Fee') {
	
	var ttype = $("#trainingtype").prop("selectedIndex");
	$("#amount").val(FullFee[ttype]);
	
	} else if (feetype == '500 Rs Offer') {
	
	$("#amount").val(500);
	
	} else {
	$("#amount").val(0);
	}
	
	
	
	}
	
	function loadTechnology() {
		var ttype = $("#trainingtype").val();

			var data45Days = '<option value="" selected disabled>-Choose Technology-</option>' +
				'<option value="PHP">PHP</option>' +
				'<option value="Android">Android</option>' +
				'<option value="ASP.NET">ASP.NET</option>' +
				'<option value="JAVA">JAVA</option>' +
				'<option value="Python">Python</option>' +
				'<option value="Embedded with IOT">Embedded with IOT</option>'  +
				'<option value="AI/ML">AI/ML</option>' +
				'<option value="MERN Stack">MERN Stack</option>' +
				'<option value="Cadded Software (Mechanical)">Cadded Software (Mechanical)</option>' +
				'<option value="Cadded Software (Electrical)">Cadded Software (Electrical)</option>' +
				'<option value="Cadded Software (Civil/Architecture)">Cadded Software (Civil/Architecture)</option>' +
				'<option value="Not Yet Decided">Not Yet Decided</option>';

			var data6Months = '<option value="" selected disabled>-Choose Technology-</option>' +
				'<option value="Advance PHP">Advance PHP</option>' +
				'<option value="Advance Android">Advance Android</option>' +
				'<option value="Advance ASP.NET">Advance ASP.NET</option>' +
				'<option value="Advance JAVA">Advance JAVA</option>' +
				'<option value="Advance Python">Advance Python</option>' +
				'<option value="Flutter with Dart">Flutter with Dart</option>' +
				'<option value="MERN Full Stack">MERN Full Stack</option>' +
				'<option value="Digital Marketing"> Digital Marketing</option>' +
				'<option value="Graphics Designing"> Graphics Designing</option>' +
				'<option value="Not Yet Decided">Not Yet Decided</option>';

			var defaultData = '<option value="" selected disabled>-Choose Technology-</option>' +
				'<option value="Please Select Training Type" disabled>Please Select Training Type</option>';

			if (ttype == "Online Summer Training" || ttype == "Summer Training" || ttype == "Vocational Training" || ttype == "Winter Training" || ttype == "Industrial Training") {
				$("#technology").html(data45Days);
				$('#technology').selectpicker('refresh');
			} else if (ttype == "Internship Training" || ttype == "Apprenticeship Training") {
				$("#technology").html(data6Months);
				$('#technology').selectpicker('refresh');
			} else {
				$("#technology").html(defaultData);
				$('#technology').selectpicker('refresh');
			}
		}

		// Initialize functions on page load
		$(document).ready(function () {
			setFee();
			loadTechnology();
		});
	</script>
	
	
	</body>
	
	</html>
	<script>
    $('.dropify').dropify();
	
	</script>		