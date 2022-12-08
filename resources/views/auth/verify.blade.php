@extends('style.newIndex')

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{ trans('user.verify_email') }}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">{{ trans('user.home_page') }}</a></li>/
                            <span>{{ trans('user.verify_email') }}</span>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- section start -->
    <section class="" >
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="error-section">
                        {{-- <h1>Verify Your Email Address</h1> --}}
                        <img src="{{ asset('email/undraw_subscribe_vspl.png') }}" style="height:300px" class=" img-fluid rounded-top rounded-right rounded-bottom rounded-left rounded-circle" alt="">

                        <h4 class="text-justify" style="line-height: revert;">{{ trans('user.verify_parag') }}</h4>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                        <button type="submit" class="btn btn-solid">{{ trans('user.verify_button') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
