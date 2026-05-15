<!DOCTYPE html>
<html lang="en">

<head>
    <title>Our Placements | Success Stories - DigiCoders Technologies</title>
    <meta name="description"
        content="Explore the success stories and placement records of DigiCoders Technologies. See our students placed in top IT companies and their journey to success.">

    <meta property="og:title" content="Our Placements | Success Stories - DigiCoders Technologies" />
    <meta property="og:description"
        content="Explore the success stories and placement records of DigiCoders Technologies. See our students placed in top IT companies and their journey to success." />
    <meta property="og:url" content="<?= strtolower(base_url($this->uri->uri_string())) ?>" />
    <link rel="canonical" href="<?= strtolower(base_url($this->uri->uri_string())) ?>" />

    <style>
        .page-banner {
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            background: linear-gradient(135deg, rgba(0, 109, 171, 0.9) 0%, rgba(231, 96, 40, 0.8) 100%),
                url('<?= base_url("public/assets/images/banner/dct_banner.jpg") ?>');
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }

        .page-banner h1 {
            font-size: 2.8rem;
            font-weight: 800;
            color: #fff;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: -1.5px;
            text-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .page-banner p {
            color: rgba(255, 255, 255, 0.95);
            font-size: 1.2rem;
            font-weight: 500;
            margin-top: 15px;
            letter-spacing: 0.5px;
        }

        .page-banner-entry {
            position: relative;
            z-index: 2;
        }

        @media (max-width: 768px) {
            .page-banner {
                height: 250px;
            }

            .page-banner h1 {
                font-size: 1.8rem;
                letter-spacing: -1px;
            }

            .page-banner p {
                font-size: 1rem;
            }
        }

        .section-title {
            font-size: 2rem;
            font-weight: 600;
            color: #006DAB;
            text-align: center;
            margin: 50px 0 30px;
            text-transform: uppercase;
            letter-spacing: -1px;
            position: relative;
            padding-bottom: 15px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: #E76028;
        }

        .testimonial-bx {
            border: none;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .testimonial-bx img {
            width: 100%;
            display: block;
        }

        .ttr-box.portfolio-bx {
            border: none !important;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            padding: 0 !important;
            margin-bottom: 30px;
         
        }

        /* Stable Grid System to prevent overlapping */
        .placement-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .placement-swiper {
            width: 100%;
            overflow: hidden;
            padding: 20px 0;
        }

        .placement-swiper .swiper-wrapper {
            transition-timing-function: linear !important;
        }

        .placement-swiper .swiper-slide {
            width: 320px;
            aspect-ratio: 1/1;
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 1.8rem;
            }

            .placement-grid { grid-template-columns: repeat(2, 1fr); gap: 15px; }

            .placement-swiper .swiper-slide {
                width: 220px;
            }
        }
    </style>
    <?php include('include/headerlinks.php') ?>
</head>

<body>
    <?php include('include/header.php') ?>

    <!-- Content -->
    <div class="page-content bg-white">
        <div class="page-banner">
            <div class="container">
                <div class="page-banner-entry">
                    <h1>Placement By DigiCoders</h1>
                    <p>Celebrating the Success of Our Shining Stars</p>
                </div>
            </div>
        </div>

        <div class="container">
            <h3 class="section-title">Recent Placement</h3>
            <div class="section-area p-0 m-0">
                <div class="swiper placement-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($banner as $bannerdata) { ?>
                            <div class="swiper-slide">
                                <div class="testimonial-bx p-0">
                                    <img loading="lazy" class="lazy" src="<?= base_url('public/assets/images/loader2.jpg') ?>"
                                        data-src="<?= base_url('public/uploads/placement/') . $bannerdata->photo ?>"
                                        alt="Recent Placement">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <h3 class="section-title">Top Placement</h3>
            <div class="section-area p-0 m-0">
                <ul class="placement-grid magnific-image">
                    <?php foreach ($placeement as $placementdata) { ?>
                        <li>
                            <div class="ttr-box portfolio-bx">
                                <div class="ttr-media media-ov2 media-effect">
                                    <a href="javascript:void(0);">
                                        <img loading="lazy" class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                                            data-src="<?= base_url('public/uploads/placement/') . $placementdata->photo; ?>"
                                            alt="Top Placement" />
                                    </a>
                                    <div class="ov-box">
                                        <div class="overlay-icon align-m">
                                            <a href="<?= base_url('public/uploads/placement/') . $placementdata->photo; ?>"
                                                class="magnific-anchor" title="Top Placement">
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
    <!-- Content END-->





    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>
    <script>
        $(document).ready(function () {
            $('.ttr-media a[href="javascript:void(0);"]').each(function () {
                var imgSrc = $(this).find('img').attr('data-src');
                $(this).attr('href', imgSrc).addClass('magnific-anchor');
            });

            // Initialize Swiper for Continuous Marquee with Pause on Hover
            var swiper = new Swiper('.placement-swiper', {
                loop: true,
                autoplay: {
                    delay: 0,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
                speed: 8000,
                slidesPerView: 'auto',
                spaceBetween: 30,
                freeMode: true,
                allowTouchMove: true
            });
        });
    </script>
</body>

</html>