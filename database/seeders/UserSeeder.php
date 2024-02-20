<?php namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Marc Pépin',
                'email' => '123@123',
                'password' => bcrypt('123'),
                'profile_photo_path' => '',
            ],
        ]);
    }
}