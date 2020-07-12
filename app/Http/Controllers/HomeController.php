<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\User;
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
<<<<<<< HEAD
        //出品情報をDBから取得(入札中の情報は出さない、入札時の場合はtrade_flag=1)
        $products = Product::where('trade_flag','=',0)->paginate(10);
        return view('index',compact('products'));

    }
=======
        //通常(入札前/完了の情報を表示)
        //出品情報をDBから取得(入札中の情報は出さない、入札中の場合はtrade_flag=1、引き取り完了の場合はtrade_flag=2、入札前の場合はtrade_flag=0)
        $products = Product::where('trade_flag','!=',1)->orderBy('id','DESC')->paginate(10);

        //検索時のパターン(引き取り完了の情報を出さない trade_flag=1のみ)
        $products2 = Product::where('trade_flag','=',1)->paginate(10);

        return view('index',compact('products','products2'));

    }

    //検索実装
    public function search(){
        //通常(入札前/完了の情報を表示)
        //出品情報をDBから取得(入札中の情報は出さない、入札中の場合はtrade_flag=1、引き取り完了の場合はtrade_flag=2、入札前の場合はtrade_flag=0)
        $products = Product::where('trade_flag','!=',1);

        //検索時のパターン(引き取り完了の情報を出さない trade_flag=1のみ)
        $products2 = Product::where('trade_flag','=',1);
    }

    //個別ページ実装(view)
    public function simple($id){
        $products = Product::find($id);
        $u_id = $products->users_id;
        $c_id =$products->categories_id;
        $images = ['product_image2','product_image3','product_image4','product_image5'];
        $categories_id = Categories::find($c_id);
        $users_id = User::find($u_id);


        return view('trade_simple',compact('products','categories_id','users_id','images'));
    }
>>>>>>> develop
}
