<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Manage Event - <?= $this->data['app_name'] ?></title>
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
					<div class="breadcrumb-title pe-3">Manage Semester</div>
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
								<h6>Manage Semester </h6>
							</div>
							<div class="col-6">
								<div class="d-grid gap-2 d-md-flex justify-content-md-end">
									<button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#EventModal"><i class="fa fa-plus"></i>&ensp;Add Semester</button>
									
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
										<th>Image</th>
										<th>Subject Name</th>
										<th>Semester Name</th>
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
														<button type="button" onclick="deleteItem(<?= $data->id ?>,'semester','<?= $data->image ?>','<?= base_url('Admin/deleteWithFilename') ?>')" class="btn btn-danger"><i class="bi bi-trash"></i></button>
														
														<button onclick="EditData('semester', <?= $data->id ?>, 'Edit Semester')" type="button" class="btn btn-primary "><i class="bi bi-pencil-square"></i></button>
													</div>
												</div>
											</td>
											
											<td> <a href="<?= base_url('public/uploads/semester/') . $data->image; ?>"> <img src="<?= base_url('public/uploads/semester/') . $data->image; ?>" alt="" style="height: 150px;"></a></td>
											
											<td>
												<?php 
													$idd = $data->subject_id;
													
													$sub=$this->db->get_where('subject',array('id'=>$idd))->row();
													
													echo $sub->subject;
													
												?>
											</td>
											
											<td><?= $data->semester; ?></td>
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
		
	</body>
	<div class="modal fade" id="EventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<h5 class="modal-title" id="exampleModalLabel">Add Semester</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url() ?>Admin/ManageSemester/Add" enctype="multipart/form-data" method="POST" class="form" id="add-event">
						
						<label for="exampleFormControlSelect1">Select Subject</label>
						<div class="form-group mb-3">
							<select class="form-control" name="subject_id" id="exampleFormControlSelect1">
								<option value="" disabled="" selected="">Select Subject</option>
								<?php 
									$data=$this->db->get('subject')->result();
									foreach($data as $res)
									{?>
									<option value='<?= $res->id; ?>'><?= $res->subject; ?></option>
									<?php 
									} 
								?>			
							</select>
						</div>
						<label>Semester Name</label>
							<div class="form-group mb-3">
							<input type="text" id="input-file-now" name="semester" class="form-control" required />
						</div>
						<!--<label>Semester Name</label><br>
							<input type="checkbox" name="semester[]" value="1st Semester">1st Semester 
							<input type="checkbox" name="semester[]" value="2nd Semester">2nd Semester 
							<input type="checkbox" name="semester[]" value="3rd Semester">3rd Semester
							<input type="checkbox" name="semester[]" value="4th Semester">4th Semester
							<input type="checkbox" name="semester[]" value="5th Semester">5th Semester
							<input type="checkbox" name="semester[]" value="6th Semester">6th Semester
							<input type="checkbox" name="semester[]" value="7th Semester">7th Semester
							<input type="checkbox" name="semester[]" value="8th Semester">8th Semester-->
					
					
						<label>Upload Image</label>
						<div class="form-group mb-3 ">
							<input type="file" id="input-file-now" name="image" class="dropify" required />
						</div>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" id="submitBtn"><i class="fa fa-spinner fa-spin" style="display:none;" id="submitSpin"></i>&ensp;Save changes</button>
					</div>
				</form>
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
</script>		