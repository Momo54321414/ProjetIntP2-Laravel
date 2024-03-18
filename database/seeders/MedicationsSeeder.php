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
            'canBeInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Ibuprofen',
            'function' => 'Pain Reliever',
            'canBeInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Aspirin',
            'function' =>'Pain Reliever',
            'canBeInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Diphenhydramine',
            'function' => 'Antihistamine',
            'canBeInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Loratadine',
            'function' => 'Antihistamine',
            'canBeInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Cetirizine',
            'function' => 'Antihistamine',
            'canBeInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Ranitidine',
            'function' => 'Antacid',
            'canBeInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Omeprazole',
            'function' => 'Antacid',
            'canBeInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Lansoprazole',
            'function' => 'Antacid',
            'canBeInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Famotidine',
            'function' => 'Antacid',
            'canBeInPillBox' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Cortef',
            'function' => 'Supplemental Steroid treatment',
            'canBeInPillBox' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Florinef',
            'function' => 'Supplemental Steroid treatment',
            'canBeInPillBox' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Synthroid',
            'function' => 'Hypothyroidism treatment',
            'canBeInPillBox' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Vitamin D',
            'function' => 'Vitamin Supplemental treatment',
            'canBeInPillBox' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Hummalog',
            'function' => 'Type 1 Diabetes treatment insulin injection',
            'canBeInPillBox' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Tresciba',
            'function' => 'Type 1 Diabetes treatment insulin injection',
            'canBeInPillBox' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'Dexcom G6 Sensor',
            'function' => 'Type 1 Diabetes treatment insulin sensor',
            'canBeInPillBox' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'name' => 'DexcomG5 Tansmitter',
            'function' => 'Type 1 Diabetes treatment insulin transmitter',
            'canBeInPillBox' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        

        ]);
    }
}
