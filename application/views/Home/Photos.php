<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $category->h1_title ?: $category->category_name; ?> - DigiCoders Technologies</title>
    <meta name="description" content="<?= strip_tags($category->description_text); ?>">

    <meta property="og:title"
        content="<?= $category->h1_title ?: $category->category_name; ?> - DigiCoders Technologies" />
    <meta property="og:description" content="<?= strip_tags($category->description_text); ?>" />
    <meta property="og:url" content="<?= base_url($this->uri->uri_string()) ?>" />
    <link rel="canonical" href="<?= base_url($this->uri->uri_string()) ?>" />
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
            font-weight: 600;
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

        /* Gallery Card Styles */
        .gallery-card {
            background: #ffffff;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            transition: all 0.4s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            text-decoration: none !important;
            position: relative;
            border: 2px solid transparent;
            /* Prepare for hover border */
        }

        .gallery-card:hover {
            box-shadow: 0 15px 30px rgba(255, 94, 20, 0.2);
            border-color: #ff5e14;
            /* Theme border on hover */
        }

        .gallery-media {
            position: relative;
            overflow: hidden;
            height: 240px;
            /* Restored original height */
            background: #f8f9fa;
            width: 100%;
        }

        .gallery-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .gallery-card:hover .gallery-media img {
            transform: scale(1.08);
        }

        .gallery-info {
            padding: 15px;
            text-align: center;
            background: #fff;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        .gallery-info h6 {
            font-size: 0.95rem;
            font-weight: 700;
            color: #222;
            margin: 0;
            line-height: 1.4;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .video-play-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 50px;
            color: #fff;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            z-index: 2;
            opacity: 0.9;
            transition: all 0.3s ease;
        }

        .gallery-card:hover .video-play-icon {
            transform: translate(-50%, -50%) scale(1.15);
            color: #ff5e14;
        }

        /* Lightbox Fixes */
        .mfp-wrap {
            overflow: hidden !important;
        }

        .mfp-img {
            max-height: 90vh !important;
            padding: 40px 0 !important;
        }

        /* Sidebar Styles */
        .gallery-sidebar {
            background: #fff;
            border: 1px solid rgba(0, 0, 0, 0.06);
            padding: 25px 20px;
            position: sticky;
            top:80px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
            border-radius: 0px;
        }

        .sidebar-header {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f1f1f1;
        }

        .sidebar-title {
            font-size: 1.15rem;
            font-weight: 800;
            color: #111;
            margin: 0;
            white-space: nowrap;
            /* Prevent wrapping */
        }

        /* Removed right line accent as requested */

        .category-scroll-container {
            max-height: calc(100vh - 250px);
            overflow-y: auto;
            padding-right: 5px;
        }

        /* Custom Scrollbar */
        .category-scroll-container::-webkit-scrollbar {
            width: 4px;
        }

        .category-scroll-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .category-scroll-container::-webkit-scrollbar-thumb {
            background: #ff5e14;
            border-radius: 10px;
        }

        .category-scroll-container::-webkit-scrollbar-thumb:hover {
            background: #e76028;
        }

        .category-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .category-item {
            margin-bottom: 8px;
        }

        .category-link {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: #444;
            font-size: 0.95rem;
            font-weight: 600;
            text-decoration: none !important;
            transition: all 0.3s ease;
            border-radius: 4px;
            background: #fdfdfd;
            border: 1px solid #f1f1f1;
        }

        .category-link i {
            margin-right: 12px;
            font-size: 1.1rem;
            color: #ff5e14;
            transition: all 0.3s ease;
        }

        .category-link:hover {
            background: #fff5f0;
            color: #ff5e14 !important;
            /* Explicitly override any global link hover color */
            border-color: #ff5e14;
            padding-left: 20px;
        }

        .category-link.active {
            background: #ff5e14;
            color: #fff !important;
            border-color: #ff5e14;
            box-shadow: 0 4px 12px rgba(255, 94, 20, 0.2);
        }

        .category-link.active i {
            color: #fff;
        }

        @media (max-width: 991px) {
            .gallery-sidebar {
                position: sticky;
                top: 70px;
                z-index: 99;
                margin-top: -20px;
                padding: 10px;
                background: #fff;
                border-radius: 0;
                box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            }

            .sidebar-header {
                display: none;
            }

            .category-scroll-container {
                max-height: none;
                overflow-x: auto;
                overflow-y: hidden;
                display: flex;
                padding-bottom: 5px;
            }

            .category-scroll-container::-webkit-scrollbar {
                height: 3px;
            }

            .category-list {
                display: flex;
                flex-direction: row;
                gap: 10px;
                width: max-content;
            }

            .category-item {
                margin-bottom: 0;
            }

            .category-link {
                white-space: nowrap;
                padding: 8px 15px;
                font-size: 0.85rem;
            }
            
            .category-link i {
                font-size: 0.9rem;
                margin-right: 8px;
            }

            .gallery-bx {
                padding-top: 20px;
            }
        }
    </style>

    <?php include('include/headerlinks.php') ?>
