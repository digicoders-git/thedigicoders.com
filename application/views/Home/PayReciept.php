<!DOCTYPE html>
<html lang="en">
	
	<head>
		<!-- FAVICONS ICON ============================================= -->
		<link rel="icon" href="<?= base_url('public') ?>/assets/images/favicon.png" type="image/x-icon">
		<!-- All PLUGINS CSS ============================================= -->
		<link href="<?= base_url('public') ?>/assets/css/assets.css" rel="stylesheet" />
		<!-- TYPOGRAPHY ============================================= -->
		<link href="<?= base_url('public') ?>/assets/css/typography.css" rel="stylesheet" />
		<!-- SHORTCODES ============================================= -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/assets/css/shortcodes/shortcodes.css">
		<!-- STYLESHEETS ============================================= -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/assets/css/style.css">
		<link class="skin" rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/assets/css/color/color-1.css">
		<!-- REVOLUTION SLIDER CSS ============================================= -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/assets/vendors/revolution/css/layers.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/assets/vendors/revolution/css/settings.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url('public') ?>/assets/vendors/revolution/css/navigation.css">
		<!--Manual css-->
		<link href="<?= base_url('public') ?>/assets/MyStyle.css" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<title>Fee Reciept - Application Development Training - TheDigiCoders</title>
		<meta name="description" content="Online and offline payment options are available for the best web development course at thedigicoders.com!">
		
		<meta property="og:title" content="Fee Reciept - Application Development Training - TheDigiCoders" />
