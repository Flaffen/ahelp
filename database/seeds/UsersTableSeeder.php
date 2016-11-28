<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Степан Паламарчук',
                'email' => 'webocono@gmail.com',
                'tel' => '89053307804',
                'password' => bcrypt('12345')
            ],
            [
                'name' => 'Ваня Иванов',
                'email' => 'vanya@mail.ru',
                'tel' => '89966666667',
                'password' => bcrypt('12345')
            ],
            [
                'name' => 'Петя Петров',
                'email' => 'petrov@mail.ru',
                'tel' => '88776655443',
                'password' => bcrypt('12345')
            ],
            [
                'name' => 'Алексей Алексеич',
                'email' => 'lexatawer@gmail.com',
                'tel' => '88888888881',
                'password' => bcrypt('12345')
            ],
            [
                'name' => 'Д. Ватсон',
                'email' => 'john@watsonblog.com',
                'tel' => '457871234567',
                'password' => bcrypt('12345')
            ],
        ];

        foreach ($users as $user)
        {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'tel' => $user['tel'],
                'password' => $user['password'],
            ]);
        }
    }
}
