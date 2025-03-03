@extends('admin.layout.main')

@section('title')
index page
@endsection


@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
           <form action="{{route('test.store')}}" method="post">
            @csrf 
            <input type="text" name='name'>
            <button type="submit">click</button>
           </form>
        </div>
    </div>
</div>


@endsection