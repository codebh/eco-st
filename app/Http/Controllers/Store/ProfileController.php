<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function index()
    {
        return view('store.profile.profile');
    }
    public function update(Request $request)
    {
//        dd( shop()->user()->password);
//        dd($request->all());
        $this->validate($request, [
//            'current-password' => 'required',
            'password' => 'required|same:password|min:8',
            'password_confirmation' => 'required|same:password',


        ]);



        $user_id = shop()->user()->id;



        $user = Store::find($user_id);
        $user->password = Hash::make($request->password);
        $user->save();
        session()->flash('success', trans('admin.record_added'));
        return redirect()->back();




    }

    public function updateBio(Request $request)
    {
          $this->validate($request, [
//            'current-password' => 'required',
            'bio' => 'required',



        ]);

        $bio= Store::findOrFail(shop()->user()->id);

//        $bio = Store::find($store_id);
        $bio->bio = $request->bio;
        $bio->save();

        session()->flash('success', trans('admin.record_added'));
        return redirect()->back();
//        dd($store_id);
//        Store::where('')
    }

    public function get_video(){
        return  view('store.help');
    }


    public function changeStatus(Request $request){
            // dd($request->all());
            $this-> validate($request,[
                'close'=>'required',
            ]);

            if ($request->close =='yes') {

                $this-> validate($request,[
                    // 'close'=>'required',
                    'date_of_end'=>'required',
                    'reason'=>'required',
                ],[],[
                    'date_of_end'=>trans('shop.profile_date'),
                    'reason'=>trans('shop.profile_reason'),

                ]);

                $store = Store::findOrFail(shop()->user()->id);
                $store->close= 'yes';
                $store->date_of_end =$request->date_of_end;
                $store->reason =$request->reason;
                $store->save();
                return redirect()->back();


            }elseif($request->close =='no'){
                $this-> validate($request,[
                    'close'=>'required',
                    // 'date_of_end'=>'required',
                    // 'reason'=>'required',
                ]);
                $store = Store::findOrFail(shop()->user()->id);
                $store->close= 'no';
                $store->date_of_end =null;
                $store->reason =null;
                $store->save();
                return redirect()->back();

            }
    }
}
