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
					<div class="breadcrumb-title pe-3">Technology Pdf</div>
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
								<h6>Technology Pdf</h6>
							</div>
							<div class="col-6">
								<div class="d-grid gap-2 d-md-flex justify-content-md-end">
									<button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#EventModal"><i class="fa fa-plus"></i>&ensp;Add Technology Pdf</button>
									
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
										<th>Pdf</th>
										<th>Course Name</th>
										<th>Semester Name</th>
										<th>Category Name</th>
										<th>Technology Name</th>
										<th>Technology Pdf</th>
										<!--<th>Technology Url</th>-->
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
														<!--<button type="button" onclick="deleteItem(<?//= $data->id ?>,'technology_pdf','','<?= base_url('Admin/deleteWithFilename') ?>')" class="btn btn-danger"><i class="bi bi-trash"></i></button>-->
														
														<button type="button" onclick="deleteItem(<?= $data->id ?>,'technology_pdf','<?= $data->image ?>','<?= base_url('Admin/deleteWithFilename') ?>')" class="btn btn-danger"><i class="bi bi-trash"></i></button>
														
														<button onclick="EditData('technology_pdf', <?= $data->id ?>, 'Edit Technology Pdf')" type="button" class="btn btn-primary "><i class="bi bi-pencil-square"></i></button>
													</div>
												</div>
											</td>
											<td> 
												<button class="btn btn-primary"><a href="<?= base_url('public/uploads/technology_pdf/') . $data->image; ?>" class="text-decoraton-none text-white" download=""><i class="fa fa-download"></i>Download</a></button>
												</td>
											<td>
												<?php 
													$idd = $data->subject_id;
													$sub=$this->db->get_where('subject',array('id'=>$idd))->row();
													echo $sub->subject;
												?>
											</td>
											
											<td>
												<?php 
													$semid = $data->semester_id;
													$subcat=$this->db->get_where('semester',array('id'=>$semid))->row();
													if(!empty($subcat))
													{
														echo $subcat->semester;
														}else{
														echo "Not Added Semester Here";
													}
												?>	
											</td>
											
											<td>
												<?php 
													$catid = $data->category_id;
													$cat=$this->db->get_where('paper_category',array('id'=>$catid))->row();
													if(!empty($cat))
													{
														echo $cat->category_name;
														}else{
														echo "Not Added Category Here";
													}
												?>	
											</td>
											<td>
												<?php 
													$techid = $data->technology_id;
													$tech=$this->db->get_where('technology',array('id'=>$techid))->row();
													if(!empty($tech))
													{
														echo $tech->technology_name;
														}else{
														echo "Not Added Category Here";
													}
												?>	
											</td>
											<td><?= $data->pdf_name; ?></td>
											<!--<td><?//= $data->pdf_url; ?></td>-->
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
					<h5 class="modal-title" id="exampleModalLabel">Add Technology</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url() ?>Admin/TechnologyPdf/Add" enctype="multipart/form-data" method="POST" class="form" id="add-event">
						
						<label for="exampleFormControlSelect1">Select Course</label>
						<div class="form-group mb-3">
							<select class="form-control" name="subject_id" id="category-dropdown">
								<option value="" disabled="" selected="">Select Course</option>
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
						<label for="subcategory">Select Semester</label>
						<div class="form-group mb-3">
							<select class="form-control" name="semester_id" id="sub-category-dropdown">
								
							</select>
						</div>
						
						<label for="subcategory">Select Category</label>
						<div class="form-group mb-3">
							<select class="form-control" name="category_id" id="sub-sub-category-dropdown">
							</select>
						</div>
						
						<label for="subcategory">Select Technology</label>
						<div class="form-group mb-3">
							<select class="form-control" name="technology_id" id="sub-sub-sub-category-dropdown">
							</select>
						</div>
						<label>Technology Pdf</label>
						<div class="form-group mb-3">
							<input type="text" id="input-file-now" name="pdf_name" class="form-control" placeholder="Technology Pdf" required />
						</div>
						<!--<label>Technology Pdf Url</label>
							<div class="form-group mb-3">
							<input type="text" id="input-file-now" name="pdf_url" class="form-control" placeholder="Technology Pdf Url" required />
						</div>-->
						<label>Upload PDF</label>
						<div class="form-group mb-3">
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


<script>
	$(document).ready(function() {
		$('#category-dropdown').on('change', function() {
			var subject_id = this.value;
			$.ajax({
				url: "<?= base_url('Admin/SubCategoryDrop')?>",
				type: "POST",
				data: {
					subject_id: subject_id
				},
				cache: false,
				success: function(result){
					$("#sub-sub-category-dropdown").html('');  // How To Check Empty Check Case
					$("#sub-sub-sub-category-dropdown").html('');  // How To Check Empty Check Case
					$("#sub-category-dropdown").html(result);
				}
			});
		});
		
		$('#sub-category-dropdown').on('change', function() {
			
			var semester_id = this.value;
			$.ajax({
				url: "<?= base_url('Admin/SubSubCategoryDrop')?>",
				type: "POST",
				data: {
					semester_id: semester_id
				},
				cache: false,
				success: function(result){
					$("#sub-sub-sub-category-dropdown").html('');
					$("#sub-sub-category-dropdown").html(result);
					// console.log(result);
				}
			});
		});
		
		// sub-sub-category dropdown start here 
		$('#sub-sub-category-dropdown').on('change', function() {
			
			var category_id = this.value;
			$.ajax({
				url: "<?= base_url('Admin/SubSubSubCategoryDrop')?>",
				type: "POST",
				data: {
					category_id: category_id
				},
				cache: false,
				success: function(result){
					$("#sub-sub-sub-category-dropdown").html(result);
					// console.log(result);
				}
			});
		});
	});
</script>