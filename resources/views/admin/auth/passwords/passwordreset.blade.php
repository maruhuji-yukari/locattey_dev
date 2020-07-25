<!DOCTYPE html>
<html lang="ja">
    <head>
        <style>
            body,html{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-size: 16px;
                background: #efefef;
                color: #333333;
            }
            .section{
                width: 100%;
                padding: 5px;
                box-sizing: border-box;
                margin: 30px auto;
            }

            h1{
                width: 100%;
                display: block;
                margin: 15px auto;
                font-size: 24px;
                font-weight: 700;
                text-align: center;
                color: #bf2b30;
            }
            p{
                font-size: 16px;
                text-align: left;
                width: 70%;
                margin: 30px auto;
            }
            a{
                color: #bf2b30;
                text-decoration: none;
            }

            a:hover{
                font-weight: 700;
            }
            .from{
                width: 100%;
                margin: 15px auto;
                font-size: 14px;
                text-align: right;
            }
            .link{
                text-align: center;
                font-size: 18px;
            }
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>パスワードリセット</title>
    </head>
    <body>
        <div class="section">
            <h1>パスワードリセットを行いますか？</h1>
            <p>パスワードリセットを行いたい場合は、リンク「パスワードリセット」をクリックしてパスワードを再設定してください。</p>
            <p class="link"><a href="{{ $reset_url }}">パスワードリセット</a></p>
        </div>
        <div class="from">
            Locattey@管理人より( info@yukarisite.com )
        </div>
    </body>
</html>
