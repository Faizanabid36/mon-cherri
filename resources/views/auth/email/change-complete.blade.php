@extends('layouts.master')
@section('title', 'Brandzshop')
@section('content')
<div class="ps-blog-grid pt-80 pb-80 with-no-sidebar">
    <div class="ps-container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-lg-offset-3 col-sm-12 col-xs-12">
                <div class="ps-post--detail">
                    <div class="ps-post__content">
                    <h1 class="ps-section__title">-{{ __('Your Email Has been changed') }}</h1> 
                    <a href="{{url('/dashboard')}}" class="ps-btn btn btn-primary" style="float: right;">Continue</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection