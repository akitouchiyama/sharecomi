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
        <span>[<a href='/comics'>マンガ一覧</a>]</span><br>
        <span>[<a href='/genres'>ジャンル一覧</a>]</span>
        <span>[<a href='/tags'>タグ一覧</a>]</span>
        <div class='reviews'>
            @foreach ($reviews as $review)
                <div class='comic' style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
                    <a href="/comics/{{ $review->comic->id }}"><h4>{{ $review->comic->title }}</h4></a>
                    <p>{{ $review->comic->author }}</p>
                    @if($review->comic->comic_link)
                        <a href="{{ $review->comic->comic_link }}">商品リンク</a>
                    @endif
                    <p class='average'>
                            @if ($review->comic->total_number == 0 && $review->comic->total_review == 0)
                                @php
                                    echo '平均評価: ' . 0;
                                @endphp
                            @else
                                @php
                                    echo '平均評価: ' . round($review->comic->total_review / $review->comic->total_number, 2);
                                @endphp
                            @endif
                    </p>
                    <p>
                        @foreach($review->comic->genres as $genre)
                            <div>
                                <span class='genre' style='border: 2px solid;'>{{ $genre->genre_name }}</span>
                            </div>
                        @endforeach
                    </p>
                    <p>
                        @foreach($review->comic->tags as $tag)
                            <div>
                                <span class='tag' style='border: 1px solid;'>#{{ $tag->tag_name }}</span>
                            </div>
                        @endforeach
                    </p>
                    <small>あらすじ:</small><br>
                    <small>{{ $review->comic->introduction }}</small><br>
                </div>
                <div class='review'>
                    <a href='/reviews/{{ $review->id }}'><h2 class='title'>{{ $review->title }}</h2></a>
                    <p class='review'>5段階評価 : {{ $review->review }}</p>
                    <p class='body'>{{ $review->body }}</p>
                    <small>{{ $review->updated_at }}</small>
                    <hr><br>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $reviews->links() }}
        </div>
    </body>
</html>
