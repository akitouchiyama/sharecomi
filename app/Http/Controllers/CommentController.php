<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Review;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function show(Comment $comment)
    {
        return view('comments.show')->with(['comment' => $comment]);
    }

    public function create(Review $review)
    {
        return view('comments.create')->with(['review' => $review]);
    }

    public function store(Comment $comment, CommentRequest $request)
    {
        $input = $request['comment'];
        $comment->fill($input)->save();
        return redirect('/reviews/' . $comment->review_id);
    }

    public function edit(Review $review, Comment $comment)
    {
        return view('comments.edit')->with(['comment' => $comment]);
    }

    public function update(Comment $comment, CommentRequest $request)
    {
        $input = $request['comment'];
        $comment->fill($input)->save();
        return redirect('/comments/' . $comment->id);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect('/reviews/' . $comment->review_id);
    }
}
