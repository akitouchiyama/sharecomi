<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sarecomi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ジャンル作成</h1>
            <form action="/genres" method="POST">
                {{ csrf_field() }}
                <div class="genre_name">
                    <h2>ジャンル名</h2>
                    <input type="text" name="genre[genre_name]" placeholder="ジャンル名" value="{{ old('genre.genre_name') }}"/>
                    <p class="genre_name__error" style="color:red">{{ $errors->first('genre.genre_name') }}</p>
                </div>
                <div class="genre_link">
                    <h2>商品リンク</h2>
                    <p style="color:red">※画像を貼る場合は、Amazonや楽天の商品リンクを貼らないと著作権侵害になる恐れがあります。</p>
                    <textarea name="genre[genre_link]" placeholder="リンク" style='resize: horizontal;width:500px;height:200px;'>{{ old('genre.genre_link') }}</textarea>
                </div>
                <div class="user_id">
                    <p>ユーザーid(仮)</p>
                    <input type="number" name="genre[user_id]" placeholder="ユーザーid" value="{{ old('genre.user_id') }}"/>
                    <p class="user_id__error" style="color:red">{{ $errors->first('genre.user_id') }}</p>
                </div><br>
                <div class="submit">
                    <input type="submit" value="登録"/>
                </div>
            </form>
            <div class="footer">
                [<a href="/genres">ジャンル一覧に戻る</a>]
            </div>
    </body>
</html>