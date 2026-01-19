<footer>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <div class="footer-top">
       <div class="dct-servic-section">
    <h2 class="dct-city-title">OUR SERVICES</h2>
    <div class="dct-state-row">
        <?php foreach ($allservice as $service): ?>
            <?php
                $clean_slug = explode('-training-', $service->url_slug)[0];
            ?>

            <span class="dct-city-item">
                        <a href="<?= base_url('courses/' . $clean_slug . '-training') ?>">
                    <?= $service->service_name ?> Training
                </a>

                <div class="dct-city-tooltip">
                    <div class="dct-tooltip-text-wrapper">
                        <?php
                        $total = count($allservice);
                        foreach ($allservice as $index => $service) {
                            echo $service->service_name . ' training ';
                            if ($index < $total - 1) {
                                echo ', ';
                            }
                        }
                        ?>
                    </div>

                    <?php if (count($allservice) > 10): ?>
                        <div class="dct-tooltip-more" onclick="this.previousElementSibling.classList.toggle('dct-expand');
             this.innerText = this.innerText === 'More...' ? 'Less...' : 'More...';">
                            More...
                        </div>
                    <?php endif; ?>
                </div>
            </span>

            <span class="dct-separator">|</span>
        <?php endforeach; ?>
    </div>
</div>

<div class="dct-cities-section">
    <h2 class="dct-city-title">CITY WE COVER</h2>

    <?php foreach ($states as $state): ?>
        <div class="dct-state-row">
            <strong class="dct-state-name"><?= $state->state_name ?></strong>

            <?php foreach ($state->cities as $city):
                $citySlug = url_title($city->city_name, '-', true);
                ?>
                <span class="dct-city-item">
                    <a href="<?= base_url('city/' . $citySlug) ?>">
                        <?= $city->city_name ?>
                    </a>

                    <div class="dct-city-tooltip">
                        <div class="dct-tooltip-text-wrapper">
                            <?php
                            $total = count($services);
                            foreach ($services as $index => $service) {
                                echo $service->service_name . ' training in ' . $city->city_name;
                                if ($index < $total - 1) {
                                    echo ', ';
                                }
                            }
                            ?>
                        </div>

                        <?php if (count($services) > 10): ?>
                            <div class="dct-tooltip-more" onclick="this.previousElementSibling.classList.toggle('dct-expand');
             this.innerText = this.innerText === 'More...' ? 'Less...' : 'More...';">
                                More...
                            </div>
                        <?php endif; ?>
                    </div>
                </span>

                <span class="dct-separator">|</span>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
        <section class="dct-office-section">
    <div class="dct-office-container">

        <!-- Logo -->
        <div class="dct-office-block">
           <img src="<?= base_url('public') ?>/assets/images/DigiCoders Logo White.png" title="digicoders logo" alt="digicoders logo">
        </div>

        <!-- Lucknow Office -->
        <div class="dct-office-block">
            <h3>LUCKNOW OFFICE</h3>
            <p>
                2nd Floor, B-36, Sector O, Near Ram Ram Bank Chauraha,
                Aliganj, Lucknow, Uttar Pradesh, 226021
            </p>
        </div>

        <!-- Kanpur Office -->
        <div class="dct-office-block">
            <h3>KANPUR OFFICE</h3>
                    <p>1st Floor, 128/3/98, Shivaji Park (Near Rahul Petrol Pump Indian Oil), Yashoda Nagar, Kanpur,
                        Uttar Pradesh, 208011</p>
        </div>

        <!-- Connect With Us -->
        <div class="dct-office-block dct-connect-block">
            <h3>CONNECT WITH US</h3>

            <div class="dct-follow-section">
                <span class="dct-follow-label">FOLLOW ON</span>

                <div class="dct-social-icons">
                    <a href="https://www.facebook.com/DigiCodersTech/" target="_blank"
                       class="dct-social-icon" aria-label="Facebook">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="https://www.linkedin.com/company/digicoders/" target="_blank"
                       class="dct-social-icon" aria-label="LinkedIn">
                        <i class="fa fa-linkedin"></i>
                    </a>

                    <a href="https://www.instagram.com/digicoderstech" target="_blank"
                       class="dct-social-icon" aria-label="Instagram">
                        <i class="fa fa-instagram"></i>
                    </a>

                    <a href="https://api.whatsapp.com/send?phone=919198483820&text=I have a query"
                       target="_blank"
                       class="dct-social-icon" aria-label="WhatsApp">
                        <i class="fa fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

        <div class="container">
            <div class="row">
                <div class="col-lg-4 footer-col-4">
                    <div class="widget">
                        <h5 class="footer-title">Sign Up For A Newsletter</h5>
                        <p class="text-capitalize m-b20">Weekly Breaking news analysis and cutting edge advices on Software Trainings.</p>
                        <div class="subscribe-form m-b20">
                            <form id="news" action="<?= base_url() ?>Home/submitForm/NewsLetter" method="post">
                                <!-- @*<div class="ajax-message"></div>*@ -->
                                <div class="input-group">
                                    <input name="Email" required="required" class="form-control" placeholder="Your Email Address" type="email">
                                    <span class="input-group-btn">
                                        <button value="Submit" type="submit" class="btn" id="submitBtn"><i class="fa fa-arrow-right"></i></button>
									</span>
								</div>
							</form>
						</div>
						
					</div>
				</div>
                <div class="col-lg-8 col-md-12 col-xs-12 footer-col-8">
                    <div class="row">
                        <div class="col-sm-3 col-xs-6">
                            <div class="widget footer_widget">
                                <h5 class="footer-title">Company</h5>
                                <ul>
                                    <li><a href="<?= base_url() ?>Home/Index">Home</a></li>
                                    <li><a href="<?= base_url() ?>Home/About">About</a></li>
                                    <li><a href="<?= base_url() ?>Home/Faqs">FAQs</a></li>
                                    <li><a href="<?= base_url() ?>Home/Contact">Contact</a></li> 
									<li><a href="<?= base_url() ?>Home/DownloadFeeReciept">Fee Reciept</a></li>
									<li><a href="<?= base_url() ?>Home/PayFee">Pay Fee</a></li>
									<li><a href="<?= base_url() ?>Home/Interviewqns">Interview Question</a></li>
									
								</ul>
							</div>
							</div>
							<div class="col-sm-3 col-xs-6">
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
                        <div class="col-sm-3 col-xs-6 ">
                            <div class="widget footer_widget">
                                <h5 class="footer-title">Trainings</h5>
                                <ul>
                                    <li><a href="<?= base_url() ?>Home/ApprenticeshipTraining">Apprenticeship Training</a></li>
                                    <li><a href="<?= base_url() ?>Home/IndustrialTraining">Industrial Training</a></li>
                                    <li><a href="<?= base_url() ?>Home/InternshipTraining">Internship Training</a></li>
                                    <li><a href="<?= base_url() ?>Home/VocationalTraining">Vocational Training</a></li>
									<li><a href="<?= base_url() ?>Home/term_condition">Terms & Condition</a></li>
									 <li><a href="https://assessment.thedigicoders.com/" target="_blank">Assessment Portal</a></li>
								</ul>
							</div>
						</div>
                        <div class="col-sm-3 col-xs-6 ">
                            <div class="widget footer_widget">
                                <h5 class="footer-title">Our Services</h5>
                                <ul>
                                    <li><a href="https://digicoders.in/Home/SoftwareDevelopment" target="_blank" rel="noopener">Software Development</a></li>
                                    <li><a href="https://digicoders.in/Home/WebsiteDevelopment" target="_blank" rel="noopener">Website Development</a></li>
                                    <li><a href="https://digicoders.in/Home/MobileApplicationDevelopment" target="_blank" rel="noopener">Mobile Application Development</a></li>
                                    <li><a href="https://digicoders.in/Home/DigitalMarketing" target="_blank" rel="noopener">Digital Marketing</a></li>
									<li><a href="<?= base_url() ?>Home/refund_policy">Refund & Cancellation</a></li>
									<li><a href="https://thedigicoders.com/Home/UserLogin" target="_blank">Student Login</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
            <div class="col-lg-2 col-md-6 col-sm-6 text-center  py-1"><img class="lazy object-fi" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public') ?>/assets/images/icon/digicoders-MCA.jpeg" alt="photos" style="height:50px;" /></div>
            <div class="col-lg-2 col-md-6 col-sm-6 text-center  py-1"><img class="lazy object-fi" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public') ?>/assets/images/icon/digicoders-gem.jpeg" alt="photos" style="height:50px;" /></div>
            <div class="col-lg-2 col-md-6 col-sm-6 text-center  py-1"><img class="lazy object-fi" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public') ?>/assets/images/icon/digicoders-iso.jpeg" alt="photos" style="height:50px;" /></div>
            <div class="col-lg-2 col-md-6 col-sm-6 text-center  py-1"><img class="lazy object-fi" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public') ?>/assets/images/icon/startup-india-digicoders.jpeg" alt="photos" style="height:50px;" /></div>
            <div class="col-lg-2 col-md-6 col-sm-6 text-center  py-1"><img class="lazy object-fi" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public') ?>/assets/images/icon/digicoders-msme.jpeg" alt="photos" style="height:50px;" /></div>
            <div class="col-lg-2 col-md-6 col-sm-6 text-center  py-1"><img class="lazy object-fi" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public') ?>/assets/images/icon/Digital-India-digicoders.jpeg" alt="photos" style="height:50px;" /></div>
			
			</div>
		</div>
	</div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center text-white py-1"> <span style="font-weight: bold;">Legal Name:</span> <span class="text-white mr-2"> DigiCoders Technologies Private Limited</span> <span style="font-weight: bold;"> Company Type:</span> <span class="text-white mr-2"> Private Limited</span>  <span style="font-weight: bold;">Date of Incorporation:</span> <span class="text-white mr-2"> 14-Feb-2019</span> <br/> <span style="font-weight: bold;"> CIN:</span> <span class="text-white mr-2"> U72900UP2019PTC113696</span>  <span style="font-weight: bold;">GSTIN:</span> <span class="text-white mr-2"> 09AAHCD1032D1Z6</span>  <span style="font-weight: bold;">Registered Office Address:</span> <span class="text-white "> B-36, Sector-'O', Aliganj, Lucknow, 226024</span> </div>
			</div>
		</div>
	</div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center"> © <?= date('Y') ?> <span class="text-white">DigiCoders Technologies</span> All Rights Reserved.</div>
			</div>
		</div>
	</div>
</footer>

<a class="whats-app" href="https://api.whatsapp.com/send?phone=919198483820&text=Welcome%20to%20DigiCoders%20Technologies%20Pvt%20Ltd" target="_blank" aria-label="whatsapp"> <i class="fa fa-whatsapp my-float"></i> </a>
<a class="mobile" href="tel:9198483820" target="_blank" aria-label="phone"> <i class="fa fa-phone my-float1"></i> </a>



<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/63bfbfb447425128790d02ec/1gmig9n1m';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<script>
    document.querySelectorAll('.dct-city-item').forEach(item => {
        item.addEventListener('mouseenter', () => {
            const tooltip = item.querySelector('.dct-city-tooltip');
            const rect = tooltip.getBoundingClientRect();

            if (rect.right > window.innerWidth) {
                tooltip.style.left = 'auto';
                tooltip.style.right = '110%';
            }
        });
    });
</script>