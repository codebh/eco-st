<?php

namespace App\Http\Controllers\Style;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Product;
use App\Models\Store;
use App\Models\Tag;
use App\Models\TagData;
use App\Models\SizeData;
use Carbon\Carbon;
use Devsig\Paygcc\PaygccOrder;
use Devsig\Paygcc\V5\CreditCard;
use Devsig\Paygcc\V5\DebitCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use romanzipp\Seo\Facades\Seo;
use romanzipp\Seo\Services\SeoService;
use romanzipp\Seo\Structs\Title;
use romanzipp\Seo\Structs\Meta\Description;
use romanzipp\Seo\Structs\Link;
use romanzipp\Seo\Structs\Meta\OpenGraph;

// use function Psy\debug;

class FrontController extends Controller
{
    // public function samplePay_de() {

    //     $transaction = new PaygccOrder();

    //     $order_id = 12345; //shop’s order id
    //     $total = '0.01'; //shop value
    //     $customer_id = 12345; //order customer id
    //     $cutomer_name = 'test'; //order customer name
    //     $transaction->setOrderId($order_id)->amount($total)->customer($customer_id, $cutomer_name);

    //     $debitcard = new DebitCard([
    //         'webhook_url'           => 'http://eco-staging.test/webhook?order_id='.$order_id,
    //         'success_redirect_url'  => 'http://eco-staging.test/debit_success?order_id='.$order_id,
    //         'failed_redirect_url'   => 'http://eco-staging.test/debit_failed?order_id='.$order_id
    //     ]);
    //     $payment = $debitcard->process($transaction)->pay();

    //     return $payment->render();
    // }
    // public function samplePay_cre() {


    //     try {

    //         $transaction = new PaygccOrder();

    //         $order_id = 10; //shop’s order id
    //         $total = 0.01; //shop value
    //         $customer_id = 101; //order customer id
    //         $cutomer_name = 'Test'; //order customer name

    //         $transaction->setOrderId($order_id)->amount($total)->customer($customer_id, $cutomer_name);

    //         $creditcard = new CreditCard([
    //             'cc_number'     => 'xxxxxxxxxxxxxxxx', //credit card number
    //             'expiry_month'  => '06', //card expiry month DD format
    //             'expiry_year'   => '22', //card expiry year YY format
    //             'cvv'           => 'xxx', //card cvv
    //             'webhook_url'   => 'http://eco-staging.test/webhook?order_id='.$order_id,
    //             'success_url'   => 'http://eco-staging.test/debit_success?order_id='.$order_id,
    //             'failed_url'    => 'http://eco-staging.test/debit_failed?order_id='.$order_id,
    //             'save_token'    => 0, // set 1 if you need to save a token for this card to be able to pay with it in second type below, 0 for not saving it
    //         ]);


    //         $payment = $creditcard->process($transaction)->pay();
    //         return $payment->render(); //return render() to load gateway page

    //     } catch(Exception $e) {
    //         $e->getMessage(); //Gateway exceptions
    //     }

    // }
    // public function webhook(Request $request) {
    //     Log::info('----------Webhook Response------------');
    //     Log::info($request->all());


    //     //get your system order by the the webhook order id
    //     //Update your order payment status
    //     //get the user cart from your system by the order id
    //     //Clear cart
    // }


//     public function debit_success(Request $request) {
//         try {
//             $transaction = new PaygccOrder();
//             $order_id = $request->order_id; //shop’s order id
//             $transaction = $transaction->setOrderId($order_id)->getTransactions();

// //
//                 if ($transaction->paymnet_requests == null) {

//                             echo "<h1>your not alows</h1>";

//                 }else{
//                             echo "<h1>Thank you ! Your Payment Success</h1>";
//                     echo "<pre>";
//                     var_dump($transaction);
//                     dd($transaction->paymnet_requests);
//                 }

//             //get your system order by the the webhook order id
//             //Update your order payment status
//             //get the user cart from your system by the order id
//             //Clear cart

//         } catch(Exception $e) {
//             $this->addToOrdersTables($request, $e->getMessage());
//             return back()->withErrors('Error! ' . $e->getMessage());
//         }
//     }

//     public function debit_failed(Request $request) {

// //        return  redirect()
//         try {


//             return back()->withErrors('Error!  your payment is failed' );

// //            $transaction = new PaygccOrder();
// //            $order_id = $request->order_id; //shop’s order id
// //            $transaction = $transaction->setOrderId($order_id)->getTransactions();
// //
// ////
// ////            if ($transaction->paymnet_requests == null) {
// ////
// ////                echo "<h1>your not alows</h1>";
// ////
// ////            }else{
// //                echo "<h1> Failed  Payment </h1>";
// //                echo "<pre>";
// //                var_dump($transaction);
// ////                dd($transaction->paymnet_requests);
// //                dd($transaction);
// ////            }
// //
// //            //get your system order by the the webhook order id
// //            //Update your order payment status
// //            //get the user cart from your system by the order id
// //            //Clear cart

//         } catch(Exception $e) {
//             $this->addToOrdersTables($request, $e->getMessage());
//             return back()->withErrors('Error! ' . $e->getMessage());
//         }
// //        echo "<h1>Payment Failed</h1>";
//     }





