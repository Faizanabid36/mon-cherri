@extends('layouts.app')
@section('title', 'Dashboard - Customers')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Create Customer</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Create Customer</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Customer Details</h4>
				</div>
				<div class="card-body">
					@foreach($errors->all() as $error)
					{{$error}}
					@endforeach
					<form action="{{route('customers.store')}}" method="post" enctype="multipart/form-data">
						@csrf
                        <input type="text" hidden name="customer_id" value="{{$customer->id??0}}">
						<div class="row">
							
                            <div class="col-md-12">
								<div class="form-group">
									<label>Email</label>
									<input type="text" name="email" value="{{ $customer->email??''}}" class="form-control @error('email') is-invalid @enderror" required>
									@if($errors->has('email'))
			                            @foreach($errors->get('email') as $message)
			                              <span style="color:red">{{$message}}</span>
			                            @endforeach
			                         @endif
								</div>
							</div>
                            <div class="col-md-12">
								<div class="form-group">
									<label>First Name</label>
									<input type="text" name="first_name" value="{{ $customer->info->first_name??''}}" class="form-control @error('first_name') is-invalid @enderror" required>
									@if($errors->has('first_name'))
			                            @foreach($errors->get('first_name') as $message)
			                              <span style="color:red">{{$message}}</span>
			                            @endforeach
			                         @endif
								</div>
							</div>
                            <div class="col-md-12">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" name="last_name" value="{{ $customer->info->last_name??''}}" class="form-control @error('last_name') is-invalid @enderror" required>
									@if($errors->has('last_name'))
			                            @foreach($errors->get('last_name') as $message)
			                              <span style="color:red">{{$message}}</span>
			                            @endforeach
			                         @endif
								</div>
							</div>
                            <div class="col-md-12">
								<div class="form-group">
									<label>Phone</label>
									<input type="text" name="phone" value="{{ $customer->info->phone??''}}" class="form-control @error('phone') is-invalid @enderror" required>
									@if($errors->has('phone'))
			                            @foreach($errors->get('phone') as $message)
			                              <span style="color:red">{{$message}}</span>
			                            @endforeach
			                         @endif
								</div>
							</div>
                            <div class="col-md-12">
								<div class="form-group">
									<label>Address</label>
									<input type="text" name="address" value="{{ $customer->info->address??''}}" class="form-control @error('address') is-invalid @enderror" required>
									@if($errors->has('address'))
			                            @foreach($errors->get('address') as $message)
			                              <span style="color:red">{{$message}}</span>
			                            @endforeach
			                         @endif
								</div>
							</div>
                            <div class="col-md-12">
								<div class="form-group">
									<label>Postal Code</label>
									<input type="text" name="postal_code" value="{{ $customer->info->postal_code??''}}" class="form-control @error('postal_code') is-invalid @enderror" required>
									@if($errors->has('postal_code'))
			                            @foreach($errors->get('postal_code') as $message)
			                              <span style="color:red">{{$message}}</span>
			                            @endforeach
			                         @endif
								</div>
							</div>
                            <div class="col-md-12">
								<div class="form-group">
									<label>Country</label>
									<select name="country_id" id="country_id" class="form-control" >
                                        @foreach(App\Country::all() as $country)
                                        <option
										<?php
										if($customer->info->country_id==$country->id)
										{
											echo 'selected';
										}
										?>
										value="{{$country->id}}">{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
								</div>
							</div>
                            <div class="col-md-12">
								<div class="form-group" id="country_states">
									<label>States</label>
									<select name="state_id" class="form-control" >
                                        @foreach(App\State::all() as $state)
                                        <option
										<?php
										if($customer->info->state_id==$state->id)
										{
											echo 'selected';
										}
										?>
										value="{{$state->id}}">{{$state->state_name}}</option>
                                        @endforeach
                                    </select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group" id="country_cities">
									<label>City</label>
									<select name="city_id" class="form-control" >
                                        @foreach(App\City::all() as $city)
                                        <option
										<?php
										if($customer->info->city_id==$city->id)
										{
											echo 'selected';
										}
										?>
										value="{{$city->id}}">{{$city->city_name}}</option>
                                        @endforeach
                                    </select>
								</div>
							</div>
							
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-lg btn-success bs_dashboard_btn bs_btn_color">SAVE</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@include('partials.attr_modal')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrercustomer="origin"></script>
<script type="text/javascript">
        tinymce.init({
            selector: '#content',
            height: 400,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
		
    </script>
@endsection
