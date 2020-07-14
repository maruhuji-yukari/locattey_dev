<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('page_title') | Locattey - 物々交換サイト -</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('./css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/style.css') }}">
    <script src="https://kit.fontawesome.com/092d431054.js" crossorigin="anonymous"></script>
</head>
<body>

<!-- ヘッダー -->
@yield('header')

<!-- ハンバーガーメニュー -->
@yield('menu')

<!-- メニュー -->
@yield('navi')

<!--メイン-->
<div class="main-single">

    <!--メインコンテンツ-->
    <div class="main_content2">
        <h3 class="main_title js-float-menu-target"><i class="fas fa-external-link-alt" aria-hidden="true"></i> @yield('section_title')</h3>
        @yield('main_content')

        @yield('category_list')
    </div>

</div>

<!--フッター-->
@yield('footer')

<script src="{{ asset('./js/jquery.js') }}"></script>
<script src="{{ asset('./js/app.js') }}"></script>
</body>
</html>
