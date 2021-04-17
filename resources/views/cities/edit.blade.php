<form action="{{route('cities.update',$city->id)}}" method="post">
	<input type="hidden" name="_method" value="put">
	@csrf
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>City</label>
				<input type="text" class="form-control" value="{{$city->city_name}}" name="city_name" required>
			</div>
			<div class="form-group">
				<label>State</label>
				<select class="form-control" name="state">
					@foreach(App\State::all() as $state)
						<option value="{{$state->id}}" <?=($state->id == $city->state->id) ? 'selected' : ''?>>{{$state->state_name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-md-12">
			<button type="submit" class="btn btn-success bs_dashboard_btn bs_btn_color btn-block">UPDATE</button>
		</div>
	</div>
</form>