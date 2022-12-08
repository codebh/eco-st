<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SizesDatatables;
use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SizesDatatables $size)
    {
        return $size->render('admin.sizes.index',['title'=> trans('admin.size')]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sizes.create',['title'=>trans('admin.create_sizes')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'name'=>'required',
            ],[],[
            'name'=>trans('admin.size_format'),
         ]);

        Size::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('sizes'));
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
        $size = Size::find($id);
        $title = trans('admin.edit');
        return view('admin.sizes.edit',compact('size','title'));
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
        $data = $this->validate($request,[
            'name'=>'required',
            ],[],[
            'name'=>trans('admin.name'),
              ]);


        Size::where('id',$id)->update($data);
        toast(trans('admin.updated_record'),'success','center',);
        return redirect(aurl('sizes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size= Size::find($id);
        $size->delete();
        session()->flash('success',trans('admin.deleted_record'));
        return redirect(aurl('sizes'));
    }
}
