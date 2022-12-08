    @push('js')
    <script type="text/javascript">
        var x =1;
        $(document).on('click','.add_input1',function () {
            var max_input =10;

            if (x<max_input){

                $('.input_tag1').append(
                    '<div class="row">' +
                    '           <div class="col-md-5">' +
                    '               {!! Form::label('input_image',  trans('admin.input_image')) !!}' +
                    '               {!! Form::file('input_image[]', ['class' => 'form-control']) !!}' +
                    '           </div>' +
                    '        <a href="#" class="remove_input1 btn btn-danger"><i class="fa fa-trash"></i></a>' +
                    '    </div>'
                );
                x++;

            }
            return false;
        });
        $(document).on('click','.remove_input1',function () {
            $(this).parent('div').remove();
            x--;
            return false;
        });


        Dropzone.autoDiscover = false;
        $("#dZUpload").dropzone({
                autoProcessQueue: false,
                parallelUploads: 10, // Number of files process at a time (default 2)
            url: '#',
            addRemoveLinks: true,
            success: function (file, response) {
                var imgName = response;
                file.previewElement.classList.add("dz-success");
                console.log("Successfully uploaded :" + imgName);
            },
            error: function (file, response) {
                file.previewElement.classList.add("dz-error");
            }
        });
        // var myDropzone = new Dropzone("#dZUpload", {
        //     autoProcessQueue: false,
        //     parallelUploads: 10 // Number of files process at a time (default 2)
        // });
        //
        // $('#dZUpload').click(function(){
        //     myDropzone.processQueue();
        // });
    </script>
@endpush




    <h3>Main Image</h3>
    <hr>
    <div class=" col-md-12">
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}

{{--            <div id="dZUpload" class="dropzone">--}}
{{--                <div class="dz-default dz-message"></div>--}}
{{--            </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="row">

            <br>
            <br>
            <div class="col-md-5">
                {!! Form::label('main_image',  trans('admin.input_image')) !!}
                {!! Form::file('main_image', ['class' => 'form-control']) !!}
            </div>


        </div>
    </div>

<h3>{{trans('admin.product_media')}}</h3>
    <hr>
<div class=" input_tag1 col-md-12">
    <div class="row">
        <div class="col-md-5">
            {!! Form::label('input_image',  trans('admin.input_image')) !!}
            {!! Form::file('input_image[]', ['class' => 'form-control']) !!}
        </div>

        <a href="#" class="remove_input1 btn btn-danger "><i class="fa fa-trash"></i></a>
    </div>
</div>

<a href="#" class="add_input1 btn btn-info"><i class="fa fa-plus"></i></a>
