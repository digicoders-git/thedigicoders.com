<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $userdata->title ?> | DigiCoders Blog</title>
    <meta name="description"
        content="<?= $userdata->subtitle ?>">

    <meta property="og:title" content="<?= $userdata->title ?> | DigiCoders Blog" />
    <meta property="og:description"
        content="<?= $userdata->subtitle ?>" />
    <meta property="og:url" content="<?= base_url($this->uri->uri_string()) ?>" />
    <link rel="canonical" href="<?= base_url($this->uri->uri_string()) ?>" />

    <?php include('include/headerlinks.php') ?>

    <style>
        :root {
            --orange: #E76028;
            --blue: #006DAB;
            --dark: #111;
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--dark);
            line-height: 1.6;
        }

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

        /* Hero Banner */
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
            font-size: 2.8rem;
            font-weight: 600;
            margin: 0;
            letter-spacing: -1px;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .page-banner-entry {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        .lead-text {
            font-size: 1.25rem;
            opacity: 0.9;
            font-weight: 500;
        }

        /* Blog Details Styling */
        .blog-content-area {
            padding: 50px 0;
        }

        .blog-main-img {
            width: 100%;
            border-radius: 0px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        .blog-title {
            font-size: 2.2rem;
            margin-bottom: 15px;
            color: var(--blue);
        }

        .blog-subtitle {
            font-size: 1.3rem;
            color: #555;
            margin-bottom: 25px;
            font-weight: 500;
            border-left: 4px solid var(--orange);
            padding-left: 15px;
        }

        .blog-text {
            font-size: 1.1rem;
            color: #333;
            text-align: justify;
        }

        .blog-text img {
            max-width: 100%;
            height: auto !important;
            border-radius: 0px;
            margin: 20px 0;
            display: block;
        }

        /* Sidebar Styling */
        .sidebar-sticky {
            position: sticky;
            top: 100px;
        }

        .sidebar-widget {
            background: #fff;
            padding: 25px;
            border-radius: 0px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            border: 1px solid #f0f0f0;
        }

        .widget-title {
            font-size: 1.4rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--orange);
            display: inline-block;
        }

        .recent-blog-item {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f5f5f5;
            transition: var(--transition);
        }

        .recent-blog-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .recent-blog-item:hover {
            transform: translateX(5px);
        }

        .recent-blog-img {
            width: 80px;
            height: 60px;
            border-radius: 6px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .recent-blog-info h6 {
            font-size: 0.95rem;
            margin: 0 0 5px 0;
            line-height: 1.3;
        }

        .recent-blog-info h6 a {
            color: var(--dark);
            text-decoration: none;
            transition: var(--transition);
        }

        .recent-blog-info h6 a:hover {
            color: var(--blue);
        }

        .recent-blog-date {
            font-size: 0.8rem;
            color: #888;
        }

        /* Placement Sidebar Slider */
        .sidebar-placement-swiper {
            margin-bottom: 30px;
            overflow: hidden;
            border-radius: 0px;
            padding: 15px; /* Added padding to make images smaller */
            background: #fdfdfd;
        }

        .sidebar-placement-swiper .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .sidebar-placement-swiper .swiper-slide img {
            width: 85%; /* Reduced width */
            height: auto;
            display: block;
            border-radius: 4px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        @media (max-width: 991px) {
            .blog-title {
                font-size: 1.8rem;
            }

            .sidebar-sticky {
                position: static;
                margin-top: 40px;
            }
        }
    </style>
</head>

<body>
    <?php include('include/header.php') ?>

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- Premium Hero Banner ==== -->
        <div class="page-banner"
            style="background-image:url(<?= base_url('public') ?>/assets/images/banner/dct_banner.jpg);">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1 class="text-white">Blog Insights</h1>
                    <p class="text-white mt-3 lead-text">Latest news and technical updates from DigiCoders</p>
                </div>
            </div>
        </div>

        <div class="blog-content-area">
            <div class="container">
                <div class="row">
                    <!-- Left: Main Blog Content -->
                    <div class="col-lg-8">
                        <div class="blog-details-inner">
                            <h2 class="blog-title"><?= $userdata->title ?></h2>
                            <div class="blog-subtitle"><?= $userdata->subtitle ?></div>

                            <img loading="lazy" class="lazy blog-main-img" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                                data-src="<?= base_url('public/uploads/blog/' . $userdata->img) ?>"
                                alt="<?= $userdata->title ?>" />

                            <div class="blog-text">
                                <?= $userdata->content ?>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Sidebar -->
                    <div class="col-lg-4">
                        <div class="sidebar-sticky">
                            <!-- Placement Slider Widget -->
                            <?php if (!empty($banner_place)): ?>
                                <div class="sidebar-widget p-0 overflow-hidden">
                                    <div class="d-flex justify-content-between align-items-center p-3">
                                        <h4 class="widget-title mb-0" style="border-bottom: none;">Placements</h4>
                                        <a href="<?= base_url('Home/Placement') ?>" style="font-size: 0.8rem; font-weight: 700; color: var(--orange); text-decoration: underline;">View All</a>
                                    </div>
                                    <div class="swiper sidebar-placement-swiper">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($banner_place as $bp): ?>
                                                <div class="swiper-slide">
                                                    <img loading="lazy" src="<?= base_url('public/uploads/placement/' . $bp->photo) ?>"
                                                        alt="Placement" class="img-fluid">
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="sidebar-widget">
                                <h4 class="widget-title">Recent Posts</h4>
                                <div class="recent-blogs-list">
                                    <?php if (!empty($recent_blogs)): ?>
                                        <?php foreach ($recent_blogs as $rb): ?>
                                            <div class="recent-blog-item">
                                                <img loading="lazy" src="<?= base_url('public/uploads/blog/' . $rb->img) ?>" alt="blog"
                                                    class="recent-blog-img">
                                                <div class="recent-blog-info">
                                                    <h6><a
                                                            href="<?= base_url('home/blogdetails/' . $rb->id) ?>"><?= $rb->title ?></a>
                                                    </h6>
                                                    <span class="recent-blog-date">DigiCoders Insights</span>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p>No other posts found.</p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- CTA Widget -->
                            <div class="sidebar-widget bg-light"
                                style="background: linear-gradient(135deg, var(--blue) 0%, #004a75 100%); color: #fff;">
                                <h4 class="widget-title text-white" style="border-bottom-color: #fff;">Need Training?
                                </h4>
                                <p style="color: rgba(255,255,255,0.9); font-size: 0.95rem;">Start your professional
                                    journey with DigiCoders Technologies today.</p>
                                <a href="<?= base_url() ?>Home/Registration" class="btn btn-warning w-100 mt-3"
                                    style="background: var(--orange); border: none; color: #fff; font-weight: 700;">REGISTER
                                    NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area END -->
    </div>
    <!-- Content END-->
    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var sidebarPlacementSwiper = new Swiper(".sidebar-placement-swiper", {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
            });
        });
    </script>
</body>

</html>