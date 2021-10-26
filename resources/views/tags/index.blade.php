<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sarecomi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>タグ</h1>
        <span>[<a href="/">タイムラインへ</a>]</span>
        <div class="button">
            <button onclick="location.href='/tags/create'">タグ作成</button>
        </div>
        <div class='tags'>
            @foreach ($tags as $tag)
                <div class='tag'>
                    <a href='/tags/{{ $tag->id }}'><p class='tag_name'>{{ $tag->tag_name }}</p></a>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $tags->links() }}
        </div>
    </body>
</html>
