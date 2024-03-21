<?php

namespace Database\Seeders;

use App\Models\InfoTheDeceased;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfoTheDeceasedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InfoTheDeceased::factory()
            ->count(10)
            ->create();
    }
}
