<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CampaignDataTables;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CampaignDataTables $camp)
    {
        return $camp->render('admin.campaign.index', ['title' => trans('admin.ads')]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.campaign.create', ['title' => trans('admin.create_categories')]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'type' => 'required',
            'url' => 'sometimes',
            'date_of_start' => 'sometimes',
            'date_of_end' => 'sometimes',
            'image' => 'required',

        ], [], [
            'name_ar' => trans('admin.coupon_code'),
            'name_en' => trans('admin.coupon_type'),
            'image' => trans('admin.coupon_value'),

        ]);


            $image_path = $request->file('image');
            $extenstion = $request-> file('image')->extension();
            $path = Storage::disk('do_spaces')->putFileAs('Campaign',$image_path,time().'.'.$extenstion,'public');
            // $product->main_image = $path;

        $category = new Campaign();
        $category->title = $request->title;
        $category->type = $request->type;
        $category->date_of_start = $request->date_of_start;
        $category->date_of_end = $request->date_of_end;
        $category->url = $request->url;
        $category->image = $path;


        $category->save();

//        Coupon::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('campaign'));
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
        $ads = Campaign::find($id);
        $title = trans('admin.edit');
        return view('admin.campaign.edit', compact('ads', 'title'));
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
        if ($request->file('image')) {
            $data = $this->validate($request, [
                'title' => 'required',
                'date_of_start' => 'required',
                'date_of_end' => 'required',
                'type' => 'required',
                'url' => 'sometimes',


            ], [], [
                'title' => trans('admin.ads_title'),
                'sub_title' => trans('admin.ads_subtitle'),
                'type' => trans('admin.ads_type'),
                'url' => trans('admin.ads_url'),
                'value' => trans('admin.ads_value'),
                'image' => trans('admin.ads_image'),


            ]);
            $ads = Campaign::find($id);
            if (Storage::disk('do_spaces')->exists($ads->image)) {
                Storage::disk('do_spaces')->delete($ads->image);
            }

            $image_path = $request->file('image');
            $extenstion = $request-> file('image')->extension();
            $path = Storage::disk('do_spaces')->putFileAs('Campaign',$image_path,time().'.'.$extenstion,'public');

            $ads->title = $request->title;
            $ads->type = $request->type;
            $ads->url = $request->url;
            $ads->date_of_start = $request->date_of_start;
            $ads->date_of_end = $request->date_of_end;
            $ads->image = $path;
            $ads->save();


        }else{
            $data = $this->validate($request, [
                'title' => 'required',
                'date_of_start' => 'required',
                'date_of_end' => 'required',
                'type' => 'required',
                'url' => 'sometimes',
            ], [], [
                'title' => trans('admin.ads_title'),
                'sub_title' => trans('admin.ads_subtitle'),
                'type' => trans('admin.ads_type'),
                'url' => trans('admin.ads_url'),
                'value' => trans('admin.ads_value'),


            ]);
            Campaign::where('id', $id)->update($data);


        }







        toast(trans('admin.updated_record'), 'success', 'center',);
        return redirect(aurl('campaign'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Campaign::find($id);

        if (Storage::disk('do_spaces')->exists($category->image)) {

            Storage::disk('do_spaces')->delete($category->image);

        }
        $category->delete();
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('campaign'));
    }
}
