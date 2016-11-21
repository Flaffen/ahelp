@extends('app.layout')

@section('title') Task {{ $task->name }} @stop

@section('content')

    Task once name: {{ $task->title }} <br>
    Task Content: {{ $task->content }} <br>

@stop