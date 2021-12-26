<?php

namespace App;

use Auth;  //Userクラス定義の前に追加
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // comicsとのリレーション
    public function comics()
    {
        return $this->hasMany('App\Comic');
    }

    // reviewsに対するリレーション
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    // commentsに対するリレーション
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    // genresに対するリレーション
    public function genres()
    {
        return $this->hasMany('App\Genre');
    }

    // tagsに対するリレーション
    public function tags()
    {
        return $this->hasMany('App\Tag');
    }

    // picturesとのリレーション
    public function picture()
    {
        return $this->hasOne('App\Picture');
    }

    // マイページのcomics
    public function getOwnComicsPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('comics')->find(Auth::id())->comics()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    // マイページのreviews
    public function getOwnReviewsPaginateByLimit(int  $limit_count = 5)
    {
        return $this::with('reviews')->find(Auth::id())->reviews()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    // マイページのgenres
    public function getOwnGenresPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('genres')->find(Auth::id())->genres()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    // マイページのtags
    public function getOwnTagsPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('tags')->find(Auth::id())->tags()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
