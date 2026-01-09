<!DOCTYPE html>
<html lang="en">
	
	<head>
	<style>
	@media (max-width:992px){
		#btn{
			text-align:center;
			margin-bottom:10px;
		}
		
		
	}
	#btn{
		
		color:white;
	}
	
	</style>
	
		<title>Webinars - Project Training in Lucknow - TheDigiCoders</title>
		<meta name="description" content="TheDigiCoders Technologies best software training company in Lucknow working with young engineers and entrepreneurs. See our latest upcoming webinars at thedigicoders.com">
		<?php include('include/headerlinks.php')  ?>
	</head>
	
	<body>
		
	    <div>
		     <h2 class="text-center card-header" style="background-color:#b9bbbe9c">Welcome to</h2>

		</div>
		 <div class=" w-100 text-center">
                        <a href="<?= base_url() ?>Home/Index"><img style="width:300px !important" src="<?= base_url('public') ?>/assets/images/logo.png" title="DigiCoders logo" alt="DigiCoders logo" ></a>

                    </div>
		<div class="page-content bg-white">
			<!-- inner page banner -->
			<div class="page-banner ovbl-dark" style="background-image:url(<?= base_url('public') ?>/assets/images/banner/banner4.);height:150px">
				<div class="container">
					<div class="page-banner-entry">
						<h1 class="text-white">WE ARE #1 IN UTTAR PRADESH TO DEVELOP &</br> LAUNCH 850+ PROJECTS IN LESS THAN 5 YEARS</h1>
					</div>
				</div>
			</div>
			 <div class="container">
		  <div class="row mt-3">
		 
		  <div class="col-sm-3 " id="btn">
			<a id="btn" class="btn btn-custom bg-success" href="<?= base_url('public') ?>/assets/images/DigiCoders_2026_Training_Brochure.pdf" target="_blank" download onclick="OpenSocialModal()"><i class="fa fa-download"></i> Download Training Broucher</a>
			

		  </div>
		  <div class="col-sm-6"></div>
		  <div class="col-sm-3 text-center" style="color:white">
			<a id="btn" class="btn btn-custom bg-success " href="<?= base_url('public') ?>/assets/images/DigiCoders_2026_Placement_Brochure.pdf" target="_blank" download onclick="openSocial()"><i class="fa fa-download"></i> Download Our Placement Broucher</a>
		  </div>
		  </div>
		  </div>
		  <div class="page-content bg-white mt-3" >
			<!-- inner page banner -->
			<div class="page-banner ovbl-dark" style="background-image:url(<?= base_url('public') ?>/assets/images/banner/banner4.); height:150px">
				<div class="container">
					<div class="page-banner-entry">
						<h1 class="text-white">"A COMPANY LEADING BY YOUNG ENGINEER'S,<br>ENTREPRENEUR'S AND INNOVATIVE TEAM"</h1>
					</div>
				</div>
			</div>
			<div class="container">
			<div class="row mt-3">
			<div class="col-sm-4 text-center" id="btn">
			 <a href="<?= base_url() ?>Home/Index"><img data-toggle="tooltip" data-placement="bottom" title="Call Me" style=" height:50px; width:50px " src="<?= base_url('public') ?>/assets/images/telephone.png" title="call me" alt="DigiCoders logo" ></a>
			</div>
			<div class="col-sm-4 text-center" id="btn">
			<a href="https://chat.whatsapp.com/C7i1WPYgSqTJ0AsJqPWOWQ"><img data-toggle="tooltip" data-placement="bottom" title="Whatsapp" style=" height:50px; width:50px " src="<?= base_url('public') ?>/assets/images/whatsapp.png" title="Whatsapp" alt="DigiCoders logo" ></a>
			</div>
			<div class="col-sm-4 text-center " id="btn">
           <a href="<?= base_url() ?>Home/Registration"><img data-toggle="tooltip" data-placement="bottom" title="Registration Now" style=" height:50px; width:50px " src="<?= base_url('public') ?>/assets/images/registered.png" title="Registration Now" alt="DigiCoders logo" ></a>
			</div>
			</div>
			</div>
			<br>
			
			 <div>
		     <h2 class="text-center card-header" style="background-color:#b9bbbe9c">Our Experts</h2>

		</div>
			
			<div class="container mt-5">
			<div class="row">
			<div  class="col-sm-6 text-center mt-3">
			<div class="card">
        <center><img class="card-img-top img-fluid"  style="height:250px; width:250px;" src="<?= base_url('public') ?>/assets/images/Er.-Himanshu-Kashyap-digicoders-lucknow.jpeg" alt="image" /></center>
        <div class="card-body">
                <h3 class="card-title">Er. Himanshu Kashyap</h3>
                <h5 class="card-title">Sr. Project Manager</h5>
                <p class="card-text">Er. Himanshu Kashyap is leading the organization project & development wing with his 9+ 
year’s experience and knowledge, he has a vast experience in project development, in his 
career he developed more then 400 projects and trained more than 11000 students. He is 
a Great Team Leader & Public speaker & a very fast learner as well as a good mentor.</p>
               
        </div>
</div>
</div>
			<div  class="col-sm-6 text-center mt-3">
			<div class="card text-center">
       <center><img class="card-img-top img-fluid" style="height:250px; width:250px;" src="<?= base_url('public') ?>/assets/images/Er.-Gopal-Singh-digicoders-lucknow.jpeg" alt="image" /></center>
        <div class="card-body">
                <h3 class="card-title">Er. Gopal Singh</h3>
				<h5 class="card-title">Training & Development Head</h5>
				
                <p class="card-text">Er. Gopal Singh is leading the organization training wing with his 9+ year’s experience 
and knowledge, he has a vast experience in development and training, in his career he 
developed more then 200 projects and trained more than 11000 students. He is a Great 
Team Leader and a very fast learner as well as a good mentor.</p>
               
        </div>
</div>
</div>
			</div>
			</div>

	
		<?php include('include/jslinks.php')  ?>
	</body>
	
	
	<script>
	
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
	
	</script>
</html>



