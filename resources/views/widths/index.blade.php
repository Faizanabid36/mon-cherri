@extends('layouts.app')
@section('title', 'Dashboard - Widths')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Widths</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Widths</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	<div class="row">
		 @permission('create.widths')
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Width Details</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<span class="badge badge-primary">add new Width</span>
							<form action="{{route('widths.store')}}" method="post">
								@csrf
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Width</label>
											<input type="text" name="width" class="form-control" required>
										</div>
									</div>

								</div>
								<div class="form-group text-right">
									<button class="btn btn-success bs_dashboard_btn bs_btn_width">Add</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endpermission
		@permission('view.widths')
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">widths</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table datatable">
									<thead>
										<tr>
											<th>Count</th>
											<th>Width</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $count = 1; ?>
										@foreach($widths as $width)
											<tr>
												<td><?=$count++?></td>
												<td>{{ucwords($width->width)}}</td>
												<td>
													<div class="btn-group btn-group-sm">
														@permission('edit.widths')
														<a href="javascript:void(0)" class="btn btn-sm bg-success-light mr-2 bs_edit" data-id="{{$width->id}}"data-route="{{route('widths.edit',$width->id)}}"><i class="fa fa-edit"></i></a>
														@endpermission

														<a href="javascript:void(0)" class="btn btn-sm bg-danger-light bs_delete" data-route="{{route('widths.destroy',$width)}}"><i class="fa fa-trash"></i></a>

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
