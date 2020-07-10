<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>test</title>
        <style>
            body{
                background: #dddddf;
            }
            .label{
                width:100%;
                display: block;
            }
            .form{
                width: 600px;
                min-height: 150px;
                padding: 15px;
                box-sizing: border-box;
                margin: 0 auto;
                background: #efefef;
            }
            .file{
                width: 50%;
                display: block;
            }
            .btn_up{
                width: 120px;
                height: 30px;
                font-size: 16px;
                background: #333333;
                color: #efefef;
                float: right;
                text-align: center;
            }
        </style>
    </head>
    <body>
    <form action="{{ route('testIndex') }}" enctype="multipart/form-data" class="form" method="POST">
        @csrf
        <label class="label">画像をアップロード：</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
        <input type="file" name="file" class="file">
        @if($errors->any())
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            @endif
            </ul>
            <input type="submit" class="btn_up" value="アップロード">
    </form>
    </body>
</html>
