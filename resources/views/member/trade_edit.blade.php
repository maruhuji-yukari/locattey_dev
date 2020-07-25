@extends('layouts.member.common')

@section('page_title','修正する')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

<!-- フラッシュメッセージ -->
@if (session('flash_message'))
    <div class="alert js-alert" role="alert">
        {{ session('flash_message') }}
    </div>
@endif

@section('section_title','修正する')
@section('main_content')
    <form action="{{ route('tradeUpdate',$products->id) }}" method="POST" class="register_form">
        @csrf
        <label for="product_name" class="register_label">出品タイトル(50文字以内):</label>
        <input type="text" id="product_name" name="product_name" class="register_input @error('product_name') is-invalid @enderror" placeholder="出品タイトル" required value="{{ $products->product_name }}">
        @error('product_name')
        <span class="errorMsg" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="categories_id" class="register_label">カテゴリー:</label>
        <div class="select_color">
            <select name="categories_id" id="categories_id" class="register_select @error('category_id') is-invalid @enderror" required >
                @if($c_name !== '')
                    @foreach($c_name as $member=>$index)
                <option value="{{$index->id}}">{{ $index->category_name.' [登録上のカテゴリー]' }} </option>
                    @endforeach
                @endif
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
        <textarea name="product_describe" id="product_describe" class="register_textarea @error('product_describe') is-invalid @enderror" required placeholder="概要(500文字以内)">{{ $products->product_describe }}</textarea>
        @error('product_describe')
        <span class="errorMsg" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label class="register_label">画像:</label>
        <a href="{{ route('editImage',$products->id) }}"><span class="submit_reUploads">画像を変更する</span></a>

        <input type="text" name="updated_at" hidden value="{{ $updated_at }}">
        <input type="text" name="id" hidden value="{{ $id }}">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="btn_space_edit">
            <input type="submit" class="edit_submit" value="{{ __('Edit.') }}">
            <a href="{{ route('tradeRemove',$products->id) }}"><span>{{ __('Deleted.') }}</span></a>
        </div>
        <p class="link_back"><a href="{{ route('tradeList') }}">一覧へ戻る</a></p>
    </form>
@endsection
@include('layouts.member.main_menu')

@include('layouts.member.footer')
