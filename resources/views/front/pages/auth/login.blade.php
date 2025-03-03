@extends('front.layout.main')

@section('title')
login page
@endsection


@section('content')

<div class="page-wrapper">
	<div class="page-content">

		<section class="py-3 border-bottom d-none d-md-flex">
			<div class="container">
				<div class="page-breadcrumb d-flex align-items-center">
					<h3 class="breadcrumb-title pe-3">Sign in</h3>
					<div class="ms-auto">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
								</li>
								<li class="breadcrumb-item"><a href="javascript:;">Authentication</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Sign In</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</section>

		<section class="">
			<div class="container">
				<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
					<div class="row row-cols-1 row-cols-xl-2">
						<div class="col mx-auto">
							<div class="card">
								<div class="card-body">
									<div class="border p-4 rounded">
										<div class="text-center">
											<h3 class="">Sign in</h3>
											<p>Don't have an account yet? <a href="{{route('user.register')}}">Sign up here</a>
											</p>
										</div>
										<div class="d-grid">
											<a class="btn my-4 shadow-sm btn-light" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
													<img class="me-2" src="{{ asset('uset/assets/images/icons/search.svg') }}" width="16" alt="Image Description">
													<span>Sign in with Google</span>
												</span>
											</a> <a href="javascript:;" class="btn btn-light"><i class="bx bxl-facebook"></i>Sign in with Facebook</a>
										</div>
										<div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH EMAIL</span>
											<hr>
										</div>
										<div class="form-body">
											<form class="row g-3" action="{{route('user.login')}}" method="post">
												@csrf
												<div class="col-12">
													<label for="inputEmailAddress" class="form-label">Email Address</label>
													<input type="email" class="form-control @error('email')
                                                        
                                                    @enderror" id="email" placeholder="example@user.com" name="email" value="{{ old('email') }}">
													<div class="text-danger">@error('email') {{ $message }} @enderror</div>
												</div>
												<div class="col-12">
													<label for="inputChoosePassword" class="form-label">Password</label>
													<div class="" id="show_hide_password">
														<input type="password" class="form-control border-end-0 @error('password')
                                                        
                                                    @enderror" id="password" value="{{ old('password') }}" placeholder="Enter Password" name="password">
														<div class="text-danger">@error('password') {{ $message }} @enderror</div>
													</div>
												</div>


												<div class="col-12">
													<div class="d-grid">
														<button type="submit" class="btn btn-light"><i class="bx bxs-lock-open"></i>Sign in</button>
													</div>
												</div>
												<div class="col-md-6">
													<a href="{{route('user.register')}}">Create Account</a>
												</div>
												<div class="col-md-6 text-end"> <a href="{{route('user.forget.password')}}">Forgot Password ?</a>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>

	</div>
</div>


@endsection