<!------Common Modal------>
<div class="modal fade" id="edit-modal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-primary text-white">
				<h5 class="modal-title" id="modal-head"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body" id="modal-body">
				<br>
				<div class='text-center'><i class='fas fa-circle-notch fa-spin fa-2x'></i></div><br>
			</div>
		</div>
	</div>
</div>


<!------Edit Webinar Modal------>
<div class="modal fade" id="edit-webinarmodal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog  modal-xl">
		<div class="modal-content">
			<div class="modal-header bg-primary text-white">
				<h5 class="modal-title" id="modal-webinarhead"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body" id="modal-webinarbody">
				<br>
				<div class='text-center'><i class='fa fa-spinner fa-spin fa-2x'></i></div><br>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap bundle JS -->
<script src="<?= base_url('public') ?>/app-assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="<?= base_url('public') ?>/app-assets/js/jquery.min.js"></script>
<script src="<?= base_url('public') ?>/app-assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?= base_url('public') ?>/app-assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?= base_url('public') ?>/app-assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="<?= base_url('public') ?>/app-assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?= base_url('public') ?>/app-assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?= base_url('public') ?>/app-assets/js/pace.min.js"></script>
<script src="<?= base_url('public') ?>/app-assets/plugins/chartjs/js/Chart.min.js"></script>
<script src="<?= base_url('public') ?>/app-assets/plugins/chartjs/js/Chart.extension.js"></script>
<script src="<?= base_url('public') ?>/app-assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<!--app-->
<script src="<?= base_url('public') ?>/app-assets/js/app.js"></script>
<script src="<?= base_url('public') ?>/app-assets/js/index.js"></script>
<script src="<?= base_url('public') ?>/app-assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('public') ?>/app-assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url('public') ?>/app-assets/js/table-datatable.js"></script>
<script src="<?= base_url('public') ?>/app-assets/js/form.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
	integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.js"
	integrity="sha512-Fq/wHuMI7AraoOK+juE5oYILKvSPe6GC5ZWZnvpOO/ZPdtyA29n+a5kVLP4XaLyDy9D1IBPYzdFycO33Ijd0Pg=="
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
	integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
	integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"
	integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ=="
	crossorigin="anonymous"></script>

<script>
	if (document.querySelector(".best-product")) {
		new PerfectScrollbar(".best-product");
	}

	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl)
	})
