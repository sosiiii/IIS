<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Group;
use App\Models\Role;

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
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
        User::create([
            'name' => 'admin',
            'email' => 'admin@hypetalk.com',
            'password' => Hash::make('admin')
        ])->roles()->attach($adminRole);
        User::create([
            'name' => 'majsner',
            'email' => 'majsner@hypetalk.com',
            'password' => Hash::make('majsner')
        ])->roles()->attach($adminRole);
        User::create([
            'name' => 'pepa',
            'email' => 'pepa@hypetalk.com',
            'password' => Hash::make('pepa')
        ])->roles()->attach($userRole);
        User::create([
            'name' => 'sosi',
            'email' => 'sosi@hypetalk.com',
            'password' => Hash::make('sosi')
        ])->roles()->attach($userRole);
        User::create([
            'name' => 'felmox',
            'email' => 'felmox@hypetalk.com',
            'password' => Hash::make('felmox')
        ])->roles()->attach($userRole);
    }
}
