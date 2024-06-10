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
					<h4 class="card-title mb-4">Add New User</h4>

					@include('alert-message.alert-message')

					<form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')

						<div class="mb-3">
							<label for="name" class="form-label">Full Name</label>
							<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter full name" value="{{ old('name') ?? $user->name }}">
							@error('name')
								<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>

						<div class="mb-3">
							<label for="username" class="form-label">Username</label>
							<input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Enter username" value="{{ old('username') ?? $user->username }}">
							@error('username')
								<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>

						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter user name" value="{{ old('email') ?? $user->email }}">
							@error('email')
								<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>

						<div class="mb-3">
							<label for="image" class="form-label">Image</label>
							<input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
							@error('image')
								<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
            
						<div class="mb-3">
							<label for="role" class="form-label">User Role</label>
							<select name="role" id="role" class="form-control form-select @error('role') is-invalid @enderror">
								<option disabled selected>-- Select Role --</option>
								@foreach ($roles as $roleName => $role)
									<option value="{{ $role }}" {{ $user->role == $roleName ? 'selected' : '' }}>{{ $role }}</option>
								@endforeach
							</select>
							@error('role')
								<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>

						<div>
							<a href="{{ route('admin.users.index') }}" class="btn btn-danger waves-effect"><i class="fas fa-arrow-left me-2"></i>Back Now</a>
							<button type="submit" class="btn btn-primary w-md waves-effect"><i class="fas fa-save me-2"></i>Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
