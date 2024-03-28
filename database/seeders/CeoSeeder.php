<?php

namespace Database\Seeders;

use App\Models\Ceo;
use Illuminate\Database\Seeder;

class CeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            [
                'title' => '',
                'description' => '',
                'h1' => '',
            ],
            [
                'title' => '',
                'description' => '',
                'h1' => '',
            ],
        ];

        foreach ($arr as $item) {
            Ceo::create([
                'title' => '',
                'description' => '',
                'h1' => '',
            ]);
        }
    }
}
