<?php

namespace Database\Seeders;

use App\Models\HolidayPackage;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CountrySeeder::class,
            CategorySeeder::class,
            DestinationSeeder::class,
            HolidayPackageSeeder::class,
            TransactionSeeder::class,
        ]);
    }
}
