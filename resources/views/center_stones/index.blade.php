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
                <div class="col">
                    @permission('create.products')
                    <a href="{{route('center_stone.create')}}"
                       class="btn btn-success bs_dashboard_btn bs_btn_color float-right">Create New</a>
                    @endpermission
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Center Stones</h4>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            @permission('delete.products')
                            <form action="{{route('products.bulkDelete')}}" method="POST" id="deleteAll">
                                @csrf
                                <input type="hidden" name="items" id="bs_items_forbulkDelete">
                            </form>
                            @endpermission
                            <table class="datatable table table-stripped">
                                <thead>
                                <tr>
                                    @permission('delete.products')
                                    <th>
                                        <input type="checkbox" id="checkAll">
                                    </th>
                                    @endpermission
                                    <th>Diamond Id</th>
                                    <th>Description</th>
                                    <th>Shape</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Clarity</th>
                                    <th>Polish</th>
                                    <th>Symm</th>
                                    <th>Fluor</th>
                                    <th>Lab</th>
                                    <th>Certificate No</th>
                                    <th>Vendor Stock No</th>
                                    <th>Price</th>
                                    <th>Price CC</th>
                                    <th>Seller</th>
                                    <th>Ham Page</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 1; ?>
                                @foreach($center_stones as $stone)
                                    <tr>
                                        @permission('delete.products')
                                        <td style="padding:10px 18px;">
                                            <input type="checkbox" value="{{$stone->id}}"
                                                   class="bs_dtrow_checkbox bs_checkItem">
                                        </td>
                                        @endpermission
                                        <td>{{ucwords($stone->diamond_id)}}</td>
                                        <td>
                                            {{ucwords($stone->description??'')}}
                                        </td>
                                        <td>
                                            {{ucwords($stone->shape??'')}}
                                        </td>
                                        <td>{{ucwords($stone->size->title??'')}}</td>
                                        <td>{{ucwords($stone->color->title??'')}}</td>
                                        <td>{{ucwords($stone->clarity->title??'')}}</td>
                                        <td>{{ucwords($stone->polish??'')}}</td>
                                        <td>{{ucwords($stone->symm??'')}}</td>
                                        <td>{{ucwords($stone->fluor??'')}}</td>
                                        <td>{{ucwords($stone->lab??'')}}</td>
                                        <td>{{ucwords($stone->certificate_no??'')}}</td>
                                        <td>{{ucwords($stone->vendor_stock_no??'')}}</td>
                                        <td>{{ucwords($stone->total_price??'')}}</td>
                                        <td>{{ucwords($stone->price_cc??'')}}</td>
                                        <td>{{ucwords($stone->seller??'')}}</td>
                                        <td>{{ucwords($stone->ham_page??'')}}</td>
                                        <td>
                                            <div class="actions">
                                                @permission('edit.products')
                                                <a href="{{route('products.edit',$stone->id)}}"
                                                   class="btn btn-sm bg-success-light mr-2">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>
                                                @endpermission
                                                @permission('delete.products')
                                                <a href="javascript:void(0)"
                                                   class="btn btn-sm bg-danger-light bs_delete"
                                                   data-route="{{route('products.destroy',$stone)}}">
                                                    <i class="fe fe-trash"></i> Delete
                                                </a>
                                                @endpermission
                                            </div>
                                        </td>
                                    </tr>
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
