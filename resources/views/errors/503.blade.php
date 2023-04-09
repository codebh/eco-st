@extends('errors.illustrated-layout')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable'))
@section('image')
    <img src="{{asset('svg/503.svg')}}" alt="">
@endsection
