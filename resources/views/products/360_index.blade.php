@extends('layouts.app')
@section('title', 'Dashboard - Products')
@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Products</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">360 Images Album "{{$images->first()->title}}"
                            of Product "{{ucfirst($images->first()->product_album->product->name)}}"
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-1">
                            @foreach($images as $image)
                            <div class="col-md-4">
                                <form action="{{route('product.album.update_360_image',$image->id)}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <img class="img-responsive" src="{{url($image->path)}}" alt="image" width="270"
                                             height="150">
                                        <input type="file" class="btn btn-secondary" name="path">
                                        <!-- <button class="btn btn-secondary">upload</button> -->
                                        <button type="submit" class="btn btn-primary ">Submit</button>
                                    </div>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
