<!DOCTYPE html>
<html lang="en">

<head>
	<title>Interview Related Question - Industrial Training Program for Engineering Students</title>
	<meta name="description"
		content="Browse our photos and know about our services and software development training programs in Lucknow. Contact us for apprenticeship registration and more!">

	<meta property="og:title" content="Photos - Industrial Training Program for Engineering Students" />
	<meta property="og:description"
		content="Browse our photos and know about our services and software development training programs in Lucknow. Contact us for apprenticeship registration and more!" />
	<meta property="og:url" content="<?= base_url($this->uri->uri_string()) ?>" />
	<link rel="canonical" href="<?= base_url($this->uri->uri_string()) ?>" />

	<?php include('include/headerlinks.php') ?>
</head>

<body>
	<?php include('include/header.php') ?>
	<style>
		:root {
			--orange: #E76028;
			--blue: #006DAB;
		}

		.page-banner {
			background: linear-gradient(135deg, rgba(0, 109, 171, 0.9) 0%, rgba(231, 96, 40, 0.8) 100%),
				url(<?= base_url('public/assets/') ?>images/banner/dct_banner.jpg);
			background-size: cover;
			background-position: center;
			padding: 100px 0;
		}

		.page-banner h1 {
			font-size: 2.8rem;
			font-weight: 700;
		}

		.interview-card {
			background: #fff;
			border: 1px solid #eee;
			transition: all 0.3s ease;
			box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
			height: 100%;
			display: flex;
			flex-direction: column;
		}


		.interview-card img {
			width: 100%;
			height: 240px;
			object-fit: cover;
		}

		.interview-info {
			padding: 25px 20px;
			text-align: center;
		}

		.btn-group-premium {
			display: grid;
			grid-template-columns: 1fr 1fr;
			gap: 10px;
		}

		.btn-premium {
			padding: 10px 15px;
			font-size: 13px;
			font-weight: 600;
			text-transform: uppercase;
			border-radius: 0;
			transition: all 0.3s ease;
			text-decoration: none !important;
		}

		.btn-download {
			background: #fff;
			color: var(--orange) !important;
			border: 1px solid var(--orange);
		}

		.btn-download:hover {
			background: var(--orange);
			color: #fff !important;
		}

		.btn-view {
			background: #fff;
			color: var(--blue) !important;
			border: 1px solid var(--blue);
		}

		.btn-view:hover {
			background: var(--blue);
			color: #fff !important;
		}
	</style>

	<div class="page-content bg-white">
		<div class="page-banner">
			<div class="container">
				<div class="page-banner-entry text-center">
					<h1 class="text-white">Interview Success Kits</h1>
					<p class="text-white mt-3 lead" style="opacity: 0.9; font-weight: 500;">Master Your Career: Curated Questions from Industry Experts</p>
				</div>
			</div>
		</div>

		<div class="content-block mt-5 pb-5">
			<div class="section-area">
				<div class="container">
					<div class="row">
						<!-- Introduce Yourself -->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
							<div class="interview-card">
								<img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
									data-src="<?= base_url('public') ?>/assets/images/interview/pro.jpeg" alt="Introduce Yourself" />
								<div class="interview-info">
									<h5 class="mb-4">Introduce Yourself</h5>
									<div class="btn-group-premium">
										<a class="btn-premium btn-download" download href="<?= base_url('public') ?>/assets/images/interview/propdf.pdf">Download</a>
										<a class="btn-premium btn-view" target="_blank" href="<?= base_url('public') ?>/assets/images/interview/propdf.pdf">View</a>
									</div>
								</div>
							</div>
						</div>

						<!-- JavaScript -->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
							<div class="interview-card">
								<img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
									data-src="<?= base_url('public') ?>/assets/images/interview/js.jpeg" alt="JavaScript" />
								<div class="interview-info">
									<h5 class="mb-4">JavaScript Questions</h5>
									<div class="btn-group-premium">
										<a class="btn-premium btn-download" download href="<?= base_url('public') ?>/assets/images/interview/jspdf.pdf">Download</a>
										<a class="btn-premium btn-view" target="_blank" href="<?= base_url('public') ?>/assets/images/interview/jspdf.pdf">View</a>
									</div>
								</div>
							</div>
						</div>

						<!-- PHP -->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
							<div class="interview-card">
								<img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
									data-src="<?= base_url('public') ?>/assets/images/interview/php.jpeg" alt="PHP" />
								<div class="interview-info">
									<h5 class="mb-4">PHP Questions</h5>
									<div class="btn-group-premium">
										<a class="btn-premium btn-download" download href="<?= base_url('public') ?>/assets/images/interview/phppdf.pdf">Download</a>
										<a class="btn-premium btn-view" target="_blank" href="<?= base_url('public') ?>/assets/images/interview/phppdf.pdf">View</a>
									</div>
								</div>
							</div>
						</div>

						<!-- Laravel -->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
							<div class="interview-card">
								<img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
									data-src="<?= base_url('public') ?>/assets/images/interview/lara.jpeg" alt="Laravel" />
								<div class="interview-info">
									<h5 class="mb-4">Laravel Questions</h5>
									<div class="btn-group-premium">
										<a class="btn-premium btn-download" download href="<?= base_url('public') ?>/assets/images/interview/larapdf.pdf">Download</a>
										<a class="btn-premium btn-view" target="_blank" href="<?= base_url('public') ?>/assets/images/interview/larapdf.pdf">View</a>
									</div>
								</div>
							</div>
						</div>

						<!-- Python -->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
							<div class="interview-card">
								<img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
									data-src="<?= base_url('public') ?>/assets/images/interview/py.jpeg" alt="Python" />
								<div class="interview-info">
									<h5 class="mb-4">Python Questions</h5>
									<div class="btn-group-premium">
										<a class="btn-premium btn-download" download href="<?= base_url('public') ?>/assets/images/interview/pypdf.pdf">Download</a>
										<a class="btn-premium btn-view" target="_blank" href="<?= base_url('public') ?>/assets/images/interview/pypdf.pdf">View</a>
									</div>
								</div>
							</div>
						</div>

						<!-- HTML & CSS -->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
							<div class="interview-card">
								<img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
									data-src="<?= base_url('public') ?>/assets/images/interview/html.jpeg" alt="HTML & CSS" />
								<div class="interview-info">
									<h5 class="mb-4">HTML & CSS Questions</h5>
									<div class="btn-group-premium">
										<a class="btn-premium btn-download" download href="<?= base_url('public') ?>/assets/images/interview/htmlpdf.pdf">Download</a>
										<a class="btn-premium btn-view" target="_blank" href="<?= base_url('public') ?>/assets/images/interview/htmlpdf.pdf">View</a>
									</div>
								</div>
							</div>
						</div>

						<!-- SQL -->
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
							<div class="interview-card">
								<img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
									data-src="<?= base_url('public') ?>/assets/images/interview/sql.jpeg" alt="SQL" />
								<div class="interview-info">
									<h5 class="mb-4">SQL & MySQL Questions</h5>
									<div class="btn-group-premium">
										<a class="btn-premium btn-download" download href="<?= base_url('public') ?>/assets/images/interview/sqlpdf.pdf">Download</a>
										<a class="btn-premium btn-view" target="_blank" href="<?= base_url('public') ?>/assets/images/interview/sqlpdf.pdf">View</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Content END-->





	<?php include('include/footer.php') ?>
	<?php include('include/jslinks.php') ?>
</body>

</html>

