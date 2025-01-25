<?php

namespace Database\Seeders;

use App\Models\Value;
use Illuminate\Database\Seeder;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Value::create([
            'attribute_id' => 1,
            'name' => [
                'uz' => 'Jigarrang',
                'ru' => 'Коричновый',
            ]]);
        Value::create([
            'attribute_id' => 2,
            'name' => [
                'uz' => 'MDF',
                'ru' => 'МДФ',
            ]]);
        Value::create([
            'attribute_id' => 1,
            'name' => [
                'uz' => 'LDSP',
                'ru' => 'ЛДСП',
            ],
        ]);
    }
}
