<?php /* Premium Glassmorphism Header — all inner pages */ ?>
<link rel="stylesheet" href="<?= base_url('public') ?>/assets/premium-header.css" media="all">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" media="print"
    onload="this.media='all'">
<!-- Premium Global Loader Overlay (Active by default for page load) -->
<div id="premium-loader-overlay" class="premium-loader-overlay active">
    <div class="premium-loader-container">
        <div class="premium-loader-spinner">
            <div class="premium-loader-ring blue"></div>
            <div class="premium-loader-ring orange"></div>
            <div class="premium-loader-ring green"></div>
            <img src="<?= base_url('public/assets/images/favicon.png') ?>" alt="Loading..." width="30" height="30">
        </div>
    </div>
</div>

<header class="prem-header" id="prem-site-header">

    <!-- ░░░ TOP BAR ░░░ -->
    <div class="prem-topbar">
        <div class="prem-inner">

            <!-- Left: Phone -->
            <div class="prem-topbar-left">
                <a href="tel:+919198483820">
                    <i class="fa-solid fa-mobile-screen-button"></i>+91 9198483820
                </a>
            </div>

            <!-- Right: Links + Buttons + Socials -->
            <div class="prem-topbar-right">

                <!-- Brochures -->
                <div class="prem-topbar-downloads">
                    <a href="<?= base_url('public') ?>/assets/images/DigiCoders_2026_Company_Profile.pdf"
                        target="_blank" download>
                        <i class="fa-solid fa-file-pdf"></i> Company Profile
                    </a>
                    <a href="<?= base_url('public') ?>/assets/images/DigiCoders_2026_Training_Brochure.pdf"
                        target="_blank" download>
                        <i class="fa-solid fa-file-pdf"></i> Training Brochure
                    </a>
                    <a href="<?= base_url('public') ?>/assets/images/DigiCoders_2026_Placement_Brochure.pdf"
                        target="_blank" download class="prem-mob-show-pill">
                        <i class="fa-solid fa-file-pdf"></i> Placement Brochure
                    </a>
                </div>

                <span class="prem-sep"></span>

                <!-- CTA Pills -->
                <a href="<?= base_url() ?>home/verifycertificate" class="prem-pill-verify">
                    <i class="fa-solid fa-certificate"></i> Verify Certificate
                </a>
                <a href="<?= base_url() ?>home/registration" class="prem-pill-register">
                    <i class="fa-solid fa-pencil"></i> Register For Training
                </a>
                <a href="https://student.thedigicoders.com/" target="_blank" class="prem-pill-login">
                    <i class="fa-solid fa-right-to-bracket"></i> Student Login
                </a>

                <span class="prem-sep"></span>

                <!-- Development Segment Link -->
                <a href="https://digicoders.in/" target="_blank" class="prem-pill-dev">
                    Development Website
                </a>
            </div>
        </div>
    </div>

    <!-- MAIN NAVBAR -->
    <nav class="prem-navbar" id="prem-navbar">
        <div class="prem-inner">

            <!-- Logo -->
            <div class="prem-logo">
                <a href="<?= base_url() ?>">
                    <img src="<?= base_url('public') ?>/assets/images/logo.png" alt="DigiCoders Technologies Logo"
                        title="DigiCoders Technologies" width="220" height="60">
                </a>
            </div>


            <?php $req = $_SERVER['REQUEST_URI']; ?>
            <ul class="prem-nav" id="prem-nav">
                <li
                    class="<?= ($req == '/' || strpos($req, 'Index') !== false || substr($req, -1) == '/') ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>">HOME</a>
                </li>

                <li
                    class="<?= (strpos($req, 'About') !== false || strpos($req, 'Expert') !== false || strpos($req, 'MOU') !== false || strpos($req, 'Achievement') !== false) ? 'active' : '' ?>">
                    <a href="javascript:void(0)">ABOUT</a>
                    <ul class="prem-dropdown">
                        <li><a href="<?= base_url() ?>home/about">About Us</a></li>
                        <li><a href="<?= base_url() ?>home/ourexpert">Our Experts</a></li>
                        <li><a href="<?= base_url() ?>home/appreciation">Appreciation Letter</a></li>
                        <li><a href="<?= base_url() ?>home/mou">MOU With Colleges</a></li>
                        <li><a href="<?= base_url() ?>home/achievement">Certifications & Achievements</a></li>
                    </ul>
                </li>

                <li class="<?= (strpos($req, 'branch') !== false) ? 'active' : '' ?>">
                    <a href="javascript:void(0)">OUR BRANCHES</a>
                    <ul class="prem-dropdown">
                        <li><a href="<?= base_url() ?>home/lucknowbranch">Lucknow Head Office</a></li>
                        <li><a href="<?= base_url() ?>home/kanpurbranch">Kanpur Branch</a></li>
                        <li><a href="<?= base_url() ?>home/gorakhpurbranch">Gorakhpur Branch</a></li>
                    </ul>
                </li>

                <li class="<?= (strpos($req, 'Training') !== false) ? 'active' : '' ?>">
                    <a href="javascript:void(0)">TRAININGS</a>
                    <ul class="prem-dropdown">
                        <li><a href="<?= base_url() ?>home/summertraining">Summer Training</a></li>
                        <li><a href="<?= base_url() ?>home/vocationaltraining">Vocational Training</a></li>
                        <li><a href="<?= base_url() ?>home/wintertraining">Winter Training</a></li>
                        <li><a href="<?= base_url() ?>home/industrialtraining">Industrial Training</a></li>
                        <li><a href="<?= base_url() ?>home/apprenticeshiptraining">Apprenticeship Training</a></li>
                        <li><a href="<?= base_url() ?>home/internshiptraining">Internship Training</a></li>
                        <li><a href="<?= base_url() ?>home/projecttraining">Project Training</a></li>
                        <li><a href="<?= base_url() ?>home/syllabustraining">Syllabus Training</a></li>
                        <li><a href="<?= base_url() ?>home/facultytraining">Faculty Training</a></li>
                        <li><a href="<?= base_url() ?>home/quicklinks">Quick Links</a></li>
                    </ul>
                </li>

                <li class="<?= (strpos($req, 'Registration') !== false) ? 'active' : '' ?>"><a
                        href="<?= base_url() ?>home/registration">REGISTRATION</a></li>

                <li class="<?= (strpos($req, 'Gallery') !== false) ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>home/gallery">GALLERY</a>
                </li>

                <li class="<?= (strpos($req, 'placement') !== false) ? 'active' : '' ?>"><a
                        href="<?= base_url() ?>home/placement">PLACEMENTS</a></li>
                <li class="<?= (strpos($req, 'Contact') !== false) ? 'active' : '' ?>"><a
                        href="<?= base_url() ?>home/contact">CONTACT US</a></li>

                <li class="<?= (strpos($req, 'Blog') !== false) ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>home/blog">BLOGS</a>
                </li>

                <li>
                    <a href="javascript:void(0)">OUR SERVICES</a>
                    <ul class="prem-dropdown">
                        <li><a href="https://digicoders.in/Home/SoftwareDevelopment" target="_blank">Software
                                Development</a></li>
                        <li><a href="https://digicoders.in/Home/WebsiteDevelopment" target="_blank">Website
                                Development</a></li>
                        <li><a href="https://digicoders.in/Home/MobileApplicationDevelopment" target="_blank">Mobile App
                                Development</a></li>
                        <li><a href="https://digicoders.in/Home/DigitalMarketing" target="_blank">Digital Marketing</a>
                        </li>
                        <li><a href="https://digicoders.in/Home/GraphicsDesigning" target="_blank">Graphics
                                Designing</a></li>
                        <li><a href="https://digicoders.in/Home/DomainAndHosting" target="_blank">Domain &amp;
                                Hosting</a></li>
                        <li><a href="https://digicoders.in/Home/ERPandCRMDevelopment" target="_blank">ERP &amp; CRM
                                Development</a></li>
                        <li><a href="https://digicoders.in/Home/MaintenanceServices" target="_blank">Maintenance
                                Services</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Hamburger -->
            <div class="prem-hamburger" id="prem-hamburger" onclick="premToggleMobile()" aria-label="Toggle menu">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Mobile Menu Overlay -->
        <div class="prem-mob-overlay" id="prem-mob-overlay" onclick="premToggleMobile()"></div>

        <!-- Mobile Menu Drawer (Left Side) -->
        <div class="prem-mobile-menu" id="prem-mobile-menu">
            <div class="prem-mob-header">
                <div class="prem-logo" style="margin: 0 auto;">
                    <img loading="lazy" src="<?= base_url('public') ?>/assets/images/logo.png" alt="Logo">
                </div>
            </div>
            <ul>
                <li
                    class="<?= ($req == '/' || strpos($req, 'Index') !== false || substr($req, -1) == '/') ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>">Home</a>
                </li>
                <li
                    class="prem-mob-parent <?= (strpos($req, 'About') !== false || strpos($req, 'Expert') !== false || strpos($req, 'MOU') !== false || strpos($req, 'Achievement') !== false) ? 'active' : '' ?>">
                    <a href="javascript:void(0)" onclick="premToggleSub(this)">About</a>
                    <ul class="prem-mob-sub">
                        <li><a href="<?= base_url() ?>home/about">About Us</a></li>
                        <li><a href="<?= base_url() ?>home/ourexpert">Our Experts</a></li>
                        <li><a href="<?= base_url() ?>home/appreciation">Appreciation Letter</a></li>
                        <li><a href="<?= base_url() ?>home/mou">MOU With Colleges</a></li>
                        <li><a href="<?= base_url() ?>home/achievement">Certifications & Achievements</a></li>
                    </ul>
                </li>
                <li class="prem-mob-parent <?= (strpos($req, 'branch') !== false) ? 'active' : '' ?>">
                    <a href="javascript:void(0)" onclick="premToggleSub(this)">Our Branches</a>
                    <ul class="prem-mob-sub">
                        <li><a href="<?= base_url() ?>home/lucknowbranch">Lucknow Head Office</a></li>
                        <li><a href="<?= base_url() ?>home/kanpurbranch">Kanpur Branch</a></li>
                        <li><a href="<?= base_url() ?>home/gorakhpurbranch">Gorakhpur Branch</a></li>
                    </ul>
                </li>
                <li class="prem-mob-parent <?= (strpos($req, 'Training') !== false) ? 'active' : '' ?>">
                    <a href="javascript:void(0)" onclick="premToggleSub(this)">Trainings</a>
                    <ul class="prem-mob-sub">
                        <li><a href="<?= base_url() ?>home/summertraining">Summer Training</a></li>
                        <li><a href="<?= base_url() ?>home/vocationaltraining">Vocational Training</a></li>

                        <li><a href="<?= base_url() ?>home/wintertraining">Winter Training</a></li>
                        <li><a href="<?= base_url() ?>home/industrialtraining">Industrial Training</a></li>
                        <li><a href="<?= base_url() ?>home/apprenticeshiptraining">Apprenticeship Training</a></li>
                        <li><a href="<?= base_url() ?>home/internshiptraining">Internship Training</a></li>
                        <li><a href="<?= base_url() ?>home/projecttraining">Project Training</a></li>
                        <li><a href="<?= base_url() ?>home/syllabustraining">Syllabus Training</a></li>
                        <li><a href="<?= base_url() ?>home/facultytraining">Faculty Training</a></li>
                        <li><a href="<?= base_url() ?>home/quicklinks">Quick Links</a></li>
                    </ul>
                </li>
                <li class="<?= (strpos($req, 'VerifyCertificate') !== false) ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>home/verifycertificate">Verify Certificate</a>
                </li>
                <li class="<?= (strpos($req, 'Registration') !== false) ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>home/registration">Registration</a>
                </li>
                <li class="<?= (strpos($req, 'Gallery') !== false) ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>home/gallery">Gallery</a>
                </li>
                <li class="<?= (strpos($req, 'placement') !== false) ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>home/placement">Placements</a>
                </li>
                <li class="<?= (strpos($req, 'Contact') !== false) ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>home/contact">Contact Us</a>
                </li>
                <li class="<?= (strpos($req, 'Blog') !== false) ? 'active' : '' ?>">
                    <a href="<?= base_url() ?>home/blog">Blogs</a>
                </li>
                <li class="prem-mob-parent">
                    <a href="javascript:void(0)" onclick="premToggleSub(this)">Our Services</a>
                    <ul class="prem-mob-sub">
                        <li><a href="https://digicoders.in/Home/SoftwareDevelopment" target="_blank">Software
                                Development</a></li>
                        <li><a href="https://digicoders.in/Home/WebsiteDevelopment" target="_blank">Website
                                Development</a></li>
                        <li><a href="https://digicoders.in/Home/MobileApplicationDevelopment" target="_blank">Mobile App
                                Development</a></li>
                        <li><a href="https://digicoders.in/Home/DigitalMarketing" target="_blank">Digital Marketing</a>
                        </li>
                        <li><a href="https://digicoders.in/Home/GraphicsDesigning" target="_blank">Graphics
                                Designing</a></li>
                        <li><a href="https://digicoders.in/Home/DomainAndHosting" target="_blank">Domain &amp;
                                Hosting</a></li>
                        <li><a href="https://digicoders.in/Home/ERPandCRMDevelopment" target="_blank">ERP &amp; CRM
                                Development</a></li>
                        <li><a href="https://digicoders.in/Home/MaintenanceServices" target="_blank">Maintenance
                                Services</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Mobile Menu Actions (Brochures + Registration/Login/Dev) -->
            <div class="prem-mob-actions d-md-none">
                <a href="<?= base_url('public') ?>/assets/images/DigiCoders_2026_Training_Brochure.pdf" target="_blank"
                    download class="prem-mob-action-btn pm-bro">
                    <i class="fa-solid fa-file-pdf"></i> Training Brochure
                </a>
                <a href="<?= base_url('public') ?>/assets/images/DigiCoders_2026_Placement_Brochure.pdf" target="_blank"
                    download class="prem-mob-action-btn pm-bro">
                    <i class="fa-solid fa-file-pdf"></i> Placement Brochure
                </a>
                <a href="<?= base_url() ?>home/verifycertificate" class="prem-mob-action-btn pm-verify">
                    <i class="fa-solid fa-certificate"></i> Verify Certificate
                </a>
                <a href="<?= base_url() ?>home/registration" class="prem-mob-action-btn pm-reg">
                    <i class="fa-solid fa-pencil"></i> Register For Training
                </a>
                <a href="https://student.thedigicoders.com/" target="_blank" class="prem-mob-action-btn pm-log">
                    <i class="fa-solid fa-right-to-bracket"></i> Student Login
                </a>
                <a href="https://digicoders.in" target="_blank" class="prem-mob-action-btn pm-dev">
                    <i class="fa-solid fa-globe"></i> Development Website
                </a>
            </div>

            <!-- Mobile Social -->
            <div class="prem-mob-social">
                <a href="https://www.facebook.com/DigiCodersTech/" target="_blank" rel="noopener"
                    aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="https://twitter.com/DigiCodersTech/" target="_blank" rel="noopener" aria-label="Twitter"><i
                        class="fa-brands fa-x-twitter"></i></a>
                <a href="https://www.linkedin.com/company/digicoders" target="_blank" rel="noopener"
                    aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="https://api.whatsapp.com/send?phone=919198483820" target="_blank" rel="noopener"
                    aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                <a href="https://www.instagram.com/digicoderstech" target="_blank" rel="noopener"
                    aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </nav>

