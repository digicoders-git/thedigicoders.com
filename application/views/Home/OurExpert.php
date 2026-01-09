<!DOCTYPE html>
<html lang="en">

<head>
    <title>Our Experts - Project Training in Lucknow - TheDigiCoders</title>
	<meta name="description" content="TheDigiCoders specializes in technology and IT-related services such as website development, mobile app development, digital marketing, graphics design and more...">
   
	<meta property="og:title" content="Our Experts - Project Training in Lucknow - TheDigiCoders" />
<meta property="og:description" content="TheDigiCoders specializes in technology and IT-related services such as website development, mobile app development, digital marketing, graphics design and more..." />
<meta property="og:url" content="https://thedigicoders.com/Home/OurExpert" />
<link rel="canonical" href="https://thedigicoders.com/Home/OurExpert" />
	
	 <?php include('include/headerlinks.php')?>
</head>

<body>
    <?php include('include/header.php') ?>

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(<?= base_url('public') ?>/assets/images/banner/15august.jpeg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Our Experts</h1>
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
                            <h2>
                                <center> We pride ourselves on having a team
                                of highly-skilled experts</center>
                            </h2>
                            <div class="profile-content-bx">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="courses">
                                        <div class="courses-filter">
                                            <div class="clearfix">
                                                <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                    <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish mt-5">
                                                        <p>DigiCoders specializes in technological and IT-related services such as website development, mobile app development, digital marketing, graphics designing, domain & hosting, crm & erp development etc.</p>
                                                    </li>
                                                    <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                        <div class="cours-bx">
                                                            <div class="action-box">
                                                                <img class="lazy" src="<?= base_url('public/assets/images/loader2.jpg') ?>" data-src="<?= base_url('public') ?>/assets/images/himanshu.png" title="Er. Himanshu-Kashyap" alt="Himanshu-Kashyap-digicoders-lucknow" style="height:340px;" />
                                                            </div>
                                                            <div class="info-bx text-center">
                                                                <h5>Er. Himanshu Kashyap</h5>
                                                                <span>Co - Founder</span>
                                                            </div>
                                                        </div>
                                                    </li>
													
                                                    <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                        <div class="cours-bx">
                                                            <div class="action-box">
                                                                <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public') ?>/assets/images/gopal.png" title="Er. Gopal Singh" alt="Er.-Gopal-Singh-digicoders-lucknow" style="height:340px;" />
                                                            </div>
                                                            <div class="info-bx text-center">
                                                                <h5>Er. Gopal Singh</h5>
                                                                <span>Co - Founder</span>
                                                            </div>
                                                        </div>
                                                    </li>
													
                                                </ul>
                                            </div>
											<hr>
											
											<h3>Our Experts<h3>
                                            <div class="clearfix">
                                                <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                    <?php foreach ($userdata as $expertdata)
                                                    { ?>
                                                        <li class="action-card col-xl-3 col-lg-6 col-md-12 col-sm-6 publish">
                                                            <div class="cours-bx">
                                                                <div class="action-box">
                                                                    <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public/uploads/expert/') . $expertdata->image ?>" title="<?= $expertdata->name; ?>" alt="team memebers" style="height:300px;" />
                                                                </div>
                                                                <div class="info-bx text-center">
                                                                    <h5><?= $expertdata->name; ?></h5>
                                                                    <span><?= $expertdata->role; ?></span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
											
											
											<!-- <h3>Our Interns<h3>
											
											 <div class="clearfix">
                                                <ul id="masonry" class="ttr-gallery-listing magnific-image row">  
                                                   <?php foreach ($interndata as $interndatas)
                                                    { ?>
                                                        <li class="action-card col-xl-3 col-lg-6 col-md-12 col-sm-6 publish">
                                                            <div class="cours-bx">
                                                                <div class="action-box">
                                                                    <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public/uploads/expert/') . $interndatas->image ?>" title="<?= $interndatas->name; ?>" alt="team memebers" style="height:300px;" />
                                                                </div>
                                                                <div class="info-bx text-center">
                                                                    <h5><?= $interndatas->name; ?></h5>
                                                                    <span><?= $interndatas->role; ?></span>
                                                                </div>
                                                            </div>
                                                        </li>
														 <?php } ?>
														
                                                </ul>
                                            </div> -->
											
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