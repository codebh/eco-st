@extends('errors.illustrated-layout')
{{--@extends('errors::minimal')--}}

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized'))
@section('image')
    <img src="{{asset('svg/403.svg')}}" alt="">
@endsection
