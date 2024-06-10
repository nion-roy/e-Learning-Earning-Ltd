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
		<div class="col-xl-8">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title mb-4">Web Site Social Settings</h4>

					@include('alert-message.alert-message')

					@if ($errors->any())
						@foreach ($errors->all() as $error)
							<div class="alert alert-danger">{{ $error }}</div>
						@endforeach
					@endif

					<form action="{{ route('admin.social-setting.store') }}" method="POST">
						@csrf

						<!-- Social -->
						<div class="mb-3">
							<label for="social" class="form-label">Social</label>
							<div class="socials">

								@if ($socials->count() > 0)
									@foreach ($socials as $key => $social)
										<div class="d-flex align-items-center gap-2 social-row mb-2">
											<input type="text" name="names[]" class="form-control social-name" placeholder="Enter social name" value="{{ $social->name }}" required>
											<input type="text" name="icons[]" class="form-control social-icon" placeholder="Enter social icon" value="{{ $social->icon }}" required>
											<input type="text" name="urls[]" class="form-control social-link" placeholder="Enter social link" value="{{ $social->url }}" required>
											@if ($key === 0)
												<button type="button" class="btn btn-success add-row-social"><i class="fas fa-plus"></i></button>
											@else
												<button type="button" class="btn btn-danger remove-row-social"><i class="fas fa-minus"></i></button>
											@endif
										</div>
									@endforeach
								@else
									<div class="d-flex align-items-center gap-2 social-row mb-2">
										<input type="text" name="names[]" class="form-control social-name" placeholder="Enter social name" required>
										<input type="text" name="icons[]" class="form-control social-icon" placeholder="Enter social icon" required>
										<input type="text" name="urls[]" class="form-control social-link" placeholder="Enter social link" required>
										<button type="button" class="btn btn-success add-row-social"><i class="fas fa-plus"></i></button>
									</div>
								@endif

							</div>
						</div>
						<!-- Social -->

						<div>
							<button type="submit" class="btn btn-success w-md waves-effect"><i class="fas fa-save me-2"></i>Submit</button>
						</div>
					</form>

					@push('js')
						<script>
							$(document).ready(function() {
								// Add Row Social
								$(".add-row-social").click(function() {
									var newRow = '<div class="d-flex align-items-center gap-2 social-row mb-2">' +
										'<input type="text" name="names[]" class="form-control social-name" placeholder="Enter social name" required>' +
										'<input type="text" name="icons[]" class="form-control social-icon" placeholder="Enter social icon" required>' +
										'<input type="text" name="urls[]" class="form-control social-link" placeholder="Enter social link" required>' +
										'<button type="button" class="btn btn-danger remove-row-social"><i class="fas fa-minus"></i></button>' +
										'</div>';
									$(".socials").append(newRow);
								});

								// Remove Row Social
								$(document).on('click', '.remove-row-social', function() {
									$(this).closest('.social-row').remove();
								});
							});
						</script>
					@endpush


				</div>
				<!-- end card body -->
			</div>
			<!-- end card -->
		</div>
		<!-- end col -->
	</div>
@endsection
