@extends('layouts.member.common')

@section('page_title','出品する')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

<!-- フラッシュメッセージ -->
@if (session('flash_message'))
    <div class="alert js-alert" role="alert">
        {{ session('flash_message') }}
    </div>
@endif

@section('section_title','出品する')
@section('main_content')
    <form action="{{ route('tradeCreate') }}" method="POST" class="register_form" enctype="multipart/form-data">
        @csrf
        <label for="product_name" class="register_label">出品タイトル(50文字以内):</label>
        <input type="text" id="product_name" name="product_name" class="register_input @error('product_name') is-invalid @enderror" placeholder="出品タイトル" required value="{{ old('product_name') }}">
        @error('product_name')
        <span class="errorMsg" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="categories_id" class="register_label">カテゴリー:</label>
        <div class="select_color">
            <select name="categories_id" id="categories_id" class="register_select @error('categories_id') is-invalid @enderror" required>
                <option value="0" hidden>▼選択してください</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>
        @error('categories_id')
        <span class="errorMsg" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="product_describe" class="register_label">概要(500文字以内):</label>
        <textarea name="product_describe" id="product_describe" class="register_textarea @error('product_describe') is-invalid @enderror" required placeholder="概要(500文字以内)">{{ old('product_describe') }}</textarea>
        @error('product_describe')
        <span class="errorMsg" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label class="register_label">画像:</label>
        <p class="uploads_text">1枚目は必須です。jpeg,jpg,gif,png形式で3MBまでアップロードできます。</p>
        <div class="register_file-wrap">
            <label for="product_image1" class="register_label-file area_drop">
                <span class="register_file-text js-text">画像(必須)</span>
                <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
                <input type="file" id="product_image1" name="product_image1" value="register_file" class="register_file js-input-file @error('product_image1') is-invalid @enderror" required>
                <img src="" alt="" class="prev-img">
            </label>
            @error('product_image1')
            <span class="errorMsg" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror

            @foreach( $product_images as $image )
                <label for="{{ $image }}" class="register_label-file area_drop">
                    <span class="register_file-text">画像</span>
                    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
                    <input type="file" id="{{ $image }}" name="{{ $image }}" value="register_file" class="register_file js-input-file  @error("'".$image."'") is-invalid @enderror">
                    <img src="" alt="" class="prev-img">
                </label>
                @error("'".$image."'")
                <span class="errorMsg" role="alert">
            <strong>{{ $message }}</strong>
            </span>
                @enderror
            @endforeach
        </div>
        <div class="btn_space">
            <input type="submit" class="register_submit" value="{{ __('Register.') }}">
        </div>
    </form>
@endsection
@include('layouts.member.main_menu')

@include('layouts.member.footer')
