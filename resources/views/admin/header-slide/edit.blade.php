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
					<h4 class="card-title mb-4">Edit Header Detials</h4>

					<form action="{{ route('admin.header-banners.update', $headerSlider->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')

						@include('alert-message.alert-message')


						<div class="row">
							<div class="col-md-6">

								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="title" class="form-label">Header Title<span class="text-danger">*</span></label>
											<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter header title" value="{{ old('title') ?? $headerSlider->title }}">
											@error('title')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="image" class="form-label">Image</label>
											<div id="imagePreviewContainer" class="mb-2">
												@if ($headerSlider->image != 'header_slider.png')
													<img src="{{ asset('storage/header_sliders/' . $headerSlider->image) }}" class="border" style="width: 60px; height: 60px; margin: 10px 0" alt="{{ $headerSlider->name }}">
												@else
													<img src="{{ asset('default/null.png') }}" class="border" style="width: 60px; height: 60px; margin: 10px 0" alt="{{ $headerSlider->name }}">
												@endif
											</div>
											<input type="file" name="image" class="@error('image') is-invalid @enderror" id="imageInput" accept="image/*">
											@error('image')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="status" class="form-label">Status<span class="text-danger">*</span></label>
											<select name="status" class="form-select form-control @error('status') is-invalid @enderror">
												<option disabled selected>-- Select Status --</option>
												<option value="1" {{ $headerSlider->status == 1 ? 'selected' : '' }}>Active</option>
												<option value="0" {{ $headerSlider->status == 0 ? 'selected' : '' }}>Inactive</option>
											</select>
											@error('status')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>


								<div class="form-group text-end">
									<a class="btn btn-danger waves-effect" href="{{ route('admin.header-banners.index') }}"><i class="fas fa-arrow-left me-2"></i>Back Now</a>
									<button class="btn btn-success waves-effect"><i class="fas fa-upload me-2"></i>Update Now</button>
								</div>
							</div>
						</div>

					</form>


				</div>
			</div>
		</div>
	</div>
@endsection
