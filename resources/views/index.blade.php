@extends('app.layout')

@section('title')Главная Страница@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 main-heading">
            <h2>volhelp.ru - главная страница</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 categories">
            <div>
                <p class="text-muted">Фильтр:</p>
                <form action="{{ url('/') }}" method="POST">
                    {{ csrf_field() }}
                    @foreach ($types as $type)
                        <input type="checkbox" name="type_{{ $type->id }}" value="{{ $type->id }}"
                        @if (!empty($checked))
                            @foreach ($checked as $elem)
                                @if ($elem == 'type_' . $type->id)
                                    {!! 'checked' !!}
                                @endif
                            @endforeach
                        @endif
                        >
                        {{ $type->name }}
                    @endforeach
                    <div class="float-md-right categories-submit">
                        <button class="btn btn-success" type="submit">Применить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">

            {{--<p class="bg-info">--}}
                {{--<blockquote>--}}
                    {{--<h2>Выберите тип услуги:</h2>--}}
                    {{--<cite title="Source Title">(Это Вам поможет эффективнее найти помощь)</cite>--}}
                    {{--<br>--}}
                    {{--<div class="bot">--}}
                        {{--<input type="checkbox" id="inlineCheckbox1" value="option1">Интеллектуальный--}}
                        {{--<input type="checkbox" id="inlineCheckbox1" value="option1">Физический--}}
                        {{--<input type="checkbox" id="inlineCheckbox1" value="option1">Технический--}}
                        {{--<input type="checkbox" id="inlineCheckbox1" value="option1">Навигационый--}}
                        {{--<input type="checkbox" id="inlineCheckbox1" value="option1">Личный--}}
                        {{--<input type="checkbox" id="inlineCheckbox1" value="option1">Другое--}}
                    {{--</div>--}}
                    {{--</br>--}}
                {{--</blockquote>--}}
            {{--</p>--}}
            {{--
            <div class="top">
                <div class="form-group form-group-lg">
                    <h5 class="col-sm-2 control-label" for="formGroupInputLarge">Примечания:</h5>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" id="formGroupInputLarge" placeholder="Примечания">
                    </div>
                </div>
            </div>
            --}}
        <div class="col-md-12">
            <h3>Последние добавления: </h3>
        </div>

        {{--<div class="gomer">--}}
            {{--<h3>Последние добавления:</h3>--}}
            {{--<hr align="left" width="700" size="200" color="skyblue">--}}
        {{--</div>--}}

        @foreach ($tasks as $task)
            <div class="col-md-12 item">
                <div class="col-md-2" style="text-align: center;">
                    <img src="{{ asset('storage/user_images/' . $task->user->img)  }}" alt="{{ $task->user->name }}" width="125" height="125" class="img-circle">
                    <figcaption style="text-align: center;">{{ $task->user->name }}</figcaption>
                </div>
                <div class="col-md-10">
                    <div class="float-md-right"><i class="fa fa-clock-o"></i> {{ $task->created_at->format('d.m.Y') }}</div>
                    <h5>{{ $task->title }}</h5>
                </div>
                <div class="col-md-10">
                    <p>{{ $task->content }}</p>
                </div>
                <div class="col-md-10">
                    <p style="color: #2ecc71"><i class="fa fa-rub"></i> {{ $task->reward }}</p>
                </div>
                <div class="col-md-10">
                    <p>{{ $task->type->name }}</p>
                    @if (Auth::guest())
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#reg-modal">Номер телефона</button>
                    @elseif (Auth::user()->id === $task->user->id)
                        <a href="{{ url('/settings') }}">
                            <button type="button" class="btn btn-danger">В настройки</button>
                        </a>
                    @else
                        <button type="button" class="btn btn-danger" onclick="getPhone({{ $task->id }});" id="{{ $task->id }}">Номер телефона</button>
                    @endif
                </div>
                {{--<img src="{{ asset('storage/user_images/' . $task->user->img) }}" width="50" height="50" class="img-circle">--}}
                {{--<a href="{{ url("user/{$task->user->id}") }}">{{ $task->user->name }}</a>--}}
                {{--<h5><strong>{{ $task->title }}</strong></h5><br>--}}
                {{--<h6><strong>Тип:</strong>{{ $task->type->name }}</h6><br>--}}

                {{--<p>{{ $task->content }}</p><br>--}}
                {{--<p><img src="http://icons.iconarchive.com/icons/martz90/circle/512/phone-icon.png" width="30" height="30" class="img-circle"><strong>Телефон:</strong>{{ $task->user->tel }}</p><br>--}}
                {{--<p><img src="https://cdn2.iconfinder.com/data/icons/smart-city-vol-4-2/32/gogreen_green_city_greencity_smart_city_bulding-512.png" width="30" height="30" class="img-circle"><strong>Город:</strong>{{ $task->city }}</p><br>--}}
                {{--<p><img src="https://www.grupodinamica.com.br/wp-content/uploads/sites/207/2015/03/money-flat.png" width="30" height="30" class="img-circle"><strong>Вознаграждение:</strong>{{ $task->reward }}</p><br>--}}
                {{--@if (Auth::guest())--}}
                    {{--<button type="button" class="btn btn-danger">Помочь!</button>--}}
                {{--@elseif (Auth::user()->id === $task->user->id)--}}
                    {{--<a href="{{ url('/settings') }}">--}}
                        {{--<button type="button" class="btn btn-danger">В настройки</button>--}}
                    {{--</a>--}}
                {{--@else--}}
                    {{--<button type="button" class="btn btn-danger" onclick="getPhone({{ $task->id }});" id="{{ $task->id }}">Помочь!</button>--}}
                {{--@endif--}}
            </div>
        @endforeach
    </div>
    <div class="modal fade" id="reg-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Вам нужно зарегестрироваться!</h4>
                </div>
                <div class="modal-body">
                    <p>Вам нужно зарегестрироваться или войти чтобы узнать номер телефона!</p>
                    <a href="{{ url('/reg') }}">
                        <button type="button" class="btn btn-primary">Зарегестрироваться</button>
                    </a>
                    <a href="{{ url('/login') }}">
                        <button type="button" class="btn btn-primary">Войти</button>
                    </a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
@endsection