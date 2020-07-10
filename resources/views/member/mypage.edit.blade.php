@extends('layouts.member.common')

@section('page_title','登録情報変更')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

@section('section_title','マイページ')
@section('main_content')
    <h4 class="main_log-title">{{ __('Profile Edit') }}</h4>
    <div class="news">
        <div class="section">
            <p class="section_list-title">アカウント情報を更新します</p>

            <form action="" method="POST" enctype="multipart/form-data">
                <label for="name">
                    <p class="input_item">名前:</p>
                    <input type="text" name="name" value="" required id="name">
                </label>
                <label for="email">
                    <p class="input_item">E-mail:</p>
                    <input type="email" name="email" value="" required id="email">
                </label>
                <p class="input_item"></p>
                <label for="prof_image" class="register_label-file area_drop">
                    <span class="register_file-text">アイコン</span>
                    <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
                    <input type="file" id="prof_image" name="prof_image" class="register_file js-input-file  @error('product_image2') is-invalid @enderror">
                    <img src="" alt="" class="prev-img">
                </label>
                <input type="submit" value="修正" class="submit">
            </form>
        </div>
    </div>
@endsection
@include('layouts.member.main_menu')

@include('layouts.member.footer')
