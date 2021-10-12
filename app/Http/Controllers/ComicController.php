<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index(Comic $comic)
    {
        return view('comics/index')->with(['comics' => $comic->getPaginateByLimit()]);
    }
}
