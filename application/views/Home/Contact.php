<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact Us - Software Development and Training Center in India</title>
    <meta name="description"
        content="Do you have any problems developing and submitting your final year project? Just fill out the form and we will resolve the issue.">
    <meta property="og:title" content="Contact Us - Software Development and Training Center in India" />
    <meta property="og:description"
        content="Do you have any problems developing and submitting your final year project? Just fill out the form and we will resolve the issue." />
    <meta property="og:url" content="<?= base_url($this->uri->uri_string()) ?>" />
    <link rel="canonical" href="<?= base_url($this->uri->uri_string()) ?>" />

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function submitcontectform() {
            document.getElementById('submitBtn').disabled = false
        }
    </script>

    <style>
        :root {
            --orange: #E76028;
            --blue: #006DAB;
            --green: #00964C;
        }

        .page-banner {
            height: 300px;
            display: flex;
            align-items: center;
            position: relative;
            background-size: cover;
            background-position: center;
            overflow: hidden;
            border-radius: 0;
            margin-bottom: 50px;
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
            font-size: 2.5rem;
            font-weight: 600;
            margin: 0;
            letter-spacing: -1px;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .page-banner p {
            color: rgba(255, 255, 255, 0.95);
            font-size: 1.3rem;
            font-weight: 500;
            margin-top: 15px;
            letter-spacing: 0.5px;
        }

        .page-banner-entry {
            position: relative;
            z-index: 2;
        }

        @media (max-width: 768px) {
            .page-banner {
                height: 250px;
            }

            .page-banner h1 {
                font-size: 2.2rem;
                letter-spacing: -1px;
            }

            .page-banner p {
                font-size: 1.1rem;
            }
        }

        /* Premium Form Styling */
        .contact-bx {
            background: #fff;
            padding: 50px;
            border-radius: 0;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
            margin-top: -100px;
            position: relative;
            z-index: 5;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .form-control {
            height: 55px;
            border: 2px solid #eee;
            border-radius: 0;
            padding: 15px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--blue);
            box-shadow: none;
        }

        textarea.form-control {
            height: auto;
        }

        .premium-form .form-control {
            border-radius: 6px;
            border: 1px solid #ddd;
            padding: 8px 12px;
            font-size: 0.9rem;
            height: 45px;
            transition: all 0.3s ease;
            background: #fff;
        }

        .btn.button-md {
            background: var(--blue);
            color: #fff;
            font-weight: 700;
            border-radius: 0;
            padding: 15px 40px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            border: none;
        }

        .btn.button-md:hover {
            background: var(--orange);
            transform: translateY(-2px);
        }

        /* Premium Sidebar from SummerTraining */
        .sticky-sidebar {
            position: -webkit-sticky;
            position: sticky;
            top: 100px;
            z-index: 10;
        }

        .sidebar-card {
            background: #fff;
            border-radius: 0;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.06);
            border: 1px solid #eee;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .sidebar-title-bx {
            padding: 15px;
            background: rgba(0, 109, 171, 0.05);
            border-bottom: 1px solid #eee;
        }

        .btn-premium {
            display: block;
            width: 100%;
            padding: 12px;
            background: var(--blue);
            color: #fff;
            text-align: center;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-premium:hover {
            background: var(--orange);
            color: #fff;
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
            padding: 8px 0;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        .course-features li:last-child {
            border-bottom: none;
        }

        .course-features li span:first-child {
            font-weight: 600;
            color: #1e293b;
        }

        .course-features li .value {
            color: var(--blue);
            font-weight: 700;
        }

        .sidebar-swiper-container {
            width: 100%;
            height: 250px;
            overflow: hidden;
            padding: 0 15px;
        }

        .sidebar-swiper-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            background: #f8fbff;
        }

        /* PREMIUM ALIGNMENT FIX */
        .page-content .container {
            max-width: 1200px !important;
            padding-left: 20px !important;
            padding-right: 20px !important;
            margin: 0 auto !important;
        }

        .contact-bx.premium-form {
            margin-top: -80px !important;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.1) !important;
            border: none !important;
            border-radius: 0px !important;
        }

        iframe {
            border-radius: 0px;
            display: block;
        }
    </style>
    <?php include('include/headerlinks.php') ?>
</head>

