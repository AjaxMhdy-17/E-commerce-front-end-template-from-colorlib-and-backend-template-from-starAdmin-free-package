@extends('admin.layout.main')

@section('title')
    {{ $title }}
@endsection


@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <x-card-title title="{{ $title }}" />
                <div class="row">
                    <div class="col-md-4 my-3">
                        <label for="">Product Name</label>
                        <p class="label__bg">{{ $product->name }}</p>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="">Product Code</label>
                        <p class="label__bg">{{ $product->code }}</p>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="">Product Quantity</label>
                        <p class="label__bg">{{ $product->quantity }}</p>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="">Product Category</label>
                        <p class="label__bg">{{ $product->category->name }}</p>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="">Product Sub Category</label>
                        <p class="label__bg">{{ $product->subCategory->subcategory_name }}</p>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="">Product Brand Name</label>
                        <p class="label__bg">{{ $product->brand->brand_name }}</p>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="">Product Size </label>
                        <p class="label__bg">{{ $product->size }}</p>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="">Product Color</label>
                        <p class="label__bg">{{ $product->color }}</p>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="">Product Selling Price</label>
                        <p class="label__bg">{{ $product->selling_price }}</p>
                    </div>

                    <div class="col-12 my-3">
                        <label for="">Product Details</label>
                        <p class="">{!! $product->details !!}</p>
                    </div>
                    <div class="col-12 my-3">
                        <label for="">Product Video Link</label>
                        <p class="label__bg">{{ $product->video_link }}</p>
                    </div>


                    <div class="col-md-4 my-3">
                        <label for="">Product Image One</label>
                        <p style="height: 120px ; width : 180px ;margin:15px 0;">
                            <img style="width: 100% ; height : 100%"
                                src="{{ isset($product->image_one) ? asset($product->image_one) : '' }}" alt="image_one">
                        </p>
                    </div>

                    @if (isset($product->image_two))
                        <div class="col-md-4 my-3">
                            <label for="">Product Image Two</label>
                            <p style="height: 120px ; width : 180px ;margin:15px 0;">
                                <img style="width: 100% ; height : 100%"
                                    src="{{ isset($product->image_two) ? asset($product->image_two) : '' }}"
                                    alt="image_two">
                            </p>
                        </div>
                    @endif


                    @if (isset($product->image_three))
                        <div class="col-md-4 my-3">
                            <label for="">Product Image Three</label>
                            <p style="height: 120px ; width : 180px ;margin:15px 0;">
                                <img style="width: 100% ; height : 100%"
                                    src="{{ isset($product->image_three) ? asset($product->image_three) : '' }}"
                                    alt="image_three">
                            </p>
                        </div>
                    @endif

                    <div class="col-md-4 my-3">
                        <div class="d-flex gap-3">
                            @if ($product->main_slider)
                                <div class="badge badge-primary">Active</div>
                            @else
                                <div class="badge badge-warning">InActive</div>
                            @endif
                            <div class="">Main Slider</div>
                        </div>
                    </div>

                    <div class="col-md-4 my-3">
                        <div class="d-flex gap-3">
                            @if ($product->hot_deal)
                                <div class="badge badge-primary">Active</div>
                            @else
                                <div class="badge badge-warning">InActive</div>
                            @endif
                            <div class="">Hot Deal</div>
                        </div>
                    </div>

                    <div class="col-md-4 my-3">
                        <div class="d-flex gap-3">
                            @if ($product->best_rated)
                                <div class="badge badge-primary">Active</div>
                            @else
                                <div class="badge badge-warning">InActive</div>
                            @endif
                            <div class="">Best Rated</div>
                        </div>
                    </div>


                    <div class="col-md-4 my-3">
                        <div class="d-flex gap-3">
                            @if ($product->mid_slider)
                                <div class="badge badge-primary">Active</div>
                            @else
                                <div class="badge badge-warning">InActive</div>
                            @endif
                            <div class="">Mid Slider</div>
                        </div>
                    </div>

                    <div class="col-md-4 my-3">
                        <div class="d-flex gap-3">
                            @if ($product->hot_new)
                                <div class="badge badge-primary">Active</div>
                            @else
                                <div class="badge badge-warning">InActive</div>
                            @endif
                            <div class="">Hot New</div>
                        </div>
                    </div>

                    <div class="col-md-4 my-3">
                        <div class="d-flex gap-3">
                            @if ($product->trend)
                                <div class="badge badge-primary">Active</div>
                            @else
                                <div class="badge badge-warning">InActive</div>
                            @endif
                            <div class="">Trend</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('style')
    <style>
        .label__bg{
            background: #f4f5f7 ; 
            display: block ; 
            padding: 8px ; 
            border-radius: 2px ; 
        }

        .badge-primary{
            width: 67px ; 
        }

    </style>
@endpush
