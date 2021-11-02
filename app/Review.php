<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    // comicsとのリレーション
    public function comic()
    {
        return $this->belongsTo('App\Comic');
    }

    // commentsに対するリレーション
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    use SoftDeletes;

    // 削除したら関連するcommentsも削除
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($review) {
            $review->comments()->delete();
        });
    }

    protected $fillable = [
        'title',
        'body',
        'review',
        'user_id',
        'comic_id',
    ];

    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('comic')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

}
