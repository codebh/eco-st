<?php

use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Report;
use App\Models\Store;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {


    Config::set('auth.defines', 'admin');

    Route::get('login', 'AdminAuthController@login');
    Route::post('login', 'AdminAuthController@dologin');
    Route::get('forgot/password', 'AdminAuthController@forgot_password');
    Route::post('forgot/password', 'AdminAuthController@forgot_password_post');
    Route::get('reset/password/{token}', 'AdminAuthController@reset_password');
    Route::post('reset/password/{token}', 'AdminAuthController@reset_password_final');
    Route::group(['middleware' => 'admin:admin'], function () {
        Route::get('/', function () {
//    return view('welcome');


            $start    = Carbon::now()->startOfYear();
            $end      = Carbon::now()->endOfYear();
            $interval = DateInterval::createFromDateString('1 month');
            $period   = new DatePeriod($start, $interval, $end);

            $months = array();

            foreach ($period as $dt) {
                $months[] = $dt->format("M");
            }

//        print_r($months);


            $chart = (new LarapexChart)->barChart()
//            ->setTitle('San Francisco vs Boston.')
//            ->setSubtitle('Wins during season 2021.')
                ->addData('orders', [
                    OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '01')->count(),
                    OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '02')->count(),
                    OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '03')->count(),
                    OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '04')->count(),
                    OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '05')->count(),
                    OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '06')->count(),
                    OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '07')->count(),
                    OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '08')->count(),
                    OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '09')->count(),
                    OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '10')->count(),
                    OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '11')->count(),
                    OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '12')->count(),

                ])
//            ->addData('San Francisco', [16,20,25,45,30,20,16,20,25,45,30,20])
//            ->addData('Boston', [7, 3, 8, 2, 6, 4])
                ->setXAxis($months)
                ->setColors([ '#17A2B8']);





            $chart02 =(new LarapexChart)->donutChart()



                ->addData([
                    OrderProduct::where('shipped', '0')->count(),
                    OrderProduct::where('shipped', '1')->count(),
                    OrderProduct::whereBetween('shipped', [2,4])->count(),
                ])

                ->setColors(['#DC3545', '#FFC107', '#28A745'])
                ->setGrid(false, '#3F51B5', 0.1)
                ->setLabels([trans('shop.orderStep'),trans('shop.orderStep1'), trans('shop.orderStep2')]);

            $chart03 = (new LarapexChart)->lineChart()
                ->addData('BHD',
                    [
                        OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '01')->sum('price'),
                        OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '02')->sum('price'),
                        OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '03')->sum('price'),
                        OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '04')->sum('price'),
                        OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '05')->sum('price'),
                        OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '06')->sum('price'),
                        OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '07')->sum('price'),
                        OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '08')->sum('price'),
                        OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '09')->sum('price'),
                        OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '10')->sum('price'),
                        OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '11')->sum('price'),
                        OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '12')->sum('price'),
                    ])

                    ->addData('tafseel fees-BHD',
                    [
                        number_format((float) OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '01')->sum('price')*0.10,2),
                         number_format((float) OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '02')->sum('price')*0.10,2),
                         number_format((float) OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '03')->sum('price')*0.10,2),
                         number_format((float) OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '04')->sum('price')*0.10,2),
                         number_format((float) OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '05')->sum('price')*0.10,2),
                         number_format((float) OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '06')->sum('price')*0.10,2),
                         number_format((float) OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '07')->sum('price')*0.10,2),
                         number_format((float) OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '08')->sum('price')*0.10,2),
                         number_format((float) OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '09')->sum('price')*0.10,2),
                         number_format((float) OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '10')->sum('price')*0.10,2),
                         number_format((float) OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '11')->sum('price')*0.10,2),
                         number_format((float) OrderProduct::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '12')->sum('price')*0.10,2),
                    ])

                ->setXAxis($months)
            ->setColors([ '#8E9AA4','#726189']);



            $chart04 = (new LarapexChart)->AreaChart()

            ->addData('New Users',
                [
                    User::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '01')->count(),
                    User::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '02')->count(),
                    User::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '03')->count(),
                    User::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '04')->count(),
                    User::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '05')->count(),
                    User::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '06')->count(),
                    User::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '07')->count(),
                    User::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '08')->count(),
                    User::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '09')->count(),
                    User::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '10')->count(),
                    User::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '11')->count(),
                    User::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '12')->count(),
                ])

                ->addData('New Stores',
                [
                    Store::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '01')->count(),
                    Store::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '02')->count(),
                    Store::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '03')->count(),
                    Store::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '04')->count(),
                    Store::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '05')->count(),
                    Store::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '06')->count(),
                    Store::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '07')->count(),
                    Store::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '08')->count(),
                    Store::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '09')->count(),
                    Store::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '10')->count(),
                    Store::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '11')->count(),
                    Store::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '12')->count(),
                ])

            ->setXAxis($months)
        ->setColors([ '#317087','#CB4E41']);

        // dd( User::whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '05')->count());

