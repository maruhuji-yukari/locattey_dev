<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>お問い合わせ内容</title>
        <meta charset="utf-8">
        <style>
            body,html{
                font-size: 16px;
                color: #333333;
                margin: 0;
            }
            h1{
                text-align: center;
                color: #bf2b30;
                font-weight: 700;
                font-size: 24px;
            }
            .text{
                display: block;
                width: 90%;
                margin: 15px auto;
                padding: 5px;
                box-sizing: border-box;
            }
            li{
                list-style: none;
            }

            .from{
                font-size: 14px;
                text-align: right;
            }
            .comment{
                width: 100%;
                font-size: 16px;
                margin: 15px auto;
            }
        </style>
    </head>
    <body>
    <div class="sectioni_email">
        <h1>Locatteyへのお問い合わせ内容</h1>
        <div class="text">
            <ul>
                <li>送信者名: {{ $sendName }}</li>
                <li>送信者Email: {{ $sendEmail }}</li>
                <li>件名: {{ $sendSubject }}</li>
                <li>返信: {{ $sendReply }}</li>
            </ul>
            <div class="comment">{{ $sendComment }}</div>
        </div>
        <p class="from">From: Locattey@管理人( info@yukarisite.com )</p>
    </div>
    </body>
</html>
