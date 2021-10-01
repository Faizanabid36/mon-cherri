@extends('layouts.app')
@section('title', 'Dashboard - Create Product')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Create Product</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Create Product</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Product Details</h4>
				</div>
				<div class="card-body">
					@foreach($errors->all() as $error)
					{{$error}}
					@endforeach
					<form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Product Number</label>
									<input type="text" value="{{ old('product_number') }}" id="product_number" name="product_number" class="form-control product_prices" required>
									@if($errors->has('product_number'))
										@foreach($errors->get('product_number') as $message)
											<span style="color:red">{{$message}}</span>
										@endforeach
									@endif
                                </div>
								
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6 form-group">
										<label>Commission</label>
										<select class="form-control" name="commission" id="commission">
											<option value="flat">Flat</option>
											<option value="percent">Percent</option>
										</select>
									</div>
									<div class="col-md-6 form-group">
										<label>Rate <span id="rate_unit">$</span> </label>
										<input type="number" class="form-control" value="100" min="0" name="commission_rate" id="commission_rate">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Product Name</label>
									<input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
									@if($errors->has('name'))
										@foreach($errors->get('name') as $message)
										<span style="color:red">{{$message}}</span>
										@endforeach
									@endif
								</div>
							</div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <label for="shipping_policy_1">Shipping Policy 1</label>
                                    <select class="form-control" name="shipping_policy_1" id="shipping_policy_1">
                                        <option selected disabled>Select Shipping Type</option>
                                        @foreach($shipping_policies1 as $policy)
                                            <option value="{{$policy->id}}"
											<?php
											if($policy->is_default)
											{
												echo 'selected';
											}
											
											?>	
											>{{$policy->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Product Category</label>
									<select class="form-control @error('category') is-invalid @enderror" id="category" data-route="{{url('get_more_product_details')}}" name="category" required>
										<option value="">Choose Category</option>
										@foreach(App\Category::all() as $category)
											<option value="{{$category->id}}">{{ucwords($category->title)}}</option>
										@endforeach
									</select>
									@if($errors->has('category'))
			                            @foreach($errors->get('category') as $message)
			                              <span style="color:red">{{$message}}</span>
			                            @endforeach
			                         @endif
								</div>
							</div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <label for="shipping_policy_2">Shipping Policy 2</label>
                                    <select class="form-control" name="shipping_policy_2" id="shipping_policy_2">
                                        <option selected disabled>Select Shipping Type</option>
                                        @foreach($shipping_policies2 as $policy)
                                            <option value="{{$policy->id}}"
											<?php
											if($policy->is_default)
											{
												echo 'selected';
											}
											
											?>	
											>{{$policy->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
							<div class="col-md-6">
								<div class="row" id="more_details" style="overflow: auto;">
									<div class="col-md-12">
										<div class="form-group">
											<label>Product SubCategories:</label>
											<select
												class="form-control bs_categories @error('subcategory') is-invalid @enderror"
												multiple style="width: 100%" id="_subcategories" >

											</select>

										</div>
									</div>
									<!-- <div class="col-md-6">
										<div class="form-group">
											<label>Product Search Tags</label>
											<select class="form-control @error('tags') is-invalid @enderror"
													style="width: 100%" id="_tags" multiple>

											</select>

										</div>
									</div> -->
								</div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="return_policy">Return Policy</label>
                                    <select class="form-control" name="return_policy" id="return_policy">
                                        <option selected disabled>Select Return Type</option>
                                        @foreach($return_policies as $policy)
                                            <option value="{{$policy->id}}" <?php
											if($policy->is_default)
											{
												echo 'selected';
											}
											
											?>>{{$policy->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            


							
							<!-- <div class="col-md-6">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Percent Off</label>
											<input type="text" value="{{ old('percent_off') }}" id="percent_off" name="percent_off" class="form-control">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Stock</label>
											<input type="number" name="stock" min="1" class="form-control" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Is Product New?</label>
											<select class="form-control" name="is_new">
												<option value="0" {{ (old("is_new") == 0 ? "selected":"") }}>No</option>
												<option value="1" {{ (old("is_new") == 1 ? "selected":"") }}>Yes</option>
											</select>
											@if($errors->has('is_new'))
					                            @foreach($errors->get('is_new') as $message)
					                              <span style="color:red">{{$message}}</span>
					                            @endforeach
					                        @endif
										</div>
									</div>
								</div>
							</div> -->
							
							<div class="col-md-12">
								<div class="input-images"></div>
								<br>
								@if($errors->has('images'))
		                            @foreach($errors->get('images') as $message)
		                              <span style="color:red">{{$message}}</span>
		                            @endforeach
		                        @endif
							</div>
							<!-- <div class="col-md-12">
								<div class="form-group">
									<label>Video Link</label>
									<input type="text" id="video_link" name="video_link" value="{{ old('video_link') }}" class="form-control">
								</div>
							</div> -->
							<!-- <div class="col-md-12">
								@if($errors->has('description'))
		                            @foreach($errors->get('description') as $message)
		                              <span style="color:red">{{$message}}</span>
		                            @endforeach
		                        @endif
								<textarea rows="8" name="description" class="form-control summernote @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
							</div> -->
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-lg btn-success bs_dashboard_btn bs_btn_color">UPLOAD</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
$(document).ready(function () {
	$('#_tags').select2({
						tags:true,
					});
	$('#_subcategories').select2();
	$('#commission').on('change',function(){
		if($(this).val()=='flat')
		{
			$('#commission_rate').val('100');
			$('#rate_unit').html('$');
		}
		else
		{
			$('#rate_unit').html('%');
			$('#commission_rate').val('10');
		}
		
	})
	$(document).on('change','#category',function(){
		var cat_id = $(this).val();
		var route = $(this).attr('data-route');
		if (cat_id != '') {
			$.ajax({
				url:route,
				method:'POST',
				data:{id:cat_id,'_token':'<?=csrf_token()?>'},
				success:function(data){
					$("#more_details").html(data.html);
					$("#more_details").slideDown('slow');
					$('#_tags').select2({
						tags:true,
					});
					$('#_sizes').select2();
					$('#_colors').select2();
					$('#_subcategories').select2();
				}
			});
		}else{
			// $("#more_details").slideUp('slow')
			// $("#more_details").empty();
			$("#more_details").html(`<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Product SubCategories:</label>
                                                <select
                                                    class="form-control bs_categories @error('subcategory') is-invalid @enderror"
                                                    multiple style="width: 100%" id="_subcategories">

                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Product Search Tags</label>
                                                <select class="form-control @error('tags') is-invalid @enderror"
                                                        style="width: 100%" id="_tags" multiple>

                                                </select>

                                            </div>
                                        </div>`);
		$('#_tags').select2({
							tags:true,
						});
		$('#_subcategories').select2();
		}
	});
	$('.input-images').imageUploader({Default: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml']});
})
</script>
@endsection
