<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function index(Request $request)
    {
//        dd($request->all());

//        $selected_price = $request->has('price') ? $request->get('price') : null;
//        $selected_sort = $request->has('sort') ? $request->get('sort') : null;
//        $selected_sale = $request->has('sale') ? $request->get('sale') : null;
//        $selected_category = $request->has('shop') ? $request->get('shop') : null;
        $selected_category = $request->has('category') ? $request->get('category') : null;
        $selected_colors = $request->has('colors') ? $request->get('colors') : [];
        $selected_tags = $request->has('tags') ? $request->get('tags') : [];
        $selected_sizes = $request->has('sizes') ? $request->get('sizes') : [];

//        $categories = Shop::all();
        $colors = Color::all();
        $category =Category::all();

        $products = Product::with(['store', 'other_data']);

//        if ($selected_category != null) {
//            $products = $products->whereShopId($selected_category);
//        }
        if ($selected_category != null) {
            $products = $products->whereCategoryId($selected_category);
        }
//        if ($selected_sale != null) {
//            $products = $products->when($selected_sale, function ($query) use ($selected_sale) {
//                if ($selected_sale == '2') {
//                    $query->where('status', 'active');
//                }
//            });
//        }
//        if ($selected_price != null) {
//            if ($selected_sale =='2'){
//                $products = $products->when($selected_price, function ($query) use ($selected_price) {
//                    if ($selected_price == 'price_0_50') {
//                        $query->whereBetween('price_offer', [0, 50]);
//                    } elseif ($selected_price == 'price_51_150') {
//                        $query->whereBetween('price_offer', [51, 150]);
//                    } elseif ($selected_price == 'price_151_180') {
//                        $query->whereBetween('price_offer', [151, 180]);
//                    } elseif ($selected_price == 'price_181_300') {
//                        $query->whereBetween('price_offer', [181, 300]);
//                    }
//                });
//            }else{
//                $products = $products->when($selected_price, function ($query) use ($selected_price) {
//                    if ($selected_price == 'price_0_50') {
//                        $query->whereBetween('price', [0, 50]);
//                    } elseif ($selected_price == 'price_51_150') {
//                        $query->whereBetween('price', [51, 150]);
//                    } elseif ($selected_price == 'price_151_180') {
//                        $query->whereBetween('price', [151, 180]);
//                    } elseif ($selected_price == 'price_181_300') {
//                        $query->whereBetween('price', [181, 300]);
//                    }
//                });
//            }
//        }
        if (is_array($selected_colors) && count($selected_colors) > 0) {
            $products = $products->whereHas('other_data', function ($query) use ($selected_colors) {
                $query->whereIn('other_data.data_key', $selected_colors);
            });
        }
        if (is_array($selected_tags) && count($selected_tags) > 0) {
            $products = $products->whereHas('tag_data', function ($query) use ($selected_tags) {
                $query->whereIn('tag_data.tag_id', $selected_tags);
            });
        }
        if (is_array($selected_sizes) && count($selected_sizes) > 0) {
            $products = $products->whereHas('size_data', function ($query) use ($selected_sizes) {
                $query->whereIn('size_data.size_data', $selected_sizes);
            });
        }

//        if ($selected_sort != null) {
//            $products = $products->when($selected_sort, function ($query) use ($selected_sort) {
//                if ($selected_sort == '1') {
//                    $query->orderBy('id', 'asc');
//                } elseif ($selected_sort == '2') {
//                    $query->orderByDesc('id');
//                }
//            });
//        }


        $products = $products->paginate(9);
//        dd($products);
//        return view('style.filter', compact('products', 'categories', 'selected_price', 'selected_colors', 'selected_sort', 'selected_category','selected_sale', 'colors'));
//        return view('style.filter', compact('products', 'categories', 'selec0ted_price', 'selected_colors', 'selected_sort', 'selected_category','selected_sale', 'colors'));
        return view('style.filter', compact('products','selected_category','selected_sizes','selected_tags','selected_colors'));
//        return  redirect()->back()->with('products',$products);

    }



    public function search(){
        return view('style.search');
    }

    public function searchAlgolia()
    {
        return view('style.search-algolia');
    }
}
