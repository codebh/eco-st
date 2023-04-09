<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        @include('store.layouts.menu')
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
{{--        <a href="{{surl('/')}}" class="brand-link">--}}
{{--            <img src="{{asset('design/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--                 style="opacity: .8">--}}
{{--            <span class="brand-text font-weight-light">{{store()->user()->name}}</span>--}}
{{--        </a>--}}

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{imageDo(shop()->user()->logo)}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{surl('/')}}" class="d-block">{{shop()->user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="font-family: 'Cairo', sans-serif;">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->


                    <li class="nav-item">
                        <a href="{{surl('/')}}" class="nav-link">
                            @if(direction()=='ltr')
                                <i class="fas fa-columns nav-icon"></i>

                                <p>{{trans('admin.dashboard')}}</p>
                            @else
                                <p>{{trans('admin.dashboard')}}</p>
                                <i class="fas fa-columns nav-icon"></i>

                            @endif
                        </a>
                    </li>
                    <li class="nav-item" style="{{active_menu('report')[1]}}">
                        <a href="{{route('help.store')}}" class="nav-link">
                            @if(direction()=='ltr')
                            <i class="fas fa-clipboard-list nav-icon"></i>

                                <p>{{trans('shop.help')}}</p>
                            @else
                                <p>{{trans('shop.help')}}</p>

                                <i class="fas fa-clipboard-list nav-icon"></i>
                            @endif

                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{surl('profile')}}" class="nav-link">--}}
{{--                            @if(direction()=='ltr')--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>{{trans('shop.settings')}}</p>--}}
{{--                            @else--}}
{{--                                <p>{{trans('shop.settings')}}</p>--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                            @endif--}}

{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a href="{{surl('shopOrders')}}" class="nav-link">
                            @if(direction()=='ltr')
                                <i class="fas fa-shopping-bag nav-icon"></i>
                                <p>{{trans('shop.orders')}}</p>
                            @else
                                <p>{{trans('shop.orders')}}</p>
                                <i class="fas fa-shopping-bag nav-icon"></i>
                            @endif

                        </a>
                    </li>






                    <li class="nav-item" style="{{active_menu('report')[1]}}">
                        <a href="{{surl('reports')}}" class="nav-link">
                            @if(direction()=='ltr')
                                <i class="fas fa-server nav-icon"></i>
                                <p>{{trans('shop.reports')}}</p>
                            @else
                                <p>{{trans('shop.reports')}}</p>
                                <i class="fas fa-server nav-icon"></i>
                            @endif

                        </a>
                    </li>

                    <li class="nav-item has-treeview {{active_menu('showShop')[0]}}">
                        <a href="#" class="nav-link ">
                            @if(direction()=='ltr')
                                <i class=" nav-icon fas fa-tshirt"></i>
                                <p>
                                    {{trans('shop.productsOrders')}}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            @else
                                <p>
                                    {{trans('shop.productsOrders')}}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                                <i class=" nav-icon fas fa-tshirt"></i>


                            @endif



                        </a>
                        <ul class="nav nav-treeview {{active_menu('showShop')[1]}}">
                            <li class="nav-item">
                                <a href="{{surl('showShop')}}" class="nav-link">
                                    @if(direction()=='ltr')
                                      <i class=" nav-icon fas fa-tshirt"></i>
                                        <p>{{trans('shop.products')}}</p>
                                    @else
                                        <p>{{trans('shop.products')}}</p>
                                  <i class=" nav-icon fas fa-tshirt"></i>

                                    @endif
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('product.pending')}}" class="nav-link">
                                    @if(direction()=='ltr')
                                      <i class=" nav-icon fas fa-tshirt"></i>
                                        <p>{{trans('shop.products_pending')}}</p>
                                    @else
                                        <p>{{trans('shop.products_pending')}}</p>
                                  <i class=" nav-icon fas fa-tshirt"></i>

                                    @endif
                                </a>
                            </li>


                            <li class="nav-item has-treeview {{active_menu('add_product')[0]}}">
                                <a href="#" class="nav-link ">
                                    @if(direction()=='ltr')
{{--                                        <i class="nav-icon fas fa-shopping-bag"></i>--}}
                                            <i class=" nav-icon fas fa-plus-circle"></i>
                                        <p>
                                            {{trans('shop.add_new_product')}}
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    @else
                                        <p>
                                            {{trans('shop.add_new_product')}}
                                            <i class="right fas fa-angle-left"></i>
{{--                                        <i class="nav-icon fas fa-shopping-bag"></i>--}}
                                        </p>
                                            <i class="fas fa-plus-circle nav-icon"></i>

                                    @endif



                                </a>

                                <ul class="nav nav-treeview {{active_menu('add_product')[1]}}">
                                    @forelse (App\Models\Category::all() as $category)
                                        <li class="nav-item">
                                            <a href="{{surl('add_product/'.$category->name_en)}}" class="nav-link">
                                                @if(direction()=='ltr')
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>{{$category->name_en}}</p>
                                                @else
                                                    <p>{{$category->name_ar}}</p>
                                                    {{--                                            <p>{{trans('shop.add_new_product')}}</p>--}}
                                                    <i class="far fa-circle nav-icon"></i>

                                                @endif
                                            </a>
                                        </li>
                                    @empty
                                        <li class="nav-item">
                                            <a href="{{surl('showShop')}}" class="nav-link">
                                                @if(direction()=='ltr')
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>{{trans('shop.add_new_product')}}</p>
                                                @else
                                                    <p>{{trans('shop.add_new_product')}}</p>
                                                    <i class="far fa-circle nav-icon"></i>

                                                @endif
                                            </a>
                                        </li>
                                    @endforelse




                                </ul>
                            </li>


                        </ul>
                    </li>











                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
