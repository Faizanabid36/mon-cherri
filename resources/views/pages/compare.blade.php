@extends('layouts.master')
@section('title', 'Compare')

@section('content')
 <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">{{__('Compare Product')}}</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                	<div class="compare-page">
                      @if($products->count() > 0)
                      <div class="table-wrapper table-responsive">
                          <table class="table ps-cart__table">
                              <tbody>
                                <tr>
                                  <td>Product</td>
                                  @foreach($products as $p)
                                  <td>
                                    <a class="ps-product__preview text-uppercase" href="{{url('/'.$p->slug)}}">
                                    <img class="mr-15" src="{{url('/'.$p->image->url)}}" alt="" width="100">{{$p->name}}
                                  </a>
                                  </td>
                                  @endforeach
                                </tr>
                                <tr>
                                  <td>Pricing</td>
                                  @foreach($products->pluck('price') as $price)
                                  <td><span class="price">{{currency($price, 'USD', currency()->getUserCurrency())}}</span></td>
                                  @endforeach
                                </tr>
                                <tr>
                                  <td>Rating</td>
                                  @foreach($products->pluck('userAverageRating') as $rating)
                                  <td>
                                    <p>
                                        @for($i=1; $i<=$rating; $i++)
                                            <i class="fa fa-star bg-yellow ps-rating-stars rated-stars"></i>
                                        @endfor
                                        @for($i=$rating; $i < 5; $i++)
                                             <i class="fa fa-star bg-yellow br-current ps-rating-stars"></i>
                                        @endfor
                                    </p>
                                  </td>
                                  @endforeach
                                </tr>
                                <tr>
                                  <td>Available</td>
                                  @foreach($products->pluck('stock') as $stock)
                                    @if($stock > 0)
                                      <td><span class="status  in-stock">In stock</span></td>
                                    @else
                                      <td><span class="status">Out of stock</span></td>
                                    @endif
                                  @endforeach
                                </tr>
                                <tr>
                                  <td>Brand</td>
                                  @foreach($products->pluck('brand') as $brand)
                                  <td><span>{{$brand->title}}</span></td>
                                  @endforeach
                                </tr>
                                <tr>
                                  <td>Size</td>
                                  @foreach($products->pluck('sizes') as $sizes)
                                  <td>
                                    @foreach($sizes as $size)
                                      {{$size->size}}
                                    @endforeach
                                  </td>
                                  @endforeach
                                </tr>
                                <tr>
                                  <td>Order</td>
                                  @foreach($products as $p)
                                  <td><a class="btn add_to_cart" href="javascript:void(0)" data-product_quantity="1" data-product_id="{{$p->slug}}" data-product_size="" >Add to cart<i class="ps-icon-next"></i></a><a class="ps-product-favorite ml-10 add_to_wishlist" href="javascript:void(0)"><i class="ps-icon-heart"></i></a>
                                    <a class="btn" href="{{url('remove_from_compare_list',$p->slug)}}">
                                      <i class="fa fa-times"></i>
                                    </a></td>
                                  @endforeach
                                </tr>
                              </tbody>
                            </table>
                      </div>
                      @else
                      <div class="alert alert-info">
                        {{__('No Products in Compare List')}}
                      </div>
                      @endif
                	</div>                  
               	</div>
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
@endsection