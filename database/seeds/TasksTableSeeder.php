<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
            [
                'title' => 'Выгулять собаку',
                'content' => 'Нужно выгулять собаку',
                'reward' => '1000р.',
                'city' => 'Волжский',
                'user_id' => 1,
                'type_id' => 1
            ],
            [
                'title' => 'Перетащить диван на 7 этаж',
                'content' => 'Перетащить диван на 7 этаж',
                'reward' => '1000р.',
                'city' => 'Волгоград',
                'user_id' => 2,
                'type_id' => 2
            ],
        ];

        foreach ($tasks as $task)
        {
            Task::create([
                'title' => $task['title'],
                'content' => $task['content'],
                'reward' => $task['reward'],
                'user_id' => $task['user_id'],
                'type_id' => $task['type_id'],
                'city' => $task['city']
            ]);
        }
    }
}
