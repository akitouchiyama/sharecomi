<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sarecomi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>マンガ画像アップロード</h1><br>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:red">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/comics/pictures/{{ $comic->id }}" method="post" enctype="multipart/form-data">
            <!-- アップロードフォームの作成 -->
            <input type="file" name="image">
            {{ csrf_field() }}
            <input type="submit" value="アップロード">
        </form>
        <br><hr>
        <div class="footer">
            [<a href="/comics/{{ $comic->id }}">マンガ画像を設定しない</a>]
        </div>
    </body>
</html>
