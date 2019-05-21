<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin')
            ],
            [
                'name' => 'staff',
                'email' => 'staff@gmail.com',
                'password' => bcrypt('123456')
            ]
        ];
        DB::table('users')->insert($data);
    }
}