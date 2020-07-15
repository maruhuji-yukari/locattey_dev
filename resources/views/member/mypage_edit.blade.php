@extends('layouts.member.common')

@section('page_title','登録情報変更')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

@section('section_title','登録情報変更')
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
                    <p class="input_item">パスワード変更はこちら</p>
                </label>
<<<<<<< HEAD
                <input type="text" hidden value="" name="updated_at">
=======
                <input type="text" hidden value="{{ $updated_at }}" name="updated_at">
>>>>>>> develop
                <input type="submit" value="修正" class="mypage_submit">
            </form>
        </div>
@endsection
@include('layouts.member.main_menu')

@include('layouts.member.footer')
