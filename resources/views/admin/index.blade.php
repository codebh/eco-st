@include('admin.layouts.header')
@include('admin.layouts.navbar')
<style>
    .dataTable{
        overflow-x: auto;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
{{--    <div class="content-header">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row mb-2">--}}
{{--                <div class="col-sm-6">--}}
{{--                    <h1 class="m-0 text-dark">Dashboard v3</h1>--}}
{{--                </div><!-- /.col -->--}}
{{--                <div class="col-sm-6">--}}
{{--                    <ol class="breadcrumb float-sm-right">--}}
{{--                        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                        <li class="breadcrumb-item active">Dashboard v3</li>--}}
{{--                    </ol>--}}
{{--                </div><!-- /.col -->--}}
{{--            </div><!-- /.row -->--}}
{{--        </div><!-- /.container-fluid -->--}}
{{--    </div>--}}
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
@include('admin.layouts.message')
        @yield('content')
        @include('sweetalert::alert')
    </div>
</div>



@include('admin.layouts.footer')
