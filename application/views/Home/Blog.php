<!DOCTYPE html>
<html lang="en">

<head>
    <title>Our Blog | Latest Tech Insights & Updates - DigiCoders Technologies</title>
    <meta name="description"
        content="Stay updated with the latest technology trends, coding tips, and industry insights from the experts at DigiCoders Technologies. Explore our official blog.">

    <meta property="og:title" content="Our Blog | Latest Tech Insights & Updates - DigiCoders Technologies" />
    <meta property="og:description"
        content="Stay updated with the latest technology trends, coding tips, and industry insights from the experts at DigiCoders Technologies. Explore our official blog." />
    <meta property="og:url" content="<?= strtolower(base_url($this->uri->uri_string())) ?>" />
    <link rel="canonical" href="<?= strtolower(base_url($this->uri->uri_string())) ?>" />
    <?php include('include/headerlinks.php') ?>
    <style>
        .page-banner {
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
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
            background: linear-gradient(135deg, rgba(0, 109, 171, 0.92) 0%, rgba(231, 96, 40, 0.85) 100%);
            z-index: 1;
        }

        .page-banner-entry {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 100%;
            padding: 0 15px;
        }

        .page-banner h1 {
            font-size: 2.8rem;
            font-weight: 600;
            color: #fff !important;
            margin: 0;
            letter-spacing: -1.5px;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            line-height: 1.1;
        }

        .page-banner p {
            color: #fff !important;
            font-size: 1.4rem;
            font-weight: 500;
            margin-top: 15px;
            letter-spacing: 0.5px;
            opacity: 0.95;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .page-banner {
                height: 280px;
            }

            .page-banner h1 {
                font-size: 2.2rem;
                letter-spacing: -0.5px;
            }

            .page-banner p {
                font-size: 1.1rem;
            }
        }

        /* READ MORE BUTTON - BRAND ROOT COLOR OVERRIDE */
        /* GLASSMORPISM BUTTON - ALIGNED TO BOTTOM */
        .info-bx .btn-read-more {
            background: rgba(0, 109, 171, 0.85) !important;
            backdrop-filter: blur(8px) !important;
            -webkit-backdrop-filter: blur(8px) !important;
            color: #ffffff !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            padding: 12px 30px !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            font-size: 0.85rem !important;
            letter-spacing: 1px !important;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
            border-radius: 0px !important;
            display: inline-block !important;
            text-decoration: none !important;
            box-shadow: 0 8px 32px 0 rgba(0, 109, 171, 0.2) !important;
            margin-top: auto !important;
            align-self: center !important;
        }

        .info-bx .btn-read-more:hover {
            background: rgba(231, 96, 40, 0.95) !important;
            color: #ffffff !important;
            transform: translateY(-5px) !important;
            border-color: rgba(255, 255, 255, 0.5) !important;
        }

        .cours-bx {
            border: 1px solid #eee;
            overflow: hidden;
            background: #fff;
            border-radius: 0px;
            display: flex;
            flex-direction: column;
            height: 100%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .info-bx {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            padding: 25px !important;
            text-align: center;
        }

        .action-box img {
            width: 100%;
            height: auto;
            aspect-ratio: 4 / 3;
            object-fit: cover !important;
            object-position: center;
            border-bottom: 1px solid #f0f0f0;
            background: #fff;
        }

        .action-box {
            overflow: hidden;
            border-radius: 0;
        }

        .card-title {
            color: #006DAB !important;
            font-weight: 800;
            font-size: 1.1rem;
            margin-top: 10px;
            line-height: 1.4;
        }
    </style>
</head>

<body>
    <?php include('include/header.php') ?>

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner" title="digicoders-blogs"
            style="background-image:url(<?= base_url('public') ?>/assets/images/banner/dct_banner.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Official Blog & Insights</h1>
                    <p class="text-white">Stay updated with the latest trends, tips and technology from DigiCoders</p>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-block mt-5">
            <!-- Portfolio Section -->
            <div class="section-area section-sp1 gallery-bx">
                <div class="container">
                    <div class="row justify-content-center gap-4">
                        <?php foreach ($userdata as $data) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch mb-4">
                                <div class="cours-bx card shadow-sm">
                                    <div class="action-box">
                                        <img loading="lazy" class="lazy card-img-top"
                                            src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                                            data-src="<?= base_url('public/uploads/blog/' . $data->img) ?>"
                                            title="digicoders-lucknow-blogs" alt="digicoders-lucknow-blogs" />
                                    </div>
                                    <div class="info-bx text-center card-body">
                                        <h5 class="card-title">
                                            <a href="<?= base_url('home/blogdetails/' . (!empty($data->url) ? $data->url : $data->id)) ?>" style="color: inherit; text-decoration: none;">
                                                <?= $data->title ?>
                                            </a>
                                        </h5>
                                        <p class="card-text"><?= $data->meta_description ?></p>
                                        <a class="btn btn-read-more mt-2"
                                            href="<?= base_url('home/blogdetails/' . (!empty($data->url) ? $data->url : $data->id)) ?>">Read More</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
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