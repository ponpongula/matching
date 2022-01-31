@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @foreach($genres as $genre)
          <a href="{{ action('IdeaController@index',['genre_id' => $genre->id]) }}">{{$genre->name}}</a>
        @endforeach
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
                                    @foreach($post->genres as $genre)
                                    {{ $genre->name }}
                                    @endforeach


                              <span>
                                  @auth
                                      @if($post->is_nice_by_auth_user())
                                    	   <a href="{{ route('unnice', $post) }}" class="btn btn-success btn-sm">
                                    		     いいね
                                    	   </a>
                                      @else
                                        	<a href="{{ route('nice', $post) }}" class="btn btn-secondary btn-sm">
                                        		いいね
                                            <img src="{{asset('icons/nicebutton.png')}}" width="20px">
                                        	</a>
                                      @endif
                                  @endauth
                                  <span class="badge">
                                    {{ $post->nices->count() }}
                                  </span>
                              </span>
                          </div>
                      </div>
                  </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection
