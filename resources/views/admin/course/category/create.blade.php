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
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title mb-4">New Course Category Create</h4>

					<form action="{{ route('admin.category.course.store') }}" method="POST" enctype="multipart/form-data">
						@csrf

						@include('alert-message.alert-message')


						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="category_name" class="form-label">Category Name</label>
											<input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="category_name" placeholder="Enter course category name" value="{{ old('category_name') }}">
											@error('category_name')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="status" class="form-label">Status</label>
											<select name="status" class="form-select form-control @error('status') is-invalid @enderror">
												<option value="" disabled {{ old('status') == '' ? 'selected' : '' }}>-- Select Status --</option>
												<option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
												<option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
											</select>
											@error('status')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<div class="form-group text-end">
										<a class="btn btn-danger waves-effect" href="{{ route('admin.category.course.index') }}"><i class="fas fa-arrow-left me-2"></i>Back Now</a>
										<button class="btn btn-success waves-effect"><i class="fas fa-save me-2"></i>Add Now</button>
									</div>
								</div>
							</div>
						</div>

					</form>


				</div>
			</div>
		</div>
	</div>
@endsection
