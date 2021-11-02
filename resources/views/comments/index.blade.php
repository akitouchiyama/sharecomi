<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sarecomi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>コメント</h1>
        <span>[<a href="/">タイムラインへ</a>]</span>
        <div class='genres'>
            @foreach ($comments as $comment)
                <div class='comment'>
                    <a href='/comments/{{ $comment->id }}'><p class='comment_name'>{{ $comment->comment }}</p></a>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $comments->links() }}
        </div>
    </body>
</html>
