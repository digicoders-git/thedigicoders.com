<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mou with Colleges - Industrial Training Program - TheDigiCoders</title>
	<meta name="description" content="Conversations provide moderators with valuable insight into how learners are receiving and understanding content. Contact us for software development training program.">
    
<meta property="og:title" content="Mou with Colleges - Industrial Training Program - TheDigiCoders" />
<meta property="og:description" content="Conversations provide moderators with valuable insight into how learners are receiving and understanding content. Contact us for software development training program." />
<meta property="og:url" content="https://thedigicoders.com/Home/MOU" />
<link rel="canonical" href="https://thedigicoders.com/Home/MOU" />

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
                    <h1 class="text-white">MOU With Colleges</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <div class="content-block">
            <!-- About Us -->
            <div class="section-area section-sp1">
                <div class="container">
                    <div class="row">
					
					<div class="col-lg-12 col-md-12 col-sm-12 m-b30">
                            <div class="profile-content-bx">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="courses">
                                        <!-- <h2 class="text-center card-header" style="background-color:#b9bbbe9c">2024</h2> -->

                                        <div class="courses-filter">
                                            <div class="clearfix">
                                                <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                    <?php
                                                    foreach ($userdata as $data)
                                                    {
                                                        
                                                    ?>
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                <div class="ttr-box portfolio-bx border cours-bx">
                                                                    <div class="ttr-media media-ov2 media-effect">
                                                                        <a href="javascript:void(0);">
                                                                            <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public/uploads/mou/') . $data->image; ?>" alt="MOU" style="height:340px;">
                                                                        </a>
                                                                        <div class="ov-box">
                                                                            <div class="overlay-icon align-m">
                                                                                <a href="<?= base_url('public/uploads/mou/') . $data->image; ?>" class="magnific-anchor" title="MOU">
                                                                                    <i class="ti-search"></i>
                                                                                </a>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <input type="hidden" value="@item.Date1" />
                                                                    <div class="info-bx text-center" style="height:120px">
																	<h5><?= $data->role; ?></h5>
                                                                    <p><?= $data->title; ?></p>                                                                   
                                                                    </div>
                                                                </div>
                                                            </li>
                                                    <?php }
                                                     ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					
					
