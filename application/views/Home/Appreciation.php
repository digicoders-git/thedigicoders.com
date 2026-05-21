<!DOCTYPE html>
<html lang="en">

<head>
    <title>Appreciation for Best Software And App Development Training Program</title>
    <meta name="description"
        content="See our appreciation latter for web and mobile app development courses at thedigicoders.com">

    <meta property="og:title" content="Appreciation for Best Software And App Development Training Program" />
    <meta property="og:description"
        content="See our appreciation latter for web and mobile app development courses at thedigicoders.com" />

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

        /* Appreciation Card Styles */
        .app-card {
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

        .app-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            border-color: #ff5e14;
        }

        .app-media {
            position: relative;
            overflow: hidden;
            aspect-ratio: 4/5;
            background: #fdfdfd;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            border-bottom: 1px solid rgba(0, 0, 0, 0.03);
            /* padding: 15px; */
        }

        .app-media img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: all 0.6s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            background: white;
            border: 1px solid #eee;
        }

        .app-card:hover .app-media img {
            transform: scale(1.05);
        }

        .app-info {
            padding: 20px 15px;
            text-align: center;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            background: linear-gradient(to bottom, #ffffff, #fafafa);
            min-height: 130px;
        }

        .app-info h5 {
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

        .app-info p {
            font-size: 0.85rem;
            color: #ff5e14;
            margin-bottom: 0;
            line-height: 1.5;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Hide scrollbar in zoom mode */
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

        @media (max-width: 767px) {
            .page-banner {
                height: 250px;
            }

            .page-banner h1 {
                font-size: 2.2rem;
            }

            .app-info {
                min-height: 110px;
                padding: 15px 10px;
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
                    <h1 class="text-white">Industrial Appreciation</h1>
                    <p class="text-white mt-3 lead opacity-8">Valued Recognition from Industry Leaders & Institutions
                    </p>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <div class="content-block">
            <!-- About Us -->
            <div class="section-area section-sp1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 m-b30 mt-4">
                            <div class="profile-content-bx">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="courses">


                                        <div class="courses-filter">
                                            <div class="clearfix">
                                                <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                    <?php
                                                    foreach ($userdata as $data) {
                                                        ?>
                                                        <li class="action-card col-lg-4 col-md-6 col-sm-6 mb-4 d-flex">
                                                            <a href="<?= base_url('public/uploads/appreciation/') . $data->image; ?>"
                                                                class="magnific-anchor app-card w-100"
                                                                title="<?= $data->role; ?>">
                                                                <div class="app-media">
                                                                    <img loading="lazy" class="lazy"
                                                                        src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                                                                        data-src="<?= base_url('public/uploads/appreciation/') . $data->image; ?>"
                                                                        alt="Appreciation">
                                                                </div>
                                                                <div class="app-info">
                                                                    <h5><?= $data->role; ?></h5>
                                                                    <p><?= $data->title; ?></p>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    }
                                                    ?>
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