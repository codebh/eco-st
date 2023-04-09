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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-language"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{aurl('lang/ar')}}">عربي</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{aurl('lang/en')}}">English</a>


            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-user-cog"></i>

            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="{{route('profile')}}" class="dropdown-item">
                    <i class="fas fa-cogs mr-2"></i>
                    {{trans('shop.setting')}}
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{route('store.logout')}}" class="dropdown-item">
                    <i class="fa fa-sign-out-alt mr-2"></i>
                    {{trans('shop.logout')}}
                </a>


            </div>
        </li>

    </ul>
@else
    <!-- Right navbar links -->
    <ul class="navbar-nav" style="font-family: 'Cairo', sans-serif">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false" >
               <i class="fas fa-language"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"  href="{{aurl('lang/ar')}}"  style="font-family: 'Cairo', sans-serif">
                 عربي</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{aurl('lang/en')}}">English</a>

            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-user-cog"></i>

            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">


                <a href="{{route('profile')}}" class="dropdown-item">
                    {{trans('admin.shop.setting')}} <i class="fas fa-cogs mr-2"></i>

                </a>
                <div class="dropdown-divider"></div>
                <a href="{{route('store.logout')}}" class="dropdown-item">
                    {{trans('admin.logout')}}<i class="fa fa-sign-out-alt mr-2"></i>

                </a>


            </div>
        </li>

    </ul>

@endif
