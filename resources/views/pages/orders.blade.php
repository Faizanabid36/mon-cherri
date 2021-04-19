@extends('layouts.master')
@section('title', 'Account Orders')

@section('content')
	<div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">{{__('My Account')}}</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">

            <div class="row margin-30px-bottom">
                <div class="col-xl-2 col-lg-2 col-md-12 md-margin-20px-bottom">
                    @include('partials.customer_dashboard_sidebar')
                </div>

                <div class="col-xs-10 col-lg-10 col-md-12">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard-content padding-30px-all md-padding-15px-all" style="">
	           			<h3>{{__('Orders')}}</h3>
		            	<div class="row">
		            		<div class="col-md-12">
	           					<div class="table-responsive">
	           						<table class="table table-bordered">
	           							<thead>
	           								<tr>
	           									<th>{{__('Product')}}</th>
	           									<th>{{__('Size')}}</th>
	           									<th>{{__('Quantity')}}</th>
	           									<th>{{__('Total Price')}}</th>
	           									<th>{{__('Order Date')}}</th>
	           									<th>{{__('Payment Status')}}</th>
	           									<th>{{__('Due Date')}}</th>
	           									<th>{{__('Invoice')}}</th>
	           								</tr>

	           								@php
											   $rowid = 0;
											   $rowspan = 0;
											   $orders = Auth::user()->orders()->latest()->paginate(5);
											@endphp
											@foreach($orders as $key => $order)
											  @php
											     $rowid += 1
											  @endphp
											  <tr>
											     <td>{{$order->product->name}}</td>
											     <td>{{$order->size}}</td>
											     <td>{{$order->quantity}}</td>
											     <td>{{currency($order->amount, 'USD', currency()->getUserCurrency())}}</td>
											     @if ($key == 0 || $rowspan == $rowid)
											         @php
											             $rowid = 0;
											             $rowspan = $order->invoice->orders->count();
											         @endphp
											  	 	<td rowspan="{{ $rowspan }}">{{$order->invoice->created_at->format('d-m-Y')}}</td>
											         <td rowspan="{{ $rowspan }}">
											         	@if($order->invoice->status == 1)
														 	<span class="badge badge-success bg-success float-left">Paid</span>
														@else
														 	<span class="badge badge-danger float-left">UnPaid</span>
														@endif
											         </td>
											         <td rowspan="{{ $rowspan }}">
											         	@if($order->invoice->due_date)
															{{$order->invoice->due_date->format('d-m-Y')}}</td>
														@else
															--.--.--
														@endif
											         </td>
											         <td rowspan="{{ $rowspan }}">
											         	<a href="{{url('my-account/invoice/'.$order->invoice->invoice_no)}}" class="btn btn-sm bg-dark btn-default">
											         		 {{$order->invoice->invoice_no}}
											         	</a>
											         </td>
											     @endif
											  </tr>
											@endforeach
	           							</thead>
	           						</table>
	           					</div>
	           					{{ $orders->links('partials.pagination') }}
		        			</div>
		            	</div>
                    </div>
                    <!-- End Tab panes -->
                </div>
            </div>
        </div>
    </div>
@endsection