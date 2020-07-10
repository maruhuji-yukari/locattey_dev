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
    <h4 class="main_log-title">{{ __('ProductDelete.') }}</h4>



@endsection
@include('layouts.member.main_menu')

@include('layouts.member.footer')
