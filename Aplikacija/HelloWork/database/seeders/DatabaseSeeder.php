<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Djordje Ivanovic',
            'email' => 'idjordje63@gmail.com',
            'password' => Hash::make('djordje002'),
            'type' => '1'
        ]);
        User::create([
            'name' => 'Aleksa Jovanovic',
            'email' => 'jaleksa388@gmail.com',
            'password' => Hash::make('aleksa2002'),
            'type' => '1'
        ]);
        User::create([
            'name' => 'David Stanojevic',
            'email' => 'david.stanojevic@elfak.rs',
            'password' => Hash::make('david2002'),
            'type' => '1'
        ]);
    }
}
