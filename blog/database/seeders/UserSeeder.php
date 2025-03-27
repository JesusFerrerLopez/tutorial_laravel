<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();

        $user->name = 'Victor Arana';
        $user->email = 'victor@gmail.com';
        $user->password = bcrypt('12345');

        $user->save();

        // Utilización de factories
        User::factory(10)->create();
    }
}
