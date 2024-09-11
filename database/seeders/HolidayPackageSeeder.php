<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Destination;
use App\Models\HolidayPackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HolidayPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $available_from = fake()->dateTimeBetween('-1 years', 'now');
        $available_to = fake()->dateTimeBetween($available_from, '+1 years');

        HolidayPackage::create([
            'category_id' => Category::where('name', 'Romantic')->value('id'),
            'banner' => 'default-holiday-package.png',
            'title' => fake()->text(30),
            'description' => fake()->text(100),
            'price' => fake()->randomFloat(2, 100, 10000),
            'destination_id' => Destination::inRandomOrder()->value('id'),
            'available_from' => $available_from->format('Y-m-d'),
            'available_to' => $available_to->format('Y-m-d'),
        ]);

        HolidayPackage::factory(10)->create();
    }
}
