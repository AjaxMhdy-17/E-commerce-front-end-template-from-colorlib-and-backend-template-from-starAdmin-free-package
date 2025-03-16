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
                        title={{$title}} />
                    <form action="{{route('admin.product.brand.store')}}" class="forms-sample material-form" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('admin.pages.product.brand.form')
                        <div class="button-container">
                            <button type="submit" class="button btn btn-primary"><span>Submit</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection



