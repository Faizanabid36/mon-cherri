@extends('layouts.app')
@section('title', 'Dashboard - Create Album')
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
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Album Data</h4>
                    </div>
                    <div class="card-body">
                        @foreach($errors->all() as $error)
                            <span style="color:red">{{$error}}</span>
                        @endforeach
                        <form action="{{route('product.album.store',$product_id)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input name="product_id" value="{{$product_id}}" hidden/>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div
                                            class="col-md-{{\Request::route()->getName()=='product.album.edit'?"10":'12'}}">
                                            <div class="form-group">
                                                <label>Gallery Name</label>
                                                <input class="form-control " type="text" placeholder="Gallery Name"
                                                       name="title"
                                                       value="{{$product_album[0]->title??''}}" required>
                                                @if($errors->has('title'))
                                                    @foreach($errors->get('title') as $message)
                                                        <span style="color:red">{{$message}}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        @if(\Request::route()->getName()=='product.album.edit')
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">360
                                                        Gallery</label>
                                                    <button
                                                        type="button"
                                                        class="btn btn-dark">
                                                        <a href="{{route('product.album.upload_360_image', $id_360->id)}}"
                                                           {{--                                                           target="_blank"--}}
                                                           class="text-white">360
                                                            Images</a>
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-12">
                                            @if(\Request::route()->getName()=='product.album.edit')
                                                <div class="container">
                                                    <div class="row">
                                                        @foreach($product_album as $image)
                                                            <div class="col-sm-2 edit_images">
                                                                <a href="{{route('product.album.delete_image_album',$image->id)}}"
                                                                   {{--                                                                <a href="{{route('image.delete',$image->id)}}"--}}
                                                                   class="btn del_p_image_btn"><i
                                                                        class="material-icons">clear</i></a>
                                                                <img src="{{url($image->url)}}" width="100%">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="input-images"></div>
                                            <br>
                                            @if($errors->has('images'))
                                                @foreach($errors->get('images') as $message)
                                                    <span style="color:red">{{$message}}</span>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-lg btn-success bs_dashboard_btn bs_btn_color">
                                    Save Album
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
            $('#variations').select2();
            $('#sizes').select2();
            $('.input-images').imageUploader({Default: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml']});
        })
    </script>
@endsection
