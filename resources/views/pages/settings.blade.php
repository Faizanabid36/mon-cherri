@extends('layouts.master')
@section('title', 'Account Settings')

@section('content')
	<div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">{{__('My Account')}}</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">

            <div class="row margin-30px-bottom">
                <div class="col-xl-2 col-lg-2 col-md-12 md-margin-20px-bottom">
                    @include('partials.customer_dashboard_sidebar')
                </div>

                <div class="col-xs-10 col-lg-10 col-md-12">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard-content padding-30px-all md-padding-15px-all" style="">
		            	<h3>{{__('Account Info')}}</h3>
	           			<div class="row">
		            		<div class="col-md-12">
	           					<div class="row">
	           						<div class="col-md-6">
	           							<h3 class="mt-10 mb-10" style="font-weight: 400">{{__('Change Password')}}</h3>
	           							<form action="{{route('change.pass')}}" method="POST" class="bs_form">
	           								@csrf
		           							 <div class="row">
		           							 	 <div class="col-md-12">
		           							 	 	<div class="form-group">
		           							 	 		 <label for="current_password">{{__('Current Password')}}</label>
		           							 	 		 <input type="password" name="current_password" id="current_password" class="form-control" required>
		           							 	 		 @if($errors->has('current_password'))
								                            @foreach($errors->get('current_password') as $message)
								                              <span style="color:red">{{$message}}</span>
								                            @endforeach
								                         @endif
		           							 	 	</div>
		           							 	 </div>
		           							 	 <div class="col-md-12">
		           							 	 	<div class="form-group">
		           							 	 		 <label for="new_password">{{__('Current Password')}}</label>
		           							 	 		 <input type="password" name="password" id="new_password" class="form-control" required>
		           							 	 		 @if($errors->has('password'))
								                            @foreach($errors->get('password') as $message)
								                              <span style="color:red">{{$message}}</span>
								                            @endforeach
								                         @endif
		           							 	 	</div>
		           							 	 </div>
		           							 	 <div class="col-md-12">
		           							 	 	<div class="form-group">
		           							 	 		 <label for="password_confirmation">{{__('Current Password')}}</label>
		           							 	 		 <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
		           							 	 		 @if($errors->has('password_confirmation'))
								                            @foreach($errors->get('password_confirmation') as $message)
								                              <span style="color:red">{{$message}}</span>
								                            @endforeach
								                         @endif
		           							 	 	</div>
		           							 	 </div>
		           							 	 <div class="col-md-12">
		           							 	 	<div class="form-group text-right">
					           							<button type="submit" class="ps-btn btn btn-primary mt-20 bs_form_btn">{{__('Change Password')}}</button>
					           						</div>
		           							 	 </div>
		           							 </div>
	           							</form>
	           						</div>
	           						<div class="col-md-6">
	           							<h3 class="mt-10 mb-10" style="font-weight: 400">{{__('Change Email')}}</h3>
	           							@if(session()->has('email_changed'))
	           							<div class="alert alert-success">
	           								{{session()->get('email_changed')}}
	           							</div>
	           							@else
	           							<form action="{{route('change_user_email')}}" method="POST">
	           								@csrf
		           							<div class="row">
		           							 	 <div class="col-md-12">
		           							 	 	<div class="form-group">
		           							 	 		 <label for="email">{{__('Email')}}</label>
		           							 	 		 <input type="email" name="email" id="current_password" class="form-control" value="{{Auth::user()->email}}" required>
		           							 	 		 @if($errors->has('email'))
								                            @foreach($errors->get('email') as $message)
								                              <span style="color:red">{{$message}}</span>
								                            @endforeach
								                         @endif
		           							 	 	</div>
		           							 	 </div>
		           							 	 <div class="col-md-12">
		           							 	 	<div class="form-group text-right">
					           							<button type="submit" class="ps-btn btn btn-primary mt-20">{{__('Change Email')}}</button>
					           						</div>
		           							 	 </div>
		           							</div>
	           							</form>
	           							@endif
	           						</div>
	           					</div>
		        			</div>
		            	</div>
                    </div>
                    <!-- End Tab panes -->
                </div>
            </div>
        </div>
    </div>
@endsection