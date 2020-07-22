@extends('layouts.member.common')

@section('page_title','入札取引中')

@include('layouts.member.header')

@include('layouts.member.menu')

@include('layouts.member.navi')

<!-- フラッシュメッセージ -->
@if (session('flash_message'))
    <div class="alert js-alert" role="alert">
        {{ session('flash_message') }}
    </div>
@endif

@section('section_title','入札取引中')
@section('main_content')

@endsection
@include('layouts.member.main_menu')

@include('layouts.member.footer')

