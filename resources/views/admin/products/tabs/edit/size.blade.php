@push('js')
    <script type="text/javascript">
        var x =1;
        $(document).on('click','.add_input4',function () {
            var max_input =10;

            if (x<max_input){

                $('.input_tag4').append(
                    '<div class="row">' +
                    '           <div class="col-md-9">' +
                    '               {!! Form::label('size_data',  trans('admin.input_key')) !!}' +
                    '               {{ Form::select('size_data[]', App\Models\Size::pluck('name','id'), null, array('class'=>'form-control', 'placeholder'=>'Please select Size...')) }}' +
                    '           </div>' +

                    '        <a href="#" class="remove_input4 btn btn-danger"><i class="fa fa-trash"></i></a>' +
                    '    </div>'
                );
                x++;

            }
            return false;
        });
        $(document).on('click','.remove_input4',function () {
            $(this).parent('div').remove();
            x--;
            return false;
        });
    </script>
@endpush

<h3>{{trans('admin.other_data')}}</h3>

<div class=" input_tag4 col-md-12">
    @foreach($product->size_data()->get() as $other)
        <div class="row">
            <div class="col-md-5">
                {!! Form::label('size_data',  trans('admin.size_format')) !!}

                {{ Form::select('size_data[]', App\Models\Size::pluck('name','id'), $other->size_data, array('class'=>'form-control', 'placeholder'=>'Please select Size ...')) }}
                {{--            {!! Form::text('input_key[]',$other->data_key, ['class' => 'form-control']) !!}--}}
            </div>
            <div class="col-md-5">
                {!! Form::label('size_show',  trans('admin.input_value')) !!}
                {!! Form::text('size_show[]',$other->size_show, ['class' => 'form-control']) !!}
            </div>
            <a href="#" class="remove_input4 btn btn-danger"><i class="fa fa-trash"></i></a>
        </div>
    @endforeach
</div>

<a href="#" class="add_input4 btn btn-info"><i class="fa fa-plus"></i></a>
