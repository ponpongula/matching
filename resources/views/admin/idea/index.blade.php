@extends('layouts.admin')
@section('name', '登録済みアイディアの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>アイディア一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\IdeaController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\IdeaController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_name" value="{{ $cond_na }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-idea col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="50%">本文</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $idea)
                                <tr>
                                    <th>{{ $idea->id }}</th>
                                    <td>{{ str_limit($idea->name, 100) }}</td>
                                    <td>{{ str_limit($idea->body, 250) }}</td>


                                    <td>
                                      <div>
                                        <a href="{{ action('Admin\IdeaController@edit',['id' => $idea->id]) }}">編集</a>
                                      </div>
                                      <div>
                                        <a href="{{ action('Admin\IdeaController@delete', ['id' => $idea->id]) }}">削除</a>
                                      </div>
                                    </td>
                               </tr>


                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
