<section class="header_container product-page mt-1">
    <div class="page_container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12 mx-auto">
                    <a href="#" class="logo_container">
                        <img class="w-50 mx-auto d-block w-md-100" src="{{ asset('renameMe/images/logo.png') }}"
                            alt="" />
                    </a>
                </div>
                <div class="mt-3 mb-4">
                    @php  $categories = App\Category::orderBy('prority')->get() @endphp
                    <ul
                        class="
                list-unstyled
                mb-0
                d-flex
                justify-content-between
                {{ request()->route()->getName() == 'fix_name.shop.product'
                    ? 'bottom-bordered'
                    : '' }}
              ">
                        @foreach ($categories as $category)
                            @php
                                $val = explode('/', request()->url());
                                $lastIndex = $val[count($val) - 1];
                                $activeClass = $category->slug === $lastIndex ? 'active' : '';
                            @endphp
                            <li class="{{ $activeClass }}">
                                <a class="text-decoration-none" href="{{ url('/staging/shop', $category->slug) }}">
                                    {{ ucwords($category->title) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
