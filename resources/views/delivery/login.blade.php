


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tafseel | Log in Delivery System </title>
    <link rel="icon" href="{{asset('img/s_logo.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('img/s_logo.png')}}" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('design/admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('design/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('design/admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <img src="{{asset('design/theme/assets/images/Logo-02.png')}}" style="height: 80px; margin: 0px" alt="">
{{--            <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>--}}
        </div>
        <div class="card-body">
            <p class="login-box-msg">Tafseel Delivery System</p>




 {{-- @if (session()->has('error'))

<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">error</h4>
  <p></p>
  <p class="mb-0">cc</p>
</div>
@endif --}}
@if ($errors->has('error'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('error') }}</strong>
    </span>
@endif

{{-- @if ($errors->has('email'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
@endif --}}

{{-- @if(count($errors->all())>0)
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Required!</h5>
                @foreach($errors->all() as $error)
                    <p></p>
                    <p class="mb-0">{{$error}}</p>
                @endforeach
            </div>
        </div>
    </div>



@endif --}}







            <form action="{{route('delivery.login')}}" method="post">
                {{csrf_field()}}
                <div class="input-group mb-3">
                    <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email')is-invalid @endif" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" value="{{old('password')}}" class="form-control @error('password')is-invalid @endif" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
                {{-- @if(session()->has('error'))
                    <div class="alert alert-danger">
                        <h2>{{session('error')}}</h2>
                    </div>
                @endif --}}
            </form>
            <div class="row">
                <div class="col-xs-3 offset-4">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{trans('admin.main_lang')}}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{aurl('lang/ar')}}">عربي  <i class="fa fa-flag"></i></a>
                            <a class="dropdown-item" href="{{aurl('lang/en')}}">English <i class="fa fa-flag"></i></a>

                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('design/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('design/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('design/admin/dist/js/adminlte.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(Session::has('error'))
        @if (direction()== 'ltr')
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    @else
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true,
            "positionClass": "toast-top-left",
        }
    @endif

    // toastr.success("{{ session('message_success') }}");
    // toastr.error("{{ session('error') }}");


    @endif


        @if(count($errors->all())>0)

        @foreach($errors->all() as $error)

        @if (direction()== 'ltr')
        toastr.options =
        {
            "closeButton" : true,
            // "progressBar" : true,
            "timeOut": "0",
        }
    @else
        toastr.options =
        {
            "closeButton" : true,
            // "progressBar" : true,
            "positionClass": "toast-top-left",
            "timeOut": "0",
        }
    @endif
    toastr.error("{{$error}}");

    @endforeach
        @endif

        {{--                @if(Session::has('error'))--}}

        {{--            --}}
        {{--            @endif--}}

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
</body>
</html>