<!-- 					
					  <div class="col-lg-12 col-md-12 col-sm-12 m-b30 mt-4">
                            <div class="profile-content-bx">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="courses">
                                        <h2 class="text-center card-header" style="background-color:#b9bbbe9c">2023</h2>

                                        <div class="courses-filter">
                                            <div class="clearfix">
                                                <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                    <?php
                                                    foreach ($userdata as $data)
                                                    {
                                                        if ($data->season == '2023')
                                                        {
                                                    ?>
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                <div class="ttr-box portfolio-bx border cours-bx">
                                                                    <div class="ttr-media media-ov2 media-effect">
                                                                        <a href="javascript:void(0);">
                                                                            <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public/uploads/mou/') . $data->image; ?>" alt="MOU" style="height:340px;">
                                                                        </a>
                                                                        <div class="ov-box">
                                                                            <div class="overlay-icon align-m">
                                                                                <a href="<?= base_url('public/uploads/mou/') . $data->image; ?>" class="magnific-anchor" title="MOU">
                                                                                    <i class="ti-search"></i>
                                                                                </a>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <input type="hidden" value="@item.Date1" />
                                                                    <div class="info-bx text-center" style="height:120px">
                                                                        <h5><?= $data->role; ?></h5>
																		<p><?= $data->title; ?></p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                    <?php }
                                                    } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						
						<div class="col-lg-12 col-md-12 col-sm-12 m-b30">
                            <div class="profile-content-bx">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="courses">
                                        <h2 class="text-center card-header" style="background-color:#b9bbbe9c">2022</h2>

                                        <div class="courses-filter">
                                            <div class="clearfix">
                                                <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                    <?php
                                                    foreach ($userdata as $data)
                                                    {
                                                        if ($data->season == '2022')
                                                        {
                                                    ?>
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                <div class="ttr-box portfolio-bx border cours-bx">
                                                                    <div class="ttr-media media-ov2 media-effect">
                                                                        <a href="javascript:void(0);">
                                                                            <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public/uploads/mou/') . $data->image; ?>" alt="MOU" style="height:340px;">
                                                                        </a>
                                                                        <div class="ov-box">
                                                                            <div class="overlay-icon align-m">
                                                                                <a href="<?= base_url('public/uploads/mou/') . $data->image; ?>" class="magnific-anchor" title="MOU">
                                                                                    <i class="ti-search"></i>
                                                                                </a>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <input type="hidden" value="@item.Date1" />
                                                                    <div class="info-bx text-center">
																	<h5><?= $data->role; ?></h5>
                                                                    <p><?= $data->title; ?></p>                                                                   
                                                                    </div>
                                                                </div>
                                                            </li>
                                                    <?php }
                                                    } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<div class="col-lg-12 col-md-12 col-sm-12 m-b30">
                            <div class="profile-content-bx">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="courses">
                                        <h2 class="text-center card-header" style="background-color:#b9bbbe9c">2021</h2>

                                        <div class="courses-filter">
                                            <div class="clearfix">
                                                <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                    <?php
                                                    foreach ($userdata as $data)
                                                    {
                                                        if ($data->season == '2021')
                                                        {
                                                    ?>
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                <div class="ttr-box portfolio-bx border cours-bx">
                                                                    <div class="ttr-media media-ov2 media-effect">
                                                                        <a href="javascript:void(0);">
                                                                            <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public/uploads/mou/') . $data->image; ?>" alt="MOU" style="height:340px;">
                                                                        </a>
                                                                        <div class="ov-box">
                                                                            <div class="overlay-icon align-m">
                                                                                <a href="<?= base_url('public/uploads/mou/') . $data->image; ?>" class="magnific-anchor" title="MOU">
                                                                                    <i class="ti-search"></i>
                                                                                </a>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <input type="hidden" value="@item.Date1" />
                                                                    <div class="info-bx text-center">
																	    <h5><?= $data->role; ?></h5>
                                                                        <p><?= $data->title; ?></p>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </li>
                                                    <?php }
                                                    } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					
					
                        <div class="col-lg-12 col-md-12 col-sm-12 m-b30">
                            <div class="profile-content-bx">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="courses">
                                        <h2 class="text-center card-header" style="background-color:#b9bbbe9c">2019</h2>

                                        <div class="courses-filter">
                                            <div class="clearfix">
                                                <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                    <?php
                                                    foreach ($userdata as $data)
                                                    {
                                                        if ($data->season == '2019')
                                                        {
                                                    ?>
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                <div class="ttr-box portfolio-bx border cours-bx">
                                                                    <div class="ttr-media media-ov2 media-effect">
                                                                        <a href="javascript:void(0);">
                                                                            <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public/uploads/mou/') . $data->image; ?>" alt="MOU" style="height:340px;">
                                                                        </a>
                                                                        <div class="ov-box">
                                                                            <div class="overlay-icon align-m">
                                                                                <a href="<?= base_url('public/uploads/mou/') . $data->image; ?>" class="magnific-anchor" title="MOU">
                                                                                    <i class="ti-search"></i>
                                                                                </a>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <input type="hidden" value="@item.Date1" />
                                                                    <div class="info-bx text-center">
																	    <h5><?= $data->role; ?></h5>
                                                                        <p><?= $data->title; ?></p>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </li>
                                                    <?php }
                                                    } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->


                        <!--<div class="col-lg-12 col-md-12 col-sm-12 m-b30">
                            <div class="profile-content-bx">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="courses">
                                        <h2 class="text-center card-header" style="background-color:#b9bbbe9c">2020</h2>

                                        <div class="courses-filter">
                                            <div class="clearfix">
                                                <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                    <?php
                                                    foreach ($userdata as $data)
                                                    {
                                                        if ($data->season == '2020')
                                                        {
                                                    ?>
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                <div class="ttr-box portfolio-bx border cours-bx">
                                                                    <div class="ttr-media media-ov2 media-effect">
                                                                        <a href="javascript:void(0);">
                                                                            <img class="lazy" src="<?= base_url('public/assets/images/loader2.jpg') ?>" data-src="<?= base_url('public/uploads/mou/') . $data->image; ?>" alt="MOU" style="height:340px;">
                                                                        </a>
                                                                        <div class="ov-box">
                                                                            <div class="overlay-icon align-m">
                                                                                <a href="<?= base_url('public/uploads/mou/') . $data->image; ?>" class="magnific-anchor" title="MOU">
                                                                                    <i class="ti-search"></i>
                                                                                </a>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <input type="hidden" value="@item.Date1" />
                                                                    <div class="info-bx text-center">
                                                                        <h5><?= $data->title; ?></h5>
                                                                        <span><?= $data->role; ?></span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                    <?php }
                                                    } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->


                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>
</body>

</html>