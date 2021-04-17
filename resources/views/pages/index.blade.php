@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <header id="header">
        <h1 class="text-center" style="margin: 50px 0">Page Under Construction</h1>
    </header>
@endsection
@section('content_old')
	 <!-- ---banner ---  -->
        <header id="header">
            <div class="header-slide">
                <div class="lazy slider" data-sizes="50vw">
                    <div class="header-wrap" style="background-image: url(<?=asset('images/banner/bnr1.jpg')?>);">
                           <div class="header-info">
                                <div class="text">
                                <h2>{{__('FIND YOUR INNER DIVA')}}</h2>
                              </div>
                              <div class="header-btn">
                                <button class="btn">{{__('discover')}}</button>
                              </div>
                          </div>
                      </div>

                    <div  class="header-wrap" style="background-image: url(<?=asset('images/banner/bnr2.jpg')?>);">
                          <div class="header-info">
                            <div class="text">
                              <p>{{__('WE PROMISE COMFORT')}}</p>
                            <h2>{{__('Dont stress about the dress')}},
                            </br>
                            {{__('we will dress you to impress')}}.
                            </h2>
                          </div>
                          <div class="header-btn">
                            <button class="btn">{{__('View Collection')}} </button>
                          </div>
                      </div>
                    </div>

                  </div>
            </div>
        </header>
     <!-- ---- End banner ----  -->

     <!-- ----- New Arival Products ----  -->
      <div class="arrival">
        <div class="container">
          <div class="header">
            <h2>{{__('new arrival')}}</h2>
              <p>{{__('Shop our new arrivals from established brands')}}</p>
          </div>
          <div class="arival-content">
            <div class="arival-slider slider">
            @foreach($latest_products as $product)
              <div class="arival-info">
                <div class="ar-img">
                  <img src="{{asset($product->image->url)}}" class="img-fluid" alt="">
                  <div class="hv-img">
                    <img src="{{asset($product->image->url)}}" class="img-fluid" alt="">
                      <div class="arival-info">
                        <a href="javascript:void(0)" data-product_quantity="1" data-product_id="{{$product->slug}}" data-product_size="" class="btn add_to_cart"><i class="fa fa-shopping-cart"></i></a>
                        <a href="{{url('/'.$product->slug)}}" class="btn"><i class="fa fa-search-plus"></i></a>
                        @guest
                        <a class="btn" href="{{route('login')}}"><i class="fa fa-heart"></i></a>
                        @else
                        <a class="btn add_to_wishlist" data-product_id="{{$product->slug}}" href="javascript:void(0)"><i class="fa fa-heart"></i></a>
                        @endguest
                      </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>

       <!-- ----- End New Arival Products ----  -->

       <!-- ----- Brand ----  -->

       <div class="brand">
         <div class="container">
          <div class="d-none d-lg-block brand-wrap ">
           <div class="d-flex justify-content-between">
            <div class="brand-img">
              <img src="{{asset('images/brand/icon1.png')}}" class="img-fluid" alt="">
            </div>
            <div class="brand-img">
              <img src="{{asset('images/brand/icon2.png')}}" class="img-fluid" alt="">
            </div>
            <div class="brand-img">
              <img src="{{asset('images/brand/icon3.png')}}" class="img-fluid" alt="">
            </div>
            <div class="brand-img">
              <img src="{{asset('images/brand/icon4.png')}}" class="img-fluid" alt="">
            </div>
            <div class="brand-img">
              <img src="{{asset('images/brand/icon5.png')}}" class="img-fluid" alt="">
            </div>
           </div>
          </div>

          <div class="d-block d-sm-block d-lg-none mobile-brand-slide slider">
            <div  class="brand-info">
                <div class="brand-img">
                  <img src="{{asset('images/brand/icon1.png')}}" class="img-fluid" alt="">
                </div>
            </div>

            <div  class="brand-info">
              <div class="brand-img">
                <img src="{{asset('images/brand/icon2.png')}}" class="img-fluid" alt="">
              </div>
          </div>

          <div  class="brand-info">
            <div class="brand-img">
              <img src="{{asset('images/brand/icon3.png')}}" class="img-fluid" alt="">
            </div>
        </div>

        <div  class="brand-info">
          <div class="brand-img">
            <img src="{{asset('images/brand/icon4.png')}}" class="img-fluid" alt="">
          </div>
      </div>

      <div  class="brand-info">
        <div class="brand-img">
          <img src="{{asset('images/brand/icon5.png')}}" class="img-fluid" alt="">
        </div>
    </div>


          </div>
         </div>
       </div>

       <!-- ----- End Brand ----  -->

       <!-- ----- Shipping ----  -->

       <div class="ship">
         <div class="container">
           <div class="row">
             <div class="col-lg-4">
               <div class="ship-wrap">
                 <div class="ship-info">
                   <div class="icon">
                    <i class="fa fa-truck"></i>
                   </div>
                   <div class="text">
                     <h6>{{__('FREE SHIPPING & RETURN')}}</h6>
                     <p>{{__('Free shipping on all US orders')}}</p>
                   </div>
                 </div>
               </div>
             </div>

             <div class="col-lg-4">
              <div class="ship-wrap">
                <div class="ship-info d-flex justify-content-between">
                  <div class="icon">
                    <i class="fa fa-dollar"></i>
                  </div>
                  <div class="text">
                    <h6>{{__('MONEY GAURNTEE')}}</h6>
                    <p>{{__('30 days money back guarantee')}}</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="ship-wrap">
                <div class="ship-info d-flex justify-content-between">
                  <div class="icon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <div class="text">
                    <h6>{{__('ONLINE SUPPORT')}}</h6>
                    <p>{{__('We support online 24-7 on day')}}</p>
                  </div>
                </div>
              </div>
            </div>

           </div>
         </div>
       </div>

       <!-- ----- End Shipping ----  -->

       <!-- --------- Our Store --------  -->

       <div class="store">
         <div class="container">
           <div class="row">
             <div class="col-lg-6">
               <div class="store-wrap">
                 <div class="store-info">
                   <div class="text">
                     <h6>{{__('VISIT OUR STORE')}}</h6>
                     <p>{{__('Karolusplassen 4081 5826 ÅLESUND Norway')}}.</p>
                     <p><strong>{{__('Open')}}</strong>: {{__('11am - 7pm every day')}}.</p>
                     <p><strong>{{__('Phone')}}</strong>: {{__('0832 2268010')}}</p>
                   </div>
                   <div class="store-btn">
                     <button class="btn">{{__('Map')}}</button>
                   </div>
                 </div>
               </div>
             </div>

             <div class="col-lg-6">
               <div class="store-wrap">
                 <div class="store-img">
                   <img src="{{asset('/images/store/store.jpg')}}" class="img-fluid" alt="">
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
@endsection
