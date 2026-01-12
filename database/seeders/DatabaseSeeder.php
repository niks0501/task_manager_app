<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $password = 'nikko';

        //create 5 users
        User::factory()
            ->count(5)
            ->create()
            ->each(function ($user) use ($password) {
                $user->password = bcrypt($password);
                $user->save();
            });
    }
}
