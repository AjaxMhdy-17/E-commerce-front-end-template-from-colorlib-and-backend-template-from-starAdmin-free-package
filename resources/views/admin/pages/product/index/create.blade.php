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
                    <form action="{{route('admin.product.list.store')}}" class="forms-sample material-form" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="name" value="" required="required">
                                    <label for="input" class="control-label">Please Enter Product Name</label><i class="bar"></i>
                                    @error('name')
                                    <div class="error_message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="code" value="" required="required">
                                    <label for="input" class="control-label">Please Enter Product Code</label><i class="bar"></i>
                                    @error('code')
                                    <div class="error_message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="quantity" value="" required="required">
                                    <label for="input" class="control-label">Please Enter Product Quantity</label><i class="bar"></i>
                                    @error('quantity')
                                    <div class="error_message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-4">
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


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select A Sub Category</label>
                                    <select name="sub_category_id" class="category_select">
                                        <option value="">Select A Sub Category</option>
                                        @forelse ($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}">{{$sub_category->subcategory_name}}</option>
                                        @empty
                                        <option value="">No Category Added</option>
                                        @endforelse
                                    </select>

                                    @error('sub_category_id')
                                    <div class="error_message" style="position: fixed;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select A Brand Name</label>
                                    <select name="brand_id" class="category_select">
                                        <option value="">Select A Sub Category</option>
                                        @forelse ($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                        @empty
                                        <option value="">No Category Added</option>
                                        @endforelse
                                    </select>

                                    @error('brand_id')
                                    <div class="error_message" style="position: fixed;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Multiple</label>
                                    <select name="size[]" class="size_select" style="width: 100%;" multiple="multiple">
                                        <option value="AL">Alabama</option>
                                        <option value="WY">Wyoming</option>
                                        <option value="AM">America</option>
                                        <option value="CA">Canada</option>
                                        <option value="RU">Russia</option>
                                    </select>
                                    @error('size')
                                    <div class="error_message" style="position: fixed;">{{ $message }}</div>
                                    @enderror
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
    .form-group {
        margin: 10px 0 15px 0 !important;
    }
</style>


<style>
    .select2-selection__choice__remove:hover {
        background: white !important;
        color: #000 !important;
    }

    .select2-container {
        width: 100% !important;
    }

    .select2-selection--multiple .select2-selection__rendered {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        white-space: nowrap;
    }

    .select2-selection--multiple .select2-selection__choice {
        display: inline-flex;
        align-items: center;
        margin: 2px;
        padding: 2px 6px;
        background-color: #e4e4e4;
        border: 1px solid #ccc;
        border-radius: 4px;
        white-space: nowrap;
    }

    .select2-selection--multiple .select2-selection__choice__remove {
        margin-left: 6px;
        color: #999;
        cursor: pointer;
    }

    .select2-selection--multiple .select2-search--inline {
        display: inline-block;
        flex: 1;
    }

    .select2-selection--multiple .select2-search__field {
        width: auto !important;
        margin: 0 !important;
        padding: 0 !important;
        border: none !important;
        box-shadow: none !important;
        min-width: 20px;
    }
</style>

@endpush


@push('script')
<script>
    $(document).ready(function() {
        $('.category_select').select2();
    });
</script>


<script>
    $(document).ready(function() {
        $('.size_select').select2({
            allowClear: true
        });
    });
</script>

@endpush