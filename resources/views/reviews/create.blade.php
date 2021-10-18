<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sarecomi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>マンガ登録</h1>
            <form action="/reviews" method="POST">
                {{ csrf_field() }}
                <div class="title">
                    <h2>タイトル</h2>
                    <input type="text" name="review[title]" placeholder="タイトル" value="{{ old('review.title') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('review.title') }}</p>
                </div>
                <div class="review">
                    <h2>評価</h2>
                    <input type="number" name="review[review]" placeholder="5段階評価" value="{{ old('review.review') }}"/>
                    <p class="review__error" style="color:red">{{ $errors->first('review.review') }}</p>
                </div>                
                <div class="body">
                    <h2>レビュー</h2>
                    <textarea name="review[body]" placeholder="レビュー">{{ old('review.body') }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('review.body') }}</p>
                </div>
                <div class="comic_id">
                    <p>コミックid(仮)</p>
                    <input type="number" name="review[comic_id]" placeholder="コミックid" value="{{ old('review.comic_id') }}"/>
                    <p class="comic_id__error" style="color:red">{{ $errors->first('review.comic_id') }}</p>
                </div><br>
                <div class="user_id">
                    <p>ユーザーid(仮)</p>
                    <input type="number" name="review[user_id]" placeholder="ユーザーid" value="{{ old('review.user_id') }}"/>
                    <p class="user_id__error" style="color:red">{{ $errors->first('review.user_id') }}</p>
                </div><br>
                <div class="submit">
                    <input type="submit" value="登録"/>
                </div>
            </form>
            <div class="footer">
                [<a href="/">back</a>]
            </div>
    </body>
</html>
