@extends('style.index')

@section('extra-css')
    <script src="https://js.stripe.com/v3/"></script>
    <style>

        /**
        * The CSS shown here will not be introduced in the Quickstart guide, but shows
        * how you can use CSS to style your Element's container.
        */
        .StripeElement {
            background-color: white;
            padding: 16px 16px;
            border: 1px solid #ccc;

        }

        .StripeElement--focus {
        // box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

        #card-errors {
            color: #fa755a;
        }

    </style>
    <br>


    <div class="container mt-5">

        <style>
            .btn.btn-block {
                margin: inherit;
            }
        </style>
        <br>

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{session()->get('success_message')}}
            </div>

        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
    @endif
        <!--Section: Content-->
        <section class="dark-grey-text">

            <div class="card">
                <div class="card-body">

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-lg-7 mb-4">

                            <!-- Pills navs -->
                            <ul class="nav md-pills nav-justified pills-primary font-weight-bold">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabCheckoutBilling123" role="tab">1. Sizes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabCheckoutAddons123" role="tab">2. shipping Address</a>
                                </li>

                            </ul>

                            <!-- Pills panels -->
                            <div class="tab-content pt-4">

                                <!--Panel 1-->
                                <div class="tab-pane fade in show active" id="tabCheckoutBilling123" role="tabpanel">
                                    <hr>
                                   <div class="text-center">
                                       <img src="{{asset('img/size.png')}}" class="img-fluid z-depth-1" alt="Responsive image">
                                   </div>
                                    <hr>
                                    <!--Card content-->
                                    <form>


                                    {!! Form::open(['route' => 'checkout.store', 'method' => 'post','id'=>'payment-form']) !!}



                                    {{ csrf_field() }}

                                        <!--Grid row-->
                                        <div class="row">

                                            <!--Grid column-->
                                            <div class="col-lg-4 col-md-12 mb-4">

                                                <label for="country">طول الكم</label>
                                                <div class="input-group mb-4">

                                                    <input type="text" class="form-control py-0" placeholder="0.0" aria-describedby="basic-addon1">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Inches</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--Grid column-->

                                            <!--Grid column-->
                                            <div class="col-lg-4 col-md-6 mb-4">

                                                <label for="country">فتحت الكم</label>
                                                <div class="input-group mb-4">

                                                    <input type="text" class="form-control py-0" placeholder="0.0" aria-describedby="basic-addon1">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Inches</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Grid column-->

                                            <!--Grid column-->
                                            <div class="col-lg-4 col-md-6 mb-4">
                                                <label for="country">عرض الصدر</label>
                                                <div class="input-group mb-4">

                                                    <input type="text" class="form-control py-0" placeholder="0.0" aria-describedby="basic-addon1">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Inches</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--Grid column-->

                                        </div>
                                        <!--Grid row-->

                                        <div class="row">

                                            <!--Grid column-->
                                            <div class="col-lg-4 col-md-12 mb-4">

                                                <label for="country">عرض اسفل الظهر</label>
                                                <div class="input-group mb-4">

                                                    <input type="text" class="form-control py-0" placeholder="0.0" aria-describedby="basic-addon1">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Inches</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--Grid column-->

                                            <!--Grid column-->
                                            <div class="col-lg-4 col-md-6 mb-4">

                                                <label for="country">عرض السفلي</label>
                                                <div class="input-group mb-4">

                                                    <input type="text" name="size5" value="{{old('size5')}}" class="form-control py-0" placeholder="0.0" aria-describedby="basic-addon1">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Inches</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Grid column-->

                                            <!--Grid column-->
                                            <div class="col-lg-4 col-md-6 mb-4">
                                                <label for="country">الطول</label>
                                                <div class="input-group mb-4">

                                                    <input type="text" class="form-control py-0" placeholder="0.0" aria-describedby="basic-addon1">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Inches</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--Grid column-->
                                           <div class="row">
                                              <div class="col-lg-12">
                                                  <div class="alert alert-warning" role="alert">
                                                      <h4 class="alert-heading">measurements</h4>
                                                      <p>All measurements must be in <strong>inches</strong></p>
                                                      <img src="" alt="">
                                                  </div>
                                              </div>
                                           </div>
                                        </div>
                                        <!--Grid row-->


                                        <hr>

                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Next step</button>

                                    </form>

                                </div>
                                <!--/.Panel 1-->

                                <!--Panel 2-->
                                <div class="tab-pane fade" id="tabCheckoutAddons123" role="tabpanel">
                                   {!! Form::open(['route' => 'checkout.store', 'method' => 'post','id'=>'payment-form']) !!}



                                    {{ csrf_field() }}
                                    <h2>Billing Details</h2>

                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        {{--@if (auth()->user())--}}
                                        {{--<input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>--}}
                                        {{--@else--}}
                                        <input type="email" class="form-control" id="email" name="email" value="" >
                                        {{--@endif--}}
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" >
                                    </div>

                                    <div class="half-form">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" >
                                        </div>
                                        <div class="form-group">
                                            <label for="province">Province</label>
                                            <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" >
                                        </div>
                                    </div> <!-- end half-form -->

                                    <div class="half-form">
                                        <div class="form-group">
                                            <label for="postalcode">Postal Code</label>
                                            <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode') }}" >
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" >
                                        </div>
                                    </div> <!-- end half-form -->
{{--                                        <div class="form-group">--}}
{{--                                            <label for="card-element">--}}
{{--                                                Credit or debit card--}}
{{--                                            </label>--}}
{{--                                            <div id="card-element" class="form-control">--}}
{{--                                                <!-- a Stripe Element will be inserted here. -->--}}
{{--                                            </div>--}}

