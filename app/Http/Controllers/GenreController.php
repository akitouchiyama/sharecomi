<?php

namespace App\Http\Controllers;

use App\Genre;
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
}
