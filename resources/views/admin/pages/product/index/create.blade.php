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

                            <div class="col-md-4">
                                <div class="form--group">
                                    <label for="size">Product Size</label>
                                    <input type="text" name="size[]" class="form__control" id="size" placeholder="Enter product size">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form--group">
                                    <label for="color">Product Color</label>
                                    <input type="text" name="color[]" class="form__control" id="color" placeholder="Enter product color">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form--group">
                                    <label for="color">Product Selling Price</label>
                                    <input type="text" name="selling_price" class="form__control" id="selling_price" placeholder="Enter product Selling Price">
                                </div>
                            </div>


                            <div class="col-12">

                                <div class="form-group">
                                    <label for="color">Product Details</label>
                                    <textarea id="summernote" name="content" class="form-control"></textarea>
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
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

@endpush




@push('js-lib')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

@endpush


@push('style')
<style>
    .form-group {
        margin: 10px 0 5px 0 !important;
        /* margin: 30px 0 0 0 !important; */
    }

    .form-group label {
        margin: 0px;
    }

    .tom__select {
        border: 1px solid #dee2e6 !important;
        padding: 22px !important;
        margin-top: 20px;
    }

    .ts-control {
        padding: 10px;
    }

    .form--group label {
        font-size: 0.812rem;
    }

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

    .note-toolbar .note-btn i{
        font-size: 12px ;
    }

    .note-placeholder{
        font-size: 13px ;
    }

</style>





@endpush


@push('script')
<script>
    $(document).ready(function() {
        $('.category_select').select2();
    });

    $(document).ready(function() {
        $('.size_select').select2({
            allowClear: true
        });
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        new TomSelect("#size", {
            plugins: ['remove_button'],
            persist: false,
            create: true,
            delimiter: ",",
        });


        new TomSelect("#color", {
            plugins: ['remove_button'],
            persist: false,
            create: true,
            delimiter: ",",
        });

        new TomSelect("#selling_price", {
            plugins: ['remove_button'],
            persist: false,
            create: true,
            maxItems: 1,
            delimiter: ",",
        });


    });
</script>


<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            placeholder: 'Write your content here...',
        });
    });
</script>


@endpush