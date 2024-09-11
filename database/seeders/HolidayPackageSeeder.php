<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Destination;
use App\Models\HolidayPackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HolidayPackageSeeder extends Seeder
{
    private function generateAvailableFrom()
    {
        return fake()->dateTimeBetween('-1 years', 'now');
    }

    private function generateAvailableTo()
    {
        $available_from = $this->generateAvailableFrom();
        return fake()->dateTimeBetween($available_from, 'now');
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HolidayPackage::create([
            'category_id' => Category::where('name', 'Romantic')->value('id'),
            'banner' => 'default-holiday-package.png',
            'title' => 'Lorem Ipsum Dolor Sit Amet.',
            'description' => fake()->text(100),
            'price' => fake()->randomFloat(2, 100, 10000),
            'destination_id' => Destination::inRandomOrder()->value('id'),
            'available_from' => $this->generateAvailableFrom()->format('Y-m-d'),
            'available_to' => $this->generateAvailableTo()->format('Y-m-d'),
        ]);

        HolidayPackage::create([
            'category_id' => Category::where('name', 'City Tour')->value('id'),
            'banner' => 'default-holiday-package-2.png',
            'title' => 'Nemo ducimus cum, eos culpa quasi quae.',
            'description' => fake()->text(100),
            'price' => fake()->randomFloat(2, 100, 10000),
            'destination_id' => Destination::inRandomOrder()->value('id'),
            'available_from' => $this->generateAvailableFrom()->format('Y-m-d'),
            'available_to' => $this->generateAvailableTo()->format('Y-m-d'),
        ]);

        HolidayPackage::factory(10)->create();
    }
}
