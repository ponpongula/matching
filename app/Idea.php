<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $guarded = array('id');
    protected $table = 'idea';
    public static $rules = array(
      //'user_id' => 'required',
      'neme' => 'required',
      'contents' => 'required',
    );
}
