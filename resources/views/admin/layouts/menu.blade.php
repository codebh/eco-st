

<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>

</ul>

@if(direction()=='ltr')
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{trans('admin.main_lang')}} <i class="fa  fa-flag"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{aurl('lang/ar')}}"><i class="fa fa-flag">عربي</i></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{aurl('lang/en')}}"><i class="fa fa-flag">English</i></a>

            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-user-cog"></i>

            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">


                <a href="#" class="dropdown-item">
                    <i class="fas fa-cogs mr-2"></i>setting

                </a>
                <div class="dropdown-divider"></div>
                <a href="{{url('admin/logout')}}" class="dropdown-item">
                    <i class="fa fa-sign-out-alt mr-2"></i> Logout

                </a>


            </div>
        </li>
        {{--    <li class="nav-item">--}}
        {{--        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i--}}
        {{--                    class="fas fa-th-large"></i></a>--}}
        {{--    </li>--}}
    </ul>
@else
    <!-- Right navbar links -->
    <ul class="navbar-nav" style="">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{trans('admin.main_lang')}} <i class="fa  fa-flag"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{aurl('lang/ar')}}"><i class="fa fa-flag">عربي</i></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{aurl('lang/en')}}"><i class="fa fa-flag">English</i></a>

            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-user-cog"></i>

            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">


                <a href="#" class="dropdown-item">
                    {{trans('admin.shop.setting')}}  <i class="fas fa-cogs mr-2"></i>

                </a>
                <div class="dropdown-divider"></div>
                <a href="{{url('admin/logout')}}" class="dropdown-item">
                    {{trans('admin.logout')}}<i class="fa fa-sign-out-alt mr-2"></i>

                </a>


            </div>
        </li>
        {{--    <li class="nav-item">--}}
        {{--        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i--}}
        {{--                    class="fas fa-th-large"></i></a>--}}
        {{--    </li>--}}
    </ul>

@endif

{{----}}
