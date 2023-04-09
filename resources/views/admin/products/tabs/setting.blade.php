@push('js')
    <script type="text/javascript">
        // $('.datepicker').datepicker();
        $('.datepicker').datepicker({
            rtl:'{{session('lang')== 'ar'? true:false}}',
            language:'{{session('lang')}}',
            format:'yyyy-mm-dd',
            autoclose: false,
            startDate: '-0d',
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            daysOfWeekHighlighted: "5,6",
            todayHighlight: true

        });
        $(document).on('change','.status',function () {
            var status = $('.status option:selected').val();
            if (status == 'refused'){
                $('.reason').removeClass('hidden');
            }else {
                $('.reason').addClass('hidden');

            }
        })
    </script>
    @endpush


    <h3>{{trans('admin.product_setting')}}</h3>



    <div class="form-row ">
       <div class="col">
           {!! Form::label('price',trans('admin.price')) !!}
           {!! Form::text('price',old('price'),['class'=>'form-control','placeholder'=>trans('admin.price')]) !!}
       </div>
{{--       <div class="col">--}}
{{--           {!! Form::label('start_at',trans('admin.start_at')) !!}--}}
{{--           {!! Form::text('start_at',old(''),['class'=>'form-control datepicker','placeholder'=>trans('admin.start_at')]) !!}--}}
{{--       </div>--}}
{{--       <div class="col">--}}
{{--           {!! Form::label('end_at',trans('admin.end_at')) !!}--}}
{{--           {!! Form::text('end_at',old(''),['class'=>'form-control datepicker','placeholder'=>trans('admin.end_at')]) !!}--}}
{{--       </div>--}}
    </div>
{{--    <div class="form-group col-md-3 col-lg-3 col-sm-3 col-xs-12">--}}
{{--        {!! Form::label('stock',trans('admin.stock')) !!}--}}
{{--        {!! Form::text('stock',$product->stock,['class'=>'form-control','placeholder'=>trans('admin.stock')]) !!}--}}
{{--    </div>--}}
{{--<br>--}}
{{--<div class="input-group date" data-provide="datepicker">--}}
{{--    <input type="text" class="form-control">--}}
{{--    <div class="input-group-addon">--}}
{{--        <span class="glyphicon glyphicon-th"></span>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<br>--}}



    <div class="clearfix"></div>
    <hr>
    <div class="form-row ">
        <div class="col">
            {!! Form::label('price_offer',trans('admin.price_offer')) !!}
            {!! Form::text('price_offer',old('price_offer'),['class'=>'form-control','placeholder'=>trans('admin.price_offer')]) !!}
        </div>
{{--        <div class="col">--}}
{{--            {!! Form::label('start_offer_at',trans('admin.start_offer_at')) !!}--}}
{{--            {!! Form::text('start_offer_at',old('price_offer'),['class'=>'form-control datepicker','placeholder'=>trans('admin.start_offer_at')]) !!}--}}
{{--        </div>--}}
{{--        <div class="col">--}}
{{--            {!! Form::label('end_offer_at',trans('admin.end_offer_at')) !!}--}}
{{--            {!! Form::text('end_offer_at',old('price_offer'),['class'=>'form-control datepicker','placeholder'=>trans('admin.end_offer_at')]) !!}--}}
{{--        </div>--}}
      </div>

    <div class="clearfix"></div>
    <hr>
    <div class="form-group">
        {!! Form::label('status',trans('admin.status')) !!}
        {!! Form::select('status',
        ['not active'=>trans('admin.not active'),'active'=>trans('admin.active')]
        ,old('status'),['class'=>'form-control status','placeholder'=>trans('admin.status')]) !!}
    </div>
{{--    <div class="clearfix"></div>--}}
{{--    <div class="form-group reason {{$product->status != 'refused'?'hidden':''}} ">--}}
{{--        {!! Form::label('reason',trans('admin.reason')) !!}--}}
{{--        {!! Form::textarea('reason',$product->reason,['class'=>'form-control','placeholder'=>trans('admin.reason')]) !!}--}}
{{--    </div>--}}

