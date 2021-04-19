<div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
  <!-- filter form -->
    <form method="get" id="filter_form">
	<div class="closeFilter d-block d-md-none d-lg-none"><i class="fa fa-times" aria-hidden="true"></i></div>
	<div class="sidebar_tags">
      	<!--Categories-->
        <div class="sidebar_widget filterBox filter-widget">
            <div class="widget-title"><h2>{{__('Categories')}}</h2></div>
            <ul>
               @php $subcategory = $major_category->subcategories; @endphp
              @foreach($subcategory as $subcat)

                @php
                   $subcat_filter_id = $subcat->slug.$subcat->id;
                @endphp

                <li data-filter-id="{{$subcat_filter_id}}" class="filter_item">

                  <input type="checkbox" data-filter-id="{{$subcat_filter_id}}" class="filter_item" {{(request()->subcategory == $subcat->slug) ? 'checked' : ''}}>

                  <label data-filter-id="{{$subcat_filter_id}}" class="filter_item" ><span><span></span></span>{{__(ucwords($subcat->title))}}</label>

                   <input type="radio" name="subcategory" id="{{$subcat_filter_id}}" value="{{$subcat->slug}}" style="visibility: hidden;" {{(request()->subcategory == $subcat->slug) ? 'checked' : ''}}>

                </li>
              @endforeach
            </ul>
        </div>
        <!--Categories-->
        <!--Price Filter-->
        <div class="sidebar_widget filterBox filter-widget">
            <div class="widget-title">
            	<h2>Price</h2>
            </div>
              <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
              	<div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                  <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="10"></span>
                  <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
              </div>
              <div class="row">
                  <div class="col-6">
                      <p class="no-margin">
                        <input id="amount" type="text">
                      </p>
                  </div>
                  <div class="col-6 text-right margin-25px-top">
                    <input type="hidden"  value="" id="price_min">
                    <input type="hidden"  value="" id="price_max">
                    <button type="button" class="btn btn-secondary btn--small" onclick="
                    document.getElementById('price_min').setAttribute('name', 'price_min');
                    document.getElementById('price_max').setAttribute('name', 'price_max');
                    document.getElementById('filter_form').submit();">{{__('filter')}}</button>
                  </div>
              </div>
        </div>
        <!--End Price Filter-->
        <!--Size Swatches-->
        <div class="sidebar_widget filterBox filter-widget size-swacthes">
            <div class="widget-title"><h2>{{__('Size')}}</h2></div>
            <div class="filter-color swacth-list">
            	<ul>
                @php $sizes = $major_category->sizes; @endphp
                @foreach($sizes->chunk(4) as $chunk)
                    @foreach($chunk as $size)

                      @php
                       $size_filter_id = $size->slug.$size->id;
                      @endphp

                      <li data-filter-id="{{$size_filter_id}}" class="filter_item">

                        <label data-filter-id="{{$size_filter_id}}" class="filter_p filter_size_p filter_item" >

                          <span class="swacth-btn {{(request()->size == $size->size) ? 'checked' : ''}} filter_item"  data-filter-id="{{$size_filter_id}}" >{{$size->size}}</span>

                           <input type="radio" name="size" id="{{$size_filter_id}}" value="{{$size->slug}}" style="visibility: hidden;" {{(request()->size == $size->slug) ? 'checked' : ''}}>

                        </label>

                      </li>
                    @endforeach
                    <br>
                @endforeach
                </ul>
            </div>
        </div>
        <!--End Size Swatches-->
        <!--Color Swatches-->
        <div class="sidebar_widget filterBox filter-widget">
            <div class="widget-title"><h2>{{__('Color')}}</h2></div>
            <div class="filter-color swacth-list clearfix">
              @php  $colors = App\Color::all(); @endphp
              @foreach($colors as $color)

              @php
               $color_filter_id = $color->slug.$color->id;
              @endphp

                <label data-filter-id="{{$color_filter_id}}" class="filter_item">

                  <span class="swacth-btn {{$color->color}} {{(request()->color == $color->slug) ? 'checked' : ''}}  filter_item" data-filter-id="{{$color_filter_id}}" >

                    <input type="radio" name="color" id="{{$color_filter_id}}" value="{{$color->slug}}" style="visibility: hidden;" {{(request()->color == $color->slug) ? 'checked' : ''}}>
                  </span>

                </label>
              @endforeach
            </div>
        </div>
        <!--End Color Swatches-->
        <!--Brand-->
        <div class="sidebar_widget filterBox filter-widget">
            <div class="widget-title"><h2>{{__('Brands')}}</h2></div>
            <ul>
              @php $brands = $major_category->brands; @endphp
              @foreach($brands as $brand)

              @php
               $brand_filter_id = $brand->slug.$brand->id;
              @endphp

                <li data-filter-id="{{$brand_filter_id}}" class="filter_item">

                  <input type="checkbox" data-filter-id="{{$brand_filter_id}}" class="filter_item" {{(request()->brand == $brand->slug) ? 'checked' : ''}} >

                  <label data-filter-id="{{$brand_filter_id}}" class="filter_item">

                    <span><span></span></span>{{ucwords($brand->title)}}
                    <input type="radio" name="brand" id="{{$brand_filter_id}}" value="{{$brand->slug}}" style="visibility: hidden;" class="filter_checkbox" {{(request()->brand == $brand->slug) ? 'checked' : ''}} >

                  </label>

                </li>
              @endforeach
            </ul>
        </div>
        <!--End Brand-->
        <!--Popular Products-->
      <div class="sidebar_widget">
        <div class="widget-title"><h2>{{__('Popular Products')}}</h2></div>
        <div class="widget-content">
            <div class="list list-sidebar-products">
              <div class="grid">
                <?php  
                  $top_on_sale_products = App\Product::latest()->limit(4)->get();
                  $collection = collect($top_on_sale_products);
                  $top_sale_products = $collection->sortBy('orders');
                ?>
                @foreach($top_sale_products as $top_sale_product)
                <div class="grid__item">
                  <div class="mini-list-item">
                    <div class="mini-view_image">
                        <a class="grid-view-item__link" href="{{url('/'.$top_sale_product->slug)}}">
                            <img class="grid-view-item__image" src="{{asset($top_sale_product->image->url)}}" alt="" />
                        </a>
                    </div>
                    <div class="details"> <a class="grid-view-item__title" href="{{url('/'.$top_sale_product->slug)}}">{{ucwords($top_sale_product->name)}}</a>
                      <div class="grid-view-item__meta"><span class="product-price__price"><span class="money">{{$top_sale_product->FormatedPrice()}}</span></span></div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
        </div>
      </div>
      <!--End Popular Products-->
    </div>
  </form>

</div>