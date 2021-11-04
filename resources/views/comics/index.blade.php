<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sarecomi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>マンガ一覧</h1>
        <span>[<a href="/">タイムラインへ</a>]</span>
        <div class="button">
            <button onclick="location.href='/comics/create'">マンガ投稿</button>
        </div>
        <div class='comics'>
            @foreach ($comics as $comic)
                <div class='comic'>
                    <a href='/comics/{{ $comic->id }}'><h2 class='title'>{{ $comic->title }}</h2></a>
                    <p class='author'>{{ $comic->author }}</p>
                    <p class='genres'>
                        @foreach($comic->genres as $genre)
                            <div>
                                <button class='genre' style='display:inline-block;'>{{ $genre->genre_name }}</button>
                            </div>
                        @endforeach
                    </p>
                    <p class='tags'>
                        @foreach($comic->tags as $tag)
                            <div>
                                <span class='tag' style='border: 1px solid;'>{{ $tag->tag_name }}</span>
                            </div>
                        @endforeach
                    </p>
                    <p class='introduction'>{{ $comic->introduction }}</p>
                    <p class='comment'>{{ $comic->comment }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $comics->links() }}
        </div>
    </body>
</html>
