<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@kostceria.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin'
            ],
            [
                'name' => 'Alim',
                'email' => 'alim@kostceria.com',
                'password' => bcrypt('alim123'),
                'role' => 'user'
            ],
            [
                'name' => 'Deny',
                'email' => 'deny@kostceria.com',
                'password' => bcrypt('deny123'),
                'role' => 'user'
            ],
            [
                'name' => 'Yusuf',
                'email' => 'yusuf@kostceria.com',
                'password' => bcrypt('yusuf123'),
                'role' => 'user'
            ]
        ];

        foreach ($users as $user){
            DB::table('users')->insert($user);
        }
    }
}
