@extends('style.newIndex')
@section('content')
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{trans('user.shop_profile')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                            @if (session('lang') == 'ar')
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">{{trans('user.home_page')}}</a></li>/
                                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('shops') }}">{{trans('user.shops')}}</a></li>
                                <span class="active" aria-current="page">{{$store->name}}</span>
                            </ol>
                            @else
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">{{trans('user.home_page')}}</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('shops') }}">{{trans('user.shops')}}</a></li>/
                                <span class="active" aria-current="page">{{$store->name}}</span>
                            </ol>
                            @endif


                    </nav>
                </div>
            </div>
        </div>
    </div>


    <br>
    <br>
    <br>
    <br>
    <br>

@livewire('style.shops-details',['store' => $store])




@endsection
