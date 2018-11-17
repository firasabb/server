<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function language(){
        return $this->belongsTo('\App\Language');
    }

    public function words(){
        return $this->hasMany('\App\Word');
    }
}
