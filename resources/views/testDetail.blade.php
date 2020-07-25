<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>testview　update</title>
    </head>
    <body>
        <form action="{{ route('testUpdate',$target->id) }}" method="POST">
            @csrf
            <input type="text" name="comment" value="{{ $target->comment }}" required>
            <input type="submit" value="修正">
        </form>
    </body>
</html>

