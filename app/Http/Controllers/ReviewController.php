<?php

namespace App\Http\Controllers;

use App\Comic;
use App\Comment;
use App\Review;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function index(Review $review)
    {
        return view('reviews.index')->with(['reviews' => $review->getPaginateByLimit()]);
    }

    public function show(Review $review)
    {
        return view('reviews.show')->with(['review' => $review]);
    }

    public function create(Comic $comic)
    {
        return view('reviews.create')->with(['comic' => $comic]);
    }

    public function store(Review $review, ReviewRequest $request)
    {
        $input = $request['review'];
        $review->fill($input)->save();
        return redirect('/reviews/' . $review->id);
    }
    
    public function edit(Review $review)
    {
        return view('reviews.edit')->with(['review' => $review]);
    }
    
    public function update(Review $review, ReviewRequest $request)
    {
        $input = $request['review'];
        $review->fill($input)->save();
        return redirect('/reviews/' . $review->id);
    }
    
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect('/');
    }
}
