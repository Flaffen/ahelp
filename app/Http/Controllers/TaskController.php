<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index() 
    {
        $tasks = Task::get();

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function show(Task $task) 
    {
        return view('tasks.show', ['task' => $task]);
    }
}
