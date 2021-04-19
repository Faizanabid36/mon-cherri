<form action="{{route('comments.update',$comment->id)}}" method="post">
	<input type="hidden" name="_method" value="put">
	@csrf
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>Comment</label>
				<textarea class="form-control" name="comment" required>{{$comment->body}}</textarea>
			</div>
		</div>
		<div class="col-md-12">
			<button type="submit" class="btn btn-success bs_dashboard_btn bs_btn_color btn-block">UPDATE</button>
		</div>
	</div>
</form>