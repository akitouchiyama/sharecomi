<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function comic()
    {
        return $this->belongsTo('App\Comic');
    }
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('comic')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
