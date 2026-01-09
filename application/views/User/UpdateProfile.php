<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Update Profile - Software Development | Website Development | Mobile Application Development | Digital
			Marketing |
		Summer Training | Internship | Apprenticeship</title>
		<?php require('includes/CssLinks.php'); ?>
		
		<style>
			.card-bg-job-modal {
            background-color: #fffdf0;
            border: 1px solid #efe979;
			}
			
			.card-bg-job-modal-2 {
            background-color: #ebf8f1;
            border: 1px solid #397d61;
			}
		</style>
	</head>
	
	<body>
		
		
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
				
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Update Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
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
				
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-header py-3">
								<div class="row">
									
									<!-- Form for password change -->
									<div class="row mt-4">
										<div class="col-sm-12">
											<form action="<?= base_url('User/UpdateProfile/Code')?>" method="POST" enctype="multipart/form-data">
												<div class="mb-3">
													<label for="old_password" class="form-label">Student Name</label>
													<input type="text" value="<?= !empty($profile->student_name)?$profile->student_name:'' ?>" class="form-control" name="student_name">
												</div>
												
												<div class="mb-3">
													<label for="new_password" class="form-label">Image</label>
													<input type="file" class="form-control" name="image">
												</div>
												
												<button type="submit" class="btn btn-primary">Update Profile</button>
											</form>
										</div>
									</div>
									<!-- End of Form -->
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
				<!-- Job Details -->
				<div class="modal fade" id="view_deatilas" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<h5 class="modal-title text-light" id="exampleModalLabel">Kraftors Web Solutions</h5>
								<button type="button" class="btn-close text-light" data-bs-dismiss="modal"
                                aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="p-2">
											<span class="badge py-2 fw-light badge-lg bg-success text-white mb-2">Full
												Stack
											developers</span><br />
											<span><i class="bi bi-building me-2"></i>Kraftors Web Solutions</span> <br>
											<span><i class="bi bi-code-slash me-2"></i>web developer</span> <br>
											<span><i class="bi bi-geo-alt me-2"></i>Hazratganj Lucknow Uttar Pradesh
											India</span> <br />
											<span><i class="bi bi-buildings me-2"></i>On Site</span> <br />
											<span><i class="bi bi-wallet me-2"></i>10k-15k</span> <br />
											<span><i class="bi bi-calendar me-2"></i>16-11-2023</span><br />
											<span><i class="bi bi-brightness-high-fill me-2"></i>Day</span><br />
											<span><i class="bi bi-telephone me-2"></i><a
											href="tel:0987654321">0987654321</a></span><br />
											<span><i class="bi bi-envelope-open me-2"></i><a
											href="mailto:demo@gmail.com">demo@gmail.com</a></span><br />
											<span><i class="bi bi-whatsapp me-2"></i><a
											href="https://wa.me/1234567890">1234567890</a></span><br />
											<span><i class="bi bi-link me-2"></i><a
											href="https://xyz.com">xyz.com</a></span><br />
											
											
										</div>
									</div>
									<div class="col-sm-6">
										<div class="d-flex justify-content-end">
											
											<img src="assets/images/Digicoders-Logo.png" class="w-25" alt="">
										</div>
										<div class="p-2">
											<div class="card mb-3 card-bg-job-modal mt-3">
												<div class="row g-0">
													<div class="col-md-12">
														<div class="card-body">
															<p class="card-text">This is a free job alert by
																TeamDigiCoders, if you are interested in the above job
																then you can contact to that company and get more
																deatils about the job, TeamDigiCoders don't hold any
																responsibility if you pay any amount to anyone for the
															job offer</p>
															
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<h5>Job Description</h5>
									<div class="col-sm-6 mt-3">
										<div class="card mb-2">
											<div class="card-body">
												<h6 class="card-title">Education</h6>
												<p class="card-text">Diploma</p>
											</div>
										</div>
										<div class="card mb-2">
											<div class="card-body">
												<h6 class="card-title">Skills</h6>
												<p class="card-text">Core PHP</p>
											</div>
										</div>
										<div class="card mb-2">
											<div class="card-body">
												<h6 class="card-title">Experience</h6>
												<p class="card-text">6 Months to 1 year</p>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card mb-3 card-bg-job-modal-2 mt-3">
											<div class="row g-0">
												<div class="col-md-12">
													<div class="card-body">
														<p class="card-text fw-bold">Reference</p>
														<p class="card-text">Digicoders Technologies (Himanshu Kashyap Sir
														and Gopal Singh Sir)</p>
														<p class="card-text fw-bold">Important</p>
														<p class="card-text">When you send your CV to the company by
															mail/wahtsapp or talk to hiring manager over phone then you must
															mention that you got the reference for this job from Digicoders
															Technologies(Himanshu Kashyap Sir
														and Gopal Singh Sir)</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</div>
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
		
		<?php require('includes/JsLinks.php') ?>
		
	</body>
	
</html>
<script>
    $('.dropify').dropify();
	
    $('#summernote').summernote({
        placeholder: 'Discription..',
        tabsize: 2,
        height: 120,
        toolbar: [
		['style', ['style']],
		['font', ['bold', 'underline', 'clear']],
		['color', ['color']],
		['para', ['ul', 'ol', 'paragraph']],
		['table', ['table']],
		['insert', ['link', 'picture', 'video']],
		['view', ['fullscreen', 'codeview', 'help']]
        ]
	});
</script>