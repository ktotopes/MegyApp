<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'email' => 'user@gmail.com',
            'password' => 'password',
        ]);

        $this->call([
            UserSeeder::class,

            OrderSeeder::class,
            PopularQuestionSeeder::class,
            QuestionSeeder::class,
            PartnerSeeder::class,
            ContactSeeder::class,
            PageSeeder::class,
        ]);
    }
}
