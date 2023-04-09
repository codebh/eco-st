
<div class="wrapper">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    @include('admin.layouts.menu')
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ aurl() }}" class="brand-link">
        <img src="{{asset('img/s_logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Tafseel-Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
{{--            <div class="image">--}}
{{--                <img src="{{asset('design/admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">--}}
{{--            </div>--}}
            <div class="info">
                <a href="{{ aurl() }}" class="d-block">{{admin()->user()->name}}</a>
{{--                <a href="#" class="d-block">admin</a>--}}
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item has-treeview {{active_menu('dashboard')[0]}}">
                    <a href="#" class="nav-link ">
                        @if(direction()=='ltr')
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                {{trans('admin.dashboard')}}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        @else
                            <p>
                                {{trans('admin.dashboard')}}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        <i class="nav-icon fas fa-building"></i>

                        @endif



                    </a>
                    <ul class="nav nav-treeview" style="{{active_menu('dashboard')[1]}}">
                        <li class="nav-item">
                            <a href="{{aurl('')}}" class="nav-link">
                                @if(direction()=='ltr')
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.dashboard')}}</p>
                                    @else
                                <p>{{trans('admin.dashboard')}}</p>
                                    <i class="far fa-circle nav-icon"></i>

                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('settings')}}" class="nav-link">
                                @if(direction()=='ltr')
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{trans('admin.settings')}}</p>
                                @else
                                    <p>{{trans('admin.settings')}}</p>
                                    <i class="far fa-circle nav-icon"></i>
                                @endif

                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview {{active_menu('admin')[0]}}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{trans('admin.admin')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{active_menu('admin')[1]}}">
                        <li class="nav-item">
                            <a href="{{aurl('admin')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.admin')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('admin/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.add')}}</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview {{active_menu('delivery')[0]}}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{trans('admin.delivery')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{active_menu('delivery')[1]}}">
                        <li class="nav-item">
                            <a href="{{aurl('delivery')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.delivery')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('delivery/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.add')}}</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview {{active_menu('users')[0]}}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{trans('admin.users')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{active_menu('users')[1]}}">
                        <li class="nav-item">
                            <a href="{{aurl('users')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.users')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('users')}}?level=user" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.user')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('users')}}?level=vendor" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.vendor')}}</p>
                            </a>
                        </li>
                       <li class="nav-item">
                            <a href="{{aurl('users')}}?level=company" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.company')}}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{aurl('users/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.add')}}</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview {{active_menu('stores')[0]}}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{trans('admin.shops')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{active_menu('stores')[1]}}">
                        <li class="nav-item">
                            <a href="{{aurl('stores')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.shops')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('stores/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.add')}}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('update_password_store') }}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>update all password for sellet</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview {{active_menu('coupons')[0]}}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-percentage"></i>
                        <p>
                            {{trans('admin.coupon')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{active_menu('coupons')[1]}}">

                        <li class="nav-item">
                            <a href="{{aurl('coupons')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.coupon')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('coupons/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.add')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('coupons-multi')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.coupons_count')}}</p>
                            </a>
                        </li>


                    </ul>
                </li>




                <li class="nav-item has-treeview {{active_menu('categories')[0]}}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-percentage"></i>
                        <p>
                            {{trans('admin.categories')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{active_menu('categories')[1]}}">
                        <li class="nav-item">
                            <a href="{{aurl('categories')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.categories')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('categories/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.add')}}</p>
                            </a>
                        </li>


                    </ul>
                </li>



                <li class="nav-item has-treeview {{active_menu('colors')[0]}}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{trans('admin.colors')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{active_menu('colors')[1]}}">
                        <li class="nav-item">
                            <a href="{{aurl('colors')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.colors')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('colors/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.add')}}</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview {{active_menu('tag')[0]}}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{trans('admin.tags')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{active_menu('tag')[1]}}">
                        <li class="nav-item">
                            <a href="{{aurl('tag')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.tags')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('tag/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.add')}}</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview {{active_menu('sizes')[0]}}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-ruler"></i>
                        <p>
                            {{trans('admin.sizes')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{active_menu('sizes')[1]}}">
                        <li class="nav-item">
                            <a href="{{aurl('sizes')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.sizes')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('sizes/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.add')}}</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview {{active_menu('products')[0]}}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{trans('admin.products')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
{{--
                    <ul class="nav nav-treeview" style="{{active_menu('products')[1]}}">
                        <li class="nav-item">
                            <a href="{{aurl('products')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.products')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('products/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.add')}}</p>
                            </a>
                        </li>


                    </ul> --}}
                    <ul class="nav nav-treeview {{active_menu('add_product')[1]}}">
                        <li class="nav-item">
                            <a href="{{aurl('products')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.products')}}</p>
                            </a>
                        </li>
                        @forelse (App\Models\Category::all() as $category)
                            <li class="nav-item">
                                <a href="{{aurl('products/category/create/'.$category->name_en)}}" class="nav-link">
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
                <li class="nav-item has-treeview {{active_menu('orders')[0]}}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{trans('admin.orders')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{active_menu('orders')[1]}}">
                        <li class="nav-item">
                            <a href="{{aurl('orderProduct')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.orders')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('orderProduct/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.add')}}</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview {{active_menu('reports')[0]}}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{trans('admin.report')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{active_menu('report')[1]}}">
                        <li class="nav-item">
                            <a href="{{aurl('months')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.report')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('months/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.add')}}</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview {{active_menu('ads')[0]}}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{trans('admin.ads')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{active_menu('ads')[1]}}">
                        <li class="nav-item">
                            <a href="{{aurl('ads')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.ads')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('ads/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.add')}}</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview {{active_menu('camp')[0]}}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{trans('admin.camp')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{active_menu('camp')[1]}}">
                        <li class="nav-item">
                            <a href="{{aurl('campaign')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.camp')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('campaign/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.add')}}</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview {{active_menu('blog')[0]}}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{trans('admin.blog')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{active_menu('blog')[1]}}">
                        <li class="nav-item">
                            <a href="{{aurl('blog')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.blog')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('blog/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.add')}}</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview {{active_menu('faq')[0]}}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{trans('admin.faqs')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{active_menu('faq')[1]}}">
                        <li class="nav-item">
                            <a href="{{aurl('faq')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.faqs')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('faq/create')}}" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>{{trans('admin.add')}}</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview {{active_menu('guide')[0]}}">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-clipboard-list nav-icon"></i>
                        <p>
                            {{trans('admin.help')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="{{active_menu('guide')[1]}}">
                        <li class="nav-item">

                            <a href="{{aurl('guide')}}" class="nav-link"><i class="fas far fa-circle nav-icon"></i>
                                <p>{{trans('admin.help')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{aurl('guide/create')}}" class="nav-link"><i class="fas far fa-circle nav-icon"></i>
                                <p>{{trans('admin.add')}}</p>
                            </a>
                        </li>


                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
