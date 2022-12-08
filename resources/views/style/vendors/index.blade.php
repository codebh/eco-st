@extends('style.newIndex')
@section('content')



    <!-- breadcrumb start -->
   <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{ trans('user.shops') }}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">{{ trans('user.home_page') }}</a></li> /
                           <span  aria-current="page">{{ trans('user.shops') }}</span>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
   </div>
    <!-- breadcrumb end -->
    <!-- section start -->
{{--@livewire('style.shops')--}}
<livewire:style.shops/>
    <!-- section End -->





@endsection
