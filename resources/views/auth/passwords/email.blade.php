@extends('style.newIndex')

@section('content')


    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{ trans('user.forget_your_password') }}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{trans('user.home_page')}}</a></li>/
                            {{-- <li class="breadcrumb-item"><a href="login.html">{{trans('user.login')}}</a></li> --}}
                            <span  aria-current="page">{{trans('user.forget_your_password')}}</span>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="pwd-page section-b-space">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6 m-auto">
                    {{-- <h2>{{trans('user.forget_your_password')}}</h2> --}}
                    <form method="POST" action="{{ route('password.email') }}" class="theme-form">
                        @csrf
                        <div class="form-row row">
                            <div class="col-md-12">
                                <label for="">{{trans('user.email')}}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <label for="">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </label>

                                @enderror
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-solid">
                                        {{trans('user.send_link_password')}}
                                    </button>
                                </div>
                            </div>




                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->




@endsection
