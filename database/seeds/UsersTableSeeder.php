<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10) . '@gmail.com',
            'tel' => rand(0, 100000),
            'img' => str_random(6) . '.png',
            'password' => bcrypt('secret')
        ]);

        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10) . '@gmail.com',
            'tel' => rand(0, 100000),
            'img' => str_random(6) . '.png',
            'password' => bcrypt('secret')
        ]);
    }
}
