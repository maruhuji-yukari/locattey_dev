<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>Admin Home</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('./css/admin.css') }}">
    </head>
    <body>
    <div class="wrap">
        <h1>管理人室ホーム</h1>
        <p class="user">管理人名【{{ $user->name }}】さんがログイン中</p>
        <hr>
        <p class="about">作業を選んでください。</p>
        <div class="list">
            <h2>カテゴリ編集</h2>
            <ul>
                <li>カテゴリ登録</li>
                <li>カテゴリ編集</li>
                <li>カテゴリ削除</li>
            </ul>
        </div>
        <div class="list">
            <h2>出品編集</h2>
            <ul>
                <li>出品登録</li>
                <li>出品編集</li>
                <li>出品削除</li>
            </ul>
        </div>
        <div class="list">
            <h2>ボード編集</h2>
            <ul>
                <li>ボード登録</li>
                <li>ボード編集</li>
                <li>ボード削除</li>
            </ul>
        </div>
        <div class="list">
            <h2>アカウント編集</h2>
            <ul>
                <li>アカウント編集</li>
                <li>アカウント削除</li>
            </ul>
        </div>
    </div>
    <div class="logout">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <input type="submit" value="ログアウト" class="submit_btn">
        </form>
    </div>
    </body>
</html>
