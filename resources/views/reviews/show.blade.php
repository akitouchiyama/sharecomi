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
                <small>{{ $review->comic->introduction }}</small><br>
            </div>
            <h4>{{ $review->title }}</h4>
            <p>5段階評価 : {{ $review->review }}</p>
            <p>{{ $review->body }}</p>
            <p>user_id : {{ $review->user_id }}</p>
            <small>{{ $review->updated_at }}</small>
        </div>
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
