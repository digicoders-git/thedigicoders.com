<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Webinars - Project Training in Lucknow - TheDigiCoders</title>
		<meta name="description" content="TheDigiCoders Technologies best software training company in Lucknow working with young engineers and entrepreneurs. See our latest upcoming webinars at thedigicoders.com">
		<?php include('include/headerlinks.php')  ?>
	</head>
	
	<body>
		<?php include('include/header.php')  ?>
		
		
		<div class="page-content bg-white">
			<!-- inner page banner -->
			<div class="page-banner ovbl-dark" style="background-image:url(<?= base_url('public/assets/') ?>images/banner/15august.jpeg);">
				<div class="container">
					<div class="page-banner-entry">
						<h1 class="text-white">Webinars</h1>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="clearfix mt-4">
					<div class="heading-bx left ">
						<h2 class="m-b10 title-head">Upcoming <span> Webinars</span></h2>
					</div>
					<ul id="masonry" class="ttr-gallery-listing magnific-image row mt-5">
						<?php foreach ($upcoming as $webinar)
							{ ?>
							<li class="action-card col-lg-4 col-md-4 col-sm-12 mb-2">
								<div class="ttr-box portfolio-bx border cours-bx mr-2 ml-2">
									<div class="ttr-media">
										<a href="<?= base_url() ?>Home/Webinar/<?= $webinar->id ?>/<?= str_replace(" ", "-", $webinar->college_name . "-" . $webinar->college_code); ?>">
											<div class="video-bx mb-3">
												<img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src=" <?= base_url('public/uploads/webinar/') . $webinar->image ?>" title="Webinar" alt="Webinar">
												
												<center class=" mt-3"><span class="text-center font-weight-bold"><?= $webinar->college_name ?> -<?= $webinar->college_code ?> </span></center>
											</div>
										</a>
									</div>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
				<div class="clearfix mt-4">
					<div class="heading-bx left ">
						<h2 class="m-b10 title-head">Completed <span> Webinars</span></h2>
					</div>
					<ul id="masonry" class="ttr-gallery-listing magnific-image row mt-5">
						<?php foreach ($completed as $webinar)
							{ ?>
							<li class="action-card col-lg-4 col-md-4 col-sm-12 mb-2">
								<div class="ttr-box portfolio-bx border cours-bx mr-2 ml-2">
									<div class="ttr-media">
										<a href="<?= base_url() ?>Home/Webinar/<?= $webinar->id ?>/<?= str_replace(" ", "-", $webinar->college_name . "-" . $webinar->college_code); ?>">
											<div class="video-bx mb-3">
												<img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src=" <?= base_url('public/uploads/webinar/') . $webinar->image ?>" title="Webinar" alt="Webinar">
												
												<center class=" mt-3"><span class="text-center font-weight-bold"><?= $webinar->college_name ?> -<?= $webinar->college_code ?> </span></center>
											</div>
										</a>
									</div>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		
		<!-- @section scripts{ -->
		<script>
			$(document).ready(function() {
				$('#lightgallery').lightGallery();
			});
		</script>
		
		
		<!-- } -->
		
		
		
		<?php include('include/footer.php')  ?>
		<?php include('include/jslinks.php')  ?>
	</body>
	
</html>