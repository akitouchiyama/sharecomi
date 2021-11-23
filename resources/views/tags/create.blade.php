@extends('layouts.app')

@section('content')
        <h1>タグ作成</h1>
            <form action="/tags" method="POST">
                {{ csrf_field() }}
                <div class="tag_name">
                    <h2>タグ名</h2>
                    <input type="text" name="tag[tag_name]" placeholder="タグ名" value="{{ old('tag.tag_name') }}"/>
                    <p class="tag_name__error" style="color:red">{{ $errors->first('tag.tag_name') }}</p>
                </div>
                <div class="user_id" style="display:none">
                    <p>ユーザーid(仮)</p>
                    <input type="number" name="tag[user_id]" placeholder="ユーザーid" value="{{ Auth::id() }}"/>
                    <p class="user_id__error" style="color:red">{{ $errors->first('tag.user_id') }}</p>
                </div><br>
                <div class="submit">
                    <input type="submit" value="登録"/>
                </div>
            </form>
            <div class="footer">
                [<a href="/tags">タグ一覧に戻る</a>]
            </div>
@endsection