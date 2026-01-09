<!DOCTYPE html>
<html lang="en">

<head>
	<title>Registration for Training - Software Development Training Institute - TheDigiCoders</title>
	<meta name="description"
		content="We provide the best Software Development Training Program in Lucknow, India, UP. You must fill out the online registration form.">
	<meta property="og:title" content="Online Registration - Software Development Training Institute - TheDigiCoders" />
	<meta property="og:description"
		content="We provide the best Software Development Training Program in Lucknow, India, UP. You must fill out the online registration form." />
	<meta property="og:url" content="https://thedigicoders.com/Home/Registration" />
	<link rel="canonical" href="https://thedigicoders.com/Home/Registration" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script src="https://www.google.com/recaptcha/api.js" async defer></script> 

	<script>
		function submitregform() {
			document.getElementById('submitbtn').disabled = false
		}
	</script>

	<?php include('include/headerlinks.php') ?>
	<style>
		#msgpara {
			border: #06509f;
			border-style: dashed;
			padding: 4px;
			text-align: justify;
		}

		.btnJPg:hover {
			background: #f7b205;
			color: white;
		}

		.border {
			padding: 15px !important;
			text-align: justify;
			width: 100%;
			background: linear-gradient(90deg, #250a99 50%, transparent 50%),
				linear-gradient(90deg, #250a99 50%, transparent 50%),
				linear-gradient(0deg, #250a99 50%, transparent 50%),
				linear-gradient(0deg, #250a99 50%, transparent 50%);
			background-repeat: repeat-x, repeat-x, repeat-y, repeat-y;
			background-size: 16px 4px, 16px 4px, 4px 16px, 4px 16px;
			background-position: 0% 0%, 100% 100%, 0% 100%, 100% 0px;
			border-radius: 5px;
			padding: 10px;
			animation: dash 5s linear infinite;
		}

		@keyframes dash {
			to {
				background-position: 100% 0%, 0% 100%, 0% 0%, 100% 100%;
			}
		}

		.error {
			color: red !important;
		}

		/* Form styling */
		.form-group {
			margin-bottom: 1.5rem;
		}

		.form-control,
		select.form-control {
			height: 50px;
			border-radius: 5px;
			border: 1px solid #ddd;
			padding: 10px 15px;
			font-size: 16px;
			transition: all 0.3s ease;
		}

		.form-control:focus,
		select.form-control:focus {
			border-color: #f7b205;
			box-shadow: 0 0 0 0.2rem rgba(247, 178, 5, 0.25);
		}

		select.form-control {
			appearance: none;
			background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
			background-repeat: no-repeat;
			background-position: right 15px center;
			background-size: 16px;
			padding-right: 40px;
		}

		label {
			font-weight: 600;
			margin-bottom: 8px;
			color: #333;
			display: block;
		}

		.card {
			border-radius: 10px;
			box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
			border: none;
			overflow: hidden;
		}

		.card-body {
			padding: 2.5rem;
		}

		.heading-bx h1 {
			font-size: 2.5rem;
			margin-bottom: 1rem;
			text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
		}

		.heading-bx p {
			font-size: 1.1rem;
			opacity: 0.9;
		}

		.btnJPg {
			background: #250a99;
			color: white;
			border: none;
			padding: 12px 40px;
			font-size: 18px;
			font-weight: 600;
			border-radius: 5px;
			transition: all 0.3s ease;
			text-transform: uppercase;
			letter-spacing: 0.5px;
		}

		.btnJPg:hover {
			background: #f7b205;
			transform: translateY(-2px);
			box-shadow: 0 5px 15px rgba(247, 178, 5, 0.3);
		}

		.form-check-input {
			width: 18px;
			height: 18px;
			margin-top: 0.3rem;
			margin-right: 10px;
		}

		.form-check-label {
			font-weight: 500;
			cursor: pointer;
		}

		.input-group-append button {
			border-radius: 0 5px 5px 0;
			border: 1px solid #ddd;
			border-left: none;
		}

		.input-group-append button:hover {
			opacity: 0.9;
		}

		/* Responsive styles */
		@media (max-width: 768px) {
			.card-body {
				padding: 1.5rem;
			}

			.heading-bx h1 {
				font-size: 2rem;
			}

			.form-control,
			select.form-control {
				height: 45px;
				font-size: 15px;
			}

			.btnJPg {
				padding: 10px 30px;
				font-size: 16px;
			}

			.col-lg-6,
			.col-md-6,
			.col-sm-12 {
				margin-bottom: 1rem;
			}
		}

		@media (max-width: 576px) {
			.card-body {
				padding: 1rem;
			}

			.heading-bx h1 {
				font-size: 1.75rem;
			}

			.heading-bx p {
				font-size: 1rem;
			}

			.btnJPg {
				width: 100%;
				padding: 12px;
			}
		}

		/* Custom radio button styling */
		.form-check-input:checked {
			background-color: #f7b205;
			border-color: #f7b205;
		}

		.text-success {
			color: #28a745 !important;
		}

		.text-danger {
			color: #dc3545 !important;
		}

		/* Animation for form */
		@keyframes fadeIn {
			from {
				opacity: 0;
				transform: translateY(20px);
			}

			to {
				opacity: 1;
				transform: translateY(0);
			}
		}

		.card {
			animation: fadeIn 0.6s ease-out;
		}
	</style>
</head>

<body>
	<?php include('include/header.php') ?>

	<div class="page-content bg-dark">
		<div class="section-area section-sp3 ovpr-dark bg-fix appointment-box"
			style="background-image:url(/assets/images/banner/banner4.jpg);">
			<div class="container">
				<div class="row">
					<div class="col-md-12 heading-bx style1 text-white text-center">
						<h1 class="title-head">Register Now</h1>
						<p>A COMPANY WORKING WITH YOUNG ENGINEER'S, ENTREPRENEUR'S AND INNOVATIVE TEAM</p>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<form id="reg" class="form-horizontal mb-5" action="<?= base_url() ?>Home/PayNow/Pay"
							method="POST">
							<?php
							$csrf = array(
								'name' => $this->security->get_csrf_token_name(),
								'hash' => $this->security->get_csrf_hash()
							);
							?>
							<input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

							<div class="row form-group">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<label>Student Training Location/Mode <span class="text-danger">*</span></label>
									<?php echo form_error('student_training_location'); ?>
									<select class="form-control" name="student_training_location"
										id="student_training_location" required>
										<option value="">-Choose Training Location-</option>
										<option value="Lucknow">Lucknow</option>
										<option value="Kanpur">Kanpur</option>
										<option value="Online">Online</option>
									</select>
								</div>
								
								</div>
								<div class="row form-group">
								<div class="col-lg-6 col-md-6 col-sm-12">
									<label>Student Mobile Number <span class="text-danger">*</span></label>
									<?php echo form_error('mobile'); ?>
									<input class="form-control" type="number" name="Mobile1" maxlength="10"
										minlength="10" placeholder="Enter Student Mobile Number" required
										onkeyup="search_func(this.value)" />
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12">
									<label class="control-label">Student Name <span class="text-danger">*</span></label>
									<?php echo form_error('student_name'); ?>
									<input class="form-control" type="text" name="Name" placeholder="Enter Student Name"
										required id="name" />
								</div>
								
								
							</div>

							<div class="row form-group">
								<div class="col-lg-6 col-md-6 col-sm-12">
									<label>Choose Training <span class="text-danger">*</span></label>
									<?php echo form_error('training_type'); ?>
									<select class="form-control" name="ApplicationFor" id="trainingtype" required
										onchange="setFee(); loadTechnology();">
										<option value="">-Choose Training-</option>
										<option value="Online Summer Training">Summer Training - Online</option>
										<option value="Summer Training">Summer Training - Offline</option>
										<option value="Vocational Training">Vocational Training</option>
										<option value="Winter Training">Winter Training</option>
										<option value="Industrial Training">Industrial Training</option>
										<option value="Apprenticeship Training">Apprenticeship Training</option>
										<option value="Internship Training">Internship Training</option>
									</select>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12">
									<label>Choose Technology <span class="text-danger">*</span></label>
									<?php echo form_error('technology'); ?>
									<select class="form-control" name="Technology" id="technology" required>
										<option value="" selected disabled>-Choose Technology-</option>
									</select>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-lg-6 col-md-6 col-sm-12">
									<label>Select Your Education <span class="text-danger">*</span></label>
									<?php echo form_error('course'); ?>
									<select class="form-control" name="Course" required id="education">
										<option value="">-Select Your Education-</option>
										<option value="B.Tech (CS)">B. Tech (CS)</option>
										<option value="B.Tech (IT)">B. Tech (IT)</option>
										<option value="B.Tech (Electronics)">B.Tech (Electronics/Electrical)</option>
										<option value="B.Tech  (EC)">B. Tech (EC)</option>
										<option value="Diploma (CS)">Diploma (CS)</option>
										<option value="Diploma (IT)">Diploma (IT)</option>
										<option value="Diploma (Electronics)">Diploma (Electronics/Electrical)</option>
										<option value="Diploma (PGDCA)">Diploma (PGDCA)</option>
										<option value="Diploma (PG Web Designing)">Diploma (PG Web Designing) </option>
										<option value="BCA">BCA</option>
										<option value="MCA">MCA</option>
										<option value="M.Tech (CS)">M. Tech (CS)</option>
										<option value="M.Tech (CS)">M. Tech (IT)</option>
										<option value="Other">Other</option>
									</select>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12">
									<label>Select Year <span class="text-danger">*</span></label>
									<?php echo form_error('edu_year'); ?>
									<select class="form-control" name="Year" required id="year">
										<option value="">-Select Year-</option>
										<option value="First Year (1st)">First Year (1st)</option>
										<option value="Second Year (2nd)">Second Year (2nd)</option>
										<option value="Third Year (3rd)">Third Year (3rd)</option>
										<option value="Final Year (4th)">Final Year (4th)</option>
										<option value="Completed">Completed</option>
										<option value="Other">Other</option>
									</select>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-lg-6 col-md-6 col-sm-12">
									<label>Student Father's Name <span class="text-danger">*</span></label>
									<?php echo form_error('father_name'); ?>
									<input class="form-control" type="text" name="FatherName" id="fname"
										placeholder="Enter Student Father's Name" required />
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12">
									<label>Student Email ID (Optional)</label>
									<input class="form-control" type="email" name="Email" id="email2"
										placeholder="Enter Student Email ID" />
								</div>
							</div>

							<div class="row form-group">
								<div class="col-lg-6 col-md-6 col-sm-12">
									<label>Student Alternate Mobile (Optional)</label>
									<input class="form-control" type="number" name="AltMobile" id="mob2" maxlength="10"
										minlength="10" placeholder="Enter Student Alternate Mobile" />
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12">
									<label>Student College Name <span class="text-danger">*</span></label>
									<?php echo form_error('college_name'); ?>
									<input class="form-control" id="cname" type="text" name="College"
										placeholder="Enter Student College Name" required />
									<!-- <datalist id="collegelist">

										<option>KM MAYAWATI GOVT. GIRLS POLYTECHNIC, BADALPUR, GAUTAMBUDDHA NAGAR
										</option>
										<option>
											GOVT. POLYTECHNIC, SAHARANPUR
										</option>
										<option>
											SAVITRIBAI PHULE GOVT. GIRLS POLYTECHNIC, KUMARHERA, SAHARANPUR
										</option>
										<option>
											GOVT. GIRLS POLYTECHNIC, MORADABAD
										</option>
										<option>
											GOVT. POLYTECHNIC, BIJNORE
										</option>
										<option>
											GOVT. POLYTECHNIC, RAMPUR
										</option>
										<option>
											GOVT. GIRLS POLYTECHNIC, SHAMLI
										</option>
										<option>
											GOVT. LEATHER INSTITUTE, AGRA
										</option>
										<option>
											CH. MUKHTAR SINGH GOVT. GIRLS POLYTECHNIC DAURALA,MEERUT
										</option>
										<option>
											MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY, MAHAMAYA NAGAR, HATHRAS
										</option>
										<option>
											MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY, AMROHA
										</option>
										<option>
											GOVT. POLYTECHNIC,CHAMRAUWA,RAMPUR
										</option>
										<option>
											GOVT. POLYTECHNIC, KATAI JOYA, J P NAGAR
										</option>
										<option>
											GOVT. POLYTECHNIC, CHANGIPUR, NOORPUR, BIJNORE
										</option>
										<option>
											GOVT. POLYTECHNIC MAWANA KHURD MEERUT
										</option>
										<option>
											MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY ALIGARH
										</option>
										<option>
											CHHATRAPATI SHAHUJI MAHARAJ GOVT.POLY. AMBEDKARNAGAR
										</option>
										<option>
											GOVT. GIRLS POLYTECHNIC, AMETHI
										</option>
										<option>
											GOVT. POLYTECHNIC, UNNAO
										</option>
										<option>
											GOVT. POLYTECHNIC, SHAHJAHANPUR
										</option>
										<option>
											GOVT. POLYTECHNIC, ADAMPUR, TARABGANJ, GONDA
										</option>
										<option>
											TATHAGAT GAUTAM BUDDHA GOVT. POLYTECHNIC, SHRAVASTI
										</option>
										<option>
											MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY SHARAVASTI
										</option>
										<option>
											GOVT. POLYTECHNIC BIGAPUR UNNAO
										</option>
										<option>
											GOVT. POLYTECHNIC,MOHAMMADI, LAKHIMPUR KHERI
										</option>
										<option>
											GOVT. GIRLS POLYTECHNIC,TILHAR,SHAHJAHANPUR
										</option>
										<option>
											GOVT. GIRLS POLYTECHNIC,RISIYA,NANPARA,BAHARAICH
										</option>
										<option>
											GOVT. POLYTECHNIC, BAHERI,BAREILLY
										</option>
										<option>
											GOVT. POLYTECHNIC,KULPAHAD, MAHOBA(PPP Mode)
										</option>
										<option>
											VERANGANA JHALKARIBAI GOVT. GIRLS POLYTECHNIC, JHANSI
										</option>
										<option>
											GOVT. POLYTECHNIC, MAHOBA
										</option>
										<option>
											GOVT. POLYTECHNIC, MADHOGARH JALAUN
										</option>
										<option>
											GOVT. POLYTECHNIC, SIKANDARA, KANPUR DEHAT
										</option>
										<option>
											GOVT. POLYTECHNIC, TALBEHAT, LALITPUR
										</option>
										<option>
											GOVT. POLYTECHNIC, ATRAULIYA, AZAMGARH ( RUN BY AICCEDS ) VILL-MAHRAHA
											TEHSIL-ATRAULIA BUDHANPUR AZAMGARH ( P P P MODEL)
										</option>
										<option>
											GOVT. GIRLS. POLYTECHNIC, GORAKHPUR
										</option>
										<option>
											GOVT. GIRLS POLYTECHNIC, MEZA, ALLAHABAD
										</option>
										<option>
											GOVT. POLYTECHNIC, JAUNPUR
										</option>
										<option>
											MAHATAMA JYOTIBAPHULE GOVT. POLYTECHNIC, KAUSHAMBI
										</option>
										<option>
											GOVT. POLYTECHNIC, MAU
										</option>
										<option>
											MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY, HARIHARPUR, GORAKHPUR
										</option>
										<option>
											MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY CHANDAULI
										</option>
										<option>
											GOVT. POLYTECHNIC, AURAI, UGAPUR, BHADOHI ROAD, SANT RAVIDAS NAGAR
										</option>
										<option>
											GOVT. POLYTECHNIC, PREMDHAR PATTI, RANIGANJ, PRATAPGARH
										</option>
										<option>
											MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY KUSHINAGAR
										</option>
										<option>
											MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY MAHARAJGANJ
										</option>
										<option>
											GOVT. POLYTECHNIC CHOPAN SONBHADRA
										</option>
										<option>
											GOVT. POLYTECHNIC RAJGARH MIRZAPUR
										</option>
										<option>
											MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY SANTKABIRNAGAR
										</option>
										<option>
											MAHAMAYA POLYTECHNIC OF INFORMATION TECHNOLOGY SIDHARTHANAGAR
										</option>
										<option>
											SANT RAVIDAS GOVERNMENT POLYTECHNIC,CHAKIA,CHANDAULI
										</option>
										<option>
											JANTA POLYTECHNIC, JAHANGIRABAD, BULANDSHAHAR
										</option>
										<option>
											D N POLYTECHNIC, MEERUT
										</option>
										<option>
											D J POLYTECHNIC, BARAUT, BAGHPAT
										</option>
										<option>
											M G POLYTECHNIC, HATHRAS
										</option>
										<option>
											RAJA BALWANT SINGH POLYTECHNIC, BICHPURI, AGRA
										</option>
										<option>
											FIROZE GANDHI POLYTECHNIC, RAIBARELI
										</option>
										<option>
											JAWAHAR LAL NEHRU POLYTECHNIC, MAHMOODABAD, SITAPUR
										</option>
										<option>
											DR AMBEDKAR INST. OF TECH. FOR HANDICAPPED KANPUR
										</option>
										<option>
											SRI RAMDEVI RAMDAYAL TRIPATHI GIRLS POLYTECHNIC, KANPUR
										</option>
										<option>
											MAHARANA PRATAP POLYTECHNIC GORAKHPUR
										</option>
										<option>
											GOVT. POLYTECHNIC, GHAZIABAD
										</option>
										<option>
											GOVT. GIRLS POLYTECHNIC, LUCKNOW
										</option>
										<option>
											GOVT. POLYTECHNIC, LUCKNOW
										</option>
										<option>
											ARYIKAGYANWATI, GOVT. GIRLS POLYTECHNIC, FAIZABAD
										</option>
										<option>
											GOVT. POLYTECHNIC, KANPUR
										</option>
										<option>
											GOVT. GIRLS POLYTECHNIC, CHARKHARI MAHOBA
										</option>
										<option>
											GOVT. GIRLS POLYTECHNIC, VARANASI
										</option>
										<option>
											GOVT. POLYTECHNIC, MIRZAPUR
										</option>
										<option>
											GOVT. GIRLS POLYTECHNIC, BALLIA
										</option>
										<option>
											HEWETT POLYTECHNIC, LUCKNOW
										</option>
										<option>
											HANDIA POLYTECHNIC HANDIA, ALLAHABAD
										</option>
										<option>
											GOVT. GIRLS POLYTECHNIC, BAREILLY
										</option>
										<option>
											GOVT. POLYTECHNIC, JHANSI
										</option>
										<option>
											GOVT. POLYTECHNIC, FARRUKHABAD
										</option>
										<option>
											GOVT. GIRLS POLYTECHNIC, ALLAHABAD
										</option>
										<option>
											CHANDAULI POLYTECHNIC, CHANDAULI
										</option>

									</datalist> -->
								</div>
							</div>

							<div class="row form-group">
								<div class="col-lg-6 col-md-6 col-sm-12">
									<label>Payment Type</label>
									<div class="form-check">
										<input class="form-check-input" type="radio" onchange="setFee()" name="Fee"
											id="exampleRadios1" value="Registration Fee" checked>
										<label class="form-check-label" for="exampleRadios1">
											Registration Fee
										</label>
									</div>

									<?php foreach ($userdata as $formdata) { ?>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="Fee" onchange="setFee()"
												id="exampleRadiosbtn<?= $formdata->id ?>" value="<?= $formdata->value ?>">
											<label class="form-check-label <?php if ($formdata->value == '0') {
												echo "text-success";
											} else {
												echo "text-danger";
											} ?> " for="exampleRadiosbtn<?= $formdata->id ?>">
												<?= $formdata->field_name ?>
											</label>
										</div>
									<?php } ?>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12">
									<label>Amount To Pay Now <span class="text-danger">*</span></label>
									<input class="form-control" type="number" readonly value="1000" id="amount"
										name="Amount" placeholder="Enter Amount" required />
								</div>
							</div>

							<div class="row form-group">
								<?php foreach ($userdata as $formdata) {
									if ($formdata->field_name == 'cupon') {
										?>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<label>Discount Coupon Code (Optional)</label>
											<div class="input-group mb-3">
												<input type="text" class="form-control" name="coupon"
													placeholder="Enter Coupon Code" aria-label="Enter Coupon Code"
													aria-describedby="basic-addon2" onkeyup="Applybtn()" id="coupon1">
												<div class="input-group-append" id="apply" style="display:block">
													<button type="button" class="input-group-text bg-success text-white"
														id="couponCode" onclick="validatecouponCode()">Apply</button>
												</div>
												<div class="input-group-append" id="remove" style="display:none">
													<button type="button" class="input-group-text bg-danger text-white"
														id="couponCode" onclick="RemovecouponCode()">Remove</button>
												</div>
											</div>
											<p style="display:none;color:red;" id="ccode">Coupon code is required</p>
										</div>
										<?php
									}
								}
								?>
								<div class="col-lg-6 col-md-6 col-sm-12" id="msgbox" style="display:none;">
									<br>
									<p class="headshot headshot-1 border" id="msgpara"></p>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-lg-12">
									<label>Security Verification <span class="text-danger">*</span></label>
									<div class="g-recaptcha" data-sitekey="6LfHIQcrAAAAALPXPP-R1SamLeZxPHGPA_xfMNOh"
										data-callback="submitregform"></div>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-lg-12 text-center mt-4">
									<button name="submit" type="submit" value="Submit" 
										id="submitbtn" class="btn button-md btnJPg">
										Register Now
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include('include/footer.php') ?>
	<?php include('include/jslinks.php') ?>

	<script>
		function Applybtn() {
			var x = document.getElementById("coupon1").value;
			document.getElementById("coupon1").value = x.toUpperCase();
			if (x.length > 0) {
				document.getElementById("apply").style.display = "block";
			} else {
				document.getElementById("apply").style.display = "none";
			}
		}

		function validatecouponCode() {
			var x = document.getElementById("coupon1").value;
			if (x.length > 0) {
				document.getElementById("ccode").style.display = "none";
				$.ajax({
					type: "POST",
					url: "<?= base_url('Home/validatecouponCode') ?>",
					data: { 'code': x },
					dataType: "text",
					success: function (msg) {
						var obj1 = JSON.parse(msg);
						if (obj1.error == 'error') {
							document.getElementById("msgbox").style.display = "block";
							document.getElementById("apply").style.display = "none";
							document.getElementById("remove").style.display = "block";
							document.getElementById("msgpara").innerHTML = "<span style='color:red'>Invalid Coupon Code</span>";
						} else {
							document.getElementById("msgbox").style.display = "block";
							document.getElementById("apply").style.display = "none";
							document.getElementById("remove").style.display = "block";
							document.getElementById("msgpara").innerHTML = "You will get discount of Rs. <b>" + obj1.amount + "</b> in your total fees with this coupon <b>" + obj1.name + '</b>.<br>' + obj1.description;
						}
					}
				});
			} else {
				document.getElementById("ccode").style.display = "block";
			}
		}

		function RemovecouponCode() {
			document.getElementById("msgbox").style.display = "none";
			document.getElementById("apply").style.display = "block";
			document.getElementById("remove").style.display = "none";
			document.getElementById("coupon1").value = "";
		}

		function search_func(value) {
			$.ajax({
				type: "POST",
				url: "<?= base_url('Home/SearchStuDetail') ?>",
				data: { 'mobile': value },
				dataType: "text",
				success: function (msg) {
					var obj = JSON.parse(msg);
					if (obj.error == 'error') {
						$("#cname").val('');
						$("#name").val('');
						$("#student_training_location").val('');
						$("#fname").val('');
						$("#email").val('');
						$("#mob2").val('');
						$('#year').val('');
						$('#technology').val('');
						$('#trainingtype').val('');
						$('#education').val('');
					} else {
						$("#cname").val(obj.college_name);
						$("#name").val(obj.student_name);
						$("#student_training_location").val(obj.student_training_location);
						$("#fname").val(obj.father_name);
						$("#email").val(obj.email);
						$("#mob2").val(obj.alt_mobile);
						$('#year').val(obj.edu_year);
						$('#trainingtype').val(obj.training_type);
						$('#education').val(obj.course);

						// Load technology based on training type
						loadTechnology();

						// Set technology value after loading options
						setTimeout(function () {
							$('#technology').val(obj.technology);
						}, 100);
					}
				}
			});
		}

		function setFee() {
			var feetype = $('input[name="Fee"]:checked').val();
			var RegistrationFee = [1000, 1000, 1000, 1000, 1000, 2000, 2000, 2000, 2000, 2000];
			var FullFee = [1000, 4000, 6000, 6000, 6000, 12000, 18000, 18000, 6000, 6000];

			if (feetype == 'Registration Fee') {
				var ttype = $("#trainingtype").prop("selectedIndex");
				$("#amount").val(RegistrationFee[ttype]);
			} else if (feetype == 'Full Fee') {
				var ttype = $("#trainingtype").prop("selectedIndex");
				$("#amount").val(FullFee[ttype]);
			} else if (feetype != "") {
				$("#amount").val(feetype);
			} else {
				$("#amount").val(0);
			}
		}

		function loadTechnology() {
			var ttype = $("#trainingtype").val();

			var data45Days = '<option value="" selected disabled>-Choose Technology-</option>' +
				'<option value="PHP">PHP</option>' +
				'<option value="Android">Android</option>' +
				'<option value="ASP.NET">ASP.NET</option>' +
				'<option value="JAVA">JAVA</option>' +
				'<option value="Python">Python</option>' +
				'<option value="Embedded with IOT">Embedded with IOT</option>'  +
				'<option value="AI/ML">AI/ML</option>' +
				'<option value="MERN Stack">MERN Stack</option>' +
				'<option value="Cadded Software (Mechanical)">Cadded Software (Mechanical)</option>' +
				'<option value="Cadded Software (Electrical)">Cadded Software (Electrical)</option>' +
				'<option value="Cadded Software (Civil/Architecture)">Cadded Software (Civil/Architecture)</option>' +
				'<option value="Not Yet Decided">Not Yet Decided</option>';

			var data6Months = '<option value="" selected disabled>-Choose Technology-</option>' +
				'<option value="Advance PHP">Advance PHP</option>' +
				'<option value="Advance Android">Advance Android</option>' +
				'<option value="Advance ASP.NET">Advance ASP.NET</option>' +
				'<option value="Advance JAVA">Advance JAVA</option>' +
				'<option value="Advance Python">Advance Python</option>' +
				'<option value="Flutter with Dart">Flutter with Dart</option>' +
				'<option value="MERN Full Stack">MERN Full Stack</option>' +
				'<option value="Digital Marketing"> Digital Marketing</option>' +
				'<option value="Graphics Designing"> Graphics Designing</option>' +
				'<option value="Not Yet Decided">Not Yet Decided</option>';

			var defaultData = '<option value="" selected disabled>-Choose Technology-</option>' +
				'<option value="Please Select Training Type" disabled>Please Select Training Type</option>';

			if (ttype == "Online Summer Training" || ttype == "Summer Training" || ttype == "Vocational Training" || ttype == "Winter Training" || ttype == "Industrial Training") {
				$("#technology").html(data45Days);
				$('#technology').selectpicker('refresh');
			} else if (ttype == "Internship Training" || ttype == "Apprenticeship Training") {
				$("#technology").html(data6Months);
				$('#technology').selectpicker('refresh');
			} else {
				$("#technology").html(defaultData);
				$('#technology').selectpicker('refresh');
			}
		}

		// Initialize functions on page load
		$(document).ready(function () {
			setFee();
			loadTechnology();
		});
	</script>

	<?php
	if (!empty($this->session->flashdata('status'))) {
		if ($this->session->flashdata('msg') == 'Payment Success') {
			?>
			<script>
				iziToast.success({
					title: 'Success',
					message: 'Payment Successful!',
					position: 'topRight'
				});
			</script>
			<?php
		}
		if ($this->session->flashdata('msg') == 'Something Went Wrong') {
			?>
			<script>
				iziToast.error({
					title: 'Error',
					message: 'Something Went Wrong. Please try again.',
					position: 'topRight'
				});
			</script>
			<?php
		}
		if ($this->session->flashdata('msg') == 'Validation Error') {
			?>
			<script>
				iziToast.error({
					title: 'Error',
					message: 'Please fill all required fields correctly.',
					position: 'topRight'
				});
			</script>
			<?php
		}
	}
	?>
</body>

</html>