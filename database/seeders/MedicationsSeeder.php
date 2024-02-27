<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class MedicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medications')->insert([[
            'name' => 'Acetaminophen',
            'function' => 'Pain Reliever',
            'isInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Ibuprofen',
            'function' => 'Pain Reliever',
            'isInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Aspirin',
            'function' =>'Pain Reliever',
            'isInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Diphenhydramine',
            'function' => 'Antihistamine',
            'isInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Loratadine',
            'function' => 'Antihistamine',
            'isInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Cetirizine',
            'function' => 'Antihistamine',
            'isInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Ranitidine',
            'function' => 'Antacid',
            'isInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Omeprazole',
            'function' => 'Antacid',
            'isInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Lansoprazole',
            'function' => 'Antacid',
            'isInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Famotidine',
            'function' => 'Antacid',
            'isInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]

        ]);
    }
}
