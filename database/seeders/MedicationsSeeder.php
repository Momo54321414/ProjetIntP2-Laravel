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
        ],
        [
            'name' => 'Cortef',
            'function' => 'Supplemental Steroid Treatment',
            'isInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Florinef',
            'function' => 'Supplemental Steroid Treatment',
            'isInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Synthroid',
            'function' => 'Hypothyroidism treatment',
            'isInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Vitamin D',
            'function' => 'Vitamin Supplemental Treatment',
            'isInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Hummalog',
            'function' => 'Type 1 Diabetes Treatment Insulin Injection',
            'isInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Tresciba',
            'function' => 'Type 1 Diabetes Treatment Insulin Injection',
            'isInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Dexcom G6 Sensor',
            'function' => 'Type 1 Diabetes Treatment Insulin Sensor',
            'isInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'DexcomG5 Tansmitter',
            'function' => 'Type 1 Diabetes Treatment Insulin Transmitter',
            'isInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        

        ]);
    }
}
