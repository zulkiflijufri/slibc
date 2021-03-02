<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin'
        ]);

        User::create([
            'name' => 'SLIBC',
            'email' => 'hi@slibc.com',
            'password' => bcrypt('password'),
            'role_id' => 1
        ]);
    }
}
