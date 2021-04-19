@extends('layouts.master')
@section('title', 'Brandzshop - Reset Password')
@section('content')
<div class="forgot">
    <div class="container">
      <div class="header">
        <h2>{{__('Reset Password')}}</h2>
      </div>
    </div>
    <div class="forgot-wrap">
      <div class="forgot-info">
        <div class="text">
          <h4>{{ __('Reset Password') }}</h4>
        </div>
        
          <div class="forgot-form">
            <form method="POST" action="{{ route('password.update') }}" class="bs_form">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label for="email" >{{ __('E-Mail Address') }}</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn">{{ __('Reset Password') }}</button>
                    </div>
            </form>
          </div>
      </div>
    </div>
</div>
@endsection