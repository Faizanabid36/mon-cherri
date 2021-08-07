@extends('layouts.app')
@section('title', 'Dashboard - Products')
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
                            <a href="{{route('products.edit',$product_id)}}" class="btn btn-sm bg-success-light mr-2">
                                <i class="fe fe-pencil"></i> Edit
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('product.album.product_album',$product_id)}}"
                               class="btn btn-sm bg-warning-light"
                               data-route="{{route('product.album.product_album',$product_id)}}">
                                <b><u><i><i class="fe fe-file-image"></i> Album</i></u></b>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('product.variations.add',$product_id)}}"
                               class="btn btn-sm bg-info-light"
                               data-route="{{route('product.variations.get',$product_id)}}">
                                <i class="fe fe-activity"></i> Variations
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('product.center_stone.add',$product_id)}}"
                               class="btn btn-sm bg-secondary text-white"
                               data-route="{{route('product.center_stone.add',$product_id)}}">
                                <i class="fe fe-diamond"></i> Stone
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col">
                    <a href="{{route('product.album.create',$product_id)}}"
                       class="btn btn-success bs_dashboard_btn bs_btn_color float-right">Create New</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">360 Images Album "{{ucfirst($album->title)}}"
                            of Product "{{ucfirst($album->product->name)}}"
                        </div>
                    </div>
                    <div class="card-body">
                    <form action="{{route('product.album.update_360_image')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf

                            <div class="container">
                                <div class="row">
                                    @foreach($images as $image)
                                        <div class="col-sm-2 edit_images">
                                            <a href="{{route('product.album.delete_image',$image->id)}}"

                                                class="btn del_p_image_btn"><i
                                                    class="material-icons">clear</i></a>
                                            <img src="{{url($image->path)}}" width="100%">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="input-images"></div>
                            <input value="{{$album->id}}" hidden name="product_album_id"/>
                            <input value="{{$album->product->id}}" hidden name="product_id"/>
                            <div class="text-right">
                                <button type="submit" class="btn btn-lg btn-success bs_dashboard_btn bs_btn_color">
                                    Save
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

            $('.input-images').imageUploader({Default: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml']});
        })
    </script>
@endsection
