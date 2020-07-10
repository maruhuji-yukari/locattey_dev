<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    //マイページ表示
    public function index(){
        return view('member.mypage');
    }

    //登録情報更新(view)
    public function edit(){
        //DBのデータを取得
        $users_info = Auth::user();
        dd($users_info);
        return view('member.edit');
    }

    //登録情報更新(実装)
    public function update(){

    }
}
