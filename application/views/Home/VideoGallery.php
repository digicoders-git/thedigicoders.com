<!DOCTYPE html>
<html lang="en">

<head>
    <title>Video Gallery - Industrial Training Program - TheDigiCoders</title>
	<meta name="description" content="TheDigiCoders internship training centre in IT Chauraha Lucknow.  See our industrial training programs video gallery at thedigicoders.com">

<meta property="og:title" content="Video Gallery - Industrial Training Program - TheDigiCoders" />
<meta property="og:description" content="TheDigiCoders internship training centre in IT Chauraha Lucknow.  See our industrial training programs video gallery at thedigicoders.com" />
<meta property="og:url" content="https://thedigicoders.com/Home/VideoGallery" />
<link rel="canonical" href="https://thedigicoders.com/Home/VideoGallery" />

<?php include('include/headerlinks.php')  ?>

    <style>
        .videotitle
        {
            white-space: nowrap;
            width: 300px;
            overflow: hidden;
            text-overflow: ellipsis; 
        }
    </style>
</head>

<body>
    <?php include('include/header.php')  ?>


    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(<?= base_url('public') ?>/assets/images/banner/15august.jpeg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Free Trening Videos</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="clearfix">
                <ul id="masonry" class="ttr-gallery-listing magnific-image row mt-5">
                    <?php foreach ($userdata as $videodata)
                    { ?>
                        <li class="action-card col-lg-4 col-md-4 col-sm-12 mb-2">
                            <div class="ttr-box portfolio-bx border cours-bx mr-2 ml-2">
                                <div class="ttr-media">
                                    <div class="video-bx mb-3">
                                        <img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src=" <?= base_url('public/uploads/videos/') . $videodata->image ?>" title="VideoGallery" alt="VideoGallery" style="height:187px; width:100%; " />
                                        <a href="<?= $videodata->video_url ?>" class="popup-youtube video"><i class="fa fa-play"></i></a>
                                        <center class="mt-3"><span class="text-center font-weight-bold videotitle"><?= strtoupper($videodata->title) ?></span></center>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- @section scripts{ -->
    <script>
        $(document).ready(function() {
            $('#lightgallery').lightGallery();
        });
    </script>


    <!-- } -->



    <?php include('include/footer.php')  ?>
    <?php include('include/jslinks.php')  ?>
</body>

</html>