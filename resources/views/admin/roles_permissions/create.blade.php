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
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title mb-4">Roles & Permission Managments</h4>

					<form action="{{ route('admin.roles-permissions.store') }}" method="POST">
						@csrf

						@include('alert-message.alert-message')

						<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="name" class="form-label">Role Name</label>
									<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter role name">
									@error('name')
										<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
						</div>

						<hr>

						<h4 class="card-title mb-4">Permissions</h4>

						<div class="form-group mb-3">
							<input type="checkbox" id="selectAll" class="form-input">
							<label for="selectAll" id="selectLabel" class="form-label">Select All</label>
						</div>

						<div class="row mb-3">
							@foreach ($permissions as $permission)
								<div class="col-lg-3">
									<div class="form-group">
										<input type="checkbox" name="permission[]" id="{{ $permission->id }}" value="{{ $permission->name }}">
										<label for="{{ $permission->id }}" class="form-label">{{ $permission->name }}</label>
									</div>
								</div>
							@endforeach
						</div>

						<div class="form-group">
							<a class="btn btn-danger waves-effect" href="{{ route('admin.roles-permissions.index') }}"><i class="fas fa-arrow-left me-2"></i>Back Now</a>
							<button class="btn btn-success waves-effect"><i class="fas fa-save me-2"></i>Add Now</button>
						</div>
					</form>


				</div>
			</div>
		</div>
	</div>
@endsection


@push('js')
	<script>
		$("#selectAll").click(function() {
			$("input[type=checkbox]").prop("checked", $(this).prop("checked"));
		});

		$("input[type=checkbox]").click(function() {
			if (!$(this).prop("checked")) {
				$("#selectAll").prop("checked", false);
			}
		});
	</script>
@endpush
