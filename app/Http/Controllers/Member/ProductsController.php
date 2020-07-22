<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductsEditRequest;
use App\Http\Requests\ProductsUploadsOnly;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class ProductsController extends Controller
{
    //=============================
    //出品する(view)
    //=============================
    public function new()
    {
        $users_id = Auth::id();
        $categories = Categories::all();

//        $is_image = false;
//        if(Storage::disk('local')->exists('images/images/'))

        $product_images = ['product_image2', 'product_image3', 'product_image4', 'product_image5'];

        return view('member.trade_register', compact('users_id', 'categories', 'product_images'));
    }

    //=============================
    //出品する(実装:画像アップロード)
    //=============================
    public function create(ProductRequest $request)
    {
        $product = new Product();
        //その他
        $product->product_name = $request->product_name;
        $product->product_describe = $request->product_describe;
        $product->categories_id = $request->categories_id;
        $product->users_id = Auth::id();
        $product->trade_flag = 0;
        $product->created_at = now();
        $product->updated_at = now();

        //upload(1枚目は必須)
        $tmpFile = $request->file('product_image1')->store('images/images');
        $filename1 = pathinfo($tmpFile, PATHINFO_FILENAME);
        $extension1 = Pathinfo($tmpFile, PATHINFO_EXTENSION);
        $uploads_name1 = $filename1 . '.' . $extension1;
        $product->product_image1 = $uploads_name1;

        //2枚目以降はなくても可能
        $product_images = ['product_image2', 'product_image3', 'product_image4', 'product_image5'];

        if ($request->has('product_image2') || $request->has('product_image3') ||
            $request->has('product_image4') || $request->has('product_image5')) {
            for ($i = 2; $i < 6; $i++) {
                foreach ($product_images as $image) {
                    if ($request->file($image)) {
                        $tmpFile = $request->file($image)->store('images/images');
                        $filename[$i] = pathinfo($tmpFile, PATHINFO_FILENAME);
                        $extension[$i] = Pathinfo($tmpFile, PATHINFO_EXTENSION);
                        $uploads_name[$i] = $filename[$i] . '.' . $extension[$i];
                        $product->$image = $uploads_name[$i];
                    } else {
                        $product->$image = 'no_image.jpg';
                    }
                }
            }
        } else {
            foreach ($product_images as $image) {
                $product->$image = 'no_image.jpg';
            }
        }
        $product->save();
        return redirect('/member/mypage')->with('flash_message', __('Registered.'));
    }

    //=============================
    //出品情報一覧(view)
    //=============================

    public function list()
    {
        $trades = Product::where('users_id', Auth::id())->orderBy('id', 'desc')->get();
        return view('member.trade_list', compact('trades'));
    }

    //=============================
    //修正する(view)
    //=============================
    public function edit($id)
    {
        //出品情報
        $products = Product::firstWhere('id', $id);
        //カテゴリー一覧取得
        $categories = Categories::all();
        //該当カテゴリーid取得
        $c_id = $products->categories_id;
        //該当カテゴリー名取得
        $c_name = $categories->where('id', $c_id);
        //更新日時変更
        $updated_at = now();
        return view('member.trade_edit', compact('products', 'categories', 'c_name','updated_at'));
    }

    //=============================
    //修正する・画像以外(実装)
    //=============================
    public function update(ProductsEditRequest $request, $id)
    {

        //不正遷移を防止
        if (!ctype_digit($id)) {
            return redirect('index')->with('flash_message', __('Invalid operation was performed.'));
        }

        //情報取得
        $products = Product::firstWhere('id', $id);

        //修正実装
        $products->fill($request->all())->save();

        return redirect('member/trade/list')->with('flash_message', __('Edited.'));
    }

    //===========================
    //画像アップロード(編集用view)
    //===========================

    public function editImage($id)
    {
        //foreach用
        $product_images = ['product_image2', 'product_image3', 'product_image4', 'product_image5'];

        //DBからデータを取得
        $products = Product::firstWhere('id', $id);

        return view('member.trade_edit_images', compact('product_images', 'products'));
    }

    //===========================
    //画像アップロード(実装)
    //===========================

    public function editUploads(ProductsUploadsOnly $request, $id)
    {
        //不正遷移を防止
        if (!ctype_digit($id)) {
            return redirect('index')->with('flash_message', __('Invalid operation was performed.'));
        }

        //uploadsし直し
        //変更しない場合はそのまま、変更する場合のみ変更作業
        //DBデータ取得
        $DBdata = Product::find($id)->first();

        //foreach用
        $product_images = ['product_image2', 'product_image3', 'product_image4', 'product_image5'];

        //upload
        //変更リクエストがある場合
        if ($request->has('product_image1')) {
            $tmpFile = $request->file('product_image1')->store('images/images');
            $filename1 = pathinfo($tmpFile, PATHINFO_FILENAME);
            $extension1 = Pathinfo($tmpFile, PATHINFO_EXTENSION);
            $uploads_name1 = $filename1 . '.' . $extension1;
            //dd($uploads_name1);
            $DBdata->product_image1 =$uploads_name1;
            $DBdata->save();
        }

        foreach ($product_images as $image) {
            for ($i = 2; $i < 6; $i++) {
                if ($request->file($image)) {
                    $tmpFiles = $request->file($image)->store('images/images');
                    $filename[$i] = pathinfo($tmpFiles, PATHINFO_FILENAME);
                    $extension[$i] = Pathinfo($tmpFiles, PATHINFO_EXTENSION);
                    $uploads_name[$i] = $filename[$i] . '.' . $extension[$i];
                    $DBdata->$image = $uploads_name[$i];
                    $DBdata->save();
                }
            }
        }
        return redirect('member/trade/list')->with('flash_message', __('Edited.'));
    }

    //===================================
    //出品情報を削除する
    //===================================

    //削除確認ページ(view)
    public function remove($id){
        $DBdata = Product::find($id);
        $categories = Categories::all();
        $users_id = Auth::id();
        $product_images = ['product_image1','product_image2', 'product_image3', 'product_image4', 'product_image5'];
        //該当カテゴリーid取得
        $c_id = $DBdata->categories_id;
        //該当カテゴリー名取得
        $c_name = $categories->where('id', $c_id);

        return view('member/tradeRemove',compact('DBdata','categories','product_images','users_id','c_name'));
    }


    //出品情報削除
    public function  delete(Request $request,$id){
        //該当するデータを取得
        $products = Product::find($id);
        //delete(物理削除)
        $products->fill($request->all())->delete();
        return redirect('member/trade/list')->with('flash_message', __('CompleteDelete'));
    }


    //=================
    //入札ページへ遷移
    //=================

    //入札ボタンを押した時の挙動
    public function move($id){
        //trade_flag = 2にする。2の場合検索結果やリストに表示されなくなる。

    }
}

