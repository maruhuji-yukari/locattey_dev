
@extends('layouts.member.common')

@section('page_title','ログイン')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

@section('section_title','ログイン')
@section('main_content')
    <div class="register">
        <div class="register_content">
            <form action="{{ route('login') }}" class="form" method="POST">
                @csrf
                <label for="" class="register_label">メールアドレス:</label>
                <input type="email" class="register_input" name="email" required placeholder="メールアドレス形式で入力してください">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="" class="register_label">パスワード:</label>
                <input type="password" class="register_input" name="password" required placeholder="パスワード">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="checkbox" class="checkbox" name="remember">
                <label for="remember">{{ __('Remember Me') }}</label>
                @error('remember')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <button type="submit" class="register_submit">{{ __('Login') }}</button>
                <ul class="link_back3">
                    <li>パスワードを忘れた方は再発行してください。</li>
                    <li>再発行ページは<a href="{{ route('showLinkRequestForm') }}">こちら</a></li>
                </ul>
            </form>
        </div>
    </div>

@endsection

<!-- フラッシュメッセージ -->
@if (session('flash_message'))
    <div class="alert js-alert" role="alert">
        {{ session('flash_message') }}
    </div>
@endif

@include('layouts.member.main_menu')

@include('layouts.member.footer')

