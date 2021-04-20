@extends('layouts.app')
@section('title', 'Dashboard - Currencies')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Currencies</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Currencies</li>
				</ul>
			</div>
			<div class="col">
				@permission('create.currencies')
				<a href="{{route('currencies.create')}}" class="btn btn-success bs_dashboard_btn bs_btn_color float-right">Create New</a>
				@endpermission
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	@permission('view.currencies')
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Currencies</h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						@permission('delete.currencies')
						<form action="{{route('currencies.bulkDelete')}}" method="POST" id="deleteAll">
							@csrf
							<input type="hidden" name="items" id="bs_items_forbulkDelete">
						</form>
						@endpermission
						<div class="table-responsive">
							<table class="table datatable">
								<thead>
									<tr>
										@permission('delete.currencies')
										<th>
											<input type="checkbox" id="checkAll"> 
										</th>
										@endpermission
										<th>Count</th>
										<th>Name</th>
										<th>Code</th>
										<th>Symbol</th>
										<th>Exchange Rate</th>
										<th>Format</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>	
									<?php $count = 1; ?>
									@foreach($currencies as $currency)
										<tr>
											@permission('delete.currencies')
											<td style="padding:10px 18px;">
												<input type="checkbox" value="{{$currency['code']}}" class="bs_dtrow_checkbox bs_checkItem">
											</td>
											@endpermission
											<td><?=$count++?></td>
											<td>{{$currency['name']}}</td>
											<td>{{$currency['code']}}</td>
											<td>{{$currency['symbol']}}</td>
											<td>{{$currency['exchange_rate']}}</td>
											<td>{{$currency['format']}}</td>
											<td>
												<div class="btn-group btn-group-sm">
													@permission('edit.currencies')
													<a href="{{route('currencies.edit',$currency['code'])}}" class="btn btn-sm bg-success-light mr-2"><i class="fa fa-edit"></i></a>
													@endpermission
													@permission('delete.currencies')
													<a href="javascript:void(0)" class="btn btn-sm bg-danger-light bs_delete" data-route="{{route('currencies.destroy',$currency['code'])}}"><i class="fa fa-trash"></i></a>
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
	@endpermission

</div>
@include('partials.attr_modal')
@endsection