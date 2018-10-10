<?php

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
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345'),
                'is_admin' => true,
            ],
            [
                'id' => 2,
                'name' => 'yen',
                'email' => 'yen@gmail.com',
                'password' => bcrypt('12345'),
                'is_admin' => false,
            ]
        ]);
    }
}
