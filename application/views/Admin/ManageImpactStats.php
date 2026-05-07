<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Manage Impact Stats - <?= $this->data['app_name'] ?></title>
		<?php include('include/headerlinks.php'); ?>
	</head>

	<body>
		<div class="wrapper">
			<?php include('include/header.php'); ?>
			<?php include('include/sidebar.php'); ?>

			<main class="page-content">
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Impact Stats</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?= base_url('Admin/Dashboard') ?>"><i class="bx bx-home-alt"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">Manage Impact Stats</li>
							</ol>
						</nav>
					</div>
				</div>

				<div class="card">
					<div class="card-header py-3">
						<div class="row align-items-center m-0">
							<div class="col-sm-6">
								<h6>Manage Impact Stats</h6>
							</div>
							<div class="col-sm-6 text-end">
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#impactModal">
									<i class="bx bx-plus"></i> Add New Stat
								</button>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>S.No.</th>
										<th>Action</th>
										<th>Status</th>
										<th>Icon</th>
										<th>Count</th>
										<th>Label</th>
										<th>Color</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; foreach($userdata as $data): ?>
									<tr>
										<td><?= $i++; ?></td>
										<td>
											<div class="btn-group">
												<button type="button" onclick="deleteItem(<?= $data->id ?>,'tbl_impact_stats','','<?= base_url('Admin/deleteData') ?>')" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
												<button onclick="EditStat(<?= htmlspecialchars(json_encode($data)) ?>)" type="button" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button>
											</div>
										</td>
										<td>
											<div class="form-check form-switch">
												<input class="form-check-input" type="checkbox" onchange="ChnageStatus(<?= $data->id ?>,<?= $data->status ?>,'tbl_impact_stats','<?= base_url('Admin/ChangeStatus') ?>')" <?= ($data->status == 'true') ? 'checked' : '' ?>>
											</div>
										</td>
										<td><i class="<?= $data->icon; ?> fa-2x"></i></td>
										<td><?= $data->count; ?></td>
										<td><?= $data->label; ?></td>
										<td><span class="badge" style="background-color: <?= $data->color; ?>; color: #fff;"><?= $data->color; ?></span></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</main>

			<div class="overlay nav-toggle-icon"></div>
			<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		</div>

		<?php include('include/jslinks.php'); ?>

		<!-- Modal -->
		<div class="modal fade" id="impactModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header bg-primary text-white">
						<h5 class="modal-title" id="modalTitle">Add Impact Stat</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="<?= base_url('Admin/ManageImpactStats/Add') ?>" method="POST" id="impact-form">
						<div class="modal-body">
							<input type="hidden" name="id" id="stat_id">
							<div class="form-group mb-3">
								<label class="form-label">Icon Class (FontAwesome)</label>
								<input type="text" class="form-control" name="icon" id="stat_icon" placeholder="e.g. fa-solid fa-rocket" required />
							</div>
							<div class="form-group mb-3">
								<label class="form-label">Count (Number)</label>
								<input type="number" class="form-control" name="count" id="stat_count" placeholder="e.g. 50" required />
							</div>
							<div class="form-group mb-3">
								<label class="form-label">Label</label>
								<input type="text" class="form-control" name="label" id="stat_label" placeholder="e.g. Expert Mentors" required />
							</div>
							<div class="form-group mb-3">
								<label class="form-label">Glow Color (Hex or CSS Variable)</label>
								<input type="text" class="form-control" name="color" id="stat_color" placeholder="e.g. #2ecc71 or var(--blue)" required />
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" id="impactSubmitBtn" class="btn btn-primary">Save Changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script>
			function EditStat(data) {
				$('#stat_id').val(data.id);
				$('#stat_icon').val(data.icon);
				$('#stat_count').val(data.count);
				$('#stat_label').val(data.label);
				$('#stat_color').val(data.color);
				$('#modalTitle').text('Edit Impact Stat');
				$('#impact-form').attr('action', '<?= base_url('Admin/ManageImpactStats/Update') ?>');
				$('#impactModal').modal('show');
			}

			// Reset modal on hide
			$('#impactModal').on('hidden.bs.modal', function () {
				$('#stat_id').val('');
				$('#impact-form')[0].reset();
				$('#modalTitle').text('Add Impact Stat');
				$('#impact-form').attr('action', '<?= base_url('Admin/ManageImpactStats/Add') ?>');
			});

			// AJAX Form Submission
			$('#impact-form').on('submit', function (e) {
				e.preventDefault();
				var formData = new FormData(this);
				$.ajax({
					url: $(this).attr('action'),
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false,
					beforeSend: function() {
						$('#impactSubmitBtn').attr('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Saving...');
					},
					success: function (response) {
						var res = JSON.parse(response);
						if (res.status == 'success') {
							iziToast.success({
								title: 'Success',
								message: res.msg,
								position: 'topRight'
							});
							$('#impactModal').modal('hide');
							setTimeout(function () {
								location.reload();
							}, 1000);
						} else {
							iziToast.error({
								title: 'Error',
								message: res.msg,
								position: 'topRight'
							});
							$('#impactSubmitBtn').attr('disabled', false).text('Save Changes');
						}
					},
					error: function() {
						iziToast.error({
							title: 'Error',
							message: 'Something went wrong',
							position: 'topRight'
						});
						$('#impactSubmitBtn').attr('disabled', false).text('Save Changes');
					}
				});
			});
		</script>
	</body>
</html>
