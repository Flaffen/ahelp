<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>VolHelp</title>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="/css/registration.css">
    </head>
    <body>
        <div class="start">
            <h1>Регистрация</h1>
            <hr align="left" width="800" size="600" color="skyblue">
        </div>

        <div class="basic">
            <form action="{{ url('/register') }}" method="POST">
                {{ csrf_field() }}

                {{--<div class="form-group">--}}
                    {{--<label for="exampleInputEmail1"><img src="https://cdn1.iconfinder.com/data/icons/freeline/32/account_friend_human_man_member_person_profile_user_users-256.png" width="50" height="50" class="img-circle">Choose new picture for your profile</label>--}}
                    {{--<br>--}}
                    {{--<label for="exampleInputFile">File input</label>--}}
                    {{--<input type="file" id="exampleInputFile">--}}
                {{--</div>--}}

                <div class="form-group">
                    <label for="exampleInputEmail1">Электронный адрес</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Электронный адрес" required autofocus>
                </div>

                <div class="form-group">
                    <label for="NickName">Имя</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Имя" required>
                </div>

                <div class="form-group">
                    <label for="Password">Пароль</label>
                    <input type="password" class="form-control" name="password" placeholder="Пароль" required>
                </div>

                <div class="form-group">
                    <label for="Reapite">Подтверждение пароля</label>
                    <input type="password" class="form-control" id="Reapite" placeholder="Password" name="password_confirmation" required>
                </div>

                {{--<label for="exampleInputEmail1">Choose The City</label>--}}
                {{--<div class="btn-group">--}}
                    {{--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--City--}}
                    {{--</button>--}}
                    {{--<div class="dropdown-menu">--}}
                        {{--<a class="dropdown-item" href="#">Волгоград</a>--}}
                        {{--<a class="dropdown-item" href="#">Москва</a>--}}
                        {{--<a class="dropdown-item" href="#">Уфа</a>--}}
                        {{--<a class="dropdown-item" href="#">Краснодар</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <br>

                <div class="knop">
                    <button type="submit" class="btn btn-info">Регистрация</button>
                </div>
            </form>
        </div>
    </body>
</html>