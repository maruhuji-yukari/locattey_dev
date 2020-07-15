<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\MypageUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MypageUploadRequest;

class MypageController extends Controller
{
    //マイページ表示
    public function index(){
        $prof_info = Auth::user();
        return view('member.mypage',compact('prof_info'));
    }

    //プロフィール画像うp
    public function upload(MypageUploadRequest $request){
        $prof_img =User::find(Auth::id());

        //upload
        $tmpFile = $request->file('prof_img')->store('public/images');
        $filename = pathinfo($tmpFile, PATHINFO_FILENAME);
        $extension = Pathinfo($tmpFile, PATHINFO_EXTENSION);
        $uploads_name = $filename . '.' . $extension;
        $prof_img->prof_img = $uploads_name;
        $prof_img->save();

        return redirect('member/mypage')->with('flash_message',__('Uploaded!'));
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
    }
}
