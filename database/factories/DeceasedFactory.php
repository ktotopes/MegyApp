<?php

namespace Database\Factories;

use App\Models\Block;
use App\Models\Deceased;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeceasedFactory extends Factory
{
    public function configure(): static
    {
        return $this->afterCreating(function (Deceased $deceased) {
            Block::factory(5)->withDeceased($deceased)->create();
        });
    }

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'background_img' => $this->faker->imageUrl(640, 480, 'animals', true),
            'fio' => $this->faker->name,
            'slug' => $this->faker->slug,
            'photo' => $this->faker->imageUrl(640, 480, 'animals', true),
            'title' => $this->faker->title,
            'date_death' => $this->faker->date(),
            'date_birthday' => $this->faker->date(),
            'coordinates' => $this->faker->address,
        ];
    }

    public function withUser(User $user): static
    {
        return $this->state(fn(array $attributes) => [
            'user_id' => $user->id,
        ]);
    }
}
