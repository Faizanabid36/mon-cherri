<div class="mb-5">
    <div class="container">
        <div class="row">
            <div class="header">
                <h2>Join our mailing list</h2>
                <p>Join our mailing list &amp; receive updates on new products, Latest blog posts &amp; more</p>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <form>
                    <fieldset style="min-width: 0;padding: 0;margin: 0;border: 0;">
                        <div class="row">
                            <div class="form-group col-md-6 col-lg-4 col-xl-4 required">

                                <input name="firstname" class="subs" value="" placeholder="Name" id="input-firstname"
                                       type="text">
                            </div>
                            <div class="form-group col-md-6 col-lg-8 col-xl-8 required">
                                <input name="lastname" class="subs" value="" placeholder="Email" id="input-lastname"
                                       type="text">
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
            <div class="col-lg-4"></div>


        </div>
    </div>
</div>

<div class="container-fluid footer">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 text-center">
            <img src="{{asset('images/logo-white.png')}}" width="60%" alt="">
        </div>
        <div class="col-lg-3"></div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-3 col-lg-12">

            <nav class="grid__item footer-nav"><!-- for mobile -->
                <ul id="siteNavs" class="site-nav medium center hidearrow list-unstyled text-center">
                    <li style="font-size: 14px" class="lvl1 parent megamenu"><a href="{{url('/')}}">Home</a>
                    </li>
                    <li style="font-size: 14px" class="lvl1 parent megamenu"><a href="#">About US</a>
                    </li>
                    <li style="font-size: 14px" class="lvl1 parent megamenu"><a href="#">Engagement</a></li>
                    {{--                    <li style="font-size: 14px;" class="lvl1 parent dropdown"><a href="#">Rings</a></li>--}}
                    <li style="font-size: 14px" class="lvl1 parent megamenu"><a href="#">Privacy Policy</a>
                    </li>
                    <li style="font-size: 14px" class="lvl1 parent megamenu"><a href="#">Terms And Conditions</a>
                    </li>

                </ul>
            </nav>
            <!--End Desktop Menu-->

            <div class="End-footer">
                <div class="social-icon">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </div>
                <div class="text">
                    <p>Copyright &copy; 2021 MonCheri- All Rights Reserved.</p>
                </div>
                <div class="img">
                    <img src="{{asset('images/icon-11.jpg')}}" class="img-fluid" alt="">
                    <img src="{{asset('images/icon-13.jpg')}}" class="img-fluid" alt="">
                    <img src="{{asset('images/icon-14.jpg')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ---- footer ---  -->
{{--      <footer id="footer">--}}
{{--       <div class="container">--}}

{{--           <div class="row">--}}

{{--               <div class="col-lg-3">--}}
{{--                   <div class="logo">--}}
{{--                      <div class="text">--}}
{{--                        <div class="title">--}}
{{--                            <h4>{{__('Watch THE BRAND')}}</h4>--}}
{{--                        </div>--}}
{{--                        <div class="txt">--}}
{{--                            <p>{{__('We have earned a reputation of being good at what we do. Let us take your online shop to new dimension in success')}}!</p>--}}
{{--                            <p>{{__('Offering customized options lower the overall inventory and overhead of the business')}}.</p>--}}
{{--                        </div>--}}
{{--                      </div>--}}

{{--                      <div class="icon">--}}
{{--                          <ul class="list-unstyled">--}}
{{--                              <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>--}}
{{--                              <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>--}}
{{--                              <li><a href=""><i class="fa fa-pinterest-p"></i></a></li>--}}
{{--                              <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>--}}
{{--                              <li><a href=""><i class="fa fa-youtube" aria-hidden="true"></i></a></li>--}}
{{--                          </ul>--}}
{{--                      </div>--}}
{{--                   </div>--}}
{{--               </div>--}}

{{--               <div class="col-lg-3">--}}
{{--                   <div class="title ">--}}
{{--                       <h5>{{__('OUR BRAND')}}</h5>--}}
{{--                   </div>--}}
{{--                <div class="brand">--}}
{{--                    <ul class="list-unstyled">--}}
{{--                        <li><a href="">{{__('About us')}}</a></li>--}}
{{--                        <li><a href="">{{__('FAQs')}}</a></li>--}}
{{--                        <li><a href="">{{__('Contact Us')}}</a></li>--}}
{{--                        <li><a href="">{{__('Orders and Returns')}}</a></li>--}}
{{--                        <li><a href="">{{__('Support Center')}}</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-3">--}}
{{--                <div class="title">--}}
{{--                    <h5>{{__('CUSTOMER CARE')}}</h5>--}}
{{--                </div>--}}
{{--                <div class="customer">--}}
{{--                    <ul class="list-unstyled">--}}
{{--                        <li><a href="">{{__('Help & FAQs')}}</a></li>--}}
{{--                        <li><a href="">{{__('Returns Policy')}}</a></li>--}}
{{--                        <li><a href="">{{__('Privacy policy')}}</a></li>--}}
{{--                        <li><a href="">{{__('Terms & Conditions')}}</a></li>--}}
{{--                        <li><a href="">{{__('Career')}}</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-3">--}}
{{--                <div class="title">--}}
{{--                    <h5>{{__('KEEP UP WITH US')}}</h5>--}}
{{--                </div>--}}
{{--                <div class="form">--}}
{{--                    <div class="text">--}}
{{--                        <p>{{__('Subscribe for new style releases and special events')}}.</p>--}}
{{--                    </div>--}}

{{--                    <form action="">--}}
{{--                        <div class="form-group">--}}
{{--                          <label for=""></label>--}}
{{--                          <input type="email" class="form-control" name="" id="subscribe_email" placeholder="Email Address">--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <button type="button" name="" id="" class="btn" >{{__('subscribe')}}</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--           </div>--}}

{{--       </div>--}}
{{--      </footer>--}}
<!-- --- End footer ---  -->
