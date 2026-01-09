<!DOCTYPE html>
<html lang="en">

<head>
	<title>Accepted Registration List - <?= $this->data['app_name'] ?></title>
	<?php include('include/headerlinks.php'); ?>
	<style>
		/* Filter styling */
		.filter-form .form-group {
			margin-bottom: 10px;
		}
		
		.filter-form label {
			font-weight: 600;
			margin-bottom: 5px;
		}
		
		.filter-form .form-control-sm {
			height: 35px;
		}
		
		.filter-form .btn-sm {
			padding: 5px 15px;
		}
	</style>
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
				<div class="breadcrumb-title pe-3"> Accepted Registration List</div>
				<div class="ps-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><a href="<?= base_url('Admin/Dashboard') ?>"><i
										class="bx bx-home-alt"></i></a>
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
						<h6>Accepted Registration List</h6>
					</div>
					<div class="row align-items-center m-0 mt-3">
    <div class="col-12">
        <div class="card card-body border-0 p-3 bg-light">
            <form method="get" class="row g-3 align-items-center">
                <!-- Coupon Filter -->
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <label class="form-label fw-bold small mb-1">Coupon Code</label>
                    <select name="code" onchange="this.form.submit()" class="form-select form-select-sm">
                        <option value="" selected>All Coupons</option>
                        <?php
                        $codes = $this->db->order_by("id", "desc")->get("tbl_coupon")->result();
                        foreach ($codes as $cval) {
                        ?>
                            <option value="<?= $cval->code ?>" <?= (isset($_GET['code']) && $_GET['code'] == $cval->code) ? 'selected' : '' ?>>
                                <?= $cval->code ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <!-- Mode Filter -->
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <label class="form-label fw-bold small mb-1">Training Mode</label>
                    <select name="mode" class="form-select form-select-sm">
                        <option value="">All Modes</option>
                        <option value="Lucknow" <?= (isset($_GET['mode']) && $_GET['mode'] == 'Lucknow') ? 'selected' : '' ?>>Lucknow</option>
                        <option value="Kanpur" <?= (isset($_GET['mode']) && $_GET['mode'] == 'Kanpur') ? 'selected' : '' ?>>Kanpur</option>
                        <option value="Online" <?= (isset($_GET['mode']) && $_GET['mode'] == 'Online') ? 'selected' : '' ?>>Online</option>
                    </select>
                </div>

                <!-- Txn Status Filter -->
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <label class="form-label fw-bold small mb-1">Txn Status</label>
                    <select name="tnxstatus" class="form-select form-select-sm">
                        <option value="">All Status</option>
                        <option value="Failed" <?= (isset($_GET['tnxstatus']) && $_GET['tnxstatus'] == 'Failed') ? 'selected' : '' ?>>Failed</option>
                        <option value="PAID" <?= (isset($_GET['tnxstatus']) && $_GET['tnxstatus'] == 'PAID') ? 'selected' : '' ?>>PAID</option>
                        <option value="SUCCESS" <?= (isset($_GET['tnxstatus']) && $_GET['tnxstatus'] == 'SUCCESS') ? 'selected' : '' ?>>SUCCESS</option>
                    </select>
                </div>

                <!-- Date Range -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label class="form-label fw-bold small mb-1">Date Range</label>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                        <input type="date" name="from" class="form-control" value="<?= isset($_GET['from']) ? $_GET['from'] : '' ?>" placeholder="From">
                        <span class="input-group-text">to</span>
                        <input type="date" name="to" class="form-control" value="<?= isset($_GET['to']) ? $_GET['to'] : '' ?>" placeholder="To">
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <label class="form-label d-none d-sm-block fw-bold small mb-1">&nbsp;</label>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success btn-sm flex-fill">
                            <i class="bi bi-funnel me-1"></i> Filter
                        </button>
                        <a href="<?= base_url('Admin/AllRegistrations') ?>" class="btn btn-outline-secondary btn-sm" title="Reset Filters">
                            <i class="bi bi-arrow-clockwise"></i>
                        </a>
                    </div>
                </div>
            </form>
            <div class="mt-2 text-muted small">
                <i class="bi bi-info-circle me-1"></i> You can use any combination of filters
            </div>
        </div>
    </div>
</div>
				</div>

				<div class="card-body">
					<!-- Filter Summary -->
					<?php if(isset($_GET['mode']) || isset($_GET['tnxstatus']) || isset($_GET['from']) || isset($_GET['to']) || isset($_GET['code'])): ?>
					<div class="alert alert-info alert-dismissible fade show mb-3" role="alert">
						<strong>Active Filters:</strong>
						<?php
							$activeFilters = [];
							if(isset($_GET['mode']) && $_GET['mode'] != '') $activeFilters[] = "Mode: " . htmlspecialchars($_GET['mode']);
							if(isset($_GET['tnxstatus']) && $_GET['tnxstatus'] != '') $activeFilters[] = "Txn Status: " . htmlspecialchars($_GET['tnxstatus']);
							if(isset($_GET['from']) && $_GET['from'] != '') $activeFilters[] = "From: " . htmlspecialchars($_GET['from']);
							if(isset($_GET['to']) && $_GET['to'] != '') $activeFilters[] = "To: " . htmlspecialchars($_GET['to']);
							if(isset($_GET['code']) && $_GET['code'] != '') $activeFilters[] = "Coupon: " . htmlspecialchars($_GET['code']);
							
							echo implode(' | ', $activeFilters);
						?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php endif; ?>
					
					<div class="table-responsive">
						<table id="example2" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Action</th>
									<th>Amount</th>
									<th>Txn Status</th>
									<th>Reciept</th>
									<th>Application For</th>
									<th>Mode</th>
									<th>Name</th>
									<th>Father's Name</th>
									<th>Email</th>
									<th>Mobile</th>
									<th>Alternate Mobile</th>
									<th>College Name</th>
									<th>Year</th>
									<th>Course</th>
									<th>Txn ID</th>
									<th>Txn DateTime</th>
									<th>Coupon Code</th>
									<th>Status</th>
									<th>Date</th>
									<th>Time</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sr = 1;
								$totalFiltered = 0;
								foreach ($accepttdata as $data) {
									$showRecord = true;
									
									// Date filter - apply only if both dates are provided
									if(isset($_GET['from']) && $_GET['from'] != '' && isset($_GET['to']) && $_GET['to'] != ''){
										if(!($data->date >= $_GET['from'] && $data->date <= $_GET['to'])){
											$showRecord = false;
										}
									}
									// If only from date is provided
									elseif(isset($_GET['from']) && $_GET['from'] != '' && (!isset($_GET['to']) || $_GET['to'] == '')){
										if($data->date < $_GET['from']){
											$showRecord = false;
										}
									}
									// If only to date is provided
									elseif(isset($_GET['to']) && $_GET['to'] != '' && (!isset($_GET['from']) || $_GET['from'] == '')){
										if($data->date > $_GET['to']){
											$showRecord = false;
										}
									}
									
									// Coupon filter
									if(isset($_GET['code']) && $_GET['code'] != '' && $showRecord){
										if($data->couponcode != $_GET['code']){
											$showRecord = false;
										}
									}
									
									// Transaction status filter
									if(isset($_GET['tnxstatus']) && $_GET['tnxstatus'] != '' && $showRecord){
										if($_GET['tnxstatus'] == 'Failed') {
											// For Failed, check if txn_status is FAILED or PENDING
											if($data->txn_status != 'FAILED' && $data->txn_status != 'PENDING') {
												$showRecord = false;
											}
										} else {
											// For PAID or SUCCESS, check exact match
											if($data->txn_status != $_GET['tnxstatus']){
												$showRecord = false;
											}
										}
									}
									
									// Mode filter
									if(isset($_GET['mode']) && $_GET['mode'] != '' && $showRecord){
										$studentMode = isset($data->student_training_location) ? $data->student_training_location : '';
										if($studentMode != $_GET['mode']){
											$showRecord = false;
										}
									}
									
									if($showRecord) {
										$totalFiltered++;
										?>
										<tr>
											<td><?= $sr++ ?></td>
											<td>
												<div class="col">
													<div class="col">
														<div class="btn-group">
															<button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Reject"
																onclick="AcceptReg('registration',<?= $data->id ?>,'reject','<?= base_url('Admin/ChangeAcceptStatus') ?>')"
																class="btn btn-dark btn-sm"><i class="bi bi-x-circle"></i></button>
															<a type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
																href="<?= base_url('Admin/EditRegDetails/') . $data->id ?>"
																class="btn btn-danger btn-sm"><i class="bi bi-pencil-square"></i></a>
														</div>
													</div>
												</div>
											</td>
											<td> ₹ <?= $data->amount; ?></td>
											<td>
												<div class="col">
													<?php
													if ($data->txn_status == 'PAID') {
														?>
														<button type="button" class="btn btn-success btn-sm position-relative"><i
																class="bi bi-check2-circle"></i> PAID
														</button>
														<?php
													} elseif ($data->txn_status == 'SUCCESS') {
														?>
														<button type="button" class="btn btn-success btn-sm position-relative"><i
																class="bi bi-check2-circle"></i> SUCCESS
														</button>
														<?php
													} else {
														?>
														<button type="button" class="btn btn-danger btn-sm position-relative"><i
																class="bi bi-x"></i> <?= $data->txn_status ?>
														</button>
														<?php
													}
													?>
													<a onclick="EditData('registration', <?= $data->id ?>, 'Edit Payment Status')"
														type="button" class=""><i class="bi bi-pencil-square"></i></a>
												</div>
											</td>
											<td>
												<div class="col">
													<a href="<?= base_url() ?>Home/Receipt/<?= $data->id ?>" target="_blank"
														type="button" class="btn btn-outline-info btn-sm ">
														<i class="bi bi-receipt"></i>&nbsp; Print
													</a>
												</div>
											</td>
											<td><?= $data->training_type; ?></td>
											<td>
												<?php 
												if(isset($data->student_training_location)) {
													$modeClass = '';
													switch($data->student_training_location) {
														case 'Lucknow':
															$modeClass = 'bg-primary';
															break;
														case 'Kanpur':
															$modeClass = 'bg-warning';
															break;
														case 'Online':
															$modeClass = 'bg-success';
															break;
														default:
															$modeClass = 'bg-secondary';
													}
													echo '<span class="badge '.$modeClass.'">'.$data->student_training_location.'</span>';
												} else {
													echo '<span class="badge bg-secondary">N/A</span>';
												}
												?>
											</td>
											<td><?= $data->student_name; ?></td>
											<td><?= $data->father_name; ?></td>
											<td><?= $data->email; ?></td>
											<td><?= $data->mobile; ?></td>
											<td>
												<?php if (empty($data->alt_mobile)) {
													echo "Not Available";
												} else {
													echo $data->alt_mobile;
												} ?>
											</td>
											<td><?= $data->college_name; ?></td>
											<td><?= $data->edu_year; ?></td>
											<td><?= $data->course; ?></td>

											<td><?= $data->txn_id; ?></td>
											<td><?= $data->txn_date_time; ?></td>
											<td>
												<?php if (!empty($data->couponcode)) { ?>
													<span class="badge bg-info"><?= $data->couponcode; ?></span>
												<?php } else { ?>
													<span class="badge bg-secondary">No Coupon</span>
												<?php } ?>
											</td>
											<td>
												<?php 
												$statusClass = '';
												switch($data->status) {
													case 'accept':
														$statusClass = 'bg-success';
														break;
													case 'reject':
														$statusClass = 'bg-danger';
														break;
													default:
														$statusClass = 'bg-secondary';
												}
												echo '<span class="badge '.$statusClass.'">'.$data->status.'</span>';
												?>
											</td>
											<td><?= $data->date; ?></td>
											<td><?= $data->time; ?></td>
										</tr>
										<?php
									}
								}
								?>
							</tbody>
						</table>
						
						<?php if($totalFiltered == 0): ?>
						<div class="alert alert-warning text-center mt-3">
							<strong>No records found!</strong> Try changing your filter criteria.
						</div>
						<?php else: ?>
						<div class="alert alert-success text-center mt-3">
							<strong>Total Filtered Records:</strong> <?= $totalFiltered ?>
						</div>
						<?php endif; ?>
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



<div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url() ?>Admin/ManageProject/Add" enctype="multipart/form-data" method="POST"
					id="project-form">
					<div class="form-group mb-3">
						<select name="type" id="" class="form-control" required>
							<option selected disabled>Select Type</option>
							<option value="Website">Website</option>
							<option value="Mobile App">Mobile App</option>
							<option value="Software">Software </option>
						</select>
					</div>
					<div class="form-group mb-3">

						<input type="text" name="project_name" class="form-control" required
							placeholder="Project Title">
					</div>
					<div class="form-group mb-3">
						<input type="date" name="date" class="form-control" required placeholder="Date">
					</div>
					<div class="form-group mb-3">

						<input type="url" name="link" class="form-control" required placeholder="Enter Project Link">
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
	
	function CollegeCode() {
		var x = document.getElementById("ccode").value;
		// Get all other filter values
		var mode = '<?= isset($_GET["mode"]) ? $_GET["mode"] : "" ?>';
		var tnxstatus = '<?= isset($_GET["tnxstatus"]) ? $_GET["tnxstatus"] : "" ?>';
		var from = '<?= isset($_GET["from"]) ? $_GET["from"] : "" ?>';
		var to = '<?= isset($_GET["to"]) ? $_GET["to"] : "" ?>';
		
		// Build URL with all filters
		var url = "<?= base_url('Admin/RegistrationAccepted?') ?>" + 
				  (x ? "code=" + x + "&" : "") +
				  (mode ? "mode=" + mode + "&" : "") +
				  (tnxstatus ? "tnxstatus=" + tnxstatus + "&" : "") +
				  (from ? "from=" + from + "&" : "") +
				  (to ? "to=" + to + "&" : "");
		
		// Remove trailing & if present
		url = url.replace(/&$/, '');
		window.location.href = url;
	}
	
	// Optional: Add some JavaScript for better UX
	$(document).ready(function() {
		// Show/hide date fields based on requirement
		$('input[name="from"], input[name="to"]').on('change', function() {
			var fromVal = $('input[name="from"]').val();
			var toVal = $('input[name="to"]').val();
			
			if(fromVal && !toVal) {
				$('input[name="to"]').prop('required', true);
			} else if(!fromVal && toVal) {
				$('input[name="from"]').prop('required', true);
			}
		});
	});
</script>