<!doctype html>
<html lang="en">
	
	<head>
		<title>Dashboard - Software Development | Website Development | Mobile Application Development | Digital Marketing | Summer Training | Internship | Apprenticeship</title>
		<?php include('include/headerlinks.php') ?>
	</head>
	
	<body class="pace-done">
		
		
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
				<?php 
					if($this->session->userdata('admin_type')=='website')
					{
					?>
					<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
						<div class="col">
							<div class="card radius-10 border-0 border-start border-tiffany border-3">
								<a href="<?= base_url('Admin/Registration') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Registrations</p>
												<h4 class="mb-0 text-tiffany"><?= $reg; ?></h4>
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
								<a href="<?= base_url('Admin/ManageContact') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Contacts</p>
												<h4 class="mb-0 text-primary"><?= $contact; ?></h4>
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
								<a href="<?= base_url('Admin/ManageFinalYearProject') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Project Request</p>
												<h4 class="mb-0 text-primary"><?= $final_year_project; ?></h4>
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
								<a href="<?= base_url('Admin/ManageBanner') ?>">  <div class="card-body">
									<div class="d-flex align-items-center">
										<div class="">
											<p class="mb-1">Total Banner </p>
											<h4 class="mb-0 text-primary"><?= $banners ?></h4>
										</div>
										<div class="ms-auto widget-icon bg-primary text-white">
											<i class="bi bi-images"></i> 
										</div>
									</div>
								</div></a>
							</div>
						</div>
						
						<div class="col">
							<div class="card radius-10 border-0 border-start border-primary border-3">
								<a href="<?= base_url('Admin/expert') ?>">  <div class="card-body">
									<div class="d-flex align-items-center">
										<div class="">
											<p class="mb-1">Total Expert </p>
											<h4 class="mb-0 text-primary"><?= $expert ?></h4>
										</div>
										<div class="ms-auto widget-icon bg-primary text-white">
											<i class="bi bi-images"></i> 
										</div>
									</div>
								</div></a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-primary border-3">
								<a href="<?= base_url('Admin/ManageWebinar') ?>">  <div class="card-body">
									<div class="d-flex align-items-center">
										<div class="">
											<p class="mb-1">Total Webinars </p>
											<h4 class="mb-0 text-primary"><?= $webinar ?></h4>
										</div>
										<div class="ms-auto widget-icon bg-primary text-white">
											<i class="lni lni-camera"></i>
										</div>
									</div>
								</div></a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-primary border-3">
								<a href="<?= base_url('Admin/ManageExpertList') ?>">  <div class="card-body">
									<div class="d-flex align-items-center">
										<div class="">
											<p class="mb-1">Teams </p>
											<h4 class="mb-0 text-primary"><?= $expert ?></h4>
										</div>
										<div class="ms-auto widget-icon bg-primary text-white">
											<i class="bi bi-person-circle"></i>
										</div>
									</div>
								</div></a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-primary border-3">
								<a href="<?= base_url('Admin/Intern') ?>">  <div class="card-body">
									<div class="d-flex align-items-center">
										<div class="">
											<p class="mb-1">Interns </p>
											<h4 class="mb-0 text-primary"><?= $intern ?></h4>
										</div>
										<div class="ms-auto widget-icon bg-primary text-white">
											<i class="bi bi-person-circle"></i>
										</div>
									</div>
								</div></a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-primary border-3">
								<a href="<?= base_url('Admin/ManageReview') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Reviews</p>
												<h4 class="mb-0 text-primary"><?= $review; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-primary text-white">
												<i class="bi bi-hand-thumbs-up-fill"></i>
											</div>
											
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-primary border-3">
								<a href="<?= base_url('Admin/ManageCertificate') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Certificates</p>
												<h4 class="mb-0 text-tiffany"><?= $certificate; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-primary text-white">
												<i class="bi bi-patch-check"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-primary border-3">
								<a href="<?= base_url('Admin/ManageMOU') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">MOUs</p>
												<h4 class="mb-0 text-tiffany"><?= $mou; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-primary text-white">
												<i class="fadeIn animated bx bx-building-house"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-primary border-3">
								<a href="<?= base_url('Admin/Achievements') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Achievemnets</p>
												<h4 class="mb-0 text-tiffany"><?= $achievemens; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-primary text-white">
												<i class="bi bi-trophy"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-primary border-3">
								<a href="<?= base_url('Admin/ManageAppreciation') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Appreciations </p>
												<h4 class="mb-0 text-tiffany"><?= $appreciation; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-primary text-white">
												<i class="bi bi-tv-fill"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-primary border-3">
								<a href="<?= base_url('Admin/ManageAdvisory') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Advisory</p>
												<h4 class="mb-0 text-primary"><?= $advisory; ?></h4>
											</div>
											<div class="ms-auto fs-2 text-primary">
												<i class="bi bi-cup"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-primary border-3">
								<a href="<?= base_url('Admin/ManageGallery') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1"> Photo Gallery </p>
												<h4 class="mb-0 text-tiffany"><?= $gallery; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-images"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-primary border-3">
								<a href="<?= base_url('Admin/ManageGallery') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Farwell</p>
												<h4 class="mb-0 text-tiffany"><?= $gallery; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-images"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						
						<div class="col">
							<div class="card radius-10 border-0 border-start border-primary border-3">
								<a href="<?= base_url('Admin/ManageModal') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Popup</p>
												<h4 class="mb-0 text-tiffany"><?= $modal; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-images"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-primary border-3">
								<a href="<?= base_url('Admin/placement') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Placement Photo </p>
												<h4 class="mb-0 text-tiffany"><?= $placement; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-images"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-primary border-3">
								<a href="<?= base_url('Admin/ManageVideo') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1"> Video Gallery </p>
												<h4 class="mb-0 text-tiffany"><?= $videos; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-camera-reels"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						
						<div class="col">
							<div class="card radius-10 border-0 border-start border-primary border-3">
								<a href="<?= base_url('Admin/ManageFAQ') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">FAQs</p>
												<h4 class="mb-0 text-primary"><?= $faq; ?></h4>
											</div>
											<div class="ms-auto fs-2 text-primary">
												<i class="bi bi-question"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						
						<div class="col">
							<div class="card radius-10 border-0 border-start border-primary border-3">
								<a href="<?= base_url('Admin/ManageNews') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">News Media</p>
												<h4 class="mb-0 text-primary"><?= $news; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-primary text-white">
												<i class="bi bi-newspaper"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						
						<div class="col">
							<div class="card radius-10 border-0 border-start border-primary border-3">
								<a href="<?= base_url('Admin/ManageEvent') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Manage Events</p>
												<h4 class="mb-0 text-primary"><?= $events; ?></h4>
											</div>
											<div class="ms-auto fs-2 text-primary">
												<i class="bi bi-wallet"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-primary border-3">
								<a href="<?= base_url('Admin/PlacementPartner') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Placement Partner List</p>
												<h4 class="mb-0 text-primary"><?= $placement_partner; ?></h4>
											</div>
											<div class="ms-auto fs-2 text-primary">
												<i class="bi bi-building"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
					<?php  
					}
					else
					{
					?>
					<!-- 2nd Row Start Here -->
					<!--<h4>App Users</h4><hr>-->
					
					<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
						<div class="col">
							<div class="card radius-10 border-0 border-start border-tiffany border-3">
								<a href="<?= base_url('Admin/Users') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">All Users</p>
												<h4 class="mb-0 text-tiffany"><?= $allusers; ?></h4>
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
							<div class="card radius-10 border-0 border-start border-tiffany border-3">
								<a href="<?= base_url('Admin/ManageAuthor') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Author</p>
												<h4 class="mb-0 text-tiffany"><?= $authors; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-person-lines-fill"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-tiffany border-3">
								<a href="<?= base_url('Admin/ManageTraining') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Training</p>
												<h4 class="mb-0 text-tiffany"><?= $training; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-person-badge"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-tiffany border-3">
								<a href="<?= base_url('Admin/ManageCourse') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Course</p>
												<h4 class="mb-0 text-tiffany"><?= $course; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-person-circle"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						
						<div class="col">
							<div class="card radius-10 border-0 border-start border-tiffany border-3">
								<a href="<?= base_url('Admin/ManageSemester') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Semester</p>
												<h4 class="mb-0 text-tiffany"><?= $semester; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-patch-check"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						
						<div class="col">
							<div class="card radius-10 border-0 border-start border-tiffany border-3">
								<a href="<?= base_url('Admin/PaperCategory') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Category</p>
												<h4 class="mb-0 text-tiffany"><?= $category; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-patch-check"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-tiffany border-3">
								<a href="<?= base_url('Admin/ManageTechnology') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Technology</p>
												<h4 class="mb-0 text-tiffany"><?= $technology; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-patch-check"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-tiffany border-3">
								<a href="<?= base_url('Admin/TechnologyPdf') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Technology Pdf</p>
												<h4 class="mb-0 text-tiffany"><?= $technology_pdf; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-patch-check"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-tiffany border-3">
								<a href="<?= base_url('Admin/ManageVideos') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Manage Videos</p>
												<h4 class="mb-0 text-tiffany"><?= $manage_videos; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-patch-check"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-tiffany border-3">
								<a href="<?= base_url('Admin/TrendingVideos') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Trending Videos</p>
												<h4 class="mb-0 text-tiffany"><?= $trending_videos; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-patch-check"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-tiffany border-3">
								<a href="<?= base_url('Admin/ManageTechnologyCategory') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Technology Category</p>
												<h4 class="mb-0 text-tiffany"><?= $technology_category; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-patch-check"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-tiffany border-3">
								<a href="<?= base_url('Admin/ManageTechnologyVideo') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Technology Video</p>
												<h4 class="mb-0 text-tiffany"><?= $technology_videos; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-patch-check"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-tiffany border-3">
								<a href="<?= base_url('Admin/ManageBatchCategory') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Batch Category</p>
												<h4 class="mb-0 text-tiffany"><?= $batch_category; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-patch-check"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-tiffany border-3">
								<a href="<?= base_url('Admin/ManageTechnologyVideo') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Batch Video</p>
												<h4 class="mb-0 text-tiffany"><?= $technology_videos; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-patch-check"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="col">
							<div class="card radius-10 border-0 border-start border-tiffany border-3">
								<a href="<?= base_url('Admin/JobCategory') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Job Category</p>
												<h4 class="mb-0 text-tiffany"><?= $job_category; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-patch-check"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						
						<div class="col">
							<div class="card radius-10 border-0 border-start border-tiffany border-3">
								<a href="<?= base_url('Admin/JobDetails') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Job Details</p>
												<h4 class="mb-0 text-tiffany"><?= $job_details; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-patch-check"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						
						<div class="col">
							<div class="card radius-10 border-0 border-start border-tiffany border-3">
								<a href="<?= base_url('Admin/ManageNotification') ?>">
									<div class="card-body">
										<div class="d-flex align-items-center">
											<div class="">
												<p class="mb-1">Manage Notification</p>
												<h4 class="mb-0 text-tiffany"><?= $manage_notification; ?></h4>
											</div>
											<div class="ms-auto widget-icon bg-tiffany text-white">
												<i class="bi bi-patch-check"></i>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						
						
						
						
						
						
						
					</div>
					<!-- 2nd Row End Here -->
					
				<?php }  ?>
				
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
	
	<?php include('include/jslinks.php') ?>
	
	
</body>

</html>