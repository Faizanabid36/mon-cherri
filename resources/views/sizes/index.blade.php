@extends('layouts.app')
@section('title', 'Dashboard - Sizes')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Sizes</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Sizes</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	
	<div class="row">
		 @permission('create.sizes')
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Size Details</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<form action="{{route('sizes.store')}}" method="post">
								@csrf
								<div class="form-group">
									<label>Size </label>
									<div class="input-group">
										<input type="text" name="size" value="{{old('size')}}" class="form-control @error('size') is-invalid @enderror" required>
										@if($errors->has('size'))
											@foreach($errors->get('size') as $message)
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
		 @permission('view.sizes')
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Sizes</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table datatable">
									<thead>
										<tr>
											<th>Count</th>
											<th>Size</th>
											
											<th>Products</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>	
										<?php $count = 1 ; ?>
										@foreach(App\Size::all() as $size)
											<tr>
												<td><?=$count++?></td>
												<td>{{ucwords($size->size)}}</td>
												
												<td>{{$size->products->count()}}</td>
												<td>
													<div class="btn-group btn-group-sm">
														@permission('edit.sizes')
														<a href="javascript:void(0)" class="btn btn-sm bg-success-light mr-2 bs_edit" data-id="{{$size->id}}"data-route="{{route('sizes.edit',$size->id)}}"><i class="fa fa-edit"></i></a>
														@endpermission
														@permission('delete.sizes')
														<a href="javascript:void(0)" class="btn btn-sm bg-danger-light bs_delete" data-route="{{route('sizes.destroy',$size)}}"><i class="fa fa-trash"></i></a>
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