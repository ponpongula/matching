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
