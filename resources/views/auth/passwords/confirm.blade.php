@extends('layouts.member.common_single')

@section('page_title','パスワード確認')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

@section('section_title','パスワード確認')
@section('main_content')

    <div class="section_reset">
        <form class="form_reset" method="POST" action="{{ route('password.confirm') }}">
            <p>{{ __('Please confirm your password before continuing.') }}</p>
            @csrf
            <input type="password" name="password" value="パスワードを入力してください" class="register_input @error('password') is-invalid @enderror">
             @error('password')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
             @enderror
            <input type="submit" class="submit_reset" value="確認">
            <p>
            @if (Route::has('showResetForm'))
                <a class="btn btn-link" href="{{ route('showLinkRequestForm') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            </p>
        </form>
    </div>

@endsection

@include('layouts.member.footer')

