<!DOCTYPE html>
<html lang="ja">
<head>
    <title>管理人用パスワード再設定</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('./css/admin.css') }}">
</head>
<body>
<div class="wrap">
    <h1>管理人室パスワード再設定</h1>
    <hr>
    <p class="about">登録したパスワードを入力してください。</p>
    <ul>
        @foreach($errors->all() as $e)
        <li class="error">{{ $e }}</li>
        @endforeach
    </ul>
    <form action="{{ route('admin.password.email') }}" method="POST">
        @csrf
        <label for="email">Admin Email:</label>
        <input type="email" class="input" name="email">
        <input type="submit" value="送信" class="submit_btn">
    </form>
</div>
    <p class="about"><a href="{{route('admin.login')}}">管理人用ログイン画面に戻る</a></p>
</body>
</html>
