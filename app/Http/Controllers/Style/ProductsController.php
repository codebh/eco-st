<?php

namespace App\Http\Controllers\Style;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use romanzipp\Seo\Structs\Link;
use romanzipp\Seo\Structs\Meta\OpenGraph;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified'])->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        seo()->title(session('lang')=='ar'?'تفصيل | ملابس اون لاين ':'Tafseel | online shopping ');
        seo()->description(session('lang')=='ar'?' تفصيل | أكتشف مجموعة من موديلات  الملابس  والعبايات والفساتين والبدلات العملية والجلابيات وملابس المحجبات':
        'Tafseel |Explore all designs of clothes, dresses, bayas, suits, jalabiyas, dresses, and modest clothing.');

        seo()->addMany([
            Link::make()->rel('canonical')->href('https://tafseel.net/all-products'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('icon')->href(asset('img/s_logo.png')),
            Link::make()->rel('shortcut icon')->href(asset('img/s_logo.png')),
            OpenGraph::make()->property('title')->content(
            session('lang')=='ar'?
            'تفصيل | ملابس اون لاين '
            :
            'Tafseel | online shopping '
            ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('description')->content(
            session('lang')=='ar'?
            ' تفصيل | أكتشف مجموعة من موديلات  الملابس  والعبايات والفساتين والبدلات العملية والجلابيات وملابس المحجبات'
            :
            'Tafseel |Explore all designs of clothes, dresses, bayas, suits, jalabiyas, dresses, and modest clothing.'
        ),
            OpenGraph::make()->property('url')->content('https://tafseel.net/all-products'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website')
        ]);

        $pagination = 8;
        $categories = Store::all();
        $colors = Color::all();
//        $products_id = Product::find('shop_id');
//        $shopName= shop::where('id',$products_id);


        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('name', request()->category);
            });
            $categoryName = optional($categories->where('name', request()->category)->first())->name;

        } else {

            $products = Product::take(9);
            $categoryName = 'Featured';
        }


        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->where('status', 'not active')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->where('status', 'not active')->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->inRandomOrder()->where('status', 'not active')->paginate($pagination);
        }




        return view('style.products.products')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
            'colors' => $colors



        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */




    public function show(string $slug)
    {
        $product= Product::where('title',$slug)->firstOrFail();

        seo()->title(session('lang')=='ar'?
        $product->title.' | '.$product->category->name_ar.' | '.$product->color->name_ar.' | '.$product->store->name
        :
        $product->title.' | '.$product->category->name_en.' | '.$product->color->name_en.' | '.$product->store->name
        );
        seo()->description($product->content);

        seo()->addMany([
            Link::make()->rel('canonical')->href('https://tafseel.net/all-products/'.$product->title),
            Link::make()->rel('icon')->href(imageDo($product->main_image)),
            OpenGraph::make()->property('url')->content('https://tafseel.net/all-products/'.$product->title),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),

            OpenGraph::make()->property('title')->content(
            session('lang')=='ar'?
            $product->title.' | '.$product->category->name_ar.' | '.$product->color->name_ar.' | '.$product->store->name
            :
            $product->title.' | '.$product->category->name_en.' | '.$product->color->name_en.' | '.$product->store->name
            ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('description')->content($product->content ),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website')
        ]);







        $mightAlsoLike = Product::
        where('show','active')->where('title','!=',$slug)->inRandomOrder()->take(6)->get();
        $mightAlsoLikeStore = Product::where(function($q){
            $q->where('show','active')->orWhere('show','not active');
        })->where('title','!=',$slug)->where('store_id',$product->store_id)->inRandomOrder()->take(6)->get();

        return view('style.details')->with([
            'product'=>$product,
            'mightAlsoLike'=>$mightAlsoLike,
            'mightAlsoLikeStore'=>$mightAlsoLikeStore
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
