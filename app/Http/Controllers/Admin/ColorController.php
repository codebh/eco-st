<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ColorsDatatables;
use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ColorsDatatables $color)
    {
        return $color->render('admin.colors.index',['title'=> trans('admin.colors')]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.colors.create',['title'=>trans('admin.create_colors')]);

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
            'name_ar'=>'required',
            'name_en'=>'required',
            'color'=>'required|string',


        ],[],[
            'name_ar'=>trans('admin.name_ar'),
            'name_en'=>trans('admin.name_en'),
            'color'=>trans('admin.color'),


        ]);

        Color::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('colors'));

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
        $color = Color::find($id);
        $title = trans('admin.edit');
        return view('admin.colors.edit',compact('color','title'));

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
            'name_ar'=>'required',
            'name_en'=>'required',
            'color'=>'required|string',


        ],[],[
            'name_ar'=>trans('admin.name_ar'),
            'name_en'=>trans('admin.name_en'),
            'color'=>trans('admin.color'),


        ]);


        Color::where('id',$id)->update($data);
        toast(trans('admin.updated_record'),'success','center',);
        return redirect(aurl('colors'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colors= Color::find($id);

        $colors->delete();
        session()->flash('success',trans('admin.deleted_record'));
        return redirect(aurl('colors'));

    }
    public function multi_delete(){

        if (is_array(request('item'))){
//            City::destroy(request('item'));
            foreach (request('item') as $id){
                $colors= Color::find($id);

                $colors->delete();
            }



        }else{
//            City::find(request('item'))->delete();
            $colors= Color::find(request('item'));

            $colors->delete();
        }
        session()->flash('success',trans('admin.deleted_record'));
        return redirect(aurl('colors'));
    }
}
