<?php

namespace Database\Factories;

use App\Models\InfoTheDeceased;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeadManText>
 */
class DeadManTextFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'text' =>  $this->faker->text(),
            'textable_id' =>  InfoTheDeceased::factory()->create()?->id ?? InfoTheDeceased::factory(),
            'textable_type' => InfoTheDeceased::class
        ];
    }
}
