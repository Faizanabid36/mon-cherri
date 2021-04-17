@extends('layouts.app')
@section('title', 'Dashboard - Settings')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Settings</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Settings</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->
			
			
	<div class="row">
		<div class="col-lg-10">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Change Password</h5>
					<div class="row">
						<div class="col-md-12 col-lg-6">
							<form action="{{route('change.pass')}}" method="post" id="changepassword">
								@csrf
								<div class="form-group">
									<label>Current Password</label>
									<input type="password" name="current_password" value="{{ old('current_password') }}" class="form-control @error('current_password') is-invalid @enderror" required>
									@if($errors->has('current_password'))
			                            @foreach($errors->get('current_password') as $message)
			                              <span style="color:red">{{$message}}</span>
			                            @endforeach
			                         @endif
								</div>
								<div class="form-group">
									<label>New Password</label>
									<input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="password" required>
									@if($errors->has('password'))
			                            @foreach($errors->get('password') as $message)
			                              <span style="color:red">{{$message}}</span>
			                            @endforeach
			                        @endif
								</div>
								<div class="form-group">
									<label>Confirm Password</label>
									<input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"  class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" required>
									@if($errors->has('password_confirmation'))
			                            @foreach($errors->get('password_confirmation') as $message)
			                              <span style="color:red">{{$message}}</span>
			                            @endforeach
			                        @endif
								</div>
								<button class="btn btn-success bs_dashboard_btn bs_btn_color" type="submit">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>		
@endsection