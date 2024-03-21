<?php

namespace Database\Seeders;

use App\Models\PopularQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PopularQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PopularQuestion::factory()->count(10)->create();
    }
}
