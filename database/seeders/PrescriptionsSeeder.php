<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class PrescriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prescriptions')->insert([[
            'nameOfPrescription' => 'Twice a day',
            'dateOfPrescription' => fake()->date('Y-m-d','now'),
            'dateOfStart' => fake()->date('Y-m-d','now'),
            'durationOfPrescriptionInDays' => fake()->numberBetween(1, 30),
            'frequencyBetweenDosesInHours' => fake()->numberBetween(1, 24),
            'frequencyPerDay' => fake()->numberBetween(1, 6),
            'medication_id' => fake()->numberBetween(1, 9),
            'user_id' => fake()->numberBetween(1, 4),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'nameOfPrescription' => 'My first prescription',
            'dateOfPrescription' => fake()->date('Y-m-d','now'),
            'dateOfStart' => fake()->date('Y-m-d','now'),
            'durationOfPrescriptionInDays' => fake()->numberBetween(1, 30),
            'frequencyBetweenDosesInHours' => fake()->numberBetween(1, 24),
            'frequencyPerDay' => fake()->numberBetween(1, 6),
            'medication_id' => fake()->numberBetween(1, 9),
            'user_id' => fake()->numberBetween(1, 4),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'nameOfPrescription' => 'Monday blues',
            'dateOfPrescription' => fake()->date('Y-m-d','now'),
            'dateOfStart' => fake()->date('Y-m-d','now'),
            'durationOfPrescriptionInDays' => fake()->numberBetween(1, 30),
            'frequencyBetweenDosesInHours' => fake()->numberBetween(1, 24),
            'frequencyPerDay' => fake()->numberBetween(1, 6),
            'medication_id' => fake()->numberBetween(1, 9),
            'user_id' => fake()->numberBetween(1, 4),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'nameOfPrescription' => 'Making it pillable',
            'dateOfPrescription' => fake()->date('Y-m-d','now'),
            'dateOfStart' => fake()->date('Y-m-d','now'),
            'durationOfPrescriptionInDays' => fake()->numberBetween(1, 30),
            'frequencyBetweenDosesInHours' => fake()->numberBetween(1, 24),
            'frequencyPerDay' => fake()->numberBetween(1, 6),
            'medication_id' => fake()->numberBetween(1, 9),
            'user_id' => fake()->numberBetween(1, 4),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'nameOfPrescription' => 'Intake of pills',
            'dateOfPrescription' => fake()->date('Y-m-d','now'),
            'dateOfStart' => fake()->date('Y-m-d','now'),
            'durationOfPrescriptionInDays' => fake()->numberBetween(1, 30),
            'frequencyBetweenDosesInHours' => fake()->numberBetween(1, 24),
            'frequencyPerDay' => fake()->numberBetween(1, 6),
            'medication_id' => fake()->numberBetween(1, 9),
            'user_id' => fake()->numberBetween(1, 4),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
   
    ]);

    }
}
