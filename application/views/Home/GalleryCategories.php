<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gallery - DigiCoders Technologies | Software Training & Development</title>
    <meta name="description"
        content="Explore the DigiCoders gallery featuring seminars, workshops, MOU signings, and farewell events. See our journey through photos.">

    <meta property="og:title" content="Gallery - DigiCoders Technologies" />
    <meta property="og:description"
        content="Explore the DigiCoders gallery featuring seminars, workshops, MOU signings, and farewell events. See our journey through photos." />
    <meta property="og:url" content="<?= base_url($this->uri->uri_string()) ?>" />
    <link rel="canonical" href="<?= base_url($this->uri->uri_string()) ?>" />

    <?php include('include/headerlinks.php') ?>
    <style>
        .page-banner {
            height: 320px;
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
            font-size: 3rem;
            font-weight: 700;
            color: #fff !important;
            margin: 0;
            letter-spacing: -1.5px;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            line-height: 1.1;
            text-transform: uppercase;
        }

        .page-banner p {
            color: #fff !important;
            font-size: 1.3rem;
            font-weight: 500;
            margin-top: 15px;
            letter-spacing: 0.5px;
            opacity: 0.95;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .page-banner {
                height: 250px;
            }

            .page-banner h1 {
                font-size: 2.2rem;
                letter-spacing: -0.5px;
            }

            .page-banner p {
                font-size: 1.1rem;
            }
        }

        /* CLEAN & SOLID PREMIUM GALLERY CARDS */
        .gallery-card {
            background: #ffffff;
            border-radius: 0;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            transition: none; /* No hover effect requested */
            height: auto;
            display: flex;
            flex-direction: column;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            margin-bottom: 25px;
        }

        .gallery-img-top {
            width: 100%;
            height: 200px;
            overflow: hidden;
            background: #f8fafc;
        }

        .gallery-img-top img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .gallery-footer-info {
            padding: 15px;
            background: #fff;
            display: flex;
            align-items: center;
            gap: 10px;
            border-top: 1px solid #f1f5f9;
        }

        .gallery-icon-box {
            color: rgba(0, 109, 171, 0.9);
            font-size: 1rem;
            flex-shrink: 0;
        }

        .gallery-name-text {
            font-size: 0.9rem; /* Smaller font size as requested */
            font-weight: 600;
            color: #334155;
            margin: 0;
            line-height: 1.2;
            text-transform: uppercase;
            letter-spacing: 0.2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            transition: color 0.3s ease;
        }

        .gallery-card:hover .gallery-name-text {
            color: #E76028;
        }

        .gallery-card:hover .gallery-icon-box {
            color: #E76028;
        }

        /* Responsive adjustments */
        .gallery-grid-row {
            margin-top: 20px;
        }

    </style>
</head>

<body>
    <?php include('include/header.php') ?>

    <div class="page-content bg-white">
        <!-- Banner -->
        <div class="page-banner" title="digicoders-gallery"
            style="background-image:url(<?= base_url('public') ?>/assets/images/banner/dct_banner.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Our Memories</h1>
                    <p class="text-white">Relive the moments of growth, celebration, and innovation</p>
                </div>
            </div>
        </div>

        <!-- Categories Section -->
        <div class="content-block py-5">
            <div class="container py-4">
                <div class="row gallery-grid-row">
                    <?php if(!empty($categories)): foreach($categories as $cat): ?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <a href="<?= base_url('Home/Gallery/'.$cat->slug) ?>" style="text-decoration: none;">
                                <div class="gallery-card">
                                    <div class="gallery-img-top">
                                        <?php 
                                            $thumb = $cat->thumbnail ? 'uploads/category_thumbnails/'.$cat->thumbnail : 'assets/images/banner/dct_banner.jpg';
                                        ?>
                                        <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                                            data-src="<?= base_url('public/'.$thumb) ?>"
                                            alt="<?= $cat->category_name ?>" />
                                    </div>
                                    <div class="gallery-footer-info">
                                        <div class="gallery-icon-box">
                                            <i class="fa fa-folder-open-o"></i>
                                        </div>
                                        <h3 class="gallery-name-text"><?= $cat->category_name ?></h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; else: ?>
                        <div class="col-12 text-center py-5">
                            <h4 class="text-muted">No gallery categories found.</h4>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>
</body>

</html>
