<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    //comicsに対するリレーション
    public function comics()  {
        return $this->belongsToMany('App\Comic');
    }

    // usersとのリレーション
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // pucturesに対するリレーション
    public function picture()  {
        return $this->hasOne('App\Picture');
    }

    use SoftDeletes;

    protected $fillable = [
        'genre_name',
        'user_id',
        'genre_link',
    ];

    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
