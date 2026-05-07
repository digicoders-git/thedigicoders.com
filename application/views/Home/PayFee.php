<!DOCTYPE html>
<html lang="en">

<head>
	<title>Online Fee Payment | DigiCoders Technologies Pvt. Ltd. - Secure Training Fees</title>
	<meta name="description"
		content="Securely pay your training fees online at DigiCoders Technologies Pvt. Ltd. We provide the best software development and IT training in Lucknow with live projects.">

	<meta name="keywords"
		content="online fee payment, DigiCoders fees, IT training fees Lucknow, software development training payment, DigiCoders Technologies Pvt. Ltd.">
	<meta property="og:title" content="Online Fee Payment | DigiCoders Technologies Pvt. Ltd. - Secure Training Fees" />
	<meta property="og:description"
		content="Securely pay your training fees online at DigiCoders Technologies Pvt. Ltd. We provide the best software development and IT training in Lucknow with live projects." />
	<meta property="og:url" content="<?= base_url($this->uri->uri_string()) ?>" />
	<link rel="canonical" href="<?= base_url($this->uri->uri_string()) ?>" />

	<?php include('include/headerlinks.php') ?>
	<style>
		:root {
			--orange: #E76028;
			--blue: #006DAB;
			--green: #00964C;
			--blue-light: #f0f7ff;
			--shadow-sm: 0 2px 8px rgba(0,0,0,0.05);
			--shadow-md: 0 10px 30px rgba(0,0,0,0.08);
		}

		body {
			background-color: #fcfdfe;
			font-family: 'Inter', sans-serif !important;
		}

		/* Banner Styling */
		.page-banner {
			height: 300px;
			display: flex;
			align-items: center;
			background-size: cover;
			background-position: center;
			position: relative;
			overflow: hidden;
		}

		.page-banner::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background: linear-gradient(135deg, rgba(0, 109, 171, 0.9) 0%, rgba(231, 96, 40, 0.8) 100%);
			z-index: 1;
		}

		.page-banner h1 {
			font-size: 3rem;
			font-weight: 700;
			position: relative;
			z-index: 2;
			letter-spacing: -1px;
		}

		/* Sidebar Styles */
		.sticky-sidebar {
			position: sticky;
			top: 100px;
		}

		.sidebar-card {
			background: #fff;
			border: 1px solid #eee;
			box-shadow: var(--shadow-sm);
			margin-bottom: 25px;
			overflow: hidden;
		}

		.sidebar-title-bx {
			padding: 15px;
			background: var(--blue-light);
			border-bottom: 1px solid #eee;
		}

		.sidebar-swiper-container {
			width: 100%;
			height: 250px;
			overflow: hidden;
			padding: 10px 15px;
			background: #f8fbff;
		}

		.sidebar-swiper-container img {
			width: 100%;
			height: 100%;
			object-fit: contain;
		}

		.btn-premium {
			display: block;
			width: 100%;
			padding: 12px;
			background: var(--blue);
			color: #fff !important;
			text-align: center;
			font-weight: 700;
			text-transform: uppercase;
			font-size: 13px;
			transition: all 0.3s ease;
		}

		.btn-premium:hover {
			background: var(--orange);
			transform: translateY(-2px);
		}

		.btn-enquiry {
			background: var(--orange);
		}

		/* Form Styling */
		.premium-form-card {
			background: #fff;
			border: 1px solid #e2e8f0;
			box-shadow: var(--shadow-md);
			padding: 40px;
			border-radius: 0;
			margin-bottom: 40px;
			border-top: 5px solid var(--blue);
		}

		.form-group label {
			font-weight: 700;
			color: #1e293b;
			margin-bottom: 8px;
			font-size: 14px;
			text-transform: uppercase;
			letter-spacing: 0.5px;
		}

		.form-control {
			border: 1px solid #e2e8f0;
			border-radius: 0;
			padding: 12px 15px;
			height: auto;
			font-size: 15px;
			transition: all 0.3s ease;
		}

		.form-control:focus {
			border-color: var(--blue);
			box-shadow: 0 0 0 3px rgba(0, 109, 171, 0.1);
		}

		.form-control[readonly] {
			background-color: #f8fafc;
			border-color: #f1f5f9;
			color: #64748b;
		}

		.btn-pay-now {
			background: var(--orange);
			color: #fff;
			border: none;
			padding: 15px 40px;
			font-size: 16px;
			font-weight: 800;
			text-transform: uppercase;
			letter-spacing: 1px;
			cursor: pointer;
			transition: all 0.3s ease;
			box-shadow: 0 4px 15px rgba(231, 96, 40, 0.3);
		}

		.btn-pay-now:hover {
			background: var(--blue);
			transform: translateY(-2px);
			box-shadow: 0 6px 20px rgba(0, 109, 171, 0.3);
		}

		.course-features {
			list-style: none;
			padding: 0;
		}

		.course-features li {
			display: flex;
			justify-content: space-between;
			padding: 8px 0;
			border-bottom: 1px solid #f1f5f9;
			font-size: 14px;
		}

		@media (max-width: 768px) {
			.page-banner h1 { font-size: 2.2rem; }
			.premium-form-card { padding: 25px; }
		}
	</style>

