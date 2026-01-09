<!-- JS here -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<?php
	if ($this->session->flashdata('res') == 'success') {
		echo '<script>$.notify("' . $this->session->flashdata('msg') . '","success")</script>';
		} else if ($this->session->flashdata('res') == 'error') {
		echo '<script>$.notify("' . $this->session->flashdata('msg') . '","error")</script>';
	}
	$this->session->unset_userdata('res');
	$this->session->unset_userdata('msg');
?>


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
<script src="app-assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="<?= base_url('public/app-assets/js/jquery.min.js')?>"></script>
<script src="<?= base_url('public/app-assets/plugins/simplebar/js/simplebar.min.js')?>"></script>
<script src="<?= base_url('public/app-assets/plugins/metismenu/js/metisMenu.min.js')?>"></script>
<script src="<?= base_url('public/app-assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')?>"></script>
<script src="<?= base_url('public/app-assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')?>"></script>
<script src="<?= base_url('public/app-assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
<script src="<?= base_url('public/app-assets/js/pace.min.js')?>"></script>
<script src="<?= base_url('public/app-assets/plugins/chartjs/js/Chart.min.js')?>"></script>
<script src="<?= base_url('public/app-assets/plugins/chartjs/js/Chart.extension.js')?>"></script>
<script src="<?= base_url('public/app-assets/plugins/apexcharts-bundle/js/apexcharts.min.js')?>"></script>
<!--app-->
<script src="<?= base_url('public/app-assets/js/app.js')?>"></script>
<script src="<?= base_url('app-assets/js/index.js')?>"></script>
<script src="<?= base_url('app-assets/plugins/datatable/js/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('app-assets/plugins/datatable/js/dataTables.bootstrap5.min.js')?>"></script>
<script src="<?= base_url('app-assets/js/table-datatable.js')?>"></script>
<script src="<?= base_url('app-assets/js/form.js')?>"></script>
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
<script>
	new PerfectScrollbar(".best-product");
	
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl)
	})
</script>
