<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Idea;

class IdeaController extends Controller
{
  public function index(Request $request)
  {
    $cond_name = $request->cond_name;
    if ($cond_name !='') {
      $posts =Idea::where('name', $cond_name) . oederByDesc('updated_at', 'desc')->get();
    } else {
      $posts = Idea::all()->sortByDesc('updated_at');
    }
    if (count($posts) > 0) {
      $headline = $posts->shift();
    } else {
      $headline = null;
    }
    return view('idea.index', ['headline' => $headline, 'posts' => $posts, 'cond_name' => $cond_name]);
  }

}
