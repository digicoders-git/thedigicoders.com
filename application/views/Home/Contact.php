<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Contact Us - Software Development and Training Center in India</title>
		<meta name="description" content="Do you have any problems developing and submitting your final year project? Just fill out the form and we will resolve the issue.">
		<meta property="og:title" content="Contact Us - Software Development and Training Center in India" />
		<meta property="og:description" content="Do you have any problems developing and submitting your final year project? Just fill out the form and we will resolve the issue." />
		<meta property="og:url" content="https://thedigicoders.com/Home/Contact" />
		<link rel="canonical" href="https://thedigicoders.com/Home/Contact" />  
		
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            function submitcontectform(){
                document.getElementById('submitBtn').disabled=false
            }
        </script>
		
		<style>
			.parsley-required {
            color: red;
			}
			 <style>

.container {
    max-width: 1320px;
    margin: auto;
}

.teams-contact-section {
    padding: 90px 0;
    background: #f6f8fc;
}

/* =================== SECTION TITLE =================== */
.section-title {
    text-align: center;
    margin-bottom: 70px;
}

.section-title h2 {
    font-size: 2.1rem;
    font-weight: 700;
    color: #1f2937;
    position: relative;
}

.section-title h2::after {
    content: "";
    width: 60px;
    height: 3px;
    background: #2563eb;
    display: block;
    margin: 15px auto 0;
    border-radius: 3px;
}

.section-title p {
    margin-top: 25px;
    max-width: 720px;
    margin-left: auto;
    margin-right: auto;
    color: #6b7280;
    font-size: 1rem;
    line-height: 1.7;
}

/* =================== GRID =================== */
.teams-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
}

/* =================== CARD =================== */
.team-card {
    background: #ffffff;
    border-radius: 10px;
    border: 1px solid #e5e7eb;
    transition: all 0.25s ease;
}

.team-card:hover {
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    transform: translateY(-4px);
}

/* =================== HEADER =================== */
.team-header {
    padding: 12px;
    font-size: 13px;
    text-transform: uppercase;
    font-weight: 600;
    color: #374151;
    background: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
}

/* =================== BANNER =================== */
.team-banner {
    position: relative;
    padding: 24px;
    min-height: 100px;
}

.banner-bg {
    display: none;
}

/* =================== TEXT =================== */
.team-title {
    font-size: 20px;
    font-weight: 700;
    color: #111827;
}

.team-subtitle {
    font-size: 15px;
    font-weight: 600;
    color: #2563eb;
}

/* =================== ICON =================== */
.banner-image {
    position: absolute;
    right: 20px;
    top: 25px;
    width: 44px;
    height: 44px;
    background: #eff6ff;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.banner-image i {
    font-size: 20px;
    color: #2563eb;
}

/* =================== CONTACT =================== */
.team-contact {
    padding: 20px;
    border-top: 1px solid #e5e7eb;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.contact-column {
    text-align: center;
}

.phone-number {
    font-size: 15px;
    font-weight: 600;
    color: #111827;
    margin-bottom: 10px;
}

/* =================== BUTTONS =================== */
.contact-buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.btn-contact {
    width: 30px;
    height: 30px;
    border-radius: 6px;
    font-size: 14px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    transition: 0.2s ease;
}

.btn-whatsapp {
    background: #0bc850ff;
}

.btn-call {
    background: #d81313ff;
}

.btn-contact:hover {
    opacity: 0.9;
}

/* =================== CONTACT INFO CARDS =================== */
.conact-info-wrap {
    border-radius: 10px;
    border: 1px solid #e5e7eb;
    background: #ffffff;
    transition: 0.25s ease;
}

