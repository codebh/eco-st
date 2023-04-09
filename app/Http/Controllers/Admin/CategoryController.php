<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CategoriesDatatables;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoriesDatatables $category)
    {
        return $category->render('admin.categories.index', ['title' => trans('admin.categories')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create', ['title' => trans('admin.create_categories')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'name_ar' => 'required',
            'name_en' => 'required',
            'des_ar' => 'required',
            'des_en' => 'required',
            'image' => 'required',

        ], [], [
            'name_ar' => trans('admin.coupon_code'),
            'name_en' => trans('admin.coupon_type'),
            'image' => trans('admin.coupon_value'),

        ]);
        $category_image = $request->file('image');
        $photo_file = rand() . '.' . $category_image->getClientOriginalExtension();
        $category_image->move('storage/category/', $photo_file);
//        $image->move('storage/product/' . $product->id, $photo_name);

        $category = new Category();
        $category->name_ar = $request->name_ar;
        $category->name_en = $request->name_en;
        $category->des_ar = $request->des_ar;
        $category->des_en = $request->des_en;
        $category->image = $photo_file;


        $category->save();

//        Coupon::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('categories'));
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
        $category = Category::find($id);
        $title = trans('admin.edit');
        return view('admin.categories.edit', compact('category', 'title'));
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
        $data = $this->validate($request, [
            'name_ar' => 'required',
            'name_en' => 'required',
            'des_ar' => 'required',
            'des_en' => 'required',
            'image' => 'required|',


        ], [], [
            'name_ar' => trans('admin.name_ar'),
            'name_en' => trans('admin.name_en'),
            'image' => trans('admin.color'),


        ]);
        $category =Category::findOrFail($id);

        $category->name_ar = $request->name_ar;
        $category->name_en = $request->name_en;
        $category->slug = SlugService::createSlug(Category::class, 'slug', $request->name_en);
        $category->des_ar = $request->des_ar;
        $category->des_en = $request->des_en;
        $category->image = $request->image;
        $category->save();



        // Category::where('id', $id)->update($data);

        toast(trans('admin.updated_record'), 'success', 'center',);
        return redirect(aurl('categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $image_path = public_path().'/img/theme/category/' . $category->image;
//        dd($image_path);

        $category->delete();
        if (file_exists($image_path)) {

            @unlink($image_path);

        }
//        $category->delete();
//        $this->delete($id);
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('categories'));
    }

}
