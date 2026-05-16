<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOU with Colleges | Industrial Training Program - DigiCoders Technologies Pvt. Ltd.</title>
    <meta name="description"
        content="Conversations provide moderators with valuable insight into how learners are receiving and understanding content. Contact us for software development training program.">

    <meta property="og:title"
        content="MOU with Colleges | Industrial Training Program - DigiCoders Technologies Pvt. Ltd." />
    <meta property="og:description"
        content="Conversations provide moderators with valuable insight into how learners are receiving and understanding content. Contact us for software development training program." />
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
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 109, 171, 0.9) 0%, rgba(231, 96, 40, 0.8) 100%);
            z-index: 1;
        }

        .page-banner h1 {
            font-size: 2.5rem;
            font-weight: 600;
            margin: 0;
            letter-spacing: -1px;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .page-banner-entry {
            position: relative;
            z-index: 2;
        }

        @media (max-width: 767px) {
            .page-banner {
                height: 300px;
            }

            .page-banner h1 {
                font-size: 2.2rem;
            }
        }
    </style>
</head>

<body>
    <?php include('include/header.php') ?>


    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner"
            style="background-image:url(<?= base_url('public') ?>/assets/images/banner/dct_banner.jpg);">
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
                        <a href="<?= base_url('home/gallery/mou-with-college') ?>"
                            style="color: #333; font-weight: bold; hover: #ff5e14; cursor: pointer;">View All</a>
                    </div>
                </div>
                <div class="swiper mySwiper" style="padding: 10px 0; ">
                    <div class="swiper-wrapper">
                        <?php foreach ($sliderdata as $slider) { ?>
                            <div class="swiper-slide">
                                <div class="slider-container">
                                    <img loading="lazy" src="<?= base_url('public/') . $slider->media_url; ?>" alt="MOU Slider">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <style>
                    .swiper-button-next::after,
                    .swiper-button-prev::after {
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
                                                    foreach ($userdata as $data) {
                                                        ?>
                                                        <li
                                                            class="action-card col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-4 d-flex">
                                                            <a href="<?= base_url('public/uploads/mou/') . $data->image; ?>"
                                                                class="magnific-anchor mou-card w-100"
                                                                title="<?= $data->role; ?>">
                                                                <div class="mou-media">
                                                                    <img loading="lazy" class="lazy"
                                                                        src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                                                                        data-src="<?= base_url('public/uploads/mou/') . $data->image; ?>"
                                                                        alt="MOU">
                                                                </div>
                                                                <div class="mou-info">
                                                                    <h5><?= $data->role; ?></h5>
                                                                    <p><?= $data->title; ?></p>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
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
                                                    foreach ($userdata as $data) {
                                                        if ($data->season == '2023') {
                                                            ?>
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                <div class="ttr-box portfolio-bx border cours-bx">
                                                                    <div class="ttr-media media-ov2 media-effect">
                                                                        <a href="javascript:void(0);">
                                                                            <img loading="lazy" class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public/uploads/mou/') . $data->image; ?>" alt="MOU" style="height:340px;">
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
                                                    foreach ($userdata as $data) {
                                                        if ($data->season == '2022') {
                                                            ?>
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                <div class="ttr-box portfolio-bx border cours-bx">
                                                                    <div class="ttr-media media-ov2 media-effect">
                                                                        <a href="javascript:void(0);">
                                                                            <img loading="lazy" class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public/uploads/mou/') . $data->image; ?>" alt="MOU" style="height:340px;">
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
                                                    foreach ($userdata as $data) {
                                                        if ($data->season == '2021') {
                                                            ?>
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                <div class="ttr-box portfolio-bx border cours-bx">
                                                                    <div class="ttr-media media-ov2 media-effect">
                                                                        <a href="javascript:void(0);">
                                                                            <img loading="lazy" class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public/uploads/mou/') . $data->image; ?>" alt="MOU" style="height:340px;">
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
                                                    foreach ($userdata as $data) {
                                                        if ($data->season == '2019') {
                                                            ?>
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                <div class="ttr-box portfolio-bx border cours-bx">
                                                                    <div class="ttr-media media-ov2 media-effect">
                                                                        <a href="javascript:void(0);">
                                                                            <img loading="lazy" class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public/uploads/mou/') . $data->image; ?>" alt="MOU" style="height:340px;">
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
                                                    foreach ($userdata as $data) {
                                                        if ($data->season == '2020') {
                                                            ?>
                                                            <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                                <div class="ttr-box portfolio-bx border cours-bx">
                                                                    <div class="ttr-media media-ov2 media-effect">
                                                                        <a href="javascript:void(0);">
                                                                            <img loading="lazy" class="lazy" src="<?= base_url('public/assets/images/loader2.jpg') ?>" data-src="<?= base_url('public/uploads/mou/') . $data->image; ?>" alt="MOU" style="height:340px;">
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
            slidesPerView: 2,
            spaceBetween: 15,
            loop: true,
            speed: 3000,
            autoplay: {
                delay: 1,
                disableOnInteraction: false,
            },
            breakpoints: {
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
                1400: {
                    slidesPerView: 5,
                    spaceBetween: 30,
                },
            },
        });
    </script>
    <style>
        .mySwiper .swiper-wrapper {
            transition-timing-function: linear !important;
        }

        .slider-container {
            height: 180px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5px;
            aspect-ratio: 4/3;
        }

        .slider-container img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            transition: all 0.3s ease;
        }

        /* MOU Card Styles */
        .mou-card {
            background: #ffffff;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(0, 0, 0, 0.05);
            height: 100%;
            display: flex;
            flex-direction: column;
            text-decoration: none !important;
            position: relative;
        }

        .mou-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            border-color: #ff5e14;
        }

        .mou-media {
            position: relative;
            overflow: hidden;
            aspect-ratio: 4/5;
            /* More document-like ratio */
            background: #fdfdfd;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            border-bottom: 1px solid rgba(0, 0, 0, 0.03);
            /* padding: 15px; */
            /* Padding to show document edges */
        }

        .mou-media img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: all 0.6s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            /* Shadow for the document itself */
            background: white;
            border: 1px solid #eee;
        }

        .mou-card:hover .mou-media img {
            transform: scale(1.05);
            /* Only zoom, no rotation */
        }

        .mou-info {
            padding: 20px 15px;
            text-align: center;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            background: linear-gradient(to bottom, #ffffff, #fafafa);
            min-height: 130px;
        }

        .mou-info h5 {
            font-size: 1.05rem;
            font-weight: 700;
            color: #111;
            margin-bottom: 8px;
            line-height: 1.4;
            height: 2.8em;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            letter-spacing: -0.2px;
        }

        .mou-info p {
            font-size: 0.85rem;
            color: #ff5e14;
            /* Theme color for location/title */
            margin-bottom: 0;
            line-height: 1.5;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .slider-container {
                height: 140px;
            }

            .mou-info {
                min-height: 100px;
            }

            .mou-info h5 {
                font-size: 1rem;
            }

            .mou-info p {
                font-size: 0.85rem;
            }
        }

        @media (max-width: 575px) {
            .slider-container {
                height: 120px;
            }
        }

        /* Ensure the popup image fits the screen without being cut off */
        .mfp-wrap {
            overflow: hidden !important;
        }

        .mfp-img {
            max-height: 90vh !important;
            padding: 40px 0 !important;
            width: auto !important;
            margin: 0 auto;
            display: block;
        }

        .mfp-container {
            padding-left: 10px !important;
            padding-right: 10px !important;
        }

        .mfp-figure figure {
            margin: 0;
        }

        .mfp-bottom-bar {
            margin-top: -35px !important;
            bottom: 40px !important;
        }
    </style>
</body>

</html>