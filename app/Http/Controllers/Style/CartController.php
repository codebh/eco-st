<?php

namespace App\Http\Controllers\Style;

use App\Http\Controllers\Controller;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use romanzipp\Seo\Facades\Seo;
use romanzipp\Seo\Services\SeoService;
use romanzipp\Seo\Structs\Title;
use romanzipp\Seo\Structs\Meta\Description;
use romanzipp\Seo\Structs\Link;
use romanzipp\Seo\Structs\Meta\OpenGraph;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        seo()->title(session('lang')=='ar'?
        'تفصيل | منصة تسوق اون لاين لعديد من محلات العبايات وملابس المحجبات والبدلات والجلابيات والفساتين '
        :'Tafseel | online shopping pltaform for multi-vendors of abayas, Hijab, dresses, jalabia, modest fashion and more.');
        seo()->description(session('lang')=='ar'?
        'متاجر أزياء توفر تصاميم فريدة لتشكيلة متنوعة من العبايات الخليجية وملابس المحجبات والبدلات العملية والجلابيات والفساتين.'
        :
        'Tafseel Fashion designers Provide unique designs of various collections of abayas, suits, jalabiyas, dresses, and modest clothing.'
            );

        seo()->addMany([
            // main icon
            Link::make()->rel('icon')->href(asset('img/s_logo.png')),
            Link::make()->rel('shortcut icon')->href(asset('img/s_logo.png')),

            Link::make()->rel('canonical')->href('https://tafseel.net/shops'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),

            OpenGraph::make()->property('title')->content(
            session('lang')=='ar'?
            'تفصيل | منصة تسوق اون لاين لعديد من محلات العبايات وملابس المحجبات والبدلات والجلابيات والفساتين '
            :
            'Tafseel | online shopping pltaform for multi-vendors of abayas, Hijab, dresses, jalabia, modest fashion and more.'
            ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('description')->content(
            session('lang')=='ar'?
            'متاجر أزياء توفر تصاميم فريدة لتشكيلة متنوعة من العبايات الخليجية وملابس المحجبات والبدلات العملية والجلابيات والفساتين.'
            :
            'Tafseel Fashion designers Provide unique designs of various collections of abayas, suits, jalabiyas, dresses, and modest clothing.'
        ),
            OpenGraph::make()->property('url')->content('https://tafseel.net/shops'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website')
        ]);
        return view('style.cart')->with([

            'discount' => getNumbersModels()->get('discount'),
            'newSubtotal' => getNumbersModels()->get('newSubtotal'),
            'newTax' => getNumbersModels()->get('newTax'),
            'newTotal' => getNumbersModels()->get('newTotal'),
            'costDeli' => getNumbersModels()->get('costDeli')


        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



//         if ($request->category ==1) {
//             $this->validate($request, [
//                 'name' => 'required',
//                 'color' => 'required',
//                 'color1' => 'required',
//                 'price' => 'required',
//                 'a_size1' => 'required',
//                 'a_size2' => 'required',
//                 'a_size3' => 'required',
//                 'a_size4' => 'required',
//                 'a_size5' => 'required',
//                 'a_size6' => 'required',
//             ], [], [
//                 'name' => trans('admin.product_title'),
//                 'color' => trans('shop.items_color_a'),
//                 'color1' => trans('shop.items_color_s'),
//                 'price' => trans('admin.price'),
//                 'a_size1' => trans('user.a_size1'),
//                 'a_size2' => trans('user.a_size2'),
//                 'a_size3' => trans('user.a_size3'),
//                 'a_size4' => trans('user.a_size4'),
//                 'a_size5' => trans('user.a_size5'),
//                 'a_size6' => trans('user.a_size6'),
//             ]);

//         } elseif ($request->category ==2) {

//             $this->validate($request, [
//                 'name' => 'required',
//                 'color' => 'required',
// //                'color1' => 'required',
//                 'price' => 'required',
//                 'sh_size' => 'required',

//             ], [], [
//                 'name' => trans('admin.product_title'),
//                 'color' => trans('shop.items_color_a'),
// //                'color1' => trans('shop.items_color_s'),
//                 'price' => trans('admin.price'),
//             ]);
//         }else {
//             $this->validate($request, [
//                 'name' => 'required',
//                 'color' => 'required',
//                 'price' => 'required',
//                 'size_data' => 'required',

//             ], [], [
//                 'name' => trans('admin.product_title'),
//                 'color' => trans('shop.items_color_a'),
//                 'price' => trans('admin.price'),
//             ]);
//         }



//         $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
//             return $cartItem->id === $request->id;
//         });

//         if ($duplicates->isNotEmpty()) {
//             return redirect()->route('ShoppingCart.index')->with('error_message', 'Item is already in your cart');
//         }
//         if ($request->notes == null) {
//             $notes = 'nothing';
//         } else {
//             $notes = $request->notes;
//         }



//         if ($request->category ==1) {
//             Cart::add(
//                 $request->id,
//                 $request->name,

//                 1,
//                 $request->price,
//                 [
// //                    'color5' => $request->color5,
// //                    'color6' => $request->color6,
//                     'a_color'=>$request->color,
//                     's_color'=>$request->color1,
//                     'a_size1' => $request->a_size1,
//                     'a_size2' => $request->a_size2,
//                     'a_size3' => $request->a_size3,
//                     'a_size4' => $request->a_size4,
//                     'a_size5' => $request->a_size5,
//                     'a_size6' => $request->a_size6,
//                     'notes'=>$request->notes

//                 ]
//             )->associate(Product::class);

//         } elseif ($request->category ==2) {
//             Cart::add(
//                 $request->id,
//                 $request->name,

//                 1,
//                 $request->price,
//                 [
//                     'sh_color'=>$request->color,
//                     'sh_size' => $request->sh_size,
//                     'notes'=>$request->notes
//                     ]
//             )->associate(Product::class);

//         }else{
//             Cart::add(
//                 $request->id,
//                 $request->name,

//                 1,
//                 $request->price,
//                 [
//                     'p_color'=>$request->color,
//                     'size_data' => $request->size_data,
//                     'notes'=>$request->notes
//                 ]
//             )->associate(Product::class);
//         }


//          return redirect()->back()->with( 'message_success',trans('user.cart_add_product'));



    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Cart::remove($id);
        // return back()->with('success_message', 'Item has been removed');
    }

  /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function saveForLater($id)
    {

        // $item = Cart::instance('cart')->get($id);
        // // dd($item);

        // Cart::instance('cart')->remove($id);
        // Cart::instance('cart')->store(Auth::user()->email);
        // // dd($item);

        // $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
        //     return $rowId === $id;
        // });

        // if ($duplicates->isNotEmpty()) {
        //     return redirect()->route('ShoppingCart.index')->with('success_message', 'Item is already Saved For Later!');
        // }

        // // Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
        // //     ->associate('App\Models\Product');
        // if($item->model->category_id == 1){
        //     if ($item->price_offer > 0 and $item->status == 'active') {
        //         Cart::instance('saveForLater')->add(
        //             $item->id,
        //             $item->name,
        //             1,
        //             $item->price_offer,
        //             [

        //                 'a_size1' => $item->a_size1,
        //                 'a_size2' => $item->a_size2,
        //                 'a_size3' => $item->a_size3,
        //                 'a_size4' => $item->a_size4,
        //                 'a_size5' => $item->a_size5,
        //                 'a_size6' => $item->a_size6,
        //                  'color' => $item->color_id,
        //                  'notes' => $item->notes

        //             ]
        //         )->associate('App\Models\Product');
        //     } else {
        //     Cart::instance('saveForLater')->add(
        //             $item->id,
        //             $item->name,
        //             1,
        //             $item->price,
        //             [
        //                 'a_size1' => $item->a_size1,
        //                 'a_size2' => $item->a_size2,
        //                 'a_size3' => $item->a_size3,
        //                 'a_size4' => $item->a_size4,
        //                 'a_size5' => $item->a_size5,
        //                 'a_size6' => $item->a_size6,
        //                  'color' => $item->color_id,
        //                  'notes' => $item->notes

        //             ]
        //         )->associate('App\Models\Product');
        //     }
        // }elseif($item->model->category_id == 2){
        //     if ($item->price_offer > 0 and $item->status == 'active') {
        //         Cart::instance('saveForLater')->add(
        //             $item->id,
        //             $item->name,
        //             1,
        //             $item->price_offer,
        //             [
        //                  'color' => $item->color_id,
        //                  'notes' => $item->notes

        //             ]
        //         )->associate('App\Models\Product');
        //     } else {
        //     Cart::instance('saveForLater')->add(
        //             $item->id,
        //             $item->name,
        //             1,
        //             $item->price,
        //             [
        //                  'color' => $item->color_id,
        //                  'notes' => $item->notes

        //             ]
        //         )->associate('App\Models\Product');
        //     }
        // }
        // else{
        //     if ($item->price_offer > 0 and $item->status == 'active') {
        //         Cart::instance('saveForLater')->add(
        //             $item->id,
        //             $item->name,
        //             1,
        //             $item->price_offer,
        //             [

        //                 'de_size' => $item->de_size,
        //                  'color' => $item->color_id,
        //                  'notes' => $item->notes

        //             ]
        //         )->associate('App\Models\Product');
        //     } else {
        //     Cart::instance('saveForLater')->add(
        //             $item->id,
        //             $item->name,
        //             1,
        //             $item->price,
        //             [
        //                 'de_size' => $item->de_size,
        //                  'color' => $item->color_id,
        //                  'notes' => $item->notes

        //             ]
        //         )->associate('App\Models\Product');
        //     }
        // }





        // Cart::instance('saveForLater')->store(Auth::user()->email);

        // return redirect()->route('ShoppingCart.index')->with('success_message', 'Item has been Saved For Later!');
    }

/**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroySaveForLater($id)
    {
        // Cart::instance('saveForLater')->remove($id);
        // Cart::instance('saveForLater')->store(Auth::user()->email);

        // return back()->with('success_message', 'Item has been removed!');
    }

/**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function switchToCart($id)
    {
        // $item = Cart::instance('saveForLater')->get($id);

        // if($item->model->category_id == 1){
        //     if($item->model->qty == 0){
        //         return redirect()->back()->with('success_message', 'Item is Out Of Stock !');;
        //     }
        //     else{
        //         Cart::instance('saveForLater')->remove($id);
        //         Cart::instance('saveForLater')->store(Auth::user()->email);


        //         $duplicates = Cart::instance('cart')->search(function ($cartItem, $rowId) use ($id) {
        //             return $rowId === $id;
        //         });

        //         if ($duplicates->isNotEmpty()) {
        //             return redirect()->route('ShoppingCart.index')->with('success_message', 'Item is already in your Cart!');
        //         }
        //         if ($item->price_offer > 0 and $item->status == 'active') {
        //             Cart::instance('cart')->add(
        //                 $item->id,
        //                 $item->name,
        //                 1,
        //                 $item->price_offer,
        //                 [

        //                     'a_size1' => $item->a_size1,
        //                     'a_size2' => $item->a_size2,
        //                     'a_size3' => $item->a_size3,
        //                     'a_size4' => $item->a_size4,
        //                     'a_size5' => $item->a_size5,
        //                     'a_size6' => $item->a_size6,
        //                     'color' => $item->color_id,
        //                     'notes' => $item->notes

        //                 ]
        //             )->associate('App\Models\Product');
        //         } else {
        //         Cart::instance('cart')->add(
        //                 $item->id,
        //                 $item->name,
        //                 1,
        //                 $item->price,
        //                 [
        //                     'a_size1' => $item->a_size1,
        //                     'a_size2' => $item->a_size2,
        //                     'a_size3' => $item->a_size3,
        //                     'a_size4' => $item->a_size4,
        //                     'a_size5' => $item->a_size5,
        //                     'a_size6' => $item->a_size6,
        //                     'color' => $item->color_id,
        //                     'notes' => $item->notes

        //                 ]
        //             )->associate('App\Models\Product');
        //         }
        //          Cart::instance('cart')->store(Auth::user()->email);
        //         return redirect()->route('ShoppingCart.index')->with('success_message', 'Item has been moved to Cart!');
        //     }

        // }elseif($item->model->category_id == 2){
        //     if($item->model->qty == 0){
        //         return redirect()->back()->with('success_message', 'Item is Out Of Stock !');;
        //     }else{
        //         Cart::instance('saveForLater')->remove($id);
        //         Cart::instance('saveForLater')->store(Auth::user()->email);


        //         $duplicates = Cart::instance('cart')->search(function ($cartItem, $rowId) use ($id) {
        //             return $rowId === $id;
        //         });

        //         if ($duplicates->isNotEmpty()) {
        //             return redirect()->route('ShoppingCart.index')->with('success_message', 'Item is already in your Cart!');
        //         }

        //         if ($item->price_offer > 0 and $item->status == 'active') {
        //             Cart::instance('cart')->add(
        //                 $item->id,
        //                 $item->name,
        //                 1,
        //                 $item->price_offer,
        //                 [
        //                      'color' => $item->color_id,
        //                      'notes' => $item->notes

        //                 ]
        //             )->associate('App\Models\Product');
        //         } else {
        //         Cart::instance('cart')->add(
        //                 $item->id,
        //                 $item->name,
        //                 1,
        //                 $item->price,
        //                 [
        //                      'color' => $item->color_id,
        //                      'notes' => $item->notes

        //                 ]
        //             )->associate('App\Models\Product');
        //         }



        //         Cart::instance('cart')->store(Auth::user()->email);

        //         return redirect()->route('ShoppingCart.index')->with('success_message', 'Item has been moved to Cart!');
        //     }

        // }
        // else{
        //     if(count($item->model->size_data()->where('size_qty','>',0)->get())>0){
        //         Cart::instance('saveForLater')->remove($id);
        //         Cart::instance('saveForLater')->store(Auth::user()->email);


        //         $duplicates = Cart::instance('cart')->search(function ($cartItem, $rowId) use ($id) {
        //             return $rowId === $id;
        //         });

        //         if ($duplicates->isNotEmpty()) {
        //             return redirect()->route('ShoppingCart.index')->with('success_message', 'Item is already in your Cart!');
        //         }

        //     if ($item->price_offer > 0 and $item->status == 'active') {
        //         Cart::instance('cart')->add(
        //             $item->id,
        //             $item->name,
        //             1,
        //             $item->price_offer,
        //             [

        //                 'de_size' => $item->de_size,
        //                  'color' => $item->color_id,
        //                  'notes' => $item->notes

        //             ]
        //         )->associate('App\Models\Product');
        //     } else {
        //     Cart::instance('cart')->add(
        //             $item->id,
        //             $item->name,
        //             1,
        //             $item->price,
        //             [
        //                 'de_size' => $item->de_size,
        //                  'color' => $item->color_id,
        //                  'notes' => $item->notes

        //             ]
        //         )->associate('App\Models\Product');
        //     }
        //         Cart::instance('cart')->store(Auth::user()->email);

        //         return redirect()->route('ShoppingCart.index')->with('success_message', 'Item has been moved to Cart!');
        //     }else{

        //         return redirect()->back()->with('success_message', 'Item is Out Of Stock !');;

        //     }




        // }





    }




//     public function getNumbers()
//     {
//         $tax = config('cart.tax') / 100;
//         $discount = session()->get('coupon')['discount'] ?? 0;
//         $code = session()->get('coupon')['name'] ?? null;
//         $deli = 2;
//         $costDeli = ($deli - $discount);
//         $newSubtotal = (\Gloudemans\Shoppingcart\Facades\Cart::subtotal());
//         if ($newSubtotal < 0) {
//             $newSubtotal = 0;
//         }
//         $newTax = $newSubtotal * $tax;
//         $newTotal = $newSubtotal * (1 + $tax) + $costDeli;
// //    $shop_id = (Cart::content());
// //    $shop_id->shop_id;


//         return collect([
//             'tax' => $tax,
//             'discount' => $discount,
//             'code' => $code,
//             'newSubtotal' => $newSubtotal,
//             'newTax' => $newTax,
//             'newTotal' => $newTotal,
//             'costDeli' => $costDeli,
// //        'shop_id'=>$shop_id

//         ]);
//     }

    public function fav_items(){
            return view('style.fav.fav_items');
    }

    public function fav_shops(){
        return view('style.fav.fav_shops');
    }
}
