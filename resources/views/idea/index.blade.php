@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                <div class="detail">
                    <div class="post">
                        <div class="row">
                           <div class="text col-md-6">
                           <a href="{{ action('IdeaController@detail',['idea_id' => $post->id]) }}">
                              <div class="date">
                                  {{ $post->updated_at->format('Y年m月d日') }}
                              </div>
                              <div class="name">
                                  {{ str_limit($post->name, 150) }}
                              </div>
                              </div>
                            </a>
                            　 <div class="image col-md-6 text-right mt-4">
                                　　@if ($post->image_path)
                                　　    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                　 @endif
                              </div>
                              <!-- <div class="comment text-right">
                             　　<a href="/{{$post->id}}/comment/create">コメント</a>
                              </div> -->
                          </div>
                      </div>
                  </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection
