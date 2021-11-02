<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sarecomi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>コメント作成</h1>
        <div class="review">
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
            <form action="/comments" method="POST">
                {{ csrf_field() }}
                <div class="comment">
                    <h2>コメント</h2>
                    <input type="text" name="comment[comment]" placeholder="コメント" value="{{ old('comment.comment') }}"/>
                    <p class="comment__error" style="color:red">{{ $errors->first('comment.comment') }}</p>
                </div>
                <div class="user_id">
                    <p>ユーザーid(仮)</p>
                    <input type="number" name="comment[user_id]" placeholder="ユーザーid" value="{{ old('comment.user_id') }}"/>
                    <p class="user_id__error" style="color:red">{{ $errors->first('comment.user_id') }}</p>
                </div>
                <div class="review_id" style="display:none">
                    <p>レビューid(仮)</p>
                    <input type="number" name="comment[review_id]" placeholder="レビューid" value="{{ $review->id }}"/>
                    <p class="review_id__error" style="color:red">{{ $errors->first('comment.review_id') }}</p>
                </div><br>
                <div class="submit">
                    <input type="submit" value="登録"/>
                </div>
            </form>
            <div class="footer">
                [<a href="/">タイムラインに戻る</a>]
            </div>
    </body>
</html>
