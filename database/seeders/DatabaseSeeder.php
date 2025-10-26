<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // We are calling our newly created seeder here.
        $this->call([
            MenuItemSeeder::class,
        ]);

        // Use firstOrCreate to prevent duplicate user errors on subsequent seeding.
        // It checks for a user with the given email and only creates one if it doesn't exist.
        User::firstOrCreate(
            ['email' => 'test@example.com'], // The unique attribute to find the user by.
            [
                'name' => 'Test User', // Data to use if creating a new user.
                'password' => Hash::make('password'), // Always set a default password.
            ]
        );
    }
}
