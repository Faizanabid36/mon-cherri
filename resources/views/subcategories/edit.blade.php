<form action="{{route('subcategories.update',$sbcategory->id)}}" method="post">
	@csrf
	<input type="hidden" name="_method" value="put">
	<div class="form-group">
		<label>Parent Category</label>
		<select class="form-control" name="parent_category_id" required>
			@foreach(App\Category::all() as $category)
				<option value="{{$category->id}}" <?=$category->id == $sbcategory->category->id ? 'selected' : '' ?> >{{ucwords($category->title)}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label>Sub Category</label>
		<input type="text" name="subcategory" value="{{ucwords($sbcategory->title)}}" class="form-control" required>
	</div>
	<button type="submit" class="btn btn-success bs_dashboard_btn bs_btn_color btn-block">Add</button>
</form>