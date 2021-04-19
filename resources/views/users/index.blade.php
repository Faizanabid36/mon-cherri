@extends('layouts.app')
@section('title', 'Dashboard - Users')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Users</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Users</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">All Users</h4>
				</div>
				<div class="card-body">

					<div class="table-responsive">
						<form action="{{route('users.bulkDelete')}}" method="POST" id="deleteAll">
							@csrf
							<input type="hidden" name="items" id="bs_items_forbulkDelete">
						</form>
						<table class="datatable table table-stripped">
							<thead>
								<tr>
									@permission('delete.users')
									<th>
										<input type="checkbox" id="checkAll"> 
									</th>
									@endpermission
									<th>Count</th>
									<th>Name</th>
									<th>Email</th>
									<th>Role</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $count = 1; ?>

								@foreach($users as $user)
								<tr>
									@permission('delete.users')
									<td style="padding:10px 18px;">
										<input type="checkbox" value="{{$user->id}}" class="bs_dtrow_checkbox bs_checkItem">
									</td>
									@endpermission
									<td><?=$count++?></td>
									<td>{{$user->name}}</td>
									<td>{{$user->email}}</td>
									<td>
										@foreach($user->roles as $user_role)
										<span class="badge badge-danger">{{$user_role->name}}</span>
										@endforeach
									</td>
									<td>
										<div class="actions">
										@permission('edit.users')
										<a href="{{route('users.show',$user->id)}}" class="btn btn-sm bg-success-light mr-2">View</a>
										@endpermission
										@permission('delete.users')
											<a href="javascript:void(0)" class="btn btn-sm bg-danger-light bs_delete" data-route="{{route('users.destroy',$user->id)}}"><i class="fa fa-trash"></i> Delete</a>
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
@include('partials.attr_modal')	
@endsection