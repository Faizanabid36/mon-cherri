@extends('layouts.master')
@section('title', 'About')
@section('content')
<div id="page-content">
        <!--Page Title-->
        <div class="page section-header text-center">
            <div class="page-title">
                <div class="wrapper"><h1 class="page-width">{{__('About Us')}}</h1></div>
            </div>
        </div>
        <!--End Page Title-->
        
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                    <div class="text-center mb-4">
                        <h2 class="h2">{{__('Sed ut perspiciatis unde omnis iste natus error')}}</h2>
                        <div class="rte-setting">
                            <p><strong>{{__('Lorem Ipsum is simply dummy text of the printing and typesetting industry')}}.</strong></p>
                            <p>{{__('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 mb-4"><img class="blur-up ls-is-cached lazyloaded" src="{{asset('images/blog/blog1.jpg')}}" alt="About Us"></div>
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 mb-4"><img class="blur-up ls-is-cached lazyloaded" src="{{asset('images/blog/blog2.jpg')}}" alt="About Us"></div>
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 mb-4"><img class="blur-up ls-is-cached lazyloaded" src="{{asset('images/blog/blog3.jpg')}}" alt="About Us"></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h2>{{__('Sed ut perspiciatis unde omnis iste natus error')}}</h2>
                    <p>{{__('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain')}}.</p>
                    <p>{{__('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain')}}</p>
                    <p></p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-4">
                    <h2 class="h2">{{__('About Annimex Web')}}</h2>
                    <div class="rte-setting"><p><strong>{{__('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain')}}.</strong></p>
                    <p>{{__('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain')}}</p>
                    <p></p>
                    <p>{{__('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain')}}.</p></div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <h2 class="h2">{{__('Contact Us')}}</h2>
                    <ul class="addressFooter">
                        <li><i class="icon fa fa-map-marker" aria-hidden="true"></i><p>55 Gallaxy Enque, 2568 steet, 23568 NY</p></li>
                        <li class="phone"><i class="icon fa fa-phone" aria-hidden="true"></i><p>(440) 000 000 0000</p></li>
                        <li class="email"><i class="icon fa fa-envelope" aria-hidden="true"></i><p>sales@yousite.com</p></li>
                    </ul>
                    <hr>
                    <ul class="list--inline site-footer__social-icons social-icons">
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Facebook"><i class="icon fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Twitter"><i class="icon fa fa-twitter" aria-hidden="true"></i> <span class="icon__fallback-text">Twitter</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Pinterest"><i class="icon fa fa-pinterest" aria-hidden="true"></i> <span class="icon__fallback-text">Pinterest</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Instagram"><i class="icon fa fa-instagram" aria-hidden="true"></i> <span class="icon__fallback-text">Instagram</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Tumblr"><i class="icon fa fa-tumblr" aria-hidden="true"></i> <span class="icon__fallback-text">Tumblr</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on YouTube"><i class="icon fa fa-youtube" aria-hidden="true"></i> <span class="icon__fallback-text">YouTube</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Vimeo"><i class="icon fa fa-vimeo" aria-hidden="true"></i><span class="icon__fallback-text">Vimeo</span></a></li>
                    </ul>
                </div>
            </div>
            
            
        </div>
        
    </div>
@endsection