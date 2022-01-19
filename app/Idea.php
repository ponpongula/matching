<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
      //'user_id' => 'required',
      'neme' => 'required',
      'genru' => 'required',
      'contents' => 'required',
    );
    public function comments()
    {
      return $this->hasMany(Comment::class);
    }
    public function genres()
   {
      return $this->belongsToMany('App\Genre');
   }
}
