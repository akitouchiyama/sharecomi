<?php

namespace App\Http\Controllers;

use App\Comic;
use App\Genre;
use App\Tag;
use App\Picture;
use Storage;
use App\Http\Requests\ComicRequest;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index(Comic $comic)
    {
        return view('comics.index')->with(['comics' => $comic->getPaginateByLimit()]);
    }

    public function show(Comic $comic)
    {
        return view('comics.show')->with(['comic' => $comic]);
    }

    public function create(Genre $genre, Tag $tag)
    {
        return view('comics.create')->with(['genres' => $genre->get()])->with(['tags' => $tag->get()]);
    }

    public function store(Comic $comic, ComicRequest $request)
    {
        $input_comic = $request['comic'];
        $input_genres = $request->genres_array;// genres_arrayはcreate.blade.phpのnameで設定した配列名
        $input_tags = $request->tags_array;// tags_arrayはcreate.blade.phpのnameで設定した配列名

        // 先にcomicsを保存
        $comic->fill($input_comic)->save();

        // attachメソッドを使って中間テーブルに保存
        $comic->genres()->attach($input_genres);
        $comic->tags()->attach($input_tags);

        return redirect('/comics/pictures/' . $comic->id);
    }

    public function add_picture(Comic $comic)
    {
        return view('comics.add_picture')->with(['comic' => $comic]);
    }

    public function store_picture(Picture $picture,Comic $comic, Request $request)
    {
        $form = $request->all();
        $comicId = $comic->id;

        //s3アップロード開始
        $image = $request->file('image');
        // バケットの`comics`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('comics', $image, 'public');
        // アップロードした画像のフルパスを取得
        $picture->image_path = Storage::disk('s3')->url($path);

        $picture->save();

        // attachを使って中間テーブルに保存
        $picture->comics()->attach($comicId);

        return redirect('/comics/' . $comic->id);
    }

    public function edit(Comic $comic, Genre $genre, Tag $tag)
    {
        return view('comics.edit')->with(['comic' => $comic])->with(['genres' => $genre->get()])->with(['tags' => $tag->get()]);
    }

    public function update(Comic $comic, ComicRequest $request)
    {
        $input_comic = $request['comic'];
        $input_genres = $request->genres_array;// genres_arrayはcreate.blade.phpのnameで設定した配列名
        $input_tags = $request->tags_array;// tags_arrayはcreate.blade.phpのnameで設定した配列名

        // 先にcomicsを保存
        $comic->fill($input_comic)->save();

        // attachメソッドで中間テーブルに保存
        $comic->genres()->attach($input_genres);
        $comic->tags()->attach($input_tags);

        return redirect('/comics/' . $comic->id);
    }

    public function destroy(Comic $comic)
    {
        // 中間テーブルの紐付けを削除
        $comic->genres()->detach();
        $comic->tags()->detach();

        $comic->delete();
        return redirect('/comics');
    }
}
