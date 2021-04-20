@extends('layouts.app')
@section('title', 'Dashboard - Edit Profile')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Edit Profile</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Edit Profile</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->
<div class="row">
	<div class="col-md-12">
		<div class="tab-content profile-tab-cont">
			
			<!-- Personal Details Tab -->
			<div class="tab-pane fade active show" id="per_details_tab">
				<!-- Personal Details -->
				<form action="{{route('users.update',$user->id)}}" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-lg-9">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title d-flex justify-content-between">
									<span>Edit User Info</span> 
								</h5>
								@csrf
								<input type="hidden" name="_method" value="PUT">
								<div class="row">
	           						<div class="col-md-6">
			           					<div class="form-group">
			           						<label for="displayname">Display Name</label>
			           						<input type="text" id="displayname" name="name" class="form-control" value="{{ucwords($user->name)}}" required>
			           						 @if($errors->has('name'))
					                            @foreach($errors->get('name') as $message)
					                              <span style="color:red">{{$message}}</span>
					                            @endforeach
					                         @endif
			           					</div>
	           						</div>
	           						<div class="col-md-6">
			           					<div class="form-group">
			           						<label for="firstname">First Name</label>
			           						<input type="text" id="firstname" name="first_name" class="form-control" value="{{ucwords($user->info->first_name)}}" required>
			           						@if($errors->has('first_name'))
					                            @foreach($errors->get('first_name') as $message)
					                              <span style="color:red">{{$message}}</span>
					                            @endforeach
					                         @endif
			           					</div>
	           						</div>	
	           						<div class="col-md-6">
			           					<div class="form-group">
			           						<label for="lastname">Last Name</label>
			           						<input type="text" id="lastname" name="last_name" class="form-control" value="{{ucwords($user->info->last_name)}}" required>
			           						@if($errors->has('last_name'))
					                            @foreach($errors->get('last_name') as $message)
					                              <span style="color:red">{{$message}}</span>
					                            @endforeach
					                         @endif
			           					</div>
	           						</div>
	           						<div class="col-md-6">
			           					<div class="form-group">
			           						<label for="phone">Phone</label>
			           						<input type="tele" name="phone" id="phone" class="form-control" value="{{$user->info->phone}}" required>
			           						@if($errors->has('phone'))
					                            @foreach($errors->get('phone') as $message)
					                              <span style="color:red">{{$message}}</span>
					                            @endforeach
					                         @endif
			           					</div>
	           						</div>
	           						<div class="col-md-6">
			           					<div class="form-group">
			           						<label for="state">State</label>
			           						<select name="state_id" id="state" class="form-control bs_states" required>
			           							<option value="">Select State</option>
			           							@foreach(App\State::all() as $state)
				           							@if($state->id == $user->info->state_id)
				           								<option value="{{$state->id}}" selected>{{ucwords($state->state_name)}}</option>
				           							@else
				           								<option value="{{$state->id}}">{{ucwords($state->state_name)}}</option>
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
	           						<div class="col-md-6">
			           					<div class="form-group">
			           						<label for="city">City</label>
			           						<select name="city_id" id="city" class="form-control bs_cities" required>
			           							<option value="">Select City</option>
			           							@foreach(App\City::all() as $city)
				           							@if($city->id == $user->info->city_id)
				           								<option value="{{$city->id}}" selected>{{ucwords($city->city_name)}}</option>
				           							@else
				           								<option value="{{$city->id}}">{{ucwords($city->city_name)}}</option>
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
	           						<div class="col-md-12">
	           							<label for="address">Address</label>
	           							<textarea name="address" id="address" class="form-control" 
	           							required>{{$user->info->address}}</textarea>
	           							@if($errors->has('address'))
				                            @foreach($errors->get('address') as $message)
				                              <span style="color:red">{{$message}}</span>
				                            @endforeach
				                         @endif
	           						</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card">
							<div class="card-body">
								<div class="input-group mb-3">
								  <div class="custom-file">
								    <label class="custom-file-label" for="user_image">Choose Image
								    <input type="file" name="image" class="custom-file-input" id="user_image">
								    </label>
								  </div>
								</div>
								<img width="100%" style="display: none;" id="image_preview">
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<button type="submit" class="btn btn-block btn-lg btn-success mt-20 bs_form_btn bs_btn_color bs_dashboard_btn">Update</button>
		           			</div>
						</div>
					</div>
				</div>
				</form>
				<!-- /Personal Details -->

			</div>
			<!-- /Personal Details Tab -->
			
		</div>
	</div>
</div>
</div>			
@endsection
@section('javascript')
<script type="text/javascript">

	$(document).on('change','#user_image',function() {
	  readURL(this);
	});
	$(document).on('change','.bs_states',function () {
        var bs_st  = $(this).val();
        state_cities(bs_st);
    })
    function readURL(input) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    
	    reader.onload = function(e) {
	      $('#image_preview').attr('src', e.target.result);
	    }
	    document.getElementById("image_preview").style.display = "block";
	    reader.readAsDataURL(input.files[0]); // convert to base64 string
	  }
	}
    function state_cities(bs_st) {
        if(bs_st != "" && bs_st != null){
            $.ajax({
                url:"<?=url('bs_state_cites')?>",
                method:'POST',
                data:{state:bs_st,'_token':'<?=csrf_token()?>'},
                success:function(data){
                    $('.bs_cities').html(data.html);
                }
            });
        }
    }
    state_cities($("#state").val());
</script>
@endsection