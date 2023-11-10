<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->users();
    }

    private function users()
    {
        $user = \App\Models\User::create([
            'isAdmin' => 1,
            'isRevisor' => 1,
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);

        $user = \App\Models\User::create([
            'isRevisor' => 1,
            'name' => 'Revisor',
            'email' => 'revisor@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);

        $user = \App\Models\User::create([
            'name' => 'User1',
            'email' => 'user1@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);
        $user = \App\Models\User::create([
            'name' => 'User2',
            'email' => 'user2@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);
    }
}
