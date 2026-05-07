<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOU with Colleges | Industrial Training Program - DigiCoders Technologies Pvt. Ltd.</title>
	<meta name="description" content="Conversations provide moderators with valuable insight into how learners are receiving and understanding content. Contact us for software development training program.">
    
<meta property="og:title" content="MOU with Colleges | Industrial Training Program - DigiCoders Technologies Pvt. Ltd." />
<meta property="og:description" content="Conversations provide moderators with valuable insight into how learners are receiving and understanding content. Contact us for software development training program." />
<meta property="og:url" content="<?= base_url($this->uri->uri_string()) ?>" />
<link rel="canonical" href="<?= base_url($this->uri->uri_string()) ?>" />

<?php include('include/headerlinks.php') ?>

    <style>
        .page-banner {
            height: 300px;
            display: flex;
            align-items: center;
            position: relative;
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }
        .page-banner::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(135deg, rgba(0, 109, 171, 0.9) 0%, rgba(231, 96, 40, 0.8) 100%);
            z-index: 1;
        }
        .page-banner h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin: 0;
            letter-spacing: -1px;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .page-banner-entry {
            position: relative;
            z-index: 2;
        }
        @media (max-width: 767px) {
            .page-banner { height: 300px; }
            .page-banner h1 { font-size: 2.2rem; }
        }
    </style>
</head>

<body>
    <?php include('include/header.php') ?>


    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner" style="background-image:url(<?= base_url('public') ?>/assets/images/banner/dct_banner.jpg);">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1 class="text-white">MOU With Colleges</h1>
                    <p class="text-white mt-3 lead opacity-8">Building Strong Academic & Industrial Alliances</p>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        
         <!-- Slider Section -->
         <div class="section-area section-sp1" style="padding-bottom:50px; padding-top: 50px;">
            <div class="container">
                <div class="row align-items-center mb-3">
                    <div class="col-md-9 col-sm-8 col-7">
                        <h4 class="mb-0">MOU Highlights</h4>
                    </div>
                    <div class="col-md-3 col-sm-4 col-5 text-right">
                        <a href="<?= base_url('Home/Gallery/mou-with-college') ?>" style="color: #333; font-weight: bold; hover: #ff5e14; cursor: pointer;">View All</a>
                    </div>
                </div>
                <div class="swiper mySwiper" style="padding: 20px; border-radius: 15px; ">
                    <div class="swiper-wrapper">
                        <?php foreach ($sliderdata as $slider) { ?>
                            <div class="swiper-slide">
                                <div class="slider-container" style="width:100%; height:100%; display: flex; align-items: center; justify-content: center; overflow: hidden; border-radius: 10px;">
                                    <img src="<?= base_url('public/') . $slider->media_url; ?>" alt="MOU Slider" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-button-next" style="color: #333; width: 30px; height: 30px;"></div>
                    <div class="swiper-button-prev" style="color: #333; width: 30px; height: 30px;"></div>
                    <div class="swiper-pagination"></div>
                </div>
                <style>
                    .swiper-button-next::after, .swiper-button-prev::after {
                        font-size: 18px !important;
                        font-weight: bold;
                    }
                    .swiper-pagination-bullet-active {
                        background-color: #333 !important;
                    }
                    /* Mobile Responsive Styles */
                    /* @media (max-width: 768px) {
                        .slider-container {
                            height: 250px !important;
                        }
                        .swiper-slide {
                            height: auto !important;
                        }
                    }
                    @media (max-width: 420px) {
                        .slider-container {
                            height: 150px !important;
                        }
                        .swiper-slide {
                            height: auto !important;
                        }
                    } */
                </style>
            </div>
        </div>
        <!-- Slider Section End -->

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
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            speed: 2000, // Smooth transition speed
            autoplay: {
                delay: 1, // No delay for continuous effect
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },
        });
    </script>
    <style>
       .mySwiper .swiper-wrapper {
            transition-timing-function: linear !important;
        }
        .swiper-slide {
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .swiper-slide:hover {
            transform: scale(1.02);
        }
        .swiper-pagination-bullet-active {
            background-color: #007bff;
        }
        
        .slider-container {
             height: 250px !important;
             width: 100%;
             display: flex; 
             align-items: center; 
             justify-content: center;
        }

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .slider-container {
                height: 250px !important;
            }
        }
        @media (max-width: 991px) {
            .slider-container {
                height: 200px !important;
            }
        }
        @media (max-width: 768px) {
            .slider-container {
                height: 150px !important;
            }
        }
        @media (max-width: 575px) {
            .slider-container {
                height: 130px !important;
            }
        }
    </style>
</body>

</html>

