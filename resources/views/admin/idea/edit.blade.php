@extends('layouts.admin')
@section('name', 'アイディアの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>アイディア編集</h2>
                <form action="{{ action('Admin\IdeaController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">アイディア名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $idea_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2" for="genre">ジャンル選択</label>
                      <div class="col-md-10">
                              @foreach($genres as $genre)
                                <input type="checkbox" name="genre_ids[]" value={{$genre->id}} {{in_array($genre->id, $idea_genres) ? "checked" : "" }}>{{$genre->name}}
                              @endforeach                     //genre[]
                       </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="contents">内容</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="contents" rows="20">{{ $idea_form->contents }}
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $idea_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $idea_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>

                <!-- <div class="row mt-5">
                  <div class="col-md-4 mx-auto">
                    <h2>編集履歴</h2>
                    <ul class="list-group">
                      @if ($idea_form->histories != NULL)
                      @foreach($idea_form->histories as $history)
                      <il class="list-group-item">{{ $history->edited_at }}
                      </li>
                        @endforeach
                        @endif
                    </ul>
                  </div>
                </div> -->

            </div>
        </div>
    </div>
@endsection
