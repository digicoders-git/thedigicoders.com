$(function () {
	"use strict";

	$(document).ready(function () {
		$('#example').DataTable();
	});

	$(document).ready(function () {
		$('#example3').DataTable();
	});

	$(document).ready(function () {
		var table = $('#example2').DataTable({
			lengthChange: false,
			buttons: [
				{
					extend: 'copy',
					text: 'Copy',
					action: function (e, dt, button, config) {
						var self = this;
						secureExport(function () {
							$.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
						});
					}
				},
				{
					extend: 'excel',
					text: 'Excel',
					action: function (e, dt, button, config) {
						var self = this;
						secureExport(function () {
							$.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config);
						});
					}
				},
				{
					extend: 'pdf',
					text: 'PDF',
					action: function (e, dt, button, config) {
						var self = this;
						secureExport(function () {
							$.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config);
						});
					}
				},
				{
					extend: 'print',
					text: 'Print',
					action: function (e, dt, button, config) {
						var self = this;
						secureExport(function () {
							$.fn.dataTable.ext.buttons.print.action.call(self, e, dt, button, config);
						});
					}
				}
			]
		});

		table.buttons().container()
			.appendTo('#example2_wrapper .col-md-6:eq(0)');
	});


});