<body>
    <?php include('include/header.php') ?>

    <div class="page-content bg-white">
        <!-- Banner -->
        <div class="page-banner"
            style="background-image:url(<?= base_url('public') ?>/assets/images/banner/dct_banner.jpg);">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1 class="text-white">Contact Us</h1>
                    <p class="text-white mt-3 lead opacity-8">Building Partnerships for a Brighter Technical Future</p>
                </div>
            </div>
        </div>

        <!-- Main Content Section -->
        <div class="container mb-5 pb-5">
            <div class="row">
                <!-- Left Content: Form, Branch Info & Maps -->
                <div class="col-lg-9 mb-4">
                    <!-- Form -->
                    <form class="contact-bx premium-form" id="quick" action="<?= base_url() ?>Home/submitForm/Enquiry"
                        method="POST" style="padding: 40px;">
                        <?php
                        $csrf = array(
                            'name' => $this->security->get_csrf_token_name(),
                            'hash' => $this->security->get_csrf_hash()
                        );
                        ?>
                        <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                        <div class="ajax-message"></div>
                        <h3 class="mb-3"
                            style="font-weight: 800; color: var(--blue); border-bottom: 2px solid var(--orange); display: inline-block; padding-bottom: 3px; font-size: 1.2rem;">
                            Get in Touch</h3>

                        <div class="row mt-2">
                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label>Your Name</label>
                                    <input name="name" type="text" required="" class="form-control valid-character"
                                        placeholder="e.g. Saurabh Kumar">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label>Your Email</label>
                                    <input name="email" type="email" class="form-control"
                                        placeholder="example@mail.com">
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label>Your Phone</label>
                                    <input name="phone" type="text" required="" maxlength="10" minlength="10"
                                        class="form-control int-value" placeholder="10 Digit Mobile Number">
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label>Type Message</label>
                                    <textarea name="message" rows="3" class="form-control" maxlength="250"
                                        placeholder="How can we help you?"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6LfHIQcrAAAAALPXPP-R1SamLeZxPHGPA_xfMNOh"
                                        data-callback="submitcontectform"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button name="submit" type="submit" value="Submit" disabled="disabled"
                                    class="btn button-md w-100" id="submitBtn">
                                    <i class="fa fa-refresh fa-spin fa-fw d-none" id="submitSpin"></i> Send Query
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Branch Information -->
                    <div class="row mt-4">
                        <div class="col-md-4 mb-3">
                            <div class="contact-info-bx h-100 p-3"
                                style="background:#fff; border:1px solid #eee; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border-radius: 0px;">
                                <h4
                                    style="color:var(--blue); font-weight:800; font-size: 1rem; border-bottom: 2px solid var(--orange); display:inline-block; padding-bottom:3px;">
                                    Lucknow Head Office</h4>
                                <ul class="list-unstyled mt-2" style="font-size: 0.85rem; color:#555;">
                                    <li class="mb-2 d-flex"><i class="fa fa-map-pin mr-3 mt-1"
                                            style="color: var(--blue);"></i>
                                        <div>2ND FLOOR, B-36, SECTOR O, NEAR RAM RAM BANK CHAURAHA, ALIGANJ, LUCKNOW, UP
                                            226021</div>
                                    </li>
                                    <li class="mb-2 d-flex"><i class="fa fa-phone mr-3 mt-1"
                                            style="color: var(--blue);"></i> <a href="tel:+919198483820"
                                            style="color: inherit; text-decoration:none;">+91 9198483820</a></li>
                                    <li class="d-flex"><i class="fa fa-envelope mr-3 mt-1"
                                            style="color: var(--blue);"></i>
                                        <div>info@thedigicoders.com</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="contact-info-bx h-100 p-3"
                                style="background:#fff; border:1px solid #eee; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border-radius: 0px;">
                                <h4
                                    style="color:var(--blue); font-weight:800; font-size: 1rem; border-bottom: 2px solid var(--orange); display:inline-block; padding-bottom:3px;">
                                    Kanpur Branch</h4>
                                <ul class="list-unstyled mt-2" style="font-size: 0.85rem; color:#555;">
                                    <li class="mb-2 d-flex"><i class="fa fa-map-pin mr-3 mt-1"
                                            style="color: var(--blue);"></i>
                                        <div>340, S-BLOCK, NEAR ANNAPOORNA HOSPITAL, SHEHNAI CHAURAHA, YASHODA NAGAR,
                                            KANPUR, 208011</div>
                                    </li>
                                    <li class="mb-2 d-flex"><i class="fa fa-phone mr-3 mt-1"
                                            style="color: var(--blue);"></i> <a href="tel:+917525953975"
                                            style="color: inherit; text-decoration:none;">+91 7525953975</a></li>
                                    <li class="d-flex"><i class="fa fa-envelope mr-3 mt-1"
                                            style="color: var(--blue);"></i>
                                        <div>info@thedigicoders.com</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="contact-info-bx h-100 p-3"
                                style="background:#fff; border:1px solid #eee; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border-radius: 0px;">
                                <h4
                                    style="color:var(--blue); font-weight:800; font-size: 1rem; border-bottom: 2px solid var(--orange); display:inline-block; padding-bottom:3px;">
                                    Gorakhpur Branch</h4>
                                <ul class="list-unstyled mt-2" style="font-size: 0.85rem; color:#555;">
                                    <li class="mb-2 d-flex"><i class="fa fa-map-pin mr-3 mt-1"
                                            style="color: var(--blue);"></i>
                                        <div>INSIDE MAIN BUILDING, BUDDHA INSTITUTE OF TECHNOLOGY, CL-1, SECTOR-7, GIDA, GORAKHPUR, UP, 273209</div>
                                    </li>
                                    <li class="mb-2 d-flex"><i class="fa fa-phone mr-3 mt-1"
                                            style="color: var(--blue);"></i> <a href="tel:+919198483820"
                                            style="color: inherit; text-decoration:none;">+91 9198483820</a></li>
                                    <li class="d-flex"><i class="fa fa-envelope mr-3 mt-1"
                                            style="color: var(--blue);"></i>
                                        <div>info@thedigicoders.com</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Maps -->
                    <div class="row mt-2">
                        <div class="col-md-4 mb-3">
                            <div class="map-frame">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3558.9013562650925!2d80.93581361451977!3d26.874874968188852!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd90f852511b%3A0xea3004cdf494ecbb!2sDigiCoders%20Technologies%20Private%20Limited!5e0!3m2!1sen!2sin!4v1597993165278!5m2!1sen!2sin"
                                    width="100%" height="200" frameborder="0" style="border:0;"
                                    allowfullscreen=""></iframe>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="map-frame">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3573.440432457619!2d80.327792!3d26.409260000000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjbCsDI0JzMzLjMiTiA4MMKwMTknNDAuMSJF!5e0!3m2!1sen!2sin!4v1777553158899!5m2!1sen!2sin"
                                    width="100%" height="200" frameborder="0" style="border:0;"
                                    allowfullscreen=""></iframe>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="map-frame">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d769.7040554575536!2d83.27078430648442!3d26.739377814271048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399147380139859b%3A0x708768ccb2c065c9!2sBuddha%20Institute%20of%20Technology%20%2C%20Gorakhpur!5e0!3m2!1sen!2sin!4v1778741776331!5m2!1sen!2sin"
                                    width="100%" height="200" frameborder="0" style="border:0;"
                                    allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Content: Premium Sidebar -->
                <div class="col-lg-3 mb-4">
                    <div class="sticky-sidebar" style="margin-top: -80px;">
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
                                <div class="sidebar-swiper-container"
                                    style="max-height: 250px; overflow: hidden; background: #f8fbff;">
                                    <div class="swiper side-placement-swiper">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($placements as $p) { ?>
                                                <div class="swiper-slide">
                                                    <img src="<?= base_url('public/uploads/placement/') . $p->photo ?>"
                                                        alt="Success Story"
                                                        style="height: 250px; width: 100%; object-fit: contain;">
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
                                                        <i class="<?= ($c->type == 'Landline') ? 'fa fa-phone' : 'fa fa-mobile' ?> mr-2"
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
            </div> <!-- Row End -->
        </div> <!-- Container End -->
    </div> <!-- Page Content End -->

    <?php include('include/footer.php') ?>
    <?php include('include/jslinks.php') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    <script>
        $('#quick').parsley();
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new Swiper(".side-placement-swiper", {
                slidesPerView: 1,
                spaceBetween: 5,
                loop: true,
                autoplay: {
                    delay: 0,
                    disableOnInteraction: false,
                },
                speed: 4000,
                allowTouchMove: false
            });
        });
    </script>
</body>

</html>