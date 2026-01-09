<!doctype html>
<html lang="en">
	
	<head>
		<title>Student Login </title>
		<?php require('includes/CssLinks.php') ?>
	</head>
    <style>
        .bg-oldlace{
            background-color: oldlace;
        }
    </style>
	
	<body>
		
		<!--start wrapper-->
		<div class="wrapper">
			
			<!--start content-->
			<main class="authentication-content">
				<div class="container-fluid">
					<div class="authentication-card">
						<div class="card shadow rounded-0 overflow-hidden">
							<div class="row g-0">
								<div class="col-lg-6 bg-oldlace d-flex align-items-center justify-content-center">
									<img src="<?= base_url('/public/assets/images/digicoders-student-login.png')?>" class="img-fluid" alt="">
								</div>
								<div class="col-lg-6">
									<div class="card-body p-4 p-sm-5">
										<h5 class="card-title pb-2">Student Login</h5>
										<!-- <p class="card-text mb-5">See your growth and get consulting support!</p> -->
										<div style="display:none" id="errorContainer" class="bg-light text-danger mb-3 p-2"
										style="border-radius: 5px;">
											
										</div>
										<form action="<?= base_url('Home/UserLoginSubmit');?>" class="form-body" method="post" id="auth-form">
											<div class="row g-3">
												<div class="col-12">
													<label for="inputmobilenumber" class="form-label">Mobile Number</label>
													<div class="ms-auto position-relative">
														<div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
														class="bi bi-telephone-fill"></i></div>
														<input type="tel" name="mobile" required class="form-control radius-30 ps-5"
														id="inputmobilenumber" placeholder="Mobile Number">
													</div>
												</div>
												<div class="col-12">
													<label for="inputChoosePassword" class="form-label">Enter Password</label>
													<div class="ms-auto position-relative">
														<div class="position-absolute top-50 translate-middle-y search-icon px-3"><i
														class="bi bi-lock-fill"></i></div>
														<input type="password" name="password" required class="form-control radius-30 ps-5"
														id="inputChoosePassword" placeholder="Enter Password">
														<!--<input type="hidden" name="url" required class="form-control radius-30 ps-5" value="">-->
													</div>
												</div>
												
												<div class="col-12">
													<div class="d-grid">
														<button type="submit" id="submitBtn" class="btn btn-primary radius-30"><i
														class="fa fa-spinner fa-spin" style="display:none;" id="submitSpin"></i>Sign In</button>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
			
			<!--end page main-->
			
		</div>
		<!--end wrapper-->
		<?php require('includes/JsLinks.php') ?>
		
	</body>
</html>
<?php
	if ($this->session->flashdata('res') == 'success') {
		echo '<script>$.notify("' . $this->session->flashdata('msg') . '","success")</script>';
		} else if ($this->session->flashdata('res') == 'error') {
		echo '<script>$.notify("' . $this->session->flashdata('msg') . '","error")</script>';
	}
?>