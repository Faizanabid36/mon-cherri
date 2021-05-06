@extends('layouts.master')
@section('title', 'Invoice')

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
                    <div class="dashboard-content padding-30px-all md-padding-15px-all" style="">
	           			<!-- Invoice Container -->

	           		@if($invoice->status == 1)
					<div class="bs_download_invoice float-right"><a href="{{url('my-account/invoice/'.$invoice->invoice_no.'?download=true')}}" id="downloadPdf" class="btn"><i class="fa fa-arrow-down"></i> {{__('Download')}}</a></div>
					@endif
					<div class="invoice-container" id="invoice">
						<div class="row">
							<div class="col-sm-6 m-b-20">
								<img alt="Logo" class="inv-logo img-fluid" src="{{url('images/logo.png')}}">
							</div>
							<div class="col-sm-6 m-b-20">
								<div class="invoice-details">
									<h3 class="text-uppercase">{{__('Invoice No')}}: {{$invoice->invoice_no}}</h3>
									<div class="col-sm-12 text-right">
										<ul class="list-unstyled mb-0">
											<li>{{__('Order Date')}}: <span>{{$invoice->created_at->format('M d, Y')}}</span></li>

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
								<h6>{{__('Invoice to')}}</h6>
								<ul class="list-unstyled mb-0">
									<li><h5 class="mb-0"><strong>{{$invoice->user->info->first_name}} {{$invoice->user->info->last_name}}</strong></h5></li>
									<li><b>{{__('Phone')}}:   </b> {{$invoice->user->info->phone}}</li>
									<li><b>{{__('Email')}}:   </b> {{$invoice->user->email}}</li>
									<li><b>{{__('Address')}}: </b><p style="width: 40%">{{$invoice->user->info->address}}</p></li>
									<li><b>{{__('Postal Code')}}: </b>{{$invoice->user->info->postal_code}}</li>
									<li><b>{{__('City')}}: </b>{{$invoice->user->info->city->city_name}}</li>
									<li><b>{{__('State')}}: </b>{{$invoice->user->info->state->state_name}}</li>
								</ul>
							</div>
							<div class="col-sm-6 col-lg-5 col-xl-4 m-b-20">
								<h6>{{__('Payment Details')}}</h6>
								<ul class="list-unstyled invoice-payment-details mb-0">
									<li>{{__('Payment Method')}}: <span>
										@if($invoice->payment_method == "AP")
										{{__('Advance Payment')}}
										@else
										{{__('Cash on deliviery')}}
										@endif
									</span></li>
									<li>{{__('Country')}}: <span>{{$invoice->user->info->country->country_name}}</span></li>
									@if($invoice->due_date)
									<li>{{__('Due date')}}: <span>{{$invoice->due_date->format('M d, Y')}}</span></li>
									@else
									<li>{{__('Payment')}}: <span>{{__('Pending')}}</span></li>
									@endif
								</ul>
							</div>
						</div>

						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>{{__('Item')}}</th>
										<th>{{__('Size')}}</th>
										<th class="text-nowrap">Price</th>
										<th>{{__('QTY')}}</th>
										<th>{{__('Total Price')}}</th>
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
										<td>{{currency($order->product->price, 'USD', currency()->getUserCurrency())}}</td>
										<td>{{$order->quantity}}</td>
										<td>{{currency($order->amount, 'USD', currency()->getUserCurrency())}}</td>
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
														<th>{{__('Subtotal')}}:</th>
														<td class="text-right">{{currency($invoice->sub_total, 'USD', currency()->getUserCurrency())}}</td>
													</tr>
													<tr>
														<th>{{__('Delivery Charges')}}:</th>
														<td class="text-right">{{$delivery_charges}}</td>
													</tr>
													<tr>
														<th>{{__('Total')}}:</th>
														<td class="text-right"><h5>{{currency($invoice->grand_total, 'USD', currency()->getUserCurrency())}}</h5></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							@if($invoice->customer_note)
							<div class="invoice-info">
								<h5>{{__('Customer Note')}}</h5>
								<p class="text-muted mb-20">{{$invoice->customer_note}}</p>
							</div>
							@endif
							<div class="invoice-info">
								<h5>{{__('Company Note')}}</h5>
								<p class="text-muted mb-0">{{__('Lorem ipsum dolor sit amet consectetur adipiscing elit Vivamus sed dictum ligula, cursus blandit risus Maecenas eget metus non tellus dignissim aliquam ut a ex Maecenas sed vehicula dui ac suscipit lacus Sed finibus leo vitae lorem interdu eu scelerisque tellus fermentum Curabitur sit amet lacinia lorem Nullam finibus pellentesque libero')}}.</p>
							</div>
						</div>
					</div>
					<!-- /Invoice Container -->
                    </div>
                    <!-- End Tab panes -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
		@if(isset($_GET['download']) && ($_GET['download'] == 'true') && ($invoice->status == 1))
		<script type="text/javascript" src="{{url('js/pdf.js')}}"></script>
		<script type="text/javascript">
		        const element = document.getElementById("invoice");
		        html2pdf()
		          .from(element)
		          .save('Worldwide-watches-Invoice-' + '<?=$invoice->created_at->format('d-m-Y')?>' + '.pdf');
		          new Noty({
		           type: 'success',
		           layout: 'centerRight',
		           theme: 'nest',
		           text: 'Your Invoice has been donwloaded!',
		           timeout: '4000',
		           progressBar: true,
		           killer: true,
		        }).show();
		      	window.history.replaceState(null, null, "?download=false");
		</script>
		@endif
@endsection
