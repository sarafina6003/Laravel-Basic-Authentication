<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Martynas',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
    }
}
