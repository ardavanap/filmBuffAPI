<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->name(),
            "description" => $this->faker->text(),
            "release_year" => $this->faker->year('now'),
            "duration" => $this->faker->randomNumber(4, true),
            "poster" => $this->faker->imageUrl(),
            "trailer_url" => $this->faker->url(),
            "category_id" => $this->faker->numberBetween(1,19)
        ];
    }
}
