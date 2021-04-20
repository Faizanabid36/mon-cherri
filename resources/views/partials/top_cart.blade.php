<a href="javascript:void(0)" class="site-header__cart1 text-white top_cart" title="Cart">
    <i class="fa fa-shopping-cart top_cart" aria-hidden="true"></i>
    <span id="CartCount" class="site-header__cart-count" data-cart-render="item_count">{{Cart::count()}}</span>
</a>
<!--Minicart Popup-->
<div id="header-cart" class="site-header1 block block-cart">
    <ul class="mini-products-list">
        <?php
        $top_cartcontents = Cart::content();
        ?>

        @foreach($top_cartcontents as $top)
            <li class="item">
                <a class="product-image" href="#">
                    <img src="{{url('/',$top->model->image->url)}}" alt="{{$top->name}}" />
                </a>
                <div class="product-details">
                    <a href="javascript:void(0)" class="remove remove_item" data-route="{{url('removeCartItem?item='.$top->rowId)}}" ><i class="fa fa-times" aria-hidden="true"></i></a>

                    <a class="pName" href="{{url('/'.$top->model->slug)}}">{{ucwords($top->name)}}</a>
                    <div class="wrapQtyBtn">
                        <div class="qtyField">
                            <span class="label">{{__('Qty')}} : {{$top->qty}}</span>
                        </div>
                    </div>
                    <div class="priceRow">
                        <div class="product-price">
                            <span class="money">{{currency($top->total,'USD',currency()->getUserCurrency())}}</span>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    <div class="total">
        <div class="total-in">
            <span class="label">{{__('Cart Subtotal')}} :</span><span class="product-price"><span class="money">{{currency(Cart::total(),'USD',currency()->getUserCurrency())}}</span></span>
        </div>
        <div class="buttonSet text-center">
            <a href="{{url('/cart')}}" class="btn btn-secondary btn--small">{{__('View Cart')}}</a>
            <a href="{{url('/checkout')}}" class="btn btn-secondary btn--small">{{__('Checkout')}}</a>
        </div>
    </div>
</div>
<!--End Minicart Popup-->

