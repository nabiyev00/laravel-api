<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '+998909009090',
            'password' => Hash::make('password'),
        ])->roles()->attach(1);

        User::factory()->count(10)->hasAttached(Role::find(2))->create();
    }
}
