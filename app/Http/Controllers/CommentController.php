<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Comment $comment)
    {
        return view('comments.index')->with(['comments' => $comment->getPaginateByLimit()]);
    }
}
