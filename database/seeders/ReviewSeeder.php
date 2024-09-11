<?php

namespace Database\Seeders;

use App\Models\HolidayPackage;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            'user_id' => User::where('name', 'Admin')->value('id'),
            'package_id' => HolidayPackage::where('title', 'Lorem Ipsum Dolor Sit Amet.')->value('id'),
            'rating' => 5,
            'comment' => fake()->text(100),
        ]);

        Review::factory(10)->create();
    }
}
