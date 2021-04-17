<form action="{{route('colors.update',$color->id)}}" method="post">
	<input type="hidden" name="_method" value="put">
	@csrf
	<div class="row">
		<div class="col-md-8">
			<div class="form-group">
				<label>Color Name </label>
				<input type="text" name="color" value="{{ucwords($color->color)}}" class="form-control" required>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Code</label>
				<input type="color" name="code" value="{{$color->code}}" class="form-control" required>
			</div>
		</div>
			<div class="col-md-12">
				<button type="submit" class="btn btn-success bs_dashboard_btn bs_btn_color btn-block">UPDATE</button>
			</div>
		</div>
	</div>
</form>