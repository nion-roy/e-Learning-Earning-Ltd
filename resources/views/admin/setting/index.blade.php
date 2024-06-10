@extends('layouts.backend.app')

@section('main_content')
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0 font-size-18">Dashboard</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboards</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>

			</div>
		</div>
	</div>
	<!-- end page title -->


	<div class="row">
		<div class="col-xl-6">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title mb-4">Web Site Settings</h4>

					<form>
						<div class="mb-3">
							<label for="web_name" class="form-label">Web Site Name</label>
							<input type="text" name="web_name" class="form-control" id="web_name" placeholder="Enter web site name" value="{{ getSetting()->web_name }}">
						</div>

						<div class="mb-3">
							<label for="bd_address" class="form-label">BD Location</label>
							<input type="text" name="bd_address" class="form-control" id="bd_address" placeholder="Enter company BD location" value="{{ getSetting()->bd_address }}">
						</div>

						<div class="mb-3">
							<label for="uk_address" class="form-label">UK Location</label>
							<input type="text" name="uk_address" class="form-control" id="uk_address" placeholder="Enter company UK location" value="{{ getSetting()->uk_address }}">
						</div>


						<!-- Telephone Number -->
						<div class="mb-3">
							<label for="telephone" class="form-label">Telephone</label>
							<div class="telephones">
								@php
									$telephones = json_decode(getSetting()->telephone, true);
								@endphp
								@foreach ($telephones as $key => $telephone)
									<div class="telephone-row d-flex align-items-center gap-2 mb-2">
										<input type="text" name="telephone[]" class="form-control" value="{{ $telephone }}" placeholder="Enter telephone number">
										@if ($key === 0)
											<button type="button" class="btn btn-success waves-effect add-row-telephone"><i class="fas fa-plus"></i></button>
										@else
											<button type="button" class="btn btn-danger waves-effect remove-row-telephone"><i class="fas fa-minus"></i></button>
										@endif
									</div>
								@endforeach
							</div>
						</div>

						@push('js')
							<script>
								$(document).ready(function() {
									// Add Row Telephone
									$(document).on('click', '.add-row-telephone', function() {
										var newRow = '<div class="d-flex align-items-center gap-2 mb-2">' +
											'<input type="text" name="telephone[]" class="form-control" placeholder="Enter telephone number">' +
											'<button type="button" class="btn btn-danger waves-effect remove-row-telephone"><i class="fas fa-minus"></i></button>' +
											'</div>';
										$(".telephones").append(newRow);
									});
									// Remove Row
									$(document).on('click', '.remove-row-telephone', function() {
										$(this).closest('.d-flex').remove();
									});
								});
							</script>
						@endpush
						<!-- Telephone Number -->


						<!-- Call Number -->
						<div class="mb-3">
							<label for="call_number" class="form-label">Call Number</label>
							<div class="calls">
								@php
									$calls = json_decode(getSetting()->call_number, true);
								@endphp
								@foreach ($calls as $key => $call)
									<div class="call-row d-flex align-items-center gap-2 mb-2">
										<input type="text" name="call_number[]" class="form-control" value="{{ $call }}" placeholder="Enter call number">
										@if ($key === 0)
											<button type="button" class="btn btn-success waves-effect add-row-call"><i class="fas fa-plus"></i></button>
										@else
											<button type="button" class="btn btn-danger waves-effect remove-row-call"><i class="fas fa-minus"></i></button>
										@endif
									</div>
								@endforeach
							</div>
						</div>

						@push('js')
							<script>
								$(document).ready(function() {
									// Add Row Call
									$(document).on('click', '.add-row-call', function() {
										var newRow = '<div class="d-flex align-items-center gap-2 mb-2">' +
											'<input type="text" name="call_number[]" class="form-control" placeholder="Enter call number">' +
											'<button type="button" class="btn btn-danger waves-effect remove-row-call"><i class="fas fa-minus"></i></button>' +
											'</div>';
										$(".calls").append(newRow);
									});
									// Remove Row
									$(document).on('click', '.remove-row-call', function() {
										$(this).closest('.d-flex').remove();
									});
								});
							</script>
						@endpush
						<!-- Call Number -->


						<!-- Phone Number -->
						<div class="mb-3">
							<label for="phone_number" class="form-label">Phone Number</label>
							<div class="phones">
								@php
									$phones = json_decode(getSetting()->phone_number, true);
								@endphp
								@foreach ($phones as $key => $phone)
									<div class="phone-row d-flex align-items-center gap-2 mb-2">
										<input type="text" name="phone_number[]" class="form-control" value="{{ $phone }}" placeholder="Enter phone number">
										@if ($key === 0)
											<button type="button" class="btn btn-success waves-effect add-row-phone"><i class="fas fa-plus"></i></button>
										@else
											<button type="button" class="btn btn-danger waves-effect remove-row-phone"><i class="fas fa-minus"></i></button>
										@endif
									</div>
								@endforeach
							</div>
						</div>

						@push('js')
							<script>
								$(document).ready(function() {
									// Add Row Phone
									$(document).on('click', '.add-row-phone', function() {
										var newRow = '<div class="d-flex align-items-center gap-2 mb-2">' +
											'<input type="text" name="phone_number[]" class="form-control" placeholder="Enter phone number">' +
											'<button type="button" class="btn btn-danger waves-effect remove-row-phone"><i class="fas fa-minus"></i></button>' +
											'</div>';
										$(".phones").append(newRow);
									});
									// Remove Row
									$(document).on('click', '.remove-row-phone', function() {
										$(this).closest('.d-flex').remove();
									});
								});
							</script>
						@endpush
						<!-- Phone Number -->


						<!-- Email -->
						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<div class="emails">
								@php
									$emails = json_decode(getSetting()->email, true);
								@endphp
								@foreach ($emails as $key => $email)
									<div class="email-row d-flex align-items-center gap-2 mb-2">
										<input type="text" name="email_number[]" class="form-control" value="{{ $email }}" placeholder="Enter email">
										@if ($key === 0)
											<button type="button" class="btn btn-success waves-effect add-row-email"><i class="fas fa-plus"></i></button>
										@else
											<button type="button" class="btn btn-danger waves-effect remove-row-email"><i class="fas fa-minus"></i></button>
										@endif
									</div>
								@endforeach
							</div>
						</div>

						@push('js')
							<script>
								$(document).ready(function() {
									// Add Row Email
									$(document).on('click', '.add-row-email', function() {
										var newRow = '<div class="d-flex align-items-center gap-2 mb-2">' +
											'<input type="text" name="email_number[]" class="form-control" placeholder="Enter email">' +
											'<button type="button" class="btn btn-danger waves-effect remove-row-email"><i class="fas fa-minus"></i></button>' +
											'</div>';
										$(".emails").append(newRow);
									});
									// Remove Row
									$(document).on('click', '.remove-row-email', function() {
										$(this).closest('.d-flex').remove();
									});
								});
							</script>
						@endpush
						<!-- Email -->


						<div class="mb-3">
							<label for="google_map" class="form-label">Google Map</label>
							<input type="text" name="google_map" class="form-control" id="google_map" placeholder="Enter google map on iframe" value="{{ getSetting()->google_map }}">
						</div>

						<div class="mb-3">
							<label for="web_logo" class="form-label">Web Logo</label>
							<input type="file" name="web_logo" id="web_logo">
						</div>

						<div class="mb-3">
							<label for="web_favicon" class="form-label">Web Favicon</label>
							<input type="file" name="web_favicon" id="web_favicon">
						</div>

						<div>
							<button type="submit" class="btn btn-primary w-md waves-effe">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection


