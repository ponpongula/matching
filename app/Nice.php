<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nice extends Model
{
    public function user() {
       return $this->belongsTo('App\User');
   }

   public function idea() {
       return $this->belongsTo('App\Idea');
   }
}
