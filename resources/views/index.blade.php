@extends('layouts.member.common')

@section('page_title','トップページ')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

@section('section_title','新着情報')
@section('main_content')
    <div class="news">
        @foreach($products as $item)
        <div class="section">
            <img src="{{ asset('storage/'.$item->product_image1) }}" alt="" class="section_img">
            <p class="section_product-name"><a href="">{{ $item->product_name }}</a></p>
            <p class="section_product-text">{{ $item->product_describe }}</p>
        </div>
         @endforeach
    </div>
    <div class="pagination_space">
        {{ $products->links() }}
    </div>

    <h3 class="main_title"><i class="fas fa-external-link-alt"></i> {{ __('Category') }}</h3>
    @include('layouts.member.category_list')

@endsection
@include('layouts.member.main_menu')

@include('layouts.member.footer')

