<!DOCTYPE html>
<html lang="en">

<head>
    <title>Frequently Asked Questions - DigiCoders Technologies</title>
    <meta name="description"
        content="Frequently Asked Questions about training programs, industrial training, and certifications at DigiCoders Technologies Lucknow.">
    <meta property="og:title" content="Frequently Asked Questions - DigiCoders Technologies" />
    <meta property="og:description"
        content="Get answers to common questions about IT training and software development programs at Lucknow's best IT training institute." />
    <meta property="og:url" content="<?= strtolower(base_url($this->uri->uri_string())) ?>" />
    <link rel="canonical" href="<?= strtolower(base_url($this->uri->uri_string())) ?>" />

    <?php include('include/headerlinks.php') ?>
    <style>
        :root {
            --orange: #E76028;
            --blue: #006DAB;
            --green: #00964C;
            --orange-light: #fff0ea;
            --blue-light: #eef7ff;
            --green-light: #e6ffef;
            --white: #ffffff;
            --gray-100: #f8f9fa;
            --gray-200: #e9ecef;
            --gray-300: #dee2e6;
            --gray-800: #343a40;
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.08);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', 'Roboto', sans-serif !important;
            color: var(--gray-800);
            background-color: #fafbfc;
        }

        /* Banner Styling */
        .page-banner {
            height: 300px;
            display: flex;
            align-items: center;
            background-size: cover;
            background-position: center;
            position: relative;
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
            background: linear-gradient(135deg, rgba(0, 109, 171, 0.9) 0%, rgba(231, 96, 40, 0.8) 100%);
            z-index: 1;
        }

        .page-banner h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin: 0;
            letter-spacing: -1px;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            color: #fff !important;
        }

        .page-banner-entry {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        @media (max-width: 768px) {
            .page-banner {
                height: auto !important;
                min-height: 250px;
                padding: 50px 0;
            }

            .page-banner h1 {
                font-size: 2.2rem !important;
                line-height: 1.2;
            }
        }

        /* FAQ Content Styles - Synchronized with Home Page */
        .accordion-item-modern {
            border: 1px solid #e2e8f0;
            overflow: hidden;
            transition: all 0.3s ease;
            background: #fff;
            margin-bottom: 20px;
        }

        .accordion-button-modern {
            width: 100%;
            padding: 15px 20px;
            text-align: left;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-weight: 700;
            color: #1e293b !important;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none !important;
            background: #fff;
            border: none;
        }

        .accordion-button-modern:hover {
            color: #1e293b !important;
        }

        .accordion-button-modern:not(.collapsed) {
            color: var(--blue) !important;
            background: rgba(0, 109, 171, 0.02) !important;
        }

        .faq-toggle-icon {
            color: var(--blue);
            transition: all 0.3s ease;
            font-size: 18px;
        }

        .accordion-button-modern:not(.collapsed) .faq-toggle-icon {
            transform: rotate(45deg);
            color: var(--orange) !important;
        }

        .faq-index-modern {
            color: var(--blue);
            opacity: 0.5;
            font-size: 14px;
            font-weight: 700;
        }

        .accordion-body-modern {
            padding: 0 25px 25px 55px;
            color: #475569;
            line-height: 1.7;
            font-size: 15px;
        }

        @media (max-width: 768px) {
            .accordion-button-modern { padding: 18px; font-size: 15px; }
            .accordion-body-modern { padding: 0 18px 18px 45px; }
        }

        @media (max-width: 768px) {
            .acod-head a { padding: 20px; gap: 15px; }
            .acod-body { padding: 0 20px 20px 65px; }
            .faq-index { min-width: 35px; font-size: 16px; }
        }

        /* Sidebar Styles */
        .sticky-sidebar {
            position: -webkit-sticky;
            position: sticky;
            top: 100px;
            z-index: 10;
        }

        .sidebar-card {
            background: #fff;
            border: 1px solid #eee;
            box-shadow: var(--shadow-sm);
            margin-bottom: 25px;
            overflow: hidden;
        }

        .sidebar-title-bx {
            padding: 15px;
            background: var(--blue-light);
            border-bottom: 1px solid #eee;
        }

        .sidebar-swiper-container {
            width: 100%;
            height: 250px;
            overflow: hidden;
            padding: 10px 15px;
            background: #f8fbff;
        }

        .sidebar-swiper-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            background: #fff;
        }

        .btn-premium {
            display: block;
            width: 100%;
            padding: 12px;
            background: var(--blue);
            color: #fff !important;
            text-align: center;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            text-decoration: none !important;
        }

        .btn-premium:hover {
            background: var(--orange);
            transform: translateY(-2px);
        }

        .btn-enquiry {
            background: var(--orange);
        }

        .btn-enquiry:hover {
            background: var(--blue);
        }

        .course-features {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .course-features li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #f5f5f5;
            font-size: 14px;
        }

        .course-features li span:first-child {
            font-weight: 600;
            color: #1e293b;
        }

        .course-features li .value {
            color: var(--blue);
            font-weight: 700;
        }

        .contact-row {
            margin-bottom: 8px;
        }

        .contact-link {
            color: #333;
            font-weight: 700;
            font-size: 13px;
            text-decoration: none !important;
        }

        .contact-link:hover {
            color: var(--orange);
        }
    </style>
