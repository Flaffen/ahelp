<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'title' => 'Random task: ' . str_random(10),
            'content' => 'Random content: ' . str_random(15),
            'reward' => '$' . rand(0, 1000),
            'city' => 'city ' . str_random(6),
            'user_id' => 1,
            'type_id' => 1
        ]);

        DB::table('tasks')->insert([
            'title' => 'Random task: ' . str_random(10),
            'content' => 'Random content: ' . str_random(15),
            'reward' => '$' . rand(0, 1000),
            'city' => 'city ' . str_random(6),
            'user_id' => 2,
            'type_id' => 2
        ]);

        DB::table('tasks')->insert([
            'title' => 'Random task: ' . str_random(10),
            'content' => 'Random content: ' . str_random(15),
            'reward' => '$' . rand(0, 1000),
            'city' => 'city ' . str_random(6),
            'user_id' => 1,
            'type_id' => 2
        ]);
    }
}
