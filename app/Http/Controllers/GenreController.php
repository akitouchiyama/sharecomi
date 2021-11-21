<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Picture;
use Storage;
use App\Http\Requests\GenreRequest;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(Genre $genre)
    {
        return view('genres.index')->with(['genres' => $genre->getPaginateByLimit()]);
    }

    public function show(Genre $genre)
    {
        return view('genres.show')->with(['genre' => $genre]);
    }

    public function create()
    {
        return view('genres.create');
    }

    public function store(Genre $genre, GenreRequest $request)
    {
        $input = $request['genre'];
        $genre->fill($input)->save();
        return redirect('/genres/pictures/' . $genre->id);
    }

    public function add_picture(Genre $genre)
    {
        return view('genres.add_picture')->with(['genre' => $genre]);
    }

    public function store_picture(Picture $picture, Genre $genre, Request $request)
    {
        // 画像バリデーション
        $this->validate($request, [
             'image' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);

        $form = $request->all();
        $genreId = $genre->id;

        //s3アップロード開始
        $image = $request->file('image');
        // バケットの`genres`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('genres', $image, 'public');
        // アップロードした画像のフルパスを取得
        $picture->image_path = $path;

        $picture->save();

        // attachを使って中間テーブルに保存
        $picture->genres()->attach($genreId);

        return redirect('/genres/' . $genre->id);
    }

    public function edit(Genre $genre)
    {
        return view('genres.edit')->with(['genre' => $genre]);
    }

    public function update(Genre $genre, GenreRequest $request)
    {
        $input = $request['genre'];
        $genre->fill($input)->save();
        return redirect('/genres/' . $genre->id);
    }

    public function destroy(Genre $genre)
    {
        // 中間テーブルの紐付けを削除
        $genre->comics()->detach();

        $genre->delete();

        return redirect('/genres');
    }
}
