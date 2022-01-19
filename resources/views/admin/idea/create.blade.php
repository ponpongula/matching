@extends('layouts.admin')

@section('name', 'アイディアの新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>アイディア新規作成</h2>
                <form action="{{ action('Admin\IdeaController@create') }}" method="post" enctype="multipart/form-data">

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
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2" for="genre">ジャンル選択</label>
                      <div class="col-md-10">
                              @foreach($genres as $genre)
                                <input type="checkbox" name="genre_ids[]" value={{$genre->id}}>{{$genre->name}}</input>
                              @endforeach
                       </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">内容</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="contents" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                         <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="投稿">
                </form>
            </div>
        </div>
    </div>
@endsection
