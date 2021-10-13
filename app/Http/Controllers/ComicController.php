<?php

namespace App\Http\Controllers;

use App\Comic;
use App\Http\Requests\ComicRequest;

class ComicController extends Controller
{
    public function index(Comic $comic)
    {
        return view('comics/index')->with(['comics' => $comic->getPaginateByLimit()]);
    }

    public function show(Comic $comic)
    {
        return view('comics/show')->with(['comic' => $comic]);
    }

    public function create()
    {
        return view('comics/create');
    }

    public function store(Comic $comic, ComicRequest $request)
    {
        $input = $request['comic'];
        $comic->fill($input)->save();
        return redirect('/comics/' . $comic->id);
    }
}
