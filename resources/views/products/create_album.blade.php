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
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Gallery Name</label>
                                                <input class="form-control " type="text" placeholder="Gallery Name"
                                                       name="title" required>
                                                @if($errors->has('title'))
                                                    @foreach($errors->get('title') as $message)
                                                        <span style="color:red">{{$message}}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">360 Gallery</label>
                                                <button class="btn btn-dark">
                                                    <a href="#" target="_blank" class="text-white">360 Images</a>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
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
