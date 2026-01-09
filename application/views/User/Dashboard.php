<?php
	if (empty($this->session->get_userdata()['user'])) {
		$user_id = '';
		redirect(base_url('Home/UserLogin'));
		} else {
		$user_id = $this->session->userdata()['user']->id;
		$userdata = $this->session->userdata()['user'];
		$mobile = $userdata->mobile;
	}
?>

<!doctype html>
<html lang="en">
	
	<head>
		<title>Dashboard - Software Development | Website Development | Mobile Application Development | Digital Marketing |
		Summer Training | Internship | Apprenticeship</title>
		<?php require('includes/CssLinks.php') ?>
	</head>
	
	<body class="pace-done">
		
		
		<!--start wrapper-->
		<div class="wrapper">
			<!--start top header-->
			<?php require('includes/header.php'); ?>
			<!--end top header-->
			
			<!--start sidebar -->
			<?php require('includes/sidebar.php'); ?>
			<!--end sidebar -->
			
			<!--start content-->
			<main class="page-content">
				<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
					<div class="col">
						<div class="card radius-10 border-0 border-start border-tiffany border-3">
							<a href="#">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div class="">
											<p class="mb-1">Attadance</p>
											<h4 class="mb-0 text-tiffany"></h4>
										</div>
										<div class="ms-auto widget-icon bg-tiffany text-white">
											<i class="fadeIn animated bx bx-message-square-edit"></i>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 border-0 border-start border-primary border-3">
							<a href="#">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div class="">
											<p class="mb-1">Fee</p>
											<h4 class="mb-0 text-primary"></h4>
										</div>
										<div class="ms-auto widget-icon bg-primary text-white">
											<i class="bi bi-person-lines-fill"></i>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 border-0 border-start border-primary border-3">
							<a href="#">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div class="">
											<p class="mb-1">Total Interview </p>
											<h4 class="mb-0 text-primary"></h4>
										</div>
										<div class="ms-auto fs-2 text-primary">
											<i class="bi bi-briefcase-fill"></i>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 border-0 border-start border-primary border-3">
							<a href="#">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div class="">
											<p class="mb-1">Total Test </p>
											<h4 class="mb-0 text-primary"></h4>
										</div>
										<div class="ms-auto widget-icon bg-primary text-white">
											<i class="bi bi-images"></i>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
				<!--end row-->
				
				
				
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
		
		<?php require('includes/JsLinks.php') ?>
		
	</body>
</html>