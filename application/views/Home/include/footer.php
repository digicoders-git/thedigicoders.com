<a class="whats-app" href="https://api.whatsapp.com/send?phone=919198483820&text=I Have a%20Query%20%20%20%20"
    target="_blank" aria-label="whatsapp"> <i class="fa-brands fa-whatsapp my-float"></i> </a>
<a class="mobile" href="tel:9198483820" target="_blank" aria-label="phone"> <i class="fa-solid fa-phone my-float1"></i>
</a>

<style>
    /* Full Footer Theme: #1e293b */
    footer,
    .footer-white,
    .footer-top,
    .seo-links-section,
    .footer-bottom {
        background: #1e293b !important;
        color: #f1f5f9 !important;
    }

    .footer-white {
        padding-top: 0px;
    }

    .footer-white a {
        color: #cbd5e1 !important;
        transition: all 0.3s ease;
    }

    .footer-white a:hover {
        color: #38bdf8 !important;
    }

    /* GLOBAL ALIGNMENT - MATCHING HEADER'S .prem-inner (1200px + 40px Padding) */
    footer .container,
    .footer-top .container,
    .seo-links-section .container,
    .footer-bottom .container,
    .dg-office-section .container {
        max-width: 1200px !important;
        padding-left: 40px !important;
        padding-right: 40px !important;
        margin: 0 auto !important;
        width: 100% !important;
    }

    /* Remove Bootstrap margins/paddings that cause misalignment */
    footer .row {
        margin-left: 0 !important;
        margin-right: 0 !important;
    }

    footer [class*="col-"] {
        padding-left: 0 !important;
        padding-right: 0 !important;
    }

    /* REMOVE PADDING FROM NESTED CONTAINERS TO PREVENT DOUBLE OFFSET */
    .dg-office-container {
        padding: 0 !important;
        max-width: 100% !important;
        margin: 5px 0 !important;
        display: grid !important;
        grid-template-columns: 1.2fr 1fr 1fr 1fr !important;
        gap: 20px !important;
        align-items: start !important;
    }

    .servic-section,
    .cities-section,
    .dg-office-section,
    .widget.footer_widget {
        padding: 25px 0 !important;
        margin: 0 !important;
        border-radius: 0 !important;
    }

    .city-title,
    .footer-title,
    .dg-office-block h3,
    .seo-title,
    .footer-top h1,
    .footer-top h2,
    .footer-top h3,
    .footer-top h4,
    .footer-top h5,
    .footer-top h6 {
        color: #ffffff !important;
        font-weight: 500 !important;
        text-shadow: 0 0 15px rgba(56, 189, 248, 0.2) !important;
        margin-bottom: 15px !important;
        padding-left: 0 !important;
        position: relative;
    }

    /* Standardized Orange Underline for Footer Titles */
    .footer-title::after,
    .city-title::after,
    .dg-office-block h3::after,
    .dct-office-block h3::after {
        content: '';
        position: absolute;
        left: 0 !important;
        bottom: -8px !important;
        width: 40px !important;
        height: 3px !important;
        background-color: #E76028 !important;
        /* Premium Institutional Orange */
    }

    /* Center-align underline for centered office blocks */
    .dg-office-block h3::after,
    .dct-office-block h3::after {
        left: 50% !important;
        transform: translateX(-50%) !important;
    }

    /* Standardized Scroll to Top Button (Green like Index) */
    button.back-to-top {
        background-color: #00964C !important;
        color: #ffffff !important;
        border: none !important;
    }

    button.back-to-top:hover {
        background-color: #E76028 !important;
        /* Hover transitions to brand orange */
        color: #fff !important;
    }

    /* Forced White Text for Addresses and SEO Info */
    .dg-office-block p,
    .dg-seo-desc {
        color: #ffffff !important;
        font-size: 0.93rem;
        line-height: 1.6;
        opacity: 0.95;
        margin-top: 10px;
    }

    .state-name {
        color: #38bdf8 !important;
    }

    .separator {
        color: rgba(255, 255, 255, 0.1) !important;
    }

    .dg-office-block {
        text-align: center !important;
        padding: 10px 0 !important;
        /* ONLY VERTICAL PADDING */

    }


    .dg-office-block {
        text-align: center !important;
    }

    .footer-logo {
        max-width: 170px !important;
        filter: brightness(0) invert(1) !important;
        margin: 50px 0 15px 0 !important;
    }

    /* SEO Section Specifics */
    .seo-links-section {
        padding: 5px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .seo-links-list {
        list-style: none;
        padding: 0;
        color: #ffffff !important;
    }

    .seo-links-list li {
        margin-bottom: 12px;
        position: relative;
        text-align: left;
        color: #ffffff !important;
    }

    /* Removed bullet dots per user request */

    .dg-follow-label {
        color: #94a3b8 !important;
        font-weight: bold;
        display: block;
        margin-bottom: 10px;
    }

    .dg-social-icons {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-top: 5px;
    }

    .dg-social-icon {
        width: 35px !important;
        height: 35px !important;
        line-height: 35px !important;
        background: rgba(255, 255, 255, 0.1) !important;
        color: #fff !important;
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
        border-radius: 50%;
        display: inline-block;
        transition: all 0.3s ease;
        text-align: center;
    }

    /* Brand-Specific Social Hovers - Enhanced Clarity */
    .dg-social-icon:hover {
        transform: translateY(-5px) scale(1.15) !important;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.4) !important;
    }

    .dg-social-icon.fb-hvr:hover {
        background: #1877f2 !important;
        border-color: #1877f2 !important;
    }

    .dg-social-icon.li-hvr:hover {
        background: #0a66c2 !important;
        border-color: #0a66c2 !important;
    }

    .dg-social-icon.in-hvr:hover {
        background: #e4405f !important;
        border-color: #e4405f !important;
    }

    .dg-social-icon.wa-hvr:hover {
        background: #25d366 !important;
        border-color: #25d366 !important;
    }

    /* Certification Labels */
    .cert-label {
        color: #ffffff !important;
        font-size: 0.85rem !important;
        line-height: 1.4 !important;
        margin-top: 15px !important;
        opacity: 0.95;
    }

    /* Footer Bottom Icons - Fixed Visibility */
    .footer-img {
        background: #fff !important;
        padding: 2px !important;
        border-radius: 1px !important;
        max-height: 50px !important;
        max-width: 100% !important;
        object-fit: contain !important;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2) !important;
    }

    .footer-bottom {
        padding: 25px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    /* Certification Blocks Gap */
    .footer-bottom .row>div {
        padding: 10px 15px !important;
    }

    .text-primary {
        color: #38bdf8 !important;
    }

    /* Responsive adjustments */
    @media (max-width: 991px) {
        .dg-office-container {
            grid-template-columns: repeat(2, 1fr) !important;
        }

        footer .container,
        .footer-top .container,
        .seo-links-section .container,
        .footer-bottom .container {
            padding: 0 20px !important;
        }

        .dg-office-block:first-child,
        .dg-office-block:last-child {
            text-align: center !important;
        }

        .footer-logo {
            margin: 15px auto !important;
        }

        .dg-social-icons {
            justify-content: center !important;
        }
    }

    @media (max-width: 767px) {
        .dg-office-container {
            grid-template-columns: 1fr !important;
            gap: 10px !important;
        }

        .dg-office-block {
            padding: 15px 10px !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .dg-office-block:last-child {
            border-bottom: none;
        }

        .footer-white .widget.footer_widget {
            text-align: center !important;
        }

        .footer-title::after {
            left: 50% !important;
            transform: translateX(-50%) !important;
        }

        .footer-white ul {
            padding: 0 !important;
            list-style: none !important;
        }
    }
</style>

<!-- Footer ==== -->
<footer class="footer-white">

    <div class="footer-top bt0">
        <div class="container">

            <div class="servic-section">
                <h2 class="city-title">OUR SERVICES</h2>
                <div class="state-row">


                    <?php $total_services = count($allservice);
                    $s_count = 0;
                    foreach ($allservice as $service):
                        $s_count++; ?>

                        <?php
                        // slug clean: remove -in-city
                        $clean_slug = explode('-training-', $service->url_slug)[0];
                        ?>

                        <span class="city-item">
                            <a href="<?= base_url('courses/' . $clean_slug . '-training') ?>">
                                <?= $service->service_name ?> Training
                            </a>

                            <div class="city-tooltip">
                                <div class="tooltip-text-wrapper">
                                    <?php
                                    $total = count($allservice);
                                    foreach ($allservice as $index => $service) {
                                        echo $service->service_name . ' Training ';
                                        if ($index < $total - 1) {
                                            echo ', ';
                                        }
                                    }
                                    ?>
                                </div>

                                <?php if (count($allservice) > 10): ?>
                                    <div class="tooltip-more" onclick="this.previousElementSibling.classList.toggle('expand');
             this.innerText = this.innerText === 'More...' ? 'Less...' : 'More...';">
                                        More...
                                    </div>
                                <?php endif; ?>
                            </div>

                        </span>

                        <?php if ($s_count < $total_services): ?>
                            <span class="separator">|</span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="cities-section">
                <h2 class="city-title">CITY WE COVER</h2>

                <?php foreach ($states as $state): ?>
                    <div class="state-row">
                        <strong class="state-name"><?= $state->state_name ?></strong>

                        <?php $total_cities = count($state->cities);
                        $c_count = 0;
                        foreach ($state->cities as $city):
                            $c_count++;
                            $citySlug = url_title($city->city_name, '-', true);
                            ?>
                            <span class="city-item">
                                <a href="<?= base_url('city/' . $citySlug) ?>">
                                    <?= $city->city_name ?>
                                </a>

                                <div class="city-tooltip">
                                    <div class="tooltip-text-wrapper">
                                        <?php
                                        $total = count($services);
                                        foreach ($services as $index => $service) {
                                            echo $service->service_name . ' Training in ' . $city->city_name;
                                            if ($index < $total - 1) {
                                                echo ', ';
                                            }
                                        }
                                        ?>
                                    </div>

                                    <?php if (count($services) > 10): ?>
                                        <div class="tooltip-more" onclick="this.previousElementSibling.classList.toggle('expand');
             this.innerText = this.innerText === 'More...' ? 'Less...' : 'More...';">
                                            More...
                                        </div>
                                    <?php endif; ?>
                                </div>

                            </span>

                            <?php if ($c_count < $total_cities): ?>
                                <span class="separator">|</span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <section class="dg-office-section">
                <div class="dg-office-container">
                    <!-- Delhi NCR Office -->
                    <div class="dg-office-block">
                        <img src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                            data-src="<?= base_url('public') ?>/assets/images/logo.png"
                            class="img-fluid footer-logo lazy" title="digicoders-logo" alt="digicoders-logo" />
                    </div>

                    <!-- Gorakhpur Office -->
                    <div class="dg-office-block">
                        <h3>LUCKNOW OFFICE</h3>
                        <p>2ND FLOOR, B-36, SECTOR O, NEAR RAM RAM BANK CHAURAHA, ALIGANJ, LUCKNOW, UP 226021</p>
                    </div>

                    <!-- Kolkata Office -->
                    <div class="dg-office-block">
                        <h3>KANPUR OFFICE</h3>
                        <p>340, S-BLOCK, NEAR ANNAPOORNA HOSPITAL, SHEHNAI CHAURAHA, YASHODA NAGAR, KANPUR, 208011</p>
                    </div>

                    <!-- Connect With Us -->
                    <div class="dg-office-block dg-connect-block">
                        <h3>CONNECT WITH US</h3>
                        <div class="dg-follow-section">
                            <span class="dg-follow-label">FOLLOW ON</span>
                            <div class="dg-social-icons">
                                <a href="https://www.facebook.com/DigiCodersTech/" target="_blank"
                                    class="dg-social-icon fb-hvr" aria-label="Facebook">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                                <a href="https://www.linkedin.com/company/digicoders/" target="_blank"
                                    class="dg-social-icon li-hvr" aria-label="LinkedIn">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                                <a href="https://www.instagram.com/digicoderstech" target="_blank"
                                    class="dg-social-icon in-hvr" aria-label="Instagram">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                                <a href="https://api.whatsapp.com/send?phone=919198483820&text=I have a query "
                                    target="_blank" class="dg-social-icon wa-hvr" aria-label="WhatsApp">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row text-center text-md-left">
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="widget footer_widget">
                        <h5 class="footer-title">Company</h5>
                        <ul>
                            <li><a href="<?= base_url() ?>">Home</a></li>
                            <li><a href="<?= base_url() ?>Home/About">About</a></li>
                            <li><a href="<?= base_url() ?>Home/Faqs">FAQs</a></li>
                            <li><a href="<?= base_url() ?>Home/Contact">Contact</a></li>
                            <li><a href="<?= base_url() ?>Home/DownloadFeeReciept">Fee Reciept</a></li>
                            <li><a href="<?= base_url() ?>Home/PayFee">Pay Fee</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="widget footer_widget">
                        <h5 class="footer-title">Get In Touch</h5>
                        <ul>
                            <li><a href="<?= base_url() ?>Home/DigiCodersInNews">DigiCoders In News & Media</a></li>
                            <li><a href="<?= base_url() ?>Home/VerifyCertificate">Verify Certificate</a></li>
                            <li><a href="<?= base_url() ?>Home/FinalYearProject">Final Year Project</a></li>
                            <li><a href="<?= base_url() ?>Home/Reviews">Student Reviews</a></li>
                            <!--<li><a href="<?= base_url() ?>Home/Webinars">Webinars</a></li> -->
                            <li><a href="<?= base_url() ?>Home/PrivacyPolicy">Privacy Policies</a></li>
                            <li><a href="<?= base_url() ?>Home/Blog">Blogs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="widget footer_widget">
                        <h5 class="footer-title">Trainings</h5>
                        <ul>
                            <li><a href="<?= base_url() ?>Home/ApprenticeshipTraining">Apprenticeship Training</a></li>
                            <li><a href="<?= base_url() ?>Home/IndustrialTraining">Industrial Training</a></li>
                            <li><a href="<?= base_url() ?>Home/InternshipTraining">Internship Training</a></li>
                            <li><a href="<?= base_url() ?>Home/VocationalTraining">Vocational Training</a></li>
                            <li><a href="https://assessment.thedigicoders.com/" target="_blank">Assessment Portal</a>
                            </li>
                            <li><a href="<?= base_url() ?>Home/Interviewqns">Interview Question</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="widget footer_widget">
                        <h5 class="footer-title">Our Services</h5>
                        <ul>
                            <li><a href="https://digicoders.in/Home/SoftwareDevelopment" target="_blank">Software
                                    Development</a></li>
                            <li><a href="https://digicoders.in/Home/WebsiteDevelopment" target="_blank">Website
                                    Development</a></li>
                            <li><a href="https://digicoders.in/Home/MobileApplicationDevelopment" target="_blank">Mobile
                                    Application Development</a></li>
                            <li><a href="https://digicoders.in/Home/DigitalMarketing" target="_blank">Digital
                                    Marketing</a></li>
                            <li><a href="<?= base_url() ?>Home/refund_policy">Refund And Cancellation</a></li>
                            <li><a href="https://thedigicoders.com/Home/UserLogin" target="_blank">Student Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="seo-links-section">
        <div class="container">
            <div class="row">
                <?php if (!empty($seo_links)): ?>

                    <!-- Column 1: Popular Training Programs -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h4 class="seo-title">Our Popular Training Programs</h4>
                        <ul class="seo-links-list">
                            <?php foreach ($seo_links as $link): ?>
                                <?php if ($link->section_type == 'popular'): ?>
                                    <li>
                                        <a href="<?= base_url('courses/' . $link->url_slug) ?>">
                                            <?= $link->training_name ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Column 2: More Training Links -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h4 class="seo-title">More Training Links in Lucknow</h4>
                        <ul class="seo-links-list">
                            <?php foreach ($seo_links as $link): ?>
                                <?php if ($link->section_type == 'more'): ?>
                                    <li>
                                        <a href="<?= base_url('courses/' . $link->url_slug) ?>">
                                            <?= $link->training_name ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Column 3: Advanced Training Programs -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h4 class="seo-title">Advanced Training Programs in Lucknow</h4>
                        <ul class="seo-links-list">
                            <?php foreach ($seo_links as $link): ?>
                                <?php if ($link->section_type == 'advanced'): ?>
                                    <li>
                                        <a href="<?= base_url('courses/' . $link->url_slug) ?>">
                                            <?= $link->training_name ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Column 4: Top Courses -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h4 class="seo-title">Top Courses in Lucknow</h4>
                        <ul class="seo-links-list">
                            <?php foreach ($seo_links as $link): ?>
                                <?php if ($link->section_type == 'top'): ?>
                                    <li>
                                        <a href="<?= base_url('courses/' . $link->url_slug) ?>">
                                            <?= $link->training_name ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                <?php else: ?>
                    <!-- Fallback to static if no dynamic links are added yet -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h4 class="seo-title">Our Popular Training Programs</h4>
                        <ul class="seo-links-list">
                            <li><a href="#">Best Summer Training for CS Students in Lucknow</a></li>
                            <li><a href="#">Best Summer Training for EC Students in Lucknow</a></li>
                        </ul>
                    </div>
                    <!-- ... other static columns can be added here if needed ... -->
                <?php endif; ?>
            </div>
        </div>
    </section>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-6 text-center py-2">
                    <img class="lazy object-fi footer-img" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                        data-src="<?= base_url('public') ?>/assets/images/icon/digicoders-MCA.jpeg" alt="photos" />
                    <p class="cert-label">MCA Registered Company</p>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center py-2">
                    <img class="lazy object-fi footer-img" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                        data-src="<?= base_url('public') ?>/assets/images/icon/digicoders-gem.jpeg" alt="photos" />
                    <p class="cert-label">Registered on Government e-Marketplace</p>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center py-2">
                    <img class="lazy object-fi footer-img" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                        data-src="<?= base_url('public') ?>/assets/images/icon/digicoders-iso.jpeg" alt="photos" />
                    <p class="cert-label">ISO 9001:2015 Certified Organization</p>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center py-2">
                    <img class="lazy object-fi footer-img" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                        data-src="<?= base_url('public') ?>/assets/images/icon/startup-india-digicoders.jpeg"
                        alt="photos" />
                    <p class="cert-label">Recognized by Startup India</p>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center py-2">
                    <img class="lazy object-fi footer-img" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                        data-src="<?= base_url('public') ?>/assets/images/icon/digicoders-msme.jpeg" alt="photos" />
                    <p class="cert-label">Registered under MSME</p>
                </div>
                <div class="col-lg-2 col-md-4 col-6 text-center py-2">
                    <img class="lazy object-fi footer-img" src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                        data-src="<?= base_url('public') ?>/assets/images/icon/Digital-India-digicoders.jpeg"
                        alt="photos" />
                    <p class="cert-label">Supporting Digital India Initiative</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center  py-1"> <span style="font-weight: bold;">Legal
                        Name:</span> <span class=" mr-2"> DigiCoders Technologies Pvt. Ltd.</span> <span
                        style="font-weight: bold;"> Company Type:</span> <span class=" mr-2"> Private Limited</span>
                    <span style="font-weight: bold;">Date of Incorporation:</span> <span class=" mr-2">
                        14-Feb-2019</span> <br /> <span style="font-weight: bold;"> CIN:</span> <span class=" mr-2">
                        U72900UP2019PTC113696</span> <span style="font-weight: bold;">GSTIN:</span> <span class=" mr-2">
                        09AAHCD1032D1Z6</span> <span style="font-weight: bold;">Registered Office Address:</span> <span
                        class=" "> B-36, Sector-'O', Aliganj, Lucknow, 226024</span>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center"> © <?= date('Y') ?> <span
                        class="text-primary">DigiCoders Technologies Pvt. Ltd.</span> All Rights Reserved.</div>
            </div>
        </div>
    </div>
</footer>


<!-- Enquiry Modal -->
<div class="modal fade mt-5 " id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enquiry Now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form class="contact-bx form" id="quick" action="<?= base_url() ?>Home/submitForm/Enquiry"
                    method="POST">
                    <div class="ajax-message"></div>
                    <div class="row placeani">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="mb-5">Your Name</span><br />
                                    <input name="name" type="text" required="" class="form-control valid-character">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="mb-5">Your Email Address</span><br />
                                    <input name="email" type="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="mb-5">Your Phone</span><br />
                                    <input name="phone" type="text" required="" maxlength="10" minlength="10"
                                        class="form-control int-value">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="mb-5">Type Message</span><br />
                                    <textarea name="message" rows="4" class="form-control" maxlength="250"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button name="submit" type="submit" value="Submit" class="btn button-md" id="submitBtn"> <i
                                    class="fa-solid fa-rotate fa-spin fa-fw d-none" id="submitSpin"></i> Send
                                Query</button>
                        </div>

                        <!-- <p>@ViewBag.msg</p> -->
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>




<!-- Social Links Modal -->
<div class="modal fade mt-5" id="socialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Follow Us On Social Media </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-6 col-sm-6">

                        <a href="https://www.facebook.com/DigiCodersTech/" class="btn btn-primary float-right"
                            style="background: #166FE5;"><i class="fa-brands fa-facebook-f"
                                aria-hidden="true"></i>&ensp;<span class="Followtest">Follow Us On Facebook</span></a>

                    </div>
                    <div class="col-6 col-sm-6 ">

                        <a href="https://instagram.com/digicoderstechnologies/" style="background: #FB5441;"
                            class="btn btn-danger"><i class="fa-brands fa-instagram" aria-hidden="true"></i>&ensp;<span
                                class="Followtest">Follow Us On Instagram</span></a>
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-4 mx-auto">
                        <img src="<?= base_url('public/assets/images/favicon.png') ?>" title="digicoders icon"
                            alt="digicoders icon" class="img-fluid" style="border-radius: 50% height: 30px;" ;>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="p-3 text-center">&ldquo;A Company working with Young Engineer's, Entrepreneur's and
                            Innovative Team.&rdquo;<h4>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<!-- Footer END ==== -->
<button class="back-to-top fa-solid fa-chevron-up" aria-label="top-up"></button>


<!---------side floating ribbons (Vertical)------>
<a href="https://assessment.thedigicoders.com/" target="_blank" class="dg-ribbon left assessment"
    aria-label="Assessment Portal">
    <i class="fa-solid fa-file-signature"></i> Assessment Portal
</a>

<a href="<?= base_url() ?>Home/Registration" class="dg-ribbon right registration" aria-label="Register For Training">
    <i class="fa-solid fa-user-plus"></i> Register For Training
</a>



<!-- Swiper JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<!--Start of Tawk.to Script-->
<!-- <script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/63bfbfb447425128790d02ec/1gmig9n1m';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script> -->
<!--End of Tawk.to Script-->
<script>
    document.querySelectorAll('.city-item').forEach(item => {
        item.addEventListener('mouseenter', () => {
            const tooltip = item.querySelector('.city-tooltip');
            const rect = tooltip.getBoundingClientRect();

            if (rect.right > window.innerWidth) {
                tooltip.style.left = 'auto';
                tooltip.style.right = '110%';
            }
        });
    });
</script>

<!-- Agent DigiCoders AI Assistant -->
<div id="agent-digicoders-container">
    <div id="ai-chat-bubble" onclick="toggleAiChat()">
        <i class="fa fa-robot"></i>
        <span class="bubble-notification">1</span>
    </div>

    <div id="ai-chat-window" class="hidden">
        <div class="ai-chat-header">
            <div class="header-info">
                <img src="<?= base_url('public/assets/images/favicon.png') ?>" alt="Agent">
                <div>
                    <h4>Agent DigiCoders</h4>
                    <p><span class="online-dot"></span> AI Assistant Online</p>
                </div>
            </div>
            <button onclick="toggleAiChat()" class="close-chat">&times;</button>
        </div>
        <div id="ai-chat-messages">
            <div class="message ai-msg">
                <p>Namaste! 🙏 I am <b>Agent DigiCoders</b>. How can I help you today with our courses or services?</p>
                <span class="time"><?= date('H:i') ?></span>
            </div>
        </div>

        <!-- Lead Capture Form Overlay -->
        <div id="ai-lead-form" class="hidden">
            <div class="lead-form-content">
                <h5>Identify Yourself 🚀</h5>
                <p>Chat shuru karne se pehle apna naam aur phone number dein.</p>
                <input type="text" id="lead-name" placeholder="Full Name" required>
                <input type="text" id="lead-phone" placeholder="Phone Number" maxlength="10" required>
                <div class="lead-form-buttons">
                    <button onclick="submitLead()" id="btn-submit-lead">Start Chatting</button>
                </div>
            </div>
        </div>

        <div class="ai-chat-input">
            <div id="typing-indicator" class="hidden">Agent is thinking...</div>
            <form id="ai-chat-form">
                <button type="button" id="voice-btn" onclick="toggleVoice()"><i class="fa fa-microphone"></i></button>
                <input type="text" id="ai-user-input" placeholder="Type your query..." autocomplete="off">
                <button type="submit"><i class="fa fa-paper-plane"></i></button>
            </form>
        </div>
    </div>
</div>

<style>
    /* Lead Form Styling */
    #ai-lead-form {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px;
        transition: all 0.3s ease;
    }

    #ai-lead-form.hidden {
        display: none;
        opacity: 0;
    }

    .lead-form-content {
        background: white;
        padding: 25px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 100%;
    }

    .lead-form-content h5 {
        color: #006DAB;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .lead-form-content p {
        font-size: 13px;
        color: #64748b;
        margin-bottom: 20px;
    }

    .lead-form-content input {
        width: 100%;
        padding: 12px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        margin-bottom: 12px;
        outline: none;
        font-size: 14px;
    }

    .lead-form-buttons {
        display: flex;
        gap: 10px;
    }

    #btn-submit-lead {
        flex: 2;
        background: #00964C;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 12px;
        font-weight: 700;
        cursor: pointer;
    }

    .btn-cancel {
        flex: 1;
        background: #f1f5f9;
        color: #64748b;
        border: none;
        padding: 12px;
        border-radius: 12px;
        cursor: pointer;
    }

    #voice-btn {
        background: #f1f5f9 !important;
        color: #006DAB !important;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 12px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #voice-btn.recording {
        background: #fee2e2 !important;
        color: #ef4444 !important;
        animation: pulse-red 1.5s infinite;
    }

    @keyframes pulse-red {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }

    /* Rest of the existing styles... */
    #agent-digicoders-container {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 9999;
        font-family: 'Inter', sans-serif;
    }

    #ai-chat-bubble {
        width: 55px;
        height: 55px;
        background: linear-gradient(135deg, #006DAB 0%, #00964C 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 8px 25px rgba(0, 109, 171, 0.3);
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        border: 2px solid rgba(255, 255, 255, 0.2);
    }

    #ai-chat-bubble:hover {
        transform: scale(1.1);
        box-shadow: 0 12px 30px rgba(0, 109, 171, 0.4);
    }

    #ai-chat-bubble i {
        font-size: 24px;
        color: white;
    }

    .bubble-notification {
        position: absolute;
        top: -2px;
        right: -2px;
        background: #E76028;
        color: white;
        font-size: 10px;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid white;
        font-weight: bold;
    }

    #ai-chat-window {
        position: absolute;
        bottom: 80px;
        right: 0;
        width: 350px;
        max-height: 500px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15);
        display: flex;
        flex-direction: column;
        overflow: hidden;
        transition: all 0.4s ease;
        transform-origin: bottom right;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    #ai-chat-window.hidden {
        opacity: 0;
        transform: scale(0.8);
        pointer-events: none;
    }

    .ai-chat-header {
        background: linear-gradient(135deg, #006DAB 0%, #00964C 100%);
        padding: 20px;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .header-info img {
        width: 40px;
        height: 40px;
        background: white;
        padding: 5px;
        border-radius: 12px;
    }

    .header-info h4 {
        margin: 0;
        font-size: 16px;
        font-weight: 700;
        color: white !important;
    }

    .header-info p {
        margin: 0;
        font-size: 12px;
        opacity: 0.9;
        display: flex;
        align-items: center;
        gap: 5px;
        color: white !important;
    }

    .online-dot {
        width: 8px;
        height: 8px;
        background: #4ade80;
        border-radius: 50%;
        display: inline-block;
        box-shadow: 0 0 10px #4ade80;
    }

    .close-chat {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.3s;
    }

    .close-chat:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    #ai-chat-messages {
        flex: 1;
        padding: 20px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 15px;
        background: #f8fafc;
        min-height: 300px;
        max-height: 350px;
    }

    .message {
        max-width: 85%;
        padding: 12px 16px;
        border-radius: 15px;
        font-size: 14px;
        line-height: 1.5;
        position: relative;
    }

    .message .time {
        font-size: 10px;
        opacity: 0.5;
        display: block;
        margin-top: 5px;
        text-align: right;
    }

    .ai-msg {
        background: white;
        color: #1e293b;
        align-self: flex-start;
        border-bottom-left-radius: 2px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .user-msg {
        background: #006DAB;
        color: white;
        align-self: flex-end;
        border-bottom-right-radius: 2px;
        box-shadow: 0 4px 10px rgba(0, 109, 171, 0.2);
    }

    .ai-msg b {
        color: #006DAB;
        font-weight: 700;
    }

    .ai-msg h3,
    .ai-msg h2,
    .ai-msg h1 {
        font-size: 16px;
        margin: 10px 0 5px 0;
        color: #E76028;
        font-weight: 800;
    }

    .ai-msg li {
        margin-left: 15px;
        margin-bottom: 5px;
    }

    .ai-msg p {
        margin-bottom: 0;
    }

    .ai-chat-input {
        padding: 15px;
        background: white;
        border-top: 1px solid #e2e8f0;
        position: relative;
    }

    #typing-indicator {
        position: absolute;
        top: -25px;
        left: 20px;
        font-size: 11px;
        color: #64748b;
        font-style: italic;
    }

    #typing-indicator.hidden {
        display: none;
    }

    #ai-chat-form {
        display: flex;
        gap: 10px;
    }

    #ai-user-input {
        flex: 1;
        border: 1px solid #e2e8f0;
        padding: 10px 15px;
        border-radius: 12px;
        outline: none;
        font-size: 14px;
        transition: border-color 0.3s;
    }

    #ai-user-input:focus {
        border-color: #006DAB;
    }

    #ai-chat-form button:not(#voice-btn) {
        background: #E76028;
        color: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 12px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.2s;
    }

    #ai-chat-form button:not(#voice-btn):hover {
        transform: scale(1.05);
    }

    @media (max-width: 480px) {
        #ai-chat-window {
            width: calc(100vw - 60px);
            right: 0;
        }
    }
