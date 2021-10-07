@extends('layouts.app')
@section('title', 'Dashboard - Policies')
@section('content')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col">
				<h3 class="page-title">Create Policy</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Create Policy</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Policy Details</h4>
				</div>
				<div class="card-body">
					@foreach($errors->all() as $error)
					{{$error}}
					@endforeach
					<form action="{{route('policy.store')}}" method="post" enctype="multipart/form-data">
						@csrf
                        <input type="text" hidden name="id" value="{{$policy->id??0}}">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Policy Name</label>
									<input type="text" name="name" value="{{ $policy->name??''}}" class="form-control @error('name') is-invalid @enderror" required>
									@if($errors->has('name'))
			                            @foreach($errors->get('name') as $message)
			                              <span style="color:red">{{$message}}</span>
			                            @endforeach
			                         @endif
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Days</label>
                                            <input type="text" value="{{ $policy->days??''}}" id="days" name="days" class="form-control product_prices" required>
                                            @if($errors->has('days'))
                                                @foreach($errors->get('days') as $message)
                                                    <span style="color:red">{{$message}}</span>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label>Value</label>
                                            <input type="text" value="{{ $policy->value??''}}" id="value" name="value" class="form-control product_prices" required>
                                            @if($errors->has('value'))
                                                @foreach($errors->get('value') as $message)
                                                    <span style="color:red">{{$message}}</span>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Type</label>
											<select name="type" class="form-control">
                                                <option <?php
                                                if($policy ?? false and $policy->Type=='Return')
                                                {
                                                    echo 'selected';
                                                }
                                                ?> value="Return">Return</option>
                                                <option
                                                <?php
                                                if($policy ?? false and $policy->Type=='Shipping1')
                                                {
                                                    echo 'selected';
                                                }
                                                ?>  value="Shipping1">Shipping Policy 1</option>
												<option
                                                <?php
                                                if($policy ?? false and $policy->Type=='Shipping2')
                                                {
                                                    echo 'selected';
                                                }
                                                ?>  value="Shipping2">Shipping Policy 2</option>
                                            </select>
										</div>
									</div>
								</div>
							</div>
                            <div class="col-md-12">
								<div class="form-group">
									<label>Content</label>
									<textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" id="" cols="30" rows="10">{{$policy->content??''}}</textarea>
									@if($errors->has('content'))
			                            @foreach($errors->get('content') as $message)
			                              <span style="color:red">{{$message}}</span>
			                            @endforeach
			                         @endif
								</div>
							</div>
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-lg btn-success bs_dashboard_btn bs_btn_color">SAVE</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@include('partials.attr_modal')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
        tinymce.init({
            selector: '#content',
            height: 400,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    </script>
@endsection
