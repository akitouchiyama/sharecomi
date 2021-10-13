<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sarecomi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>マンガ詳細</h1>
        <p class='edit'>[<a href="/comics/{{ $comic->id }}/edit">edit</a>]</p>
        <div class="content">
            <h3>{{ $comic->title }}</h3>
            <p>{{ $comic->author }}</p>
            <p>{{ $comic->introduction }}</p>
            <p>{{ $comic->comment }}</p>
            <p>user_id : {{ $comic->user_id }}</p>
            <p>{{ $comic->updated_at }}</p>
        </div>
        <div class="footer">
            [<a href="/">back</a>]
        </div>
    </body>
</html>
