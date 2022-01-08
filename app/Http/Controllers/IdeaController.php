<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Idea;

class IdeaController extends Controller
{
  public function index(Request $request)
  {
    $cond_name = $request->cond_name;
    if (isset($cond_name)) {
      $posts =Idea::where('name', $cond_name) . oederByDesc('updated_at', 'desc')->get();
    } else {
      $posts = Idea::all()->sortByDesc('updated_at');
    }
    return view('idea.index', ['posts' => $posts, 'cond_name' => $cond_name]);
  }

  public function detail(Request $request, $idea_id)
  {
     $idea = Idea::find($idea_id);
     $comments = $idea->comments;
     return view('idea.detail', ['idea' => $idea, 'comments' => $comments]);
  }

}
