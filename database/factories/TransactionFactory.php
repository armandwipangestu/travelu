<?php

namespace Database\Factories;

use App\Models\HolidayPackage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $payment_status = ['pending', 'paid', 'failed', 'waiting'];

        return [
            'user_id' => User::inRandomOrder()->value('id'),
            'package_id' => HolidayPackage::inRandomOrder()->value('id'),
            'transaction_date' => fake()->dateTimeBetween('-1 week', 'now'),
            'payment_status' => fake()->randomElement($payment_status),
            'midtrans_url' => 'https://app.sandbox.midtrans.com/snap/v4/redirection/' . fake()->uuid(),
            'midtrans_booking_code' => fake()->regexify('[0-9]-[0-9][A-Z][0-9]{3}')
        ];
    }
}
