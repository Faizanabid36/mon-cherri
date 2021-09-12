@extends('layouts.app')
@section('title', 'Dashboard - Certificates')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Certificates</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Certificates</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	<div class="row">
		 @permission('create.certificates')
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Certificate Details</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<span class="badge badge-primary">add new certificates</span>
							<form action="{{route('certificates.store')}}" method="post">
								@csrf
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Certificate Name </label>
											<input type="text" name="certificate" class="form-control" required>
										</div>
									</div>

								</div>
								<div class="form-group text-right">
									<button class="btn btn-success bs_dashboard_btn bs_btn_certificate">Add</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endpermission
		@permission('view.certificates')
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Certificates</h4>
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

											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $count = 1; ?>
										@foreach($certificates as $certificate)
											<tr>
												<td><?=$count++?></td>
												<td>{{($certificate->certificate)}}</td>
												<td>
													<div class="btn-group btn-group-sm">
														@permission('edit.certificates')
														<a href="javascript:void(0)" class="btn btn-sm bg-success-light mr-2 bs_edit" data-id="{{$certificate->id}}"data-route="{{route('certificates.edit',$certificate->id)}}"><i class="fa fa-edit"></i></a>
														@endpermission

														<a href="javascript:void(0)" class="btn btn-sm bg-danger-light bs_delete" data-route="{{route('certificates.destroy',$certificate)}}"><i class="fa fa-trash"></i></a>

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
