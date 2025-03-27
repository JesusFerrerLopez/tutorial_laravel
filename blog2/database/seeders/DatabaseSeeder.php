<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
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

        User::factory()->create([
            'name' => 'jesus',
            'email' => 'jesusferrer@tallerempresarial.es',
            'password' => bcrypt('12345678'),
        ]);

        category::factory(10)->create();
        Post::factory(100)->create();
        Tag::factory(10)->create();
    }
}
