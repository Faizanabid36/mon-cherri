@extends('layouts.app')
@section('title', 'Dashboard - Create Variation')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Create Variation</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Create Variation</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Variation Details</h4>
				</div>
				<div class="card-body">
					@foreach($errors->all() as $error)
                    <span style="color:red">{{$error}}</span>
					
					@endforeach
					<form action="{{route('product.variations.store')}}" method="post" enctype="multipart/form-data">
						@csrf
                        <input name="product_id" value="{{$product_id}}" hidden/>
						<div class="row">
							
							
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">	
                                        <div class="form-group">
                                            <label>Variation</label>
                                            <select class="form-control @error('variation') is-invalid @enderror" id="variation" data-route="" name="variation_id" required>
                                                <option value="">Choose Variation</option>
                                                @foreach(App\Variation::all() as $variation)
                                                    <option value="{{$variation->id}}">{{ucwords($variation->title)}}</option>
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
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">	
										<div class="form-group">
											<label>Price ($)</label>
											<input type="text" value="{{ old('price') }}" id="price" name="price" class="form-control product_prices" required>
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
							<div class="col-md-12">
								<div class="input-images"></div>
								<br>
								@if($errors->has('images'))
		                            @foreach($errors->get('images') as $message)
		                              <span style="color:red">{{$message}}</span>
		                            @endforeach
		                        @endif
							</div>
							
							<div class="col-md-12">
								@if($errors->has('description'))
		                            @foreach($errors->get('description') as $message)
		                              <span style="color:red">{{$message}}</span>
		                            @endforeach
		                        @endif
								<textarea rows="8" name="description" class="form-control summernote @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
							</div>
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
	$('.input-images').imageUploader({Default: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml']});
})
</script>
@endsection