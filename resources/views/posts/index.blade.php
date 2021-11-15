<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sarecomi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>画像一覧</h1>
        @foreach($posts as $post)
            @if ($post->image_path)
                <!-- 画像を表示 -->
                <img src="{{ $post->image_path }}" width="70" height="100">
            @endif
        @endforeach
    </body>
</html>