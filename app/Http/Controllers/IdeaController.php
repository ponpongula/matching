<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Idea;

class IdeaController extends Controller
{
  public function index(Request $request)
  {
    // $genres = Genre::all();
    $cond_genre = $request->cond_genre;
    if (isset($cond_genre)) {
      $posts =Idea::where('genre', $cond_genre)->orderByDesc('updated_at', 'desc')->get();
    } else {
      $posts = Idea::all()->sortByDesc('updated_at');
    }
    return view('idea.index', ['posts' => $posts]);
  }

  public function detail(Request $request, $idea_id)
  {
     $idea = Idea::find($idea_id);
     $comments = $idea->comments;
     return view('idea.detail', ['idea' => $idea, 'comments' => $comments]);
  }

}
