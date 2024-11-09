<?php

namespace Database\Seeders;

use App\Models\Category;
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
        // User::factory(10)->create();

        // Create an admin user
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'level' => 'admin',
            'password' => bcrypt('12341234')
        ]);

        // Create a regular user
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@user.com',
            'level' => 'user',
            'password' => bcrypt('12341234')
        ]);

        // Category::factory()->create([
        //     'name' => 'terodaktil'
        // ]);
    }
}
