@extends('layouts.app')
@section('title', 'Dashboard - Orders')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Orders</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Orders</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Latest Orders</h4>
				</div>
				<div class="card-body">

					<div class="table-responsive">
						<table class="datatable table table-stripped">
							<thead>
								<tr>
									<th>Count</th>
									<th>Invoice No</th>
									<th>Order Date</th>
									<th>User</th>
									<th>Product</th>
									<th>Due Date</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $count = 1; ?>
								@foreach($invoices as $invoice)
								<tr>
									<td><?=$count++?></td>
									<td>{{($invoice->invoice_no)}}</td>
									<td>{{$invoice->created_at->format('d-m-Y')}}</td>
									<td>
										<a href="{{route('users.show',$invoice->user->id)}}">{{ucfirst($invoice->user->name)}}</a>
									</td>
									<td>
										<ul>
											@foreach($invoice->orders()->latest()->get() as $order)
											<li>
												<a href="{{url('/'.$order->product->slug)}}" target="_blank">{{$order->product->name}}</a>
											</li>
											@endforeach
										</ul>
									</td>
									<td>
										@if($invoice->due_date)
										{{$invoice->due_date->format('d-m-Y')}}</td>
										@else
										--.--.--
										@endif
									<td>
										@if($invoice->status == 1)
										 	<span class="badge badge-success float-left">Paid</span>
										@else
										 	<span class="badge badge-danger float-left">UnPaid</span>
										@endif
									</td>
									<td><a href="{{route('orders.show',$invoice->id)}}" class="btn btn-sm bg-success-light mr-2">View</a></td>
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