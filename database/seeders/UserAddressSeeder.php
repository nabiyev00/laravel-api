<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::find(1)->userAddresses()->create([
            "latitude" => "41.00212650",
            "longitude" => "42.002023",
            "region" => "Tashkent",
            "district" => "Mirabad",
            "street" => "Mingurik",
            "home" => "286"
        ]);
    }
}
