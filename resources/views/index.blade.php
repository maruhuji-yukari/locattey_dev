@extends('layouts.member.common')

@section('page_title','トップページ')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

@section('section_title','新着情報')
@section('main_content')
    <div class="searchArea">
        <form action="" class="searchArea_form">
            @csrf
            <input type="text" class="searchArea_input" name="search_word"><i class="searchArea_icon fas fa-search"></i>
            <input type="checkbox" name="trade_flag" value="1">引取完了情報を表示しない
            <input type="submit" class="searchArea_submit" value="検索">
        </form>
    </div>
    <div class="news">
        @foreach($products as $item)
        <a href="{{ route('tradeSimple',$item->id) }}">
        <div class="section">
            <img src="{{ asset('storage/'.$item->product_image1) }}" alt="" class="section_img">
            <p class="section_product-name"><a href="">{{ $item->product_name }}</a></p>
            <p class="section_product-text">{{ $item->product_describe }}</p>
        </div>
        </a>
         @endforeach
    </div>
<<<<<<< HEAD
    <div class="pagination_space">
=======
    <div class="pagination_area">
>>>>>>> develop
        {{ $products->links() }}
    </div>

    <h3 class="main_title"><i class="fas fa-external-link-alt"></i> {{ __('Category') }}</h3>
    @include('layouts.member.category_list')

@endsection
@include('layouts.member.main_menu')

@include('layouts.member.footer')

