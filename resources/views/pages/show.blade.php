@extends('layouts.master')
@section('title', ucwords($product->name))
@section('content')
    <!--Body Content-->
    <div class="container">
        <div id="page-content">
            <!--MainContent-->
            <div id="MainContent" class="main-content" role="main">
                <!--Breadcrumb-->
                <div class="bredcrumbWrap">
                    <div class="container breadcrumbs">
                        <a href="{{url('/')}}" title="Back to the home page">{{__('Home')}}</a>
                        <span aria-hidden="true">›</span><a
                            href="{{route('shop.category',$product->categories->first()->slug)}}"><span>{{ucwords($product->categories->first()->title)}}</span></a>
                        <span aria-hidden="true">›</span><span>{{ucwords($product->name)}}</span>
                    </div>
                </div>
                <!--End Breadcrumb-->

                <div id="ProductSection-product-template" class="product-template__container prstyle1 container">
                    <!--product-single-->
                    <div class="product-single">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="row image-container">
                                    <div class="small-image product-dec-slider-2">
                                        @foreach($product->images as $p_img)
                                            <div class="img-responsive">
                                                <img class="{{$loop->first?'image-active-prodct':''}} img-fluid"
                                                     src="{{asset($p_img->url)}}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="big-image">
                                        <img src="{{asset($product->image->url)}}" alt="" class="img-fluid">
                                    </div>
                                    <!---iMAGE Filter-->
                                    <!----End of the Image filter Gallery-->
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product-description">
                                    <div class="product-description-title d-flex justify-content-between ">
                                        <div class="product-title-head">
                                            <h1>{{__(ucwords($product->name))}}</h1>
                                        </div>
                                        <div class="product-title-btn mt-2">
                                            <a class="add_to_wishlist" title="Add to Wishlist"
                                               data-product_id="{{$product->slug}}">
                                                <i class="fa fa-heart like-icon"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-review-option py-1">
                                        <div class="product-review">
                                            <div class="product-stock">
                                                @if($product->stock > 0)
                                                    <span class="text-success ">{{__('In Stock')}}</span>
                                                @else
                                                    <span class="text-danger">{{__('Unavailable')}}</span>
                                                @endif
                                            </div>
                                            @for($i=1; $i<=$product->averageRating; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                            @for($i=$product->averageRating; $i < 5; $i++)
                                                <i class="fa fa-star-o"></i>
                                            @endfor
                                            <span
                                                class="product-customer-review">({{count($product->reviews)}} {{__('Customer Reviews')}})</span>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h1>
                                            <del>{{$product->FormatedOldPrice()}}</del>
                                        </h1>
                                        <h1>{{$product->FormatedPrice()}}</h1>
                                    </div>
                                    <div class="product-metal">
                                        <span><h3><b>Metal:</b> 14kt White Gold</h3></span>
                                        <span></span>
                                    </div>
                                    <div class="product-price-circle py-1">
                                        <div class="product-price-items d-flex">
                                            @foreach($product->tags as $tag)
                                                <h1>{{$tag->name}}</h1>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="product-selection py-1">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="product-range-size">
                                                    <select class="form-control" name="size" id="product_size" required>
                                                        <option value="">{{__('Select Size')}}</option>
                                                        @foreach($product->sizes as $size)
                                                            <option value="{{$size->size}}">{{$size->size}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="product-quantity">
                                                    <input
                                                        style="border-radius: 5px"
                                                        type="text" id="Quantity" name="quantity" placeholder="Quantity"
                                                        class="product-form__input bs_product_qty qty">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="product-addcart-btn py-3">
                                        <button type="button" name="add"
                                                class="product-form__cart-submit add_to_cart single_page_add_to_cart"
                                                data-product_quantity="1" data-product_id="{{$product->slug}}"
                                                data-product_size="">
                                            <span id="AddToCartText-product-template">{{__('Add To Cart')}}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End-product-single-->

                    <!--Specs-->
                    <div class="row">
                        <div class="product-detail">
                            <section id="tabs">
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <nav>
                                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                                   href="#nav-home" role="tab" aria-controls="nav-home"
                                                   aria-selected="true">Specification</a>
                                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                                   href="#nav-profile" role="tab" aria-controls="nav-profile"
                                                   aria-selected="false">Customer Reviews</a>
                                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                                   href="#nav-contact" role="tab" aria-controls="nav-contact"
                                                   aria-selected="false">Return Policy</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content py-3  px-sm-0" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                                 aria-labelledby="nav-home-tab">
                                                <div class="stock-number d-flex align-items-center justify-content-between">
                                                    <h1 class="text-dark">
                                                        {!! $product->description !!}
                                                    </h1>
                                                </div>
                                                <hr style="margin: 10px 0;border-bottom: 1px;"/>

                                                <div class="stock-number d-flex align-items-center justify-content-between">
                                                    <div class="stock-number-title">
                                                        <h1>Metal</h1>
                                                    </div>
                                                    <div class="stock-number-price ml-5">
                                                        <h1>{{$product->metal}}</h1>
                                                    </div>
                                                </div>
                                                <hr style="margin: 10px 0;border-bottom: 1px;"/>

                                                <div class="stock-number d-flex align-items-center justify-content-between">
                                                    <div class="stock-number-title">
                                                        <h1>Width</h1>
                                                    </div>
                                                    <div class="stock-number-price ml-5">
                                                        <h1>{{$product->width}}</h1>
                                                    </div>
                                                </div>
                                                <hr style="margin: 10px 0;border-bottom: 1px;"/>

                                                <div class="stock-number d-flex align-items-center justify-content-between">
                                                    <div class="stock-number-title">
                                                        <h1>Prong Metal </h1>
                                                    </div>
                                                    <div class="stock-number-price ml-5">
                                                        <h1>{{$product->prong_metal}}</h1>
                                                    </div>
                                                </div>
                                                <hr style="margin: 10px 0;border-bottom: 1px;"/>
                                            </div>
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                                 aria-labelledby="nav-profile-tab">
                                                Et et consectetur ipsum labore excepteur est proident excepteur ad velit
                                                occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua
                                                enim pariatur veniam sunt est aute sit dolor anim. Velit non irure
                                                adipisicing aliqua ullamco irure incididunt irure non esse consectetur
                                                nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est
                                                eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit
                                                sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis
                                                reprehenderit occaecat anim ullamco ad duis occaecat ex.
                                            </div>
                                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                                 aria-labelledby="nav-contact-tab">
                                                Et et consectetur ipsum labore excepteur est proident excepteur ad velit
                                                occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua
                                                enim pariatur veniam sunt est aute sit dolor anim. Velit non irure
                                                adipisicing aliqua ullamco irure incididunt irure non esse consectetur
                                                nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est
                                                eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit
                                                sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis
                                                reprehenderit occaecat anim ullamco ad duis occaecat ex.
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </section>
                        </div>
                    </div>
                    <!--End Specs-->


                    <!-- what make buying from us -->
                    <div class="row py-5">
                        <div class="make-buying-heading">
                            <h1>{{__('What Makes Buying From Us')}}</h1>
                        </div>
                    </div>
                    <div class="row py-5">
                        <div class="col-lg-4 col-md-4">
                            <div class="buying-card d-flex align-items-center">
                                <div>
                                    <img src="{{asset('images/call.png')}}" class="img-fluid">
                                </div>
                                <div class="buying-card-name">
                                    <h2>MADE IN USA</h2>
                                    <p>Product Guarantee</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="buying-card d-flex align-items-center">
                                <div>
                                    <img src="{{asset('images/truck.png')}}" class="img-fluid">
                                </div>
                                <div class="buying-card-name">
                                    <h2>FLAT RATE DELIVERY</h2>
                                    <p>Pakistan and USA</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="buying-card d-flex align-items-center">
                                <div>
                                    <img src="{{__('images/call.png')}}" class="img-fluid">
                                </div>
                                <div class="buying-card-name">
                                    <h2>HASSALE FREE RETURN</h2>
                                    <p>No risk Purchase</p>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- end of the make buying from us -->


                    <!-------Dimond section---------->
                    <div class="row py-5">
                        <div class="make-buying-heading">
                            <h1>{{__('Select a Diamond')}}</h1>
                            <div class="row">
                                <div class="offset-1 col-lg-10">

                                    <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text..</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-5" id="dimond-filter">
                        <div class="col-lg-4 col-md-6">
                            <div class="diamond-filters-left">
                                <!-- price filter  -->
                                <div class="sidebar_widget filterBox filter-widget mt-4">
                                    <h1 class="font-weight-700">Price</h1>
                                    <form action="#" method="post" class="price-filter">
                                        <div id="slider-range"
                                             class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all"
                                                  tabindex="0"></span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all"
                                                  tabindex="0"></span>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 d-flex">
                                                <button class="filter-btn">filter</button>

                                                <div class="ml-3">
                                                    <p class="no-margin"><input id="amount" type="text"
                                                                                class="filter-input"></p>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>


                                <!-- end of the price filter  -->


                                <!-- start carret weight  -->
                                <div class="sidebar_widget filterBox filter-widget py-2 mt-5">
                                    <h1 class="">Carret Weight</h1>
                                    <form action="#" method="post" class="price-filter">
                                        <div id="slider-range"
                                             class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all"
                                                  tabindex="0"></span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all"
                                                  tabindex="0"></span>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 d-flex">
                                                <button class="filter-btn">filter</button>

                                                <div class="ml-3">
                                                    <p class="no-margin"><input id="amount" type="text"
                                                                                class="filter-input"></p>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>

                                <!-----End carret weight-------------->


                            </div>
                        </div>

                        <!---Dimond Slider--------->
                        <div class="col-lg-8 col-md-6">


                            <div class="dimond-slider">

                                <div class="">
                                    <div class="ring-price">
                                        <div class="ring-img">
                                            <img src="{{asset('images/ring3.jpeg')}}" style="width: 90%;height: 170px"
                                                 class="img-fluid" alt="">
                                        </div>

                                        <div class="ring-price-range mt-3">
                                            <span class="featured-products-price">$2,000</span>

                                        </div>

                                        <div class="featured-product-shape-size d-flex justify-content-between ">
                                            <div class="featured-product-hape">
                                                <h3 class="font-weight-bold">Round</h3>
                                                <p>Shape</p>
                                            </div>
                                            <div class="featured-product-size">
                                                <h3 class="font-weight-bold">1.25</h3>
                                                <p>Size</p>
                                            </div>
                                        </div>
                                        <div class="featured-product-shape-size d-flex justify-content-between ">
                                            <div class="featured-product-hape">
                                                <h3 class="font-weight-bold">D</h3>
                                                <p>Color</p>
                                            </div>
                                            <div class="featured-product-size">
                                                <h3 class="font-weight-bold">VS2</h3>
                                                <p>Clarity</p>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                                <div class="">
                                    <div class="ring-price">
                                        <div class="ring-img">
                                            <img src="{{asset('images/ring3.jpeg')}}" style="width: 90%;height: 170px"
                                                 class="img-fluid" alt="">
                                        </div>

                                        <div class="ring-price-range mt-3">
                                            <span class="featured-products-price">$2,000</span>

                                        </div>

                                        <div class="featured-product-shape-size d-flex justify-content-between ">
                                            <div class="featured-product-hape">
                                                <h3 class="font-weight-bold">Round</h3>
                                                <p>Shape</p>
                                            </div>
                                            <div class="featured-product-size">
                                                <h3 class="font-weight-bold">1.25</h3>
                                                <p>Size</p>
                                            </div>
                                        </div>

                                        <div class="featured-product-shape-size d-flex justify-content-between ">
                                            <div class="featured-product-hape">
                                                <h3 class="font-weight-bold">D</h3>
                                                <p>Color</p>
                                            </div>
                                            <div class="featured-product-size">
                                                <h3 class="font-weight-bold">VS2</h3>
                                                <p>Clarity</p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="">
                                    <div class="ring-price">
                                        <div class="ring-img">
                                            <img src="{{asset('images/ring3.jpeg')}}" style="width: 90%;height: 170px"
                                                 class="img-fluid" alt="">
                                        </div>

                                        <div class="ring-price-range mt-3">
                                            <span class="featured-products-price">$2,000</span>

                                        </div>

                                        <div class="featured-product-shape-size d-flex justify-content-between ">
                                            <div class="featured-product-hape">
                                                <h3 class="font-weight-bold">Round</h3>
                                                <p>Shape</p>
                                            </div>
                                            <div class="featured-product-size">
                                                <h3 class="font-weight-bold">1.25</h3>
                                                <p>Size</p>
                                            </div>
                                        </div>

                                        <div class="featured-product-shape-size d-flex justify-content-between ">
                                            <div class="featured-product-hape">
                                                <h3 class="font-weight-bold">D</h3>
                                                <p>Color</p>
                                            </div>
                                            <div class="featured-product-size">
                                                <h3 class="font-weight-bold">VS2</h3>
                                                <p>Clarity</p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="">
                                    <div class="ring-price">
                                        <div class="ring-img">
                                            <img src="{{asset('images/ring3.jpeg')}}" style="width: 90%;height: 170px"
                                                 class="img-fluid" alt="">
                                        </div>

                                        <div class="ring-price-range mt-3">
                                            <span class="featured-products-price">$2,000</span>

                                        </div>

                                        <div class="featured-product-shape-size d-flex justify-content-between ">
                                            <div class="featured-product-hape">
                                                <h3 class="font-weight-bold">Round</h3>
                                                <p>Shape</p>
                                            </div>
                                            <div class="featured-product-size">
                                                <h3 class="font-weight-bold">1.25</h3>
                                                <p>Size</p>
                                            </div>
                                        </div>

                                        <div class="featured-product-shape-size d-flex justify-content-between ">
                                            <div class="featured-product-hape">
                                                <h3 class="font-weight-bold">D</h3>
                                                <p>Color</p>
                                            </div>
                                            <div class="featured-product-size">
                                                <h3 class="font-weight-bold">VS2</h3>
                                                <p>Clarity</p>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>

                        <!--End of dimond slider------>
                    </div>
                    <!--------End of the Dimond Section---------->


                    <!-- featured-produtcs -->
                    <div class="row py-5">
                        <div class="make-buying-heading mt-5">
                            <h1>{{__('You May Also Like')}}</h1>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($related_products as $related_product)
                            <div class="col-lg-3 col-md-3 mt-5">
                                <div class="ring-price">
                                    <div class="ring-img">
                                        <img style="width: 300px;height: 225px;border-radius: 7px"
                                             src="{{asset($related_product->image->url)}}" class="img-fluid" alt=""
                                             width="300">
                                    </div>

                                    <div class="ring-name mt-2">
                                        <p>
                                            <a href="{{url('/'.$related_product->slug)}}">{{ucwords($related_product->name)}}</a>
                                        </p>
                                        <span class="featured-products-price">
                                        {{$related_product->FormatedPrice()}}
                                    </span>
                                        <div class="product-review mt-2 d-flex">
                                            @for($i=1; $i<=$related_product->averageRating; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                            @for($i=$related_product->averageRating; $i < 5; $i++)
                                                <i class="fa fa-star-o"></i>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!---end of featured products-->


                    <!--Related Product Slider-->
                {{--                <div class="related-product grid-products">--}}
                {{--                    <header class="section-header">--}}
                {{--                        <h2 class="section-header__title text-center h2"><span>{{__('Related Products')}}</span></h2>--}}
                {{--                        <p class="sub-heading">{{__('You can stop autoplay, increase/decrease aniamtion speed and number of grid to show and products from store admin')}}--}}
                {{--                            .</p>--}}
                {{--                    </header>--}}
                {{--                    <div class="productPageSlider">--}}
                {{--                        @foreach($related_products as $related_product)--}}
                {{--                            <div class="col-12 item">--}}
                {{--                                <!-- start product image -->--}}
                {{--                                <div class="product-image">--}}
                {{--                                    <!-- start product image -->--}}
                {{--                                    <a href="#">--}}
                {{--                                        <!-- image -->--}}
                {{--                                        <img class="primary blur-up lazyload"--}}
                {{--                                             src="{{asset($related_product->image->url)}}" alt="">--}}
                {{--                                        <!-- End image -->--}}
                {{--                                        <!-- Hover image -->--}}
                {{--                                        <img class="hover blur-up lazyload"--}}
                {{--                                             src="{{asset($related_product->image->url)}}" alt="image" title="product">--}}
                {{--                                        <!-- End hover image -->--}}
                {{--                                        <!-- product label -->--}}
                {{--                                        <div class="product-labels rectangular">--}}
                {{--                                            @if($related_product->percent_off)--}}
                {{--                                                <span class="lbl on-sale">-{{$related_product->percent_off}}%</span>--}}
                {{--                                            @endif--}}
                {{--                                            @if($related_product->is_new)--}}
                {{--                                                <span class="lbl pr-label1">{{__('new')}}</span>--}}
                {{--                                            @endif--}}
                {{--                                        </div>--}}
                {{--                                        <!-- End product label -->--}}
                {{--                                    </a>--}}
                {{--                                    <!-- end product image -->--}}

                {{--                                    <!-- Start product button -->--}}
                {{--                                    <form class="variants add" action="#" method="post">--}}
                {{--                                        <a class="btn btn-addto-cart add_to_cart" href="javascript:void(0)"--}}
                {{--                                           data-product_quantity="1" data-product_id="{{$product->slug}}"--}}
                {{--                                           data-product_size="">{{__('Add To Cart')}}</a>--}}
                {{--                                    </form>--}}
                {{--                                    <div class="button-set">--}}
                {{--                                        <a href="{{url('/'.$related_product->slug)}}" title="View" class="quick-view"--}}
                {{--                                           tabindex="0">--}}
                {{--                                            <i class="fa fa-search-plus" aria-hidden="true"></i>--}}
                {{--                                        </a>--}}
                {{--                                        <div class="wishlist-btn">--}}
                {{--                                            <a class="wishlist add-to-wishlist" href="">--}}
                {{--                                                <i class="fa fa-heart" aria-hidden="true"></i>--}}
                {{--                                            </a>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                    <!-- end product button -->--}}
                {{--                                </div>--}}
                {{--                                <!-- end product image -->--}}
                {{--                                <!--start product details -->--}}
                {{--                                <div class="product-details text-center">--}}
                {{--                                    <!-- product name -->--}}
                {{--                                    <div class="product-name">--}}
                {{--                                        <a href="{{url('/'.$related_product->slug)}}">{{ucwords($related_product->name)}}</a>--}}
                {{--                                    </div>--}}
                {{--                                    <!-- End product name -->--}}
                {{--                                    <!-- product price -->--}}
                {{--                                    <div class="product-price">--}}
                {{--                                        @if($related_product->old_price)--}}
                {{--                                            <span class="old-price">{{$related_product->FormatedOldPrice()}}</span>--}}
                {{--                                        @endif--}}
                {{--                                        <span class="price">{{$related_product->FormatedPrice()}}</span>--}}
                {{--                                    </div>--}}
                {{--                                    <!-- End product price -->--}}

                {{--                                    <div class="product-review">--}}
                {{--                                        @for($i=1; $i<=$related_product->averageRating; $i++)--}}
                {{--                                            <i class="font-13 fa fa-star"></i>--}}
                {{--                                        @endfor--}}
                {{--                                        @for($i=$related_product->averageRating; $i < 5; $i++)--}}
                {{--                                            <i class="font-13 fa fa-star-o"></i>--}}
                {{--                                        @endfor--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                <!-- End product details -->--}}
                {{--                            </div>--}}
                {{--                        @endforeach--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <!--End Related Product Slider-->

                </div>
                <!--#ProductSection-product-template-->
            </div>
            <!--MainContent-->
        </div>
    </div>
    <!--End Body Content-->
@endsection
@section('javascript')

    <script type="text/javascript">
        $(document).ready(function () {

            $(document).on('change', '#Quantity', function () {
                var qty = $("#Quantity").val();
                if (qty != "" || qty != null) {
                    $('.single_page_add_to_cart').attr('data-product_quantity', qty);
                }
            });

            $(document).on('change', '#product_size', function () {
                var size = $("#product_size").val();
                if (check_size(size)) {
                    $('.single_page_add_to_cart').attr('data-product_size', size);
                }
            });
            var size = $("#product_size").val();

            function check_size(size) {
                if (size == "" || size == null) {
                    $('.add_to_cart').attr('disabled', 'disabled');
                    $('.add_to_cart').attr('title', 'Please select size!');
                    $('.add_to_cart').addClass('bs_disabled_btn');
                    return false;
                } else {
                    $('.add_to_cart').removeAttr('disabled');
                    $('.add_to_cart').attr('title', 'Add to cart');
                    $('.add_to_cart').removeClass('bs_disabled_btn');
                    return true;
                }
            }

            check_size(size);
            $('.small-image img').click(function () {

                $(this).addClass('image-active-prodct').siblings().removeClass('image-active-prodct');
                let image = $(this).attr('src');
                $('.big-image img').attr('src', image);

            });


            $(".dimond-slider").slick({
                dots: false,
                infinite: true,
                arrows: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        }
                    }]
            });
        });
    </script>
@endsection
