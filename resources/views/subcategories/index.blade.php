@extends('layouts.app')
@section('title', 'Dashboard - SubCategories')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Sub Categories</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Sub Categories</li>
				</ul>
			</div>
			<div class="col">
				@permission('create.subcategories')
				<a href="javascript:void(0)" class="btn btn-success bs_dashboard_btn bs_btn_color float-right" data-toggle="modal" data-target="#add_category">Add New Sub Category</a>
				@endpermission
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Sub Categories</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="datatable table table-stripped">
									<thead>
										<tr>
											<th>Count</th>
											<th>Parent Category</th>
											<th>SubCategory</th>
											<th>Products</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $count = 1; ?>
										@foreach($sbcategories as $sb_category)
										<tr>
											<td><?=$count++?></td>
											<td>{{ucwords($sb_category->category->title)}}</td>
											<td>{{ucwords($sb_category->title)}}</td>
											<td>{{$sb_category->products->count()}}</td>
											<td>
												<div class="btn-group btn-group-sm">	
													@permission('edit.subcategories')
													<a href="javascript:void(0)" class="btn btn-sm bg-success-light mr-2 bs_edit" data-id="{{$sb_category->id}}"data-route="{{route('subcategories.edit',$sb_category->id)}}"><i class="fa fa-edit"></i> Edit</a>
													@endpermission
													@permission('delete.subcategories')
													<a href="javascript:void(0)" class="btn btn-sm bg-danger-light bs_delete" data-route="{{route('subcategories.destroy',$sb_category->id)}}"><i class="fa fa-trash"></i> Delete</a>
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
				<form action="{{route('subcategories.store')}}" method="post">
					@csrf
					<div class="form-group">
						<label>Parent Category</label>
						<select class="form-control" name="parent_category_id" required>
								<option value="">Choose Parent Category</option>
							@foreach(App\Category::all() as $category)
								<option value="{{$category->id}}">{{ucwords($category->title)}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Sub Category</label>
						<input type="text" name="subcategory" class="form-control" required>
					</div>
					<button type="submit" class="btn btn-success bs_dashboard_btn bs_btn_color btn-block">Add</button>
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