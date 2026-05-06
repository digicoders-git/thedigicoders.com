<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
	href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
	rel="stylesheet">


<style>
	body {
		font-family: "Poppins", sans-serif;
	}
</style>



<header class="top-header">
	<nav class="navbar navbar-expand gap-3">
		<div class="mobile-toggle-icon fs-3">
			<i class="bi bi-list"></i>
		</div>
		<!-- <form class="searchbar">
			<div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
			<input class="form-control" type="text" placeholder="Type here to search">
			<div class="position-absolute top-50 translate-middle-y search-close-icon"><i class="bi bi-x-lg"></i></div>
		</form> -->
		<h2 class="text-center">
			<?php
			if ($this->session->userdata('admin_type') == 'website') {
				?>
				<h2>Website Panel</h2>
				<?php
			} else {
				?>
				<h2>App Panel</h2>
				<?php
			}
			?>

		</h2>
		<div class="top-navbar-right ms-auto">
			<ul class="navbar-nav align-items-center">
				<li class="nav-item">
					<div class="form-check form-switch d-flex align-items-center gap-2 mt-2">
						<input class="form-check-input" type="checkbox" id="paymentModeToggle">
						<label class="form-check-label text-dark fw-bold" for="paymentModeToggle"
							id="paymentModeLabel">Loading...</label>
					</div>
				</li>
				<li class="nav-item search-toggle-icon">
					<a class="nav-link" href="#">
						<div class="">
							<i class="bi bi-search"></i>

						</div>
					</a>
				</li>
				<li class="nav-item dropdown dropdown-user-setting">
					<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
						<div class="user-setting d-flex align-items-center">
							<img src="<?= base_url('public') ?>/assets/images/favicon.png" class="user-img" alt="">
						</div>
					</a>
					<ul class="dropdown-menu dropdown-menu-end">
						<li>
							<a class="dropdown-item" href="#">
								<div class="d-flex align-items-center">
									<img src="<?= base_url('public') ?>/assets/images/favicon.png" alt=""
										class="rounded-circle" width="54" height="54">
									<div class="ms-3">
										<h6 class="mb-0 dropdown-user-name">Admin panel</h6>
										<small class="mb-0 dropdown-user-designation text-secondary">Admin</small>
									</div>
								</div>
							</a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li>
							<a class="dropdown-item" href="<?= base_url('Admin/Profile') ?>">
								<div class="d-flex align-items-center">
									<div class=""><i class="bi bi-person-fill"></i></div>
									<div class="ms-3"><span>Profile</span></div>
								</div>
							</a>
						</li>
						<li>
							<a class="dropdown-item" href="<?= base_url("Admin/ManagePassword") ?>">
								<div class="d-flex align-items-center">
									<div class=""><i class="bi bi-gear-fill"></i></div>
									<div class="ms-3"><span>Setting</span></div>
								</div>
							</a>
						</li>

						<li>
							<hr class="dropdown-divider">
						</li>
						<li>
							<a class="dropdown-item" href="javascript:void(0)"
								onclick="logout('<?= base_url('Admin/logout/logout') ?>')">
								<div class="d-flex align-items-center">
									<div class=""><i class="bi bi-lock-fill"></i></div>
									<div class="ms-3"><span>Logout</span></div>
								</div>
							</a>
						</li>
					</ul>
				</li>


			</ul>
		</div>
	</nav>
</header>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function () {
		// Fetch current mode
		$.ajax({
			url: '<?= base_url("Admin/GetPaymentMode") ?>',
			type: 'GET',
			dataType: 'json',
			success: function (response) {
				if (response.status == 'success') {
					if (response.mode == 'razorpay') {
						$('#paymentModeToggle').prop('checked', true);
						$('#paymentModeLabel').text('Razorpay Active');
					} else {
						$('#paymentModeToggle').prop('checked', false);
						$('#paymentModeLabel').text('Cashfree Active');
					}
				}
			}
		});

		// Toggle mode
		$('#paymentModeToggle').change(function () {
			var mode = $(this).is(':checked') ? 'razorpay' : 'cashfree';
			var label = $(this).is(':checked') ? 'Razorpay Active' : 'Cashfree Active';

			// Optimistic UI update
			$('#paymentModeLabel').text(label);

			$.ajax({
				url: '<?= base_url("Admin/TogglePaymentMode") ?>',
				type: 'POST',
				data: { mode: mode },
				dataType: 'json',
				success: function (response) {
					if (response.status == 'success') {
						// alert(response.msg);
						console.log(response.msg);
					} else {
						alert('Failed to update payment mode');
						// Revert switch if failed
						$('#paymentModeToggle').prop('checked', !this.checked);
					}
				},
				error: function () {
					alert('Error updating payment mode');
					// Revert switch if error
					$('#paymentModeToggle').prop('checked', !this.checked);
				}
			});
		});
	});
</script>

<?php if (!$this->session->userdata('super_verified')): ?>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		$(document).ready(function () {
			function showSuperAlert() {
				Swal.fire({
					title: 'Security Verification',
					text: 'Please enter your administrator password to unlock dashboard activities.',
					input: 'password',
					inputPlaceholder: 'Enter Password',
					inputAttributes: {
						autocapitalize: 'off',
						autocomplete: 'off'
					},
					showCancelButton: false,
					confirmButtonText: 'Verify Password',
					showLoaderOnConfirm: true,
					allowOutsideClick: false,
					allowEscapeKey: false,
					allowEnterKey: true,
					preConfirm: (password) => {
						if (!password) {
							Swal.showValidationMessage('Password is required');
							return false;
						}
						return $.ajax({
							url: '<?= base_url('Admin/VerifySuperPassword') ?>',
							type: 'POST',
							data: { password: password },
							dataType: 'json'
						}).then(response => {
							if (response.status !== 'success') {
								throw new Error(response.msg)
							}
							return response
						}).catch(error => {
							Swal.showValidationMessage(`${error.message || error}`)
						})
					}
				}).then((result) => {
					if (result.isConfirmed) {
						Swal.fire({
							title: 'Access Granted',
							text: 'You can now perform administrative activities.',
							icon: 'success',
							timer: 1500,
							showConfirmButton: false
						});
					}
				})
			}
			showSuperAlert();
		});
	</script>
<?php endif; ?>

<script>
	// Disable Right-Click
	document.addEventListener('contextmenu', event => event.preventDefault());

	// Disable Ctrl+U, F12, and other inspection shortcuts
	document.onkeydown = function (e) {
		// F12
		if (e.keyCode == 123) {
			return false;
		}
		// Ctrl+Shift+I (Inspect)
		if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
			return false;
		}
		// Ctrl+Shift+J (Console)
		if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
			return false;
		}
		// Ctrl+U (View Source)
		if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
			return false;
		}
		// Ctrl+S (Save Page)
		if (e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)) {
			return false;
		}
	};
</script>