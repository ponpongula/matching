<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function ideas()
    {
      return $this->belongsToMany('App\Idea');
    }
}
