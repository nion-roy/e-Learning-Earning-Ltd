<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>

		<!-- App favicon -->
		<link rel="shortcut icon" href="{{ asset('backend') }}/assets/images/favicon.png">

		<!-- Sweet Alert-->
		<link rel="stylesheet" href="sweetalert2.min.css">

		<!-- DataTables -->
		<link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

		<!-- Bootstrap Css -->
		<link href="{{ asset('backend') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
		<!-- Icons Css -->
		<link href="{{ asset('backend') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
		<!-- App Css-->
		<link href="{{ asset('backend') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


		@stack('css')

		<style>
			.swal2-actions {
				gap: 6px !important;
			}
		</style>

	</head>

	<body data-sidebar="dark">

		<!-- Begin page -->
		<div id="layout-wrapper">

			<!-- ========== Header Start ========== -->
			@include('layouts.backend.layouts.header')
			<!-- ========== Header End ========== -->

			<!-- ========== Left Sidebar Start ========== -->
			@include('layouts.backend.layouts.sidebar')
			<!-- ========== Left Sidebar End ========== -->

			<!-- ========== Right Sidebar Content Start ========== -->
			<div class="main-content">

				<div class="page-content">
					<div class="container-fluid">

						@yield('main_content')

					</div>
				</div>
				<!-- End Page-content -->


				<!-- footer start -->
				@include('layouts.backend.layouts.footer')
				<!-- footer end -->
			</div>
			<!-- ========== Right Sidebar Content End ========== -->

		</div>
		<!-- END layout-wrapper -->

		<!-- JAVASCRIPT -->
		<script src="{{ asset('backend') }}/assets/libs/jquery/jquery.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/metismenu/metisMenu.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/simplebar/simplebar.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/node-waves/waves.min.js"></script>

		<!-- apexcharts -->
		<script src="{{ asset('backend') }}/assets/libs/apexcharts/apexcharts.min.js"></script>

		<!-- dashboard init -->
		<script src="{{ asset('backend') }}/assets/js/pages/dashboard.init.js"></script>

		<!-- Required datatable js -->
		<script src="{{ asset('backend') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
		<!-- Buttons examples -->
		<script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/jszip/jszip.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

		<!-- Responsive examples -->
		<script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

		<!-- Datatable init js -->
		<script src="{{ asset('backend') }}/assets/js/pages/datatables.init.js"></script>

		<!-- Sweet Alerts js -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		<!-- Sweet alert init js-->
		<script src="{{ asset('backend') }}/aassets/js/pages/sweet-alerts.init.js"></script>

		<!-- App js -->
		<script src="{{ asset('backend') }}/assets/js/app.js"></script>

		@include('sweetalert::alert')

		<!-- Sweet alert confirmation message with delete -->
		<script>
			$(document).on('click', '.delete-button', function(e) {
				e.preventDefault();
				var form = $(this).closest('form');

				const swalWithBootstrapButtons = Swal.mixin({
					customClass: {
						confirmButton: 'btn btn-success',
						cancelButton: 'btn btn-danger'
					},
					buttonsStyling: false
				});

				swalWithBootstrapButtons.fire({
					title: 'Are you sure?',
					text: "You won't be able to revert this delete!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Yes, delete it!',
					cancelButtonText: 'No, cancel!',
					reverseButtons: true
				}).then((result) => {
					if (result.isConfirmed) {
						form.submit();
						swalWithBootstrapButtons.fire(
							'Deleted!',
							'Your file has been deleted.',
							'success'
						);
					} else if (result.dismiss === Swal.DismissReason.cancel) {
						swalWithBootstrapButtons.fire(
							'Cancelled',
							'Your imaginary file is safe!',
							'error'
						);
					}
				});
			});
		</script>
		<!-- Sweet alert confirmation message with delete -->

		<script>
			$(document).ready(function() {
				$('#imageInput').on('change', function(event) {
					var files = event.target.files;
					var previewContainer = $('#imagePreviewContainer');

					// Clear previous previews
					previewContainer.empty();

					if (files.length > 0) {
						var file = files[0];
						var reader = new FileReader();

						reader.onload = function(e) {
							var img = $('<img class="border rounded p-2">').attr('src', e.target.result).css({
								'width': '60px',
								'height': '60px',
								'margin': '10px 0'
							});
							previewContainer.append(img);
						}

						reader.readAsDataURL(file);
					}
				});
			});
		</script>

		@stack('js')

	</body>

</html>
