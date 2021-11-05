@extends('layouts.moncheri')

@section('title', ucwords($product->name))

@section('styles')
    <link rel="stylesheet" href="{{ asset('renameMe/style/preloader.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('renameMe/style/utilities.css') }}" />
    <link rel="stylesheet" href="{{ asset('renameMe/style/splide-core.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('renameMe/style/splide.min.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('renameMe/style/style.css') }}" />
    <style>
        .page_container {
            max-width: 1250px;
        }

    </style>
@endsection


@section('content')
    <!-- MODAL START -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="first-name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="first-name" placeholder="John" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="last-name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="last-name" placeholder="Doe" />
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com" />
                        </div>
                        <div class="mb-3">
                            <label for="certificate-code" class="form-label">Certificate Code</label>
                            <input type="number" class="form-control" id="certificate-code" placeholder="1234" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn coolBeans" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL END -->
    @component('moncheri.components.breadcrumbs', ['product' => $product])
    @endcomponent

    <!-- ===========================  PRODUCT START  =============================== -->
    <section class="product_container">
        <div class="page_container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="product">
                            <div class="slider">
                                <div style="
                                    --swiper-navigation-color: #fff;
                                    --swiper-pagination-color: #fff;
                                  " class="swiper mySwiper4">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{ asset('renameMe/images/product-slide-1.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('renameMe/images/product-slide-1.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('renameMe/images/product-slide-1.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('renameMe/images/product-slide-1.png') }}" />
                                        </div>
                                    </div>

                                    <div class="swiper-button-next">
                                        <img src="{{ asset('renameMe/images/product-slide-arrow.svg') }}" alt="" />
                                    </div>
                                    <div class="swiper-button-prev" style="transform: rotate(180deg)">
                                        <img src="{{ asset('renameMe/images/product-slide-arrow.svg') }}" alt="" />
                                    </div>
                                </div>
                                <div thumbsSlider="" class="swiper mySwiper3">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{ asset('renameMe/images/product-slide-1.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('renameMe/images/product-slide-1.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('renameMe/images/product-slide-1.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ asset('renameMe/images/product-slide-1.png') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="main">
                                    <h3>
                                        Diamond Silver Ring
                                        <span class="badge">New</span>
                                        <img src="{{ asset('renameMe/images/heart.png') }}" alt=""
                                            class="heart" />
                                    </h3>
                                    <h3>
                                        $189.99
                                        <span class="badge py-1">
                                            <img src="{{ asset('renameMe/images/van.png') }}" class="van"
                                                alt="" />
                                            Free Shipping
                                        </span>
                                    </h3>
                                    <div class="reviews">
                                        <img src="{{ asset('renameMe/images/star-fill.png') }}" alt="" />
                                        <img src="{{ asset('renameMe/images/star-fill.png') }}" alt="" />
                                        <img src="{{ asset('renameMe/images/star-fill.png') }}" alt="" />
                                        <img src="{{ asset('renameMe/images/star-fill.png') }}" alt="" />
                                        <img src="{{ asset('renameMe/assets/images/star-no-fill.png') }}" alt="" />
                                        <h5 class="fit">(4 Customer Review)</h5>
                                    </div>
                                </div>
                                <div class="info">
                                    <h4 class="mb-0">Product Info</h4>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.
                                    </p>
                                </div>
                                <div class="additional">
                                    <div class="metal fw-500">
                                        Metal: <span class="text-brown">14kt White Gold</span>

                                        <select name="Size" id="">
                                            <option value="7.5">Size: 7.5</option>
                                            <option value="8.5">Size: 8.5</option>
                                        </select>
                                    </div>

                                    <div class="caret-selectors">
                                        <button class="btn active">14K</button>
                                        <button class="btn">14K</button>
                                        <button class="btn">18K</button>
                                    </div>

                                    <div class="btns">
                                        <a href="#">SELECT A DIAMOND</a>
                                        <a class="coolBeans" href="#" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===========================  PRODUCT END  =============================== -->

    <!-- ===========================  TABS START  =============================== -->
    <section class="tabs_container">
        <div class="page_container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mx-auto">
                        <div class="tabs-btns">
                            <div class="tab active">
                                <h3 data-toggle="specification">Specification</h3>
                                <div class="tab-item" id="specification">
                                    <p>Metal</p>
                                    <p>Width</p>
                                    <p>Prong Metal</p>
                                </div>
                            </div>
                            <div class="tab">
                                <h3 data-toggle="reviews">Customer Reviews</h3>
                                <div class="tab-item" id="reviews">
                                    <p>Metal 2</p>
                                    <p>Width 2</p>
                                    <p>Prong Metal 2</p>
                                </div>
                            </div>
                            <div class="tab">
                                <h3 data-toggle="policy">Return Policy</h3>
                                <div class="tab-item" id="policy">
                                    <p>Metal 3</p>
                                    <p>Width 3</p>
                                    <p>Prong Metal 3</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===========================  TABS END  =============================== -->

    <!-- ===========================  CARDS START  =============================== -->
    <section class="cards_container">
        <div class="page_container">
            <div class="container-fluid">
                <div class="cards">
                    <div class="row">
                        <div class="my-3 col-12 col-sm-6 col-md-4">
                            <div class="card" data-aos="fade-up" data-aos-delay="">
                                <div class="img">
                                    <img src="{{ asset('renameMe/images/made-in-usa.png') }}" alt="" />
                                </div>
                                <div class="text">
                                    <h3>Made in USA</h3>
                                    <p>Lorem Ipsum is simply dummy and typesetting industry.</p>
                                </div>
                            </div>
                        </div>
                        <div class="my-3 col-12 col-sm-6 col-md-4 px-mdl-0">
                            <div class="card" data-aos="fade-up" data-aos-delay="100">
                                <div class="img">
                                    <img src="{{ asset('renameMe/assets/images/fast-delivery.png') }}" alt="" />
                                </div>
                                <div class="text">
                                    <h3>Fast Delivery</h3>
                                    <p>Lorem Ipsum is simply dummy and typesetting industry.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 d-block d-md-none"></div>
                        <div class="my-3 col-12 col-sm-6 col-md-4">
                            <div class="card" data-aos="fade-up" data-aos-delay="150">
                                <div class="img">
                                    <img src="{{ asset('renameMe/images/fast-delivery-2.png') }}" alt="" />
                                </div>
                                <div class="text">
                                    <h3>Fast Delivery</h3>
                                    <p>Lorem Ipsum is simply dummy and typesetting industry.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===========================  CARDS END  =============================== -->

    <!-- ===========================  SELECT DIAMOND END  =============================== -->
    <section class="select_diamond_container" data-aos="fade" data-aos-delay="150">
        <div class="page_container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mx-auto">
                        <h1 class="text-center fw500 display-5 mb-5 text-dark-brown">
                            SELECT A DIAMOND
                        </h1>
                    </div>
                    <div class="col-md-4 filters">
                        <aside class="price">
                            <h3 class="text-dark-brown">Price Filter</h3>
                            <div class="extreme-values">
                                <div>
                                    <span>Min : Price</span>
                                    <h4 class="text-dark-brown">49.00$</h4>
                                </div>
                                <div>
                                    <span>Max : Price</span>
                                    <h4 class="text-dark-brown">99.00$</h4>
                                </div>
                            </div>
                            <span class="multi-range">
                                <input type="range" min="49" max="99" value="5" id="lower" />
                                <input type="range" min="49" max="99" value="100" id="upper" />
                            </span>
                        </aside>
                        <aside class="size">
                            <h3 class="text-dark-brown">Size</h3>
                            <div class="extreme-values">
                                <div>
                                    <span>Min : Size</span>
                                    <h4 class="text-dark-brown">7.0</h4>
                                </div>
                                <div>
                                    <span>Max : Size</span>
                                    <h4 class="text-dark-brown">8.0</h4>
                                </div>
                            </div>
                            <span class="multi-range">
                                <input type="range" min="7.0" max="8.0" value="7.0" id="lower" step="0.1" />
                                <input type="range" min="7.0" max="8.0" value="8.0" id="upper" step="0.1" />
                            </span>
                        </aside>

                        <button class="btn coolBeans">Reset</button>
                    </div>
                    <div class="col-md-8">
                        <div class="splide">
                            <div class="splide__arrows">
                                <button class="splide__arrow splide__arrow--prev">
                                    <img src="{{ asset('renameMe/images/product-slide-arrow.svg') }}"
                                        style="transform: rotate(180deg)" alt="" />
                                </button>
                                <button class="splide__arrow splide__arrow--next">
                                    <img src="{{ asset('renameMe/images/product-slide-arrow.svg') }}" alt="" />
                                </button>
                            </div>
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide">
                                        <a href="./product.html" class="product-card">
                                            <div class="product-img">
                                                <img src="{{ asset('renameMe/images/diamond-silver-ring.png') }}" alt="" />
                                            </div>
                                            <div class="product-details">
                                                <h2>$9.99</h2>
                                                <ul>
                                                    <li>
                                                        <span>Shape : Round</span> <span>Size : 7.5</span>
                                                    </li>
                                                    <li>
                                                        <span>Color : Gold</span>
                                                        <span>Clarity : VS1</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="splide__slide">
                                        <a href="./product.html" class="product-card">
                                            <div class="product-img">
                                                <img src="{{ asset('renameMe/images/diamond-silver-ring.png') }}" alt="" />
                                            </div>
                                            <div class="product-details">
                                                <h2>$9.99</h2>
                                                <ul>
                                                    <li>
                                                        <span>Shape : Round</span> <span>Size : 7.5</span>
                                                    </li>
                                                    <li>
                                                        <span>Color : Gold</span>
                                                        <span>Clarity : VS1</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="splide__slide">
                                        <a href="./product.html" class="product-card">
                                            <div class="product-img">
                                                <img src="{{ asset('renameMe/images/diamond-silver-ring.png') }}" alt="" />
                                            </div>
                                            <div class="product-details">
                                                <h2>$9.99</h2>
                                                <ul>
                                                    <li>
                                                        <span>Shape : Round</span> <span>Size : 7.5</span>
                                                    </li>
                                                    <li>
                                                        <span>Color : Gold</span>
                                                        <span>Clarity : VS1</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===========================  SELECT DIAMOND END  =============================== -->

    <!-- ===========================  SUGGESTIONS END  =============================== -->
    <section class="suggestions_container" data-aos="fade" data-aos-delay="150">
        <div class="page_container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mx-auto">
                        <h1 class="display-6 text-center fw-500 text-dark-brown mb-4">
                            YOU MAY ALSO LIKE
                        </h1>

                        <div class="swiper mySwiper2 custom-btns">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="./product.html" class="product-card">
                                        <div class="product-slider">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/diamond-silver-ring.png') }}"
                                                        alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/diamond-silver-ring.png') }}"
                                                        alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/diamond-silver-ring.png') }}"
                                                        alt="" />
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
                                                        src="{{ asset('renameMe/assets/images/star-no-fill.png') }}"
                                                        alt="" />
                                                </div>
                                                <span class="count fit">(4 Customer Review)</span>
                                            </div>
                                            <h3>Diamond Silver Ring</h3>
                                            <h2>$189.99</h2>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="./product.html" class="product-card">
                                        <div class="product-slider">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/necklace (2).png') }}" alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/necklace (2).png') }}" alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/necklace (2).png') }}" alt="" />
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
                                                        src="{{ asset('renameMe/assets/images/star-no-fill.png') }}"
                                                        alt="" />
                                                </div>
                                                <span class="count fit">(4 Customer Review)</span>
                                            </div>
                                            <h3>Necklace</h3>
                                            <h2>$189.99</h2>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="./product.html" class="product-card">
                                        <div class="product-slider">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/diamond-bracelet.png') }}"
                                                        alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/diamond-bracelet.png') }}"
                                                        alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/diamond-bracelet.png') }}"
                                                        alt="" />
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
                                                        src="{{ asset('renameMe/assets/images/star-no-fill.png') }}"
                                                        alt="" />
                                                </div>
                                                <span class="count fit">(4 Customer Review)</span>
                                            </div>
                                            <h3>Bracelet</h3>
                                            <h2>$189.99</h2>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="./product.html" class="product-card">
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
                                                        src="{{ asset('renameMe/assets/images/star-no-fill.png') }}"
                                                        alt="" />
                                                </div>
                                                <span class="count fit">(4 Customer Review)</span>
                                            </div>
                                            <h3>Ring</h3>
                                            <h2>$189.99</h2>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="./product.html" class="product-card">
                                        <div class="product-slider">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/diamond-silver-ring.png') }}"
                                                        alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/diamond-silver-ring.png') }}"
                                                        alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/diamond-silver-ring.png') }}"
                                                        alt="" />
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
                                                        src="{{ asset('renameMe/assets/images/star-no-fill.png') }}"
                                                        alt="" />
                                                </div>
                                                <span class="count fit">(4 Customer Review)</span>
                                            </div>
                                            <h3>Diamond Silver Ring</h3>
                                            <h2>$189.99</h2>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="./product.html" class="product-card">
                                        <div class="product-slider">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/necklace (2).png') }}" alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/necklace (2).png') }}" alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/necklace (2).png') }}" alt="" />
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
                                                        src="{{ asset('renameMe/assets/images/star-no-fill.png') }}"
                                                        alt="" />
                                                </div>
                                                <span class="count fit">(4 Customer Review)</span>
                                            </div>
                                            <h3>Necklace</h3>
                                            <h2>$189.99</h2>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="./product.html" class="product-card">
                                        <div class="product-slider">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/diamond-bracelet.png') }}"
                                                        alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/diamond-bracelet.png') }}"
                                                        alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('renameMe/images/diamond-bracelet.png') }}"
                                                        alt="" />
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
                                                        src="{{ asset('renameMe/assets/images/star-no-fill.png') }}"
                                                        alt="" />
                                                </div>
                                                <span class="count fit">(4 Customer Review)</span>
                                            </div>
                                            <h3>Bracelet</h3>
                                            <h2>$189.99</h2>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="./product.html" class="product-card">
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
                                                        src="{{ asset('renameMe/assets/images/star-no-fill.png') }}"
                                                        alt="" />
                                                </div>
                                                <span class="count fit">(4 Customer Review)</span>
                                            </div>
                                            <h3>Ring</h3>
                                            <h2>$189.99</h2>
                                        </div>
                                    </a>
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
    <!-- ===========================  SUGGESTIONS END  =============================== -->

@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('renameMe/js/textFit.js') }}"></script>
    <script src="{{ asset('renameMe/js/splide.min.js') }}"></script>
    <script src="{{ asset('renameMe/js/jquery.min.js') }}"></script>
    <script src="{{ asset('renameMe/js/product.js') }}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('renameMe/js/app.js') }}"></script>
    <script defer src="{{ asset('renameMe/js/product.js') }}"></script>
@endsection
