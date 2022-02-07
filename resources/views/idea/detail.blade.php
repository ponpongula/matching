@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <div class="detail">
                    <div class="post">
                        <div class="row">
                           <div class="text col-md-6">
                              <div class="cotents mt-3">
                                  {{ str_limit($idea->contents, 150) }}
                              </div>
                              <div class="form-inline ml-auto">
                             　　<a href="/{{$idea->id}}/comment/create">コメント</a>
                              </div>
                              <span class="col-12 clearfix">
                              @foreach($posts as $post)
                              @auth
                                  @if($post->is_nice_by_auth_user())
                                     <a href="{{ route('unnice', $post) }}" class="btn btn-success btn-sm float-right test-box">
                                       いいね
                                     </a>
                                     <span class="badge float-right test-box">
                                       {{ $post->nices->count() }}
                                     </span>
                                  @else
                                      <a href="{{ route('nice', $post) }}" class="btn btn-secondary btn-sm float-right test-box">
                                        いいね
                                      <img src="{{ asset('icons/nicebutton.png') }}" width="20px">
                                      </a>
                                @endif
                            @endauth
                            @endforeach
                          </span>
                          </div>
                      </div>
                  </div>
                  <hr color="#c0c0c0">
                  @foreach($comments as $comment)
                  <div class>
                    {{ $comment->contents }}
                  </div>
                  <hr color="#c0c0c0">
                  @endforeach
            </div>
        </div>
    </div>
@endsection
