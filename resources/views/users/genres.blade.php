@extends('layouts.app')

@section('content')
        <h1>{{ Auth::user()->name }} 投稿ジャンル</h1>
        <div class="button">
            <button onclick="location.href='/genres/create'">ジャンル作成</button>
        </div>
        <div class='own_genres'>
            @foreach ($own_genres as $genre)
                <div class='genre' style='display:flex; flex-wrap: wrap;'>
                    <div class='genre_picture'>
                        @if($genre->picture)
                            <a href="{{ $genre->genre_link }}"><img src="https://sharecomi.s3-ap-northeast-1.amazonaws.com/{{ $genre->picture->image_path }}" width="70" height="100"></a>
                        @endif
                    </div>
                    <div class='genre_name' style='width: 20%;'>
                        <a href='/genres/{{ $genre->id }}'><p class='genre_name'>{{ $genre->genre_name }}</p></a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $own_genres->links() }}
        </div>
@endsection