<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\BlogDatatables;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BlogDatatables $blog)
    {
        return $blog->render('admin.blog.index', ['title' => trans('admin.blog')]);
    }


        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create',['title'=>trans('admin.create_blog')]);
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
            'blog_ar'=>'required',
            'blog_en'=>'required|string',


        ],[],[
            'name'=>trans('admin.question'),
            'blog_ar'=>trans('admin.answer'),
            'blog_en'=>trans('admin.lang'),


        ]);

        Blog::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('blog'));
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
        $blog = Blog::find($id);
        $title = trans('admin.edit');
        return view('admin.blog.edit',compact('blog','title'));
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
            'blog_ar'=>'required',
            'blog_en'=>'required|string',


        ],[],[
            'name'=>trans('admin.question'),
            'blog_ar'=>trans('admin.answer'),
            'blog_en'=>trans('admin.lang'),


        ]);


        Blog::where('id',$id)->update($data);
        toast(trans('admin.updated_record'),'success','center',);
        return redirect(aurl('blog'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog= Blog::find($id);

        $blog->delete();
        session()->flash('success',trans('admin.deleted_record'));
        return redirect(aurl('blog'));
    }
}
