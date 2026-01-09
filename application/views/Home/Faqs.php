<!DOCTYPE html>
<html lang="en">

<head>
    <title>Faqs - Software Development Training Program - TheDigiCoders</title>
	<meta name="description" content="Learn about training development program models and other frequently asked questions about industrial training programs and mobile application course etc.">
   
	<meta property="og:title" content="Faqs - Software Development Training Program - TheDigiCoders" />
<meta property="og:description" content="Learn about training development program models and other frequently asked questions about industrial training programs and mobile application course etc." />
<meta property="og:url" content="https://thedigicoders.com/Home/Faqs" />
<link rel="canonical" href="https://thedigicoders.com/Home/Faqs" />
	
	 <?php include('include/headerlinks.php')  ?>
</head>

<body>
    <?php include('include/header.php')  ?>

    <!-- 
    
@{
    ViewBag.Title = "Faqs";
    Layout = "~/Views/Shared/_Home_layout.cshtml";
} -->

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(<?= base_url('public') ?>/assets/images/banner/15august.jpeg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Frequently Asked Questions</h1>
                </div>
            </div>
        </div>
        <!-- contact area -->
        <div class="content-block">
            <!-- Your Faq -->
            <div class="section-area section-sp1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 mt-4">
                            
                            <div class="ttr-accordion m-b30 faq-bx" id="accordion1">
                                <?php
                                $sr = 1;
                                foreach ($userdata as $faqdata)
                                {
                                ?>
                                    <div class="panel">
                                        <div class="acod-head">
                                            <h6 class="acod-title">
                                                <a data-toggle="collapse" href="#<?= $sr; ?>" class="collapsed" data-parent="#faq2">
                                                    <?= $faqdata->question ?>
                                                </a>
                                            </h6>
                                        </div>
                                        <div id="<?= $sr; ?>" class="acod-body collapse">
                                            <!-- <div class="acod-content">The DigiCoders Technologies provides following unique features that attracts you to join-</div> -->
                                            <div class="ml-3">
                                                <?= $faqdata->answer; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    $sr++;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="bg-primary text-white contact-info-bx">
                                <h2 class="m-b10 title-head">Contact <span>Information</span></h2>
                                <div class="widget widget_getintuch">
                                    <ul>
                                        <li><i class="ti-location-pin"></i>2nd Floor, B-36, Sector O, Near Ram Ram Bank Chauraha, Aliganj, Lucknow, Uttar Pradesh, 226021</li>
                                        <li><i class="ti-mobile"></i><a href="tel:+91 9198483820"><span class="text-white">+91 9198483820</span></a></li>
                                        <li><i class="ti-mobile"></i><a href="tel:+91 8081347355"><span class="text-white">+91 8081347355</span></a></li>
                                        <li><i class="ti-mobile"></i><a href="tel:+91 8081329320"><span class="text-white">+91 8081329320</span></a></li>
                                        <li><i class="ti-mobile"></i><a href="tel:+91 7525953975"><span class="text-white">+91 7525953975</span></a></li>
                                        <li><i class="ti-mobile"></i><a href="tel:0522-4235604"><span class="text-white">0522-4235604</span></a></li>
                                        <li><i href="mailto:digicoderstech@gmail.com" class="ti-email"></i><a href="mailto:info@thedigicoders.com"><span class="text-white">info@thedigicoders.com</span></a></li>
                                    </ul>
                                </div>
                                <h5 class="m-t0 m-b20">Follow Us</h5>
                                <ul class="list-inline contact-social-bx">
                                    <li><a target="_blank" href="https://www.facebook.com/DigiCodersTech/" class="btn outline radius-xl" aria-label="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a target="_blank" href="https://twitter.com/DigiCodersTech/" class="btn outline radius-xl" aria-label="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a target="_blank" href="https://www.linkedin.com/in/digicoders/" class="btn outline radius-xl" aria-label="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6394296293&text=I have a query" class="btn outline radius-xl" aria-label="whatsapp"><i class="fa fa-whatsapp"></i></a></li>
                                    <li>
                                        <a target="_blank" href="https://instagram.com/digicoderstechnologies/" class="btn outline radius-xl" aria-label="instagram"><i class="fa fa-instagram"></i></a>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Your Faq End -->
        </div>
        <!-- contact area END -->
    </div>
    <!-- Content END-->






    <?php include('include/footer.php')  ?>
    <?php include('include/jslinks.php')  ?>
</body>

</html>