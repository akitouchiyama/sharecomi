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
        <p class='create'>[<a href='/comics/create'>create</a>]</p>
        <div class='comics'>
            @foreach ($comics as $comic)
                <div class='comic'>
                    <a href='/comics/{{ $comic->id }}'><h2 class='title'>{{ $comic->title }}</h2></a>
                    <p class='author'>{{ $comic->author }}</p>
                    <p class='introduction'>{{ $comic->introduction }}</p>
                    <p class='comment'>{{ $comic->comment }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $comics->links() }};
        </div>
    </body>
</html>
