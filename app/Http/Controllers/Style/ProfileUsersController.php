<?php

namespace App\Http\Controllers\Style;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class ProfileUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = auth()->user()->id;
        $address = Address::where('user_id',$user)->first();
        $orders = Order::where('user_id', $user)->where('confirm', 'yes')->orderBy('id', 'DESC')->paginate(3);
//dd($address);
        return view('style.orders.my-profile')->with(['orders'=>$orders,
        'address'=>$address]
        );


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
        // dd($id);

        //  if (Crypt::encrypt($id) == false) {
        //      return redirect()->back();
        //  }

         //        $report = Report::where('store_id', $shop)->find($id)
         // if (OrderProduct::where('order_id', $id)->where('user_id', $user)->first()) {
             //     //            dd($orders);


             // } else {
                 //     return view('errorPage.404L');
                 // }


                 try {
                    $data = Crypt::decrypt($id);
                    $user = auth()->user()->id;
                    $order =Order::where('id',$data)->where('user_id', $user)->firstOrFail();
                    return view('style.orders.details')->with(
                        'order', $order
                    );
                } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                    // \Illuminate\Support\Facades\Artisan::call('cache:clear');
                    return redirect()->back();
                }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('style.orders.my-profile')->with('user', auth()->user());

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
        //
    }

    public function downloadPDF($id)
    {
//        dd($id);


            try {
                $data = Crypt::decrypt($id);
                $user = auth()->user()->id;
                $order = Order::find($data);
                return view('style.orders.invoice', compact('order','user'));
            } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                // \Illuminate\Support\Facades\Artisan::call('cache:clear');
                return redirect()->back();
            }


//            $orders = OrderProduct::all()->where('order_id', $id)->where('user_id', $user);
//            $pdf = PDF::loadView('style.invoice', compact('orders'))->setPaper('a4', 'portrait');
//            return $pdf->download('invoice' . $id);









            //     if ($order->billing_country =='bahrain' ) {
            //         $invoice = \ConsoleTVs\Invoices\Classes\Invoice::make()
            //         ->number($order->id)
            //         ->with_pagination(true)
            //         ->duplicate_header(true)
            //         ->number($order->id)
            //         ->customer([
            //             'name'              => $order->billing_name,
            //             'phone'             => $order->billing_phone,
            //             'country'           => $order->billing_country,
            //             'city'              => $order->billing_city,
            //             'home'              => $order->billing_buliding,
            //             'road'              => $order->billing_road,
            //             'block'             => $order->billing_block,
            //             'special direction' => $order->billing_speical_direcstions,

            //         ]);

            //     }else{
            //         $invoice = \ConsoleTVs\Invoices\Classes\Invoice::make()
            //         ->number($order->id)
            //         ->with_pagination(true)
            //         ->duplicate_header(true)
            //         ->number($order->id)
            //         ->customer([
            //             'name'      => $order->billing_name,

            //             'phone'     => $order->billing_phone,
            //             'country'   => $order->billing_country,
            //             'city'      => $order->billing_city,
            //             'province'      => $order->billing_province,

            //             'address'      => $order->billing_address,
            //             'address2'      => $order->billing_address2,

            //             'zip'       => $order->billing_postalcode,
            //         ]);


            //     }


            // foreach (\App\Models\OrderProduct::where('order_id', $id)->where('user_id', $user)->get() as $item){
            //     $invoice->addItem($item->product->title, $item->price, 1, $item->id);
            // }
            // return $invoice->download('invoice'.time());







    }


    public function showThank()
    {
        return view('style.thank');
    }

    public function storePassword(Request $request){

        if ($request->name !== null) {
            $request->validate([
                'name'=>'required',

            ]);
            User::find(auth()->user()->id)->update(['name'=>$request->name]);

        }elseif($request->new_password !== null & $request->new_confirm_password !== null){

            $request->validate([
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);

            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        }

    //    dd($request->all());
    //     $request->validate([
    //         'name'=>'required',
    //         'new_password' => ['required'],
    //         'new_confirm_password' => ['same:new_password'],
    //     ]);

    //     User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect()->back();
    }
}
