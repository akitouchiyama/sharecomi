@extends('layouts.app')

@section('content')
    <h2>{{ Auth::user()->name }} 投稿マンガ</h2>
    <div class="button">
        <button onclick="location.href='/comics/create'">マンガ作成</button>
    </div>
    <div class="own_comics">
        @foreach($own_comics as $comic)
            <div class="own_comic" style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
                <small>投稿者 : {{ $comic->user->name }}</small>
                <h4><a href="/comics/{{ $comic->id }}">{{ $comic->title }}</a></h4>
                <p class='pictures'>
                    @foreach($comic->pictures as $picture)
                        <a href="/comics/pictures/{{ $comic->id }}/edit"><img src="https://sharecomi.s3-ap-northeast-1.amazonaws.com/{{ $picture->image_path }}" width="70" height="100"></a>
                    @endforeach
                </p>
                <p>{{ $comic->author }}</p>
                <p class='average'>
                    @if ($comic->total_number == 0 || $comic->total_review == 0)
                        @php
                            echo '平均評価: ' . 0;
                        @endphp
                    @else
                        @php
                            echo '平均評価: ' . round($comic->total_review / $comic->total_number, 2);
                        @endphp
                    @endif
                </p>
                <p class='genres'>
                    @foreach($comic->genres as $genre)
                        <div>
                            <span class='genre' style='border: 2px solid;'>{{ $genre->genre_name }}</span>
                        </div>
                    @endforeach
                </p>
                <p class='tags'>
                    @foreach($comic->tags as $tag)
                        <div>
                            <span class='tag' style='border: 1px solid;'>#{{ $tag->tag_name }}</span>
                        </div>
                    @endforeach
                </p>
                <p>{{ $comic->introduction }}</p>
                <p>投稿者コメント : {{ $comic->comment }}</p>
                    @if($comic->comic_link)
                        <a href="{{ $comic->comic_link }}">商品リンク</a>
                    @endif
                <p>{{ $comic->updated_at }}</p>
            </div>
        @endforeach

        <div class='paginate'>
            {{ $own_comics->links() }}
        </div>
    </div>

@endsection