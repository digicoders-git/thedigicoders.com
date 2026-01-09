<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Online Fee Payment - Software Development Training Institute - TheDigiCoders</title>
		<meta name="description" content="We provide the best Software Development Training Program in Lucknow, India, UP. You must fill out the online registration form.">
		
		<meta property="og:title" content="Online Fee Payment- Software Development Training Institute - TheDigiCoders" />
		<meta property="og:description" content="We provide the best Software Development Training Program in Lucknow, India, UP. You must fill out the online registration form." />
		<meta property="og:url" content="https://thedigicoders.com/Home/PayFee" />
		<link rel="canonical" href="https://thedigicoders.com/Home/PayFee" />
		
		<?php include('include/headerlinks.php')  ?>
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
		<?php include('include/header.php')  ?>
		
		<!-- 
			
			@{
			ViewBag.Title = "Registration";
			Layout = "~/Views/Shared/_Home_layout.cshtml";
			}
		@section Styles{ -->
		<style>
			.error {
            color: red !important;
			}
		</style>
		<!-- } -->
		<div class="page-content bg-dark">
			<div class="section-area section-sp3 ovpr-dark bg-fix appointment-box" style="background-image:url(/assets/images/banner/banner4.jpg);">
				<div class="container">
					<div class="row">
						<div class="col-md-12 heading-bx style1 text-white text-center">
							<h1 class="title-head">Pay Fee Now</h1>
							<p>A COMPANY WORKING WITH YOUNG ENGINEER'S, ENTREPRENEUR'S AND INNOVATIVE TEAM</p>
						</div>
					</div>
					<div class="card"> 
						<div class="card-body">
							<form id="reg" class="form-horizontal mb-5" action="<?= base_url() ?>Home/PayFee/PayNow" method="POST">
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
										<label class="control-label">Student Name</label>
										<?php echo form_error('student_name'); ?>
										<input class="form-control" type="text" readonly name="Name" placeholder="Enter Student Name" required id="name" />
										<input type="hidden" name="regid" id="regid" />
										<input type="hidden" name="uid" id="uid" />
									</div>
									
								</div>
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Training</label>
										<?php echo form_error('training_type'); ?>
										<input type="text" class="form-control" name="ApplicationFor" id="trainingtype" readonly placeholder="Training" required>
										
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Technology</label>
										<?php echo form_error('technology'); ?>
										<input type="text" class="form-control" name="Technology" id="technology" placeholder="Technology" readonly required>
										
									</div>
								</div>
								
								
								
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Education</label>
										<?php echo form_error('course'); ?>
										<input type="text" class="form-control" name="Course" readonly placeholder="Education" required id="education">
										
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Year</label>
										<?php echo form_error('edu_year'); ?>
										<input type="text" class="form-control" name="Year" placeholder="Year" readonly required id="year">
										
									</div>
								</div>
								
								<div class="row form-group">
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>College Name</label>
										<?php echo form_error('college_name'); ?>
										<input class="form-control" id="cname" readonly type="text" name="College" placeholder="Enter Student College Name" required list="collegelist" />
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Amount To Pay</label>
										<input class="form-control" type="number" id="amount" name="Amount" placeholder="Enter Amount" required />
									</div>
								</div>
								
								<div class="col-lg-12 text-center">
									<button name="submit" type="submit" value="Submit" class="btn button-md btnJPg">Pay Now</button>
								</div> 
							</form>
						</div>
					</div>
					<br />
				</div>
				@*<img src="~/assets/images/background/appointment-bg.png" class="appoint-bg" alt="">*@
			</div>
		</div>
		
		<!-- @section scripts
		{ -->
		<?php include('include/footer.php')  ?>
		<?php include('include/jslinks.php')  ?>
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
		$("#regid").val('');
		$("#name").val('');
		
		$("#name").val('');
		$("#uid").val('');
		$("#fname").val('');
		$("#email").val('');
		$("#mob2").val('');
		$("#education").val('');
		$("#trainingtype").val('');
		$("#year").val('');
		$("#technology").val('');
		}else{
		
		console.log(obj.id);
		$("#cname").val(obj.college_name);
		$("#regid").val(obj.id);
		$("#uid").val(obj.userid);
		$("#name").val(obj.student_name);
		$("#fname").val(obj.father_name);
		$("#email").val(obj.email); 
		$("#mob2").val(obj.alt_mobile);
		$("#education").val(obj.course);
		$("#trainingtype").val(obj.training_type);
		$("#year").val(obj.edu_year);
		$("#technology").val(obj.technology);
		} 
		
		}
		
		});
		}
		</script> 
		
		
		<!-- }
		-->
		
		
		</body>
		
		</html>
		
		<?php
		if (!empty($this->session->flashdata('status')))
		{
		if ($this->session->flashdata('msg') == 'Payment Success')
		{
		?>
		<script>
		iziToast.success({
		title: 'success',
		message: 'Payment Success',
		position: 'topRight'
		});
		</script>
		<?php
		}
		if ($this->session->flashdata('msg') == 'Something Went Wrong')
		{
		?>
		<script>
		iziToast.success({
		title: 'error',
		message: 'Something Went Wrong',
		position: 'topRight'
		});
		</script>
		<?php
		}
		if ($this->session->flashdata('msg') == 'Validation Error')
		{
		?>
		<script>
		iziToast.error({
		title: 'error',
		message: 'Validation Error',
		position: 'topRight'
		});
		</script>
		<?php
		}
		}
		?>																													