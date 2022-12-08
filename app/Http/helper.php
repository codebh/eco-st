<?php

use App\Models\Cart as ModelsCart;
use App\Models\CartItem;

if (!function_exists('up')) {
    function up() {
        return new App\Http\Controllers\Upload;
    }
}
if (!function_exists('load_dep')) {
    function load_dep($select = null, $dep_hide = null) {
        $departments = \App\Model\Department::selectRaw('dep_name_'.session('lang').' as text')
            ->selectRaw('id as id')
            ->selectRaw('parent as parent')
            ->get(['text', 'parent', 'id']);
        $dep_arr = [];
        foreach ($departments as $department) {
            $list_arr             = [];
            $list_arr['icon']     = '';
            $list_arr['li_attr']  = '';
            $list_arr['a_attr']   = '';
            $list_arr['children'] = [];

            if ($select !== null and $select == $department->id) {

                $list_arr['state'] = [
                    'opened'   => true,
                    'selected' => true,
                    'disabled' => false,
                ];
            }

            if ($dep_hide !== null and $dep_hide == $department->id) {

                $list_arr['state'] = [
                    'opened'   => false,
                    'selected' => false,
                    'disabled' => true,
                    'hidden'   => true,
                ];
            }

            $list_arr['id']     = $department->id;
            $list_arr['parent'] = $department->parent > 0?$department->parent:'#';
            $list_arr['text']   = $department->text;
            array_push($dep_arr, $list_arr);
        }

        return json_encode($dep_arr, JSON_UNESCAPED_UNICODE);
    }
}
if (!function_exists('get_parent')) {
    function get_parent($dep_id) {
//        $list_department = [];
        $department = \App\Model\Department::find($dep_id);
            if( $department->parent !== null && $department->parent > 0){
//                array_push($list_department,$dep_id);
                return get_parent($department->parent).",".$dep_id;
            }else{
                return $dep_id;
            }




    }
}



if (!function_exists('setting')) {
    function setting() {
        return \App\Models\Setting::orderBy('id', 'desc')->first();
    }
}

if (!function_exists('aurl')){
    function aurl($url =null){
        return url('admin/'.$url);
    }
}
if (!function_exists('surl')){
    function surl($url =null){
        return url('store/'.$url);
    }
}

if (!function_exists('durl')){
    function durl($url =null){
        return url('delivery/'.$url);
    }
}
//if (!function_exists('shop_id')){
//    function shop_id(){
//        return shop()->user()->id ;
//    }
//}if (!function_exists('surl')){
//    function surl($url =null){
//        return url('shop/'.$url);
//    }
//}
//
// $products = Product::all()->where('shop_id',$shop)

if (!function_exists('admin')){
    function admin(){
        return auth()->guard('admin');
    }
}
if (!function_exists('shop')){
    function shop(){
        return auth()->guard('shop');
    }
}
if (!function_exists('delivery')){
    function delivery(){
        return auth()->guard('delivery');
    }
}
if (!function_exists('active_menu')){
    function active_menu($link){

        if (preg_match('/'.$link.'/i',Request::segment(2))){
           return ['menu-open','display:block'];
        }else{
            return['',''];
        }

    }
}

if (!function_exists('lang')){
    function lang(){
        if(session()->has('lang')){
            return session('lang');
        }else{
            session()->put('lang', setting()->main_lang);
            return setting()->main_lang;
        }
    }
}




