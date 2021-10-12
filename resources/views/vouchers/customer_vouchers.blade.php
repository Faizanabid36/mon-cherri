@extends('layouts.app')
@section('title', 'Dashboard - Vouchers')
@section('content')
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Policies</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Customer Vouchers</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cutomer Vouchers</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="datatable table table-stripped">
                                        <thead>
                                        <tr>
                                            <th>Customer ID</th>
                                            <th>Customer Name</th>
                                            <th>Voucher ID</th>
                                            <th>Voucher Code</th>
                                            <th>Method</th>
                                            <th>Expiry Date</th>
                                            <th>Cashed</th>
                                            <th>Date Cashed</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $count = 1; ?>
                                        @foreach($customers as $customer)
                                            <tr>
                                                <td>{{$customer->user->id}}</td>
                                                <td>{{$customer->user->name}}</td>
                                                <td>{{$customer->voucher->id}}</td>
                                                <td>{{$customer->voucher->promotion_code}}</td>
                                                <td>{{$customer->method}}</td>
                                                <td>{{\Carbon\Carbon::parse($customer->voucher->ending_date)->format('m-d-Y')}}</td>
                                                <td>
                                                    <span
                                                        class="badge {{$customer->cashed?'bg-success':'bg-secondary'}}  text-light float-end">{{$customer->cashedDecorated}}</span>
                                                </td>
                                                <td>{{$customer->cashed? \Carbon\Carbon::parse($customer->updated_at)->format('m-d-Y'): '---'}}</td>
                                                <td>
                                                    <a href="{{route('customer_vouchers.update_cashed',$customer->id)}}"
                                                       class="btn btn-sm {{$customer->cashed?'btn-danger':'btn-primary'}}">
                                                        {{$customer->cashed?'Mark as Not Cashed ':'Mark as Cashed'}}
                                                    </a>
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
        </div>
    </div>
    @include('partials.attr_modal')
@endsection