</head>

<body>
	<?php include('include/header.php') ?>

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
	<div class="page-content bg-white">
		<!-- Premium Hero Banner -->
		<div class="page-banner" style="background-image:url(<?= base_url('public') ?>/assets/images/banner/dct_banner.jpg);">
			<div class="container">
				<div class="page-banner-entry text-center">
					<h1 class="text-white">Online Fee Payment</h1>
					<p class="text-white mt-3 lead">Secure & Instant Payment Portal for Training Fees</p>
				</div>
			</div>
		</div>

		<div class="content-block">
			<div class="section-area section-sp1" style="padding-top: 50px; background-image: radial-gradient(#e2e8f0 0.5px, transparent 0.5px); background-size: 20px 20px;">
				<div class="container">
					<div class="row">
						<!-- Payment Form -->
						<div class="col-lg-8 offset-lg-2 col-md-12">
							<div class="premium-form-card">
								<form id="reg" class="form-horizontal" action="<?= base_url() ?>Home/PayFee/PayNow" method="POST">
									<?php
									$csrf = array(
										'name' => $this->security->get_csrf_token_name(),
										'hash' => $this->security->get_csrf_hash()
									);
									?>
									<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12 mb-4">
											<label><i class="fa fa-phone mr-2" style="color: var(--orange);"></i> Student Mobile Number</label>
											<?php echo form_error('mobile'); ?>
											<input class="form-control" type="number" name="Mobile1" maxlength="10" minlength="10" placeholder="Enter Registered Mobile Number" required onkeyup="search_func(this.value)" />
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12 mb-4">
											<label><i class="fa fa-user mr-2" style="color: var(--orange);"></i> Student Name</label>
											<?php echo form_error('student_name'); ?>
											<input class="form-control" type="text" readonly name="Name" placeholder="Search result name" required id="name" />
											<input type="hidden" name="regid" id="regid" />
											<input type="hidden" name="uid" id="uid" />
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12 mb-4">
											<label><i class="fa fa-briefcase mr-2" style="color: var(--orange);"></i> Training Type</label>
											<?php echo form_error('training_type'); ?>
											<input type="text" class="form-control" name="ApplicationFor" id="trainingtype" readonly placeholder="Training" required>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12 mb-4">
											<label><i class="fa fa-code mr-2" style="color: var(--orange);"></i> Technology</label>
											<?php echo form_error('technology'); ?>
											<input type="text" class="form-control" name="Technology" id="technology" placeholder="Technology" readonly required>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12 mb-4">
											<label><i class="fa fa-graduation-cap mr-2" style="color: var(--orange);"></i> Education</label>
											<?php echo form_error('course'); ?>
											<input type="text" class="form-control" name="Course" readonly placeholder="Education" required id="education">
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12 mb-4">
											<label><i class="fa fa-calendar mr-2" style="color: var(--orange);"></i> Year</label>
											<?php echo form_error('edu_year'); ?>
											<input type="text" class="form-control" name="Year" placeholder="Year" readonly required id="year">
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12 mb-4">
											<label><i class="fa fa-university mr-2" style="color: var(--orange);"></i> College Name</label>
											<?php echo form_error('college_name'); ?>
											<input class="form-control" id="cname" readonly type="text" name="College" placeholder="College Name" required />
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12 mb-4">
											<label><i class="fa fa-money mr-2" style="color: var(--orange);"></i> Amount To Pay (₹)</label>
											<input class="form-control" type="number" id="amount" name="Amount" placeholder="Enter Amount" required style="border-bottom: 2px solid var(--blue); font-size: 18px; font-weight: 700;" />
										</div>
									</div>

									<div class="text-center mt-4">
										<button name="submit" type="submit" value="Submit" class="btn-pay-now">
											<i class="fa fa-lock mr-2"></i> Pay Securely Now
										</button>
									</div>
								</form>
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- @section scripts
		{ -->
	<?php include('include/footer.php') ?>
	<?php include('include/jslinks.php') ?>
	<script>


		function search_func(value) {
			$.ajax({
				type: "POST",
				url: "<?= base_url('Home/SearchStuDetail') ?>",
				data: { 'mobile': value },
				dataType: "text",
				success: function (msg) {
					var obj = JSON.parse(msg);
					if (obj.error == 'error') {
						$("#cname").val('');
						$("#regid").val('');
						$("#name").val('');
						$("#uid").val('');
						$("#fname").val('');
						$("#email").val('');
						$("#mob2").val('');
						$("#education").val('');
						$("#trainingtype").val('');
						$("#year").val('');
						$("#technology").val('');
					} else {
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
if (!empty($this->session->flashdata('status'))) {
	if ($this->session->flashdata('msg') == 'Payment Success') {
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
	if ($this->session->flashdata('msg') == 'Something Went Wrong') {
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
	if ($this->session->flashdata('msg') == 'Validation Error') {
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