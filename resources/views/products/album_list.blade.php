@extends('layouts.app')
@section('title', 'Dashboard - Product Album')
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
                        <h4 class="card-title">Album</h4>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">

                            <form action="{{route('product.variations.bulk_delete')}}" method="POST" id="deleteAll">
                                @csrf
                                <input type="hidden" name="items" id="bs_items_forbulkDelete">
                            </form>
                            <table class="datatable table table-stripped">
                                <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="checkAll">
                                    </th>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Images</th>
                                    <th>Has 360 Images</th>
                                    <th>Created On</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($album as $image)
                                    @if(is_null($image->rotatory_image_id))
                                        <tr>
                                            <td style="padding:10px 18px;">
                                                <input type="checkbox" value="{{$image->id}}"
                                                       class="bs_dtrow_checkbox bs_checkItem">
                                            </td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ucwords($image->title)}}</td>
                                            <td>
                                                {{\App\ProductAlbum::whereProductId($image->product_id)->whereTitle($image->title)->whereNotNull('url')->count()}}
                                            </td>
                                            <td>{{\App\ProductAlbum::whereProductId($image->product_id)->where('has_rotatory_image',1)->whereTitle($image->title)->whereNotNull('url')->count()}}</td>
                                            <td>{{$image->created_at->format('d-m-Y')}}</td>
                                            <td>
                                                <div class="actions">
                                                    {{--                                                    <a href="#"--}}
                                                    <a href="{{route('product.album.edit',[$image->product->id,$image->title])}}"
                                                       class="btn btn-sm bg-success-light mr-2">
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
                                                    <a href="javascript:void(0)"
                                                       class="btn btn-sm bg-danger-light bs_delete"
                                                       {{--                                                       data-route="{{route('product.variations.destroy',$image)}}">--}}
                                                       data-route="#">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.attr_modal')
@endsection
