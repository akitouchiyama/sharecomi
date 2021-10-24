<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Http\Requests\GenreRequest;

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
        return redirect('/genres/' . $genre->id);
    }

}
