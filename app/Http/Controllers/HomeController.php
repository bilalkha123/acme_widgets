<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CartModel;
use DB;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**`
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $products = ProductModel::all();
        $cartData = CartModel::all();
        $sumOfPrices = CartModel::where('user',Auth::id())->sum('price');


         //return view('home')->compact(varname);
         return view("home", ["products"=>$products,"cartData"=>$cartData,'sumOfPrices' => $sumOfPrices]);
    }
}
