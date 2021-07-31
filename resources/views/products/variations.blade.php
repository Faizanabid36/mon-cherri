@extends('layouts.app')
@section('title', 'Dashboard - Product Variations')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Product Variations</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/products')}}">Products</a></li>
					<li class="breadcrumb-item active">Variations</li>
				</ul>
			</div>
			<div class="col">

				<a href="{{route('product.variations.add',$product_id)}}" class="btn btn-success bs_dashboard_btn bs_btn_color float-right">Create New</a>

			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Variations</h4>
				</div>
				<div class="card-body">

					<div class="table-responsive">

						<form action="{{route('product.variations.bulk_delete')}}" method="POST" id="deleteAll">
							@csrf
							<input type="hidden" name="items" id="bs_items_forbulkDelete">
						</form>

						<table class="datatable table table-stripped">
							<thead>
								<tr>

									<th>
										<input type="checkbox" id="checkAll">
									</th>

									<th>Count</th>
									<th>Title</th>
									<th>Sub Title</th>
									<th>Color</th>
									<th>Size</th>
									<th>Price</th>

									<th>Created On</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
                            <?php $count = 1; ?>

								@foreach($variations as $variation)
								<tr>

									<td style="padding:10px 18px;">
										<input type="checkbox" value="{{$variation->id}}" class="bs_dtrow_checkbox bs_checkItem">
									</td>

									<td><?=$count++?></td>
									<td>{{ucwords($variation->variation->title)}}</td>

									<td>
                                    {{ucwords($variation->variation->sub_title)}}
									</td>
									<td>
                                    {{ucwords($variation->variation->colors->color)}}
									</td>
									<td>
                                    {{ucwords($variation->size->size)}}
									</td>
									<td>{{currency($variation->price, 'USD')}}</td>

									<td>{{$variation->created_at->format('d-m-Y')}}</td>
									<td>
										<div class="actions">

											<a href="{{route('product.variations.add',$variation->product_id)}}" class="btn btn-sm bg-success-light mr-2">
												<i class="fe fe-pencil"></i> Edit
											</a>

											<a href="javascript:void(0)" class="btn btn-sm bg-danger-light bs_delete" data-route="{{route('product.variations.destroy',$variation)}}">
												<i class="fe fe-trash"></i> Delete
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
