<?php

namespace Database\Seeders;

use App\Models\DeadManText;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeadManTextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeadManText::factory()->count(10)->create();
    }
}
