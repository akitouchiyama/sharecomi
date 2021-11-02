<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sarecomi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>レビュー詳細</h1>
        <p class='edit'>[<a href="/reviews/{{ $review->id }}/edit">edit</a>]</p>
        <form action="/reviews/{{ $review->id }}" id="form_delete" method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <input type="submit" style="display:none">
            <p class='delete'>[<span onclick="return deleteReview(this);">delete</span>]</p>
        </form>
        <div class="content">
            <div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
                <h4>{{ $review->comic->title }}</h4>
                <small>{{ $review->comic->author }}</small><br>
                <small>
                    @foreach($review->comic->genres as $genre)
                        <div>
                            <button class='genre'>{{ $genre->genre_name }}</button>
                        </div>
                    @endforeach
                </small><br>
                <small>
                    @foreach($review->comic->tags as $tag)
                        <div>
                            <span class='tag' style='border: 1px solid;'>{{ $tag->tag_name }}</span>
                        </div>
                    @endforeach
                </small>
                <small>{{ $review->comic->introduction }}</small><br>
            </div>
            <h4>{{ $review->title }}</h4>
            <p>5段階評価 : {{ $review->review }}</p>
            <p>{{ $review->body }}</p>
            <p>user_id : {{ $review->user_id }}</p>
            <small>{{ $review->updated_at }}</small>
        </div>
        <br><hr>

        <h3>コメント</h3>
        <div class="comments">
            @foreach($review->comments as $comment)
                <div class="comment" style='border: 1px solid;border-radius: 5px;'>
                    <span>{{ $comment->user_id }}</span><br>
                    <a href="/comments/{{ $comment->id }}"><span>{{ $comment->comment }}</span></a><br>
                    <small>{{ $comment->updated_at }}</small><br>
                </div><br>
            @endforeach
            <div class="button">
                <button onclick="location.href='/comments/create/{{ $review->id }}'">コメント投稿</button>
            </div><br>
        </div><hr>

        <div class="footer">
            [<a href="/">back</a>]
        </div>
        <script>
        function deleteReview(e) {
            'use strict';
            if(confirm('削除すると復元できません。\n本当に削除しますか?')) {
                document.getElementById('form_delete').submit();
            }
        }
        </script>
    </body>
</html>
