<section class="header_container mt-1">
    <div class="page_container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12 mx-auto">
                    <a href="#" class="logo_container">
                        <img class="w-50 mx-auto d-block w-md-100" src="{{ asset('renameMe/images/logo.png') }}"
                            alt="" />
                    </a>
                </div>

                <div class="mt-4">
                    @php  $categories = App\Category::orderBy('prority')->get() @endphp
                    <ul class="list-unstyled d-flex justify-content-between">
                        @foreach ($categories as $category)
                            @php
                                $activeClass = str_contains(request()->url(), $category->slug) ? 'active' : '';
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
