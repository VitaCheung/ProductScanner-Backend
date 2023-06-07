<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SavedItems>
 */
class SavedItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'UPC' => $this->faker->numerify('############'),
            'name' => $this->faker->sentence,
            'brand' => $this->faker->word,
            'img' => $this->faker->url,
            'user_id' => User::all()->random(),
        ];
    }
}
