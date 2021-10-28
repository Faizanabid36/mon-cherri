<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- ===========================  EXTERNAL START  =============================== -->
    @yield('styles')
    <!-- ===========================  EXTERNAL END  =============================== -->
    <title>@yield('title')</title>
</head>

<body>
    <!-- ===========================  UPPER HEADER START  =============================== -->
    @include('moncheri.partials.upper_header')
    <!-- ===========================  UPPER HEADER END  =============================== -->


    <!-- ===========================  HEADER START  =============================== -->
    @include('moncheri.partials.header')
    <!-- ===========================  HEADER END  =============================== -->

    <!-- ===========================  BreadCrumb Start  =============================== -->
    @yield('breadcrumbs')
    <!-- ===========================  BreadCrumb End  =============================== -->


    <!-- ===========================  HERO START  =============================== -->
    @yield('hero_container')
    <!-- ===========================  HERO END  =============================== -->


    @yield('content')


    <!-- ===========================  NEWSLETTER START  =============================== -->
    @include('moncheri.partials.newsletter')
    <!-- ===========================  NEWSLETTER END  =============================== -->


    <!-- ===========================  FOOTER START  =============================== -->
    @include('moncheri.partials.footer')
    <!-- ===========================  FOOTER END  =============================== -->


    <!-- ===========================  EXTERNAL START  =============================== -->
    @yield('scripts')
    <!-- ===========================  EXTERNAL END  =============================== -->

</body>

</html>
