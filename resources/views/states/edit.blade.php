<form action="{{route('states.update',$state->id)}}" method="post">
	<input type="hidden" name="_method" value="put">
	@csrf
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>State</label>
				<input type="text" class="form-control" value="{{$state->state_name}}" name="state_name" required>
			</div>
			<div class="form-group">
				<label>Country</label>
				<select class="form-control" name="country" required>
					@foreach(App\Country::all() as $country)
						<option value="{{$country->id}}" <?=($country->id == $state->country->id) ? 'selected' : ''?>>{{$country->country_name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-md-12">
			<button type="submit" class="btn btn-success bs_dashboard_btn bs_btn_color btn-block">UPDATE</button>
		</div>
	</div>
</form>