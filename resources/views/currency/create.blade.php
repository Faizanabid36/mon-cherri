@extends('layouts.app')
@section('title', 'Dashboard - Create Currency')
@section('content')
<div class="content container-fluid">
	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Create Currency</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Create Currency</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Currency Details</h4>
				</div>
				<div class="card-body">
					<form action="{{route('currencies.store')}}" method="post">
						@csrf
						<div class="row">
							<div class="col-lg-4 col-xl-4 col-12">
								<div class="form-group">
									<label>Currency Name</label>
									<input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="eg: USD Dollar" required>
									@if($errors->has('name'))
										@foreach($errors->get('name') as $message)
											<span style="color:red">{{$message}}</span>
										@endforeach
									@endif
								</div>
							</div>
							<div class="col-lg-4 col-xl-4 col-12">
								<div class="form-group">
									<label>Currency Code</label>
									<input type="text" name="code" value="{{ old('code') }}" class="form-control @error('code') is-invalid @enderror" placeholder="eg: USD" required>
									@if($errors->has('code'))
										@foreach($errors->get('code') as $message)
											<span style="color:red">{{$message}}</span>
										@endforeach
									@endif
								</div>
							</div>
							<div class="col-lg-4 col-xl-4 col-12">
								<div class="form-group">
									<label>Currency Symbol</label>
									<input type="text" name="symbol" value="{{ old('symbol') }}" class="form-control @error('symbol') is-invalid @enderror" placeholder="eg: $" required>
									@if($errors->has('symbol'))
										@foreach($errors->get('symbol') as $message)
											<span style="color:red">{{$message}}</span>
										@endforeach
									@endif
								</div>
							</div>
							<div class="col-lg-4 col-xl-4 col-12">
								<div class="form-group">
									<label>Currency Format</label>
									<input type="text" name="format" value="{{ old('format') }}" class="form-control @error('format') is-invalid @enderror" placeholder="$1,0.00" required>
									@if($errors->has('format'))
										@foreach($errors->get('format') as $message)
											<span style="color:red">{{$message}}</span>
										@endforeach
									@endif
								</div>
							</div>
							<div class="col-lg-4 col-xl-4 col-12">
								<div class="form-group">
									<label>Exchange Rate (on USD Dollar)</label>
									<input type="text" name="exchange_rate" value="{{ old('exchange_rate') }}" class="form-control @error('exchange_rate') is-invalid @enderror" placeholder="eg: 72.5143" required>
									@if($errors->has('exchange_rate'))
										@foreach($errors->get('exchange_rate') as $message)
											<span style="color:red">{{$message}}</span>
										@endforeach
									@endif
								</div>
							</div>
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