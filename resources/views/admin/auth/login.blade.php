<!DOCTYPE html>
<html lang="ja">
<head>
    <title>Admin Login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('./css/admin.css') }}">
</head>
<body>
<div class="wrap">
    <h1>管理人室ログイン</h1>
    <form method="POST" action="{{ route('admin.login') }}" class="admin_form">
        @csrf
        <label for="name">Admin Email:</label>
        <input type="email" name="email" required class="input">
        @error('email')
        <p class="error">{{ $message }}</p>
        @enderror

        <label for="password">Admin Password:</label>
        <input type="password" name="password" required class="input">
        @error('password')
        <p class="error">{{ $message }}</p>
        @enderror

        <input type="submit" class="submit_btn" value="ログイン">
        <ul>
            <li>新規登録は<a href="{{ route('admin.register') }}">こちら</a></li>
{{--            <li>パスワード再発行は<a href="{{ route('admin.password.email.send') }}">こちら</a></li>--}}
            <li>Locatteyへ戻るには<a href="{{ route('index') }}">こちら</a></li>
        </ul>

    </form>
</div>
</body>
</html>
