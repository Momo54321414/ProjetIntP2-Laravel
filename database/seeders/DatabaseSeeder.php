<?php namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'email' => 'Hi',
        //     'password' => '123',
        // ]);
        $this->call(UserSeeder::class);
    }
}