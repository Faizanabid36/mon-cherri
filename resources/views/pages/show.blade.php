@extends('layouts.master')
@section('title', ucwords($product->name))
@section('content')
<!--Body Content-->
<div id="page-content">
    <!--MainContent-->
    <div id="MainContent" class="main-content" role="main">
        <!--Breadcrumb-->
        <div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="{{url('/')}}" title="Back to the home page">{{__('Home')}}</a><span aria-hidden="true">›</span><span>{{ucwords($product->name)}}</span>
            </div>
        </div>
        <!--End Breadcrumb-->
        
        <div id="ProductSection-product-template" class="product-template__container prstyle1 container">
            <!--product-single-->
            <div class="product-single">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-details-img">
                            <div class="zoompro-wrap product-zoom-right pl-20">
                                <div class="zoompro-span">
                                    <img class="blur-up lazyload zoompro" data-zoom-image="{{asset($product->image->url)}}" alt="" src="{{asset($product->image->url)}}" />
                                </div>
                                <div class="product-buttons">
                                   <a href="#" class="btn prlightbox" title="Zoom"><i class="fa fa-expand"></i></a>
                                </div>
                            </div>
                            <div class="lightboximages">
                            	@foreach($product->images as $p_img)
                                <a href="{{asset($p_img->url)}}" data-size="1462x2048"></a>
                                @endforeach
                            </div>
							<div class="product-thumb">

                                <div id="gallery" class="product-dec-slider-2 product-tab-left">
                                	@foreach($product->images as $p_img)
                                    <a data-image="{{asset($p_img->url)}}" data-zoom-image="{{asset($p_img->url)}}" class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" tabindex="-1">
                                        <img class="blur-up lazyload" src="{{asset($p_img->url)}}" alt="" />
                                    </a>
                                   @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-single__meta">
                            <h1 class="product-single__title">{{ucwords($product->name)}}</h1>
                            <div class="product-nav clearfix">					
                                <a href="#" class="next" title="Next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </div>
                            <div class="prInfoRow">
                                <div class="product-stock">
                                @if($product->stock > 0)
                                    <span class="instock ">{{__('In Stock')}}</span>
                                @else
                                    <span class="outstock">{{__('Unavailable')}}</span>
                                @endif
                                </div>
                             <!--    <div class="product-sku">SKU: <span class="variant-sku">19115-rdxs</span></div> -->

                                <div class="product-review">
                                    <a class="reviewLink" href="#tab2">
                                        @for($i=1; $i<=$product->averageRating; $i++)
                                        <i class="font-13 fa fa-star"></i>
                                        @endfor
                                        @for($i=$product->averageRating; $i < 5; $i++)
                                            <i class="font-13 fa fa-star-o"></i>
                                        @endfor
                                        <span class="spr-badge-caption">{{count($product->reviews)}} {{__('reviews')}}</span>
                                    </a>
                                </div>
                            </div>
                            <p class="product-single__price product-single__price-product-template">
                                <span class="visually-hidden">{{__('Regular price')}}</span>
                                <span class="product-price__price product-price__price-product-template">
                                    <span id="ProductPrice-product-template">
                                        <span class="money"><del>{{$product->FormatedOldPrice()}}</del></span>
                                        <span class="money">{{$product->FormatedPrice()}}</span>
                                    </span>
                                </span>
                            </p>
                            <div class="product-single__description rte">
                                <p>{!! $product->description !!}</p>
                            </div>
                        <form method="post" action="" id="product_form_10508262282" accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data">
                              
                            <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                <div class="product-form__item">
                                <h4>{{__('CHOOSE SIZE')}}</h4>
                                  <select class="form-control" name="size" id="product_size" required>
                                    <option value="">{{__('Select Size')}}</option>
                                    @foreach($product->sizes as $size)
                                      <option value="{{$size->size}}">{{$size->size}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                           <!--  <p class="infolinks"><a href="#sizechart" class="sizelink btn"> Size Guide</a></p> -->
                            <!-- Product Action -->
                            <div class="product-action clearfix">
                                <div class="product-form__item--quantity">
                                    <div class="wrapQtyBtn">
                                        <div class="qtyField">
                                            <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                            <input type="text" id="Quantity" name="quantity" value="1" class="product-form__input bs_product_qty qty">
                                            <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="product-form__item--submit">
                                    <button type="button" name="add" class="btn product-form__cart-submit add_to_cart single_page_add_to_cart" data-product_quantity="1" data-product_id="{{$product->slug}}" data-product_size="">
                                        <span id="AddToCartText-product-template">{{__('Add To Cart')}}</span>
                                    </button>
                                </div>
                                <div class="shopify-payment-button" data-shopify="payment-button">
                                    <button type="button" class="shopify-payment-button__button shopify-payment-button__button--unbranded">{{__('Buy it now')}}</button>
                                </div>
                            </div>
                            <!-- End Product Action -->
                        </form>
                        <div class="display-table shareRow">
                            <div class="display-table-cell medium-up--one-third">
                                <div class="wishlist-btn">
                                    <a class="wishlist add_to_wishlist"  title="Add to Wishlist" data-product_id="{{$product->slug}}"><i class="icon anm anm-heart-l" aria-hidden="true"></i> <span>{{__('Add to Wishlist')}}</span></a>
                                </div>
                            </div>
                            <div class="display-table-cell text-right">
                                <!-- <div class="social-sharing">
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-facebook" title="Share on Facebook">
                                        <i class="fa fa-facebook-square" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Share</span>
                                    </a>
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-twitter" title="Tweet on Twitter">
                                        <i class="fa fa-twitter" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Tweet</span>
                                    </a>
                                    <a href="#" title="Share on google+" class="btn btn--small btn--secondary btn--share" >
                                        <i class="fa fa-google-plus" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Google+</span>
                                    </a>
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Pin on Pinterest">
                                        <i class="fa fa-pinterest" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Pin it</span>
                                    </a>
                                    <a href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Share by Email" target="_blank">
                                        <i class="fa fa-envelope" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Email</span>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                    	</div>

                    	<!-- <p id="freeShipMsg" class="freeShipMsg" data-price="199"><i class="fa fa-truck" aria-hidden="true"></i> GETTING CLOSER! ONLY <b class="freeShip"><span class="money" data-currency-usd="$199.00" data-currency="USD">$199.00</span></b> AWAY FROM <b>FREE SHIPPING!</b></p>

                        <p class="shippingMsg"><i class="fa fa-clock-o" aria-hidden="true"></i> ESTIMATED DELIVERY BETWEEN <b id="fromDate">Wed. May 1</b> and <b id="toDate">Tue. May 7</b>.</p>
                        <div class="userViewMsg" data-user="20" data-time="11000"><i class="fa fa-users" aria-hidden="true"></i> <strong class="uersView">14</strong> PEOPLE ARE LOOKING FOR THIS PRODUCT</div> -->

                	</div>
                </div> 
            </div>
            <!--End-product-single-->
            <!--Product Fearure-->
            <div class="prFeatures">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                        <img src="{{asset('images/icon/credit-card.png')}}" alt="Safe Payment" title="Safe Payment" />
                        <div class="details"><h3>{{__('Safe Payment')}}</h3>{{__('Pay with the worlds most payment methods')}}.</div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                        <img src="{{asset('images/icon/shield.png')}}" alt="Confidence" title="Confidence" />
                        <div class="details"><h3>{{__('Confidence')}}</h3>{{__('Protection covers your purchase and personal data')}}.</div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                        <img src="{{asset('images/icon/worldwide.png')}}" alt="Worldwide Delivery" title="Worldwide Delivery" />
                        <div class="details"><h3>{{__('Worldwide Delivery')}}</h3>{{__('FREE  fast shipping to over 200+ countries regions')}}.</div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                        <img src="{{asset('images/icon/phone-call.png')}}" alt="Hotline" title="Hotline" />
                        <div class="details"><h3>{{__('Hotline')}}</h3>{{__('Talk to help line for your question on 4141 456 789, 4125 666 888')}}</div>
                    </div>
                </div>
            </div>
            <!--End Product Fearure-->
            <!--Related Product Slider-->
            <div class="related-product grid-products">
                <header class="section-header">
                    <h2 class="section-header__title text-center h2"><span>{{__('Related Products')}}</span></h2>
                    <p class="sub-heading">{{__('You can stop autoplay, increase/decrease aniamtion speed and number of grid to show and products from store admin')}}.</p>
                </header>
                <div class="productPageSlider">
                    @foreach($related_products as $related_product)
                    <div class="col-12 item">
                        <!-- start product image -->
                        <div class="product-image">
                            <!-- start product image -->
                            <a href="#">
                                <!-- image -->
                                <img class="primary blur-up lazyload" src="{{asset($related_product->image->url)}}" alt="">
                                <!-- End image -->
                                <!-- Hover image -->
                                <img class="hover blur-up lazyload" src="{{asset($related_product->image->url)}}"  alt="image" title="product">
                                <!-- End hover image -->
                                <!-- product label -->
                                <div class="product-labels rectangular">
                                    @if($related_product->percent_off)
                                    <span class="lbl on-sale">-{{$related_product->percent_off}}%</span>
                                    @endif
                                    @if($related_product->is_new)
                                    <span class="lbl pr-label1">{{__('new')}}</span>
                                    @endif
                                </div>
                                <!-- End product label -->
                            </a>
                            <!-- end product image -->

                            <!-- Start product button -->
                            <form class="variants add" action="#" method="post">
                                <a class="btn btn-addto-cart add_to_cart" href="javascript:void(0)" data-product_quantity="1" data-product_id="{{$product->slug}}" data-product_size="" >{{__('Add To Cart')}}</a>
                            </form>
                            <div class="button-set">
                                <a href="{{url('/'.$related_product->slug)}}" title="View" class="quick-view" tabindex="0">
                                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                                </a>
                                <div class="wishlist-btn">
                                    <a class="wishlist add-to-wishlist" href="">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- end product button -->
                        </div>
                        <!-- end product image -->
                        <!--start product details -->
                        <div class="product-details text-center">
                            <!-- product name -->
                            <div class="product-name">
                                <a href="{{url('/'.$related_product->slug)}}">{{ucwords($related_product->name)}}</a>
                            </div>
                            <!-- End product name -->
                            <!-- product price -->
                            <div class="product-price">
                                @if($related_product->old_price)
                                <span class="old-price">{{$related_product->FormatedOldPrice()}}</span>
                                @endif
                                <span class="price">{{$related_product->FormatedPrice()}}</span>
                            </div>
                            <!-- End product price -->
                            
                            <div class="product-review">
                               @for($i=1; $i<=$related_product->averageRating; $i++)
                                <i class="font-13 fa fa-star"></i>
                                @endfor
                                @for($i=$related_product->averageRating; $i < 5; $i++)
                                    <i class="font-13 fa fa-star-o"></i>
                                @endfor
                            </div>
                        </div>
                        <!-- End product details -->
                    </div>
                    @endforeach
                </div>
            </div>
            <!--End Related Product Slider-->
            
        </div>
        <!--#ProductSection-product-template-->
    </div>
    <!--MainContent-->
</div>
<!--End Body Content-->
@endsection
@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){

      $(document).on('change','#Quantity',function(){
        var qty = $("#Quantity").val();
        if(qty != "" || qty != null){
          $('.single_page_add_to_cart').attr('data-product_quantity',qty);
        }
      });

      $(document).on('change','#product_size',function(){
        var size = $("#product_size").val();
        if(check_size(size)){
          $('.single_page_add_to_cart').attr('data-product_size',size);
        }
      });
      var size = $("#product_size").val();
      function check_size(size) {
        if (size == "" || size == null) {
          $('.add_to_cart').attr('disabled','disabled');
          $('.add_to_cart').attr('title','Please select size!');
          $('.add_to_cart').addClass('bs_disabled_btn');
          return false;
        }else{
          $('.add_to_cart').removeAttr('disabled');
          $('.add_to_cart').attr('title','Add to cart');
          $('.add_to_cart').removeClass('bs_disabled_btn');
          return true;
        }
      }
      check_size(size);
    });
</script>
@endsection