if (!function_exists('direction')){
    function direction(){
        if(session()->has('lang')){
          if (session('lang')== 'ar'){
              return 'rtl';
          }else{
              return 'ltr';
          }
        }else{
            return 'ltr';
        }
    }
}
if (!function_exists('datatable_lang')){
    function datatable_lang(){
        return['sProcessing'=>trans('admin.sProcessing'),
            'sLengthMenu'=> trans('admin.sLengthMenu'),
            'sZeroRecords'=> trans('admin.sZeroRecords'),
            'sEmptyTable'=> trans('admin.sEmptyTable'),
            'sInfo'=> trans('admin.sInfo'),
            'sInfoEmpty'=> trans('admin.sInfoEmpty'),
            'sInfoFiltered'=> trans('admin.sInfoFiltered'),
            'sInfoPostFix'=> trans('admin.sInfoPostFix'),
            'sSearch'=> trans('admin.sSearch'),
            'sUrl'=> trans('admin.sUrl'),
            'sInfoThousands'=> trans('admin.sInfoThousands'),
            'sLoadingRecords'=> trans('admin.sLoadingRecords'),
            'oPaginate'=> [
                'sFirst'=> trans('admin.sFirst'),
                'sLast'=> trans('admin.sLast'),
                'sNext'=> trans('admin.sNext'),
                'sPrevious'=> trans('admin.sPrevious'),
            ],
            'oAria'=>[
                'sSortAscending'=> trans('admin.sSortAscending'),
                'sSortDescending'=> trans('admin.sSortDescending'),
            ],
        ];
    }
}

if (!function_exists('v_image')) {
    function v_image($ext= null)
    {
        if ($ext===null){
            return 'mimes:jpeg,png,jpg';
        }else{
            return 'mimes:'.$ext;
        }
    }


}
function imageDo($image){
    return  'https://tafseel.sgp1.digitaloceanspaces.com/'.$image;
   }

function persent($price_offer,$price){
    $test_price = $price_offer- $price;

 return number_format($test_price/$price*100).'%';
}

function presentPrice($price)
{
    if (direction()== 'ltr') {

    return  number_format($price ,2).' ' .'BHD';
    }else{
    return  number_format($price,2 ).' '.'دب';

    }
//    return $price;
}
function presentLang($price)
{
    return  number_format($price ,2).' ' .'BHD';

}
 function sessionAr($ar ,$en){
   if (direction()== 'ltr') {
       return  $en;
   } else{
       return $ar;
   }
 }
function getPercentage($percentage)
{
    return  $percentage*100 .'%';
}
function getPrice1($price1,$percentage)
{
    return  $price1 * $percentage;
}
function getTotal($price1,$price0)
{
    if (direction()== 'ltr') {

        return  $price1 - $price0 .' BHD';
    }else{
        return  $price1 - $price0 .'دب';

    }

}
function setActiveCategory($category,$output='active text-white'){

  return request()->category ==  $category ? $output :'';


}

 function getNumbers()
{
    $tax = config('cart.tax') / 100;
    $discount = session()->get('coupon')['discount'] ?? 0;
    $code = session()->get('coupon')['name'] ?? null;

    $deli =0.9;

    $costDeli =$deli;
     $sub =number_format((float)Cart::subtotal(), 2);
    $newSubtotal = ($sub- $discount);
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    $newTax = $newSubtotal * $tax;
    $newTotal = $newSubtotal * (1 + $tax)+$costDeli;

    return collect([
        'tax' => $tax,
        'discount' => $discount,
        'code' => $code,
        'newSubtotal' => $newSubtotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal,
        'costDeli'=>$costDeli
    ]);
}
function getNumbersModels()
{
    $tax = config('cart.tax') / 100;
    $discount = session()->get('coupon')['discount'] ?? 0;
    $code = session()->get('coupon')['name'] ?? null;

    $deli =0.9;

    $costDeli =$deli;
    $cart_id = ModelsCart::where('user_id',auth()->user()->id)->first();

     $sub =number_format((float)CartItem::where('cart_id',$cart_id->id)->sum('price'), 2);


    $newSubtotal = ($sub- $discount);
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    $newTax = $newSubtotal * $tax;
    $newTotal = $newSubtotal * (1 + $tax)+$costDeli;

    return collect([
        'sub'=>$sub,
        'tax' => $tax,
        'discount' => $discount,
        'code' => $code,
        'newSubtotal' => $newSubtotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal,
        'costDeli'=>$costDeli
    ]);
}










