<!DOCTYPE html>
<html lang="en">

<head>
    <title>Event - Vocational Training, Summer Training, Apprenticeship Training</title>
	<meta name="TheDigiCoders, a web and app development training program for engineering students, provides job-oriented training classes. See our training events at thedigicoders.com.">
  
	<meta property="og:title" content="Event - Vocational Training, Summer Training, Apprenticeship Training" />
<meta property="og:description" content="TheDigiCoders, a web and app development training program for engineering students, provides job-oriented training classes. See our training events at thedigicoders.com." />
<meta property="og:url" content="https://thedigicoders.com/Home/Event" />
<link rel="canonical" href="https://thedigicoders.com/Home/Event" />
	 
	 <?php include('include/headerlinks.php')  ?>
</head>

<body>
    <?php include('include/header.php')  ?>

    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(<?= base_url('public') ?>/assets/images/banner/banner5.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Events</h1>
                </div>
            </div>
        </div>
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="<?= base_url() ?>Home/Index">Home</a></li>
                    <li>Events</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="content-block">
            <!-- Portfolio  -->
            <div class="section-area section-sp1 gallery-bx">
                <div class="container">
                    <div class="clearfix">
                        <ul id="masonry" class="ttr-gallery-listing magnific-image row">

                            <?php foreach ($userdata as $eventdata)
                            {  ?>
                                <li class="action-card col-lg-6 col-md-6 col-sm-12 happening">
                                    <div class="event-bx m-b30">
                                        <div class="action-box">
                                            <img class="lazy" src="<?= base_url('public') ?>/assets/images/loader1.jpg" data-src="<?= base_url('public/uploads/event/') . $eventdata->image ?>" title="events-img" alt="events-img" style="height:340px;">
                                        </div>
                                        <div class="info-bx d-flex">
                                            <div>
                                                <div class="event-time">
                                                    <div class="event-date">
                                                        <?php
                                                        $date =  $eventdata->event_date;
                                                        echo  date('d', strtotime($date));

                                                        ?>
                                                    </div>
                                                    <div class="event-month">
                                                        <?php
                                                        $date =  $eventdata->event_date;
                                                        echo  date('M', strtotime($date));

                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="event-info">
                                                <h4 class="event-title"><?= $eventdata->title ?></h4>
                                                <p>
                                                    <?= $eventdata->description ?>

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact area END -->
    </div>
    <!-- Content END-->






    <?php include('include/footer.php')  ?>
    <?php include('include/jslinks.php')  ?>
</body>

</html>