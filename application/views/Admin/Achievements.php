<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Achievements List - <?= $this->data['app_name'] ?></title>
    <?php include('include/headerlinks.php'); ?>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <?php include('include/header.php'); ?>
        <!--end top header-->

        <!--start sidebar -->
        <?php include('include/sidebar.php'); ?>
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">All Achievements List</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('Admin/Dashboard') ?>"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-header py-3">
                    <div class="row align-items-center m-0">
                        <div class="col-6">
                            <h6>Manage Achievements List</h6>
                        </div>
                        <div class="col-6">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#AchievementsModal"><i class="fa fa-plus"></i>&ensp;Add New</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Action</th>
                                    <th>Display Status</th>
                                    <th>Title</th>
                                    <th>Role</th>
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Time</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sr = 1;
                                foreach ($userdata as $data)
                                {

                                ?>
                                    <tr>
                                        <td><?= $sr++ ?></td>
                                        <td>
                                            <div class="col">
                                                <div class="btn-group">
                                                    <button type="button" onclick="deleteItem(<?= $data->id ?>,'achievemens','<?= $data->image ?>','<?= base_url('Admin/deleteWithFilename') ?>')" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                                    <button onclick="EditData('achievemens', <?= $data->id ?>, 'Edit Achievemens')" type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" onchange="ChnageStatus(<?= $data->id ?>,<?= $data->status ?>,'achievemens','<?= base_url('Admin/ChangeStatus') ?>')" id="flexSwitchCheckChecked" <?php if ($data->status == 'true')
                                                                                                                                                                                                                                                    {
                                                                                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                                                                                    } ?>>
                                                <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                            </div>
                                        </td>
                                        <td><?= $data->title; ?></td>
                                        <td><?= $data->role; ?></td>

                                        <td> <a href="<?= base_url('public/uploads/achievemens/') . $data->image; ?>"> <img src="<?= base_url('public/uploads/achievemens/') . $data->image; ?>" alt="" style="height: 150px;"></a></td>

                                        <td><?= $data->date; ?></td>
                                        <td><?= $data->time; ?></td>



                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>





        </main>
        <!--end page main-->

        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
    </div>
    <!--end wrapper-->

    <?php include('include/jslinks.php') ?>

</body>



<div class="modal fade" id="AchievementsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Add Picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Admin/Achievements/Add" enctype="multipart/form-data" method="POST" id="add-achievement" class="form">

				
                    <div class="form-group mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Title">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Role</label>
                        <input type="text" name="role" class="form-control" placeholder="Enter Role">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Upload Image </label>
                        <input type="file" id="input-file-now" name="image" class="dropify" required />
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="submitBtn"><i class="fa fa-spinner fa-spin" style="display:none;" id="<!-- Site Page Continer End -->
<!--====================  footer area ====================-->
<div class=" footer-area-wrapper bg-gray ftbg">
                        <!-- reveal-footer -->
                        <div class="footer-area section-space--ptb_80">
                            <div class="container">
                                <div class="row footer-widget-wrapper">
                                    <div class="col-lg-3 col-md-6 col-sm-6 footer-widget ">
                                        <div class="footer-widget__logo mb-30">
                                            <img src="<?= base_url('public') ?>/assets/images/Digicoders-Logo-with-tagline.png" class="img-fluid footer-logo" title="digicoders-logo" alt="digicoders-logo" />
                                        </div>
                                        <ul class="footer-widget__list">
                                            <li>22-23, Behind State Bank of India Babuganj Branch, Near IT Chauraha, Lucknow, UP, India, 226007</li>
                                            <li><a href="mailto:<?= $this->data['email'] ?>" class="hover-style-link"><?= $this->data['email'] ?></a></li>
                                            <li><a href="tel:<?= $this->data['telephone_no'] ?>" class="hover-style-link text-black font-weight--bold"><?= $this->data['telephone_no'] ?></a></li>
                                            <li><a href="tel:<?= $this->data['mobile_no'] ?>" class="hover-style-link text-black font-weight--bold"><?= $this->data['mobile_no'] ?></a></li>
                                            <li><a href="https://www.digicoders.in/" class="hover-style-link text-color-primary">www.digicoders.in</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 footer-widget mx-auto">
                                        <h6 class="footer-widget__title mb-20">IT Services</h6>
                                        <ul class="footer-widget__list">
                                            <li><a class="hover-style-link" href="<?= base_url() ?>Home/SoftwareDevelopment">Software Development</></a></li>
                                            <li><a class="hover-style-link" href="<?= base_url() ?>Home/WebsiteDevelopment">Website Development</></a></li>
                                            <li><a class="hover-style-link" href="<?= base_url() ?>Home/MobileApplicationDevelopment">Mobile App Development</></a></li>
                                            <li><a class="hover-style-link" href="<?= base_url() ?>Home/DigitalMarketing">Digital Marketing</></a></li>
                                            <li><a class="hover-style-link" href="<?= base_url() ?>Home/GraphicsDesigning">Graphics Designing</></a></li>
                                            <li><a class="hover-style-link" href="<?= base_url() ?>Home/DomainAndHosting">Domain &amp; Hosting</></a></li>

                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 footer-widget mx-auto">
                                        <h6 class="footer-widget__title mb-20">Quick Links</h6>
                                        <ul class="footer-widget__list">
                                            <li><a href="https://rzp.io/l/pa3Rlt0qI" target="_blank" class="hover-style-link">Pay Now</a></li>
                                            <li><a href="<?= base_url() ?>Home/OurProjects" class="hover-style-link">Our Projects</a></li>
                                            <li><a href="<?= base_url() ?>Home/OurGallery" class="hover-style-link">Gallery</a></li>
                                            <li><a href="<?= base_url() ?>Home/TermOfPayment" class="hover-style-link">Terms of Payment</a></li>
                                            <li><a href="<?= base_url() ?>Home/TermsAndConditions" class="hover-style-link">Terms &amp; Condition</a></li>
                                            <li><a href="<?= base_url() ?>Home/RefundAndCancellation" class="hover-style-link">Refund &amp; Cancellation</a></li>

                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 footer-widget mx-auto">
                                        <h6 class="footer-widget__title mb-20">Support</h6>
                                        <ul class="footer-widget__list">
                                            <li><a href="<?= base_url() ?>Home/RequestProposal" class="hover-style-link">Request a Proposal</a></li>
                                            <li><a href="tel:9198483820" class="hover-style-link">Talk to Exeprt</a></li>
                                            <li><a href="<?= base_url() ?>Home/FAQs">Help & FAQ</a></li>
                                            <li><a href="<?= base_url() ?>Home/ContactUs" class="hover-style-link">Contact Us</a></li>
                                            <li><a href="<?= base_url() ?>Home/Packages" class="hover-style-link">Pricing &amp; Packages</a></li>
                                            <li><a href="<?= base_url() ?>Home/Blogs" class="hover-style-link">Blogs</a></li>
                                            <li><a href="<?= base_url() ?>Home/DigiCodersInNews" class="hover-style-link">DigiCoders In News</a></li>
                                        </ul>
                                    </div>

                                </div>


                            </div>
                        </div>

                        <div class="footer-copyright-area section-space--pb_30">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-md-6 text-center text-md-left col-sm-12 footer-icon">
                                        <span class="copyright-text">&copy; 2019 - <?= date("Y") ?> to DigiCoders Technologies (P) Ltd. All Rights Reserved. </span>
                                    </div>
                                    <div class="col-md-6 text-center text-md-right col-sm-12">
                                        <ul class="list ht-social-networks solid-rounded-icon footer-icon">
                                            <li class="item">
                                                <a href="https://api.whatsapp.com/send?phone=91<?= $this->data['mobile_no'] ?>&text=Hello DigiCoders Technologies, I want to discuss about my project" target="_blank" aria-label="WhatsApp" class="social-link hint--bounce hint--top hint--primary">
                                                    <i class="fab fa-whatsapp link-icon"></i>
                                                </a>
                                            </li>

                                            <li class="item">
                                                <a href="https://twitter.com/DigiCodersTech/" target="_blank" rel="noopener" aria-label="Twitter" class="social-link hint--bounce hint--top hint--primary">
                                                    <i class="fab fa-twitter link-icon"></i>
                                                </a>
                                            </li>
                                            <li class="item">
                                                <a href="https://facebook.com/DigiCodersTech/" target="_blank" rel="noopener" aria-label="Facebook" class="social-link hint--bounce hint--top hint--primary">
                                                    <i class="fab fa-facebook-f link-icon"></i>
                                                </a>
                                            </li>
                                            <li class="item">
                                                <a href="https://instagram.com/digicoderstechnologies/" target="_blank" rel="noopener" aria-label="Instagram" class="social-link hint--bounce hint--top hint--primary">
                                                    <i class="fab fa-instagram link-icon"></i>
                                                </a>
                                            </li>
                                            <li class="item">
                                                <a href="https://linkedin.com/company/digicoders/" target="_blank" rel="noopener" aria-label="Linkedin" class="social-link hint--bounce hint--top hint--primary">
                                                    <i class="fab fa-linkedin link-icon"></i>
                                                </a>
                                            </li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

            </div>



            <div id="footer2" class="footer-area-wrapper bg-gray ftbg">
                <!-- reveal-footer -->
                <div class="footer-area section-space--ptb_80">
                    <div class="container">
                    </div>
                </div>

                <div class="footer-copyright-area section-space--pb_30">
                </div>

            </div>

            <!--====================  End of footer area  ====================-->
            <!--====================  scroll top ====================-->
            <a href="#" class="scroll-top" id="scroll-top" aria-label="top-up">
                <i class="arrow-top fal fa-long-arrow-up"></i>
                <i class="arrow-bottom fal fa-long-arrow-up"></i>
            </a>
            <!--====================  End of scroll top  ====================-->
            <!--====================  mobile menu overlay ====================-->
            <div class="mobile-menu-overlay" id="mobile-menu-overlay">
                <div class="mobile-menu-overlay__inner">
                    <div class="mobile-menu-overlay__header">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-8">
                                    <!-- logo -->
                                    <div class="logo">
                                        <a href="<?= base_url() ?>">
                                            <img src="<?= base_url('public') ?>/assets/images/Digicoders-Logo-with-tagline.png" class="img-fluid" title="digicoders-logo" alt="digicoders-logo" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-4">
                                    <!-- mobile menu content -->
                                    <div class="mobile-menu-content text-right">
                                        <span class="mobile-navigation-close-icon" id="mobile-menu-close-trigger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-overlay__body">
                        <nav class="offcanvas-navigation">
                            <ul>
                                <li class="has-children">
                                    <a href="<?= base_url() ?>" aria-label="dropdown"><span>Home</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="<?= base_url() ?>"><span>DigiCoders</span></a></li>
                                        <li><a href="http://www.thedigicoders.com/" target="_blank"><span>The DigiCoders</span></a></li>
                                        <li><a href="https://www.digicoderstechnologies.com/" target="_blank"><span>DigiCoders Technologies</span></a></li>
                                        <li><a href="https://www.codersadda.com/" target="_blank"><span>CodersAdda</span></a></li>
                                        <li><a href="https://www.digitalcoders.in/" target="_blank"><span>DigitalCoders</span></a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#" aria-label="dropdown"><span>Company</span></a>
                                    <ul class="sub-menu">
                                        <li class="has-children">
                                            <a href="<?= base_url() ?>Home/AboutDigiCoders"><span>About us</span></a>
                                            <ul class="sub-menu">
                                                <li><a href="<?= base_url() ?>Home/AboutDigiCoders"><span>About DigiCoders</span></a></li>
                                                <li><a href="<?= base_url() ?>Home/AboutTheDigiCoders"><span>About The DigiCoders</span></a></li>
                                                <li><a href="<?= base_url() ?>Home/AboutDigiCodersTechnologies"><span>About DigiCoders Technologies</span></a></li>
                                                <li><a href="<?= base_url() ?>Home/AboutCodersAda"><span>About CodersAdda</span></a></li>
                                                <li><a href="<?= base_url() ?>Home/AboutDigitalCoders"><span>About DigitalCoders</span></a></li>

                                            </ul>
                                        </li>
                                        <li><a href="<?= base_url() ?>Home/Leadership"><span>Leadership</span></a></li>
                                        <li><a href="<?= base_url() ?>Home/OurExperts"><span>Our experts</span></a></li>
                                        <li><a href="<?= base_url() ?>Home/WhyChooseUs"><span>Why choose us</span></a></li>
                                        <li><a href="<?= base_url() ?>Home/OurHistory"><span>Our history</span></a></li>
                                        <li><a href="<?= base_url() ?>Home/FAQs"><span>FAQs</span></a></li>
                                        <li><a href="<?= base_url() ?>Home/Career"><span>Career</span></a></li>
                                        <li><a href="<?= base_url() ?>Home/ContactUs"><span>Contact us</span></a></li>

                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#" aria-label="dropdown"><span>IT Solutions</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="<?= base_url() ?>Home/ITServices"><span>All Services</span></a></li>
                                        <li><a href="<?= base_url() ?>Home/SoftwareDevelopment"><span>Software Development</span></a></li>
                                        <li><a href="<?= base_url() ?>Home/WebsiteDevelopment"><span>Website Development</span></a></li>
                                        <li><a href="<?= base_url() ?>Home/MobileApplicationDevelopment"><span>Mobile App Development</span></a></li>
                                        <li><a href="<?= base_url() ?>Home/DigitalMarketing"><span>Digital Marketing</span></a></li>
                                        <li><a href="<?= base_url() ?>Home/GraphicsDesigning"><span>Graphics Designing</span></a></li>
                                        <li><a href="<?= base_url() ?>Home/DomainAndHosting"><span>Domain &amp; Hosting</span></a></li>
                                        <li><a href="<?= base_url() ?>Home/ERPandCRMDevelopment"><span>ERP &amp; CRM Development</span></a></li>
                                        <li><a href="<?= base_url() ?>Home/MaintenanceServices"><span>Maintenance Services</span></a></li>
                                        <li><a href="<?= base_url() ?>Home/ITServices"><span>Other IT Services</span></a></li>
                                    </ul>
                                </li>

                                <li class="has-children">
                                    <a href="<?= base_url() ?>Home/OurProjects" aria-label="dropdown"><span>Our Portfolio</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="<?= base_url() ?>Home/OurProjects"><span>Our Projects</span></a></li>
                                        <li><a href="<?= base_url() ?>Home/OurClient"><span>Our Clients</span></a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="<?= base_url() ?>Home/Products"><span>Products</span></a>
                                </li>

                                <li>
                                    <a href="<?= base_url() ?>Home/Packages"><span>Packages</span></a>
                                </li>

                                <li>
                                    <a href="<?= base_url() ?>Home/Blogs"><span>Blogs</span></a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>Home/ContactUs"><span>Contact Us</span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!--====================  End of mobile menu overlay  ====================-->
            <!--====================  search overlay ====================-->
            <div class="search-overlay" id="search-overlay">
                <div class="search-overlay__header">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-6 ml-auto col-4">
                                <!-- search content -->
                                <div class="search-content text-right">
                                    <span class="mobile-navigation-close-icon" id="search-close-trigger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search-overlay__inner">
                    <div class="search-overlay__body">
                        <div class="search-overlay__form">
                            <form action="#">
                                <input type="text" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <script>
                $().ready(function() {
                    $("#callback").validate({});
                })
            </script>
            <script>
                $().ready(function() {
                    $("#contact").validate({});
                })
            </script>
            <script>
                $().ready(function() {
                    $("#request").validate({});
                })
            </script>
            <script>
                $().ready(function() {
                    $("#career").validate({});
                })
            </script>
            <!-- lazy loader script -->
            <script>
                $(function() {
                    $('.lazy').Lazy({

                        bind: "scroll",
                    });
                });
            </script>
            <script>
                $().ready(function() {
                    $("#enquiry").validate({});
                })
            </script>

            <script type="text/javascript">
                var Tawk_API = Tawk_API || {},
                    Tawk_LoadStart = new Date();
                (function() {
                    var s1 = document.createElement("script"),
                        s0 = document.getElementsByTagName("script")[0];
                    s1.async = true;
                    s1.src = 'https://embed.tawk.to/5dcedd1dd96992700fc7a56d/default';
                    s1.charset = 'UTF-8';
                    s1.setAttribute('crossorigin', '*');
                    s0.parentNode.insertBefore(s1, s0);
                })();
            </script>
            <!--End of Tawk.to Script-->
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-041K06SN8R"></script>
            <script>
                window.dataLayer = window.dataLayer || [];

                function gtag() {
                    dataLayer.push(arguments);
                }
                gtag('js', new Date());

                gtag('config', 'G-041K06SN8R');
            </script>

            <script>
                function hideShow(id) {
                    var text = $("#" + id).text();
                    // alert(text);
                    if (text == "Show" || text == "Show") {
                        $(".text12").text("Show");
                        $("#" + id).text("Hide");
                        $(".collapse1").removeClass("Show");
                        $(".") + id.addClass("Show");
                    } else {
                        $(".text12").text("Show");
                        if (text == "Show" || text == "Show") {
                            $("#" + id).text("Hide");
                        } else {
                            $("#" + id).text("Show");
                        }
                    }
                }
            </script>
            <!--End of Tawk.to Script-->
            <!-- @RenderSection("scripts", false) -->
            <!----request call back modal-------->
            <!-- Modal -->

            <!-- @if (TempData["popupkey"] == "CallBackRequestSuccess")
		{
		<script>
		swal("Call Back Request!", "Your Request Saved Successfully!", "success");
		</script>
		}
		@if (TempData["Msg"] == "This is Message")
		{
		<script>
		swal("Contact Request!", "Your Contact Request Saved Successfully!", "success");
		</script>
		}
		@if (TempData["Quick"] == "msg")
		{
		<script>
		swal("Enquiry Request!", "Your Quick Enquiry Request Saved Successfully!", "success");
		</script>
		}
		@if (TempData["Request"] == "Proposal")
		{
		<script>
		swal("Proposal Request!", "Your Proposal Request Saved Successfully!", "success");
		</script>
		}
		@if (TempData["Career"] == "Career")
		{
		<script>
		swal("Career Details!", "Your Career Details Saved Successfully!", "success");
		</script>
		} -->

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Request Call Back</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('Home/SubmitForm/callBackReq') ?>" method="post" id="callBackRreq-form">
                                <div class="contact-form">
                                    <div class="contact-input">
                                        <div class="contact-inner">
                                            <span>Name</span>
                                            <input name="Name" type="text" placeholder="Name *" required>
                                        </div>
                                        <div class="contact-inner">
                                            <span>Mobile</span>
                                            <input name="Mobile" type="number" placeholder="Mobile *" required maxlength="10" min="10">
                                        </div>
                                    </div>
                                    <div class="contact-input">
                                        <div class="contact-inner">
                                            <span>Date</span>
                                            <input name="Date1" type="date" required>
                                        </div>
                                        <div class="contact-inner">
                                            <span>Timing</span>
                                            <select name="Timing" class="select-item">
                                                <option value="">Timing</option>
                                                <option>10AM- 12PM</option>
                                                <option>12PM- 2PM</option>
                                                <option>2PM- 4PM</option>
                                                <option>4PM- 7PM</option>
                                            </select><br /><br /><br />
                                        </div>
                                    </div>

                                </div>
                                <div class="submit-btn mt-20">
                                    <button class="ht-btn ht-btn-md" type="submit" id="btnsa">Submit</button>
                                    <!-- @*<p class="form-messege"></p>*@ -->
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


            <!-------//request call back modal--->
            <!--float button-->

            <div id="feedback2">
                <a href="https://www.thedigicoders.com/Home/Registration" target="_blank" aria-label="left-align">Register For Training</a>
            </div> "></i>&ensp;Save changes</button>
        </div>
        </form>
    </div>
</div>
</div>

</html>
<script>
    $('.dropify').dropify();
</script>