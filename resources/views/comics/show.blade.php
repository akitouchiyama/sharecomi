<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sarecomi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $comic->title }}
        </h1>
        <div class="content">
            <div class="content__comic">
                <h3>infomation</h3>
                <p>{{ $comic->author }}</p>
                <p>{{ $comic->introduction }}</p>
                <p>{{ $comic->comment }}</p>
                <p>{{ $comic->updated_at }}</p>
            </div>
        </div>
        <div class="footer">
            <a href="/">back</a>
        </div>
    </body>
</html>
