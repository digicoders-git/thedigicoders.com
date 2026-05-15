<!DOCTYPE html>
<html lang="en">

<head>
    <title>Video Gallery | Best IT Training - DigiCoders Technologies Pvt. Ltd.</title>
    <meta name="description"
        content="Explore our library of training videos at DigiCoders Technologies Pvt. Ltd. See our students in action and learn more about our industrial training programs in Lucknow.">

    <meta property="og:title" content="Video Gallery | Best IT Training - DigiCoders Technologies Pvt. Ltd." />
    <meta property="og:description"
        content="Explore our library of training videos at DigiCoders Technologies Pvt. Ltd. See our students in action and learn more about our industrial training programs in Lucknow." />
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

        .videotitle {
            white-space: nowrap;
            width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
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
        <div class="container">
            <div class="clearfix">
                
                        <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                            <?php foreach($items as $item): ?>
                                <li class="action-card col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                    <div class="ttr-box portfolio-bx border cours-bx">
                                        <div class="ttr-media media-ov2 media-effect">
                                            <?php if($item->media_type == "image"): ?>
                                                <a href="<?= base_url('public/'.$item->media_url); ?>" class="magnific-anchor" title="<?= $item->title; ?>">
                                                    <img loading="lazy" class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                                                        data-src="<?= base_url('public/'.$item->media_url); ?>"
                                                        alt="<?= $item->alt_text; ?>" style="height:240px; object-fit:cover;" />
                                                </a>
                                                <div class="ov-box">
                                                    <div class="overlay-icon align-m">
                                                        <a href="<?= base_url('public/'.$item->media_url); ?>"
                                                            class="magnific-anchor" title="<?= $item->title; ?>">
                                                            <i class="ti-search"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="video-container" style="height:240px;">
                                                    <iframe width="100%" height="100%" src="<?= $item->media_url; ?>" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
            </div>
        </div>
    </div>

    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>
</body>

</html>