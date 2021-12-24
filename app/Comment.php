<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Idea;

class Comment extends Model
{
  protected $fillable = [
    'contents',
    'user_id',
    'idea_id',
  ];

  public static $rules = array(
    'contents' => 'required'
  );

  public function idea()
   {
       return $this->belongsTo('App\Idea');
   }
}
