<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sarecomi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>マンガ画像アップロード</h1>
        <form action="/comics/pictures/{{ $comic->id }}" method="post" enctype="multipart/form-data">
            <!-- アップロードフォームの作成 -->
            <input type="file" name="image">
            {{ csrf_field() }}
            <input type="submit" value="アップロード">
        </form>
        <div class="footer">
            [<a href="/comics/{{ $comic->id }}">画像を設定しない</a>]
        </div>
    </body>
</html>
