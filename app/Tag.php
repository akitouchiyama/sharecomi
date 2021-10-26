<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // comicsに対するリレーション
    public function comics() {
        return $this->belongsToMany('App\Comic');
    }

    protected $fillable = [
        'tag_name',
        'user_id',
    ];

        public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
