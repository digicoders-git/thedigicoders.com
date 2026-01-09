<link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
<div id="loading-icon-bx"></div>
<header class="header rs-nav">
    <div class="top-bar">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="topbar-left">
                    <ul>
                        <li><i class="ti-mobile"></i><a href="tel:+91 9198483820">+91 9198483820</a></li>
                        <!--<li><a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-question-circle"></i>Ask a Question</a></li>
                       <li><a href="mailto:info@thedigicoders.com" target="_blank"><i class="fa fa-envelope-o"></i>info@thedigicoders.com</a></li>-->
                    </ul>
                </div>
                <div class="topbar-right">
                    <ul>
                        <li><a href="<?= base_url('public') ?>/assets/images/DigiCoders_2026_Company_Profile.pdf"
                                target="_blank" download onclick="OpenSocialModal()"><i class="fa fa-download"></i>
                                Company Profile</a></li>
                        <li><a href="<?= base_url('public') ?>/assets/images/DigiCoders_2026_Training_Brochure.pdf"
                                target="_blank" download onclick="OpenSocialModal()"><i class="fa fa-download"></i>
                                Training Broucher</a></li>
                        <li><a href="<?= base_url('public') ?>/assets/images/DigiCoders_2026_Placement_Brochure.pdf"
                                target="_blank" download onclick="openSocial()"><i class="fa fa-download"></i> Placement
                                Broucher</a></li>
                        <!-- @*<li><a href="<?= base_url() ?>Home/FeePayment">Fee Payment</a></li>*@ -->
                        <li><a href="<?= base_url() ?>Home/Registration"><i class="fa fa-solid fa-pencil"></i> Register
                                For Training</a></li>
                        <li><a href="https://thedigicoders.com/Home/UserLogin" target="_blank"> <i
                                    class="ri-login-box-line"></i> Login</a></li>
                        <li><a target="_blank" href="https://www.facebook.com/DigiCodersTech/" class="btn-link"
                                aria-label="facebook" rel="noopener"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="https://twitter.com/DigiCodersTech/" class="btn-link"
                                aria-label="twitter" rel="noopener"><i class="ri-twitter-x-fill"></i></a></li>
                        <li><a target="_blank" href="https://www.linkedin.com/company/digicoders" class="btn-link"
                                aria-label="linkedin" rel="noopener"><i class="fa fa-linkedin"></i></a></li>
                        <li><a target="_blank"
                                href="https://api.whatsapp.com/send?phone=919198483820&text=I have a query"
                                class="btn-link" aria-label="whatsapp" rel="noopener"><i class="fa fa-whatsapp"></i></a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.instagram.com/digicoderstech" class="btn-link"
                                aria-label="instagram" rel="noopener"><i class="fa fa-instagram"></i></a>

                        </li>
                    </ul>
                </div>

                <!-- <div class="secondary-inner"> -->
                <!-- <ul> -->
                <!-- <li><a target="_blank" href="https://www.facebook.com/DigiCodersTech/" class="btn-link" aria-label="facebook" rel="noopener"><i class="fa fa-facebook"></i></a></li> -->
                <!-- <li><a target="_blank" href="https://twitter.com/DigiCodersTech/" class="btn-link" aria-label="twitter" rel="noopener"><i class="fa fa-twitter"></i></a></li> -->
                <!-- <li><a target="_blank" href="https://www.linkedin.com/in/digicoders/" class="btn-link" aria-label="linkedin" rel="noopener"><i class="fa fa-linkedin"></i></a></li> -->
                <!-- <li><a target="_blank" href="https://api.whatsapp.com/send?phone=919198483820&text=Welcome%20to%20DigiCoders%20Technologies%20Pvt%20Ltd" class="btn-link" aria-label="whatsapp" rel="noopener"><i class="fa fa-whatsapp"></i></a></li> -->
                <!-- <li> -->
                <!-- <a target="_blank" href="https://instagram.com/digicoderstechnologies/" class="btn-link" aria-label="instagram" rel="noopener"><i class="fa fa-instagram"></i></a> -->

                <!-- </li> -->
                <!-- Search Button ==== -->
                <!-- </ul> -->
                <!-- </div> -->

                <!-- </div> -->
            </div>
        </div>

        <div class="sticky-header navbar-expand-lg">
            <div class="menu-bar clearfix">
                <div class="container clearfix">
                    <!-- Header Logo ==== -->
                    <div class="menu-logo">
                        <a href="<?= base_url() ?>Home/Index"><img
                                src="<?= base_url('public') ?>/assets/images/logo.png" title="DigiCoders logo"
                                alt="DigiCoders logo"></a>

                    </div>
                    <!-- Mobile Nav Button ==== -->
                    <button class="navbar-toggler collapsed menuicon justify-content-end" type="button"
                        data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <!-- Author Nav ==== -->

                    <!-- Search Box ==== -->
                    <div class="nav-search-bar">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span><i class="ti-search"></i></span>
                        </form>
                        <span id="search-remove"><i class="ti-close"></i></span>
                    </div>
                    <!-- Navigation Menu ==== -->
                    <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
                        <div class="menu-logo">
                            <a href="<?= base_url() ?>Home/Index"><img
                                    src="<?= base_url('public') ?>/assets/images/logo.png" title="digicoders logo"
                                    alt="digicoders logo"></a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="<?= base_url() ?>Home/Index">Home</a>
                                <!--<ul class="sub-menu">
                                    <li><a href="<?= base_url() ?>Home/Index">The DigiCoders</a></li>
                                    <li><a href="https://digicoders.in//" target="_blank"><span>DigiCoders </span></a></li>
                                    <li><a href="https://www.digicoderstechnologies.com/" target="_blank"><span>DigiCoders Technologies</span></a></li>
                                    <li><a href="https://www.codersadda.com/" target="_blank"><span>CodersAdda</span></a></li>
                                    <li><a href="https://www.digitalcoders.in/" target="_blank"><span>DigitalCoders</span></a></li>
                                    <li><a href="http://digitaldaur.com/" target="_blank"><span>Digital Daur</span></a></li>
                                    <li><a href="http://www.gamingadda.in/" target="_blank"><span>Gaming Adda</span></a></li>

                                </ul>-->
                            </li>
                            <li class="">
                                <a href="javascript:;">About<i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="<?= base_url() ?>Home/About">About Us</a></li>
                                    <li><a href="<?= base_url() ?>Home/OurExpert">Our Experts</a></li>
                                    <!-- @*<li><a href="<?= base_url() ?>Home/AdvisoryBoard">Advisory Board</a></li> -->
                                    <!-- <li><a href="<?= base_url() ?>Home/PlacementPartner">Placement Partners</a></li>*@ -->
                                    <li><a href="<?= base_url() ?>Home/Appreciation">Appreciation Letter</a></li>
                                    <li><a href="<?= base_url() ?>Home/MOU">MOU With Colleges</a></li>
                                    <li><a href="<?= base_url() ?>Home/Achievement">Certification and Achievements</a>


                                </ul>
                            </li>


                            <li>
                                <a href="javascript:;">Trainings<i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="<?= base_url() ?>Home/VocationalTraining">Vocational Training</a></li>
                                    <li><a href="<?= base_url() ?>Home/SummerTraining">Summer Training</a></li>
                                    <li><a href="<?= base_url() ?>Home/WinterTraining">Winter Training</a></li>
                                    <li><a href="<?= base_url() ?>Home/IndustrialTraining">Industrial Training</a></li>
                                    <li><a href="<?= base_url() ?>Home/ApprenticeshipTraining">Apprenticeship
                                            Training</a></li>
                                    <li><a href="<?= base_url() ?>Home/InternshipTraining">Internship Training</a></li>
                                    <li><a href="<?= base_url() ?>Home/ProjectTraining">Project Training</a></li>
                                    <li><a href="<?= base_url() ?>Home/Contact" target="_blank">Syllabus Training</a>
                                    </li>
                                    <li><a href="<?= base_url() ?>Home/Contact" target="_blank">Faculty Training</a>
                                    </li>
                                    <li><a href="<?= base_url() ?>Home/QuickLinks">Quick Links</a> </li>

                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>Home/Registration">Registration</a>
                            </li>


                            <li>
                                <a href="javascript:;">Gallery<i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="<?= base_url() ?>Home/Seminars_Workshop">Seminars/Workshop</a></li>
                                    <li><a href="<?= base_url() ?>Home/Mou_With_College">MOU With College</a></li>
                                    <li><a href="<?= base_url() ?>Home/Farewell_2k25">Farewell 2K25</a></li>
                                    <li><a href="<?= base_url() ?>Home/Farewell_2k24">Farewell 2K24</a></li>
                                    <li><a href="<?= base_url() ?>Home/Farewell">Farewell 2K23</a></li>
                                    <li><a href="<?= base_url() ?>Home/Farewell_2K22">Farewell 2K22</a></li>
                                    <li><a href="<?= base_url() ?>Home/Farewell_2K19">Farewell 2K19</a></li>
                                    <li><a href="<?= base_url() ?>Home/Team_DigiCoders">Team DigiCoders</a></li>
                                    <li><a href="<?= base_url() ?>Home/Digicoders_campus">DigiCoders Campus</a></li>
                                    <li><a href="<?= base_url() ?>Home/video_gallery">Video Gallery</a></li>
                                    <li><a href="<?= base_url() ?>Home/OfficeTour">Office Tour</a></li>
                                    <li><a href="<?= base_url() ?>Home/VideoGallery">Free Training Videos</a></li>
                                    <li><a href="<?= base_url() ?>Home/DigiCodersInNews">DigiCoders in News & Media</a>
                                    </li>
                                    <!--<li><a href="<?= base_url() ?>Home/training_photo">Our Imtern</a></li> -->
                                </ul>
                            </li>

                            <li>
                                <a href="<?= base_url() ?>Home/placement">Placement</a>

                            </li>

                            <li class="add-mega-menu">
                                <a href="<?= base_url() ?>Home/Contact">Contact Us</a>
                            </li>
                            <li>
                                <a href="javascript:;">More<i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="<?= base_url() ?>Home/Blog">Blogs</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>Home/Faqs">FAQ'<span
                                                style="text-transform:lowercase;">s</span></a>

                                    </li>

                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">Our Services<i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <!--<li><a target="_blank" href="https://digicoders.in/Home/ITServices" rel="noopener"><span>All Services</span></a></li>-->
                                    <li><a target="_blank" href="https://digicoders.in/Home/SoftwareDevelopment"
                                            rel="noopener"><span>Software Development</span></a></li>
                                    <li><a target="_blank" href="https://digicoders.in/Home/WebsiteDevelopment"
                                            rel="noopener"><span>Website Development</span></a></li>
                                    <li><a target="_blank"
                                            href="https://digicoders.in/Home/MobileApplicationDevelopment"
                                            rel="noopener"><span>Mobile App Development</span></a></li>
                                    <li><a target="_blank" href="https://digicoders.in/Home/DigitalMarketing"
                                            rel="noopener"><span>Digital Marketing</span></a></li>
                                    <li><a target="_blank" href="https://digicoders.in/Home/GraphicsDesigning"
                                            rel="noopener"><span>Graphics Designing</span></a></li>
                                    <li><a target="_blank" href="https://digicoders.in/Home/DomainAndHosting"
                                            rel="noopener"><span>Domain &amp; Hosting</span></a></li>
                                    <li><a target="_blank" href="https://digicoders.in/Home/ERPandCRMDevelopment"
                                            rel="noopener"><span>ERP &amp; CRM Development</span></a></li>
                                    <li><a target="_blank" href="https://digicoders.in/Home/MaintenanceServices"
                                            rel="noopener"><span>Maintenance Services</span></a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="nav-social-link">
                            <a target="_blank" href="https://www.facebook.com/DigiCodersTech/" class=""
                                rel="noopener"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" href="https://twitter.com/DigiCodersTech/" class="" rel="noopener"><i
                                    class="fa fa-twitter"></i></a>
                            <a target="_blank" href="https://www.linkedin.com/in/digicoders/" class="" rel="noopener"><i
                                    class="fa fa-linkedin"></i></a>
                            <a target="_blank"
                                href="https://api.whatsapp.com/send?phone=919198483820&text=Welcome%20to%20DigiCoders%20Technologies%20Pvt%20Ltd"
                                class="" rel="noopener"><i class="fa fa-whatsapp"></i></a>
                            <a target="_blank" href="https://instagram.com/digicoderstechnologies/" rel="noopener"><i
                                    class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                    <!-- Navigation Menu END ==== -->
                </div>
            </div>
        </div>
</header>