<?php

namespace App\Http\Controllers\Store;

use App\DataTables\Store\ProductsDatatables;
use App\DataTables\Store\ProductsPendingDataTable;
use App\Http\Controllers\Controller;
use App\Models\ImageData;
use App\Models\OtherColor;
use App\Models\OtherData;
use App\Models\Product;
use App\Models\SizeData;
use App\Models\SizeAbaya;
use App\Models\Tag;
use App\Models\TagData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductsDatatables $productsDatatables)
    {
        return $productsDatatables->render('store.home', ['title' => trans('shop.products')]);
//        $shop = shop()->user()->id;
////        $products = Product::all()->where('shop_id',$shop);
//        $products = Product::where('store_id', $shop)->paginate(8);
//        return view('store.home')->with('products', $products);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param string $title
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        $shop = shop()->user()->id;
        $product_id = Product::where('title', $title)->firstOrFail();

         $tags= TagData::where('product_id',$product_id->id)->get();
        //  dd($tags);

        if ($product = Product::where('title', $title)->where('store_id', $shop)->firstOrFail()) {
            return view('store.product.view')->with([
                'product'=>$product,
                'tags'=>$tags
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $title
     * @return \Illuminate\Http\Response
     */
    public function edit($title)
    {
        $shop = shop()->user()->id;
        if ($product = Product::where('title', $title)->where('store_id', $shop)->firstOrFail()) {
            return view('store.product.edit')->with('product', $product);
        }
//        dd($title);
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


        if ($request->category_id == 1) {
            $this->validate(request(), [
                'title' => 'sometimes',
                'content' => 'required',
                'store_id' => 'required|numeric',
                'category_id' => 'required|numeric',
                'qty' => 'required|max:20|numeric',
                'include_shailah' => 'required',
                'price' => 'required|numeric',
                'price_offer' => 'sometimes|nullable|numeric',
                'status' => 'sometimes|nullable|in:not active,active',
                'color_id' => 'required',



            ], [], [
                'title' => trans('admin.title'),
                'content' => trans('shop.product_content'),
                'store_id' => trans('admin.shop_id'),
                'price' => trans('admin.price'),
                'price_offer' => trans('admin.price_offer'),
                'status' => trans('admin.status'),


            ]);


        } elseif ($request->category_id == 2) {
            $this->validate(request(), [
                'title' => 'sometimes|unique:products',
                'content' => 'required',
                'store_id' => 'required|numeric',
                'category_id' => 'required',
                'price' => 'required|numeric',
                'price_offer' => 'sometimes|nullable|numeric',
                'status' => 'sometimes|nullable|in:not active,active',
                'show' => 'required|nullable|in:not active,active',
                'qty' => 'required|max:20|numeric',
                'color_id' => 'required',

            ], [], [
                'title' => trans('admin.title'),
                'content' => trans('shop.product_content'),
                'store_id' => trans('admin.shop_id'),
                'category_id' => trans('admin.category_id'),

                'price' => trans('admin.price'),
                'price_offer' => trans('admin.price_offer'),
                'status' => trans('admin.status'),
            ]);
        } else {
            $this->validate(request(), [
                'content' => 'required',
                'store_id' => 'required|numeric',
                'category_id' => 'required',
                'color_id' => 'required|numeric',
                'price' => 'required|numeric',
                'price_offer' => 'sometimes|nullable|numeric',
                'show' => 'required|in:not active,active',
                'status' => 'required|in:not active,active',
                'size' => 'required',
                'size_qty' => 'required',


            ], [], [
                'title' => trans('admin.title'),
                'content' => trans('shop.product_content'),
                'store_id' => trans('admin.shop_id'),
                'category_id' => trans('admin.category_id'),
                'price' => trans('admin.price'),
                'price_offer' => trans('admin.price_offer'),
                'status' => trans('admin.status'),
            ]);

        }


        $product = Product::findOrFail($id);


        $product->content = request('content');
        $product->store_id = $request->store_id;
        $product->category_id = $request->category_id;
        $product->color_id = $request->color_id;

        $product->price = $request->price;
        $product->price_offer = $request->price_offer;
        $product->status = $request->status;
        $product->show = $request->show;
// !        this for abaya anad shela qty
        if (request()->has('qty')) {
            $product->qty = $request->qty;
        }
//!        only for abaya category
        if (request()->has('include_shailah')) {
            $product->include_shailah = $request->include_shailah;
        }
//! size_chart        all categories with out  abaya & shila
        if (request()->has('size_chart')) {
            $chart = Product::findOrFail($id);

            if ($image_path = Storage::disk('do_spaces')->exists($chart->size_chart)) {

                Storage::disk('do_spaces')->delete($chart->size_chart);

            }

            $image_path = $request->file('size_chart');
            $extenstion = $request-> file('size_chart')->extension();
            $path = Storage::disk('do_spaces')->putFileAs('products/SizeChart',$image_path,time().'.'.$extenstion,'public');
            $product->size_chart = $path;


        }
//! main_image
        if (request()->has('main_image')) {
            $this->validate($request, [
                'main_image' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:ratio=3/4',
            ]);
            $main = Product::findOrFail($id);
            if ($image_path = Storage::disk('do_spaces')->exists($main->main_image)) {

                Storage::disk('do_spaces')->delete($main->main_image);

            }

            $image_path = $request->file('main_image');
            $extenstion = $request-> file('main_image')->extension();
            $path = Storage::disk('do_spaces')->putFileAs('products/mainImage',$image_path,time().'.'.$extenstion,'public');
            $product->main_image = $path;


        }


        $product->save();

//! tags
        if (request()->has('tags')) {
            TagData::where('product_id', $product->id)->delete();
            foreach (request('tags') as $key) {


                TagData::create([
                    'product_id' => $product->id,
                    'tag_id' => $key,

                ]);

            }


        }

//! sizes
        if (request()->has('size') && request()->has('size_qty')) {
            if (count($request->size) > 0) {
                SizeData::where('product_id', $product->id)->delete();
                foreach ($request->size as $item => $v) {
                    $data2 = array(
                        'product_id' => $product->id,
                        'size_data' => $request->size[$item],
                        'size_qty' => $request->size_qty[$item],
                        'created_at' => new \DateTime(),
                        'updated_at' => new \DateTime()
                    );
                    SizeData::insert($data2);
                }
            }


        }
//! image section
        if ($all_images = $request->file('input_image')) {

            $i = 0;
            $image_data = 0;

            $this->validate($request, [
                'input_image[]' => 'sometimes|image|mimes:jpg,png,jpeg|max:2048|dimensions:ratio=3/4',
            ]);

            foreach ($all_images as $image) {
                $photo_name = rand() . '.' . $image->getClientOriginalExtension();

                $path = Storage::disk('do_spaces')->
                putFileAs(
                    'products/'.$product->id,
                    $image,
                    $photo_name,
                    'public'
                );



                $images = new ImageData([
                    'product_id' => $product->id,
                    'image_key' => $path
                ]);

                $images->save();

                $i++;
            }
            $data['image_data'] = rtrim($image_data, '|');
        }


        session()->flash('success_message', trans('admin.record_added'));
        return redirect(surl('showShop'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        Product::where('id',$id)->update(['show' => 'delete']);






            session()->flash('success',trans('admin.deleted_record'));
            return redirect(surl('showShop'));






    }

    public function updateColor(Request $request, $id)
    {

        $data = $this->validate($request, [
            'data_value' => 'nullable',
        ]);

        OtherData::where('id', $id)->update($data);

        session()->flash('success', trans('admin.record_added'));
        return redirect(surl('showShop'));
    }

    public function updateColorA(Request $request, $id)
    {
//        dd($request->all());

        $data = $this->validate($request, [
            'color_show' => 'nullable',
        ]);

        OtherColor::where('id', $id)->update($data);

        session()->flash('success', trans('admin.record_added'));
        return redirect(surl('showShop'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function singleDelete($id)
    {



        $data = ImageData::where('id', $id)->firstOrFail();


        if ($image_path = Storage::disk('do_spaces')->exists($data->image_key)) {

            Storage::disk('do_spaces')->delete($data->image_key);

        }
        $data->delete($id);

        session()->flash('success', trans('admin.deleted_record'));
        return redirect()->back();
    }


    public function tags(Request $request, $id){

        // dd($id);

        // $tags_old =TagData::where('product_id',$id)->firstOrFail();
        if (request()->has('tags')) {
            TagData::where('product_id', $id)->delete();
            foreach (request('tags') as $key) {


                TagData::create([
                    'product_id' => $id,
                    'tag_id' => $key,

                ]);

            }


        }

        session()->flash('success_message', trans('shop.uploaded_successfully'));
        return redirect()->back();

    }



    public function getAbayaSizePage($title){

        $shop = shop()->user()->id;
        $product_id = Product::where('title', $title)->firstOrFail();

         $sizes= SizeAbaya::where('product_id',$product_id->id)->get();
        //  dd($tags);

        if ($product = Product::where('title', $title)->where('store_id', $shop)->firstOrFail()) {
            return view('store.product.sizeAbaya')->with([
                'product'=>$product,
                'sizes'=>$sizes
            ]);
        }
    }

    public function abayaSize(Request $request, $id){

        // dd($request->all());

        // $tags_old =TagData::where('product_id',$id)->firstOrFail();
        if (request()->has('my_name')) {
            SizeAbaya::where('product_id', $id)->delete();
            foreach (request('my_name') as $key) {
                if($key== 'a_size1'){
                    SizeAbaya::create([
                        'product_id' => $id,
                        'img_abaya' => 'img/size/abaya-1.png',
                        'size_abaya' => $key,
                    ]);
                }
                elseif($key== 'a_size2'){
                    SizeAbaya::create([
                        'product_id' => $id,
                        'img_abaya' => 'img/size/abaya-2.png',
                        'size_abaya' => $key,
                    ]);
                }
                elseif($key== 'a_size3'){
                     SizeAbaya::create([
                    'product_id' => $id,
                    'img_abaya' => 'img/size/abaya-3.png',
                    'size_abaya' => $key,
                ]);}
                elseif($key== 'a_size4'){
                    SizeAbaya::create([
                    'product_id' => $id,
                    'img_abaya' => 'img/size/abaya-4.png',
                    'size_abaya' => $key,
                ]);}
                elseif($key== 'a_size5'){
                     SizeAbaya::create([
                    'product_id' => $id,
                    'img_abaya' => 'img/size/abaya-5.png',
                    'size_abaya' => $key,
                ]);}
                elseif($key== 'a_size6'){
                    SizeAbaya::create([
                    'product_id' => $id,
                    'img_abaya' => 'img/size/abaya-6.png',
                    'size_abaya' => $key,
                ]);}

            }


        }

        session()->flash('success_message', trans('shop.uploaded_successfully'));
        return redirect()->back();

    }
    public function abayaSizeTable(Request $request, $id){

        // dd($request->all());

        // $tags_old =TagData::where('product_id',$id)->firstOrFail();
        if (request()->has('my_name')) {
            SizeAbaya::where('product_id', $id)->delete();
            foreach (request('my_name') as $key) {
                if($key== 'a_size1'){
                    SizeAbaya::create([
                        'product_id' => $id,
                        'img_abaya' => 'img/size/abaya-1.png',
                        'size_abaya' => $key,
                    ]);
                }
                elseif($key== 'a_size2'){
                    SizeAbaya::create([
                        'product_id' => $id,
                        'img_abaya' => 'img/size/abaya-2.png',
                        'size_abaya' => $key,
                    ]);
                }
                elseif($key== 'a_size3'){
                     SizeAbaya::create([
                    'product_id' => $id,
                    'img_abaya' => 'img/size/abaya-3.png',
                    'size_abaya' => $key,
                ]);}
                elseif($key== 'a_size4'){
                    SizeAbaya::create([
                    'product_id' => $id,
                    'img_abaya' => 'img/size/abaya-4.png',
                    'size_abaya' => $key,
                ]);}
                elseif($key== 'a_size5'){
                     SizeAbaya::create([
                    'product_id' => $id,
                    'img_abaya' => 'img/size/abaya-5.png',
                    'size_abaya' => $key,
                ]);}
                elseif($key== 'a_size6'){
                    SizeAbaya::create([
                    'product_id' => $id,
                    'img_abaya' => 'img/size/abaya-6.png',
                    'size_abaya' => $key,
                ]);}

            }


        }

        session()->flash('success_message', trans('shop.uploaded_successfully'));
        return redirect(surl('showShop'));

    }


}
