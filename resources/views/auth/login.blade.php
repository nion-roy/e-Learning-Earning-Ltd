<!doctype html>
<html lang="en">

	<head>

		<meta charset="utf-8" />
		<title>Login | Skote - Admin & Dashboard Template</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
		<meta content="Themesbrand" name="author" />
		<!-- App favicon -->
		<link rel="shortcut icon" href="{{ asset('backend') }}/assets/images/favicon.ico">

		<!-- Bootstrap Css -->
		<link href="{{ asset('backend') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
		<!-- Icons Css -->
		<link href="{{ asset('backend') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
		<!-- App Css-->
		<link href="{{ asset('backend') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

	</head>

	<body class="bg-light">
		<div class="account-pages position-relative">
			<div class="container">
				<div class="row align-items-center justify-content-center vh-100">
					<div class="col-md-8 col-lg-6 col-xl-5">
						<div class="card overflow-hidden">
							<div class="bg-primary-subtle">
								<div class="row">
									<div class="col-7">
										<div class="text-primary p-4">
											<h5 class="text-primary">Welcome Back !</h5>
											<p>Sign in to continue to e-laeltd</p>
										</div>
									</div>
									<div class="col-5 align-self-end">
										<img src="{{ asset('backend') }}/assets/images/profile-img.png" alt="" class="img-fluid">
									</div>
								</div>
							</div>


							<div class="card-body pt-0">
								<div class="auth-logo">
									<a href="{{ route('login') }}" class="auth-logo-light">
										<div class="avatar-md profile-user-wid mb-4">
											<span class="avatar-title rounded-circle bg-light">
												<img src="{{ asset('backend') }}/assets/images/logo-light.svg" alt="" class="rounded-circle" height="34">
											</span>
										</div>
									</a>

									<a href="{{ route('login') }}" class="auth-logo-dark">
										<div class="avatar-md profile-user-wid mb-4">
											<span class="avatar-title rounded-circle bg-light">
												<img src="{{ asset('backend') }}/assets/images/logo.svg" alt="" class="rounded-circle" height="34">
											</span>
										</div>
									</a>
								</div>

								@include('alert-message.alert-message')

								<div class="p-2">
									<form class="form-horizontal" action="{{ route('login') }}" method="POST">
										@csrf

										<div class="mb-3">
											<label for="email" class="form-label">Email</label>
											<input type="text" name="email" class="form-control 	@error('email') is-invalid @enderror" id="email" placeholder="Enter email" value="{{ old('email') }}">
											@error('email')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>

										<div class="mb-3">
											<label class="form-label">Password</label>
											<input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password">
											@error('password')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>

										<div class="form-check">
											<input type="checkbox" class="form-check-input" name="remember" id="remember">
											<label class="form-check-label" for="remember">Remember me</label>
										</div>

										<div class="mt-3 d-grid">
											<button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
										</div>

									</form>
								</div>

							</div>
						</div>
						<div class="mt-5 text-center">

							<div>
								<p>{{ date('Y') }} © Created with by <a href="https://e-laeltd.com/">e-Learning & Earning Ltd.</a>
								</p>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- end account-pages -->

		<!-- JAVASCRIPT -->
		<script src="{{ asset('backend') }}/assets/libs/jquery/jquery.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/metismenu/metisMenu.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/simplebar/simplebar.min.js"></script>
		<script src="{{ asset('backend') }}/assets/libs/node-waves/waves.min.js"></script>

		<!-- App js -->
		<script src="{{ asset('backend') }}/assets/js/app.js"></script>
	</body>

</html>
