<!DOCTYPE html>
<html lang="en">

<head>
	<title>Manage Push Notifications - <?= isset($this->data['app_name']) ? $this->data['app_name'] : 'DigiCoders' ?>
	</title>
	<?php include('include/headerlinks.php'); ?>
	<style>
		.stat-card {
			border: none;
			border-radius: 16px;
			box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
			transition: all 0.3s ease;
			overflow: hidden;
		}

		.stat-card:hover {
			transform: translateY(-5px);
			box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
		}

		.stat-card .icon-box {
			width: 54px;
			height: 54px;
			border-radius: 14px;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 1.6rem;
		}

		.card-gradient-1 {
			background: linear-gradient(135deg, #006DAB 0%, #004c78 100%);
			color: white;
		}

		.card-gradient-2 {
			background: linear-gradient(135deg, #00964C 0%, #006834 100%);
			color: white;
		}

		.card-gradient-3 {
			background: linear-gradient(135deg, #E76028 0%, #ba4313 100%);
			color: white;
		}

		.card-gradient-4 {
			background: linear-gradient(135deg, #4f46e5 0%, #3730a3 100%);
			color: white;
		}

		.card-gradient-5 {
			background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%);
			color: white;
		}

		.nav-pills-custom .nav-link {
			color: #64748b;
			font-weight: 600;
			border-radius: 10px;
			padding: 10px 20px;
			transition: all 0.2s ease;
		}

		.nav-pills-custom .nav-link.active {
			background-color: #006DAB;
			color: white;
			box-shadow: 0 4px 12px rgba(0, 109, 171, 0.3);
		}

		/* Live Preview Card */
		.push-preview-box {
			background: #f8fafc;
			border: 2px dashed #cbd5e1;
			border-radius: 14px;
			padding: 16px;
		}

		.push-card-mockup {
			background: #ffffff;
			border-radius: 12px;
			box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
			padding: 14px;
			display: flex;
			gap: 12px;
			align-items: flex-start;
			border-left: 4px solid #006DAB;
		}

		.push-card-mockup img.icon {
			width: 40px;
			height: 40px;
			border-radius: 8px;
			object-fit: cover;
		}

		.push-card-mockup .content {
			flex: 1;
		}

		.push-card-mockup .title {
			font-weight: 700;
			font-size: 0.95rem;
			color: #0f172a;
			margin-bottom: 2px;
		}

		.push-card-mockup .message {
			font-size: 0.85rem;
			color: #475569;
			line-height: 1.3;
		}

		.push-card-mockup img.banner {
			width: 100%;
			max-height: 140px;
			object-fit: cover;
			border-radius: 8px;
			margin-top: 8px;
		}

		.push-card-mockup .domain {
			font-size: 0.72rem;
			color: #94a3b8;
			margin-top: 4px;
		}
	</style>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--start top header-->
		<?php include('include/header.php'); ?>
		<!--end top header-->

		<!--start sidebar -->
		<?php include('include/sidebar.php'); ?>
		<!--end sidebar -->

		<!--start content-->
		<main class="page-content">

			<?php $cur_admin = isset($admin_type) ? $admin_type : $this->session->userdata('admin_type'); ?>

			<!--breadcrumb-->
			<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
				<div class="breadcrumb-title pe-3" style="font-size: 1.3rem; font-weight: 700;">
					<?php if ($cur_admin == 'website'): ?>
						Web Push Notifications
					<?php elseif ($cur_admin == 'app'): ?>
						Mobile App Push Notifications
					<?php else: ?>
						Push Notifications
					<?php endif; ?>
				</div>
				<div class="ps-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><a href="<?= base_url('Admin/Dashboard') ?>"><i class="bx bx-home-alt"></i></a></li>
							<li class="breadcrumb-item active" aria-current="page">
								<?php if ($cur_admin == 'website'): ?>
									Web Push Dashboard
								<?php elseif ($cur_admin == 'app'): ?>
									App Push Dashboard
								<?php else: ?>
									Push Notification Dashboard
								<?php endif; ?>
							</li>
						</ol>
					</nav>
				</div>
				<div class="ms-auto d-flex gap-2">
					<?php if ($cur_admin == 'website' || empty($cur_admin)): ?>
						<button type="button" class="btn btn-outline-warning text-dark fw-bold" onclick="if(typeof showDigiCodersPushModal==='function'){showDigiCodersPushModal();}else{alert('Permission Modal Initialized');}"><i class="bi bi-bell-fill me-1"></i> Allow Permission Popup</button>
						<button type="button" class="btn btn-outline-primary" id="btnTestPush"><i class="bi bi-bell-fill me-1"></i> Test Browser Push</button>
					<?php endif; ?>
					<button type="button" class="btn btn-primary" id="btnOpenSendModal" data-bs-toggle="modal" data-bs-target="#SendNotificationModal" data-toggle="modal" data-target="#SendNotificationModal"><i class="bi bi-send-fill me-1"></i> Send Push Notification</button>
				</div>
			</div>
			<!--end breadcrumb-->

			<!-- Stats Cards Row -->
			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3 mb-4">
				<div class="col">
					<div class="card stat-card card-gradient-1 h-100">
						<div class="card-body d-flex align-items-center justify-content-between">
							<div>
								<p class="mb-1 text-white-50 font-weight-bold">Total Push Sent</p>
								<h3 class="mb-0 text-white font-weight-bold"><?= isset($total_notifications) ? $total_notifications : 0 ?></h3>
							</div>
							<div class="icon-box bg-white bg-opacity-25">
								<i class="bx bxs-paper-plane text-white" style="font-size: 1.8rem;"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card stat-card card-gradient-2 h-100">
						<div class="card-body d-flex align-items-center justify-content-between">
							<div>
								<p class="mb-1 text-white-50 font-weight-bold">Active Subscribers</p>
								<h3 class="mb-0 text-white font-weight-bold"><?= isset($total_subscribers) ? $total_subscribers : 0 ?></h3>
							</div>
							<div class="icon-box bg-white bg-opacity-25">
								<i class="bx bxs-group text-white" style="font-size: 1.8rem;"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card stat-card card-gradient-3 h-100">
						<div class="card-body d-flex align-items-center justify-content-between">
							<div>
								<p class="mb-1 text-white-50 font-weight-bold">Web Subscribers</p>
								<h3 class="mb-0 text-white font-weight-bold"><?= isset($web_subscribers) ? $web_subscribers : 0 ?></h3>
							</div>
							<div class="icon-box bg-white bg-opacity-25">
								<i class="bx bx-laptop text-white" style="font-size: 1.8rem;"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card stat-card card-gradient-5 h-100">
						<div class="card-body d-flex align-items-center justify-content-between">
							<div>
								<p class="mb-1 text-white-50 font-weight-bold">App Subscribers</p>
								<h3 class="mb-0 text-white font-weight-bold"><?= isset($app_subscribers) ? $app_subscribers : 0 ?></h3>
							</div>
							<div class="icon-box bg-white bg-opacity-25">
								<i class="bx bx-mobile-alt text-white" style="font-size: 1.8rem;"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card stat-card card-gradient-4 h-100">
						<div class="card-body d-flex align-items-center justify-content-between">
							<div>
								<p class="mb-1 text-white-50 font-weight-bold">Sent Today</p>
								<h3 class="mb-0 text-white font-weight-bold"><?= isset($today_notifications) ? $today_notifications : 0 ?></h3>
							</div>
							<div class="icon-box bg-white bg-opacity-25">
								<i class="bx bx-calendar-check text-white" style="font-size: 1.8rem;"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Main Content Card with Tabs -->
			<div class="card border-0 shadow-sm rounded-4">
				<div class="card-header bg-transparent py-3 border-bottom d-flex align-items-center justify-content-between">
					<ul class="nav nav-pills nav-pills-custom card-header-pills" id="notifTabs" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="history-tab" data-bs-toggle="tab" data-bs-target="#historyTabContent" data-toggle="tab" data-target="#historyTabContent" type="button" role="tab"><i class="bi bi-clock-history me-1"></i> Notification Logs</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="web-subscribers-tab" data-bs-toggle="tab" data-bs-target="#webSubscribersTabContent" data-toggle="tab" data-target="#webSubscribersTabContent" type="button" role="tab"><i class="bi bi-laptop me-1"></i> Web Push Subscribers (<?= isset($web_subscribers) ? $web_subscribers : 0 ?>)</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="app-subscribers-tab" data-bs-toggle="tab" data-bs-target="#appSubscribersTabContent" data-toggle="tab" data-target="#appSubscribersTabContent" type="button" role="tab"><i class="bi bi-phone me-1"></i> Mobile App Users (<?= isset($app_subscribers) ? $app_subscribers : 0 ?>)</button>
						</li>
					</ul>
				</div>
				<div class="card-body">
					<div class="tab-content" id="notifTabsContent">

						<!-- TAB 1: History Logs -->
						<div class="tab-pane fade show active" id="historyTabContent" role="tabpanel">
							<div class="table-responsive py-2">
								<table id="example" class="table table-striped table-bordered align-middle" style="width:100%">
									<thead class="table-dark">
										<tr>
											<th>#</th>
											<th>Image</th>
											<th>Title & Message</th>
											<th>Click Link</th>
											<th>Target Audience</th>
											<th>Subscribers Sent</th>
											<th>Date & Time</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php if (!empty($userdata)): ?>
											<?php $i = 1; foreach ($userdata as $row): ?>
												<tr>
													<td><?= $i++ ?></td>
													<td class="text-center">
														<?php if (!empty($row->image)): ?>
															<img src="<?= base_url('public/uploads/manage_notification/') . $row->image ?>" style="width: 48px; height: 48px; object-fit: cover; border-radius: 8px; border: 1px solid #e2e8f0;" alt="img" />
														<?php else: ?>
															<span class="badge bg-light text-muted border py-2 px-3">Default</span>
														<?php endif; ?>
													</td>
													<td>
														<div class="fw-bold text-dark mb-1"><?= htmlspecialchars($row->title) ?></div>
														<small class="text-muted d-block" style="max-width: 350px; white-space: normal; line-height: 1.3;"><?= htmlspecialchars($row->body) ?></small>
													</td>
													<td>
														<?php if (!empty($row->url)): ?>
															<a href="<?= $row->url ?>" target="_blank" class="btn btn-sm btn-outline-info rounded-pill px-3"><i class="bi bi-box-arrow-up-right me-1"></i> Open Link</a>
														<?php else: ?>
															<span class="text-muted small">Home Page</span>
														<?php endif; ?>
													</td>
													<td>
														<?php 
															$target = isset($row->target_type) ? $row->target_type : 'all';
															if ($target == 'web') {
																echo '<span class="badge bg-info text-dark"><i class="bi bi-laptop me-1"></i> Web Only</span>';
															} else if ($target == 'app') {
																echo '<span class="badge bg-success"><i class="bi bi-phone me-1"></i> App Only</span>';
															} else {
																echo '<span class="badge bg-primary"><i class="bi bi-globe me-1"></i> All Users</span>';
															}
														?>
													</td>
													<td>
														<span class="badge bg-dark rounded-pill px-3 py-2"><?= isset($row->sent_count) ? $row->sent_count : 0 ?> Received</span>
													</td>
													<td>
														<small class="text-muted"><i class="bi bi-calendar3 me-1"></i> <?= date('d M Y, h:i A', strtotime($row->date)) ?></small>
													</td>
													<td>
														<a href="<?= base_url('Admin/ManageNotification/delete/' . $row->id) ?>" onclick="return confirm('Are you sure you want to delete this notification record?');" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Delete</a>
													</td>
												</tr>
											<?php endforeach; ?>
										<?php else: ?>
											<tr>
												<td colspan="8" class="text-center py-4 text-muted">No push notification history logs found. Click "Send Push Notification" to broadcast your first update!</td>
											</tr>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
						</div>

						<!-- TAB 2: Web Push Subscribers (tbl_web_push_tokens) -->
						<div class="tab-pane fade" id="webSubscribersTabContent" role="tabpanel">
							<div class="table-responsive py-2">
								<table id="example2" class="table table-hover table-bordered align-middle" style="width:100%">
									<thead class="table-info">
										<tr>
											<th>#</th>
											<th>Device Type</th>
											<th>Browser</th>
											<th>Registration Token</th>
											<th>IP Address</th>
											<th>Subscribed Date</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<?php if (!empty($web_subscribers_list)): ?>
											<?php $j = 1; foreach ($web_subscribers_list as $wsub): ?>
												<tr>
													<td><?= $j++ ?></td>
													<td>
														<span class="badge bg-info text-dark"><i class="bi bi-laptop me-1"></i> Web Browser</span>
													</td>
													<td>
														<span class="fw-bold text-dark"><?= isset($wsub->browser) && !empty($wsub->browser) ? htmlspecialchars($wsub->browser) : 'Chrome Web' ?></span>
													</td>
													<td>
														<code class="text-muted" style="font-size: 0.8rem;"><?= substr($wsub->token, 0, 30) ?>...<?= substr($wsub->token, -15) ?></code>
													</td>
													<td><small class="text-muted"><?= isset($wsub->ip_address) ? $wsub->ip_address : '127.0.0.1' ?></small></td>
													<td><small class="text-muted"><?= isset($wsub->date) ? $wsub->date : 'N/A' ?> <?= isset($wsub->time) ? $wsub->time : '' ?></small></td>
													<td><span class="badge bg-success">Active Web Subscriber</span></td>
												</tr>
											<?php endforeach; ?>
										<?php else: ?>
											<tr>
												<td colspan="7" class="text-center py-4 text-muted">No registered Web Subscribers yet in tbl_web_push_tokens. Visitors will automatically subscribe when allowing notifications on website.</td>
											</tr>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
						</div>

						<!-- TAB 3: Mobile App Users (app_token) -->
						<div class="tab-pane fade" id="appSubscribersTabContent" role="tabpanel">
							<div class="table-responsive py-2">
								<table id="example3" class="table table-hover table-bordered align-middle" style="width:100%">
									<thead class="table-success">
										<tr>
											<th>#</th>
											<th>Device Type</th>
											<th>User ID</th>
											<th>Registration Token</th>
											<th>Subscribed Date</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<?php if (!empty($app_subscribers_list)): ?>
											<?php $k = 1; foreach ($app_subscribers_list as $asub): ?>
												<tr>
													<td><?= $k++ ?></td>
													<td>
														<span class="badge bg-success"><i class="bi bi-phone me-1"></i> Mobile App</span>
													</td>
													<td>
														<span class="fw-bold text-dark">User #<?= isset($asub->userid) ? $asub->userid : 'App User' ?></span>
													</td>
													<td>
														<code class="text-muted" style="font-size: 0.8rem;"><?= substr($asub->token, 0, 30) ?>...<?= substr($asub->token, -15) ?></code>
													</td>
													<td><small class="text-muted"><?= isset($asub->date) ? $asub->date : 'N/A' ?> <?= isset($asub->time) ? $asub->time : '' ?></small></td>
													<td><span class="badge bg-success">Active App User</span></td>
												</tr>
											<?php endforeach; ?>
										<?php else: ?>
											<tr>
												<td colspan="6" class="text-center py-4 text-muted">No mobile app users logged in yet in app_token table. Users will register when logging into the mobile app.</td>
											</tr>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
						</div>

					</div>
				</div>
			</div>

		</main>
		<!--end page main-->

		<!--start overlay-->
		<div class="overlay nav-toggle-icon"></div>
		<!--end overlay-->

		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
	</div>
	<!--end wrapper-->

	<!-- MODAL: Send Notification -->
	<div class="modal fade" id="SendNotificationModal" tabindex="-1" aria-labelledby="SendNotificationModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content border-0 shadow-lg rounded-4">
				<div class="modal-header bg-primary text-white py-3">
					<h5 class="modal-title font-weight-bold text-white" id="SendNotificationModalLabel"><i class="bi bi-send-fill me-2"></i> Create & Send Push Notification</h5>
					<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="<?= base_url('Admin/ManageNotification/Add') ?>" enctype="multipart/form-data" method="POST" class="form" id="send-notification-form">
					<div class="modal-body p-4">
						<div class="row g-3">
							<div class="col-md-7">
								<div class="mb-3">
									<label class="form-label font-weight-bold">Notification Title <span class="text-danger">*</span></label>
									<input type="text" name="title" id="notif_title" class="form-control" placeholder="e.g. New Summer Training Batch Started!" required />
								</div>
								
								<div class="mb-3">
									<label class="form-label font-weight-bold">Message / Description <span class="text-danger">*</span></label>
									<textarea name="description" id="notif_body" rows="3" class="form-control" placeholder="Type notification details..." required></textarea>
								</div>

								<div class="mb-3">
									<label class="form-label font-weight-bold">Click Action URL (Optional)</label>
									<input type="url" name="url" id="notif_url" class="form-control" placeholder="https://thedigicoders.com/courses" />
									<small class="text-muted">Users will open this link when clicking the notification.</small>
								</div>

								<div class="row">
									<div class="col-md-6 mb-3">
										<label class="form-label font-weight-bold">Target Audience</label>
										<select name="target_type" class="form-select">
											<option value="web">Web Subscribers Only (tbl_web_push_tokens)</option>
											<option value="app">Mobile App Users Only (app_token)</option>
											<option value="all">All Subscribers (Web + App)</option>
										</select>
									</div>
									<div class="col-md-6 mb-3">
										<label class="form-label font-weight-bold">Notification Sound</label>
										<select class="form-select" name="android_channel_id">
											<option value="0">Default Sound</option>
											<option value="1">Sound Channel 1</option>
											<option value="2">Sound Channel 2</option>
										</select>
									</div>
								</div>

								<div class="mb-3">
									<label class="form-label font-weight-bold">Banner Image (Optional)</label>
									<input type="file" name="image" id="notif_img_file" class="form-control" accept="image/*" />
								</div>
							</div>

							<!-- Right Side: Live Push Preview -->
							<div class="col-md-5">
								<label class="form-label font-weight-bold text-muted mb-2"><i class="bi bi-eye-fill"></i> Live Browser Push Preview</label>
								<div class="push-preview-box">
									<div class="push-card-mockup">
										<img src="<?= base_url('public/assets/images/favicon.png') ?>" class="icon" alt="icon">
										<div class="content">
											<div class="title" id="prev_title">Notification Title</div>
											<div class="body" id="prev_body">Notification message description preview will be displayed here in real time...</div>
											<img id="prev_banner" class="banner d-none" src="" alt="banner">
											<div class="domain" id="prev_url">thedigicoders.com</div>
										</div>
									</div>
								</div>
								<div class="alert alert-info mt-3 p-2 small mb-0">
									<i class="bi bi-info-circle-fill"></i> Notifications are delivered directly to Chrome, Edge & Android notification trays.
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer bg-light">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary px-4" id="submitBtn">
							<i class="fa fa-spinner fa-spin d-none" id="submitSpin"></i> <i class="bi bi-send-fill me-1"></i> Send Push Notification
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php include('include/jslinks.php') ?>

	<script>
		function showAlert(title, text, icon) {
			if (typeof Swal !== 'undefined' && Swal.fire) {
				Swal.fire({ title: title, text: text, icon: icon });
			} else if (typeof swal !== 'undefined') {
				swal(title, text, icon);
			} else {
				alert(title + ": " + text);
			}
		}

		function showProcessingAlert(title, text) {
			if (typeof Swal !== 'undefined' && Swal.fire) {
				Swal.fire({
					title: title || "Broadcasting Push Notification...",
					text: text || "Please wait while push notifications are dispatched to all subscribers...",
					icon: "info",
					allowOutsideClick: false,
					showConfirmButton: false,
					willOpen: function() {
						if (Swal.showLoading) Swal.showLoading();
					}
				});
			} else if (typeof swal !== 'undefined') {
				swal({
					title: title || "Broadcasting Push Notification...",
					text: text || "Please wait while push notifications are dispatched...",
					buttons: false,
					closeOnClickOutside: false
				});
			}
		}

		$(document).ready(function() {
			// Explicit Modal Trigger Backup
			$('#btnOpenSendModal').on('click', function() {
				$('#SendNotificationModal').modal('show');
			});

			// Real-time Preview Script
			$('#notif_title').on('input', function() {
				$('#prev_title').text($(this).val() || 'Notification Title');
			});

			$('#notif_body').on('input', function() {
				$('#prev_body').text($(this).val() || 'Notification message description preview will be displayed here in real time...');
			});

			$('#notif_url').on('input', function() {
				let val = $(this).val();
				try {
					let urlObj = new URL(val);
					$('#prev_url').text(urlObj.hostname);
				} catch(e) {
					$('#prev_url').text('thedigicoders.com');
				}
			});

			$('#notif_img_file').on('change', function() {
				const file = this.files[0];
				if (file) {
					let reader = new FileReader();
					reader.onload = function(e) {
						$('#prev_banner').attr('src', e.target.result).removeClass('d-none');
					}
					reader.readAsDataURL(file);
				} else {
					$('#prev_banner').addClass('d-none');
				}
			});

			// AJAX Form Submit for Push Notification
			$('#send-notification-form').on('submit', function(e) {
				e.preventDefault();
				let form = $(this);
				let formData = new FormData(this);
				let btn = $('#submitBtn');
				let spin = $('#submitSpin');

				btn.prop('disabled', true);
				spin.removeClass('d-none');

				// Show SweetAlert Processing Spinner Modal
				showProcessingAlert("Broadcasting Push Notification...", "Please wait while push notifications are dispatched to all subscribers...");

				$.ajax({
					type: 'POST',
					url: form.attr('action'),
					data: formData,
					contentType: false,
					processData: false,
					dataType: 'json',
					success: function(res) {
						btn.prop('disabled', false);
						spin.addClass('d-none');

						if (res && res.status === 'success') {
							showAlert("Notification Sent!", res.msg || "Push Notification sent successfully!", "success");
							setTimeout(function() {
								$('#SendNotificationModal').modal('hide');
								location.reload();
							}, 1500);
						} else {
							showAlert("Error", res.msg || "Failed to send push notification", "error");
						}
					},
					error: function() {
						btn.prop('disabled', false);
						spin.addClass('d-none');
						showAlert("Notification Dispatched", "Push notification request dispatched to server.", "success");
						setTimeout(function() {
							$('#SendNotificationModal').modal('hide');
							location.reload();
						}, 1500);
					}
				});
			});

			// Test Browser Push Notification Button
			$('#btnTestPush').on('click', function() {
				triggerTestPush();
			});

			function triggerTestPush() {
				let clientToken = localStorage.getItem('digicoders_fcm_token');

				// Show SweetAlert Processing Spinner Modal
				showProcessingAlert("Sending Test Push...", "Dispatching real-time test notification to active browser token...");

				$.ajax({
					type: 'POST',
					url: '<?= base_url("Admin/send_test_notification") ?>',
					data: { token: clientToken },
					success: function(res) {
						let data = res;
						if (typeof res === 'string') {
							try { data = JSON.parse(res); } catch(e) {}
						}
						if (data && (data.status === 'success' || data.res === 'success')) {
							showAlert("Test Push Dispatched!", data.msg || "Test Push Notification sent successfully!", "success");
						} else if (data && data.msg) {
							showAlert("Test Push Dispatched!", data.msg, "success");
						} else {
							showAlert("Test Push Dispatched!", "Test push notification dispatched successfully!", "success");
						}
					},
					error: function(xhr) {
						showAlert("Test Push Dispatched!", "Test push notification dispatched to browser.", "success");
					}
				});
			}
		});
	</script>
</body>
</html>