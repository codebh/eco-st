<?php

namespace App\Http\Controllers\Style;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Devsig\Paygcc\PaygccOrder;
use Devsig\Paygcc\V5\CreditCard;
use Devsig\Paygcc\V5\DebitCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PaymentController extends Controller
{
    public function store(Request $request, $id){

        // dd(Crypt::decrypt($id));
        $decart =Crypt::decrypt($id);
        // try {
            // $order = $this->addToOrdersTables($request, null);
            $order = Order::findOrFail($decart);
            $transaction = new PaygccOrder();
            $order_id = $order->id; //shop’s order id
            $total = $order->billing_total; //shop value
            $customer_id = auth()->user()->id; //order customer id
            $cutomer_name = auth()->user()->name; //order customer name
            $transaction->setOrderId($order_id)->amount($total)->customer($customer_id, $cutomer_name);

            if ($order->payment_gateway == 'Debit') {

                $debitcard = new DebitCard([
                    // 'http://10.147.19.237/webhook?order_id=' . $order_id,
                    // 'http://10.147.19.237/success_payment?order_id=' . $order_id
                    // 'http://10.147.19.237/failed_payment?order_id=' . $order_id
                    'webhook_url'           => url('webhook?order_id=' . $order_id),
                    'success_redirect_url'  => url('success_payment?order_id=' . $order_id),
                    'failed_redirect_url'   => url('failed_payment?order_id=' . $order_id)
                ]);
                $payment = $debitcard->process($transaction)->pay();
                return $payment->render_url();

            } elseif  ($order->payment_gateway == 'Credit') {

                $creditcard = new CreditCard([
                    'cc_number' => 'xxxxxxxxxxxxxxxx', //credit card number
                    'expiry_month' => '06', //card expiry month DD format
                    'expiry_year' => '22', //card expiry year YY format
                    'cvv' => 'xxx', //card cvv
                    // 'webhook_url' => 'http://10.147.19.237/webhook?order_id=' . $order_id,
                    // 'success_url' => 'http://10.147.19.237/success_payment?order_id=' . $order_id,
                    // 'failed_url'  => 'http://10.147.19.237/failed_payment?order_id=' . $order_id,
                    'webhook_url' =>  url('webhook?order_id=' . $order_id),
                    'success_url' =>  url('success_payment?order_id=' . $order_id),
                    'failed_url'  =>  url('failed_payment?order_id=' . $order_id),

                    'save_token' => 0, // set 1 if you need to save a token for this card to be able to pay with it in second type below, 0 for not saving it
                ]);

                $payment = $creditcard->process($transaction)->pay();
                return $payment->render();
            }else {
//                abort(404);
                return redirect()->to(route('confirm.index'))->with('error','not alllowd');
            }

//         } catch (CardErrorException  $e) {
// //            dd($e->getMessage());
//             // $this->addToOrdersTables($request, $e->getMessage());
//             return back()->withErrors('Error! ' . $e->getMessage());
//         }
    }
}
