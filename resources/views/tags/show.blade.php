@extends('layouts.app')

@section('content')
        <h1>タグ詳細</h1>
        @if( Auth::id() == $tag->user_id)
        <p class='edit'>[<a href="/tags/{{ $tag->id }}/edit">edit</a>]</p>
        <form action="/tags/{{ $tag->id }}" id="form_delete" method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <input type="submit" style="display:none">
            <p class='delete'>[<span onclick="return deleteTag(this);">delete</span>]</p>
        </form>
        @endif
        <div class="content">
            <h3>{{ $tag->tag_name }}</h3>
            <p>投稿者 : {{ $tag->user->name }}</p>
            <p>{{ $tag->updated_at }}</p>
        </div>
        <div class="footer">
            [<a href="/tags">タグ一覧に戻る</a>]
        </div>
        <script>
        function deleteTag(e) {
            'use strict';
            if(confirm('削除すると復元できません。\n本当に削除しますか?')) {
                document.getElementById('form_delete').submit();
            }
        }
        </script>
@endsection