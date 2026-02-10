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

        User::factory()->create([
            'first_name' => 'test',
            'last_name' => 'user',
            'username' => 'testuser',
            'nickname' => 'testnick',
            'email' => 'test@gmail.com',
            'account_type' => 'standard',
            'password' => 'qweqweqwe',
        ]);
    }
}
