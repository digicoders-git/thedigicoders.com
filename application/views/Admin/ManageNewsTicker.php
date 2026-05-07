<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Manage News Ticker - <?= $this->data['app_name'] ?></title>
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
					<div class="breadcrumb-title pe-3">News Ticker List</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?= base_url('Admin/Dashboard') ?>"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Manage News Ticker</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				
				<div class="card">
					<div class="card-header py-3">
						<div class="row align-items-center m-0">
							<div class="col-sm-6">
								<h6>Manage News Ticker</h6>
							</div>
							<div class="col-sm-6">
								<div class="d-grid gap-2 d-md-flex justify-content-md-end">
									<button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#tickerModal"><i class="fa fa-plus"></i>&ensp;Add Ticker Item</button>
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
										<th>Status</th>
										<th>Icon</th>
										<th>Content</th>
										<th>Date/Time</th>
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
												<div class="btn-group">
													<button type="button" onclick="deleteItem(<?= $data->id ?>,'tbl_news_ticker','','<?= base_url('Admin/deleteData') ?>')" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
													<button onclick="EditTicker(<?= htmlspecialchars(json_encode($data)) ?>)" type="button" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button>
												</div>
											</td>
											<td>
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" onchange="ChnageStatus(<?= $data->id ?>,<?= $data->status ?>,'tbl_news_ticker','<?= base_url('Admin/ChangeStatus') ?>')" <?php if ($data->status == 'true') { echo "checked"; } ?>>
												</div>
											</td>
											<td><i class="<?= $data->icon; ?>"></i> (<?= $data->icon; ?>)</td>
											<td><?= $data->content; ?></td>
											<td><?= $data->date; ?> <?= $data->time; ?></td>
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
			
			<div class="overlay nav-toggle-icon"></div>
			<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		</div>
		<!--end wrapper-->
		
		<?php include('include/jslinks.php') ?>
		
		<!-- Add/Edit Modal -->
		<div class="modal fade" id="tickerModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary text-white">
						<h5 class="modal-title" id="modalTitle">Add News Ticker Item</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="<?= base_url('Admin/ManageNewsTicker/Add') ?>" method="POST" id="ticker-form">
						<div class="modal-body">
							<input type="hidden" name="id" id="ticker_id">
							<div class="form-group mb-3">
								<label class="form-label">Icon Class (FontAwesome)</label>
								<input type="text" class="form-control" name="icon" id="ticker_icon" placeholder="e.g. fa-solid fa-graduation-cap" required />
								<small class="text-muted">Use FontAwesome 6 classes</small>
							</div>
							<div class="form-group mb-3">
								<label class="form-label">Ticker Content</label>
								<textarea class="form-control" name="content" id="ticker_content" rows="4" placeholder="Enter news content" required></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" id="tickerSubmitBtn" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script>
			function EditTicker(data) {
				$('#ticker_id').val(data.id);
				$('#ticker_icon').val(data.icon);
				$('#ticker_content').val(data.content);
				$('#modalTitle').text('Edit News Ticker Item');
				$('#ticker-form').attr('action', '<?= base_url('Admin/ManageNewsTicker/Update') ?>');
				$('#tickerModal').modal('show');
			}

			// Reset modal on hide
			$('#tickerModal').on('hidden.bs.modal', function () {
				$('#ticker_id').val('');
				$('#ticker-form')[0].reset();
				$('#modalTitle').text('Add News Ticker Item');
				$('#ticker-form').attr('action', '<?= base_url('Admin/ManageNewsTicker/Add') ?>');
			});

			// AJAX Form Submission
			$('#ticker-form').on('submit', function (e) {
				e.preventDefault();
				var formData = new FormData(this);
				$.ajax({
					url: $(this).attr('action'),
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false,
					beforeSend: function() {
						$('#tickerSubmitBtn').attr('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Saving...');
					},
					success: function (response) {
						var res = JSON.parse(response);
						if (res.status == 'success') {
							iziToast.success({
								title: 'Success',
								message: res.msg,
								position: 'topRight'
							});
							$('#tickerModal').modal('hide');
							setTimeout(function () {
								location.reload();
							}, 1000);
						} else {
							iziToast.error({
								title: 'Error',
								message: res.msg,
								position: 'topRight'
							});
							$('#tickerSubmitBtn').attr('disabled', false).text('Save changes');
						}
					},
					error: function() {
						iziToast.error({
							title: 'Error',
							message: 'Something went wrong',
							position: 'topRight'
						});
						$('#tickerSubmitBtn').attr('disabled', false).text('Save changes');
					}
				});
			});
		</script>
	</body>
</html>
