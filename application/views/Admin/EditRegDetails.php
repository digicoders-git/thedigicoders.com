<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Update Registration Details - <?= $this->data['app_name'] ?></title>
		<?php include('include/headerlinks.php'); ?>
	</head>
	
	<body>
		<!--start wrapper-->
		<div class="wrapper">
			<!--start top header-->
			<?php include('include/header.php'); ?>
			<!--end top header-->
			
			<!--start sidebar -->
			<?php include('include/sidebar.php'); ?>
			<!--end sidebar -->
			
			<!--start content-->
			<main class="page-content">
			<div class="section-area section-sp3 ovpr-dark bg-fix appointment-box" style="background-image:url(/assets/images/banner/banner4.jpg);">
				<div class="container">
					<div class="card">
						<div class="card-body">
							<form id="reg" class="form-horizontal mb-5" action="<?= base_url() ?>Admin/UpdateReg" method="POST">
							<?php
                                $csrf = array(
                               'name' => $this->security->get_csrf_token_name(),
                               'hash' => $this->security->get_csrf_hash());                  
                            ?>
							<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
							<input type="hidden" name="id" value="<?= $userdata->id;?>" />
								
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label  class="form-label">Choose Training</label>
										<?php echo form_error('training_type'); ?>
										<select name="ApplicationFor"  class="form-control" id="trainingtype" required onchange="setFee(); loadTechnology(); " required>
											<option value="Online Summer Training" <?php if($userdata->training_type == 'Online Summer Training'){ echo "selected"; } ?>>Online Summer Training</option>
											<option value="Vocational Training" <?php if($userdata->training_type == 'Vocational Training'){ echo "selected"; } ?>>Vocational Training</option>
											<option value="Summer Training" <?php if($userdata->training_type == 'Summer Training'){ echo "selected"; } ?>>Summer Training</option>
											<option value="Winter Training" <?php if($userdata->training_type == 'Winter Training'){ echo "selected"; } ?>>Winter Training</option>
											<option value="Industrial Training" <?php if($userdata->training_type == 'Industrial Training'){ echo "selected"; } ?>>Industrial Training</option>
											<option value="Apprenticeship Training" <?php if($userdata->training_type == 'Apprenticeship Training'){ echo "selected"; } ?>>Apprenticeship Training</option>
											<option value="Internship Training" <?php if($userdata->training_type == 'Internship Training'){ echo "selected"; } ?>>Internship Training</option>
											<option value="Project Training" <?php if($userdata->training_type == 'Project Training'){ echo "selected"; } ?>>Project Training</option>
											<option value="Not Yet Decided" <?php if($userdata->training_type == 'Not Yet Decided'){ echo "selected"; } ?>>Not Yet Decided</option>
										</select>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label class="form-label">Choose Technology</label>
										<?php echo form_error('technology'); ?>
										<select name="Technology" class="form-control" id="technology" required>
											
											<optgroup label="For Online/Summer/Winter/Vocational Trainings">
												<option value="PHP" <?php if($userdata->technology == 'PHP'){ echo "selected"; } ?>>PHP</option>
												<option value="Android" <?php if($userdata->technology == 'Android'){ echo "selected"; } ?>>Android</option>
												<option value="ASP.NET" <?php if($userdata->technology == 'ASP.NET'){ echo "selected"; } ?>>ASP.NET</option>
												<option value="JAVA" <?php if($userdata->technology == 'JAVA'){ echo "selected"; } ?>>JAVA</option>
												<option value="Python" <?php if($userdata->technology == 'Python'){ echo "selected"; } ?>>Python</option>
												<option value="Digital Marketing" <?php if($userdata->technology == 'Digital Marketing'){ echo "selected"; } ?>>Digital Marketing</option>
											</optgroup>
											
											<optgroup label="For Apprenticeship/Internship/Industrial Trainings">
												<option value="Advance PHP" <?php if($userdata->technology == 'Advance PHP'){ echo "selected"; } ?>>Advance PHP</option>
												<option value="Advance Android" <?php if($userdata->technology == 'Advance Android'){ echo "selected"; } ?>>Advance Android</option>
												<option value="Advance ASP.NET" <?php if($userdata->technology == 'Advance ASP.NET'){ echo "selected"; } ?>>Advance ASP.NET</option>
												<option value="Advance JAVA" <?php if($userdata->technology == 'Advance JAVA'){ echo "selected"; } ?>>Advance JAVA</option>
												<option value="Advance Python" <?php if($userdata->technology == 'Advance Python'){ echo "selected"; } ?>>Advance Python</option>
												<option value="Advance Digital Marketing" <?php if($userdata->technology == 'Advance Digital Marketing'){ echo "selected"; } ?>>Advance Digital Marketing</option>
											</optgroup>
											<option value="Not Yet Decided" <?php if($userdata->technology == 'Not Yet Decided'){ echo "selected"; } ?>>Not Yet Decided</option>
											
											
										</select>
									</div>
								</div>
								
								
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label class="form-label">Select Your Education</label>
										<?php echo form_error('course'); ?>
										<select class="form-control" name="Course" required>
										<option disabled value="" <?php if($userdata->course == ''){ echo "selected"; } ?>>--select--</option>
											<option value="B.Tech (CS)" <?php if($userdata->course == 'B. Tech (CS)'){ echo "selected"; } ?>>B. Tech (CS)</option>
											<option value="B.Tech (IT)" <?php if($userdata->course == 'B. Tech (IT)'){ echo "selected"; } ?>>B. Tech (IT)</option>
											<option value="B.Tech (Electronics)" <?php if($userdata->course == 'B.Tech (Electronics)'){ echo "selected"; } ?>>B.Tech (Electronics)</option>
											<option value="B.Tech  (EC)" <?php if($userdata->course == 'B. Tech (EC)'){ echo "selected"; } ?>>B. Tech (EC)</option>
											<option value="Diploma (CS)" <?php if($userdata->course == 'Diploma (CS)'){ echo "selected"; } ?>>Diploma (CS)</option>
											<option value="Diploma (IT)" <?php if($userdata->course == 'Diploma (IT)'){ echo "selected"; } ?>>Diploma (IT)</option>
											<option value="Diploma (Electronics/Electrical)" <?php if($userdata->course == 'Diploma (Electronics/Electrical)'){ echo "selected"; } ?>>Diploma (Electronics/Electrical)</option>
											<option value="Diploma (PGDCA)" <?php if($userdata->course == 'Diploma (PGDCA)'){ echo "selected"; } ?>>Diploma (PGDCA)</option>
											<option value="Diploma (PG Web Designing)" <?php if($userdata->course == 'Diploma (PG Web Designing)'){ echo "selected"; } ?>>Diploma (PG Web Designing) </option>
											<option value="BCA" <?php if($userdata->course == 'BCA'){ echo "selected"; } ?>>BCA</option>
											<option value="MCA" <?php if($userdata->course == 'MCA'){ echo "selected"; } ?>>MCA</option>
											<option value="M.Tech (CS)" <?php if($userdata->course == 'M. Tech (CS)'){ echo "selected"; } ?>>M. Tech (CS)</option>
											<option value="M.Tech (CS)" <?php if($userdata->course == 'M. Tech (IT)'){ echo "selected"; } ?>>M. Tech (IT)</option>
											<option value="Other" <?php if($userdata->course == 'Other'){ echo "selected"; } ?>>Other</option>
										</select>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label class="form-label">Select Year</label>
										<?php echo form_error('edu_year'); ?>
										<select class="form-control" name="Year" required>
											<option value="First Year (1st)" <?php if($userdata->edu_year == 'First Year (1st)'){ echo "selected"; } ?>>First Year (1st)</option>
											<option value="Second Year (2nd)" <?php if($userdata->edu_year == 'Second Year (2nd)'){ echo "selected"; } ?>>Second Year (2nd)</option>
											<option value="Third Year (3rd)" <?php if($userdata->edu_year == 'Third Year (3rd)'){ echo "selected"; } ?>>Third Year (3rd)</option>
											<option value="Final Year (4th)" <?php if($userdata->edu_year == 'Final Year (4th)'){ echo "selected"; } ?>>Final Year (4th)</option>
											<option value="Completed" <?php if($userdata->edu_year == 'Completed'){ echo "selected"; } ?>>Completed</option>
											<option value="Other" <?php if($userdata->edu_year == 'Other'){ echo "selected"; } ?>>Other</option>
										</select>
									</div>
								</div>
								
								
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label class="control-label">Student Name</label>
										<?php echo form_error('student_name'); ?>
										<input class="form-control" type="text" name="Name" value="<?= $userdata->student_name; ?>" placeholder="Enter Student Name" required />
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Student Father's Name</label>
										<?php echo form_error('father_name'); ?>
										<input class="form-control" type="text" name="Father" placeholder="Enter Student Father's Name" required value="<?= $userdata->father_name; ?>" />
									</div>
								</div>
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Student Email ID(Optional)</label>
										<input class="form-control" type="email" name="Email" placeholder="Enter Student Email ID"  value="<?= $userdata->email; ?>" />
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Student Mobile Number</label>
										<?php echo form_error('mobile'); ?>
										<input class="form-control" type="number" name="Mobile1" maxlength="10" minlength="10" placeholder="Enter Student Mobile Number" required  value="<?= $userdata->mobile; ?>"/>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Student Alternate Mobile (Optional)</label>
										<input class="form-control" type="number" name="Mobile2" maxlength="10" minlength="10" placeholder="Enter Student Alternate Mobile" value="<?= $userdata->alt_mobile; ?>" />
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Student College Name</label>
										<?php echo form_error('college_name'); ?>
										<input class="form-control" type="text" name="College" placeholder="Enter Student College Name" required list="collegelist" value="<?= $userdata->college_name; ?>" />
										<datalist id="collegelist">
											
											<option>KM MAYAWATI GOVT. GIRLS POLYTECHNIC, BADALPUR, GAUTAMBUDDHA NAGAR</option>
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
                                               GOVT. POLYTECHNIC, ATRAULIYA, AZAMGARH ( RUN BY AICCEDS ) VILL-MAHRAHA TEHSIL-ATRAULIA BUDHANPUR AZAMGARH ( P P P MODEL)
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

										</datalist>
									</div>
								</div>
								
								<div class="col-lg-12 text-center mt-3">
									<button name="submit" type="submit" value="Submit" class="btn btn-success">Update</button>
								</div>
							</form>
						</div>
					</div>
					<br />
				</div>
			
			</div>
		
			</main>
			<!--end page main-->
			
			<!--start overlay-->
			<div class="overlay nav-toggle-icon"></div>
			<!--end overlay-->
			
			<!--Start Back To Top Button-->
			<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
			<!--End Back To Top Button-->
		</div>
		<!--end wrapper-->
		
		<?php include('include/jslinks.php') ?>
		
	</body>
	
</html>
<script>
    $('.dropify').dropify();
	
</script>