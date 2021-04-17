@extends('layouts.app')
@section('title', 'Dashboard - States')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">States</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">States</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	
	<div class="row">
		@permission('create.states')
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">State Details</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<form action="{{route('states.store')}}" method="post">
								@csrf
								<div class="form-group">
									<label>State Name </label>
									<div class="input-group">
										<input type="text" name="state_name" value="{{old('state')}}" class="form-control @error('state') is-invalid @enderror" required>
										@if($errors->has('state'))
											@foreach($errors->get('state') as $message)
											<span style="color:red">{{$message}}</span>
											@endforeach
										@endif
									</div>
								</div>
								<div class="form-group">
									<label>Country</label>
									<select class="form-control" name="country" required>
										@foreach(App\Country::all() as $country)
										<option value="{{$country->id}}">{{ucwords($country->country_name)}}</option>
										@endforeach
									</select>
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
		@permission('view.states')
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">States</h4>
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
											<th>State</th>
											<th>Users</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>	
										<?php $count = 1; ?>
										@foreach($states as $state)
											<tr>
												<td><?=$count++?></td>
												<td>{{ucwords($state->country->country_name)}}</td>
												<td>{{ucwords($state->state_name)}}</td>
												<td>{{$state->users->count()}}</td>
												<td>
													<div class="btn-group btn-group-sm">
														@permission('edit.states')
														<a href="javascript:void(0)" class="btn btn-sm bg-success-light mr-2 bs_edit" data-id="{{$state->id}}"data-route="{{route('states.edit',$state->id)}}"><i class="fa fa-edit"></i></a>
														@endpermission
														@permission('delete.states')
														<a href="javascript:void(0)" class="btn btn-sm bg-danger-light bs_delete" data-route="{{route('states.destroy',$state)}}"><i class="fa fa-trash"></i></a>
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