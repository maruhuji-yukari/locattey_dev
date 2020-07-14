<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\MypageUpdateRequest;
use App\Models\User;
<<<<<<< HEAD
use Illuminate\Http\Request;
=======
>>>>>>> develop
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

<<<<<<< HEAD

        return redirect('member/mypage')->with('flash_message', __('Edited.'));
=======
        $prof_info->fill($request->all())->save();

        return redirect('member/mypage')->with('flash_message', __('Edited.'));
    }

    //登録削除(確認ページview)
    public function preview(){
        //DBのデータを取得
        $id = Auth::id();
        $prof_info = User::find($id);

        return view('member.delete_preview',compact('prof_info'));
    }

    public function delete(){
        //softdelete
        User::find(Auth::id())->delete();

        return redirect('/')->with('flash_message',__('Member Deleted.'));
>>>>>>> develop
    }
}
