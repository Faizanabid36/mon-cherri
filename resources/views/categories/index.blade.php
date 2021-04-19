@extends('layouts.app')
@section('title', 'Dashboard - Categories')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Categories</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Categories</li>
				</ul>
			</div>
			<div class="col">
				@permission('create.categories')
				<a href="javascript:void(0)" class="btn btn-success bs_dashboard_btn bs_btn_color float-right" data-toggle="modal" data-target="#add_category">Add New Category</a>
				@endpermission
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Categories</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="datatable table table-stripped">
									<thead>
										<tr>
											<th>Count</th>
											<th>Category</th>
											<th>SubCategories</th>
											<th>Products</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $count = 1; ?>
										@foreach($categories as $category)
										<tr>
											<td><?=$count++?></td>
											<td>{{ucwords($category->title)}}</td>
											<td>{{$category->subcategories->count()}}</td>
											<td>{{$category->products->count()}}</td>
											<td>
												@permission('edit.categories')
												<a href="javascript:void(0)" class="btn btn-sm bg-success-light mr-2 bs_edit" data-id="{{$category->id}}"data-route="{{route('categories.edit',$category->id)}}"><i class="fa fa-edit"></i> Edit</a>
												@endpermission
												@permission('delete.categories')
												<a href="javascript:void(0)" class="btn btn-sm bg-danger-light bs_delete" data-route="{{route('categories.destroy',$category)}}"><i class="fa fa-trash"></i> Delete</a>
												 @endpermission
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
<div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Category Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
			<div class="col-md-12">
				<form action="{{route('categories.store')}}" method="post">
					@csrf
					<div class="form-group">
						<label>Category</label>
						<div class="input-group">
							<input type="text" name="category" class="form-control" required>
							<div class="input-group-prepend">	
								<button type="submit" class="btn btn-success">Add</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@include('partials.attr_modal')
@endsection