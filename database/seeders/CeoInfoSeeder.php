<?php

namespace Database\Seeders;

use App\Models\CeoInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CeoInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CeoInfo::factory(1)
            ->create();
    }
}
