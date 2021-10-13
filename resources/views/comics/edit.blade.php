<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sarecomi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>マンガ編集</h1>
            <form action="/comics/{{ $comic->id }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <div class="title">
                    <h2>タイトル</h2>
                    <input type="text" name="comic[title]" placeholder="タイトル" value="{{ old('comic.title') ? : $comic->title  }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('comic.title') }}</p>
                </div>
                <div class="author">
                    <h2>作者</h2>
                    <input type="text" name="comic[author]" placeholder="作者" value="{{ old('comic.author') ? : $comic->author  }}"/>
                    <p class="author__error" style="color:red">{{ $errors->first('comic.author') }}</p>
                </div>
                <div class="introduction">
                    <h2>あらすじ</h2>
                    <textarea name="comic[introduction]" placeholder="あらすじ">{{ old('comic.introduction') ? : $comic->introduction  }}</textarea>
                    <p class="introduction__error" style="color:red">{{ $errors->first('comic.introduction') }}</p>
                </div>
                <div class="comment">
                    <h2>コメント</h2>
                    <textarea name="comic[comment]" placeholder="コメント">{{ old('comic.comment') ? : $comic->comment  }}</textarea>
                    <p class="comment__error" style="color:red">{{ $errors->first('comic.comment') }}</p>
                </div>
                <div class="user_id">
                    <p>ユーザーid(仮)</p>
                    <input type="number" name="comic[user_id]" placeholder="ユーザーid" value="{{ old('comic.user_id') ? : $comic->user_id  }}"/>
                    <p class="user_id__error" style="color:red">{{ $errors->first('comic.user_id') }}</p>
                </div><br>
                <div class="submit">
                    <input type="submit" value="更新"/>
                </div>
            </form>
            <div class="footer">
                [<a href="/comics/{{ $comic->id }}">back</a>]
            </div>
    </body>
</html>
