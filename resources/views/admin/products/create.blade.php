@extends('admin.index')
@section('content')





@livewire('admin.admin-product',['category_master' => $category_master])


























{{--    <section class="content">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h3 class="card-title">{{$title}}</h3>--}}
{{--                    </div>--}}
{{--                    <!-- /.card-header -->--}}
{{--                    <div class="card-body">--}}
{{--            {!! Form::open(['url'=>aurl('products'),'method'=>'put','files'=>true,'id'=>'product_form']) !!}--}}
{{--                        {!! Form::open(['url'=>aurl('products'),'files'=>true]) !!}--}}
{{--            <a href="#" class="btn btn-primary save">{{trans('admin.save')}} <i class="fa fa-floppy-o"></i></a>--}}
{{--            <a href="#" class="btn btn-success save_and_cont">{{trans('admin.save_and_cont')}} <i class="fa fa-floppy-o"></i>--}}
{{--            <i class="fa fa-spin fa-spinner loading_save_c hidden"></i></a>--}}
{{--            <a href="#" class="btn btn-info copy_product">{{trans('admin.copy_product')}} <i class="fa fa-copy"></i></a>--}}
{{--            <a href="#" class="btn btn-danger delete">{{trans('admin.delete')}} <i class="fa fa-trash"></i></a>--}}




{{--                        <ul class="nav nav-tabs" id="myTab" role="tablist">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{trans('admin.product_info')}}</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">{{trans('admin.item&shop')}}</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" id="size-tab" data-toggle="tab" href="#size" role="tab" aria-controls="size" aria-selected="false">{{trans('admin.sizes')}}</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" id="six-tab" data-toggle="tab" href="#six" role="tab" aria-controls="six" aria-selected="false">{{trans('admin.Primary_color')}}</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" id="color-tab" data-toggle="tab" href="#color" role="tab" aria-controls="color" aria-selected="false">{{trans('admin.Secondery_color')}}</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" id="media-tab" data-toggle="tab" href="#media" role="tab" aria-controls="media" aria-selected="false">{{trans('admin.product_image')}}</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <div class="tab-content" id="myTabContent">--}}
{{--                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">--}}
{{--                                @include('admin.products.tabs.product_info')--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">--}}
{{--                                @include('admin.products.tabs.department')--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane fade" id="six" role="tabpanel" aria-labelledby="six-tab">--}}
{{--                                @include('admin.products.tabs.other_data')--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane fade" id="size" role="tabpanel" aria-labelledby="size-tab">--}}
{{--                                @include('admin.products.tabs.size')--}}

{{--                            </div>--}}
{{--                            <div class="tab-pane fade" id="color" role="tabpanel" aria-labelledby="color-tab">--}}
{{--                                @include('admin.products.tabs.other_color')--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">--}}
{{--                                @include('admin.products.tabs.product_images')--}}
{{--                            </div>--}}
{{--                        </div>--}}





{{--               @include('admin.products.tabs.product_info')--}}
{{--               @include('admin.products.tabs.department')--}}
{{--               @include('admin.products.tabs.setting')--}}
{{--               @include('admin.products.tabs.media')--}}
{{--               @include('admin.products.tabs.size')--}}
{{--               @include('admin.products.tabs.other_data')--}}

{{--            <hr>--}}
{{--            --}}{{--<a href="#" class="btn btn-primary save">{{trans('admin.save')}} <i class="fa fa-floppy-o"></i></a>--}}
{{--            --}}{{--<a href="#" class="btn btn-success save_and_cont">{{trans('admin.save_and_cont')}} <i class="fa fa-floppy-o"></i></a>--}}
{{--            <a href="#" class="btn btn-info copy_product">{{trans('admin.copy_product')}} <i class="fa fa-copy"></i></a>--}}
{{--            <a href="#" class="btn btn-danger delete">{{trans('admin.delete')}} <i class="fa fa-trash"></i></a>--}}





{{--            {!! Form::submit(trans('admin.save'),['class'=>'btn btn-success btn-lg']) !!}--}}
{{--            {!! Form::close() !!}--}}
{{--        </div>--}}
{{--        <!-- /.card-body -->--}}
{{--    </div>--}}
{{--    <!-- /.card -->--}}
{{--    </div>--}}
{{--    <!-- /.col -->--}}
{{--    </div>--}}
{{--    <!-- /.row -->--}}
{{--    </section>--}}
    <!-- /.content -->





@endsection
