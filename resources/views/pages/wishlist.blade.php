@extends('layouts.master')
@section('title', 'Account Wishlist')
@section('content')
	    
    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">{{__('Wish List')}}</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                    @if($products->count() > 0)
                	<form action="#">
                        <div class="wishlist-table table-content table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    	<th class="product-name text-center alt-font">{{__('Remove')}}</th>
                                        <th class="product-price text-center alt-font">{{__('Images')}}</th>
                                        <th class="product-name alt-font">{{__('Product')}}</th>
                                        <th class="product-price text-center alt-font">{{__('Price')}}</th>
                                        <th class="stock-status text-center alt-font">{{__('Stock Status')}}</th>
                                        <th class="product-subtotal text-center alt-font">{{__('Add to Cart')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($products as $product)
                                    <tr>
                                    	<td class="product-remove text-center" valign="middle"><a href="{{url('remove_from_wishlist',$product->slug)}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                        <td class="product-thumbnail text-center">
                                            <a href="{{url('/').$product->slug}}"><img src="{{url(asset($product->image->url))}}" alt="" title="" /></a>
                                        </td>
                                        <td class="product-name"><h4 class="no-margin"><a href="#">{{ucwords($product->name)}}</a></h4></td>
                                        <td class="product-price text-center"><span class="amount">{{$product->FormatedPrice()}}</span></td>
                                        <td class="stock text-center">
                                        	@if($product->stock > 0)
                                            <span class="in-stock">{{__('in stock')}}</span>
                                            @else
                                            <span class="in-stock">{{__('out of stock')}}</span>
                                           @endif
                                        </td>
                                        <td class="product-subtotal text-center "><button type="button" data-product_quantity="1" data-product_id="{{$product->slug}}" data-product_size=""  class="btn btn-smal add_to_cartl" >{{__('Add To Cart')}}</button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                    @else
                    <div class="alert alert-info">
                        {{__('No Products in Wishlist')}}
                    </div>
                    @endif 
               	</div>
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
@endsection