<form action="{{route('widths.update',$width->id)}}" method="post">
	<input type="hidden" name="_method" value="put">
	@csrf
	<div class="row">
		<div class="col-md-8">
			<div class="form-group">
				<label>Width </label>
				<input type="number" name="width" value="{{ucwords($width->width)}}" class="form-control" required>
			</div>
		</div>
			<div class="col-md-12">
				<button type="submit" class="btn btn-success bs_dashboard_btn bs_btn_width btn-block">UPDATE</button>
			</div>
		</div>
	</div>
</form>