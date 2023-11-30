<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'manager',
                'email' => 'manager@gmail.com',
                'password' => bcrypt('manager'),
                'role' => 'manager',
            ],
            [
                'name' => 'kasir',
                'email' => 'kasir@gmail.com',
                'password' => bcrypt('kasir'),
                'role' => 'kasir',
            ],
            [
                'name' => 'chef',
                'email' => 'chef@gmail.com',
                'password' => bcrypt('chef'),
                'role' => 'chef',
            ]
        );
    }
}
