<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use DemeterChain\C;
use Illuminate\Http\Request;
use const http\Client\Curl\AUTH_ANY;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //トップページ(view)+トップページで出品情報リスト化表示
    public function index()
    {
        //出品情報をDBから取得(入札中の情報は出さない、入札時の場合はtrade_flag=1)
        $products = Product::where('trade_flag','=',0)->paginate(10);
        return view('index',compact('products'));

    }
}
