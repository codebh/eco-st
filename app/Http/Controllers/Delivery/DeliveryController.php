<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function login(){

        return view('delivery.login');
    }

    public function dologin(Request $request){

        $this->validate($request,[
                'email' => 'required|email',
                'password' => 'required|string',
        ]);




        $rememberme = request('rememberme')==1 ? true:false;
        if (delivery()->attempt(['email'=>request('email'),'password'=>request('password')],$rememberme)){


            return redirect(durl('/'));

        }else{
            session()->flash('error',trans('admin.information_login'));
            return redirect(durl('login'))->withErrors(['error'=>trans('admin.information_login')]);

        }
    }

    public function logout(){

        auth()->guard('delivery')->logout();
        return redirect(durl('logout'));
    }
}
