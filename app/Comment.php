<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    // reviewsに対するリレーション
    public function review()
    {
        return $this->belongsTo('App\Review');
    }

    use SoftDeletes;

    protected $fillable = [
        'comment',
        'user_id',
        'review_id',
    ];
}
