@extends('layouts.member.common')

@section('page_title','トップページ')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

@section('section_title','新着情報')
@section('main_content')
    <div class="news">
        <div class="section">
            <img src="{{ asset('./img/item001.jpeg') }}" alt="" class="section_img">
            <p class="section_product-name"><a href="trade_detail_001.html">トースター譲ります</a></p>
            <p class="section_product-text">パンを食べる機会がなくなりました。引き取り手を探しています。</p>
            <span class="section_category-name"><i class="far fa-folder" aria-hidden="true"></i> 家電</span>
        </div>
        <div class="section">
            <img src="{{ asset('./img/item003.jpeg') }}" alt="" class="section_img">
            <p class="section_product-name">18型テレビ譲ります</p>
            <p class="section_product-text">小さすぎるので処分します。サブとして利用することをお勧めします。</p>
            <span class="section_category-name"><i class="far fa-folder" aria-hidden="true"></i> 家電</span>
        </div>
        <div class="section">
            <img src="{{ asset('./img/item002.jpeg') }}" alt="" class="section_img">
            <p class="section_product-name">マウンテンバイク譲ります</p>
            <p class="section_product-text">新調したため譲り先を探しています。まだまだ乗れます！</p>
            <span class="section_category-name"><i class="far fa-folder" aria-hidden="true"></i> 自転車</span>
        </div>
    </div>
    <div class="news">
        <div class="section">
            <img src="{{ asset('./img/item004.jpeg') }}" alt="" class="section_img">
            <p class="section_product-name">ソファ譲ります</p>
            <p class="section_product-text">引っ越しに際し不要になりました。引き取り手を探しております。お気軽にご相談ください♪</p>
            <span class="section_category-name"><i class="far fa-folder" aria-hidden="true"></i> 家具</span>
        </div>
        <div class="section">
            <img src="{{ asset('./img/item005.jpeg') }}" alt="" class="section_img">
            <p class="section_product-name">iPhone 8譲ります</p>
            <p class="section_product-text">型落ちのiphoneをお譲りします。</p>
            <span class="section_category-name"><i class="far fa-folder" aria-hidden="true"></i> 携帯/スマートフォン</span>
        </div>
        <div class="section">
            <img src="{{ asset('./img/item006.jpeg') }}" alt="" class="section_img">
            <p class="section_product-name">通勤用バッグ譲ります</p>
            <p class="section_product-text">新調したため譲り先を探しています。使用済みなので神経質な方はご利用をお控えください。</p>
            <span class="section_category-name"><i class="far fa-folder" aria-hidden="true"></i> バッグ</span>
        </div>
    </div>
    <div class="pagination">
        <ul class="pagination_list">
            <li class="pagination_list-item">前</li>
            <li class="pagination_list-item">1</li>
            <li class="pagination_list-item">2</li>
            <li class="pagination_list-item">3</li>
            <li class="pagination_list-item">次</li>
        </ul>
    </div>

    <h3 class="main_title"><i class="fas fa-external-link-alt"></i> {{ __('Category') }}</h3>
    @include('layouts.member.category_list')

@endsection
@include('layouts.member.main_menu')

@include('layouts.member.footer')

