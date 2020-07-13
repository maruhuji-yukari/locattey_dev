<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\MypageUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    //マイページ表示
    public function index(){
        $prof_info = Auth::user();
        return view('member.mypage',compact('prof_info'));
    }

    //登録情報更新(view)
    public function edit(){
        //DBのデータを取得
        $prof_info = Auth::user();
        $updated_at = now();
        return view('member.mypage_edit',compact('prof_info','updated_at'));
    }

    //登録情報更新(実装)
    public function update(MypageUpdateRequest $request){
        //DBのデータを取得
        $id = Auth::id();
        $prof_info = User::find($id);


        return redirect('member/mypage')->with('flash_message', __('Edited.'));
    }
}