{{--                                            <!-- Used to display form errors -->--}}
{{--                                            <div id="card-errors" role="alert"></div>--}}
{{--                                        </div>--}}
                                        <button  type="submit"  class="btn  btn-primary  btn-lg btn-block" id="complete-order">Place order</button>
                                    {!! Form::close() !!}
{{--                                    </form>--}}


                                </div>
                                <!--/.Panel 2-->


                            </div>
                            <!-- Pills panels -->


                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-5 mb-4">

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Place order</button>

                            <div class="card z-depth-0 border border-light rounded-0">

                                <!--Card content-->
                                <div class="card-body">
                                    <h4 class="mb-4 mt-1 h5 text-center font-weight-bold">Summary</h4>

                                    <hr>
                                    @foreach(Cart::content() as $item)
                                        <dl class="row">
                                            <dd class="col-sm-3">
                                                <img src="{{asset('storage/countries/3WKU4uJi0Fv3eeqa0j6ABleNBZ4HoUCgx2S7ybpf.png')}}" style="height: 80px;width: 80px" alt="">
                                            </dd>
                                            <dd class="col-sm-5">
                                                {{$item->name}}
                                            </dd>
                                            <dd class="col-sm-4">
                                                {{presentPrice($item->price)}}
                                                {{--{{$item->shop_id}}<br>--}}
                                                {{--{{$item->model->color_id}}<br>--}}

                                            </dd>
                                        </dl>
                                        <hr>
                                    @endforeach




                                    <dl class="row">
                                        <dt class="col-sm-8" style="">
                                            SubTotal

                                        </dt>
                                        <dt class="col-sm-4">
                                            {{presentPrice(Cart::subtotal())}}

                                        </dt>
                                    </dl>
                                    <hr>
                                    <dl class="row">
                                        <dt class="col-sm-8" style="">
                                            Tax

                                        </dt>
                                        <dt class="col-sm-4">
                                            {{presentPrice(Cart::tax())}}

                                        </dt>
                                    </dl>
                                    <hr>
                                    <dl class="row">
                                        <dt class="col-sm-8" style="">
                                            Total

                                        </dt>
                                        <dt class="col-sm-4">
                                            {{presentPrice(Cart::total())}}

                                        </dt>
                                    </dl>
                                    <hr>
                                </div>

                            </div>



                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                </div>
            </div>

        </section>
        <!--Section: Content-->


    </div>

{{--    <div class="container">--}}
{{--        <form actio

n="" method="POST" id="payment-form">--}}
{{--            {{ csrf_field() }}--}}


{{--            <div class="form-group">--}}
{{--                <label for="name_on_card">Name on Card</label>--}}
{{--                <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="card-element">--}}
{{--                    Credit or debit card--}}
{{--                </label>--}}
{{--                <div id="card-element" class="form-control">--}}
{{--                    <!-- a Stripe Element will be inserted here. -->--}}
{{--                </div>--}}

{{--                <!-- Used to display form errors -->--}}
{{--                <div id="card-errors" role="alert"></div>--}}
{{--            </div>--}}
{{--            <div class="spacer"></div>--}}

{{--            --}}{{--                                            <button type="submit" id="complete-order" class="button-primary full-width">Complete Order</button>--}}



{{--            <hr class="mb-4">--}}

{{--            <button  type="submit"  class="" >Place order</button>--}}

{{--        </form>--}}
{{--   </div>--}}

    @endsection
@section('extra-js')
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        $(document).on('change','.status',function () {
            var status = $('.status option:selected').val();
            if (status == 'del'){
                $('.test_remove').removeClass('hidden');
            }else {
                $('.test_remove').addClass('hidden');

            }
        })
    </script>
    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>

    <script type="text/javascript">
        var stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');


        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style,    hidePostalCode: true});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            // document.getElementById('complete-order').disabled =true;

            // var options = {
            //     name: document.getElementById('name_on_card').value,
            //     address_line1: document.getElementById('address').value,
            //     address_city: document.getElementById('city').value,
            //     address_state: document.getElementById('province').value,
            //     address_zip: document.getElementById('postalcode').value
            // }

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                    // document.getElementById('complete-order').disabled =false;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>


@endsection


