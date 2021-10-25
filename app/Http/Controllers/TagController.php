<?php

namespace App\Http\Controllers;

use App\Tag;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
        return $tag->get();
    }
}