</style>

<script>
    let recognition;
    let isRecording = false;

    function toggleAiChat() {
        const window = document.getElementById('ai-chat-window');
        window.classList.toggle('hidden');
        if (!window.classList.contains('hidden')) {
            document.querySelector('.bubble-notification').style.display = 'none';

            // Check if lead captured
            if (!localStorage.getItem('ai_lead_id')) {
                showLeadForm();
            }
        }
    }

    function showLeadForm() {
        document.getElementById('ai-lead-form').classList.remove('hidden');
    }

    function hideLeadForm() {
        document.getElementById('ai-lead-form').classList.add('hidden');
    }

    function submitLead() {
        const name = document.getElementById('lead-name').value.trim();
        const phone = document.getElementById('lead-phone').value.trim();
        const btn = document.getElementById('btn-submit-lead');

        if (!name || phone.length < 10) {
            alert("Please enter valid name and 10-digit phone number.");
            return;
        }

        btn.disabled = true;
        btn.innerText = "Submitting...";

        fetch('<?= base_url('AiAssistant/save_lead') ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `name=${encodeURIComponent(name)}&phone=${encodeURIComponent(phone)}`
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    hideLeadForm();
                    localStorage.setItem('ai_user_name', name);
                    localStorage.setItem('ai_lead_id', data.lead_id);
                    appendMessage('ai', "Dhanyawad " + name + "! Aap chatting shuru kar sakte hain. Main aapki kaise madad kar sakta hoon?");

                    // Only speak if user had clicked voice before? No, just speak the welcome.
                    // Actually user said only speak if user speaks. So welcome can be silent or text only.

                    // WhatsApp Integration (Optional, can be removed if user just wants chat)
                    // let msg = `Hello DigiCoders, I am ${name}. I want to know more about your courses. My phone: ${phone}`;
                    // window.open(`https://wa.me/919198483820?text=${encodeURIComponent(msg)}`, '_blank');
                } else {
                    alert("Error saving lead. Please try again.");
                    btn.disabled = false;
                    btn.innerText = "Submit Details";
                }
            })
            .catch(err => {
                alert("Network error.");
                btn.disabled = false;
                btn.innerText = "Submit Details";
            });
    }

    let messageSource = 'text';

    // Voice Recognition (Speech to Text)
    if ('webkitSpeechRecognition' in window) {
        recognition = new webkitSpeechRecognition();
        recognition.continuous = false;
        recognition.interimResults = false;
        recognition.lang = 'en-IN';

        recognition.onresult = function (event) {
            const text = event.results[0][0].transcript;
            document.getElementById('ai-user-input').value = text;
            messageSource = 'voice';
            stopVoice();
            document.getElementById('ai-chat-form').dispatchEvent(new Event('submit'));
        };

        recognition.onend = function () {
            stopVoice();
        };
    }

    function toggleVoice() {
        if (!recognition) {
            alert("Voice recognition not supported in this browser.");
            return;
        }
        if (isRecording) {
            stopVoice();
        } else {
            startVoice();
        }
    }

    function startVoice() {
        isRecording = true;
        document.getElementById('voice-btn').classList.add('recording');
        recognition.start();
    }

    function stopVoice() {
        isRecording = false;
        document.getElementById('voice-btn').classList.remove('recording');
        if (recognition) recognition.stop();
    }

    // Text to Speech
    function speak(text) {
        if ('speechSynthesis' in window) {
            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = 'hi-IN';
            utterance.rate = 1.0;
            speechSynthesis.speak(utterance);
        }
    }

    document.getElementById('ai-chat-form').addEventListener('submit', function (e) {
        e.preventDefault();

        // Check Lead Capture
        if (!localStorage.getItem('ai_lead_id')) {
            showLeadForm();
            return;
        }

        const input = document.getElementById('ai-user-input');
        const message = input.value.trim();
        if (!message) return;

        appendMessage('user', message);
        input.value = '';

        const indicator = document.getElementById('typing-indicator');
        indicator.classList.remove('hidden');

        const currentSource = messageSource;
        messageSource = 'text'; // Reset for next message

        fetch('<?= base_url('AiAssistant/chat') ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'message=' + encodeURIComponent(message) + '&source=' + currentSource
        })
            .then(response => response.json())
            .then(data => {
                indicator.classList.add('hidden');
                if (data.status === 'success') {
                    appendMessage('ai', data.reply);

                    // Requirement: Only speak if user spoke
                    if (data.source === 'voice') {
                        speak(data.reply.replace(/<[^>]*>?/gm, '')); // Speak without HTML tags
                    }

                    if (data.showLeadForm) {
                        setTimeout(showLeadForm, 1500);
                    }
                } else {
                    appendMessage('ai', "Sorry, I encountered an error. Please try again.");
                }
            })
            .catch(err => {
                indicator.classList.add('hidden');
                appendMessage('ai', "Network error. Please check your connection.");
            });
    });

    function formatMarkdown(text) {
        if (!text) return "";
        text = text.replace(/\*\*(.*?)\*\*/g, '<b>$1</b>');
        text = text.replace(/^### (.*$)/gim, '<h3>$1</h3>');
        text = text.replace(/^## (.*$)/gim, '<h2>$1</h2>');
        text = text.replace(/^# (.*$)/gim, '<h1>$1</h1>');
        text = text.replace(/^\* (.*$)/gim, '<li>$1</li>');
        text = text.replace(/\n\n/g, '<br><br>');
        text = text.replace(/\n/g, '<br>');
        return text;
    }

    function appendMessage(role, text) {
        const container = document.getElementById('ai-chat-messages');
        const msgDiv = document.createElement('div');
        msgDiv.className = `message ${role === 'user' ? 'user-msg' : 'ai-msg'}`;
        const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

        if (role === 'user') {
            msgDiv.innerHTML = `<p>${text}</p><span class="time">${time}</span>`;
            container.appendChild(msgDiv);
            container.scrollTop = container.scrollHeight;
        } else {
            const formattedText = formatMarkdown(text);
            msgDiv.innerHTML = `<p></p><span class="time">${time}</span>`;
            container.appendChild(msgDiv);
            const typingP = msgDiv.querySelector('p');
            let i = 0;
            msgDiv.classList.add('typing-active');

            function typeWriter() {
                if (i < text.length) {
                    typingP.innerText = text.substring(0, i + 1);
                    i++;
                    container.scrollTop = container.scrollHeight;
                    setTimeout(typeWriter, 10);
                } else {
                    typingP.innerHTML = formattedText;
                    msgDiv.classList.remove('typing-active');
                    container.scrollTop = container.scrollHeight;
                }
            }
            typeWriter();
        }
    }
</script>