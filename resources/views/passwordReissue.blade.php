@extends('layouts.member.common')

@section('page_title','パスワード再発行')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

@section('section_title','パスワード再発行')
@section('main_content')
    <div class="register">
        <div class="register_content">
            <form action="" class="form" method="POST">
                @csrf
                <input type="text" class="register_input" name="email" required value="登録したメールアドレスを入力してください">
                <button type="submit" class="submit_password">{{ __('PasswordReissue') }}</button>
            </form>
        </div>
    </div>

@endsection

@include('layouts.member.main_menu')

@include('layouts.member.footer')

