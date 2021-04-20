@extends('layouts.master')
@section('title', 'Reset Password')
@section('content')
    <div class="forgot">
        <div class="container">
            <div class="header">
                <h2>{{__('forgot your password')}}</h2>
            </div>
        </div>
        <div class="forgot-wrap">
            <div class="forgot-info">
                <div class="text">
                    <h4>{{__('retrieve your password here')}}</h4>
                    <p>{{__('Please enter your email address below. You will receive a link to reset your password')}}
                        .</p>
                </div>

                <div class="forgot-form">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}" class="bs_form">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn rounded">{{ __('Send Password Reset Link') }}</button>
                        </div>

                        <div class="links">
                            <a href="{{route('login')}}"
                               style="font-weight: 700;font-size: 20px;">« {{ __('Back To Login Page')}}</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