</head>

<body>
    <?php include('include/header.php') ?>

    <div class="page-content bg-white">
        <!-- Premium Hero Banner -->
        <div class="page-banner"
            style="background-image:url(<?= base_url('public') ?>/assets/images/banner/dct_banner.jpg);">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1 class="text-white">Frequently Asked Questions</h1>
                    <p class="text-white mt-3 lead" style="opacity: 0.9;">Got Questions? We Have Answers – Everything
                        You Need to Know About Training</p>
                </div>
            </div>
        </div>

        <div class="content-block">
            <div class="section-area section-sp1" style="padding-top: 50px;">
                <div class="container">
                    <div class="row">
                        <!-- Left Side: FAQs -->
                        <div class="col-lg-9 col-md-12">
                            <div class="ttr-accordion faq-bx" id="accordion1">
                                <?php
                                $sr = 1;
                                foreach ($userdata as $faqdata) {
                                    ?>
                                    <div class="accordion-item-modern mb-3" id="card-<?= $sr; ?>">
                                        <div class="accordion-header" id="headingFaq<?= $sr ?>">
                                            <a class="accordion-button-modern collapsed" data-toggle="collapse"
                                                href="#collapseFaq<?= $sr ?>" aria-expanded="false"
                                                onclick="toggleFaqCard(<?= $sr; ?>)">
                                                <span style="display: flex; align-items: center; gap: 15px;">
                                                    <span class="faq-index-modern"><?= str_pad($sr, 2, '0', STR_PAD_LEFT); ?>.</span>
                                                    <?= $faqdata->question ?>
                                                </span>
                                                <i class="fas fa-plus-circle faq-toggle-icon"></i>
                                            </a>
                                        </div>
                                        <div id="collapseFaq<?= $sr ?>" class="collapse" data-parent="#accordion1">
                                            <div class="accordion-body-modern">
                                                <div>
                                                    <?= $faqdata->answer; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $sr++;
                                }
                                ?>
                            </div>
                        </div>

                        <!-- Right Side: Institutional Sidebar -->
                        <div class="col-lg-3 col-md-12 mt-4 mt-lg-0">
                            <div class="sticky-sidebar">
                                <?php
                                $placements = $this->db->query("select * from placement where banner='banner' and status='true' order by id desc limit 12")->result();
                                if (!empty($placements)) {
                                    ?>
                                    <div class="sidebar-card sidebar-placement-card" style="margin-top: 0 !important;">
                                        <div class="sidebar-title-bx text-center">
                                            <h5 class="mb-0"
                                                style="color: var(--blue); font-weight: 800; font-size: 16px; letter-spacing: 1px;">
                                                LATEST PLACEMENT</h5>
                                        </div>
                                        <div class="sidebar-swiper-container">
                                            <div class="swiper side-placement-swiper">
                                                <div class="swiper-wrapper">
                                                    <?php foreach ($placements as $p) { ?>
                                                        <div class="swiper-slide">
                                                            <img loading="lazy" src="<?= base_url('public/uploads/placement/') . $p->photo ?>"
                                                                alt="Success Story" style="height: 250px; width: 100%; object-fit: contain;">
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="p-3 pt-2">
                                            <?php $contacts = $this->db->get_where('tbl_contact_numbers', ['status' => 'true'])->result(); ?>
                                            <div class="contact-info text-center">
                                                <h5 class="mb-2"
                                                    style="color: var(--blue); font-weight: 800; font-size: 14px; border-bottom: 2px solid var(--orange); display: inline-block; padding-bottom: 2px;">
                                                    Connect With Us</h5>
                                                <div class="row no-gutters">
                                                    <?php foreach ($contacts as $c) { ?>
                                                        <div class="col-12 mb-1">
                                                            <div class="d-flex align-items-center justify-content-center">
                                                                <i class="<?= ($c->type == 'Landline') ? 'ti-headphone-alt' : 'ti-mobile' ?> mr-2"
                                                                    style="color: var(--orange); font-size: 13px;"></i>
                                                                <?php
                                                                $num = $c->number;
                                                                $display_num = (strlen($num) == 10 && is_numeric($num)) ? '+91 ' . $num : $num;
                                                                ?>
                                                                <a href="tel:<?= $num ?>"
                                                                    style="color: #333; font-weight: 700; font-size: 12.5px;"><?= $display_num ?></a>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="text-center py-1">
                                                <a href="<?= base_url() ?>Home/Placement"
                                                    style="color: var(--blue); font-weight: 800; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px;">VIEW
                                                    ALL SELECTIONS <i class="fa fa-arrow-right ml-1"></i></a>
                                            </div>

                                            <div class="row no-gutters mt-2">
                                                <div class="col-6 pr-1">
                                                    <a href="<?= base_url() ?>Home/Registration" class="btn-premium"
                                                        style="padding: 10px 5px; font-size: 13px;">Register</a>
                                                </div>
                                                <div class="col-6 pl-1" data-toggle="modal" data-target="#exampleModal">
                                                    <a class="btn-premium btn-enquiry"
                                                        style="cursor:pointer; padding: 10px 5px; font-size: 13px; color:white !important">Enquiry</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <div class="sidebar-card mt-4" style="border-top-color: var(--green);">
                                    <div class="p-4">
                                        <h5 class="mb-3"
                                            style="color: var(--green); font-weight: 800; font-size: 18px;">Key
                                            Highlights</h5>
                                        <ul class="course-features">
                                            <li><span>Live Projects</span> <span class="value">Included</span></li>
                                            <li><span>Certification</span> <span class="value">Govt. Regd.</span></li>
                                            <li><span>Training Mode</span> <span class="value">Offline/Online</span>
                                            </li>
                                            <li><span>Experience</span> <span class="value">10+ Years</span></li>
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

    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>

    <script>
        function toggleFaqCard(id) {
            // Remove active class from all
            document.querySelectorAll('.accordion-item-modern').forEach(card => {
                card.classList.remove('active-card');
            });
            
            const clickedCard = document.getElementById('card-' + id);
            const link = clickedCard.querySelector('a');
            
            // If it was already open, it will close, so don't add active class
            if (link.classList.contains('collapsed')) {
                clickedCard.classList.add('active-card');
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            if (typeof Swiper !== 'undefined') {
                new Swiper(".side-placement-swiper", {
                    slidesPerView: 1,
                    spaceBetween: 0,
                    loop: true,
                    autoplay: { delay: 3000, disableOnInteraction: false },
                    speed: 1000
                });
            }
        });
    </script>
</body>

</html>