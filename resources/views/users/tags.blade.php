@extends('layouts.app')

@section('content')
        <h1>{{ Auth::user()->name }} 投稿タグ</h1>
        <div class="button">
            <button onclick="location.href='/genres/create'">タグ作成</button>
        </div>
        <div class='own_tags'>
            @foreach ($own_tags as $tag)
                <div class='tag'>
                    <a href='/tags/{{ $tag->id }}'><p class='tag_name'>{{ $tag->tag_name }}</p></a>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $own_tags->links() }}
        </div>
@endsection