<meta property="og:description" content="Online and offline fee reciept options are available for the best web development courses at thedigicoders.com!" />
		
		<style>
			.cstmck {
            display: inline-block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
			}
			
			/* Hide the browser's default checkbox */
			.cstmck input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
			}
			
			/* Create a custom checkbox */
			.checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
			}
			
			/* On mouse-over, add a grey background color */
			.cstmck:hover input~.checkmark {
            background-color: #ccc;
			}
			
			/* When the checkbox is checked, add a blue background */
			.cstmck input:checked~.checkmark {
            background-color: #2196F3;
			}
			
			
			/* Create the checkmark/indicator (hidden when not checked) */
			.checkmark:after {
            content: "";
            position: absolute;
            display: none;
			}
			
			/* Show the checkmark when checked */
			.cstmck input:checked~.checkmark:after {
            display: block;
			}
			
			/* Style the checkmark/indicator */
			.cstmck .checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
			}
			#btnJPg:hover{
			background:#f7b205;
			color:white;
			}
			
		</style>
		
	</head>
	
	<body>
		
		
		<?php
			//  var_dump($userdata);
			if (!empty($userdata)) {
			$regdata = $this->db->get_where('registration', array("id" => $userdata->reg_id))->row();
			}
		?>
		<div class="">
			<div class="" >
				<div class=" container">
				
					<div class="row">
						<div class="col-md-12 heading-bx style1 text-white text-center">
						</div>
						<input type="hidden" id="FeePaymentID" name="RegistrationID" value="@Model.RegistrationID" />
					</div>
					<button class="btn btn-sm btn-secondary" id="btnJPg"><i class="fa fa-image"></i> JPG</button>
					<button onclick="createPDF()" style="background-color:#3385ff;" class="btn btn-primary">Download</button>
					<button onclick="createPDF()" style="background-color:#3385ff;" class="btn btn-primary">Print</button>
					<a href="<?= base_url(); ?>"><div class="btn btn-primary my-2 " style="border: 1px solid black; background-color:red;"><i class="fa fa-home"></i>&ensp;Go To Home Page</div></a>
					
					<?php
						if($this->uri->segment(2) =='PaymentResponse')
						{
						?>
						<a href="<?= $grouplink->url; ?>"><div class="btn btn-primary my-2 " style="border: 1px solid black;">
							<i class="fa fa-whatsapp"></i>&ensp;Join Our Whatsapp group		
						</div></a>
						<?php
						}					
					?> 
					<div id="element-to-print" class="card" style="border: 1px solid black;">
						<form class="form-group" action="#" method="post">
						<?php
                                $csrf = array(
                               'name' => $this->security->get_csrf_token_name(),
                               'hash' => $this->security->get_csrf_hash());                  
                            ?>
							
							<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
							<div class="card-body" style="border: 2px solid black"  id="capture">
								<div class="row" >
									<div class="col-lg-4 col-md-4 col-sm-12 mt-2">
										<div class="btn bg-light " style="border: 1px solid black;">Fee Reciept</div><br />
										<span>Date  : </span><span>
											<?php
											// var_dump($userdata);
												$date = $userdata->date;
												$old_date_timestamp = strtotime($date);
												echo   $new_date = date('d/m/Y', $old_date_timestamp);
											?>
										</span><br>
										<span>Sr  : </span><span><?= $userdata->id ?></span>
										
									</div>
									<div class="col-lg-4 col-md-4 col-sm-12">
										<img src="<?= base_url('public/assets/images/DigiCoders Logo Black.png') ?>" />
									</div>
									<div class="col-lg-4 col-md-4 col-sm-12" style="text-align:end">
										<span>+91 9140-96-7607</span><br />
										<span>+91 6394-29-6293</span><br />
										<span>0522-4235604</span><br />
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2 col-md-2 col-sm-12"></div>
									<div class="col-lg-8 col-md-8 col-sm-12" style="text-align:center">
										<span class="ml-2 mb-5">
											2nd Floor, B-36, Sector O, Near Ram Ram Bank Chauraha, Aliganj, Lucknow Uttar Pradesh 226021
											, info@digicoders.in, www.thedigicoders.com
										</span>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-12"></div>
								</div>
								<hr class="style1" />
								
								<div class="row">
									<div class="col-lg-2 col-md-2 col-sm-12"><label>Name :</label></div>
									<div class="col-lg-10 col-md-10 col-sm-12"><span class="ml-2"><?= $userdata->student_name; ?> (<?= $userdata->mobile; ?>)</span>
										<hr class="style1" />
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2 col-md-2 col-sm-12"><label>College :</label></div>
									<div class="col-lg-10 col-md-10 col-sm-12"><span class="ml-2"><?= $userdata->college; ?></span>
										<hr class="style1" />
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2 col-md-2 col-sm-12"><label>Course :</label></div>
									<div class="col-lg-4 col-md-10 col-sm-12"><span class="ml-2"><?= $userdata->course; ?></span>
										<hr class="style1" />
									</div>
									<label for="">Year:</label>
									<div class="col-lg-5 col-md-10 col-sm-12"><span class="ml-2">
									<?= $userdata->year; ?></span>
									<hr class="style1" />
									</div>
								</div>
								<!-- <div class="row">
									<div class="col-lg-4 col-md-2 col-sm-12">
                                    <div class="row">
									<div class="col-lg-2 col-md-2 col-sm-12"><label>Course </label></div>
									<div class="col-lg-10 col-md-10 col-sm-12"><span class="ml-2"><?= $regdata->course; ?></span>
									<hr class="style1" />
									</div>
                                    </div>
									</div>
									<div class="col-lg-4 col-md-2 col-sm-12">
                                    <div class="row">
									<div class="col-lg-2 col-md-2 col-sm-12"><label>Branch </label></div>
									<div class="col-lg-10 col-md-10 col-sm-12"><span class="ml-2"></span>
									<hr class="style1" />
									</div>
                                    </div>
									</div>
									<div class="col-lg-4 col-md-2 col-sm-12">
                                    <div class="row">
									<div class="col-lg-2 col-md-2 col-sm-12"><label>Year </label></div>
									<div class="col-lg-10 col-md-10 col-sm-12"><span class="ml-2"><?= $regdata->edu_year; ?> </span>
									<hr class="style1" />
									</div>
                                    </div>
									</div>
								</div> -->
								<div class="row">
									<div class="col-lg-2 col-md-2 col-sm-12"><label>Account Of :</label></div>
									<div class="col-lg-10 col-md-10 col-sm-12"><span class="ml-2"><?= $userdata->account_of; ?></span>
										<hr class="style1" />
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3 col-md-2 col-sm-12"><label>Payment Mode </label> &ensp;
										
									</div>
									<div class="col-lg-2 col-md-3 col-sm-12"><span class="ml-2"> Cash</span>
										<!-- <hr class="style1" /> -->
										<label class="cstmck mb-3">
											<input type="checkbox" <?php if($userdata->payment_mode=='Cash'){echo "checked";} else{echo "disabled";}?>>
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="col-lg-2 col-md-3 col-sm-12"><span class="ml-2"> Online</span>
										<!-- <hr class="style1" /> -->
										<label class="cstmck mb-3">
											<input type="checkbox"  <?php if($userdata->payment_mode=='Online'){echo "checked";} else{echo "disabled";}?>>
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="col-lg-2 col-md-3 col-sm-12"><span class="ml-2"> Paytm</span>
										<!-- <hr class="style1" /> -->
										<label class="cstmck mb-3">
											<input type="checkbox" <?php if($userdata->payment_mode=='Paytm'){echo "checked";} else{echo "disabled";}?> >
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="col-lg-2 col-md-3 col-sm-12"><span class="ml-2"> Cheque</span>
										<!-- <hr class="style1" /> -->
										<label class="cstmck mb-3">
											<input type="checkbox" <?php if($userdata->payment_mode=='Cheque'){echo "checked";} else{echo "disabled";}?>>
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
								
								<div class="row mt-3">
									<div class="col-lg-2 col-md-2 col-sm-12"><label>Amount In Words :</label></div>
									<div class="col-lg-10 col-md-10 col-sm-12"><span class="ml-2"><?php echo strtoupper($this->common->getAmountInWords($userdata->amount)); ?></span>
										<hr class="style1" />
									</div>
								</div>
								
								<div class="row">
									
									<div class="col-sm-3">
									
									</div>
									<div class="col-sm-9">
										
										<div class="row">
											
											<!-- <div class="col-lg-4 col-md-3 col-sm-12"><span class="ml-2"> Project Repots& Hardcopy</span>
												
												<label class="cstmck mb-3">
                                                <input type="checkbox" >
                                                <span class="checkmark"></span>
												</label>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-12 mt-2"><span class="ml-2"> Certificate</span>
												
												<label class="cstmck mb-3">
                                                <input type="checkbox" >
                                                <span class="checkmark"></span>
												</label>
											</div> -->
										</div>
									</div>
								</div>
								<div class="row mt-3">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="row">
											<div class="col-sm-6">
												<div class="input-group mb-3" style="border: 1px solid black;">
													<div class="input-group-prepend" style="border-right: 1px solid black;">
														<span class="input-group-text" id="basic-addon1">Paid</span>
													</div>
													
													<input type="text" class="form-control" placeholder="Rupees" aria-label="Username" value="₹<?= $userdata->amount; ?>"aria-describedby="basic-addon1" readonly>
												</div>
											</div>
											<?php 
												if($userdata->due_amount==0 || $userdata->due_amount==''){
													}else{
												?>
											<div class="col-sm-6">
												<div class="input-group mb-3" style="border: 1px solid black;">
													<div class="input-group-prepend" style="border-right: 1px solid black;">
														<span class="input-group-text" id="basic-addon1">Due Amount</span>
													</div>
													
													<input type="text" class="form-control" placeholder="Rupees" aria-label="Username" value="₹<?= $userdata->due_amount;?>" aria-describedby="basic-addon1" readonly>
												</div>
													</div>
													<?php
													}
													?>
											
											<!--<div class="col-sm-5">
												Payment Status:
												<?php
													if ($userdata->txn_status == 'PAID') {
													?>
													<span class="text-success">PAID</span>
													<?php
														
														} elseif($userdata->txn_status == 'FAILED') {
													?>
													<span class="text-danger">FAILED</span>
													<?php
													}
													else{
													?>
													<span class="text-info">PENDING</span>
													<?php
													}
												?>
											</div>-->
										</div>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12" style="text-align:end;">
										<span class="ml-2">
											
											<!-- For - <img src="<?= base_url('public/assets/images/DigiCoders Logo Black.png') ?>" alt="" style="height: 30px;"> -->
						 				</span>
									</div>
								</div>
								 
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12"><label>Note :</label><span class="ml-2"> Submitted Fee is Not Refundable nor transferable </span></div>
									
									
									<div class="col-lg-6 col-md-6 col-sm-12 " style="text-align:end">
										<span class="ml-2 border-top">
											Authorized Sign & Stamp
										</span>
									</div>
								</div>
								<div class="imgdata" style="position: absolute; margin-bottom: -50px;">
									<?php
										if ($userdata->txn_status == 'PAID') {
										?>
										<img src="<?= base_url('public/assets/images/paid.png') ?>" alt="" style="    height: 100px;  width: 103px;margin-top: -119px;margin-left: 595px; ">
										<?php
											} elseif($userdata->txn_status == 'FAILED') {
										?>
										<img src="<?= base_url('public/assets/images/round-failed-stamp.png') ?>" alt="" style="    height: 100px;  width: 150px;margin-top: -119px;margin-left: 595px; ">
										<?php
										}
										else
										{
										?>
										<img src="<?= base_url('public/assets/images/pending.jpg') ?>" alt="" style="    height: 100px;  width: 130px;margin-top: -119px;margin-left: 595px; ">
										<?php
										}
									?>
								</div>
								<?php
								if($userdata->authorization=='Gopal Singh')
								{ ?>
							<img src="<?= base_url('public/assets/images/sign.png') ?>" alt="" style="height: 70px;  margin-top:-110px; margin-right: 20px; float: right">
								<?php
								}
								else if($userdata->authorization=='Kushi jaisawal')
								{ ?>
							<img src="<?= base_url('public/assets/images/kushi1.png') ?>" alt="" style="height: 80px;  margin-top:-110px; margin-right: 20px; float: right">
								<?php
								}
								
								else if($userdata->authorization=='Astha Singh')
								{ ?>
							<img src="<?= base_url('public/assets/images/astha1.png') ?>" alt="" style="height: 80px;  margin-top:-110px; margin-right: 20px; float: right">
								<?php
								}
								
								else if($userdata->authorization=='Swati Singh')
								{ ?>
							<img src="<?= base_url('public/assets/images/swati1.png') ?>" alt="" style="height: 80px;  margin-top:-110px; margin-right: 20px; float: right">
								<?php
								}
								
								else if($userdata->authorization=='Pooja Yadav')
								{ ?>
							<img src="<?= base_url('public/assets/images/pooja1.png') ?>" alt="" style="height: 80px;  margin-top:-110px; margin-right: 20px; float: right">
								<?php
								}
								?>
								
								<?php
								if(!empty($userdata->couponcode)){
								?>
								<div class="row mt-3">
									<div class="col-lg-2 col-md-2 col-sm-12"><label>Coupon Discount:</label></div>
									<div class="col-lg-10 col-md-10 col-sm-12"><span class="ml-2">
										<?php echo "You will get discount Rs. <b>".$userdata->coupon_descount."</b> for use coupon <b>".$userdata->couponcode ?>
										</span>
										<hr class="style1" />
									</div>
								</div>
								<?php
								}
								?>
							</div>
							
						</form>
						
					</div>
				</div>
				<br/>
			</div>
		</div>
		<script
  src="https://code.jquery.com/jquery-3.6.4.js"
  integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
  crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.js"></script>
		 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		
		<script>
         function createPDF() {
            var element = document.getElementById('element-to-print');
            html2pdf(element, {
                margin:1,
                padding:0,
                filename: '#<?php echo $userdata->id.str_replace(" ","_",$userdata->student_name)."_registration_fee_receipt"; ?>.pdf',
                image: { type: 'jpeg', quality: 1 },
                html2canvas: { scale: 2,  logging: true },
                jsPDF: { unit: 'in', format: 'A3', orientation: 'P' },
                class: createPDF
            });
        }; 
    </script>
		<script>
			document.getElementById("btnJPg").addEventListener("click", function() {
				// var htmldata = $("#btnJPg").html();
				$("#btnJPg").html('Downloading..');
				$("#btnJPg").attr('disabled', 'true');
				html2canvas(document.querySelector("#capture")).then(function (canvas) {			var anchorTag = document.createElement("a");
					document.body.appendChild(anchorTag);
					// document.getElementById("previewImg").appendChild(canvas);
					anchorTag.download = "#<?php echo $userdata->id.str_replace(" ","_",$userdata->student_name); ?>"+"_registration_fee_receipt.jpg";
					anchorTag.href = canvas.toDataURL();
					anchorTag.target = '_blank';
					anchorTag.click();
					// $("#btnJPg").html(htmldata);
					$("#btnJPg").removeAttr('disabled');
				});
				
			});
			
		</script>
	</body>
	
</html>