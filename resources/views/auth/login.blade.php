@extends('layouts.master')
@section('title', 'Login')
@section('content')
<div class="login">
    <div class="container">
        <div class="header">
            <h2>{{ __('Login') }}</h2>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="login-wrap">
                    <div class="login-content">
                        <h4>{{__('NEW CUSTOMERS')}}</h4>
                        <p>{{__('By creating an account with our store, you will be able to move through
                             the checkout process faster, store multiple shipping addresses,
                              view and track your orders in your account and more')}}.</p>
                    </div>
                    <div class="login-btn">
                        <a href="{{route('register')}}" class="btn rounded">{{__('Create an account')}}</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="login-wrap">
                    <div class="login-text">
                        <h4>{{__('registered customers')}}</h4>
                        <p>{{__('If you have an account with us please log in')}}</p>
                    </div>
                    <div class="login-form">
                        <form method="POST" action="{{ route('login') }}" class="bs_form">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input style="margin: 5px 0 10px 0;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __($message) }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input style="margin: 5px 0 10px 0;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __($message) }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="ps-btn btn btn-primary bs_form_btn rounded mb-2" type="submit">{{ __('Login') }}</button>
                            </div>
                            <div class="links">
                                <ul>
                                @if (Route::has('password.request'))
                                    <li>
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </li>
                                @endif
                                    <li><a href="{{route('register')}}"> {{ __('Create account')}}</a></li>
                                </ul>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
