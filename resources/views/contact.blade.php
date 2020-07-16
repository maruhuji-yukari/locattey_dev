@extends('layouts.member.common_single')

@section('page_title','お問い合わせページ')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

@section('section_title','お問い合わせページ')
@section('main_content')
    <div class="section_contact">
        <form class="form" method="POST" action="">
        @csrf
            <label class="label">
                <span class="label_item">件名:(30文字以内)</span>
                <input type="text" class="input" name="subject" required autofocus value="{{ old('subject') }}">
            </label>
            @error('subject')
            <p class="alert"><strong>{{ $message }}</strong></p>
            @enderror
            <label class="label">
                <span class="label_item">お名前(PN可能、20文字以内):</span>
                <input type="text" class="input" name="name" required autofocus value="{{ old('name') }}">
            </label>
            @error('name')
            <p class="alert"><strong>{{ $message }}</strong></p>
            @enderror
            <label class="label">
                <span class="label_item">返信先メールアドレス:</span>
                <input type="email" class="input" name="email" required autofocus value="{{ old('name') }}">
            </label>
            @error('email')
            <p class="alert"><strong>{{ $message }}</strong></p>
            @enderror
            <label class="label">
                <span class="label_item">お問い合わせ内容:</span>
                <textarea class="textarea" name="comment" required>
                    {{ old('comment') }}
                </textarea>
            </label>
            @error('comment')
            <p class="alert"><strong>{{ $message }}</strong></p>
            @enderror
            <input type="hidden" name="text" value="">
            <input type="submit" class="submit_send" value="{{ __('Accepted your inquiry') }}">
        </form>
    </div>
@endsection

@include('layouts.member.footer')

