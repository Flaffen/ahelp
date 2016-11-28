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
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        @yield('links')
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Navbar -->
                    <div class="navbar navbar-light bg-faded">
                        <ul class="nav navbar-nav float-md-right">
                            @if (!Auth::check())
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link" id="login" data-toggle="dropdown">Войти</a>
                                    <ul class="dropdown-menu dropdown-lr">
                                        <div class="col-lg-12">
                                            <div class="text-center"><h3><b>Вход</b></h3></div>
                                            <form action="{{ url('/login') }}" method="post" role="form" autocomplete="off">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="" autocomplete="off" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="password">Пароль</label>
                                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Пароль" autocomplete="off" required>
                                                </div>

                                                <div class="form-group">
                                                    <button class="btn btn-success float-md-right" type="submit">Войти</button>
                                                </div>
                                            </form>
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link" id="login" data-toggle="dropdown">Зарегестрировться</a>
                                    <ul class="dropdown-menu dropdown-lr">
                                        <div class="col-lg-12">
                                            <div class="text-center"><h3><b>Регистрация</b></h3></div>
                                            <form action="{{ url('/register') }}" method="post" role="form" autocomplete="off">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="name">Имя</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Имя" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Электронная почта</label>
                                                    <input type="text" name="email" class="form-control" placeholder="Email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Пароль</label>
                                                    <input type="password" name="password" class="form-control" placeholder="Пароль" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password_confirmation">Подтверждение пароля</label>
                                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Подтверждение пароля" required>
                                                </div>
                                                <div class="form-group float-md-right">
                                                    <button type="submit" class="btn btn-success">Зарегестрироваться</button>
                                                </div>
                                            </form>
                                        </div>
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="nav-link">{{ Auth::user()->name }}</a>
                                        <div class="dropdown-menu dropdown-menu-right">
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
                                <a href="{{ url('/') }}" class="nav-link">Главная</a>
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

            <footer>
                &copy; Степан Паламарчук. Версия сайта - 0.1.
                @yield('footer')
            </footer>
        </div>

        <!-- Libs -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
        <script src="/js/notify.min.js"></script>

        <!-- Scripts -->
        <script src="/js/app.js"></script>
    </body>
</html>