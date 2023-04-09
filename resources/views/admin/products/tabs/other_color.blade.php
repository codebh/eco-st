@push('js')
    <script type="text/javascript">
        var x =1;
$(document).on('click','.add_input2',function () {
    var max_input =10;

    if (x<max_input){

        $('.input_tag2').append(
        '<div class="row">' +
            '           <div class="col-md-5">' +
            '               {!! Form::label('color_key',  trans('admin.color')) !!}' +
            '               {{ Form::select('color_key[]', App\Models\Color::pluck('name_ar','id'), null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) }}' +
            '           </div>' +
            '           <div class="col-md-5">' +
            '               {!! Form::label('color_show',  trans('admin.product_colors_S')) !!}' +
            '               {!! Form::text('color_show[]','', ['class' => 'form-control']) !!}' +
            '           </div>' +
            '        <a href="#" class="remove_input2 btn btn-danger"><i class="fa fa-trash"></i></a>' +
            '    </div>'
        );
        x++;

    }
   return false;
});
$(document).on('click','.remove_input2',function () {
   $(this).parent('div').remove();
   x--;
   return false;
});
    </script>
    @endpush

    <h3>{{trans('admin.other_data')}}</h3>

<div class=" input_tag2 col-md-12">
    <div class="row">
           <div class="col-md-5">
               {!! Form::label('color_key',  trans('admin.product_colors_S')) !!}
               {{ Form::select('color_key[]', App\Models\Color::pluck('name_ar','id'), null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) }}


           </div>
           <div class="col-md-5">
               {!! Form::label('color_show',  trans('admin.product_colors_S')) !!}
               {!! Form::text('color_show[]','', ['class' => 'form-control']) !!}
           </div>
        <a href="#" class="remove_input2 btn btn-danger"><i class="fa fa-trash"></i></a>
    </div>
</div>

<a href="#" class="add_input2 btn btn-info"><i class="fa fa-plus"></i></a>
