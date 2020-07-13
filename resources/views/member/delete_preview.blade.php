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
        <form action="{{ route('memberUpdate') }}" method="POST" class="form">
            @csrf
            <label for="name" class="mypage_label">
                <p class="input_item">名前:</p>
                <input type="text" name="name" value="{{ $prof_info->name }}" required id="name" class="register_input">
            </label>
            <label for="email" class="mypage_label">
                <p class="input_item">E-mail:</p>
                <input type="email" name="email" value="{{ $prof_info->email }}" required id="email" class="register_input">
            </label>
            <label for="residence" class="mypage_label">
                <p class="input_item">居住地:</p>
                <input type="text" name="zip" value="{{ $prof_info->zip }}" required id="residence" class="register_input">
            </label>
            <label for="tel" class="mypage_label">
                <p class="input_item">携帯番号:</p>
                <input type="tel" name="tel" value="{{ $prof_info->tel }}" required id="tel" class="register_input">
            </label>
            <label for="password" class="mypage_label">
                <input type="password" name="" value="{{ $prof_info->password }}" required id="tel" class="register_input">
            </label>
            <label for="name" class="mypage_label">
                <p class="input_item">アイコン:</p>
                <input type="text" name="name" value="{{ $prof_info->prof_img }}" required id="name" class="register_input">
            </label>

            <input type="text" hidden value="{{ $updated_at }}" name="updated_at">
            <input type="submit" value="削除" class="mypage_submit">
        </form>
    </div>
@endsection
@include('layouts.member.main_menu')

@include('layouts.member.footer')