</header>

<script>
    function premToggleMobile() {
        var m = document.getElementById('prem-mobile-menu');
        var h = document.getElementById('prem-hamburger');
        var o = document.getElementById('prem-mob-overlay');
        m.classList.toggle('open');
        h.classList.toggle('open');
        o.classList.toggle('active');

        // Prevent body scroll when menu is open
        if (m.classList.contains('open')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    }
    function premToggleSub(el) {
        var sub = el.nextElementSibling;
        if (sub) sub.classList.toggle('open');
        var icon = el.querySelector('.fa-chevron-down');
        if (icon) icon.style.transform = sub.classList.contains('open') ? 'rotate(180deg)' : '';
    }
    window.addEventListener('scroll', function () {
        var nb = document.getElementById('prem-navbar');
        var header = document.getElementById('prem-site-header');
        if (nb) {
            if (window.scrollY > 42) {
                nb.classList.add('scrolled');
                if (header) header.style.paddingBottom = nb.offsetHeight + 'px';
            } else {
                nb.classList.remove('scrolled');
                if (header) header.style.paddingBottom = '0';
            }
        }
    });
</script>
<script>
    (function () {
        var overlay = document.getElementById('premium-loader-overlay');
        if (overlay) {
            window.addEventListener('load', function () {
                overlay.classList.remove('active');
            });
            // Fallback for very slow pages
            setTimeout(function () {
                overlay.classList.remove('active');
            }, 5000);
        }
    })();
</script>