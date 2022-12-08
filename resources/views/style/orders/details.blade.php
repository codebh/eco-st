@extends('style.newIndex')
@section('content')


    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{trans('user.order_details')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('user.home_page')}}</a></li>/
                            <span aria-current="page">{{trans('user.order_details')}}</span>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- tracking page start -->
    <section class="tracking-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>{{trans('user.more_details_order')}} {{$order->id}}</h3>
                    <div class="row border-part">

                        <div class="col-xl-4 col-lg-5 col-sm-8">
                            <div class="tracking-detail">
                                <ul>
                                    <li>
                                        <div class="left">
                                            <span>{{trans('user.order_name')}}</span>
                                        </div>
                                        <div class="right">
                                            <span>{{$order->billing_name}}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left">
                                            <span>{{trans('user.phone')}}</span>
                                        </div>
                                        <div class="right">
                                            <span>{{$order->billing_phone}}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left">
                                            <span>{{trans('user.order_date')}}</span>
                                        </div>
                                        <div class="right">
                                            <span>{{$order->created_at->format('y-m-d')}}</span>
                                        </div>
                                    </li>
@if ($order->billing_country == 'bahrain')
<li>
    <div class="left">
        <span>{{trans('user.address')}}</span>
    </div>
    <div class="right">
        <span>{{$order->billing_country}}<br>{{$order->billing_city}}<br>{{ trans('user.buliding') }} {{$order->billing_buliding}} <br> {{ trans('user.road') }}{{$order->billing_road}}<br>{{ trans('user.block') }}{{$order->billing_block}}
            <br>
        {{$order->billing_speical_direcstions}}
        </span>
    </div>
</li>

@else
<li>
    <div class="left">
        <span>{{trans('user.address')}}</span>
    </div>
    <div class="right">
        <span>{{$order->billing_country}}<br>{{$order->billing_city}} <br> {{$order->billing_address}}<br> , {{$order->billing_province}}<br>{{$order->billing_postalcode}}</span>
    </div>
</li>

