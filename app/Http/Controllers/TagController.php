<?php

namespace App\Http\Controllers;

use App\Tag;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
        return view('tags.index')->with(['tags' => $tag->getPaginateByLimit()]);
    }

    public function show(Tag $tag)
    {
        return view('tags.show')->with(['tag' => $tag]);
    }
}
