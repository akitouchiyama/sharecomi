<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comic extends Model
{
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    use softDeletes;

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
