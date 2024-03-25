<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Grimzy\LaravelMysqlSpatial\Types\Point;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->first()?->id ?? User::factory(),
            'price' => $this->faker->numberBetween(100, 1000),
            'discountPrice' => $this->faker->numberBetween(100, 1000) / 1.5,
            'count' => $this->faker->numberBetween(1, 10),
            'fio' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'delivery' => $this->faker->sentence,
            'location' => new Point($this->faker->latitude, $this->faker->longitude),
            'address' => $this->faker->address,
        ];
    }
}
