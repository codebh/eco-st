@include('store.layouts.header')
{{--@include('shop.layouts.menu')--}}
@include('store.layouts.navbar')


{{--@include('shop.layouts.message')--}}

{{--@include('shop.layouts.message')--}}

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
{{--    <div class="content-header">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row mb-2">--}}
{{--                <div class="col-sm-6">--}}
{{--                    <h1 class="m-0 text-dark">{{trans('shop.control_panel')}} </h1>--}}
{{--                </div><!-- /.col -->--}}

{{--            </div><!-- /.row -->--}}
{{--        </div><!-- /.container-fluid -->--}}
{{--    </div>--}}
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        @include('admin.layouts.message')

        @yield('content')
    </div>
</div>
@include('store.layouts.footer')



