<!DOCTYPE html>
<html lang="ja">
<head>
    <title>Admin Register</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('./css/admin.css') }}">
</head>
<body>
<div class="wrap">
    <h1>管理人新規登録</h1>
    <form method="POST" action="{{ route('admin.register') }}" class="admin_form">
        @csrf
        <label for="name">Admin Name:</label>
        <input type="text" name="name" required class="input">
        @error('name')
        <p class="error">{{ $message }}</p>
        @enderror

        <label for="email">Admin Email:</label>
        <input type="email" name="email" class="input" required>
        @error('email')
        <p class="error">{{ $message }}</p>
        @enderror

        <label for="password">Admin Password:</label>
        <input type="text" name="password" required class="input">
        @error('password')
        <p class="error">{{ $message }}</p>
        @enderror

        <label for="password_confirmation">Admin Password Confirm:</label>
        <input type="text" name="password_confirmation" class="input">
        @error('password_confirmation')
        <p class="error">{{ $message }}</p>
        @enderror

        <input type="submit" class="submit" value="新規登録">
        <p>ログイン画面は<a href="{{ route('admin.login') }}">こちら</a></p>
    </form>
</div>
</body>
</html>
