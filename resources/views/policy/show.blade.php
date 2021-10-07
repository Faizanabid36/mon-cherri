@extends('layouts.app')
@section('title', 'Dashboard - Policies')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Policies</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Policies</li>
				</ul>
			</div>
			<div class="col">
				
				<a href="{{route('policy.add')}}" class="btn btn-success bs_dashboard_btn bs_btn_color float-right" >Add New Policy</a>
				
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Policies</h4>
					<a href="{{route('policy.show','Return')}}"  class="btn btn-success bs_dashboard_btn bs_btn_color {{$type=='Return'?'active':''}} " >Return Policy</a>	
					<a href="{{route('policy.show','Shipping1')}}" class="btn btn-success bs_dashboard_btn bs_btn_color {{$type=='Shipping1'?'active':''}} " >Shipping Policy 1</a>	
					<a href="{{route('policy.show','Shipping2')}}" class="btn btn-success bs_dashboard_btn bs_btn_color {{$type=='Shipping2'?'active':''}} " >Shipping Policy 2</a>	
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="datatable table table-stripped">
									<thead>
										<tr>
											<th>Count</th>
											<th>Name</th>
											<th>Days</th>
											<th>Value</th>
											<th>Type</th>
											<th>Default</th>
											
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $count = 1; ?>
										@foreach($policies as $policy)
										<tr>
											<td><?=$count++?></td>
											<td>{{ucwords($policy->name)}}</td>
											<td>{{$policy->days}}</td>
											<td>{{$policy->value??"N/A"}}</td>
											<td>{{$policy->type}}</td>
											<td><a href="{{route('policy.mark_policy',[$policy->id,$policy->type])}}"><span class="badge {{$policy->is_default?'bg-primary':'bg-secondary'}}  text-light float-end">Default</span></a></td>
											<td>
												
												<a href="{{route('policy.edit',$policy->id)}}" class="btn btn-sm bg-success-light mr-2 "><i class="fa fa-edit"></i> Edit</a>
												
												<a href="{{route('policy.delete',$policy->id)}}" class="btn btn-sm bg-danger-light " ><i class="fa fa-trash"></i> Delete</a>
												 
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
	</div>
</div>


@include('partials.attr_modal')
@endsection