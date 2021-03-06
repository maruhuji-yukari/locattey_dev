@extends('layouts.member.common')

@section('page_title','出品情報')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

@section('section_title','出品情報')
@section('main_content')
    <div class="news">
        <div class="section_simple">
            <table class="trade_table">

                <tr>
                    <img src="{{ asset( 'storage/'.$products->product_image1 ) }}" class="trade_table-img1 js_change-target">
                </tr>

                <tr>
                    <ul class="trade_table-img">
                        @foreach($images as $img)
                        <li><img src="{{ asset( 'storage/'.$products->$img ) }}" class="thumbnail js_click-target"></li>
                        @endforeach
                    </ul>
                </tr>

                <tr>
                    <th>出品名称</th>
                    <td>{{ $products->product_name }} <span class="trade_table-mini">[ {{ $products->id }} ]</span></td>
                </tr>
                <tr>
                    <th>カテゴリー</th>
                    <td>{{ $categories_id->category_name }}</td>
                </tr>
                <tr>
                    <th>出品者名</th>
                    <td>{{ $users_id->name }}</td>
                </tr>
                <tr class="trade_table-tr">
                    <th>内容</th>
                    <td>{{ $products->product_describe }}</td>
                </tr>
            </table>
        </div>
        <div class="btn_space">
            @if(Auth::check())

{{--            <a href=""><span class="submit_bid">{{ __('bid.') }}</span></a>--}}
             <form action="{{ route('bidUpdate',$products->id) }}" method="POST" class="form_bid">
                 @csrf
                 <label for="is_bid">
                 <input type="text" name="is_bid" value="{{ $is_bid }}" id="is_bid">
                 </label>
                     @error('is_bid')
                 <p>{{ $message }}</p>
                 @enderror
                 <input type="text" name="product_name" value="testtest" id="product_name">
                 <input type="submit" class="submit_bid" value="{{ __('bid.') }}">
             </form>
            @else
            <a href="{{ route('login') }}"><span class="submit_bid">{{ __('Please Login.') }}</span></a>
            @endif
        </div>
    </div>
    <p class="link_back"><a href="{{ route('index').'/?page='.ceil(($products->id)/10) }}">一覧へ戻る</a></p>
@endsection
@include('layouts.member.main_menu')

@include('layouts.member.footer')
