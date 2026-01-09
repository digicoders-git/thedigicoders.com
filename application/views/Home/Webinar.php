<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Webinar - Best Web Development Training Institute in India</title>
		<meta name="description" content="Join our best web development webinar in India. Registration online for web and app development training in Lucknow.">
		<?php include('include/headerlinks.php')  ?>
		<style>
			.all-review {
            border: 0px !important;
			}
			#modalbtn
			{
			position: relative;
			margin-top: -150px;
			}
			
			#example2 {
            border: 0px solid;
            padding: 10px;
            box-shadow: 5px 5px 5px 5px #888888;
			height: 650px;
			}
			
			.acod-head a.collapsed:after {
            content: none !important;
            font-size: 16px;
            font-family: "themify";
			}
			
			.section-sp2 {
            padding-top: 80px !important;
            padding-bottom: 20px !important;
			}
			
			@media only screen and (max-width: 600px) {
			.review-bx 
			{
			flex-direction: column !important;
			}
			#college_log
			{
			height: 100px !important;
			}
			#cp_logo
			{
			height: 100px !important;
			}
			#modalbtn
			{
			position: static;
			margin-top: 0px;
			}
			
			}
			
		</style>
		
	</head>
	
	<body>
		<?php include('include/header.php')  ?>
		<div class="page-content bg-white">
			<!-- inner page banner -->
			<div class="page-banner ovbl-dark" style="background-image:url(<?= base_url('public') ?>/assets/images/banner/banner5.jpg); height: 211px !important;">
				<div class="container">
					<div class="page-banner-entry">
						<h2 class="title-head text-white text-uppercase m-b0">Webinar On <br> <span> &quot;The Latest Technology In IT&quot; </span></h2>
						<p class="text-white">In Association With</p>
					</div>
				</div>
			</div>
			<?php
				if($userdata->complete_status == 'true')
				{
					$check  = $userdata->complete_status;
				}
				else
				{
					$check = 'false';  
				}
				
			?>
			<div class="section-area " style="padding-top: 50px important;">
				<div class="container">
					<div class="" id="instructor">
						<div class="" id="reviews">
							<div class="review-bx">
								<div class="all-review col-sm-3 ">
									<img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?php echo base_url('public/uploads/webinar/') . $userdata->college_logo ?>" class="img-fluid" id="college_log" style=" height: 100px;border-radius: 50%" alt="">
								</div>
								<div class="review-bar ">
									<h2 class="text-center"><?= $userdata->college_name; ?> - <?= $userdata->college_code ?></h2>
								</div>
								<div class="all-review ">
									<img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?php echo base_url('public/assets/images/favicon.png') ?>" class="img-fluid" id="cp_logo" style=" height: 100px;border-radius: 50%" alt="">
								</div>
							</div>
							<p class="text-center"><button class="btn btn-warning" data-toggle="modal" data-target="#registerModal" id="modalbtn"> Register For Webinar </button></p>
						</div>
					</div>
				</div>
			</div>
			<div class="content-block">
				<!-- Your Faq -->
				<div class="section-area ">
					<div class="container">
						<div class="row">
							<div class="col-lg-7 col-md-12">
								
								<img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public/uploads/webinar/') . $userdata->image ?>" style="height: 350px; width: 100%; border: 1px solid gray;" class="img-fluid"  alt=""><br><br>
								<div class="heading-bx left mt-2">
									<h2 class="m-b10 title-head">About The <span> Webinar</span></h2>
								</div>
								<div class="pr-5 mb-2">
									<span class="text-justify mr-5"><?= $userdata->topic ?></span>
								</div>
								
								
								<!-- <p class="m-b10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it.</p> -->
								<br>
								<div class="heading-bx left mt-2">
									<h2 class="m-b10 title-head">You Will <span> Learn</span></h2>
								</div>
								<div class="ttr-accordion m-b30 faq-bx" id="accordion1">
									<?php
										$about = explode(',', $userdata->about_webinar);
										$sr = 1;
										foreach ($about as $aboutdata)
										{
										?>
										<div class="panel">
											<div class="acod-head">
												<h6 class="acod-title">
													<span data-toggle="collapse" href="#faq1" class="collapsed" data-parent="#faq1">
													<span class="badge badge-dark"><?= $sr; ?></span>&ensp;&ensp; <?= $aboutdata ?> </span>
												</h6>
											</div>
											<div id="faq" class="acod-body collapse">
												<div class="acod-content">Web design aorem apsum dolor sit amet, adipiscing elit, sed diam nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</div>
											</div>
										</div>
										<?php
											$sr++;
										}
									?>
								</div>
								<div class="row">
									<div class="col-lg-4 col-md-6 col-sm-6 m-b30">
										<div class="feature-container">
											<div class="feature text-white m-b20">
												<a href="#" class="icon-cell"><img src="<?php echo base_url('public/') ?>assets/images/himanshu.jpeg" class="img-fluid" style="height: 200px; width: 100%" alt=""></a>
											</div>
											
										</div>
									</div>
									<div class="col-lg-8 col-md-6 col-sm-6 ">
										<div class="feature-container">
											
											<div class="icon-content">
												<h5 class="ttr-tilte text-justify">Mr.&ensp;<?= $userdata->speaker ?></h5>
												<span class="text-justify"> <?= $userdata->about_speaker ?></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-lg-5 col-md-12 card shadow-lg" style="background-image:url(<?= base_url('public/') ?>/assets/images/background/formbg.png);" id="example2">
								<form class="contact-bx card-body form" action="<?= base_url() ?>Home/WebinarReg" method="POST" id="quick">
								<?php
                                $csrf = array(
                               'name' => $this->security->get_csrf_token_name(),
                               'hash' => $this->security->get_csrf_hash());                  
                            ?>
							<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
									<div class="ajax-message"></div>
									<div class="heading-bx left">
										<h2 class="title-head"> Webinar <span>Registration</span></h2>
										<div class="row p-3">
											<div class="col-sm-12 col-12 ">
												<ul style="list-style:none">
													<li><b>Date:</b>  <?php echo $date = date('M, d Y', strtotime($userdata->webinar_date)) ?> </li>
													<li><b>Time:</b><?= $userdata->time; ?> </li> 
													<li><b>Duration:</b> <?= $userdata->duration; ?></li> 
													<li><b>Plateform:</b> <?= $userdata->plateform; ?></li>
												</ul>
											</div>
										</div>
										<div class="heading-bx left title-head">
											<span><b>Book Your Slot</b></span>
										</div>
									</div>
									<div class="row placeani">
										<div class="col-lg-12 ">
											<div class="form-group">
												<div class="input-group">
													<label class="text-dark">Your Name</label>
													<input name="name" type="text" <?php if($check == 'true'){ echo "readonly";} ?> required class="form-control">
													<input type="hidden" name="webinar_id" <?php if($check == 'true'){echo "readonly";} ?> required value="<?php echo $this->uri->segment(3); ?>" class="form-control">
												</div>
											</div>
										</div>
										
										<div class="col-lg-12">
											<div class="form-group">
												<div class="input-group">
													<label class="text-dark">Your Phone</label>
													<input name="mobile" type="text" <?php if($check == 'true'){ echo "readonly";} ?> required maxlength="10" minlength="10" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<div class="input-group">
													<label class="text-dark">Your Email Address</label>
													<input name="email" <?php if($check == 'true') { echo"readonly"; }?> type="email" class="form-control" >
												</div>
											</div>
										</div>
										
										
										
										<div class="col-lg-12">
											<button name="submit" type="submit" <?php if($check == 'true'){ echo "disabled"; } ?> value="Submit" style="color: white!important" class="btn button-md bg-success">  <?php if($check == 'true'){ echo "Registration Closed"; }else { echo "Reserve Your Seat"; }?>  </button>
										</div>
									</div>
								</form>
							</div>
						</div>
						
					</div>
				</div>
				<!-- Your Faq End -->
			</div>
			<!-- Popular Courses -->
			<div class="section-area section-sp2 popular-courses-bx">
				<div class="container">
					<div class="row">
						<div class="col-md-12 heading-bx left">
							<h2 class="title-head">Whats Students Says About <span>DigiCoders</span></h2>
						</div>
					</div>
					<div class="row">
						<div class="testimonial-carousel-2 owl-carousel owl-btn-1 col-12 p-lr0 owl-none">
							<?php
								foreach ($review as $reviewdata)
								{
								?>
								<div class="item">
									<div class="testimonial-bx style1">
										<div class="testimonial-thumb">
											<img class="lazy" src="<?= base_url('public') ?>/assets/images/Loader1.jpg" data-src="<?= base_url('public') ?>/assets/usericon.png" title="reviews" alt="reviews">
										</div>
										<div class="testimonial-info">
											<h5 class="name"><?= $reviewdata->name ?></h5>
											<p><?= $reviewdata->position ?></p>
										</div>
										<div class="testimonial-content">
											<p>
												<?= $reviewdata->message ?>
											</p>
										</div>
									</div>
								</div>
								<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>
			<!-- Popular Courses END -->
		</div>
		<script src="https://apps.elfsight.com/p/platform.js" defer></script>
		<div class="elfsight-app-fe3ddc55-81f4-4092-91a9-f630fe6e2932"></div>
		
		<!-- @section scripts{ -->
		<script>
			$(document).ready(function() {
            $('#lightgallery').lightGallery();
			});
		</script>
		
		
		<!-- } -->
		
		
		
		<!-- Enquiry Modal -->
		<div class="modal fade mt-5 "  id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="eampleModalLabel"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body " >
						<div class="col-lg-12 col-md-12 " id="example">
							<form class="contact-bx card-body form" action="<?= base_url() ?>Home/WebinarReg" method="POST" id="quick">
								<div class="ajax-message"></div>
								<div class="heading-bx left">
									<h2 class="title-head"> Webinar <span>Registration</span></h2>
									<div class="row p-3">
										<div class="col-sm-12 col-12 ">
											<ul style="list-style:none">
												<li><b>Date:</b>  <?php echo $date = date('M, d Y', strtotime($userdata->webinar_date)) ?> </li>
												<li><b>Time:</b><?= $userdata->time; ?> </li> 
												<li><b>Duration:</b> <?= $userdata->duration; ?></li> 
												<li><b>Plateform:</b> <?= $userdata->plateform; ?></li>
											</ul>
										</div>
									</div>
									<div class="heading-bx left title-head">
										<span><b>Book Your Slot</b></span>
									</div>
								</div>
								<div class="row placeani">
									<div class="col-lg-12 ">
										<div class="form-group">
											<div class="input-group">
												<label class="text-dark">Your Name</label>
												<input name="name" type="text" <?php if($check == 'true'){ echo "readonly";} ?> required class="form-control">
												<input type="hidden" name="webinar_id" <?php if($check == 'true'){echo "readonly";} ?> required value="<?php echo $this->uri->segment(3); ?>" class="form-control">
											</div>
										</div>
									</div>
									
									<div class="col-lg-12">
										<div class="form-group">
											<div class="input-group">
												<label class="text-dark">Your Phone</label>
												<input name="mobile" type="text" <?php if($check == 'true'){ echo "readonly";} ?> required maxlength="10" minlength="10" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<label class="text-dark">Your Email Address</label>
												<input name="email" <?php if($check == 'true') { echo"readonly"; }?> type="email" class="form-control" >
											</div>
										</div>
									</div>
									
									
									
									<div class="col-lg-12">
										<button name="submit" type="submit" <?php if($check == 'true'){ echo "disabled"; } ?> value="Submit" style="color: white!important" class="btn button-md bg-success">  <?php if($check == 'true'){ echo "Registration Closed"; }else { echo "Reserve Your Seat"; }?>  </button>
									</div>
								</div>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		
		
		
		<?php include('include/footer.php')  ?>
		<?php include('include/jslinks.php')  ?>
	</body>
	
</html>