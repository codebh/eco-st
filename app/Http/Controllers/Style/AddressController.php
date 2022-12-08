<?php

namespace App\Http\Controllers\Style;

use App\Http\Controllers\Controller;

use App\Models\Address;

use Illuminate\Http\Request;


class AddressController extends Controller
{


    public function address_update(Request $request)
    {
//        dd($request->all());
        $user = auth()->user()->id;
        if ($userAddress=Address::where('user_id', $user)->first()) {
//            dd(us);
            $data = $this->validate($request, [
                'address1' => 'required',
                'address2' => 'sometimes',
                'country' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zip' => 'required',
            ]);
            $address=Address::where('user_id', $user)->update($data);
            return redirect()->back()->with(['message_success'=>trans('user.address_change')]);

        } else {
            $this->validate($request, [
                'address1' => 'required',
                'address2' => 'sometimes',
                'country' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zip' => 'required',
            ]);
            $address = new Address();
            $address->address1 = $request->address1;
            $address->address2 = $request->address2;
            $address->country = $request->country;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->zip = $request->zip;
            $address->user_id = auth()->user()->id;
            $address->save();
//            dd($address);
            return redirect()->back()->with('message_success',trans('user.address_change'));
        }
    }

}
