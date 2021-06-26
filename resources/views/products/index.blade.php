@extends('layouts.app')
@section('title', 'Dashboard - Products')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Products</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Products</li>
				</ul>
			</div>
			<div class="col">
			@permission('create.products')
				<a href="{{route('products.create')}}" class="btn btn-success bs_dashboard_btn bs_btn_color float-right">Create New</a>
			@endpermission
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Latest Products</h4>
				</div>
				<div class="card-body">

					<div class="table-responsive">
						@permission('delete.products')
						<form action="{{route('products.bulkDelete')}}" method="POST" id="deleteAll">
							@csrf
							<input type="hidden" name="items" id="bs_items_forbulkDelete">
						</form>
						@endpermission
						<table class="datatable table table-stripped">
							<thead>
								<tr>
									@permission('delete.products')
									<th>
										<input type="checkbox" id="checkAll">
									</th>
									@endpermission
									<th>Count</th>
									<th>Name</th>
									<th>Category</th>
									<th>Brand</th>
									<th>Price</th>
									<th>Old Price</th>
									<th>Stock</th>
									<th>Created On</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $count = 1; ?>
								@foreach($products as $product)
								<tr>
									@permission('delete.products')
									<td style="padding:10px 18px;">
										<input type="checkbox" value="{{$product->id}}" class="bs_dtrow_checkbox bs_checkItem">
									</td>
									@endpermission
									<td><?=$count++?></td>
									<td><a href="{{url('/'.$product->slug)}}" target="_blank">{{ucwords($product->name)}}</a></td>
									<td>
										@foreach($product->categories as $category)
											{{ucwords($category->title)}}
										@endforeach
									</td>
									<td>
										{{($product->brand) ? ucwords($product->brand->title) : "---" }}
									</td>
									<td>{{currency($product->price, 'USD')}}</td>
									<td>
										{{($product->old_price) ? currency($product->old_price, 'USD') : '---' }}
									</td>
									<td>{{$product->stock}}</td>
									<td>{{$product->created_at->format('d-m-Y')}}</td>
									<td>
										<div class="actions">
											@permission('edit.products')
											<a href="{{route('products.edit',$product->id)}}" class="btn btn-sm bg-success-light mr-2">
												<i class="fe fe-pencil"></i> Edit
											</a>
											@endpermission
											@permission('delete.products')
											<a href="javascript:void(0)" class="btn btn-sm bg-danger-light bs_delete" data-route="{{route('products.destroy',$product)}}">
												<i class="fe fe-trash"></i> Delete
											</a>
											@endpermission
											<a href="{{route('product.album.product_album',$product->id)}}" class="btn btn-sm bg-warning-light" data-route="{{route('product.album.product_album',$product->id)}}">
												<i class="fe fe-file-image"></i> Album
											</a>
											<a href="{{route('product.variations.add',$product->id)}}" class="btn btn-sm bg-info-light" data-route="{{route('product.variations.get',$product->id)}}">
												<i class="fe fe-activity"></i> Variations
											</a>
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
@include('partials.attr_modal')
@endsection
