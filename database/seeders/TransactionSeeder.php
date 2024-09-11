<?php

namespace Database\Seeders;

use App\Models\HolidayPackage;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::create([
            'user_id' => User::where('name', 'Admin')->value('id'),
            'package_id' => HolidayPackage::where('title', 'Lorem Ipsum Dolor Sit Amet.')->value('id'),
            'transaction_date' => fake()->dateTimeBetween('-1 week', 'now'),
            'payment_status' => 'paid',
            'midtrans_url' => 'https://app.sandbox.midtrans.com/snap/v4/redirection/' . fake()->uuid(),
            'midtrans_booking_code' => fake()->regexify('[0-9]-[0-9][A-Z][0-9]{3}'),
        ]);

        Transaction::factory(10)->create();
    }
}
