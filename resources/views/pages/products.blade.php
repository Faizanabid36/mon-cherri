@extends('layouts.master')
@section('title', __(ucwords($major_category->title)))
@section('content')
    <style>
        .fontofheading {
            font-family: "Poppins" !important;
        }

        @media only screen and (max-width: 600px) {
            .filters-toolbar-wrapper select {
                width: 80px;
                font-size: 13px;
            }

        }

        @media only screen and (min-width: 768px) {
            .filters-toolbar-wrapper select {
                width: 138px;
            }

        }

        @media only screen and (min-width: 1200px) {
            .filters-toolbar-wrapper select {
                width: auto;
            }

        }
    </style>
    <!--Body Content-->
    <div id="page-content">
        <!--Collection Banner-->
        <div class="collection-header mb-3">
            <div class="collection-hero">
                <div class="collection-hero__image">
                    <img class="blur-up lazyload" src="{{asset('images/header.jpg')}}"
                         alt="{{__(ucwords($major_category->title))}}" title="{{__(ucwords($major_category->title))}}"/>
                </div>
                <div class="collection-hero__title-wrapper">
                    <h1 class="collection-hero__title page-width">
                        {{__(ucwords($major_category->title))}}
                    </h1>
                </div>
            </div>
        </div>
        <!--End Collection Banner-->

        <div class="container">
            <div class="row">
                <!--Sidebar-->
            @include('partials.filter_sidebar')
            <!--End Sidebar-->
                <!--Main Content-->
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
                    @if($products->count() > 0)
                        <div class="productList">
                            <!--Mobile view filter button-->
                            <button type="button"
                                    class="btn btn-filter d-block d-md-none d-lg-none"> {{__('Product Filters')}}</button>
                            <!--Mobile view filter button end-->

                            <div class="grid-products grid--view-items">
                                <div class="row">
                                    @foreach($products as $product)
                                        <div class="col-sm-6 col-md-4 grid-view-item style2 item">
{{--                                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 grid-view-item style2 item">--}}
                                            <div class="grid-view_image">
                                                <!-- start product image -->
                                                <a href="{{url('/'.$product->slug)}}" class="grid-view-item__link">
                                                    <!-- image -->
                                                    <img class="grid-view-item__image primary blur-up lazyload"
                                                         style="height: 180px;border-radius: 5px;box-shadow: black 0 0 1px 0;"
                                                         src="{{asset($product->image->url)}}" alt="image"
                                                         title="{{__(ucwords($product->name))}}">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="grid-view-item__image hover blur-up lazyload"
                                                         style="height: 290px;border-radius: 5px;box-shadow: black 0 0 1px 0;"
                                                         src="{{asset($product->image->url)}}" alt="image"
                                                         title="{{__(ucwords($product->name))}}">
                                                    <!-- End hover image -->
                                                    <!-- product label -->
                                                    <div class="product-labels rectangular">
                                                        @if($product->percent_off)
                                                            <span class="lbl on-sale">-{{$product->percent_off}}%</span>
                                                        @endif
                                                        @if($product->is_new)
                                                            <span class="lbl pr-label1">{{__('New')}}</span>
                                                        @endif
                                                    </div>
                                                    <!-- End product label -->
                                                </a>

                                                <!-- end product image -->

                                                <!--start product details -->
                                                <div class="product-details hoverDetails text-center mobile">

                                                    <!-- product button -->
                                                    <div class="button-set">
                                                    {{--                                                        <a href="{{url('/'.$product->slug)}}" title="View"--}}
                                                    {{--                                                           class="quick-view-popup quick-view" tabindex="0">--}}
                                                    {{--                                                            <i class="fa fa-search-plus" aria-hidden="true"></i>--}}
                                                    {{--                                                        </a>--}}
                                                    <!-- Start product button -->
                                                        <form>

                                                            <a href="javascript:void(0)"
                                                               class="btn btn--secondary cartIcon btn-addto-cart add_to_cart mt-3"
                                                               data-product_quantity="1"
                                                               title="Add to Cart"
                                                               data-product_id="{{$product->slug}}"
                                                               style="border-radius: 2px"
                                                               data-product_size="">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </a>
                                                        </form>
                                                        <div class="wishlist-btn mt-3">
                                                            @guest
                                                                <a class="wishlist add-to-wishlist"
                                                                   style="border-radius: 2px"
                                                                   href="{{route('login')}}"><i class="fa fa-heart"></i></a>
                                                            @else
                                                                <a class="wishlist add-to-wishlist add_to_wishlist"
                                                                   title="Add to Wishlist"
                                                                   style="border-radius: 2px"
                                                                   data-product_id="{{$product->slug}}"
                                                                   href="javascript:void(0)"><i class="fa fa-heart"></i></a>
                                                            @endguest
                                                        </div>
                                                        <div class="compare-btn mt-3">
                                                            <a class="compare add-to-compare add_to_compare"
                                                               style="border-radius: 2px"
                                                               data-product_id="{{$product->slug}}"
                                                               title="Add to Compare">
                                                                <i class="fa fa-random"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- end product button -->
                                                </div>
                                                <!-- End product details -->
                                                <div class="product-name text-left">
                                                    <a style="font-size: 16px" href="{{url('/'.$product->slug)}}">{{__(ucwords($product->name))}}</a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price text-left">
                                                    <span class="old-price">{{$product->FormatedOldPrice()}}</span>
                                                    <span class="price">{{$product->FormatedPrice()}}</span>
                                                </div>
                                                <!-- End product price -->
                                                <div class="product-review text-left">
                                                    @for($i=1; $i<=$product->averageRating; $i++)
                                                        <i class="font-13 fa fa-star"></i>
                                                    @endfor
                                                    @for($i=$product->averageRating; $i < 5; $i++)
                                                        <i class="font-13 fa fa-star-o"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!--End Main Content-->
                        <hr class="clear">
                        {{ $products->links('partials.pagination') }}

                    @else
                        <h1 class="text-secondary"
                            style="margin-left: 25%;margin-top: 20px;">{{__('Products Not Found')}}</h1>
                    @endif
                </div>
            </div>
        </div>
        <!--End Body Content-->

@endsection
