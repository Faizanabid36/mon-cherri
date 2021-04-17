@extends('layouts.app')
@section('title', 'Dashboard - Message')
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
					<div class="mailview-content">
						<div class="mailview-header">
						<div class="row">
							<div class="col-sm-8 col-md-7 col-lg-9">
								<div class="text-truncate m-b-10">
									<span class="mail-view-title">Message</span>
								</div>
							</div>
						</div>
							<div class="sender-info">
								<div class="receiver-details float-left">
									<span class="sender-name"><b>Sender Name: </b>{{$contact->name}}</span>
									<span class="sender-name"><b>From: </b>{{$contact->email}}</span>
								</div>	
								<div class="mail-sent-time">
									<span class="mail-time">{{$contact->created_at->format('d-m-Y, H:m')}}</span>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="mailview-inner" style="padding: 2%;background-color: #efefef;border-radius: 12px;">{!! $contact->message !!}</div>
					</div>
					<div class="mailview-footer">
						@permission('delete.messages')
						<div class="row">
							<div class="col-sm-12 right-action">
								<a href="javascript:void(0)" class="btn btn-white bs_dashboard_btn bs_delete" data-route="{{route('messages.destroy',$contact->id)}}">
									<i class="fe fe-trash"></i> Delete
								</a>
							</div>
						</div>
						@endpermission
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('partials.attr_modal')
@endsection