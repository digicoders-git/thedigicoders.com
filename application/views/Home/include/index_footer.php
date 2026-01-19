<a class="whats-app" href="https://api.whatsapp.com/send?phone=919198483820&text=I Have a%20Query%20%20%20%20"
    target="_blank" aria-label="whatsapp"> <i class="fa-brands fa-whatsapp my-float"></i> </a>
<a class="mobile" href="tel:9198483820" target="_blank" aria-label="phone"> <i class="fa-solid fa-phone my-float1"></i>
</a>
<!-- Footer ==== -->
<footer class="footer-white">

    <div class="footer-top bt0">
        <div class="container">
            <div class="subscribe-box">
                <div class="subscribe-title">
                    <h4>Subscribe to recieve weekly news via email.</h4>
                </div>
                <div class="subscribe-form m-b20">
                    <form class="subscription" id="news" action="<?= base_url() ?>Home/submitForm/NewsLetter"
                        method="post">
                        <div class="input-group">
                            <input name="Email" id="email" required="required" class="form-control"
                                placeholder="Your Email Address" type="email">
                            <span class="input-group-btn">
                                <button value="Submit" type="submit" class="btn radius-xl" id="submitBtn"> <i
                                        class="fa-solid fa-rotate fa-spin fa-fw d-none" id="submitSpin"></i>
                                    Subscribe</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="servic-section">
                <h2 class="city-title">OUR SERVICES</h2>
                <div class="state-row">


                    <?php foreach ($allservice as $service): ?>

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

                        <span class="separator">|</span>
                  <?php endforeach; ?>
                </div>
            </div>

            <div class="cities-section">
                <h2 class="city-title">CITY WE COVER</h2>

           <?php foreach ($states as $state): ?>
                    <div class="state-row">
                        <strong class="state-name"><?= $state->state_name ?></strong>

                    <?php foreach ($state->cities as $city):
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

                            <span class="separator">|</span>
                      <?php endforeach; ?>
                    </div>
              <?php endforeach; ?>
            </div>
            <section class="dg-office-section">
                <div class="dg-office-container">
                    <!-- Delhi NCR Office -->
                    <div class="dg-office-block">
                        <img src="<?= base_url('public') ?>/assets/images/loader1.jpg"
                            data-src="<?= base_url('public') ?>/assets/images/Digicoders-new-logo.png"
                            class="img-fluid footer-logo lazy" title="digicoders-logo" alt="digicoders-logo" />
                    </div>

                    <!-- Gorakhpur Office -->
                    <div class="dg-office-block">
                        <h3>LUCKNOW OFFICE</h3>
                        <p>2nd Floor, B-36, Sector O, Near Ram Ram Bank Chauraha, Aliganj, Lucknow, Uttar Pradesh,
                            226021</p>
                    </div>

                    <!-- Kolkata Office -->
                    <div class="dg-office-block">
                        <h3>KANPUR OFFICE</h3>
                        <p>1st Floor, 128/3/98, Shivaji Park (Near Rahul Petrol Pump Indian Oil), Yashoda Nagar, Kanpur,
                            Uttar Pradesh, 208011</p>
                    </div>

                    <!-- Connect With Us -->
                    <div class="dg-office-block dg-connect-block" <h3>CONNECT WITH US</h3>

                        <div class="dg-follow-section">
                            <span class="dg-follow-label">FOLLOW ON</span>
                            <div class="dg-social-icons">
                                <a href="https://www.facebook.com/DigiCodersTech/" target="_blank"
                                    class="dg-social-icon" aria-label="Facebook">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                                <a href="https://www.linkedin.com/company/digicoders/" target="_blank"
                                    class="dg-social-icon" aria-label="LinkedIn">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                                <a href="https://www.instagram.com/digicoderstech" target="_blank"
                                    class="dg-social-icon" aria-label="Instagram">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                                <a href="https://api.whatsapp.com/send?phone=919198483820&text=I have a query "
                                    target="_blank" class="dg-social-icon" aria-label="WhatsApp">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="widget footer_widget">
                        <h5 class="footer-title">Company</h5>
                        <ul>
                            <li><a href="<?= base_url() ?>Home/Index">Home</a></li>
                            <li><a href="<?= base_url() ?>Home/About">About</a></li>
                            <li><a href="<?= base_url() ?>Home/Faqs">FAQs</a></li>
                            <li><a href="<?= base_url() ?>Home/Contact">Contact</a></li>
                            <li><a href="<?= base_url() ?>Home/DownloadFeeReciept">Fee Reciept</a></li>
                            <li><a href="<?= base_url() ?>Home/PayFee">Pay Fee</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
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
                <div class="col-lg-3 col-md-3 col-sm-6">
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
                <div class="col-lg-3 col-md-2 col-sm-6">
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
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 col-sm-6 text-center  py-1"><img class="lazy object-fi footer-img"
                        src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                        data-src="<?= base_url('public') ?>/assets/images/icon/digicoders-MCA.jpeg" alt="photos" />
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 text-center  py-1"><img class="lazy object-fi footer-img"
                        src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                        data-src="<?= base_url('public') ?>/assets/images/icon/digicoders-gem.jpeg" alt="photos" />
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 text-center  py-1"><img class="lazy object-fi footer-img"
                        src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                        data-src="<?= base_url('public') ?>/assets/images/icon/digicoders-iso.jpeg" alt="photos" />
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 text-center  py-1"><img class="lazy object-fi footer-img"
                        src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                        data-src="<?= base_url('public') ?>/assets/images/icon/startup-india-digicoders.jpeg"
                        alt="photos" /></div>
                <div class="col-lg-2 col-md-6 col-sm-6 text-center  py-1"><img class="lazy object-fi footer-img"
                        src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                        data-src="<?= base_url('public') ?>/assets/images/icon/digicoders-msme.jpeg" alt="photos" />
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 text-center  py-1"><img class="lazy object-fi footer-img"
                        src="<?= base_url('public') ?>/assets/images/Loader1.jpg"
                        data-src="<?= base_url('public') ?>/assets/images/icon/Digital-India-digicoders.jpeg"
                        alt="photos" /></div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center  py-1"> <span style="font-weight: bold;">Legal
                        Name:</span> <span class=" mr-2"> DigiCoders Technologies Private Limited</span> <span
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
                        class="text-primary">DigiCoders Technologies</span> All Rights Reserved.</div>
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


<!---------floating button------>
<div id="feedback2" style="font-weight: 100 !important">
    <a href="<?= base_url() ?>Home/Registration" aria-label="left-align">Register For Training</a>
</div>

<div id="feedback3">
    <a href="https://assessment.thedigicoders.com/" target="_blank" aria-label="left-align">Assessment Portal</a>
</div>



<!-- Swiper JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/63bfbfb447425128790d02ec/1gmig9n1m';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
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