{{-- @push('js')
	<script>
		$(document).ready(function() {
			// Add Row Telephone
			$(".add-row-telephone").click(function() {
				var newRow = '<div class="d-flex align-items-center gap-2 mb-2"><input type="text" name="telephone[]" class="form-control" placeholder="Enter telephone number"><button type="button" class="btn btn-danger waves-effect remove-row-telephone"><i class="fas fa-minus"></i></button></div>';
				$(".telephones").append(newRow);
			});

			// Add Row Call
			$(".add-row-call").click(function() {
				var newRow = '<div class="d-flex align-items-center gap-2 mb-2"><input type="text" name="call_number[]" class="form-control" placeholder="Enter telephone number"><button type="button" class="btn btn-danger waves-effect remove-row-call"><i class="fas fa-minus"></i></button></div>';
				$(".calls").append(newRow);
			});

			// Add Row Phone
			$(".add-row-phone").click(function() {
				var newRow = '<div class="d-flex align-items-center gap-2 mb-2"><input type="text" name="phone_number[]" class="form-control" placeholder="Enter telephone number"><button type="button" class="btn btn-danger waves-effect remove-row-phone"><i class="fas fa-minus"></i></button></div>';
				$(".phones").append(newRow);
			});

			// Add Row Email
			$(".add-row-email").click(function() {
				var newRow = '<div class="d-flex align-items-center gap-2 mb-2"><input type="text" name="email[]" class="form-control" placeholder="Enter telephone number"><button type="button" class="btn btn-danger waves-effect remove-row-email"><i class="fas fa-minus"></i></button></div>';
				$(".emails").append(newRow);
			});

			// Remove Row
			$(".telephones, .calls, .phones, .emails").on("click", ".remove-row-telephone, .remove-row-call, .remove-row-phone, .remove-row-email", function() {
				$(this).closest('.d-flex').remove();
			});
		});
	</script>
@endpush --}}
