<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\BidRequest;
use App\Models\Categories;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class BidController extends Controller
{
    //個別ページ実装(view)
    public function simple($id){
        $products = Product::find($id);
        $u_id = $products->users_id;
        $c_id =$products->categories_id;
        $images = ['product_image2','product_image3','product_image4','product_image5'];
        $categories_id = Categories::find($c_id);
        $users_id = User::find($u_id);
        $trade_flag = true;

        return view('trade_simple',compact('products','categories_id','users_id','images','trade_flag'));
    }

    //個別ページ(trade_flag=1にする)
    public function update(BidRequest $request,$id){
        //不正遷移を防止
        if (!ctype_digit($id)) {
            return redirect('index')->with('flash_message', __('Invalid operation was performed.'));
        }

        $products = Product::find($id);
            $products->trade_flag = $request->trade_flag;
            //dd($request->trade_flag);
            $products->save();

        //dd($request->has('trade_flag'));
        return redirect('member/bidItem/'.$id)->with('flash_message', __('Bid.'));
    }



    //ビュー
    public function showBidItem($id){
        //入札したデータを取得
        $bidData = Product::find($id);
        return view('member.bidItem',compact('bidData'));
    }

    //
}
