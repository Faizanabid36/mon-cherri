@extends('layouts.app')
@section('title', 'Dashboard - Edit Variation')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Edit Variation</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Edit Variation</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Edit Variation Details</h4>
				</div>
				<div class="card-body">
					<form action="{{route('product.variations.update')}}" method="post" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="_method" value="POST">
                        <input type="hidden" name="id" value="{{$product_variation->id}}">
                       
						<div class="row">
							
							
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">	
                                        <div class="form-group">
                                            <label>Variation</label>
                                            <select class="form-control @error('variation') is-invalid @enderror" id="variation" data-route="" name="variation_id" required>
                                                <option value="">Choose Variation</option>
                                                @foreach(App\Variation::all() as $variation)
                                                    <option value="{{$variation->id}}" <?php 
                                                    if($product_variation->variation_id==$variation->id){
                                                        echo 'selected';
                                                    }?>>{{ucwords($variation->title)}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('variation'))
                                                @foreach($errors->get('variation') as $message)
                                                <span style="color:red">{{$message}}</span>
                                                @endforeach
                                            @endif
                                        </div>
									</div>
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label>Color</label>
                                            <select class="form-control @error('color') is-invalid @enderror" id="color" data-route="" name="color_id" required>
                                                <option value="">Choose Color</option>
                                                @foreach(App\Color::all() as $color)
                                                    <option value="{{$color->id}}"
                                                    <?php 
                                                    if($product_variation->color_id==$color->id){
                                                        echo 'selected';
                                                    }?>
                                                    >{{ucwords($color->color)}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('color'))
                                                @foreach($errors->get('color') as $message)
                                                <span style="color:red">{{$message}}</span>
                                                @endforeach
                                            @endif
                                        </div>
									</div>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">	
										<div class="form-group">
											<label>Price ($)</label>
											<input type="text" value="{{ $product_variation->price}}" id="price" name="price" class="form-control product_prices" required>
											@if($errors->has('price'))
					                            @foreach($errors->get('price') as $message)
					                              <span style="color:red">{{$message}}</span>
					                            @endforeach
					                        @endif
										</div>
									</div>
									
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="row" id="more_details" style="display: none;"></div>
							</div>
                            <div class="col-md-12 edit_images_box">
								<div class="container">
									<div class="row">
										@foreach($product_variation->images as $image)
										<div class="col-sm-2 edit_images">
											<a href="{{route('image.delete',$image->id)}}" class="btn del_p_image_btn"><i class="material-icons">clear</i></a>
											<img src="{{url($image->url)}}" width="100%">
										</div>
										@endforeach
									</div>
								</div>
								<div class="input-images"></div>
								<br>
							</div>
							
							
							<div class="col-md-12">
								@if($errors->has('description'))
		                            @foreach($errors->get('description') as $message)
		                              <span style="color:red">{{$message}}</span>
		                            @endforeach
		                        @endif
								<textarea rows="8" name="description" class="form-control summernote @error('description') is-invalid @enderror">{{$product_variation->description  }}</textarea>
							</div>
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-lg btn-success bs_dashboard_btn bs_btn_color">UPDATE</button>
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
			$("#more_details").slideUp('slow')
			$("#more_details").empty();
		}
	});
	$('#_tags').select2({
		tags:true,
	});
	$('#_sizes').select2();
	$('#_colors').select2();
	$('#_subcategories').select2();

	$('.input-images').imageUploader();
})
</script>
@endsection
