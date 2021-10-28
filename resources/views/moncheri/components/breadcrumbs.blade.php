<section class="">
    <div class="page_container">
        <div class="container-fluid mx-auto breadcrumb-container">
            <div class="row">
                <div class="col-12">
                    <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item pointer" onclick="window.location.href=`{{ url('/') }}`">
                                HOME
                            </li>
                            <li class="pointer breadcrumb-item" aria-current="page"
                                onclick="window.location.href=`{{ route('fix_name.shop.category', $product->categories->first()->slug) }}`">
                                {{ ucwords($product->categories->first()->title) }}
                            </li>
                            <li class="breadcrumb-item pointer pointer" aria-current="page">
                                {{ strtoupper($product->name) }}
                            </li>
                        </ol>
                        <div class="social">
                            <a href="#"><img src="{{ asset('renameMe/images/facebook.svg') }}" alt="" /></a>
                            <a href="#"><img src="{{ asset('renameMe/images/twitter.svg') }}" alt="" /></a>
                            <a href="#"><img src="{{ asset('renameMe/images/instagram.svg') }}" alt="" /></a>
                            <a href="#"><img src="{{ asset('renameMe/images/linkedin.svg') }}" alt="" /></a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
