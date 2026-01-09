<!DOCTYPE html>
<html lang="en">

<head>
    <title>Appreciation for Best Software And App Development Training Program</title>
	<meta name="description" content="See our appreciation latter for web and mobile app development courses at thedigicoders.com">
	
	<meta property="og:title" content="Appreciation for Best Software And App Development Training Program" />
<meta property="og:description" content="See our appreciation latter for web and mobile app development courses at thedigicoders.com" />
<meta property="og:url" content="https://thedigicoders.com/Home/Appreciation" />
<link rel="canonical" href="https://thedigicoders.com/Home/Appreciation" />

<?php include('include/headerlinks.php') ?>
</head>

<body>
    <?php include('include/header.php') ?>


    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(<?= base_url('public') ?>/assets/images/banner/15august.jpeg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Appreciation Letters</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <div class="content-block">
            <!-- About Us -->
            <div class="section-area section-sp1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 m-b30 mt-4">
                            <div class="profile-content-bx">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="courses">
                                        <h2 class="text-center card-header" style="background-color:#b9bbbe9c">Appreciation</h2>

                                        <div class="courses-filter">
                                            <div class="clearfix">
                                                <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                    <?php
													
                                                    foreach ($userdata as $data)
                                                    {
                                                      
                                                    ?>
                                                            <li class="action-card col-lg-4  col-md-6 col-sm-12" style="height:450px !important;">
                                                                <div style="height:100%;" class="ttr-box portfolio-bx border cours-bx">
                                                                    <div class="ttr-media media-ov2 media-effect">
                                                                        <a href="javascript:void(0);" >
                                                                            <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public/uploads/appreciation/') . $data->image; ?>" alt="Appreciation" style="height:350px;" />
                                                                        </a>
                                                                        <div class="ov-box">
                                                                            <div class="overlay-icon align-m">
                                                                                <a href="<?= base_url('public/uploads/appreciation/') . $data->image; ?>" class="magnific-anchor" title="Appreciation">
                                                                                    <i class="ti-search"></i>
                                                                                </a>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <div class="info-bx text-center">
                                                                        <h5><?= $data->role; ?></h5>
                                                                        <span><?= $data->title; ?></span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                    <?php
														}
                                                  
													?>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>
</body>

</html>