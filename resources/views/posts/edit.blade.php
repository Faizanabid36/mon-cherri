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
					<form action="{{route('posts.update',$post)}}" method="post" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="_method" value="put">
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="title" value="{{ $post->title }}" class="form-control @error('title') is-invalid @enderror" required>
							@if($errors->has('title'))
								@foreach($errors->get('title') as $message)
									<span style="color:red">{{$message}}</span>
								@endforeach
							@endif
						</div>
						<div class="form-group">
							<label>Post Banner</label>
							<input type="file" name="image" class="form-control"  accept="image/*">
						</div>
						<div class="col-md-12 edit_images_box">
							<div class="container">
								<div class="row">
									<div class="col-sm-2 edit_images">
										<a href="{{route('image.delete',$post->image->id)}}" class="btn del_p_image_btn"><i class="material-icons">clear</i></a>
										<img src="{{url($post->image->url)}}" id="image_preview" width="100%">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Content</label>
							<textarea name="content" class="form-control summernote" required>{!! $post->content !!}</textarea>
							@if($errors->has('content'))
								@foreach($errors->get('content') as $message)
									<span style="color:red">{{$message}}</span>
								@endforeach
							@endif
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success bs_dashboard_btn bs_btn_color btn-lg" style="float: right;">Update</button>
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