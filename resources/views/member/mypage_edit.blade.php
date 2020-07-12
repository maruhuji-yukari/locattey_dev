@extends('layouts.member.common')

@section('page_title','登録情報変更')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

@section('section_title','登録情報変更')
@section('main_content')
        <div class="section_mypage">
            <form action="" method="POST" enctype="multipart/form-data" class="form">
                @csrf
                <label for="name" class="mypage_label">
                    <p class="input_item">名前:</p>
                    <input type="text" name="name" value="" required id="name" class="register_input">
                </label>
                <label for="email" class="mypage_label">
                    <p class="input_item">E-mail:</p>
                    <input type="email" name="email" value="" required id="email" class="register_input">
                </label>
                <label for="residence" class="mypage_label">
                    <p class="input_item">居住地:(任意)</p>
                    <input type="text" name="residence" value="" required id="residence" class="register_input">
                </label>
                <label for="tel" class="mypage_label">
                    <p class="input_item">携帯番号:(任意)</p>
                    <input type="tel" name="tel" value="" required id="tel" class="register_input">
                </label>
                <label for="password" class="mypage_label">
                    <p class="input_item">パスワード変更はこちら</p>
                </label>
                <input type="submit" value="修正" class="mypage_submit">
            </form>
        </div>
@endsection
@include('layouts.member.main_menu')

@include('layouts.member.footer')
