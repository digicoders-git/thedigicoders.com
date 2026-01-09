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
					<div class="breadcrumb-title pe-3">Job Details</div>
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
								<h6>Job Details</h6>
							</div>
							<div class="col-6">
								<div class="d-grid gap-2 d-md-flex justify-content-md-end">
									<button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#EventModal"><i class="fa fa-plus"></i>&ensp;Add Job Detail</button>
									
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
										<th>Job Category Name</th>
										<th>Mobile</th>
										<th>Email</th>
										<th>Job Title</th>
										<th>Job Role</th>
										<th>Skill</th>
										<th>Company Name</th>
										<th>Salary</th>
										<th>Job Shift</th>
										<th>Job Mode</th>
										<th>Website</th>
										<th>Education</th>
										<th>Experience</th>
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
														<button type="button" onclick="deleteItem(<?= $data->id ?>,'job_details','<?= $data->image ?>','<?= base_url('Admin/deleteWithFilename') ?>')" class="btn btn-danger"><i class="bi bi-trash"></i></button>
														
														<button onclick="EditData('job_details', <?= $data->id ?>, 'Edit Job Details')" type="button" class="btn btn-primary "><i class="bi bi-pencil-square"></i></button>
													</div>
												</div>
											</td>
											
											<td> <a href="<?= base_url('public/uploads/job_details/') . $data->image; ?>"> <img src="<?= base_url('public/uploads/job_details/') . $data->image; ?>" alt="" style="height: 150px;"></a></td>
											<td>
												<?php 
													$idd = $data->jobcategory_id;
													$sub=$this->db->get_where('job_category',array('id'=>$idd))->row();
													echo $sub->category_name;
													
												?>
											</td>
											<td><?= $data->mobile; ?></td>
											<td><?= $data->email; ?></td>
											<td><?= $data->job_title; ?></td>
											<td><?= $data->job_role; ?></td>
											<td><?= $data->skill; ?></td>
											<td><?= $data->company_name; ?></td>
											<td><?= $data->salary; ?></td>
											<td><?= $data->job_shift; ?></td>
											<td><?= $data->job_mode; ?></td>
											<td><?= $data->website; ?></td>
											<td><?= $data->education; ?></td>
											<td><?= $data->experience; ?></td>
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
					<h5 class="modal-title" id="exampleModalLabel">Add Job Detail</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url() ?>Admin/JobDetails/Add" enctype="multipart/form-data" method="POST" class="form" id="add-event">
						
						<label for="exampleFormControlSelect1">Select Job category</label>
						<div class="form-group mb-3">
							<select class="form-control" name="jobcategory_id" id="exampleFormControlSelect1">
								<option value="" disabled="" selected="">Select Job Category</option>
								<?php 
									$data=$this->db->get('job_category')->result();
									foreach($data as $res)
									{?>
									<option value='<?= $res->id; ?>'><?= $res->category_name; ?></option>
									<?php 
									} 
								?>			
							</select>
						</div>
						
						<label>Upload Image</label>
						<div class="form-group mb-3 ">
							<input type="file" id="input-file-now" name="image" class="dropify" required />
						</div>
						<label>Job Title</label>
						<div class="form-group mb-3">
							<input type="text" id="input-file-now" name="job_title" class="form-control" placeholder="Job Title" required />
						</div>
						
						<label>Company Name</label>
						<div class="form-group mb-3">
							<input type="text" id="input-file-now" name="company_name" class="form-control" placeholder="Company Name" required />
						</div>
						
						<label>Job Role</label>
						<div class="form-group mb-3">
							<input type="text" id="input-file-now" name="job_role" class="form-control" placeholder="Job Role" required />
						</div>
						
						<label>Job Location</label>
						<div class="form-group mb-3">
							<input type="text" id="input-file-now" name="location" class="form-control" placeholder="Job Location" required />
						</div>
						
						<label>Job Salary</label>
						<div class="form-group mb-3">
							<input type="text" id="input-file-now" name="salary" class="form-control" placeholder="Job Salary" required />
						</div>
						
						<label>Job Shift</label>
						<div class="form-group mb-3">
							<input type="text" id="input-file-now" name="job_shift" class="form-control" placeholder="Job Shift" required />
						</div>
						
						<label>Job Mode</label>
						<div class="form-group mb-3">
							<input type="text" id="input-file-now" name="job_mode" class="form-control" placeholder="Job Mode" required />
						</div>
						
						<label>Mobile</label>
						<div class="form-group mb-3">
							<input type="text" id="input-file-now" name="mobile" class="form-control" placeholder="Mobile" required />
						</div>
						
						<label>Email</label>
						<div class="form-group mb-3">
							<input type="text" id="input-file-now" name="email" class="form-control" placeholder="Email" required />
						</div>
						
						<label>Website</label>
						<div class="form-group mb-3">
							<input type="text" id="input-file-now" name="website" class="form-control" placeholder="Website" required />
						</div>
						
						<label>Skill</label>
						<div class="form-group mb-3">
							<input type="text" id="input-file-now" name="skill" class="form-control" placeholder="Skill" required />
						</div>
						
						<label>Education</label>
						<div class="form-group mb-3">
							<select class="form-control"  name="education" id="education">
								<option selected="" disabled="">Select Education</option>
								<option value="Diploma">Diploma</option>
								<option value="Graducation">Graducation</option>
							</select>
						</div>
						
						<label>Experience</label>
						<div class="form-group mb-3">
							<input type="text" id="input-file-now" name="experience" class="form-control" placeholder="Experience" required />
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