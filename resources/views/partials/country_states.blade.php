<option value="">Select State</option>
@foreach($country->states as $state)
	@if(Auth::check())
		@if(Auth::user()->info->state_id == $state->id)
			<option value="{{$state->id}}" selected>{{ucwords($state->state_name)}}</option>
		@else
			<option value="{{$state->id}}" >{{ucwords($state->state_name)}}</option>
		@endif
	@else
		<option value="{{$state->id}}" >{{ucwords($state->state_name)}}</option>
	@endif
@endforeach