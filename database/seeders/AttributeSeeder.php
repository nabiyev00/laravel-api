<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attribute::create(['name' => 'Color']);
        Attribute::create(['name' => 'Material']);
        Attribute::create(['name' => 'Size']);
    }
}
