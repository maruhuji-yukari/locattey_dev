@extends('layouts.member.common')

@section('page_title','出品情報を削除します')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

<!-- フラッシュメッセージ -->
@if (session('flash_message'))
    <div class="alert js-alert" role="alert">
        {{ session('flash_message') }}
    </div>
@endif

@section('section_title','出品情報を削除します')
@section('main_content')
    <h4 class="main_log-title">{{ __('CompleteDeleted.') }}</h4>

    <form action="{{ route('tradeDelete',$DBdata->id) }}" class="register_form" method="POST" enctype='multipart/form-data'>
        @csrf
        <label for="product_name" class="register_label">出品タイトル(50文字以内):</label>
        <input type="text" id="product_name" name="product_name" class="register_input" placeholder="出品タイトル" value="{{ $DBdata->product_name }}" readonly>

        <label for="categories_id" class="register_label">カテゴリー:</label>
        <div class="select_color">
            <select name="categories_id" id="categories_id" class="register_select" readonly>
                @if($c_name !== '')
                    @foreach($c_name as $member=>$index)
                        <option value="{{$index->id}}">{{ $index->category_name.' [登録上のカテゴリー]' }} </option>
                    @endforeach
                @endif
            </select>
        </div>

        <label for="product_describe" class="register_label">概要(500文字以内):</label>
        <textarea name="product_describe" id="product_describe" class="register_textarea" readonly placeholder="概要(500文字以内)">{{ $DBdata->product_describe }}</textarea>

        <label class="register_label">画像:</label>
        <div class="register_file-wrap">
            <ul class="uploads_list">
                @foreach($product_images as $image)
                <li class="uploads_list-image"><img src="{{ asset('storage/'.$DBdata->$image) }}"></li>
                @endforeach
            </ul>
        </div>

        <div>
            @foreach($product_images as $image)
            <input type="file" name="{{ $image }}" hidden>
            @endforeach
        </div>

        <div class="btn_space">
            <button type="submit" class="register_submit"><span>{{ __('Deleted.') }}</span></button>
        </div>
    </form>

@endsection
@include('layouts.member.main_menu')

@include('layouts.member.footer')
