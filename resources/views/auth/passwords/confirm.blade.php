@extends('layouts.master')
@section('title', ' Confirm Password')
@section('content')
<div class="forgot">
    <div class="container">
      <div class="header">
        <h2>{{__('Confirm Password')}}</h2>
      </div>
    </div>
    <div class="forgot-wrap">
      <div class="forgot-info">
        <div class="text">
          <h4>{{ __('Confirm Password') }}</h4>
          <p>{{ __('Please confirm your password before continuing.') }}.</p>
        </div>

          <div class="forgot-form">
                 <form method="POST" action="{{ route('password.confirm') }}" class="bs_form">
                    @csrf

                    <div class="form-group ">
                        <label for="password">{{ __('Password') }}</label>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <button type="submit" class="btn bs_form_btn">
                            {{ __('Confirm Password') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
          </div>
      </div>
    </div>
</div>
@endsection