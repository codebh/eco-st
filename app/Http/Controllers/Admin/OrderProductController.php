<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\OrderDatatables;
use App\Http\Controllers\Controller;
use App\Mail\Admin\OrderCancel;
use App\Mail\Admin\OrderCancelStore;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrderDatatables $order)
    {
        return $order->render('admin.orderProduct.index', ['title' => trans('admin.orders')]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orders.create', ['title' => trans('admin.create_orders')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'product_id' => 'required',
            'size1' => 'required',
            'size2' => 'required',
            'size3' => 'required',
            'size4' => 'required',
            'size5' => 'required',
            'color' => 'required',
            'shop_id' => 'required',
            'price' => 'required',
            'order_date' => 'required',
            'state' => 'required',
            'delivery_comp' => 'required',
            'delivery_date' => 'required',
            'delivery_charge' => 'required',
            'present' => 'required',
            'my_price' => 'required',
            'sub_price' => 'required',
            'user_id' => 'required'

        ], [], [
            'name' => trans('admin.name'),
            'phone' => trans('admin.phone'),
            'address' => trans('admin.address'),
            'product_id' => trans('admin.product_id'),
            'size1' => trans('admin.size1'),
            'size2' => trans('admin.size2'),
            'size3' => trans('admin.size3'),
            'size4' => trans('admin.size4'),
            'size5' => trans('admin.size5'),
            'color' => trans('admin.color'),
            'shop_id' => trans('admin.shop_id'),
            'price' => trans('admin.price'),
            'order_date' => trans('admin.order_date'),
            'state' => trans('admin.state'),
            'delivery_comp' => trans('admin.delivery_comp'),
            'delivery_date' => trans('admin.delivery_date'),
            'delivery_charge' => trans('admin.delivery_charge'),
            'present' => trans('admin.present'),
            'my_price' => trans('admin.my_price'),
            'sub_price' => trans('admin.sub_price'),
            'user_id' => trans('admin.user_id')

        ]);

        Order::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = OrderProduct::find($id);

        return view('admin.orderProduct.details')->with('order', $order);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $title = trans('admin.edit');
        return view('admin.orderProduct.edit', compact('order', 'title'));

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
        // dd($request->all());
        // $data = $this->validate($request, [
        //     'billing_name' => 'required',
        //     'billing_email' => 'required|email',
        //     'billing_discount' => 'sometimes',
        //     'billing_discount_code' => 'sometimes',
        //     'billing_subtotal' => 'required',
        //     'billing_tax' => 'sometimes',
        //     'billing_delivery' => 'sometimes',
        //     'billing_total' => 'required',
        //     'payment_gateway' => 'required',
        //     'confirm' => 'required',


        // ], [], [
        //     'billing_name' => trans('admin.billing_name'),
        //     'billing_email' => trans('admin.billing_email'),

        //     'billing_discount' => trans('admin.billing_discount'),
        //     'billing_discount_code' => trans('admin.billing_discount_code'),
        //     'billing_subtotal' => trans('admin.billing_subtotal'),
        //     'billing_tax' => trans('admin.billing_tax'),
        //     'billing_delivery' => trans('admin.billing_delivery'),
        //     'billing_total' => trans('admin.billing_total'),
        //     'payment_gateway' => trans('admin.payment_gateway'),
        //     'confirm' => trans('admin.confirm'),
        // ]);
        if ($request->billing_country =='bahrain') {

            $data = $this->validate($request, [
                'billing_name' => 'required',
                'billing_email' => 'required|email',
                'billing_discount' => 'sometimes',
                'billing_discount_code' => 'sometimes',
                'billing_subtotal' => 'required',
                'billing_tax' => 'sometimes',
                'billing_delivery' => 'sometimes',
                'billing_total' => 'required',
                'payment_gateway' => 'required',
                'confirm' => 'required',
                'billing_phone'=>'required',


                //country
                'billing_country'            => 'required',
                'billing_city'               => 'required',
                'billing_buliding'           => 'required',
                'billing_road'               => 'required',
                'billing_block'              => 'required',
                'billing_speical_direcstions'=> 'required',
                   //payment
                   'transactionId'=>'required',
                   'invoice_id'=>'required',
                   'shipped'=>'required',
                   'error'=>'sometimes',


            ], [], [
                'billing_name' => trans('admin.billing_name'),
                'billing_email' => trans('admin.billing_email'),

                'billing_discount' => trans('admin.billing_discount'),
                'billing_discount_code' => trans('admin.billing_discount_code'),
                'billing_subtotal' => trans('admin.billing_subtotal'),
                'billing_tax' => trans('admin.billing_tax'),
                'billing_delivery' => trans('admin.billing_delivery'),
                'billing_total' => trans('admin.billing_total'),
                'payment_gateway' => trans('admin.payment_gateway'),
                'confirm' => trans('admin.confirm'),
                   //payment
                'transactionId'=>trans('admin.transactionId'),
                'invoice_id'=> trans('admin.invoice_id'),
                'shipped'=>trans('admin.orders_status'),
                'error'=>trans('admin.error'),
            ]);

        }else{





            $data = $this->validate($request, [
                'billing_name' => 'required',
                'billing_email' => 'required|email',
                'billing_discount' => 'sometimes',
                'billing_discount_code' => 'sometimes',
                'billing_subtotal' => 'required',
                'billing_tax' => 'sometimes',
                'billing_delivery' => 'sometimes',
                'billing_total' => 'required',
                'payment_gateway' => 'required',
                'confirm' => 'required',
                'billing_phone'=>'required',

                //country
                'billing_country' => 'required',
                'billing_city' => 'required',
                'billing_address' => 'required',
                'billing_address1' => 'required',
                'billing_province' => 'required',
                'billing_postalcode' => 'required',
                //payment
                'transactionId'=>'required',
                'invoice_id'=>'required',
                'shipped'=>'required',
                'error'=>'sometimes',


            ], [], [
                'billing_name' => trans('admin.billing_name'),
                'billing_email' => trans('admin.billing_email'),

                'billing_discount' => trans('admin.billing_discount'),
                'billing_discount_code' => trans('admin.billing_discount_code'),
                'billing_subtotal' => trans('admin.billing_subtotal'),
                'billing_tax' => trans('admin.billing_tax'),
                'billing_delivery' => trans('admin.billing_delivery'),
                'billing_total' => trans('admin.billing_total'),
                'payment_gateway' => trans('admin.payment_gateway'),
                'confirm' => trans('admin.confirm'),
                'transactionId'=>trans('admin.transactionId'),
                'invoice_id'=> trans('admin.invoice_id'),
                'shipped'=>trans('admin.orders_status'),
                'error'=>trans('admin.error'),
            ]);

        }


        Order::where('id', $id)->update($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('orderProduct'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders = OrderProduct::find($id);

        $orders->delete();
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('orderProduct'));
    }
    public function update_status(Request $request, $id)
    {
//        dd($request->all());
        //validation goes here
        $this->validate($request,[
            'shipped'=>'required',
//           'est_data'=>'required:in:shipped =0',
        ]);

        if ($request->shipped ==0){
            $data=[
                'shipped'=>$request->shipped,
                'est_date'=>'still not start'
            ];

        OrderProduct::where('id', $id)->update($data);

        }elseif($request->shipped ==6){
            $this->validate($request,[
                'shipped'=>'required',
                'est_date'=>'required',
            ]);
            $data =[
                'shipped'=>$request->shipped,
                'est_date'=>$request->est_date,

            ];
            OrderProduct::where('id', $id)->update($data);
            $orderCancel =OrderProduct::find($id);

            Mail::queue(new OrderCancel($orderCancel));

            Mail::queue(new OrderCancelStore($orderCancel));

        }
        else{
            $this->validate($request,[
                'shipped'=>'required',
                'est_date'=>'required',
            ]);
            $data =[
                'shipped'=>$request->shipped,
                'est_date'=>$request->est_date,

            ];
            OrderProduct::where('id', $id)->update($data);
        }


        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('orderProduct'));

    }
    public function multi_delete()
    {

        if (is_array(request('item'))) {
//            City::destroy(request('item'));
            foreach (request('item') as $id) {
                $orders = Order::find($id);
                $orders->delete();
            }


        } else {
//            City::find(request('item'))->delete();
            $orders = Order::find(request('item'));
            $orders->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('orderProduct'));
    }

}