@endif



                                    <li>
                                        <div class="left">
                                            <span>{{trans('user.subtotal')}}</span>
                                        </div>
                                        <div class="right">
                                            <span>{{presentPrice($order->billing_subtotal)}}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left">
                                            <span>{{trans('user.delivery')}}</span>
                                        </div>
                                        <div class="right">
                                            <span>{{presentPrice($order->billing_delivery)}}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left">
                                            <span>{{trans('user.total')}}</span>
                                        </div>
                                        <div class="right">
                                            <span>{{presentPrice($order->billing_total)}}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left">
                                            <span>{{trans('user.invoice')}}</span>
                                        </div>
                                        <div class="right">
                                            <span>
                                                    <a class="btn btn-solid btn-rounded  "
                                                       href="{{route('user.pdf',Crypt::encrypt($order->id))}}">{{trans('user.download')}}</a>
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <br>

            <div class="row">

                <div class="collection-filter-block bg-white">

                    @forelse (\App\Models\OrderProduct::where('order_id', $order->id)->where('user_id', auth()->user()->id)->get() as $item)

                        <div class="collection-collapse-block open ">

                            <h3 class="collapse-block-title">{{$item->product->title}}</h3>
                            <div class="collection-collapse-block-content">

                                <div class="row">
                                    <div class="col-xl-2 col-md-3 col-sm-4">
                                        <div class="product-detail">
                                             <img src="{{imageDo($item->product->main_image)}}" class="img-fluid blur-up lazyload" alt="">
                                         </div>
                                    </div>

                                    <div class="col">
                                        <div class="tracking-detail">
                                            <ul>
                                                <li>
                                                    <div class="left">
                                                        <span>{{trans('user.order_name')}}</span>
                                                    </div>
                                                    <div class="right">
                                                        <span>{{$item->product->title}}</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="left">
                                                        <span>{{trans('user.shop_name')}}</span>
                                                    </div>
                                                    <div class="right">
                                                        <span>{{$item->store->name}}</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="left">
                                                        <span>{{trans('user.price')}}</span>
                                                    </div>
                                                    <div class="right">
                                                        <span>{{presentPrice($item->price)}}</span>
                                                    </div>
                                                </li>
                                                @if($item->shipped !==0)
                                                <li>
                                                    <div class="left">
                                                        <span>{{trans('user.est_date')}}</span>
                                                    </div>
                                                    <div class="right">
                                                        <span>{{$item->est_date}}</span>
                                                    </div>
                                                </li>
                                                @endif

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="wrapper">
                                            <div class="arrow-steps clearfix">
                                                @if ($item->shipped ==0)
                                                    <div class="step current"><span> {{trans('user.orderStep')}}</span></div>

                                                    <div class="step "><span>{{trans('user.orderStep1')}}</span></div>

                                                    <div class="step"><span> {{trans('user.orderStep2')}}</span></div>

                                                    <div class="step"><span>{{trans('user.orderStep3')}}</span></div>
                                                @elseif($item->shipped ==1)
                                                    <div class="step done"><span> {{trans('user.orderStep')}}</span></div>

                                                    <div class="step current"><span>{{trans('user.orderStep1')}}</span></div>

                                                    <div class="step "><span> {{trans('user.orderStep2')}}</span></div>

                                                    <div class="step"><span>{{trans('user.orderStep3')}}</span></div>
                                                @elseif($item->shipped ==2)
                                                <div class="step done"><span> {{trans('user.orderStep')}}</span></div>

                                                <div class="step current"><span>{{trans('user.orderStep1')}}</span></div>

                                                <div class="step "><span> {{trans('user.orderStep2')}}</span></div>

                                                <div class="step"><span>{{trans('user.orderStep3')}}</span></div>
                                                @elseif($item->shipped ==3)
                                                    <div class="step done"><span> {{trans('user.orderStep')}}</span></div>

                                                    <div class="step done"><span>{{trans('user.orderStep1')}}</span></div>

                                                    <div class="step current"><span> {{trans('user.orderStep2')}}</span></div>

                                                    <div class="step "><span>{{trans('user.orderStep3')}}</span></div>
                                                    @elseif($item->shipped ==4)
                                                    <div class="step done"><span> {{trans('user.orderStep')}}</span></div>

                                                    <div class="step done"><span>{{trans('user.orderStep1')}}</span></div>

                                                    <div class="step current"><span> {{trans('user.orderStep2')}}</span></div>

                                                    <div class="step "><span>{{trans('user.orderStep3')}}</span></div>



                                                    @elseif($item->shipped ==5)
                                                    <div class="step done"><span> {{trans('user.orderStep')}}</span></div>

                                                    <div class="step done"><span>{{trans('user.orderStep1')}}</span></div>

                                                    <div class="step done"><span> {{trans('user.orderStep2')}}</span></div>

                                                    <div class="step current"><span>{{trans('user.orderStep3')}}</span></div>

                                                    @elseif($item->shipped ==7)

                                                    <div class="step current"><span>{{trans('user.orderStep7')}}</span></div>





                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr>
                    @empty
                        <h2>no items</h2>
                    @endforelse

                </div>

            </div>
        </div>
    </section>
    <!-- tracking page end -->













    {{--    <style>--}}
    {{--        /* Steps */--}}
    {{--        .step {--}}
    {{--            list-style: none;--}}
    {{--            margin: 0;--}}
    {{--        }--}}

    {{--        .step-element {--}}
    {{--            display: flex;--}}
    {{--            padding: 1rem 0;--}}
    {{--        }--}}

    {{--        .step-number {--}}
    {{--            position: relative;--}}
    {{--            width: 7rem;--}}
    {{--            flex-shrink: 0;--}}
    {{--            text-align: center;--}}
    {{--        }--}}

    {{--        .step-number .number {--}}
    {{--            color: green;--}}
    {{--            background-color: red;--}}
    {{--            font-size: 1.5rem;--}}
    {{--        }--}}

    {{--        .step-number .number {--}}
    {{--            width: 48px;--}}
    {{--            height: 48px;--}}
    {{--            line-height: 48px;--}}
    {{--        }--}}

    {{--        .number {--}}
    {{--            display: inline-flex;--}}
    {{--            justify-content: center;--}}
    {{--            align-items: center;--}}
    {{--            width: 38px;--}}
    {{--            border-radius: 10rem;--}}
    {{--        }--}}

    {{--        .step-number::before {--}}
    {{--            content: '';--}}
    {{--            position: absolute;--}}
    {{--            left: 50%;--}}
    {{--            top: 48px;--}}
    {{--            bottom: -2rem;--}}
    {{--            margin-left: -1px;--}}
    {{--            border-left: 2px dashed black;--}}
    {{--        }--}}

    {{--        .step .step-element:last-child .step-number::before {--}}
    {{--            bottom: 1rem;--}}
    {{--        }--}}
    {{--    </style>--}}

    {{--    <br><br><br>--}}
    {{--    <br><br><br>--}}
    {{--    <div class="container">--}}

    {{--        <div class="card">--}}
    {{--            <div class="card-body">--}}
    {{--                <!-- Header -->--}}
    {{--                <div class="form-header white accent-1 text-dark">--}}
    {{--                    <h3 class="mt-2"><i class="fas fa-shopping-basket"></i> ORDER DETAILS</h3>--}}
    {{--                </div>--}}

    {{--                <!--Section: Content-->--}}
    {{--                <section class="dark-grey-text text-center mb-5">--}}



    {{--                <!-- Table -->--}}
    {{--                    <div class="card">--}}
    {{--                        <div class="card-body">--}}
    {{--                            {{$orders->order->id}}--}}
    {{--                            @foreach($orders as $order)--}}
    {{--                                @if($loop->first)--}}
    {{--                                    <table class="table table-responsive-md  mb-0">--}}
    {{--                                        <thead>--}}
    {{--                                        <tr>--}}
    {{--                                            <th>--}}
    {{--                                                <strong>Pdf :</strong>--}}
    {{--                                            </th>--}}
    {{--                                            <th>--}}
    {{--                                                <a class="btn btn-primary btn-rounded btn-block " href="{{route('user.pdf',$order->order_id)}}">More Details</a>--}}

    {{--                                            </th>--}}

    {{--                                        </tr>--}}
    {{--                                        <tr>--}}
    {{--                                            <th>--}}
    {{--                                                <strong>Order ID:</strong>--}}
    {{--                                            </th>--}}
    {{--                                            <th>--}}
    {{--                                                {{$order->order_id}}--}}
    {{--                                            </th>--}}

    {{--                                        </tr>--}}
    {{--                                        </thead>--}}
    {{--                                        <tbody>--}}

    {{--                                        <tr>--}}
    {{--                                            <th scope="row"><strong>Order Date:</strong></th>--}}
    {{--                                            <td>{{$order->created_at->format('y-m-d')}}</td>--}}

    {{--                                        </tr>--}}

    {{--                                        <tr>--}}

    {{--                                            <th scope="row"><strong>Payment Method:</strong></th>--}}
    {{--                                            <td> Debit Card</td>--}}

    {{--                                        </tr>--}}
    {{--                                        <tr>--}}

    {{--                                            <th scope="row"><strong>Shipment Method:</strong></th>--}}
    {{--                                            <td>Free Shipping</td>--}}

    {{--                                        </tr>--}}
    {{--                                        <tr>--}}
    {{--                                            <th scope="row"><strong>Email:</strong></th>--}}
    {{--                                            <td>{{$order->order->billing_email}}</td>--}}

    {{--                                        </tr>--}}
    {{--                                        <tr>--}}
    {{--                                            <th scope="row"><strong>Name:</strong></th>--}}
    {{--                                            <td>{{$order->order->billing_name}}</td>--}}

    {{--                                        </tr>--}}
    {{--                                        <tr>--}}
    {{--                                            <th scope="row"><strong>phone:</strong></th>--}}
    {{--                                            <td>{{$order->order->billing_phone}}</td>--}}

    {{--                                        </tr>--}}
    {{--                                        <tr>--}}
    {{--                                            <th scope="row"><strong>Address:</strong></th>--}}
    {{--                                            <td>{{$order->order->billing_address}}</td>--}}

    {{--                                        </tr>--}}
    {{--                                        <tr>--}}
    {{--                                            <th scope="row"><strong>Sub Total:</strong></th>--}}
    {{--                                            <td>{{presentPrice($order->order->billing_subtotal)}}</td>--}}

    {{--                                        </tr>--}}

    {{--                                        <tr>--}}
    {{--                                            <th scope="row"><strong>Delivery:</strong></th>--}}
    {{--                                            <td>{{presentPrice($order->order->billing_delivery)}}</td>--}}

    {{--                                        </tr>--}}
    {{--                                        <tr>--}}
    {{--                                            <th scope="row"><strong>Total:</strong></th>--}}
    {{--                                            <td>{{presentPrice($order->order->billing_total)}}</td>--}}

    {{--                                        </tr>--}}

    {{--                                        </tbody>--}}
    {{--                                    </table>--}}
    {{--                                @endif--}}
    {{--                            @endforeach--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <!-- Table -->--}}

    {{--                </section>--}}
    {{--                <!--Section: Content-->--}}
    {{--                <!--Accordion wrapper-->--}}
    {{--                <div class="accordion md-accordion accordion-3 z-depth-1-half" id="accordionEx194" role="tablist"--}}
    {{--                     aria-multiselectable="true">--}}
    {{--                @foreach($orders as $order)--}}

    {{--                    <!-- Accordion card -->--}}
    {{--                        <div class="card">--}}

    {{--                            <!-- Card header -->--}}
    {{--                            <div class="card-header grey darken-1" role="tab" id="heading4{{$order->id}}">--}}
    {{--                                <a data-toggle="collapse" data-parent="#accordionEx194"--}}
    {{--                                   href="#collapse4{{$order->id}}" aria-expanded="true"--}}
    {{--                                   aria-controls="collapse4{{$order->id}}">--}}
    {{--                                    <h3 class="font-weight-bold text-center text-white pb-2"> {{$order->product->title}}--}}
    {{--                                        <i class="fas fa-angle-down rotate-icon fa-2x"></i></h3>--}}
    {{--                                    --}}{{----}}{{--<h3 class="mb-0 mt-3 black-text text-center">--}}
    {{--                                    --}}{{----}}{{----}}
    {{--                                    --}}{{----}}{{--</h3>--}}
    {{--                                </a>--}}
    {{--                            </div>--}}

    {{--                            <!-- Card body -->--}}
    {{--                            <div id="collapse4{{$order->id}}" class="collapse show" role="tabpanel"--}}
    {{--                                 aria-labelledby="heading4{{$order->id}}"--}}
    {{--                                 data-parent="#accordionEx194">--}}
    {{--                                <div class="card-body ">--}}
    {{--                                    <!-- Section -->--}}
    {{--                                    <section>--}}

    {{--                                        <style>--}}
    {{--                                            .fa-play:before {--}}
    {{--                                                margin-left: .3rem;--}}
    {{--                                            }--}}

    {{--                                            /* Steps */--}}
    {{--                                            .step {--}}
    {{--                                                list-style: none;--}}
    {{--                                                margin: 0;--}}
    {{--                                            }--}}

    {{--                                            .step-element {--}}
    {{--                                                display: flex;--}}
    {{--                                                padding: 1rem 0;--}}
    {{--                                            }--}}

    {{--                                            .step-number {--}}
    {{--                                                position: relative;--}}
    {{--                                                width: 7rem;--}}
    {{--                                                flex-shrink: 0;--}}
    {{--                                                text-align: center;--}}
    {{--                                            }--}}

    {{--                                            .step-number .number {--}}
    {{--                                                color: #bfc5ca;--}}
    {{--                                                background-color: #eaeff4;--}}
    {{--                                                font-size: 1.5rem;--}}
    {{--                                            }--}}

    {{--                                            .step-number .number {--}}
    {{--                                                width: 48px;--}}
    {{--                                                height: 48px;--}}
    {{--                                                line-height: 48px;--}}
    {{--                                            }--}}

    {{--                                            .number {--}}
    {{--                                                display: inline-flex;--}}
    {{--                                                justify-content: center;--}}
    {{--                                                align-items: center;--}}
    {{--                                                width: 38px;--}}
    {{--                                                border-radius: 10rem;--}}
    {{--                                            }--}}

    {{--                                            .step-number::before {--}}
    {{--                                                content: '';--}}
    {{--                                                position: absolute;--}}
    {{--                                                left: 50%;--}}
    {{--                                                top: 48px;--}}
    {{--                                                bottom: -2rem;--}}
    {{--                                                margin-left: -1px;--}}
    {{--                                                border-left: 2px dashed #eaeff4;--}}
    {{--                                            }--}}

    {{--                                            .step .step-element:last-child .step-number::before {--}}
    {{--                                                bottom: 1rem;--}}
    {{--                                            }--}}
    {{--                                        </style>--}}


    {{--                                        --}}{{----}}{{--<h3 class="font-weight-bold text-center dark-grey-text pb-2">Three Easy Steps</h3>--}}
    {{--                                        <hr class="w-header my-4">--}}
    {{--                                        <p class="lead text-center text-muted pt-2 mb-5">{{$order->product->content}}</p>--}}

    {{--                                        <div class="row align-items-center">--}}

    {{--                                            <div class="col-md-3 mb-4">--}}
    {{--                                                --}}{{----}}{{--<div class="view z-depth-1-half rounded">--}}
    {{--                                                @foreach($order->product->image_data()->get() as $image)--}}

    {{--                                                    @if ($loop->first)--}}


    {{--                                                        <img class="rounded img-fluid "--}}
    {{--                                                             src="{{asset('storage/product/'.$order->product_id.'/'.$image->image_key)}}"--}}
    {{--                                                             style="height: 350px" alt="Video title">--}}
    {{--                                                    @endif--}}

    {{--                                                @endforeach--}}

    {{--                                                --}}{{----}}{{--</div>--}}
    {{--                                            </div>--}}
    {{--                                            <div class="col-md-3 mb-4">--}}
    {{--                                                <table class="table  ">--}}
    {{--                                                    <thead>--}}
    {{--                                                    <tr>--}}
    {{--                                                        <th class="text-center">--}}
    {{--                                                            <strong>Price:</strong>{{presentPrice($order->price)}}--}}
    {{--                                                        </th>--}}
    {{--                                                    </tr>--}}
    {{--                                                    </thead>--}}
    {{--                                                    <tbody>--}}
    {{--                                                    <tr>--}}
    {{--                                                        <th class="text-center" scope="row"><strong>ESt--}}
    {{--                                                                Date:</strong>{{$order->est_date}}</th>--}}

    {{--                                                    </tr>--}}
    {{--                                                    <tr>--}}
    {{--                                                        <th class="text-center" scope="row"><strong>Order--}}
    {{--                                                                Status:</strong>--}}
    {{--                                                            @if ($order->shipped == 0)--}}

    {{--                                                                <div class="badge badge-danger">--}}
    {{--                                                                    <h5><i class="fa fa-calendar-plus"></i>--}}
    {{--                                                                        {{trans('shop.orderStep')}}--}}
    {{--                                                                    </h5>--}}
    {{--                                                                </div>--}}



    {{--                                                            @elseif($order->shipped == 1)--}}

    {{--                                                                <div class="badge badge-warning">--}}
    {{--                                                                    <h5><i class="fa fa-store"></i>--}}
    {{--                                                                        {{trans('shop.orderStep1')}}--}}
    {{--                                                                    </h5>--}}
    {{--                                                                </div>--}}


    {{--                                                            @elseif($order->shipped == 2 )--}}

    {{--                                                                <div class="badge badge-primary">--}}
    {{--                                                                    <h5><i class="fa fa-shipping-fast"></i>--}}
    {{--                                                                        {{trans('shop.orderStep2')}}--}}
    {{--                                                                    </h5>--}}
    {{--                                                                </div>--}}

    {{--                                                            @elseif($order->shipped == 3 )--}}
    {{--                                                                <div class="badge badge-success">--}}
    {{--                                                                    <h5><i class="fa fa-smile-beam"></i>--}}
    {{--                                                                        {{trans('shop.orderStep3')}}--}}
    {{--                                                                    </h5>--}}
    {{--                                                                </div>--}}



    {{--                                                            @else--}}
    {{--                                                                no Orders--}}
    {{--                                                            @endif--}}


    {{--                                                        </th>--}}

    {{--                                                    </tr>--}}
    {{--                                                    <tr>--}}
    {{--                                                        <th class="text-center" scope="row"><strong>Shop--}}
    {{--                                                                Name:</strong>{{$order->product->store->name}}</th>--}}

    {{--                                                    </tr>--}}


    {{--                                                    </tbody>--}}
    {{--                                                </table>--}}
    {{--                                            </div>--}}

    {{--                                            <div class="col-md-6 mb-4">--}}

    {{--                                                <ol class="step pl-0">--}}
    {{--                                                    @if ($order->shipped == 0)--}}

    {{--                                                        <li class="step-element pb-0">--}}
    {{--                                                            <div class="step-number">--}}
    {{--                                                                    <span class="number text-white"--}}
    {{--                                                                          style="background-color: green"><i--}}
    {{--                                                                                class=" fa fa-check"></i></span>--}}
    {{--                                                            </div>--}}
    {{--                                                            <div class="step-excerpt">--}}
    {{--                                                                <h6 class="font-weight-bold dark-grey-text mb-3">{{trans('shop.orderStep')}}</h6>--}}
    {{--                                                                <p class="text-muted">{{trans('shop.orderStep0')}}</p>--}}
    {{--                                                            </div>--}}
    {{--                                                        </li>--}}
    {{--                                                        <li class="step-element pb-0">--}}
    {{--                                                            <div class="step-number">--}}
    {{--                                                                <span class="number">2</span>--}}
    {{--                                                            </div>--}}
    {{--                                                            <div class="step-excerpt">--}}
    {{--                                                                <h6 class="font-weight-bold dark-grey-text mb-3">{{trans('shop.orderStep1')}}</h6>--}}
    {{--                                                                <p class="text-muted">{{trans('shop.orderStep1d')}}</p>--}}
    {{--                                                            </div>--}}
    {{--                                                        </li>--}}
    {{--                                                        <li class="step-element pb-0">--}}
    {{--                                                            <div class="step-number">--}}
    {{--                                                                <span class="number">3</span>--}}
    {{--                                                            </div>--}}
    {{--                                                            <div class="step-excerpt">--}}
    {{--                                                                <h6 class="font-weight-bold dark-grey-text mb-3">{{trans('shop.orderStep2')}}</h6>--}}
    {{--                                                                <p class="text-muted">{{trans('shop.orderStep2d')}}</p>--}}
    {{--                                                            </div>--}}
    {{--                                                        </li>--}}
    {{--                                                        <li class="step-element pb-0">--}}
    {{--                                                            <div class="step-number">--}}
    {{--                                                                <span class="number">4</span>--}}
    {{--                                                            </div>--}}
    {{--                                                            <div class="step-excerpt">--}}
    {{--                                                                <h6 class="font-weight-bold dark-grey-text mb-3">{{trans('shop.orderStep3')}}</h6>--}}
    {{--                                                                <p class="text-muted">{{trans('shop.orderStep3d')}}</p>--}}
    {{--                                                            </div>--}}
    {{--                                                        </li>--}}


    {{--                                                    @elseif($order->shipped == 1)--}}

    {{--                                                        <li class="step-element pb-0">--}}
    {{--                                                            <div class="step-number">--}}
    {{--                                                                    <span class="number text-white"--}}
    {{--                                                                          style="background-color: green"><i--}}
    {{--                                                                                class=" fa fa-check"></i></span>--}}
    {{--                                                            </div>--}}
    {{--                                                            <div class="step-excerpt">--}}
    {{--                                                                <h6 class="font-weight-bold dark-grey-text mb-3">{{trans('shop.orderStep')}}</h6>--}}
    {{--                                                                <p class="text-muted">{{trans('shop.orderStep0')}}</p>--}}
    {{--                                                            </div>--}}
    {{--                                                        </li>--}}
    {{--                                                        <li class="step-element pb-0">--}}
    {{--                                                            <div class="step-number">--}}
    {{--                                                                    <span class="number text-white"--}}
    {{--                                                                          style="background-color: green"><i--}}
    {{--                                                                                class=" fa fa-check"></i></span>--}}
    {{--                                                            </div>--}}
    {{--                                                            <div class="step-excerpt">--}}
    {{--                                                                <h6 class="font-weight-bold dark-grey-text mb-3">{{trans('shop.orderStep1')}}</h6>--}}
    {{--                                                                <p class="text-muted">{{trans('shop.orderStep1d')}}--}}
    {{--                                                                    .</p>--}}
    {{--                                                            </div>--}}
    {{--                                                        </li>--}}

    {{--                                                        <li class="step-element pb-0">--}}
    {{--                                                            <div class="step-number">--}}
    {{--                                                                <span class="number">3</span>--}}
    {{--                                                            </div>--}}
    {{--                                                            <div class="step-excerpt">--}}
    {{--                                                                <h6 class="font-weight-bold dark-grey-text mb-3">{{trans('shop.orderStep2')}}</h6>--}}
    {{--                                                                <p class="text-muted">{{trans('shop.orderStep2d')}}</p>--}}
    {{--                                                            </div>--}}
    {{--                                                        </li>--}}
    {{--                                                        <li class="step-element pb-0">--}}
    {{--                                                            <div class="step-number">--}}
    {{--                                                                <span class="number">4</span>--}}
    {{--                                                            </div>--}}
    {{--                                                            <div class="step-excerpt">--}}
    {{--                                                                <h6 class="font-weight-bold dark-grey-text mb-3">{{trans('shop.orderStep3')}}</h6>--}}
    {{--                                                                <p class="text-muted">{{trans('shop.orderStep3d')}}</p>--}}
    {{--                                                            </div>--}}
    {{--                                                        </li>--}}



    {{--                                                    @elseif($order->shipped == 2 )--}}

    {{--                                                        <li class="step-element pb-0">--}}
    {{--                                                            <div class="step-number">--}}
    {{--                                                                    <span class="number text-white"--}}
    {{--                                                                          style="background-color: green"><i--}}
    {{--                                                                                class=" fa fa-check"></i></span>--}}
    {{--                                                            </div>--}}
    {{--                                                            <div class="step-excerpt">--}}
    {{--                                                                <h6 class="font-weight-bold dark-grey-text mb-3">{{trans('shop.orderStep')}}</h6>--}}
    {{--                                                                <p class="text-muted">{{trans('shop.orderStep0')}}</p>--}}
    {{--                                                            </div>--}}
    {{--                                                        </li>--}}
    {{--                                                        <li class="step-element pb-0">--}}
    {{--                                                            <div class="step-number">--}}
    {{--                                                                    <span class="number text-white"--}}
    {{--                                                                          style="background-color: green"><i--}}
    {{--                                                                                class=" fa fa-check"></i></span>--}}
    {{--                                                            </div>--}}
    {{--                                                            <div class="step-excerpt">--}}
    {{--                                                                <h6 class="font-weight-bold dark-grey-text mb-3">{{trans('shop.orderStep1')}}</h6>--}}
    {{--                                                                <p class="text-muted">{{trans('shop.orderStep1d')}}--}}
    {{--                                                                    .</p>--}}
    {{--                                                            </div>--}}
    {{--                                                        </li>--}}
    {{--                                                        <li class="step-element pb-0">--}}
    {{--                                                            <div class="step-number">--}}
    {{--                                                                    <span class="number text-white"--}}
    {{--                                                                          style="background-color: green"><i--}}
    {{--                                                                                class=" fa fa-check"></i></span>--}}

    {{--                                                            </div>--}}
    {{--                                                            <div class="step-excerpt">--}}
    {{--                                                                <h6 class="font-weight-bold dark-grey-text mb-3">--}}
    {{--                                                                    {{trans('shop.orderStep2')}}--}}
    {{--                                                                </h6>--}}
    {{--                                                                <p class="text-muted">{{trans('shop.orderStep2d')}}--}}
    {{--                                                                    .</p>--}}
    {{--                                                            </div>--}}
    {{--                                                        </li>--}}

    {{--                                                        <li class="step-element pb-0">--}}
    {{--                                                            <div class="step-number">--}}
    {{--                                                                <span class="number">4</span>--}}
    {{--                                                            </div>--}}
    {{--                                                            <div class="step-excerpt">--}}
    {{--                                                                <h6 class="font-weight-bold dark-grey-text mb-3">{{trans('shop.orderStep3')}}</h6>--}}
    {{--                                                                <p class="text-muted">{{trans('shop.orderStep3d')}}</p>--}}
    {{--                                                            </div>--}}
    {{--                                                        </li>--}}

    {{--                                                    @elseif($order->shipped == 3 )--}}
    {{--                                                        <li class="step-element pb-0">--}}
    {{--                                                            <div class="step-number">--}}
    {{--                                                                    <span class="number text-white"--}}
    {{--                                                                          style="background-color: green"><i--}}
    {{--                                                                                class=" fa fa-check"></i></span>--}}
    {{--                                                            </div>--}}
    {{--                                                            <div class="step-excerpt">--}}
    {{--                                                                <h6 class="font-weight-bold dark-grey-text mb-3">{{trans('shop.orderStep')}}</h6>--}}
    {{--                                                                <p class="text-muted">{{trans('shop.orderStep0')}}</p>--}}
    {{--                                                            </div>--}}
    {{--                                                        </li>--}}
    {{--                                                        <li class="step-element pb-0">--}}
    {{--                                                            <div class="step-number">--}}
    {{--                                                                    <span class="number text-white"--}}
    {{--                                                                          style="background-color: green"><i--}}
    {{--                                                                                class=" fa fa-check"></i></span>--}}
    {{--                                                            </div>--}}
    {{--                                                            <div class="step-excerpt">--}}
    {{--                                                                <h6 class="font-weight-bold dark-grey-text mb-3">{{trans('shop.orderStep1')}}</h6>--}}
    {{--                                                                <p class="text-muted">{{trans('shop.orderStep1d')}}--}}
    {{--                                                                    .</p>--}}
    {{--                                                            </div>--}}
    {{--                                                        </li>--}}
    {{--                                                        <li class="step-element pb-0">--}}
    {{--                                                            <div class="step-number">--}}
    {{--                                                                    <span class="number text-white"--}}
    {{--                                                                          style="background-color: green"><i--}}
    {{--                                                                                class=" fa fa-check"></i></span>--}}

    {{--                                                            </div>--}}
    {{--                                                            <div class="step-excerpt">--}}
    {{--                                                                <h6 class="font-weight-bold dark-grey-text mb-3">--}}
    {{--                                                                    {{trans('shop.orderStep2')}}--}}
    {{--                                                                </h6>--}}
    {{--                                                                <p class="text-muted">{{trans('shop.orderStep2d')}}--}}
    {{--                                                                    .</p>--}}
    {{--                                                            </div>--}}
    {{--                                                        </li>--}}
    {{--                                                        <li class="step-element pb-0">--}}
    {{--                                                            <div class="step-number">--}}
    {{--                                                                    <span class="number text-white"--}}
    {{--                                                                          style="background-color: green"><i--}}
    {{--                                                                                class=" fa fa-check"></i></span>--}}
    {{--                                                            </div>--}}
    {{--                                                            <div class="step-excerpt">--}}
    {{--                                                                <h6 class="font-weight-bold dark-grey-text mb-3">--}}
    {{--                                                                    {{trans('shop.orderStep3')}}--}}
    {{--                                                                </h6>--}}
    {{--                                                                <p class="text-muted">--}}
    {{--                                                                    {{trans('shop.orderStep3d')}}--}}
    {{--                                                                </p>--}}
    {{--                                                            </div>--}}
    {{--                                                        </li>--}}


    {{--                                                    @else--}}
    {{--                                                        no tracking order--}}
    {{--                                                    @endif--}}


    {{--                                                </ol>--}}

    {{--                                            </div>--}}

    {{--                                        </div>--}}

    {{--                                    </section>--}}
    {{--                                    <!-- Section -->--}}

    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <!-- Accordion card -->--}}








    {{--                    @endforeach--}}





    {{--                    --}}{{--<!-- Accordion card -->--}}
    {{--                    --}}{{--<div class="card">--}}

    {{--                    --}}{{--<!-- Card header -->--}}
    {{--                    --}}{{--<div class="card-header" role="tab" id="heading6">--}}
    {{--                    --}}{{--<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx194" href="#collapse6"--}}
    {{--                    --}}{{--aria-expanded="false" aria-controls="collapse6">--}}
    {{--                    --}}{{--<h3 class="mb-0 mt-3 red-text">--}}
    {{--                    --}}{{--Thank you my dear! <i class="fas fa-angle-down rotate-icon fa-2x"></i>--}}
    {{--                    --}}{{--</h3>--}}
    {{--                    --}}{{--</a>--}}
    {{--                    --}}{{--</div>--}}

    {{--                    --}}{{--<!-- Card body -->--}}
    {{--                    --}}{{--<div id="collapse6" class="collapse" role="tabpanel" aria-labelledby="heading6"--}}
    {{--                    --}}{{--data-parent="#accordionEx194">--}}
    {{--                    --}}{{--<div class="card-body pt-0">--}}
    {{--                    --}}{{--<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3--}}
    {{--                    --}}{{--wolf moon officia aute,--}}
    {{--                    --}}{{--non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch--}}
    {{--                    --}}{{--3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda--}}
    {{--                    --}}{{--shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt--}}
    {{--                    --}}{{--sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer--}}
    {{--                    --}}{{--farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them--}}
    {{--                    --}}{{--accusamus labore sustainable VHS.</p>--}}
    {{--                    --}}{{--</div>--}}
    {{--                    --}}{{--</div>--}}
    {{--                    --}}{{--</div>--}}
    {{--                    --}}{{--<!-- Accordion card -->--}}
    {{--                    --}}{{--</div>--}}
    {{--                    --}}{{--<!--/.Accordion wrapper-->--}}
    {{--                    --}}{{--@foreach($orders as $order)--}}



    {{--                    --}}{{--<div class="col-lg-6 mb-4">--}}

    {{--                    --}}{{--<ol class="step pl-0">--}}
    {{--                    --}}{{--<li class="step-element pb-0">--}}
    {{--                    --}}{{--<div class="step-number">--}}
    {{--                    --}}{{--<span class="number">1</span>--}}
    {{--                    --}}{{--</div>--}}
    {{--                    --}}{{--<div class="step-excerpt">--}}
    {{--                    --}}{{--<h6 class="font-weight-bold dark-grey-text mb-3">Write your requirements</h6>--}}
    {{--                    --}}{{--<p class="text-muted">Think the or organization same proposal to affected heard reclined in be it reassuring.</p>--}}
    {{--                    --}}{{--</div>--}}
    {{--                    --}}{{--</li>--}}
    {{--                    --}}{{--<li class="step-element pb-0">--}}
    {{--                    --}}{{--<div class="step-number" >--}}
    {{--                    --}}{{--<span class="number" style="background-color: green; color: white"><i class="fa fa-truck"></i></span>--}}



    {{--                    --}}{{--</div>--}}
    {{--                    --}}{{--<div class="step-excerpt">--}}
    {{--                    --}}{{--<h6 class="font-weight-bold dark-grey-text mb-3">Sign the contract</h6>--}}
    {{--                    --}}{{--<p class="text-muted">Think the or organization same proposal to affected heard reclined in be it reassuring.</p>--}}
    {{--                    --}}{{--</div>--}}
    {{--                    --}}{{--</li>--}}
    {{--                    --}}{{--<li class="step-element pb-0">--}}
    {{--                    --}}{{--<div class="step-number">--}}
    {{--                    --}}{{--<span class="number">3</span>--}}
    {{--                    --}}{{--</div>--}}
    {{--                    --}}{{--<div class="step-excerpt">--}}
    {{--                    --}}{{--<h6 class="font-weight-bold dark-grey-text mb-3">We start developing</h6>--}}
    {{--                    --}}{{--<p class="text-muted">Think the or organization same proposal to affected heard reclined in be it reassuring.</p>--}}
    {{--                    --}}{{--</div>--}}
    {{--                    --}}{{--</li> <li class="step-element pb-0">--}}
    {{--                    --}}{{--<div class="step-number">--}}
    {{--                    --}}{{--<span class="number">4</span>--}}
    {{--                    --}}{{--</div>--}}
    {{--                    --}}{{--<div class="step-excerpt">--}}
    {{--                    --}}{{--<h6 class="font-weight-bold dark-grey-text mb-3">We start developing</h6>--}}
    {{--                    --}}{{--<p class="text-muted">Think the or organization same proposal to affected heard reclined in be it reassuring.</p>--}}
    {{--                    --}}{{--</div>--}}
    {{--                    --}}{{--</li>--}}
    {{--                    --}}{{--</ol>--}}

    {{--                    --}}{{--</div>--}}
    {{--                    --}}{{--@endforeach--}}


    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <!-- Form with header -->--}}


    {{--        </div>--}}




    {{--<div class="container">--}}
    {{--<h2 class="text-center">Order id :{{$order->id}}</h2>--}}
    {{--<br><br>--}}
    {{--<div class="card">--}}
    {{--<div class="card-body">--}}
    {{--<!-- Header -->--}}
    {{--<div class="form-header purple-gradient accent-1 ">--}}
    {{--<table class="table table-borderless text-white">--}}
    {{--<thead>--}}
    {{--<tr>--}}
    {{--<th scope="col"><h5>Order Date</h5></th>--}}
    {{--<th scope="col"><h5>Total</h5></th>--}}
    {{--                                        <th scope="col">Total</th>--}}
    {{--<th scope="col"><h5>status</h5></th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody>--}}
    {{--<tr>--}}
    {{--<th scope="row"><h5>{{$order->created_at->format('Y-m-d')}}</h5></th>--}}
    {{--<td><h5>{{presentPrice($order->billing_total)}}</h5></td>--}}

    {{--<td><h5>{{$order->shipped}}</h5></td>--}}
    {{--</tr>--}}

    {{--</tbody>--}}
    {{--</table>--}}
    {{--</div>--}}
    {{--<table class="table table-hover text-center">--}}
    {{--<thead>--}}
    {{--<tr>--}}
    {{--<th scope="col"><h4>Email:</h4></th>--}}
    {{--<th scope="col"><h4>{{$order->billing_email}}</h4></th>--}}

    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody>--}}
    {{--<tr>--}}
    {{--<th scope="row"><h4><strong>Name:</strong></h4></th>--}}
    {{--<th scope="col"><h4>{{$order->billing_name}}</h4></th>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<th scope="row"><h4><strong>Address:</strong></h4></th>--}}
    {{--<th scope="col"><h4>{{$order->billing_address}}</h4></th>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<th scope="row"><h4><strong>City:</strong></h4></th>--}}
    {{--<th scope="col"><h4>{{$order->billing_city}}</h4></th>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<th scope="row"><h4><strong>Province:</strong></h4></th>--}}
    {{--<th scope="col"><h4>{{$order->billing_province}}</h4></th>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<th scope="row"><h4><strong>PostalCode:</strong></h4></th>--}}
    {{--<th scope="col"><h4>{{$order->billing_postalcode}}</h4></th>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<th scope="row"><h4><strong>Phone:</strong></h4></th>--}}
    {{--<th scope="col"><h4>{{$order->billing_phone}}</h4></th>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<th scope="row"><h4><strong>size1:</strong></h4></th>--}}
    {{--<th scope="col"><h4>{{$order->size1}}</h4></th>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<th scope="row"><h4><strong>size2:</strong></h4></th>--}}
    {{--<th scope="col"><h4>{{$order->size2}}</h4></th>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<th scope="row"><h4><strong>size3:</strong></h4></th>--}}
    {{--<th scope="col"><h4>{{$order->size3}}</h4></th>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<th scope="row"><h4><strong>size4:</strong></h4></th>--}}
    {{--<th scope="col"><h4>{{$order->size4}}</h4></th>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<th scope="row"><h4><strong>size5:</strong></h4></th>--}}
    {{--<th scope="col"><h4>{{$order->size5}}</h4></th>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<th scope="row"><h4><strong>size6:</strong></h4></th>--}}
    {{--<th scope="col"><h4>{{$order->size6}}</h4></th>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<th scope="row"><h4><strong>SubTotal:</strong></h4></th>--}}
    {{--<th scope="col"><h4>{{presentPrice($order->billing_subtotal)}}</h4></th>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<th scope="row"><h4><strong>tax:</strong></h4></th>--}}
    {{--<th scope="col"><h4>{{presentPrice($order->billing_tax)}}</h4></th>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<th scope="row"><h4><strong>delivery Cost:</strong></h4></th>--}}
    {{--<th scope="col"><h4>{{presentPrice($order->billing_delivery)}}</h4></th>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<th scope="row"><h4><strong>Total:</strong></h4></th>--}}
    {{--<th scope="col"><h4>{{presentPrice($order->billing_total)}}</h4></th>--}}
    {{--</tr>--}}


    {{--</tbody>--}}
    {{--</table>--}}



    {{--</div>--}}
    {{--</div>--}}
    {{--<!-- Form with header -->--}}
    {{--<br><br>--}}
    {{--<div class="card">--}}
    {{--<div class="card-body">--}}
    {{--<!-- Header -->--}}
    {{--<div class="form-header purple-gradient accent-1">--}}
    {{--<h3 class="mt-2"><i class="fas fa-envelope"></i>Order Items</h3>--}}
    {{--</div>--}}
    {{--@foreach($products as $product)--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-4">--}}
    {{--@foreach($product->image_data()->get() as $image)--}}

    {{--@if ($loop->first)--}}
    {{--<img src="{{asset('storage/product/'.$product->id.'/'.$image->image_key)}}" class="img-fluid " alt="smaple image">--}}
    {{--                                        <img src="{{asset('storage/product/'.$product->id.'/'.$image->image_key)}}" class="product-image" alt="Product Image">--}}
    {{--@endif--}}

    {{--@endforeach--}}
    {{--</div>--}}
    {{--<br><br>--}}
    {{--<div class="col-md-6 ">--}}

    {{--<h4><strong>item name:</strong> {{$product->title}}</h4>--}}




    {{--<h4><strong>item price:</strong>--}}
    {{--@if ($product->price_offer>0  and  $product->status == "active")--}}
    {{--presentPrice($product->price)}}--}}

    {{--{{presentPrice($product->price_offer)}}--}}

    {{--@else--}}


    {{--{{presentPrice($product->price)}}--}}

    {{--@endif--}}

    {{--                               {{presentPrice($product->price)}}--}}
    {{--</h4>--}}

    {{--                           <h4><strong>item name:</strong> {{$product->color}}</h4>--}}
    {{--                           <h4><strong>item name:</strong> {{$product->title}}</h4>--}}
    {{--                           <h4><strong>item name:</strong> {{$product->title}}</h4>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<hr>--}}
    {{--@endforeach--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection
@push('js')

@endpush