$all_orders = OrderProduct::all()->sum('price');
$tafseel_fees =$all_orders * 0.10;

        $chart05 = (new LarapexChart)->PieChart()

                ->addData([$all_orders, $tafseel_fees])
                ->setLabels(['all fees', 'tafseel fees'])
                ->setColors(['#8E9AA4', '#726189']);


                $products = Product::where('show','pending')->count();
                $products_approved = Product::where('show','approved')->count();
                $stores = Store::all()->count();
                $chart06 = (new LarapexChart)->PolarAreaChart()
                ->addData([$products, $products_approved])
                ->setLabels(['pending', 'approved'])
                ->setColors([ '#FFCE53','#CB4E41']);





            return view('admin.dashboard')
                ->with([
                    'chart'=> $chart,
                    'chart02'=> $chart02,
                    'chart03'=> $chart03,
                    'chart04'=> $chart04,
                    'chart05'=> $chart05,
                    'chart06'=> $chart06,
                ]);
        })->name('admin.dashboard');
//        logout Route
        Route::any('logout', 'AdminAuthController@logout');
        //Admin Controller
        Route::resource('admin', 'AdminController');
        Route::delete('admin/destroy/all', 'AdminController@multi_delete');
          //Admin Controller
          Route::resource('delivery', 'DeliveryController');

         //Admin Controller
        Route::resource('admin', 'AdminController');
        Route::delete('admin/destroy/all', 'AdminController@multi_delete');

        //Setting Controller
        Route::get('settings', 'SettingController@setting');
        Route::post('settings', 'SettingController@setting_save');


//        Users Contoller
        Route::resource('users', 'UsersController');
        Route::delete('users/destroy/all', 'UsersController@multi_delete');
//        Stores Controller
        Route::resource('stores', 'StoresController');
        Route::delete('stores/destroy/all', 'StoresController@multi_delete');
        Route::post('stores/close/{id}', 'StoresController@update_close')->name('update_close');
        Route::get('/password-store', 'StoresController@update_password')->name('update_password_store');
        // Route::get('/password-store', function () {
        //     $store = Store::all();
        //     foreach($store as $item){
        //         // Store::where('id',$item->id)->update('')
        //         $shop = Store::find($item->id);
        //         $shop->password =$item->password;
        //         $shop->save();
        //     }
        //     // dd('faisal bader');
        //     return redirect()->back();
        // });

        //coupons Controller
        Route::resource('coupons', 'CouponController');
        // Route::get('/password-store', 'StoresController@update_password')->name('update_password_store');

        Route::get('/coupons-multi','CouponController@multi');
        Route::post('/coupons-multi','CouponController@multiCoupons')->name('multiCoupon');
        //ColorsController
        Route::resource('colors', 'ColorController');
        Route::delete('colors/destroy/all', 'ColorController@multi_delete');

        //Sizes Controller
        Route::resource('sizes', 'SizeController');
        Route::delete('sizes/destroy/all', 'SizeController@multi_delete');
        //ColorsController
        Route::resource('categories', 'CategoryController');
        Route::delete('categories/destroy/all', 'CategoryController@multi_delete');
        //ProductController
        Route::resource('products', 'ProductController');
        Route::delete('products/destroy/all', 'ProductController@multi_delete');
        Route::get('products/single/{id}', 'ProductController@singleDelete')->name('delete.single.image');
        Route::get('products/category/create/{id}', 'ProductController@showCreate')->name('product.category.create');
        // Route::post('products/status/{id}', 'ProductController@changeStatus');
        // Route::put('products/state/{id}', 'ProductController@update_status')->name('update_product.state');
        // Route::get('products/state/{id}',[\App\Http\Controllers\Admin\ProductController::class,'update_status'] );
        Route::post('products_change/state/{id}', 'ProductController@update_status')->name('products.state');

        Route::post('showShop/tag/{id}', 'ProductController@tags')->name('product.view.tags.admin');

        //orderProduct with Shop
        Route::resource('orderProduct', 'OrderProductController');
        Route::post('orderProduct/state/{id}', 'OrderProductController@update_status')->name('order.state');
        Route::delete('orderProduct/destroy/all', 'OrderProductController@multi_delete');
//        report controller
        Route::resource('months', 'ReportController');
        Route::get('months/PDF/{id}', 'ReportController@downloadPDF')->name('month.pdf');
//tags Controller
        Route::resource('tag', 'TagController');
        Route::delete('tag/destroy/all', 'TagController@multi_delete');


        //ads Controller
        Route::resource('ads', 'AdsController');
        Route::delete('ads/destroy/all', 'AdsController@multi_delete');
        //Faqs Controller
        Route::resource('faq', 'FaqsController');
        Route::delete('faq/destroy/all', 'FaqsController@multi_delete');
        //Faqs Controller
        Route::resource('guide', 'GuideController');
        Route::delete('guide/destroy/all', 'GuideController@multi_delete');

        //Blog Controller
        Route::resource('blog', 'BlogController');
        Route::delete('blog/destroy/all', 'BlogController@multi_delete');


        //Blog Controller
        Route::resource('campaign', 'CampaignController');
        Route::delete('campaign/destroy/all', 'CampaignController@multi_delete');



        // //Cart Controller
        // Route::resource('cart', 'CartController');
        // Route::delete('cart/destroy/all', 'CartController@multi_delete');



    });


//    Lang Route
    Route::get('lang/{lang}', function ($lang) {
        session()->has('lang') ? session()->forget('lang') : '';
        $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
        return back();
    });

});
