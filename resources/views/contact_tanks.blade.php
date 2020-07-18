@extends('layouts.member.common_single')

@section('page_title','お問い合わせ送信完了')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

@section('section_title','お問い合わせ送信完了')
@section('main_content')
    <div class="section_contact">
        <p>お問い合わせを受け付けました。返信には2〜3日かかります。</p>
        <p>ご利用ありがとうございました。</p>
        <p class="link_back"><a href=" {{ route('index') }} ">TOPに戻る</a></p>
    </div>
@endsection

@include('layouts.member.footer')

