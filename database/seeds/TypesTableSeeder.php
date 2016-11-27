<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Интеллектуальный',
            'Физический',
            'Навигационный',
            'Технический',
            'Личный',
            'Другое'
        ];

        foreach ($types as $type)
        {
            Type::create([
                'name' => $type
            ]);
        }
    }
}
