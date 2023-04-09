<?php

namespace App\Http\Controllers\Store;

use App\DataTables\Store\OrdersDatatables;
use App\Http\Controllers\Controller;
use App\Mail\Store\PickupDelivery;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrdersDatatables $order)
    {
        return $order->render('store.orders.index', ['title' => trans('shop.orders')]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        try {
            $data = Crypt::decrypt($id);
            $store = shop()->user()->id;

            if ($order = OrderProduct::where('store_id', $store)->find($data)) {

                $title = trans('shop.edit');
                return view('store.orders.edit', compact(['order'], 'title'));

            } else {
                return view(404);
            }
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // \Illuminate\Support\Facades\Artisan::call('cache:clear');
            return redirect()->back();
        }

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
        if ($request->shipped ==0){
            $this->validate($request,[
                'est_date'=>'required',

            ],[],[
                'est_date'=>trans('shop.est_date'),

            ]);
            OrderProduct::where('id',$id)->update(['est_date'=>$request->est_date,'shipped'=>1]);
            session()->flash('success',trans('shop.record_update'));
            return redirect(surl('shopOrders'));
        }
        elseif ($request->shipped ==1){
            $orderUpdate =OrderProduct::where('id',$id)->update(['shipped'=>2]);
            $orderProduct =OrderProduct::find($id);
            Mail::queue(new PickupDelivery($orderProduct));

            session()->flash('success',trans('shop.record_update'));
            return redirect(surl('shopOrders'));
        }
        else{
            session()->flash('error',trans('shop.orderStepError'));
            return redirect(surl('shopOrders'));
        }





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function productOrder($id){

        $store = shop()->user()->id;

        if ( $order = OrderProduct::where('store_id',$store)->find($id)){

            $title = trans('shop.edit');
            return view('store.orders.edit',compact(['order'],'title'));


        }else{
            return view(404);
        }


    }
}
