<?php

namespace Database\Seeders;

use App\Models\User;
use Filament\Commands\MakeUserCommand as FilamentMakeUserCommand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filamentMakeUserCommand = new FilamentMakeUserCommand();
        $reflector = new \ReflectionObject($filamentMakeUserCommand);

        $getUserModel = $reflector->getMethod('getUserModel');
        $getUserModel->setAccessible(true);
        $getUserModel->invoke($filamentMakeUserCommand)::create([
            'name' => 'Admin',
            'email' => 'admin@bwa.com',
            'password' => Hash::make('password'),
            'phone_number' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'remember_token' => Str::random(10),
            'avatar' => 'default.png'
        ]);

        User::factory(10)->create();
    }
}
