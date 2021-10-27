<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comic extends Model
{
    // reviewsに対するリレーション
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    
    //genresに対するリレーション
    public function genres()  {
        return $this->belongsToMany('App\Genre');
    }

    // tagsに対するリレーション
    public function tags() {
        // comicは複数のtagsを持つ
        return $this->belongsToMany('App\Tag');
    }

    use softDeletes;

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($comic) {
            $comic->reviews()->delete();
        });
    }

    protected $fillable = [
        'title',
        'author',
        'introduction',
        'comment',
        'user_id',
    ];

    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

}
