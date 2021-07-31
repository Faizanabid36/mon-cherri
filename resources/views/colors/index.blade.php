@extends('layouts.app')
@section('title', 'Dashboard - Colors')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Colors</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Colors</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	<div class="row">
		 @permission('create.colors')
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Color Details</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<span class="badge badge-primary">add new colors</span>
							<form action="{{route('colors.store')}}" method="post">
								@csrf
								<div class="row">
									<div class="col-md-9">
										<div class="form-group">
											<label>Color Name </label>
											<input type="text" name="color" class="form-control" required>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Color Code</label>
											<input type="color" name="code" class="form-control" required>
										</div>
									</div>
								</div>	
								<div class="form-group text-right">
									<button class="btn btn-success bs_dashboard_btn bs_btn_color">Add</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endpermission
		@permission('view.colors')
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Colors</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table datatable">
									<thead>
										<tr>
											<th>Count</th>
											<th>Name</th>
											<th>Code</th>
											<th>Products</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $count = 1; ?>		
										@foreach($colors as $color)
											<tr>
												<td><?=$count++?></td>
												<td>{{ucwords($color->color)}}</td>
												<td>{{ucwords($color->code)}}</td>
												<td>{{$color->products->count()}}</td>
												<td>
													<div class="btn-group btn-group-sm">
														@permission('edit.colors')
														<a href="javascript:void(0)" class="btn btn-sm bg-success-light mr-2 bs_edit" data-id="{{$color->id}}"data-route="{{route('colors.edit',$color->id)}}"><i class="fa fa-edit"></i></a>
														@endpermission
														
														<a href="javascript:void(0)" class="btn btn-sm bg-danger-light bs_delete" data-route="{{route('colors.destroy',$color)}}"><i class="fa fa-trash"></i></a>
														
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