</script>
<script>

	function uploadSummernoteImage(file, editor) {
		var data = new FormData();
		data.append("image", file);
		$.ajax({
			url: "<?= base_url('Admin/UploadSummernoteImage') ?>",
			cache: false,
			contentType: false,
			processData: false,
			data: data,
			type: "POST",
			success: function(url) {
				$(editor).summernote('insertImage', url);
			},
			error: function(data) {
				console.log(data);
			}
		});
	}

	//Edit Data
	function EditData(table, id, head) {
		var data = "<br><div class='text-center'><i class='fa fa-spinner fa-spin fa-2x'></i></div><br>";
		$("#modal-head").html(head);
		$("#modal-body").html(data);
		$("#edit-modal").modal("show");

		$.ajax({
			url: "<?= base_url('Admin/EditData/') ?>" + table + '/' + id,
			success: function (res) {
				$("#modal-body").html(res);
				$('.summernote').summernote({
					height: 200,
					callbacks: {
						onImageUpload: function(files) {
							for (let i = 0; i < files.length; i++) {
								uploadSummernoteImage(files[i], this);
							}
						}
					},
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
			}
		})
	}

	//Edit Webinar
	function Editwebinar(table, id, head) {
		var data = "<br><div class='text-center'><i class='fa fa-spinner fa-spin fa-2x'></i></div><br>";
		$("#modal-webinarhead").html(head);
		$("#modal-webimarbody").html(data);
		$("#edit-webinarmodal").modal("show");

		$.ajax({
			url: "<?= base_url('Admin/EditData/') ?>" + table + '/' + id,
			success: function (res) {

				$("#modal-webinarbody").html(res);
			}
		})
	}



	//Change Status
	function AcceptReg(tablename, id, accept_status, url) {
		var url = url;
		var data = { id: id, accept_status: accept_status, tablename: tablename };
		Swal.fire({
			title: 'Are you sure?',
			text: "You Want to change this status!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Change it!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: "POST",
					url: url,
					data: data,
					success: function (response) {
						var jsonres = JSON.parse(response);
						if (jsonres.status == 'success') {
							Swal.fire(
								jsonres.title,
								jsonres.msg,
								'success'
							)
							setTimeout(function () {
								window.location.reload();
							})
						}
					},
					error: function (response) {
						Swal.fire(
							jsonres.title,
							jsonres.msg,
							'error'
						)
					}
				})


			}
		})


	}

	//Change Status
	function ChangeStatus(id, status, tablename, url) {
		Swal.fire({
			title: 'Are you sure?',
			text: "You Want to change this status!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Change it!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: url,
					type: "POST",
					data: {
						id: id,
						status: status,
						tablename: tablename
					},
					success: function (response) {
						var data = JSON.parse(response);
						if (data.status == 'success') {
							iziToast.success({
								title: 'Success',
								message: data.msg,
								position: 'topRight'
							});
							setTimeout(function () {
								location.reload();
							}, 1000);
						} else {
							iziToast.error({
								title: 'Error',
								message: data.msg,
								position: 'topRight'
							});
						}
					}
				});
			} else {
				window.location.reload();
			}
		})
	}
</script>

