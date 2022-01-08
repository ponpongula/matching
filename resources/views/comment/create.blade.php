@extends('layouts.front')

@section('name', 'コメント新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>コメント新規作成</h2>
                <p>{{$idea_id}}</p>
                <form action="/{{$idea_id}}/comment/create" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <div class="col-md-10">
                            <textarea class="form-control" name="contents" rows="20">{{ old('contents') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="コメントをする">
                </form>
            </div>
        </div>
    </div>
@endsection
