@extends('style.newIndex')

@section('content')
 @livewire('style.place-order')
{{--   <div class="container">--}}


{{--       <div class="z-depth-1 m-2">--}}
{{--           <div class="row">--}}
{{--               <div class="col-md-8">--}}
{{--                   <div>--}}
{{--                       <form id="payment-form" action="{{route('confirm.store')}}" method="POST"  >--}}
{{--                           {{csrf_field()}}--}}
{{--                          <div class="card">--}}
{{--                              <div class="card-body">--}}
{{--                                  @if (Cart::count() > 0)--}}
{{--                                  <ul class="stepper horizontal horizontal-fix linear"  id="horizontal-stepper-fix">--}}
{{--                             --}}

{{--                                          <div class="row">--}}


{{--                                              <div class="col-md-12">--}}
{{--                                                  <div class="alert alert-warning" role="alert">--}}
{{--                                                      <h4 class="alert-heading">Measurement Details</h4>--}}
{{--                                                      <p>All measurements must be in <strong>inches</strong></p>--}}
{{--                                                      --}}{{----}}{{--                                        <img src="" alt="">--}}
{{--                                                  </div>--}}
{{--                                              </div>--}}
{{--                                              <div class="col-md-12">--}}

{{--                                                  <div class="text-center">--}}
{{--                                                      <img src="{{asset('img/size.png')}}" class="img-fluid z-depth-1" alt="Responsive image">--}}
{{--                                                  </div>--}}
{{--                                                  <hr>--}}
{{--                                              </div>--}}



{{--                                              <div class="col-md-4">--}}
{{--                                                  <label for="country">طول الكم</label>--}}
{{--                                                  <div class="input-group mb-4">--}}

{{--                                                      <input type="text" name="size1" id="size1"    class="form-control py-0 validate" placeholder="0.0" aria-describedby="basic-addon1" value="{{old('size1')}}" >--}}
{{--                                                      <div class="input-group-prepend">--}}
{{--                                                          <span class="input-group-text" id="basic-addon1">Inches</span>--}}
{{--                                                      </div>--}}


{{--                                                  </div>--}}

{{--                                              </div>--}}
{{--                                              <div class="col-md-4">--}}
{{--                                                  <label for="country">فتحت الكم</label>--}}
{{--                                                  <div class="input-group mb-4">--}}

