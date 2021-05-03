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
			<div class="col-md-4">

            <div class="card">
            <div class="card-body">
            <img class="img-responsive" src="{{$image->path}}" alt="image">
           <input type="file" class="btn btn-secondary" >
            <!-- <button class="btn btn-secondary">upload</button> -->
            
            
            </div>
            </div>
            
            
            </div>
            @endforeach
		</div>
	</div>
</div>

@endsection