@extends(' style.newIndex')
@section('content')






    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{trans('user.profile')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('user.home_page')}}</a></li>/
                            <span class="" aria-current="page">{{trans('user.profile')}}</span>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--  dashboard section start -->
    <section class="dashboard-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="dashboard-sidebar">
                        <div class="profile-top">
                            <div class="profile-image">
                                <img src="../assets/images/logos/17.png" alt="" class="img-fluid">
                            </div>
                            <div class="profile-detail">
                                <h5>{{auth()->user()->name}}</h5>
                                {{-- <h6>{{auth()->user()->email}}</h6> --}}

                            </div>
                        </div>
                        <div class="faq-tab">
                            <ul class="nav nav-tabs" id="top-tab" role="tablist">

                                <li class="nav-item"><a data-bs-toggle="tab" class="nav-link active"
                                                        href="#dashboard">{{trans('user.orders')}}</a></li>

                                <li class="nav-item"><a data-bs-toggle="tab" class="nav-link "
                                                        href="#profile">{{trans('user.profile')}}</a>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="faq-content tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="dashboard">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card dashboard-table mt-0">
                                        <div class="card-body table-responsive-sm">

                                            <table class="table mb-0">
                                                <thead>
                                                <tr>
                                                    <th scope="col">{{trans('user.order_number')}}</th>
                                                    <th scope="col">{{trans('user.order_date')}}</th>
                                                    <th scope="col">{{trans('user.total')}}</th>
                                                    <th scope="col">{{trans('user.details')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($orders as $order)
                                                    <tr>
                                                        <th scope="row">#{{$order->id}}</th>
                                                        <td>{{$order->created_at->format('Y-m-d')}}</td>
                                                        <td>{{presentPrice($order->billing_total)}}</td>



                                                        <td class="text-center">
                                                            <a class="btn btn-solid btn-rounded btn-block "
                                                               href="{{route('user.show',Crypt::encrypt($order->id))}}">{{trans('user.more_details')}}</a>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <th scope="row" colspan="5">{{trans('user.no_order')}}</th>

                                                    </tr>

                                                @endforelse
<tr>
    {{$orders->links()}}
</tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="profile">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="dashboard-box">
                                                {{-- <div class="dashboard-title">
                                                    <h4>{{trans('user.profile')}}</h4>
                                                </div> --}}
                                                <div class="dashboard-detail">

                                                    <section class="contact-page register-page">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <h3>{{trans('user.profile')}}</h3>
                                                                    <form class="theme-form" method="POST" action="{{ route('user.change.password') }}" >
                                                                        @csrf

                                                                        @foreach ($errors->all() as $error)
                                                                           <p class="text-danger">{{ $error }}</p>
                                                                        @endforeach

                                                                        <div class="form-row row">
                                                                            <div class="col-md-6">
                                                                                <label for="name">{{trans('user.name')}}</label>
                                                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your name" value="{{auth()->user()->name}}"
                                                                                       required="">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="email">{{trans('user.email')}}</label>
                                                                                <input type="text" class="form-control" id="email" placeholder="Email"  value="{{auth()->user()->email}}" disabled>
                                                                            </div>
                                                                            {{-- <div class="col-md-6">
                                                                                <label for="review">{{trans('user.phone')}}</label>
                                                                                <input type="text" class="form-control" id="review" placeholder="Enter your number" value="{{auth()->user()->phone}}">
                                                                            </div> --}}


                                                                            <div class="form-row row">
                                                                                <div class="col-md-6">
                                                                                    <label for="review">{{trans('user.password')}}</label>
                                                                                    {{-- <input type="text" class="form-control" id="review" placeholder="Enter your password" > --}}
                                                                                    <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">

                                                                                </div>

                                                                                <div class="col-md-6">
                                                                                    <label for="review">{{trans('user.confirm_password')}}</label>
                                                                                    {{-- <input type="text" class="form-control" id="review" placeholder="Enter your password" > --}}
                                                                                    <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <button class="btn btn-sm btn-solid" type="submit">
                                                                                    {{trans('user.save')}} </button>

                                                                            </div>



                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <!-- Section ends -->


                                                    <!-- address section start -->
                                                    {{-- <section class="contact-page register-page section-b-space">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <h3>{{trans('user.shopping_information')}}</h3>
                                                                    <form action="{{route('address.update')}}" method="post" class="theme-form" >
                                                                        {{csrf_field()}}
                                                                        <input type="text" name="user_id" value="{{auth()->user()->id}}" hidden>
                                                                        <div class="form-row row">
                                                                            <div class="col-md-6">
                                                                                <label for="name">{{trans('user.address')}} *</label>
                                                                                <input type="text" name="address1" class="form-control" id="address-two" value="{{old('address')}}"
                                                                                       required=""> --}}
{{--                                                                                {{session('lang')== 'ar'?$category->name_ar:$category->name_en}}--}}
                                                                            {{-- </div>
                                                                            <div class="col-md-6">
                                                                                <label for="name">Address 2</label>
                                                                                <input type="text" name="address2" class="form-control" id="home-ploat" value="{{old('address 2')}}" placeholder="address 2 optional">
                                                                            </div>

                                                                            <div class="col-md-6 select_input">
                                                                                <label for="review">{{trans('user.country')}} *</label>
                                                                                <select class="form-control" name="country"  size="1">
                                                                                    <option value="Bahrain">Bahrain</option>
                                                                                    <option value="UAE">UAE</option>
                                                                                    <option value="U.K">U.K</option>
                                                                                    <option value="US">US</option>

{{--                                                                                    <option value="{{ $key }}" {{ (Input::old("country") == $key ? "selected":"") }}>{{ $val }}</option>--}}
{{--
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="review">{{trans('user.city')}} *</label>
                                                                                <input type="text" name="city" value="{{old('city')}}" class="form-control" id="city" placeholder="City" required="">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="review">Region/State *</label>
                                                                                <input type="text" name="state" value="{{old('state')}}" class="form-control" id="region-state" placeholder="Region/state"
                                                                                       required="">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="email">Zip Code *</label>
                                                                                <input type="text" name="zip" value="{{old('zip')}}" class="form-control" id="zip-code" placeholder="zip-code"
                                                                                       required="">
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <button class="btn btn-sm btn-solid" type="submit">{{trans('user.save')}}</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>  --}}
                                                    <!-- Section ends -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  dashboard section end -->
{{--

    <!-- Modal start -->
    <div class="modal logout-modal fade" id="logout" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logging Out</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Do you want to log out?
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-dark btn-custom" data-bs-dismiss="modal">no</a>
                    <a href="index.html" class="btn btn-solid btn-custom">yes</a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- modal end -->




@endsection
@push('js')

@endpush
