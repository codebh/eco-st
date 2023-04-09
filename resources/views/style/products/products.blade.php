@extends('style.newIndex')
{{--@section('extra-css')--}}
{{--    <link rel="stylesheet" href="{{asset('css/algolia.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('css/card.css')}}">--}}
{{--    <style>--}}

{{--    </style>--}}
{{--@endsection--}}

@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section ">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{trans('user.explore_all')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{'/'}}">{{trans('user.home_page')}}</a></li>/
                            <span class="" >{{trans('user.explore_all')}}</span>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- section start -->

    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                {{-- <form action="{{route('search')}}" method="post"> --}}
                    {{-- {{csrf_field()}} --}}
                    <div class="row">
                        @livewire('style.side-all-product')
                        @livewire('style.all-product')

                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </section>
    <!-- section End -->





@endsection
