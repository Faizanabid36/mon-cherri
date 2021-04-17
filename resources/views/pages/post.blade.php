@extends('layouts.master')
@section('title', 'Blog Post')

@section('content')
  {{ Breadcrumbs::render('post',$post) }}
@endsection