{{--                                                      <input type="text" name="size2" id="size2" value="{{old('size2')}}" class="form-control py-0" placeholder="0.0" aria-describedby="basic-addon1">--}}
{{--                                                      <div class="input-group-prepend">--}}
{{--                                                          <span class="input-group-text" id="basic-addon1">Inches</span>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}

{{--                                              </div>--}}
{{--                                              <div class="col-md-4">--}}
{{--                                                  <label for="country">عرض الصدر</label>--}}
{{--                                                  <div class="input-group mb-4">--}}

{{--                                                      <input type="text" name="size3" id="size3" value="{{old('size3')}}" class="form-control py-0" placeholder="0.0" aria-describedby="basic-addon1">--}}
{{--                                                      <div class="input-group-prepend">--}}
{{--                                                          <span class="input-group-text" id="basic-addon1">Inches</span>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                              </div>--}}
{{--                                              <div class="col-md-4">--}}
{{--                                                  <label for="country">عرض اسفل الظهر</label>--}}
{{--                                                  <div class="input-group mb-4">--}}

{{--                                                      <input type="text" name="size4" id="size4" value="{{old('size4')}}" class="form-control py-0" placeholder="0.0" aria-describedby="basic-addon1">--}}
{{--                                                      <div class="input-group-prepend">--}}
{{--                                                          <span class="input-group-text" id="basic-addon1">Inches</span>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}

{{--                                              </div>--}}
{{--                                              <div class="col-md-4">--}}
{{--                                                  <label for="country">عرض السفلي</label>--}}
{{--                                                  <div class="input-group mb-4">--}}

{{--                                                      <input type="text" name="size5" id="size5" value="{{old('size5')}}" class="form-control py-0" placeholder="0.0" aria-describedby="basic-addon1">--}}
{{--                                                      <div class="input-group-prepend">--}}
{{--                                                          <span class="input-group-text" id="basic-addon1">Inches</span>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}

{{--                                              </div>--}}
{{--                                              <div class="col-md-4">--}}

{{--                                                  <label for="country">الطول</label>--}}
{{--                                                  <div class="input-group mb-4">--}}

{{--                                                      <input type="text" name="size6" id="size6" value="{{old('size6')}}" class="form-control py-0" placeholder="0.0" aria-describedby="basic-addon1">--}}
{{--                                                      <div class="input-group-prepend">--}}
{{--                                                          <span class="input-group-text" id="basic-addon1">Inches</span>--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}


{{--                                              </div>`--}}

{{--                                          </div>--}}
{{--                                      <li class="step">--}}
{{--                                          <div class="step-title waves-effect waves-dark">Billing Details</div>--}}
{{--                                          <div class="step-new-content">--}}




{{--                                              <div class="row">--}}
{{--                                                  <div class="col-md-6">--}}
{{--                                                      <div class="form-group">--}}
{{--                                                          <label for="email">Email Address</label>--}}
{{--                                                          <input type="email" class="form-control validate" id="billing_email" name="billing_email" value="{{ auth()->user()->email }}">--}}

{{--                                                          <input type="email" class="form-control validate" id="email" name="billing_email" value="{{ old('email') }}" required>--}}

{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                                  <div class="col-md-6">--}}
{{--                                                      <div class="form-group">--}}
{{--                                                          <label for="name">Name</label>--}}
{{--                                                          <input type="text" class="form-control validate" id="billing_name" name="billing_name" value="{{ old('billing_name') }}" >--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                                  <div class="col-md-12">--}}
{{--                                                      <div class="form-group">--}}
{{--                                                          <label for="address">Address</label>--}}
{{--                                                          <input type="text" class="form-control" id="billing_address" name="billing_address" value="{{ old('billing_address') }}" >--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}

{{--                                                  <div class="col-md-3">--}}
{{--                                                      <div class="form-group">--}}
{{--                                                          <label for="city">City</label>--}}
{{--                                                          <input type="text" class="form-control" id="billing_city" name="billing_city" value="{{ old('billing_city') }}" >--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                                  <div class="col-md-3">--}}
{{--                                                      <div class="form-group">--}}
{{--                                                          <label for="province">Province</label>--}}
{{--                                                          <input type="text" class="form-control" id="billing_province" name="billing_province" value="{{ old('billing_province') }}" >--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                                  <div class="col-md-3">--}}
{{--                                                      <div class="form-group">--}}
{{--                                                          <label for="postalcode">Postal Code</label>--}}
{{--                                                          <input type="text" class="form-control" id="billing_postalcode" name="billing_postalcode" value="{{ old('billing_postalcode') }}" >--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                                  <div class="col-md-3">--}}
{{--                                                      <div class="form-group">--}}
{{--                                                          <label for="phone">Phone</label>--}}
{{--                                                          <input type="text" class="form-control" id="billing_phone" name="billing_phone" value="{{old('billing_phone')}}" >--}}
{{--                                                      </div>--}}
{{--                                                  </div>--}}
{{--                                              </div>--}}

{{--                                              <div class="step-actions">--}}
{{--                                                  <button class="waves-effect waves-dark btn btn-sm btn-primary next-step" data-feedback="someFunction22">CONTINUE</button>--}}
{{--                                                  <button class="waves-effect waves-dark btn btn-sm btn-secondary previous-step">BACK</button>--}}
{{--                                              </div>--}}
{{--                                          </div>--}}
{{--                                      </li>--}}
{{--                                      <li class="step">--}}
{{--                                          <div class="step-title waves-effect waves-dark">Review & confirm</div>--}}
{{--                                          <div class="step-new-content">--}}

{{--                                              <div class="row">--}}
{{--                                                  <div class="col-md-12">--}}

{{--                                                      <hr>--}}
{{--                                                      <h1>payment</h1>--}}
{{--                                                      <hr>--}}
{{--                                                      <label for="card-element">--}}
{{--                                                          Credit or debit card--}}
{{--                                                      </label>--}}
{{--                                                      <div id="card-element">--}}
{{--                                                          <!-- A Stripe Element will be inserted here. -->--}}
{{--                                                      </div>--}}

{{--                                                      <!-- Used to display form errors. -->--}}
{{--                                                      <div id="card-errors" role="alert"></div>--}}
{{--                                                      <hr>--}}
{{--                                                      <button id="complete_order" class="btn btn-primary btn-block" type="submit">checkout</button>--}}

{{--                                                  </div>--}}
{{--                                                  --}}{{--               </form>--}}
{{--                                                  <div class="col-md-6">--}}



{{--                                                  </div>--}}
{{--                                              </div>--}}



{{--                                              --}}{{--                           <div class="step-actions">--}}
{{--                                              --}}{{--                               <button class="waves-effect waves-dark btn-sm btn btn-primary m-0 mt-4" type="button">SUBMIT</button>--}}
{{--                                              --}}{{--                           </div>--}}
{{--                                          </div>--}}
{{--                                      </li>--}}
{{--                                  </ul>--}}

{{--                                  @else--}}
{{--                                  no products--}}
{{--                                      @endif--}}

{{--                              </div>--}}
{{--                          </div>--}}
{{--                       </form>--}}


{{--                   </div>--}}
{{--               </div>--}}
{{--               <div class="col-md-4">--}}


{{--                   <div class="card z-depth-0 border border-light rounded-0">--}}

{{--                       <!--Card content-->--}}
{{--                       <div class="card-body">--}}
{{--                           <h4 class="mb-4 mt-1 h5 text-center font-weight-bold">Summary</h4>--}}

{{--                           <hr>--}}
{{--                           @foreach(Cart::content() as $item)--}}
{{--                               <dl class="row">--}}
{{--                                   <dd class="col-sm-3">--}}
{{--                                       @foreach($item->model->image_data()->get() as $image)--}}
{{--                                           @if ($loop->first)--}}
{{--                                               --}}{{--<img src="{{}}" class="img-fluid " alt="smaple image">--}}
{{--                                               <img src="{{asset('storage/product/'.$item->model->id.'/'.$image->image_key)}}"--}}
{{--                                                    alt=""--}}
{{--                                                    class="img-fluid z-depth-0"--}}
{{--                                                    style="height: 80px; width: 80px">--}}
{{--                                           @endif--}}
{{--                                       @endforeach--}}
{{--                                   </dd>--}}
{{--                                   <dd class="col-sm-5">--}}
{{--                                       item name:{{$item->name}}<br>--}}

{{--                                   </dd>--}}
{{--                                   <dd class="col-sm-4">--}}
{{--                                       {{presentPrice($item->price)}}<br>--}}



{{--                                   </dd>--}}
{{--                                   --}}{{--<dd class="col-sm-4">--}}
{{--                                       --}}{{--{{presentPrice($item->shop_id)}}--}}
{{--                                       --}}{{--<h1>{{$item->shop_id}}</h1>--}}
{{--                                   --}}{{--</dd>--}}
{{--                               </dl>--}}
{{--                               <hr>--}}
{{--                           @endforeach--}}




{{--                           <dl class="row">--}}
{{--                               <dt class="col-sm-8" style="">--}}
{{--                                   SubTotal--}}

{{--                               </dt>--}}
{{--                               <dt class="col-sm-4">--}}
{{--                                   {{presentPrice(Cart::subtotal())}}--}}

{{--                               </dt>--}}
{{--                           </dl>--}}
{{--                           <hr>--}}
{{--                           <dl class="row">--}}
{{--                               <dt class="col-sm-8" style="">--}}
{{--                                   Tax--}}

{{--                               </dt>--}}
{{--                               <dt class="col-sm-4">--}}
{{--                                   {{presentPrice($newTax)}}--}}

{{--                               </dt>--}}
{{--                           </dl>--}}



{{--                           <hr>--}}
{{--                           <dl class="row">--}}
{{--                               <dt class="col-sm-8" style="">--}}

{{--                                   Delivery Charge--}}

{{--                               </dt>--}}
{{--                               <dt class="col-sm-4">--}}

{{--                                   {{presentPrice($costDeli)}}--}}

{{--                               </dt>--}}
{{--                           </dl>--}}
{{--                           <hr>--}}
{{--                           <dl class="row">--}}
{{--                               <dt class="col-sm-8" style="">--}}
{{--                                   Total--}}

{{--                               </dt>--}}
{{--                               <dt class="col-sm-4">--}}
{{--                                   {{presentPrice($newTotal)}}--}}

{{--                               </dt>--}}
{{--                           </dl>--}}
{{--                           <hr>--}}
{{--                       </div>--}}

{{--                   </div>--}}
{{--                  </div>--}}

{{--           </div>--}}
{{--       </div>--}}
{{--   </div>--}}


@endsection

@section('extra-js')
    <script>
        (function () {
            // Create a Stripe client.
            var stripe = Stripe('pk_test_EYTysoJ7YQVl1f6qwydA10ms006v03mA9n');

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
            var card = elements.create('card', {style: style, hidePostalCode: true});

// Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

// Handle real-time validation errors from the card Element.
            card.on('change', function (event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

// Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                document.getElementById('complete_order').disabled =true;

                var options = {
                    // name: document.getElementById('name_on_card').value,
                    address_line1: document.getElementById('billing_address').value,
                    address_city: document.getElementById('billing_city').value,
                    address_state: document.getElementById('billing_province').value,
                    address_zip: document.getElementById('billing_postalcode').value
                };

                stripe.createToken(card,options).then(function (result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                        document.getElementById('complete_order').disabled =false;
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
        })();
    </script>

        @push('js')
    <script>
        $(document).ready(function () {
            $('.stepper').mdbStepper();
        });

        function someFunction22() {
            setTimeout(function () {
                $('#horizontal-stepper-fix').nextStep();
            }, 2000);
        }
    </script>
            @endpush

@endsection