</head>

<body>
    <?php include('include/header.php') ?>

    <div class="page-content bg-white">
        <div class="page-banner">
            <div class="container">
                <div class="page-banner-entry">
                    <h1><?= $category->h1_title ?: $category->category_name; ?></h1>
                    <p><?= $category->description_text; ?></p>
                </div>
            </div>
        </div>
        <br>
        <!-- contact area -->
        <div class="content-block">
            <!-- Portfolio  -->
            <div class="section-area section-sp1 gallery-bx">
                <div class="container">
                    <div class="row">
                        <!-- Left Sidebar -->
                        <div class="col-lg-3 col-md-12">
                            <div class="gallery-sidebar">
                                <div class="sidebar-header">
                                    <h4 class="sidebar-title">Explore Collections</h4>
                                </div>
                                <div class="category-scroll-container">
                                    <ul class="category-list">
                                        <?php if (!empty($gallery_categories)):
                                            foreach ($gallery_categories as $gcat): ?>
                                                <li class="category-item">
                                                    <a href="<?= base_url('home/gallery/' . $gcat->slug) ?>"
                                                        class="category-link <?= ($this->uri->segment(3) == $gcat->slug) ? 'active' : '' ?>">
                                                        <i class="fa fa-folder-open-o"></i>
                                                        <?= $gcat->category_name ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Main Content -->
                        <div class="col-lg-9 col-md-12">
                            <div class="clearfix">


                                <?php
                                if (!function_exists('get_youtube_id')) {
                                    function get_youtube_id($url)
                                    {
                                        $url = trim($url);
                                        $patterns = [
                                            '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i',
                                            '/youtube\.com\/shorts\/([^"&?\/\s]{11})/i'
                                        ];
                                        foreach ($patterns as $pattern) {
                                            if (preg_match($pattern, $url, $matches)) {
                                                return $matches[1];
                                            }
                                        }
                                        return false;
                                    }
                                }
                                ?>
                                <ul class="ttr-gallery-listing magnific-image row">
                                    <?php if (!empty($items)):
                                        foreach ($items as $item): ?>
                                            <li class="action-card col-xs-6 col-sm-6 col-md-4 col-lg-4 mb-4 d-flex">
                                                <?php if ($item->media_type == "image"): ?>
                                                    <a href="<?= base_url('public/' . $item->media_url); ?>"
                                                        class="magnific-anchor gallery-card w-100" title="<?= $item->title; ?>">
                                                        <div class="gallery-media">
                                                            <img loading="lazy" class="lazy"
                                                                src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                                                                data-src="<?= base_url('public/' . $item->media_url); ?>"
                                                                alt="<?= $item->alt_text; ?>" />
                                                        </div>
                                                        <!-- <div class="gallery-info">
                                                        <h6><?= $item->title; ?></h6>
                                                    </div> -->
                                                    </a>
                                                <?php elseif ($item->media_type == "video"): ?>
                                                    <?php
                                                    $yt_id = get_youtube_id($item->media_url);
                                                    $thumb = $yt_id ? "https://img.youtube.com/vi/$yt_id/hqdefault.jpg" : base_url('public/assets/images/video_placeholder.jpg');
                                                    ?>
                                                    <a href="<?= $item->media_url; ?>" class="magnific-video gallery-card w-100"
                                                        title="<?= $item->title; ?>">
                                                        <div class="gallery-media">
                                                            <img loading="lazy" src="<?= $thumb; ?>" alt="<?= $item->alt_text; ?>" />
                                                            <i class="fa fa-play-circle video-play-icon"></i>
                                                        </div>
                                                        <!-- <div class="gallery-info">
                                                        <h6><?= $item->title; ?></h6>
                                                    </div> -->
                                                    </a>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; else: ?>
                                        <div class="col-12 text-center py-5">
                                            <h3 class="text-muted">No items found in this gallery.</h3>
                                        </div>
                                    <?php endif; ?>
                                </ul>

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
        $(document).ready(function () {
            $('.magnific-anchor').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });

            $('.magnific-video').magnificPopup({
                type: 'iframe',
                iframe: {
                    patterns: {
                        youtube: {
                            index: 'youtube.com/',
                            id: 'v=',
                            src: 'https://www.youtube.com/embed/%id%?autoplay=1'
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>