<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/main.css">
        @yield('links')
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Navbar -->
                    <div>
                        <ul class="nav navbar-nav float-md-right">
                            @if (!Auth::check())
                                <li class="nav-item">
                                    <a href="{{ url('/login') }}" class="nav-link" id="login">Войти</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/register') }}" class="nav-link" id="reg">Зарегестрироваться</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                                        <div class="dropdown-menu">
                                            <a href="{{ url('/settings') }}" class="dropdown-item">Настройки</a>
                                            <a href="{{ url('/task/new') }}" class="dropdown-item">Разместить задачу</a>
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ url('/logout') }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" class="dropdown-item" style="cursor: pointer;">Выйти</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        </ul>
                        <ul class="nav navbar-nav float-md-left">
                            <li class="nav-item">
                                <a href="/">Главная</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /Navbar -->
                </div>
            </div>

            {{--<div class="btn-group">--}}
                {{--<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--По Всему Миру--}}
                {{--</button>--}}
                {{--<div class="dropdown-menu">--}}
                    {{--<a class="dropdown-item" href="#">Волгоград</a>--}}
                    {{--<a class="dropdown-item" href="#">Москва</a>--}}
                    {{--<a class="dropdown-item" href="#">Уфа</a>--}}
                    {{--<a class="dropdown-item" href="#">Магаз</a>--}}
                {{--</div>--}}
            {{--</div>--}}

            @yield('content')

        </div>
        <footer>
            @yield('footer')
        </footer>

        <!-- Libs -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
        <script src="/js/notify.min.js"></script>

        <!-- Scripts -->
        <script src="/js/app.js"></script>
    </body>
</html>