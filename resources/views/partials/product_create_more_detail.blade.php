<div class="col-md-6">
	<div class="form-group">
		<label>Product  SubCategories</label>
		<select class="form-control bs_categories @error('subcategory') is-invalid @enderror" name="subcategory[]" id="_subcategories" multiple >
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
		<label>Product Search Tags</label>
		<select class="form-control @error('tags') is-invalid @enderror" id="_tags" name="tags[]" multiple></select>
		@if($errors->has('tags'))
            @foreach($errors->get('tags') as $message)
              <span style="color:red">{{$message}}</span>
            @endforeach
        @endif
	</div>
</div>
