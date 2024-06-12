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


					<div class="d-flex align-items-center justify-content-between mb-3">
						<h4>Software</h4>
						<a href="{{ route('admin.user-softwares.create') }}" class="btn btn-success waves-effect"><i class="fas fa-plus-circle me-2"></i>Add Software</a>
					</div>

					@include('alert-message.alert-message')

					<table id="datatable" class="table border table-striped align-middle w-100">
						<thead>
							<tr>
								<th>SL</th>
								<th>Software Name</th>
								<th>Details</th>
								<th>Image</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							@foreach ($softwares as $key => $software)
								<tr>
									<td>{{ getStrPad($key + 1) }}</td>
									<td>{{ $software->software_name }}</td>
									<td>{{ Str::limit($software->details ?? 'Null', 40) }}</td>
									<td>
										@if ($software->image != 'user_software.png')
											<img src="{{ asset('storage/user_software/' . $software->image ?? 'default/logo.png') }}" alt="{{ $software->name }}" width="30" height="30">
										@else
											<img src="{{ asset('default/null.png') }}" alt="{{ $software->name }}" width="30" height="30">
										@endif
									</td>
									<td>
										@if ($software->status == true)
											<span class="badge-soft-success px-2 py-1 rounded">Active</span>
										@else
											<span class="badge-soft-danger px-2 py-1 rounded">Inactive</span>
										@endif
									</td>
									<td class="d-flex align-items-center gap-2">
										<a href="{{ route('admin.user-softwares.edit', $software->id) }}" class="btn btn-success btn-sm fa-1x waves-effect">
											<i class="fas fa-edit"></i>
										</a>
										<form id="delete-form-{{ $software->id }}" action="{{ route('admin.user-softwares.destroy', $software->id) }}" method="post">
											@csrf
											@method('DELETE')
											<button type="button" class="btn btn-danger btn-sm fa-1x waves-effect delete-button"> <i class="fas fa-trash"></i> </button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>

					</table>

				</div>
			</div>
		</div> <!-- end col -->
	</div>
@endsection
