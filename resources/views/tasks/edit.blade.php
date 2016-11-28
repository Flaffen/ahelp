@extends('app.layout')

@section('title')Редактирование - {{ $task->title }}@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Редактирование объявления</h2>
            <hr>
        </div>
    </div>
    <form action="{{ url('/task/' . $task->id) }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <label for="">Заголовок:</label>
                <input type="text" class="form-control" name="title" value="{{ $task->title }}">
            </div>
            <div class="col-md-6">
                <label for="">Тип:</label>
                <select name="type" id="type" class="form-control">
                @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if ($type->id == $task->type->id) {!! 'selected' !!} @endif>{{ $type->name }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <label for="content">Содержание:</label>
                <textarea name="content" id="content" class="form-control">{{ $task->content }}</textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <label for="">Вознаграждение:</label>
                <input type="text" name="reward" value="{{ $task->reward }}" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="">Город:</label>
                <input type="text" name="city" value="{{ $task->city }}" class="form-control">
            </div>
        </div>
        <br>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (!empty(session('status')))
            <div class="alert alert-success">
                {{ session('status') }} <a href="{{ url('/') }}">Вернуться на главную</a>.
            </div>
        @endif
        <div class="row">
            <div class="col-md-12" style="text-align: right">
                <button class="btn btn-success" type="submit">Сохранить</button>
            </div>
        </div>
    </form>
@endsection