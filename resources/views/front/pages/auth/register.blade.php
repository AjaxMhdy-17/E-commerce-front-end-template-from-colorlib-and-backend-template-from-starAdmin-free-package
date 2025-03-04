@extends('front.layout.main')

@section('title')
register page
@endsection


@section('content')


<div class="page-wrapper">
    <div class="page-content">

        <section class="py-0 py-lg-5">
            <div class="container">
                <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
                    <div class="row row-cols-1 row-cols-lg-1 row-cols-xl-2">
                        <div class="col mx-auto">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="border p-4 rounded">
                                        <div class="text-center">
                                            <h3 class="">Sign Up</h3>
                                            <p>Already have an account? <a href="{{route('user.login')}}">Login in here</a>
                                            </p>
                                        </div>
                                        
                                        <div class="form-body">

                                            <form class="row g-3" method="POST" action="{{route('user.register')}}">
                                                @csrf
                                                <div class="col-md-8 mx-auto my-3">
                                                    <label for="inputFirstName" class="form-label">User Name</label>
                                                    <input type="text" class="form-control @error('name')
                                                        
                                                    @enderror  " id="name" placeholder="Jhon" name="name" value="{{ old('name') }}">
                                                    <div class="text-danger">@error('name') {{ $message }} @enderror</div>
                                                </div>

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
                                                        <button type="submit" class="btn btn-primary"><i class="bx bx-user"></i>Sign up</button>
                                                    </div>
                                                </div>

                                                <div class="col-md-8 mx-auto my-3">
                                                    Already Have An Account?, <a href="{{route('user.login')}}">Login Here</a>
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