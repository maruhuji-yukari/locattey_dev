<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class BidsController extends Controller
{
    //個別ページ(入札ページview)
    public function simple($id){
        //DBからデータ取得
        $trade_flag = 1;
        $products = Products::find($id);
        $u_id = $products->users_id;
        $c_id =$products->categories_id;
        $images = ['product_image2','product_image3','product_image4','product_image5'];
        $categories_id = Categories::find($c_id);
        $users_id = User::find($u_id);
        $is_bid = 'true';

        return view('trade_simple',compact('products','categories_id','users_id','images','is_bid','trade_flag'));
    }

    //入札実装
    public function bid(Request $request,$id){
        //不正遷移を防止
        if (!ctype_digit($id)) {
            return redirect('index')->with('flash_message', __('Invalid operation was performed.'));
        }

        $request->validate([
           'is_bid' => 'required | string | max:5',
           'trade_flag' => 'bool',
            'product_name' => 'required | string | max:30'
        ]);

        //情報取得
        $products = Products::firstWhere('id', $id);

        //修正実装
        $products->fill($request->all())->save();

        return redirect('/')->with('flash_message', __('Bid.'));
    }

    //ビュー
    public function showBidItem($id){
        //入札したデータを取得
        $bidData = Products::find($id);
        return view('member.bidItem',compact('bidData'));
    }
}
