<!DOCTYPE html>
<html lang="en">

<head>
    <title>Photos - Industrial Training Program for Engineering Students</title>
    <meta name="description"
        content="Browse our photos and know about our services and software development training programs in Lucknow. Contact us for apprenticeship registration and more!">

    <meta property="og:title" content="Photos - Industrial Training Program for Engineering Students" />
    <meta property="og:description"
        content="Browse our photos and know about our services and software development training programs in Lucknow. Contact us for apprenticeship registration and more!" />
    <meta property="og:url" content="<?= base_url($this->uri->uri_string()) ?>" />
    <link rel="canonical" href="<?= base_url($this->uri->uri_string()) ?>" />
    <style>
        .ttr-media img {
            object-fit: cover;
            object-position: center;
        }
    </style>

    <?php include('include/headerlinks.php') ?>
</head>

<body>
    <?php include('include/header.php') ?>

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark"
            style="background-image:url(<?= base_url('public') ?>/assets/images/banner/dct_banner.jpg);">
            <div class=" container">
                <div class="page-banner-entry">
                    <h1 class="text-white">MOU With Colleges</h1>
                </div>
            </div>
        </div>
        <br>
        <!-- contact area -->
        <div class="content-block">
            <!-- Portfolio  -->
            <div class="section-area section-sp1 gallery-bx">
                <div class="container">
                    <div class="clearfix">
                        <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                            <?php foreach ($sliderdata as $data) { ?>
                                <li class="action-card col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <div class="ttr-box portfolio-bx border cours-bx">
                                        <div class="ttr-media media-ov2 media-effect">
                                            <a href="<?= base_url('public/uploads/mou_slider/') . $data->image; ?>"
                                                class="magnific-anchor">
                                                <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                                                    data-src="<?= base_url('public/uploads/mou_slider/') . $data->image; ?>"
                                                    alt="photos" style="height:240px; width: 100%; object-fit: cover;" />
                                            </a>
                                            <div class="ov-box">
                                                <div class="overlay-icon align-m">
                                                    <a href="<?= base_url('public/uploads/mou_slider/') . $data->image; ?>"
                                                        class="magnific-anchor" title="MOU With College">
                                                        <i class="ti-search"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>




                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <!-- contact area END -->
    </div>
    <!-- Content END-->





    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>
</body>

</html>

