<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function words(){
        return $this->hasMany('\App\Word');
    }

    public function categories(){
        return $this->hasMany('\App\Category');
    }

}
