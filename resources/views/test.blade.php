<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>testview</title>
    </head>
    <body>
        <h1>test</h1>
        <h2>comment</h2>
        @foreach($tests as $test)
        <div>
            <p>id: {{ $test->id }}</p>
            <p>{{ $test->comment }}</p>
            <p><a href="{{ route('showDetail',$test->id) }}">更新する</a></p>
        </div>
         @endforeach
    </body>
</html>

