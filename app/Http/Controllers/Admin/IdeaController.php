<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Idea;

class IdeaController extends Controller
{
   public function index(Request $request)
   {
    $cond_name = $request->cond_name;
    if ($cond_name !=''){
      $posts = Idea::where('name', $cond_name)->get();
     } else {
      $posts = Idea::all();
    }
      return view('admin.idea.index',['posts' => $posts,'cond_name' => $cond_name]);
    }

    public function add()
    {
      return view('admin.idea.create');
    }

    public function create(Request $request)
    {
      //$this->validate($request,Idea::$rules);
      $id = Auth::id();
      $idea = new Idea;
      $form = $request->all();

      if (isset($form['image'])) {
      $path = $request->file('image')->store('public/image');
      $idea->image_path = basename($path);
       } else {
         $idea->image_path = null;
       }

       unset($form['_token']);

       unset($form['image']);
       
       $form['user_id'] = $id;
       $idea->fill($form);
       $idea->save();

       return redirect('admin/idea');
     }

     public function edit(Request $request)
     {
       $news = Idea::find($request->id);
       if (empty($idea)){
         abort(404);
     }
     return view('admin.idea.edit', ['idea_form' => $idea]);
     }

     public function update(Request $request)
     {
       $this->validate($request, Idea::$rules);
       $idea = Idea::find($request->id);
       $idea_form = $request->all();
       if ($request->remove == 'true') {
             $idea_form['image_path'] = null;
         } elseif ($request->file('image')){
             $path = $request->file('image')->store('public/image');
             $idea_form['image_path'] = basename($path);
         } else {
             $idea_form['image_path'] = $idea->image_path;
         }

       unset($idea_form['image']);
       unset($idea_form['remove']);
       unset($idea_form['_token']);

       $idea->fill($idea_form)->save();

       $history = new History();
       $history -> idea_id = $idea->id;
       $history -> edited_at = Carbon::now();

       $history -> save();
       return redirect('admin/idea');
     }

     public function delete(Request $request)
     {
       $idea = Idea::find($request->id);
       $idea->delete();
       return redirect('admin/idea');
     }
}
