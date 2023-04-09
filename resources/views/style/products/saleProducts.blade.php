@extends('style.newIndex')

@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{trans('user.sell_products')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('user.home_page')}}</a></li> /
                            <span class="">{{trans('user.sell_products')}}</span>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    @livewire('style.sale-products')




@stop
