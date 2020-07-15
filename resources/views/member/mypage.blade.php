@extends('layouts.member.common')

@section('page_title','マイページ')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

    @section('section_title','マイページ')
    @section('main_content')
{{--        <h4 class="main_log-title">{{ __('New_TalkLog') }}</h4>--}}

        <!--トークログ-->
{{--        <div class="main_message-log">--}}
{{--            <div class="main_message-section">--}}
{{--                <!--出品者-->--}}
{{--                <div class="exhibitorMsg-wrap">--}}
{{--                    <div class="exhibitorMsg">--}}
{{--                        <p class="exhibitorMsg-text">かしこまりました。ご都合の空いている日時はお決まりですか?</p>--}}
{{--                        <p class="exhibitorMsg-info">[2] 出品者: zundakosan 2020/05/29 13:04</p>--}}
{{--                    </div>--}}
{{--                    <img src="{{ asset('./img/icon-women.png') }}" alt="" class="icon-mini">--}}
{{--                </div>--}}
{{--                <!--出品者-->--}}
{{--                <!--希望者-->--}}
{{--                <div class="buyerMsg-wrap">--}}
{{--                    <img src="{{ asset('./img/icon_men.png') }}" alt="" class="icon-mini">--}}
{{--                    <div class="buyerMsg">--}}
{{--                        <p class="buyerMsg-text">譲っていただきたいです。ご検討お願いします。</p>--}}
{{--                        <p class="buyerMsg-info">[1] 引取希望者: 菊池 2020/05/29 13:00</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--希望者-->--}}
{{--            </div>--}}
{{--            <p class="msg_link3"><a href="talk_list.html">トーク履歴一覧</a></p>--}}
{{--        </div>--}}
<<<<<<< HEAD
        <h4 class="main_log-title">zundakosanさんのプロフィール</h4>
=======
        <h4 class="main_log-title">{{ $prof_info->name }}さんのプロフィール</h4>
>>>>>>> develop
        <div class="section_mypage">
            <p class="prof_img">
                @if($prof_info->prof_img != 'me.jpg')
                    <img src="{{ asset('images/images/'.$prof_info->prof_img) }}" alt="me!">
                 @else
                    <img src="{{ asset('img/me.jpg') }}" alt="me!">
                @endif
            </p>
            <div class="file_upload">
                <form action="{{ route('profUpload') }}" method="POST" enctype="multipart/form-data" class="form_upload">
                    @csrf
                    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
                    <input type="file" class="input_file" name="prof_img">
                    <input type="submit" class="submit_file" value="画像を変更">
                </form>
                <ul class="errorMsg">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <table class="prof_table">
                <tr>
                    <th>名前</th>
                    <td>{{ $prof_info->name }}</td>
                </tr>
                <tr>
                    <th>E-mail</th>
                    <td>{{ $prof_info->email }}</td>
                </tr>
                <tr>
                    <th>居住地</th>
                    <td>{{ $prof_info->zip }}</td>
                </tr>
                <tr>
                    <th>携帯番号</th>
                    <td>{{ $prof_info->tel }}</td>
                </tr>
            </table>
        </div>
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
