@extends('layouts.app')
@section('title', 'Dashboard - Create Post')
@section('content')
<div class="content container-fluid">
	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Create Post</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Create Post</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Post Details</h4>
				</div>
				<div class="card-body">
					<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
						@csrf
						{{ @csrf_field()}}
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" required>
							@if($errors->has('title'))
								@foreach($errors->get('title') as $message)
									<span style="color:red">{{$message}}</span>
								@endforeach
							@endif
						</div>
						<div class="form-group">
							<label>Post Banner</label>
							<input type="file" name="image" id="banner" class="form-control" accept="image/*" required>
						</div>
						<div id="image_display" style="display: none; margin : 10px; ">
							<img src="#" id="image_preview" height="60" width="100" >
						</div>
						<div class="form-group">
							<label>Content</label>
							<textarea name="content" class="form-control summernote" required>{!! old('content') !!}</textarea>
							@if($errors->has('content'))
								@foreach($errors->get('content') as $message)
									<span style="color:red">{{$message}}</span>
								@endforeach
							@endif
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success bs_dashboard_btn bs_btn_color btn-lg" style="float: right;">Create</button>
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
	$(document).ready(function(){
		function readURL(input) {
		  if (input.files && input.files[0]) {
		    var reader = new FileReader();
		    
		    reader.onload = function(e) {
		      $('#image_preview').attr('src', e.target.result);
		      $("#image_display").slideDown();
		    }
		    
		    reader.readAsDataURL(input.files[0]); // convert to base64 string
		  }
		}

		$("#banner").change(function() {
		  readURL(this);
		});
	});
</script>
@endsection