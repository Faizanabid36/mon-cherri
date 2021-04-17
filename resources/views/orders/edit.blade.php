@extends('layouts.app')
@section('title', 'Dashboard - Order Edit')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Edit Order</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Edit Order</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Edit Order Details</h4>
				</div>
				<div class="card-body">
					<form action="{{route('orders.update',$invoice->id)}}" method="post">
						@csrf
						<input type="hidden" name="_method" value="PUT">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Payment Status</label>
									<select name="status" class="form-control" required>
										<option value="1" <?=($invoice->status == 1) ? 'selected' : '' ?> >Paid</option>
										<option value="0" <?=($invoice->status == 0) ? 'selected' : '' ?> >Unpaid</option>
									</select>
									@if($errors->has('status'))
			                            @foreach($errors->get('status') as $message)
			                              <span style="color:red">{{$message}}</span>
			                            @endforeach
			                        @endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Payment Method</label>
									<select name="payment_method" class="form-control" required>
										<option value="AP" <?=($invoice->payment_method == "AP") ? 'selected' : '' ?> >Advance Payment</option>
										<option value="COD" <?=($invoice->payment_method == "COD") ? 'selected' : '' ?> >Cash On Delivery</option>
									</select>
									@if($errors->has('payment_method'))
			                            @foreach($errors->get('payment_method') as $message)
			                              <span style="color:red">{{$message}}</span>
			                            @endforeach
			                        @endif
								</div>
							</div>
							@foreach($invoice->orders as $order)
							<div class="col-md-12">
								<div class="card" style="box-shadow: none;border: 1px solid #ddd;border-radius: 2px;">
									<div class="card-header" style="background-color: #f8f9fa">
										<div class="card-title">
											Order Of:- {{ucwords($order->product->name)}}
										</div>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Product Size</label>
													<select name="size[]" class="form-control @error('size') is-invalid @enderror">
													@foreach($order->product->sizes as  $size)
														@if($size->size == $order->size)
															<option value="{{$size->size}}" selected>{{$size->size}}</option>
														@else
															<option value="{{$size->size}}">{{$size->size}}</option>
														@endif
													@endforeach
													</select>
													@if($errors->has('size'))
							                            @foreach($errors->get('size') as $message)
							                              <span style="color:red">{{$message}}</span>
							                            @endforeach
							                        @endif
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Product Quantity</label>
													<input type="number" value="{{$order->quantity}}" class="form-control @error('quantity') is-invalid @enderror" name="quantity[]">
													@if($errors->has('quantity'))
							                            @foreach($errors->get('quantity') as $message)
							                              <span style="color:red">{{$message}}</span>
							                            @endforeach
							                        @endif
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Product Amount</label>
													<input type="text" value="{{$order->amount}}" class="form-control @error('amount') is-invalid @enderror" name="amount[]">
													@if($errors->has('amount'))
							                            @foreach($errors->get('amount') as $message)
							                              <span style="color:red">{{$message}}</span>
							                            @endforeach
							                        @endif
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Delivery Charges</label>
													<input type="number" name="delivery_charges[]" value="{{$order->delivery_charges}}" class="form-control" required>
													@if($errors->has('delivery_charges'))
							                            @foreach($errors->get('delivery_charges') as $message)
							                              <span style="color:red">{{$message}}</span>
							                            @endforeach
							                        @endif
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
							<div class="col-md-6">
								<div class="form-group">
									<label>SubTotal</label>
									<input type="number" value="{{$invoice->sub_total}}" name="sub_total" class="form-control" required>
									@if($errors->has('sub_total'))
			                            @foreach($errors->get('sub_total') as $message)
			                              <span style="color:red">{{$message}}</span>
			                            @endforeach
			                        @endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>GrandTotal</label>
									<input type="number" value="{{$invoice->grand_total}}" name="grand_total" class="form-control" required>
									@if($errors->has('grand_total'))
			                            @foreach($errors->get('grand_total') as $message)
			                              <span style="color:red">{{$message}}</span>
			                            @endforeach
			                        @endif
								</div>
							</div>
							<div class="col text-right">
								<button type="submit" class="btn btn-success bs_dashboard_btn bs_btn_color">UPDATE</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection