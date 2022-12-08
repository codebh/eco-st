@extends('style.newIndex')

@section('content')


    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{trans('user.collections')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{'/'}}">{{ trans('user.home_page') }}</a></li> /
                            <span  aria-current="page"> {{session('lang')=='ar'?  $item->name_ar:$item->name_en}}</span>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

@livewire('style.collection-product', ['collection_name' => $id])



@endsection
