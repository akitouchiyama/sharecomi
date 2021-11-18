<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sarecomi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>マンガ画像編集</h1>
            <p>※マンガ削除したい場合は画像をクリック</p>
            @foreach($comic->pictures as $picture)
                <form action="/comics/pictures/{{ $picture->id }}" id="form_delete_{{ $picture->id }}" method="post" style="display:inline">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <input type="submit" style="display:none">
                    <span onclick="return deletePicture(this);"><img src="https://sharecomi.s3-ap-northeast-1.amazonaws.com/{{ $picture->image_path }}" width="70" height="100"></span>
                </form>
            @endforeach
        <h3>マンガ画像追加</h3>
        <form action="/comics/pictures/{{ $comic->id }}" method="post" enctype="multipart/form-data">
            <!-- アップロードフォームの作成 -->
            <input type="file" name="image">
            {{ csrf_field() }}
            @method('PUT')
            <input type="submit" value="アップロード">
        </form>
        <br>
        [<a href="/comics/{{ $comic->id }}">マンガ詳細に戻る</a>]<hr>

        <div class="footer">
            [<a href="/comics/">マンガ一覧に戻る</a>]
        </div>

        <script>
        function deletePicture(e) {
            'use strict';
            if(confirm('削除すると復元できません。\n本当に削除しますか?')) {
                document.getElementById('form_delete_{{ $picture->id }}').submit();
            }
        }
        </script>
    </body>
</html>
