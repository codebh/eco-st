@push('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        $(document).ready(function () {
        $('#dropzonefileupload').dropzone({
            url:"{{aurl('upload/image/'.$product->id)}}",
            paramName:'file',
            autoDiscover:false,
            uploadMultiple:false,
            maxFiles:15,
            maxFilessize:3,
            acceptedFiles:'image/*',
            dictDefaultMessage:'اضغط هنا لرفع الملفات',
            dictRemoveFile:'{{trans('admin.delete')}}',
            params:{
                _token:'{{csrf_token()}}'
            },addRemoveLinks:true,
            removedfile:function (file) {
                $.ajax({
                    dataType:'json',
                    type:'post',
                    url:'{{aurl('delete/image')}}',
                    data:{_token:'{{csrf_token()}}',id:file.fid}
                });
                var fmock;
                return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement): void 0;
            },
            init:function () {
                @foreach($product->files()->get() as $file)
                var mock = {name:'{{$file->name}}',fid:'{{$file->id}}', size:'{{$file->size}}', type:'{{$file->mime_type}}'};
                this.emit('addedfile',mock);
                this.options.thumbnail.call(this,mock,'{{asset('/storage/'.$file->full_file)}}');
                @endforeach
                this.on('sending',function (file,xhr,formData) {
                    formData.append('fid','');
                    file.fid='';
                });
                this.on('success',function (file,response) {
                    file.fid = response.id;

                })
            }
        });
            //main photo
            $('#mainphoto').dropzone({
                url:"{{aurl('update/image/'.$product->id)}}",
                paramName:'file',
                autoDiscover:false,
                uploadMultiple:false,
                maxFiles:1,
                maxFilessize:3,
                acceptedFiles:'image/*',
                dictDefaultMessage:'{{trans('admin.main_photo')}}',
                dictRemoveFile:'{{trans('admin.delete')}}',
                params:{
                    _token:'{{csrf_token()}}'
                },addRemoveLinks:true,
                removedfile:function (file) {
                    $.ajax({
                        dataType:'json',
                        type:'post',
                        url:'{{aurl('delete/product/image/'.$product->id)}}',
                        data:{_token:'{{csrf_token()}}'}
                    });
                    var fmock;
                    return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement): void 0;
                },
                init:function () {

                     @if (!empty($product->photo))
                    var mock = {name:'{{$product->title}}', size:'', type:''};
                    this.emit('addedfile',mock);
                    this.options.thumbnail.call(this,mock,'{{asset('/storage/'.$product->photo)}}');
                  // $('.dz-progress').remove();
                    @endif
                        this.on('sending',function (file,xhr,formData) {
                        formData.append('fid','');
                        file.fid='';
                    });
                    this.on('success',function (file,response) {
                        file.fid = response.id;

                    })
                }
            });
        });
    </script>
    <style>
        img{
            width: 100px;
            height: 100px;
        }
    </style>
    @endpush

    <h3>{{trans('admin.product_media')}}</h3>
    <hr>
    <center> <h1>{{trans('admin.photo_main')}}</h1></center>
    <div class="dropzone" id="mainphoto"></div>
    <hr>
    <center> <h1>{{trans('admin.photo_anther')}}</h1></center>
    <div class="dropzone" id="dropzonefileupload"></div>
