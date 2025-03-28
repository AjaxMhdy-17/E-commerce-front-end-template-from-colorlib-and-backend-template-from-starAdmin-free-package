@extends('front.layout.main')

@section('title')
    home page
@endsection


@section('content')
    <div class="banner">
        <div class="banner_background"
            style="background-image: url('{{ asset('uset/assets/images/banner_background.jpg') }}')"></div>
        <div class="container fill_height">
            <div class="row fill_height">
                <div class="banner_product_image"><img src="{{ asset($mainSlider->image_one) }}" alt="img"></div>
                <div class="col-lg-5 offset-lg-4 fill_height">
                    <div class="banner_content">
                        <h1 class="banner_text">new era of smartphones</h1>
                        <div class="banner_price">
                            @if (isset($mainSlider->discount_price))
                                <span>${{ $mainSlider->selling_price }}</span> ${{ $mainSlider->discount_price }}
                            @else
                                ${{ $mainSlider->selling_price }}
                            @endif
                        </div>
                        <div class="banner_product_name">{{ $mainSlider->name }}</div>
                        <div class="button banner_button"><a href="#">Shop Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Characteristics -->

    <div class="characteristics">
        <div class="container">
            <div class="row">

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('uset/assets/images/char_1.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('uset/assets/images/char_2.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('uset/assets/images/char_3.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('uset/assets/images/char_4.png') }}" alt="img"></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Deals of the week -->

    <div class="deals_featured">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-lg-row flex-column align-items-_center justify-content-start">

                    <!-- Deals -->

                    <div class="deals">
                        <div class="deals_title">Deals of the Week</div>
                        <div class="deals_slider_container">

                            <!-- Deals Slider -->
                            <div class="owl-carousel owl-theme deals_slider">


                                @forelse ($hotDeals as $deal)
                                    <div class="owl-item deals_item">
                                        <div class="deals_image"><img src="{{ asset($deal->image_one) }}" alt="img">
                                        </div>
                                        <div class="deals_content">
                                            <div class="deals_info_line d-flex flex-row justify-content-start">
                                                <div class="deals_item_category"><a
                                                        href="#">{{ $deal->category->name }}</a></div>
                                                <div class="deals_item_price_a ml-auto">${{ $deal->selling_price }}</div>
                                            </div>
                                            <div class="deals_info_line d-flex flex-row justify-content-start">
                                                <div class="deals_item_name">${{ $deal->name }}</div>
                                                <div class="deals_item_price ml-auto">${{ $deal->discount_price }}</div>
                                            </div>
                                            <div class="available">
                                                <div class="available_line d-flex flex-row justify-content-start">
                                                    <div class="available_title">Available:
                                                        <span>{{ $deal->quantity }}</span>
                                                    </div>
                                                    <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                                                </div>
                                                <div class="available_bar"><span style="width:17%"></span></div>
                                            </div>
                                            <div
                                                class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                                <div class="deals_timer_title_container">
                                                    <div class="deals_timer_title">Hurry Up</div>
                                                    <div class="deals_timer_subtitle">Offer ends in:</div>
                                                </div>
                                                <div class="deals_timer_content ml-auto">
                                                    <div class="deals_timer_box clearfix" data-target-time="">
                                                        <div class="deals_timer_unit">
                                                            <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                            <span>hours</span>
                                                        </div>
                                                        <div class="deals_timer_unit">
                                                            <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                            <span>mins</span>
                                                        </div>
                                                        <div class="deals_timer_unit">
                                                            <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                            <span>secs</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div>Not Hot Deals of the Week
                                    </div>
                                @endforelse
                            </div>

                        </div>

                        <div class="deals_slider_nav_container">
                            <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i>
                            </div>
                            <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Featured -->
                    <div class="featured">
                        <div class="tabbed_container">
                            <div class="tabs">
                                <ul class="clearfix">
                                    <li class="active">Featured</li>
                                    <li>Trends</li>
                                    <li>Best Rated</li>
                                </ul>
                                <div class="tabs_line"><span></span></div>
                            </div>

                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="featured_slider slider">

                                    @forelse ($featureds as $feat)
                                        <div class="featured_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset($feat->image_one) }}" alt="img">
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price discount">

                                                        @if ($feat->discount_price != null)
                                                            ${{ $feat->discount_price }}<span>${{ $feat->selling_price }}</span>
                                                        @else
                                                            {{ $feat->selling_price }}
                                                        @endif

                                                    </div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">{{ $feat->name }}</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Add to Cart</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount">
                                                        -{{ (int) ((($feat->selling_price - $feat->discount_price) / $feat->selling_price) * 100) }}%
                                                    </li>
                                                    <li class="product_mark product_new">new</li>
                                                </ul>
                                            </div>
                                        </div>
                                    @empty
                                        <div>No Items Added .</div>
                                    @endforelse

                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>

                            <!-- Product Panel -->

                            <div class="product_panel panel">
                                <div class="featured_slider slider">
                                    @forelse ($trends as $trend)
                                        <div class="featured_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset($trend->image_one) }}" alt="img">
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price discount">


                                                        @if ($trend->discount_price != null)
                                                            ${{ $trend->discount_price }}<span>${{ $trend->selling_price }}</span>
                                                        @else
                                                            {{ $trend->selling_price }}
                                                        @endif

                                                    </div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">{{ $trend->name }}</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Add to Cart</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount">
                                                        -{{ (int) ((($trend->selling_price - $trend->discount_price) / $trend->selling_price) * 100) }}%
                                                    </li>
                                                    <li class="product_mark product_new">new</li>
                                                </ul>
                                            </div>
                                        </div>
                                    @empty
                                        <div>No Items Added .</div>
                                    @endforelse

                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>

                            <!-- Product Panel -->

                            <div class="product_panel panel">
                                <div class="featured_slider slider">

                                    @forelse ($bestRateds as $rate)
                                        <div class="featured_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset($rate->image_one) }}" alt="img">
                                                </div>
                                                <div class="product_content">
                                                    <div class="product_price discount">

                                                        @if ($rate->discount_price != null)
                                                            ${{ $rate->discount_price }}<span>${{ $rate->selling_price }}</span>
                                                        @else
                                                            {{ $rate->selling_price }}
                                                        @endif

                                                    </div>
                                                    <div class="product_name">
                                                        <div><a href="product.html">{{ $rate->name }}</a></div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button">Add to Cart</button>
                                                    </div>
                                                </div>
                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                <ul class="product_marks">
                                                    <li class="product_mark product_discount">
                                                        -{{ (int) ((($rate->selling_price - $rate->discount_price) / $rate->selling_price) * 100) }}%
                                                    </li>
                                                    <li class="product_mark product_new">new</li>
                                                </ul>
                                            </div>
                                        </div>
                                    @empty
                                        <div>No Items Added .</div>
                                    @endforelse

                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Popular Categories -->

    <div class="popular_categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="popular_categories_content">
                        <div class="popular_categories_title">Popular Categories</div>
                        <div class="popular_categories_slider_nav">
                            <div class="popular_categories_prev popular_categories_nav"><i
                                    class="fas fa-angle-left ml-auto"></i></div>
                            <div class="popular_categories_next popular_categories_nav"><i
                                    class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                        <div class="popular_categories_link"><a href="#">full catalog</a></div>
                    </div>
                </div>

                <!-- Popular Categories Slider -->

                <div class="col-lg-9">
                    <div class="popular_categories_slider_container">
                        <div class="owl-carousel owl-theme popular_categories_slider">

                            <!-- Popular Categories Item -->
                            <div class="owl-item">
                                <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                    <div class="popular_category_image"><img
                                            src="{{ asset('uset/assets/images/popular_1.png') }}" alt="img"></div>
                                    <div class="popular_category_text">Smartphones & Tablets</div>
                                </div>
                            </div>

                            <!-- Popular Categories Item -->
                            <div class="owl-item">
                                <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                    <div class="popular_category_image"><img
                                            src="{{ asset('uset/assets/images/popular_2.png') }}" alt="img"></div>
                                    <div class="popular_category_text">Computers & Laptops</div>
                                </div>
                            </div>

                            <!-- Popular Categories Item -->
                            <div class="owl-item">
                                <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                    <div class="popular_category_image"><img
                                            src="{{ asset('uset/assets/images/popular_3.png') }}" alt="img"></div>
                                    <div class="popular_category_text">Gadgets</div>
                                </div>
                            </div>

                            <!-- Popular Categories Item -->
                            <div class="owl-item">
                                <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                    <div class="popular_category_image"><img
                                            src="{{ asset('uset/assets/images/popular_4.png') }}" alt="img"></div>
                                    <div class="popular_category_text">Video Games & Consoles</div>
                                </div>
                            </div>

                            <!-- Popular Categories Item -->
                            <div class="owl-item">
                                <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                    <div class="popular_category_image"><img
                                            src="{{ asset('uset/assets/images/popular_5.png') }}" alt="img"></div>
                                    <div class="popular_category_text">Accessories</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner -->

    <div class="banner_2">
        <div class="banner_2_background"
            style="background-image: url('{{ asset('uset/assets/images/banner_2_background.jpg') }}')"></div>
        <div class="banner_2_container">
            <div class="banner_2_dots"></div>
            <!-- Banner 2 Slider -->

            <div class="owl-carousel owl-theme banner_2_slider">



                @forelse ($midSliders as $slider)
                    <div class="owl-item">
                        <div class="banner_2_item">
                            <div class="container fill_height">
                                <div class="row fill_height">
                                    <div class="col-lg-4 col-md-6 fill_height">
                                        <div class="banner_2_content">
                                            <div class="banner_2_category">{{ $slider->category->name }}</div>
                                            <div class="banner_2_title">{{ $slider->name }}</div>
                                            <div class="banner_2_text">{!! $slider->details !!}</div>
                                            <div class="rating_r rating_r_4 banner_2_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <div class="button banner_2_button"><a href="#">Explore</a></div>
                                        </div>

                                    </div>
                                    <div class="col-lg-8 col-md-6 fill_height">
                                        <div class="banner_2_image_container">
                                            {{-- <div class="banner_2_image">
                                        <img src="{{asset('uset/assets/images/banner_2_product.png')}}" alt="img">
                                    </div> --}}
                                            <div class="banner_2_image" style="width : 300px "><img style="width:100%"
                                                    src="{{ asset($slider->image_one) }}" alt="img"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <div>No Slider Added </div>
                @endforelse

            </div>
        </div>
    </div>

    <!-- Hot New Arrivals -->

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">Hot New Arrivals</div>
                            <ul class="clearfix">
                                @forelse ($cats as $index => $cat)
                                    <li class="{{ $index == 0 ? 'active' : '' }}">
                                        {{ $cat['name'] }}
                                    </li>
                                @empty
                                    <li>No Category</li>
                                @endforelse
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9" style="z-index:1;">

                                @forelse ($cats as $index => $cat)
                                    @php
                                        $products = $hotsNew->where('category_id', $cat['id']);
                                    @endphp

                                    <div class="product_panel panel {{ $index == 0 ? 'active' : '' }}">
                                        <div class="arrivals_slider slider">

                                            @forelse ($products as $item)
                                                <div class="arrivals_slider_item">
                                                    <div class="border_active"></div>
                                                    <div
                                                        class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                        <div
                                                            class="product_image d-flex flex-column align-items-center justify-content-center">
                                                            <img src="{{ asset($item->image_one) }}" alt="img">
                                                        </div>
                                                        <div class="product_content">
                                                            <div class="product_price">${{ $item->selling_price }}</div>
                                                            <div class="product_name">
                                                                <div><a href="product.html">{{ $item->name }}</a></div>
                                                            </div>
                                                            <div class="product_extras">
                                                                <div class="product_color">
                                                                    <input type="radio" checked name="product_color"
                                                                        style="background:#b19c83">
                                                                    <input type="radio" name="product_color"
                                                                        style="background:#000000">
                                                                    <input type="radio" name="product_color"
                                                                        style="background:#999999">
                                                                </div>
                                                                <button class="product_cart_button">Add to Cart</button>
                                                            </div>
                                                        </div>
                                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                        <ul class="product_marks">
                                                            <li class="product_mark product_discount">
                                                                -{{ (int) ((($item->selling_price - $item->discount_price) / $item->selling_price) * 100) }}%
                                                            </li>
                                                            <li class="product_mark product_new">new</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @empty
                                                <div>
                                                    Not Product In This Category
                                                </div>
                                            @endforelse
                                        </div>
                                        <div class="arrivals_slider_dots_cover"></div>
                                    </div>
                                @empty
                                    <li>No Category</li>
                                @endforelse
                            </div>

                            <div class="col-lg-3">
                                <div class="arrivals_single clearfix">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <div class="arrivals_single_image"><img src="{{ asset($hotsNew[0]->image_one) }}"
                                                alt="img">
                                        </div>
                                        <div class="arrivals_single_content">
                                            <div class="arrivals_single_category"><a
                                                    href="#">{{ $hotsNew[0]->category->name }}</a>
                                            </div>
                                            <div class="arrivals_single_name_container clearfix">
                                                <div class="arrivals_single_name"><a
                                                        href="#">{{ $hotsNew[0]->name }}</a>
                                                </div>
                                                <div class="arrivals_single_price text-right">
                                                    ${{ $hotsNew[0]->selling_price }}</div>
                                            </div>
                                            <div class="rating_r rating_r_4 arrivals_single_rating">
                                                <i></i><i></i><i></i><i></i><i></i>
                                            </div>
                                            <form action="#"><button class="arrivals_single_button">Add to
                                                    Cart</button></form>
                                        </div>
                                        <div class="arrivals_single_fav product_fav active"><i class="fas fa-heart"></i>
                                        </div>
                                        <ul class="arrivals_single_marks product_marks">
                                            <li class="arrivals_single_mark product_mark product_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Best Sellers -->

    <div class="best_sellers">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">Hot Best Sellers</div>
                            <ul class="clearfix">
                                @forelse ($deals as $index => $deal)
                                    <li class="{{ $index == 0 ? 'active' : '' }}">
                                        {{ $deal['name'] }}
                                    </li>
                                @empty
                                    <li>No Category</li>
                                @endforelse
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>


                        @forelse ($deals as $index => $deal)
                            @php
                                $products = $hotDeals->where('category_id', $deal['id']);
                            @endphp

                            <div class="bestsellers_panel panel {{ $index == 0 ? 'active' : '' }}">
                                <div class="bestsellers_slider slider">

                                    @forelse ($products as $prod)
                                        <div
                                            class="bestsellers_item {{ $prod->discount_price != null ? 'discount' : '' }}">
                                            <div
                                                class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                <div class="bestsellers_image"><img src="{{ asset($prod->image_one) }}"
                                                        alt="img">
                                                </div>
                                                <div class="bestsellers_content">
                                                    <div class="bestsellers_category"><a
                                                            href="#">{{ $prod->category->name }}</a>
                                                    </div>
                                                    <div class="bestsellers_name"><a
                                                            href="product.html">{{ $prod->name }}</a>
                                                    </div>
                                                    <div class="rating_r rating_r_4 bestsellers_rating">
                                                        <i></i><i></i><i></i><i></i><i></i>
                                                    </div>
                                                    <div class="bestsellers_price discount">
                                                        @if ($prod->discount_price != null)
                                                            ${{ $prod->discount_price }}<span>${{ $prod->selling_price }}</span>
                                                        @else
                                                            ${{ $prod->selling_price }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                            <ul class="bestsellers_marks">
                                                <li class="bestsellers_mark bestsellers_discount">
                                                    -{{ (int) ((($prod->selling_price - $prod->discount_price) / $prod->selling_price) * 100) }}%
                                                </li>
                                                <li class="bestsellers_mark bestsellers_new">new</li>
                                            </ul>
                                        </div>
                                    @empty
                                        <div>No Hot Deals Product for this category</div>
                                    @endforelse
                                </div>
                            </div>

                        @empty
                            <div>No Best Sellers Added</div>
                        @endforelse

                        {{-- <div class="bestsellers_panel panel active"> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Trends -->

    <div class="trends">
        <div class="trends_background"></div>
        <div class="trends_overlay"></div>
        <div class="container">
            <div class="row">

                <!-- Trends Content -->
                <div class="col-lg-3">
                    <div class="trends_container">
                        <h2 class="trends_title">Trends 2018</h2>
                        <div class="trends_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p>
                        </div>
                        <div class="trends_slider_nav">
                            <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Trends Slider -->
                <div class="col-lg-9">
                    <div class="trends_slider_container">

                        <div class="owl-carousel owl-theme trends_slider">
                            @forelse ($trends as $trend)
                                <div class="owl-item">
                                    <div class="trends_item {{ $trend->hot_new == 1 ? 'is_new' : '' }}">
                                        <div
                                            class="trends_image d-flex flex-column align-items-center justify-content-center">
                                            <img src="{{ asset($trend->image_one) }}" alt="img">
                                        </div>
                                        <div class="trends_content">
                                            <div class="trends_category"><a
                                                    href="#">{{ $trend->category->name }}</a></div>
                                            <div class="trends_info clearfix">
                                                <div class="trends_name"><a href="product.html">{{ $trend->name }}</a>
                                                </div>
                                                <div class="trends_price">${{ $trend->selling_price }}</div>
                                            </div>
                                        </div>
                                        <ul class="trends_marks">
                                            <li class="trends_mark trends_discount">-25%</li>
                                            <li class="trends_mark trends_new">new</li>
                                        </ul>
                                        <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                    </div>
                                </div>
                            @empty
                                <div>No Trending Items Here</div>
                            @endforelse

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Recently Viewed -->

    <div class="viewed">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="viewed_title_container">
                        <h3 class="viewed_title">Recently Viewed</h3>
                        <div class="viewed_nav_container">
                            <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>

                    <div class="viewed_slider_container">

                        <!-- Recently Viewed Slider -->

                        <div class="owl-carousel owl-theme viewed_slider">

                            <!-- Recently Viewed Item -->
                            <div class="owl-item">
                                <div
                                    class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="{{ asset('uset/assets/images/view_1.jpg') }}"
                                            alt="img"></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">$225<span>$300</span></div>
                                        <div class="viewed_name"><a href="#">Beoplay H7</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Recently Viewed Item -->
                            <div class="owl-item">
                                <div
                                    class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="{{ asset('uset/assets/images/view_2.jpg') }}"
                                            alt="img"></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">$379</div>
                                        <div class="viewed_name"><a href="#">LUNA Smartphone</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Recently Viewed Item -->
                            <div class="owl-item">
                                <div
                                    class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="{{ asset('uset/assets/images/view_3.jpg') }}"
                                            alt="img"></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">$225</div>
                                        <div class="viewed_name"><a href="#">Samsung J730F...</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Recently Viewed Item -->
                            <div class="owl-item">
                                <div
                                    class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="{{ asset('uset/assets/images/view_4.jpg') }}"
                                            alt="img"></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">$379</div>
                                        <div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Recently Viewed Item -->
                            <div class="owl-item">
                                <div
                                    class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="{{ asset('uset/assets/images/view_5.jpg') }}"
                                            alt="img"></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">$225<span>$300</span></div>
                                        <div class="viewed_name"><a href="#">Sony PS4 Slim</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Recently Viewed Item -->
                            <div class="owl-item">
                                <div
                                    class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="{{ asset('uset/assets/images/view_6.jpg') }}"
                                            alt="img"></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">$375</div>
                                        <div class="viewed_name"><a href="#">Speedlink...</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Brands -->

    <div class="brands">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brands_slider_container">

                        <!-- Brands Slider -->

                        <div class="owl-carousel owl-theme brands_slider">
                            @forelse ($brands as $item)
                                <div class="owl-item">
                                    <div class="brands_item d-flex flex-column justify-content-center"><img
                                            src="{{ asset($item->brand_img) }}" style="width: 120px" alt="img"></div>
                                </div>
                            @empty
                                <div>No Brand Image Added</div>
                            @endforelse
                        </div>

                        <!-- Brands Slider Navigation -->
                        <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->

    @include('front.pages.home.newsletter')
@endsection


@push('style')
    <style>
        .banner_2_image_container {
            width: 300px !important;
            margin: auto;
        }

        .trends_overlay {
            background: none;
        }

        .trends_item {
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush
