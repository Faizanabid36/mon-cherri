@extends('layouts.app')
@section('title', 'Dashboard - Reviews')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Reviews</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Reviews</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Latest Reviews</h4>
				</div>
				<div class="card-body">
					@permission('delete.reviews')
					<form action="{{route('reviews.bulkDelete')}}" method="POST" id="deleteAll">
						@csrf
						<input type="hidden" name="items" id="bs_items_forbulkDelete">
					</form>
					@endpermission
					<div class="table-responsive">
						<table class="datatable table table-stripped">
							<thead>
								<tr>
									@permission('delete.reviews')
									<th>
										<input type="checkbox" id="checkAll"> 
									</th>
									@endpermission
									<th>Count</th>
									<th>User</th>
									<th>Review</th>
									<th>Permission</th>
									<th>Created On</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $count = 1 ; ?>
								@foreach($reviews as $review)
								<tr>
									@permission('delete.reviews')
									<td style="padding:10px 18px;">
										<input type="checkbox" value="{{$review->id}}" class="bs_dtrow_checkbox bs_checkItem">
									</td>
									@endpermission
									<td><?=$count++?></td>
									<td>{{ucwords($review->user->name)}}</td>
									<td>{{$review->review}}</td>
									<td>
										@if($review->status)
										<a href="{{route('reviews.allow_disallow',$review->id)}}"><img src="{{url('images/icon/on.png')}}" width="40"></a>
										@else
										<a href="{{route('reviews.allow_disallow',$review->id)}}"><img src="{{url('images/icon/off.png')}}" width="40"></a>
										@endif
									</td>
									<td>{{$review->created_at->format('d:m:Y')}}</td>
									<td>
										@permission('edit.reviews')
										<a href="javascript:void(0)" data-route="{{route('reviews.edit',$review->id)}}" class="btn btn-sm bg-success-light mr-2 bs_edit">
											<i class="fe fe-pencil"></i> Edit
										</a>
										@endpermission
										@permission('delete.reviews')
										<a href="javascript:void(0)" class="btn btn-sm bg-danger-light bs_delete" data-route="{{route('reviews.destroy',$review)}}">
											<i class="fe fe-trash"></i> Delete
										</a>
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
@include('partials.attr_modal')
@endsection