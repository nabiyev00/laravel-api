<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    public function run(): void
    {
        PaymentType::create([
            'name' => [
                'uz' => 'Naqd',
                'ru' => 'Наличные',
            ],
        ]);
        PaymentType::create([
            'name' => [
                'uz' => 'Terminal',
                'ru' => 'Терминал',
            ],
        ]);
        PaymentType::create([
            'name' => [
                'uz' => 'Click',
                'ru' => 'Click',
            ],
        ]);
        PaymentType::create([
            'name' => [
                'uz' => 'Paymi',
                'ru' => 'Paymi',
            ],
        ]);
        PaymentType::create([
            'name' => [
                'uz' => 'Uzum',
                'ru' => 'Uzum',
            ],
        ]);
    }
}
