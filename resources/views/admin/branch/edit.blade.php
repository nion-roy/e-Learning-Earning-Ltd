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
					<h4 class="card-title mb-4">New Branches Create</h4>

					<form action="{{ route('admin.branches.update', $branch->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')

						@include('alert-message.alert-message')


						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="branch_name" class="form-label">Branch Name</label>
											<input type="text" name="branch_name" class="form-control @error('branch_name') is-invalid @enderror" id="branch_name" placeholder="Enter branch name" value="{{ $branch->branch_name }}">
											@error('branch_name')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="address" class="form-label">Address</label>
											<input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Enter address" value="{{ $branch->address }}">
											@error('address')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="contact_1" class="form-label">Contact One</label>
											<input type="number" name="contact_1" class="form-control @error('contact_1') is-invalid @enderror" id="contact_1" placeholder="Enter contact number" value="{{ $branch->contact_1 }}">
											@error('contact_1')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="contact_2" class="form-label">Contact Two</label>
											<input type="number" name="contact_2" class="form-control @error('contact_2') is-invalid @enderror" id="contact_2" placeholder="Enter contact number" value="{{ $branch->contact_2 }}">

											@error('contact_2')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="email_1" class="form-label">Email One</label>
											<input type="email" name="email_1" class="form-control @error('email_1') is-invalid @enderror" id="email_1" placeholder="Enter email" value="{{ $branch->email_1 }}">
											@error('email_1')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="email_2" class="form-label">Email Two</label>
											<input type="email" name="email_2" class="form-control @error('email_2') is-invalid @enderror" id="email_2" placeholder="Enter email" value="{{ $branch->email_2 }}">
											@error('email_2')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="image" class="form-label">Image</label>
											<br>
											<img src="{{ asset('storage/branches/' . $branch->image) }}" alt="{{ $branch->branch_name }}" class="img-thumbnail me-3" width="60" height="60">
											<input type="file" name="image" class="@error('image') is-invalid @enderror" id="image">
											@error('image')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label for="status" class="form-label">Status</label>
											<select name="status" class="form-select form-control @error('status') is-invalid @enderror">
												<option disabled selected>-- Selected Status --</option>
												<option value="1" {{ $branch->status == 1 ? 'selected' : '' }}>Active</option>
												<option value="0" {{ $branch->status == 0 ? 'selected' : '' }}>Inactive</option>
											</select>
											@error('status')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>
							</div>
						</div>





						<div class="form-group text-end">
							<a class="btn btn-danger waves-effect" href="{{ route('admin.branches.index') }}"><i class="fas fa-arrow-left me-2"></i>Back Now</a>
							<button class="btn btn-success waves-effect"><i class="fas fa-upload me-2"></i>Update Now</button>
						</div>
					</form>


				</div>
			</div>
		</div>
	</div>
@endsection
