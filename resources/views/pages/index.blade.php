@extends('layouts.master')
@section('title', 'Home')

@section('content')
    <!-- ---banner ---  -->
    <!-- ---header ---  -->
    <header id="header">
        <div class="header-slide">
            <div class="lazy slider" data-sizes="50vw">
                <div class="container adil-b">
                    <div class="header-wrap" style="background-image: url({{asset('images/home_header.jpg')}});">

                        <div class="collection-hero__title page-width">
                            <div class="text">
                                <p style="text-transform:initial; font-family: Baskerville Old Face regular; font-size: 54px; color: black !important; line-height: 51px;">
                                    Treat Yourself With The <br>
                                    Best Jewelry</p>
                                <h2 style="text-transform:initial; font-family: poppins regular; font-weight:100">
                                    Our exacting standards for cut and quality are what give <br> Moncheri diamonds their astonishing
                                    beauty.Intricately cut <br>
                                    in designs that conjure dreams,our legendary <br>
                                    diamond jewelry
                                </h2>
                            </div>
                            <div class="header-btn">
                                <button class="btn">Shop Now <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
{{--    <header id="header">--}}
{{--        <div class="header-slide">--}}
{{--            <div class="lazy slider" data-sizes="50vw">--}}
{{--                <div class="container adil-b">--}}
{{--                    <div class="header-wrap" >--}}
{{--                        <div class="collection-hero__title page-width">--}}
{{--                            <div class="text">--}}
{{--                                <p style="text-transform:initial; font-family: 'Baskerville Old Face regular'; font-size: 54px; color: black !important; line-height: 51px;">--}}
{{--                                    {{__('Treat Yourself With The')}} <br>--}}
{{--                                    {{__('Best Jewelry')}}</p>--}}
{{--                                <h2 style="text-transform:initial; font-family: poppins regular; font-weight:100">--}}
{{--                                    {{__('Our exacting standards for cut and quality are what give')}}--}}
{{--                                    <br> {{__('Moncheri diamonds their astonishing beauty. Intricately cut')}}--}}
{{--                                    <br>--}}
{{--                                    {{__('in designs that conjure dreams,our legendary')}} <br>--}}
{{--                                    {{__('diamond jewelry')}}--}}
{{--                                </h2>--}}
{{--                            </div>--}}
{{--                            <div class="header-btn">--}}
{{--                                <button class="btn" style="color: #4a341e !important; background-color: transparent;--}}
{{--      font-weight: 700;">{{__('Shop Now')}} <i class="fa fa-arrow-right"></i></button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </header>--}}
    <!-- ---- End Header ----  -->

    <!-- ----- Shipping ----  -->
    <div class="ship">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="ship-wrap">
                        <div class="ship-info d-flex ">
                            <div class="icon">
                                <img src="{{asset('images/truck.png')}}" alt="">
                            </div>
                            <div class="text" style="    margin-top: 40px;">
                                <h6>{{__('FREE SHIPPING')}} </h6>
                                <p>{{__('For all order over $999')}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="ship-wrap">
                        <div class="ship-info d-flex ">
                            <div class="icon">
                                <img src="{{asset('images/payment.png')}}" alt="">
                            </div>
                            <div class="text" style="    margin-top: 20px;">
                                <h6>{{__('Secure Payments')}}</h6>
                                <p>{{__('100% money back guarantee')}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="ship-wrap">
                        <div class="ship-info d-flex ">
                            <div class="icon">
                                <img src="{{asset('images/gift.png')}}" alt="">
                            </div>
                            <div class="text" style="    margin-top: 20px;">
                                <h6>{{__('SPECIAL GIFT CARD')}}</h6>
                                <p>{{__('Gift someone you care about')}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="ship-wrap">
                        <div class="ship-info d-flex ">
                            <div class="icon">
                                <img src="{{asset('images/call.png')}}" alt="">
                            </div>
                            <div class="text" style="    margin-top: 10px;">
                                <h6>{{__('24/7 CUSTOMER SERVICE')}}</h6>
                                <p>
                                    {{__('Call us 24/7 1-800-763-9823')}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ----- End Shipping ----  -->

    <!-- ----- Engagement Rings ----  -->
    <div class="store">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="store-wrap" style="margin-top: -110px;width: 90%;margin-left:15px ">
                        <div class="store-info text-left">
                            <div class="text">
                                <h6 style="font-size: 18px">
                                    <b>
                                        {{__('About Engagement rings')}}
                                    </b>
                                </h6>
                                <br>
                                <p style="color: #191b1d !important;font-size: 16px">{{__('There are many variations of passages of Lorem Ipsum
                                    available, but the majority have suffered alteration in some form, by injected humour,
                                    or randomised words which don\'t look even slightly believable. If you are going to use a
                                    passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in
                                    the middle of text.All the Lorem Ipsum generators on the
                                    Internet.')}}</p>

                            </div>
                            <br>
                            <div class="text-left">
                                <a href="#" style="color: #4a341e">
                                    <b>
                                        {{__('Shop Now')}}
                                    </b>
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="store-wrap">
                        <div class="store-img">
                            <img src="{{asset('images/1.jpg')}}" class="img-fluid" alt="" style="border-radius: 5px;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="store-wrap">
                        <div class="store-img">
                            <img src="{{asset('images/2.jpg')}}" class="img-fluid" alt="" style="border-radius: 5px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ----- End Engagement Rings ----  -->

    <!-- ----- New Arival Products ----  -->
    <div class="arrival">
        <div class="container">
            <div class="header">
                <h2>{{__('new arrival')}}</h2>
                <p>{{__('Hurry up! Limited')}}</p>
            </div>
            <div class="arival-content">
                <div class="arival-slider slider">
                    @foreach($latest_products as $product)
                        <div class="arival-info">
                            <div class="ar-img">
                                <img src="{{asset($product->image->url)}}" class="img-fluid" alt=""
                                     style="height: 200px;border-radius: 5px;box-shadow: #00000026 0 0 5px 0;">
                                <div class="ring-name ">
                                    <p>
                                        <a class="light-to-dark-hover" href="{{url('/'.$product->slug)}}">
                                            {{__(ucfirst($product->name))}}
                                        </a>
                                    </p>
                                </div>
                                <div class="product-price">
                                    <span class="featured-products-price"
                                          style="color: #d2a45d;">{{$product->FormatedPrice()}}</span>
                                </div>
                                <!-- End product price -->

                                <div class="product-review">
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
    </div>
    <!-- ----- End New Arival Products ----  -->

    <!-- ----- Explore Moncheri ----  -->
    <div class="">
        <div class="container">
            <div class="header">
                <h2>{{_('Explore MonCheri')}}</h2>
                <p style="font-size: 16px">{{__('Shop by Categories')}}</p>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="container22">
                        <img src="{{asset('images/2.jpg')}}" alt="Nature" style="width:100%;  border-radius: 5px;">

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="container22">
                        <img src="{{asset('images/2.jpg')}}" alt="Nature" style="width:100%;  border-radius: 5px;">

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="container22">
                        <img src="{{asset('images/2.jpg')}}" alt="Nature" style="width:100%;  border-radius: 5px;">

                    </div>
                </div>


            </div>
            <br>
            <div class="row">

                <div class="col-lg-6">
                    <div class="container22">
                        <img src="{{asset('images/2.jpg')}}" alt="Nature" style="width:100%;  border-radius: 5px;">

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="container22">
                        <img src="{{asset('images/2.jpg')}}" alt="Nature" style="width:100%;  border-radius: 5px;">

                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- ----- End Explore Moncheri ----  -->


    <!-- ----- Our Products ----  -->
    <div class="arrival">
        <div class="container">
            <div class="header">
                <h2>{{__('Our Products')}}</h2>
            </div>
            <div class="arival-content">
                <div class="arival-slider slider">
                    @foreach($our_products as $product)
                        <div class="arival-info">
                            <div class="ar-img">
                                <img src="{{asset($product->image->url)}}" class="img-fluid" alt="" width="300">
                                <div class="product-name">
                                    <a href="{{url('/'.$product->slug)}}">
                                        {{__(ucfirst($product->name))}}
                                    </a>
                                </div>
                                <div class="product-price">
                                    <span class="price" style="color: #d2a45d;">{{$product->FormatedPrice()}}</span>
                                </div>
                                <!-- End product price -->

                                <div class="product-review">
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
    </div>
    <!-- ----- End Our Products ----  -->

    <!-- ----- Banner ----  -->
    <div class="row">
        <div class="container">

            <div class="col-lg-12">
                <img src="{{asset('images/b.png')}}" alt="">
                <div class="page-width custom_gift_section"
                     style="font-size: 1.84615em;color: #fff;text-align: center;width: 50%;margin:0px auto;transform: translateY(-140%);">
                    <div class="text">
                        <p style="text-transform:initial; font-family: Baskerville Old Face regular; font-size: 42px; color: black !important; line-height: 51px;">
                            {{__('Birthstone Jewellery')}}</p>
                        <h2 style="text-transform:initial;  font-size: 17px; font-family: poppins regular; font-weight:100">
                            {{__('Lorem Ipsum is simply dummy text of the printing and')}}
                            {{__('typesetting industry. Lorem Ipsum has been the')}}
                            {{__('industry\'s standard dummy text')}}
                        </h2>
                    </div>
                    <div class="header-btn">
                        <button class="btn" style="color: #4a341e !important; background-color: transparent;
      font-weight: 700;">{{__('Shop Now')}} <i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- ----- End Banner ----  -->

    <!-- ----- Gifts Section ----  -->
    <div class="">
        <div class="container">
            <div class="row">
                <div class="header">
                    <h2>Gifts They'll Love</h2>
                </div>
                <div class="col-lg-6">
                    <div class="container22">
                        <img src="{{asset('images/2.jpg')}}" style="width:80%;">
                        <div class="text-block">
                            <div class="">
                                <h3>{{__('For Him')}}</h3>
                                <br>
                                <p style="color: #191b1d !important">Lorem Ipsum is simply dummy text of the printing and
                                    typest ting in dustry. Lorem Ipsum has been the industry dummy text ever since the
                                    1500s</p>
                                <a href="#"><b>{{__('Shop Now')}}</b> <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4"></div> -->

                <div class="col-lg-6">
                    <div class="container22">
                        <img src="{{asset('images/2.jpg')}}" style="width:80%;">
                        <div class="text-block">
                            <div class="">
                                <h3>{{__('For Her')}}</h3>
                                <br>
                                <p style="color: #191b1d !important">Lorem Ipsum is simply dummy text of the printing and
                                    typest ting in dustry. Lorem Ipsum has been the industry dummy text ever since the
                                    1500s</p>
                                <a href="#"><b>{{__('Shop Now')}}</b> <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ----- End Gifts Section ----  -->


@endsection
