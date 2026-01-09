
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Photos - Industrial Training Program for Engineering Students</title>
    <meta name="description"
        content="Browse our photos and know about our services and software development training programs in Lucknow. Contact us for apprenticeship registration and more!">

    <meta property="og:title" content="Photos - Industrial Training Program for Engineering Students" />
    <meta property="og:description"
        content="Browse our photos and know about our services and software development training programs in Lucknow. Contact us for apprenticeship registration and more!" />
    <meta property="og:url" content="https://thedigicoders.com/Home/Photos" />
    <link rel="canonical" href="https://thedigicoders.com/Home/Photos" />

    <?php include ('include/headerlinks.php') ?>
</head>

<body>
    <?php include ('include/header.php') ?>

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark"
            style="background-image:url(<?= base_url('public') ?>/assets/images/banner/15august.jpeg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Blog Details</h1>
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
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="text-center"><?= $userdata->title ?></h2>
								 <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                                                data-src="<?= base_url('public/uploads/blog/'. $userdata->img) ?>"
                                                alt="photos" class="w-100"  />
								<h5 class="mt-4 mb-4"><?= $userdata->subtitle ?></h5>
                                <p>
                                   <?= $userdata->content ?>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- contact area END -->
    </div>
    <!-- Content END-->
    <?php include ('include/footer.php') ?>
    <?php include ('include/jslinks.php') ?>
</body>

</html>