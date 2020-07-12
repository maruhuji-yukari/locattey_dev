<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    //マイページ表示
    public function index(){
        $id = Auth::id();
        $prof_info = User::find($id);
        return view('member.mypage',compact('prof_info'));
    }

    //登録情報更新(view)
    public function edit(){
        //DBのデータを取得
        $users_info = Auth::user();
        return view('member.mypage_edit');
    }

    //登録情報更新(実装)
    public function update(){

    }
}
