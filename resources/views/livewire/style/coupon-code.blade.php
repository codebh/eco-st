



<div>
    <div class="light-layout">
        <section class="small-section border-section border-top-0">
            <div class="row">
                <div class="col-lg-6">
                    <div class="subscribe">
                        <div>
                            <h4>{{trans('user.coupon')}}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">

                    <form class="mt-2" wire:submit.prevent="store"  class="form-inline subscribe-form auth-form needs-validation">

                        <div class="form-group ">
                            <input type="text" class="form-control"  id="coupon_code"  wire:model="coupon_code"
                                   placeholder="{{trans('user.coupon_info')}}" @error('coupon_code')is-invalid @endif>
                            @error('coupon_code')
                            <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-solid" id="mc-submit">{{trans('user.submit')}}</button>
                    </form>
                </div>
            </div>
        </section>
        <div class="container">
        </div>
    </div>
</div>










{{--<div>--}}
{{--    <div class="light-layout">--}}
{{--        <section class="small-section border-section border-top-0">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-6">--}}
{{--                    <div class="subscribe">--}}
{{--                        <div>--}}
{{--                            <h4>{{trans('user.coupon')}}</h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 text-center">--}}


{{--                    --}}{{--                                                                                        {{ csrf_field() }}--}}
{{--                    --}}{{--                                                                                        <div class="input-group">--}}
{{--                    --}}{{--                                                                                            <div class="input-group-prepend">--}}
{{--                    --}}{{--                                                                                                <span class="input-group-text">Coupon Code</span>--}}
{{--                    --}}{{--                                                                                            </div>--}}

{{--                    --}}{{--                                                                                            <input type="text" name="coupon_code" id="coupon_code"--}}
{{--                    --}}{{--                                                                                                   aria-label="Coupon Code" class="form-control">--}}
{{--                    --}}{{--                                                                                        </div>--}}
{{--                    --}}{{--                                                                                        <br>--}}

{{--                    --}}{{--                                                                                        <button type="submit" class=" btn btn-primary btn-block btn-block  btn-lg">--}}
{{--                    --}}{{--                                                                                            Apply--}}
{{--                    --}}{{--                                                                                        </button>--}}
{{--                    --}}{{--                                                                                    </form>--}}



{{--                    <form action="{{route('coupon.store')}}" method="POST"   class="form-inline subscribe-form auth-form needs-validation" >--}}
{{--                        {{ csrf_field() }}--}}
{{--                        <div class="form-group ">--}}
{{--                            <input type="text" class="form-control" name="coupon_code" id="mce-EMAIL"--}}
{{--                                   placeholder="{{trans('user.coupon_info')}}" required="required">--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="btn btn-solid" id="mc-submit">{{trans('user.submit')}}</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--        <div class="container">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