<?php
if (!empty($this->session->flashdata('status'))) {

	if ($this->session->flashdata('msg') == 'Client Update Successfull') {
		?>
		<script>
			iziToast.success({
				title: 'success',
				message: 'Client Update Successfull',
				position: 'topRight'
			});
		</script>
		<?php
	}
	if ($this->session->flashdata('msg') == 'Expert Successfully Updated') {
		?>
		<script>
			iziToast.success({
				title: 'success',
				message: 'Expert Successfully Updated',
				position: 'topRight'
			});
		</script>
		<?php
	}
	if ($this->session->flashdata('msg') == 'Event Successfully Updated') {
		?>
		<script>
			iziToast.success({
				title: 'success',
				message: 'Event Successfully Updated',
				position: 'topRight'
			});
		</script>
		<?php
	}
	if ($this->session->flashdata('msg') == 'MOU Successfully Updated') {
		?>
		<script>
			iziToast.success({
				title: 'success',
				message: 'MOU Successfully Updated',
				position: 'topRight'
			});
		</script>
		<?php
	}
	if ($this->session->flashdata('msg') == 'Achievemens Successfully Updated') {
		?>
		<script>
			iziToast.success({
				title: 'success',
				message: 'Achievemens Successfully Updated',
				position: 'topRight'
			});
		</script>
		<?php
	}
	if ($this->session->flashdata('msg') == 'Placement Partner Successfully Updated') {
		?>
		<script>
			iziToast.success({
				title: 'success',
				message: 'Placement Partner Successfully Updated',
				position: 'topRight'
			});
		</script>
		<?php
	}
	if ($this->session->flashdata('msg') == 'Appreciation Successfully Updated') {
		?>
		<script>
			iziToast.success({
				title: 'success',
				message: 'Appreciation Successfully Updated',
				position: 'topRight'
			});
		</script>
		<?php
	}
	if ($this->session->flashdata('msg') == 'Advisory Successfully Updated') {
		?>
		<script>
			iziToast.success({
				title: 'success',
				message: 'Advisory Successfully Updated',
				position: 'topRight'
			});
		</script>
		<?php
	}
	if ($this->session->flashdata('msg') == 'Picture Successfully Updated') {
		?>
		<script>
			iziToast.success({
				title: 'success',
				message: 'Picture Successfully Updated',
				position: 'topRight'
			});
		</script>
		<?php
	}
	if ($this->session->flashdata('msg') == 'Review Successfully Updated') {
		?>
		<script>
			iziToast.success({
				title: 'success',
				message: 'Review Successfully Updated',
				position: 'topRight'
			});
		</script>
		<?php
	}
	if ($this->session->flashdata('msg') == 'Videos Successfully Updated') {
		?>
		<script>
			iziToast.success({
				title: 'success',
				message: 'Videos Successfully Updated',
				position: 'topRight'
			});
		</script>
		<?php
	}
	if ($this->session->flashdata('msg') == 'Certificate Successfully Updated') {
		?>
		<script>
			iziToast.success({
				title: 'success',
				message: 'Certificate Successfully Updated',
				position: 'topRight'
			});
		</script>
		<?php
	}
	if ($this->session->flashdata('msg') == 'FAQ Successfully Updated') {
		?>
		<script>
			iziToast.success({
				title: 'success',
				message: 'FAQ Successfully Updated',
				position: 'topRight'
			});
		</script>
		<?php
	}
	if ($this->session->flashdata('msg') == 'Form Validation Error') {
		?>
		<script>
			iziToast.error({
				title: 'error',
				message: 'Form Validation Error',
				position: 'topRight'
			});
		</script>
		<?php
	}
	if ($this->session->flashdata('msg') == 'Webinar Successfully updated') {
		?>
		<script>
			iziToast.success({
				title: 'success',
				message: 'Webinar Successfully updated',
				position: 'topRight'
			});
		</script>
		<?php
	}
	if ($this->session->flashdata('msg') == 'Wrong Tnx Password!') {
		?>
		<script>
			iziToast.success({
				title: 'error',
				message: 'Wrong Tnx Password!',
				position: 'topRight'
			});
		</script>
		<?php
	}
	if ($this->session->flashdata('msg') == 'Somethig went wrong!') {
		?>
		<script>
			iziToast.success({
				title: 'error',
				message: 'Somethig went wrong!',
				position: 'topRight'
			});
		</script>
		<?php
	}
	if ($this->session->flashdata('msg') == 'Successfully Updated.') {
		?>
		<script>
			iziToast.success({
				title: 'success',
				message: 'Successfully Updated.',
				position: 'topRight'
			});
		</script>
		<?php
	}
	if ($this->session->flashdata('msg') == 'Add Successfully') {
		?>
		<script>
			iziToast.success({
				title: 'success',
				message: 'Add Successfully',
				position: 'topRight'
			});
		</script>
		<?php
	}

	if ($this->session->flashdata('msg') == 'Validation Error') {
		?>
		<script>
			iziToast.success({
				title: 'success',
				message: 'Validation Error',
				position: 'topRight'
			});
		</script>
		<?php
	}



}

?>

<?php

if ($this->session->flashdata('status') == 'success') {
	echo '<script>$.notify("' . $this->session->flashdata('msg') . '", "success");</script>';
} else if ($this->session->flashdata('status') == 'error') {
	echo '<script>$.notify("' . $this->session->flashdata('msg') . '", "error");</script>';
}

$this->session->unset_userdata('status');
$this->session->unset_userdata('msg');
?>

<script>
	$(document).ready(function () {
		// Automatically wrap all tables in a responsive div to prevent overflow on mobile devices
		$('table').each(function () {
			if (!$(this).parent().hasClass('table-responsive')) {
				$(this).wrap('<div class="table-responsive" style="overflow-x: auto; width: 100%; -webkit-overflow-scrolling: touch;"></div>');
			}
		});

		// Support for responsive embedded iframes/videos/images
		$('iframe, video').addClass('img-fluid');
	});
</script>

