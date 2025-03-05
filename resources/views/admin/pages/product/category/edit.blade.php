@extends('admin.layout.main')

@section('title')
{{ $title }}
@endsection


@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <x-card-title
                        title={{$title}}
                     />

                    <form class="forms-sample material-form">
                        <div class="form-group">
                            <input type="text" required="required">
                            <label for="input" class="control-label">Category Name</label><i class="bar"></i>
                        </div>
                        <div class="button-container">
                            <button type="button" class="button btn btn-primary"><span>Submit</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection