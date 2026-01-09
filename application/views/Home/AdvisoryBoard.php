<!DOCTYPE html>
<html lang="en">
<head>
<title>Advisory Board - Home - Vocational Training | Summer Training | Winter Training | Industrial Training | Apprenticeship Training | Internship Training | Syllabus Training | Faculty Training</title>
<?php include('include/headerlinks.php') ?>

</head>
<body>
<?php include('include/header.php') ?>


<!-- @*<div class="home">
    <div class="demo-gallery">
        <ul id="lightgallery" class="list-unstyled row">
            @foreach (var item in Model)
            {
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsiv="@Url.Content("~/Content/Uploads/Placement/"+item.Image) 375, @Url.Content("~/Content/Uploads/Placement/"+item.Image) 480, @Url.Content("~/Content/Uploads/Placement/"+item.Image) 800" data-src="@Url.Content("~/Content/Uploads/Placement/"+item.Image)" data-sub-html="<h4>Fading Light</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                    <a href="">
                        <img class="img-responsive" src="@Url.Content("~/Content/Uploads/Placement/"+item.Image)">
                    </a>
                </li>
            }
           
        </ul>
    </div>
</div>*@ -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner1.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Our Advisory Board</h1>
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <div class="content-block">
        <!-- About Us -->
        <div class="section-area section-sp1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 m-b30">
                        <h1>
                            We pride ourselves on having a team
                            of highly-skilled Advisors.
                        </h1>
                        <div class="profile-content-bx">
                            <div class="tab-content">
                                <div class="tab-pane active" id="courses">
                                    <div class="courses-filter">
                                        <div class="clearfix">
                                            <div class="demo-gallery">
                                                <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                    <!-- @foreach start (var item in Model) -->
                                                    <!-- { -->
                                                        <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                            <div class="cours-bx">
                                                                <div class="action-box">
                                                                    <img src="@Url.Content("~/Content/Uploads/Advisory/"+item.Image)" title="Advisory-board" alt="Advisory-board" style="height:340px;" />
                                                                </div>
                                                                <div class="info-bx text-center">
                                                                    <h5>@item.Name</h5>
                                                                    <span>@item.Designation</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <!-- } ens foreach loop -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<?php include('include/footer.php') ?>
<?php include('include/jslinks.php') ?>
</body>
</html>