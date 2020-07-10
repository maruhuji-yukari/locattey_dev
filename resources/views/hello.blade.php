<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('./css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/welcome.css') }}">
    <title>ホーム | Locattey</title>
</head>

<body>
<div class="header">
    <h1 class="header_title"><a href="{{ route('index') }}">Locattey</a></h1>
    <h2 class="header_subtitle">みんなで物々交換をしよう</h2>
</div>
<div class="main">
    <section class="section">
        <h3 class="section_title">会員登録済の場合</h3>
        <p class="link_home"><a href="{{ route('showLogin') }}">ログイン</a></p>
    </section>
    <section class="section">
        <h3 class="section_title">登録がお済みでない方</h3>
        <a href="{{ route('showRegister') }}" class="link_home2">新規登録</a>
    </section>
</div>
<div class="banner">
    <img src="{{ asset('./img/banner.jpg') }}" alt="Locattey">
</div>
<div class="footer">
    <p class="footer_text">&copy; Locattey All Rights Reserved.</p>
</div>
<script src="{{ asset('./js/jquery.js') }}"></script>
<script src="{{ asset('./js/app.js') }}"></script>
</body>
</html>
