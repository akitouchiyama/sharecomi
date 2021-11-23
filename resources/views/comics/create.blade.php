@extends('layouts.app')

@section('content')
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
                <div class="tags">
                    <h2>タグ</h2>
                    @foreach($tags as $tag)

                        <label>
                            {{-- valueを'$tagのid'に、nameを'配列名[]'に --}}
                            <input type="checkbox" value="{{ $tag->id }}" name="tags_array[]">
                                {{$tag->tag_name}}
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
                <div class="link">
                    <h2>商品リンク</h2>
                    <p style="color:red">※画像を貼る場合は、Amazonや楽天の商品リンクを貼らないと著作権侵害になる恐れがあります。</p>
                    <input type="text" name="comic[comic_link]" placeholder="リンク" value="{{ old('comic.link') }}"/>
                </div>
                <div class="user_id" style="display:none">
                    <p>ユーザーid(仮)</p>
                    <input type="number" name="comic[user_id]" placeholder="ユーザーid" value="{{ Auth::id() }}"/>
                    <p class="user_id__error" style="color:red">{{ $errors->first('comic.user_id') }}</p>
                </div><br>
                <div class="submit">
                    <input type="submit" value="登録"/>
                </div>
            </form>
            <div class="footer">
                [<a href="/comics">back</a>]
            </div>
@endsection
