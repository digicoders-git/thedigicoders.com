<!DOCTYPE html>
<html lang="en">

<head>
    <title>Our Industry Experts & Mentors | DigiCoders Technologies Lucknow</title>
    <meta name="description"
        content="Meet the professional mentors and industry experts at DigiCoders Technologies Pvt. Ltd. Our team features top-tier software developers and educators dedicated to career excellence.">
    <meta name="keywords"
        content="IT experts Lucknow, DigiCoders mentors, software trainers, industry experts, software development mentors, best IT trainers in Lucknow">

    <?php include('include/headerlinks.php') ?>

    <style>
        :root {
            --orange: #E76028;
            --blue: #006DAB;
            --green: #00964C;
            --dark: #111;
            --text-muted: #555;
            --bg-light: #f8faff;
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--dark);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* HD Text Clarity - Refined Weight */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 700;
            color: #000;
            letter-spacing: -0.5px;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--blue);
        }

        /* Hero Banner - Aligned with About Page */
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
            font-size: 3.5rem;
            font-weight: 700;
            margin: 0;
            letter-spacing: -1px;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .page-banner-entry {
            position: relative;
            z-index: 2;
        }

        /* Expert Grid - Aligned with About Page */
        .expert-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-top: 50px;
        }

        .expert-card {
            padding: 0;
            background: #fff;
            border: 1px solid #eee;
            transition: var(--transition);
        }

        .expert-card.orange,
        .expert-card.green {
            border-bottom: none;
        }

        .expert-card img {
            width: 100%;
            aspect-ratio: 1/1;
            object-fit: cover;
            object-position: top;
            /* Ensures faces are not cropped from top */
            display: block;
            border-bottom: 1px solid #f5f5f5;
        }

        .expert-info {
            padding: 15px;
            /* Reduced gap as requested */
            text-align: center;
        }

        /* High-Density Founder Cards */
        .founder-grid-premium {
            display: grid;
            grid-template-columns: repeat(2, 300px);
            /* Increased container width */
            gap: 40px;
            justify-content: center;
            margin-bottom: 20px;
        }

        .founder-card-premium {
            background: #fff;
            border: none;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            position: relative;
            text-align: center;
        }

        .founder-identity-column {
            background: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
            border: none;
            width: 100%;
        }

        .founder-banner-img {
            width: 260px;
            /* Increased size */
            height: 320px;
            /* Rectangular portrait */
            object-fit: contain;
            /* Shows full image */
            border-radius: 0;
            /* Removed circle */
            margin-bottom: 15px;
            background: #f8faff;
        }

        .founder-card-premium.blue .founder-identity-column {
            border: none;
        }

        .founder-card-premium.reverse .founder-identity-column {
            order: 2;
        }

        .founder-card-premium.reverse .founder-main-content {
            order: 1;
        }

        .founder-card-premium.blue {
            border: none;
        }

        .founder-banner-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            /* Prevents cropping */
            background: #f8faff;
            /* Subtle background for transparency or letterboxing */
            object-position: center;
            display: block;
        }

        /* Responsive Fix */
        @media (max-width: 991px) {
            .founder-grid-premium {
                grid-template-columns: 1fr;
                gap: 30px;
            }
        }



        .founder-card-premium.blue .stat-number {
            color: var(--blue);
        }

        .expert-role {
            display: inline-block;
            padding: 3px 12px;
            background: #f8faff;
            color: var(--blue);
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 10px;
        }

        .expert-name {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 5px;
            color: #000;
        }

        .expert-tagline {
            font-size: 13px;
            color: var(--text-muted);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .section-area {
            padding: 40px 0;
            /* Reduced padding for tighter flow */
        }

        .bg-light-sec {
            background-color: var(--bg-light);
        }

        @media (max-width: 1200px) {
            .expert-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 991px) {
            .expert-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .expert-grid {
                grid-template-columns: 1fr;
            }

            .expert-card {
                margin-left: 15px;
                margin-right: 15px;
            }

            .section-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>
    <?php include('include/header.php') ?>

    <div class="page-content bg-white">
        <!-- Page Banner ==== -->
        <div class="page-banner"
            style="background-image:url(<?= base_url('public') ?>/assets/images/banner/dct_banner.jpg);">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1 class="text-white">Our Experts</h1>
                    <p class="text-white mt-3 lead opacity-8">The Professional Team Behind Your Tech Success</p>
                </div>
            </div>
        </div>

        <!-- Founders Section ==== -->
        <section class="section-area" style="background: #fff; padding: 40px 0 10px 0;">
            <div class="container">
                <div class="text-center mb-3">
                    <h2 class="section-title">Founded by Visionaries</h2>
                </div>

                <!-- Himanshu Kashyap (Left Image) -->
                <div class="founder-grid-premium">
                    <!-- Himanshu Kashyap -->
                    <div class="founder-card-premium">
                        <div class="founder-identity-column">
                            <img class="lazy founder-banner-img"
                                src="<?= base_url('public/assets/images/loader2.jpg') ?>"
                                data-src="<?= base_url('public/assets/images/himanshu1.png') ?>"
                                alt="Er. Himanshu Kashyap Co-Founder at DigiCoders Technologies">
                            <div class="text-center">
                                <h3 class="expert-name mb-1">Er. Himanshu Kashyap</h3>
                                <p class="expert-tagline" style="color: var(--orange);">Co-Founder</p>
                            </div>
                        </div>
                    </div>

                    <!-- Gopal Singh -->
                    <div class="founder-card-premium blue">
                        <div class="founder-identity-column">
                            <img class="lazy founder-banner-img"
                                src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                                data-src="<?= base_url('public/assets/images/gopal1.png') ?>"
                                alt="Er. Gopal Singh Co-Founder at DigiCoders Technologies">
                            <div class="text-center">
                                <h3 class="expert-name mb-1">Er. Gopal Singh</h3>
                                <p class="expert-tagline" style="color: var(--blue);">Co-Founder</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Experts Grid ==== -->
        <section class="section-area bg-white" style="padding-top: 10px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-3">
                            <h2 class="section-title">Our Team</h2>
                            <p class="lead mb-0">Professional developers assigned to your career growth.</p>
                        </div>

                        <div class="expert-grid">
                            <?php foreach ($userdata as $expertdata) { ?>
                                <div class="expert-card">
                                    <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                                        data-src="<?= base_url('public/uploads/expert/') . $expertdata->image ?>"
                                        alt="<?= $expertdata->name; ?> <?= $expertdata->role; ?> at DigiCoders Technologies">
                                    <div class="expert-info text-center">
                                        <span class="expert-role"><?= $expertdata->role; ?></span>
                                        <h4 class="expert-name"><?= $expertdata->name; ?></h4>

                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>
</body>

</html>