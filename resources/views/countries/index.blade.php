@extends('layouts.app')
@section('title', 'Dashboard - Countries')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Countries</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Countries</li>
				</ul>
			</div>

		</div>
	</div>
	<!-- /Page Header -->
	
	<div class="row">
		@permission('create.countries')
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Country Details</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<form action="{{route('countries.store')}}" method="post">
								@csrf
								<div class="form-group">
									<label>Country</label>
									<div class="input-group">
										<input type="text" name="country_name" value="{{old('country')}}" class="form-control @error('country') is-invalid @enderror" required>
										@if($errors->has('country_name'))
											@foreach($errors->get('country_name') as $message)
											<span style="color:red">{{$message}}</span>
											@endforeach
										@endif
									</div>
								</div>
								<div>
									<button class="btn btn-success bs_dashboard_btn bs_btn_color float-right" style="border-radius: 0px;">Add</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endpermission
		@permission('view.countries')
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Countries</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table datatable">
									<thead>
										<tr>
											<th>Count</th>
											<th>Country</th>
											<th>Users</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>	
										<?php $count = 1; ?>
										@foreach($countries as $country)
											<tr>
												<td><?=$count++?></td>
												<td>{{ucwords($country->country_name)}}</td>
												<td>{{$country->users->count()}}</td>
												<td>
													<div class="btn-group btn-group-sm">
														@permission('edit.countries')
														<a href="javascript:void(0)" class="btn btn-sm bg-success-light mr-2 bs_edit" data-id="{{$country->id}}"data-route="{{route('countries.edit',$country->id)}}"><i class="fa fa-edit"></i></a>
														@endpermission
														@permission('delete.countries')
														<a href="javascript:void(0)" class="btn btn-sm bg-danger-light bs_delete" data-route="{{route('countries.destroy',$country)}}"><i class="fa fa-trash"></i></a>
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
		</div>
		@endpermission
	</div>

</div>
@include('partials.attr_modal')
@endsection