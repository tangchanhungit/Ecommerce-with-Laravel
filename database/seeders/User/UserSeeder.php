<?php

namespace Database\Seeders\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            ['first_name' =>'Chan Hung',
                'last_name' => 'Tang',
                'email'=>'tangchanhung@gmail.com',
                'password'=>Hash::make('123456'),
                'status' => 1,
                'img'=>'null',
            ],
        ]);

        User::factory()->count(10)->create(); // Create 10 users

    }
}
