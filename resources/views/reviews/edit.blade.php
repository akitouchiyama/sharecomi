<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sarecomi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>レビュー編集</h1>
        <div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
            <h3>{{ $review->comic->title }}</h3>
            <p>{{ $review->comic->author }}</p>
            <p>{{ $review->comic->introduction }}</p>
        </div>
            <form action="/reviews/{{ $review->id }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <div class="title">
                    <h2>タイトル</h2>
                    <input type="text" name="review[title]" placeholder="タイトル" value="{{ old('review.title') ? : $review->title  }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('review.title') }}</p>
                </div>
                <div class="review">
                    <h2>5段階評価</h2>
                    <input type="number" name="review[review]" placeholder="5段階評価" value="{{ old('review.review') ? : $review->review  }}"/>
                    <p class="review__error" style="color:red">{{ $errors->first('review.review') }}</p>
                </div>
                <div class="body">
                    <h2>レビュー</h2>
                    <textarea name="review[body]" placeholder="レビュー">{{ old('review.body') ? : $review->body  }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('review.body') }}</p>
                </div>
                <div class="user_id">
                    <p>ユーザーid(仮)</p>
                    <input type="number" name="review[user_id]" placeholder="ユーザーid" value="{{ old('review.user_id') ? : $review->user_id  }}"/>
                    <p class="user_id__error" style="color:red">{{ $errors->first('review.user_id') }}</p>
                </div>
                <div class="comic_id" style="display:none">
                    <p>マンガid(仮)</p>
                    <input type="number" name="review[comic_id]" placeholder="マンガid" value="{{ old('review.comic_id') ? : $review->comic_id  }}"/>
                    <p class="comic_id__error" style="color:red">{{ $errors->first('review.comic_id') }}</p>
                </div>
                <div class="id" style="display:none">
                    <p>id</p>
                    <input type="number" name="review[id]" placeholder="id" value="{{ old('review.id') ? : $review->id  }}"/>
                </div><br>
                <div class="submit">
                    <input type="submit" value="更新"/>
                </div>
            </form>
            <div class="footer">
                [<a href="/reviews/{{ $review->id }}">back</a>]
            </div>
    </body>
</html>
