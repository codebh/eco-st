<br>
<h3>{{trans('admin.department')}}</h3>
<br>

<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('store_id',trans('admin.shop_id')) !!}
            {!! Form::select('store_id',App\Models\Store::pluck('name','id'),old('store_id'),
            ['class'=>'form-control','placeholder'=>'...........']) !!}
        </div>

    </div>



    <div class="col">
        <div class="form-group">
            {!! Form::label('category_id',trans('admin.shop_id')) !!}
{{--            {!! Form::select('category_id',App\Models\Category::pluck('name_'.session('lang') =='ar''name_ar':'name_en','id'),old('category_id'),--}}
            {!! Form::select('category_id',App\Models\Category::pluck('name_ar','id'),old('category_id'),
            ['class'=>'form-control ','placeholder'=>'Choose  the Category']) !!}
        </div>

    </div>
</div>

<div class="clearfix"></div>
<hr>
<h3>{{trans('admin.department')}}</h3>

<div class="row">
    <div class="col">
        <div class="form-row ">
            <div class="col">
                {!! Form::label('price',trans('admin.price')) !!}
                {!! Form::text('price',old('price'),['class'=>'form-control','placeholder'=>trans('admin.price')]) !!}
            </div>
        </div>
    </div>
    <div class="col">
        <div class="form-row ">
            <div class="col">
                {!! Form::label('price_offer',trans('admin.price_offer')) !!}
                {!! Form::text('price_offer',old('price_offer'),['class'=>'form-control','placeholder'=>trans('admin.price_offer')]) !!}
            </div>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('status',trans('admin.status')) !!}
            {!! Form::select('status',
            ['not active'=>trans('admin.not active'),'active'=>trans('admin.active')]
            ,old('status'),['class'=>'form-control status','placeholder'=>trans('admin.status')]) !!}
        </div>
    </div>
</div>
<hr>
<div class="row">


    <div class="col">
        <div class="form-group">
            {{Form::label('tags', 'tags')}}
            {!! Form::select('tags[]',App\Models\Tag::pluck('name_ar','id')

                ,old('tag[]'),['class'=>'form-control select2','multiple'=>'multiple']) !!}
        </div>

    </div>



</div>



{{--<div class="row">--}}
{{--    <div class="col">--}}
{{--        <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12">--}}
{{--            {!! Form::label('color_id',trans('admin.color_id')) !!}--}}
{{--            {!! Form::select('color_id',App\Model\Color::pluck('name_'.lang(),'id'),old('color_id'),['class'=>'form-control','placeholder'=>trans('admin.color_id')]) !!}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


