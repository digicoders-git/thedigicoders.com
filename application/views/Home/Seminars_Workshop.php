<!DOCTYPE html>
<html lang="en">

<head>
    <title>Seminars & Workshops | Best IT Training - DigiCoders Technologies Pvt. Ltd.</title>
    <meta name="description"
        content="Explore our seminars and workshops at DigiCoders Technologies Pvt. Ltd. We conduct regular technical sessions on latest technologies for engineering students in Lucknow.">

    <meta property="og:title" content="Seminars & Workshops | Best IT Training - DigiCoders Technologies Pvt. Ltd." />
    <meta property="og:description"
        content="Explore our seminars and workshops at DigiCoders Technologies Pvt. Ltd. We conduct regular technical sessions on latest technologies for engineering students in Lucknow." />
    <meta property="og:url" content="<?= base_url($this->uri->uri_string()) ?>" />
    <link rel="canonical" href="<?= base_url($this->uri->uri_string()) ?>" />

    <?php include('include/headerlinks.php') ?>
</head>

<body>
    <?php include('include/header.php') ?>

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark"
            style="background-image:url(<?= base_url('public') ?>/assets/images/banner/15august.jpeg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Seminars/Workshop</h1>
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
                            <?php foreach ($userdata as $gallerydata) { ?>
                                <li class="action-card col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <div class="ttr-box portfolio-bx border cours-bx">
                                        <div class="ttr-media media-ov2 media-effect">
                                            <a href="javascript:void(0);">
                                                <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                                                    data-src="<?= base_url('public/uploads/gallery/') . $gallerydata->image; ?>"
                                                    alt="photos" style="height:240px; object-fit:cover;" />
                                            </a>
                                            <div class="ov-box">
                                                <div class="overlay-icon align-m">
                                                    <a href="<?= base_url('public/uploads/gallery/') . $gallerydata->image; ?>"
                                                        class="magnific-anchor" title="Photos">
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