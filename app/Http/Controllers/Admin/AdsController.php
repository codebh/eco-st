<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\AdsDatatables;
use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdsDatatables $ads)
    {
        return $ads->render('admin.ads.index', ['title' => trans('admin.ads')]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ads.create', ['title' => trans('admin.create_categories')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//                dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'type' => 'required',
            'url' => 'sometimes',
            'image' => 'required',

        ], [], [
            'name_ar' => trans('admin.coupon_code'),
            'name_en' => trans('admin.coupon_type'),
            'image' => trans('admin.coupon_value'),

        ]);
//         $adv_image = $request->file('image');
//         $photo_file = rand() . '.' . $adv_image->getClientOriginalExtension();
//         $adv_image->move('img/theme/ads/', $photo_file);
// //        $image->move('storage/product/' . $product->id, $photo_name);


            $image_path = $request->file('image');
            $extenstion = $request-> file('image')->extension();
            $path = Storage::disk('do_spaces')->putFileAs('Ads',$image_path,time().'.'.$extenstion,'public');
            // $product->main_image = $path;

        $category = new Ads();
        $category->title = $request->title;
        $category->type = $request->type;
        $category->url = $request->url;
        $category->image = $path;


        $category->save();

//        Coupon::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('ads'));
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
        $ads = Ads::find($id);
        $title = trans('admin.edit');
        return view('admin.ads.edit', compact('ads', 'title'));
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

//dd($request->all());
        if ($request->file('image')) {
            $data = $this->validate($request, [
                'title' => 'required',

                'type' => 'required',
                'url' => 'sometimes',

//                'image' => 'sometimes|string',


            ], [], [
                'title' => trans('admin.ads_title'),
                'sub_title' => trans('admin.ads_subtitle'),
                'type' => trans('admin.ads_type'),
                'url' => trans('admin.ads_url'),
                'value' => trans('admin.ads_value'),
                'image' => trans('admin.ads_image'),


            ]);
            $ads = Ads::find($id);
            // dd(Storage::disk('do_spaces')->exists($ads->image));
            // $image_path = public_path().'/img/theme/ads/' . $ads->image;

            // if (file_exists($image_path)) {

            //     @unlink($image_path);

            // }

            // $ads_image = $request->file('image');
            // $photo_file = rand() . '.' .$ads_image->getClientOriginalExtension();
            // $ads_image->move('img/theme/ads/', $photo_file);


            if (Storage::disk('do_spaces')->exists($ads->image)) {

                Storage::disk('do_spaces')->delete($ads->image);

            }

            $image_path = $request->file('image');
            $extenstion = $request-> file('image')->extension();
            $path = Storage::disk('do_spaces')->putFileAs('Ads',$image_path,time().'.'.$extenstion,'public');


            // $category =  Ads::find($id);

            $ads->title = $request->title;
            // $category->sub_title = $request->sub_title;
            $ads->type = $request->type;
            $ads->url = $request->url;
            // $category->value = $request->value;
            $ads->image = $path;
            $ads->save();


        }else{
            $data = $this->validate($request, [
                'title' => 'required',

                'type' => 'required',
                'url' => 'sometimes',

//                'image' => 'sometimes|string',


            ], [], [
                'title' => trans('admin.ads_title'),
                'sub_title' => trans('admin.ads_subtitle'),
                'type' => trans('admin.ads_type'),
                'url' => trans('admin.ads_url'),
                'value' => trans('admin.ads_value'),


            ]);
            Ads::where('id', $id)->update($data);


        }







        toast(trans('admin.updated_record'), 'success', 'center',);
        return redirect(aurl('ads'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Ads::find($id);

        if (Storage::disk('do_spaces')->exists($category->image)) {

            Storage::disk('do_spaces')->delete($category->image);

        }
        // $image_path = public_path().'/img/theme/ads/' . $category->image;
//        dd($image_path);

        $category->delete();

        // if (file_exists($image_path)) {

        //     @unlink($image_path);

        // }
//        $category->delete();
//        $this->delete($id);
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('ads'));
    }
}
