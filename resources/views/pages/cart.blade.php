@extends('layouts.master')
@section('title', 'Cart')
@section('content')         
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">{{__('Your cart')}}</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 main-col">
        		@if(Cart::count() > 0)
                	<table>
                            <thead class="cart__row cart__header">
                                <tr>
                                    <th colspan="2" class="text-center">{{__('Product')}}</th>
                                    <th class="text-center">{{__('Size')}}</th>
                                    <th class="text-center">{{__('Price')}}</th>
                                    <th class="text-center">{{__('Quantity')}}</th>
                                    <th class="text-right">{{__('Total')}}</th>
                                    <th class="action">&nbsp;</th>
                                </tr>
                            </thead>
                    		<tbody>
                    			<?php 
			                    $cartcontent = Cart::content();
			                    ?>
			                    @foreach($cartcontent as $item)
			                    <form action="{{url('updateItem')}}" method="post" class="cart style2 bs_form">
	                				@csrf
	                                <tr class="cart__row border-bottom line1 cart-flex border-top">
	                                    <td class="cart__image-wrapper cart-flex-item">
	                                        <a href="#"><img class="cart__image" src="{{url('/',$item->model->image->url)}}" alt="Elastic Waist Dress - Navy / Small"></a>
	                                    </td>
	                                    <td class="cart__meta small--text-left cart-flex-item">
	                                        <div class="list-view-item__title">
	                                            <a href="#">{{ucwords($item->name)}}</a>
	                                        </div>
	                                        
	                                        <div class="cart__meta-text">
	                                            {{__('Quantity')}}: {{$item->qty}}<br> 
	                                            <br>
	                                        </div>
	                                    </td>
	                                    <td class="cart__price-wrapper cart-flex-item">
	                                        <select class="form-control choose_size" name="size" required>
					                          @if(!$item->options->size)
					                            <option value="">Choose Size</option>
					                            <script type="text/javascript">
					                              var x = document.getElementsByClassName("choose_size");
					                              var i;
					                              for (i = 0; i < x.length; i++) {
					                                if(!x[i].value){
					                                  x[i].style.border = "1px solid red";
					                                }
					                              }
					                            </script>
					                          @endif
					                          @foreach($item->model->sizes as $size)
					                            @if($item->options->size == $size->size)
					                              <option value="{{$size->size}}" selected>{{$size->size}}</option>
					                            @else
					                              <option value="{{$size->size}}">{{$size->size}}</option>
					                            @endif
					                          @endforeach
					                        </select>
	                                    </td>
	                                    <td class="cart__price-wrapper cart-flex-item">
	                                        <span class="money">{{currency($item->price,'USD',currency()->getUserCurrency())}}</span>
	                                    </td>
	                                    <td class="cart__update-wrapper cart-flex-item text-right">
	                                        <div class="cart__qty text-center">
	                                            <div class="qtyField">
	                                                <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa fa-minus" aria-hidden="true"></i></a>
	                                                <input class="cart__qty-input qty bs_product_qty" type="text" name="qty" id="qty" value="{{$item->qty}}" pattern="[0-9]*">
	                                                <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa fa-plus" aria-hidden="true"></i></a>
	                                            </div>
	                                        </div>
	                                    </td>
	                                    <td class="text-right small--hide cart-price">
	                                        <div><span class="money">{{currency($item->total,'USD',currency()->getUserCurrency())}}</span></div>
	                                    </td>
	                                    <td class="text-center small--hide">
	                                    	<input type="hidden" name="itemId" value="{{$item->rowId}}">
	                                    	<button type="submit" name="update" class="btn--link cart-update"><i class="fa fa-refresh"></i> {{__('Update')}}</button>
	                                    	<a href="{{url('removeCartItem?item='.$item->rowId)}}" class="btn btn--secondary cart__remove" title="Remove tem"><i class="fa fa-times" aria-hidden="true"></i></a>
	                                    </td>
	                                </tr>
                            	</form>
	                            @endforeach
                            </tbody>
                    		<tfoot>

                                <tr>
                                    <td colspan="3" class="text-left"><a href="{{url('/')}}" class="btn--link cart-continue"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> {{__('Continue shopping')}}</a></td>
                                    <td colspan="3" class="text-right">
                                    	<!-- <button type="submit" name="update" class="btn--link cart-update"><i class="fa fa-refresh"></i> {{__('Update')}}</button> -->
                                    </td>
                                </tr>
                            </tfoot>
                    </table>
                @else
                	<div class="alert alert-info">
                		{{__('Your Cart Is Empty')}} <a href="{{url('/')}}"><b>{{__('Continue shopping')}}</b></a>
                	</div>
               	@endif
                    
                    <div class="currencymsg">{{__('We processes all orders in USD. While the content of your cart is currently displayed in your selected currency, the checkout will use USD at the most current exchange rate')}}.</div>
                    <hr>                   
               	</div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
                	
                    <div class="solid-border">
                      <div class="row">
                      	<span class="col-12 col-sm-6 cart__subtotal-title"><strong>{{__('Subtotal')}}</strong></span>
                        <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money">
                        	{{currency(str_replace(',','',Cart::total()),'USD',currency()->getUserCurrency())}}</span></span>
                      </div>
                      <div class="cart__shipping">{{__('Shipping  taxes calculated at checkout')}}</div>
                      <p class="cart_tearm">
                        <label>
                          <input type="checkbox" name="tearm" id="cartTearm" class="checkbox" value="tearm" required="">
                           {{__('I agree with the terms and conditions')}}</label>
                      </p>
                      <input type="button" name="checkout" id="cartCheckout" class="btn btn--small-wide checkout" value="Checkout" onclick="window.location.href = '<?=url('/checkout')?>' ">
                    </div>

                </div>
            </div>
        </div>
        
    </div>
@endsection