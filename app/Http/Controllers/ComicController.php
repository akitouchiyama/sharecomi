<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index(Comic $comic)
    {
        return $comic->get();
    }
}
