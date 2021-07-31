@extends('layouts.app')
@section('title', 'Dashboard - Variations')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Variations</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Variations</li>
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
					<h4 class="card-title">Variation Details</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<span class="badge badge-primary">add new variation</span>
							<form action="{{route('variations.store')}}" method="post">
								@csrf
								<div class="row">
									<div class="col-md-9">
										<div class="form-group">
											<label>Variation Title </label>
											<input type="text" name="title" class="form-control" required>
										</div>
									</div>
									<div class="col-md-9">
										<div class="form-group">
											<label>Variation Sub Title </label>
											<input type="text" name="sub_title" class="form-control" required>
										</div>
									</div>
									<div class="col-md-9">
                                        <div class="form-group">
                                            <label>Color</label>
                                            <select class="form-control @error('color') is-invalid @enderror" id="color" data-route="" name="color" >
                                                <option value="">Choose Color</option>
                                                @foreach(App\Color::all() as $color)
                                                    <option value="{{$color->id}}">{{ucwords($color->color)}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('color'))
                                                @foreach($errors->get('color') as $message)
                                                <span style="color:red">{{$message}}</span>
                                                @endforeach
                                            @endif
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
					<h4 class="card-title">Variations</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table datatable">
									<thead>
										<tr>
											<th>Count</th>
											<th>Title</th>
											<th>Sub Title</th>
											
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $count = 1; ?>		
										@foreach($variations as $variation)
											<tr>
												<td><?=$count++?></td>
												<td>{{ucwords($variation->title)}}</td>
												<td>{{ucwords($variation->sub_title)}}</td>
												
												<td>
													<div class="btn-group btn-group-sm">
														@permission('edit.variations')
														<a href="javascript:void(0)" class="btn btn-sm bg-success-light mr-2 bs_edit" data-id="{{$variation->id}}"data-route="{{route('variations.edit',$variation->id)}}"><i class="fa fa-edit"></i></a>
														@endpermission
														
														<a href="javascript:void(0)" class="btn btn-sm bg-danger-light bs_delete" data-route="{{route('variations.destroy',$variation)}}"><i class="fa fa-trash"></i></a>
														
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