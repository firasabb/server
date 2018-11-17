<?php

namespace App;
use \App\Word;

use Illuminate\Database\Eloquent\Model;

class Downloader extends Model
{
    public function words(){
        return $this->belongsToMany('Word');
    }
}
