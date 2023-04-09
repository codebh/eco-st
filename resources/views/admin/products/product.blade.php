@extends('admin.index')
@section('content')
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />--}}
{{--@push('js')--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>--}}

{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function() {--}}
{{--            $('.js-example-basic-single').select2();--}}
{{--            $(document).on('click','.save_and_cont',function () {--}}
{{--               var form_data = $('#product_form').serialize();--}}
{{--               $.ajax({--}}
{{--                   url:'{{aurl('products/'.$product->id)}}',--}}
{{--                   dataType:'json',--}}
{{--                   type:'post',--}}
{{--                   data:form_data,--}}
{{--                   beforeSend:function () {--}}
{{--                       $('.loading_save_c').removeClass('hidden');--}}
{{--                       $('.validate_message').html('');--}}
{{--                       $('.error_message').addClass('hidden');--}}
{{--                       $('.success_message').html('').addClass('hidden');--}}
{{--                   },success:function (data) {--}}
{{--                       if (data.status == true){--}}
{{--                       $('.loading_save_c').addClass('hidden');--}}
{{--                       $('.success_message').html('<h1>'+data.message+'</h1>').removeClass('hidden')--}}
{{--                       }--}}
{{--                   },error(response){--}}
{{--                       $('.loading_save_c').addClass('hidden');--}}
{{--                       var error_li = '';--}}
{{--                       $.each(response.responseJSON.errors,function (index,value) {--}}
{{--                           error_li += '<li>'+value+'</li>'--}}
{{--                       });--}}
{{--                       $('.validate_message').html(error_li);--}}
{{--                       $('.error_message').removeClass('hidden');--}}
{{--                   }--}}
{{--               });--}}
{{--               return false;--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--    @endpush--}}



    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$title}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
            {!! Form::open(['url'=>aurl('products'),'method'=>'put','files'=>true,'id'=>'product_form']) !!}
            <a href="#" class="btn btn-primary save">{{trans('admin.save')}} <i class="fa fa-floppy-o"></i></a>
            <a href="#" class="btn btn-success save_and_cont">{{trans('admin.save_and_cont')}} <i class="fa fa-floppy-o"></i>
            <i class="fa fa-spin fa-spinner loading_save_c hidden"></i></a>
            <a href="#" class="btn btn-info copy_product">{{trans('admin.copy_product')}} <i class="fa fa-copy"></i></a>
            <a href="#" class="btn btn-danger delete">{{trans('admin.delete')}} <i class="fa fa-trash"></i></a>
            <hr>
            <div class="alert alert-danger  error_message hidden">
                <ul class="validate_message">
                </ul>
            </div>
            <div class="alert alert-success success_message hidden">


            </div>
            <hr>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{trans('admin.product_info')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">{{trans('admin.department')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">{{trans('admin.product_setting')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="four" aria-selected="true">{{trans('admin.product_media')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="five-tab" data-toggle="tab" href="#five" role="tab" aria-controls="five" aria-selected="false">{{trans('admin.product_size')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="six-tab" data-toggle="tab" href="#six" role="tab" aria-controls="six" aria-selected="false">{{trans('admin.other_data')}}</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                @include('admin.products.tabs.product_info')
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                @include('admin.products.tabs.department')
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                @include('admin.products.tabs.setting')
                            </div>
                            <div class="tab-pane fade" id="four" role="tabpanel" aria-labelledby="four-tab">
                                @include('admin.products.tabs.media')
                            </div>
                            <div class="tab-pane fade" id="five" role="tabpanel" aria-labelledby="five-tab">
                                @include('admin.products.tabs.size')
                            </div>
                            <div class="tab-pane fade" id="six" role="tabpanel" aria-labelledby="six-tab">
                                @include('admin.products.tabs.other_data')
                            </div>
                        </div>





{{--               @include('admin.products.tabs.product_info')--}}
{{--               @include('admin.products.tabs.department')--}}
{{--               @include('admin.products.tabs.setting')--}}
{{--               @include('admin.products.tabs.media')--}}
{{--               @include('admin.products.tabs.size')--}}
{{--               @include('admin.products.tabs.other_data')--}}

            <hr>
            <a href="#" class="btn btn-primary save">{{trans('admin.save')}} <i class="fa fa-floppy-o"></i></a>
            <a href="#" class="btn btn-success save_and_cont">{{trans('admin.save_and_cont')}} <i class="fa fa-floppy-o"></i></a>
            <a href="#" class="btn btn-info copy_product">{{trans('admin.copy_product')}} <i class="fa fa-copy"></i></a>
            <a href="#" class="btn btn-danger delete">{{trans('admin.delete')}} <i class="fa fa-trash"></i></a>





            {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->





@endsection