<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'Admin',
            'role_id' => 1,
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
    }
}
