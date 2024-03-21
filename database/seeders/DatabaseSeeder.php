<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory([
            'email'=> 'test@example.com',
            'password'=> 'password',
        ])->create();

        $this->call([
            CeoInfoSeeder::class,
            DeadManTextSeeder::class,
            ImageSeeder::class,
            InfoTheDeceasedSeeder::class,
            UserSeeder::class,
            OrderSeeder::class,
            VideoSeeder::class,
            PopularQuestionSeeder::class,
            QuestionSeeder::class,
            PartnersSeeder::class,
            ContactSeeder::class,
            HomePageSeeder::class
        ]);
    }
}
