<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Manage Attadance- <?= $this->data['app_name'] ?></title>
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
					<div class="breadcrumb-title pe-3">Manage Attendance</div>
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
						<form action="<?= base_url('Admin/ManageAttendance');?>" method="POST">
							<div class="row align-items-center m-0">
								<div class="col-sm-12 d-flex gap-2 justify-content-center">
									<select class="form-select form-select-sm w-25" name="batch_id" id="batch_id"> 
										<option selected="true" disabled="true">Select Batch</option>
										<?php 
											$batches = $this->db->order_by('id', 'desc')->get("tbl_batch")->result();
											foreach ($batches as $item) {
											?>
											<option value="<?= $item->id ?>" <?= isset($batch_id) && $batch_id == $item->id ? 'selected' : '' ?>>
												<?= !empty($item->batch_name) ? $item->batch_name : '' ?>
											</option>
											<?php 
											}
										?>
									</select>
									<input type="date" id="date" name="date" value="<?= isset($date) ? $date : '' ?>" class="form-control form-control-sm w-25" />
									<div>
										<button type="submit" class="btn btn-success btn-sm">
											<i class="bi bi-funnel me-1"></i>Filter
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					
					<div class="card-body">
						<!--
							<div class="d-flex justify-content-end mb-2">
							<button id="addAttendanceBtn" class="btn btn-primary mt-3 ">Add Attendance</button>	
						</div>-->
						<div class="d-flex justify-content-end mb-2">
							<?php if (!empty($studentsData)) { ?>
								<button id="addAttendanceBtn" class="btn btn-primary mt-3">Add Attendance</button>
							<?php } ?>
						</div>
						
						
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Batch</th>
										<th>Student Name</th>
										<th>Add Attendance</th>
										<th>Email</th>
										<th>Mobile Number</th>
									</tr>
								</thead>
								<tbody>
									
									<?php if (!empty($studentsData)) { ?>
										<?php foreach ($studentsData as $index => $student) { ?>
									<tr>
										<td><?= $index + 1 ?></td>
										<td><?= $batchData->batch_name ?></td>
										<td><?= $student->student_name ?></td>
										<td>
											<div class="form-check">
												<input class="form-check-input student-checkbox" type="checkbox" value="<?= $student->id ?>" id="flexCheckDefault<?= $index; ?>">
											</div>
										</td>
										<td><?= $student->email ?></td>
										<td><?= $student->mobile ?></td>
									</tr>
									<?php } ?>
									<?php } else { ?>
									<tr>
										<td colspan="6" class="text-center">No data available for the selected batch.</td>
									</tr>
									<?php } ?>
									
									<!--<tr>
										<td>1</td>
										<td>DCT -1</td>
										<td>Vibhav Tiwari</td>
										<td><div class="form-check">
										<input class="form-check-input" checked type="checkbox" value="" id="flexCheckDefault">
										</div></td>
										<td>Vibhav@gmail.com</td>
										<td>098765421</td>
									</tr>-->
									
									
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
	
	<script>
		$(document).ready(function() {
			let batchId = $("#batch_id").val();  
			let date = $("#date").val(); 
			let selectedIds = []; 
			
			$(document).on('change', '.student-checkbox', function() {
				let studentId = $(this).val();  
				
				if ($(this).is(':checked')) 
				{
					if (!selectedIds.includes(studentId)) {
						selectedIds.push(studentId);
					}
				} else 
				{
					selectedIds = selectedIds.filter(id => id !== studentId);
				}
			});
			
			$('#addAttendanceBtn').click(function() {
				if (selectedIds.length > 0) 
				{
					selectedIds.sort(function(a, b) {
						return a - b;
					});
					
					$.ajax({
						url: "<?= base_url('Admin/AddStudentAttendance'); ?>",  
						type: 'POST',
						data: {
							date: date, 
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
							toastr.error('Error occurred while adding attendance.');  
							console.error(error);
						}
					});
					} else {
					toastr.error('Please select at least one student.'); 
				}
			});
		});
	</script>
	
	
	
	
	
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