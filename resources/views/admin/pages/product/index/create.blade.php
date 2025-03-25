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
                        <x-card-title title="Product Create" />
                        <form action="{{ route('admin.product.list.store') }}" class="forms-sample material-form"
                            method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form__group">
                                        <label for="name">Product Name <x-star-mark /> </label>
                                        <input type="text" name='name' value="{{ old('name') }}"
                                            class="form-control" id="name" />
                                        <div class="error__message">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form__group">
                                        <label for="code">Product Code <x-star-mark /></label>
                                        <input type="text" name='code' value="{{ old('code') }}"
                                            class="form-control" id="code" />
                                        <div class="error__message">
                                            @error('code')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form__group">
                                        <label for="quantity">Product Quantity <x-star-mark /></label>
                                        <input type="text" name='quantity' value="{{ old('quantity') }}"
                                            class="form-control" id="quantity" />

                                        <div class="error__message">
                                            @error('quantity')
                                                {{ $message }}
                                            @enderror
                                        </div>

                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Select A Category <x-star-mark /></label>
                                        <select name="category_id" class="category_select" id="category_select">
                                            <option value="">Select A Category</option>
                                            @forelse ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @empty
                                                <option value="">No Category Added</option>
                                            @endforelse
                                        </select>

                                        <div class="error__message">
                                            @error('category_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Select A Sub Category <x-star-mark /></label>
                                        <select name="sub_category_id" id='sub_category_id' class="category_select">
                                            <option value="">Select A Sub Category</option>
                                        </select>

                                        <div class="error__message">
                                            @error('sub_category_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Select A Brand Name <x-star-mark /></label>
                                        <select name="brand_id" class="category_select">
                                            <option value="">Select A Brand Name</option>
                                            @forelse ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->brand_name }}</option>
                                            @empty
                                                <option value="">No Category Added</option>
                                            @endforelse
                                        </select>

                                        <div class="error__message">
                                            @error('brand_id')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form--group">
                                        <label for="size">Product Size (Multiple) <x-star-mark /></label>
                                        <input type="text" name="size" value="{{ old('size') }}"
                                            class="form__control" id="size">

                                        <div class="error__message">
                                            @error('size')
                                                {{ $message }}
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form--group">
                                        <label for="color">Product Color (Multiple) <x-star-mark /></label>
                                        <input type="text" name="color" value="{{ old('color') }}"
                                            class="form__control" id="color">

                                        <div class="error__message">
                                            @error('color')
                                                {{ $message }}
                                            @enderror
                                        </div>

                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form--group">
                                        <label for="color">Product Selling Price <x-star-mark /></label>
                                        <input type="text" name="selling_price" value="{{ old('selling_price') }}"
                                            class="form__control" id="selling_price">

                                        <div class="error__message">
                                            @error('selling_price')
                                                {{ $message }}
                                            @enderror
                                        </div>

                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="color">Product Details <x-star-mark /></label>
                                        <textarea id="summernote" name="details" value="{{ old('details') }}" class="form-control"></textarea>

                                        <div class="error__message">
                                            @error('details')
                                                {{ $message }}
                                            @enderror
                                        </div>

                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="form__group">
                                        <label for="video_link">Video Link</label>
                                        <input type="text" name='video_link' value="{{ old('video_link') }}"
                                            class="form-control" id="video_link">
                                        <div class="error__message">
                                            @error('video_link')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4 my-3">
                                    <div class="form__group">
                                        <input type="file" hidden name="image_one" id="image_one" accept="image/*">
                                        <input type="hidden" name="existing_image_one" id="existing_image_one"
                                            value="">
                                        <label for="image_one" class="custom-file-label">Upload Image One</label>
                                        <div class="preview-container" id="preview-container-one" style="display: none;">
                                            <img id="image_one_preview" src="" alt="Uploaded Image"
                                                style="display: block;">
                                            <img id="default_image_one_preview"
                                                src="https://tpc.googlesyndication.com/simgad/11292242217618016428"
                                                alt="Default Image" style="display: none;">
                                        </div>

                                        <div class="error__message">
                                            @error('image_one')
                                                {{ $message }}
                                            @enderror
                                        </div>


                                    </div>
                                </div>

                                <div class="col-md-4 my-3">
                                    <div class="form__group">
                                        <input type="file" hidden name="image_two" id="image_two" accept="image/*">
                                        <input type="hidden" name="existing_image_two" id="existing_image_two"
                                            value="">
                                        <label for="image_two" class="custom-file-label">Upload Image Two</label>
                                        <div class="preview-container" id="preview-container-two" style="display: none;">
                                            <img id="image_two_preview" src="" alt="Uploaded Image"
                                                style="display: block;">
                                            <img id="default_image_two_preview"
                                                src="https://tpc.googlesyndication.com/simgad/11292242217618016428"
                                                alt="Default Image" style="display: none;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 my-3">
                                    <div class="form__group">
                                        <input type="file" hidden name="image_three" id="image_three"
                                            accept="image/*">
                                        <input type="hidden" name="existing_image_three" id="existing_image_three"
                                            value="">
                                        <label for="image_three" class="custom-file-label">Upload Image Three</label>
                                        <div class="preview-container" id="preview-container-three"
                                            style="display: none;">
                                            <img id="image_three_preview" src="" alt="Uploaded Image"
                                                style="display: block;">
                                            <img id="default_image_three_preview"
                                                src="https://tpc.googlesyndication.com/simgad/11292242217618016428"
                                                alt="Default Image" style="display: none;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label" for="main_slider">
                                            <input type="checkbox" name='main_slider' id="main_slider"
                                                class="form-check-input" checked="">
                                            Main Slider
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label" for="hot_deal">
                                            <input type="checkbox" name='hot_deal' id="hot_deal"
                                                class="form-check-input" checked="">
                                            Hot Deal
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label" for="best_rated">
                                            <input type="checkbox" name='best_rated' id="best_rated"
                                                class="form-check-input" checked="">
                                            Best Rated
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label" for="trend">
                                            <input type="checkbox" name='trend' id="trend"
                                                class="form-check-input" checked="">
                                            Trend Product
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label" for="mid_slider">
                                            <input type="checkbox" name='mid_slider' id="mid_slider"
                                                class="form-check-input" checked="">
                                            Mid Slider
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-check">
                                        <label class="form-check-label" for="hot_new">
                                            <input type="checkbox" name='hot_new' id="hot_new"
                                                class="form-check-input" checked="">
                                            Hot New
                                            <i class="input-helper"></i></label>
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
        .error__message {
            color: red;
            font-size: 13px;
        }

        .preview-container {
            margin-top: 10px;
        }

        .preview-container img {
            max-width: 150px;
            max-height: 150px;
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 5px;
        }

        .custom-file-label {
            cursor: pointer;
            position: static;
            width: 100%;
            padding: 10px 10px;
            height: auto;
        }

        .custom-file-label::after {
            height: calc(2.2em + .75rem);
            display: flex;
            align-items: center;
        }

        .form__group label {
            font-size: 13px;
            margin-bottom: 2px;

        }

        .form__group input {
            padding: 8px 10px;
            height: auto;
        }

        .form__group input:focus {
            border-color: #d0d0d0;
        }

        .form__group input::placeholder {
            color: #303030;
        }

        .form-group {
            margin: 10px 0 5px 0 !important;
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
            margin-bottom: 2px;
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

        .note-toolbar .note-btn i {
            font-size: 12px;
        }

        .note-placeholder {
            font-size: 13px;
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

        $(document).ready(function() {
            $('#summernote').summernote({
                height: 140,
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

        document.addEventListener('DOMContentLoaded', function() {
            function setupImagePreview(fileInputId, previewContainerId, previewImageId, defaultImageId,
                existingImageInputId) {
                const fileInput = document.getElementById(fileInputId);
                const previewContainer = document.getElementById(previewContainerId);
                const previewImage = document.getElementById(previewImageId);
                const defaultImage = document.getElementById(defaultImageId);
                const existingImageInput = document.getElementById(existingImageInputId);

                function toggleImages() {
                    if (previewImage.src && previewImage.src !== window.location.origin + "/") {
                        previewImage.style.display = 'block';
                        defaultImage.style.display = 'none';
                    } else {
                        previewImage.style.display = 'none';
                        defaultImage.style.display = 'block';
                    }
                }
                toggleImages();
                fileInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewImage.src = e.target.result;
                            previewContainer.style.display = 'block';
                            toggleImages();
                            existingImageInput.value = '';
                        };
                        reader.readAsDataURL(file);
                    } else {
                        previewImage.src = '';
                        toggleImages();
                    }
                });
            }
            setupImagePreview('image_one', 'preview-container-one', 'image_one_preview',
                'default_image_one_preview', 'existing_image_one');
            setupImagePreview('image_two', 'preview-container-two', 'image_two_preview',
                'default_image_two_preview', 'existing_image_two');
            setupImagePreview('image_three', 'preview-container-three', 'image_three_preview',
                'default_image_three_preview', 'existing_image_three');
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#category_select').change(function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/admin/product/get/subcategory/') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#sub_category_id').empty().append(
                                '<option value="">Select A Sub Category</option>');

                            $.each(data, function(key, value) {
                                $('#sub_category_id').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>'
                                );
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error: " + status + error);
                        }
                    });
                } else {
                    $('#sub_category_id').empty().append('<option value="">Select A Sub Category</option>');
                }
            });


        });
    </script>
@endpush
