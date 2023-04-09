@extends('style.index')
@section('extra-css')
    {{--<link href="{{asset('design/style/css/addons-pro/steppers.css')}}" rel="stylesheet">--}}
    {{--<!-- Stepper CSS - minified-->--}}
    {{--<link href="{{asset('design/style/css/addons-pro/steppers.min.css')}}" rel="stylesheet">--}}
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
        /*#complete-order{*/
                /*background: lighten(#fa755a,10%);*/
                /*cursor: not-allowed;*/
            /*}*/
    </style>
@endsection
@section('content')
    <br><br><br><br>
{{--    {{ dd(get_defined_vars()) }}--}}
{{--    {{$my}}--}}

    {{--{{$myForm['size1']}}--}}
    {{--<h1>    {{$size1}}</h1>--}}
    {{--<input type="text" name="title" value="{{$myForm->billing_email}}">--}}

    <div class="container">
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

        <div class="row">
            <div class="col-md-8">
                <div>
                    <form action="{{route('confirm.store')}}" method="POST"  id="payment-form" >
                        {{csrf_field()}}
                        <div class="card">
                            <div class="card-body">
                                <div class="row">


                                    <div class="col-md-12">
                                        <div class="alert alert-primary" role="alert">
                                            <h4 class="alert-heading">Review Details</h4>
                                            <p>All measurements must be in <strong>inches</strong></p>
                                            <img src="" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <div class="text-center">
                                            <img src="{{asset('img/size.png')}}" class="img-fluid z-depth-1"
                                                 alt="Responsive image">
                                        </div>
                                        <hr>
                                    </div>


                                    <div class="col-md-4">
                                        <label for="country">طول الكم</label>
                                        <div class="input-group mb-4 disabled">

                                            <input type="text"   id="size1"  name="size1" class="form-control py-0"
                                                   placeholder="" aria-describedby="basic-addon1"
                                                   value="{{$myForm['size1']}}" >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Inches </span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="country">فتحت الكم</label>
                                        <div class="input-group mb-4 disabled">

                                            <input type="text"   id="size2"  name="size2" value="{{$myForm['size2']}}"
                                                   class="form-control py-0" placeholder="{{$myForm['size2']}}"
                                                   >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Inches</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="country">عرض الصدر</label>
                                        <div class="input-group mb-4 disabled">

                                            <input type="text"   id="size3"  name="size3" value="{{$myForm['size3']}}"
                                                   class="form-control py-0" placeholder="{{$myForm['size3']}}"
                                                   >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Inches</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="country">عرض اسفل الظهر</label>
                                        <div class="input-group mb-4 disabled">

                                            <input type="text"   id="size4"  name="size4" value="{{$myForm['size4']}}"
                                                   class="form-control py-0" placeholder="{{$myForm['size4']}}"
                                                   >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Inches</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <label for="country">عرض السفلي</label>
                                        <div class="input-group mb-4 disabled">

                                            <input type="text"   id="size5"  name="size5" value="{{$myForm['size5']}}"
                                                   class="form-control py-0" placeholder="{{$myForm['size5']}}"
                                                   >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Inches</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">

                                        <label for="country">الطول</label>
                                        <div class="input-group mb-4 disabled">

                                            <input type="text"   id="size6"  name="size6" value="{{$myForm['size6']}}"
                                                   class="form-control py-0" placeholder="{{$myForm['size6']}}"
                                                   >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Inches</span>
                                            </div>
                                        </div>


                                    </div>
                                    `

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="email">Email Address</label>
                                        <div class="input-group mb-4 disabled">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                            class="fa fa-envelope"></i></span>
                                            </div>

                                            <input type="email" class="form-control py-0 "
                                                     id="billing_email"  name="billing_email" value="{{$myForm['billing_email']}}"
                                                   placeholder="{{$myForm['billing_email']}}" >

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name">Name</label>
                                        <div class="input-group mb-4 disabled">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                            class="fa fa-user"></i></span>
                                            </div>

                                            <input type="text" class="form-control py-0 "
                                                     id="billing_name"  name="billing_name" value="{{$myForm['billing_name']}}"
                                                   placeholder="{{$myForm['billing_name']}}" >

                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <label for="address">Address</label>

                                        <div class="input-group mb-4 disabled">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                            class="fa fa-address-book"></i></span>
                                            </div>

                                            <input type="text" class="form-control py-0 "
                                                     id="billing_address"  name="billing_address" value="{{$myForm['billing_address']}}"
                                                   placeholder="{{$myForm['billing_address']}}" >

                                        </div>

                                    </div>

                                    <div class="col-md-3">
                                        <label for="city">City</label>
                                        <div class="input-group mb-4 disabled">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                            class="fa fa-address-book"></i></span>
                                            </div>
                                            <input type="text" class="form-control py-0 "
                                                     id="billing_city"  name="billing_city" value="{{$myForm['billing_city']}}"
                                                   placeholder="{{$myForm['billing_city']}}" >
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <label for="city">Province</label>
                                        <div class="input-group mb-4 disabled">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                            class="fa fa-address-book"></i></span>
                                            </div>
                                            <input type="text" class="form-control py-0 "
                                                     id="billing_province"  name="billing_province" value="{{ $myForm['billing_province']}}"
                                                   placeholder="{{ $myForm['billing_province']}}" >
                                        </div>


                                    </div>
                                    <div class="col-md-3">
                                        <label for="postalcode">Postal Code</label>
                                        <div class="input-group mb-4 disabled">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                            class="fa fa-address-book"></i></span>
                                            </div>
                                            <input type="text" class="form-control py-0 "
                                                     id="billing_postalcode"  name="billing_postalcode" value="{{ $myForm['billing_postalcode']}}"
                                                   placeholder="{{ $myForm['billing_postalcode']}}" >
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                            <label for="phone">Phone</label>
                                        <div class="input-group mb-4 disabled">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                            class="fa fa-address-book"></i></span>
                                            </div>
                                            <input type="text" class="form-control py-0 "
                                                     id="billing_phone"  name="billing_phone" value="{{ $myForm['billing_phone']}}"
                                                   placeholder="{{ $myForm['billing_phone']}}" >
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <hr>
                                        <h1>payment</h1>
                                        <label for="card-element">
                                            Credit or debit card
                                        </label>
                                        <div id="card-element">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>

                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                        <hr>
                                        <hr>
                                        <button id="complete_order" class="btn btn-primary btn-block" type="submit">checkout</button>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
            <div class="col-md-4">


                <div class="card z-depth-0 border border-light rounded-0">

                    <!--Card content-->
                    <div class="card-body">
                        <h4 class="mb-4 mt-1 h5 text-center font-weight-bold">Summary</h4>

                        <hr>
                        @foreach(Cart::content() as $item)
                            <dl class="row">
                                <dd class="col-sm-3">
                                    @foreach($item->model->image_data()->get() as $image)
                                        @if ($loop->first)
                                            {{--<img src="{{}}" class="img-fluid " alt="smaple image">--}}
                                            <img src="{{asset('storage/product/'.$item->model->id.'/'.$image->image_key)}}"
                                                 alt=""
                                                 class="img-fluid z-depth-0"
                                                 style="height: 80px; width: 80px">
                                        @endif
                                    @endforeach
                                </dd>
                                <dd class="col-sm-5">
                                    {{$item->name}}
                                </dd>
                                <dd class="col-sm-4">
                                    {{presentPrice($item->price)}}<br>
                                    {{--{{$item->model->shop_id}}<br>--}}
                                    {{--{{$item->model->color_id}}<br>--}}


                                </dd>
                                {{--<dd class="col-sm-4">--}}
                                    {{--{{presentPrice($item->shop_id)}}--}}
                                    {{--<h1>{{$item->shop_id}}</h1>--}}
                                {{--</dd>--}}
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
                                {{presentPrice($newTax)}}

                            </dt>
                        </dl>
                        <hr>
                        <dl class="row">
                            <dt class="col-sm-8" style="">

                                Delivery Charge

                            </dt>
                            <dt class="col-sm-4">
                                {{presentPrice($costDeli)}}

                            </dt>
                        </dl>
                        @if (session()->has('coupon'))
                            <hr>
                        @endif
                        <dl class="row">
                            <dt class="col-sm-8" style="">
                                @if (session()->has('coupon'))
                                    Discount ({{ session()->get('coupon')['name'] }}) :
                                    {{--<form action="{{route('coupon.del')}}" method="post" style="display: inline">--}}
                                        {{--{{csrf_field()}}--}}
                                        {{--{{method_field('DELETE')}}--}}
                                        {{--<button type="submit" class=" btn btn-block btn-danger"><i--}}
                                                    {{--class="fa fa-trash-alt"></i></button>--}}
                                    {{--</form>--}}


                                @endif

                            </dt>
                            <dt class="col-sm-4 text-danger">
                                @if (session()->has('coupon'))

                                    {{ presentPrice($discount) }}




                                @endif

                            </dt>
                        </dl>
                        <hr>
                        <dl class="row">
                            <dt class="col-sm-8" style="">
                                Total

                            </dt>
                            <dt class="col-sm-4 text-danger">
                                {{presentPrice($newTotal)}}

                            </dt>
                        </dl>
                        <hr>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
{{--@section('extra-js')--}}
    {{--<script>--}}
        {{--(function () {--}}
            {{--// Create a Stripe client.--}}
            {{--var stripe = Stripe('pk_test_EYTysoJ7YQVl1f6qwydA10ms006v03mA9n');--}}

{{--// Create an instance of Elements.--}}
            {{--var elements = stripe.elements();--}}

{{--// Custom styling can be passed to options when creating an Element.--}}
{{--// (Note that this demo uses a wider set of styles than the guide below.)--}}
            {{--var style = {--}}
                {{--base: {--}}
                    {{--color: '#32325d',--}}
                    {{--fontFamily: '"Helvetica Neue", Helvetica, sans-serif',--}}
                    {{--fontSmoothing: 'antialiased',--}}
                    {{--fontSize: '16px',--}}
                    {{--'::placeholder': {--}}
                        {{--color: '#aab7c4'--}}
                    {{--}--}}
                {{--},--}}
                {{--invalid: {--}}
                    {{--color: '#fa755a',--}}
                    {{--iconColor: '#fa755a'--}}
                {{--}--}}
            {{--};--}}

{{--// Create an instance of the card Element.--}}
            {{--var card = elements.create('card', {style: style, hidePostalCode: true});--}}

{{--// Add an instance of the card Element into the `card-element` <div>.--}}
            {{--card.mount('#card-element');--}}

{{--// Handle real-time validation errors from the card Element.--}}
            {{--card.on('change', function (event) {--}}
                {{--var displayError = document.getElementById('card-errors');--}}
                {{--if (event.error) {--}}
                    {{--displayError.textContent = event.error.message;--}}
                {{--} else {--}}
                    {{--displayError.textContent = '';--}}
                {{--}--}}
            {{--});--}}

{{--// Handle form submission.--}}
            {{--var form = document.getElementById('payment-form');--}}
            {{--form.addEventListener('submit', function (event) {--}}
                {{--event.preventDefault();--}}
                {{--document.getElementById('complete_order').disabled =true;--}}

                {{--var options = {--}}
                    {{--// name: document.getElementById('name_on_card').value,--}}
                    {{--address_line1: document.getElementById('billing_address').value,--}}
                    {{--address_city: document.getElementById('billing_city').value,--}}
                    {{--address_state: document.getElementById('billing_province').value,--}}
                    {{--address_zip: document.getElementById('billing_postalcode').value--}}
                {{--};--}}

                {{--stripe.createToken(card,options).then(function (result) {--}}
                    {{--if (result.error) {--}}
                        {{--// Inform the user if there was an error.--}}
                        {{--var errorElement = document.getElementById('card-errors');--}}
                        {{--errorElement.textContent = result.error.message;--}}
                        {{--document.getElementById('complete_order').disabled =false;--}}
                    {{--} else {--}}
                        {{--// Send the token to your server.--}}
                        {{--stripeTokenHandler(result.token);--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}

{{--// Submit the form with the token ID.--}}
            {{--function stripeTokenHandler(token) {--}}
                {{--// Insert the token ID into the form so it gets submitted to the server--}}
                {{--var form = document.getElementById('payment-form');--}}
                {{--var hiddenInput = document.createElement('input');--}}
                {{--hiddenInput.setAttribute('type', 'hidden');--}}
                {{--hiddenInput.setAttribute('name', 'stripeToken');--}}
                {{--hiddenInput.setAttribute('value', token.id);--}}
                {{--form.appendChild(hiddenInput);--}}

                {{--// Submit the form--}}
                {{--form.submit();--}}
            {{--}--}}
        {{--})();--}}
    {{--</script>--}}

    {{--    @push('js')--}}
    {{--<script>--}}
        {{--$(document).ready(function () {--}}
            {{--$('.stepper').mdbStepper();--}}
        {{--});--}}

        {{--function someFunction22() {--}}
            {{--setTimeout(function () {--}}
                {{--$('#horizontal-stepper-fix').nextStep();--}}
            {{--}, 2000);--}}
        {{--}--}}
    {{--</script>--}}
    {{--        @endpush--}}

{{--@endsection--}}