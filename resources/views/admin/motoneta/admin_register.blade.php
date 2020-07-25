<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>管理人室ログインページ</title>
        <meta charset="utf-8">
    </head>
    <body>
        <div class="wrap">
            <h1>管理人室ログイン</h1>
            <form method="POST" action="" class="admin_form">
                <label for="name">Admin Name:</label>
                <input type="text" name="name" required class="input">
                @error('name')
                <p class="error">{{ $message }}</p>
                @enderror

                <label for="password">Admin Password:</label>
                <input type="password" name="password" required class="input">
                @error('password')
                <p class="error">{{ $message }}</p>
                @enderror

                <input type="submit" class="submit" value="ログイン">
            </form>
        </div>
    </body>
</html>
