<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('name')</title>

        <script src="{{ asset('js/app.js') }}" defer></script>

        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link href="{{ asset('css/front.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">

            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        idea
                        <!-- title -->
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav mr-auto">
                        </ul>

                        <ul class="navbar-nav ml-auto row">
                          @guest
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                              </li>
                              @if (Route::has('register'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('register') }}">{{ __('アカウント登録') }}</a>
                                  </li>
                              @endif
                            @else
                              <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      {{ Auth::user()->name }} <span class="caret"></span>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          {{ __('ログアウト') }}
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                      </form>
                                  </div>
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{ action("Admin\IdeaController@index") }}">マイページ
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="{{ action("Admin\IdeaController@add") }}">新規作成
                                   </a>
                                 </li>
                              </li>
                          @endguest
                          <!-- <li class="col"><a href="{{ action("Admin\IdeaController@index") }}">マイページ</a></li>
                          <li class="col"><a href="{{ action("Admin\IdeaController@add") }}">新規作成</a></li> -->
                        </ul>

                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>
