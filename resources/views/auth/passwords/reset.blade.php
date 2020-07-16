@extends('layouts.member.common_single')

@section('page_title','パスワードをリセット')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

@section('section_title','パスワードをリセット')
@section('main_content')

    <div class="section_reset">
        <form class="form_reset" method="POST" action="{{ route('password.update') }}">
            <p>登録しているメールアドレスと新しいパスワードを登録してください。</p>
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <lable class="register_label">{{ __('E-Mail Address') }}</lable>
            <input type="email" name="email" required autofocus class="register_input @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" autocomplete="登録しているメールアドレス">
            @error('email')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror

            <lable class="register_label">{{ __('New Password') }}</lable>
            <input id="password" type="password" class="register_input @error('password') is-invalid @enderror" name="password" required autocomplete="新しいパスワード">
            @error('password')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror

            <lable class="register_label">{{ __('Confirm Password') }}</lable>
            <input id="password" type="password" class="register_input @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="上と同じパスワード">
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input type="submit" class="submit_reset2" value="{{ __('Reset Password') }}">
        </form>
    </div>

@endsection

@include('layouts.member.footer')

