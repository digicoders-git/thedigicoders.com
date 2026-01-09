<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>My Fee - Software Development | Website Development | Mobile Application Development | Digital Marketing |
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
					<div class="breadcrumb-title pe-3">Manage Fee</div>
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
				
				<div class="card mt-4">
					<div class="card-header py-3">
						<div class="row align-items-center m-0">
							<div class="col-12 col-sm-12 d-flex justify-content-between">
								<h6 class="mt-2">
									Total Fee Remaining - 
									<span id="totalFeeRemaining" class="text-success text-bold">
										₹<?= !empty($latest_due_amount) ? $latest_due_amount : '0'; ?>/-
									</span>
									<span style="font-size:12px;color:red;font-weight:300">
										(If you want to pay your total due amount, click the "Pay Now" button.)
									</span>
								</h6>
								
								
								<form id="paymentForm" method="POST" action="<?= base_url('User/PaybyStudent') ?>">
									<input type="hidden" name="mobile" value="<?= $feedata[0]->mobile ?? '' ?>" />
									<input type="hidden" name="reg_id" value="<?= $feedata[0]->reg_id ?? '' ?>" />
									<input type="hidden" name="totalFeeRemaining" value="<?= $latest_due_amount ?? '' ?>" />
									<button type="button" class="btn btn-sm btn-primary" onclick="confirmPayment()">Pay Now</button>
								</form>
								
							</div>
						</div>
					</div>
					
				</div>
				
				<div class="card">
					<div class="card-header py-3">
						<div class="row align-items-center m-0">
							<div class="col-6">
								<h6>Payment History </h6>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Amount</th>
										<th>Due Amount</th>
										<th>Payment Mode</th>
										<th>Accept Status</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$i = 1;
										
										if (!empty($feedata)) {
											foreach ($feedata as $item) {
											?>
											<tr>
												<td><?= $i++ ?></td>
												<td>₹<?= !empty($item->amount) ? $item->amount : '' ?></td>
												<td>₹<?= !empty($item->due_amount) ? $item->due_amount : '' ?></td>
												<td><?= $item->payment_mode ?></td>
												
												<td>
													<?php 
														$badgeClass = '';
														if ($item->accept_status === 'accept') {
															$badgeClass = 'bg-success';  // Green for accepted
															} elseif ($item->accept_status === 'reject') {
															$badgeClass = 'bg-danger';  // Red for rejected
															} elseif ($item->accept_status === 'new') {
															$badgeClass = 'bg-warning';  // Yellow for new
														}
													?>
													<span class="badge <?= $badgeClass; ?>">
														<?= ucfirst($item->accept_status); ?>
													</span>
												</td>
												
												<td><?= $item->date ?></td>
											</tr>
											<?php
											}
											} else {
										?>
										<tr>
											<td colspan="6" style="text-align: center;">No Record Found</td>
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
		
		<?php include ('includes/JsLinks.php') ?>
		
		
	</body>
	
</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	function confirmPayment() {
		const form = document.getElementById('paymentForm');
		const mobile = form.querySelector('[name="mobile"]').value.trim();
		const regId = form.querySelector('[name="reg_id"]').value.trim();
		const totalFeeRemaining = form.querySelector('[name="totalFeeRemaining"]').value.trim();
		
		// Check if any of the fields are empty
		if (!mobile || !regId || !totalFeeRemaining) {
			// If fields are empty, do nothing and return
			return;
		}
		
		// Use SweetAlert to show the confirmation dialog
		Swal.fire({
			title: 'Are you sure?',
			text: 'You are about to pay the fee.',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes, pay now!',
			cancelButtonText: 'No, cancel',
			reverseButtons: true
			}).then((result) => {
			if (result.isConfirmed) {
				// Submit the form if the user confirms
				form.submit();
			}
		});
	}
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
</script>																																				