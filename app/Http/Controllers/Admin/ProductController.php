<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ProductsDatatables;
use App\Http\Controllers\Controller;
use App\Mail\Admin\ProductConfirm;
use App\Models\Category;
use App\Models\ImageData;
use App\Models\OtherColor;
use App\Models\OtherData;
use App\Models\Product;
use App\Models\ProductStore;
use App\Models\SizeData;
use App\Models\TagData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductsDatatables $product)
    {
        return $product->render('admin.products.index', ['title' => trans('admin.products')]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create', ['title' => trans('admin.create_countries')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
// dd($request->all());
//        dd($request->all());
//        dd($request->all());
//          if ($request->category_id =2) {
//              dd($request->all());
//          }


        if ($request->category_id == 1) {
            $this->validate(request(), [
                'title' => 'required',
                'content' => 'required',
                'store_id' => 'required|numeric',
                'category_id' => 'required|numeric',
//            'shop_name'       =>'required',
//            'color_id' => 'required|numeric',
                'price' => 'required',
                'price_offer' => 'sometimes|nullable|numeric',
                'status' => 'sometimes|nullable|in:not active,active',
                'input_value' => 'required',
                'input_key' => 'required',
                'color_key' => 'required',
                'color_show' => 'required',
                'input_image' => 'required',
                'main_image'=>'required',

            ], [], [
                'title' => trans('admin.title'),
                'content' => trans('admin.content'),
                'store_id' => trans('admin.shop_id'),
                'category_id' => trans('admin.category_id'),
//            'color_id' => trans('admin.color_id'),
                'price' => trans('admin.price'),
                'price_offer' => trans('admin.price_offer'),
                'status' => trans('admin.status'),


            ]);
        }else {
            $this->validate(request(), [
                'title' => 'required',
                'content' => 'required',
                'store_id' => 'required|numeric',
                'category_id' => 'required|numeric',
//            'shop_name'       =>'required',
//            'color_id' => 'required|numeric',
                'price' => 'required',
                'price_offer' => 'sometimes|nullable|numeric',
                'status' => 'sometimes|nullable|in:not active,active',
                'input_value' => 'required',
                'input_key' => 'required',
                'input_image' => 'required',
                'main_image'=>'required',

            ], [], [
                'title' => trans('admin.title'),
                'content' => trans('admin.content'),
                'store_id' => trans('admin.shop_id'),
                'category_id' => trans('admin.category_id'),
//            'color_id' => trans('admin.color_id'),
                'price' => trans('admin.price'),
                'price_offer' => trans('admin.price_offer'),
                'status' => trans('admin.status'),


            ]);
        }







        $product = new Product();
        $product->title = $request->title;
        $product->content = request('content');
        $product->store_id = $request->store_id;
        $product->category_id = $request->category_id;
//        $product->color_id = $request->color_id;
        $product->price = $request->price;
        $product->price_offer = $request->price_offer;
        $product->status = $request->status;

        $m_image = $request->main_image;

        $photo_name_main = rand() . '.' . $m_image->getClientOriginalExtension();
        $m_image->move('img/theme/product/', $photo_name_main);


        $product->main_image = $photo_name_main;



        $product->save();


        if (request()->has('tags')){

            foreach (request('tags') as $key) {


                TagData::create([
                    'product_id' => $product->id,
                    'tag_id' => $key,

                ]);

            }




        }
        //First Color fir abaya
        if (request()->has('input_value') && request()->has('input_key')) {
            $i = 0;
            $other_data = 0;
//            OtherData::where('product_id',$product->id)->delete();
            foreach (request('input_key') as $key) {
                $data_value = !empty(request('input_value')[$i]) ? request('input_value')[$i] : '';

                OtherData::create([
                    'product_id' => $product->id,
                    'data_key' => $key,
                    'data_value' => $data_value
                ]);
                $i++;
            }
            $data['other_data'] = rtrim($other_data, '|');
        }

        //second Color fir shela
        if (request()->has('color_key') && request()->has('color_show')) {
            $i = 0;
            $color_data = 0;
//            OtherData::where('product_id',$product->id)->delete();
            foreach (request('color_key') as $key) {
                $data_value = !empty(request('color_show')[$i]) ? request('color_show')[$i] : '';

                OtherColor::create([
                    'product_id' => $product->id,
                    'color_key' => $key,
                    'color_show' => $data_value
                ]);
                $i++;
            }
            $data['other_color'] = rtrim($color_data, '|');
        }
        // sizes
        if (request()->has('size_data')) {
            $i = 0;
//            $color_data = 0;
//            OtherData::where('product_id',$product->id)->delete();
            foreach (request('size_data') as $key) {
//                $data_value = !empty(request('size_data')[$i]) ? request('size_data')[$i] : '';

                SizeData::create([
                    'product_id' => $product->id,
                    'size_data' => $key,
//                    'color_show' => $data_value
                ]);
                $i++;
            }
//            $data['other_color'] = rtrim($color_data, '|');
        }
// image section
        if ($all_images = $request->file('input_image')) {
            $i = 0;
            $image_data = 0;

            // $all_images = $request->file('input_image');
            foreach ($all_images as $image) {
                // $photo = $request->file('input_image');
                $photo_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move('img/theme/product/', $photo_name);



                $images = new ImageData([
                    'product_id' => $product->id,
                    'image_key' => $photo_name
                ]);

                $images->save();

                $i++;
            }
            $data['image_data'] = rtrim($image_data, '|');
        }





        $shopPro = new ProductStore();
        $shopPro->product_id = $product->id;
        $shopPro->store_id = $request->store_id;
        $shopPro->save();

        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('products'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $product = Product::find($id);
        $title = trans('admin.edit');
        $tags= TagData::where('product_id',$id)->get();
        return view('admin.products.view', compact('product', 'title','tags'));





    }



     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCreate($id)
    {
// dd($id);
        // $product = Product::find($id);
        $title = trans('admin.edit');
        // return view('admin.products.view', compact('product', 'title'));

        if ($category_master = Category::where('name_en', $id)->firstOrFail()) {
            return view('admin.products.create', compact('category_master','title'));

        }
        return view('errorPage.404');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $title = trans('admin.edit');
        return view('admin.products.edit', compact('product', 'title'));
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
//        dd($request->all());
//        dd(public_path());
        $dataProduct = $this->validate(request(), [
            'title' => 'required',
            'content' => 'required',
            'store_id' => 'required|numeric',
            'price' => 'required',
            'price_offer' => 'sometimes|nullable|numeric',
            'status' => 'sometimes|nullable|in:not active,active',
            'show' => 'sometimes|nullable|in:not active,active',


        ], [], [

            'title' => trans('admin.title'),
            'content' => trans('admin.content'),
            'store_id' => trans('admin.shop_id'),
            'price' => trans('admin.price'),
            'price_offer' => trans('admin.price_offer'),
            'status' => trans('admin.status'),
            'show' => trans('admin.show'),


        ]);



        if (request()->has('input_value') && request()->has('input_key')) {
            $i = 0;
            $other_data = 0;
            OtherData::where('product_id', $id)->delete();
            foreach (request('input_key') as $key) {
                $data_value = !empty(request('input_value')[$i]) ? request('input_value')[$i] : '';

                OtherData::create([
                    'product_id' => $id,
                    'data_key' => $key,
                    'data_value' => $data_value
                ]);
                $i++;
            }
            $data['other_data'] = rtrim($other_data, '|');
        }
        //magas
        if (request()->has('size_data') && request()->has('size_show')) {
            $i = 0;
            $other_color = 0;
            SizeData::where('product_id', $id)->delete();
            foreach (request('size_data') as $key) {
                $data_value = !empty(request('size_show')[$i]) ? request('size_show')[$i] : '';

                SizeData::create([
                    'product_id' => $id,
                    'size_data' => $key,
                    'size_show' => $data_value
                ]);
                $i++;
            }
            $data['size_data'] = rtrim($other_color, '|');
        }
        //color
        if (request()->has('color_show') && request()->has('color_key')) {
            $i = 0;
            $other_color = 0;
            OtherColor::where('product_id', $id)->delete();
            foreach (request('color_key') as $key) {
                $data_value = !empty(request('color_show')[$i]) ? request('color_show')[$i] : '';

                OtherColor::create([
                    'product_id' => $id,
                    'color_key' => $key,
                    'color_show' => $data_value
                ]);
                $i++;
            }
            $data['other_color'] = rtrim($other_color, '|');
        }
//dd( $request->file('input_image'));
        if ($all_images = $request->file('input_image')) {

            $i = 0;
            $image_data = 0;

            // $all_images = $request->file('input_image');
            foreach ($all_images as $image) {
                // $photo = $request->file('input_image');
                $photo_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move('img/theme/products/', $photo_name);


                $images = new ImageData([
                    'product_id' => $id,
                    'image_key' => $photo_name
                ]);

                $images->save();


                $i++;
            }
            $data['image_data'] = rtrim($image_data, '|');
        }



        Product::where('id', $id)->update($dataProduct);
        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $this->delete($id);
        //$products= Product::find($id);
        //Storage::delete($products->logo);
        // $products->delete();
        // session()->flash('success', trans('admin.deleted_record'));





        $product = Product::findOrFail($id);

        Product::where('id',$id)->update(['show' => 'delete']);






            session()->flash('success',trans('admin.deleted_record'));
        return redirect(aurl('products'));
    }
    public function delete($id)
    {
        $products = Product::find($id);
        //Storage::delete($products->logo);
        up()->delete_file($id);
        $products->delete();

    }
    public function multi_delete()
    {

        if (is_array(request('item'))) {
//            Product::destroy(request('item'));
            foreach (request('item') as $id) {
                $products = Product::find($id);

                $products->delete();
            }


        } else {
//            Product::find(request('item'))->delete();
            $products = Product::find(request('item'));

            $products->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function singleDelete($id)
    {
//        dd($id);
        $data = ImageData::where('id',$id)->first();
//        $image_delet =       Storage::delete('product/'.$data->image_key);
        $image_delet =unlink(public_path('img/theme/products/'.$data->image_key));

//        dd($image_delet);
        $data->delete($id);

        //$products= Product::find($id);
        // $products->delete();
        session()->flash('success', trans('admin.deleted_record'));
        return redirect()->back();
    }

    public function update_status(Request $request, $id)
    {
    //    dd($request->all());


       $this->validate($request,[
        'show'=>'required',

    ]);

   if($request->show =='approved'){
        $data =[
            'show'=>$request->show,
        ];
        Product::where('id', $id)->update($data);
        $product =Product::find($id);
        Mail::queue(new ProductConfirm($product));

    }else
    {
        $data =[
            'show'=>$request->show,
        ];
        Product::where('id', $id)->update($data);
    }




    session()->flash('success', trans('admin.record_added'));
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

}
