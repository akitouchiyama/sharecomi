@extends('layouts.app')

@section('content')
        <h1>マンガ一覧</h1>
        <div class="button">
            <button onclick="location.href='/comics/create'">マンガ投稿</button>
        </div><br>
        <a href="{{ url('/genres') }}">ジャンル一覧へ&nbsp;&nbsp;&nbsp;&nbsp;</a>
        <a href="{{ url('/tags') }}">タグ一覧へ&nbsp;&nbsp;&nbsp;&nbsp;</a><br><br>
        <div class="container-fluid">
            <div class="row">
                <!-- 検索フォーム -->
                <form method="get" action="" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="keyword" class="form-control" value="{{$keyword}}" placeholder="タイトルか作者名">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="検索" class="btn btn-info" style="margin-left: 15px; color:white;">
                    </div>
                </form>

                <div class="col-sm-8" style="text-align:right;">
                    <div class="paginate">
                        {{ $searchs->appends(Request::only('keyword'))->links() }}
                    </div>
                </div>
            </div><!--/.row-->
        </div><!--/.container-fluid-->
        </div><br>

        <!--テーブル-->
        <div class="table-responsive">
        <table class="table" style="width: 1000px; max-width: 0 auto;">
            <tr class="table-info">
                <th scope="col" width="10%">#</th>
                <th scope="col" width="15%">タイトル</th>
                <th scope="col" width="30%">作者</th>
                <th scope="col" width="15%">投稿者</th>
                <th scope="col" width="30%">更新日</th>
            </tr>

            @foreach($searchs as $comic)
            <tr>
                <th scope="row">{{ $comic->id }}</th>
                <td><a href='/comics/{{ $comic->id }}'>{{ $comic->title }}</a></td>
                <td>{{ $comic->author }}</td>
                <td>{{ $comic->user_id }}</td>
                <td>{{ $comic->updated_at }}</td>
            </tr>
            @endforeach
        </table>
        </div>
        <!--/テーブル-->

        <!-- ページネーション -->
        {!! $searchs->appends(['keyword'=>$keyword])->render() !!}<br><br>

        <div class='comics'>
            @foreach ($comics as $comic)
                <div class='comic'>
                    <a href='/comics/{{ $comic->id }}'><h2 class='title'>{{ $comic->title }}</h2></a>
                    <p class='pictures'>
                        @foreach($comic->pictures as $picture)
                            <a href="/comics/pictures/{{ $comic->id }}/edit"><img src="https://sharecomi.s3-ap-northeast-1.amazonaws.com/{{ $picture->image_path }}" width="70" height="100"></a>
                        @endforeach
                    </p>
                    <p class='author'>{{ $comic->author }}</p>
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
                    @if($comic->comic_link)
                        <a href="{{ $comic->comic_link }}">商品リンク</a>
                    @endif
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
                    <p class='introduction'>{{ $comic->introduction }}</p>
                    <p class='comment'>{{ $comic->comment }}</p>
                    <p class="user_name">投稿者 : {{ $comic->user->name }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $comics->links() }}
        </div>
@endsection