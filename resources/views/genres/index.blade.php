<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sarecomi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ジャンル</h1>
        <span>[<a href="/">タイムラインへ</a>]</span>
        <div class="button">
            <button onclick="location.href='/genres/create'">ジャンル作成</button>
        </div>
        <div class='genres'>
            @foreach ($genres as $genre)
                <div class='genre'>
                    <a href='/genres/{{ $genre->id }}'><p class='genre_name'>{{ $genre->genre_name }}</p></a>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $genres->links() }}
        </div>
    </body>
</html>
