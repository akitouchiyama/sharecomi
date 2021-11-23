@extends('layouts.app')

@section('content')
    <h1>マンガ画像アップロード</h1><br>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:red">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/comics/pictures/{{ $comic->id }}" method="post" enctype="multipart/form-data">
        <!-- アップロードフォームの作成 -->
        <input type="file" name="image">
        {{ csrf_field() }}
        <input type="submit" value="アップロード">
    </form>
    <p style="color:red">※画像はamazonや楽天のものを使ってください。著作権侵害になる恐れがあります。</p>
    <br><hr>
    <div class="footer">
        [<a href="/comics/{{ $comic->id }}">マンガ画像を設定しない</a>]
    </div>
@endsection