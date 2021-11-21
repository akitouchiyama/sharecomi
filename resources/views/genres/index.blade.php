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
                <div class='genre' style='display:flex; flex-wrap: wrap;'>
                    <div class='genre_picture'>
                        @foreach($genre->pictures as $picture)
                            <a href="{{ $genre->genre_link }}"><img src="https://sharecomi.s3-ap-northeast-1.amazonaws.com/{{ $picture->image_path }}" width="70" height="100"></a>
                        @endforeach
                    </div>
                    <div class='genre_name' style='width: 20%;'>
                        <a href='/genres/{{ $genre->id }}'><p class='genre_name'>{{ $genre->genre_name }}</p></a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $genres->links() }}
        </div>
    </body>
</html>
