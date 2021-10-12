<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Sharecomic</h1>
        <p class='create'>[<a href='/posts/create'>create</a>]</p>
        <div class=''>
            @foreach ($manga as $manga)
                <div class='manga'>
                    <a href='/manga/{{ $manga->id }}'><h2 class='title'>{{ $manga->title }}</h2></a>
                    <p class='author'>{{ $manga->author }}</p>
                    <p class='introduction'>{{ $manga->introduction }}</p>
                    <p class='comment'>{{ $manga->comment }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>
