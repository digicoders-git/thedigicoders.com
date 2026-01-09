<!DOCTYPE html>
<html lang="en">
<head>
<title>Placement Partner - TheDigiCoders</title>
<meta name="description" content="">
<?php include('include/headerlinks.php') ?>
</head>
<body>
<?php include('include/header.php') ?>



@model IEnumerable<TheDigiCoders.Models.Table_Placement>
@{
    ViewBag.Title = "Placement Partners";
    Layout = "~/Views/Shared/_Home_layout.cshtml";
}


<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="page-banner ovbl-dark" style="background-image:url(<?= base_url('public')?>/assets/images/banner/banner1.jpg);">
        <div class="container">
            <div class="page-banner-entry">
                <h1 class="text-white">Our Placement Partners</h1>
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
                        <div class="profile-content-bx">
                            <div class="tab-content">
                                <div class="tab-pane active" id="courses">
                                    <div class="courses-filter">
                                        <div class="clearfix">
                                            <ul id="masonry" class="ttr-gallery-listing magnific-image row">
                                                <!-- @foreach start loop (var item in Model)
                                                { -->
                                                    <li class="action-card col-xl-4 col-lg-6 col-md-12 col-sm-6 publish">
                                                        <div class="cours-bx">
                                                            <div class="action-box">
                                                                <img src="@Url.Content("~/Content/Uploads/Placement/"+item.Image)" title="placement partners" alt="placement partners" style="height:340px;" />
                                                            </div>
                                                            <div class="info-bx text-center">
                                                                <h5>@item.Name</h5>
                                                                <span>@item.Designation</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <!-- } end foreach loop -->
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

<?php include('include/footer.php') ?>
<?php include('include/jslinks.php') ?>
</body>
</html>