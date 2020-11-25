<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'name' => 'admin',
            'email' => 'admin@hypetalk.com',
            'password' => Hash::make('admin')
        ]);
        User::create([
            'name' => 'pepa',
            'email' => 'pepa@hypetalk.com',
            'password' => Hash::make('pepa')
        ]);
        User::create([
            'name' => 'sosi',
            'email' => 'sosi@hypetalk.com',
            'password' => Hash::make('sosi')
        ]);
        User::create([
            'name' => 'felmox',
            'email' => 'felmox@hypetalk.com',
            'password' => Hash::make('felmox')
        ]);
        User::create([
            'name' => 'majsner',
            'email' => 'majsner@hypetalk.com',
            'password' => Hash::make('majsner')
        ]);
    }
}
