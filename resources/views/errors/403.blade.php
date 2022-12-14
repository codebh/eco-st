@extends('errors.illustrated-layout')
{{--@extends('errors::minimal')--}}

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
@section('image')
    <img src="{{asset('svg/403.svg')}}" alt="">
@endsection