<!-- Export Security Modal -->
<div class="modal fade" id="exportSecurityModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content border-top border-0 border-4 border-warning">
			<div class="modal-header bg-warning">
				<h5 class="modal-title text-dark"><i class="bi bi-shield-lock-fill me-2"></i>Security Verification</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div id="otp-step-1">
					<p class="text-muted">A security code is required to Export/Copy/Print data. Click below to send an
						OTP to <strong><?php echo get_admin_notification_email(); ?></strong>.</p>
					<div class="text-center">
						<button type="button" id="send-export-otp" class="btn btn-warning px-5"><i
								class="bi bi-send-fill me-2"></i>Send Security OTP</button>
					</div>
				</div>
				<div id="otp-step-2" style="display:none;">
					<p class="text-success text-center mb-3"><i class="bi bi-check-circle-fill me-2"></i>OTP sent
						successfully!</p>
					<div class="form-group mb-3">
						<label class="form-label">Enter 6-Digit OTP</label>
						<input type="text" id="export-otp-input"
							class="form-control form-control-lg text-center letter-spacing-5" maxlength="6"
							placeholder="0 0 0 0 0 0">
					</div>
					<div class="text-center">
						<button type="button" id="verify-export-otp" class="btn btn-success px-5 w-100 mb-2">Verify &
							Continue</button>
						<button type="button" class="btn btn-link btn-sm text-muted"
							onclick="location.reload()">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
	.letter-spacing-5 {
		letter-spacing: 10px;
		font-size: 24px;
		font-weight: bold;
	}
</style>

<script>
	var pendingExportAction = null;

	$(document).ready(function () {
		$('#send-export-otp').click(function () {
			var btn = $(this);
			btn.html('<i class="fa fa-spinner fa-spin"></i> Sending...').prop('disabled', true);
			$.ajax({
				url: "<?= base_url('Admin/SendExportOTP') ?>",
				type: "POST",
				success: function (res) {
					var json = JSON.parse(res);
					if (json.status == 'success') {
						iziToast.success({ title: 'Success', message: json.msg, position: 'topRight' });
						$('#otp-step-1').hide();
						$('#otp-step-2').fadeIn();
					} else {
						iziToast.error({ title: 'Error', message: json.msg, position: 'topRight' });
						btn.html('<i class="bi bi-send-fill me-2"></i>Send Security OTP').prop('disabled', false);
					}
				}
			});
		});

		$('#verify-export-otp').click(function () {
			var otp = $('#export-otp-input').val();
			if (otp.length != 6) {
				iziToast.warning({ message: 'Please enter 6-digit OTP', position: 'topRight' });
				return;
			}
			var btn = $(this);
			btn.html('<i class="fa fa-spinner fa-spin"></i> Verifying...').prop('disabled', true);
			$.ajax({
				url: "<?= base_url('Admin/VerifyExportOTP') ?>",
				type: "POST",
				data: { otp: otp },
				success: function (res) {
					var json = JSON.parse(res);
					if (json.status == 'success') {
						iziToast.success({ title: 'Verified', message: json.msg, position: 'topRight' });
						$('#exportSecurityModal').modal('hide');
						if (pendingExportAction) {
							pendingExportAction();
							pendingExportAction = null;
						}
					} else {
						iziToast.error({ title: 'Failed', message: json.msg, position: 'topRight' });
						btn.html('Verify & Continue').prop('disabled', false);
					}
				}
			});
		});
	});

	function secureExport(action) {
		$.ajax({
			url: "<?= base_url('Admin/CheckExportStatus') ?>",
			success: function (res) {
				var json = JSON.parse(res);
				if (json.status == 'success') {
					action();
				} else {
					pendingExportAction = action;
					$('#otp-step-2').hide();
					$('#otp-step-1').show();
					$('#send-export-otp').prop('disabled', false).html('<i class="bi bi-send-fill me-2"></i>Send Security OTP');
					$('#export-otp-input').val('');
					$('#exportSecurityModal').modal('show');
				}
			}
		});
	}
</script>