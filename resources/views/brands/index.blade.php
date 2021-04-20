@extends('layouts.app')
@section('title', 'Dashboard - Brands')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Brands</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Brands</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	
	<div class="row">
		@permission('create.brands')
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Brand Details</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<form action="{{route('brands.store')}}" method="post">
								@csrf
								<div class="form-group">
									<label>Brand Name </label>
									<div class="input-group">
										<input type="text" name="brand" value="{{old('brand')}}" class="form-control @error('brand') is-invalid @enderror" required>
										@if($errors->has('brand'))
											@foreach($errors->get('brand') as $message)
											<span style="color:red">{{$message}}</span>
											@endforeach
										@endif
									</div>
								</div>
								<div class="form-group">
									<label>Category</label>
									<select class="form-control" name="category" required>
										@foreach(App\Category::all() as $category)
										<option value="{{$category->id}}">{{ucwords($category->title)}}</option>
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
		@permission('view.brands')
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Brands</h4>
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
											<th>Category</th>
											<th>Products</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>	
										<?php $count = 1; ?>
										@foreach(App\Brand::all() as $brand)
											<tr>
												<td><?=$count++?></td>
												<td>{{ucwords($brand->title)}}</td>
												<td>{{ucwords($brand->category->title)}}</td>
												<td>{{$brand->products->count()}}</td>
												<td>
													<div class="btn-group btn-group-sm">
														@permission('edit.brands')
														<a href="javascript:void(0)" class="btn btn-sm bg-success-light mr-2 bs_edit" data-id="{{$brand->id}}"data-route="{{route('brands.edit',$brand->id)}}"><i class="fa fa-edit"></i></a>
														@endpermission
														@permission('delete.brands')
														<a href="javascript:void(0)" class="btn btn-sm bg-danger-light bs_delete" data-route="{{route('brands.destroy',$brand)}}"><i class="fa fa-trash"></i></a>
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