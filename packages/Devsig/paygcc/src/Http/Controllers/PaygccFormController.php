<?php
namespace Devsig\Paygcc\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaygccFormController extends Controller {

    public function index()
    {
       return view('contactform::contact');
    }
}