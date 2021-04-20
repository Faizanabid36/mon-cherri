@component('mail::message')
<style type="text/css">
	table{font-size:12px;text-align:center}span{opacity:.8}@media only screen and (max-width:600px){td{font-size:10px!important}.th_text{display:none}th#product::after{visibility:visible;opacity:inherit;content:'P'}th#size::after{visibility:visible;opacity:inherit;content:'S'}th#qty::after{visibility:visible;opacity:inherit;content:'Q'}th#amount::after{visibility:visible;opacity:inherit;content:'A'}th#delivery_charges::after{visibility:visible;opacity:inherit;content:'DC'}}
</style>
# Hello
You Got New Order...
# Order Details 
<p><span> Name </span>	: {{ $invoice->user->info->first_name .' '. $invoice->user->info->last_name}}</p>
<p><span> Email </span>	: {{ $invoice->user->email}}</p>
<p><span> Phone </span>	: {{ $invoice->user->info->phone}}</p>
<p><span> Address </span>: {{ $invoice->user->info->address}}</p>
<p><span> City </span> 	: {{ $invoice->user->info->city->city_name}}</p>
<p><span> State </span> : {{ $invoice->user->info->state->state_name}}</p>
<div class="table-responsive">
	<table class="table" border="1" cellpadding="10" cellspacing="0">
		<thead>
			<tr>
				<th id="product"><span class="th_text">Product</span></th>
				<th id="size"><span class="th_text">Size</span></th>
				<th id="qty"><span class="th_text">Quantity</span></th>
				<th id="amount"><span class="th_text">Amount</span></th>
				<th id="delivery_charges"><span  class="th_text">Delivery Charges</span></th>
			</tr>
		</thead>
		<tbody>
			@foreach($invoice->orders as $order)
			<tr>
				<td>{{$order->product->name}}</td>
				<td>{{$order->size}}</td>
				<td>{{$order->quantity}}</td>
				<td>{{$order->amount}}</td>
				<td>{{$order->delivery_charges}}</td>
			</tr>
			@endforeach
			<tr>
				<td colspan="4" align="right">Sub Total</td>
				<td>{{$invoice->sub_total}}</td>
			</tr>
			<tr>
				<td colspan="4" align="right">Total</td>
				<td>{{$invoice->grand_total}}</td>
			</tr>
		</tbody>
	</table>
</div>
@component('mail::button', ['url' => url('/dashoard')])
View Dashboard
@endcomponent
@if($invoice->customer_note != "")
<b>Customer Note</b>
{{ $invoice->customer_note }}
@endif
Regards,<br>
{{ config('app.name') }}
@endcomponent