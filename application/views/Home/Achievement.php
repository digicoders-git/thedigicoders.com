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
<meta property="og:url" content="<?= base_url($this->uri->uri_string()) ?>" />
<link rel="canonical" href="<?= base_url($this->uri->uri_string()) ?>" />
	 <?php include('include/headerlinks.php') ?>
    <style>
        /* HD Text Clarity - Refined Weight */
        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
            color: #000;
            letter-spacing: -0.5px;
        }

        /* Hero Banner - Aligned with Expert/About Page */
        .page-banner {
            height: 300px;
            display: flex;
            align-items: center;
            position: relative;
            background-size: cover;
            background-position: center;
            overflow: hidden;
            border-radius: 0;
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
            font-size: 2.8rem;
            font-weight: 700;
            margin: 0;
            letter-spacing: -1px;
            text-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .page-banner p {
            color: rgba(255, 255, 255, 0.95);
            font-size: 1.3rem;
            font-weight: 500;
            margin-top: 15px;
            letter-spacing: 0.5px;
        }

        .page-banner-entry {
            position: relative;
            z-index: 2;
        }

        @media (max-width: 768px) {
            .page-banner { height: 250px; }
            .page-banner h1 { font-size: 1.8rem; letter-spacing: -1px; }
            .page-banner p { font-size: 1rem; }
        }

        .ttr-media img {
            object-fit: cover;
            object-position: center;
            
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
                    <h1 class="text-white">Our Achievements</h1>
                    <p class="text-white mt-3 lead opacity-8">Celebrating Excellence and Industry Recognition</p>
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

