@extends('app.layout')

@section('title') Tasks @stop

@section('content')

    @foreach ($tasks as $task)
        Task Name: {{ $task->title }} <br>
        Task Content: {{ $task->content }} <br>
    @endforeach

@stop