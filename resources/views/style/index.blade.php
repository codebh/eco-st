{{--@include('style.layouts.header')--}}
{{--@include('style.layouts.navbar')--}}
{{--@include('style.layouts.menu')--}}
{{--@include('style.layouts.message')--}}
{{--@yield('content')--}}
{{--@include('style.layouts.footer')--}}
        <!DOCTYPE html>
<html lang="en" class="">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mat</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('design/user/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('design/user/css/mdb.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/design/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

    <!-- Price range icon -->
    <link rel="stylesheet" type="text/css" href="{{url('design')}}/theme/assets/css/price-range.css">
@yield('extra-css')

</head>
{{--#a4b0be--}}

{{--#ff6b81--}}


{{--#f7f1e3--}}

{{--#ff5252--}}

{{--#70a1ff--}}

{{--#dfe4ea--}}


<body>


<!-- Navbar -->
<!-- Navigation -->

<!-- Navigation -->
<header>
    <!-- Navigation -->
    <!-- Sidebar navigation -->
    <ul id="slide-out" class="side-nav custom-scrollbar  bg-white">
        @yield('side-out')

        <!-- Logo -->






    </ul>
    <!-- Sidebar navigation -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar " style="background-color: #ff7675">

        <div class="container">
{{--            @if (Route::currentRouteName()== 'shopProduct.index' or Route::currentRouteName()== 'shopProduct.create')--}}
{{--                <!-- SideNav slide-out button -->--}}
{{--                    <div class="float-left mr-2">--}}
{{--                        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>--}}
{{--                    </div>--}}
{{--        @endif--}}


            <a class="navbar-brand font-weight-bold" href="#"><strong>SHOP</strong></a>

                <button class="navbar-toggler" type="button" class="nav-link waves-effect waves-light" data-toggle="modal"
                   data-target="#cart-modal-ex">
                    @if(Cart::instance('default')->count())
                        <span class="badge danger-color">{{Cart::instance('default')->count()}} </span>
                    @endif
                    <i class="fas fa-cart-plus">

                    </i>
                </button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">



                <span class="navbar-toggler-icon">

                </span>

            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">

                <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                <a class="nav-link waves-effect waves-light  font-weight-bold" href="{{'products'}}">

                <i class="fas fa-shopping-bag"></i> Products</a>

                </li> <li class="nav-item">
                <a class="nav-link waves-effect waves-light  font-weight-bold" href="#">

                <i class="fas fa-store-alt"></i> Sale Products</a>

                </li> <li class="nav-item">
                <a class="nav-link waves-effect waves-light  font-weight-bold" href="#">

                <i class="fas fa-question-circle"></i> About Us</a>

                </li> <li class="nav-item">
                <a class="nav-link waves-effect waves-light  font-weight-bold" href="#">

                <i class="fas fa-address-card"></i> Contact US</a>

                </li>



                </ul>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item waves-effect waves-light  font-weight-bold">
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-search"></i></a>
                    </li>
                <li class="nav-item">
                @if (Route::currentRouteName() !== 'confirmData' )

                <a class="nav-link waves-effect waves-light" data-toggle="modal"
                data-target="#cart-modal-ex">
                @if(Cart::instance('default')->count())
                <span class="badge danger-color">{{Cart::instance('default')->count()}} </span>
                @endif
                <i class="fas fa-cart-plus">

                </i>
                </a>
                    @endif
                </li>

                @guest
                <li class="nav-item waves-effect waves-light  font-weight-bold"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item waves-effect waves-light  font-weight-bold"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else

                <li class="nav-item dropdown ml-3">

                <a class="nav-link dropdown-toggle waves-effect waves-light  font-weight-bold" id="navbarDropdownMenuLink-4"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>
                {{ Auth::user()->name }} </a>

                <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-4">

                <a class="dropdown-item waves-effect waves-light" href="{{route('user.edit')}}">My account</a>

                <a class="dropdown-item waves-effect waves-light" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Log out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                </form>

                </div>

                </li>

                @endguest

                </ul>

            </div>

        </div>

    </nav>





    <div class="modal fade cart-modal" id="cart-modal-ex" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog" role="document">

            <!-- Content -->
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header" style="background-color: #ff7675">

                    <h4 class="modal-title font-weight-bold text-white" id="myModalLabel"><i class="fa fa-cart"></i> Your cart</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span class="text-white" aria-hidden="true">&times;</span>

                    </button>

                </div>

                <!-- Body -->
                <div class="modal-body">
                    @if (Cart::count() > 0)
                    <table class="table table-hover">

                        <thead>

                        <tr>

                            <th>image</th>

                            <th>Product name</th>

                            <th>Price</th>
                            <th>notes</th>

                            <th>Remove</th>

                        </tr>

                        </thead>

                        <tbody>
                        @foreach(Cart::content() as $item)

                        <tr>

                            <th scope="row">
                                @foreach($item->model->image_data()->get() as $image)
                                    @if ($loop->first)
                                        {{--<img src="{{}}" class="img-fluid " alt="smaple image">--}}
                                        <img src="{{asset('storage/product/'.$item->model->id.'/'.$image->image_key)}}" alt=""
                                             class="img-fluid z-depth-0"style="height: 80px; width: 80px">
                                    @endif
                                @endforeach
                            </th>

                            <td>{{$item->model->title}}</td>

                                @if($item->model->price_offer >0 and  $item->model->status == "active")
                            <td>
                                    <span class="badge badge-pill danger-color animated flash infinite slow">{{trans('shop.sale')}}</span>
                                    <br>
                                    <strong>{{presentPrice($item->model->price_offer)}} </strong>
                            </td>
                                @else
                                    <td>

                                    <strong>{{presentPrice($item->model->price)}}</strong>
                                    </td>

                                @endif
                                <td>{{$item->note}}</td>
                            <td>
                                <form action="{{route('ShoppingCart.destroy',$item->rowId)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}

                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top"
                                            title="Remove item"> <i class="fas fa-eraser"></i>

                                    </button>


                                </form>


                            </td>

                        </tr>
                        @endforeach



                        </tbody>

                    </table>

                    <a href="{{route('ShoppingCart.index')}}" class="btn btn-primary btn-rounded btn-sm" >Checkout</a>
                        @else
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>No items in Cart!</strong> <a href="{{'products'}}">click to go to the shop</a>
                        </div>
                        @endif
                </div>

                <!-- Footer -->
                <div class="modal-footer">

                    <button type="button" class="btn blue darken-3 btn-rounded btn-sm" data-dismiss="modal">Close</button>

                </div>

            </div>
            <!-- Content -->

        </div>

    </div>
    <!-- Cart Modal -->

    <!-- Navbar -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">

        <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
        <div class="modal-dialog modal-dialog-centered" role="document">


            <div class="modal-content">
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
                <div class="modal-body">
                    <div class="row">

                        <div class="col-lg-12">
                            <h4 class="text-center">Autocomplete Search Box with <br> Laravel + Ajax + jQuery</h4><hr>
                            <div class="form-group">
                                <label>Type a country name</label>
                                <input type="text" name="country" id="country" placeholder="Enter country name" class="form-control">
                            </div>
                            <div id="country_list" class="list-group"  style="height: 200px; width: auto; overflow: auto;"></div>
                        </div>

                    </div>
                </div>

        </div>
    </div>
</header>
<!-- Navigation -->
<!--Main Layout-->
<div style="background-color: #eee">
    @yield('content')
</div>

<!--  SCRIPTS  -->
<!-- JQuery -->
<script type="text/javascript" src="{{asset('design/user/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{url('/design/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('/design/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
{{--<script src="{{url('/design/admin/bower_components/datatables.net-bs/js/dataTables.buttons.min.js')}}"></script>--}}
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('design/user/js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('design/user/js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('design/user/js/mdb.min.js')}}"></script>

<script type="text/javascript" src="{{asset('design/style/js/addons-pro/stepper.js')}}"></script>
<!-- Stepper JavaScript - minified -->
<script type="text/javascript" src="{{asset('design/style/js/addons-pro/stepper.min.js')}}"></script>
{{--<script>--}}

<script type="text/javascript">
    // SideNav Initialization
    $(".button-collapse").sideNav();
    // Material Select Initialization
    $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });
    $('.toast').toast('show');
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@yield('extra-js')
{{--</script>--}}
@stack('js')
</body>

</html>
