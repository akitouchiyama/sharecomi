<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sarecomi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>タイムライン</h1>
        <p class='create'>[<a href='/reviews/create'>create</a>]</p>
        <div class='reviews'>
            @foreach ($reviews as $review)
                <div class='review'>
                    <div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
                        <h4>{{ $review->comic->title }}</h4>
                        <small>{{ $review->comic->author }}</small><br>
                        <small>{{ $review->comic->introduction }}</small><br>
                    </div>
                    <a href='/reviews/{{ $review->id }}'><h2 class='title'>{{ $review->title }}</h2></a>
                    <p class='review'>5段階評価 : {{ $review->review }}</p>
                    <p class='body'>{{ $review->body }}</p>
                    <small>{{ $review->updated_at }}</small>
                    <hr>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $reviews->links() }};
        </div>
    </body>
</html>
