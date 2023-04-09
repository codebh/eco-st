@extends('style.newIndex')

@section('content')

    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{session('lang') =='ar'?$category->name_ar:$category->name_en}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('user.home_page')}}</a></li>/

                            <span >{{trans('user.categories')}}</span>

                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>




    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">

            <div class="container">
                <div class="row">
                    @livewire('style.side-category-filter')

                    @livewire('style.product-category-filter',[
                        'category_id'=>$category->id])

                </div>
            </div>
        </div>
    </section>
    <!-- section End -->



@stop
