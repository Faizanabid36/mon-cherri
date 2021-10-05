@extends('layouts.app')
@section('title', 'Dashboard - Vouchers')
@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Promotion Vouchers</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Vouchers</li>
                    </ul>
                </div>
                <div class="col">
                    @permission('create.products')
                    <a href="{{route('voucher.create')}}"
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
                        <h4 class="card-title">All Vouchers</h4>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            {{--                            <form action="{{route('voucher.destroy')}}" method="POST" id="deleteAll">--}}
                            {{--                                @csrf--}}
                            {{--                                <input type="hidden" name="items" id="bs_items_forbulkDelete">--}}
                            {{--                            </form>--}}
                            <table class="datatable table table-stripped">
                                <thead>
                                <tr>
                                    @permission('delete.users')
                                    <th>
                                        <input type="checkbox" id="checkAll">
                                    </th>
                                    @endpermission
                                    <th>Promotion Code</th>
                                    <th>Status</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Starting Date</th>
                                    <th>Ending Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 1; ?>

                                @foreach($vouchers as $voucher)
                                    <tr>
                                        @permission('delete.users')
                                        <td style="padding:10px 18px;">
                                            <input type="checkbox" value="{{$voucher->id}}"
                                                   class="bs_dtrow_checkbox bs_checkItem">
                                        </td>
                                        @endpermission
                                        <td>{{$voucher->promotion_code}}</td>
                                        <td>{{$voucher->status_decorated}}</td>
                                        <td>{{$voucher->description}}</td>
                                        <td><img src="{{$voucher->image}}" width="100" alt=""></td>
                                        <td>{{$voucher->starting_date->diffForHumans()}}</td>
                                        <td>{{$voucher->ending_date->diffForHumans()}}</td>
                                        <td>
                                            <div class="actions">
                                                @permission('edit.users')
                                                <a href="{{route('voucher.edit',$voucher->id)}}"
                                                   class="btn btn-sm bg-success-light mr-2">Edit</a>
                                                @endpermission
                                                @permission('delete.users')
                                                <a href="javascript:void(0)"
                                                   class="btn btn-sm bg-danger-light bs_delete"
                                                   data-route="{{route('voucher.delete',$voucher->id)}}"><i
                                                        class="fa fa-trash"></i> Delete</a>
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
