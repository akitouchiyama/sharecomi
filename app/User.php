<?php

namespace App;

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
}
