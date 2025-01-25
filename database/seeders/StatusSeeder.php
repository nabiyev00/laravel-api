<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{

    public function run(): void
    {
        Status::create([
            'name' => [
                'uz' => 'Yangi',
                'ru' => 'Новые',
            ],
            'code' => 'new',
            'for' => 'order'
        ]);
        Status::create([
            'name' => [
                'uz' => 'Tasdiqlangan',
                'ru' => 'Новые',
            ],
            'code' => 'confirmed',
            'for' => 'order'
        ]);
        Status::create([
            'name' => [
                'uz' => 'Tayyorlanmoqda',
                'ru' => 'Новые',
            ],
            'code' => 'processing',
            'for' => 'order'
        ]);
        Status::create([
            'name' => [
                'uz' => 'Yetkazib berilyapti',
                'ru' => 'Новые',
            ],
            'code' => 'shipping',
            'for' => 'order'
        ]);
        Status::create([
            'name' => [
                'uz' => 'Yetkazib berildi',
                'ru' => 'Новые',
            ],
            'code' => 'delivered',
            'for' => 'order'
        ]);
        Status::create([
            'name' => [
                'uz' => 'Tugatildi',
                'ru' => 'Новые',
            ],
            'code' => 'completed',
            'for' => 'order'
        ]);
        Status::create([
            'name' => [
                'uz' => 'Yopildi',
                'ru' => 'Новые',
            ],
            'code' => 'closed',
            'for' => 'order'
        ]);
        Status::create([
            'name' => [
                'uz' => 'Bekor qilindi',
                'ru' => 'Новые',
            ],
            'code' => 'cancelled',
            'for' => 'order'
        ]);
        Status::create([
            'name' => [
                'uz' => 'Yopildi',
                'ru' => 'Новые',
            ],
            'code' => 'refunded',
            'for' => 'order'
        ]);
        Status::create([
            'name' => [
                'uz' => 'To\'lov kutilmoqda',
                'ru' => 'Новые',
            ],
            'code' => 'payment_waiting',
            'for' => 'order'
        ]);
        Status::create([
            'name' => [
                'uz' => 'To\'landi',
                'ru' => 'Новые',
            ],
            'code' => 'paid',
            'for' => 'order'
        ]);
        Status::create([
            'name' => [
                'uz' => 'Tp\'lovda xato',
                'ru' => 'Новые',
            ],
            'code' => 'payment_error',
            'for' => 'order'
        ]);
    }
}
