@extends('layouts.master')
@section('title', 'Register')
@section('content')
    <div class="register">
        <div class="container">
            <div class="header">
                <h2>{{ __('Create Account') }}</h2>
            </div>
            <div class="col-md-10" style="margin: 0 auto">
                <div class="reg-form">
                    <form method="POST" action="{{ route('customer_store_voucher') }}" class="bs_form">
                        @csrf
                        <div class="personal-info">

                            <div class="title">
                                <h4>{{ __('personal information') }}</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="first_name">{{ __('First name') }}</label>
                                        <input style="margin: 5px 0 10px 0;" id="first_name" type="text"
                                            class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                            value="{{ old('first_name') }}" required autocomplete="first_name">
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_name">{{ __('Last name') }}</label>
                                        <input style="margin: 5px 0 10px 0;" id="last_name" type="text"
                                            class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                            value="{{ old('last_name') }}" required autocomplete="name">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group email">
                                        <label for="email">{{ __('E-Mail Address') }}</label>
                                        <input style="margin: 5px 0 10px 0;" id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="postal_code">{{ __('Zip Code') }}</label>
                                        <input style="margin: 5px 0 10px 0;" id="postal_code" type="text"
                                            class="form-control @error('postal_code') is-invalid @enderror"
                                            name="postal_code" value="{{ old('postal_code') }}" required
                                            autocomplete="name">
                                        @error('postal_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group email">
                                        <label for="email">{{ __('Cell') }}</label>
                                        <input style="margin: 5px 0 10px 0;" id="phone" type="text"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ old('phone') }}" required autocomplete="phone">

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group email">
                                        <label for="email">{{ __('2 Digit Voucher Code') }}</label>
                                        <input style="margin: 5px 0 10px 0;" id="phone" type="text" maxlength="2"
                                            class="form-control @error('voucher_code') is-invalid @enderror"
                                            name="voucher_code" value="{{ old('voucher_code') }}" required
                                            autocomplete="voucher_code">

                                        @error('voucher_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group email">
                                        <label for="email">{{ __('Send by') }}</label>
                                        <select name="send_by" class="form-control" id="send_by">
                                            <option value="" selected>Method</option>
                                            <option value="sms">SMS</option>
                                            <option value="mail">Email</option>
                                        </select>

                                        @error('voucher_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group email">
                                        <label for="email">{{__('Preference') }}</label>
                                        <select name="preference" style="margin: 5px 0 10px 0;" class="form-control">
                                            <option value="email">E-Mail</option>
                                            <option value="cell">Cell</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="login-info">

                            <div class="title">
                                <h4>{{ __('Login information') }}</h4>
                            </div>

                            <div class="bt-link">
                                <div class="form-group">
                                    <button type="submit" class="btn bs_form_btn">{{ __('Register') }}</button>
                                </div>

                                <div class="links">
                                    <a href="{{ route('login') }}" style="font-weight: 700;font-size: 20px;">«
                                        {{ __('Back To Login') }}</a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
