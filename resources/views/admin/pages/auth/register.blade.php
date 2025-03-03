@include('admin.layout.head_libs')


<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('aset/assets/images/logo.svg') }}" alt="logo">
                            </div>
                            <h4>New here?</h4>
                            <h6 class="fw-light">Signing up is easy. It only takes a few steps</h6>
                            <form action="{{route('admin.register')}}" method="POST" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg @error('name')
                                        is-valid
                                    @enderror " id="name" placeholder="Username" name="name" value="{{ old('name') }}">
                                    <div class="text-danger">@error('name') {{ $message }} @enderror</div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg @error('email')
                                        is-valid
                                    @enderror" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                                    <div class="text-danger">@error('email') {{ $message }} @enderror</div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg @error('password')
                                        is-valid
                                    @enderror" id="password" placeholder="Password" name="password" value="{{ old('password') }}">
                                    <div class="text-danger">@error('password') {{ $message }} @enderror</div>
                                </div>

                                <div class="mt-3 d-grid gap-2">
                                    <button class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn" type="submit">SIGN UP</button>
                                </div>
                                <div class="text-center mt-4 fw-light"> Already have an account? <a href="{{route('admin.login')}}" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    @include('admin.layout.footer_libs')

</body>

</html>