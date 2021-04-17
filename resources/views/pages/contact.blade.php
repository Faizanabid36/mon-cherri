@extends('layouts.master')
@section('title', 'Contact')

@section('content')
 	<!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">{{__('Contact Us')}}</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        <div class="map-section map">
        	<iframe src="https://www.google.com/maps/embed?pb=" height="350" allowfullscreen></iframe>
        </div>
        
        <div class="container">
            <div class="row">
            	<div class="col-12 col-sm-12 col-md-8 col-lg-8 mb-4">
                	<h2>{{__('Drop Us A Line')}}</h2>
                    <p>{{__('Lorem Ipsum  um texto modelo da   e de Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de  ')}}</p>
                	<div class="formFeilds contact-form form-vertical">
                   	 <form class="ps-contact__form bs_form" action="{{route('contact.store')}}" method="post">
	            	@csrf()
	              <div class="row">   
	                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
	                      <div class="form-group">
	                        <label>{{__('Name ')}}<sub>*</sub></label>
	                        <input class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" name="name" type="text" placeholder="Your full name" required>
	                          @if($errors->has('name'))
	                            @foreach($errors->get('name') as $message)
	                              <span style="color:red">{{$message}}</span>
	                            @endforeach
	                          @endif
	                      </div>
	                    </div>
	                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
	                      <div class="form-group">
	                        <label>{{__('Email ')}}<sub>*</sub></label>
	                        <input class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" name="email" type="email" placeholder="Your email address" required>
	                        @if($errors->has('email'))
	                            @foreach($errors->get('email') as $message)
	                              <span style="color:red">{{$message}}</span>
	                            @endforeach
	                          @endif
	                      </div>
	                    </div>
	                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
	                      <div class="form-group mb-25">
	                        <label>{{__('Your Message')}} <sub>*</sub></label>
	                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="6" required>{{ old('message') }}</textarea>
	                        @if($errors->has('message'))
	                            @foreach($errors->get('message') as $message)
	                              <span style="color:red">{{$message}}</span>
	                            @endforeach
	                         @endif
	                      </div>
	                      <div class="form-group">
	                        <button type="submit" class="btn bs_form_btn">{{__('Send Message')}}<i class="fa fa-long-arrow-right"></i></button>
	                      </div>
	                    </div>
	              </div>
	            </form>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                	<div class="open-hours">
                    	<strong>Opening Hours</strong><br>
						Mon - Sat : 9am - 11pm<br>
						Sunday: 11am - 5pm
                    </div>
                	<hr />
                    <ul class="addressFooter">
                        <li><i class="icon fa fa-map-marker" aria-hidden="true"></i><p>55 Gallaxy Enque, 2568 steet, 23568 NY</p></li>
                        <li class="phone"><i class="icon fa fa-phone" aria-hidden="true"></i><p>(440) 000 000 0000</p></li>
                        <li class="email"><i class="icon fa fa-envelope" aria-hidden="true"></i><p><a href="https://www.annimexweb.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4c3f2d20293f0c3523393f253829622f2321">[email&#160;protected]</a></p></li>
                    </ul>
                    <hr />
                    <ul class="list--inline site-footer__social-icons social-icons">
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Facebook"><i class="icon fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Twitter"><i class="icon fa fa-twitter" aria-hidden="true"></i> <span class="icon__fallback-text">Twitter</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Pinterest"><i class="icon fa fa-pinterest" aria-hidden="true"></i> <span class="icon__fallback-text">Pinterest</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Instagram"><i class="icon fa fa-instagram" aria-hidden="true"></i> <span class="icon__fallback-text">Instagram</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Tumblr"><i class="icon fa fa-tumblr" aria-hidden="true"></i> <span class="icon__fallback-text">Tumblr</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on YouTube"><i class="icon fa fa-youtube" aria-hidden="true"></i><span class="icon__fallback-text">YouTube</span></a></li>
                        <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Vimeo"><i class="icon fa fa-vimeo" aria-hidden="true"></i> <span class="icon__fallback-text">Vimeo</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
@endsection