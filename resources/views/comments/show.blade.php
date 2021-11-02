<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sarecomi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>コメント詳細</h1>
        <p class='edit'>[<a href="/comments/{{ $comment->id }}/edit">edit</a>]</p>
        <form action="/comments/{{ $comment->id }}" id="form_delete" method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <input type="submit" style="display:none">
            <p class='delete'>[<span onclick="return deleteGenre(this);">delete</span>]</p>
        </form>
        <div class="content">
            <h3>{{ $comment->comment }}</h3>
            <p>user_id : {{ $comment->user_id }}</p>
            <p>{{ $comment->updated_at }}</p>
        </div>
        <div class="footer">
            [<a href="/">ホームに戻る</a>]
        </div>
        <script>
        function deleteGenre(e) {
            'use strict';
            if(confirm('削除すると復元できません。\n本当に削除しますか?')) {
                document.getElementById('form_delete').submit();
            }
        }
        </script>
    </body>
</html>
