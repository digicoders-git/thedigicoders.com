<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Manage Batches - <?= $this->data['app_name'] ?></title>
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
					<div class="breadcrumb-title pe-3">Manage Batches</div>
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
							<div class="col-6">
								<h6>All Batches</h6>
							</div>
							<div class="col-6">
								<div class="d-grid gap-2 d-md-flex justify-content-md-end">
									<button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#addbatch"><i class="fa fa-plus"></i>&ensp;Add New Batch</button>
									
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
										<th>Batch Name</th>
										<th>Time From</th>
										<th>Time to</th>
										<th>Room Number</th>
										<th>Start From</th>   
										<th>Manage Teacher</th>
										<th>Add Student</th>
									</tr>
								</thead>
								<tbody>
									<?php
										if (!empty($batchdata)) {
											$sr = 1;
											foreach ($batchdata as $data) {
											?>
											<tr>
												<td><?php echo $sr++; ?></td> 
												<td>
													<div class="col">
														<div class="btn-group">
															<button type="button" onclick="deleteItem(<?= $data->id ?>,'tbl_batch','','<?= base_url('Admin/deleteWithFilename') ?>')" class="btn btn-danger"><i class="bi bi-trash"></i></button>
															
															<button onclick="EditData('tbl_batch', <?= $data->id ?>, 'Edit Batch')" type="button" class="btn btn-primary "><i class="bi bi-pencil-square"></i></button>
														</div>
													</div>
												</td>
												<td><?php echo $data->batch_name; ?></td> 
												<td><?php echo $data->time_from; ?></td>
												<td><?php echo $data->time_to; ?></td>
												<td><?php echo $data->room_no; ?></td>
												<td><?php echo $data->start_from; ?></td>
												<td>
													<?php 
														$teacher_id = $data->teacher_id;
														$teacherdata = $this->db->get_where("tbl_teacher",['id'=>$teacher_id])->row();
														echo !empty($teacherdata->teacher_name)?$teacherdata->teacher_name:'';
													?>
												</td>
												<td>
													<a href="<?= base_url('Admin/ManageStudent/'.$data->id); ?>"><button class="btn btn-sm btn-primary">Manage Student</button></a>
												</td>
											</tr>
											<?php
											}
											} else {
										?>
										<tr>
											<td colspan="8" class="text-center">Records not found</td>
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
	<div class="modal fade" id="addbatch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<h5 class="modal-title" id="exampleModalLabel">Add Batch</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url() ?>Admin/ManageBatch/Add" enctype="multipart/form-data" method="POST" class="form" id="add-event">
						
						
						<div class="form-group mb-3">
							<label>Select Teacher</label> 
							<select class="form-control" name="teacher_id">
								<option selected="true" disabled="true">Select Teacher</option>
								<?php 
									// Fetching the list of teachers from the database
									$teachers = $this->db->order_by('id', 'desc')->get("tbl_teacher")->result();
									foreach($teachers as $item)
									{
									?>
									<option value="<?= $item->id; ?>"><?= $item->teacher_name; ?></option>
									<?php 
									}
								?>
							</select>
						</div>
						
						
						<label>Batch Name</label> 
						<div class="form-group mb-3">
							<input type="text" id="batch-name" name="batch_name" placeholder="Enter Batch Name" class="form-control" required />
						</div>
						
						<label>Time From</label>
						<div class="form-group mb-3">
							<input type="time" id="time-from" name="time_from" class="form-control" required />
						</div>
						
						<label>Time To</label>
						<div class="form-group mb-3">
							<input type="time" id="time-to" name="time_to" class="form-control" required />
						</div>
						
						<label>Room Number</label>
						<div class="form-group mb-3">
							<input type="text" id="room-number" name="room_no" placeholder="Enter Room Number" class="form-control" required />
						</div>
						
						<label>Start From</label>
						<div class="form-group mb-3">
							<input type="date" id="start-from" name="start_from" class="form-control" required />
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">
								<i class="fa fa-spinner fa-spin" style="display:none;"></i>&ensp;Add
							</button>
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>
	
	
	
</html>
<script>
	$('.dropify').dropify();
	
	$('#summernote').summernote({
		placeholder: 'Discription..',
		tabsize: 2,
		height: 120,
		toolbar: [
		['style', ['style']],
		['font', ['bold', 'underline', 'clear']],
		['color', ['color']],
		['para', ['ul', 'ol', 'paragraph']],
		['table', ['table']],
		['insert', ['link', 'picture', 'video']],
		['view', ['fullscreen', 'codeview', 'help']]
		]
	});
	$('#Code').keyup(function(){
		this.value = this.value.toUpperCase(); 
	});
</script>			


