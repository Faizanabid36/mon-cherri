@extends('layouts.app')
@section('title', 'Dashboard - Create Voucher')
@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Create Voucher</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Create Voucher</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Voucher Details</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('voucher.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Promotion Code</label>
                                        <input type="text" name="promotion_code" value="{{ old('promotion_code') }}"
                                               class="form-control @error('promotion_code') is-invalid @enderror"
                                               placeholder="A1" required maxlength="2">
                                        @if($errors->has('promotion_code'))
                                            @foreach($errors->get('promotion_code') as $message)
                                                <span style="color:red">{{$message}}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Active</label>
                                        <select class="form-control input-sm @error('status') is-invalid @enderror"
                                                name="status" id="status">
                                            <option value="" disabled selected>Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        @if($errors->has('status'))
                                            @foreach($errors->get('status') as $message)
                                                <span style="color:red">{{$message}}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Starting Date</label>
                                        <input type="datetime-local" name="starting_date"
                                               value="{{ old('starting_date') }}"
                                               class="form-control @error('starting_date') is-invalid @enderror"
                                               required>
                                        @if($errors->has('starting_date'))
                                            @foreach($errors->get('starting_date') as $message)
                                                <span style="color:red">{{$message}}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Ending Date</label>
                                        <input type="datetime-local" name="ending_date" value="{{ old('ending_date') }}"
                                               class="form-control @error('ending_date') is-invalid @enderror" required>
                                        @if($errors->has('ending_date'))
                                            @foreach($errors->get('ending_date') as $message)
                                                <span style="color:red">{{$message}}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea required name="description"
                                                  rows="6"
                                                  class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                        @if($errors->has('description'))
                                            @foreach($errors->get('description') as $message)
                                                <span style="color:red">{{$message}}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success bs_dashboard_btn bs_btn_color btn-lg"
                                        style="float: right;">Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
