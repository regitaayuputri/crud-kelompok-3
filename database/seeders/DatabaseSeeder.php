<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
    
        \App\Models\Barang::factory()->count(25)->create();
    }
}
