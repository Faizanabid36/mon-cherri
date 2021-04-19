@extends('layouts.app')
@section('title', 'Dashboard - Messages')
@section('content')
<div class="content container-fluid">
	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Messages</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Messages</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	<div class="row">
		<div class="col-lg-12 col-md-8">
			<div class="card">
				<div class="card-body">
					@permission('delete.messages')
					<form action="{{route('messages.bulkDelete')}}" method="POST" id="deleteAll">
						@csrf
						<input type="hidden" name="items" id="bs_items_forbulkDelete">
					</form>
					@endpermission
					<div class="email-content">
						<div class="table-responsive">
							<table class="datatable table table-inbox table-hover">
								<thead>
									<tr>
										@permission('delete.messages')
										<th>
											<input type="checkbox" id="checkAll"> 
										</th>
										@endpermission
										<th>Count</th>
										<th>Name</th>
										<th>Message</th>
										<th>Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $count = 1; ?>	
									@foreach($messages as $message)
									<tr class="{{($message->status == 0 ? 'unread' : '')}} clickable-row" data-href="javascript:void(0)">
										@permission('delete.messages')
										<td style="padding:10px 18px;">
											<input type="checkbox" value="{{$message->id}}" class="bs_dtrow_checkbox bs_checkItem">
										</td>
										@endpermission
										<td><?=$count++?></td>
										<td class="name">{{$message->name}}</td>
										<td class="subject">{{Str::limit($message->message, 80)}}</td>
										<td class="mail-date">{{$message->created_at->format('d-m-Y, H:m')}}</td>
										<td>
											<a href="{{ route('messages.show',$message->id) }}" class="btn btn-sm bg-success-light mr-2"><i class="fa fa-eye"></i> View</a>
											@permission('delete.messages')
											<a href="javascript:void(0)"  data-route="{{route('messages.destroy',$message->id)}}" class="btn btn-sm bg-danger-light mr-2 bs_delete"><i class="fa fa-trash"></i> Delete</a>
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
</div>
@include('partials.attr_modal')
@endsection