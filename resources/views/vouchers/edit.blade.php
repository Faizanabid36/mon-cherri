@extends('layouts.app')
@section('title', 'Dashboard - Edit Voucher')
@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Edit Voucher</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Voucher</li>
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
                        <form action="{{ route('voucher.update', $voucher->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Promotion Code</label>
                                        <input type="text" name="promotion_code" value="{{ $voucher->promotion_code }}"
                                            class="form-control @error('promotion_code') is-invalid @enderror"
                                            placeholder="A1" required maxlength="2">
                                        @if ($errors->has('promotion_code'))
                                            @foreach ($errors->get('promotion_code') as $message)
                                                <span style="color:red">{{ $message }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Active</label>
                                        <select class="form-control input-sm @error('status') is-invalid @enderror"
                                            name="status" id="status">
                                            <option value="1" {{ $voucher->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $voucher->status == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            @foreach ($errors->get('status') as $message)
                                                <span style="color:red">{{ $message }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Starting Date</label>
                                        <input type="datetime-local" name="starting_date"
                                            value="{{ \Carbon\Carbon::parse($voucher->starting)->format('Y-m-d\TH:i') }}"
                                            class="form-control @error('starting_date') is-invalid @enderror" required>
                                        @if ($errors->has('starting_date'))
                                            @foreach ($errors->get('starting_date') as $message)
                                                <span style="color:red">{{ $message }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ending Type</label>
                                        <select onchange="changeInput()"
                                            class="form-control input-sm @error('type') is-invalid @enderror" name="type"
                                            id="type" required>
                                            <option disabled selected>Select Status</option>
                                            <option {{ $voucher->type == 'day' ? 'selected' : '' }} value="day">Day</option>
                                            <option {{ $voucher->type == 'date' ? 'selected' : '' }} value="date">Date</option>
                                        </select>
                                        @if ($errors->has('ending_date'))
                                            @foreach ($errors->get('ending_date') as $message)
                                                <span style="color:red">{{ $message }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="insert_date_input">
                                        <label>Ending Date</label>
                                        @if ($voucher->type == 'date')
                                            <input type="datetime-local" name="ending_date" id="ending_date"
                                                value="{{ \Carbon\Carbon::parse($voucher->ending_date)->format('Y-m-d\TH:i') }}"
                                                class="form-control @error('ending_date') is-invalid @enderror" required>
                                            @if ($errors->has('ending_date'))
                                                @foreach ($errors->get('ending_date') as $message)
                                                    <span style="color:red">{{ $message }}</span>
                                                @endforeach
                                            @endif
                                        @else
                                            <input type="text" name="days" value="{{ $voucher->days }}"
                                                class="form-control @error('days') is-invalid @enderror" required>
                                            @if ($errors->has('days'))
                                                @foreach ($errors->get('days') as $message)
                                                    <span style="color:red">{{ $message }}</span>
                                                @endforeach
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Offers</label>
                                        <textarea required name="description" rows="4"
                                            class="form-control @error('description') is-invalid @enderror">{{ $voucher->description }}</textarea>
                                        @if ($errors->has('description'))
                                            @foreach ($errors->get('description') as $message)
                                                <span style="color:red">{{ $message }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Restrictions</label>
                                        <textarea required name="restriction" rows="4"
                                            class="form-control @error('restriction') is-invalid @enderror">{{ $voucher->restriction }}</textarea>
                                        @if ($errors->has('restriction'))
                                            @foreach ($errors->get('restriction') as $message)
                                                <span style="color:red">{{ $message }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success bs_dashboard_btn bs_btn_color btn-lg"
                                    style="float: right;">Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function changeInput() {
            console.log('here');
            if (document.getElementById('ending_date'))
                document.getElementById('ending_date').remove()
            // if (document.getElementById('insert_date_input'))
            //     document.getElementById('insert_date_input').remove()
            const value = document.getElementById("type").value;
            let input = document.createElement("INPUT");
            input.setAttribute('type', value === 'day' ? 'text' : 'datetime-local');
            input.setAttribute('placeholder', value === 'day' ? 'Enter days' : 'Select Date');
            input.setAttribute('class', 'form-control');
            input.setAttribute('required', 'true');
            input.setAttribute('name', value === 'day' ? 'days' : 'ending_date');
            input.setAttribute('id', 'ending_date');
            document.getElementById("insert_date_input").append(input);
        }
    </script>
@endsection
