<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('users.index')->with(['user' => $user]);
    }

    public function index_comics(User $user)
    {
        return view('users.comics')->with(['own_comics' => $user->getOwnComicsPaginateByLimit()]);
    }

    public function index_reviews(User $user)
    {
        return view('users.reviews')->with(['own_reviews' => $user->getOwnReviewsPaginateByLimit()]);
    }

    public function index_genres(User $user)
    {
        return view('users.genres')->with(['own_genres' => $user->getOwnGenresPaginateByLimit()]);
    }

    public function index_tags(User $user)
    {
        return view('users.tags')->with(['own_tags' => $user->getOwnTagsPaginateByLimit()]);
    }
}
