<?php

namespace Database\Seeders\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role_user')->insert([
            ['role_id' => '1',
                'user_id' => '1'
            ],
        ]);

        $users = User::all();
        $roles = Role::all();

        // Attach roles to users
        $users->each(function ($user) use ($roles) {
            $user->roles()->attach(
                $roles->random(1)->pluck('id')->toArray()
            );
        });
    }
}
