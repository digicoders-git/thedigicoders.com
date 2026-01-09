<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Add Student - <?= $this->data['app_name'] ?></title>
		<?php include('include/headerlinks.php'); ?>
		<style>
			label{
			font-weight:600;
			padding-top:5px;
			}
		</style>
		<style>
			#msgpara{
			border: #06509f;
			border-style: dashed;
			padding:4px;
			text-align:justify;
			}
			/*#msgpara:hover{
			border: yellow;
			border-style: dotted;
			}*/
			.btnJPg:hover{
			background:#f7b205;
			color:white;
			}
			.border {
			padding:15px!important;
			text-align:justify;
			// height: 100%;
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
		</style>
		
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
				
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add Student</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?= base_url('Admin/Dashboard') ?>"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="section-area section-sp3 ovpr-dark bg-fix appointment-box" style="background-image:url(/assets/images/banner/banner4.jpg);">
					<div class="container-fluid">
						
						<div class="card"> 
							<div class="card-body">
							<form id="reg" class="form-horizontal mb-5" action="<?= base_url() ?>Admin/feePay/PayNow" method="POST">
								<?php
									$csrf = array(
									'name' => $this->security->get_csrf_token_name(),
									'hash' => $this->security->get_csrf_hash());                   
								?>
								<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
								
								
							
								
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Student Mobile Number</label>
										<?php echo form_error('mobile'); ?>
										<input class="form-control" type="number" name="Mobile1" maxlength="10" minlength="10" placeholder="Enter Student Mobile Number" required  onkeyup="search_func(this.value)" />
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label class="control-label">Student Name</label>
										<?php echo form_error('student_name'); ?>
										<input class="form-control" type="text"  name="Name" placeholder="Enter Student Name" required id="name" />
										<input type="hidden" name="regid" id="regid" />
										<input type="hidden" name="uid" id="uid" />
									</div>
										 
								</div>
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Training</label>
										<?php echo form_error('training_type'); ?>
										<input type="text" class="form-control" name="ApplicationFor" id="trainingtype"  placeholder="Training" required>
										
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Technology</label>
										<?php echo form_error('technology'); ?>
										<input type="text" class="form-control" name="technology" id="technology" placeholder="Technology"  required>
										
									</div>
								</div>
								
								
								
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Education</label>
										<?php echo form_error('course'); ?>
										<input type="text" class="form-control" name="Course" placeholder="Education" required id="education">
										
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Year</label>
										<?php echo form_error('edu_year'); ?>
										<input type="text" class="form-control" name="Year" placeholder="Year" required id="year">
										
									</div>
								</div>
								
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Amount To Pay Now</label>
										<input class="form-control" type="number" id="amt_number" name="Amount" placeholder="Enter Amount" required />
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										
										<label>Due Amount</label>
										<input class="form-control" value="0" type="number" id="tnxid" name="DueAmount" placeholder="Due Amount" />
									</div>
									
									
								</div>
						
								<div class="row form-group">
									
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Paid To</label>
										<input class="form-control" type="text" name="PaidTo" id="tnxpass" placeholder="Money Goes to ex(UPI/Mobile/Person Name)" />
									</div>
									
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>College Name</label>
										<?php echo form_error('college_name'); ?>
										<input class="form-control" id="cname"  type="text" name="College" placeholder="Enter Student College Name" required list="collegelist" />
									</div>
									
									
								</div>
								<div class="row form-group"> 
								<div class="col-lg-6 col-md-6 col-sm-12">
											<label>Payment Status</label>
											<?php echo form_error('payment_status'); ?>
											<select class="form-control" name="paystatus" id="paystatus" required />
											<option value="" selected disabled>---select--</option>
											<option value="PAID">PAID</option>
											<option value="SUCCESS">SUCCESS</option>
											<option value="FAILED">FAILED</option>
											<option value="PENDING">Pending</option>
										</select>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Today Date</label>
										<input class="form-control" type="text"value="<?=  date('d-m-Y')?>" readonly name="TodayDate" id="remark" placeholder="Enter Remark"  />
									</div>
								</div>
								
								<div class="row form-group">
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										
										<label>Account Of</label>
										
										<select class="form-control" name="Account_of" id="Account_of" required />
											<option value="" selected disabled>---Account Of--</option>
											<option value="PAID">Summer Trainig 2024</option>
											<option value="SUCCESS">Internship 2024</option>
											<option value="FAILED">Online Summer Training 2024</option>
											<option value="PENDING">Other</option>
										</select>
										
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Amount in Words</label>
										<input class="form-control"readonly type="text" name="AmountInWord" id="amt_word" placeholder="Amount in Words"  />
									</div>
									
								</div>
								
								<div class="row form-group">
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<?php
											$id=$this->db->query("SELECT MAX(id) as sr_no FROM fee_deposit")->row();
											?>
										<label>Sr No.</label>
										<input class="form-control"value="<?= $id->sr_no;?>" type="text" id="sr_no" name="SrNo" readonly placeholder=""readonly  required />
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										<label>Payment Mode</label>
										<!--<input class="form-control" type="text" name="amount" id="amount" placeholder="Amount in Words"  />-->
										<select required name="PaymentMode" id="cars" class="form-control">
										  <option value="">-- Select Payment Mode --</option>
										  <option value="Cash">Cash</option>
										  <option value="Online">Online</option>
										</select>
									</div>
									
								</div>
								<div class="row ">
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										
										<label>Include</label><br>
										<select name="Include" id="cars" class="form-control">
										  <option value="">-- Select --</option>
										  <option value="Training Fee">Training Fee</option>
										  <option value="Registration Fee">Registration Fee</option>
										  <option value="Project Report & Hardcopy">Project Report & Hardcopy</option>
										  <option value="Certificate">Certificate</option>
										</select>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12">
										
										<label>Authorized By</label><br>
										<select name="Authorization" id="cars" class="form-control">
										  <option value="">-- Select Authorization --</option>
										  <option value="Gopal Singh">Er. Gopal Singh</option>
										  <option value="Kushi jaisawal">Khushi jaisawal</option>
										  <!--<option value="Astha Singh">Astha Singh</option>-->
										  <option value="Swati Singh">Swati Singh</option>
										  <!-- <option value="Pooja Yadav">Pooja Yadav</option> -->
										</select>
									</div>
									
								</div>
								
								
								<div class="col-lg-12 text-center mt-5">
									<button name="submit" type="submit" value="Submit" class="btn button-md btn-danger">Pay Now</button>
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
	<script language="javascript">
			function search_func(value)
			{
				// console.log(value);  
				$.ajax({ 
					type: "POST",
					url: "<?= base_url('Home/SearchStuDetail')?>",
					data: {'mobile' : value},
					dataType: "text",
					success: function(msg){
						var obj = JSON.parse(msg);
						if(obj.error=='error')
						{ 
							$("#cname").val('');
							$("#regid").val('');
							$("#name").val('');
							
							$("#name").val('');
							$("#uid").val('');
							$("#fname").val('');
							$("#email").val('');
							$("#mob2").val('');
							$("#education").val('');
							$("#trainingtype").val('');
							$("#year").val('');
							$("#technology").val('');
							}else{
							
							
							console.log(obj.id);
							$("#cname").val(obj.college_name);
							$("#regid").val(obj.id);
							$("#uid").val(obj.userid);
							$("#name").val(obj.student_name);
							$("#fname").val(obj.father_name);
							$("#email").val(obj.email);
							$("#mob2").val(obj.alt_mobile);
							$("#sr_no").val(obj.id);
							$("#education").val(obj.course);
							$("#trainingtype").val(obj.training_type);
							$("#year").val(obj.edu_year);
							$("#technology").val(obj.technology);
							// var gg = obj.lastid;
							// var ff=gg+1;
							var anotherNumber = parseInt(obj.lastid)+1;
                             // anotherNumber += 1;
							$("#sr_no").val(anotherNumber);
						} 
						
					}
					
				});
			}
	</script>
	
	
</body>

</html>



<script>
 

  $(document).ready(function() {
  
     $("#amt_number").keyup(function(){
	  var number = $("#amt_number").val();
      var words = rupeesToWords(number);
	  $("#amt_word").val(words);
	  });
  });
</script>

<script>
	function rupeesToWords(amount) {
  const ones = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
  const teens = ['Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];
  const tens = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
  const scales = ['', 'Thousand', 'Lakh', 'Crore']; // Extend as needed

  function convertNumberToWords(number) {
    if (number < 10) {
      return ones[number];
    } else if (number < 20) {
      return teens[number - 10];
    } else if (number < 100) {
      return tens[Math.floor(number / 10)] + (number % 10 !== 0 ? ' ' + ones[number % 10] : '');
    } else {
      return ones[Math.floor(number / 100)] + ' Hundred' + (number % 100 !== 0 ? ' ' + convertNumberToWords(number % 100) : '');
    }
  }

  if (isNaN(amount) || amount === 0) {
    return 'Zero Rupees';
  }

  if (amount < 0) {
    return 'Minus ' + rupeesToWords(-amount);
  }

  const chunks = [];
  while (amount) {
    chunks.push(amount % 1000);
    amount = Math.floor(amount / 1000);
  }

  let words = [];
  for (let i = 0; i < chunks.length; i++) {
    if (chunks[i]) {
      words.unshift(convertNumberToWords(chunks[i]));
      words.unshift(scales[i]);
    }
  }

  return words.join(' ');
}
	</script>






