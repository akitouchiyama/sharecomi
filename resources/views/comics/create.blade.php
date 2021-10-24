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
            <form action="/comics" method="POST">
                {{ csrf_field() }}
                <div class="title">
                    <h2>タイトル</h2>
                    <input type="text" name="comic[title]" placeholder="タイトル" value="{{ old('comic.title') }}"/>
                    <p class="title__error" style="color:red">{{ $errors->first('comic.title') }}</p>
                </div>
                <div class="author">
                    <h2>作者</h2>
                    <input type="text" name="comic[author]" placeholder="作者" value="{{ old('comic.author') }}"/>
                    <p class="author__error" style="color:red">{{ $errors->first('comic.author') }}</p>
                </div>
                <div class="genres">
                    <h2>ジャンル</h2>
                    @foreach($genres as $genre)

                        <label>
                            {{-- valueを'$genreのid'に、nameを'配列名[]'に --}}
                            <input type="checkbox" value="{{ $genre->id }}" name="genres_array[]">
                                {{$genre->genre_name}}
                            </input>
                        </label>

                    @endforeach
                </div>
                <div class="introduction">
                    <h2>あらすじ</h2>
                    <textarea name="comic[introduction]" placeholder="あらすじ">{{ old('comic.introduction') }}</textarea>
                    <p class="introduction__error" style="color:red">{{ $errors->first('comic.introduction') }}</p>
                </div>
                <div class="comment">
                    <h2>コメント</h2>
                    <textarea name="comic[comment]" placeholder="コメント">{{ old('comic.comment') }}</textarea>
                    <p class="comment__error" style="color:red">{{ $errors->first('comic.comment') }}</p>
                </div>
                <div class="user_id">
                    <p>ユーザーid(仮)</p>
                    <input type="number" name="comic[user_id]" placeholder="ユーザーid" value="{{ old('comic.user_id') }}"/>
                    <p class="user_id__error" style="color:red">{{ $errors->first('comic.user_id') }}</p>
                </div><br>
                <div class="submit">
                    <input type="submit" value="登録"/>
                </div>
            </form>
            <div class="footer">
                [<a href="/comics">back</a>]
            </div>
    </body>
</html>
