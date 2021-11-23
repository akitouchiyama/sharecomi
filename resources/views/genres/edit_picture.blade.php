@extends('layouts.app')

@section('content')
        <h1>ジャンル画像編集</h1>
        @if($genre->picture)
            <h3>ジャンル画像削除</h3>
            <p>※ジャンル画像を削除したい場合は画像をクリック</p>
            <form action="/genres/{{ $genre->id }}/picture/{{ $genre->picture->id }}" id="form_delete_{{ $genre->picture->id }}" method="post" style="display:inline">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <input type="submit" style="display:none">
                <span onclick="return deletePicture(this);"><img src="https://sharecomi.s3-ap-northeast-1.amazonaws.com/{{ $genre->picture->image_path }}" width="70" height="100"></span>
            </form>
        @else
            <h3>ジャンル画像アップロード</h3>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color:red">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/genres/picture/{{ $genre->id }}" method="post" enctype="multipart/form-data">
                <!-- アップロードフォームの作成 -->
                <input type="file" name="image">
                {{ csrf_field() }}
                @method('PUT')
                <input type="submit" value="アップロード">
            </form>
            <p style="color:red">※画像はamazonや楽天のものかフリー素材を使ってください。著作権侵害になる恐れがあります。</p>
        @endif
        <br>
        [<a href="/genres/{{ $genre->id }}">ジャンル詳細に戻る</a>]<hr>

        <div class="footer">
            [<a href="/genres/">ジャンル一覧に戻る</a>]
        </div>

        @if($genre->picture)
        <script>
        function deletePicture(e) {
            'use strict';
            if(confirm('削除すると復元できません。\n本当に削除しますか?')) {
                document.getElementById('form_delete_{{ $genre->picture->id }}').submit();
            }
        }
        </script>
        @endif
@endsection