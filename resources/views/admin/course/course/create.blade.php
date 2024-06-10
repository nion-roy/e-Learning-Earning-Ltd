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
					<h4 class="card-title mb-4">New IT Training Create</h4>

					<form action="{{ route('admin.it-trainings.store') }}" method="POST" enctype="multipart/form-data">
						@csrf

						@include('alert-message.alert-message')


						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="category_id" class="form-label">IT Categories<span class="text-danger">*</span></label>
											<select name="category_id" id="category_id" class="form-control form-select @error('category_id') is-invalid @enderror">
												<option disabled selected>-- Selected IT Traning Category --</option>
												@foreach ($categories as $category)
													<option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
												@endforeach
											</select>
											@error('category_id')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="name" class="form-label">IT Training Name<span class="text-danger">*</span></label>
											<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter IT Training name" value="{{ old('name') }}">
											@error('name')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="details" class="form-label">Details</label>
											<textarea name="details" id="details" cols="30" rows="10" class="form-control" placeholder="Enter it trining details...">{{ old('details') }}</textarea>
											@error('details')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="image" class="form-label">Image</label>
											<div id="imagePreviewContainer"></div>
											<input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="imageInput" accept="image/*">
											@error('image')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
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
									<a class="btn btn-danger waves-effect" href="{{ route('admin.it-trainings.index') }}"><i class="fas fa-arrow-left me-2"></i>Back Now</a>
									<button class="btn btn-success waves-effect"><i class="fas fa-save me-2"></i>Add Now</button>
								</div>
							</div>
						</div>




					</form>


				</div>
			</div>
		</div>
	</div>
@endsection
