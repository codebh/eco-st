@push('js')
    <script type="text/javascript">
        var x =1;
        $(document).on('click','.add_input',function () {
            var max_input =10;

            if (x<max_input){

                $('.input_tag').append(
                    '<div class="row">' +
                    '           <div class="col-md-5">' +
                    '               {!! Form::label('input_key',  trans('admin.input_key')) !!}' +
                    '               {{ Form::select('input_key[]', App\Models\Color::pluck('name_ar','id'), null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) }}' +
                    '           </div>' +
                    '           <div class="col-md-5">' +
                    '               {!! Form::label('input_value',  trans('admin.input_value')) !!}' +
                    '               {!! Form::text('input_value[]','', ['class' => 'form-control']) !!}' +
                    '           </div>' +
                    '        <a href="#" class="remove_input btn btn-danger"><i class="fa fa-trash"></i></a>' +
                    '    </div>'
                );
                x++;

            }
            return false;
        });
        $(document).on('click','.remove_input',function () {
            $(this).parent('div').remove();
            x--;
            return false;
        });
    </script>
@endpush

<h3>{{trans('admin.other_data')}}</h3>

<div class=" input_tag col-md-12">
    @foreach($product->other_data()->get() as $other)
    <div class="row">
        <div class="col-md-5">
            {!! Form::label('input_key',  trans('admin.input_key')) !!}

            {{ Form::select('input_key[]', App\Models\Color::pluck('name_ar','id'), $other->data_key, array('class'=>'form-control', 'placeholder'=>'Please select ...')) }}
{{--            {!! Form::text('input_key[]',$other->data_key, ['class' => 'form-control']) !!}--}}
        </div>
        <div class="col-md-5">
            {!! Form::label('input_value',  trans('admin.input_value')) !!}
            {!! Form::text('input_value[]',$other->data_value, ['class' => 'form-control']) !!}
        </div>
        <a href="#" class="remove_input btn btn-danger"><i class="fa fa-trash"></i></a>
    </div>
        @endforeach
</div>

<a href="#" class="add_input btn btn-info"><i class="fa fa-plus"></i></a>
