<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Mail\Store\ProductToAdmin;
use App\Models\Category;
use App\Models\ImageData;
use App\Models\OtherColor;
use App\Models\OtherData;
use App\Models\Product;
use App\Models\ProductStore;
use App\Models\SizeData;
use App\Models\TagData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AddProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = shop()->user()->id;
//        $products = Product::all()->where('shop_id',$shop);
        $products = Product::where('store_id', $shop)->paginate(8);

        return view('store.products.index')
            ->with('products', $products);
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
dd($request->all());

        if ($request->category_id == 1) {
            $this->validate(request(), [
                'content' => 'required',
                'store_id' => 'required|numeric',
                'category_id' => 'required|numeric',
                'qty' => 'required|max:20|numeric',
                'include_shailah' => 'required',
                'price' => 'required|numeric',
                'price_offer' => 'sometimes|nullable|numeric',
                'status' => 'sometimes|nullable|in:not active,active',
                'color' => 'required',
                'main_image' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:ratio=3/4',
                'input_image[]' => 'image|mimes:jpg,png,jpeg|max:2048|dimensions:ratio=3/4',
                ], [], [

                'content' => trans('shop.product_content'),
                'store_id' => trans('admin.shop_id'),
                'price' => trans('admin.price'),
                'price_offer' => trans('admin.price_offer'),
                'status' => trans('admin.status'),
                'main_image' => trans('shop.main_image'),
                'include_shailah' => trans('shop.with_shailah'),


            ]);
        } elseif ($request->category_id == 2) {
            $this->validate(request(), [
                'content' => 'required',
                'store_id' => 'required|numeric',
                'category_id' => 'required',
                'price' => 'required|numeric',
                'price_offer' => 'sometimes|nullable|numeric',
                'status' => 'sometimes|nullable|in:not active,active',
                'show' => 'required|nullable|in:not active,active',
                'qty' => 'required|max:20|numeric',
                'color' => 'required',
                'main_image' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:ratio=3/4',
                'input_image[]' => 'image|mimes:jpg,png,jpeg|max:2048|dimensions:ratio=3/4',

            ], [], [
                'content' => trans('shop.product_content'),
                'store_id' => trans('admin.shop_id'),
                'category_id' => trans('admin.category_id'),
                'price' => trans('admin.price'),
                'price_offer' => trans('admin.price_offer'),
                'status' => trans('admin.status'),
                'main_image' => trans('shop.main_image'),
                'show' => trans('shop.show'),
            ]);
        } else {
            $this->validate(request(), [
                'content' => 'required',
                'store_id' => 'required|numeric',
                'category_id' => 'required',
                'color' => 'required|numeric',
                'price' => 'required|numeric',

                'price_offer' => 'sometimes|nullable|numeric',
                'show' => 'required|in:not active,active',
                'status' => 'required|in:not active,active',
                // 'size' => 'required',
                // 'size_qty' => 'required',
                'size_chart' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                'main_image' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:ratio=3/4',
                'input_image[]' => 'image|mimes:jpg,png,jpeg|max:2048|dimensions:ratio=3/4',

            ], [], [
                'content' => trans('shop.product_content'),
                'store_id' => trans('admin.shop_id'),
                'category_id' => trans('admin.category_id'),
                'price' => trans('admin.price'),
                'price_offer' => trans('admin.price_offer'),
                'status' => trans('admin.status'),
                'show' => trans('shop.show'),
                'size_chart' => trans('shop.size_guide'),
                'main_image' => trans('shop.main_image'),
            ]);
        }


//


        $product = new Product();
        $product->content = request('content');
        $product->store_id = $request->store_id;
        $product->category_id = $request->category_id;
        $product->color_id = $request->color;
        $product->price = $request->price;
        $product->price_offer = $request->price_offer;
        $product->status = $request->status;
        $product->show = 'pending';
//         this for abaya anad shela qty
        if (request()->has('qty')) {
            $product->qty = $request->qty;
        }
//        only for abaya category
        if (request()->has('include_shailah')) {
            $product->include_shailah = $request->include_shailah;
        }
//        all categories with out  abaya & shila
        if (request()->has('size_chart')) {

            $photo_name_size = rand() . '.' . $request->file('size_chart')->getClientOriginalExtension();
            $image_path = $request->file('size_chart');
            $extenstion = $request-> file('size_chart')->extension();
            $path = Storage::disk('do_spaces')->putFileAs('products/SizeChart',$image_path,time().'.'.$extenstion,'public');
            $product->size_chart = $path;



        }

        if (request()->has('main_image')) {

            $image_path_main = $request->file('main_image');
            $extenstion = $request-> file('main_image')->extension();
            $path = Storage::disk('do_spaces')->putFileAs('products/mainImage',$image_path_main,time().'.'.$extenstion,'public');
            $product->main_image = $path;

        }

        $product->save();




        if ($all_images = $request->file('input_image')) {
            $i = 0;
            $image_data = 0;


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


        if (request()->has('tag')) {
            foreach (request('tag') as $key) {


                TagData::create([
                    'product_id' => $product->id,
                    'tag_id' => $key,

                ]);

            }


        }
        //First Color fir abaya
        if (request()->has('input_key')) {
            $i = 0;
            $other_data = 0;
            foreach (request('input_key') as $key) {

                OtherData::create([
                    'product_id' => $product->id,
                    'data_key' => $key,
                ]);
                $i++;
            }
        }

        //second Color fir shela
        if (request()->has('color_key')) {
            $i = 0;
            $color_data = 0;
            foreach (request('color_key') as $key) {

                OtherColor::create([
                    'product_id' => $product->id,
                    'color_key' => $key,
                ]);
                $i++;
            }
        }
        // sizes
        if (request()->has('size') && request()->has('size_qty')) {
            if (count($request->size) > 0) {
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





        $shopPro = new ProductStore();
        $shopPro->product_id = $product->id;
        $shopPro->store_id = $request->store_id;
        $shopPro->save();


        $produt_mail = Product::find($product->id);

        Mail::queue(new ProductToAdmin($produt_mail));

        session()->flash('success_message', trans('shop.product_add'));
//        return redirect(surl('products'));
        return redirect(surl('showShop'));

    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        if ($category_master = Category::where('name_en', $id)->firstOrFail()) {
            return view('store.product.create', compact('category_master',));

        }
        return view('errorPage.404');
//        $category = Category::findOrFail($id);
//        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $title)
    {
//

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

//    public function a()
//    {
//
//    }
}
