<?php

namespace Database\Factories;

use App\Models\HolidayPackage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rating = [1, 2, 3, 4, 5];

        return [
            'user_id' => User::inRandomOrder()->value('id'),
            'package_id' => HolidayPackage::inRandomOrder()->value('id'),
            'rating' => fake()->randomElement($rating),
            'comment' => fake()->text(100),
        ];
    }
}
