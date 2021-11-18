@extends('layouts.moncheri')

@section('title', 'Home Page')

@section('styles')
    <link rel="stylesheet" href="{{ asset('renameMe/style/preloader.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('renameMe/style/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('renameMe/style/utilities.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <style>
        .swiper.mySwiper2.mySwiper2>.swiper-wrapper>.swiper-slide {
            margin-right: 26px !important;
        }

        .mySwiper2 .swiper-button-next {
            right: 23px;
        }

        .mySwiper2 .swiper-button-prev {
            left: 23px;
        }

        @media screen and (min-width: 1250px) {

            .swiper.mySwiper2 .swiper-button-next img,
            .swiper.mySwiper2 .swiper-button-prev img {
                width: 67px;
            }

            .swiper.mySwiper2 .swiper-button-prev {
                left: 27px;
            }

            .swiper.mySwiper2 .swiper-button-next {
                right: 27px;
            }
        }

        @media screen and (max-width: 575px) {
            .swiper-pagination {
                bottom: 40% !important;
            }
        }

    </style>
@endsection


@section('content')
    <!-- ===========================  HERO START  =============================== -->
    <section class="hero_container">
        <div class="page_container h-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="text_content col-12 col-md-12 text-white" data-aos="fade-up">
                        <img src="{{ asset('renameMe/images/bangles-cropped.png') }}"
                            class="w-50 mx-auto d-block mb-5 d-md-none bangles" alt="" />
                        <h1 class="fw600">TREAT YOURSELF WITH THE</h1>
                        <h1 class="fw600 mb-1">BEST JEWELRY</h1>
                        <p class="f20">
                            There are many variations of passages of Lorem Ipsum available,
                            but the
                        </p>
                        <button class="coolBeans">SHOP NOW</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===========================  HERO END  =============================== -->

    <!-- ===========================  ABOUT START  =============================== -->
    <section class="about_container pt-5">
        <div class="page_container position-relative h-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-11 col-md-12 mx-auto">
                        <h1 class="text-center display-4 mt-3 mb-4">
                            ABOUT ENGAGEMENT RINGS
                        </h1>

                        <div class="row">
                            <div class="col-6 col-sm-4" data-aos="fade-up" data-aos-delay="">
                                <img class="w-100" src="{{ asset('renameMe/images/about/i1.png') }}" alt="" />
                            </div>
                            <div class="col-6 col-sm-4" data-aos="fade-up" data-aos-delay="100">
                                <img class="w-100" src="{{ asset('renameMe/images/about/i2.png') }}" alt="" />
                            </div>
                            <div class="col-3 d-sm-none"></div>
                            <div class="col-6 col-sm-4 mt-4 mt-sm-0" data-aos="fade-up" data-aos-delay="150">
                                <img class="w-100" src="{{ asset('renameMe/images/about/i3.png') }}" alt="" />
                            </div>
                        </div>

                        <p class="text-center my-4 f22">
                            There are many variations of passages of Lorem Ipsum available,
                            but the majority have suffered alteration in some by injected
                            humour, or randomised words which don’t look even slightly
                            believable. If you are going to use a of Lorem Ipsum, you need
                            to be sure there isn’t anything embarrassing hidden in the
                            middle of text.All the Lorem Ipsum generators on the Internet.
                        </p>
                        <div class="d-flex justify-content-center">
                            <button class="outlined-btn coolBeans">SHOP NOW</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===========================  ABOUT END  =============================== -->

    <!-- ===========================  NEW ARRIVAL START  =============================== -->
    <section class="arrival_cont">
        <img class="w-100" src="{{ asset('renameMe/images/arrival.svg') }}" alt="" />
    </section>
    <!-- ===========================  NEW ARRIVAL END  =============================== -->

    <!-- ===========================  SLIDER START  =============================== -->
    <section class="slider_container">
        <div class="page_container h-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-11 col-md-12 mx-auto">
                        <div class="swiper mySwiper2 custom-btns">
                            <div class="swiper-wrapper">
                            @foreach($latest_products as $product)
                                <div class="swiper-slide">
                                    <div class="product-card">
                                        <div class="product-slider">
                                            <div class="swiper-wrapper">
                                                @foreach($product->images as $image)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset($image->url) }}"
                                                        alt="" />
                                                </div>
                                                @endforeach
                                                
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                        <div class="product-details">
                                            <div class="reviews">
                                                <div class="stars">
                                                @for($i=1; $i<=$product->averageRating; $i++)
                                                <img src="{{ asset('renameMe/images/star-fill.png') }}" alt="" />
                                                @endfor
                                                @for($i=$product->averageRating; $i < 5; $i++)
                                                <img src="{{ asset('renameMe/images/star-no-fill.png') }}" alt="" />
                                                @endfor
                                                </div>
                                                <span class="count fit">(4 Customer Review)</span>
                                            </div>
                                            <h3>{{__(ucfirst($product->name))}}</h3>
                                            <h2>{{$product->FormatedPrice()}}</h2>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                            <!-- Static slider -->
                                <div class="swiper-slide">
                                    <div class="product-card">
                                        <div class="product-slider">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/diamond-ring.png') }}" alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/diamond-ring.png') }}" alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/diamond-ring.png') }}" alt="" />
                                                </div>
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                        <div class="product-details">
                                            <div class="reviews">
                                                <div class="stars">
                                                    <img src="{{ asset('renameMe/images/star-fill.png') }}" alt="" /><img
                                                        src="{{ asset('renameMe/images/star-fill.png') }}" alt="" /><img
                                                        src="{{ asset('renameMe/images/star-fill.png') }}" alt="" /><img
                                                        src="{{ asset('renameMe/images/star-fill.png') }}" alt="" /><img
                                                        src="{{ asset('renameMe/images/star-no-fill.png') }}" alt="" />
                                                </div>
                                                <span class="count fit">(4 Customer Review)</span>
                                            </div>
                                            <h3>Ring</h3>
                                            <h2>$189.99</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next">
                                <img src="{{ asset('renameMe/images/product-slider-arrow-with-bg.svg') }}"
                                    alt="arrow-next" />
                            </div>
                            <div class="swiper-button-prev">
                                <img src="{{ asset('renameMe/images/product-slider-arrow-with-bg-left.svg') }}"
                                    alt="arrow-next" />
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===========================  SLIDER END  =============================== -->

    <!-- ===========================  NEED HELP START =============================== -->

    <section class="need_help">
        <div class="page_container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-11 col-md-12 mx-auto">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ asset('renameMe/images/product-slide-1.png') }}" alt="gift" />
                                </div>
                                <div class="col-md-6 text" data-aos="fade" data-aos-delay="150">
                                    <div class="bg"></div>
                                    <h1 class="color1">Need Help Finding That Perfect Gift?</h1>
                                    <p>
                                        Lorem Ipsum is simply dummy text PageMaker including
                                        versions of Lorem Ipsum.
                                    </p>
                                    <a href="#" class="outlined-btn coolBeans">Continue</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===========================  NEED HELP END =============================== -->



    <!-- ===========================  GEMSTONE
            START =============================== -->
    <section class="gemstone_container text-center" data-aos="fade-up" data-aos-delay="150">
        <div class="inner_gemstone">
            <h1 class="fw500 display-5">Gemstone Jewelry</h1>
            <p class="color1">
                Lorem Ipsum is simply dummy text PageMaker including versions of Lorem
                Ipsum.
            </p>
            <button class="coolBeans">Shop Now</button>
        </div>
    </section>
    <!-- ===========================  GEMSTONE END  =============================== -->

    <!-- ===========================  EXPLORE START =============================== -->
    <section class="explore_container" data-aos="fade-up" data-aos-delay="150">
        <div class="page_container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-11 col-md-12 mx-auto">
                        <div class="text-center">
                            <h1 class="fw500 display-5">EXPLORE MONCHERI</h1>
                            <p class="color1 sub-heading main">Shop by Categories</p>
                        </div>
                        <?php
                            $categories = App\Category::all();
                            ?>
                
                        <div class="row pt-4 mt-3 mt-sm-5">
                        @foreach($categories as $category)
                            <div class="col-12 col-sm-6 col-md-4">
                                <img class="mx-auto d-block w-75 w-sm-100" src="{{asset($category->image)}}" alt="" />
                                <div class="text-center mt-3">
                                    <a href="{{url('/shop',$category->slug)}}"><h3 class="color1">{{ __(ucwords($category->title)) }}</h3></a>
                                    <p class="sub-heading">
                                        Lorem Ipsum is simply dummy text PageMaker including
                                    </p>
                                </div>
                            </div>
                        @endforeach
                           <!-- Static category -->
                            <div class="col-12 col-sm-3 d-md-none"></div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <img class="mx-auto d-block w-75 w-sm-100" src="{{asset('renameMe/images/explore/i3.png')}}" alt="" />
                                <div class="text-center mt-3">
                                    <h3 class="color1">Diamond Cocktail Ring</h3>
                                    <p class="sub-heading">
                                        Lorem Ipsum is simply dummy text PageMaker including
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3 mt-md-5">
                            <a href="#" class="outlined-btn coolBeans">See More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===========================  EXPLORE END  =============================== -->

@endsection

@section('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('renameMe/js/textFit.js') }}"></script>
    <script src="{{ asset('renameMe/js/jquery.min.js') }}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('renameMe/js/index.js') }}"></script>
    <script src="{{ asset('renameMe/js/app.js') }}"></script>
    <script>
        textFit(document.querySelectorAll(".fit"));
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                576: {
                    slidesPerView: 4,
                },
                400: {
                    slidesPerView: 2,
                },
            },
        });

        var swiper = new Swiper(".mySwiper2", {
            slidesPerView: 1,
            spaceBetween: 30,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                992: {
                    slidesPerView: 4,
                },
                576: {
                    slidesPerView: 3,
                },
                451: {
                    slidesPerView: 2,
                },
                0: {
                    slidesPerView: 1,
                },
            },
        });

        new Swiper(".product-slider", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
@endsection
