@extends('store.index')
@section('content')

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
                                     src="{{imageDo(shop()->user()->logo)}}"
                                     alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{shop()->user()->name}}</h3>

                            <p class="text-muted  text-center">{{ trans('shop.date_join') }}:
                                {{shop()->user()->created_at->format('Y-m-d')}}
                            </p>

                            <p class="text-muted text-center">{{shop()->user()->email}}</p>

                            @if (shop()->user()->close =='yes')
                            <div class="text-center">
                                <h4>
                                  <label class="p-3 badge badge-danger">   {{ trans('shop.profile_statu_close') }} {{shop()->user()->date_of_end  }}</label>
                                </h1>
                            </div>

                            @else
                            <div class="text-center">
                                <h4>
                                  <label class="p-3 badge badge-success">
                                    {{ trans('shop.profile_statu_open') }}
                                </label>
                                </h1>
                            </div>


                            @endif



                                    <hr>
                                    @if (shop()->user()->close =='yes')

                                    <form action="{{ route('user.shopStatus') }}" method="post">
                                        @csrf
                                        <input type="text" name="close" hidden value="no">
                                        <button class="btn btn-primary btn-block">
                                            <b>
                                                {{ trans('shop.profile_button_2') }}
                                            </b>
                                        </button>

                                    </form>

                                    @else
                                    <form action="{{ route('user.shopStatus') }}" method="post">
                                        @csrf
                                        <div class="col">
                                            <input type="text" name="close" hidden value="yes">
                                            <div class="form-group">
                                              <label for="">{{ trans('shop.profile_date') }}</label>
                                              <input type="date"
                                                class="form-control" name="date_of_end" id="" aria-describedby="helpId" placeholder="">
                                            </div>

                                            <div class="form-group">
                                              <label for="">{{ trans('shop.profile_reason') }}</label>

                                                <textarea name="reason"  class="form-control" ></textarea>
                                            </div>
                                            <button class="btn btn-danger btn-block"><b> {{ trans('shop.profile_button_1') }}
                                                                                    </b></button>
                                        </div>
                                        </form>

                                    @endif

                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                {{--                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>--}}
                                <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">{{ trans('shop.info') }}</a></li>
                                <li class="nav-item"><a class="nav-link " href="#settings" data-toggle="tab">{{ trans('shop.change_password') }}</a></li>
                                <li class="nav-item"><a class="nav-link " href="#bio" data-toggle="tab">{{ trans('shop.change_bio') }}</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">


                                <div class=" tab-pane active " id="timeline">
                                    <div class="row">


                                        <div class="col-md-6">
                                            <div class="callout callout-info">
                                                <h5>{{trans('shop.iban')}}</h5>

                                                <p>{{shop()->user()->iban}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="callout callout-info">
                                                <h5>{{trans('shop.shop_name')}}</h5>

                                                <p>{{shop()->user()->name}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="callout callout-info">
                                                <h5>{{trans('shop.shop_phone')}}</h5>

                                                <p>{{shop()->user()->mobile}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="callout callout-info">
                                                <h5>{{trans('shop.shop_email')}}</h5>

                                                <p>{{shop()->user()->email}}</p>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="callout callout-info">
                                                <h5>{{trans('shop.percentage')}}</h5>

                                                <p>{{getPercentage(shop()->user()->percentage)}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="callout callout-info">
                                                <h5>{{trans('shop.i_account')}}</h5>

                                                <p>{{shop()->user()->i_account}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="callout callout-info">
                                                <h5>{{trans('shop.shop_address')}}</h5>

                                                <p>{{shop()->user()->address}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="callout callout-info">
                                                <h5>{{trans('shop.shop_cr')}}</h5>

                                                <p>{{shop()->user()->cr}}</p>
                                            </div>
                                        </div>

                                        <!-- /.col -->
                                    </div>
                                </div>

                                <div class=" tab-pane " id="settings">
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
                                            <label for="password" class="col-sm-4 control-label">{{ trans('shop.new_password') }}</label>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" id="password"
                                                           name="password" placeholder="Password">
                                                </div>
                                            </div>
                                            <label for="password_confirmation" class="col-sm-4 control-label">{{ trans('shop.re_enter_password') }}</label>
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
                                                <button type="submit" class="btn btn-danger">{{ trans('shop.submit') }}</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                                <div class=" tab-pane " id="bio">
                                    <form id="form-change-password" role="form" method="POST"
                                          action="{{route('user.changeBio')}}" novalidate class="form-horizontal">
                                        {{csrf_field()}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">{{ trans('shop.change_bio') }}</label>
                                                {{ Form::textarea('bio', shop()->user()->bio, ['class' => 'form-control',]) }}
{{--                                               <textarea name="bio" id="summernote" cols="30" rows="10"value class="form-control"></textarea>--}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-5 col-sm-6">
                                                <button type="submit" class="btn btn-danger">{{ trans('shop.submit') }}</button>
                                            </div>
                                        </div>
                                    </form>
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
