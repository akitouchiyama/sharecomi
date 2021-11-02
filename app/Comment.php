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

    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
