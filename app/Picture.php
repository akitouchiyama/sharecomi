<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    // comicsとのリレーション
    public function comics()
    {
        return $this->belongsToMany('App\Comic');
    }

    // genresとのリレーション
    public function genre()
    {
        return $this->hasOne('App\Genre');
    }

    protected $fillable = [
        'image_path',
        'user_id',
        'genre_id',
    ];

}
