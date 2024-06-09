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
        User::create([
            'name' => 'Aurora',
            'email' => 'idjordje63@gmail.com',
            'password' => Hash::make('djordje002'),
            'type' => '2'
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
