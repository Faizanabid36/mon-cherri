@extends('layouts.app')
@section('title', 'Dashboard - Edit Product')
@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary btn-lg">
                        <a href="{{url()->previous()}}" class="text-white"><i
                                class="fe fe-arrow-left">{{' '}}{{ __('Back') }}</i></a>
                    </button>
                </div>
            </div>
        </div>
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Navigation Links</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{url('/products')}}"
                               class="btn btn-danger btn-sm text-white mr-2">
                                <i class="fe fe-list-bullet"></i> Products
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{route('products.edit',$product->id)}}" class="btn btn-sm bg-success-light mr-2">
                                <b><u><i><i class="fe fe-pencil"></i> Edit</i></u></b>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('product.album.product_album',$product->id)}}"
                               class="btn btn-sm bg-warning-light"
                               data-route="{{route('product.album.product_album',$product->id)}}">
                                <i class="fe fe-file-image"></i> Album
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('product.variations.add',$product->id)}}"
                               class="btn btn-sm bg-info-light"
                               data-route="{{route('product.variations.get',$product->id)}}">
                                <i class="fe fe-activity"></i> Variations
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('product.center_stone.add',$product->id)}}"
                               class="btn btn-sm bg-secondary text-white"
                               data-route="{{route('product.center_stone.add',$product->id)}}">
                                <i class="fe fe-diamond"></i> Stone
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Product Details</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('products.update',$product)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Name:</label>
                                        <input type="text" name="name" value="{{ ucwords($product->name) }}"
                                               class="form-control @error('name') is-invalid @enderror" required>
                                        @if($errors->has('name'))
                                            @foreach($errors->get('name') as $message)
                                                <span style="color:red">{{$message}}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Price ($)</label>
                                                <input type="text" value="{{ $product->price }}" id="price" name="price"
                                                       class="form-control @error('price') is-invalid @enderror product_prices"
                                                       required>
                                                @if($errors->has('price'))
                                                    @foreach($errors->get('price') as $message)
                                                        <span style="color:red">{{$message}}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Old Price ($)</label>
                                                <input type="text" value="{{ $product->old_price }}" id="old_price"
                                                       name="old_price" class="form-control product_prices">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Category:</label>
                                        <select class="form-control @error('category') is-invalid @enderror"
                                                id="category" data-route="{{url('get_more_product_details')}}"
                                                name="category" required>
                                            @foreach(App\Category::all() as $category)
                                                <option value="{{$category->id}}"
                                                <?php
                                                    foreach ($product->categories as $p_category) {
                                                        if ($category->id == $p_category->id) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?>
                                                >{{ucwords($category->title)}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('category'))
                                            @foreach($errors->get('category') as $message)
                                                <span style="color:red">{{$message}}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Percent Off</label>
                                                <input type="text" value="{{ $product->percent_off }}" id="percent_off"
                                                       name="percent_off" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Stock</label>
                                                <input type="number" name="stock" class="form-control" min="1"
                                                       value="{{$product->stock}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Is Product New?</label>
                                                <select class="form-control" name="is_new">
                                                    <option value="0" {{ $product->is_new == 0 ? "selected":"" }}>No
                                                    </option>
                                                    <option value="1" {{ $product->is_new == 1 ? "selected":"" }}>Yes
                                                    </option>
                                                </select>
                                                @if($errors->has('is_new'))
                                                    @foreach($errors->get('is_new') as $message)
                                                        <span style="color:red">{{$message}}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row" id="more_details" style="overflow: auto;">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Product SubCategories:</label>
                                                <select
                                                    class="form-control bs_categories @error('subcategory') is-invalid @enderror"
                                                    data-route="{{url('get_sub_subcategories')}}" name="subcategory[]"
                                                    id="_subcategories" multiple style="width: 100%"> required>
                                                    @foreach ($product->categories as $p_categories)
                                                        @foreach ($p_categories->subcategories as $p_cat_subcategories)
                                                            <option value="{{$p_cat_subcategories->id}}"
                                                            <?php
                                                                foreach ($product->subcategories as $p_subcategory) {
                                                                    if ($p_cat_subcategories->id == $p_subcategory->id) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?>
                                                            >{{ucwords($p_cat_subcategories->title)}}</option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                                @if($errors->has('subcategory'))
                                                    @foreach($errors->get('subcategory') as $message)
                                                        <span style="color:red">{{$message}}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Product K types</label>
                                                <select class="form-control @error('tags') is-invalid @enderror"
                                                        style="width: 100%" id="_tags" name="tags[]" multiple>
                                                    @foreach($product->tags as $tag)
                                                        <option value="{{ucwords($tag->name)}}"
                                                                selected>{{ucwords($tag->name)}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('tags'))
                                                    @foreach($errors->get('tags') as $message)
                                                        <span style="color:red">{{$message}}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 edit_images_box">
                                    <div class="container">
                                        <div class="row">
                                            @foreach($product->images as $image)
                                                <div class="col-sm-2 edit_images">
                                                    <a href="{{route('image.delete',$image->id)}}"
                                                       class="btn del_p_image_btn"><i
                                                            class="material-icons">clear</i></a>
                                                    <img src="{{url($image->url)}}" width="100%">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="input-images"></div>
                                    <br>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Video Link</label>
                                        <input type="text" id="video_link" name="video_link"
                                               value="{{ $product->video }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    @if($errors->has('description'))
                                        @foreach($errors->get('description') as $message)
                                            <span style="color:red">{{$message}}</span>
                                        @endforeach
                                    @endif
                                    <textarea rows="8" name="description"
                                              class="form-control summernote @error('description') is-invalid @enderror">{{ $product->description }}</textarea>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-lg btn-success bs_dashboard_btn bs_btn_color">
                                    UPDATE
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('change', '#category', function () {
                var cat_id = $(this).val();
                var route = $(this).attr('data-route');
                if (cat_id != '') {
                    $.ajax({
                        url: route,
                        method: 'POST',
                        data: {id: cat_id, '_token': '<?=csrf_token()?>'},
                        success: function (data) {
                            $("#more_details").html(data.html);
                            $("#more_details").slideDown('slow');
                            $('#_tags').select2({
                                tags: true,
                            });
                            $('#_sizes').select2();
                            $('#_colors').select2();
                            $('#_subcategories').select2();
                        }
                    });
                } else {
                    $("#more_details").slideUp('slow')
                    $("#more_details").empty();
                }
            });
            $('#_tags').select2({
                tags: true,
            });
            $('#_sizes').select2();
            $('#_colors').select2();
            $('#_subcategories').select2();

            $('.input-images').imageUploader();
        })
    </script>
@endsection
