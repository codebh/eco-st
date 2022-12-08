<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\GuideDatatabelsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GuideDatatabelsDataTable $guide)
    {
        return $guide->render('admin.guide.index',['title'=> trans('admin.help')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guide.create',['title'=>trans('admin.help')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'question'=>'required',
            'answer'=>'required',
            // 'type'=>'required',

            'lang'=>'required|string',


        ],[],[
            'question'=>trans('admin.question'),
            'answer'=>trans('admin.answer'),
            'lang'=>trans('admin.lang'),
            // 'type'=>trans('admin.lang'),


        ]);

        // Faq::create($data);
        // $faq = new Guide();
        // $faq->question = $request->question;
        // $faq->answer = $request->answer;
        // // $faq->type = 'store';
        // $faq->lang = $request->lang;
        // $faq->save();


        $faq_last =Guide::latest()->first();

        if (count(Guide::all())>0) {
            $faq = new Guide();
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            // $faq->type = 'user';
            $faq->serial = $faq_last->id+1;
            $faq->lang = $request->lang;
            $faq->save();

        }else{
            $faq = new Guide();
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            // $faq->type = 'user';
            $faq->serial = 1;
            $faq->lang = $request->lang;
            $faq->save();
        }
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('guide'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq= Guide::find($id);

        $faq->delete();
        session()->flash('success',trans('admin.deleted_record'));
        return redirect(aurl('guide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Guide::find($id);
        $title = trans('admin.edit');
        return view('admin.guide.edit',compact('faq','title'));
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
            'question'=>'required',
            'answer'=>'required',
            // 'type'=>'required',
            'lang'=>'required|string',


        ],[],[
            'question'=>trans('admin.question'),
            'answer'=>trans('admin.answer'),
            'lang'=>trans('admin.lang'),


        ]);


        Guide::where('id',$id)->update($data);
        toast(trans('admin.updated_record'),'success','center',);
        return redirect(aurl('guide'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq= Guide::find($id);

        $faq->delete();
        session()->flash('success',trans('admin.deleted_record'));
        return redirect(aurl('guide'));
    }
}
