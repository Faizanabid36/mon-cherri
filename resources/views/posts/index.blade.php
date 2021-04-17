@extends('layouts.app')

@section('title', 'Dashboard - Posts')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Posts</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Posts</li>
				</ul>
			</div>
			<div class="col">
				@permission('create.posts')
					<a href="{{route('posts.create')}}" class="btn btn-success bs_dashboard_btn bs_btn_color float-right">Create New</a>
				@endpermission
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Latest Posts</h4>
				</div>
				<div class="card-body">

					<div class="table-responsive">
						@permission('delete.posts')
						<form action="{{route('posts.bulkDelete')}}" method="POST" id="deleteAll">
							@csrf
							<input type="hidden" name="items" id="bs_items_forbulkDelete">
						</form>
						@endpermission
						<table class="datatable table table-stripped">
							<thead>
								<tr>
									@permission('delete.posts')
									<th>
										<input type="checkbox" id="checkAll"> 
									</th>
									@endpermission
									<th>Count</th>
									<th>Image</th>
									<th>Post Title</th>
									<th>Views</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $count = 1; ?>
								@foreach($posts as $post)
								<tr>
									@permission('delete.posts')
									<td style="padding:10px 18px;">
										<input type="checkbox" value="{{$post->id}}" class="bs_dtrow_checkbox bs_checkItem">
									</td>
									@endpermission
									<td><?=$count++?></td>
									<td><img src="{{url('',$post->image->url)}}" width="40"></td>
									<td><a href="{{ url('post',$post->slug) }}">{{$post->title}}</a></td>
									<td>{{views($post)->unique()->count()}}</td>
									<td>
										@permission('edit.posts')
										<a href="{{ route('posts.edit',$post->id) }}" class="btn btn-sm bg-success-light mr-2"><i class="fa fa-edit"></i> Edit</a>
										@endpermission
										@permission('delete.posts')
										<a href="javascript:void(0)"  data-route="{{route('posts.destroy',$post)}}" class="btn btn-sm bg-danger-light mr-2 bs_delete"><i class="fa fa-trash"></i> Delete</a>
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