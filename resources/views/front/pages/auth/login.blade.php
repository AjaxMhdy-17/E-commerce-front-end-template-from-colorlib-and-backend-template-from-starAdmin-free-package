@extends('front.layout.main')

@section('title')
login page
@endsection


@section('content')

<div class="page-wrapper">
	<div class="page-content">
		<section class="">
			<div class="container">
				<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
					<div class="row row-cols-1 row-cols-xl-2 my-5">
						<div class="col mx-auto">
							<div class="card">
								<div class="card-body">
									<div class="border p-4 rounded">
										<div class="text-center">
											<h3 class="">Sign in</h3>
											<p>Don't have an account yet? <a href="{{route('user.register')}}">Sign up here</a>
											</p>
										</div>
										<div class="form-body">
											<form class="row g-3" action="{{route('user.login')}}" method="post">
												@csrf
												<div class="col-md-8 mx-auto my-3">
													<label for="inputEmailAddress" class="form-label">Email Address</label>
													<input type="email" class="form-control @error('email')
                                                        
                                                    @enderror" id="email" placeholder="example@user.com" name="email" value="{{ old('email') }}">
													<div class="text-danger">@error('email') {{ $message }} @enderror</div>
												</div>
												<div class="col-md-8 mx-auto my-3">
													<label for="inputChoosePassword" class="form-label">Password</label>
													<div class="" id="show_hide_password">
														<input type="password" class="form-control border-end-0 @error('password')
                                                        
                                                    @enderror" id="password" value="{{ old('password') }}" placeholder="Enter Password" name="password">
														<div class="text-danger">@error('password') {{ $message }} @enderror</div>
													</div>
												</div>


												<div class="col-md-8 mx-auto my-3">
													<div class="d-grid">
														<button type="submit" class="btn btn-info"><i class="bx bxs-lock-open"></i>Sign in</button>
													</div>
												</div>

												<div class="col-md-8 mx-auto">
													<div class="row">
														<div class="col-md-6">
															<a href="{{route('user.register')}}">Create Account</a>
														</div>
														<div class="col-md-6 d-flex text-end"> <a href="{{route('user.forget.password')}}" class="ml-auto">Forgot Password ?</a>
														</div>
													</div>
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