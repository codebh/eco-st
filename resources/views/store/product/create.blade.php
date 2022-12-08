@extends('store.index')
@push('js')
{{--    <script>--}}
{{--        var d = 1;--}}

{{--        $(document).on('click', '.add_input2', function () {--}}

{{--            var max_input = 5;--}}

{{--            if (d < max_input) {--}}

{{--                $('.input_tag2').append(--}}
{{--                    '<div class="row">' +--}}
{{--                    '           <div class="col-md-5">' +--}}
{{--                    '               {!! Form::label('size',  trans('shop.size')) !!}' +--}}
{{--                    '               {{ Form::select('size[]', App\Models\Size::pluck('name','name'), null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) }}' +--}}
{{--                    '           </div>' +--}}
{{--                    '           <div class="col-md-5">' +--}}
{{--                    '               {!! Form::label('size qty',  trans('shop.qty')) !!}' +--}}
{{--                    '               {!! Form::number('size_qty[]','', ['class' => 'form-control']) !!}' +--}}
{{--                    '           </div>' +--}}
{{--                    '        <a href="#" class="remove_input2 btn btn-danger"><i class="fa fa-trash"></i></a>' +--}}
{{--                    '    </div>'--}}

{{--                );--}}
{{--                d++;--}}

{{--            }--}}
{{--            return false;--}}
{{--        });--}}
{{--        $(document).on('click', '.remove_input2', function () {--}}
{{--            $(this).parent('div').remove();--}}
{{--            d--;--}}
{{--            return false;--}}
{{--        });--}}
{{--       --}}


{{--    </script>--}}
<script>


    var x = 1;
    $(document).on('click', '.add_input1', function () {

        var max_input = 5;

        if (x < max_input) {

            $('.input_tag1').append(
                '<div class="row mt-3">' +
                '           <div class="col-10">' +
{{--                                    '               {!! Form::label('input_image',  trans('admin.input_image')) !!}' +--}}
                    '               {!! Form::file('input_image[]', ['class' => 'form-control']) !!}' +
                '           </div>' +
                '        <a href="#" class="remove_input1 btn btn-danger"><i class="fa fa-trash"></i></a>' +
                '    </div>'
            );
            x++;

        }
        return false;
    });
    $(document).on('click', '.remove_input1', function () {
        $(this).parent('div').remove();
        x--;
        return false;
    });

    var y = 1;
    $(document).on('click', '.add_input2', function () {

        var max_input = 5;

        if (y < max_input) {

            $('.input_tag2').append(
                '<div class="row  mt-3">' +
                '           <div class="col-md-5">' +

                '               {{ Form::select('size[]', App\Models\Size::pluck('name','name'), null, array('class'=>'form-control', 'placeholder'=>'Please select ...','required' => 'required')) }}' +
                '           </div>' +
                '           <div class="col-md-5">' +





                  '   <select class="form-control" name="size_qty[]">'+
                  '  @for ($i = 1; $i < 21; $i++)'+
                  '  <option value="{{ $i }}">{{ $i }}</option>'+
                  '      @endfor'+

            '    </select>'+
                '           </div>' +
                '        <a href="#" class="remove_input2 btn btn-danger"><i class="fa fa-trash"></i></a>' +
                '    </div>'

            );
            y++;

        }
        return false;
    });
    $(document).on('click', '.remove_input2', function () {
        $(this).parent('div').remove();
        y--;
        return false;
    });
</script>
@endpush
@section('content')

@livewire('store.add-product',['category_master' => $category_master])


@endsection
