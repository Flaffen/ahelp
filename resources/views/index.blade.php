@extends('app.layout')

@section('title') Главная Страница @endsection

@section('content')

    <div class="type">
        <p class="bg-info">
            <blockquote>
                <h2>Выберите тип услуги:</h2>
                <cite title="Source Title">(Это Вам поможет эффективнее найти помощь)</cite>
                <br>
                <div class="bot">
                    <input type="checkbox" id="inlineCheckbox1" value="option1">Интеллектуальный
                    <input type="checkbox" id="inlineCheckbox1" value="option1">Физический
                    <input type="checkbox" id="inlineCheckbox1" value="option1">Технический
                    <input type="checkbox" id="inlineCheckbox1" value="option1">Навигационый
                    <input type="checkbox" id="inlineCheckbox1" value="option1">Личный
                    <input type="checkbox" id="inlineCheckbox1" value="option1">Другое
                </div>
                </br>
            </blockquote>
        </p>
            
        <div class="top">
            <div class="form-group form-group-lg">
                <h5 class="col-sm-2 control-label" for="formGroupInputLarge">Примечания:</h5>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="formGroupInputLarge" placeholder="Примечания">
                </div>
            </div>
        </div>
    </div>
        
    <div class="gomer">
        <h3>Последние добавления:</h3>
        <hr align="left" width="700" size="200" color="skyblue">
    </div>

    @foreach ($tasks as $task)
        <div class="George">
            <img src="{{ asset('storage/user_images/' . $task->user->img) }}" width="50" height="50" class="img-circle">
            <a href="{{ url("user/{$task->user->id}") }}">{{ $task->user->name }}</a>
            <h5><strong>{{ $task->title }}</strong></h5><br>
            <h6><strong>Тип:</strong>{{ $task->type->name }}</h6><br>

            <p>{{ $task->content }}</p><br>
            <p><img src="http://icons.iconarchive.com/icons/martz90/circle/512/phone-icon.png" width="30" height="30" class="img-circle"><strong>Телефон:</strong>{{ $task->user->tel }}</p><br>
            <p><img src="https://cdn2.iconfinder.com/data/icons/smart-city-vol-4-2/32/gogreen_green_city_greencity_smart_city_bulding-512.png" width="30" height="30" class="img-circle"><strong>Город:</strong>{{ $task->city }}</p><br>
            <p><img src="https://www.grupodinamica.com.br/wp-content/uploads/sites/207/2015/03/money-flat.png" width="30" height="30" class="img-circle"><strong>Вознаграждение:</strong>{{ $task->reward }}</p><br>
            <button type="button" class="btn btn-danger">Помочь!</button>
        </div>
    @endforeach

@endsection