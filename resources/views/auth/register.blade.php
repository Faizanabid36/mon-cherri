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
                <form method="POST" action="{{ route('register') }}" class="bs_form">
                    @csrf
                    <div class="personal-info">

                        <div class="title">
                            <h4>{{__('personal information')}}</h4>
                        </div>
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input style="margin: 5px 0 10px 0;" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group email">
                            <label for="email">{{__('E-Mail Address') }}</label>
                            <input style="margin: 5px 0 10px 0;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                    <div class="login-info">

                        <div class="title">
                            <h4>{{__('Login information')}}</h4>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="password">{{__('Password') }}</label>
                                    <input style="margin: 5px 0 10px 0;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input style="margin: 5px 0 10px 0;" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                </div>
                            </div>
                        </div>

                        <div class="bt-link">
                            <div class="form-group">
                                <button type="submit" class="btn bs_form_btn">{{ __('Register') }}</button>
                            </div>

                            <div class="links">
                                <a href="{{route('login')}}" style="font-weight: 700;font-size: 20px;">« {{__('Back To Login')}}</a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection
