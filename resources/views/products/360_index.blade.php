@extends('layouts.app')
@section('title', 'Dashboard - Products')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Products</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Products</li>
				</ul>
			</div>
			
		</div>
	</div>
	<!-- /Page Header -->
	
	<div class="row">
		<div class="col-sm-12">
        @foreach($images as $image)
		<form action="{{route('update_360_image',$image->id)}}" method="post"  enctype="multipart/form-data">
	@csrf
			<div class="col-md-4">

            <div class="card">
            <div class="card-body">
            <img class="img-responsive" src="{{$image->path}}"  alt="image"  width="200" height="100">
           <input type="file" class="btn btn-secondary"  name="path">
            <!-- <button class="btn btn-secondary">upload</button> -->
            
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
            </div>
            
            
            </div>
			
			</form>
            @endforeach
		</div>
	</div>
</div>



@endsection