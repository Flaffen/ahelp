<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Type;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::get();

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function show(Task $task) 
    {
        return view('tasks.show', ['task' => $task]);
    }

    public function create(Request $request)
    {
        if (!$request->user()->tel) {
            return redirect('/settings')->with('status', 'Вам нужно указать номер телефона чтобы создавать объявления!');
        }

        return view('tasks.create', [
            'types' => Type::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:65',
            'city' => 'required|max:65',
            'description' => 'required|max:400',
            'reward' => 'required|max:65'
        ], [
            'title.required' => 'Заполните заголовок объявления.',
            'city.required' => 'Впишите свой город.',
            'description.required' => 'Введите описание объявления.',
            'reward.required' => 'Назначьте награждение.'
        ]);

        $req = Task::create([
            'title' => $request->title,
            'content' => $request->description,
            'reward' => $request->reward,
            'city' => $request->city,
            'type_id' => $request->type,
            'user_id' => $request->user()->id
        ]);

        if ($req)
        {
            return redirect('/');
        } else {
            return back()->with('status', 'Что-то пошло не так! Попробуйте позже!');
        }
    }

    public function delete(Request $request, Task $task)
    {
        if ($task->user_id == $request->user()->id)
        {
            $task->delete();
            return back()->with('status', 'Объявление успешно удалено!');
        }
    }

    public function phone(Request $request, Task $task)
    {
        return response()->json($task->user->tel);
    }
}
