@extends('admin.layout.main')

@section('title')
index page
@endsection


@section('content')


<div class="content-wrapper" data-select2-id="11">
    <!-- <div class="row" data-select2-id="10"> -->
    <div class="grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Default form</h4>
                <p class="card-description"> Basic form layout </p>


                <form class="forms-sample material-form" method="POST" action=""><input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input type="text" required="required" name="username" id="username" value="{{ old('username') }}">
                        <label for="input" class="control-label">Username</label><i class="bar"></i>
                        <div class="text-danger">@error('username') {{ $message }} @enderror</div>
                    </div>
                    <div class="form-group">
                        <input type="email" required="required" name="email" id="email" value="{{ old('email') }}">
                        <label for="input" class="control-label">Email address</label><i class="bar"></i>
                        <div class="text-danger">@error('email') {{ $message }} @enderror</div>
                    </div>
                    <div class="form-group">
                        <input type="number" required="required" name="phone" id="phone" value="{{ old('phone') }}">
                        <label for="input" class="control-label">Password</label><i class="bar"></i>
                        <div class="text-danger">@error('phone') {{ $message }} @enderror</div>
                    </div>
                    <div class="form-group">
                        <input type="text" required="required">
                        <label for="input" class="control-label">Confirm Password</label><i class="bar"></i>
                    </div>
                    <div class="form-group">
                        <textarea required="required"></textarea>
                        <label for="textarea" class="control-label">Message</label><i class="bar"></i>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" checked><i class="helper"></i>Remember me </label>
                    </div>
                    <div class="button-container">
                        <button type="button" class="button btn btn-primary"><span>Submit</span></button>
                    </div>
                </form>

            </div>
        </div>

    </div>
    <!-- </div> -->
</div>


@endsection