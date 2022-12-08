<?php

namespace App\Http\Controllers\Store;

use App\DataTables\Store\ProductsPendingDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendingProductController extends Controller
{
    public function index(ProductsPendingDataTable $productsPendingDataTable){
        // dd('faisal');
        return $productsPendingDataTable->render('store.product.pending', ['title' => trans('shop.products_pending')]);
    }
}
