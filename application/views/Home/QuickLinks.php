<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quick Links | Best IT Training - DigiCoders Technologies Pvt. Ltd.</title>
	<meta name="description"
		content="Access quick links to training brochures, placement records, and registration forms at DigiCoders Technologies Pvt. Ltd. Lucknow.">
	<?php include('include/headerlinks.php') ?>
	<style>
		:root {
			--orange: #E76028;
			--blue: #006DAB;
			--green: #00964C;
			--orange-light: #fff0ea;
			--blue-light: #eef7ff;
			--green-light: #e6ffef;
			--white: #ffffff;
			--gray-100: #f8f9fa;
			--gray-200: #e9ecef;
			--gray-300: #dee2e6;
			--gray-800: #343a40;
			--shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
			--shadow-md: 0 4px 12px rgba(0, 0, 0, 0.08);
			--shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1);
			--transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
		}

		body {
			font-family: 'Inter', 'Roboto', sans-serif !important;
			color: var(--gray-800);
			background-color: #fafbfc;
		}

		.page-content {
			background-image:
				radial-gradient(at 0% 0%, rgba(0, 109, 171, 0.02) 0px, transparent 50%),
				radial-gradient(at 100% 100%, rgba(231, 96, 40, 0.02) 0px, transparent 50%);
			padding-bottom: 80px;
		}

		/* Hub Section */
		.hub-container {
			max-width: 900px;
			margin: -60px auto 60px;
			position: relative;
			z-index: 5;
			padding: 0 15px;
		}

		.hub-card {
			background: #fff;
			border-radius: 0;
			padding: 30px;
			box-shadow: var(--shadow-lg);
			border-top: 4px solid var(--blue);
		}

		.hub-title {
			font-size: 2rem;
			font-weight: 800;
			color: #1e293b;
			margin-bottom: 10px;
			letter-spacing: -1px;
		}

		.hub-subtitle {
			color: #64748b;
			font-size: 1rem;
			margin-bottom: 30px;
			font-weight: 500;
		}

		/* Action Links */
		.portal-grid {
			display: grid;
			grid-template-columns: repeat(2, 1fr);
			gap: 20px;
			margin-bottom: 40px;
		}

		.portal-link-card {
			display: flex;
			align-items: center;
			padding: 18px 25px;
			background: #fff;
			border: 1.5px solid #f1f5f9;
			text-decoration: none !important;
			transition: var(--transition);
		}

		.portal-link-card:hover {
			border-color: var(--blue);
			background: var(--blue-light);
			transform: translateY(-3px);
			box-shadow: var(--shadow-md);
		}

		.portal-icon-box {
			width: 50px;
			height: 50px;
			background: var(--blue-light);
			color: var(--blue);
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 1.5rem;
			margin-right: 15px;
			transition: var(--transition);
		}

		.portal-link-card:hover .portal-icon-box {
			background: var(--blue);
			color: #fff;
		}

		.portal-link-text h5 {
			margin: 0;
			font-size: 15px;
			font-weight: 800;
			color: #1e293b;
			letter-spacing: -0.2px;
		}

		.portal-link-text p {
			margin: 2px 0 0;
			font-size: 11px;
			color: #64748b;
			font-weight: 500;
		}

		/* Quick Access Icons */
		.quick-access-bar {
			display: flex;
			justify-content: center;
			gap: 40px;
			padding: 25px 0 10px;
			border-top: 1px dashed var(--gray-300);
			margin-top: 15px;
		}

		.quick-item {
			text-align: center;
			text-decoration: none !important;
			transition: var(--transition);
		}

		.quick-item img {
			width: 60px;
			height: 60px;
			margin-bottom: 10px;
			transition: var(--transition);
			filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
		}

		.quick-item:hover img {
			transform: scale(1.15) rotate(5deg);
		}

		.quick-item span {
			display: block;
			font-size: 12px;
			font-weight: 700;
			color: #1e293b;
			text-transform: uppercase;
			letter-spacing: 1px;
		}

		/* Expert Cards Styling - Tight & Solid */
		.expert-card {
			background: #fff;
			border: 1.5px solid #f1f5f9;
			transition: var(--transition);
			display: flex;
			align-items: center;
			padding: 35px 40px;
			max-width: 100%;
			margin-bottom: 25px;
		}

		.expert-card:hover {
		}

		.expert-card img {
			width: 150px;
			height: 150px;
			object-fit: cover;
			object-position: top;
			flex-shrink: 0;
			margin-right: 35px;
			border: 1px solid #f1f5f9;
			border-radius: 8px;
		}

		.expert-info {
			text-align: left;
			flex-grow: 1;
		}

		.expert-role {
			display: inline-block;
			padding: 2px 10px;
			background: var(--blue-light);
			color: var(--blue);
			font-size: 9px;
			font-weight: 800;
			text-transform: uppercase;
			letter-spacing: 1px;
			margin-bottom: 6px;
		}

		.expert-name {
			font-size: 1.2rem;
			font-weight: 800;
			margin-bottom: 5px;
			color: #1e293b;
			letter-spacing: -0.3px;
		}

		.expert-desc {
			font-size: 13px;
			color: #64748b;
			line-height: 1.6;
			margin: 0;
			font-weight: 500;
		}

		.page-banner {
			height: 300px;
			background: linear-gradient(135deg, rgba(0, 109, 171, 0.95) 0%, rgba(231, 96, 40, 0.9) 100%),
				url('<?= base_url("public/assets/images/banner/banner4.jpg") ?>');
			background-size: cover;
			background-position: center;
			display: flex;
			align-items: center;
			justify-content: center;
			text-align: center;
			padding-bottom: 60px;
		}

		.section-heading-premium {
			text-align: center;
			margin-bottom: 35px;
		}

		.section-heading-premium h2 {
			font-size: 1.8rem;
			font-weight: 800;
			color: #1e293b;
			position: relative;
			display: inline-block;
			padding-bottom: 12px;
			letter-spacing: -0.5px;
		}

		.section-heading-premium h2::after {
			content: '';
			position: absolute;
			bottom: 0;
			left: 50%;
			transform: translateX(-50%);
			width: 60px;
			height: 3px;
			background: var(--orange);
		}

		@media (max-width: 768px) {
			.portal-grid {
				grid-template-columns: 1fr;
			}

			.page-banner h1 {
				font-size: 1.5rem !important;
			}

			.hub-card {
				padding: 20px;
			}

			.portal-link-card {
				padding: 15px;
			}

			.quick-access-bar {
				gap: 15px;
			}

			.quick-item img {
				width: 45px;
				height: 45px;
			}
		}

		/* Social Grid */
		.social-connect-grid {
			display: grid;
			grid-template-columns: repeat(6, 1fr);
			gap: 15px;
			margin-top: 30px;
			padding-top: 25px;
			border-top: 1px dashed var(--gray-300);
		}

		.social-connect-item {
			display: flex;
			flex-direction: column;
			align-items: center;
			text-decoration: none !important;
			transition: var(--transition);
		}

		.social-icon-circle {
			width: 50px;
			height: 50px;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 1.4rem;
			color: #fff;
			margin-bottom: 8px;
			transition: var(--transition);
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
		}

		.social-connect-item:hover .social-icon-circle {
			transform: translateY(-5px) scale(1.1);
			box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
		}

		.social-label {
			font-size: 10px;
			font-weight: 700;
			color: #64748b;
			text-transform: uppercase;
			letter-spacing: 0.5px;
		}

		/* Brand Colors */
		.bg-fb { background: #1877F2; }
		.bg-in { background: #E4405F; }
		.bg-li { background: #0A66C2; }
		.bg-yt { background: #FF0000; }
		.bg-tw { background: #000000; }
		.bg-wa { background: #25D366; }
		.bg-reg { background: #00964C; }

		@media (max-width: 576px) {
			.social-connect-grid {
				grid-template-columns: repeat(3, 1fr);
				gap: 20px;
			}
		}
	</style>
</head>

<body>
	<?php include('include/header.php') ?>

	<div class="page-content">
		<!-- Banner -->
		<div class="page-banner">
			<div class="container" style="padding-top:100px !important;">
				<h1 class="text-white mb-2" style="font-weight: 800; text-transform: uppercase; letter-spacing: -1px; font-size: 2.2rem;">
					Quick Access Digital Hub
				</h1>
				<p class="text-white opacity-8" style="font-size: 1.2rem;">
					Your gateway to DigiCoders resources, connections, and leadership.
				</p>
			</div>
		</div>

		<!-- Hub Card -->
		<div class="hub-container">
			<div class="hub-card">
				<div class="text-center">
					<h2 class="hub-title">Quick Resources</h2>
					<p class="hub-subtitle">Download brochures or connect with us instantly.</p>
				</div>

				<div class="portal-grid">
					<a href="<?= base_url('public') ?>/assets/images/DigiCoders_2026_Training_Brochure.pdf"
						class="portal-link-card" target="_blank" download onclick="OpenSocialModal()">
						<div class="portal-icon-box">
							<i class="fa fa-file-pdf-o"></i>
						</div>
						<div class="portal-link-text">
							<h5>Training Brochure</h5>
							<p>Download 2026 Curriculum</p>
						</div>
					</a>

					<a href="<?= base_url('public') ?>/assets/images/DigiCoders_2026_Placement_Brochure.pdf"
						class="portal-link-card" target="_blank" download onclick="OpenSocialModal()">
						<div class="portal-icon-box">
							<i class="fa fa-trophy"></i>
						</div>
						<div class="portal-link-text">
							<h5>Placement Brochure</h5>
							<p>View our success stories</p>
						</div>
					</a>

					<a href="<?= base_url() ?>Home/Placement" class="portal-link-card">
						<div class="portal-icon-box">
							<i class="fa fa-users"></i>
						</div>
						<div class="portal-link-text">
							<h5>Success Stories</h5>
							<p>Browse recent placements</p>
						</div>
					</a>

					<a href="<?= base_url() ?>Home/VerifyCertificate" class="portal-link-card">
						<div class="portal-icon-box">
							<i class="fa fa-certificate"></i>
						</div>
						<div class="portal-link-text">
							<h5>Verify Certificate</h5>
							<p>Check your credentials</p>
						</div>
					</a>
				</div>



				<!-- Social Connect Section -->
				<div class="social-connect-grid">
					<a href="https://www.facebook.com/DigiCodersTech/" class="social-connect-item" target="_blank">
						<div class="social-icon-circle bg-fb"><i class="fa-brands fa-facebook-f"></i></div>
						<span class="social-label">Facebook</span>
					</a>
					<a href="https://www.instagram.com/digicoderstech" class="social-connect-item" target="_blank">
						<div class="social-icon-circle bg-in"><i class="fa-brands fa-instagram"></i></div>
						<span class="social-label">Instagram</span>
					</a>
					<a href="https://www.linkedin.com/company/digicoders" class="social-connect-item" target="_blank">
						<div class="social-icon-circle bg-li"><i class="fa-brands fa-linkedin-in"></i></div>
						<span class="social-label">LinkedIn</span>
					</a>
					<a href="https://www.youtube.com/@digicoders" class="social-connect-item" target="_blank">
						<div class="social-icon-circle bg-yt"><i class="fa-brands fa-youtube"></i></div>
						<span class="social-label">YouTube</span>
					</a>
					<a href="<?= base_url() ?>Home/Registration" class="social-connect-item">
						<div class="social-icon-circle bg-reg"><i class="fa-solid fa-user-plus"></i></div>
						<span class="social-label">Register</span>
					</a>
					<a href="https://api.whatsapp.com/send?phone=919198483820" class="social-connect-item" target="_blank">
						<div class="social-icon-circle bg-wa"><i class="fa-brands fa-whatsapp"></i></div>
						<span class="social-label">WhatsApp</span>
					</a>
				</div>
			</div>
		</div>

		<!-- Founders Section -->
		<div class="container">
			<div class="section-heading-premium">
				<h2>Our Visionary Leadership</h2>
			</div>

			<div class="row">
				<div class="col-lg-6 mb-4">
					<div class="expert-card">
						<img src="<?= base_url('public') ?>/assets/images/himanshu1.png"
							alt="Er. Himanshu Kashyap">
						<div class="expert-info">
							<div class="expert-role">Co-Founder | Development Head</div>
							<h3 class="expert-name">Er. Himanshu Kashyap</h3>
							<p class="expert-desc">
								Leading the development wing with 10+ years of experience. Having developed 700+ projects
								and mentored 21,000+ students, his expertise drives our innovation engine.
							</p>
						</div>
					</div>
				</div>

				<div class="col-lg-6 mb-4">
					<div class="expert-card">
						<img src="<?= base_url('public') ?>/assets/images/gopal1.png"
							alt="Er. Gopal Singh">
						<div class="expert-info">
							<div class="expert-role">Co-Founder | Training Head</div>
							<h3 class="expert-name">Er. Gopal Singh</h3>
							<p class="expert-desc">
								Leading the training wing with 10+ years of experience. With 500+ projects and 21,000+
								trainees, his pedagogical approach sets the benchmark for IT education in UP.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include('include/footer.php') ?>
	<?php include('include/jslinks.php') ?>

	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
</body>

</html>