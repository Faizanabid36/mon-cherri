@extends('layouts.app')
@section('title', 'Dashboard - Order')
@section('content')
<div class="content container-fluid">
	<!-- Page Header -->
	<div class="page-header">
		<div class="container">
			<div class="row">
				<div class="col">
					@permission('edit.orders')
					<a href="{{route('orders.edit',$invoice->id)}}" class="btn btn-outline-dark bs_dashboard_btn float-right avoid-this-for-print bs_invoice_btns"><i class="fa fa-edit"></i> Edit</a>
					@endpermission
					<a href="javascript:void(0)" class="btn btn-outline-dark bs_dashboard_btn print_btn float-right avoid-this-for-print bs_invoice_btns"><i class="fa fa-edit"></i> Print</a>
					@permission('send.ordersinvoice')
					<a href="{{route('orders.sendInvoice',$invoice->id)}}" class="btn btn-outline-dark bs_dashboard_btn float-right avoid-this-for-print bs_invoice_btns {{ ($invoice->status == 1) ? '' : 'disabled' }}" title="{{ ($invoice->status == 1) ? 'Send Invoice to customer' : 'Unable to send invoice until it is not paid!' }}"><i class="fa fa-arrow-left"></i> Send Invoice</a>
					@endpermission
					<h3 class="page-title">Order</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Order</li>
					</ul>
				</div>
				
			</div>
		</div>
	</div>
	<!-- /Page Header -->	
	<!-- Invoice Container -->
	<div class="invoice-container" id="invoice">
		<div class="row">
			<div class="col-sm-6 m-b-20">
				<img alt="Logo" class="inv-logo img-fluid" src="{{url('images/logo.png')}}">
			</div>
			<div class="col-sm-6 m-b-20">
				<div class="invoice-details">
					<h3 class="text-uppercase">Invoice No: {{$invoice->invoice_no}}</h3>
					<div class="col-sm-12 text-right">
						<ul class="list-unstyled mb-0">
							<li>Order Date: <span>{{$invoice->created_at->format('M d, Y')}}</span></li>
							
						</ul>
						@if($invoice->status == 1)
						 	<span class="badge badge-success">Paid</span>
						@else
						 	<span class="badge badge-danger">UnPaid</span>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-lg-7 col-xl-8 m-b-20">
				<h6>Invoice to</h6>
				<ul class="list-unstyled mb-0">
					<li><h5 class="mb-0"><strong>{{$invoice->user->info->first_name}} {{$invoice->user->info->last_name}}</strong></h5></li>
					<li><b>Phone:   </b> {{$invoice->user->info->phone}}</li>
					<li><b>Email:   </b> {{$invoice->user->email}}</li>
					<li><b>Address: </b><p style="width: 40%">{{$invoice->user->info->address}}</p></li>
					<li><b>{{__('Postal Code')}}: </b>{{$invoice->user->info->postal_code}}</li>
					<li><b>City: </b>{{$invoice->user->info->city->city_name}}</li>
					<li><b>State: </b>{{$invoice->user->info->state->state_name}}</li>
				</ul>
			</div>
			<div class="col-sm-6 col-lg-5 col-xl-4 m-b-20">
				<h6>Payment Details</h6>
				<ul class="list-unstyled invoice-payment-details mb-0">
					<li>Payment Method: <span>
						@if($invoice->payment_method == "AP")
						Advance Payment
						@else
						Cash on deliviery
						@endif
					</span></li>
					<li>Country: <span>{{$invoice->user->info->country->country_name}}</span></li>
					@if($invoice->due_date)
					<li>Due date: <span>{{$invoice->due_date->format('M d, Y')}}</span></li>
					@else
					<li>Payment: <span>Pending</span></li>
					@endif
				</ul>
			</div>
		</div>
		
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Item</th>
						<th>Size</th>
						<th class="text-nowrap">Price</th>
						<th>QTY</th>
						<th class="text-nowrap">Total</th>
						<th>Delivery Charges</th>
					</tr>
				</thead>
				<tbody>
					<?php $sno = 1;
					$total = 0;
					$delivery_charges = 0;
					?>
					@foreach($invoice->orders as $order)
					<tr>
						<td>{{($sno++)}}</td>
						<td>{{$order->product->name}}</td>
						<td>{{$order->size}}</td>
						<td>{{currency($product->price, 'USD') }}</td>
						<td>{{$order->quantity}}</td>
						<td>{{currency($order->amount, 'USD') }}</td>
						<td>{{$order->delivery_charges}}</td>
						<?php
							$delivery_charges += $order->delivery_charges;
						?>
					@endforeach
				</tbody>
			</table>
		</div>
		
		<div>
			<div class="row invoice-payment">
				<div class="col-sm-7">
				</div>
				<div class="col-sm-5">
					<div class="m-b-20">
						<div class="table-responsive no-border">
							<table class="table mb-0">
								<tbody>
									<tr>
										<th>Subtotal:</th>
										<td class="text-right">{{currency($invoice->sub_total, 'USD')}}</td>
									</tr>
									<tr>
										<th>Delivery Charges:</th>
										<td class="text-right">{{currency($delivery_charges, 'USD')}}</td>
									</tr>
									<tr>
										<th>Total:</th>
										<td class="text-right"><h5>{{currency($invoice->grand_total, 'USD')}}</h5></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			@if($invoice->customer_note)
			<div class="invoice-info">
				<h5>Customer Note</h5>
				<p class="text-muted mb-20">{{$invoice->customer_note}}</p>
			</div>
			@endif
			<div class="invoice-info">
				<h5>Company Note</h5>
				<p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
			</div>
		</div>
	</div>
	<!-- /Invoice Container -->
</div>
@endsection
@section('javascript')
<script type="text/javascript">
	$(document).on('click','.print_btn',function(){
		$("#invoice").print({
			noPrintSelector : ".avoid-this-for-print",
		});	
	});
</script>
@endsection