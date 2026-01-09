<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Job Alert - Software Development | Website Development | Mobile Application Development | Digital
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
					<div class="breadcrumb-title pe-3">Job Alert</div>
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
						<?php foreach ($job_details as $job): ?> <!-- Loop starts here -->
						<div class="card">
							<div class="card-header py-3">
								<div class="row">
									<div class="col-sm-12 d-flex justify-content-between">
										<h6>Job Id: #<?php echo $job->id; ?></h6> <!-- Dynamic Job ID -->
										<h6><?php echo $job->job_title; ?></h6> <!-- Dynamic Job Title -->
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="p-3">
												<span><i class="bi bi-building me-2"></i><?php echo $job->company_name; ?></span> <br> <!-- Dynamic Company Name -->
												<span><i class="bi bi-geo-alt me-2"></i><?php echo $job->location; ?></span> <br /> <!-- Dynamic Location -->
												<span><i class="bi bi-buildings me-2"></i><?php echo $job->job_mode; ?></span> <!-- Dynamic Job Type -->
											</div>
										</div>
										<div class="col-sm-6 d-flex justify-content-lg-end">
											<div class="p-3">
												<span><i class="bi bi-wallet me-2"></i><?php echo $job->salary; ?></span> <br /> <!-- Dynamic Salary -->
												<span><i class="bi bi-calendar me-2"></i><?php echo $job->date; ?></span><br /> <!-- Dynamic Date Posted -->
												<div class="vdfgh mt-2">
													<!--<button data-bs-toggle="modal" data-bs-target="#view_details_<?php echo $job->id; ?>"
													class="btn btn-danger btn-sm">View Details</button>-->
													<!-- Button to Open the Modal -->
													<button 
													class="btn btn-primary job-details-btn" 
													data-bs-toggle="modal" 
													data-bs-target="#view_details_<?php echo $job->id; ?>" 
													data-job-id="<?php echo $job->id; ?>"
													data-job-title="<?php echo $job->job_title; ?>"
													data-company-name="<?php echo $job->company_name; ?>"
													data-job-role="<?php echo $job->job_role; ?>"
													data-location="<?php echo $job->location; ?>"
													data-date="<?php echo $job->date; ?>"
													data-salary="<?php echo $job->salary; ?>"
													data-job-mode="<?php echo $job->job_mode; ?>"
													data-job-shift="<?php echo $job->job_shift; ?>"
													data-skill="<?php echo $job->skill; ?>"
													data-mobile="<?php echo $job->mobile; ?>"
													data-email="<?php echo $job->email; ?>"
													data-website="<?php echo $job->website; ?>"
													data-education="<?php echo $job->education; ?>"
													data-experience="<?php echo $job->experience; ?>"
													data-image="<?php echo "https://thedigicoders.com/public/uploads/job_details/" . $job->image; ?>"
													>
														View Details
													</button>
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?> <!-- Loop ends here -->
					</div>
				</div>
				
				
				
				
				
				
				
				
				
				<!-- Job Details -->
				
				<!-- Modal Structure -->
				<div class="modal fade" id="view_details_<?php echo $job->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<h5 class="modal-title text-light" id="exampleModalLabel">Job Details</h5>
								<button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="p-2">
											<span class="badge py-2 fw-light badge-lg bg-success text-white mb-2" id="modalJobTitle"></span><br />
											<span><i class="bi bi-building me-2"></i><span id="modalCompanyName"></span></span><br>
											<span><i class="bi bi-geo-alt me-2"></i><span id="modalLocation"></span></span><br />
											<span><i class="bi bi-calendar me-2"></i><span id="modalDate"></span></span><br />
											<span><i class="bi bi-wallet me-2"></i><span id="modalSalary"></span></span><br />
											<span><i class="bi bi-buildings me-2"></i><span id="modalJobMode"></span></span><br />
											<span><i class="bi bi-brightness-high-fill me-2"></i><span id="modalJobShift"></span></span><br />
											<span><i class="bi bi-telephone me-2"></i><a href="tel:0987654321" id="modalMobile"></a></span><br />
											<span><i class="bi bi-envelope-open me-2"></i><a id="modalEmail"></a></span><br />
											<span><i class="bi bi-whatsapp me-2"></i><a
											href="https://wa.me/1234567890" id="modalWhatsapp"></a></span><br />
											<span><i class="bi bi-link me-2"></i><a id="modalWebsite" target="_blank"></a></span><br />
										</div>
									</div>
									<div class="col-sm-6">
										<div class="d-flex justify-content-end">
											<img src="path_to_image.jpg" class="w-25" id="modalImage" alt="Job Image">
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
												<p class="card-text" id="modalEducation">Diploma</p>
											</div>
										</div>
										<div class="card mb-2">
											<div class="card-body">
												<h6 class="card-title">Skills</h6>
												<p class="card-text" id="modalSkill">Core PHP</p>
											</div>
										</div>
										<div class="card mb-2">
											<div class="card-body">
												<h6 class="card-title">Experience</h6>
												<p class="card-text" id="modalExperience">6 Months to 1 year</p>
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
				
				
				
				<!-- End here -->
				
				
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
		
		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
		
		<?php require('includes/JsLinks.php') ?>
		<script>
			
			$(document).ready(function() 
			{
				$('.job-details-btn').on('click', function() 
				{
					const jobId = $(this).data('job-id');
					const jobTitle = $(this).data('job-title');
					const companyName = $(this).data('company-name');
					const location = $(this).data('location');
					const date = $(this).data('date');
					const salary = $(this).data('salary');
					const jobMode = $(this).data('job-mode');
					const JobShift = $(this).data('job-shift');
					const skill = $(this).data('skill');
					const mobile = $(this).data('mobile');
					const email = $(this).data('email');
					const website = $(this).data('website');
					const education = $(this).data('education');
					const experience = $(this).data('experience');
					const image = $(this).data('image');
					
					// Set the values in the modal
					$('#modalJobTitle').text(jobTitle);
					$('#modalCompanyName').text(companyName);
					$('#modalLocation').text(location);
					$('#modalDate').text(date);
					$('#modalSalary').text(salary);
					$('#modalJobMode').text(jobMode);
					$('#modalJobShift').text(JobShift);
					$('#modalMobile').attr('href', 'tel:' + mobile).text(mobile);
					$('#modalWhatsapp').attr('href', 'tel:' + mobile).text(mobile);
					$('#modalEmail').attr('href', 'mailto:' + email).text(email);
					$('#modalWebsite').attr('href', website).text(website);
					$('#modalEducation').text(education);
					$('#modalSkill').text(skill);
					$('#modalExperience').text(experience);
					 $('#modalImage').attr('src', image);
					$('#view_details_' + jobId).modal('show');
				});
			});
			
			
		</script>
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