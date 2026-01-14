<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Our Experts - <?= $this->data['app_name'] ?></title>
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
					<div class="breadcrumb-title pe-3">All Expert List</div>
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
							<div class="col-sm-6">
								<h6>Manage Experts</h6>
							</div>
							<div class="col-sm-6">
								<div class="d-grid gap-2 d-md-flex justify-content-md-end">
									<button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#expertModal"><i class="fa fa-plus"></i>&ensp;Add Expert</button>
								</div>
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
										<th>Display Status</th>
										<th>Name</th>
										<th>Role</th>
										<th>Sequence</th>
										<th>Image</th>
										<th>Date</th>
										<th>Time</th>
										
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
														<button type="button" onclick="deleteItem(<?= $data->id ?>,'expert','<?= $data->image ?>','<?= base_url('Admin/deleteWithFilename') ?>')" class="btn btn-danger"><i class="bi bi-trash"></i></button>
														<button onclick="EditData('expert', <?= $data->id ?>, 'Edit Expert')" type="button" class="btn btn-primary "><i class="bi bi-pencil-square"></i></button>
													</div>
												</div>
											</td>
											<td>
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" onchange="ChnageStatus(<?= $data->id ?>,<?= $data->status ?>,'expert','<?= base_url('Admin/ChangeStatus') ?>')" id="flexSwitchCheckChecked" <?php if ($data->status == 'true')
														{
															echo "checked";
														} ?>>
														<label class="form-check-label" for="flexSwitchCheckChecked"></label>
												</div>
											</td>
											<td><?= $data->name; ?></td>
											<td><?= $data->role; ?></td>
											<td><?= $data->sequence; ?></td>
											<td> <img src="<?= base_url('public/uploads/expert/') . $data->image; ?>" alt="ddd" style="height: 120px;" /> </td>
											
											<td><?= $data->date; ?></td>
											<td><?= $data->time; ?></td>
											
											
											
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
		
	</body>
	
	
	
	<div class="modal fade" id="expertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<h5 class="modal-title" id="exampleModalLabel">Add Expert</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url() ?>Admin/ManageExpertList/Add" enctype="multipart/form-data" method="POST" id="expert-form">
						<div class="form-group mb-3">
							<input type="text" class="form-control" name="name" placeholder="Enter Expert Name" required />
						</div>
						<div class="form-group mb-3">
							<input type="text" name="role" class="form-control" placeholder="Enter Role" name="role" required />
						</div>
						<div class="form-group mb-3">
							<input type="number" name="sequence" class="form-control" placeholder="Enter Sequence"  required />
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
</script>