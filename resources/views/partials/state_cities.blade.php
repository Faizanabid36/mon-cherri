@foreach($state->cities as $city)
	@if(Auth::check())
		@if(Auth::user()->info->city_id == $city->id)
			<option value="{{$city->id}}" selected>{{ucwords($city->city_name)}}</option>
		@else
			<option value="{{$city->id}}" >{{ucwords($city->city_name)}}</option>
		@endif
	@else
		<option value="{{$city->id}}" >{{ucwords($city->city_name)}}</option>
	@endif
@endforeach