<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Idea;
use App\Genre;

class IdeaController extends Controller
{
  public function index(Request $request)
  {
    $genre_id = $request->genre_id;
    if (isset($genre_id)) {
      $posts = Genre::find($genre_id)->ideas;
    } else {
      $posts = Idea::all()->sortByDesc('updated_at');
    }
      $genres = Genre::all();
     return view('idea.index', ['posts' => $posts, 'genres' => $genres ]);
  }

  public function detail(Request $request, $idea_id)
  {
      $idea = Idea::find($idea_id);
      $comments = $idea->comments;
     return view('idea.detail', ['idea' => $idea, 'comments' => $comments]);
  }

}
