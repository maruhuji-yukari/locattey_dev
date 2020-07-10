@extends('layouts.member.common')

@section('page_title','マイページ')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

    @section('section_title','マイページ')
    @section('main_content')
        <h4 class="main_log-title">{{ __('New_TalkLog') }}</h4>

        <!--トークログ-->
        <div class="main_message-log">
            <div class="main_message-section">
                <!--出品者-->
                <div class="exhibitorMsg-wrap">
                    <div class="exhibitorMsg">
                        <p class="exhibitorMsg-text">かしこまりました。ご都合の空いている日時はお決まりですか?</p>
                        <p class="exhibitorMsg-info">[2] 出品者: zundakosan 2020/05/29 13:04</p>
                    </div>
                    <img src="{{ asset('./img/icon-women.png') }}" alt="" class="icon-mini">
                </div>
                <!--出品者-->
                <!--希望者-->
                <div class="buyerMsg-wrap">
                    <img src="{{ asset('./img/icon_men.png') }}" alt="" class="icon-mini">
                    <div class="buyerMsg">
                        <p class="buyerMsg-text">譲っていただきたいです。ご検討お願いします。</p>
                        <p class="buyerMsg-info">[1] 引取希望者: 菊池 2020/05/29 13:00</p>
                    </div>
                </div>
                <!--希望者-->
            </div>
            <p class="msg_link3"><a href="talk_list.html">トーク履歴一覧</a></p>
        </div>
        <h4 class="main_log-title">最新出品履歴</h4>
        <div class="news">
            <div class="section">
                <span class="continuing_icon">出品中</span>
                <img src="{{asset('./img/item001.jpeg')}}" alt="" class="section_img">
                <p class="section_product-name">トースト譲ります</p>
                <p class="section_product-text">パンを食べる機会がなくなりました。引き取り手を探しています。</p>
                <span class="section_category-name"><i class="far fa-folder" aria-hidden="true"></i> 家電</span>
            </div>
            <div class="section">
                <span class="finished_icon">引渡済</span>
                <img src="{{asset('./img/item003.jpeg')}}" alt="" class="section_img">
                <p class="section_product-name">18型テレビ譲ります</p>
                <p class="section_product-text">小さすぎるので処分します。サブとして利用することをお勧めします。</p>
                <span class="section_category-name"><i class="far fa-folder" aria-hidden="true"></i> 家電</span>
            </div>
            <div class="section">
                <span class="finished_icon">引渡済</span>
                <img src="{{asset('./img/item002.jpeg')}}" alt="" class="section_img">
                <p class="section_product-name">マウンテンバイク譲ります</p>
                <p class="section_product-text">新調したため譲り先を探しています。まだまだ乗れます！</p>
                <span class="section_category-name"><i class="far fa-folder" aria-hidden="true"></i> 自転車</span>
            </div>
        </div>
        <p class="msg_link3"><a href="trade_list.html">出品履歴一覧</a></p>
        <h4 class="main_log-title">最新お気に入り登録履歴</h4>
        <div class="main_content">
            <ul class="talk-list_list">
                <li><span class="continuing_icon-s">出品中</span> <a href="talk_room_001.html">トースターをお譲りします</a></li>
                <li><span class="finished_icon-s">引渡済</span> マウンテンバイクをお譲りします</li>
                <li><span class="finished_icon-s">引渡済</span> 18インチのテレビをお譲りします</li>
                <li><span class="finished_icon-s">引渡済</span> 通勤用バッグをお譲りします</li>
            </ul>
        </div>
    @endsection
@include('layouts.member.main_menu')

@include('layouts.member.footer')
