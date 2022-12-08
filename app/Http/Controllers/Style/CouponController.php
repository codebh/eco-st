<?php

namespace App\Http\Controllers\Style;

use App\Http\Controllers\Controller;
use App\Jobs\Style\UpdateCouponJobs;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Coupon::where('code',$request->coupon_code)->first();

        if (!$coupon){
            return redirect('ShoppingCart')->with('error_message','Invalid coupon code. Please try again');
        }

//        session()->put('coupon',[
//            'name'=>$coupon->code,
//            'discount'=>$coupon->discount(getNumbers()->get('costDeli')),
//        ]);
//        session()->put('coupon',[
//            'name'=>$coupon->code,
//            'discount'=>$coupon->discount(Cart::subtotal()),
//        ]);
        dispatch_now( new  UpdateCouponJobs($coupon));

        return redirect('ShoppingCart')->with('success_message','Coupon has been applied!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function del_coupon(){
        session()->forget('coupon');
        return redirect('ShoppingCart')->with('success_message','Coupon has been removed');
    }
}
