<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sarecomi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ジャンル詳細</h1>
        <p class='edit'>[<a href="/genres/{{ $genre->id }}/edit">edit</a>]</p>
        <form action="/genres/{{ $genre->id }}" id="form_delete" method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <input type="submit" style="display:none">
            <p class='delete'>[<span onclick="return deleteGenre(this);">delete</span>]</p>
        </form>
        <div class="content">
            <h3>{{ $genre->genre_name }}</h3>
            @foreach($genre->pictures as $picture)
                <a href="{{ $genre->genre_link }}"><img src="https://sharecomi.s3-ap-northeast-1.amazonaws.com/{{ $picture->image_path }}" width="70" height="100"></a>
            @endforeach
            <p>user_id : {{ $genre->user_id }}</p>
            <p>{{ $genre->updated_at }}</p>
        </div>
        <div class="footer">
            [<a href="/genres">ジャンル一覧に戻る</a>]
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
