@extends('layouts.master')
@section('title', 'Account Dashboard')
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
                        <!-- Dashboard -->
                        <div id="dashboard" class="tab-pane fade active show">
                            <h3> {{__('Dashboard')}} </h3>
                            <p>{{__('From your account dashboard. you can easily check and view your')}}
                                <a class="text-decoration-underline" href="{{url('/my-account/orders')}}">{{__('recent orders')}}</a>, {{__('manage your')}}
                                <a class="text-decoration-underline" href="{{url('/my-account/wishlist')}}">{{__('wishlist')}}</a> {{__('and')}}
                                <a class="text-decoration-underline" href="{{url('/compare')}}">{{__('compare')}}</a> {{__('and')}}
                                    <a class="text-decoration-underline" href="{{url('/my-account/settings')}}">{{__('edit your password and account details')}}.</a>
                            </p>

                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>{{__('Account Info')}}</h3>
                                    <form action="{{route('update.account',Auth::user()->slug)}}" method="POST"
                                          class="bs_form">
                                        @csrf
                                        <input type="hidden" name="_method" value="put">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="displayname">{{__('Display Name')}}</label>
                                                    <input type="text" id="displayname" name="name" class="form-control"
                                                           value="{{ucwords(Auth::user()->name)}}" required>
                                                    @if($errors->has('name'))
                                                        @foreach($errors->get('name') as $message)
                                                            <span style="color:red">{{$message}}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone">{{__('Phone')}}</label>
                                                    <input type="tele" name="phone" id="phone" class="form-control"
                                                           value="{{Auth::user()->info->phone}}" required>
                                                    @if($errors->has('phone'))
                                                        @foreach($errors->get('phone') as $message)
                                                            <span style="color:red">{{$message}}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                {{--				           					<div class="form-group">--}}
                                                {{--				           						<label>{{__('Email')}}</label>--}}
                                                {{--				           						<span class="form-control bs_disabled_email">{{Auth::user()->email}} <a href="{{url('my-account/settings')}}">{{__('Change')}}</a></span>--}}
                                                {{--				           					</div>--}}
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="firstname">{{__('First Name')}}</label>
                                                    <input type="text" id="firstname" name="first_name"
                                                           class="form-control"
                                                           value="{{ucwords(Auth::user()->info->first_name)}}" required>
                                                    @if($errors->has('first_name'))
                                                        @foreach($errors->get('first_name') as $message)
                                                            <span style="color:red">{{$message}}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="lastname">{{__('Last Name')}}</label>
                                                    <input type="text" id="lastname" name="last_name"
                                                           class="form-control"
                                                           value="{{ucwords(Auth::user()->info->last_name)}}" required>
                                                    @if($errors->has('last_name'))
                                                        @foreach($errors->get('last_name') as $message)
                                                            <span style="color:red">{{$message}}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                {{--				           					<div class="form-group">--}}
                                                {{--				           						<label for="phone">{{__('Phone')}}</label>--}}
                                                {{--				           						<input type="tele" name="phone" id="phone" class="form-control" value="{{Auth::user()->info->phone}}" required>--}}
                                                {{--				           						@if($errors->has('phone'))--}}
                                                {{--						                            @foreach($errors->get('phone') as $message)--}}
                                                {{--						                              <span style="color:red">{{$message}}</span>--}}
                                                {{--						                            @endforeach--}}
                                                {{--						                         @endif--}}
                                                {{--				           					</div>--}}
                                                <div class="form-group">
                                                    <label for="state">{{__('State')}}</label>
                                                    <select name="state_id" id="state" class="form-control bs_states"
                                                            required>
                                                        <option value="">{{__('Select State')}}</option>
                                                        @foreach(App\State::all() as $state)
                                                            @if($state->id == Auth::user()->info->state_id)
                                                                <option value="{{$state->id}}"
                                                                        selected>{{ucwords($state->state_name)}}</option>
                                                            @else
                                                                <option
                                                                    value="{{$state->id}}">{{ucwords($state->state_name)}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('state_id'))
                                                        @foreach($errors->get('state_id') as $message)
                                                            <span style="color:red">{{$message}}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                {{--				           					<div class="form-group">--}}
                                                {{--				           						<label for="state">{{__('State')}}</label>--}}
                                                {{--				           						<select name="state_id" id="state" class="form-control bs_states" required>--}}
                                                {{--				           							<option value="">{{__('Select State')}}</option>--}}
                                                {{--				           							@foreach(App\State::all() as $state)--}}
                                                {{--					           							@if($state->id == Auth::user()->info->state_id)--}}
                                                {{--					           								<option value="{{$state->id}}" selected>{{ucwords($state->state_name)}}</option>--}}
                                                {{--					           							@else--}}
                                                {{--					           								<option value="{{$state->id}}">{{ucwords($state->state_name)}}</option>--}}
                                                {{--					           							@endif--}}
                                                {{--				           							@endforeach--}}
                                                {{--				           						</select>--}}
                                                {{--				           						@if($errors->has('state_id'))--}}
                                                {{--						                            @foreach($errors->get('state_id') as $message)--}}
                                                {{--						                              <span style="color:red">{{$message}}</span>--}}
                                                {{--						                            @endforeach--}}
                                                {{--						                         @endif--}}
                                                {{--				           					</div>--}}
                                                <div class="form-group">
                                                    <label for="city">{{__('City')}}</label>
                                                    <select name="city_id" id="city" class="form-control bs_cities"
                                                            required>
                                                        <option value="">{{__('Select City')}}</option>
                                                        @foreach(App\City::all() as $city)
                                                            @if($city->id == Auth::user()->info->city_id)
                                                                <option value="{{$city->id}}"
                                                                        selected>{{ucwords($city->city_name)}}</option>
                                                            @else
                                                                <option
                                                                    value="{{$city->id}}">{{ucwords($city->city_name)}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('city_id'))
                                                        @foreach($errors->get('city_id') as $message)
                                                            <span style="color:red">{{$message}}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="postal_code">{{__('Zip Code')}}</label>
                                                    <input type="text" maxlength="6" name="postal_code" id="postal_code"
                                                           class="form-control"
                                                           value="{{auth()->user()->info->postal_code??''}}" required>
                                                    @if($errors->has('postal_code'))
                                                        @foreach($errors->get('postal_code') as $message)
                                                            <span style="color:red">{{$message}}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="address">{{__('Address')}}</label>
                                                <textarea name="address" id="address" class="form-control"
                                                          required>{{Auth::user()->info->address}}</textarea>
                                                @if($errors->has('address'))
                                                    @foreach($errors->get('address') as $message)
                                                        <span style="color:red">{{$message}}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group text-right">
                                                    <br>
                                                    <button type="submit"
                                                            class="ps-btn btn btn-primary mt-20 bs_form_btn rounded">{{__('Update')}}</button>
                                                </div>
		           						</div>
		           					</div>
		           				</form>
		        			</div>
		            	</div>
                        </div>
                        <!-- End Dashboard -->
                    </div>
                    <!-- End Tab panes -->
                </div>
            </div>
        </div>
    </div>
@endsection
