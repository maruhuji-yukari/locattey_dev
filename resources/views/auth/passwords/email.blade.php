@extends('layouts.member.common_single')

@section('page_title','パスワード再発行')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

@section('section_title','パスワード再発行')
@section('main_content')

    <div class="section_reset">
        <form class="form_reset" method="POST" action="{{ route('password.email') }}">
            <p>登録しているメールアドレスを入力してください。</p>
            @csrf
            <input type="email" name="email" class="register_input @error('email') is-invalid @enderror">
            @error('email')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input type="submit" class="submit_reset3" value="{{ __('Send Password Reset Link') }}">
        </form>
    </div>

@endsection

@include('layouts.member.footer')