    public function homePage()
    {
        seo()->title(session('lang')=='ar'?
        'تفصيل | منصة تسوق اون لاين لتشكيلة متنوعة من العبايات وملابس المحجبات والبدلات والجلابيات والفساتين '
        :
        'Tafseel | online shopping platform for abayas, Hijab, dresses, jalabiya, modest fashion and more.'
        );
        seo()->description(session('lang')=='ar'?
        ' تفصيل | موقع للأزياء المحلية يوفر متجر إلكتروني لمصمم الأزياء لعرض القطع و إدارة الطلبات، و ويقدم تجربة تسوق أونلاين لتشكيلة متنوعة من الأزياء الفريدة من الملابس والعبايات والفساتين والبدلات العملية والجلابيات وملابس المحجبات المحتشمة وبدلات السفر .'
        :
        'Tafseel | online shopping platform for local fashion designers to manage sales and orders. providing unique designs of varius collections of abayas, suits, jalabiyas, dresses, and modest clothing.'
        );

        seo()->addMany([
            Link::make()->rel('icon')->href(asset('img/s_logo.png')),
            Link::make()->rel('shortcut icon')->href(asset('img/s_logo.png')),

            Link::make()->rel('canonical')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),

            OpenGraph::make()->property('title')->content(
            session('lang')=='ar'?
            'تفصيل | منصة تسوق اون لاين لتشكيلة متنوعة من العبايات وملابس المحجبات والبدلات والجلابيات والفساتين '
            :
            'Tafseel | online shopping platform for abayas, Hijab, dresses, jalabiya, modest fashion and more.'
            ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('description')->content(
            session('lang')=='ar'?
            ' تفصيل | موقع للأزياء المحلية يوفر متجر إلكتروني لمصمم الأزياء لعرض القطع و إدارة الطلبات، و ويقدم تجربة تسوق أونلاين لتشكيلة متنوعة من الأزياء الفريدة من الملابس والعبايات والفساتين والبدلات العملية والجلابيات وملابس المحجبات المحتشمة وبدلات السفر .'
            :
            'Tafseel | online shopping platform for local fashion designers to manage sales and orders. providing unique designs of varius collections of abayas, suits, jalabiyas, dresses, and modest clothing.'

        ),
            OpenGraph::make()->property('url')->content('https://tafseel.net'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website')
        ]);


        // dd($seo);
        // $message='hi log';
        // Log::emergency($message);
        // Log::alert($message);
        // Log::critical($message);
        // Log::error($message);
        // Log::warning($message);
        // Log::notice($message);
        // Log::info($message);
        // Log::debug($message);
        // dd(Carbon::now()->subDays(1));
        $exploreItems = Product::where('show','active')->inRandomOrder()->take(4)->get();
        $saleItems = Product::where('status', 'active')->where('show','active')->inRandomOrder()->take(4)->get();
        $products = Product::where('show','active')->orderBy('id', 'DESC')->take(4)->get();
        $stores = Store::inRandomOrder()->take(8)->get();
        $collections = Tag::where('collection', 'true')->where('c_show', 'active')->
      whereDate('started_at','<=', \Carbon\Carbon::now())
    ->whereDate('ended_at','>=', \Carbon\Carbon::now())->get();

//        $tags = Tag::where('c_show', 'active')->get();


        return view('style.home')->with([
            'products' => $products,
            'stores' => $stores,
            'exploreItems' => $exploreItems,
            'saleItems' => $saleItems,
            'collections' => $collections,

        ]);

    }


    public function vendors()
    {
        seo()->title(session('lang')=='ar'?
        'تفصيل | منصة تسوق اون لاين لعديد من محلات العبايات وملابس المحجبات والبدلات والجلابيات والفساتين '
        :'Tafseel | online shopping pltaform for multi-vendors of abayas, Hijab, dresses, jalabia, modest fashion and more.');
        seo()->description(session('lang')=='ar'?
        'متاجر أزياء توفر تصاميم فريدة لتشكيلة متنوعة من العبايات الخليجية وملابس المحجبات والبدلات العملية والجلابيات والفساتين.'
        :
        'Tafseel Fashion designers Provide unique designs of various collections of abayas, suits, jalabiyas, dresses, and modest clothing.'
            );

        seo()->addMany([
            // main icon
            Link::make()->rel('icon')->href(asset('img/s_logo.png')),
            Link::make()->rel('shortcut icon')->href(asset('img/s_logo.png')),

            Link::make()->rel('canonical')->href('https://tafseel.net/shops'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),

            OpenGraph::make()->property('title')->content(
            session('lang')=='ar'?
            'تفصيل | منصة تسوق اون لاين لعديد من محلات العبايات وملابس المحجبات والبدلات والجلابيات والفساتين '
            :
            'Tafseel | online shopping pltaform for multi-vendors of abayas, Hijab, dresses, jalabia, modest fashion and more.'
            ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('description')->content(
            session('lang')=='ar'?
            'متاجر أزياء توفر تصاميم فريدة لتشكيلة متنوعة من العبايات الخليجية وملابس المحجبات والبدلات العملية والجلابيات والفساتين.'
            :
            'Tafseel Fashion designers Provide unique designs of various collections of abayas, suits, jalabiyas, dresses, and modest clothing.'
        ),
            OpenGraph::make()->property('url')->content('https://tafseel.net/shops'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website')
        ]);
        return view('style.vendors.index');

    }
    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */

    public function vendorsFind($slug)
    {
        // dd($slug);

        $store= Store::where('slug',$slug)->firstOrFail();

        seo()->title(session('lang')=='ar'?
        ' ملابس اونلاين | '.$slug:$slug.' | online shopping'
    );
        seo()->description($store->bio);

        seo()->addMany([
            // main logo
            Link::make()->rel('icon')->href(imageDo($store->logo)),
            Link::make()->rel('shortcut icon')->href(imageDo($store->logo)),

            Link::make()->rel('canonical')->href(''),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),

            OpenGraph::make()->property('title')->content(
            session('lang')=='ar'?
           'ملابس اونلاين | '.$slug: $slug.' | online shopping'
            ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('description')->content($store->bio),
            OpenGraph::make()->property('url')->content(''),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website')
        ]);



//        $products = Product::all()->where('store_id', $store->id);

        return view('style.vendors.details')->with(['store' => $store]);

    }
    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function productDetails($slug)
    {
        // $product= Product::where('title',$slug)->firstOrFail();

        $product= Product::where('title',$slug)->firstOrFail();

        seo()->title(session('lang')=='ar'?
        $product->title.' | '.$product->category->name_ar.' | '.$product->color->name_ar.' | '.$product->store->name
        :
        $product->title.' | '.$product->category->name_en.' | '.$product->color->name_en.' | '.$product->store->name
        );
        seo()->description($product->content);



        seo()->addMany([
            Link::make()->rel('icon')->href(imageDo($product->main_image)),
            Link::make()->rel('shortcut icon')->href(imageDo($product->main_image)),

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



        $mightAlsoLike = Product::where('title','!=',$slug)->inRandomOrder()->take(8)->get();
        $mightAlsoLikeStore  = Product::where('title','!=',$slug)->where('store_id',$product->store_id)->inRandomOrder()->take(8)->get();



        return view('style.details')->with(
            ['product' => $product,
             'mightAlsoLike'=>$mightAlsoLike,
             'mightAlsoLikeStore'=>$mightAlsoLikeStore,
             ]
        );

    }

    public function aboutUS()
    {
        seo()->title(session('lang')=='ar'?
        'تفصيل | منصة تسوق اون لاين لتشكيلة متنوعة من العبايات وملابس المحجبات والبدلات والجلابيات والفساتين '
        :
        'Tafseel | online shopping platform for abayas, Hijab, dresses, jalabiya, modest fashion and more.'
    );
        seo()->description(session('lang')=='ar'?
        'موقع تفصيل يجمع مصممي الأزياء في منصة واحدة ووفر متجر إلكتروني لعرض قطعهم الفريدة في السوق الإلكترونية وتنمية أعمالهم بفعالية أكثر، مع توفير تجربة تسوق اون لاين لتشكيلة متنوعة من العبايات الخليجية والبدلات العملية والجلابيات والفساتين بتصاميم فريدة من إنتاج محلي مع خدمة التوصيل.        '
        :
        'Tafseel is a Multi-vendor Market Place for Costume-made fashion.We bring local fashion designers together in one place to help them bring their unique designs into online-market and to grow their business efficiently. Providing unique designs and varius collections of abayas, suits, jalabiyas, dresses, and modest clothing. with a smart online shopping experince and delivery service.'
    );

        seo()->addMany([
            Link::make()->rel('icon')->href(asset('img/s_logo.png')),
            Link::make()->rel('shortcut icon')->href(asset('img/s_logo.png')),
            OpenGraph::make()->property('title')->content(
                session('lang')=='ar'?
                'تفصيل | منصة تسوق اون لاين لتشكيلة متنوعة من العبايات وملابس المحجبات والبدلات والجلابيات والفساتين '
                :
                'Tafseel | online shopping platform for abayas, Hijab, dresses, jalabiya, modest fashion and more.'
            ),

            OpenGraph::make()->property('description')->content(
                session('lang')=='ar'?
                'موقع تفصيل يجمع مصممي الأزياء في منصة واحدة ووفر متجر إلكتروني لعرض قطعهم الفريدة في السوق الإلكترونية وتنمية أعمالهم بفعالية أكثر، مع توفير تجربة تسوق اون لاين لتشكيلة متنوعة من العبايات الخليجية والبدلات العملية والجلابيات والفساتين بتصاميم فريدة من إنتاج محلي مع خدمة التوصيل.        '
                :
                'Tafseel is a Multi-vendor Market Place for Costume-made fashion.We bring local fashion designers together in one place to help them bring their unique designs into online-market and to grow their business efficiently. Providing unique designs and varius collections of abayas, suits, jalabiyas, dresses, and modest clothing. with a smart online shopping experince and delivery service.'
           ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('url')->content('https://tafseel.net/aboutUS'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website'),
            Link::make()->rel('canonical')->href('https://tafseel.net/aboutUS'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('en')->href('https://tafseel.net'),

        ]);



        return view('style.pages.about');
    }
  /**
     * Display the specified resource.
     *
     * @param  string  $collec
     * @return \Illuminate\Http\Response
     */


    public function collection($collec)
    {
        $item = Tag::where('slug',$collec)->first();
        // dd($item);

        seo()->title(session('lang')=='ar'?
        $item->name_ar.' | تفصيل'
        :
        'Tafseel | '.$item->name_en
        );
        seo()->description(session('lang')=='ar'?
        $item->des_ar
        :
        $item->des_en);

        seo()->addMany([
            Link::make()->rel('icon')->href(asset('img/s_logo.png')),
            Link::make()->rel('shortcut icon')->href(asset('img/s_logo.png')),

            Link::make()->rel('canonical')->href('https://tafseel.net/collection/'.$item->name_en),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),

            OpenGraph::make()->property('title')->content(
            session('lang')=='ar'?
            $item->name_ar.' | تفصيل'
            :
            'Tafseel | '.$item->name_en
            ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('description')->content(
            session('lang')=='ar'?
            $item->des_ar
            :
            $item->des_en
        ),
            OpenGraph::make()->property('url')->content('https://tafseel.net/collection/'.$item->name_en),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website')
        ]);

        return view('style.collection')->with(['id' => $collec,'item'=>$item]);
    }
    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function categoriesWithProduct($slug)
    {

       $category= Category::where('slug',$slug)->firstOrFail();
       $products = Product::where('category_id', $category->id)->get();



       if($category->name_en == 'abaya'){
        seo()->title(session('lang')=='ar'?
        'تفصيل | عبايات اون لاين '
        :
        'Tafseel | abaya online'
    );
        seo()->description(session('lang')=='ar'?
        'موديلات متنوعة من العبايات الكاجوال والرسمية والعملية و عبايات راقية للمناسبات وعبايات ملونة'
        :
        'different designs of casual abayas, work abayas, elegant abayas for occasion, and colored abayas'
    );

        seo()->addMany([
            Link::make()->rel('icon')->href(asset('img/s_logo.png')),
            Link::make()->rel('shortcut icon')->href(asset('img/s_logo.png')),
            OpenGraph::make()->property('title')->content(
                session('lang')=='ar'?
                'تفصيل | عبايات اون لاين'
                :
                'Tafseel | abaya online'
            ),
            OpenGraph::make()->property('description')->content(
                session('lang')=='ar'?
                'موديلات متنوعة من العبايات الكاجوال والرسمية والعملية و عبايات راقية للمناسبات وعبايات ملونة'
                :
                'different designs of casual abayas, work abayas, elegant abayas for occasion, and colored abayas'
           ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('url')->content('https://tafseel.net/categories/abaya'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website'),
            Link::make()->rel('canonical')->href('https://tafseel.net/categories/abaya'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('en')->href('https://tafseel.net'),

        ]);
       }elseif ($category->name_en == 'shailah') {
        seo()->title(session('lang')=='ar'?
        'تفصيل | شيلات اون لاين'
        :
        'Tafseel | Hjiab online'
    );
        seo()->description(session('lang')=='ar'?
        'تشكيلة متنوعة من الحجابات والشيلات بموديلات و ألوان مختلفة'
        :
        'a collection of Hijabs with different colors and styles'
    );

        seo()->addMany([

            OpenGraph::make()->property('title')->content(
                session('lang')=='ar'?
                'تفصيل | شيلات اون لاين'
                :
                'Tafseel | Hjiab online'
            ),
            OpenGraph::make()->property('description')->content(
                session('lang')=='ar'?
                'تشكيلة متنوعة من الحجابات والشيلات بموديلات و ألوان مختلفة'
                :
                'a collection of Hijabs with different colors and styles'
           ),
           Link::make()->rel('canonical')->href('https://tafseel.net/categories/shailah'),
           OpenGraph::make()->property('url')->content('https://tafseel.net/categories/shailah'),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('en')->href('https://tafseel.net'),
        ]);


       }elseif ($category->name_en == 'dress') {
        seo()->title(session('lang')=='ar'?
        'تفصيل | فساتين اون لاين '
        :
        'Tafseel | Dresses online'
    );
        seo()->description(session('lang')=='ar'?
        'موديلات متنوعة من الفستاين الكاجوال وفساتين العباية وفساتين محجبات وفساتين السهرة وفساتين للمناسبات'
        :
        'a collection of Abaya dresses,casual dresses, Hijab dresses, evening dresses, and dresses for occasion.'
    );

        seo()->addMany([
            OpenGraph::make()->property('title')->content(
                session('lang')=='ar'?
                'تفصيل | فساتين اون لاين '
                :
                'Tafseel | Dresses online'
            ),
            OpenGraph::make()->property('description')->content(
                session('lang')=='ar'?
                'موديلات متنوعة من الفستاين الكاجوال وفساتين العباية وفساتين محجبات وفساتين السهرة وفساتين للمناسبات'
                :
                'a collection of Abaya dresses,casual dresses, Hijab dresses, evening dresses, and dresses for occasion.'
           ),
           Link::make()->rel('canonical')->href('https://tafseel.net/categories/dress
'),
           OpenGraph::make()->property('url')->content('https://tafseel.net/categories/dress
'),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('en')->href('https://tafseel.net'),
        ]);


       }elseif ($category->name_en == 'jalabia') {
        seo()->title(session('lang')=='ar'?
        'تفصيل | جلابيات اون لاين '
        :
        'Tafseel | Jalabia online'
    );
        seo()->description(session('lang')=='ar'?
        'موديلات متنوعة من الجلابيات الكاجوال وجلابيات المناسبات'
        :
        'a collection of casual Jalabiya and occasions Jalabiya'
    );

        seo()->addMany([
            OpenGraph::make()->property('title')->content(
                session('lang')=='ar'?
                'تفصيل | جلابيات اون لاين '
                :
                'Tafseel | Jalabia online'
            ),
            OpenGraph::make()->property('description')->content(
                session('lang')=='ar'?
                'موديلات متنوعة من الجلابيات الكاجوال وجلابيات المناسبات'
                :
                'a collection of casual Jalabiya and occasions Jalabiya'
           ),
           Link::make()->rel('canonical')->href('https://tafseel.net/categories/jalabia'),
           OpenGraph::make()->property('url')->content('https://tafseel.net/categories/jalabia'),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('en')->href('https://tafseel.net'),
        ]);


       }elseif ($category->name_en == 'set') {
        seo()->title(session('lang')=='ar'?
        'تفصيل | بدلات اون لاين '
        :
        'Tafseel | sets online'
    );
        seo()->description(session('lang')=='ar'?
        'موديلات متنوعة من البدلات الكاجوال، البدلات الرسمية والعملية، و بدلات للمحجبات، وبدلات سفر،  وبدلات راقية للمناسبات '
        :
        'different designs of casual set, sets for work, hijabi modest clothing sets, and elegant sets for occasions'
    );

        seo()->addMany([
            OpenGraph::make()->property('title')->content(
                session('lang')=='ar'?
                'تفصيل | بدلات اون لاين '
                :
                'Tafseel | sets online'
            ),
            OpenGraph::make()->property('description')->content(
                session('lang')=='ar'?
                'موديلات متنوعة من البدلات الكاجوال، البدلات الرسمية والعملية، و بدلات للمحجبات، وبدلات سفر،  وبدلات راقية للمناسبات '
                :
                'different designs of casual set, sets for work, hijabi modest clothing sets, and elegant sets for occasions'
           ),
           Link::make()->rel('canonical')->href('https://tafseel.net/categories/set'),
           OpenGraph::make()->property('url')->content('https://tafseel.net/categories/set'),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('en')->href('https://tafseel.net'),
        ]);


       }elseif ($category->name_en == 'uniform') {
        seo()->title(session('lang')=='ar'?
        'تفصيل | ملابس رسمية اون لاين '
        :
        'Tafseel | uniforms online'
    );
        seo()->description(session('lang')=='ar'?
        'تشكيلة من الملابس الرسمية واليونيفورم'
        :
        'a collection of uniforms'
    );

        seo()->addMany([
            OpenGraph::make()->property('title')->content(
                session('lang')=='ar'?
                'تفصيل | ملابس رسمية اون لاين '
                :
                'Tafseel | uniforms online'
            ),
            OpenGraph::make()->property('description')->content(
                session('lang')=='ar'?
                'تشكيلة من الملابس الرسمية واليونيفورم'
                :
                'a collection of uniforms'
           ),
           Link::make()->rel('canonical')->href('https://tafseel.net/categories/uniform'),
           OpenGraph::make()->property('url')->content('https://tafseel.net/categories/uniform'),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('en')->href('https://tafseel.net'),
        ]);


       }elseif ($category->slug == 'skirts-and-pants') {
        seo()->title(session('lang')=='ar'?
        'تفصيل | ملابس اون لاين '
        :
        'Tafseel |clothes online'
    );
        seo()->description(session('lang')=='ar'?
        'موديلات متنوعة من البانطلونات والتنانير الكاجوال و للسفر وللمناسبات و لتنسيقها لابتكار إطلالات مختلفة'
        :
        'a collection of skirts and pants for daily use, for occasions, and for createing a capsule closet by matching them with different outfits.'
    );

        seo()->addMany([
            OpenGraph::make()->property('title')->content(
                session('lang')=='ar'?
                'تفصيل | ملابس اون لاين '
                :
                'Tafseel | clothes online'
            ),
            OpenGraph::make()->property('description')->content(
                session('lang')=='ar'?
                'موديلات متنوعة من البانطلونات والتنانير الكاجوال و للسفر وللمناسبات و لتنسيقها لابتكار إطلالات مختلفة'
                :
                'a collection of skirts and pants for daily use, for occasions, and for createing a capsule closet by matching them with different outfits.'
           ),
           Link::make()->rel('canonical')->href('https://tafseel.net/categories/skirts-and-pants'),
           OpenGraph::make()->property('url')->content('https://tafseel.net/categories/skirts-and-pants'),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('en')->href('https://tafseel.net'),
        ]);


       }elseif ($category->slug == 'blazer-and-cardigen') {
        seo()->title(session('lang')=='ar'?
        'تفصيل | بلايزر اون لاين '
        :
        'Tafseel | Blazer And Cardigen'
    );
        seo()->description(session('lang')=='ar'?
        'تشكيلة من جاكيت بليزر أو  كارديجان للإطلالات الرسمية والعملية، و لتنسيق بدلات المحجبات، وبدلات سفر أو البدلات الكاجوال،  والبدلات الراقية للمناسبات.'
        :
        'Blazer jackets & cardigans for formal looks, modest outfits, and for createing a capsule closet by matching them with casual,traveling , or occasional outfits.'
    );

        seo()->addMany([
            OpenGraph::make()->property('title')->content(
                session('lang')=='ar'?
                'تفصيل | بلايزر اون لاين '
                :
                'Tafseel | Blazer And Cardigen'
            ),
            OpenGraph::make()->property('description')->content(
                session('lang')=='ar'?
                'تشكيلة من جاكيت بليزر أو  كارديجان للإطلالات الرسمية والعملية، و لتنسيق بدلات المحجبات، وبدلات سفر أو البدلات الكاجوال،  والبدلات الراقية للمناسبات.'
                :
                'Blazer jackets & cardigans for formal looks, modest outfits, and for createing a capsule closet by matching them with casual,traveling , or occasional outfits.'
           ),
           Link::make()->rel('canonical')->href('https://tafseel.net/categories/blazer-and-cardigen'),
           OpenGraph::make()->property('url')->content('https://tafseel.net/categories/blazer-and-cardigen'),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('en')->href('https://tafseel.net'),
        ]);


       }elseif ($category->name_en == 'top') {
        seo()->title(session('lang')=='ar'?
        'تفصيل | توبات وقمصان '
        :
        'Tafseel | tops and shirts'
    );
        seo()->description(session('lang')=='ar'?
        'توبات للإطلالات الرسمية والعملية، و لتنسيق بدلات المحجبات، وبدلات سفر أو البدلات الكاجوال،  والبدلات الراقية للمناسبات.'
        :
        'Tops for formal looks, modest outfits, and for createing a capsule closet by matching them with casual,traveling , or occasional outfits.'
    );

        seo()->addMany([
            OpenGraph::make()->property('title')->content(
                session('lang')=='ar'?
                'تفصيل | توبات وقمصان '
                :
                'Tafseel | tops and shirts'
            ),
            OpenGraph::make()->property('description')->content(
                session('lang')=='ar'?
                'توبات للإطلالات الرسمية والعملية، و لتنسيق بدلات المحجبات، وبدلات سفر أو البدلات الكاجوال،  والبدلات الراقية للمناسبات.'
                :
                'Tops for formal looks, modest outfits, and for createing a capsule closet by matching them with casual,traveling , or occasional outfits.'
           ),
           Link::make()->rel('canonical')->href('https://tafseel.net/categories/top'),
           OpenGraph::make()->property('url')->content('https://tafseel.net/categories/top'),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('en')->href('https://tafseel.net'),
        ]);


       }elseif ($category->name_en == 'others') {
        seo()->title(session('lang')=='ar'?
        'تفصيل | قطع متنوعة'
        :
        'Tafseel | other items'
    );
        seo()->description(session('lang')=='ar'?
        'موديلات وتصماميم متنوعة لقطع فريدة'
        :
        'different designs of uniqe items'
    );

        seo()->addMany([
            OpenGraph::make()->property('title')->content(
                session('lang')=='ar'?
                'تفصيل | قطع متنوعة'
                :
                'Tafseel | other items'
            ),
            OpenGraph::make()->property('description')->content(
                session('lang')=='ar'?
                'موديلات وتصماميم متنوعة لقطع فريدة'
                :
                'different designs of uniqe items'
           ),
           Link::make()->rel('canonical')->href('https://tafseel.net/categories/others'),
           OpenGraph::make()->property('url')->content('https://tafseel.net/categories/others'),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('en')->href('https://tafseel.net'),
        ]);

       }



        return view('style.productCategory')->with('category',$category);
    }

    public function saleProduct()
    {


        seo()->title(session('lang')=='ar'?'تفصيل | تخفيضات ملابس اون لاين ':'Tafseel | sale clothes online');
        seo()->description(session('lang')=='ar'?
        ' تفصيل | تخفيضات على قطع من الملابس  والعبايات والفساتين والبدلات العملية والجلابيات وملابس المحجبات'
        :
        'Tafseel |Explore all designs of clothes, dresses, bayas, suits, jalabiyas, dresses, and modest clothing.');

        seo()->addMany([
            Link::make()->rel('canonical')->href('https://tafseel.net/saleProducts'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('icon')->href(asset('img/s_logo.png')),
            Link::make()->rel('shortcut icon')->href(asset('img/s_logo.png')),
            OpenGraph::make()->property('title')->content(
            session('lang')=='ar'?
            'تفصيل | تخفيضات ملابس اون لاين '
            :
            'Tafseel |sale clothes online'
            ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('description')->content(
            session('lang')=='ar'?
            ' تفصيل | تخفيضات على قطع من الملابس  والعبايات والفساتين والبدلات العملية والجلابيات وملابس المحجبات'
            :
            'Tafseel |Explore all designs of clothes, dresses, bayas, suits, jalabiyas, dresses, and modest clothing.'
        ),
            OpenGraph::make()->property('url')->content('https://tafseel.net/saleProducts'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website')
        ]);


        return view('style.products.saleProducts');
    }
    public function newInProduct()
    {


        seo()->title(session('lang')=='ar'?'وصل حديثاً  في تفصيل | موديلات جديدة ':'New in Tafseel | the latest items');
        seo()->description(session('lang')=='ar'?'وصل حديثاً في موقع تفصيل | الموديلات الجديدة من الملابس والفساتين والعبايات والبدلات العملية والجلابيات وملابس المحجبات':
        'New in Tafseel | the latest designs of clothes, dresses, abayas, suits, jalabiyas, dresses, and modest clothing');

        seo()->addMany([
            Link::make()->rel('canonical')->href('https://tafseel.net/newInProducts'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('icon')->href(asset('img/s_logo.png')),
            Link::make()->rel('shortcut icon')->href(asset('img/s_logo.png')),

            OpenGraph::make()->property('title')->content(
            session('lang')=='ar'?
            'وصل حديثاً  في تفصيل | موديلات جديدة '
            :
            'New in Tafseel | the latest items'
            ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('description')->content(
            session('lang')=='ar'?
            'وصل حديثاً في موقع تفصيل | الموديلات الجديدة من الملابس والفساتين والعبايات والبدلات العملية والجلابيات وملابس المحجبات'
            :
            'New in Tafseel | the latest designs of clothes, dresses, abayas, suits, jalabiyas, dresses, and modest clothing'),
            OpenGraph::make()->property('url')->content('https://tafseel.net/newInProducts'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website')
        ]);

        return view('style.products.newInProducts');
    }

    public static function buyer()
    {

        seo()->title(session('lang')=='ar'?
        'تفصيل |  سياسة المشتري '
        :
        'Tafseel | Buyer Policy'
    );
        seo()->description(session('lang')=='ar'?
        'موقع تفصيل يجمع مصممي الأزياء في منصة واحدة ووفر متجر إلكتروني لعرض قطعهم الفريدة في السوق الإلكترونية وتنمية أعمالهم بفعالية أكثر، مع توفير تجربة تسوق اون لاين لتشكيلة متنوعة من العبايات الخليجية والبدلات العملية والجلابيات والفساتين بتصاميم فريدة من إنتاج محلي مع خدمة التوصيل.        '
        :
        'Tafseel is a Multi-vendor Market Place for Costume-made fashion.We bring local fashion designers together in one place to help them bring their unique designs into online-market and to grow their business efficiently. Providing unique designs and varius collections of abayas, suits, jalabiyas, dresses, and modest clothing. with a smart online shopping experince and delivery service.'
    );

        seo()->addMany([
            Link::make()->rel('icon')->href(asset('img/s_logo.png')),
            Link::make()->rel('shortcut icon')->href(asset('img/s_logo.png')),
            OpenGraph::make()->property('title')->content(
                session('lang')=='ar'?
                'تفصيل |  سياسة المشتري '
                :
                'Tafseel | Buyer Policy'
            ),

            OpenGraph::make()->property('description')->content(
                session('lang')=='ar'?
                'موقع تفصيل يجمع مصممي الأزياء في منصة واحدة ووفر متجر إلكتروني لعرض قطعهم الفريدة في السوق الإلكترونية وتنمية أعمالهم بفعالية أكثر، مع توفير تجربة تسوق اون لاين لتشكيلة متنوعة من العبايات الخليجية والبدلات العملية والجلابيات والفساتين بتصاميم فريدة من إنتاج محلي مع خدمة التوصيل.        '
                :
                'Tafseel is a Multi-vendor Market Place for Costume-made fashion.We bring local fashion designers together in one place to help them bring their unique designs into online-market and to grow their business efficiently. Providing unique designs and varius collections of abayas, suits, jalabiyas, dresses, and modest clothing. with a smart online shopping experince and delivery service.'
           ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('url')->content('https://tafseel.net/policy/buyer'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website'),
            Link::make()->rel('canonical')->href('https://tafseel.net/policy/buyer'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('en')->href('https://tafseel.net'),

        ]);
        return view('style.pages.buyerPolicy');
    }

    public static function seller()
    {
        seo()->title(session('lang')=='ar'?
        'تفصيل | سياسة البائع '
        :
        'Tafseel | Seller Policy'
    );
        seo()->description(session('lang')=='ar'?
        'موقع تفصيل يجمع مصممي الأزياء في منصة واحدة ووفر متجر إلكتروني لعرض قطعهم الفريدة في السوق الإلكترونية وتنمية أعمالهم بفعالية أكثر، مع توفير تجربة تسوق اون لاين لتشكيلة متنوعة من العبايات الخليجية والبدلات العملية والجلابيات والفساتين بتصاميم فريدة من إنتاج محلي مع خدمة التوصيل.        '
        :
        'Tafseel is a Multi-vendor Market Place for Costume-made fashion.We bring local fashion designers together in one place to help them bring their unique designs into online-market and to grow their business efficiently. Providing unique designs and varius collections of abayas, suits, jalabiyas, dresses, and modest clothing. with a smart online shopping experince and delivery service.'
    );

        seo()->addMany([
            Link::make()->rel('icon')->href(asset('img/s_logo.png')),
            Link::make()->rel('shortcut icon')->href(asset('img/s_logo.png')),
            OpenGraph::make()->property('title')->content(
                session('lang')=='ar'?
                'تفصيل | سياسة البائع '
                :
                'Tafseel | Seller privacy'
            ),

            OpenGraph::make()->property('description')->content(
                session('lang')=='ar'?
                'موقع تفصيل يجمع مصممي الأزياء في منصة واحدة ووفر متجر إلكتروني لعرض قطعهم الفريدة في السوق الإلكترونية وتنمية أعمالهم بفعالية أكثر، مع توفير تجربة تسوق اون لاين لتشكيلة متنوعة من العبايات الخليجية والبدلات العملية والجلابيات والفساتين بتصاميم فريدة من إنتاج محلي مع خدمة التوصيل.        '
                :
                'Tafseel is a Multi-vendor Market Place for Costume-made fashion.We bring local fashion designers together in one place to help them bring their unique designs into online-market and to grow their business efficiently. Providing unique designs and varius collections of abayas, suits, jalabiyas, dresses, and modest clothing. with a smart online shopping experince and delivery service.'
           ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('url')->content('https://tafseel.net/policy/seller'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website'),
            Link::make()->rel('canonical')->href('https://tafseel.net/policy/seller'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('en')->href('https://tafseel.net'),

        ]);
        return view('style.pages.sellerPolicy');
    }

    public static function communicationPolicy()
    {
        seo()->title(session('lang')=='ar'?
        'تفصيل | سياسة التواصل '
        :
        'Tafseel | communicationPolicy '
    );
        seo()->description(session('lang')=='ar'?
        'موقع تفصيل يجمع مصممي الأزياء في منصة واحدة ووفر متجر إلكتروني لعرض قطعهم الفريدة في السوق الإلكترونية وتنمية أعمالهم بفعالية أكثر، مع توفير تجربة تسوق اون لاين لتشكيلة متنوعة من العبايات الخليجية والبدلات العملية والجلابيات والفساتين بتصاميم فريدة من إنتاج محلي مع خدمة التوصيل.        '
        :
        'Tafseel is a Multi-vendor Market Place for Costume-made fashion.We bring local fashion designers together in one place to help them bring their unique designs into online-market and to grow their business efficiently. Providing unique designs and varius collections of abayas, suits, jalabiyas, dresses, and modest clothing. with a smart online shopping experince and delivery service.'
    );

        seo()->addMany([
            Link::make()->rel('icon')->href(asset('img/s_logo.png')),
            Link::make()->rel('shortcut icon')->href(asset('img/s_logo.png')),

            OpenGraph::make()->property('title')->content(
                session('lang')=='ar'?
                'تفصيل | سياسة التواصل '
                :
                'Tafseel | communication Policy '
            ),

            OpenGraph::make()->property('description')->content(
                session('lang')=='ar'?
                'موقع تفصيل يجمع مصممي الأزياء في منصة واحدة ووفر متجر إلكتروني لعرض قطعهم الفريدة في السوق الإلكترونية وتنمية أعمالهم بفعالية أكثر، مع توفير تجربة تسوق اون لاين لتشكيلة متنوعة من العبايات الخليجية والبدلات العملية والجلابيات والفساتين بتصاميم فريدة من إنتاج محلي مع خدمة التوصيل.        '
                :
                'Tafseel is a Multi-vendor Market Place for Costume-made fashion.We bring local fashion designers together in one place to help them bring their unique designs into online-market and to grow their business efficiently. Providing unique designs and varius collections of abayas, suits, jalabiyas, dresses, and modest clothing. with a smart online shopping experince and delivery service.'
           ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('url')->content('https://tafseel.net/policy/communicationPolicy'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website'),
            Link::make()->rel('canonical')->href('https://tafseel.net/policy/communicationPolicy'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('en')->href('https://tafseel.net'),

        ]);
        return view('style.pages.communicationsPolicy');
    }

    public static function privacy()
    {
        seo()->title(session('lang')=='ar'?
        'تفصيل | سياسة الخصوصية '
        :
        'Tafseel | privacy Policy'
    );
        seo()->description(session('lang')=='ar'?
        'موقع تفصيل يجمع مصممي الأزياء في منصة واحدة ووفر متجر إلكتروني لعرض قطعهم الفريدة في السوق الإلكترونية وتنمية أعمالهم بفعالية أكثر، مع توفير تجربة تسوق اون لاين لتشكيلة متنوعة من العبايات الخليجية والبدلات العملية والجلابيات والفساتين بتصاميم فريدة من إنتاج محلي مع خدمة التوصيل.        '
        :
        'Tafseel is a Multi-vendor Market Place for Costume-made fashion.We bring local fashion designers together in one place to help them bring their unique designs into online-market and to grow their business efficiently. Providing unique designs and varius collections of abayas, suits, jalabiyas, dresses, and modest clothing. with a smart online shopping experince and delivery service.'
    );

        seo()->addMany([
            Link::make()->rel('icon')->href(asset('img/s_logo.png')),
            Link::make()->rel('shortcut icon')->href(asset('img/s_logo.png')),

            OpenGraph::make()->property('title')->content(
                session('lang')=='ar'?
                'تفصيل | سياسة الخصوصية '
                :
                'Tafseel | privacy Policy'
            ),

            OpenGraph::make()->property('description')->content(
                session('lang')=='ar'?
                'موقع تفصيل يجمع مصممي الأزياء في منصة واحدة ووفر متجر إلكتروني لعرض قطعهم الفريدة في السوق الإلكترونية وتنمية أعمالهم بفعالية أكثر، مع توفير تجربة تسوق اون لاين لتشكيلة متنوعة من العبايات الخليجية والبدلات العملية والجلابيات والفساتين بتصاميم فريدة من إنتاج محلي مع خدمة التوصيل.        '
                :
                'Tafseel is a Multi-vendor Market Place for Costume-made fashion.We bring local fashion designers together in one place to help them bring their unique designs into online-market and to grow their business efficiently. Providing unique designs and varius collections of abayas, suits, jalabiyas, dresses, and modest clothing. with a smart online shopping experince and delivery service.'
           ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('url')->content('https://tafseel.net/policy/privacy'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website'),
            Link::make()->rel('canonical')->href('https://tafseel.net/policy/privacy'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('en')->href('https://tafseel.net'),

        ]);
        return view('style.pages.privacyPolicy');
    }

    public static function paymentPolicy()
    {
        seo()->title(session('lang')=='ar'?
        'تفصيل | سياسة الدفع والرسوم '
        :
        'Tafseel | payment Policy '
    );
        seo()->description(session('lang')=='ar'?
        'موقع تفصيل يجمع مصممي الأزياء في منصة واحدة ووفر متجر إلكتروني لعرض قطعهم الفريدة في السوق الإلكترونية وتنمية أعمالهم بفعالية أكثر، مع توفير تجربة تسوق اون لاين لتشكيلة متنوعة من العبايات الخليجية والبدلات العملية والجلابيات والفساتين بتصاميم فريدة من إنتاج محلي مع خدمة التوصيل.        '
        :
        'Tafseel is a Multi-vendor Market Place for Costume-made fashion.We bring local fashion designers together in one place to help them bring their unique designs into online-market and to grow their business efficiently. Providing unique designs and varius collections of abayas, suits, jalabiyas, dresses, and modest clothing. with a smart online shopping experince and delivery service.'
    );

        seo()->addMany([
            Link::make()->rel('icon')->href(asset('img/s_logo.png')),
            Link::make()->rel('shortcut icon')->href(asset('img/s_logo.png')),

            OpenGraph::make()->property('title')->content(
                session('lang')=='ar'?
                'تفصيل | سياسة الدفع والرسوم '
                :
                'Tafseel | payment Policy '
            ),

            OpenGraph::make()->property('description')->content(
                session('lang')=='ar'?
                'موقع تفصيل يجمع مصممي الأزياء في منصة واحدة ووفر متجر إلكتروني لعرض قطعهم الفريدة في السوق الإلكترونية وتنمية أعمالهم بفعالية أكثر، مع توفير تجربة تسوق اون لاين لتشكيلة متنوعة من العبايات الخليجية والبدلات العملية والجلابيات والفساتين بتصاميم فريدة من إنتاج محلي مع خدمة التوصيل.        '
                :
                'Tafseel is a Multi-vendor Market Place for Costume-made fashion.We bring local fashion designers together in one place to help them bring their unique designs into online-market and to grow their business efficiently. Providing unique designs and varius collections of abayas, suits, jalabiyas, dresses, and modest clothing. with a smart online shopping experince and delivery service.'
           ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('url')->content('https://tafseel.net/policy/paymentPolicy'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website'),
            Link::make()->rel('canonical')->href('https://tafseel.net/policy/paymentPolicy'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('en')->href('https://tafseel.net'),

        ]);
        return view('style.pages.paymentPolicy');
    }

    public function sellWithUs()
    {
        seo()->title(session('lang')=='ar'?
        'تفصيل | اشترك معنا'
        :
        'Tafseel | Sell With US'
    );
        seo()->description(session('lang')=='ar'?
        'موقع تفصيل يجمع مصممي الأزياء في منصة واحدة ووفر متجر إلكتروني لعرض قطعهم الفريدة في السوق الإلكترونية وتنمية أعمالهم بفعالية أكثر، مع توفير تجربة تسوق اون لاين لتشكيلة متنوعة من العبايات الخليجية والبدلات العملية والجلابيات والفساتين بتصاميم فريدة من إنتاج محلي مع خدمة التوصيل.        '
        :
        'Tafseel is a Multi-vendor Market Place for Costume-made fashion.We bring local fashion designers together in one place to help them bring their unique designs into online-market and to grow their business efficiently. Providing unique designs and varius collections of abayas, suits, jalabiyas, dresses, and modest clothing. with a smart online shopping experince and delivery service.'
    );

        seo()->addMany([
            Link::make()->rel('icon')->href(asset('img/s_logo.png')),
            Link::make()->rel('shortcut icon')->href(asset('img/s_logo.png')),
            OpenGraph::make()->property('title')->content(
                session('lang')=='ar'?
                'تفصيل | اشترك معنا'
                :
                'Tafseel | Sell With US'
            ),

            OpenGraph::make()->property('description')->content(
                session('lang')=='ar'?
                'موقع تفصيل يجمع مصممي الأزياء في منصة واحدة ووفر متجر إلكتروني لعرض قطعهم الفريدة في السوق الإلكترونية وتنمية أعمالهم بفعالية أكثر، مع توفير تجربة تسوق اون لاين لتشكيلة متنوعة من العبايات الخليجية والبدلات العملية والجلابيات والفساتين بتصاميم فريدة من إنتاج محلي مع خدمة التوصيل.        '
                :
                'Tafseel is a Multi-vendor Market Place for Costume-made fashion.We bring local fashion designers together in one place to help them bring their unique designs into online-market and to grow their business efficiently. Providing unique designs and varius collections of abayas, suits, jalabiyas, dresses, and modest clothing. with a smart online shopping experince and delivery service.'
           ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('url')->content('https://tafseel.net/sellWithUs'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website'),
            Link::make()->rel('canonical')->href('https://tafseel.net/sellWithUs'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('en')->href('https://tafseel.net'),

        ]);
        return view('style.pages.sellWithUs');
    }

    public function termAndConditions()
    {
        seo()->title(session('lang')=='ar'?
        'تفصيل | الشروط والأحكام '
        :
        'Tafseel | Terms and conditions '
    );
        seo()->description(session('lang')=='ar'?
        'موقع تفصيل يجمع مصممي الأزياء في منصة واحدة ووفر متجر إلكتروني لعرض قطعهم الفريدة في السوق الإلكترونية وتنمية أعمالهم بفعالية أكثر، مع توفير تجربة تسوق اون لاين لتشكيلة متنوعة من العبايات الخليجية والبدلات العملية والجلابيات والفساتين بتصاميم فريدة من إنتاج محلي مع خدمة التوصيل.        '
        :
        'Tafseel is a Multi-vendor Market Place for Costume-made fashion.We bring local fashion designers together in one place to help them bring their unique designs into online-market and to grow their business efficiently. Providing unique designs and varius collections of abayas, suits, jalabiyas, dresses, and modest clothing. with a smart online shopping experince and delivery service.'
    );

        seo()->addMany([
            Link::make()->rel('icon')->href(asset('img/s_logo.png')),
            Link::make()->rel('shortcut icon')->href(asset('img/s_logo.png')),

            OpenGraph::make()->property('title')->content(
                session('lang')=='ar'?
                'تفصيل | الشروط والأحكام'
                :
                'Tafseel | Terms and conditions '
            ),

            OpenGraph::make()->property('description')->content(
                session('lang')=='ar'?
                'موقع تفصيل يجمع مصممي الأزياء في منصة واحدة ووفر متجر إلكتروني لعرض قطعهم الفريدة في السوق الإلكترونية وتنمية أعمالهم بفعالية أكثر، مع توفير تجربة تسوق اون لاين لتشكيلة متنوعة من العبايات الخليجية والبدلات العملية والجلابيات والفساتين بتصاميم فريدة من إنتاج محلي مع خدمة التوصيل.        '
                :
                'Tafseel is a Multi-vendor Market Place for Costume-made fashion.We bring local fashion designers together in one place to help them bring their unique designs into online-market and to grow their business efficiently. Providing unique designs and varius collections of abayas, suits, jalabiyas, dresses, and modest clothing. with a smart online shopping experince and delivery service.'
           ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('url')->content('https://tafseel.net/termAndConditions'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website'),
            Link::make()->rel('canonical')->href('https://tafseel.net/termAndConditions'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('en')->href('https://tafseel.net'),

        ]);
        return view('style.pages.termAndCon');
    }

    public function faqs()
    {
        seo()->title(session('lang')=='ar'?
        'تفصيل | الأسئلة الشائعة'
        :
        'Tafseel | FAQs'
    );
        seo()->description(session('lang')=='ar'?
        'موقع تفصيل يجمع مصممي الأزياء في منصة واحدة ووفر متجر إلكتروني لعرض قطعهم الفريدة في السوق الإلكترونية وتنمية أعمالهم بفعالية أكثر، مع توفير تجربة تسوق اون لاين لتشكيلة متنوعة من العبايات الخليجية والبدلات العملية والجلابيات والفساتين بتصاميم فريدة من إنتاج محلي مع خدمة التوصيل.        '
        :
        'Tafseel is a Multi-vendor Market Place for Costume-made fashion.We bring local fashion designers together in one place to help them bring their unique designs into online-market and to grow their business efficiently. Providing unique designs and varius collections of abayas, suits, jalabiyas, dresses, and modest clothing. with a smart online shopping experince and delivery service.'
    );

        seo()->addMany([
            Link::make()->rel('icon')->href(asset('img/s_logo.png')),
            Link::make()->rel('shortcut icon')->href(asset('img/s_logo.png')),
            OpenGraph::make()->property('title')->content(
                session('lang')=='ar'?
                'تفصيل | الأسئلة الشائعة'
                :
                'Tafseel | FAQs '
            ),

            OpenGraph::make()->property('description')->content(
                session('lang')=='ar'?
                'موقع تفصيل يجمع مصممي الأزياء في منصة واحدة ووفر متجر إلكتروني لعرض قطعهم الفريدة في السوق الإلكترونية وتنمية أعمالهم بفعالية أكثر، مع توفير تجربة تسوق اون لاين لتشكيلة متنوعة من العبايات الخليجية والبدلات العملية والجلابيات والفساتين بتصاميم فريدة من إنتاج محلي مع خدمة التوصيل.        '
                :
                'Tafseel is a Multi-vendor Market Place for Costume-made fashion.We bring local fashion designers together in one place to help them bring their unique designs into online-market and to grow their business efficiently. Providing unique designs and varius collections of abayas, suits, jalabiyas, dresses, and modest clothing. with a smart online shopping experince and delivery service.'
           ),
            OpenGraph::make()->property('site_name')->content('tafseel.net | تفصيل'),
            OpenGraph::make()->property('url')->content('https://tafseel.net/faqs'),
            OpenGraph::make()->property('locale:locale')->content('en_us'),
            OpenGraph::make()->property('locale:alternate')->content('ar_ar'),
            OpenGraph::make()->property('type')->content('website'),
            Link::make()->rel('canonical')->href('https://tafseel.net/faqs'),
            Link::make()->rel('alternate')->hreflang('x-default')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('ar')->href('https://tafseel.net'),
            Link::make()->rel('alternate')->hreflang('en')->href('https://tafseel.net'),

        ]);
        return view('style.pages.faqs');
//        $faq = Faq::all();

    }


}
