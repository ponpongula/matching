<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Idea;
use App\Nice;
use Illuminate\Support\Facades\Auth;

class NiceController extends Controller
{
  public function nice(Request $request, Idea $idea) {
    $nice = New Nice();
    $nice->idea_id = $idea->id;
    $nice->user_id = Auth::user()->id;
    $nice->save();
    return back();
  }

  public function unnice(Request $request, Idea $idea) {
    $user = Auth::user()->id;
    $nice = Nice::where('idea_id', $idea->id)->where('user_id', $user)->first();
    $nice->delete();
    return back();
  }
}
