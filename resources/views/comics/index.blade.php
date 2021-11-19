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
                    <p class='pictures'>
                        @foreach($comic->pictures as $picture)
                            <a href="/comics/pictures/{{ $comic->id }}/edit"><img src="https://sharecomi.s3-ap-northeast-1.amazonaws.com/{{ $picture->image_path }}" width="70" height="100"></a>
                        @endforeach
                    </p>
                    <p class='author'>{{ $comic->author }}</p>
                    @if($comic->comic_link)
                        <a href="{{ $comic->comic_link }}">商品リンク</a>
                    @endif
                    <p class='average'>
                            @if ($comic->total_number == 0 && $comic->total_review == 0)
                                @php
                                    echo '平均評価: ' . 0;
                                @endphp
                            @else
                                @php
                                    echo '平均評価: ' . round($comic->total_review / $comic->total_number, 2);
                                @endphp
                            @endif
                    </p>
                    <p class='genres'>
                        @foreach($comic->genres as $genre)
                            <div>
                                <span class='genre' style='border: 2px solid;'>{{ $genre->genre_name }}</span>
                            </div>
                        @endforeach
                    </p>
                    <p class='tags'>
                        @foreach($comic->tags as $tag)
                            <div>
                                <span class='tag' style='border: 1px solid;'>#{{ $tag->tag_name }}</span>
                            </div>
                        @endforeach
                    </p>
                    <p class='introduction'>{{ $comic->introduction }}</p>
                    <p class='comment'>{{ $comic->comment }}</p>
                    <p class='comic_link'>{{ $comic->comic_link }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $comics->links() }}
        </div>
    </body>
</html>
