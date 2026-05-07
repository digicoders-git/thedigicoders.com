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
            font-size: 3.5rem;
            font-weight: 700;
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

        /* Premium Sidebar - Extra Compact */
        .premium-sidebar {
            background: #fff;
            padding: 10px;
            border: 1px solid #eee;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            text-align: center;
            border-radius: 6px;
            width: 100%;
        }

        .sidebar-header {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f0f0f0;
        }

        .sidebar-header h3 {
            font-size: 0.9rem;
            font-weight: 800;
            color: var(--blue);
            margin: 0;
            text-transform: uppercase;
        }

        .sidebar-header p {
            font-size: 0.65rem;
            color: #999;
            margin: 2px 0 0 0;
        }

        .sidebar-contact-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 10px 0;
            border-bottom: 1px dashed #f0f0f0;
        }
        
        .sidebar-contact-item:last-child {
            border-bottom: none;
        }

        .sci-icon {
            width: 24px;
            height: 24px;
            background: rgba(37, 211, 102, 0.1);
            color: #25D366;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            border-radius: 50%;
            margin-bottom: 3px;
        }

        .sci-details {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sci-dept {
            font-size: 0.65rem;
            font-weight: 700;
            color: var(--orange);
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 3px;
        }

        .premium-form label {
            margin-bottom: 5px;
            font-weight: 700;
            color: #555;
            font-size: 0.85rem;
        }

        .sci-number {
            font-size: 0.75rem;
            font-weight: 700;
            color: #333;
        }

        .sidebar-footer {
            margin-top: 15px;
            padding-top: 10px;
            border-top: 1px solid #f0f0f0;
        }

        .sf-title {
            font-size: 0.75rem;
            font-weight: 700;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
            display: block;
        }

        .sf-socials {
            display: flex;
            justify-content: center;
            gap: 12px;
        }

        .sf-icon {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff !important;
            font-size: 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .sf-icon.fb { background: #1877f2; }
        .sf-icon.li { background: #0a66c2; }
        .sf-icon.in { background: #e4405f; }
        .sf-icon.wa { background: #25d366; }

        .sf-icon:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            color: #fff;
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
            border-radius: 12px !important;
        }

        iframe {
            border-radius: 8px;
            display: block;
        }
    </style>
    <?php include('include/headerlinks.php') ?>
</head>

<body>
    <?php include('include/header.php') ?>

    <div class="page-content bg-white">
        <!-- Banner -->
        <div class="page-banner" style="background-image:url(<?= base_url('public') ?>/assets/images/banner/dct_banner.jpg);">
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
                    <form class="contact-bx premium-form" id="quick" action="<?= base_url() ?>Home/submitForm/Enquiry" method="POST" style="padding: 40px;">
                        <?php
                        $csrf = array(
                            'name' => $this->security->get_csrf_token_name(),
                            'hash' => $this->security->get_csrf_hash()
                        );
                        ?>
                        <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                        <div class="ajax-message"></div>
                        <h3 class="mb-3" style="font-weight: 800; color: var(--blue); border-bottom: 2px solid var(--orange); display: inline-block; padding-bottom: 3px; font-size: 1.2rem;">Get in Touch</h3>
                        
                        <div class="row mt-2">
                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label>Your Name</label>
                                    <input name="name" type="text" required="" class="form-control valid-character" placeholder="e.g. Saurabh Kumar">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div class="form-group">
                                    <label>Your Email</label>
                                    <input name="email" type="email" class="form-control" placeholder="example@mail.com">
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label>Your Phone</label>
                                    <input name="phone" type="text" required="" maxlength="10" minlength="10" class="form-control int-value" placeholder="10 Digit Mobile Number">
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label>Type Message</label>
                                    <textarea name="message" rows="3" class="form-control" maxlength="250" placeholder="How can we help you?"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6LfHIQcrAAAAALPXPP-R1SamLeZxPHGPA_xfMNOh" data-callback="submitcontectform"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button name="submit" type="submit" value="Submit" disabled="disabled" class="btn button-md w-100" id="submitBtn">
                                    <i class="fa fa-refresh fa-spin fa-fw d-none" id="submitSpin"></i> Send Query
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Branch Information -->
                    <div class="row mt-4">
                        <div class="col-md-6 mb-3">
                            <div class="contact-info-bx h-100 p-3" style="background:#fff; border:1px solid #eee; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border-radius: 8px;">
                                <h4 style="color:var(--blue); font-weight:800; font-size: 1rem; border-bottom: 2px solid var(--orange); display:inline-block; padding-bottom:3px;">Lucknow Branch</h4>
                                <ul class="list-unstyled mt-2" style="font-size: 0.85rem; color:#555;">
                                    <li class="mb-2 d-flex"><i class="fa fa-map-pin mr-3 mt-1" style="color: var(--blue);"></i>
                                        <div>2ND FLOOR, B-36, SECTOR O, NEAR RAM RAM BANK CHAURAHA, ALIGANJ, LUCKNOW, UP 226021</div>
                                    </li>
                                    <li class="mb-2 d-flex"><i class="fa fa-phone mr-3 mt-1" style="color: var(--blue);"></i> <a href="tel:+919198483820" style="color: inherit; text-decoration:none;">+91 9198483820</a></li>
                                    <li class="d-flex"><i class="fa fa-envelope mr-3 mt-1" style="color: var(--blue);"></i>
                                        <div>info@thedigicoders.com</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="contact-info-bx h-100 p-3" style="background:#fff; border:1px solid #eee; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border-radius: 8px;">
                                <h4 style="color:var(--blue); font-weight:800; font-size: 1rem; border-bottom: 2px solid var(--orange); display:inline-block; padding-bottom:3px;">Kanpur Branch</h4>
                                <ul class="list-unstyled mt-2" style="font-size: 0.85rem; color:#555;">
                                    <li class="mb-2 d-flex"><i class="fa fa-map-pin mr-3 mt-1" style="color: var(--blue);"></i>
                                        <div>340, S-BLOCK, NEAR ANNAPOORNA HOSPITAL, SHEHNAI CHAURAHA, YASHODA NAGAR, KANPUR, 208011</div>
                                    </li>
                                    <li class="mb-2 d-flex"><i class="fa fa-phone mr-3 mt-1" style="color: var(--blue);"></i> <a href="tel:+917525953975" style="color: inherit; text-decoration:none;">+91 7525953975</a></li>
                                    <li class="d-flex"><i class="fa fa-envelope mr-3 mt-1" style="color: var(--blue);"></i>
                                        <div>info@thedigicoders.com</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Maps -->
                    <div class="row mt-2">
                        <div class="col-md-6 mb-3">
                            <div class="map-frame">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3558.9013562650925!2d80.93581361451977!3d26.874874968188852!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd90f852511b%3A0xea3004cdf494ecbb!2sDigiCoders%20Technologies%20Private%20Limited!5e0!3m2!1sen!2sin!4v1597993165278!5m2!1sen!2sin" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="map-frame">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3573.440432457619!2d80.327792!3d26.409260000000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjbCsDI0JzMzLjMiTiA4MMKwMTknNDAuMSJF!5e0!3m2!1sen!2sin!4v1777553158899!5m2!1sen!2sin" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Content: Premium Sidebar -->
                <div class="col-lg-3 mb-4">
                    <div class="premium-sidebar sticky-top" style="top: 100px; z-index: 10; margin-top: -80px;">
                        <div class="sidebar-header">
                            <h3>Direct Lines</h3>
                            <p>Instant support, zero wait</p>
                        </div>
                        <div class="sidebar-content mt-4">
                            <?php
                            if (isset($contact_numbers) && !empty($contact_numbers)):
                                foreach ($contact_numbers as $contact):
                                    $icon = 'fa-solid fa-phone'; // Default
                                    $typeStr = isset($contact->type) ? strtolower($contact->type) : '';

                                    if (strpos($typeStr, 'sale') !== false || strpos($typeStr, 'busine') !== false) {
                                        $icon = 'fa-solid fa-briefcase';
                                    } elseif (strpos($typeStr, 'hr') !== false || strpos($typeStr, 'recruit') !== false) {
                                        $icon = 'fa-solid fa-user-tie';
                                    } elseif (strpos($typeStr, 'support') !== false || strpos($typeStr, 'help') !== false) {
                                        $icon = 'fa-solid fa-headset';
                                    } elseif (strpos($typeStr, 'whats') !== false) {
                                        $icon = 'fa-brands fa-whatsapp';
                                    }

                                    $linkFormat = preg_replace('/[^0-9]/', '', $contact->number);
                                    $linkNum = strlen($linkFormat) == 10 ? '91' . $linkFormat : $linkFormat;
                                    ?>
                                    <div class="sidebar-contact-item">
                                        <div class="sci-details">
                                            <span class="sci-dept"><?= !empty($contact->type) ? $contact->type : 'Direct Line' ?></span>
                                            <div class="sci-row" style="display: flex; align-items: center; gap: 6px; margin-top: 3px;">
                                                <a href="https://wa.me/<?= $linkNum ?>" target="_blank" class="sci-icon" title="Contact">
                                                    <i class="<?= $icon ?>"></i>
                                                </a>
                                                <div class="sci-number">
                                                    <a href="tel:<?= $linkFormat ?>" style="color: inherit; text-decoration: none; font-size: 0.75rem;"><?= $contact->number ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;
                            else: ?>
                                <div class="text-center text-muted py-4"><p>No numbers found.</p></div>
                            <?php endif; ?>
                        </div>
                        <div class="sidebar-footer">
                            <span class="sf-title">Connect With Us</span>
                            <div class="sf-socials">
                                <a href="https://www.facebook.com/DigiCodersTech/" target="_blank" class="sf-icon fb"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="https://www.linkedin.com/company/digicoders/" target="_blank" class="sf-icon li"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="https://www.instagram.com/digicoderstech" target="_blank" class="sf-icon in"><i class="fa-brands fa-instagram"></i></a>
                                <a href="https://api.whatsapp.com/send?phone=919198483820" target="_blank" class="sf-icon wa"><i class="fa-brands fa-whatsapp"></i></a>
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
</body>
</html>