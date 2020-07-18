@extends('layouts.member.common_single')

@section('page_title','お問い合わせ確認')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

@section('section_title','お問い合わせ確認')
@section('main_content')
    <div class="section_contact">
        <p>※問い合わせ内容を確認の上送信ボタンを押してください。</p>
        <form class="mail_form" method="POST" action="{{ route('send') }}">
        @csrf
            <label class="label">
                <span class="label_item">件名:(30文字以内)</span>
                <input type="text" class="input" name="subject" readonly value="{{ $contact->subject }}">
            </label>
            @error('subject')
            <p class="alert"><strong>{{ $message }}</strong></p>
            @enderror
            <label class="label">
                <span class="label_item">お名前(PN可能、20文字以内):</span>
                <input type="text" class="input" name="name" readonly value="{{ $contact->name }}">
            </label>
            @error('name')
            <p class="alert"><strong>{{ $message }}</strong></p>
            @enderror
            <label class="label">
                <span class="label_item">返信先メールアドレス:</span>
                <input type="email" class="input" name="email" readonly value="{{ $contact->email }}">
            </label>
            @error('email')
            <p class="alert"><strong>{{ $message }}</strong></p>
            @enderror
            <label class="label">
                <span class="label_item">お問い合わせ内容:</span>
                <textarea class="textarea" name="comment" readonly>{{ $contact->comment }}</textarea>
            </label>
            @error('comment')
            <p class="alert"><strong>{{ $message }}</strong></p>
            @enderror
            <label class="label">
                <span class="label_item">返信が必要?:</span>
                    <input type="text" class="input" name="reply" readonly value="{{ $contact->reply }}">
            </label>
            @error('reply')
            <p class="alert"><strong>{{ $message }}</strong></p>
            @enderror
            <input type="submit" class="submit_send" name="send" value="送信">
            <button type="button" onclick="history.back()" class="link_back4">戻る</button>
        </form>

    </div>
@endsection

@include('layouts.member.footer')

