@extends('style.newIndex')
@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{ trans('user.faqs') }}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item ml-3"><a href="{{'/'}}">{{trans('user.home_page')}}</a></li> /
                            <span style="margin-right: 3px;" >{{trans('user.faqs')}}</span>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!--section start-->
    <section class="faq-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="accordion theme-accordion" id="accordionExample">
                        @forelse (\App\Models\Faq::where('lang',session('lang') =='ar'?'ar':'en') ->orderBy('serial', 'asc')->get()  as $user)
{{--
                     @if ($loop->first)
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0"><button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$user->id}}" aria-expanded="true" aria-controls="collapseOne">
                                            {{$user->question}}</button></h5>
                                    </div>
                                    <div id="collapseOne{{$user->id}}" class="collapse show" aria-labelledby="headingOne"
                                         data-bs-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>{!! $user->answer !!}</p>
                                        </div>
                                    </div>
                                </div>
                     @endif --}}

                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0"><button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo{{$user->id}}" aria-expanded="false" aria-controls="collapseTwo">
                                        {{$user->question}}</button></h5>
                                </div>
                                <div id="collapseTwo{{$user->id}}" class="collapse" aria-labelledby="headingTwo"
                                     data-bs-parent="#accordionExample">
                                    <div class="card-body">
                                    <p> {{$user->answer }}</p>
                                    </div>
                                </div>
                            </div>


                        @empty

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0"><button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

                                        How can I upgrade from Shopify 2.5 to shopify 3?</button></h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                 data-bs-parent="#accordionExample">
                                <div class="card-body">
                                    <p>it look like readable English. Many desktop publishing packages and web page
                                        editors now use Lorem Ipsum as their default model text, and a search for 'lorem
                                        ipsum' will uncover many web sites still in their infancy. Various versions have
                                        evolved over the years,All the Lorem Ipsum generators on the Internet tend to
                                        repeat predefined chunks as necessary, making this the first true generator on
                                        the Internet. It uses a dictionary of over 200 Latin words, combined with a
                                        handful of model sentence structures</p>
                                </div>
                            </div>
                        </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection
