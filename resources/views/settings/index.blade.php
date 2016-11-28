@extends('app.layout')

@section('title'){{ Auth::user()->name }}@endsection

@section('links')
    <link rel="stylesheet" href="/css/profile.css">
@endsection

@section('content')
    <div class="profile-wrap">
        <form action="{{ url('/settings') }}" method="POST" id="settings-form" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3">
                    <div class="profile-photo">
                        <img src="{{ asset('storage/user_images/' . Auth::user()->img) }}" alt="{{ Auth::user()->name }}" style="border-radius: 5px; width: 250px; height: 250px;">
                        <figcaption>
                            <input type="file" class="form-control-file" name="photo" style="padding-top: 15px;">
                        </figcaption>
                    </div>
                </div>
                <div class="col-md-9">
                    {{ Auth::user()->name }}
                    <br>
                    <hr>
                    <h6>Текущие настройки:</h6>
                    {{ Auth::user()->email }}
                    <br>
                    {{ Auth::user()->tel }}
                    <hr>
                </div>
                <div class="col-md-3">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="email">Номер телефона:</label>
                        <input type="text" class="form-control" name="tel">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="old_password">Старый пароль:</label>
                        <input type="text" name="old_password" class="form-control" id="old_password">
                    </div>
                    <div class="form-group">
                        <label for="new_password">Новый пароль:</label>
                        <input type="text" name="new_password" class="form-control" id="new_password">
                    </div>
                </div>
                <div class="col-md-3 float-md-right">
                    <button class="btn btn-success float-md-right" id="save">Сохранить</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9 float-md-right">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-9 float-md-right">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-md-9 float-md-right">
                <h2>Ваши объявления:</h2>
                @foreach (Auth::user()->tasks as $task)
                    <h4>{{ $task->title }}</h4>
                    <p>{{ $task->content }}</p>
                    <p>{{ $task->city }}</p>
                    <p>{{ $task->reward }}</p>
                    <form action="{{ url('/task/delete/' . $task->id) }}" method="POST">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger" type="submit">Удалить</button>
                        <a href="{{ url('/task/' . $task->id . '/edit') }}">
                            <button class="btn btn-primary" type="button">Редактировать</button>
                        </a>
                    </form>
                    <hr>
                @endforeach
            </div>
        </div>

        <!-- Change Password Modal -->
        <div class="modal fade" id="password-modal" role="dialog" aria-hidden="true">
            <form action="{{ url('/settings') }}" method="POST">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">Смена пароля</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ csrf_field() }}
                                        <label for="old-password">Старый пароль:</label>
                                        <input class="form-control" type="text" id="old-password" name="old_password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="new-password">Новый пароль:</label>
                                        <input type="password" class="form-control" id="new-password" name="new_password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    {{ session('message') }}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary" >Сменить пароль</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /Change Password Modal -->

    </div>
@endsection