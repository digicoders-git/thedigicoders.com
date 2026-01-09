<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog - Industrial Training Program for Engineering Students</title>
    <meta name="description"
        content="Browse our photos and know about our services and software development training programs in Lucknow. Contact us for apprenticeship registration and more!">

    <meta property="og:title" content="Photos - Industrial Training Program for Engineering Students" />
    <meta property="og:description"
        content="Browse our photos and know about our services and software development training programs in Lucknow. Contact us for apprenticeship registration and more!" />
    <meta property="og:url" content="https://thedigicoders.com/Home/Photos" />
    <link rel="canonical" href="https://thedigicoders.com/Home/Photos" />

    <?php include('include/headerlinks.php') ?>
</head>

<body>
    <?php include('include/header.php') ?>

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" title="digocoders-blogs"
            style="background-image:url(<?= base_url('public') ?>/assets/images/banner/15august.jpeg); ">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Blog</h1>
                </div>
            </div>
        </div>
        <br>
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
                                <img class="lazy card-img-top" 
                                    src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                                    data-src="<?= base_url('public/uploads/blog/' . $data->img) ?>" 
                                    title="digicoders-lucknow-blogs" 
                                    alt="digicoders-lucknow-blogs" 
                                    style="height:200px; object-fit:cover;"/>
                            </div>
                            <div class="info-bx text-center card-body">
                                <h5 class="card-title"><?= $data->title ?></h5>
                                <p class="card-text"><?= $data->subtitle ?></p>
                                <a class="btn btn-primary mt-2" href="<?= base_url('Home/Blogdeatils/' . $data->id) ?>">Read More</a>
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