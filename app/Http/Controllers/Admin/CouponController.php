<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CouponsDatatables;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CouponsDatatables $coupon)
    {
        return $coupon->render('admin.coupons.index', ['title' => trans('admin.coupon')]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create', ['title' => trans('admin.create_coupon')]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request()->all());

        $this->validate($request, [
            'code' => 'required',
            'type' => 'required',
            'value' => 'required',
            'qty' => 'required|numeric',
            'end' => 'required',

        ], [], [
            'code' => trans('admin.coupon_code'),
            'type' => trans('admin.coupon_type'),
            'value' => trans('admin.coupon_value'),
            'qty' => trans('admin.qty'),
            'end' => trans('admin.end_at'),

        ]);
        $coupon = new Coupon();
        $coupon->code = $request->code;
        $coupon->type = $request->type;
        $coupon->qty = $request->qty;
        $coupon->end = $request->end;

        if ($request->type == 'fixed') {
            $coupon->value = $request->value;
        } else {
            $coupon->percent_off = $request->value;
        }
        $coupon->save();

//        Coupon::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('coupons'));
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
        $coupon = Coupon::find($id);
        $title = trans('admin.edit');
        return view('admin.coupons.edit',compact('coupon','title'));

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
        $this->validate($request, [
            'code' => 'required',
            'type' => 'required',
            'value' => 'required',
            'qty' => 'required|numeric',
            'end' => 'required',

        ], [], [
            'code' => trans('admin.coupon_code'),
            'type' => trans('admin.coupon_type'),
            'value' => trans('admin.coupon_value'),
            'qty' => trans('admin.qty'),
            'end' => trans('admin.end_at'),

        ]);
        if ($request->type =='fixed'){
            $data=[
                'code'=>$request->code,
                'type'=>$request->type,
                'value'=>$request->value,
                'percent_off'=>0,
                'qty'=>$request->qty,
                'end'=>$request->end,

            ];

        }else{
            $data =[
                'code'=>$request->code,
                'type'=>$request->type,
                'percent_off'=>$request->value,
                'value'=>0,
                'qty'=>$request->qty,
                'end'=>$request->end

            ];
        }

        Coupon::where('id',$id)->update($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('coupons'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon= Coupon::find($id);

        $coupon->delete();
        session()->flash('success',trans('admin.deleted_record'));
        return redirect(aurl('coupons'));
    }
    public function multi(){
        // dd('multiu');
        return view('admin.coupons.multi');
    }

    public function multiCoupons(Request $request){
        // dd($request->all());
        $num = (int) $request->count;
// dd($num);
        $this->validate($request,[
            "count" => 'required',
            "type" => 'required',
            "value" => 'required',
            "qty" => 'required',
            "end" => 'required',
        ]);

        // $make= Coupon::factory(App\Models\Coupon::class, 5)->create([
        //     'code' => Str::random(6),
        //     'type' => 'percent',
        //     'value' => 20,
        //     'percent_off' => 0,
        //     'qty' => 0,
        //     'end' => now(),
        // ]);


// dd($request->count);
         for ($i=0; $i < $num; $i++) {
// dd('inside');
            if($request->type =='fixed'){
                $coupon = new Coupon();
                $coupon->code = Str::random(6);
                $coupon->type = $request->type;
                $coupon->value =$request->value;
                $coupon->qty =$request->qty;
                $coupon->end =$request->end;
                $coupon->save();


            }else{
                $coupon = new Coupon();
                $coupon->code = Str::random(6);
                $coupon->type = $request->type;
                $coupon->percent_off =$request->value;
                $coupon->qty =$request->qty;
                $coupon->end =$request->end;
                $coupon->save();


            }

         }

         return redirect(aurl('coupons'));
    }
}
