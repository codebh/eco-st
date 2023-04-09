@extends('errors.illustrated-layout')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))
@section('image')
    <img src="{{asset('svg/undraw_page_not_found_su7k (2).svg')}}" alt="">
@endsection
