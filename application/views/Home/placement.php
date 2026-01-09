<!DOCTYPE html>
<html lang="en">

<head>
    <title>Photos - Industrial Training Program for Engineering Students</title>
	<meta name="description" content="Browse our photos and know about our services and software development training programs in Lucknow. Contact us for apprenticeship registration and more!">
    
	<meta property="og:title" content="Photos - Industrial Training Program for Engineering Students" />
<meta property="og:description" content="Browse our photos and know about our services and software development training programs in Lucknow. Contact us for apprenticeship registration and more!" />
<meta property="og:url" content="https://thedigicoders.com/Home/Photos" />
<link rel="canonical" href="https://thedigicoders.com/Home/Photos" />

	<?php include('include/headerlinks.php')  ?>
</head>

<body>
    <?php include('include/header.php')  ?>

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(<?= base_url('public') ?>/assets/images/banner/15august.jpeg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Placement By DigiCoders</h1>
                </div>
            </div>
        </div>
		 
			<div class="section-area section-sp2" style="padding-bottom: 0px;">
			<h3 style="padding:3px">Recent Placement</h3>
				<div class="container-fluid">
					<div class="testimonial-carousel owl-carousel owl-btn-1 col-12 ">
						<?php foreach ($banner as $bannerdata)
							{
							?>
							<div class="item">
								
								<div class="testimonial-bx p-0" style="margin-left: 0px;" >
									<img class="lazy" src="<?= base_url('public/assets/images/loader2.jpg') ?>" data-src="<?= base_url('public/uploads/placement/') . $bannerdata->photo ?>" alt="">
								</div>
								
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		   <h3 style="padding-top:40px">Top Placement</h3>
        <!-- contact area -->
        <div class="content-block">
            <!-- Portfolio  -->
            <div class="section-area section-sp1 gallery-bx">
                <div class="container">
                    <div class="clearfix">
					 
                        <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                            <?php foreach ($placeement as $placementdata)
                            { ?>
                                <li class="action-card col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <div class="ttr-box portfolio-bx" style="padding:10px">
                                        <div class="ttr-media media-ov2 media-effect">
                                            <a href="javascript:void(0);">
                                                <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public/uploads/placement/') . $placementdata->photo; ?>" alt="photos"  />
                                            </a>
                                            <div class="ov-box">
                                                <div class="overlay-icon align-m">
                                                    <a href="<?= base_url('public/uploads/placement/') . $placementdata->photo; ?>" class="magnific-anchor" title="Photos">
                                                        <i class="ti-search"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            <?php  } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact area END -->
    </div>
    <!-- Content END-->





    <?php include('include/footer.php')  ?>
    <?php include('include/jslinks.php')  ?>
</body>

</html>