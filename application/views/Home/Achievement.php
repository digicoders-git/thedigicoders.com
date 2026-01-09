<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievements - Best Vocational Training Program in Lucknow</title>
	<meta name="description" content="The DigiCoders received many certificates for its work and service in the Software Development Training Program in Lucknow. Join and get your own certificate training in lucknow!">
  
	<meta property="og:title" content="Achievements - Best Vocational Training Program in Lucknow" />
<meta property="og:description" content="The DigiCoders received many certificates for its work and service in the Software Development Training Program in Lucknow. Join and get your own certificate training in lucknow!" />
<meta property="og:url" content="https://thedigicoders.com/Home/Achievement" />
<link rel="canonical" href="https://thedigicoders.com/Home/Achievement" />
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
                    <h1 class="text-white">Certification and Achievements</h1>
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
                                        <div class="courses-filter">
                                            <div class="clearfix">
                                                <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                    <?php foreach ($userdata as $achval)
                                                    { ?>
                                                        <li class="action-card col-lg-4 col-md-4 col-sm-12">
                                                            <div class="ttr-box portfolio-bx border cours-bx">
                                                                <div class="ttr-media media-ov2 media-effect">
                                                                    <a href="javascript:void(0);">
                                                                        <img class="lazy" src="<?= base_url('public/assets/images/Loader2.jpg') ?>" data-src="<?= base_url('public/uploads/achievemens/') . $achval->image ?>" alt="achievement" style="height:280px;">
                                                                    </a>
                                                                    <div class="ov-box">
                                                                        <div class="overlay-icon align-m">
                                                                            <a href="<?= base_url('public/uploads/achievemens/') . $achval->image ?>" class="magnific-anchor" title="achievement">
                                                                                <i class="ti-search"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="info-bx text-center">
                                                                    <h5><?= $achval->title; ?></h5>
                                                                    <span><?= $achval->role; ?></span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
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