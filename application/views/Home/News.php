<!DOCTYPE html>
<html lang="en">

<head>
    <title>TheDigiCoders In News - Software Development Training Courses</title>
	<meta name="description" content="Visit our website page TheDigiCoders In News and found the latest news about IT companies and technologies at thedigicoders.com">
    
	<meta property="og:title" content="TheDigiCoders In News - Software Development Training Courses" />
<meta property="og:description" content="Visit our website page TheDigiCoders In News and found the latest news about IT companies and technologies at thedigicoders.com" />
<meta property="og:url" content="https://thedigicoders.com/Home/DigiCodersInNews" />
<link rel="canonical" href="https://thedigicoders.com/Home/DigiCodersInNews" />
	
	<?php include('include/headerlinks.php')  ?>
</head>

<body>
    <?php include('include/header.php')  ?>

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(<?= base_url('public') ?>/assets/images/banner/digicoder.jpeg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">DigiCoders in News</h1>
                </div>
            </div>
        </div>
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="<?= base_url() ?>Home/Index">Home</a></li>
                    <li>DigiCoders In News</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
            <div class="content-block">
            <!-- Portfolio  -->
            <div class="section-area section-sp1 gallery-bx">
                <div class="container">

                    <div class="clearfix">
                        <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                            <?php foreach ($userdata as $gallerydata)
                            { ?>
                                <li class="action-card col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                    <div class="ttr-box portfolio-bx border cours-bx">
                                        <div class="ttr-media media-ov2 media-effect" style="height:400px">
                                            <a href="javascript:void(0);">
                                                <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public/uploads/news/') . $gallerydata->image; ?>" alt="photos" style="height:400px;" />
                                            </a>
                                            <div class="ov-box" style="height:400px">
                                                <div class="overlay-icon align-m">
                                                    <a href="<?= base_url('public/uploads/news/') . $gallerydata->image; ?>" class="magnific-anchor" title="Photos">
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
        </div>
        <!-- contact area END -->
    </div>
    <!-- Content END-->






    <?php include('include/footer.php')  ?>
    <?php include('include/jslinks.php')  ?>
</body>

</html>