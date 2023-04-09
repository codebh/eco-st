<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\FaqsDatarablesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FaqsDatarablesDataTable  $faqs)
    {
        return $faqs->render('admin.faq.index',['title'=> trans('admin.faqs')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create',['title'=>trans('admin.create_faq')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    dd($request->all());
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

        $faq_last =Faq::latest()->first();

        if (count(Faq::all())>0) {
            $faq = new Faq();
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->type = 'user';
            $faq->serial = $faq_last->id+1;
            $faq->lang = $request->lang;
            $faq->save();

        }else{
            $faq = new Faq();
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->type = 'user';
            $faq->serial = 1;
            $faq->lang = $request->lang;
            $faq->save();
        }

        // Faq::create($data);
        // dd($faq_last->type);

        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('faq'));
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
        $faq= Faq::find($id);

        $faq->delete();
        session()->flash('success',trans('admin.deleted_record'));
        return redirect(aurl('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::find($id);
        $title = trans('admin.edit');
        return view('admin.faq.edit',compact('faq','title'));
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


        Faq::where('id',$id)->update($data);
        toast(trans('admin.updated_record'),'success','center',);
        return redirect(aurl('faq'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $faq= Faq::find($id);

        $faq->delete();
        session()->flash('success',trans('admin.deleted_record'));
        return redirect(aurl('faq'));
    }
}
