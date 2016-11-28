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
        // 1 - Интеллектуальный
        // 2 - Физический
        // 3 - Навигационный
        // 4 - Технический
        // 5 - Личный
        // 6 - Другое

        $tasks = [
            [
                'title' => 'Выгулять собаку',
                'content' => 'Нужно выгулять собаку',
                'reward' => '700р.',
                'city' => 'Волжский',
                'user_id' => 1,
                'type_id' => 5
            ],
            [
                'title' => 'Перетащить диван на 7 этаж',
                'content' => 'Перетащить диван на 7 этаж',
                'reward' => '1000р.',
                'city' => 'Волгоград',
                'user_id' => 2,
                'type_id' => 2
            ],
            [
                'title' => 'Подвезите до Москвы',
                'content' => 'Мне нужно добраться до Москвы. Сидеть буду тихо.',
                'reward' => '1000р. и термос',
                'city' => 'Волжский',
                'user_id' => 3,
                'type_id' => 3
            ],
            [
                'title' => 'Сломался планшет',
                'content' => 'Сломался планшет asus. Нужно починить до понедельника.',
                'reward' => '500р.',
                'city' => 'Волжский',
                'user_id' => 4,
                'type_id' => 4
            ],
            [
                'title' => 'Написать реферат',
                'content' => 'Написать реферат. Тема: фантомные боли в плече и ноге',
                'reward' => 'Костыль с удобной ручкой',
                'city' => 'Лондон',
                'user_id' => 5,
                'type_id' => 1
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
