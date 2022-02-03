<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
      //'user_id' => 'required',
      'name' => 'required',
      'genre_ids' => 'required',
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
    public function posts()
    {
      return $this->hasMany('App\User');
    }
    public function nices()
    {
      return $this->hasMany('App\Nice');
    }
    public function is_nice_by_auth_user()
    {
      $nice = Nice::where('idea_id', $this->id)->where('user_id', auth()->user()->id)->first();
      return $nice;
    }
}
