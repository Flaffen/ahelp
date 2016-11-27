@extends('app.layout')

@section('title')Создание нового задания@endsection

@section('links')
    <link rel="stylesheet" href="/css/create-task.css">
@endsection

@section('content')
    <div class="create-task-wrap">
        <div class="row">
            <div class="col-md-12">
                <h1>Создание новой заявки</h1>
                <hr>
            </div>
        </div>
        <form action="{{ url('/task') }}" method="POST">
            <div class="row">
                {{ csrf_field() }}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="title">Введите заголовок объявления:</label>
                        <input type="text" class="form-control" name="title" id="title" aria-describedby="title-help" placeholder="Заголовок">
                        <small id="title-help" class="form-text text-muted">Например: присмотреть за собакой, сделать забор и т.д.</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tel">Телефон:</label>
                        <input type="text" id="tel" class="form-control-static" value="{{ Auth::user()->tel }}">
                        <small id="tel-help" class="form-text text-muted">Ваш номер телефона.</small>
                    </div>
                </div>
                <div class="col-md-4" style="text-align: right;">
                    <button class="btn btn-success" type="submit">Отправить</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="type">Тип:</label>
                        <select name="type" id="type" class="form-control" aria-describedby="type-help">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <small id="type-help" class="form-text text-muted">Например: Физический, Умственный и т.д.</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="city">Город:</label>
                        <input type="text" class="form-control" id="city" name="city">
                        <small id="tel-help" class="form-text text-muted">В каком городе Вам нужна помощь.</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="description">Описание:</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control" aria-describedby="description-help"></textarea>
                        <small id="description-help" class="form-text text-muted">В чём конкретно вы хотите помощи.</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="reward">Вознаграждение:</label>
                        <input type="text" class="form-control" name="reward" id="reward">
                        <small id="type-help" class="form-text text-muted">Например: 100р. или "Старый телевизор"</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="show_email">
                            Показывать Email
                        </label>
                    </div>
                </div>
            </div>
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </form>
    </div>
@endsection