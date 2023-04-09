<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\DeliveryDatatabelsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DeliveryDatatabelsDataTable $admin)
    {
        return $admin->render('admin.delivery.index', ['title' => 'Admin Control']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.delivery.create', ['title' => trans('admin.delivery')]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $this->validate($request, [
            'f_name' => 'required',
            'l_name' => 'required',
            'mobile' => 'required',
            'email' => 'required|email|unique:deliveries',
            'password' => 'required|min:6'
        ], [], [
            'name' => trans('admin.name'),
            'email' => trans('admin.email'),
            'password' => trans('admin.password')
        ]);
        $d = new Delivery();
        $d->f_name = $request->f_name;
        $d->l_name = $request->l_name;
        $d->mobile = $request->mobile;
        $d->email = $request->email;
        $d->password = bcrypt(request('password'));
            $d->save();
        // $data['password'] =
        // Delivery::create($data);
//        session()->flash('success', trans('admin.record_added'));
        toast('Success Toast','success');
        return redirect(aurl('delivery'));

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
        $admin = Delivery::find($id);
        $title = trans('admin.edit');
        return view('admin.delivery.edit', compact('admin', 'title'));


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
        //        dd($request->all());
        $data = $this->validate($request, [
            'f_name' => 'required',
            'l_name' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (request()->has('password')) {
            $data['password'] = bcrypt(request('password'));
        }

        Delivery::where('id', $id)->update($data);
//        session()->flash('success', trans('admin.updated_record'));
        toast(trans('admin.updated_record'),'success');
        return redirect(aurl('delivery'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Delivery::find($id)->delete();
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('delivery'));

    }
}
