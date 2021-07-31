@extends('layouts.app')
@section('title', 'Dashboard - Create Variation')
@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Create Album</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/products')}}">Products</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{route('product.album.product_album',$product_id)}}">Albums</a></li>
                        <li class="breadcrumb-item active">Create Album</li>
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
                                                                <a href="#"
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
