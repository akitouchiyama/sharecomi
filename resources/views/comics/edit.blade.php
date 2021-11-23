@extends('layouts.app')

@section('content')
        <h1>マンガ編集</h1>
        <div class="button">
            <p>[<a href="/comics/pictures/{{ $comic->id }}/edit">マンガ画像編集</a>]</p>
        </div><br>
        <form action="/comics/{{ $comic->id }}" method="POST" id="comic_update">
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
            </div>
            <div class="link">
                <h2>商品リンク</h2>
                <p style="color:red">※画像を貼る場合は、Amazonや楽天の商品リンクを貼らないと著作権侵害になる恐れがあります。</p>
                <textarea name="comic[comic_link]" placeholder="リンク">{{ old('comic.comic_link') ? : $comic->comic_link  }}</textarea>
            </div>
            <div class="genres">
                <h2>ジャンル</h2>
                <div class="checked_genre" style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
                    <p>選択中のジャンル</p>
                    <ul>
                        @foreach($comic->genres as $genre)
                            <li>{{ $genre->genre_name }}</li>
                        @endforeach
                    </ul>
                </div>
                @foreach($genres as $genre)
                    <label>
                        {{-- valueを'$genreのid'に、nameを'配列名[]'に --}}
                        <input type="checkbox" value="{{ old('genres.id') ? : $genre->id }}" name="genres_array[]">
                            {{$genre->genre_name}}
                        </input>
                    </label>
                @endforeach
            </div>
            <h2>タグ</h2>
                <div class="checked_tag" style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
                    <p>選択中のタグ</p>
                    <ul>
                        @foreach($comic->tags as $tag)
                            <li>{{ $tag->tag_name }}</li>
                        @endforeach
                    </ul>
                </div>
                @foreach($tags as $tag)
                    <label>
                        {{-- valueを'$tagのid'に、nameを'配列名[]'に --}}
                        <input type="checkbox" value="{{ old('tags.id') ? : $tag->id }}" name="tags_array[]">
                            {{ $tag->tag_name }}
                        </input>
                    </label>
                @endforeach
            </div>
        </form>
        <div class="submit">
                <input type="submit" value="更新" form="comic_update"/>
            </div>
        <div class="footer">
            [<a href="/comics/{{ $comic->id }}">back</a>]
        </div>

@endsection