<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            [
                'link' => 'https://www.1mg.com/',
                'name' => 'wildBerries',
            ],
            [
                'link' => 'https://www.1mg.com/',
                'name' => 'Ozon',
            ],
        ];

        foreach ($arr as $item) {
            Partner::create([
                'link' => $item['link'],
                'name' => $item['name'],
            ]);
        }
    }
}
