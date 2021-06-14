<form action="{{route('variations.update',$variation->id)}}" method="post">
	<input type="hidden" name="_method" value="put">
	<input type="text" name="id" value="{{$variation->id}}" hidden/>
	@csrf
	<div class="row">
		<div class="col-md-8">
			<div class="form-group">
				<label>Variation Title </label>
				<input type="text" name="title" value="{{ucwords($variation->title)}}" class="form-control" required>
			</div>
		</div>
		<div class="col-md-8">
			<div class="form-group">
				<label>Variation Sub Title </label>
				<input type="text" name="sub_title" value="{{ucwords($variation->sub_title)}}" class="form-control" required>
			</div>
		</div>
			<div class="col-md-12">
				<button type="submit" class="btn btn-success bs_dashboard_btn bs_btn_variation btn-block">UPDATE</button>
			</div>
		</div>
	</div>
</form>