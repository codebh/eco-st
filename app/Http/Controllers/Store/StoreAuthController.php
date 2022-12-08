<?php

namespace App\Http\Controllers\Store;

use  App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Http\Requests\LoginRequest;

class StoreAuthController extends Controller
{

    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard) {
        $this->guard = $guard;
    }

    /**
     * Show the login view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LoginViewResponse
     */
    public function login(Request $request) {
        if (Auth::guard('shop')->user()) {
            return redirect('admin/dashborad');
        } else {
            return view('store.login');
        }
    }

    /**
     * Attempt to authenticate a new session.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return mixed
     */
    public function dologin(LoginRequest $request) {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
                    'email' => 'required',
                    'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }
        $email = $request->email;
        $password = $request->password;
        if (Auth::guard('shop')->attempt(['email' => $email, 'password' => $password])) {
            return redirect(surl('/'));
        }else{
            return back()->withErrors(['crediential doesnot match']);
        }
    }



    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LogoutResponse
     */
    public function logout(Request $request){
        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

    return redirect()->to(surl('login'));
    }
}
