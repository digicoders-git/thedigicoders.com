<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Manage Student - <?= $this->data['app_name'] ?></title>
		<?php include('include/headerlinks.php'); ?>
		<!-- Toastr CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
		
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
					<div class="breadcrumb-title pe-3">Manage Student</div>
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
								<h6>Allready Added</h6>
							</div>
							<div class="col-6">
								<div class="d-grid gap-2 d-md-flex justify-content-md-end">
									<button type="button" id="updateBatchBtn" class="btn btn-danger">Remove Student</button>
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
										<th>Student Name</th>
										<th>Add Student</th>
										<th>Email</th>
										<th>Mobile Number</th>
									</tr>
								</thead>
								<tbody>
									<?php
										if (!empty($studentaddeddata)) {
											$i = 1;
											foreach ($studentaddeddata as $student) {
											?>
											<tr>
												<td><?= $i; ?></td>
												<td><?= !empty($student->student_name)?$student->student_name:''; ?></td>
												<td>
													<!--<div class="form-check">
														<input class="form-check-input" checked type="checkbox" value="" id="flexCheckDefault">
													</div>-->
													<div class="form-check">
														<input class="form-check-input student-checkbox" type="checkbox" value="<?= $student->id; ?>" checked id="student_<?= $student->id; ?>">
													</div>
												</td>
												<td><?= !empty($student->email)?$student->email:''; ?></td> 
												<td><?= !empty($student->mobile)?$student->mobile:''; ?></td> 
											</tr>
											<?php
												$i++;
											}
											} else {
										?>
										<tr>
											<td colspan="5" class="text-center">Records not found</td>
										</tr>
										<?php
										}
									?>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
				
				<!-- Here accepttdata -->
				<div class="card">
					<div class="card-header py-3">
						<div class="row align-items-center m-0">
							<div class="col-6">
								<h6>Add More Student</h6>
							</div>
							<div class="col-6">
								<div class="d-grid gap-2 d-md-flex justify-content-md-end">
									<button id="addStudentBtn" class="btn btn-primary mt-3">Add Student</button>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Student Name</th>
										<th>Add Student</th>
										<th>Email</th>
										<th>Mobile Number</th>
									</tr>
								</thead>
								<tbody>
									
									<?php
										$existing_student_ids = [];
										if (!empty($batch_id)) {
											$batch_data = $this->db->get_where('tbl_batch', ['id' => $batch_id])->row();
											if ($batch_data) {
												$existing_student_ids = explode(',', $batch_data->student_id); 
											}
										}
										
										if (!empty($studentdata)) {
											$sr = 1;
											foreach ($studentdata as $data) 
											{
												if (!in_array($data->id, $existing_student_ids)) {
												?>
												<tr>
													<td><?= $sr; ?></td>
													<td><?= !empty($data->student_name) ? $data->student_name : ''; ?></td>
													<td>
														<div class="form-check">
															<input class="form-check-input student-checkbox" type="checkbox" value="<?= $data->id; ?>" id="flexCheckDefault<?= $sr; ?>">
														</div>
													</td>
													<td><?= !empty($data->email) ? $data->email : ''; ?></td>
													<td><?= !empty($data->mobile) ? $data->mobile : ''; ?></td>
												</tr>
												<?php
													$sr++;
												}
											}
											} else {
										?>
										<tr>
											<td colspan="5" class="text-center">Records not found</td>
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
		
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
							<input type="text" id="room-number" name="room_number" placeholder="Enter Room Number" class="form-control" required />
						</div>
						
						<label>Start From</label>
						<div class="form-group mb-3">
							<input type="date" id="start-from" name="start_from" class="form-control" required />
						</div>
						
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-spinner fa-spin" style="display:none;" id="submitSpin"></i>&ensp;Add
					</button>
				</div>
			</div>
		</div>
	</div>
</html>

<!-- Unchecked Here Student -->
<script>
    $(document).ready(function() {
		let uncheckedIds = [];
		$(document).on('change', '.student-checkbox', function() {
			let studentId = $(this).val();
			if (!$(this).is(':checked')) {
				if (!uncheckedIds.includes(studentId)) {
					uncheckedIds.push(studentId);
				}
				} else {
				uncheckedIds = uncheckedIds.filter(id => id !== studentId);
			}
		});
		
		$('#updateBatchBtn').on('click', function() {
			$.ajax({
				url: '<?= base_url("Admin/updateBatchStudents") ?>',
				type: 'POST',
				data: {
					batch_id: <?= $batch_id ?>,
					unchecked_ids: uncheckedIds 
				},
				success: function(response) {
					let result = JSON.parse(response);
					
					if (result.status === 1) {
						toastr.success(result.message);  
						setTimeout(function() {
							location.reload();  
						}, 2000);
						} else {
						toastr.error(result.message); 
					}
				},
				error: function(xhr, status, error) {
					toastr.error('Error occurred while updating the batch.');  
					console.error('AJAX Error:', error);
				}
			});
		});
	});
	
</script>




<!-- This is Check multiple Student and Add to batch -->
<script>
	$(document).ready(function() {
		let batchId = "<?= $batch_id; ?>";
		let selectedIds = [];
		
		// Handle checkbox clicks (for selecting/deselecting students)
		$(document).on('change', '.student-checkbox', function() {
			let studentId = $(this).val();
			if ($(this).is(':checked')) {
				if (!selectedIds.includes(studentId)) {
					selectedIds.push(studentId);
				}
				} else {
				selectedIds = selectedIds.filter(id => id !== studentId);
			}
		});
		
		$('#addStudentBtn').click(function() {
			if (selectedIds.length > 0) {
				// Sort the IDs in ascending order
				selectedIds.sort(function(a, b) {
					return a - b; // Numeric sort
				});
				
				// Alert the sorted selected IDs
				// alert("Selected IDs: " + selectedIds.join(', '));
				
				$.ajax({
					url: "<?= base_url('Admin/AddStudentCheckbox');?>", 
					type: 'POST',
					data: {
						batch_id: batchId,
						student_ids: selectedIds.join(',')
					},
					success: function(response) {
						let result = JSON.parse(response);
						if (result.status === 'success') {
							toastr.success(result.message);
							setTimeout(function() {
								location.reload();  
							}, 2000);
							} else {
							toastr.error(result.message);
						}
					},
					error: function(xhr, status, error) {
						toastr.error('Error occurred while updating student IDs');
						console.error(error);
					}
					
				});
				} else {
				// alert("Please select at least one student.");
				toastr.error('Please select at least one student.');
			}
		});
	});
</script>



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
