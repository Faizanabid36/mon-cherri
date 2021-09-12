<form action="{{route('certificates.update',$certificate->id)}}" method="post">
	<input type="hidden" name="_method" value="put">
	@csrf
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>Certificate Name </label>
				<input type="text" name="certificate" value="{{($certificate->certificate)}}" class="form-control" required>
			</div>
		</div>

			<div class="col-md-12">
				<button type="submit" class="btn btn-success bs_dashboard_btn bs_btn_certificate btn-block">UPDATE</button>
			</div>
		</div>
	</div>
</form>
