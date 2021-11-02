<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // reviewsに対するリレーション
    public function review()
    {
        return $this->belongsTo('App\Review');
    }

    protected $fillable = [
        'comment',
        'user_id',
        'review_id',
    ];
}
