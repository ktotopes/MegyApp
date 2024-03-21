<?php

namespace Database\Seeders;

use App\Models\Deceased;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeceasedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Deceased::factory(20)->create();
    }
}
