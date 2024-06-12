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
					<h4 class="card-title mb-4">Edit Student Detials</h4>

					<form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')

						@include('alert-message.alert-message')


						<div class="row">
							<div class="col-md-6">

								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="student_name" class="form-label">Student Name<span class="text-danger">*</span></label>
											<input type="text" name="student_name" class="form-control @error('student_name') is-invalid @enderror" id="student_name" placeholder="Enter student name" value="{{ old('student_name') ?? $testimonial->student_name }}">
											@error('student_name')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="address" class="form-label">Student Address<span class="text-danger">*</span></label>
											<input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Enter student address" value="{{ old('address') ?? $testimonial->address }}">
											@error('address')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>
                


								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="comment" class="form-label">Comment</label>
											<textarea name="comment" id="comment" cols="30" rows="10" class="form-control" placeholder="Enter student comment...">{{ old('comment') ?? $testimonial->comment }}</textarea>
											@error('comment')
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
												@if ($testimonial->image != 'student.png')
													<img src="{{ asset('storage/testimonials/' . $testimonial->image) }}" class="border" style="width: 60px; height: 60px; margin: 10px 0" alt="{{ $testimonial->name }}">
												@else
													<img src="{{ asset('default/null.png') }}" class="border" style="width: 60px; height: 60px; margin: 10px 0" alt="{{ $testimonial->name }}">
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
												<option value="1" {{ $testimonial->status == 1 ? 'selected' : '' }}>Active</option>
												<option value="0" {{ $testimonial->status == 0 ? 'selected' : '' }}>Inactive</option>
											</select>
											@error('status')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>


								<div class="form-group text-end">
									<a class="btn btn-danger waves-effect" href="{{ route('admin.testimonials.index') }}"><i class="fas fa-arrow-left me-2"></i>Back Now</a>
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
