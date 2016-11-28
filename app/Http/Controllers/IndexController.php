<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Type;

class IndexController extends Controller
{
    // TODO: ВЕСЬ МЕТОД И ВЬЮХА - КОСТЫЛЬ. ИСПРАВЬ, НЕ ПОЗОРЬСЯ!
    public function index(Request $request)
    {
        $tasks = [];

        if (count($request->all()) > 1) {
            foreach ($request->all() as $k=>$v) {
                if ($k == '_token') continue;
                $checked[] = $k;

                foreach (Task::where('type_id', $v)->get() as $task) {
                    $tasks[] = $task;
                }
            }
        } else {
            $checked = [];
            $tasks = Task::latest()->get();
        }

        $types = Type::get();

        return view('index', ['tasks' => $tasks, 'types' => $types, 'checked' => $checked]);
    }
}
