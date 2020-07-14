@extends('layouts.member.common')

@section('page_title','会員登録削除')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

<!-- フラッシュメッセージ -->
@if (session('flash_message'))
    <div class="alert js-alert" role="alert">
        {{ session('flash_message') }}
    </div>
@endif

@section('section_title','会員登録削除')
@section('main_content')
    <div class="section_mypage">
        <form action="{{ route('deleteMember') }}" method="POST" class="form">
            <p class="link_back2">削除する情報を確認してください。</p>
            @csrf
            <label for="name" class="mypage_label">
                <p class="input_item">名前:</p>
                <input type="text" name="name" value="{{ $prof_info->name }}" readonly id="name" class="register_input">
            </label>
            <label for="email" class="mypage_label">
                <p class="input_item">E-mail:</p>
                <input type="email" name="email" value="{{ $prof_info->email }}" readonly id="email" class="register_input">
            </label>
            <label for="residence" class="mypage_label">
                <p class="input_item">居住地:</p>
                <input type="text" name="zip" value="{{ $prof_info->zip }}" readonly id="residence" class="register_input">
            </label>
            <label for="tel" class="mypage_label">
                <p class="input_item">携帯番号:</p>
                <input type="tel" name="tel" value="{{ $prof_info->tel }}" readonly id="tel" class="register_input">
            </label>
            <label for="password" class="mypage_label">
                <p class="input_item">パスワード(安全のため非表示):</p>
                <input type="password" name="" value="{{ $prof_info->password }}" readonly id="tel" class="register_input">
            </label>
            <label for="name" class="mypage_label">
                <p class="input_item">アイコン:</p>
                <img src="{{ asset('storage/'.$prof_info->prof_img) }}" width="150" height="150" class="preview_img">
            </label>

            <p class="link_back">お間違えがなければ「退会」ボタンを押してください。</p>
            <input type="submit" value="退会" class="submit_delete">
        </form>
    </div>
@endsection
@include('layouts.member.main_menu')

@include('layouts.member.footer')
