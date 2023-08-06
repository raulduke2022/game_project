<?php

namespace Database\Factories;
use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Game::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->city,
            'description' => $this->faker->text,
            'price' => $this->faker->numberBetween(1, 10000),
            'introduction' => $this->faker->text,
        ];
    }
}
