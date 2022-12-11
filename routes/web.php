<?php

use App\Http\Livewire\Style\Products;
use App\Models\Order;
use App\Models\OrderProduct;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;

use Barryvdh\DomPDF\Facade as PDF;


use Carbon\Carbon;
use Devsig\Paygcc\PaygccOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/payment_test/d', [App\Http\Controllers\Style\FrontController::class, 'samplePay_de']);
// Route::get('/payment_test/c', [App\Http\Controllers\Style\FrontController::class, 'samplePay_cre']);



Route::group(['middleware' => ['Maintenance'], 'namespace' => 'App\Http\Controllers\Style'], function () {

// //    Route::get('/', 'FrontController@homePage');
// Auth::routes();

    // Route::get('/redirects', function(){
    //     // return redirect(Redirect::intended()->getTargetUrl());
    //     // You can replace above line with the following to return to previous page
    //     return back();	// or return redirect()->back();
    // });


//    add  chart to profile of users  after login page
    // Route::get('/', [App\Http\Controllers\Style\HomeController::class, 'index'])->name('home');
//    add  chart to profile of users  after login page

//test route the new layout
    Route::get('/', [App\Http\Controllers\Style\FrontController::class, 'homePage'])->name('home');
    Route::get('/aboutUS', [App\Http\Controllers\Style\FrontController::class, 'aboutUS'])->name('about');

    Route::get('/shops', [App\Http\Controllers\Style\FrontController::class, 'vendors'])->name('shops');

    //    collection
    Route::get('/collection/{id}', [App\Http\Controllers\Style\FrontController::class, 'collection'])->name('find.collection');
    Route::get('/categories/{id}', [App\Http\Controllers\Style\FrontController::class, 'categoriesWithProduct'])->name('find.categories');

    // //   products
    // Route::get('/testEmail', function () {
    //     Mail::queue(new PickupDelivery($orderUpdate));

    // });


    Route::get('/saleProducts', [App\Http\Controllers\Style\FrontController::class, 'saleProduct'])->name('saleProducts.products');
    Route::get('/newInProducts', [App\Http\Controllers\Style\FrontController::class, 'newInProduct'])->name('newIn.products');

    // policy route
    Route::get('/policy/buyer', [App\Http\Controllers\Style\FrontController::class, 'buyer'])->name('buyer.page');
    Route::get('/policy/seller', [App\Http\Controllers\Style\FrontController::class, 'seller'])->name('seller.page');
    Route::get('/policy/communicationPolicy', [App\Http\Controllers\Style\FrontController::class, 'communicationPolicy'])->name('communicationPolicy.page');
    Route::get('/policy/privacy', [App\Http\Controllers\Style\FrontController::class, 'privacy'])->name('privacy.page');
    Route::get('/policy/paymentPolicy', [App\Http\Controllers\Style\FrontController::class, 'paymentPolicy'])->name('paymentPolicy.page');
    Route::get('/sellWithUs', [App\Http\Controllers\Style\FrontController::class, 'sellWithUs'])->name('sellWithUs.page');
    Route::get('/termAndConditions', [App\Http\Controllers\Style\FrontController::class, 'termAndConditions'])->name('termAndConditions.page');
    Route::get('/faqs', [App\Http\Controllers\Style\FrontController::class, 'faqs'])->name('faqs.page');


    Route::resource('/all-products', ProductsController::class);




    Route::get('/shops/{id}', [App\Http\Controllers\Style\FrontController::class, 'vendorsFind'])->name('shops.find');
    Route::get('/shops/product/{id}', [App\Http\Controllers\Style\FrontController::class, 'productDetails'])->name('shops.find.product');
    Route::middleware('verified')->group(function () {

      Route::resource('ShoppingCart', CartController::class);
      Route::post('ShoppingCart/switchToSaveForLater/{product}', [App\Http\Controllers\Style\CartController::class,'saveForLater'])->name('cart.switchToSaveForLater');
      Route::delete('/saveForLater/{id}',                        [App\Http\Controllers\Style\CartController::class,'destroySaveForLater'])->name('saveForLater.destroy');
      Route::post('ShoppingCart/switchToMoveToCart/{product}',   [App\Http\Controllers\Style\CartController::class,'switchToCart'])->name('saveForLater.switchToCart');

      Route::get('/fav/shops',   [App\Http\Controllers\Style\CartController::class,'fav_shops'])->name('fav.shops');
      Route::get('/fav/products',   [App\Http\Controllers\Style\CartController::class,'fav_items'])->name('fav.items');

      Route::resource('confirm', 'ConfirmationController')->middleware('auth');


          Route::resource('coupon', 'CouponController');
          Route::delete('coupon', 'CouponController@del_coupon')->name('coupon.del');


                  Route::get('/payment/{id}', [App\Http\Controllers\Style\PaymentController::class, 'store'])->name('payment.store');

                  Route::post('/webhook', [App\Http\Controllers\Style\ThankyouController::class, 'webhook']);
                  Route::get('/success_payment', [App\Http\Controllers\Style\ThankyouController::class, 'debit_success']);
                  Route::get('/failed_payment', [App\Http\Controllers\Style\ThankyouController::class, 'debit_failed']);
                  Route::get('/thankyou', 'ThankyouController@index')->name('thankyou.index');


    });
    Route::middleware('auth')->group(function () {

        Route::get('my-profile', 'ProfileUsersController@index')->name('user.edit');
        Route::get('/my-profile/{order}', 'ProfileUsersController@show')->name('user.show');
        Route::get('/my-profile-pdf/{order}', 'ProfileUsersController@downloadPDF')->name('user.pdf');
        Route::post('/my-profile-pdf/change-password', 'ProfileUsersController@storePassword')->name('user.change.password');






            });
//address
    Route::post('/address', [App\Http\Controllers\Style\AddressController::class,'address_update'])->name('address.update');




    // Route::any('/search', [App\Http\Controllers\SearchController::class,'index'])->name('search');
    Route::any('/search-temp', [App\Http\Controllers\SearchController::class,'search'])->name('search.auto');
    Route::get('/search-algolia', [App\Http\Controllers\SearchController::class,'searchAlgolia'])->name('search.Algolia');

//    Route::any('/search/auto', 'SearchController@search')->name('search.auto');


    // Route::get('/empty', function () {
    //     Cart::instance('cart')->destroy();
    //     if(Auth::check()){
    //         Cart::instance('cart')->store(Auth::user()->email);
    //     }
    // });





});
Route::group(['middleware' => 'Maintenance', 'namespace' => 'App\Http\Controllers'], function () {
    Auth::routes(['verify' => true]);


});

Route::get('maintenance', function () {
    if (setting()->status == 'open') {
        return redirect('/');
    }
    return view('style.maintenance');
});



//    Lang Route
Route::get('lang/{lang}',function ($lang){
    session()->has('lang')? session()->forget('lang'):'';
    $lang == 'ar'?  session()->put('lang','ar'): session()->put('lang','en');
    return back();
});







Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
