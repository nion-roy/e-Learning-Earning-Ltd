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
					@if (auth()->user()->can('create user'))
						<div class="d-flex align-items-center justify-content-between mb-3">
							<h4>Users</h4>
							<a href="{{ route('admin.users.create') }}" class="btn btn-success waves-effect"><i class="fas fa-plus-circle me-2"></i>Add User</a>
						</div>
					@endif

					@include('alert-message.alert-message')

					<table id="datatable" class="table border table-striped align-middle w-100">
						<thead>
							<tr>
								<th>SL</th>
								<th>Name</th>
								<th>Username</th>
								<th>Email</th>
								<th>Active</th>
								<th>Role</th>
								<th>Status</th>
								<th>Join Date</th>
								@if (auth()->user()->can('edit user') || auth()->user()->can('delete user'))
									<th>Action</th>
								@endif
							</tr>
						</thead>

						<tbody>
							@foreach ($users as $key => $user)
								<tr>
									<td>{{ str_pad($key + 1, 2, '0', STR_PAD_LEFT) }}</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->username }}</td>
									<td>{{ $user->email }}</td>
									<td>
										@if ($user->isOnline())
											<span class="text-success fw-bold">Online</span>
										@else
											@if ($user->last_activity)
												{{ Carbon\Carbon::parse($user->last_activity)->diffForHumans() }}
											@else
												<span class="text-danger fw-bold">Offline</span>
											@endif
										@endif
									</td>
									<td> <span class="badge-soft-success px-2 py-1 rounded">{{ $user->role }}</span> </td>
									<td>
										@if ($user->status == 1)
											<span class="badge-soft-success px-2 py-1 rounded">Active</span>
										@else
											<span class="badge-soft-danger px-2 py-1 rounded">Blocked</span>
										@endif
									</td>
									<td>{{ $user->created_at->format('d-M-Y h:i A') }}</td>
									@if (auth()->user()->can('update user') || auth()->user()->can('delete user'))
										<td>
											@if (auth()->user()->can('update user'))
												<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-success btn-sm fa-1x waves-effect"><i class="fas fa-edit"></i></a>
											@endif

											@if (auth()->user()->can('delete user'))
												<a href="#" class="btn btn-danger btn-sm fa-1x waves-effect"><i class="fas fa-trash"></i></a>
											@endif
										</td>
									@endif
								</tr>
							@endforeach
						</tbody>




					</table>

				</div>
			</div>
		</div> <!-- end col -->
	</div>
@endsection
