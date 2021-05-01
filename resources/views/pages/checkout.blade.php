@extends('layouts.master')
@section('title', 'Checkout')

@section('content')

 <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">{{__('Checkout')}}</h1></div>
      		</div>
              @if(session()->has('message'))
              <div>
                <h2 class="alert alert-danger">
                    {{session()->get('message')}}
                </h2>
              </div>
              @endif
		</div>
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
        		@guest
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                    <div class="customer-box returning-customer">
                        <h3><i class="fa fa-user" aria-hidden="true"></i>{{__('Returning customer')}}? <a href="#customer-login" id="customer" class="text-white text-decoration-underline" data-toggle="collapse">{{__('Click here to login')}}</a></h3>
                        <div id="customer-login" class="collapse customer-content">
                            <div class="customer-info">
                                <p class="coupon-text">{{__('If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing Shipping section')}}.</p>
                                <form action="{{route('login')}}" method="post">
                                	@csrf
                                    <div class="row">
                                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputEmail1">{{__('Email address')}} <span class="required-f">*</span></label>
                                            <input type="email" class="no-margin" name="email" id="exampleInputEmail1" required>
                                        </div>
                                        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <label for="exampleInputPassword1">{{__('Password')}} <span class="required-f">*</span></label>
                                            <input type="password" name="password" id="exampleInputPassword1" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-check width-100 margin-20px-bottom">
                                                <a href="{{ route('password.request') }}" class="float-right">{{__('Forgot your password')}}?</a>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-3">{{__('Submit')}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3"></div>
                @endguest
            </div>

            <div class="row billing-fields">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 sm-margin-30px-bottom">
                    <div class="create-ac-content bg-light-gray padding-20px-all">
                        @include('partials.user-checkout')
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="your-order-payment">
                        <div class="your-order">
                            <h2 class="order-title mb-4">{{__('Your Order')}}</h2>

                            <div class="table-responsive-sm order-table"> 
                                <table class="bg-white table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-left">{{__('Product Name')}}</th>
                                            <th>{{__('Price')}}</th>
                                            <th>{{__('Size')}}</th>
                                            <th>{{__('Qty')}}</th>
                                            <th>{{__('Subtotal')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php 
					                        $cartItems = Cart::content();
					                        $delivery_charges = 0;
					                     ?>
					                     @foreach($cartItems as $item)
                                        <tr>
                                            <td class="text-left">{{ucwords($item->name)}} </td>
                                            <td>{{currency($item->price,'USD',currency()->getUserCurrency())}}</td>
                                            <td>{{$item->options->size}}</td>
                                            <td>{{$item->qty}}</td>
                                            <td>{{currency($item->total,'USD',currency()->getUserCurrency())}}</td>
                                        </tr>
                                        <?php 
                                        	$delivery_charges += $item->options->delivery_charges * $item->qty;
                                        ?>
                                        @endforeach
                                    </tbody>
                                    <?php 
			                          $cart_total = Cart::total();
			                          $total = str_replace(',','',$cart_total) + $delivery_charges;
			                        ?>
                                    <tfoot class="font-weight-600">
                                        <tr>
                                            <td colspan="4" class="text-right">Shipping </td>
                                            <td>{{currency($delivery_charges,'USD',currency()->getUserCurrency())}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right">Total</td>
                                            <td>{{currency($total,'USD',currency()->getUserCurrency())}}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        
                        <hr />

                        <div class="your-payment">
                            <h2 class="payment-title mb-3">{{__('payment method')}}</h2>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div id="accordion" class="payment-section">
                                        <div class="card mb-2">
                                            <div class="card-header">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">{{__('Cash On Delivery')}}</a>
                                            </div>
                                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <p class="no-margin font-15">{{__('Nan')}}.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="order-button-payment">
                                    <button class="btn" value="Place order" type="button" onclick="document.getElementById('checkout-form').submit()">{{__('Place order')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
@endsection