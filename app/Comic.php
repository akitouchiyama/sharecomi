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

    // pucturesに対するリレーション
    public function pictures()  {
        return $this->belongsToMany('App\Picture');
    }

    // averagesに対するリレーション
    public function average() {
        return $this->hasOne('App\Average');
    }

    // usersとのリレーション
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    use SoftDeletes;

    // 削除したら関連するreviewsも削除
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($comic) {
            $comic->reviews()->delete();
            /* 
            averageを実装したらコメントを外す
            $comic->average()->delete();
            */
        });
    }

    protected $fillable = [
        'title',
        'author',
        'introduction',
        'comment',
        'user_id',
        'comic_link',
        'total_review',
        'total_number',
    ];

    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

}
