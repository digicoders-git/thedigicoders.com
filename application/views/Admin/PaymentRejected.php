<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Reject Fee Payement List - <?= $this->data['app_name'] ?></title>
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
				
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3"> Fee Payement List</div>
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
				
				<div class="card">
					<div class="card-header py-3">
						<div class="row align-items-center m-0">
							<!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end"> -->
							<!-- <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#projectModal"><i class="fa fa-plus"></i>&ensp;Add Project</button> -->
							<h6>Reject Fee Payement List</h6>
							<!-- </div> -->
							
						</div>
						<div class="row align-items-center m-0">
							
							<div class="col-sm-3"> 
								<strong>Coupon: </strong>
								<select name="code" onchange="CollegeCode()" id="ccode">
									<option value="" selected disabled>--select--</option>
									<?php
										$codes=$this->db->order_by("id","desc")->get("tbl_coupon")->result();
										foreach($codes as $cval){
										?> 
										<option value="<?= $cval->code?>"><?= $cval->code?></option>
										<?php
										}
									?>
								</select>
							</div>
							<div class="col-sm-9 text-end"> 
								
								<form method="get"> 
									
									<strong>Tnx Status: </strong>
									<select name="tnxstatus" required>
										<option value="Failed">Failed</option>
										<option value="PAID">PAID</option>
										<option value="SUCCESS">SUCCESS</option>
									</select>
									<strong>From Date: </strong>
									<input type="date" name="from" required>&nbsp;
									<strong>To Date: </strong>  
									<input type="date" name="to" required>
									<input type="submit" value="Filter" class="btn-success">
									<a href="<?= base_url('Admin/PaymentRejected')?>" class="btn-success py-1 px-2"><i class="fa fa-refresh"></i></a>
								</form>
								
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Action</th>
										<th>Amount</th>
										<th>Due Amount</th>
										<th>Txn Status</th>
										<th>Reciept</th>
										<th>Application For</th>
										<th>Name</th>
										<!--<th>Father's Name</th>
										<th>Email</th>-->
										<th>Mobile</th>
										<th>Alternate Mobile</th>
										<th>College Name</th>
										<!--<th>Coupon Code</th>-->
										<th>Year</th>
										<th>Course</th>
										<th>Txn ID</th>
										<th>Txn DateTime</th>
										<th>Status</th>
										<th>Date</th>
										<th>Time</th>
										
									</tr>
								</thead>
								<tbody>
									<?php
										$sr = 1;
										foreach ($userdata as $data)
										{
										// $regdata=$this->db->get_where("registration",['id'=>$data->reg_id])->row();
											// $fstatus="true";
											if(isset($_REQUEST['from']) && isset($_REQUEST['to'])){
												if($data->date >= $_REQUEST['from'] && $data->date <= $_REQUEST['to']){
													$fstatus="true";
												}
												else{
													$fstatus="false";
												}
											}
											// if(isset($_REQUEST['code'])){
												// if($regdata->couponcode == $_REQUEST['code']){
													// $fstatus="true";
												// } 
												// else{
													// $fstatus="false";
												// }
											// }
											
											if($data->status=="true")
											{
											?>
											<tr>
												<td><?= $sr++ ?></td>
												<td>
													<div class="col">
														<div class="btn-group">
															
															<button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Accept"  onclick="AcceptReg('fee_deposit',<?= $data->id ?>,'accept','<?= base_url('Admin/ChangeAcceptStatus') ?>')" class="btn btn-success"><i class="bi bi-check-circle"></i></button> 
															<button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Reject" onclick="AcceptReg('fee_deposit',<?= $data->id ?>,'reject','<?= base_url('Admin/ChangeAcceptStatus') ?>')" class="btn btn-dark"><i class="bi bi-x-circle"></i></button>
															
														</div>
													</div>
												</td>
												<td> ₹<?= $data->amount; ?>   </td>
												<td> ₹<?= $data->due_amount; ?>   </td>
												<td>
													<div class="col">
														<?php
															if ($data->txn_status == 'PAID')
															{
															?>
															<button type="button" class="btn btn-success btn-sm position-relative"><i class="bi bi-check2-circle"></i> PAID
															</button>
															
															<?php
															}
															elseif($data->txn_status == 'SUCCESS')
															{
															?> 
															
															<button type="button" class="btn btn-success btn-sm position-relative"><i class="bi bi-check2-circle"></i> SUCCESS
															</button>
															<?php
															}
															else
															{
															?> 
															<button type="button" class="btn btn-danger btn-sm position-relative"><i class="bi bi-x"></i> FAILED
															</button>
															<?php
															}
														?><a onclick="EditData('fee_deposit', <?= $data->id ?>, 'Edit Payment Status')" type="button" class=""><i class="bi bi-pencil-square"></i></a>
													</div>
												</td>
												<td>
													<div class="col">
														<a href="<?= base_url() ?>Home/PayReciept/<?= $data->id ?>" target="_blank" type="button" class="btn btn-outline-info btn-sm ">
															<i class="bi bi-receipt"></i>&nbsp;Print 
														</a>
													</div> 
												</td>
												<td><?= $data->application_for; ?></td>
												<td><?= $data->student_name; ?></td>
												<!--<td><?= $regdata->father_name; ?></td>
												<td><?= $regdata->email; ?></td>-->
												<td><?= $data->mobile; ?></td>
												<td>
													<?php if (empty($data->alt_mobile))
														{
															echo "Not Available";
														}
														else
														{
															echo $data->alt_mobile;
														}  ?>
												</td>
												<td><?= $data->college; ?></td>
												<!--<td><?= $data->couponcode; ?></td>-->
												<td><?= $data->year; ?></td>
												<td><?= $data->course; ?></td>
												
												<td><?= $data->txn_id; ?></td>
												<td><?= $data->txn_date_time; ?></td>
												<td><?= $data->status; ?></td>
												<td><?= $data->date; ?></td>
												<td><?= $data->time; ?></td>
												
												
												
											</tr>
											<?php
											}
										}
									?>
								</tbody>
								
							</table>
						</div>
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
	
	
	
	<div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url() ?>Admin/ManageProject/Add" enctype="multipart/form-data" method="POST" id="project-form">
						<div class="form-group mb-3">
							<select name="type" id="" class="form-control" required>
								<option selected disabled>Select Type</option>
								<option value="Website">Website</option>
								<option value="Mobile App">Mobile App</option>
								<option value="Software">Software </option>
							</select>
						</div>
						<div class="form-group mb-3">
							
							<input type="text" name="project_name" class="form-control" required placeholder="Project Title">
						</div>
						<div class="form-group mb-3">
							<input type="date" name="date" class="form-control" required placeholder="Date">
						</div>
						<div class="form-group mb-3">
							
							<input type="url" name="link" class="form-control" required placeholder="Enter Project Link">
						</div>
						
						<div class="form-group mb-3">
							<input type="file" id="input-file-now" name="image" class="dropify" required />
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
</html>
<script>
    $('.dropify').dropify();
	function CollegeCode(){
		var x=document.getElementById("ccode").value;
		// alert(x);
		window.location.href="<?= base_url('Admin/PaymentRejected?code=')?>" + x;
	}
	
</script>