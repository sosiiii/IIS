<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Group;
use App\Models\User;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::truncate();
        DB::table('group_user')->truncate();
        $admin = User::where('name', 'admin')->first();
        $group = $admin->groups()->create([
            'name' => 'awww',
            'description' => ''
        ]);
        $member = $group->members()->find($admin->id);;
        $member->pivot->role = 'admin';
        $member->pivot->save();

        $group = $admin->groups()->create([
            'name' => 'Politics',
            'description' => ''
        ]);
        $member = $group->members()->find($admin->id);;
        $member->pivot->role = 'admin';
        $member->pivot->save();

        $admin = User::where('name', 'sosi')->first();
        $group = $admin->groups()->create([
            'name' => 'Gaming',
            'description' => ''
        ]);
        $member = $group->members()->find($admin->id);;
        $member->pivot->role = 'admin';
        $member->pivot->save();

        $group = $admin->groups()->create([
            'name' => 'World News',
            'description' => ''
        ]);
        $member = $group->members()->find($admin->id);;
        $member->pivot->role = 'admin';
        $member->pivot->save();

        $group = $admin->groups()->create([
            'name' => 'Jokes',
            'description' => ''
        ]);
        $member = $group->members()->find($admin->id);;
        $member->pivot->role = 'admin';
        $member->pivot->save();
    }
}
