@extends('layouts.app')
@section('title', 'Dashboard - Products')
@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Center Stone</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Center Stone</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create New Center Stone</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('center_stone.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Diamond Id</label>
                                        <input type="text" name="diamond_id" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Shape</label>
                                        <input type="text" name="shape" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" name="description" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Center Stone Size</label>
                                        <select class="form-control" name="center_stone_sizes_id" id="" required>
                                            <option value="" selected disabled>Select</option>
                                            @foreach(\App\CenterStoneSize::all() as $size)
                                                <option value="{{$size->id}}">{{$size->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Center Stone Color</label>
                                        <select class="form-control" name="center_stone_colors_id" id="" required>
                                            <option value="" selected disabled>Select</option>
                                            @foreach(\App\CenterStoneColor::all() as $size)
                                                <option value="{{$size->id}}">{{$size->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Center Stone Clarity</label>
                                        <select class="form-control" name="center_stone_clarities_id" id=""
                                                required>
                                            <option value="" selected disabled>Select</option>
                                            @foreach(\App\CenterStoneClarity::all() as $size)
                                                <option value="{{$size->id}}">{{$size->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Polish</label>
                                        <input type="text" name="polish" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Fluor</label>
                                        <input type="text" name="fluor" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Symm</label>
                                        <input type="text" name="symm" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Lab</label>
                                        <input type="text" name="lab" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Certificate No.</label>
                                        <input type="text" name="certificate_no" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Vendor Stock No</label>
                                        <input type="text" name="vendor_stock_no" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Total Price</label>
                                        <input type="number" name="total_price" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Price CC</label>
                                        <input type="number" name="price_cc" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Seller</label>
                                        <input type="text" name="seller" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Ham Page</label>
                                        <input type="text" name="ham_page" class="form-control" required>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-lg btn-success bs_dashboard_btn bs_btn_color">
                                        UPLOAD
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
