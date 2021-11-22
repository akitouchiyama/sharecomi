<?php

namespace App\Http\Controllers;

use App\Comic;
use App\Comment;
use App\Review;
use App\Average;
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

    public function store(Review $review, Comic $comic, ReviewRequest $request)
    {
        $input = $request['review'];
        $review->fill($input)->save();

        // findメソッドでcomicインスタンスを取得
        $comic = comic::find($review->comic_id);
        // 評価をcomicのtotal_reviewに加算する
        $comic->total_review += $review->review;
        // comicのtotal_numberに1加算する
        $comic->total_number += 1;
        // comicを保存
        $comic->save();

        return redirect('/reviews/' . $review->id);
    }

    public function edit(Review $review)
    {
        return view('reviews.edit')->with(['review' => $review]);
    }

    public function update(Review $review, ReviewRequest $request, Comic $comic)
    {
        $input = $request['review'];

        // findメソッドで編集前のreviewインスタンス(post_review)を取得
        $post_review = review::find($input['id']);
        // そのpost_reviewから、findメソッドでcomicインスタンスを取得
        $comic = comic::find($post_review->comic_id);
        // comicのtotal_reviewから編集前のreviewを減算する
        $comic->total_review -= $post_review->review;

        // reviewを保存
        $review->fill($input)->save();

        // 評価をcomicのtotal_reviewに加算する
        $comic->total_review += $review->review;
        // comicを保存
        $comic->save();

        return redirect('/reviews/' . $review->id);
    }

    public function destroy(Review $review, Comic $comic)
    {
        // reviewに関連するcommentを削除
        $review->comments()->delete();

        // reviewのcomic_idからfindメソッドでcomicを取得
        $comic = comic::find($review->comic_id);
        // total_reviewからreviewをマイナスする
        $comic->total_review -= $review->review;
        // total_numberから1マイナスする
        $comic->total_number -= 1;
        // comicを保存
        $comic->save();

        // revieを削除
        $review->delete();

        return redirect('/');
    }
}
