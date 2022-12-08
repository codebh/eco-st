<div class="row check-out">
    <div class="checkout-title">
        <h4>{{ trans('user.shipping') }}</h4>
    </div>
    @foreach($cities as $key => $city)
    <div class="form-group col-md-6 col-sm-6 col-xs-12">
        <label class="form-check-label"  wire:click="changeEvent($event.target.value)">
            <input type="radio" class="form-check-input" name="billing_country" id="" value="{{ $key }}"  >
            {{ $city }}
          </label>
    </div>

    @endforeach
        {{-- <select name="billing_country"  wire:click="changeEvent($event.target.value)" > --}}

{{--            <option value="">-- Select City --</option>--}}
            {{-- @foreach($cities as $key => $city)
                <option value="{{ $key }}">{{ $city }}</option>
            @endforeach --}}
{{--            <option value="India">India</option>--}}
{{--            <option value="South Africa">South Africa</option>--}}
{{--            <option value="United State">United State</option>--}}
{{--            <option value="Australia">Australia</option>--}}
        {{-- </select> --}}


{{-- @if ($errors->isEmpty())

<div wire:ignore id="processing"  style="font-size: 22px; margin-bottom:20px;color:green;display:none">
    <i class="fa fa-spinner  fa-pulse fa-fw"></i>
    <span>Processing......</span>
</div>
@endif --}}




    @if (  $city_id  == 1)
        <div class="form-group col-md-6 col-sm-6 col-xs-12">
            <div class="field-label">{{trans('user.email')}}</div>
            <input type="email" name="billing_email" value="{{auth()->user()->email}}" placeholder="">
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-12">
            <div class="field-label">{{trans('user.name')}}</div>
            <input type="text" name="billing_name" value="{{old('billing_name')}}" placeholder="">
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-12">
            <div class="field-label">{{trans('user.address')}}</div>
            <input type="text" name="billing_address" value="{{old('billing_address')}}" placeholder="">
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-12">
            <div class="field-label">{{trans('user.city')}}</div>
            <input type="text" name="billing_city" value="{{old('billing_city')}}" placeholder="">
        </div>

        <div class="form-group col-md-12 col-sm-12 col-xs-12">
            <div class="field-label">{{trans('user.province')}}</div>
            <input type="text" name="billing_province" value="{{old('billing_province')}}" placeholder="Street address">
        </div>
        <div class="form-group col-md-12 col-sm-12 col-xs-12">
            <div class="field-label">{{trans('user.postal_code')}}</div>
            <input type="text" name="billing_postalcode" value="{{old('billing_postalcode')}}" placeholder="">
        </div>
        <div class="form-group col-md-12 col-sm-6 col-xs-12">
            <div class="field-label">{{trans('user.phone')}}</div>
            <input type="text" name="billing_phone" value="{{old('billing_phone')}}" placeholder="">
        </div>
    @elseif ( $city_id  == 2)
        <div class="form-group col-md-6 col-sm-6 col-xs-12">
            <div class="field-label">{{trans('user.email')}}</div>
            <input type="email" name="billing_email" value="{{auth()->user()->email}}" placeholder="">
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-12">
            <div class="field-label">{{trans('user.name')}}</div>
            <input type="text" name="billing_name" value="{{old('billing_name')}}" placeholder="">
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-12">
            <div class="field-label">{{trans('user.address')}}</div>
            <input type="text" name="billing_address" value="{{old('billing_address')}}" placeholder="">
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-12">
            <div class="field-label">{{trans('user.city')}}</div>
            <input type="text" name="billing_city" value="{{old('billing_city')}}" placeholder="">
        </div>

        {{-- <div class="form-group col-md-12 col-sm-12 col-xs-12">
            <div class="field-label">{{trans('user.province')}}</div>
            <input type="text" name="billing_province" value="{{old('billing_province')}}" placeholder="Street address">
        </div>
        <div class="form-group col-md-12 col-sm-12 col-xs-12">
            <div class="field-label">{{trans('user.postal_code')}}</div>
            <input type="text" name="billing_postalcode" value="{{old('billing_postalcode')}}" placeholder="">
        </div>
        <div class="form-group col-md-12 col-sm-6 col-xs-12">
            <div class="field-label">{{trans('user.phone')}}</div>
            <input type="text" name="billing_phone" value="{{old('billing_phone')}}" placeholder="">
        </div> --}}
    @endif

{{--    <div class="form-group col-md-6 col-sm-6 col-xs-12">--}}
{{--        <div class="field-label">{{trans('user.email')}}</div>--}}
{{--        <input type="email" name="billing_email" value="{{auth()->user()->email}}" placeholder="">--}}
{{--    </div>--}}
{{--    <div class="form-group col-md-6 col-sm-6 col-xs-12">--}}
{{--        <div class="field-label">{{trans('user.name')}}</div>--}}
{{--        <input type="text" name="billing_name" value="{{old('billing_name')}}" placeholder="">--}}
{{--    </div>--}}
{{--    <div class="form-group col-md-6 col-sm-6 col-xs-12">--}}
{{--        <div class="field-label">{{trans('user.address')}}</div>--}}
{{--        <input type="text" name="billing_address" value="{{old('billing_address')}}" placeholder="">--}}
{{--    </div>--}}
{{--    <div class="form-group col-md-6 col-sm-6 col-xs-12">--}}
{{--        <div class="field-label">{{trans('user.city')}}</div>--}}
{{--        <input type="text" name="billing_city" value="{{old('billing_city')}}" placeholder="">--}}
{{--    </div>--}}

{{--    <div class="form-group col-md-12 col-sm-12 col-xs-12">--}}
{{--        <div class="field-label">{{trans('user.province')}}</div>--}}
{{--        <input type="text" name="billing_province" value="{{old('billing_province')}}" placeholder="Street address">--}}
{{--    </div>--}}
{{--    <div class="form-group col-md-12 col-sm-12 col-xs-12">--}}
{{--        <div class="field-label">{{trans('user.postal_code')}}</div>--}}
{{--        <input type="text" name="billing_postalcode" value="{{old('billing_postalcode')}}" placeholder="">--}}
{{--    </div>--}}
{{--    <div class="form-group col-md-12 col-sm-6 col-xs-12">--}}
{{--        <div class="field-label">{{trans('user.phone')}}</div>--}}
{{--        <input type="text" name="billing_phone" value="{{old('billing_phone')}}" placeholder="">--}}
{{--    </div>--}}
    {{--                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">--}}
    {{--                                        <div class="field-label">Postal Code</div>--}}
    {{--                                        <input type="text" name="field-name" value="" placeholder="">--}}
    {{--                                    </div>--}}
    {{--                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
    {{--                                        <input type="checkbox" name="shipping-option" id="account-option"> &ensp;--}}
    {{--                                        <label for="account-option">Create An Account?</label>--}}
    {{--                                    </div>--}}
</div>
