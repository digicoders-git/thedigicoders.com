<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>My Assignment - Software Development | Website Development | Mobile Application Development | Digital
			Marketing |
		Summer Training | Internship | Apprenticeship</title>
		<?php include ('includes/CssLinks.php'); ?>
	</head>
	
	<body>
		
		
		<!--start wrapper-->
		<div class="wrapper">
			<!--start top header-->
			<?php include ('includes/header.php'); ?>
			<!--end top header-->
			
			<!--start sidebar -->
			<?php include ('includes/sidebar.php'); ?>
			<!--end sidebar -->
			
			<!--start content-->
			<main class="page-content">
				
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">My Assignment</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a>
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
								<h6>Scheduled Assignment </h6>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Assignment Title</th>
										<th>Download</th>
										<th>View</th>
										<th>Due Date</th>
										<th>Status</th>
										
									</tr>
								</thead>
								<tbody>
									<?php 
									$i= 1;
										foreach($assignment as $assign ){
										?>
										<tr>
											<td><?= $i++ ?></td>
											<td><?= $assign->title ?></td>
											<td>
												<a href="<?= base_url('public/uploads/assignment/') . $assign->image; ?>" download><button class="btn btn-danger btn-sm px-2"><i
												class="bi bi-download me-1"></i></button></a>
											</td>
											<td>
												<a href="<?= base_url('public/uploads/assignment/') . $assign->image; ?>" ><button class="btn btn-success btn-sm px-2"><i
												class="bi bi-eye me-1"></i></button></a>
											</td>
											<td><?= $assign->due_date ?></td>
											<td><span class="badge bg-success">Active</span></td>
										</tr>
										
										<?php
										}
									?>
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
				
				
				
				
				
				<!-- upload File -->
				<div class="modal fade" id="upload_file" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
                        <div class="modal-header bg-primary">
						<h5 class="modal-title text-light" id="exampleModalLabel">Upload Assignment</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="">
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-3 mt-3">
										
										<input type="file" class="form-control" id="inputGroupFile01">
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Upload</button>
					</div>
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
		
		<?php include ('includes/JsLinks.php') ?>
		
	</body>
	
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