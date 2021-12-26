@extends('layouts.app')

@section('content')
    <h1 style="text-align: center">マイページ</h1>
    <br><br>
    <div class="own_profile" style="text-align: center">
        <h2>ログインユーザー情報</h2>
        <h4>{{ $user->name }}</h4>
        <p>{{ $user->email }}</p>
        <p>{{ $user->updated_at }}</p>
    </div>
    <br><br>
    <div class="likes_comic" style="text-align:center">
        <h2>お気に入りマンガ</h2>
    </div><br><br>
    <div style="text-align:center">
        <a href="/users/{{ $user->id }}/comics" style="display:inline-block">投稿マンガ</a>&nbsp;&nbsp;
        <a href="/users/{{ $user->id }}/reviews" style="display:inline-block">投稿レビュー</a>&nbsp;&nbsp;
        <a href="/users/{{ $user->id }}/genres" style="display:inline-block">投稿ジャンル</a>&nbsp;&nbsp;
        <a href="/users/{{ $user->id }}/tags" style="display:inline-block">投稿タグ</a>&nbsp;&nbsp;
    </div>
@endsection