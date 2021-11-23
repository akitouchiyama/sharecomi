@extends('layouts.app')

@section('content')
        <h1>タグ</h1>
        <div class="button">
            <button onclick="location.href='/tags/create'">タグ作成</button>
        </div>
        <div class='tags'>
            @foreach ($tags as $tag)
                <div class='tag'>
                    <a href='/tags/{{ $tag->id }}'><p class='tag_name'>{{ $tag->tag_name }}</p></a>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $tags->links() }}
        </div>
@endsection