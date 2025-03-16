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
                    <form action="{{route('admin.product.sub-category.store')}}" class="forms-sample material-form" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select A Category</label>
                                    <select name="category_id" class="category_select">
                                        <option value="">Select A Category</option>
                                        @forelse ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @empty
                                        <option value="">No Category Added</option>
                                        @endforelse
                                    </select>

                                    @error('category_name')
                                     <div class="error_message" style="position: fixed;">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="h-100 px-2 pb-1" style="align-content: end;">
                                    <div class="form-group">
                                        <input type="text" name="subcategory_name" value="" required="required">
                                        <label for="subcategory_name" class="control-label">Please Enter SubCategory Name</label><i class="bar"></i>
                                        @error('subcategory_name')
                                        <div class="error_message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

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


@push('css-lib')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('js-lib')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush

@push('style')
<style>

</style>
@endpush

@push('script')
<script>
    $(document).ready(function() {
        $('.category_select').select2();
    });
</script>
@endpush