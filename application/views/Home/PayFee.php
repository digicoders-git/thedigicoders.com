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
						<div class="col-lg-9 col-md-12">
							<!-- Student Panel Announcement -->
							<div class="premium-announcement-card">
								<div class="text-center">
									<div class="icon-box-modern mb-4">
										<i class="fa-solid fa-user-graduate"></i>
									</div>
									<h2 class="mb-3" style="color: var(--blue); font-weight: 800; letter-spacing: -1px;">Advanced Student Management Panel</h2>
									<p class="mb-4" style="font-size: 1.1rem; color: #475569; line-height: 1.8; max-width: 600px; margin: 0 auto;">
										We have launched a new <strong>Student Management Panel</strong> just for you. You can now log in to your dashboard to make payments, view your profile, training details, fee receipts, and performance reports—all in one place.
									</p>
									<div class="announcement-features mb-4">
										<div class="row justify-content-center">
											<div class="col-md-4 col-6 mb-3">
												<div class="feature-item">
													<i class="fa-solid fa-credit-card"></i>
													<span>Online Payment</span>
												</div>
											</div>
											<div class="col-md-4 col-6 mb-3">
												<div class="feature-item">
													<i class="fa-solid fa-file-invoice-dollar"></i>
													<span>Fee History</span>
												</div>
											</div>
											<div class="col-md-4 col-6 mb-3">
												<div class="feature-item">
													<i class="fa-solid fa-certificate"></i>
													<span>Training Status</span>
												</div>
											</div>
											<div class="col-md-4 col-6 mb-3">
												<div class="feature-item">
													<i class="fa-solid fa-id-card"></i>
													<span>Student ID Card</span>
												</div>
											</div>
											<div class="col-md-4 col-6 mb-3">
												<div class="feature-item">
													<i class="fa-solid fa-book-open"></i>
													<span>Course Details</span>
												</div>
											</div>
											<div class="col-md-4 col-6 mb-3">
												<div class="feature-item">
													<i class="fa-solid fa-user-gear"></i>
													<span>View Profile</span>
												</div>
											</div>
										</div>
									</div>
									<a href="https://student.thedigicoders.com/" target="_blank" class="btn-login-modern">
										Login to Student Panel <i class="fa-solid fa-right-to-bracket ml-2"></i>
									</a>
								</div>
							</div>

							<style>
								.premium-announcement-card {
									background: #fff;
									border: 1px solid #e2e8f0;
									box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
									padding: 35px 25px;
									border-radius: 0;
									margin-bottom: 40px;
									position: relative;
								}
								.icon-box-modern {
									width: 60px;
									height: 60px;
									background: rgba(0, 109, 171, 0.05);
									color: var(--blue);
									border-radius: 50%;
									display: flex;
									align-items: center;
									justify-content: center;
									font-size: 28px;
									margin: 0 auto;
									border: 1px dashed var(--blue);
								}
								.feature-item {
									padding: 8px;
									background: #f8fafc;
									border-radius: 4px;
									border: 1px solid #f1f5f9;
									transition: all 0.3s ease;
								}
								.feature-item i {
									display: block;
									font-size: 20px;
									color: var(--orange);
									margin-bottom: 5px;
								}
								.feature-item span {
									font-weight: 700;
									font-size: 13px;
									color: #334155;
									text-transform: uppercase;
								}
								.btn-login-modern {
									display: inline-block;
									padding: 12px 35px;
									background: linear-gradient(135deg, var(--blue) 0%, #005a8e 100%);
									color: #fff !important;
									border-radius: 4px;
									font-weight: 700;
									font-size: 15px;
									text-decoration: none !important;
									box-shadow: 0 5px 15px rgba(0, 109, 171, 0.2);
									transition: all 0.3s ease;
								}
								.btn-login-modern:hover {
									color: #fff !important;
									background: linear-gradient(135deg, var(--orange) 0%, #d4501b 100%);
								}
							</style>
						</div>

						<!-- Sidebar: Institutional Parity -->
						<div class="col-lg-3 col-md-12">
							<div class="sticky-sidebar">
								<?php
								$placements = $this->db->query("select * from placement where banner='banner' and status='true' order by id desc limit 12")->result();
								if (!empty($placements)) {
									?>
									<div class="sidebar-card">
										<div class="sidebar-title-bx text-center">
											<h5 class="mb-0" style="color: var(--blue); font-weight: 800; font-size: 16px; letter-spacing: 1px;">LATEST PLACEMENT</h5>
										</div>
										<div class="sidebar-swiper-container">
											<div class="swiper side-placement-swiper">
												<div class="swiper-wrapper">
													<?php foreach ($placements as $p) { ?>
														<div class="swiper-slide">
															<img loading="lazy" src="<?= base_url('public/uploads/placement/') . $p->photo ?>"
																alt="<?= htmlspecialchars($p->alt_text ?: 'Success Story', ENT_QUOTES, 'UTF-8') ?>"
																title="<?= htmlspecialchars($p->title ?: 'Success Story', ENT_QUOTES, 'UTF-8') ?>"
																style="height: 250px; width: 100%; object-fit: contain;">
														</div>
													<?php } ?>
												</div>
											</div>
										</div>

										<div class="p-3 pt-2">
											<?php $contacts = $this->db->get_where('tbl_contact_numbers', ['status' => 'true'])->result(); ?>
											<div class="contact-info text-center">
												<h5 class="mb-2" style="color: var(--blue); font-weight: 800; font-size: 14px; border-bottom: 2px solid var(--orange); display: inline-block; padding-bottom: 2px;">Connect With Us</h5>
												<div class="row no-gutters">
													<?php foreach ($contacts as $c) { ?>
														<div class="col-12 mb-1">
															<div class="d-flex align-items-center justify-content-center">
																<i class="<?= ($c->type == 'Landline') ? 'ti-headphone-alt' : 'ti-mobile' ?> mr-2" style="color: var(--orange); font-size: 13px;"></i>
																<?php 
																$num = $c->number;
																$display_num = (strlen($num) == 10 && is_numeric($num)) ? '+91 ' . $num : $num;
																?>
																<a href="tel:<?= $num ?>" style="color: #333; font-weight: 700; font-size: 12.5px;"><?= $display_num ?></a>
															</div>
														</div>
													<?php } ?>
												</div>
											</div>

											<div class="text-center py-1">
												<a href="<?= base_url() ?>Home/Placement" style="color: var(--blue); font-weight: 800; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px;">VIEW ALL SELECTIONS <i class="fa fa-arrow-right ml-1"></i></a>
											</div>

											<div class="row no-gutters mt-2">
												<div class="col-6 pr-1">
													<a href="<?= base_url() ?>Home/Registration" class="btn-premium" style="padding: 10px 5px; font-size: 13px;">Register</a>
												</div>
												<div class="col-6 pl-1" data-toggle="modal" data-target="#exampleModal">
													<a class="btn-premium btn-enquiry" style="cursor:pointer; padding: 10px 5px; font-size: 13px; color:white !important">Enquiry</a>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>

								
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>

	
	<?php include('include/footer.php') ?>
	<?php include('include/jslinks.php') ?>
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			if (typeof Swiper !== 'undefined') {
				new Swiper(".side-placement-swiper", {
					slidesPerView: 1,
					spaceBetween: 0,
					loop: true,
					autoplay: { delay: 3000, disableOnInteraction: false },
					speed: 1000
				});
			}
		});
	</script>


	


</body>

</html>

