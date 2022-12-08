@extends('store.index')
@section('content')
    {{--    <!-- Content Header (Page header) -->--}}
    {{--    <section class="content-header">--}}
    {{--        <div class="container-fluid">--}}
    {{--            <div class="row mb-2">--}}
    {{--                <div class="col-sm-6">--}}
    {{--                    <h1>Profile</h1>--}}
    {{--                </div>--}}
    {{--                <div class="col-sm-6">--}}
    {{--                    <ol class="breadcrumb float-sm-right">--}}
    {{--                        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
    {{--                        <li class="breadcrumb-item active">User Profile</li>--}}
    {{--                    </ol>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div><!-- /.container-fluid -->--}}
    {{--    </section>--}}

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{ imageDo(shop()->user()->logo) }}"
                                     alt="User profile picture">
                            </div>

                            {{-- <h3 class="profile-username text-center">{{shop()->user()->code}}</h3> --}}

                            {{-- <p class="text-muted text-center">{{shop()->user()->email}}</p> --}}


                            <button class="btn btn-primary btn-block"><b>Date
                                    Join: {{shop()->user()->created_at->format('yy-m-d')}}</b></button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                {{--                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>--}}
                                <li class="nav-item"><a class="nav-link " href="#settings" data-toggle="tab">Change
                                        Password</a></li>
                                <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Info</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">

                                <div class=" tab-pane" id="settings">
                                    <form id="form-change-password" role="form" method="POST"
                                          action="{{route('user.change')}}" novalidate class="form-horizontal">
                                        <div class="col-md-9">
                                            {{--                                            <label for="current-password" class="col-sm-4 control-label">Current Password</label>--}}
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    {{--                                                    <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Password">--}}
                                                </div>
                                            </div>
                                            <label for="password" class="col-sm-4 control-label">New Password</label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" id="password"
                                                           name="password" placeholder="Password">
                                                </div>
                                            </div>
                                            <label for="password_confirmation" class="col-sm-4 control-label">Re-enter
                                                Password</label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="password" class="form-control"
                                                           id="password_confirmation" name="password_confirmation"
                                                           placeholder="Re-enter Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-5 col-sm-6">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class=" tab-pane active" id="timeline">
                                    <div class="row">


                                            <div class="col-md-6">
                                                <div class="callout callout-info">
                                                    <h5>IBAN</h5>

                                                    <p>BBKU12345678821545451212</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="callout callout-info">
                                                    <h5>Shop Name</h5>

                                                    <p>There it</p>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="callout callout-info">
                                                    <h5>Shop Phone</h5>

                                                    <p>17221722</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="callout callout-info">
                                                    <h5>Shop Area</h5>

                                                    <p>Arad</p>
                                                </div>
                                            </div>

                                        <!-- /.col -->
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>

                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
@endsection
