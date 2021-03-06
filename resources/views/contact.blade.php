@extends('layouts.member.common_single')

@section('page_title','お問い合わせページ')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

@section('section_title','お問い合わせページ')
@section('main_content')
    <div class="section_contact">
        <p>※返信回答には2〜3日程度かかります。あらかじめご了承ください。</p>
        <form class="mail_form" method="POST" action="{{ route('confirm') }}">
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
                <textarea class="textarea" name="comment" required>{{ old('comment') }}</textarea>
            </label>
            @error('comment')
            <p class="alert"><strong>{{ $message }}</strong></p>
            @enderror

            <label class="label">
                <span class="label_item">返信はどうしますか:</span>
                @foreach($reply as $item)
                    <input type="radio" name="reply" value="{{ $item }}" >{{ $item }}
                @endforeach
            </label>
            @error('reply')
            <p class="alert"><strong>{{ $message }}</strong></p>
            @enderror
            <input type="submit" name="action" class="submit_send" value="確認">
        </form>
        <p class="link_back"><a href=" {{ route('index') }} ">TOPに戻る</a></p>
    </div>
@endsection

@include('layouts.member.footer')

