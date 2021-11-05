@extends('layouts.moncheri')
@section('styles')
    <link rel="stylesheet" href="{{ asset('renameMe/style/preloader.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('renameMe/style/utilities.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('renameMe/style/style.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        .page_container {
            max-width: 1250px;
        }

    </style>
@endsection
@section('title', 'Products')

@section('hero_container')
    <section class="hero_products_container" style="background-image:url('{{ $major_category->image }}')!important ">
        <h1 data-aos="fade-up">{{ $major_category->title }}</h1>
        <p data-aos="fade-up" data-aos-delay="150">
            Search hundreds of engagement ring settings to find the perfect ring.
            Styles range from solitaire to vintage-inspired <br />
            to everything in between. Start designing your own custom engagement
            ring with <br />handcrafted ring settings built to last a lifetime.
        </p>
    </section>
@endsection

@section('content')
    <section class="products_container">
        <div class="page_container">
            <div class="container-fluid">
                <div class="row">
                    <div class="btn-group flex-wrap filters-container">
                        <button class="btn dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="text">Price Filter </span>
                            <img src="{{ asset('renameMe/images/dropdown-up.png') }}" alt="dropdown-img" />
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <div class="prices-container">
                                    <div>
                                        <span> Min: Price</span>
                                        <h3 id="min-price-filter">0.00</h3>
                                    </div>
                                    <div>
                                        <span> Max: Price</span>
                                        <h3 id="max-price-filter">0.00</h3>
                                    </div>
                                </div>
                            </li>
                            <li class="ranger">
                                <span class="multi-range">
                                    <input type="range" min="100.00" max="9999.00" value="100.00" id="lower" step="1" />
                                    <input type="range" min="100.00" max="9999.00" value="9999.00" id="upper" step="1" />
                                </span>
                                <button class="btn coolBeans">Filter</button>
                            </li>
                        </ul>

                        <button class="btn dropdown-toggle" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="text">Gemstones </span>
                            <img src="{{ asset('renameMe/images/dropdown-up.png') }}" alt="dropdown-img" />
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <li class="p-">
                                <ul class="items-to-filter">
                                    <li>Diamond</li>
                                    <li>Sapphire</li>
                                    <li>Emerald</li>
                                    <li>Ruby</li>
                                </ul>
                                <hr />
                                <button class="btn coolBeans">Close</button>
                            </li>
                        </ul>

                        <button class="btn dropdown-toggle" id="dropdownMenuButton3" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="text">Diamond Shape </span>
                            <img src="{{ asset('renameMe/images/dropdown-up.png') }}" alt="dropdown-img" />
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                            <li class="p-">
                                <ul class="items-to-filter">
                                    <li>Lorem</li>
                                    <li>Ipsum</li>
                                </ul>
                                <hr />
                                <button class="btn coolBeans">Close</button>
                            </li>
                        </ul>

                        <button class="btn dropdown-toggle" id="dropdownMenuButton4" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="text">Sort By </span>
                            <img src="{{ asset('renameMe/images/dropdown-up.png') }}" alt="dropdown-img" />
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                            <li class="p-">
                                <ul class="items-to-filter">
                                    <li>A - Z</li>
                                    <li>Z - A</li>
                                </ul>
                                <hr />
                                <button class="btn coolBeans">Close</button>
                            </li>
                        </ul>
                    </div>

                    <div class="results-info">
                        <h2>
                            Results - <span id="result-count">{{ $products->total() }}</span>
                            <span id="filters-names">No Filters Applied</span>
                        </h2>
                    </div>
                    @foreach ($products as $product)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="product-card">
                                <div class="product-slider">
                                    <div class="swiper-wrapper">
                                        @foreach ($product->images as $image)
                                            <div class="swiper-slide">
                                                <img src="{{ asset($image->url) }}" alt="" />
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="product-details">
                                    <div class="reviews">
                                        <div class="stars">
                                            @for ($i = 1; $i <= $product->averageRating; $i++)
                                                <img style="margin-right: 0rem!important"
                                                    src="{{ asset('renameMe/images/star-fill.png') }}" alt="" />
                                            @endfor
                                            @for ($i = $product->averageRating; $i < 5; $i++)
                                                <img style="margin-right: 0rem!important"
                                                    src="{{ asset('renameMe/images/star-no-fill.png') }}" alt="" />
                                            @endfor
                                        </div>
                                        <span class='counter fit'>(4 Customer Review)</span>
                                    </div>
                                    <h3 style="cursor: pointer"
                                        onclick="window.location.href=`{{ url('/staging/' . $product->slug) }}`">
                                        {{ ucfirst($product->name) }}</h3>
                                    <h2>{{ $product->FormatedPrice() }}</h2>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $products->links('moncheri.components.pagination') }}
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('renameMe/js/jquery.min.js') }}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('renameMe/js/textFit.js') }}"></script>
    <script src="{{ asset('renameMe/js/products.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('renameMe/js/app.js') }}"></script>
    <script src="{{ asset('renameMe/js/index.js') }}"></script>
    <script>
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
        textFit(document.querySelectorAll(".fit"));
    </script>
@endsection
