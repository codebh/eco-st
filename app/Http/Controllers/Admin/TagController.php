<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\TagsDatatables;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\TagData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TagsDatatables $tag)
    {
        return $tag->render('admin.tag.index', ['title' => trans('admin.tags')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create', ['title' => trans('admin.tag_create')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    //    dd($request->all());

        $this->validate($request, [

            "name_ar" => "required|unique:tags",
            "name_en" => "required|unique:tags",
            "des_ar" => "sometimes|unique:tags",
            "des_en" => "sometimes|unique:tags",
            "collection" => "required",
            "c_show" => "required",
            // "c_image" => "required",
            // "c_image_en" => "required",
//            "started_at" => "required",
//            "ended_at" => "required",


        ]);

//        dd($request->all());
if ($request->file('c_image') !== null) {

    $this->validate($request, [
        "c_image" =>'required|image|mimes:jpg,png,jpeg|max:2048',
    ]);

        $image_path_main = $request->file('c_image');
        $extenstion = $request-> file('c_image')->extension();
        $path_ar = Storage::disk('do_spaces')->putFileAs('collections/ar',$image_path_main,time().'.'.$extenstion,'public');
    }

    if ($request->file('c_image_en') !== null) {

    $this->validate($request, [
        "c_image_en" => 'required|image|mimes:jpg,png,jpeg|max:2048',
    ]);
        $image_path_main = $request->file('c_image_en');
        $extenstion = $request-> file('c_image_en')->extension();
        $path_en = Storage::disk('do_spaces')->putFileAs('collections/en',$image_path_main,time().'.'.$extenstion,'public');
    }

        // $tag_image = $request->file('c_image');
        // $photo_file = rand() . '.' . $tag_image->getClientOriginalExtension();
        // $tag_image->move('img/theme/tags/', $photo_file);

        // $tag_image1 = $request->file('c_image_en');
        // $photo_file1 = rand() . '.' . $tag_image->getClientOriginalExtension();
        // $tag_image1->move('img/theme/tags/', $photo_file1);


        $tag = new Tag();

        $tag->name_ar = $request->name_ar;
        $tag->name_en = $request->name_en;
        $tag->des_ar = $request->des_ar;
        $tag->des_en = $request->des_en;
        $tag->collection = $request->collection;
        $tag->c_show = $request->c_show;
        if ($request->file('c_image') !== null) {
            $tag->c_image =$path_ar;
        }
        if ($request->file('c_image_en') !== null) {
            $tag->c_image_en =$path_en;
        }
        $tag->started_at = $request->started_at;
        $tag->ended_at = $request->ended_at;
        $tag->save();
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('tag'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        $title = trans('admin.edit');
        return view('admin.tag.edit',compact('tag','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //    dd($request->all());
         $this->validate($request,[
            "name_ar" => "sometimes|unique:tags",
            "name_en" => "sometimes|unique:tags",
            "des_ar" => "sometimes",
            "des_en" => "sometimes",
            "collection" => "required",
            "c_show" => "sometimes",

            "started_at" => "sometimes",
            "ended_at" => "sometimes",


        ],[],[
            'name_ar'=>trans('admin.name_ar'),
            'name_en'=>trans('admin.name_en'),
            'color'=>trans('admin.color'),


        ]);


//        dd($image_path);
       if ($request->file('c_image')) {
        $this->validate($request, [
            'c_image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        $data = Tag::where('id',$id)->first();
        if ($image_path = Storage::disk('do_spaces')->exists($data->c_image)) {

            Storage::disk('do_spaces')->delete($data->c_image);

        }

        $image_path = $request->file('c_image');
        $extenstion = $request-> file('c_image')->extension();
        $path_ar = Storage::disk('do_spaces')->putFileAs('collections/ar',$image_path,time().'.'.$extenstion,'public');








       }

        if ($request->file('c_image_en')) {
            $this->validate($request, [
                'c_image_en' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ]);
            $data = Tag::where('id',$id)->first();
            if ($image_path = Storage::disk('do_spaces')->exists($data->c_image_en)) {

                Storage::disk('do_spaces')->delete($data->c_image_en);

            }

            $image_path = $request->file('c_image_en');
            $extenstion = $request-> file('c_image_en')->extension();
            $path_en = Storage::disk('do_spaces')->putFileAs('collections/en',$image_path,time().'.'.$extenstion,'public');



        }






        $tag = Tag::find($id);
//        dd($tag);
        if($request->name_ar !== null){

            $tag->name_ar = $request->name_ar;
        }
        if($request->name_en !== null){

            $tag->name_en = $request->name_en;
            $tag->slug = SlugService::createSlug(Tag::class, 'slug', $tag->name_en);
        }
        if($request->des_ar !== null){

            $tag->des_ar = $request->des_ar;
        }
        if($request->des_en !== null){

            $tag->des_en = $request->des_en;
        }
        $tag->collection = $request->collection;
        $tag->c_show = $request->c_show;
        if ($request->file('c_image')) {
            $tag->c_image = $path_ar;
        }
        if ($request->file('c_image_en')) {
            $tag->c_image_en = $path_en;
        }
        $tag->started_at = $request->started_at;
        $tag->ended_at = $request->ended_at;
        $tag->save();




//        Tag::where('id',$id)->update($data);
        toast(trans('admin.updated_record'),'success','center',);
        return redirect(aurl('tag'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $taqs_data = TagData::where('tag_id',$id)->delete();

        $tag= Tag::find($id);
//         $image_path = public_path().'/img/theme/tags/'. $tag->c_image;
//         $image_path1 = public_path().'/img/theme/tags/'. $tag->c_image_en;
// //        dd($image_path);
//         if (file_exists($image_path)) {

//             @unlink($image_path);

//         }
//         if (file_exists($image_path1)) {

//             @unlink($image_path1);

//         }

        if ( Storage::disk('do_spaces')->exists($tag->c_image)) {

            Storage::disk('do_spaces')->delete($tag->c_image);

        }
        if ( Storage::disk('do_spaces')->exists($tag->c_image_en)) {

            Storage::disk('do_spaces')->delete($tag->c_image_en);

        }

        $tag->delete();

        session()->flash('success',trans('admin.deleted_record'));
        return redirect(aurl('tag'));
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
