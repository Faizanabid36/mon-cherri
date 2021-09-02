<form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_method" value="put">
	@csrf
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>Category</label>
				<input type="text" class="form-control" value="{{$category->title}}" name="title" required>
			</div>
			<div class="form-group">
				<label>Priority</label>
				<div class="input-group">
					<input type="text" name="prority" class="form-control" value="{{$category->prority}}" required>
					<div class="input-group-prepend">	
						<!-- <button type="submit" class="btn btn-success">Add</button> -->
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Image</label>
				<br>
				<input type="file" name="path" class="form-control">
				<img src="{{$category->image}}" alt="" 	style="width:50%;height50%;">
			</div>
		</div>
		<div class="col-md-12">
			<button type="submit" class="btn btn-success bs_dashboard_btn bs_btn_color btn-block">UPDATE</button>
		</div>
	</div>
</form>