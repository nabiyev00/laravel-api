<?php

namespace Database\Seeders;

use App\Models\DeliveryMethod;
use Illuminate\Database\Seeder;

class DeliveryMethodSeeder extends Seeder
{
    public function run(): void
    {
        DeliveryMethod::create([
            'name' => [
                'uz' => 'Bepul',
                'ru' => 'Бесплатно',
            ],
            'estimated_time' => 2880,
            'sum' => 0,
        ]);
        DeliveryMethod::create([
            'name' => [
                'uz' => 'Standart',
                'ru' => 'Стандартный',
            ],
            'estimated_time' => 1880,
            'sum' => 40000,
        ]);
        DeliveryMethod::create([
            'name' => [
                'uz' => 'Tez',
                'ru' => 'Быстрый',
            ],
            'estimated_time' => 2880,
            'sum' => 80000,
        ]);
    }
}
