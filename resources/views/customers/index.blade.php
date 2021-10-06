@extends('layouts.app')
@section('title', 'Dashboard - Customers')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Customers</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Customers</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Customers</h4>
				</div>
				<div class="card-body">

					<div class="table-responsive">
						<table class="datatable table table-stripped">
							<thead>
								<tr>
									<th>Count</th>
									<th>Name</th>
									<th>Email</th>
									<th>Vouchers</th>
									<th>Phone</th>
									<th>Orders</th>
									<th>Created On</th>
								</tr>
							</thead>
							<tbody>
								<?php $count = 1; ?>
                                @foreach($customers as $customer)
                                    <tr>
                                    <td><?=$count++?></td>
                                    <td>{{$customer->name}} {{$customer->lastname}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->voucherDecorated}}</td>
									<td>{{$customer->info->phone}}</td>
									<td>
										<ul>
										@foreach($customer->orders()->latest()->get() as $c_order)
											<li>{{$c_order->product->name}}</li>
										@endforeach
										</ul>
									</td>
									<td>{{$customer->created_at->format('d-m-Y')}}</td>
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
@endsection
