@extends('layouts.master')
@section('title', 'Verify')
@section('content')
<div class="forgot">
    <div class="container">
      <div class="header">
        <h2>{{ __('Verify') }}</h2>
      </div>
    </div>
    <div class="forgot-wrap">
      <div class="forgot-info">
        <div class="text">
          <h4>{{ __('Verify Your Email Address') }}</h4>
        </div>
          <div class="forgot-form">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
             <form method="POST" action="{{ route('verification.resend') }}" class="bs_form">
                @csrf
                <button type="submit" class="btn bs_form_btn">{{ __('click here to request another') }}</button>.
                <div class="links">
                  <a href="{{route('login')}}">« {{ __('Back To Login Page')}}</a>
              </div>

            </form>
          </div>
      </div>
    </div>
</div>
@endsection