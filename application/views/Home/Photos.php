<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $category->h1_title ?: $category->category_name; ?> - DigiCoders Technologies</title>
    <meta name="description"
        content="<?= strip_tags($category->description_text); ?>">

    <meta property="og:title" content="<?= $category->h1_title ?: $category->category_name; ?> - DigiCoders Technologies" />
    <meta property="og:description"
        content="<?= strip_tags($category->description_text); ?>" />
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
            font-weight: 800;
            color: #fff;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: -1.5px;
            text-shadow: 0 10px 30px rgba(0,0,0,0.2);
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
            .page-banner { height: 250px; }
            .page-banner h1 { font-size: 1.8rem; letter-spacing: -1px; }
            .page-banner p { font-size: 1rem; }
        }

        .ttr-media img {
            object-fit: cover;
            object-position: center;
        }
        .video-container {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 */
            height: 0;
            width: 100%;
            overflow: hidden;
            border-radius: 12px;
            background: #000;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
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
                <div class="clearfix">
                    
                        
                        <?php 
                            function get_youtube_id($url) {
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
                        ?>
                        <ul class="ttr-gallery-listing magnific-image row">
                            <?php if(!empty($items)): foreach($items as $item): ?>
                                <li class="action-card col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <div class="ttr-box portfolio-bx border cours-bx">
                                        <div class="ttr-media media-ov2 media-effect">
                                            <?php if($item->media_type == "image"): ?>
                                                <a href="<?= base_url('public/'.$item->media_url); ?>" class="magnific-anchor" title="<?= $item->title; ?>">
                                                    <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                                                        data-src="<?= base_url('public/'.$item->media_url); ?>"
                                                        alt="<?= $item->alt_text; ?>" style="height:240px; object-fit:cover; width:100%;" />
                                                </a>
                                                <div class="ov-box">
                                                    <div class="overlay-icon align-m">
                                                        <a href="<?= base_url('public/'.$item->media_url); ?>"
                                                            class="magnific-anchor" title="<?= $item->title; ?>">
                                                            <i class="ti-search"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php elseif($item->media_type == "video"): ?>
                                                <?php 
                                                    $yt_id = get_youtube_id($item->media_url);
                                                    $thumb = $yt_id ? "https://img.youtube.com/vi/$yt_id/hqdefault.jpg" : base_url('public/assets/images/video_placeholder.jpg');
                                                ?>
                                                <a href="<?= $item->media_url; ?>" class="magnific-video" title="<?= $item->title; ?>">
                                                    <img src="<?= $thumb; ?>" alt="<?= $item->alt_text; ?>" style="height:240px; object-fit:cover; width:100%;" />
                                                    <div class="ov-box">
                                                        <div class="overlay-icon align-m">
                                                            <i class="fa fa-play-circle" style="font-size: 50px; color: #fff;"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                                <h6 class="p-2 text-center" style="font-size: 14px;"><?= $item->title; ?></h6>
                                            <?php endif; ?>
                                        </div>
                                    </div>
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
    <!-- contact area END -->
    </div>
    <!-- Content END-->

    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>
    <script>
        $(document).ready(function() {
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
