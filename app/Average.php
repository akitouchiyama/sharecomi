<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Average extends Model
{
    // comicsに対するリレーション
    public function comic()
    {
        return $this->belongsTo('App\Comic');
    }

    protected $fillable = [
        'comic_id',
        'total_review',
        'total_number',
    ];

}
