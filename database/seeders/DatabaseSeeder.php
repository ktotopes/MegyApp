<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\InfoTheDeceased;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CeoInfoSeeder::class,
            DeadManTextSeeder::class,
            InfoTheDeceasedSeeder::class,
            UserSeeder::class,
            OrderSeeder::class,
            PopularQuestionSeeder::class,
            QuestionSeeder::class,
            PartnersSeeder::class,
            ContactSeeder::class,
            HomePageSeeder::class,
        ]);

        User::factory([
            'email' => 'test@example.com',
            'password' => 'password',
        ])->create();

    }
}
