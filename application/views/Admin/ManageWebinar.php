<!DOCTYPE html>
<html lang="en">
	
    <head>
        <title>All Webinar - <?= $this->data['app_name'] ?></title>
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
                    <div class="breadcrumb-title pe-3">All Webinars</div>
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
                                <h6>Upcoming Webinar</h6>
							</div>
                            <div class="col-sm-6">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#WebinarModal"><i class="fa fa-plus"></i>&ensp;Add Webinar</button>
									
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
                                        <th>display Status</th>
                                        <th>Complete Status</th>
                                        <th>logo</th>
                                        <th>Banner</th>
                                        <th>College Name</th>
                                        <th>College Code</th>
                                        <th>Webinar Date</th>
                                        <th>Speaker</th>
                                        <th>About Webinar</th>
                                        <th>Duration</th>
                                        <th>Plateform</th>
                                        <th>Topic</th>
                                        <th>Date</th>
                                        <th>Time</th>
										
									</tr>
								</thead>
                                <tbody>
                                    <?php
										$sr = 1;
										foreach ($csfalse as $data)
										{
											
										?>
                                        <tr>
                                            <td><?= $sr++ ?></td>
                                            <td>
                                                <div class="col">
                                                    <div class="btn-group">
                                                        <button type="button" onclick="deleteItem(<?= $data->id ?>,'webinar','','<?= base_url('Admin/deleteWithFilename') ?>')" class="btn btn-danger"><i class="bi bi-trash"></i></button>
														<!--<button class="btn btn-primary" onclick="Editwebinar(<?= $data->id; ?>)"><i class="bi bi-pencil-square"></i></button>-->
														  <button type="button" onclick="Editwebinar('webinar',<?= $data->id ?>,'Edit Webinar')" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
														<a href="<?= base_url('Admin/WebinarRegistration')?>/<?= $data->id ?>/<?= $data->complete_status ?>" type="button" class="btn btn-info text-white"><i class="bi bi-eye-fill"></i>&nbsp;Registrations</a>
													</div>
												</div>
											</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <!-- display status -->
                                                    <input class="form-check-input" type="checkbox" onchange="ChnageStatus(<?= $data->id ?>,<?= $data->status ?>,'webinar','<?= base_url('Admin/ChangeStatus') ?>')" id="flexSwitchCheckChecked" <?php if ($data->status == 'true')
														{
															echo "checked";
														} ?>>
														<label class="form-check-label" for="flexSwitchCheckChecked"></label>
												</div>
											</td>
											<td>
												<div class="form-check form-switch">
													<!-- complete  status -->
													<input class="form-check-input" type="checkbox" onchange="CompleteStatus(<?= $data->id ?>,<?= $data->complete_status ?>,'webinar','<?= base_url('Admin/CompleteStatus') ?>')" id="flexSwitchCheckChecked" <?php if ($data->complete_status == 'true')
														{
															echo "checked";
														} ?>>
														<label class="form-check-label" for="flexSwitchCheckChecked"></label>
												</div>
											</td>
											<td>
												<a href="<?= base_url('public/uploads/webinar/') . $data->college_logo ?>">
													<img src="<?= base_url('public/uploads/webinar/') . $data->college_logo ?>" alt="college Logo" style="height: 80px; border-radius: 50%">
												</a>
											</td>
											<td>
												<a href="<?= base_url('public/uploads/webinar/') . $data->image ?>">
													<img src="<?= base_url('public/uploads/webinar/') . $data->image ?>" alt="college Logo" style="height: 100px;">
												</a>
											</td>
											<td><?= $data->college_name; ?></td>
											<td><?= $data->college_code; ?></td>
											<td> <?= $data->webinar_date; ?></td>
											<td> <?= $data->speaker; ?></td>
											<td>
												<?php
													$about = explode(',', $data->about_webinar);
													foreach ($about as $aboutval)
													{
													?>
													<li><?= $aboutval ?></li>
													<?php
														
													}
												?>
												
											</td>
											<td> <?= $data->duration; ?></td>
											<td> <?= $data->plateform; ?></td>
											<td> <?= $data->topic; ?></td>
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
				
				
				<div class="card">
					<div class="card-header py-3">
						<div class="row align-items-center m-0">
							<div class="col-sm-6">
								<h6>Completed Webinar</h6>
							</div>
							<!--<div class="col-sm-6">
								<div class="d-grid gap-2 d-md-flex justify-content-md-end">
								<button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#WebinarModal"><i class="fa fa-plus"></i>&ensp;Add Webinar</button>
								
								</div>
							</div>-->
							
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Action</th>
										<th>display Status</th>
										<th>complete Status</th>
										<th>logo</th>
										<th>Banner</th>
										<th>College Name</th>
										<th>College Code</th>
										<th>Webinar Date</th>
										<th>Speaker</th>
										<th>About Webinar</th>
										<th>Duration</th>
										<th>Plateform</th>
										<th>Topic</th>
										<th>Date</th>
										<th>Time</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sr = 1;
										foreach ($cstrue as $data)
										{
										?>
										<tr>
											<td><?= $sr++ ?></td>
											<td>
												<div class="col">
													<div class="btn-group">
														<button type="button" onclick="deleteItem(<?= $data->id ?>,'webinar','','<?= base_url('Admin/deleteWithFilename') ?>')" class="btn btn-danger"><i class="bi bi-trash"></i></button>
														<button type="button" onclick="Editwebinar('webinar',<?= $data->id ?>,'Edit Webinar')" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
														<a href="<?= base_url('Admin/WebinarRegistration') ?>/<?= $data->id ?>/<?= $data->complete_status ?>" type="button" class="btn btn-info text-white"><i class="bi bi-eye-fill"></i>&nbsp;Registrations</a>
													</div>
												</div>
											</td>
											<td>
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" onchange="ChnageStatus(<?= $data->id ?>,<?= $data->status ?>,'webinar','<?= base_url('Admin/ChangeStatus') ?>')" id="flexSwitchCheckChecked" <?php if ($data->status == 'true')
														{
															echo "checked";
														} ?>>
														<label class="form-check-label" for="flexSwitchCheckChecked"></label>
													</div>
												</td>
												<td>
													<div class="form-check form-switch">
														<input class="form-check-input" type="checkbox" onchange="CompleteStatus(<?= $data->id ?>,<?= $data->complete_status ?>,'webinar','<?= base_url('Admin/CompleteStatus') ?>')" id="flexSwitchCheckChecked" <?php if ($data->complete_status == 'true')
															{
																echo "checked";
															} ?>>
															<label class="form-check-label" for="flexSwitchCheckChecked"></label>
													</div>
												</td>
												<td>
													<a href="<?= base_url('public/uploads/webinar/') . $data->college_logo ?>">
														<img src="<?= base_url('public/uploads/webinar/') . $data->college_logo ?>" alt="college Logo" style="height: 80px; border-radius: 50%">
													</a>
												</td>
												<td>
													<a href="<?= base_url('public/uploads/webinar/') . $data->image ?>">
														<img src="<?= base_url('public/uploads/webinar/') . $data->image ?>" alt="college Logo" style="height: 100px;">
													</a>
												</td>
												<td><?= $data->college_name; ?></td>
												<td><?= $data->college_code; ?></td>
												<td> <?= $data->webinar_date; ?></td>
												<td> <?= $data->speaker; ?></td>
												<td>
													<?php
														$about = explode(',', $data->about_webinar);
														foreach ($about as $aboutval)
														{
														?>
														<li><?= $aboutval ?></li>
														<?php
															
														}
													?>
													
												</td>
												<td> <?= $data->duration; ?></td>
												<td> <?= $data->plateform; ?></td>
												<td> <?= $data->topic; ?></td>
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
					</div </main>
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
			
			
			<!--Add Modal-->
			<div class="modal fade" id="WebinarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header bg-primary text-white">
							<h5 class="modal-title" id="exampleModalLabel">Add Webinar</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<!--  -->
							<form action="<?= base_url() ?>Admin/ManageWebinar/Add" enctype="multipart/form-data" method="POST" class="form" id="gallery-form">
								
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group mb-3">
											<label for="">College Name</label>
											<input type="text" name="college_name" class="form-control" required placeholder="Enter College Name">
										</div>
										<div class="form-group mb-3">
											<label for="">Webinar Date </label>
											<input type="date" name="webinar_date" required class="form-control">
										</div>
										<div class="form-group mb-3">
											<label for="">Speaker</label>
											<input type="text" name="speaker" class="form-control" required placeholder="Shpearker name">
										</div>
										<div class="form-group mb-3">
											<label for="">About The Webinar</label>
											<textarea name="topic" id="" cols="30" rows="3" required class="form-control summernote"></textarea>
										</div>
										<div class="form-group mb-3">
											<label for="">College Logo </label>
											<input type="file" id="input-file-now" name="logo" class="dropify" required />
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group mb-3">
											<label for="">College Code</label>
											<input type="text" name="college_code" class="form-control" required placeholder="Entar College Code">
										</div>
										<div class="form-group mb-3">
											<label for="">Duration</label>
											<input type="text" name="duration" class="form-control" required placeholder="Enter Duration">
										</div>
										<div class="form-group mb-3">
											<label for="">Plateform (Google Meet , Zoom)</label>
											<input type="text" name="plateform" class="form-control" required placeholder="Enter plateform">
										</div>
										<div class="form-group mb-3" id="new_chq">
											<label for="">You Will learn </label>
											<div class="input-group control-group after-add-more">
												<input type="text" name="addmore[]" class="form-control" placeholder="About The Webinar">
												<div class="input-group-btn"> 
													<button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
												</div>
											</div>
										</div>
										<div class="form-group mb-3" id="new_chq">
											<label for="">About The Speaker</label>
											<textarea name="about_speaker" cols="30" rows="3" required class="form-control summernote"></textarea>
										</div>
										<br>
										<div class="form-group mb-3">
											<label for="">Upload Banner </label>
											<input type="file" id="input-file-now" name="image" class="dropify" required />
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" id="submitBtn" class="btn btn-primary"><i class="fa fa-spinner fa-spin" style="display:none;" id="submitSpin"></i>Save changes</button>
							</div>
						</form>
						
						<!-- Copy Fields -->
						<div class="copy hide">
							<div class="control-group input-group" style="margin-top:10px">
								<input type="text" name="addmore[]" class="form-control" placeholder="About The Webinar">
								<div class="input-group-btn"> 
									<button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
								</div>
							</div>
						</div>
						<!-- End Copy Fields -->
					</div>
				</div>
			</div>
			
			
		
			
			
		</html>
		<script>
			$('.dropify').dropify();
			$('.summernote').summernote();
			
			
			$(".add-more").click(function(){ 
				var html = $(".copy").html();
				$(".after-add-more").after(html);
			});
			
			
			$("body").on("click",".remove",function(){ 
				$(this).parents(".control-group").remove();
			});
		</script>	
	