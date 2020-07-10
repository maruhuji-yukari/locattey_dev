@extends('layouts.member.common')

@section('page_title','出品一覧履歴')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

<!-- フラッシュメッセージ -->
@if (session('flash_message'))
    <div class="alert js-alert" role="alert">
        {{ session('flash_message') }}
    </div>
@endif

@section('section_title','出品一覧履歴')
@section('main_content')
    @foreach($trades as $trade)
        <a href="{{ route('tradeEdit',$trade->id) }}">
        <div class="section_list">
        <div class="section_list-img">
            @if(empty($trade->product_image1))
                <img src="{{asset('img/no_image.jpg')}}" alt="" class="thumbnail">
               @elseif($trade->product_image1)
                <img src="{{asset('storage/'.$trade->product_image1)}}" alt="" class="thumbnail">
            @endif
        </div>
            <div class="section_list-area">
                <p class="section_list-title"><!--ここに出品名-->{{ $trade->product_name }}</p>
                <p class="section_list-comment"><!--ここに説明-->{{ $trade->product_describe }}</p>
            </div>
    </div>
    </a>
    @endforeach
@endsection
@include('layouts.member.main_menu')

@include('layouts.member.footer')
