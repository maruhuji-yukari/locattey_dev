@extends('layouts.member.common')

@section('page_title','画像アップロード')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

<!-- フラッシュメッセージ -->
@if (session('flash_message'))
    <div class="alert js-alert" role="alert">
        {{ session('flash_message') }}
    </div>
@endif

@section('section_title','画像アップロード')
@section('main_content')
    <h4 class="main_log-title">{{ __('Uploaded.') }}</h4>
    <h5 class="section_upload-title">アップロード済画像一覧</h5>
    <div class="section_upload">
        <ul class="section_upload-item">
            <li><img src="{{ asset('storage/'.$products->product_image1) }}" alt="" class="section_upload-image"></li>
            @foreach( $product_images as $image )
            <li><img src="{{ asset('storage/'.$products->$image) }}" alt="" class="section_upload-image"></li>
            @endforeach
        </ul>
    </div>

    <h5 class="section_upload-title">画像をアップロードし直す</h5>

    <form action="{{ route('editUploads',$products->id) }}" method="POST" class="register_form" enctype='multipart/form-data'>
        @csrf
        <div class="register_file-wrap">
            <label for="product_image1" class="register_label-file area_drop">
                <span class="register_file-text js-text">画像(必須)</span>
                <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
                <input type="file" id="product_image1" name="product_image1" class="register_file js-input-file @error('product_image1') is-invalid @enderror">
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
                    <input type="file" id="{{ $image }}" name="{{ $image }}" class="register_file js-input-file  @error("'".$image."'") is-invalid @enderror">
                    <img src="" alt="" class="prev-img">
                </label>
                @error("'".$image."'")
                <span class="errorMsg" role="alert">
            <strong>{{ $message }}</strong>
            </span>
                @enderror
            @endforeach
        </div>
        <input type="submit" class="register_submit" value="{{ __('Edit.') }}">
        <p class="link_back"><a href="{{ route('tradeEdit',$products->id) }}">前のページへ踊る</a></p>
    </form>
@endsection
@include('layouts.member.main_menu')

@include('layouts.member.footer')
