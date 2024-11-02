<?php

namespace Database\Seeders;

use App\Models\Hasil;
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
        User::factory(100)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'level' => 1,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'username' => 'testuser',
        ]);

        Hasil::factory(1000)->create();

        $this->call([
            GHQQuestionsSeeder::class,
            DASS21QuestionsSeeder::class,
            HSCL25QuestionsSeeder::class,
            HTQQuestionsSeeder::class
        ]);
    }
}
