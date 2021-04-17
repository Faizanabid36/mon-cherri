@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="content container-fluid">
                    
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Welcome {{ucwords(Auth::user()->name)}}</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <?php
                        $products = DB::table('products')->count();
                    ?>
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon bg-success">
                            <i class="fe fe-folder"></i>
                        </span>
                        <div class="dash-count">
                            <i class="fa fa-arrow-up text-success"></i>
                        </div>
                    </div>
                    <div class="dash-widget-info">
                        <h3>{{$products}}</h3>
                        <h6 class="text-muted">Products</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success w-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <?php
                        $customers = App\User::whereHas('roles', function($q){
                            $q->where('slug', 'customer');
                        })->get();
                    ?>
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon bg-primary">
                            <i class="fe fe-users"></i>
                        </span>
                        <div class="dash-count">
                            <i class="fa fa-arrow-up text-success"></i>
                        </div>
                    </div>
                    <div class="dash-widget-info">
                        <h3>{{count($customers)}}</h3>
                        <h6 class="text-muted">Customers</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary w-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <?php
                        $sales = DB::table('orders')->count();
                    ?>
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon bg-danger">
                            <i class="fe fe-credit-card"></i>
                        </span>
                        <div class="dash-count">
                            <i class="fa fa-arrow-up text-success"></i>
                        </div>
                    </div>
                    <div class="dash-widget-info">
                        <h3>{{$sales}}</h3>
                        <h6 class="text-muted">Sales</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger w-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <?php
                        $revenue = DB::table('orders')->get();
                    ?>
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon bg-warning">
                            <i class="fe fe-money"></i>
                        </span>
                        <div class="dash-count">
                            <i class="fa fa-arrow-up text-success"></i>
                        </div>
                    </div>
                    <div class="dash-widget-info">
                        <?php
                            $total = 0; 
                            foreach ($revenue as $rev) {
                                $total += $rev->amount;
                            }
                        ?>
                        <h3>{{currency($total, 'USD')}}</h3>
                        <h6 class="text-muted">Revenue</h6>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning w-50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Orders</h4>
                </div>

                <div class="card-body">

                    <h1>{{ $chart->options['chart_title'] }}</h1>
                    {!! $chart->renderHtml() !!}

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
{!! $chart->renderChartJsLibrary() !!}
{!! $chart->renderJs() !!}
@endsection