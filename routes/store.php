<?php

use App\Http\Controllers\Store\AuthenticatedSessionController;
use App\Http\Controllers\Store\ProductController;
use App\Http\Controllers\Store\StoreAuthController;
use App\Models\OrderProduct;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

// Route::domain('http://{admin}.192.168.100.114')->group(function () {

//     Route::get('login', 'StoreAuthController@login');

// });

Route::group(['prefix' => 'store','namespace' =>'App\Http\Controllers\Store'], function () {
    Config::set('auth.defines','shop');




//    auth Route
    Route::get('login', [StoreAuthController::class,'login']);
    Route::post('login', [StoreAuthController::class,'dologin'])->name('login.store');

    Route::group(['middleware'=>'shop:shop'],function () {
//        Route::get('/home', [App\Http\Controllers\Store\StoreAuthController::class, 'logout'])->name('log.home');
        Route::any('/logout', [StoreAuthController::class,'logout'])->name('store.logout');
        Route::get('/', function () {

            return view('store.welcome');

        })->name('store.dashboard');

        Route::resource('showShop','ProductController');
        Route::put('showShop/color/{id}','ProductController@updateColor');
        Route::put('showShop/colorsShela/{id}','ProductController@updateColorA');
        Route::get('showShop/single/{id}', 'ProductController@singleDelete')->name('delete.image');
        Route::post('showShop/tag/{id}', 'ProductController@tags')->name('product.view.tags');
        Route::get('showShop/abayaSize/{id}', 'ProductController@getAbayaSizePage')->name('product.abayaSize.get');
        Route::post('showShop/abayaSize/{id}', 'ProductController@abayaSize')->name('product.abayaSize');
        Route::post('showShop/abayaSizeT/{id}', 'ProductController@abayaSizeTable')->name('product.abayaSize.Table');

        Route::get('pending_product',[\App\Http\Controllers\Store\PendingProductController::class ,'index'])->name('product.pending');

/// iam dont use it
//        Route::resource('shopProducts','shopProducts');
        Route::resource('reports','MonthsController');
        Route::get('months/PDF/{id}','MonthsController@downloadPDF')->name('store.month.pdf');

        Route::get('profile', 'ProfileController@index')->name('profile');
        Route::post('profile/changePassword', 'ProfileController@update')->name('user.change');
        Route::post('profile/bio', 'ProfileController@updateBio')->name('user.changeBio');
        Route::post('profile/shopStatus', 'ProfileController@changeStatus')->name('user.shopStatus');
        Route::get('guide', 'ProfileController@get_video')->name('help.store');


        Route::resource('shopOrders','OrdersController');

//        add product controler
        Route::resource('add_product','AddProductsController');
        Route::get('add_product/{category}','AddProductsController@CreateProduct');

        Route::get('shopOrders/{id}','OrdersController@productOrder');

//        Route::post('dropzone/store','ImageController@store');

        Route::get('/', function () {

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
                    OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '01')->count(),
                    OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '02')->count(),
                    OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '03')->count(),
                    OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '04')->count(),
                    OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '05')->count(),
                    OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '06')->count(),
                    OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '07')->count(),
                    OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '08')->count(),
                    OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '09')->count(),
                    OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '10')->count(),
                    OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '11')->count(),
                    OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '12')->count(),

                ])
//            ->addData('San Francisco', [16,20,25,45,30,20,16,20,25,45,30,20])
//            ->addData('Boston', [7, 3, 8, 2, 6, 4])
                ->setXAxis($months)
                ->setColors([ '#17A2B8']);

            $chart02 =(new LarapexChart)->donutChart()

                ->addData([
                    OrderProduct::where('store_id',shop()->user()->id)->where('shipped', '0')->count(),
                    OrderProduct::where('store_id',shop()->user()->id)->where('shipped', '1')->count(),
                    OrderProduct::where('store_id',shop()->user()->id)->whereBetween('shipped', [2,4])->count(),
                ])
                ->setColors(['#DC3545', '#FFC107', '#28A745'])
                ->setGrid(false, '#3F51B5', 0.1)
                ->setLabels([trans('shop.orderStep'),trans('shop.orderStep1'), trans('shop.orderStep2')]);

            $chart03 = (new LarapexChart)->lineChart()
                ->addData('BHD',
                    [
                        OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '01')->sum('price'),
                        OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '02')->sum('price'),
                        OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '03')->sum('price'),
                        OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '04')->sum('price'),
                        OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '05')->sum('price'),
                        OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '06')->sum('price'),
                        OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '07')->sum('price'),
                        OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '08')->sum('price'),
                        OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '09')->sum('price'),
                        OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '10')->sum('price'),
                        OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '11')->sum('price'),
                        OrderProduct::where('store_id',shop()->user()->id)->whereBetween('created_at',[now()->startOfYear(),now()->endOfYear()])->whereMonth('created_at', '=', '12')->sum('price'),
                    ])

                ->setXAxis($months)
            ->setColors([ '#28A745']);


            return view('store.welcome')->with('chart',$chart)->
            with('chart02',$chart02)
                ->with('chart03',$chart03);

        })->name('store.dashboard');


    });





//    Lang Route
Route::get('lang/{lang}',function ($lang){
    session()->has('lang')? session()->forget('lang'):'';
    $lang == 'ar'?  session()->put('lang','ar'): session()->put('lang','en');
    return back();
});

});



