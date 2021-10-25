<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // comicsに対するリレーション
    public function comics() {
        // 一つのtagに複数のcomicsが存在
        return $this->belongsToMany('App\Comic');
    }
}
