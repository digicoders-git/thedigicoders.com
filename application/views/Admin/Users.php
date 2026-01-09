<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Contact List - <?= $this->data['app_name'] ?></title>
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
					<div class="breadcrumb-title pe-3"> All Users</div>
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
							<h6>All Users
								
							</h6>
							<!-- </div> -->
							
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Action</th>
										<th>id</th>
										<th>Name</th>
										<th>Email</th>
										<th>Mobile</th>
										<th>Token</th>
										<th>OTP</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sr = 1;
										foreach ($userdata as $data)
										{
										?>
										<tr>
											<td><?= $sr++ ?></td>
											<td>
												<div class="col">
													<div class="btn-group">
														<button type="button" onclick="deleteItem(<?= $data->id ?>,'users','','<?= base_url('Admin/deleteWithFilename') ?>')" class="btn btn-danger"><i class="bi bi-trash"></i></button>
														
													</div>
												</div>
											</td>
											<td><?= $data->id; ?></td>
											<td><?= $data->name; ?></td>
											<td><?= $data->email; ?></td>
											<td><?= $data->mobile; ?></td>
											<td><?= $data->token; ?></td>
											<td><?= $data->otp; ?></td>
											<td><?= $data->date; ?></td>
											
											
											
										</tr>
										<?php
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
		
		<script>
			function deleteAllContact(url){
				if(confirm("Are you sure want to delete all Contacts?")){
					window.location.href=url;
				}
			}
		</script>
		
	</body>
	
</html>
<script>
    $('.dropify').dropify();
</script>