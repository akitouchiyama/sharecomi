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
        <form action="/comics/{{ $comic->id }}" id="form_delete" method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <input type="submit" style="display:none">
            <p class='delete'>[<span onclick="return deleteComic(this);">delete</span>]</p>
        </form>
        <div class="content">
            <h3>{{ $comic->title }}</h3>
            <p class='pictures'>
                @foreach($comic->pictures as $picture)
                    <a href="/comics/pictures/{{ $comic->id }}/edit"><img src="https://sharecomi.s3-ap-northeast-1.amazonaws.com/{{ $picture->image_path }}" width="70" height="100"></a>
                @endforeach
            </p>
            <p>{{ $comic->author }}</p>
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
            <p>{{ $comic->introduction }}</p>
            <p>{{ $comic->comment }}</p>
            <p>{{ $comic->comic_link }}</p>
            <p>user_id : {{ $comic->user_id }}</p>
            <p>{{ $comic->updated_at }}</p>
        </div>
        <div class="button">
            <button onclick="location.href='/reviews/create/{{ $comic->id }}'">レビュー投稿</button>
        </div><br>
        <div class="footer">
            [<a href="/comics">マンガ一覧に戻る</a>]
        </div>
        <script>
        function deleteComic(e) {
            'use strict';
            if(confirm('削除すると復元できません。\n本当に削除しますか?')) {
                document.getElementById('form_delete').submit();
            }
        }
        </script>
    </body>
</html>
