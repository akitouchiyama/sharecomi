<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Http\Requests\TagRequest;

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

    public function create()
    {
        return view('tags.create');
    }

    public function store(Tag $tag, TagRequest $request)
    {
        $input = $request['tag'];
        $tag->fill($input)->save();
        return redirect('/tags/' . $tag->id);
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit')->with(['tag' => $tag]);
    }

    public function update(Tag $tag, TagRequest $request)
    {
        $input = $request['tag'];
        $tag->fill($input)->save();
        return redirect('/tags/' . $tag->id);
    }
}
