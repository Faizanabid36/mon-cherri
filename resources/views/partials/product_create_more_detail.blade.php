<div class="col-md-12">
	<div class="form-group">
		<label>Product  SubCategories</label>
		<select class="form-control bs_categories @error('subcategory') is-invalid @enderror" name="subcategory[]" id="_subcategories" multiple required>
			@foreach($category->subcategories as $subcategory)
				<option value="{{$subcategory->id}}">{{ucwords($subcategory->title)}}</option>
			@endforeach
		</select>
		@if($errors->has('subcategory'))
            @foreach($errors->get('subcategory') as $message)
              <span style="color:red">{{$message}}</span>
            @endforeach
         @endif
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label>Product  Brand:</label>
		<select class="form-control @error('brand') is-invalid @enderror" id="_brands" name="brand" required>
			@foreach($category->brands as $brand)
				<option value="{{$brand->id}}">{{ucwords($brand->title)}}</option>
			@endforeach
		</select>
		@if($errors->has('brand'))
            @foreach($errors->get('brand') as $message)
              <span style="color:red">{{$message}}</span>
            @endforeach
         @endif
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label>Product Sizes</label>
		<select class="form-control " name="size[]" id="_sizes" multiple required>
		@foreach($category->sizes as $size)
			<option value="{{$size->id}}">{{ucwords($size->size)}}</option>
		@endforeach
		</select>
		@if($errors->has('size'))
            @foreach($errors->get('size') as $message)
              <span style="color:red">{{$message}}</span>
            @endforeach
        @endif
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label>Product  Color</label>
		<select class="form-control @error('color') is-invalid @enderror" name="color[]" id="_colors" multiple required>
			@foreach(App\Color::all() as $color)
				<option value="{{$color->id}}">{{ucwords($color->color)}}</option>
			@endforeach
		</select>
		@if($errors->has('color'))
            @foreach($errors->get('color') as $message)
              <span style="color:red">{{$message}}</span>
            @endforeach
        @endif
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label>Product tags</label>
		<select class="form-control @error('tags') is-invalid @enderror" id="_tags" name="tags[]" multiple></select>
		@if($errors->has('tags'))
            @foreach($errors->get('tags') as $message)
              <span style="color:red">{{$message}}</span>
            @endforeach
        @endif
	</div>
</div>