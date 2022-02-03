<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;
use App\Idea;
use App\Comment;

class CommentsController extends Controller
{
  public function create(Request $request, $idea_id)
  {
    $this->validate($request, Comment::$rules);
    $savedata = [
      'idea_id' => $idea_id,
      'contents' => $request->contents,
      'user_id' => Auth::id(),
    ];

    $comment = new Comment;
    $comment->fill($savedata)->save();

    return redirect('/idea/'. $idea_id);
  }

  public function add($idea_id)
  {
    return view('comment.create', ['idea_id' => $idea_id]);
  }
}
