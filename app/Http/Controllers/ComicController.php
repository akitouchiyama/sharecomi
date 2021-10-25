<?php

namespace App\Http\Controllers;

use App\Comic;
use App\Genre;
use App\Http\Requests\ComicRequest;

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

    public function create(Genre $genre)
    {
        return view('comics.create')->with(['genres' => $genre->get()]);
    }

    public function store(Comic $comic, ComicRequest $request)
    {
        $input_comic = $request['comic'];
        $input_genres = $request->genres_array;// genres_arrayはcreate.blade.phpのnameで設定した配列名

        // 先にcomicsを保存
        $comic->fill($input_comic)->save();

        // attachメソッドを使って中間テーブルに保存
        $comic->genres()->attach($input_genres);
        return redirect('/comics/' . $comic->id);
    }

    public function edit(Comic $comic, Genre $genre)
    {
        return view('comics.edit')->with(['comic' => $comic])->with(['genres' => $genre->get()]);
    }

    public function update(Comic $comic, ComicRequest $request)
    {
        $input_comic = $request['comic'];
        $input_genres = $request->genres_array;// genres_arrayはcreate.blade.phpのnameで設定した配列名

        // 先にcomicsを保存
        $comic->fill($input_comic)->save();

        // attachメソッドで中間テーブルに保存
        $comic->genres()->attach($input_genres);
        return redirect('/comics/' . $comic->id);
    }

    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect('/comics');
    }
}