.conact-info-wrap:hover {
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

.conact-info-wrap h4 i {
    font-size: 28px;
    color: #2563eb;
    margin-bottom: 8px;
}

/* =================== RESPONSIVE =================== */
@media (max-width: 1200px) {
    .teams-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .teams-grid {
        grid-template-columns: 1fr;
    }

    .section-title h2 {
        font-size: 1.7rem;
    }
}


    </style>
		</style>
		<?php include('include/headerlinks.php')  ?>
	</head>
	
	<body>
		<?php include('include/header.php')  ?>
		
		<!-- Form -->
		<div class="section-area section-sp3 ovpr-dark bg-fix appointment-box" style="background-image:url(/assets/images/background/bg1.jpg);">
			<div class="container">
				<div class="row">
					<div class="col-md-12 heading-bx style1 text-white text-center">
						<h1 class="title-head">Contact Us</h1>
						<p>Any Students free to contact us. We Solves their issues</p>
					</div>
				</div>
				<form class="contact-bx" id="quick" action="<?= base_url() ?>Home/submitForm/Enquiry" method="POST">
				<?php
                                $csrf = array(
                               'name' => $this->security->get_csrf_token_name(),
                               'hash' => $this->security->get_csrf_hash());                  
                            ?>
							<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
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
									<input name="email" type="email" class="form-control" >
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<span class="mb-5">Your Phone</span><br />
									<input name="phone" type="text" required="" maxlength="10" minlength="10" class="form-control int-value">
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
						
						 <!-- Google reCAPTCHA -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6LfHIQcrAAAAALPXPP-R1SamLeZxPHGPA_xfMNOh" data-callback="submitcontectform"></div>
                                </div>
                            </div>
								
						
						<div class="col-lg-12">
							<button name="submit" type="submit" value="Submit" disabled="disabled" class="btn button-md" id="submitBtn"> <i class="fa fa-refresh fa-spin fa-fw d-none" id="submitSpin"></i> Send Query</button>
						</div>
						
						<!-- <p>@ViewBag.msg</p> -->
					</div>
				</form>
				<br>
				<br>
	<!--====================  Teams Contact Section Start ====================-->
<div class="teams-contact-section">
    <div class="container">
        <div class="section-title">
            <h2>Contact Our Teams Directly</h2>
            <p>Connect with our specialized teams for personalized assistance. Each team is dedicated to
                providing exceptional support in their respective domains.</p>
        </div>

        <div class="row">
            <div class="container">
                <div class="teams-grid">
                    <!-- Sales Team Card -->
                    <div class="team-card">
                        <div class="team-header">Sales Team</div>
                        <div class="team-banner">
                            <div class="banner-bg sales"></div>
                            <div class="banner-content">
                                <div class="team-title">DigiCoders</div>
                                <div class="team-subtitle sales">Sales Team</div>
                            </div>
                            <div class="banner-image">
                                <i class="fa fa-line-chart"></i>
                            </div>
                        </div>
                        <div class="team-contact">
                            <div class="contact-column">
                                <div class="phone-number">9628092950</div>
                                <div class="contact-buttons">
                                    <a href="https://wa.me/919628092950" class="btn-contact btn-whatsapp">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                    <a href="tel:9628092950" class="btn-contact btn-call">
                                        <i class="fa fa-phone"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="contact-column">
                                <div class="phone-number">9628092951</div>
                                <div class="contact-buttons">
                                    <a href="https://wa.me/919628092951" class="btn-contact btn-whatsapp">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                    <a href="tel:9628092951" class="btn-contact btn-call">
                                        <i class="fa fa-phone"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- HR Team Card -->
                    <div class="team-card">
                        <div class="team-header">HR Team</div>
                        <div class="team-banner">
                            <div class="banner-bg hr"></div>
                            <div class="banner-content">
                                <div class="team-title">DigiCoders</div>
                                <div class="team-subtitle hr">HR Team</div>
                            </div>
                            <div class="banner-image">
                                <i class="fa fa-users"></i>
                            </div>
                        </div>
                        <div class="team-contact">
                            <div class="contact-column">
                                <div class="phone-number">9628092950</div>
                                <div class="contact-buttons">
                                    <a href="https://wa.me/919628092950" class="btn-contact btn-whatsapp">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                    <a href="tel:9628092950" class="btn-contact btn-call">
                                        <i class="fa fa-phone"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="contact-column">
                                <div class="phone-number">9628092951</div>
                                <div class="contact-buttons">
                                    <a href="https://wa.me/919628092951" class="btn-contact btn-whatsapp">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                    <a href="tel:9628092951" class="btn-contact btn-call">
                                        <i class="fa fa-phone"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Support Team Card -->
                    <div class="team-card">
                        <div class="team-header">Support Team</div>
                        <div class="team-banner">
                            <div class="banner-bg support"></div>
                            <div class="banner-content">
                                <div class="team-title">DigiCoders</div>
                                <div class="team-subtitle support">Support Team</div>
                            </div>
                            <div class="banner-image">
                                <i class="fa fa-headphones"></i>
                            </div>
                        </div>
                        <div class="team-contact">
                            <div class="contact-column">
                                <div class="phone-number">9628092950</div>
                                <div class="contact-buttons">
                                    <a href="https://wa.me/919628092950" class="btn-contact btn-whatsapp">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                    <a href="tel:9628092950" class="btn-contact btn-call">
                                        <i class="fa fa-phone"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="contact-column">
                                <div class="phone-number">9628092951</div>
                                <div class="contact-buttons">
                                    <a href="https://wa.me/919628092951" class="btn-contact btn-whatsapp">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                    <a href="tel:9628092951" class="btn-contact btn-call">
                                        <i class="fa fa-phone"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Admin Team Card -->
                    <div class="team-card">
                        <div class="team-header">Admin Team</div>
                        <div class="team-banner">
                            <div class="banner-bg admin"></div>
                            <div class="banner-content">
                                <div class="team-title">DigiCoders</div>
                                <div class="team-subtitle admin">Admin Team</div>
                            </div>
                            <div class="banner-image">
                                <i class="fa fa-cogs"></i>
                            </div>
                        </div>
                        <div class="team-contact">
                            <div class="contact-column">
                                <div class="phone-number">9628092950</div>
                                <div class="contact-buttons">
                                    <a href="https://wa.me/919628092950" class="btn-contact btn-whatsapp">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                    <a href="tel:9628092950" class="btn-contact btn-call">
                                        <i class="fa fa-phone"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="contact-column">
                                <div class="phone-number">9628092951</div>
                                <div class="contact-buttons">
                                    <a href="https://wa.me/919628092951" class="btn-contact btn-whatsapp">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                    <a href="tel:9628092951" class="btn-contact btn-call">
                                        <i class="fa fa-phone"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====================  Teams Contact Section End ====================-->
            <br><br>
            <!--====================  Teams Contact Section End ====================-->
				<!--Map area-->
				<div class="row mt-5">
					<div class="col-lg-6 col-md-6">
						<div class="bg-primary text-white contact-info-bx">
							<h2 class="m-b10 title-head">Lucknow Branch</h2>
							<div class="widget widget_getintuch">
								<ul>
									<li><i class="ti-location-pin"></i>2nd Floor, B-36, Sector O, Near Ram Ram Bank Chauraha, Aliganj, Lucknow Uttar Pradesh 226021</li>
									<li><i class="ti-mobile"></i><a href="tel:+91 9198483820"><span class="text-white">+91 9198483820</span></a></li>
									<!-- <li><i class="ti-mobile"></i><a href="tel:+91 8081347355"><span class="text-white">+91 8081347355</span></a></li> -->
									<li><i class="ti-mobile"></i><a href="tel:+91 8081329320"><span class="text-white">+91 8081329320</span></a></li>
									<li><i class="ti-mobile"></i><a href="tel:+91 7525953975"><span class="text-white">+91 7525953975</span></a></li>
									<li><i class="ti-mobile"></i><a href="tel:0522-4235604"><span class="text-white">0522-4235604</span></a></li>
									<li><i href="mailto:digicoderstech@gmail.com" class="ti-email"></i><a href="mailto:info@thedigicoders.com"><span class="text-white">info@thedigicoders.com</span></a></li>
								</ul>
							</div>
							<h5 class="m-t0 m-b20">Follow Us</h5>
							<ul class="list-inline contact-social-bx">
								<li><a target="_blank" href="https://www.facebook.com/DigiCodersTech/" class="btn outline radius-xl" aria-label="facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a target="_blank" href="https://twitter.com/DigiCodersTech/" class="btn outline radius-xl" aria-label="twitter"><i class="ri-twitter-x-fill"></i></a></li>
								<li><a target="_blank" href="https://www.linkedin.com/company/digicoders" class="btn outline radius-xl" aria-label="linkedin"><i class="fa fa-linkedin"></i></a></li>
								<li><a target="_blank" href="https://api.whatsapp.com/send?phone=919198483820&text=I have a query " class="btn outline radius-xl" aria-label="whatsapp"><i class="fa fa-whatsapp"></i></a></li>
								<li>
									<a target="_blank" href="https://www.instagram.com/digicoderstech" class="btn outline radius-xl" aria-label="instagram"><i class="fa fa-instagram"></i></a>
									
								</li>
							</ul>
						</div>
					</div>
					
					<div class="col-lg-6 col-md-6 col-sm-12">
						
                    <div class="bg-primary text-white contact-info-bx">
							<h2 class="m-b10 title-head">Kanpur Branch</h2>
							<div class="widget widget_getintuch">
								<ul>
									<li><i class="ti-location-pin"></i>128/3/98, Yashoda Nagar, Kanpur, UP, 208011,<br> Opp. Shivaji Park (Near Rahul Petrol Pump Indian Oil)</li>
									<li><i class="ti-mobile"></i><a href="tel:+91 9198483820"><span class="text-white">+91 9198483820</span></a></li>
									<!-- <li><i class="ti-mobile"></i><a href="tel:+91 8081347355"><span class="text-white">+91 8081347355</span></a></li> -->
									<li><i class="ti-mobile"></i><a href="tel:+91 8081329320"><span class="text-white">+91 8081329320</span></a></li>
									<li><i class="ti-mobile"></i><a href="tel:+91 7525953975"><span class="text-white">+91 7525953975</span></a></li>
									<li><i class="ti-mobile"></i><a href="tel:0522-4235604"><span class="text-white">0522-4235604</span></a></li>
									<li><i href="mailto:digicoderstech@gmail.com" class="ti-email"></i><a href="mailto:info@thedigicoders.com"><span class="text-white">info@thedigicoders.com</span></a></li>
								</ul>
							</div>
							<h5 class="m-t0 m-b20">Follow Us</h5>
							<ul class="list-inline contact-social-bx">
								<li><a target="_blank" href="https://www.facebook.com/DigiCodersTech/" class="btn outline radius-xl" aria-label="facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a target="_blank" href="https://twitter.com/DigiCodersTech/" class="btn outline radius-xl" aria-label="twitter"><i class="ri-twitter-x-fill"></i></a></li>
								<li><a target="_blank" href="https://www.linkedin.com/company/digicoders/" class="btn outline radius-xl" aria-label="linkedin"><i class="fa fa-linkedin"></i></a></li>
								<li><a target="_blank" href="https://api.whatsapp.com/send?phone=919198483820&text=I have a query " class="btn outline radius-xl" aria-label="whatsapp"><i class="fa fa-whatsapp"></i></a></li>
								<li>
									<a target="_blank" href="https://www.instagram.com/digicoderstech" class="btn outline radius-xl" aria-label="instagram"><i class="fa fa-instagram"></i></a>
									
								</li>
							</ul>
						</div>
						
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-lg-6 col-md-6 col-sm-12 m-b30">

                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3558.9013562650925!2d80.93581361451977!3d26.874874968188852!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd90f852511b%3A0xea3004cdf494ecbb!2sDigiCoders%20Technologies%20Private%20Limited!5e0!3m2!1sen!2sin!4v1597993165278!5m2!1sen!2sin" width="100%" height="400px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

					</div>
					<div class="col-lg-6 col-md-6 col-sm-12" style="margin-bottom: 70px;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d446.6710743884484!2d80.3279873!3d26.4115793!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c46fa3bd92ec7%3A0xfa3df7c74af45433!2s128%2F03%2F98%2C%20Near%20Bustaff%20Chauraha%2C%20Yashoda%20Nagar%2C%20Kanpur%2C%20Uttar%20Pradesh%20208011!5e0!3m2!1sen!2sin!4v1749298535923!5m2!1sen!2sin" width="100%" height="400px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
						
					</div>
				</div>
			</div>
			<!-- @*<img src="~/assets/images/background/appointment-bg.png" class="appoint-bg" alt="">*@ -->
		</div>
		<!-- Form END -->
		
		
		
        
		
		<?php include('include/footer.php')  ?>
		<?php include('include/jslinks.php')  ?>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	</body>
	<script>
		$('#quick').parsley();
	</script>
	
</html>